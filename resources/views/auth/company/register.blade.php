@extends('layouts.app')

@section('page_title', 'Company Signup')

@section('content')
    <style>
        .toggle-password {
            position: absolute;
            top: 50%;
            right: 12px;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
        }

        .toggle-password i {
            font-size: 16px;
        }
    </style>
    @if (!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif

    <section class="signup__section bluar__shape___">
        <div class="container">
            <div class="row align-items-center justify-content-between">

                <div class="col-xl-7 col-lg-7">
                    <div class="signup__boxes">

                        <h4>Company Signup - {{ settings('site_name') }}</h4>
                        <p class="head__pra mb__30">Create your company account</p>
                        {{-- @if ($errors->any())
                        
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            
                        @endif --}}

                        <form method="post" action="{{ route('company.store') }}" class="signup__form">
                            @csrf

                            <div class="row g-4">

                                <!-- Full Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Full Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Company Name -->
                                <div class="col-md-6">
                                    <label class="form-label">Company Name</label>
                                    <input type="text" name="company_name" value="{{ old('company_name') }}"
                                        class="form-control @error('company_name') is-invalid @enderror">
                                    @error('company_name')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-6">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Country (Searchable + Sorted) -->
                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <select id="country" name="country"
                                        class="form-control select2 @error('country') is-invalid @enderror">

                                        <option value="">Select Country</option>

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

                                    @error('country')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>
                                


                                <!-- Phone (Auto country code) -->
                                <div class="col-md-6">
                                    <label class="form-label">Phone</label>
                                    <div class="input-group">
                                        <span class="input-group-text" id="phone_code">+44</span>
                                        <input type="text" name="phone" id="phone" value="{{ old('phone') }}"
                                            class="form-control @error('phone') is-invalid @enderror"
                                            placeholder="Phone number">
                                    </div>

                                    @error('phone')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                 <!-- Postal Code -->
                                <div class="col-md-6">
                                    <label class="form-label">Postal Code</label>
                                    <input type="text" name="postal_code" value="{{ old('postal_code') }}"
                                        class="form-control @error('postal_code') is-invalid @enderror">
                                    @error('postal_code')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-md-12">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" value="{{ old('address') }}"
                                        class="form-control @error('address') is-invalid @enderror">
                                    @error('address')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6">
                                    <label class="form-label">Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror" maxlength="20">
                                        <span class="toggle-password" data-target="#password">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                    @error('password')
                                        <strong class="text-danger d-block">{{ $message }}</strong>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6">
                                    <label class="form-label">Confirm Password</label>
                                    <div class="position-relative">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control" maxlength="20">
                                        <span class="toggle-password" data-target="#password_confirmation">
                                            <i class="fa fa-eye"></i>
                                        </span>
                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="col-md-12">
                                    <button type="submit" class="cmn__btn w-100">
                                        <span>Sign Up</span>
                                    </button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>

                <div class="col-xl-5 col-lg-5">
                    <div class="signup__thumb">
                        <img src="/assets/img/signup/signup.png" alt="Signup image">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {

            // Searchable dropdown
            $('.select2').select2({
                placeholder: "Select Country",
                width: '100%'
            });



            $("#country").on("change", function() {

                let selected = $(this).find(":selected");

                let dialCode = selected.data("dialcode") || "+";
                let min = selected.data("min") || 5;
                let max = selected.data("max") || 15;

                // Update prefix
                $("#phone_code").text(dialCode);

                // Apply dynamic phone validation
                $("#phone")
                    .attr("minlength", min)
                    .attr("maxlength", max)
                    .attr("placeholder", `Phone (${min}-${max} digits)`);
            });

            // Password toggle
            $(".toggle-password").on("click", function() {
                const input = $($(this).data("target"));
                const type = input.attr("type") === "password" ? "text" : "password";
                input.attr("type", type);
                $(this).find("i").toggleClass("fa-eye fa-eye-slash");
            });
        });
    </script>



@endsection
