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
                    class="btn {{ request()->get('type') == $carType->id ? 'btn-dark' : 'btn-outline-dark' }} btn-sm"
                    onclick="filterCars('type', '{{ $carType->id }}')">{{ $carType->name }}</button>
            @endforeach
        </div>
    </div>

    <!-- Vehicle List -->
    <div class="container mt-4">
        @foreach ($cars as $car)
            <!-- Card 1 -->
            <div class="vehicle-card shadow-sm p-3 mb-4 bg-white rounded">

                <div class="row">
                    <!-- Image -->
                    <div class="col-md-4">
                        <img src="{{ $car->image }}" class="img-fluid rounded" style="width: 100%;" alt="">
                    </div>

                    <!-- Middle Content -->
                    <div class="col-md-5">
                        <span class="badge bg-warning text-dark mb-2">Executive Saloon</span>
                        <h4 class="fw-bold">{{ $car->make }} {{ $car->model }}</h4>
                        <p class="text-muted">{{ $car->year }}</p>

                        <div class="d-flex gap-4 mb-2">
                            <span><i class="fas fa-users me-1"></i> {{ $car->seats }} seats</span>
                            <span><i class="fas fa-suitcase me-1"></i> {{ $car->bags }} Small bags</span>
                            <span><i class="fas fa-suitcase me-1"></i> {{ $car->bags_large }} Large bags</span>
                        </div>

                        <!-- Features List -->
                        <ul class="vehicle-features">
                            @if ($car->top_pick)
                                <li><i class="fas fa-crown text-warning me-1"></i> Top Pick</li>
                            @endif
                            @if ($car->ideal_for_family)
                                <li><i class="fas fa-users text-info me-1"></i> Ideal for Family</li>
                            @endif
                            @if ($car->free_cancellation)
                                <li><i class="fas fa-wifi text-success me-1"></i> Free Cancellation *</li>
                            @endif
                            @if ($car->collision_damage_waiver)
                                <li><i class="fas fa-shield-alt text-primary me-1"></i> Collision Damage Waiver</li>
                            @endif
                            @if ($car->theft_protection)
                                <li><i class="fas fa-shield-alt text-danger me-1"></i> Theft Protection</li>
                            @endif
                            @if ($car->unlimited_mileage)
                                <li><i class="fas fa-road text-info me-1"></i> Unlimited Mileage</li>
                            @endif
                        </ul>

                        <hr>

                        <!-- Chauffeur Info -->
                        <div class="d-flex align-items-center">
                            <img src="{{ $car->driver ? $car->driver['photo'] : 'https://via.placeholder.com/60' }}"
                                class="rounded-circle me-3" alt="">
                            <div>
                                <p class="text-warning mb-2"><i class="fas fa-user-tie me-1"></i> Your Professional
                                    Chauffeur</p>
                                <h6 class="fw-bold mb-2">{{ $car->driver ? $car->driver['name'] : '-' }} &nbsp; <span
                                        class="badge bg-success">Licensed Operator</span></h6>
                                <div class="text-muted small mb-2">
                                    ⭐ {{ $car->driver ? $car->driver['overall_rating'] ?? '0' : '0' }} ·
                                    {{ $car->driver ? $car->driver['years_experience'] ?? '0' : '0' }} years experience
                                    <br>
                                    <i class="fas fa-language"></i>
                                    {{ $car->driver ? $car->driver['primary_language'] ?? 'English' : 'English' }}{{ $car->driver && $car->driver['additional_languages'] ? ', ' . $car->driver['additional_languages'] : '' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pricing -->
                    <div class="col-md-3 border-start">
                        <h6 class="fw-bold">Pricing</h6>

                        @if(request()->get('trip_type') == 'hourly')
                        <div class="d-flex justify-content-between">
                            <span>Hourly</span>
                            <span class="fw-bold">{{ amt($car->hourly_rate) }}/hour</span>
                        </div>
                        @elseif(request()->get('trip_type') == 'daily')
                        <div class="d-flex justify-content-between">
                            <span>Daily</span>
                            <span class="fw-bold">{{ amt($car->daily_rate) }}/day</span>
                        </div>
                        @elseif(request()->get('trip_type') == 'airport')
                        <div class="d-flex justify-content-between">
                            <span>Airport Transfer</span>
                            <span class="fw-bold">{{ amt($car->airport_transfer_rate) }}/tour</span>
                        </div>
                        @elseif(request()->get('trip_type') == 'long')
                        <div class="d-flex justify-content-between">
                            <span>Long Distance</span>
                            <span class="fw-bold">{{ amt($car->long_transfer_rate) }}/tour</span>
                        </div>
                        @elseif(request()->get('trip_type') == 'event')
                        <div class="d-flex justify-content-between">
                            <span>Event</span>
                            <span class="fw-bold">{{ amt($car->event_hire_rate) }}/event</span>
                        </div>
                        @endif

                        <ul class="list-unstyled small text-muted mt-3">
                            @if ($car->top_pick)
                                <li><i class="fas fa-check text-success me-2"></i>Top Pick</li>
                            @endif
                            @if ($car->ideal_for_family)
                                <li><i class="fas fa-check text-success me-2"></i>Ideal for Family</li>
                            @endif
                            @if ($car->free_cancellation)
                                <li><i class="fas fa-check text-success me-2"></i>Free cancellation up to 24 hours</li>
                            @endif
                            @if ($car->collision_damage_waiver)
                                <li><i class="fas fa-check text-success me-2"></i>Collision Damage Waiver</li>
                            @endif
                            @if ($car->theft_protection)
                                <li><i class="fas fa-check text-success me-2"></i>Theft Protection</li>
                            @endif
                            @if ($car->unlimited_mileage)
                                <li><i class="fas fa-check text-success me-2"></i>Unlimited Mileage</li>
                            @endif
                        </ul>

                        <a href="javascript:void(0)" onclick="redirectMe('{{ $car->id }}')" class="btn btn-warning w-100 mt-4 fw-bold">View Details & Book</a>
                    </div>
                </div>
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

        function redirectMe(carId){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.single', '%id%') }}'.replace('%id%', carId);
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endpush
