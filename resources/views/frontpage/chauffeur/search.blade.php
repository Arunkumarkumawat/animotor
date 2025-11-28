@extends('frontpage.layout')

@section('style')
    <style>
        /* Gradient Background */
        .hero-section {
            background: linear-gradient(to bottom, #3b2e23, #0d1b2a);
        }

        /* Booking Box Styling */
        .booking-box {
            background: #fffaf0;
            border-radius: 10px;
            max-width: 900px;
        }

        /* Search Button */
        .booking-btn {
            background: #d18a1c;
            border: none;
            font-weight: bold;
            padding: 12px;
        }

        .booking-btn:hover {
            background: #c57c12;
        }

        /* Features Section Background */
        .features-section {
            background: #0d1b2a;
        }

        /* Feature Cards */
        .feature-box {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <!-- HERO SECTION -->
    <section class="hero-section py-5">
        <div class="container text-center text-white">
            <i class="fas fa-shield-alt fa-2x mb-2"></i>

            <h1 class="fw-bold display-5">Executive Chauffeur Services</h1>
            <p class="lead">Premium vehicles. Professional drivers. Complete operator compliance.</p>

            <!-- Booking Box -->
            <div class="booking-box p-4 mt-4 mx-auto shadow">
                <h5 class="fw-bold mb-3"><i class="fas fa-briefcase me-2"></i> Book Your Executive Chauffeur</h5>

                <form>
                    <div class="row g-3">

                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="fas fa-map-marker-alt me-1"></i> Pickup Location
                            </label>
                            <input type="text" class="form-control" placeholder="Enter address or airport">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="far fa-calendar-alt me-1"></i> Date
                            </label>
                            <input type="date" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">
                                <i class="far fa-clock me-1"></i> Time
                            </label>
                            <input type="time" class="form-control">
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Trip Type</label>
                            <select class="form-select">
                                <option>Hourly Hire</option>
                                <option>One Way</option>
                                <option>Return</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Passengers</label>
                            <select class="form-select">
                                <option>1 Passenger</option>
                                <option>2 Passengers</option>
                                <option>3 Passengers</option>
                                <option>4+ Passengers</option>
                            </select>
                        </div>

                        <div class="col-md-4">
                            <label class="form-label">Service Type</label>
                            <select class="form-select">
                                <option>Vehicle with Driver</option>
                                <option>Driver Only</option>
                            </select>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-warning w-100 mt-4 booking-btn">
                        <i class="fas fa-search me-2"></i> Search Executive Chauffeurs
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FEATURES SECTION -->
    <section class="features-section py-5 text-white">
        <div class="container">

            <h2 class="text-center fw-bold mb-5">Why Choose Our Executive Service</h2>

            <div class="row g-4 justify-content-center">

                <div class="col-md-4">
                    <div class="feature-box p-4 text-center h-100">
                        <i class="fas fa-shield-alt fa-2x text-warning mb-3"></i>
                        <h5 class="fw-bold">Fully Licensed Operators</h5>
                        <p>All drivers and operators hold valid licenses and insurance.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box p-4 text-center h-100">
                        <i class="fas fa-star fa-2x text-warning mb-3"></i>
                        <h5 class="fw-bold">Professional Chauffeurs</h5>
                        <p>Experienced drivers with excellent customer service.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="feature-box p-4 text-center h-100">
                        <i class="fas fa-briefcase fa-2x text-warning mb-3"></i>
                        <h5 class="fw-bold">Premium Fleet</h5>
                        <p>Executive saloons, luxury SUVs, and premium MPVs.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
