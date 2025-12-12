@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background-color: #f5f6fa;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-container {
            max-width: 1100px;
        }

        .back-link {
            font-size: 0.9rem;
            color: #6b7280;
            text-decoration: none;
        }

        .back-link i {
            font-size: 0.85rem;
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .section-subtitle {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 2rem;
        }

        .card-shell {
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.03);
        }

        .card-shell .card-header {
            background-color: transparent;
            border-bottom: 0;
            padding: 1.25rem 1.5rem 0.75rem;
        }

        .card-shell .card-body {
            padding: 0.75rem 1.5rem 1.25rem;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #4b5563;
        }

        .form-control {
            border-radius: 8px;
            border-color: #e5e7eb;
            font-size: 0.9rem;
            padding: 0.6rem 0.75rem;
        }

        .form-control:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 .15rem rgba(245, 158, 11, .25);
        }

        /* Payment method pills */
        .method-tabs {
            display: inline-flex;
            padding: 0.3rem;
            border-radius: 999px;
            background-color: #f3f4f6;
            margin-bottom: 1rem;
        }

        .method-pill {
            border-radius: 999px;
            border: none;
            background-color: transparent;
            padding: 0.25rem 0.9rem;
            font-size: 0.85rem;
            font-weight: 500;
            color: #6b7280;
            cursor: pointer;
            transition: all .15s ease;
        }

        .method-pill.active {
            background-color: #fff;
            color: #f59e0b;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .secure-note {
            border-radius: 10px;
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            padding: 0.65rem 0.75rem;
            font-size: 0.85rem;
            color: #6b7280;
            display: flex;
            align-items: center;
        }

        .secure-note i {
            margin-right: 0.5rem;
            color: #9ca3af;
        }

        /* Stripe Elements styling */
        .StripeElement {
            border-radius: 8px;
            border-color: #e5e7eb;
            font-size: 0.9rem;
            padding: 0.6rem 0.75rem;
            background-color: #fff;
            border: 1px solid #e5e7eb;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .StripeElement:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 .15rem rgba(245, 158, 11, .25);
        }

        .StripeElement--invalid {
            border-color: #ef4444;
        }

        /* Booking summary */
        .summary-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-bottom: 0.5rem;
        }

        .summary-label {
            font-size: 0.85rem;
            color: #6b7280;
            margin-bottom: 0.15rem;
        }

        .summary-value {
            font-weight: 600;
        }

        .summary-sub {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .summary-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.9rem;
            margin: 0.3rem 0;
            color: #4b5563;
        }

        .summary-row strong {
            font-weight: 600;
        }

        .btn-pay {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.8rem 1.5rem;
            border-radius: 6px;
            margin-top: 2rem;
        }

        .btn-pay:hover {
            filter: brightness(0.95);
        }

        .btn-pay:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }

        @media (max-width: 991.98px) {
            .card-shell {
                margin-bottom: 1.25rem;
            }
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container page-container py-4">
        <form id="payment-form" method="post">
            @csrf

            <!-- Back -->
            <div class="mb-3">
                <a href="#" class="back-link d-inline-flex align-items-center">
                    <i class="fas fa-chevron-left me-2"></i> Back
                </a>
            </div>

            <!-- Heading -->
            <div class="mb-4">
                <h3 class="section-title">Payment</h3>
                <p class="section-subtitle mb-0">Secure payment for your chauffeur booking</p>
            </div>

            <div class="row g-4">
                <!-- Payment Method -->
                <div class="col-lg-8">
                    <div class="card card-shell">
                        <div class="card-header">
                            <h5 class="mb-0">
                                <i class="far fa-credit-card me-2"></i>Payment Method
                            </h5>
                        </div>
                        <div class="card-body">
                            <!-- Card form -->
                            <div class="mb-3">
                                <label class="form-label">Card Number</label>
                                <div id="card-number-element" class="StripeElement"></div>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Cardholder Name</label>
                                <input type="text" id="cardholder-name" class="form-control" placeholder="John Doe"
                                    required>
                            </div>
                            <div class="row g-3 mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">Expiry Date</label>
                                    <div id="card-expiry-element" class="StripeElement"></div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">CVV</label>
                                    <div id="card-cvc-element" class="StripeElement"></div>
                                </div>
                            </div>

                            <div id="payment-message" class="alert alert-danger d-none" role="alert"></div>

                            <input type="hidden" id="payment-intent-id" name="payment_intent_id">

                            <div class="secure-note mt-2">
                                <i class="fas fa-lock"></i>
                                <span>Your payment information is encrypted and secure</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Booking Summary -->
                <div class="col-lg-4">
                    <div class="card card-shell">
                        <div class="card-body">
                            <div class="summary-title">Booking Summary</div>

                            <div class="summary-label">Vehicle</div>
                            <div class="summary-value">{{ $car->make }} {{ $car->model }}</div>
                            <div class="summary-sub mb-2">{{ $car->year }}</div>

                            <div class="summary-label">Service</div>
                            <div class="summary-value">{{ $booking->trip_type }}</div>

                            @foreach($booking->trip_type_extra as $key => $value)
                                <div class="summary-sub mb-2">{{ $key }}: {{ $value }}</div>
                            @endforeach

                            <div class="summary-label">Pickup</div>
                            <div class="summary-value small">{{ $booking->pickup_location }}</div>
                            <div class="summary-sub mb-2">{{ $booking->pickup_date }} @ {{ $booking->pickup_time }}</div>

                            @if (isset($booking->dropoff_location))
                                <div class="summary-label">Drop-off</div>
                                <div class="summary-value small">{{ $booking->dropoff_location }}</div>
                            @endif

                            <hr class="my-2">

                            <div class="summary-row">
                                <span>Base fare</span>
                                <strong>{{ amt( $booking->trip_amount ) }}</strong>
                            </div>

                            @if (isset($booking->addons))
                                <div class="summary-row">
                                    <span>Addons</span>
                                    <strong>
                                        @foreach($booking->addons as $addon)
                                            {{ $addon['name'] }}: {{ amt($addon['price']) }}<br>
                                        @endforeach
                                    </strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pay button -->
            <button type="button" id="submit-button" class="btn btn-pay w-100" onclick="checkout(this)">
                <span id="button-text">Pay Complete Amount {{ amt($booking->total_amount) }}</span>
                <div id="spinner" class="spinner-border spinner-border-sm d-none" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>
        </form>
    </div>
@endsection

@push('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Initialize Stripe with your publishable key
        const stripe = Stripe('{{ env('STRIPE_PUBLIC_KEY') }}');
        const elements = stripe.elements();

        // Create Stripe Elements
        const cardNumberElement = elements.create('cardNumber', {
            style: {
                base: {
                    fontSize: '0.9rem',
                    color: '#4b5563',
                    '::placeholder': {
                        color: '#9ca3af',
                    },
                },
                invalid: {
                    color: '#ef4444',
                },
            },
            placeholder: '1234 5678 9012 3456',
        });

        const cardExpiryElement = elements.create('cardExpiry', {
            style: {
                base: {
                    fontSize: '0.9rem',
                    color: '#4b5563',
                    '::placeholder': {
                        color: '#9ca3af',
                    },
                },
                invalid: {
                    color: '#ef4444',
                },
            },
        });

        const cardCvcElement = elements.create('cardCvc', {
            style: {
                base: {
                    fontSize: '0.9rem',
                    color: '#4b5563',
                    '::placeholder': {
                        color: '#9ca3af',
                    },
                },
                invalid: {
                    color: '#ef4444',
                },
            },
            placeholder: '123',
        });

        // Mount Stripe Elements
        cardNumberElement.mount('#card-number-element');
        cardExpiryElement.mount('#card-expiry-element');
        cardCvcElement.mount('#card-cvc-element');

        // Handle real-time validation errors
        cardNumberElement.on('change', ({
            error
        }) => {
            const displayError = document.getElementById('payment-message');
            if (error) {
                displayError.textContent = error.message;
                displayError.classList.remove('d-none');
            } else {
                displayError.classList.add('d-none');
            }
        });

        function checkout(btn) {
            btn.querySelector('#button-text').classList.add('d-none');
            btn.querySelector('#spinner').classList.remove('d-none');
            btn.disabled = true;

            $.get('{{ route('address.get') }}')
                .done(function(billingAddressData) {
                    stripe.createToken(cardNumberElement, {
                        name: billingAddressData.name,
                        address_line1: billingAddressData.address,
                        address_city: billingAddressData.city,
                        address_zip: billingAddressData.zip,
                        address_country: billingAddressData.country
                    }).then(function(result) {
                        if (result.error) {
                            btn.querySelector('#button-text').classList.remove('d-none');
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
                                        btn.querySelector('#button-text').classList.remove(
                                            'd-none');
                                        btn.querySelector('#spinner').classList.add(
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
    </script>
@endpush
