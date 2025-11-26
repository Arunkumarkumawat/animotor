<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Onboarding - Ani Motors</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/onboarding.css') }}" />
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" />
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</head>

<body>
    <div class="auto-save-indicator" id="autoSaveIndicator">
        <i class="fas fa-save me-2"></i>Draft saved
    </div>

    <div class="main-container">
        <div class="onboarding-card">
            <div class="card-header">
                <div class="logo-container">
                      <img class="logo-dark logo-img" src="{{ str_replace('https://animotor.co.uk', url('/'), settings('dark_logo'))  }}" alt="logo-dark">

                   {{-- {{settings('site_name', env('APP_NAME'))}} --}}
                </div>
                {{-- <div class="subtitle">Company Registration & Partner Onboarding</div> --}}
            </div>

            <div class="progress-container">
                <div class="progress-steps">
                    <div class="step active" data-step="0">
                        <div class="step-circle">1</div>
                        <div class="step-label">Legal Details</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" data-step="1">
                        <div class="step-circle">2</div>
                        <div class="step-label">Contacts</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" data-step="2">
                        <div class="step-circle">3</div>
                        <div class="step-label">Address</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" data-step="3">
                        <div class="step-circle">4</div>
                        <div class="step-label">Finance</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" data-step="4">
                        <div class="step-circle">5</div>
                        <div class="step-label">Chauffeurs</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" data-step="5">
                        <div class="step-circle">6</div>
                        <div class="step-label">Review</div>
                        <div class="step-line"></div>
                    </div>
                    <div class="step" data-step="6">
                        <div class="step-circle">✓</div>
                        <div class="step-label">Complete</div>
                    </div>
                </div>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 14.28%"></div>
                </div>
            </div>

            <div class="form-container">
                <form id="onboardingForm">
                    @csrf
                    <!-- Step 1: Legal Details -->
                    <div class="form-step active" data-step="0">
                        <h3 class="step-title">
                            <div class="step-icon"><i class="fas fa-building"></i></div>
                            Legal Details
                        </h3>
                        <p class="step-description">
                            Enter your official registered company details. This information
                            will be verified.
                            <a href="#" class="help-link ms-2">Need help with company details?</a>
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Legal Company Name
                                        <span class="required-asterisk">*</span>
                                        <div class="tooltip">
                                            <i class="fas fa-info-circle tooltip-icon"></i>
                                            <span class="tooltiptext">Enter the exact legal name as registered with
                                                authorities</span>
                                        </div>
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="legal_company_name" 
                                           required 
                                           minlength="2" 
                                           maxlength="100" 
                                           value="{{ $company?->name ?? '' }}" 
                                           placeholder="e.g., ABC Transport Limited" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Trading Name
                                        <div class="tooltip">
                                            <i class="fas fa-info-circle tooltip-icon"></i>
                                            <span class="tooltiptext">The name you trade under (if different from legal
                                                name)</span>
                                        </div>
                                    </label>
                                    <input type="text" class="form-control" name="trading_name" value="{{ $company?->trading_name ?? '' }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        Registration Number
                                        <span class="required-asterisk">*</span>
                                        <div class="tooltip">
                                            <i class="fas fa-info-circle tooltip-icon"></i>
                                            <span class="tooltiptext">Your company registration number (e.g., Companies
                                                House number for UK)</span>
                                        </div>
                                    </label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="registration_number" 
                                           required 
                                           minlength="6" 
                                           maxlength="12" 
                                           pattern="[A-Za-z0-9]+" 
                                           value="{{ $company?->registration_no ?? '' }}" 
                                           placeholder="e.g., 12345678" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        Jurisdiction <span class="required-asterisk">*</span>
                                    </label>
                                    <select id="country" name="jurisdiction"
                                        class="form-control select2 @error('jurisdiction') is-invalid @enderror">

                                        <option value="">Select Jurisdiction</option>

                                        @foreach (collect($countries)->sortBy('name') as $country)
                                            <option value="{{ $country['id'] }}"
                                                data-dialcode="{{ $country['dial_code'] }}"
                                                data-min="{{ $country['dial_min_length'] }}"
                                                data-max="{{ $country['dial_max_length'] }}"
                                                data-iso="{{ $country['code'] }}"
                                                {{ old('country') == $country['id'] ? 'selected' : '' }}>
                                                {{ $country['name'] }} ({{ $country['dial_code'] }})
                                            </option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="form-label">
                                        Incorporation Date
                                        <span class="required-asterisk">*</span>
                                    </label>
                                    <input type="date" class="form-control" name="incorporation_date" required value="{{ $company?->incorporation_date ?? '' }}" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Company Type <span class="required-asterisk">*</span>
                                    </label>
                                    <select class="form-select" name="company_type" required>
                                        <option value="">Select type</option>
                                        <option value="ltd" {{ ($company?->company_type ?? '') == 'ltd' ? 'selected' : '' }}>Limited Company (Ltd)</option>
                                        <option value="llc" {{ ($company?->company_type ?? '') == 'llc' ? 'selected' : '' }}>
                                            Limited Liability Company (LLC)
                                        </option>
                                        <option value="plc" {{ ($company?->company_type ?? '') == 'plc' ? 'selected' : '' }}>Public Limited Company (PLC)</option>
                                        <option value="sole_trader" {{ ($company?->company_type ?? '') == 'sole_trader' ? 'selected' : '' }}>Sole Trader</option>
                                        <option value="franchise" {{ ($company?->company_type ?? '') == 'franchise' ? 'selected' : '' }}>Franchise</option>
                                        <option value="operator_chauffeur" {{ ($company?->company_type ?? '') == 'operator_chauffeur' ? 'selected' : '' }}>
                                            Operator/Chauffeur-only
                                        </option>
                                        <option value="other" {{ ($company?->company_type ?? '') == 'other' ? 'selected' : '' }}>Other</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Business Email <span class="required-asterisk">*</span>
                                    </label>
                                    <input type="email" 
                                           class="form-control" 
                                           name="business_email" 
                                           required 
                                           maxlength="255" 
                                           value="{{ $company?->business_email ?? '' }}" 
                                           placeholder="info@yourcompany.com" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 2: Contacts -->
                    <div class="form-step" data-step="1">
                        <h3 class="step-title">
                            <div class="step-icon"><i class="fas fa-users"></i></div>
                            Contact Information
                        </h3>
                        <p class="step-description">
                            Set up your key contacts. We need a finance contact for
                            invoicing & payouts.
                            <a href="#" class="help-link ms-2">Contact setup guide</a>
                        </p>

                        <div class="contact-section">
                            <h6><i class="fas fa-user-tie"></i> Primary Contact</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Full Name
                                            <span class="required-asterisk">*</span></label>
                                        <input type="text" 
                                               class="form-control" 
                                               name="primary_contact_name"
                                               required 
                                               minlength="2" 
                                               maxlength="50" 
                                               pattern="[A-Za-z\s]+" 
                                               value="{{ $company?->contact_name ?? '' }}" 
                                               placeholder="John Smith" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email <span
                                                class="required-asterisk">*</span></label>
                                        <input type="email" class="form-control" name="primary_contact_email"
                                            required value="{{ $company?->contact_email ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone <span
                                                class="required-asterisk">*</span></label>
                                        <input type="tel" 
                                               class="form-control" 
                                               name="primary_contact_phone"
                                               required 
                                               pattern="\+?[1-9]\d{9,14}" 
                                               value="{{ $company?->contact_phone ?? '' }}" 
                                               placeholder="+44 20 7946 0958" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contact-section">
                            <h6><i class="fas fa-calculator"></i> Finance Contact</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Full Name
                                            <span class="required-asterisk">*</span></label>
                                        <input type="text" class="form-control" name="finance_contact_name"
                                            required value="{{ $company?->finance_contact_name ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email <span
                                                class="required-asterisk">*</span></label>
                                        <input type="email" class="form-control" name="finance_contact_email"
                                            required value="{{ $company?->finance_contact_email ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone <span
                                                class="required-asterisk">*</span></label>
                                        <input type="tel" class="form-control" name="finance_contact_phone"
                                            required value="{{ $company?->finance_contact_phone ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="contact-section">
                            <h6>
                                <i class="fas fa-headset"></i> Support Contact (Optional)
                            </h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="support_contact_name" value="{{ $company?->support_contact_name ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Email</label>
                                        <input type="email" class="form-control" name="support_contact_email" value="{{ $company?->support_contact_email ?? '' }}" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone</label>
                                        <input type="tel" class="form-control" name="support_contact_phone" value="{{ $company?->support_contact_phone ?? '' }}" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 3: Address -->
                    <div class="form-step" data-step="2">
                        <h3 class="step-title">
                            <div class="step-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            Company Address
                        </h3>
                        <p class="step-description">
                            Enter the headquarters location; branches can be added later.
                            <a href="#" class="help-link ms-2">Address requirements guide</a>
                        </p>

                        <div class="form-group">
                            <label class="form-label">
                                Headquarters Address <span class="required-asterisk">*</span>
                            </label>
                            <textarea class="form-control" 
                                      name="hq_address" 
                                      rows="3" 
                                      required
                                      minlength="10" 
                                      maxlength="500" 
                                      placeholder="Enter your complete business address including street, city, and country">{{ $company?->address ?? '' }}</textarea>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Postcode <span
                                            class="required-asterisk">*</span></label>
                                    <input type="text" 
                                           class="form-control" 
                                           name="postcode" 
                                           required 
                                           minlength="3" 
                                           maxlength="10" 
                                           pattern="[A-Za-z0-9\s\-]+" 
                                           value="{{ $company?->postal_code ?? '' }}" 
                                           placeholder="SW1A 1AA" />
                                </div>
                            </div>
                            
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Timezone <span
                                            class="required-asterisk">*</span></label>
                                    <select class="form-select" name="timezone" required>
                                        <option value="">Select timezone</option>
                                        <option value="GMT" {{ ($company?->timezone ?? '') == 'GMT' ? 'selected' : '' }}>GMT (London)</option>
                                        <option value="CET" {{ ($company?->timezone ?? '') == 'CET' ? 'selected' : '' }}>CET (Berlin, Paris)</option>
                                        <option value="EET" {{ ($company?->timezone ?? '') == 'EET' ? 'selected' : '' }}>EET (Helsinki)</option>
                                        <option value="IST" {{ ($company?->timezone ?? '') == 'IST' ? 'selected' : '' }}>IST (Dublin)</option>
                                        <option value="EST" {{ ($company?->timezone ?? '') == 'EST' ? 'selected' : '' }}>EST (New York)</option>
                                        <option value="PST" {{ ($company?->timezone ?? '') == 'PST' ? 'selected' : '' }}>PST (Los Angeles)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="form-label">Operating License</label>
                                    <input type="text" class="form-control" name="operating_license"
                                        placeholder="PHV/Taxi license number" value="{{ $company?->operating_license ?? '' }}" />
                                </div>
                            </div>
                        </div>

                        <!-- Branches Section -->
                        <div class="optional-toggle">
                            <div class="toggle-switch" id="branchesToggle">
                                <div class="toggle-slider"></div>
                            </div>
                            <div>
                                <strong>Add Branch Locations</strong>
                                <div class="text-muted small">
                                    You can add multiple branch offices or operating locations
                                </div>
                            </div>
                        </div>

                        <div id="branchesSection" style="display: none">
                            <div id="branchContainer">
                                <!-- Branches will be dynamically added here -->
                            </div>
                            <button type="button" class="btn btn-outline-secondary" id="addBranchBtn">
                                <i class="fas fa-plus me-2"></i>Add Branch
                            </button>
                        </div>
                    </div>

                    <!-- Step 4: Finance -->
                    <div class="form-step" data-step="3">
                        <h3 class="step-title">
                            <div class="step-icon"><i class="fas fa-credit-card"></i></div>
                            Financial Information
                        </h3>
                        <p class="step-description">
                            Enter tax details; if you are not VAT-registered, select "None".
                            <a href="#" class="help-link ms-2">Tax setup guide</a>
                        </p>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Preferred Currency
                                        <span class="required-asterisk">*</span>
                                    </label>
                                    <select class="form-select" name="currency" id="currencyy" required>
                                        <option value="">Select currency</option>
                                        <option value="GBP" {{ ($financeInfo?->preferred_currency ?? '') == 'GBP' ? 'selected' : '' }}>GBP (£) - British Pound</option>
                                        <option value="EUR" {{ ($financeInfo?->preferred_currency ?? '') == 'EUR' ? 'selected' : '' }}>EUR (€) - Euro</option>
                                        <option value="USD" {{ ($financeInfo?->preferred_currency ?? '') == 'USD' ? 'selected' : '' }}>USD ($) - US Dollar</option>
                                        <option value="CAD" {{ ($financeInfo?->preferred_currency ?? '') == 'CAD' ? 'selected' : '' }}>CAD - Canadian Dollar</option>
                                        <option value="AUD" {{ ($financeInfo?->preferred_currency ?? '') == 'AUD' ? 'selected' : '' }}>AUD - Australian Dollar</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Tax Profile <span class="required-asterisk">*</span>
                                        <div class="tooltip">
                                            <i class="fas fa-info-circle tooltip-icon"></i>
                                            <span class="tooltiptext">Select your applicable tax system</span>
                                        </div>
                                    </label>
                                    <select class="form-select" name="tax_profile" required>
                                        <option value="">Select tax type</option>
                                        <option value="VAT" {{ ($financeInfo?->tax_profile ?? '') == 'VAT' ? 'selected' : '' }}>VAT (Value Added Tax)</option>
                                        <option value="GST" {{ ($financeInfo?->tax_profile ?? '') == 'GST' ? 'selected' : '' }}>GST (Goods & Services Tax)</option>
                                        <option value="SalesTax" {{ ($financeInfo?->tax_profile ?? '') == 'SalesTax' ? 'selected' : '' }}>Sales Tax</option>
                                        <option value="None" {{ ($financeInfo?->tax_profile ?? '') == 'None' ? 'selected' : '' }}>None (Not registered)</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        TAX/VAT ID
                                        <div class="tooltip">
                                            <i class="fas fa-info-circle tooltip-icon"></i>
                                            <span class="tooltiptext">Enter your tax registration number if
                                                applicable</span>
                                        </div>
                                    </label>
                                    <input type="text" class="form-control" name="tax_id"
                                        placeholder="e.g., GB123456789" value="{{ $financeInfo?->tax_id ?? '' }}" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="form-label">
                                        Reverse Charge Rules Apply
                                        <div class="tooltip">
                                            <i class="fas fa-info-circle tooltip-icon"></i>
                                            <span class="tooltiptext">Check if reverse charge VAT rules apply to your
                                                business</span>
                                        </div>
                                    </label>
                                    <select class="form-select" name="reverse_charge">
                                        <option value="no" {{ ($financeInfo?->reverse_charge ?? false) ? '' : 'selected' }}>No</option>
                                        <option value="yes" {{ ($financeInfo?->reverse_charge ?? false) === true ? 'selected' : '' }}>Yes</option>
                                        <option value="partial" {{ ($financeInfo?->reverse_charge ?? '') === 'partial' ? 'selected' : '' }}>Partial</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="contact-section">
                            <h6><i class="fas fa-university"></i> Payout Account</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label">Account Type</label>
                                        <select class="form-select" name="payout_type">
                                            <option value="">Select account type</option>
                                            <option value="bank" {{ ($financeInfo?->payout_type ?? '') == 'bank' ? 'selected' : '' }}>Bank Account</option>
                                            <option value="wallet" {{ ($financeInfo?->payout_type ?? '') == 'wallet' ? 'selected' : '' }}>Digital Wallet</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label"> IBAN/Account Number </label>
                                        <input type="text" class="form-control" name="iban"
                                            placeholder="GB29 NWBK 6016 1331 9268 19" value="{{ $financeInfo?->iban ?? '' }}" />
                                    </div>
                                </div>
                            </div>

                            <!-- Conditional GBP fields -->
                            <div id="gbpFields" style="display: none">
                                <div class="row mt-3">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Account Title</label>
                                            <input type="text" class="form-control" name="account_title"
                                                placeholder="Account Holder Name" value="{{ $financeInfo?->account_title ?? '' }}" />
                                        </div>
                                    </div>
                                    {{-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">Account Number</label>
                                            <input type="text" class="form-control" name="account_number"
                                                placeholder="12345678" />
                                        </div>
                                    </div> --}}
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="form-label">SORT Code</label>
                                            <input type="text" class="form-control" name="sort_code"
                                                placeholder="12-34-56" value="{{ $financeInfo?->sort_code ?? '' }}" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Step 5: Chauffeurs -->
                    <div class="form-step" data-step="4">
                        <h3 class="step-title">
                            <div class="step-icon"><i class="fas fa-user-check"></i></div>
                            Chauffeurs (Optional)
                        </h3>
                        <p class="step-description">
                            Skip this if you do not operate with chauffeurs. You can add
                            them later from your dashboard.
                            <a href="#" class="help-link ms-2">Chauffeur requirements guide</a>
                        </p>

                        <div class="optional-toggle">
                            <div class="toggle-switch" id="chauffeursToggle">
                                <div class="toggle-slider"></div>
                            </div>
                            <div>
                                <strong>Add Chauffeurs Now</strong>
                                <div class="text-muted small">
                                    You can upload a list or add them individually
                                </div>
                            </div>
                        </div>

                        <div id="chauffeursSection" style="display: none">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="upload-area" id="csvUploadArea">
                                        <i class="fas fa-file-csv"></i>
                                        <h6>Upload CSV File</h6>
                                        <p class="text-muted mb-3">
                                            Upload a CSV with your chauffeur details
                                        </p>
                                        <input type="file" id="csvFile" accept=".csv,.txt" style="display: none" onchange="handleCsvUpload(this)" />
                                        <button type="button" class="btn btn-outline-secondary"
                                            onclick="document.getElementById('csvFile').click()">
                                            Choose File
                                        </button>
                                        <div class="mt-2">
                                            <a href="{{ route('admin.onboarding.chauffeurs.template') }}" class="help-link">Download CSV template</a>
                                        </div>
                                        <div id="csvStatus" class="mt-2" style="display: none;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="upload-area" id="manualAddArea">
                                        <i class="fas fa-user-plus"></i>
                                        <h6>Add Manually</h6>
                                        <p class="text-muted mb-3">
                                            Enter chauffeur details one by one
                                        </p>
                                        <button type="button" class="btn btn-outline-secondary"
                                            id="addChauffeurBtn">
                                            Add Chauffeur
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="chauffeurContainer">
                                <!-- Chauffeurs will be dynamically added here -->
                            </div>
                        </div>
                    </div>

                    <!-- Step 6: Review -->
                    <!-- Step 6: Review -->
                    <div class="form-step" data-step="5">
                        <h3 class="step-title">
                            <div class="step-icon"><i class="fas fa-check-circle"></i></div>
                            Review & Submit
                        </h3>
                        <p class="step-description">
                            Please review all information before submitting your application.
                        </p>

                        <div id="reviewContent"></div>

                        <div class="gdpr-checkbox mt-3">
                            <input type="checkbox" id="gdpr_consent" name="gdpr_consent" required />
                            <label for="gdpr_consent" class="gdpr-text">
                                <strong>GDPR Consent & Terms Agreement</strong><br />
                                I consent to the processing of my personal data in accordance
                                with Ani Motors' Privacy Policy. I also agree to the
                                <a href="{{ url('/terms')}}" class="help-link">Terms & Conditions</a> and
                                <a href="#" class="help-link">Partner Agreement</a>.
                            </label>
                        </div>
                    </div>


                    <!-- Step 7: Success -->
                    <div class="form-step" data-step="6">
                        <div class="success-container">
                            <div class="success-icon">
                                <i class="fas fa-check"></i>
                            </div>
                            <h3 class="step-title">Registration Complete!</h3>
                            <p class="step-description">
                                Thank you for registering with Ani Motors. Your partner
                                application has been submitted successfully and is currently
                                under review.
                            </p>
                            <div class="alert alert-info">
                                <div class="row text-start">
                                    <div class="col-md-6">
                                        <strong>Status:</strong> Pending Review<br />
                                        {{-- <strong>Reference ID:</strong>
                                        <span id="referenceId"></span><br /> --}}
                                        <strong>Submitted:</strong>
                                        <span id="submissionTime"></span>
                                    </div>
                                    <div class="col-md-6">
                                        <strong>Review Time:</strong> 2-3 business days<br />
                                        <strong>Next Steps:</strong> Email confirmation sent<br />
                                        <strong>Support:</strong> partners@animotors.com
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary me-3"
                                    onclick="window.location='/admin/dashboard'">
                                    <i class="fas fa-tachometer-alt me-2"></i>Go to Dashboard
                                </button>
                                {{-- <button type="button" class="btn btn-outline-secondary"
                                    onclick="window.location.reload()">
                                    Register Another Company
                                </button> --}}
                            </div>
                        </div>
                    </div>

                    <div class="btn-navigation">
                        <button type="button" id="prevBtn" class="btn btn-outline-secondary"
                            style="display: none">
                            <i class="fas fa-arrow-left me-2"></i>Previous
                        </button>
                        <div class="btn-group">
                            <button type="button" id="saveDraftBtn" class="btn btn-outline-secondary">
                                <i class="fas fa-save"></i>Save Draft
                            </button>
                            <button type="button" id="nextBtn" class="btn btn-primary">
                                Next<i class="fas fa-arrow-right ms-2"></i>
                            </button>
                            <button type="submit" id="submitBtn" class="btn btn-primary" style="display: none">
                                <i class="fas fa-check me-2"></i>Submit Application
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script>
        // Pass saved data to JavaScript
        window.savedData = {
            currentStep: {{ auth()->user()->onboarding_step ?? 0 }},
            branches: @json($branches ?? []),
            chauffeurs: @json($chauffeurs ?? [])
        };

        document.querySelectorAll('#currencyy').forEach((input) => {
        input.addEventListener("change", (e) => {
            const isGBP = e.target.value === "GBP";
            document.getElementById("gbpFields").style.display = isGBP
                ? "block"
                : "none";
        });
    });
    </script>

    <script src="{{ asset('admin/assets/js/onboarding.js') }}"></script>
</body>

</html>
