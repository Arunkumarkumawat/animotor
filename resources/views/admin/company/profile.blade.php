@extends('admin.layout.app')

@section('title', 'Company Profile')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Company Profile</h4>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="POST" action="{{ route('admin.company.profile.update') }}">
                        @csrf
                        
                        <!-- Legal Details -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Legal Details</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Legal Company Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="legal_company_name" 
                                           value="{{ old('legal_company_name', $company?->name) }}" required>
                                    @error('legal_company_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Trading Name</label>
                                    <input type="text" class="form-control" name="trading_name" 
                                           value="{{ old('trading_name', $company?->trading_name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Registration Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="registration_number" 
                                           value="{{ old('registration_number', $company?->registration_no) }}" required>
                                    @error('registration_number')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jurisdiction <span class="text-danger">*</span></label>
                                    <select class="form-control" name="jurisdiction" required>
                                        <option value="">Select jurisdiction</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" 
                                                {{ old('jurisdiction', $company?->country) == $country->id ? 'selected' : '' }}>
                                                {{ $country->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('jurisdiction')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Incorporation Date <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="incorporation_date" 
                                           value="{{ old('incorporation_date', $company?->incorporation_date) }}" required>
                                    @error('incorporation_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Company Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="company_type" required>
                                        <option value="">Select type</option>
                                        <option value="ltd" {{ old('company_type', $company?->company_type) == 'ltd' ? 'selected' : '' }}>Limited Company (Ltd)</option>
                                        <option value="llc" {{ old('company_type', $company?->company_type) == 'llc' ? 'selected' : '' }}>Limited Liability Company (LLC)</option>
                                        <option value="plc" {{ old('company_type', $company?->company_type) == 'plc' ? 'selected' : '' }}>Public Limited Company (PLC)</option>
                                        <option value="sole_trader" {{ old('company_type', $company?->company_type) == 'sole_trader' ? 'selected' : '' }}>Sole Trader</option>
                                        <option value="franchise" {{ old('company_type', $company?->company_type) == 'franchise' ? 'selected' : '' }}>Franchise</option>
                                        <option value="operator_chauffeur" {{ old('company_type', $company?->company_type) == 'operator_chauffeur' ? 'selected' : '' }}>Operator/Chauffeur-only</option>
                                        <option value="other" {{ old('company_type', $company?->company_type) == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                    @error('company_type')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Business Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="business_email" 
                                           value="{{ old('business_email', $company?->business_email) }}" required>
                                    @error('business_email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <!-- Contact Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Contact Information</h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Primary Contact Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="primary_contact_name" 
                                           value="{{ old('primary_contact_name', $company?->contact_name) }}" required>
                                    @error('primary_contact_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Primary Contact Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="primary_contact_email" 
                                           value="{{ old('primary_contact_email', $company?->contact_email) }}" required>
                                    @error('primary_contact_email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Primary Contact Phone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="primary_contact_phone" 
                                           value="{{ old('primary_contact_phone', $company?->contact_phone) }}" required>
                                    @error('primary_contact_phone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Finance Contact Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="finance_contact_name" 
                                           value="{{ old('finance_contact_name', $company?->finance_contact_name) }}" required>
                                    @error('finance_contact_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Finance Contact Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" name="finance_contact_email" 
                                           value="{{ old('finance_contact_email', $company?->finance_contact_email) }}" required>
                                    @error('finance_contact_email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Finance Contact Phone <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" name="finance_contact_phone" 
                                           value="{{ old('finance_contact_phone', $company?->finance_contact_phone) }}" required>
                                    @error('finance_contact_phone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Support Contact Name</label>
                                    <input type="text" class="form-control" name="support_contact_name" 
                                           value="{{ old('support_contact_name', $company?->support_contact_name) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Support Contact Email</label>
                                    <input type="email" class="form-control" name="support_contact_email" 
                                           value="{{ old('support_contact_email', $company?->support_contact_email) }}">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Support Contact Phone</label>
                                    <input type="tel" class="form-control" name="support_contact_phone" 
                                           value="{{ old('support_contact_phone', $company?->support_contact_phone) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Address</h5>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Headquarters Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="hq_address" rows="3" required>{{ old('hq_address', $company?->address) }}</textarea>
                                    @error('hq_address')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Postcode <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="postcode" 
                                           value="{{ old('postcode', $company?->postal_code) }}" required>
                                    @error('postcode')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Timezone <span class="text-danger">*</span></label>
                                    <select class="form-control" name="timezone" required>
                                        <option value="">Select timezone</option>
                                        <option value="GMT" {{ old('timezone', $company?->timezone) == 'GMT' ? 'selected' : '' }}>GMT (London)</option>
                                        <option value="CET" {{ old('timezone', $company?->timezone) == 'CET' ? 'selected' : '' }}>CET (Berlin, Paris)</option>
                                        <option value="EET" {{ old('timezone', $company?->timezone) == 'EET' ? 'selected' : '' }}>EET (Helsinki)</option>
                                        <option value="IST" {{ old('timezone', $company?->timezone) == 'IST' ? 'selected' : '' }}>IST (Dublin)</option>
                                        <option value="EST" {{ old('timezone', $company?->timezone) == 'EST' ? 'selected' : '' }}>EST (New York)</option>
                                        <option value="PST" {{ old('timezone', $company?->timezone) == 'PST' ? 'selected' : '' }}>PST (Los Angeles)</option>
                                    </select>
                                    @error('timezone')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Operating License</label>
                                    <input type="text" class="form-control" name="operating_license" 
                                           value="{{ old('operating_license', $company?->operating_license) }}">
                                </div>
                            </div>
                        </div>

                        <!-- Branches -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Branch Locations (Optional)</h5>
                            </div>
                            <div class="col-12">
                                <div id="branchContainer">
                                    @foreach($branches as $index => $branch)
                                        <div class="branch-entry mb-3 p-3 border rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6>Branch {{ $index + 1 }}</h6>
                                                <button type="button" class="btn btn-sm btn-outline-danger remove-branch" onclick="removeBranch(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="branches[{{ $index }}][name]" placeholder="Branch Name" value="{{ $branch->branch_name }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="branches[{{ $index }}][phone]" placeholder="Phone" value="{{ $branch->branch_phone }}" />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-8">
                                                    <input type="text" class="form-control" name="branches[{{ $index }}][address]" placeholder="Address" value="{{ $branch->branch_address }}" />
                                                </div>
                                                <div class="col-md-4">
                                                    <input type="text" class="form-control" name="branches[{{ $index }}][postcode]" placeholder="Postcode" value="{{ $branch->branch_postcode }}" />
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-outline-secondary" onclick="addBranch()">
                                    <i class="fas fa-plus me-2"></i>Add Branch
                                </button>
                            </div>
                        </div>

                        <!-- Chauffeurs -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Chauffeurs (Optional)</h5>
                            </div>
                            <div class="col-12">
                                <div id="chauffeurContainer">
                                    @foreach($chauffeurs as $index => $chauffeur)
                                        <div class="chauffeur-entry mb-3 p-3 border rounded">
                                            <div class="d-flex justify-content-between align-items-center mb-2">
                                                <h6>Chauffeur {{ $index + 1 }}</h6>
                                                <button type="button" class="btn btn-sm btn-outline-danger remove-chauffeur" onclick="removeChauffeur(this)">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="chauffeurs[{{ $index }}][name]" placeholder="Full Name" value="{{ $chauffeur->name }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="email" class="form-control" name="chauffeurs[{{ $index }}][email]" placeholder="Email" value="{{ $chauffeur->email }}" />
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-md-6">
                                                    <input type="tel" class="form-control" name="chauffeurs[{{ $index }}][phone]" placeholder="Phone" value="{{ $chauffeur->phone }}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" name="chauffeurs[{{ $index }}][license]" placeholder="License Number" value="{{ $chauffeur->license_number }}" />
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <button type="button" class="btn btn-outline-secondary" onclick="addChauffeur()">
                                    <i class="fas fa-plus me-2"></i>Add Chauffeur
                                </button>
                            </div>
                        </div>

                        <!-- Finance Information -->
                        <div class="row mb-4">
                            <div class="col-12">
                                <h5 class="border-bottom pb-2 mb-3">Finance Information</h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Preferred Currency <span class="text-danger">*</span></label>
                                    <select class="form-control" name="currency" required>
                                        <option value="">Select currency</option>
                                        <option value="GBP" {{ old('currency', $financeInfo?->preferred_currency) == 'GBP' ? 'selected' : '' }}>GBP (£) - British Pound</option>
                                        <option value="EUR" {{ old('currency', $financeInfo?->preferred_currency) == 'EUR' ? 'selected' : '' }}>EUR (€) - Euro</option>
                                        <option value="USD" {{ old('currency', $financeInfo?->preferred_currency) == 'USD' ? 'selected' : '' }}>USD ($) - US Dollar</option>
                                        <option value="CAD" {{ old('currency', $financeInfo?->preferred_currency) == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                                        <option value="AUD" {{ old('currency', $financeInfo?->preferred_currency) == 'AUD' ? 'selected' : '' }}>AUD - Australian Dollar</option>
                                    </select>
                                    @error('currency')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Tax Profile <span class="text-danger">*</span></label>
                                    <select class="form-control" name="tax_profile" required>
                                        <option value="">Select tax type</option>
                                        <option value="VAT" {{ old('tax_profile', $financeInfo?->tax_profile) == 'VAT' ? 'selected' : '' }}>VAT (Value Added Tax)</option>
                                        <option value="GST" {{ old('tax_profile', $financeInfo?->tax_profile) == 'GST' ? 'selected' : '' }}>GST (Goods & Services Tax)</option>
                                        <option value="SalesTax" {{ old('tax_profile', $financeInfo?->tax_profile) == 'SalesTax' ? 'selected' : '' }}>Sales Tax</option>
                                        <option value="None" {{ old('tax_profile', $financeInfo?->tax_profile) == 'None' ? 'selected' : '' }}>None (Not registered)</option>
                                    </select>
                                    @error('tax_profile')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>TAX/VAT ID</label>
                                    <input type="text" class="form-control" name="tax_id" 
                                           value="{{ old('tax_id', $financeInfo?->tax_id) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Reverse Charge Rules Apply</label>
                                    <select class="form-control" name="reverse_charge">
                                        <option value="no" {{ old('reverse_charge', $financeInfo?->reverse_charge ? 'yes' : 'no') == 'no' ? 'selected' : '' }}>No</option>
                                        <option value="yes" {{ old('reverse_charge', $financeInfo?->reverse_charge ? 'yes' : 'no') == 'yes' ? 'selected' : '' }}>Yes</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Type</label>
                                    <select class="form-control" name="payout_type">
                                        <option value="">Select account type</option>
                                        <option value="bank" {{ old('payout_type', $financeInfo?->payout_type) == 'bank' ? 'selected' : '' }}>Bank Account</option>
                                        <option value="wallet" {{ old('payout_type', $financeInfo?->payout_type) == 'wallet' ? 'selected' : '' }}>Digital Wallet</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>IBAN/Account Number</label>
                                    <input type="text" class="form-control" name="iban" 
                                           value="{{ old('iban', $financeInfo?->iban) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Title</label>
                                    <input type="text" class="form-control" name="account_title" 
                                           value="{{ old('account_title', $financeInfo?->account_title) }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>SORT Code</label>
                                    <input type="text" class="form-control" name="sort_code" 
                                           value="{{ old('sort_code', $financeInfo?->sort_code) }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Update Profile</button>
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let branchIndex = {{ count($branches) }};
let chauffeurIndex = {{ count($chauffeurs) }};

function addBranch() {
    const branchHtml = `
        <div class="branch-entry mb-3 p-3 border rounded">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6>Branch ${branchIndex + 1}</h6>
                <button type="button" class="btn btn-sm btn-outline-danger remove-branch" onclick="removeBranch(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="branches[${branchIndex}][name]" placeholder="Branch Name" />
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="branches[${branchIndex}][phone]" placeholder="Phone" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-8">
                    <input type="text" class="form-control" name="branches[${branchIndex}][address]" placeholder="Address" />
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="branches[${branchIndex}][postcode]" placeholder="Postcode" />
                </div>
            </div>
        </div>
    `;
    document.getElementById('branchContainer').insertAdjacentHTML('beforeend', branchHtml);
    branchIndex++;
}

function removeBranch(button) {
    button.closest('.branch-entry').remove();
}

function addChauffeur() {
    const chauffeurHtml = `
        <div class="chauffeur-entry mb-3 p-3 border rounded">
            <div class="d-flex justify-content-between align-items-center mb-2">
                <h6>Chauffeur ${chauffeurIndex + 1}</h6>
                <button type="button" class="btn btn-sm btn-outline-danger remove-chauffeur" onclick="removeChauffeur(this)">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <input type="text" class="form-control" name="chauffeurs[${chauffeurIndex}][name]" placeholder="Full Name" />
                </div>
                <div class="col-md-6">
                    <input type="email" class="form-control" name="chauffeurs[${chauffeurIndex}][email]" placeholder="Email" />
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <input type="tel" class="form-control" name="chauffeurs[${chauffeurIndex}][phone]" placeholder="Phone" />
                </div>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="chauffeurs[${chauffeurIndex}][license]" placeholder="License Number" />
                </div>
            </div>
        </div>
    `;
    document.getElementById('chauffeurContainer').insertAdjacentHTML('beforeend', chauffeurHtml);
    chauffeurIndex++;
}

function removeChauffeur(button) {
    button.closest('.chauffeur-entry').remove();
}
</script>
@endsection