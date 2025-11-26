<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\CompanyCreatedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class CompanyController extends Controller
{
    public function index()
    {
        $data = User::with('company.bookings')->whereHasRole('owner')->paginate(100);
        $title = "Company listing";
        return view('admin.company.list', compact('data', 'title'));
    }

    public function create()
    {
        $countries = Country::where('is_active', true)->get();
        return view('admin.company.create', compact('countries'));
    }

    public function store(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = $this->validateData($request);

        $company = Company::create($data);

        $user = new User();
        $user->password = Hash::make($data['password']);
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->first_name = $data['owner'];
        $user->company_id = $company->id;
        $user->save();

        $user->addRole('owner');

        $data = ['password' => $data['password']];
        $data['title'] = "Your Company has been created on " . config('app.name');
        $data['message'] = "<h2>Hi {$user->first_name} {$user->last_name},</h2>
        <p>Thank you for creating a company on our platform. Your company has been created successfully.</p>
        <p>Owner Name: {$user->first_name} {$user->last_name},</p>
        <p>Owner Email: {$user->email}</p>
        <p>Owner Phone: {$user->phone}</p>
        <p>Account Password: {$data['password']}</p>
        <p>Click <a href='" . route('login') . "'>here</a> to login to your account.</p>
        <br>
        <p>Thank you for using our platform.</p>
        <p>Best regards</p>
        <p>" . config('app.name') . "</p>";
        $data['user'] = $user;
        $data['name'] = $user->first_name . ' ' . $user->last_name;
        Mail::to($user->email)->send(new CompanyCreatedMail($data));

        return redirect()->route('admin.companies.index')->with('success', 'Company created successfully.');
    }

    public function edit($id)
    {

        $countries = Country::where('is_active', true)->get();
        $user = User::findOrFail($id);
        $company = $user->company;
        return view('admin.company.edit', compact('company', 'user', 'countries'));
    }

    public function update(Request $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($request->user_id);

        $data = $this->validateData($request, $company, $user);

        $company->update($data);

        $user = User::findOrFail($request->user_id);
        if ($request->get('password')) {
            $user->password = Hash::make($data['password']);
        }
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->status = $data['status'];
        $user->first_name = $data['owner'];
        $user->save();

        return redirect()->route('admin.companies.index')->with('success', 'Company updated successfully.');
    }

    public function destroy(Company $company)
    {
        $company->delete();



        return redirect()->route('company.index')->with('success', 'Company deleted successfully.');
    }

    private function validateData(Request $request, Company $company = null, User $user = null): array
    {
        $rules = [
            'name' => 'required|unique:companies,name',
            'email' => 'required|unique:users,email',
            'phone' => 'required|unique:users,phone',
            'owner' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'password' => 'nullable',
            'state' => 'required',
            'country' => 'required',
            'tin' => 'required',
            'status' => 'nullable',
            'contact_name' => 'required',
            'contact_phone' => 'required',
            'contact_email' => 'required',
        ];

        if ($company) {
            $rules['name'] = ['required', Rule::unique('companies')->ignore($company->id),];
        }
        if ($user) {
            $rules['phone'] = ['required', Rule::unique('users')->ignore($user->id),];
            $rules['email'] = ['required', Rule::unique('users')->ignore($user->id),];
        }

        return $request->validate($rules);
    }

    public function changeStatus(Request $request, $id)
    {
        $user = User::where('id', $id)->firstOrFail();
        $user->status = $request->status;
        $user->save();

        return redirect()->route('admin.companies.index')->with('success', 'Company status changed successfully.');
    }

    public function updateOnboardingStatus(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'onboarding_status' => 'required|in:pending,approved,rejected,In Review',
            'onboarding_rejection_reason' => 'required_if:onboarding_status,pending,rejected|nullable|string|max:500'
        ]);

        $user = User::findOrFail($request->user_id);
        $user->onboarding_status = $request->onboarding_status;

        if (in_array($request->onboarding_status, ['pending', 'rejected'])) {
            $user->onboarding_rejection_reason = $request->onboarding_rejection_reason;
            $user->onboarding_step = 1;
        } else {
            $user->onboarding_rejection_reason = null;
        }
        if ($request->onboarding_status == 'approved') {
            $user->status = 'active';
        }

        $user->save();

        Mail::send('emails.onboarding_status_update', ['user' => $user], function ($message) use ($user) {
            $subject = match ($user->onboarding_status) {
                'approved' => 'Congratulations! Your ANI Motors Partner Account Is Approved 🎉',
                'pending'  => 'Update on Your ANI Motors Partner Application',
                'rejected' => 'Update on Your ANI Motors Partner Application',
                default    => 'Update on Your ANI Motors Partner Application',
            };

            $message->to($user->email)
                ->cc(config('app.admin_onboarding_cc_email'))
                ->subject($subject);
        });


        return redirect()->route('admin.companies.index')->with('success', 'Onboarding status updated successfully.');
    }

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
    }

    public function view($id)
    {
        $company = Company::with(['user', 'branches', 'financeInfo'])->findOrFail($id);
        $user = $company->user;
        $branches = $company->branches;
        $financeInfo = $company->financeInfo;
        $chauffeurs = User::where('company_id', $company->id)->whereHasRole('driver')->get();

        return view('admin.company.view', compact('company', 'user', 'branches', 'financeInfo', 'chauffeurs'));
    }

    public function profile()
    {
        $user = auth()->user();
        $company = $user->company;
        $countries = Country::where('is_active', true)->get();
        $branches = $company ? $company->branches : collect([]);
        $financeInfo = $company ? $company->financeInfo : null;
        $chauffeurs = $company ? User::where('company_id', $company->id)->whereHasRole('driver')->get() : collect([]);

        return view('admin.company.profile', compact('company', 'countries', 'branches', 'financeInfo', 'chauffeurs'));
    }

    /**
     * Update company profile.
     */
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $company = $user->company;

        $rules = [
            'legal_company_name' => 'required|string|max:255',
            'registration_number' => 'required|string|max:255',
            'jurisdiction' => 'required|exists:countries,id',
            'incorporation_date' => 'required|date',
            'company_type' => 'required|string',
            'business_email' => 'required|email|max:255',
            'primary_contact_name' => 'required|string|max:255',
            'primary_contact_email' => 'required|email|max:255',
            'primary_contact_phone' => 'required|string|max:20',
            'finance_contact_name' => 'required|string|max:255',
            'finance_contact_email' => 'required|email|max:255',
            'finance_contact_phone' => 'required|string|max:20',
            'hq_address' => 'required|string|max:500',
            'postcode' => 'required|string|max:20',
            'timezone' => 'required|string',
            'currency' => 'required|string|max:10',
            'tax_profile' => 'required|string|max:50',
        ];

        $validated = $request->validate($rules);

        try {
            // Update company data
            $company->update([
                'name' => $validated['legal_company_name'],
                'trading_name' => $request->trading_name,
                'registration_no' => $validated['registration_number'],
                'country' => $validated['jurisdiction'],
                'incorporation_date' => $validated['incorporation_date'],
                'company_type' => $validated['company_type'],
                'business_email' => $validated['business_email'],
                'contact_name' => $validated['primary_contact_name'],
                'contact_email' => $validated['primary_contact_email'],
                'contact_phone' => $validated['primary_contact_phone'],
                'finance_contact_name' => $validated['finance_contact_name'],
                'finance_contact_email' => $validated['finance_contact_email'],
                'finance_contact_phone' => $validated['finance_contact_phone'],
                'support_contact_name' => $request->support_contact_name,
                'support_contact_email' => $request->support_contact_email,
                'support_contact_phone' => $request->support_contact_phone,
                'address' => $validated['hq_address'],
                'postal_code' => $validated['postcode'],
                'timezone' => $validated['timezone'],
                'operating_license' => $request->operating_license,
            ]);

            // Update finance info
            $company->financeInfo()->updateOrCreate(
                ['company_id' => $company->id],
                [
                    'preferred_currency' => $validated['currency'],
                    'tax_profile' => $validated['tax_profile'],
                    'tax_id' => $request->tax_id,
                    'reverse_charge' => $request->reverse_charge === 'yes',
                    'payout_type' => $request->payout_type,
                    'iban' => $request->iban,
                    'account_title' => $request->account_title,
                    'sort_code' => $request->sort_code,
                ]
            );

            // Update branches
            $company->branches()->delete();
            if ($request->has('branches')) {
                foreach ($request->branches as $branchData) {
                    if (!empty($branchData['name'])) {
                        $company->branches()->create([
                            'branch_name' => $branchData['name'],
                            'branch_phone' => $branchData['phone'] ?? '',
                            'branch_address' => $branchData['address'] ?? '',
                            'branch_postcode' => $branchData['postcode'] ?? '',
                        ]);
                    }
                }
            }

            // Update chauffeurs (delete existing and recreate)
            User::where('company_id', $company->id)->whereHasRole('driver')->delete();
            if ($request->has('chauffeurs')) {
                foreach ($request->chauffeurs as $chauffeurData) {
                    if (!empty($chauffeurData['name']) && !empty($chauffeurData['email'])) {
                        $nameParts = explode(' ', $chauffeurData['name'], 2);
                        $firstName = $nameParts[0];
                        $lastName = $nameParts[1] ?? '';

                        $driver = User::create([
                            'company_id' => $company->id,
                            'first_name' => $firstName,
                            'last_name' => $lastName,
                            'email' => $chauffeurData['email'],
                            'phone' => $chauffeurData['phone'] ?? '',
                            'license_number' => $chauffeurData['license'] ?? '',
                            'password' => bcrypt('password'),
                            'status' => 'pending',
                        ]);

                        $driver->syncRoles(['driver']);
                    }
                }
            }

            return redirect()->route('admin.company.profile')->with('success', 'Company profile updated successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update profile: ' . $e->getMessage());
        }
    }
}
