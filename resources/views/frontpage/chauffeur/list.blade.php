@extends('frontpage.layout')

@section('style')
    <style>
        /* Header Gradient */
        .executive-header {
            background: linear-gradient(to right, #1a2838, #0d1b2a);
        }

        /* Vehicle List Cards */
        .vehicle-card ul.vehicle-features {
            padding-left: 1rem;
        }

        .vehicle-card ul.vehicle-features li {
            list-style-type: disc;
            margin-bottom: 4px;
            color: #333;
        }

        /* Badges */
        .badge.bg-warning {
            background-color: #f8d058 !important;
        }

        /* Chauffeur Name Badge */
        .badge.bg-success {
            background-color: #3cb371 !important;
        }

        /* Buttons */
        .btn-warning {
            background-color: #d58c1a !important;
            border: none;
            color: white;
        }

        .btn-warning:hover {
            background-color: #c07a12 !important;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <!-- Top Header Section -->
    <section class="executive-header py-4">
        <div class="container text-white">
            <h2 class="fw-bold mb-2"><i class="fas fa-shield-alt me-2"></i> Available Executive Chauffeurs</h2>

            <div class="d-flex align-items-center gap-2">
                <i class="far fa-calendar-alt"></i>
                <span class="badge bg-secondary rounded-pill px-3 py-2">28/11/2023</span>
            </div>

            <p class="mt-3 text-white-50">3 executive chauffeurs available</p>
        </div>
    </section>

    <!-- Filters -->
    <div class="container mt-3">
        <div class="d-flex gap-2">
            <button class="btn btn-dark btn-sm">All</button>
            <button class="btn btn-outline-dark btn-sm">Saloons</button>
            <button class="btn btn-outline-dark btn-sm">SUVs</button>
            <button class="btn btn-outline-dark btn-sm">MPVs</button>
        </div>
    </div>

    <!-- Vehicle List -->
    <div class="container mt-4">

        <!-- Card 1 -->
        <div class="vehicle-card shadow-sm p-3 mb-4 bg-white rounded">

            <div class="row">
                <!-- Image -->
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="">
                </div>

                <!-- Middle Content -->
                <div class="col-md-5">
                    <span class="badge bg-warning text-dark mb-2">Executive Saloon</span>
                    <h4 class="fw-bold">Mercedes-Benz S-Class</h4>
                    <p class="text-muted">2023</p>

                    <div class="d-flex gap-4 mb-2">
                        <span><i class="fas fa-users me-1"></i> 4 seats</span>
                        <span><i class="fas fa-suitcase me-1"></i> 3 bags</span>
                    </div>

                    <!-- Features List -->
                    <ul class="vehicle-features">
                        <li>Leather Interior</li>
                        <li>Privacy Glass</li>
                        <li>Wi-Fi</li>
                        <li>Refreshments</li>
                    </ul>

                    <hr>

                    <!-- Chauffeur Info -->
                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="">
                        <div>
                            <small class="text-warning"><i class="fas fa-user-tie me-1"></i> Your Professional
                                Chauffeur</small>
                            <h6 class="fw-bold mb-1">James Anderson <span class="badge bg-success">Licensed Operator</span>
                            </h6>
                            <div class="text-muted small">
                                ⭐ 4.9 · 12 years experience <br>
                                <i class="fas fa-language"></i> English, French
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing -->
                <div class="col-md-3 border-start">
                    <h6 class="fw-bold">Pricing</h6>
                    <p class="mb-1">Hourly <span class="float-end fw-bold">£75/hr</span></p>
                    <p>Daily <span class="float-end fw-bold">£500/day</span></p>

                    <ul class="list-unstyled small text-muted mt-3">
                        <li><i class="fas fa-check text-success me-2"></i>Fuel included</li>
                        <li><i class="fas fa-check text-success me-2"></i>Professional chauffeur</li>
                        <li><i class="fas fa-check text-success me-2"></i>Fully insured</li>
                    </ul>

                    <button class="btn btn-warning w-100 mt-4 fw-bold">View Details & Book</button>
                </div>
            </div>
        </div>

        <!-- Duplicate card 2 -->
        <div class="vehicle-card shadow-sm p-3 mb-4 bg-white rounded">

            <div class="row">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="">
                </div>

                <div class="col-md-5">
                    <span class="badge bg-warning text-dark mb-2">Luxury SUV</span>
                    <h4 class="fw-bold">Range Rover Autobiography</h4>
                    <p class="text-muted">2024</p>

                    <div class="d-flex gap-4 mb-2">
                        <span><i class="fas fa-users me-1"></i> 5 seats</span>
                        <span><i class="fas fa-suitcase me-1"></i> 5 bags</span>
                    </div>

                    <ul class="vehicle-features">
                        <li>Leather Interior</li>
                        <li>Massage Seats</li>
                        <li>Privacy Glass</li>
                        <li>Premium Sound</li>
                    </ul>

                    <hr>

                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="">
                        <div>
                            <small class="text-warning"><i class="fas fa-user-tie me-1"></i> Your Professional
                                Chauffeur</small>
                            <h6 class="fw-bold mb-1">Mohammed Khan <span class="badge bg-success">Licensed Operator</span>
                            </h6>
                            <div class="text-muted small">
                                ⭐ 5 · 15 years experience <br>
                                <i class="fas fa-language"></i> English, Arabic, Urdu
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 border-start">
                    <h6 class="fw-bold">Pricing</h6>
                    <p class="mb-1">Hourly <span class="float-end fw-bold">£95/hr</span></p>
                    <p>Daily <span class="float-end fw-bold">£650/day</span></p>

                    <ul class="list-unstyled small text-muted mt-3">
                        <li><i class="fas fa-check text-success me-2"></i>Fuel included</li>
                        <li><i class="fas fa-check text-success me-2"></i>Professional chauffeur</li>
                        <li><i class="fas fa-check text-success me-2"></i>Fully insured</li>
                    </ul>

                    <button class="btn btn-warning w-100 mt-4 fw-bold">View Details & Book</button>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="vehicle-card shadow-sm p-3 mb-4 bg-white rounded">

            <div class="row">
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/600x400" class="img-fluid rounded" alt="">
                </div>

                <div class="col-md-5">
                    <span class="badge bg-warning text-dark mb-2">Executive MPV</span>
                    <h4 class="fw-bold">Mercedes V-Class</h4>
                    <p class="text-muted">2023</p>

                    <div class="d-flex gap-4 mb-2">
                        <span><i class="fas fa-users me-1"></i> 7 seats</span>
                        <span><i class="fas fa-suitcase me-1"></i> 8 bags</span>
                    </div>

                    <ul class="vehicle-features">
                        <li>7 Seats</li>
                        <li>Climate Control</li>
                        <li>Privacy Glass</li>
                        <li>Conference Seating</li>
                    </ul>

                    <hr>

                    <div class="d-flex align-items-center">
                        <img src="https://via.placeholder.com/60" class="rounded-circle me-3" alt="">
                        <div>
                            <small class="text-warning"><i class="fas fa-user-tie me-1"></i> Your Professional
                                Chauffeur</small>
                            <h6 class="fw-bold mb-1">David Thompson <span class="badge bg-success">Licensed
                                    Operator</span></h6>
                            <div class="text-muted small">
                                ⭐ 4.8 · 10 years experience <br>
                                <i class="fas fa-language"></i> English, Spanish
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 border-start">
                    <h6 class="fw-bold">Pricing</h6>
                    <p class="mb-1">Hourly <span class="float-end fw-bold">£85/hr</span></p>
                    <p>Daily <span class="float-end fw-bold">£580/day</span></p>

                    <ul class="list-unstyled small text-muted mt-3">
                        <li><i class="fas fa-check text-success me-2"></i>Fuel included</li>
                        <li><i class="fas fa-check text-success me-2"></i>Professional chauffeur</li>
                        <li><i class="fas fa-check text-success me-2"></i>Fully insured</li>
                    </ul>

                    <button class="btn btn-warning w-100 mt-4 fw-bold">View Details & Book</button>
                </div>
            </div>
        </div>

    </div>
@endsection
