<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InsuranceCoverage;
use App\Http\Controllers\Controller;

class InsuranceCoverageController extends Controller
{
    public function index()
    {
        $company = getCompany();
        $isCompany = isOwner();

        $totalPolicies = InsuranceCoverage::when($isCompany, function ($query) use ($company) {
            return $query->where('company_id', $company->id);
        })->count();

        $activePolicies = InsuranceCoverage::when($isCompany, function ($query) use ($company) {
            return $query->where('company_id', $company->id);
        })->where('policy_end_date', '>', now()->format('Y-m-d'))->where('status', 'active')->count();

        $expiringSoonPolicies = InsuranceCoverage::when($isCompany, function ($query) use ($company) {
            return $query->where('company_id', $company->id);
        })->where('policy_end_date', now()->format('Y-m-d'))->where('status', 'active')->count();

        $expiredPolicies = InsuranceCoverage::when($isCompany, function ($query) use ($company) {
            return $query->where('company_id', $company->id);
        })->where('status', 'active')
            ->whereDate('policy_end_date', '<', now())
            ->count();

        $policies = InsuranceCoverage::when($isCompany, function ($query) use ($company) {
            return $query->where('company_id', $company->id);
        })->get();

        return view('admin.insurance-coverages.index', compact('totalPolicies', 'activePolicies', 'expiringSoonPolicies', 'expiredPolicies', 'policies'));
    }

    public function create(Request $request)
    {
        $type = $request->type;

        switch ($type) {
            case 'full_protection':
                return view('admin.insurance-coverages.full_protection_create');
            case 'cdw':
                return view('admin.insurance-coverages.cdw_create');
            case 'excess_protection':
                return view('admin.insurance-coverages.excess_create');
            case 'theft_protection':
                return view('admin.insurance-coverages.theft_create');
            case 'addons':
                return view('admin.insurance-coverages.addons_create');
            case 'basic':
                return view('admin.insurance-coverages.basic_create');
            default:
                abort(404);
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'policy_number' => 'required',
            'insurer_name' => 'required',
            'policy_start_date' => 'required|date',
            'policy_end_date' => 'required|date|after_or_equal:policy_start_date',
            'vehicle_classes' => 'required|array',
            'coverage_matrix' => 'required|array',
            'coverage_matrix.*.name' => 'required',
            'coverage_matrix.*.status' => 'required',
            'coverage_matrix.*.partial_notes' => 'nullable',
            'documents' => 'nullable|array',
            'documents.*' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $policy = new InsuranceCoverage();
        $policy->policy_number = $request->policy_number;
        $policy->insurer_name = $request->insurer_name;
        $policy->policy_start_date = $request->policy_start_date;
        $policy->policy_end_date = $request->policy_end_date;
        $policy->vehicle_classes = json_encode($request->vehicle_classes);
        
        if($request->hasFile('insurer_logo')) {
            $policy->insurer_logo = $request->file('insurer_logo')->store('insurance-coverages', 'public');
        }

        $policy->coverage_matrix = json_encode($request->coverage_matrix ?? []);

        $documents = [];
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $document) {
                $documents[$index] = $document->store('insurance-coverages', 'public');
            }
        }
        $policy->documents = json_encode($documents);

        $policy->what_not_covered = json_encode($request->what_not_covered ?? []);
        $policy->key_exclusions = $request->key_exclusions;
        
        $policy->excess_amount = $request->excess_amount;
        $policy->daily_rate = $request->daily_rate;
        $policy->max_claim_limit = $request->max_claim_limit;

        $policy->customer_instruction = $request->customer_instruction;
        $policy->claims_contact = json_encode($request->claims_contact ?? []);

        $policy->required_documents = json_encode($request->required_documents ?? []);

        $policy->status = $request->status;
        $policy->company_id = getCompany()->id;
        $policy->policy_type = $request->policy_type;
        $policy->save();

        return redirect()->route('admin.insurance-coverages.index')->with('success', 'Insurance coverage created successfully.');
    }
    
    public function edit(Request $request, $id)
    {
        $policy = InsuranceCoverage::findOrFail($id);

        switch ($policy->policy_type) {
            case 'Full Protection':
                return view('admin.insurance-coverages.full_protection_edit', compact('policy'));
            case 'CDW':
                return view('admin.insurance-coverages.cdw_edit', compact('policy'));
            case 'Excess':
                return view('admin.insurance-coverages.excess_edit', compact('policy'));
            case 'Theft':
                return view('admin.insurance-coverages.theft_edit', compact('policy'));
            case 'Addons':
                return view('admin.insurance-coverages.addons_edit', compact('policy'));
            case 'Basic':
                return view('admin.insurance-coverages.basic_edit', compact('policy'));
            default:
                abort(404);
        }
    }

    public function update(Request $request, $id)
    {
        $policy = InsuranceCoverage::findOrFail($id);

        $request->validate([
            'policy_number' => 'required',
            'insurer_name' => 'required',
            'policy_start_date' => 'required|date',
            'policy_end_date' => 'required|date|after_or_equal:policy_start_date',
            'vehicle_classes' => 'required|array',
            'coverage_matrix' => 'required|array',
            'coverage_matrix.*.name' => 'required',
            'coverage_matrix.*.status' => 'required',
            'coverage_matrix.*.partial_notes' => 'nullable',
            'documents' => 'nullable|array',
            'documents.*' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $policy->policy_number = $request->policy_number;
        $policy->insurer_name = $request->insurer_name;
        $policy->policy_start_date = $request->policy_start_date;
        $policy->policy_end_date = $request->policy_end_date;
        $policy->vehicle_classes = json_encode($request->vehicle_classes);
        
        if($request->hasFile('insurer_logo')) {
            $policy->insurer_logo = $request->file('insurer_logo')->store('insurance-coverages', 'public');
        }

        $policy->coverage_matrix = json_encode($request->coverage_matrix ?? []);

        $documents = json_decode($policy->documents ?? '[]', true);
        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $index => $document) {
                if($document->isValid()) {
                    $documents[$index] = $document->store('insurance-coverages', 'public');
                }
            }
        }
        $policy->documents = json_encode($documents);

        $policy->what_not_covered = json_encode($request->what_not_covered ?? []);
        $policy->key_exclusions = $request->key_exclusions;
        
        $policy->excess_amount = $request->excess_amount;
        $policy->daily_rate = $request->daily_rate;
        $policy->max_claim_limit = $request->max_claim_limit;

        $policy->customer_instruction = $request->customer_instruction;
        $policy->claims_contact = json_encode($request->claims_contact ?? []);

        $policy->required_documents = json_encode($request->required_documents ?? []);

        $policy->status = $request->status;
        $policy->save();

        return redirect()->route('admin.insurance-coverages.index')->with('success', 'Insurance coverage updated successfully.');
    }

    public function destroy($id)
    {
        $policy = InsuranceCoverage::findOrFail($id);
        $policy->delete();

        return redirect()->route('admin.insurance-coverages.index')->with('success', 'Insurance coverage deleted successfully.');
    }
    
    public function show(Request $request, $id)
    {
        $policy = InsuranceCoverage::findOrFail($id);
        return view('admin.insurance-coverages.show', compact('policy'));
    }
}