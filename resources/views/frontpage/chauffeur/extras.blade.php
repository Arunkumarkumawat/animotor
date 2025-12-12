@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background-color: #f5f6f8;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-wrapper {
            max-width: 1024px;
            margin: 32px auto 48px;
        }

        /* Top back link */
        .back-link {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 24px;
        }

        .back-link i {
            margin-right: 4px;
            font-size: 0.8rem;
        }

        /* Section headings */
        .section-title {
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 4px;
        }

        .section-subtitle {
            color: #777;
            font-size: 0.95rem;
            margin-bottom: 24px;
        }

        /* Package cards */
        .package-card {
            position: relative;
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            padding: 18px 20px;
            background-color: #fff;
            cursor: pointer;
            transition: all 0.15s ease-in-out;

            /* NEW: make all cards equal height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 140px;
            /* adjust value to taste */
            width: 100%;
        }

        .package-card.active {
            border-color: #f6a619;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
            background-color: #fffaf2;
        }

        .package-radio {
            position: absolute;
            top: 16px;
            right: 16px;
        }

        .package-radio input[type="radio"] {
            opacity: 0;
            position: absolute;
        }

        .package-radio .fake-radio {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #d4d4d4;
            display: inline-block;
            box-sizing: border-box;
            position: relative;
            background-color: #fff;
            transition: border-color 0.15s ease-in-out, background-color 0.15s ease-in-out;
        }

        .package-card.active .package-radio .fake-radio {
            border-color: #f29b05;
            background-color: #f29b05;
        }

        .package-card-icon {
            font-size: 1.2rem;
            margin-right: 8px;
            color: #f29b05;
        }

        .package-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 2px;
        }

        .package-desc {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 0;
        }

        .package-price-label {
            font-size: 0.8rem;
            color: #999;
            margin-top: 12px;
            margin-bottom: 0;
        }

        .package-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #f29b05;
        }

        /* Config sections */
        .config-card {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            background-color: #fff;
            padding: 20px 24px;
        }

        .config-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .config-subtitle {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 12px;
        }

        /* Hourly duration buttons */
        .duration-btn {
            border-radius: 8px;
            border-width: 1px;
            padding: 10px 0;
            font-size: 0.9rem;
            background-color: #fff;
            transition: all 0.15s ease-in-out;
        }

        .duration-btn.active,
        .duration-btn:hover {
            border-color: #f29b05;
            background-color: #fffaf2;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.04);
            color: #333;
        }

        /* Airport transfer info box */
        .airport-info {
            margin-top: 18px;
            border-radius: 8px;
            background-color: #f4f8ff;
            padding: 16px 18px;
            font-size: 0.9rem;
        }

        .airport-info-title {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .airport-info ul {
            padding-left: 18px;
            margin-bottom: 0;
        }

        .airport-info li {
            margin-bottom: 4px;
        }

        /* Continue button */
        .bottom-cta {
            margin-top: 24px;
        }

        .btn-continue {
            width: 100%;
            border-radius: 999px;
            background-image: linear-gradient(90deg, #f29b05, #f5b623);
            border: none;
            font-weight: 600;
            padding: 12px 0;
        }

        .btn-continue:hover {
            filter: brightness(0.96);
        }

        @media (max-width: 767.98px) {
            .page-wrapper {
                margin: 16px auto 32px;
                padding: 0 12px;
            }
        }

        .active p {
            color:unset !important;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="page-wrapper px-3 px-md-0">
        <!-- Back link -->
        <a href="javascript:void(0)" onclick="redirectBack()" class="back-link d-inline-flex align-items-center text-decoration-none">
            <i class="fas fa-chevron-left"></i>
            <span>Back</span>
        </a>

        <!-- Heading -->
        <div class="mb-3">
            <div class="section-title">Select Your Package</div>
            <div class="section-subtitle">Choose the service that best fits your needs</div>
        </div>

        <!-- Package Selection -->
        <div class="row g-3 mb-4">
            <!-- Hourly Hire -->
            <div class="col-md-6">
                <label class="package-card" data-package="hourly" onclick="tripTypeChanged(this.getAttribute('data-package'))">
                    <div class="d-flex align-items-start">
                        <i class="far fa-clock package-card-icon"></i>
                        <div>
                            <div class="package-title">Hourly Hire</div>
                            <p class="package-desc mb-0">Perfect for short trips and meetings</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->hourly_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="hourly">
                    </div>
                </label>
            </div>

            <!-- P2P Hire -->
            <div class="col-md-6">
                <label class="package-card" data-package="p2p" onclick="tripTypeChanged(this.getAttribute('data-package'))">
                    <div class="d-flex align-items-start">
                        <i class="far fa-calendar-alt package-card-icon"></i>
                        <div>
                            <div class="package-title">Point-to-Point Hire</div>
                            <p class="package-desc mb-0">City or local trips</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->p2p_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="p2p">
                    </div>
                </label>
            </div>

            <!-- Airport Transfer -->
            <div class="col-md-6">
                <label class="package-card" data-package="airport" onclick="tripTypeChanged(this.getAttribute('data-package'))">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-plane-departure package-card-icon"></i>
                        <div>
                            <div class="package-title">Airport Transfer</div>
                            <p class="package-desc mb-0">Meet &amp; greet with flight monitoring</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->airport_transfer_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="airport">
                    </div>
                </label>
            </div>

            <!-- Long Distance -->
            <div class="col-md-6">
                <label class="package-card" data-package="long" onclick="tripTypeChanged(this.getAttribute('data-package'))">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-route package-card-icon"></i>
                        <div>
                            <div class="package-title">Long Distance</div>
                            <p class="package-desc mb-0">City-to-city journeys with mileage included</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->long_transfer_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="long">
                    </div>
                </label>
            </div>

            <!-- Event Hire -->
            <div class="col-md-6">
                <label class="package-card" data-package="event" onclick="tripTypeChanged(this.getAttribute('data-package'))">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-glass-cheers package-card-icon"></i>
                        <div>
                            <div class="package-title">Event Hire</div>
                            <p class="package-desc mb-0">Weddings, corporate events, VIP occasions</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->event_hire_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="event">
                    </div>
                </label>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="bottom-cta">
            @auth
                <button type="button" onclick="continueToCheckout()" class="btn btn-continue text-white">
                    Continue to Booking Details
                </button>
            @else
                <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-continue text-white">
                    Authenticate to Continue
                </button>
            @endauth
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                            type="button" role="tab" aria-controls="register" aria-selected="false">Register</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade p-4 show active" id="login" role="tabpanel"
                        aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('last-stage-auth') }}">
                            @csrf
                            <input type="hidden" name="type" value="login">

                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    required>
                            </div>
                            <button type="button" class="btn btn-primary w-100" onclick="login(this)">Login</button>
                        </form>
                    </div>
                    <div class="tab-pane fade p-4" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('last-stage-auth') }}">
                            @csrf
                            <input type="hidden" name="type" value="register">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="First Name"
                                        name="first_name" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                        value="{{ old('last_name') }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone"
                                    value="{{ old('phone') }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        required autocomplete="new-password">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Address" name="address"
                                        value="{{ old('address') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="ZIP Code" name="zip"
                                        value="{{ old('zip') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="City" name="city"
                                        value="{{ old('city') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Country" name="country"
                                        value="{{ old('country') }}" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary w-100" onclick="login(this)">Register</button>
                        </form>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-warning w-100" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('last-stage-auth') }}">
                    @csrf
                    <input type="hidden" name="type" value="verify_otp">
                    <input type="hidden" name="email" id="hidden_email">

                    <div class="modal-header">
                        <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="number" minlength="6" maxlength="6" class="form-control" placeholder="OTP"
                                name="otp" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="login(this)">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-container.swal2-center.swal2-backdrop-show {
            z-index: 9999;
        }
    </style>
    <script>
        function redirectBack(){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.single', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }

        function continueToCheckout(){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            var package = jQuery('[name="package"]:checked').val();
            if (!package) {
                return;
            }

            params.append('package', package);            
            window.location = '{{ route('frontpage.chauffeur.details', $car->id) }}?' + params.toString();
        }

        function login(element) {
            var form = jQuery(element).parents('form').get(0);

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            $.ajax({
                url: form.getAttribute('action'),
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: true
                        });

                        if ('verify' in response) {
                            jQuery('#otpModal').modal('show');
                            jQuery('#hidden_email').val(response.email);

                            jQuery('#loginModal').modal('hide');
                        } else {
                            setTimeout(function() {
                                window.location.reload();
                            }, 2000);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    const errorMessage = xhr.responseJSON?.message || 'An error occurred. Please try again.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                        showConfirmButton: true
                    });
                }
            });
        }

        function tripTypeChanged(val){
            jQuery('.package-card').removeClass('active');
            jQuery('[name="package"]').prop('checked', false);
            jQuery('.package-card[data-package="' + val + '"]').addClass('active');
            jQuery('.package-card[data-package="' + val + '"]').find('input[name="package"]').prop('checked', true);
        }

        tripTypeChanged('{{ isset($query['trip_type']) ? $query['trip_type'] : 'hourly' }}');
    </script>
@endpush
