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
                                            <div class="row gy-4">
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label class="form-label">Address</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->address }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Country</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->country }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">State</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->state }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">City</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->city }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Postal code</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->postal_code }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Tax Identification Number</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->tin }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Status</label>
                                                        <div class="form-control-wrap">
                                                            {{ $user->status }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row gy-2">
                                                <h6>Contact person</h6>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Contact Name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->contact_name }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Contact Email</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->contact_email }}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Contact Phone</label>
                                                        <div class="form-control-wrap">
                                                            {{ $company->contact_phone }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr/>
                                            <div class="row gy-2">
                                                <h6>Owner Login Info</h6>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label class="form-label">Owner name</label>
                                                        <div class="form-control-wrap">
                                                            {{ $user->first_name }}
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
                                                            {{ $user->phone }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
