@extends('frontpage.layout')

@section('style')
    <style>
        .tag-badge {
            font-size: 12px;
            background: #eef2ff;
            color: #3b5bdb;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .section-title {
            font-weight: 600;
            font-size: 15px;
            color: #444;
        }

        .icon-small {
            font-size: 14px;
            color: #6c757d;
        }

        .price-box {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 20px;
        }

        .summary-card {
            border-radius: 14px;
        }

        .label-line {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <div class="container py-4">

        <!-- Back -->
        <a href="javascript:void(0)" onclick="redirectBack()" class="text-decoration-none mb-3 d-flex align-items-center">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>

        <div class="row g-4">

            <!-- Left Column -->
            <div class="col-lg-8">

                <div class="alert alert-primary d-flex align-items-center">
                    <i class="fas fa-taxi me-2"></i>
                    <strong>Private Hire Vehicle</strong> - {{ ucwords(str_replace('_', ' ', $query['hire_option'])) }} Hire
                    for licensed drivers
                </div>

                <div class="card p-4 summary-card">
                    <h4 class="mb-4">Your Booking Summary</h4>

                    <!-- Car Section -->
                    <div class="d-flex mb-3">
                        <img src="{{ $car->image }}" class="rounded me-3" width="180">
                        <div>
                            <h5 class="mb-1">{{ $car->name }}</h5>
                            <small class="text-muted">{{ $car->year }} • {{ $car->model }}</small>
                            <div class="tag-badge mt-2">Private Hire</div>

                            <div class="mt-2 d-flex align-items-center text-muted small">
                                <i class="fas fa-star text-warning me-1"></i> 4.5 (123 reviews)
                            </div>

                            <div class="d-flex mt-2 small text-muted">
                                <div class="me-3"><i class="fas fa-users"></i> {{ $car->seats }} seats</div>
                                <div class="me-3"><i class="fas fa-cog"></i> {{ $car->gear }}</div>
                                <div><i class="fas fa-gas-pump"></i> {{ $car->fuel_type }}</div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row text-center text-md-start">
                        <div class="col-md-6 mb-3">
                            <div class="section-title">Start Date</div>
                            <strong>{{ $query['start_date']->format('M d, Y') }}</strong>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="section-title">End Date</div>
                            <strong>{{ $query['end_date']->format('M d, Y') }}</strong>
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Hire Details:</h6>

                    <div class="p-3 rounded" style="background: #f1f3f5;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="label-line">Hire Type:</div>
                                <strong>{{ ucwords(str_replace('_', ' ', $query['hire_option'])) }}</strong>

                                <div class="label-line mt-3">Insurance:</div>
                                <strong>
                                    @if ($query['hire_option'] == 'rent_to_buy')
                                        {{ $car->rent_to_buy_insurance_included ? 'Included' : 'Not Included' }}
                                    @elseif($query['insurance'] == 'w')
                                        Included
                                    @elseif($query['insurance'] == 'wo')
                                        Not included
                                    @endif
                                </strong>

                                <div class="label-line mt-3">Deposit:</div>
                                <strong>{{ amt($deposit) }}</strong>
                            </div>

                            <div class="col-md-6">
                                <div class="label-line">Period:</div>
                                <strong>{{ $query['term'] }} {{ $period }}(s)</strong>

                                <div class="label-line mt-3">Maintenance:</div>
                                <strong>
                                    @if ($query['hire_option'] == 'rent_to_buy')
                                        {{ $car->rent_to_buy_maintenance_included ? 'Included' : 'Not Included' }}
                                    @elseif(
                                        $query['hire_option'] == 'long_term' &&
                                            isset($query['term']) &&
                                            isset($car->long_term_prices[$query['term']]['maintenance_included']))
                                        {{ $car->long_term_prices[$query['term']]['maintenance_included'] ? 'Included' : 'Not Included' }}
                                    @elseif($query['hire_option'] == 'short_term' && isset($car->short_term_maintenance_included))
                                        {{ $car->short_term_maintenance_included ? 'Included' : 'Not Included' }}
                                    @endif
                                </strong>

                                <div class="label-line mt-3">Excess:</div>
                                <strong>{{ amt($excess) }}</strong>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4">Included with your hire:</h6>
                    <ul class="list-unstyled small mt-2">
                        <li><i class="fas fa-check-circle text-success me-2"></i> PHC Licensing Compliance</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Mileage Allowance</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Roadside Assistance</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Flexible Terms</li>
                    </ul>

                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">

                <div class="price-box bg-white">

                    <h5 class="mb-3">Price Breakdown</h5>

                    <div class="d-flex justify-content-between small mb-2">
                        <span>Deposit</span>
                        <strong>{{ amt($deposit) }}</strong>
                    </div>
                    <div class="d-flex justify-content-between small mb-2">
                        <span>{{ ucwords(str_replace('_', ' ', $query['hire_option'])) }} Hire - {{ $query['term'] }}
                            {{ $period }}(s) @ {{ amt($rate) }}/{{ $cycle }}</span>
                        <strong>{{ amt($rate * $term) }}</strong>
                    </div>

                    <div class="d-flex justify-content-between small mb-2">
                        <span>Taxes & Fees</span>
                        <strong>Included</strong>
                    </div>

                    @if(isset($query['extras']))
                        <div class="d-flex justify-content-between small mb-2">
                            <span>Extras</span>
                            <strong>{{ amt($extrasPrice) }}</strong>
                        </div>
                    @endif

                    <hr>

                    <div class="d-flex justify-content-between">
                        <h5>Total</h5>
                        <h5>{{ amt($rate * $term + $deposit + $extrasPrice) }}</h5>
                    </div>

                    <div class="alert alert-warning small mt-2">
                        Plus {{ amt($deposit) }} refundable deposit due at collection
                    </div>

                    @auth
                        <h6 class="mt-4">Payment Details</h6>

                        <div id="stripe-container">

                        </div>

                        <div class="small mt-2 text-muted">
                            <i class="fas fa-lock me-1"></i>
                            Your payment is secured with 256-bit SSL encryption
                        </div>

                        <button class="btn btn-primary btn-lg w-100 mt-3" onclick="checkout(this)">
                            <span id="payButtonText">Proceed to Pay</span>
                            <div id="paySpinner" class="spinner-border spinner-border-sm d-none" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>

                        <p class="small text-muted mt-2">
                            By clicking "Proceed and Pay", you agree to the {{ config('app.name') }} Terms of Service, Privacy Policy, and the
                            cancellation policy shown above.
                        </p>
                    @else
                        <button class="btn btn-primary btn-lg w-100 mt-3" data-bs-toggle="modal" data-bs-target="#loginModal">
                            @lang('Authenticate to Pay')
                        </button>
                    @endauth
                </div>
            </div>
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

    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        .swal2-container.swal2-center.swal2-backdrop-show {
            z-index: 9999;
        }

        #stripe-container {
            border: 1px solid #0d6efd;
            padding: 10px 10px;
            border-radius: 5px;
            margin-top: 20px;
            margin-bottom: 20px;
        }
    </style>

    <script>
        const stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
        const elements = stripe.elements();
        const cardElement = elements.create('card');
        cardElement.mount('#stripe-container');

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

        function checkout(btn) {
            btn.querySelector('#payButtonText').classList.add('d-none');
            btn.querySelector('#paySpinner').classList.remove('d-none');
            btn.disabled = true;

            $.get('{{ route('address.get') }}')
                .done(function(billingAddressData) {
                    stripe.createToken(cardElement, {
                        name: billingAddressData.name,
                        address_line1: billingAddressData.address,
                        address_city: billingAddressData.city,
                        address_zip: billingAddressData.zip,
                        address_country: billingAddressData.country
                    }).then(function(result) {
                        if (result.error) {
                            btn.querySelector('#payButtonText').classList.remove('d-none');
                            btn.querySelector('#paySpinner').classList.add('d-none');
                            btn.disabled = false;

                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: result.error.message,
                                showConfirmButton: true
                            });
                        } else {
                            $.ajax({
                                url: '{!! url()->full() !!}',
                                type: 'POST',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    payment_token: result.token.id,
                                },
                                success: function(response) {
                                    if (response.status) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Success!',
                                            text: response.message,
                                            showConfirmButton: true
                                        }).then(function() {
                                            window.location.href = response.redirect_url;
                                        });
                                    } else {
                                        btn.querySelector('#payButtonText').classList.remove(
                                            'd-none');
                                        btn.querySelector('#paySpinner').classList.add(
                                            'd-none');
                                        btn.disabled = false;

                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Error',
                                            text: response.message,
                                            showConfirmButton: true
                                        });
                                    }
                                },
                                error: function(xhr, status, error) {
                                    console.log(error);
                                }
                            });
                        }
                    });
                });
        }

        function redirectBack() {
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                @if ($key != 'extras')
                    params.append('{{ $key }}', '{{ $value }}');
                @endif
            @endforeach

            const url = '{{ route('private_hire_extras', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endsection
