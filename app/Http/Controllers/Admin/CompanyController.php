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
        return view('admin.company.list', compact('data','title'));
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
        <p>Click <a href='".route('login')."'>here</a> to login to your account.</p>
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
        return view('admin.company.edit', compact('company','user','countries'));
    }

    public function update(Request $request, Company $company): \Illuminate\Http\RedirectResponse
    {
        $user = User::findOrFail($request->user_id);

        $data = $this->validateData($request, $company, $user);

        $company->update($data);

        $user = User::findOrFail($request->user_id);
        if ($request->get('password')){
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

    public function delete($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect()->route('admin.companies.index')->with('success', 'Company deleted successfully.');
    }

    public function view($id)
    {
        $company = Company::with('user')->findOrFail($id);
        $user = $company->user;
        return view('admin.company.view', compact('company','user'));
    }
}
