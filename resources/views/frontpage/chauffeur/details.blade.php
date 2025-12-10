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
            <a href="javascript:void()" class="back-link d-inline-flex align-items-center" onclick="redirectBack()">
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
                        <input type="text" name="full_name" class="form-control" placeholder="Full name" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Phone Number *</label>
                        <input type="text" name="phone" class="form-control" placeholder="Phone number" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email Address *</label>
                        <input type="email" name="email" class="form-control" placeholder="Email address" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Company Name (Optional)</label>
                        <input type="text" name="company" class="form-control" placeholder="Company name">
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
                    <input type="text" name="pickup_address" class="form-control" placeholder="Full pickup address">
                </div>
                <div class="mb-3">
                    <label class="form-label">Drop-off Address *</label>
                    <input type="text" name="dropoff_address" class="form-control" placeholder="Full drop-off address">
                </div>
                <div id="additional-stop-container" class="d-none">
                    <h5>Additional Stops</h5>
                    <div id="additional-stops">

                    </div>
                </div>
            </div>
            <div class="add-stop-btn">
                <a href="javascript:void(0)" onclick="addAdditionalStop()">
                    <i class="fas fa-plus"></i> Add Additional Stop
                </a>
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
                    <textarea class="form-control" rows="4" name="special_requests" placeholder="Any special requirements or requests..."></textarea>
                </div>

                @foreach($car->extras ?? [] as $index => $extra)
                <div class="form-check mb-2">
                    <input class="form-check-input" name="extras[{{ $index }}]" type="checkbox" id="addons{{ $index }}">
                    <label class="form-check-label addon-label" for="addons{{ $index }}">
                        {{ $extra['title'] }} ({{ amt($extra['price']) }}/{{ $extra['interval'] }})
                    </label>
                </div>
                @endforeach
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
                        @foreach($car->chauffer_service_terms ?? [] as $key => $value)
                            @php
                                switch($key){
                                    case 'minimum_hire':
                                        $key = 'Minimum Hire';
                                        break;
                                    case 'overtime':
                                        $key = 'Overtime';
                                        break;
                                    case 'extra_mileage':
                                        $key = 'Extra Mileage';
                                        break;
                                    case 'waiting_time':
                                        $key = 'Waiting Time';
                                        break;
                                    case 'chauffeur_standards':
                                        $key = 'Chauffeur Standards';
                                        break;
                                    case 'vehicle_policy':
                                        $key = 'Vehicle Policy';
                                        break;
                                    case 'insurance':
                                        $key = 'Insurance';
                                        break;
                                    case 'operator_compliance':
                                        $key = 'Operator Compliance';
                                        break;
                                    case 'cancellation':
                                        $key = 'Cancellation';
                                        break;
                                    case 'payment':
                                        $key = 'Payment';
                                        break;
                                }
                            @endphp
                        <li><strong>{{ $key }}:</strong> {{ $value }}</li>
                        @endforeach
                    </ul>
                </div>

                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" name="terms" id="acceptTerms">
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
            <button type="button" onclick="continueToBooking()" class="btn btn-continue w-100">
                Continue to Payment
            </button>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    function redirectBack(){
        const params = new URLSearchParams();

        @foreach ($query as $key => $value)
            @if(in_array($key, ['package','duration','custom','flight']))
                @continue
            @endif
            params.append('{{ $key }}', '{{ $value }}');
        @endforeach

        const url = '{{ route('frontpage.chauffeur.extras', $car->id) }}';
        window.location.href = url + '?' + params.toString();
    }
</script>
@endpush