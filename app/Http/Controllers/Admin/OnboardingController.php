<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Company;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Models\CompanyBranch;
use App\Models\CompanyFinanceInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\OnboardingRequest;
use Illuminate\Support\Facades\Validator;

class OnboardingController extends Controller
{
    /**
     * Display the onboarding form.
     */
    public function index()
    {
        $user = Auth::user();

        if (!$user->hasRole('owner') || $user->onboarding_step == 7) {
            return redirect()->route('admin.dashboard');
        }

        $countries = Country::where('is_active', true)->get();
        $company = $user->company;
        $branches = $company ? $company->branches : collect([]);
        $financeInfo = $company ? $company->financeInfo : null;
        $chauffeurs = $company ? $company->users()->whereHas('roles', function ($q) {
            $q->where('name', 'driver');
        })->get() : collect([]);

        return view('admin.onboarding', compact('countries', 'company', 'branches', 'financeInfo', 'chauffeurs'));
    }

    /**
     * Store onboarding data.
     */
    public function store(OnboardingRequest $request)
    {
        try {
            Log::info('=== ONBOARDING STORE START ===', [
                'step' => $request->step,
                'user_id' => Auth::id(),
                'company_id' => Auth::user()->company_id ?? 'none'
            ]);

            DB::transaction(function () use ($request) {
                $user = Auth::user();
                $company = $user->company;

                // Create company if it doesn't exist
                if (!$company) {
                    $company = Company::create(['name' => $request->legal_company_name ?? 'New Company']);
                    $user->update(['company_id' => $company->id]);
                    Log::info('✅ COMPANY CREATED', ['company_id' => $company->id, 'name' => $company->name]);
                } else {
                    Log::info('📋 COMPANY EXISTS', ['company_id' => $company->id, 'name' => $company->name]);
                }

                $this->updateCompanyData($company, $request);
                $this->updateBranches($company, $request);
                $this->updateFinanceInfo($company, $request);
                $this->updateChauffeurs($company, $request);

                // Update user's onboarding step (only advance, don't go backwards)
                if ($request->step >= ($user->onboarding_step ?? 1)) {
                    $user->update(['onboarding_step' => (int)$request->step]);
                    Log::info('✅ ONBOARDING STEP UPDATED', [
                        'user_id' => $user->id,
                        'old_step' => $user->onboarding_step,
                        'new_step' => $request->step
                    ]);
                } else {
                    Log::info('⚠️ STEP NOT UPDATED', [
                        'current_step' => $user->onboarding_step,
                        'requested_step' => $request->step,
                        'reason' => 'step_not_advanced'
                    ]);
                }
            });

            Log::info('=== ONBOARDING STORE SUCCESS ===', ['step' => $request->step]);
            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('❌ VALIDATION FAILED', [
                'step' => $request->step,
                'user_id' => Auth::id(),
                'errors' => $e->errors()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('❌ ONBOARDING STORE FAILED', [
                'step' => $request->step,
                'user_id' => Auth::id(),
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while saving. Please try again.'
            ], 500);
        }
    }

    /**
     * Save draft without strict validation.
     */
    public function saveDraft(Request $request)
    {
        try {
            $user = Auth::user();
            $company = $user->company;

            if (!$company) {
                $company = Company::create(['name' => $request->legal_company_name ?? 'Draft Company']);
                $user->update(['company_id' => $company->id]);
            }

            // Save whatever data is provided without strict validation
            $this->updateCompanyData($company, $request);
            $this->updateBranches($company, $request);
            $this->updateFinanceInfo($company, $request);
            $this->updateChauffeurs($company, $request);

            return response()->json([
                'success' => true,
                'message' => 'Draft saved successfully'
            ]);
        } catch (\Exception $e) {
            Log::error('Draft save failed', ['error' => $e->getMessage()]);
            return response()->json([
                'success' => false,
                'message' => 'Failed to save draft'
            ], 500);
        }
    }

    /**
     * Complete the onboarding process.
     */
    public function complete(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'gdpr_consent' => 'required|accepted',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $user = Auth::user();
            $user->update(['onboarding_step' => 7, 'onboarding_status' => 'In Review']);

            Mail::send('emails.onboarding_submitted', [
                'user'    => $user,
                'company' => $user->company,
            ], function ($message) use ($user) {
                $message->to($user->email)
                    ->cc(config('app.admin_onboarding_cc_email'))
                    ->subject('Your Onboarding Is In Review - ' . settings('site_name'));
            });


            return response()->json([
                'success' => true,
                'message' => 'Onboarding completed successfully',
                // 'reference_id' => 'ANI-' . strtoupper(substr(md5($user->id . time()), 0, 8))
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while completing onboarding'
            ], 500);
        }
    }

    /**
     * Update company data based on request.
     */
    private function updateCompanyData(Company $company, Request $request): void
    {
        $updateData = [];

        // Step 1: Legal Details
        if ($request->has('legal_company_name')) {
            $updateData['name'] = $request->legal_company_name;
        }
        if ($request->has('trading_name')) {
            $updateData['trading_name'] = $request->trading_name;
        }
        if ($request->has('registration_number')) {
            $updateData['registration_no'] = $request->registration_number;
        }
        if ($request->has('jurisdiction')) {
            $updateData['country'] = $request->jurisdiction;
        }
        if ($request->has('incorporation_date')) {
            $updateData['incorporation_date'] = $request->incorporation_date;
        }
        if ($request->has('company_type')) {
            $updateData['company_type'] = $request->company_type;
        }
        if ($request->has('business_email')) {
            $updateData['business_email'] = $request->business_email;
        }

        // Step 2: Contacts
        if ($request->has('primary_contact_name')) {
            $updateData['contact_name'] = $request->primary_contact_name;
        }
        if ($request->has('primary_contact_email')) {
            $updateData['contact_email'] = $request->primary_contact_email;
        }
        if ($request->has('primary_contact_phone')) {
            $updateData['contact_phone'] = $request->primary_contact_phone;
        }
        if ($request->has('finance_contact_name')) {
            $updateData['finance_contact_name'] = $request->finance_contact_name;
        }
        if ($request->has('finance_contact_email')) {
            $updateData['finance_contact_email'] = $request->finance_contact_email;
        }
        if ($request->has('finance_contact_phone')) {
            $updateData['finance_contact_phone'] = $request->finance_contact_phone;
        }
        if ($request->has('support_contact_name')) {
            $updateData['support_contact_name'] = $request->support_contact_name;
        }
        if ($request->has('support_contact_email')) {
            $updateData['support_contact_email'] = $request->support_contact_email;
        }
        if ($request->has('support_contact_phone')) {
            $updateData['support_contact_phone'] = $request->support_contact_phone;
        }

        // Step 3: Address
        if ($request->has('hq_address')) {
            $updateData['address'] = $request->hq_address;
        }
        if ($request->has('postcode')) {
            $updateData['postal_code'] = $request->postcode;
        }
        if ($request->has('timezone')) {
            $updateData['timezone'] = $request->timezone;
        }
        if ($request->has('operating_license')) {
            $updateData['operating_license'] = $request->operating_license;
        }

        if (!empty($updateData)) {
            $company->update($updateData);
            Log::info('✅ COMPANY DATA SAVED', [
                'company_id' => $company->id,
                'fields_updated' => array_keys($updateData),
                'data' => $updateData
            ]);
        } else {
            Log::info('⚠️ NO COMPANY DATA TO UPDATE', ['step' => 'company_data']);
        }
    }

    /**
     * Update company branches.
     */
    private function updateBranches(Company $company, Request $request): void
    {
        // Delete existing branches first
        $deletedCount = $company->branches()->count();
        $company->branches()->delete();
        Log::info('🗑️ BRANCHES DELETED', ['deleted_count' => $deletedCount]);

        // Process branches from form fields like branches[0][name], branches[1][name], etc.
        $branchIndex = 0;
        $createdBranches = 0;

        // Debug: Check what branch data we have
        Log::info('🔍 BRANCH DATA DEBUG', [
            'all_request_data' => $request->all(),
            'branch_keys' => array_filter(array_keys($request->all()), function ($key) {
                return strpos($key, 'branches[') === 0;
            })
        ]);

        // Try both dot notation and array notation
        while ($request->has("branches.{$branchIndex}.name") || $request->has("branches[{$branchIndex}][name]")) {
            $branchName = $request->input("branches.{$branchIndex}.name") ?? $request->input("branches[{$branchIndex}][name]");

            Log::info('🔍 PROCESSING BRANCH', [
                'index' => $branchIndex,
                'name_dot' => $request->input("branches.{$branchIndex}.name"),
                'name_array' => $request->input("branches[{$branchIndex}][name]"),
                'final_name' => $branchName
            ]);

            if (!empty($branchName)) {
                $branch = CompanyBranch::create([
                    'company_id' => $company->id,
                    'branch_name' => $branchName,
                    'branch_phone' => $request->input("branches.{$branchIndex}.phone") ?? $request->input("branches[{$branchIndex}][phone]"),
                    'branch_address' => $request->input("branches.{$branchIndex}.address") ?? $request->input("branches[{$branchIndex}][address]") ?? '',
                    'branch_postcode' => $request->input("branches.{$branchIndex}.postcode") ?? $request->input("branches[{$branchIndex}][postcode]") ?? '',
                    'branch_country' => $request->input("branches.{$branchIndex}.country") ?? $request->input("branches[{$branchIndex}][country]"),
                ]);
                $createdBranches++;
                Log::info('✅ BRANCH CREATED', [
                    'branch_id' => $branch->id,
                    'index' => $branchIndex,
                    'name' => $branchName,
                    'phone' => $branch->branch_phone,
                    'address' => $branch->branch_address
                ]);
            } else {
                Log::info('⚠️ EMPTY BRANCH NAME', ['index' => $branchIndex]);
            }
            $branchIndex++;

            // Safety break to prevent infinite loop
            if ($branchIndex > 10) {
                Log::warning('⚠️ BRANCH LOOP SAFETY BREAK', ['index' => $branchIndex]);
                break;
            }
        }
        Log::info('🏢 BRANCHES SUMMARY', ['total_created' => $createdBranches]);
    }

    /**
     * Update company finance information.
     */
    private function updateFinanceInfo(Company $company, Request $request): void
    {
        $financeData = [];

        if ($request->has('currency')) {
            $financeData['preferred_currency'] = $request->currency;
        }
        if ($request->has('tax_profile')) {
            $financeData['tax_profile'] = $request->tax_profile;
        }
        if ($request->has('tax_id')) {
            $financeData['tax_id'] = $request->tax_id;
        }
        if ($request->has('reverse_charge')) {
            $financeData['reverse_charge'] = $request->reverse_charge;
        }
        if ($request->has('payout_type')) {
            $financeData['payout_type'] = $request->payout_type;
        }
        if ($request->has('iban')) {
            $financeData['iban'] = $request->iban;
        }
        if ($request->has('account_title')) {
            $financeData['account_title'] = $request->account_title;
        }
        if ($request->has('sort_code')) {
            $financeData['sort_code'] = $request->sort_code;
        }

        if (!empty($financeData)) {
            $financeInfo = $company->financeInfo()->updateOrCreate(
                ['company_id' => $company->id],
                $financeData
            );
            Log::info('✅ FINANCE INFO SAVED', [
                'finance_id' => $financeInfo->id,
                'fields_updated' => array_keys($financeData),
                'data' => $financeData
            ]);
        } else {
            Log::info('⚠️ NO FINANCE DATA TO UPDATE', ['step' => 'finance']);
        }
    }

    /**
     * Update company chauffeurs (drivers).
     */
    private function updateChauffeurs(Company $company, Request $request): void
    {

        Log::info('🚗 UPDATING CHAUFFEURS/DRIVERS', ['company_id' => $company->id]);

        // Debug: Check what chauffeur data we have
        Log::info('🔍 CHAUFFEUR DATA DEBUG', [
            'chauffeur_keys' => array_filter(array_keys($request->all()), function ($key) {
                return strpos($key, 'chauffeurs[') === 0;
            })
        ]);

        // Process chauffeurs from form fields like chauffeurs[0][name], chauffeurs[1][name], etc.
        $chauffeurIndex = 0;
        $createdChauffeurs = 0;

        // Try both dot notation and array notation
        while ($request->has("chauffeurs.{$chauffeurIndex}.name") || $request->has("chauffeurs[{$chauffeurIndex}][name]")) {
            $chauffeurName = $request->input("chauffeurs.{$chauffeurIndex}.name") ?? $request->input("chauffeurs[{$chauffeurIndex}][name]");
            $chauffeurEmail = $request->input("chauffeurs.{$chauffeurIndex}.email") ?? $request->input("chauffeurs[{$chauffeurIndex}][email]");

            Log::info('🔍 PROCESSING CHAUFFEUR', [
                'index' => $chauffeurIndex,
                'name_dot' => $request->input("chauffeurs.{$chauffeurIndex}.name"),
                'name_array' => $request->input("chauffeurs[{$chauffeurIndex}][name]"),
                'final_name' => $chauffeurName,
                'final_email' => $chauffeurEmail
            ]);

            if (!empty($chauffeurName) && !empty($chauffeurEmail)) {
                // Split name into first and last name
                $nameParts = explode(' ', $chauffeurName, 2);
                $firstName = $nameParts[0];
                $lastName = $nameParts[1] ?? '';

                $driver = User::updateOrCreate(['email' => $chauffeurEmail, 'company_id' => $company->id], [
                    // 'company_id' => $company->id,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'phone' => $request->input("chauffeurs.{$chauffeurIndex}.phone") ?? $request->input("chauffeurs[{$chauffeurIndex}][phone]"),
                    'license_number' => $request->input("chauffeurs.{$chauffeurIndex}.license") ?? $request->input("chauffeurs[{$chauffeurIndex}][license]"),
                    'password' => bcrypt('password'),
                    'status' => 'pending',
                    'hire_type' => 'employee', // Default hire type
                ]);

                // Assign driver role using syncRoles like admin panel
                $driver->syncRoles(['driver']);

                // Create driver form like admin panel does
                $this->createOnboardingDriverForm($driver->id);

                Log::info('✅ CHAUFFEUR/DRIVER CREATED', [
                    'driver_id' => $driver->id,
                    'index' => $chauffeurIndex,
                    'name' => $chauffeurName,
                    'email' => $chauffeurEmail,
                    'phone' => $driver->phone,
                    'company_id' => $driver->company_id,
                    'role' => 'driver',
                    'status' => $driver->status
                ]);
                $createdChauffeurs++;
            } else {
                Log::info('⚠️ EMPTY CHAUFFEUR DATA', [
                    'index' => $chauffeurIndex,
                    'name' => $chauffeurName,
                    'email' => $chauffeurEmail
                ]);
            }
            $chauffeurIndex++;

            // Safety break to prevent infinite loop
            if ($chauffeurIndex > 10) {
                Log::warning('⚠️ CHAUFFEUR LOOP SAFETY BREAK', ['index' => $chauffeurIndex]);
                break;
            }
        }

        Log::info('🚗 CHAUFFEURS SUMMARY', ['total_created' => $createdChauffeurs]);
    }

    /**
     * Download CSV template for chauffeurs.
     */
    public function downloadTemplate()
    {
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="chauffeurs_template.csv"',
        ];

        $callback = function () {
            $file = fopen('php://output', 'w');
            fputcsv($file, ['name', 'email', 'phone', 'license_number']);
            fputcsv($file, ['John Doe', 'john@example.com', '1234567890', 'DL123456']);
            fputcsv($file, ['Jane Smith', 'jane@example.com', '0987654321', 'DL789012']);
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Import chauffeurs from CSV.
     */
    public function importChauffeurs(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:2048'
        ]);

        try {
            $user = auth()->user();
            $company = $user->company;

            if (!$company) {
                return response()->json([
                    'success' => false,
                    'message' => 'Company not found'
                ], 400);
            }

            $file = $request->file('csv_file');
            Log::info('📄 CSV IMPORT START', [
                'file_name' => $file->getClientOriginalName(),
                'file_size' => $file->getSize(),
                'company_id' => $company->id
            ]);
            $csvData = array_map('str_getcsv', file($file->getRealPath()));
            $header = array_shift($csvData);

            // Clean and validate headers
            $header = array_map('trim', $header);
            $expectedHeaders = ['name', 'email', 'phone', 'license_number'];
            if ($header !== $expectedHeaders) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid CSV format. Expected headers: ' . implode(', ', $expectedHeaders) . '. Got: ' . implode(', ', $header)
                ], 400);
            }

            $errors = [];
            $imported = 0;
            $chauffeurs = [];

            foreach ($csvData as $index => $row) {
                $rowNumber = $index + 2; // +2 because we removed header and arrays are 0-indexed

                // Skip empty rows
                if (empty(array_filter($row))) {
                    continue;
                }

                if (count($row) !== 4) {
                    $errors[] = "Row {$rowNumber}: Invalid number of columns (expected 4, got " . count($row) . ")";
                    continue;
                }

                [$name, $email, $phone, $license] = array_map('trim', $row);

                // Validate required fields
                if (empty($name) || empty($email)) {
                    $errors[] = "Row {$rowNumber}: Name and email are required";
                    continue;
                }

                // Validate email format
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors[] = "Row {$rowNumber}: Invalid email format";
                    continue;
                }

                // Check if email already exists
                if (User::where('email', $email)->exists()) {
                    $errors[] = "Row {$rowNumber}: Email {$email} already exists";
                    continue;
                }

                $chauffeurs[] = [
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'license' => $license
                ];

                Log::info('🔍 CSV ROW PROCESSED', [
                    'row' => $rowNumber,
                    'name' => $name,
                    'email' => $email
                ]);
            }

            // If there are errors, return them
            if (!empty($errors)) {
                return response()->json([
                    'success' => false,
                    'message' => 'CSV validation failed',
                    'errors' => $errors
                ], 400);
            }

            // Create chauffeurs
            foreach ($chauffeurs as $chauffeurData) {
                $nameParts = explode(' ', $chauffeurData['name'], 2);
                $firstName = $nameParts[0];
                $lastName = $nameParts[1] ?? '';

                $driver = User::create([
                    'company_id' => $company->id,
                    'first_name' => $firstName,
                    'last_name' => $lastName,
                    'email' => $chauffeurData['email'],
                    'phone' => $chauffeurData['phone'],
                    'license_number' => $chauffeurData['license'],
                    'password' => bcrypt('password'),
                    'status' => 'pending',
                    'hire_type' => 'employee',
                ]);

                $driver->syncRoles(['driver']);
                $this->createOnboardingDriverForm($driver->id);
                $imported++;
            }

            Log::info('✅ CSV IMPORT SUCCESS', [
                'total_rows_processed' => count($csvData),
                'chauffeurs_to_create' => count($chauffeurs),
                'chauffeurs_created' => $imported
            ]);

            return response()->json([
                'success' => true,
                'message' => "Successfully imported {$imported} chauffeurs",
                'imported' => $imported,
                'chauffeurs' => $chauffeurs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Import failed: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Create driver form for onboarding chauffeurs.
     */
    private function createOnboardingDriverForm($driverId)
    {
        $driverForm = new \App\Models\DriverForm();
        $driverForm->driver_id = $driverId;
        $driverForm->save();
    }
}
