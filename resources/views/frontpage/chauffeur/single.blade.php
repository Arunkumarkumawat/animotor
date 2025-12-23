@extends('frontpage.layout')

@section('style')
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
            height: 130px;
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
                        @foreach ($car->vehicle_photos as $photo)
                            <div class="col-3">
                                <img src="{{ $photo }}" class="my-custom-slider thumb active w-100">
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- CAR INFO -->
                <div class="card p-3 mt-4">
                    <span class="badge-exe mb-2 d-inline-block">{{ $car->type }}</span>
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">{{ $car->title }}</h5>
                        <div>
                            <span class="price">{{ amt($car->hourly_rate) }}</span>
                            <small class="text-muted">/hour</small>
                        </div>
                    </div>

                    <ul class="nav nav-tabs mt-3 w-100">
                        <li class="nav-item flex-fill text-center"><a class="nav-link active" data-bs-toggle="tab"
                                href="#f">Features</a>
                        </li>
                        <li class="nav-item flex-fill text-center"><a class="nav-link" data-bs-toggle="tab"
                                href="#a">Addons</a></li>
                        <li class="nav-item flex-fill text-center"><a class="nav-link" data-bs-toggle="tab"
                                href="#s">Specifications</a></li>
                    </ul>

                    <div class="tab-content pt-3">
                        <div id="f" class="tab-pane fade show active">
                            <div class="row">
                                @foreach ($car->chauffer_features1 ?? [] as $feature)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $feature }}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="a" class="tab-pane fade small">
                            <div class="row">
                                @foreach ($car->chauffer_addons ?? [] as $addon)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $addon['name'] }} ({{ amt($addon['price']) }})
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div id="s" class="tab-pane fade small">
                            <div class="row">
                                @if ($car->make)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->make }}
                                    </div>
                                @endif
                                @if ($car->model)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->model }}
                                    </div>
                                @endif
                                @if ($car->type)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->type }}
                                    </div>
                                @endif
                                @if ($car->year)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->year }}
                                    </div>
                                @endif
                                @if ($car->color)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->color }}
                                    </div>
                                @endif
                                @if ($car->gear)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->gear }}
                                    </div>
                                @endif
                                @if ($car->door)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->door }} Doors
                                    </div>
                                @endif
                                @if ($car->body_type)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->body_type }}
                                    </div>
                                @endif
                                @if ($car->fuel_type)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->fuel_type }}
                                    </div>
                                @endif
                                @if ($car->engine_size)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->engine_size }}
                                    </div>
                                @endif
                                @if ($car->seats)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->seats }} Seats
                                    </div>
                                @endif
                                @if ($car->bags)
                                    <div class="col-md-4 px-4">
                                        <i class="fa fa-check-circle text-success"></i>
                                        {{ $car->bags }} Small Bags
                                    </div>
                                @endif
                                @if ($car->bags_large)
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
                        <div>
                            <img src="{{ isset($car->driver['photo']) ? $car->driver['photo'] : 'https://placehold.co/600x400' }}"
                                class="avatar me-3" style="min-width:100px; height:100px; object-fit:cover">
                        </div>
                        <div>
                            <a href="javascript:void(0)" class="text-primary" data-bs-toggle="modal" data-bs-target="#driverModal"><strong class="mb-2">
                                {{ isset($car->driver['name']) ? $car->driver['name'] : '-' }}
                            </strong></a>
                            <span class="badge bg-success ms-2">Licensed</span>
                            <p class="small mb-1">⭐
                                {{ isset($car->driver['overall_rating']) ? $car->driver['overall_rating'] : '0/5' }}</p>
                            <p class="small text-muted">
                                {{ isset($car->driver['years_experience']) ? $car->driver['years_experience'] . '+' : 0 }}
                                years serving VIP & corporate clients.
                                {{ isset($car->driver['special_skills']) ? $car->driver['special_skills'] : '' }}
                            </p>
                            <p class="small mb-0">Languages:
                                {{ isset($car->driver['primary_language']) ? $car->driver['primary_language'] : '' }},
                                {{ isset($car->driver['additional_languages']) ? $car->driver['additional_languages'] : '' }}
                                | {{ isset($car->driver['work_hours']) ? $car->driver['work_hours'] : '' }} Available</p>
                        </div>
                    </div>
                </div>

                <!-- OPERATOR -->
                <div class="card p-3 mt-4">
                    <h6 class="fw-bold mb-3">Licensed Operator</h6>
                    <div class="row small">
                        <div class="col-md-4 mb-2"><strong>Company</strong><br>{{ $car->company->name }}</div>
                        <div class="col-md-4 mb-2">
                            <strong>License</strong><br>{{ isset($car->driver['driving_licenses']) ? $car->driver['driving_licenses'] : '-' }}
                        </div>
                        <div class="col-md-4 mb-2"><strong>Fleet</strong><br>{{ $car->company->cars()->count() }} Vehicles
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">
                <div class="card p-3 h-100">
                    <h6 class="fw-bold mb-3">Book This Chauffeur</h6>

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

                    <hr>

                    <ul class="small">
                        @foreach ($car->chauffer_features2 ?? [] as $feature)
                            <li>✓ {{ $feature }}</li>
                        @endforeach
                    </ul>

                    <div>
                        <br>
                        @auth
                            <button type="button" onclick="redirectMe()" class="btn btn-info btn-book w-100 text-white"
                                onclick="">Select Package & Continue</button>
                        @else
                            <button type="button" data-bs-toggle="modal" data-bs-target="#loginModal"
                                class="btn btn-info btn-book w-100 text-white" onclick="">Select Package &
                                Continue</button>
                        @endauth
                        <br>
                    </div>

                    <p class="text-center small text-muted mt-2">Free cancellation up to 24 hours</p>
                </div>
            </div>
        </div>
    </div>

    @if($car->driver)
    <div class="modal fade" id="driverModal" tabindex="-1">
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
                        <img src="{{ $car->driver['photo'] ?? '' }}"
                            class="driver-photo me-3" alt="Driver Photo">

                        <div>
                            <h4 class="mb-1">{{ $car->driver['name'] ?? '' }}</h4>
                            <span class="badge bg-warning text-dark rating-badge">
                                ⭐ {{ $car->driver['overall_rating'] ?? '' }}
                            </span>
                            <div class="text-muted mt-1">
                                <i class="fas fa-briefcase me-1"></i>{{ $car->driver['years_experience'] ?? '' }} Years Experience
                            </div>
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div class="row g-3">

                        <div class="col-md-6">
                            <div><span class="info-label">Special Skills:</span> {{ $car->driver['special_skills'] ?? '' }}</div>
                            <div><span class="info-label">Primary Language:</span> {{ $car->driver['primary_language'] ?? '' }}</div>
                            <div><span class="info-label">Additional Languages:</span> {{ $car->driver['additional_languages'] ?? '' }}</div>
                            <div><span class="info-label">Area Expertise:</span> {{ $car->driver['area_expertise'] ?? '' }}</div>
                            <div><span class="info-label">Tour Guide Experience:</span> {{ $car->driver['tour_guide_experience'] ?? '' }}</div>
                            <div><span class="info-label">Driving Licenses:</span> {{ $car->driver['driving_licenses'] ?? '' }}</div>
                            <div><span class="info-label">Certifications:</span> {{ $car->driver['certifications'] ?? '' }}</div>
                        </div>

                        <div class="col-md-6">
                            <div><span class="info-label">Work Hours:</span> {{ $car->driver['work_hours'] ?? '' }}</div>
                            <div><span class="info-label">Days Off:</span> {{ $car->driver['days_off'] ?? '' }}</div>
                            <div><span class="info-label">Working Hours:</span> {{ $car->driver['working_hours'] ?? '' }}</div>
                            <div><span class="info-label">Driver Breaks:</span> {{ $car->driver['driver_breaks'] ?? '' }}</div>
                            <div><span class="info-label">Accommodation:</span> {{ $car->driver['accommodation'] ?? '' }}</div>
                            <div><span class="info-label">Food:</span> {{ $car->driver['food'] ?? '' }}</div>
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
                        <span class="info-label">Drop-off Location:</span> {{ $car->driver['dropoff_location'] ?? '' }}
                    </div>
                    <div class="mb-2">
                        <span class="info-label">Customer Review:</span>
                        <span class="text-danger">{{ $car->driver['customer_reviews'] ?? '' }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="info-label">Miscellaneous:</span> {{ $car->driver['miscellaneous'] ?? '' }}
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

    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="login-tab" data-bs-toggle="tab" data-bs-target="#login"
                            type="button" role="tab" aria-controls="login" aria-selected="true">Login</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register"
                            type="button" role="tab" aria-controls="register"
                            aria-selected="false">Register</button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade p-4 show active" id="login" role="tabpanel"
                        aria-labelledby="login-tab">
                        <form method="POST" action="{{ route('last-stage-auth') }}">
                            @csrf
                            <input type="hidden" name="type" value="login">

                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    required>
                            </div>
                            <button type="button" class="btn btn-primary w-100" onclick="login(this)">Login</button>
                        </form>
                    </div>
                    <div class="tab-pane fade p-4" id="register" role="tabpanel" aria-labelledby="register-tab">
                        <form method="POST" action="{{ route('last-stage-auth') }}">
                            @csrf
                            <input type="hidden" name="type" value="register">

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="First Name"
                                        name="first_name" value="{{ old('first_name') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Last Name" name="last_name"
                                        value="{{ old('last_name') }}" required>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}" required>
                            </div>
                            <div class="mb-3">
                                <input type="tel" class="form-control" placeholder="Phone Number" name="phone"
                                    value="{{ old('phone') }}" required>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="password" class="form-control" placeholder="Password" name="password"
                                        required autocomplete="new-password">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="password" class="form-control" placeholder="Confirm Password"
                                        name="password_confirmation" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Address" name="address"
                                        value="{{ old('address') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="ZIP Code" name="zip"
                                        value="{{ old('zip') }}" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="City" name="city"
                                        value="{{ old('city') }}" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <input type="text" class="form-control" placeholder="Country" name="country"
                                        value="{{ old('country') }}" required>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary w-100" onclick="login(this)">Register</button>
                        </form>
                    </div>
                </div>
                <div>
                    <button type="button" class="btn btn-warning w-100" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="otpModal" tabindex="-1" aria-labelledby="otpModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="{{ route('last-stage-auth') }}">
                    @csrf
                    <input type="hidden" name="type" value="verify_otp">
                    <input type="hidden" name="email" id="hidden_email">

                    <div class="modal-header">
                        <h5 class="modal-title" id="otpModalLabel">Enter OTP</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <input type="number" minlength="6" maxlength="6" class="form-control" placeholder="OTP"
                                name="otp" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="login(this)">Verify</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .swal2-container.swal2-center.swal2-backdrop-show {
            z-index: 9999;
        }

        .my-custom-slider {
            cursor: pointer;
        }
    </style>

    <script>
        function continueToCheckout() {
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            var package = jQuery('[name="package"]:checked').val();
            if (!package) {
                return;
            }

            params.append('package', package);
            window.location = '{{ route('frontpage.chauffeur.details', $car->id) }}?' + params.toString();
        }

        function login(element) {
            var form = jQuery(element).parents('form').get(0);

            if (!form.checkValidity()) {
                form.reportValidity();
                return;
            }

            $.ajax({
                url: form.getAttribute('action'),
                type: 'POST',
                data: new FormData(form),
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status === 1) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            showConfirmButton: true
                        });

                        if ('verify' in response) {
                            jQuery('#otpModal').modal('show');
                            jQuery('#hidden_email').val(response.email);

                            jQuery('#loginModal').modal('hide');
                        } else {
                            setTimeout(function() {
                                redirectMe();
                            }, 2000);
                        }
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.message,
                            showConfirmButton: true
                        });
                    }
                },
                error: function(xhr) {
                    const errorMessage = xhr.responseJSON?.message || 'An error occurred. Please try again.';
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errorMessage,
                        showConfirmButton: true
                    });
                }
            });
        }

        function redirectBack() {
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.list') }}';
            window.location.href = url + '?' + params.toString();
        }

        function redirectMe() {
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.details', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endsection

@push('scripts')
    <script>
        jQuery('.my-custom-slider').on('click', function() {
            const src = jQuery(this).attr('src');
            jQuery('.main-img').attr('src', src);
        })
    </script>
@endpush
