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
                        <!-- Method Tabs -->
                        <div class="method-tabs mb-3">
                            <button type="button" class="method-pill active">Card</button>
                            <button type="button" class="method-pill">Apple Pay</button>
                            <button type="button" class="method-pill">Google Pay</button>
                            <button type="button" class="method-pill">PayPal</button>
                        </div>

                        <!-- Card form -->
                        <div class="mb-3">
                            <label class="form-label">Card Number</label>
                            <input type="text" class="form-control" placeholder="1234 5678 9012 3456">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Cardholder Name</label>
                            <input type="text" class="form-control" placeholder="John Doe">
                        </div>
                        <div class="row g-3 mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Expiry Date</label>
                                <input type="text" class="form-control" placeholder="MM/YY">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">CVV</label>
                                <input type="text" class="form-control" placeholder="123">
                            </div>
                        </div>

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

                        <div class="summary-label">Service</div>
                        <div class="summary-value">Hourly</div>
                        <div class="summary-sub mb-3">3 hours @ £75/hr</div>

                        <hr class="my-2">

                        <div class="summary-row">
                            <span>Base fare</span>
                            <strong>£225</strong>
                        </div>

                        <hr class="my-2">
                    </div>
                </div>
            </div>
        </div>

        <!-- Pay button -->
        <button class="btn btn-pay w-100">
            Pay Deposit £113
        </button>
    </div>
@endsection
