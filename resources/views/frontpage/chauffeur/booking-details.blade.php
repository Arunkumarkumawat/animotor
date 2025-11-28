@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background-color: #f5f6fa;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-container {
            max-width: 900px;
        }

        .back-link {
            font-size: 0.9rem;
            color: #6b7280;
            text-decoration: none;
        }

        .back-link i {
            font-size: 0.85rem;
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
            padding-bottom: 0;
            padding-top: 1.25rem;
        }

        .card-shell .card-body {
            padding-top: 0.5rem;
            padding-bottom: 1.25rem;
        }

        .section-icon {
            width: 32px;
            height: 32px;
            border-radius: 999px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.6rem;
            background-color: #fff7ed;
            color: #f97316;
            font-size: 1.1rem;
        }

        .section-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 0;
        }

        .form-label {
            font-size: 0.85rem;
            font-weight: 500;
            color: #4b5563;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border-color: #e5e7eb;
            font-size: 0.9rem;
            padding: 0.6rem 0.75rem;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #f59e0b;
            box-shadow: 0 0 0 .15rem rgba(245, 158, 11, .25);
        }

        .helper-text {
            font-size: 0.85rem;
            color: #6b7280;
        }

        .add-stop-btn {
            border-radius: 0 0 12px 12px;
            border-top: 1px solid #e5e7eb;
            padding: 0.75rem;
            font-size: 0.9rem;
            color: #f59e0b;
            font-weight: 500;
            background-color: #fdfaf3;
            text-align: center;
            cursor: pointer;
        }

        .add-stop-btn i {
            margin-right: 0.4rem;
        }

        .addon-label {
            font-size: 0.9rem;
            color: #4b5563;
        }

        .terms-box {
            max-height: 210px;
            overflow-y: auto;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            padding: 0.75rem 1rem;
            background-color: #f9fafb;
            font-size: 0.85rem;
        }

        .terms-box ul {
            padding-left: 1.1rem;
            margin-bottom: 0;
        }

        .terms-box li {
            margin-bottom: 0.25rem;
        }

        .alert-terms {
            border-radius: 10px;
            border: 1px solid #fed7aa;
            background-color: #fef3c7;
            color: #92400e;
            font-size: 0.85rem;
            padding: 0.7rem 0.9rem;
        }

        .btn-continue {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
        }

        .btn-continue:hover {
            background-color: #ea580c;
            border-color: #ea580c;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container page-container py-4">

        <!-- Back -->
        <div class="mb-4">
            <a href="#" class="back-link d-inline-flex align-items-center">
                <i class="fas fa-chevron-left me-2"></i> Back
            </a>
        </div>

        <!-- Page Title -->
        <div class="mb-4">
            <h3 class="fw-bold mb-1">Booking Details</h3>
            <p class="helper-text mb-0">Complete your chauffeur booking information</p>
        </div>

        <!-- Passenger Information -->
        <div class="card card-shell mb-4">
            <div class="card-header px-4">
                <div class="d-flex align-items-center">
                    <div class="section-icon">
                        <i class="far fa-user"></i>
                    </div>
                    <h5 class="section-title">Passenger Information</h5>
                </div>
            </div>
            <div class="card-body px-4">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Full Name *</label>
                        <input type="text" class="form-control" placeholder="Full name">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number *</label>
                        <input type="text" class="form-control" placeholder="Phone number">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address *</label>
                        <input type="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Company Name (Optional)</label>
                        <input type="text" class="form-control" placeholder="Company name">
                    </div>
                </div>
            </div>
        </div>

        <!-- Journey Details -->
        <div class="card card-shell mb-4">
            <div class="card-header px-4">
                <div class="d-flex align-items-center">
                    <div class="section-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h5 class="section-title">Journey Details</h5>
                </div>
            </div>
            <div class="card-body px-4 pb-0">
                <div class="mb-3">
                    <label class="form-label">Pickup Address *</label>
                    <input type="text" class="form-control" placeholder="Full pickup address">
                </div>
                <div class="mb-3">
                    <label class="form-label">Drop-off Address *</label>
                    <input type="text" class="form-control" placeholder="Full drop-off address">
                </div>
            </div>
            <div class="add-stop-btn">
                <i class="fas fa-plus"></i> Add Additional Stop
            </div>
        </div>

        <!-- Special Requests & Add-ons -->
        <div class="card card-shell mb-4">
            <div class="card-header px-4">
                <h5 class="section-title">Special Requests &amp; Add-ons</h5>
            </div>
            <div class="card-body px-4">
                <div class="mb-3">
                    <label class="form-label">Special Requests</label>
                    <textarea class="form-control" rows="4" placeholder="Any special requirements or requests..."></textarea>
                </div>

                <div class="form-check mb-2">
                    <input class="form-check-input" type="checkbox" id="childSeat">
                    <label class="form-check-label addon-label" for="childSeat">
                        Child seat required (+£15)
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="meetGreet">
                    <label class="form-check-label addon-label" for="meetGreet">
                        Enhanced meet &amp; greet service (+£25)
                    </label>
                </div>
            </div>
        </div>

        <!-- Terms & Conditions -->
        <div class="card card-shell mb-4">
            <div class="card-header px-4">
                <div class="d-flex align-items-center">
                    <div class="section-icon">
                        <i class="far fa-file-alt"></i>
                    </div>
                    <h5 class="section-title">Terms &amp; Conditions</h5>
                </div>
            </div>
            <div class="card-body px-4">
                <div class="terms-box mb-3">
                    <strong>Chauffeur Service Terms</strong>
                    <ul class="mt-2">
                        <li><strong>Minimum Hire:</strong> 2 hours for hourly bookings</li>
                        <li><strong>Overtime:</strong> Charged at hourly rate in 30-minute increments</li>
                        <li><strong>Extra Mileage:</strong> £2 per mile beyond included distance</li>
                        <li><strong>Waiting Time:</strong> First 30 minutes free, then £15 per 15 minutes</li>
                        <li><strong>Chauffeur Standards:</strong> Professional dress code, courteous behavior</li>
                        <li><strong>Vehicle Policy:</strong> No smoking, no pets (except service animals)</li>
                        <li><strong>Insurance:</strong> Comprehensive coverage up to £10,000,000</li>
                        <li><strong>Operator Compliance:</strong> Fully licensed and insured operator</li>
                    </ul>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="acceptTerms">
                    <label class="form-check-label addon-label" for="acceptTerms">
                        I have read and agree to the terms and conditions, cancellation policy, and operator compliance
                        requirements
                    </label>
                </div>

                <div class="alert alert-terms mb-0 d-flex align-items-center">
                    <i class="fas fa-exclamation-circle me-2"></i>
                    <span>You must accept the terms and conditions to proceed</span>
                </div>
            </div>
        </div>

        <!-- Continue Button -->
        <div class="pb-4">
            <button class="btn btn-continue w-100">
                Continue to Payment
            </button>
        </div>
    </div>
@endsection
