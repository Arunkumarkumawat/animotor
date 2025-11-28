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

        .section-title {
            font-weight: 700;
            margin-bottom: 0.25rem;
        }

        .section-subtitle {
            font-size: 0.9rem;
            color: #6b7280;
            margin-bottom: 1.75rem;
        }

        .package-card {
            position: relative;
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            padding: 1.25rem 1.5rem;
            cursor: pointer;
            transition: all .2s ease;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.03);
        }

        .package-card:hover {
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
            transform: translateY(-2px);
        }

        .package-card.active {
            border-color: #f59e0b;
            box-shadow: 0 16px 32px rgba(245, 158, 11, 0.22);
        }

        .package-icon {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            background-color: #fff7ed;
            color: #f97316;
            font-size: 1.1rem;
        }

        .package-title {
            font-weight: 600;
            margin-bottom: .1rem;
        }

        .package-desc {
            font-size: 0.85rem;
            color: #6b7280;
            margin: 0;
        }

        .package-price {
            text-align: right;
            font-size: 0.85rem;
            color: #6b7280;
        }

        .package-price strong {
            display: block;
            font-size: 1.1rem;
            color: #f97316;
            margin-top: .1rem;
        }

        .package-radio {
            position: absolute;
            right: 1.5rem;
            top: 1.5rem;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff;
        }

        .package-card.active .package-radio {
            border-color: #f59e0b;
        }

        .package-radio-inner {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background-color: transparent;
        }

        .package-card.active .package-radio-inner {
            background-color: #f59e0b;
        }

        /* Config section */
        .config-card {
            border-radius: 14px;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            padding: 1.25rem 1.5rem 1.5rem;
            margin-top: 2rem;
            box-shadow: 0 10px 25px rgba(15, 23, 42, 0.03);
        }

        .config-title {
            font-weight: 600;
            margin-bottom: .25rem;
        }

        .config-subtitle {
            font-size: .85rem;
            color: #6b7280;
            margin-bottom: 1rem;
        }

        .duration-pill {
            border-radius: 999px;
            border: 1px solid #e5e7eb;
            background-color: #ffffff;
            padding: 0.55rem 1.2rem;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .2s ease;
            text-align: center;
            white-space: nowrap;
        }

        .duration-pill:hover {
            border-color: #f59e0b;
            box-shadow: 0 8px 20px rgba(15, 23, 42, 0.04);
        }

        .duration-pill.active {
            border-color: #f59e0b;
            background-color: #fff7ed;
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.2);
        }

        .btn-continue {
            background-color: #f59e0b;
            border-color: #f59e0b;
            color: #fff;
            font-weight: 600;
            padding: 0.75rem 1.5rem;
            border-radius: 6px;
            margin-top: 1.5rem;
        }

        .btn-continue:hover {
            background-color: #ea580c;
            border-color: #ea580c;
        }

        @media (max-width: 575.98px) {
            .duration-pill {
                width: 100%;
            }
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container page-container py-5">

        <!-- Header -->
        <div class="mb-4">
            <h3 class="section-title">Select Your Package</h3>
            <p class="section-subtitle">Choose the service that best fits your needs</p>
        </div>

        <!-- Packages -->
        <div class="row g-3 mb-2">
            <!-- Hourly Hire -->
            <div class="col-md-6">
                <div class="package-card active">
                    <div class="d-flex align-items-start">
                        <div class="package-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="package-title">Hourly Hire</div>
                            <p class="package-desc">Perfect for short trips and meetings</p>
                        </div>
                        <div class="package-price">
                            From
                            <strong>£75</strong>
                        </div>
                    </div>
                    <div class="package-radio">
                        <div class="package-radio-inner"></div>
                    </div>
                </div>
            </div>

            <!-- Daily Hire -->
            <div class="col-md-6">
                <div class="package-card">
                    <div class="d-flex align-items-start">
                        <div class="package-icon">
                            <i class="far fa-sun"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="package-title">Daily Hire</div>
                            <p class="package-desc">Full day at your disposal (up to 10 hours)</p>
                        </div>
                        <div class="package-price">
                            From
                            <strong>£500</strong>
                        </div>
                    </div>
                    <div class="package-radio">
                        <div class="package-radio-inner"></div>
                    </div>
                </div>
            </div>

            <!-- Airport Transfer -->
            <div class="col-md-6">
                <div class="package-card">
                    <div class="d-flex align-items-start">
                        <div class="package-icon">
                            <i class="fas fa-plane-arrival"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="package-title">Airport Transfer</div>
                            <p class="package-desc">Meet &amp; greet with flight monitoring</p>
                        </div>
                        <div class="package-price">
                            From
                            <strong>£120</strong>
                        </div>
                    </div>
                    <div class="package-radio">
                        <div class="package-radio-inner"></div>
                    </div>
                </div>
            </div>

            <!-- Long Distance -->
            <div class="col-md-6">
                <div class="package-card">
                    <div class="d-flex align-items-start">
                        <div class="package-icon">
                            <i class="fas fa-route"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="package-title">Long Distance</div>
                            <p class="package-desc">City-to-city journeys with mileage included</p>
                        </div>
                        <div class="package-price">
                            From
                            <strong>£600</strong>
                        </div>
                    </div>
                    <div class="package-radio">
                        <div class="package-radio-inner"></div>
                    </div>
                </div>
            </div>

            <!-- Event Hire -->
            <div class="col-md-6">
                <div class="package-card">
                    <div class="d-flex align-items-start">
                        <div class="package-icon">
                            <i class="fas fa-glass-cheers"></i>
                        </div>
                        <div class="flex-grow-1">
                            <div class="package-title">Event Hire</div>
                            <p class="package-desc">Weddings, corporate events, VIP occasions</p>
                        </div>
                        <div class="package-price">
                            From
                            <strong>£700</strong>
                        </div>
                    </div>
                    <div class="package-radio">
                        <div class="package-radio-inner"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Configuration Card -->
        <div class="config-card">
            <div class="config-title">Configure Your Hourly Hire</div>
            <div class="config-subtitle">Select Duration</div>

            <div class="row g-2 mb-1">
                <div class="col-6 col-md-2">
                    <button type="button" class="btn duration-pill w-100">2 hours</button>
                </div>
                <div class="col-6 col-md-2">
                    <button type="button" class="btn duration-pill active w-100">3 hours</button>
                </div>
                <div class="col-6 col-md-2">
                    <button type="button" class="btn duration-pill w-100">4 hours</button>
                </div>
                <div class="col-6 col-md-2">
                    <button type="button" class="btn duration-pill w-100">5 hours</button>
                </div>
                <div class="col-6 col-md-2">
                    <button type="button" class="btn duration-pill w-100">8 hours</button>
                </div>
                <div class="col-6 col-md-2">
                    <button type="button" class="btn duration-pill w-100">Custom</button>
                </div>
            </div>
        </div>

        <!-- Continue Button -->
        <button class="btn btn-continue w-100 mt-4">
            Continue to Booking Details
        </button>
    </div>
@endsection
