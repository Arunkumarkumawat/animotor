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
    <style>
        .driver-photo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #dee2e6;
        }

        .info-label {
            font-weight: 600;
            color: #6c757d;
        }

        .rating-badge {
            font-size: 0.9rem;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <!-- Top Header Section -->
    <section class="executive-header py-4">
        <div class="container">
            <h3 class="fw-bold mb-4 text-white">
                <i class="fas fa-shield-alt me-2"></i> Available Executive Chauffeurs
            </h3>

            <div class="d-flex align-items-center gap-2">
                <i class="far fa-calendar-alt"></i>
                <span class="badge bg-secondary rounded-pill px-3 py-2">{{ $query['date'] }} {{ $query['time'] }}</span>
            </div>

            <p class="mt-3 text-white-50">{{ $cars->count() }} executive chauffeurs available</p>
        </div>
    </section>

    <!-- Filters -->
    <div class="container mt-3">
        <div class="d-flex gap-2">
            <button type="button" class="btn {{ request()->get('type') == '' ? 'btn-dark' : 'btn-outline-dark' }} btn-sm"
                onclick="filterCars('type', '')">All</button>
            @foreach ($carTypes as $carType)
                <button type="button"
                    class="btn {{ request()->get('type') == $carType->name ? 'btn-dark' : 'btn-outline-dark' }} btn-sm"
                    onclick="filterCars('type', '{{ $carType->name }}')">{{ $carType->name }}</button>
            @endforeach
        </div>
    </div>

    <!-- Vehicle List -->
    <div class="container mt-4">
        @foreach ($cars as $car)
            <!-- Card 1 -->
            <div class="vehicle-card shadow-sm p-3 mb-4 bg-white rounded">

                <div class="row">
                    <div class="col-md-9">
                        <div class="row">
                            <!-- Image -->
                            <div class="col-md-3">
                                <img src="{{ $car->image }}" class="img-fluid rounded" style="width: 100%;"
                                    alt="">
                            </div>

                            <!-- Middle Content -->
                            <div class="col-md-9">
                                <span class="badge bg-warning text-dark mb-2">{{ $car->type }}</span>
                                <h4 class="fw-bold">{{ $car->make }} {{ $car->model }}</h4>
                                <p class="text-muted">{{ $car->year }}</p>

                                <div class="d-flex gap-4 mb-2">
                                    <span><i class="fas fa-users me-1"></i> {{ $car->seats }} seats</span>
                                    <span><i class="fas fa-suitcase me-1"></i> {{ $car->bags }} Small bags</span>
                                    <span><i class="fas fa-suitcase me-1"></i> {{ $car->bags_large }} Large bags</span>
                                </div>

                                <!-- Features List -->
                                <ul class="vehicle-features">
                                    @foreach ($car->chauffer_features1 ?? [] as $feature)
                                        <li><i class="fas fa-road text-info me-1"></i> {{ $feature }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="col-md-12">
                                <hr>

                                <p class="text-warning mb-2"><i class="fas fa-user-tie me-1"></i> Your Professional
                                    Chauffeur</p>
                                <!-- Chauffeur Info -->
                                <div class="d-flex align-items-center">
                                    <div>
                                        <img src="{{ isset($car->driver['photo']) ? $car->driver['photo'] : 'https://placehold.co/600x400' }}"
                                            class="rounded-circle me-3" style="width:60px; height: 60px; object-fit:cover;"
                                            alt="">
                                    </div>
                                    <div>
                                        <h6 class="fw-bold mb-2">
                                            <a href="javascript:void(0)" class="text-primary" data-bs-toggle="modal" data-bs-target="#driverModal_{{ $car->id }}">
                                                {{ $car->driver ? $car->driver['name'] : '-' }}
                                            </a>
                                            &nbsp;
                                            <span class="badge bg-success">Licensed Operator</span>
                                        </h6>
                                        <div class="text-muted small mb-2">
                                            ⭐ {{ $car->driver ? $car->driver['overall_rating'] ?? '0' : '0' }} ·
                                            {{ $car->driver ? $car->driver['years_experience'] ?? '0' : '0' }} years
                                            experience
                                            <br>
                                            <i class="fas fa-language"></i>
                                            {{ $car->driver ? $car->driver['primary_language'] ?? 'English' : 'English' }}{{ $car->driver && $car->driver['additional_languages'] ? ', ' . $car->driver['additional_languages'] : '' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="col-md-3 border-start">
                        <h6 class="fw-bold">Pricing</h6>

                        @if (request()->get('trip_type') == 'hourly')
                            <div class="d-flex justify-content-between">
                                <span>Hourly</span>
                                <span class="fw-bold">{{ amt($car->hourly_rate) }}/hour</span>
                            </div>
                        @elseif(request()->get('trip_type') == 'p2p')
                            <div class="d-flex justify-content-between">
                                <span>Point-to-Point</span>
                                <span class="fw-bold">{{ amt($car->p2p_rate) }}/trip</span>
                            </div>
                        @elseif(request()->get('trip_type') == 'airport')
                            <div class="d-flex justify-content-between">
                                <span>Airport Transfer</span>
                                <span class="fw-bold">{{ amt($car->airport_transfer_rate) }}/trip</span>
                            </div>
                        @elseif(request()->get('trip_type') == 'long')
                            <div class="d-flex justify-content-between">
                                <span>Long Distance</span>
                                <span class="fw-bold">{{ amt($car->long_transfer_rate) }}/trip</span>
                            </div>
                        @elseif(request()->get('trip_type') == 'event')
                            <div class="d-flex justify-content-between">
                                <span>Event</span>
                                <span class="fw-bold">{{ amt($car->event_hire_rate) }}/event</span>
                            </div>
                        @endif

                        <ul class="list-unstyled small text-muted mt-3">
                            @foreach ($car->chauffer_features2 ?? [] as $feature)
                                <li><i class="fas fa-check text-success me-2"></i>{{ $feature }}</li>
                            @endforeach
                        </ul>

                        <a href="javascript:void(0)" onclick="redirectMe('{{ $car->id }}')"
                            class="btn btn-warning w-100 mt-4 fw-bold">View Details & Book</a>
                    </div>
                </div>
                @if ($car->driver)
                    <div class="modal fade" id="driverModal_{{ $car->id }}" tabindex="-1">
                        <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">

                                <!-- Header -->
                                <div class="modal-header">
                                    <h5 class="modal-title">
                                        <i class="fas fa-id-card me-2"></i>Driver Details
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Body -->
                                <div class="modal-body">

                                    <!-- Profile -->
                                    <div class="d-flex align-items-center mb-4">
                                        <img src="{{ $car->driver['photo'] ?? '' }}" class="driver-photo me-3"
                                            alt="Driver Photo">

                                        <div>
                                            <h4 class="mb-1">{{ $car->driver['name'] ?? '' }}</h4>
                                            <span class="badge bg-warning text-dark rating-badge">
                                                ⭐ {{ $car->driver['overall_rating'] ?? '' }}
                                            </span>
                                            <div class="text-muted mt-1">
                                                <i
                                                    class="fas fa-briefcase me-1"></i>{{ $car->driver['years_experience'] ?? '' }}
                                                Years Experience
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Details Grid -->
                                    <div class="row g-3">

                                        <div class="col-md-6">
                                            <div><span class="info-label">Special Skills:</span>
                                                {{ $car->driver['special_skills'] ?? '' }}</div>
                                            <div><span class="info-label">Primary Language:</span>
                                                {{ $car->driver['primary_language'] ?? '' }}</div>
                                            <div><span class="info-label">Additional Languages:</span>
                                                {{ $car->driver['additional_languages'] ?? '' }}</div>
                                            <div><span class="info-label">Area Expertise:</span>
                                                {{ $car->driver['area_expertise'] ?? '' }}</div>
                                            <div><span class="info-label">Tour Guide Experience:</span>
                                                {{ $car->driver['tour_guide_experience'] ?? '' }}</div>
                                            <div><span class="info-label">Driving Licenses:</span>
                                                {{ $car->driver['driving_licenses'] ?? '' }}</div>
                                            <div><span class="info-label">Certifications:</span>
                                                {{ $car->driver['certifications'] ?? '' }}</div>
                                        </div>

                                        <div class="col-md-6">
                                            <div><span class="info-label">Work Hours:</span>
                                                {{ $car->driver['work_hours'] ?? '' }}</div>
                                            <div><span class="info-label">Days Off:</span>
                                                {{ $car->driver['days_off'] ?? '' }}</div>
                                            <div><span class="info-label">Working Hours:</span>
                                                {{ $car->driver['working_hours'] ?? '' }}</div>
                                            <div><span class="info-label">Driver Breaks:</span>
                                                {{ $car->driver['driver_breaks'] ?? '' }}</div>
                                            <div><span class="info-label">Accommodation:</span>
                                                {{ $car->driver['accommodation'] ?? '' }}</div>
                                            <div><span class="info-label">Food:</span> {{ $car->driver['food'] ?? '' }}
                                            </div>
                                        </div>

                                    </div>

                                    <hr>

                                    <!-- Contact -->
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <i class="fas fa-phone-alt me-2 text-primary"></i>
                                            {{ $car->driver['phone_number'] ?? '' }}
                                        </div>
                                        <div class="col-md-6">
                                            <i class="fas fa-envelope me-2 text-primary"></i>
                                            {{ $car->driver['email_address'] ?? '' }}
                                        </div>
                                    </div>

                                    <hr>

                                    <!-- Other Info -->
                                    <div class="mb-2">
                                        <span class="info-label">Toll & Tax:</span> {{ $car->driver['toll_tax'] ?? '' }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="info-label">Drop-off Location:</span>
                                        {{ $car->driver['dropoff_location'] ?? '' }}
                                    </div>
                                    <div class="mb-2">
                                        <span class="info-label">Customer Review:</span>
                                        <span class="text-danger">{{ $car->driver['customer_reviews'] ?? '' }}</span>
                                    </div>
                                    <div class="mb-2">
                                        <span class="info-label">Miscellaneous:</span>
                                        {{ $car->driver['miscellaneous'] ?? '' }}
                                    </div>

                                </div>

                                <!-- Footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
        @endforeach

        @if ($cars->count() == 0)
            <div class="my-5">
                <h4 class="text-center">No Cars Matched.</h4>
            </div>
        @endif
    </div>

    <div>
        {{ $cars->links() }}
    </div>

    <style>
        .vehicle-card {
            box-shadow: 0 .125rem .25rem rgba(var(--bs-body-color-rgb), .3) !important;
        }
    </style>
@endsection

@push('scripts')
    <script>
        function filterCars(key, val) {
            const url = new URL(window.location.href);
            url.searchParams.set(key, val);
            window.location = url.toString();
        }

        function redirectMe(carId) {
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.single', '%id%') }}'.replace('%id%', carId);
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endpush
