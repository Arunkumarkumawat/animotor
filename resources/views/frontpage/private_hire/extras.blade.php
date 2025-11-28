@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background: #f4f6fb;
            font-family: "Inter", sans-serif;
            padding-bottom: 120px;
        }

        .back-link {
            color: #1E6AF9;
            font-size: 15px;
            text-decoration: none;
            font-weight: 500;
        }

        .section-title {
            font-size: 28px;
            font-weight: 700;
        }

        .description-text {
            font-size: 14px;
            color: #666;
        }

        .car-summary {
            background: #fff;
            padding: 18px 22px;
            border-radius: 16px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        }

        .extras-card {
            background: #fff;
            border-radius: 16px;
            padding: 22px;
            box-shadow: 0 4px 18px rgba(0, 0, 0, 0.06);
            transition: 0.2s ease;
        }

        .extras-icon-box {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            background: #e9f2ff;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }

        .extras-icon-box i {
            color: #1E6AF9;
            font-size: 22px;
        }

        .qty-btn {
            width: 34px;
            height: 34px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: #fff;
            font-size: 16px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .skip-btn {
            background: #fff;
            color: #000;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0, 0, 0, 0.08);
            padding: 8px 20px;
            border: none;
            font-size: 15px;
            font-weight: 500;
        }

        .checkout-btn {
            background: #1E6AF9;
            color: #fff;
            border-radius: 12px;
            padding: 12px 30px;
            border: none;
            font-size: 16px;
            font-weight: 600;
            box-shadow: 0 4px 14px rgba(30, 106, 249, 0.4);
        }

        .checkout-btn i {
            margin-left: 8px;
        }

        /* Mobile tweaks */
        @media (max-width: 768px) {
            .extras-card {
                margin-bottom: 15px;
            }
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <div class="container py-4">

        <!-- Back link -->
        <a href="#" class="back-link">
            <i class="fas fa-arrow-left me-2"></i>Back to protection
        </a>

        <h2 class="section-title mt-3">Add Extras</h2>
        <p class="description-text">Enhance your journey with our optional extras</p>

        <!-- Car Summary -->
        <div class="car-summary mt-3 d-flex align-items-center">
            <img src="https://via.placeholder.com/80x55" class="rounded me-3" alt="car">
            <div>
                <h6 class="fw-bold mb-1">Toyota Auris</h6>
                <div class="text-muted small">Fri, 28 Nov – Sun, 28 Nov</div>
                <div class="text-muted small">4d 7h 48m</div>
            </div>
        </div>

        <!-- Extras Grid -->
        <div class="row mt-4 g-3">

            <!-- Toll Road Pass -->
            <div class="col-md-6">
                <div class="extras-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="extras-icon-box">
                            <i class="fas fa-plus"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Toll Road Pass</h6>
                    </div>
                    <p class="text-muted small">Electronic toll payment device</p>
                    <p class="fw-bold mb-2">£45.00 <span class="text-muted fw-normal">/ rental</span></p>

                    <div class="d-flex align-items-center gap-2">
                        <button class="qty-btn">-</button>
                        <span class="px-2">0</span>
                        <button class="qty-btn">+</button>
                    </div>
                </div>
            </div>

            <!-- GPS -->
            <div class="col-md-6">
                <div class="extras-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="extras-icon-box">
                            <i class="fas fa-location-arrow"></i>
                        </div>
                        <h6 class="fw-bold mb-0">GPS Navigation</h6>
                    </div>
                    <p class="text-muted small">Satellite navigation system</p>
                    <p class="fw-bold mb-2">£15.00 <span class="text-muted fw-normal">/ day</span></p>

                    <div class="d-flex align-items-center gap-2">
                        <button class="qty-btn">-</button>
                        <span class="px-2">0</span>
                        <button class="qty-btn">+</button>
                    </div>
                </div>
            </div>

            <!-- Child Seat -->
            <div class="col-md-6">
                <div class="extras-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="extras-icon-box">
                            <i class="fas fa-baby-carriage"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Child Seat</h6>
                    </div>
                    <p class="text-muted small">Safety seat for children aged 0–4 years</p>
                    <p class="fw-bold mb-2">£16.00 <span class="text-muted fw-normal">/ day</span></p>

                    <div class="d-flex align-items-center gap-2">
                        <button class="qty-btn">-</button>
                        <span class="px-2">0</span>
                        <button class="qty-btn">+</button>
                    </div>
                </div>
            </div>

            <!-- Additional Driver -->
            <div class="col-md-6">
                <div class="extras-card">
                    <div class="d-flex align-items-center mb-2">
                        <div class="extras-icon-box">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <h6 class="fw-bold mb-0">Additional Driver</h6>
                    </div>
                    <p class="text-muted small">Add an extra driver to your booking</p>
                    <p class="fw-bold mb-2">£120.00 <span class="text-muted fw-normal">/ rental</span></p>

                    <div class="d-flex align-items-center gap-2">
                        <button class="qty-btn">-</button>
                        <span class="px-2">0</span>
                        <button class="qty-btn">+</button>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer Buttons -->
        <div class="d-flex justify-content-between align-items-center mt-4">
            <a href="{{ route('private_hire_checkout', 1) }}" class="skip-btn">Skip Extras</a>
            <a href="{{ route('private_hire_checkout', 1) }}" class="checkout-btn">Continue to Checkout <i class="fas fa-arrow-right"></i></a>
        </div>

    </div>
@endsection
