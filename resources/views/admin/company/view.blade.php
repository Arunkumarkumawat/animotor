@extends('admin.layout.app')
@section('content')

    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview wide-md- mx-auto">

                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-between g-3">
                                <div class="nk-block-head-content">
                                    <h4 class="title nk-block-title">View company</h4>
                                </div>

                                <div class="nk-block-head-content">
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em class="icon ni ni-arrow-left"></em><span>Back</span></a>
                                    <a href="{{ route('admin.companies.index') }}" class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em class="icon ni ni-arrow-left"></em></a>
                                </div>
                            </div>

                            <div class="row g-gs">

                                <div class="col-lg-12">
                                    <div class="card card-bordered h-100">
                                        <div class="card-inner">
                                            <!-- Legal Details Section -->
                                            <h5 class="mb-3"><i class="fas fa-building"></i> Legal Details</h5>
                                            <div class="row gy-4">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->name ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Trading Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->trading_name ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Registration Number</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->registration_no ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Jurisdiction</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->country ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Incorporation Date</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->incorporation_date ? \Carbon\Carbon::parse($company->incorporation_date)->format('d M Y') : 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Company Type</label>
                                                        <div class="form-control-wrap">
                                                            {{ ucfirst(str_replace('_', ' ', $company->company_type ?? 'N/A')) }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Business Email</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->business_email ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            <span class="badge badge-{{ $user->status == 'active' ? 'success' : 'warning' }}">{{ ucfirst($user->status) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <!-- Contacts Section -->
                                            <h5 class="mb-3"><i class="fas fa-users"></i> Contacts</h5>
                                            <div class="row gy-2">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Primary Contact Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->contact_name ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Primary Contact Email</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->contact_email ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Primary Contact Phone</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->contact_phone ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Finance Contact Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->finance_contact_name ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Finance Contact Email</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->finance_contact_email ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Finance Contact Phone</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->finance_contact_phone ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Support Contact Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->support_contact_name ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Support Contact Email</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->support_contact_email ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Support Contact Phone</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->support_contact_phone ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <!-- Address Section -->
                                            <h5 class="mb-3"><i class="fas fa-map-marker-alt"></i> Address & Location</h5>
                                            <div class="row gy-2">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="form-label">Headquarters Address</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->address ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Postal Code</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->postal_code ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Timezone</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->timezone ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Operating License</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->operating_license ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr/>
                                            <!-- Finance Section -->
                                            <h5 class="mb-3"><i class="fas fa-credit-card"></i> Finance Information</h5>
                                            <div class="row gy-2">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Currency</label>
                                                        <div class="form-control-wrap">
                                                            {{ $financeInfo->preferred_currency ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Tax Profile</label>
                                                        <div class="form-control-wrap">
                                                            {{ $financeInfo->tax_profile ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Tax ID</label>
                                                        <div class="form-control-wrap">
                                                            {{ $financeInfo->tax_id ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Payout Type</label>
                                                        <div class="form-control-wrap">
                                                            {{ ucfirst($financeInfo->payout_type ?? 'N/A') }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">IBAN</label>
                                                        <div class="form-control-wrap">
                                                            {{ $financeInfo->iban ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Account Title</label>
                                                        <div class="form-control-wrap">
                                                            {{ $financeInfo->account_title ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <hr/>
                                            <!-- Owner Login Info -->
                                            <h5 class="mb-3"><i class="fas fa-user-tie"></i> Owner Information</h5>
                                            <div class="row gy-2">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Owner Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $user->first_name }} {{ $user->last_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Owner Email</label>
                                                        <div class="form-control-wrap">
                                                            {{ $user->email }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Owner Phone</label>
                                                        <div class="form-control-wrap">
                                                            {{ $user->phone ?? 'N/A' }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Onboarding Step</label>
                                                        <div class="form-control-wrap">
                                                            <span class="badge bg-{{ $user->onboarding_step == 7 ? 'success' : 'warning' }}">Step {{ $user->onboarding_step ?? 1 }} of 7</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Onboarding Status</label>
                                                        <div class="form-control-wrap">
                                                            <span class="badge bg-{{ $user->onboarding_status == 'approved' ? 'success' : 'warning' }}">{{ ucfirst($user->onboarding_status) }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            @if($branches->count() > 0)
                                            <hr/>
                                            <!-- Branches Section -->
                                            <h5 class="mb-3"><i class="fas fa-building"></i> Branches ({{ $branches->count() }})</h5>
                                            <div class="row">
                                                @foreach($branches as $branch)
                                                <div class="col-md-6 mb-3">
                                                    <div class="card border">
                                                        <div class="card-body">
                                                            <h6 class="card-title">{{ $branch->branch_name }}</h6>
                                                            <p class="card-text small">
                                                                <strong>Address:</strong> {{ $branch->branch_address ?? 'N/A' }}<br>
                                                                <strong>Postcode:</strong> {{ $branch->branch_postcode ?? 'N/A' }}<br>
                                                                <strong>Phone:</strong> {{ $branch->branch_phone ?? 'N/A' }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                            
                                            @if($chauffeurs->count() > 0)
                                            <hr/>
                                            <!-- Chauffeurs Section -->
                                            <h5 class="mb-3"><i class="fas fa-user-check"></i> Chauffeurs ({{ $chauffeurs->count() }})</h5>
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Email</th>
                                                            <th>Phone</th>
                                                            <th>License</th>
                                                            {{-- <th>Status</th> --}}
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($chauffeurs as $chauffeur)
                                                        <tr>
                                                            <td>{{ $chauffeur->first_name }} {{ $chauffeur->last_name }}</td>
                                                            <td>{{ $chauffeur->email }}</td>
                                                            <td>{{ $chauffeur->phone ?? 'N/A' }}</td>
                                                            <td>{{ $chauffeur->license_number ?? 'N/A' }}</td>
                                                            {{-- <td><span class="badge badge-{{ $chauffeur->status == 'active' ? 'success' : 'warning' }}">{{ ucfirst($chauffeur->status) }}</span></td> --}}
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- .nk-block -->
                    </div><!-- .components-preview -->
                </div>
            </div>
        </div>
    </div>

@endsection
