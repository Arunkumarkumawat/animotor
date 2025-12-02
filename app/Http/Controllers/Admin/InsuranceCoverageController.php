<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\InsuranceCoverage;
use App\Http\Controllers\Controller;

class InsuranceCoverageController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $isCompany = isOwner();

        $totalPolicies = InsuranceCoverage::when($isCompany, function ($query) use ($user) {
            return $query->where('company_id', $user->company_id);
        })->count();

        $activePolicies = InsuranceCoverage::when($isCompany, function ($query) use ($user) {
            return $query->where('company_id', $user->company_id);
        })->where('status', 'active')->count();

        $expiringSoonPolicies = InsuranceCoverage::when($isCompany, function ($query) use ($user) {
            return $query->where('company_id', $user->company_id);
        })->where('status', 'active')
            ->whereDate('policy_end_date', '>', now())
            ->whereDate('policy_end_date', '<=', now()->addMonths(1))
            ->count();

        $expiredPolicies = InsuranceCoverage::when($isCompany, function ($query) use ($user) {
            return $query->where('company_id', $user->company_id);
        })->where('status', 'active')
            ->whereDate('policy_end_date', '<', now())
            ->count();

        $policies = InsuranceCoverage::when($isCompany, function ($query) use ($user) {
            return $query->where('company_id', $user->company_id);
        })->get();

        return view('admin.insurance-coverages.index', compact('totalPolicies', 'activePolicies', 'expiringSoonPolicies', 'expiredPolicies', 'policies'));
    }

    public function create(Request $request)
    {
        $type = $request->type;
        $companyId = auth()->user()->company_id;

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
            default:
                return view('admin.insurance-coverages.create', compact('type'));
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
        $policy->company_id = auth()->user()->company_id ?? auth()->user()->id;
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
            default:
                return view('admin.insurance-coverages.edit', compact('policy'));
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
}