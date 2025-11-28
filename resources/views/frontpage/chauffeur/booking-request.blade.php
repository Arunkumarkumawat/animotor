@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background-color: #f5f6fa;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-container {
            max-width: 1200px;
        }

        .back-link {
            font-weight: 500;
            color: #6c757d;
        }

        .back-link i {
            font-size: 0.9rem;
        }

        .card-shadow {
            border: 0;
            border-radius: 14px;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.06);
            background-color: #fff;
        }

        .gallery-main img {
            border-radius: 14px;
            object-fit: cover;
            max-height: 340px;
        }

        .thumb-img {
            height: 80px;
            border-radius: 10px;
            overflow: hidden;
            cursor: pointer;
            border: 2px solid transparent;
            transition: all 0.2s;
        }

        .thumb-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .thumb-img.active,
        .thumb-img:hover {
            border-color: #f39c12;
            transform: translateY(-2px);
        }

        .pill-label {
            display: inline-flex;
            align-items: center;
            padding: 0.25rem 0.75rem;
            border-radius: 999px;
            font-size: 0.75rem;
            font-weight: 600;
            background-color: #fef4e6;
            color: #f39c12;
        }

        .price-label {
            text-align: right;
            font-size: 0.9rem;
            color: #6c757d;
        }

        .price-label .amount {
            font-size: 1.5rem;
            font-weight: 700;
            color: #f39c12;
        }

        .section-tabs {
            border-bottom: 1px solid #e9ecef;
            margin-top: 1rem;
            margin-bottom: 1rem;
        }

        .section-tabs .nav-link {
            font-size: 0.9rem;
            font-weight: 600;
            color: #adb5bd;
            padding: 0.75rem 1rem;
            border: 0;
            border-bottom: 3px solid transparent;
            border-radius: 0;
        }

        .section-tabs .nav-link.active {
            color: #212529;
            border-bottom-color: #f39c12;
        }

        .feature-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.4rem;
            font-size: 0.9rem;
            color: #495057;
        }

        .feature-item i {
            color: #22c55e;
            margin-right: 0.5rem;
            font-size: 0.9rem;
        }

        .booking-card-header {
            border-bottom: 1px solid #f1f3f5;
            padding-bottom: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .booking-card-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .booking-price-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.35rem;
            font-size: 0.9rem;
        }

        .booking-price-label {
            color: #6c757d;
        }

        .booking-price-amount {
            font-weight: 600;
            color: #212529;
        }

        .booking-section-title {
            font-size: 0.9rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: #adb5bd;
            margin-top: 1rem;
            margin-bottom: 0.4rem;
        }

        .booking-benefit {
            font-size: 0.85rem;
            color: #495057;
            margin-bottom: 0.25rem;
        }

        .booking-benefit i {
            color: #22c55e;
            font-size: 0.8rem;
            margin-right: 0.4rem;
        }

        .btn-book {
            width: 100%;
            border-radius: 999px;
            font-weight: 600;
            padding: 0.7rem;
            background: linear-gradient(135deg, #f59e0b, #f97316);
            border: none;
        }

        .btn-book:hover {
            filter: brightness(0.95);
        }

        .profile-avatar {
            width: 72px;
            height: 72px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #fef4e6;
        }

        .status-badge {
            font-size: 0.7rem;
            padding: 0.15rem 0.6rem;
            border-radius: 999px;
            background-color: #e6fbf2;
            color: #16a34a;
            font-weight: 600;
        }

        .rating-stars {
            color: #fbbf24;
            font-size: 0.9rem;
        }

        .meta-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #9ca3af;
            margin-bottom: 0.25rem;
        }

        .meta-value {
            font-size: 0.9rem;
            font-weight: 500;
            color: #111827;
        }

        .operator-icon {
            width: 32px;
            height: 32px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #fff7ed;
            color: #f97316;
            font-size: 1.1rem;
        }

        .small-muted {
            font-size: 0.8rem;
            color: #6b7280;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container py-4 page-container">

        <!-- Back link -->
        <div class="mb-3">
            <a href="#" class="back-link d-inline-flex align-items-center">
                <i class="fas fa-chevron-left me-2"></i>
                Back to Results
            </a>
        </div>

        <div class="row g-4">
            <!-- LEFT COLUMN -->
            <div class="col-lg-8">

                <!-- Gallery Card -->
                <div class="card card-shadow mb-4">
                    <div class="card-body">

                        <div class="gallery-main mb-3">
                            <img src="https://images.pexels.com/photos/210019/pexels-photo-210019.jpeg?auto=compress&cs=tinysrgb&w=1200"
                                class="w-100" alt="Mercedes-Benz S-Class">
                        </div>

                        <div class="d-flex gap-3">
                            <div class="thumb-img active">
                                <img src="https://images.pexels.com/photos/210019/pexels-photo-210019.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="Thumb 1">
                            </div>
                            <div class="thumb-img">
                                <img src="https://images.pexels.com/photos/210019/pexels-photo-210019.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="Thumb 2">
                            </div>
                            <div class="thumb-img">
                                <img src="https://images.pexels.com/photos/1402787/pexels-photo-1402787.jpeg?auto=compress&cs=tinysrgb&w=400"
                                    alt="Thumb 3">
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Car Details Card -->
                <div class="card card-shadow mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <span class="pill-label mb-2">Executive Saloon</span>
                                <h4 class="mt-2 mb-0">Mercedes-Benz S-Class</h4>
                                <div class="text-muted small mt-1">2023</div>
                            </div>
                            <div class="price-label">
                                <div>From</div>
                                <div class="amount">£75</div>
                                <div class="small text-muted">per hour</div>
                            </div>
                        </div>

                        <!-- Tabs (visual only) -->
                        <ul class="nav section-tabs mt-3">
                            <li class="nav-item">
                                <button class="nav-link active" type="button">Features</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" type="button">Amenities</button>
                            </li>
                            <li class="nav-item">
                                <button class="nav-link" type="button">Specifications</button>
                            </li>
                        </ul>

                        <!-- Features List -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i> Leather Interior
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i> Privacy Glass
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i> Wi-Fi
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i> Refreshments
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i> Climate Control
                                </div>
                                <div class="feature-item">
                                    <i class="fas fa-check-circle"></i> Premium Sound System
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chauffeur Card -->
                <div class="card card-shadow mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">
                            <i class="fas fa-shield-alt me-2 text-warning"></i>
                            Your Professional Chauffeur
                        </h6>

                        <div class="row align-items-center">
                            <div class="col-md-auto text-center mb-3 mb-md-0">
                                <img src="https://images.pexels.com/photos/614810/pexels-photo-614810.jpeg?auto=compress&cs=tinysrgb&w=200"
                                    alt="James Anderson" class="profile-avatar mb-2">
                                <div>
                                    <span class="status-badge">
                                        <i class="fas fa-check-circle me-1"></i>Licensed
                                    </span>
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="d-flex flex-wrap align-items-center mb-1">
                                    <h5 class="mb-0 me-2">James Anderson</h5>
                                </div>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="rating-stars me-2">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star-half-alt"></i>
                                    </span>
                                    <span class="small text-muted">4.9 · 2400 trips</span>
                                </div>
                                <p class="small text-muted mb-3">
                                    Professional chauffeur with over 12 years of experience serving corporate executives
                                    and VIP clients. Specializing in airport transfers and long-distance journeys.
                                </p>

                                <div class="row gy-3">
                                    <div class="col-sm-4">
                                        <div class="meta-label">Experience</div>
                                        <div class="meta-value">
                                            <i class="far fa-clock me-1 text-warning"></i>12 years
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="meta-label">Specialization</div>
                                        <div class="meta-value">
                                            Corporate · VIP · Airport
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="meta-label">Languages</div>
                                        <div class="meta-value">
                                            English, French
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="meta-label">Availability</div>
                                        <div class="meta-value">
                                            <i class="far fa-clock me-1 text-emerald"></i>24/7 Available
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Operator Card -->
                <div class="card card-shadow mb-4">
                    <div class="card-body">
                        <h6 class="mb-3">
                            <i class="fas fa-building me-2 text-warning"></i>
                            Licensed Operator
                        </h6>

                        <div class="row gy-3 align-items-center">
                            <div class="col-md-6 d-flex align-items-center">
                                <div class="operator-icon me-3">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <div>
                                    <div class="meta-label">Operator Name</div>
                                    <div class="meta-value">Executive Transport Ltd</div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="meta-label">License Number</div>
                                <div class="meta-value">PHO-2024-12345</div>
                            </div>
                            <div class="col-md-3">
                                <div class="meta-label">Fleet Size</div>
                                <div class="meta-value">25 vehicles</div>
                            </div>
                            <div class="col-md-3">
                                <div class="meta-label">Insurance Cover</div>
                                <div class="meta-value">£10,000,000</div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN -->
            <div class="col-lg-4">
                <div class="card card-shadow sticky-top" style="top: 1.5rem;">
                    <div class="card-body">
                        <div class="booking-card-header d-flex justify-content-between align-items-center">
                            <div>
                                <div class="booking-card-title">Book This Chauffeur</div>
                                <div class="small text-muted">Instant confirmation · No hidden fees</div>
                            </div>
                            <i class="fas fa-car-side fs-3 text-warning"></i>
                        </div>

                        <!-- Pricing Options -->
                        <div class="booking-section-title">Pricing Options</div>
                        <div class="booking-price-row">
                            <div class="booking-price-label">Hourly</div>
                            <div class="booking-price-amount">£75/hr</div>
                        </div>
                        <div class="booking-price-row">
                            <div class="booking-price-label">Daily (10 hrs)</div>
                            <div class="booking-price-amount">£500</div>
                        </div>
                        <div class="booking-price-row">
                            <div class="booking-price-label">Airport Transfer</div>
                            <div class="booking-price-amount">£120</div>
                        </div>

                        <!-- What's Included -->
                        <div class="booking-section-title">What's Included</div>
                        <div class="booking-benefit">
                            <i class="fas fa-check-circle"></i>
                            Professional chauffeur service
                        </div>
                        <div class="booking-benefit">
                            <i class="fas fa-check-circle"></i>
                            Fuel and tolls included
                        </div>
                        <div class="booking-benefit">
                            <i class="fas fa-check-circle"></i>
                            Full insurance coverage
                        </div>
                        <div class="booking-benefit">
                            <i class="fas fa-check-circle"></i>
                            Complimentary bottled water
                        </div>

                        <!-- CTA -->
                        <div class="mt-4">
                            <button class="btn btn-book text-white">
                                <i class="fas fa-calendar-check me-2"></i>
                                Request Booking
                            </button>
                            <div class="small-muted mt-2 text-center">
                                Free cancellation up to 24 hours before pickup.
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
