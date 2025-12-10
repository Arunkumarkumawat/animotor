@extends('frontpage.layout')

@push('styles')
    <style>
        body {
            background: #f4f6f8
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .06)
        }

        .main-img {
            height: 320px;
            object-fit: cover;
            border-radius: 12px
        }

        @media(max-width:768px) {
            .main-img {
                height: 220px
            }
        }

        .thumb {
            height: 70px;
            object-fit: cover;
            border-radius: 8px;
            border: 2px solid transparent
        }

        .thumb.active {
            border-color: #f5a623
        }

        .price {
            color: #f5a623;
            font-weight: 700
        }

        .badge-exe {
            background: #fff3d6;
            color: #f5a623;
            border-radius: 20px;
            font-size: 12px;
            padding: 4px 10px
        }

        .check i {
            color: #28a745;
            margin-right: 6px
        }

        .btn-book {
            background: #f5a623;
            border: none;
            font-weight: 600
        }

        .btn-book:hover {
            background: #e69a1c
        }

        .avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover
        }
    </style>
@endpush

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container py-4">
        <a href="javascript:void(0)" onclick="redirectBack()" class="text-muted text-decoration-none mb-3 d-inline-block">
            <i class="fa fa-arrow-left me-2"></i> Back to Results
        </a>

        <div class="row g-4">
            <!-- LEFT -->
            <div class="col-lg-8">
                <div class="card p-3">
                    <img src="{{ $car->image }}" class="main-img mb-3" style="max-height:400px; object-fit:cover;">

                    <div class="row g-2">
                        @foreach($car->vehicle_photos as $photo)
                        <div class="col-3">
                            <img src="{{ $photo }}" class="thumb active w-100">
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">
                <div class="card p-3 h-100">
                    <h6 class="fw-bold mb-3">Book This Chauffeur</h6>

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

                    <hr>

                    <ul class="small">
                        <li>Professional chauffeur</li>
                        <li>Fuel & toll included</li>
                        <li>Full insurance</li>
                        <li>Meet & greet</li>
                        <li>Flight monitoring</li>
                    </ul>

                    <div>
                        <br>
                        <button type="button" onclick="redirectMe()" class="btn btn-info btn-book w-100 text-white" onclick="">Select Package & Continue</button>
                        <br>
                    </div>
                    
                    <p class="text-center small text-muted mt-2">Free cancellation up to 24 hours</p>
                </div>
            </div>
        </div>

        <!-- CAR INFO -->
        <div class="card p-3 mt-4">
            <span class="badge-exe mb-1 d-inline-block">Executive Saloon</span>
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0">{{ $car->title }}</h5>
                <div>
                    <span class="price">{{ amt($car->hourly_rate) }}</span>
                    <small class="text-muted">/hour</small>
                </div>
            </div>

            <ul class="nav nav-tabs mt-3">
                <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#f">Features</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#a">Amenities</a></li>
                <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#s">Specifications</a></li>
            </ul>

            <div class="tab-content pt-3">
                <div id="f" class="tab-pane fade show active">
                    <div class="row">
                        @if($car->top_pick)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            Top Pick
                        </div>
                        @endif
                        @if($car->ideal_for_family)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            Ideal for Family
                        </div>
                        @endif
                        @if($car->free_cancellation)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            Free cancellation upto 24 hours before pickup
                        </div>
                        @endif
                        @if($car->collision_damage_waiver)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            Collision Damage Waiver
                        </div>
                        @endif
                        @if($car->theft_protection)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            Theft Protection
                        </div>
                        @endif
                        @if($car->unlimited_mileage)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            Unlimited Mileage
                        </div>
                        @endif
                    </div>
                </div>
                <div id="a" class="tab-pane fade small">
                    <div class="row">
                        @foreach(($car->vehicle_features ?? []) as $feature)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $feature }}
                        </div>
                        @endforeach
                    </div>
                </div>
                <div id="s" class="tab-pane fade small">
                    <div class="row">
                        @if($car->make)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->make }}
                        </div>
                        @endif
                        @if($car->model)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->model }}
                        </div>
                        @endif
                        @if($car->type)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->type }}
                        </div>
                        @endif
                        @if($car->year)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->year }}
                        </div>
                        @endif
                        @if($car->color)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->color }}
                        </div>
                        @endif
                        @if($car->gear)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->gear }}
                        </div>
                        @endif
                        @if($car->door)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->door }} Doors
                        </div>
                        @endif
                        @if($car->body_type)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->body_type }}
                        </div>
                        @endif
                        @if($car->fuel_type)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->fuel_type }}
                        </div>
                        @endif
                        @if($car->engine_size)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->engine_size }}
                        </div>
                        @endif
                        @if($car->seats)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->seats }} Seats
                        </div>
                        @endif
                        @if($car->bags)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->bags }} Small Bags
                        </div>
                        @endif
                        @if($car->bags_large)
                        <div class="col-md-4 px-4">
                            <i class="fa fa-check-circle text-success"></i>
                            {{ $car->bags_large }} Bags
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- CHAUFFEUR -->
        <div class="card p-3 mt-4">
            <h6 class="fw-bold mb-3">Your Professional Chauffeur</h6>
            <div class="d-flex">
                <img src="{{ isset($car->driver['photo']) ? $car->driver['photo'] : 'https://via.placeholder.com/200' }}" class="avatar me-3">
                <div>
                    <strong class="mb-2">{{ isset($car->driver['name']) ? $car->driver['name'] : '-' }}</strong>
                    <span class="badge bg-success ms-2">Licensed</span>
                    <p class="small mb-1">⭐ {{ isset($car->driver['overall_rating']) ? $car->driver['overall_rating'] : '0/5' }}</p>
                    <p class="small text-muted">
                        {{ isset($car->driver['years_experience']) ? ($car->driver['years_experience'] . '+') : 0 }} years serving VIP & corporate clients. {{ isset($car->driver['special_skills']) ? $car->driver['special_skills'] : '' }}
                    </p>
                    <p class="small mb-0">Languages: {{ isset($car->driver['primary_language']) ? $car->driver['primary_language'] : '' }}, {{ isset($car->driver['additional_languages']) ? $car->driver['additional_languages'] : '' }} | {{ isset($car->driver['work_hours']) ? $car->driver['work_hours'] : '' }} Available</p>
                </div>
            </div>
        </div>

        <!-- OPERATOR -->
        <div class="card p-3 mt-4">
            <h6 class="fw-bold mb-3">Licensed Operator</h6>
            <div class="row small">
                <div class="col-md-4 mb-2"><strong>Company</strong><br>{{ $car->company->name }}</div>
                <div class="col-md-4 mb-2"><strong>License</strong><br>{{ isset($car->driver['driving_licenses']) ? $car->driver['driving_licenses'] : '-' }}</div>
                <div class="col-md-4 mb-2"><strong>Fleet</strong><br>{{ $car->company->cars()->count() }} Vehicles</div>
            </div>
        </div>
    </div>

    <script>
        function redirectBack(){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.list') }}';
            window.location.href = url + '?' + params.toString();
        }

        function redirectMe(){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.extras', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endsection