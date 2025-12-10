@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background-color: #f5f6f8;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        }

        .page-wrapper {
            max-width: 1024px;
            margin: 32px auto 48px;
        }

        /* Top back link */
        .back-link {
            font-size: 0.9rem;
            color: #555;
            margin-bottom: 24px;
        }

        .back-link i {
            margin-right: 4px;
            font-size: 0.8rem;
        }

        /* Section headings */
        .section-title {
            font-weight: 700;
            font-size: 1.6rem;
            margin-bottom: 4px;
        }

        .section-subtitle {
            color: #777;
            font-size: 0.95rem;
            margin-bottom: 24px;
        }

        /* Package cards */
        .package-card {
            position: relative;
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            padding: 18px 20px;
            background-color: #fff;
            cursor: pointer;
            transition: all 0.15s ease-in-out;

            /* NEW: make all cards equal height */
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            min-height: 140px;
            /* adjust value to taste */
            width: 100%;
        }

        .package-card.active {
            border-color: #f6a619;
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.05);
            background-color: #fffaf2;
        }

        .package-radio {
            position: absolute;
            top: 16px;
            right: 16px;
        }

        .package-radio input[type="radio"] {
            opacity: 0;
            position: absolute;
        }

        .package-radio .fake-radio {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #d4d4d4;
            display: inline-block;
            box-sizing: border-box;
            position: relative;
            background-color: #fff;
            transition: border-color 0.15s ease-in-out, background-color 0.15s ease-in-out;
        }

        .package-card.active .package-radio .fake-radio {
            border-color: #f29b05;
            background-color: #f29b05;
        }

        .package-card-icon {
            font-size: 1.2rem;
            margin-right: 8px;
            color: #f29b05;
        }

        .package-title {
            font-weight: 600;
            font-size: 1rem;
            margin-bottom: 2px;
        }

        .package-desc {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 0;
        }

        .package-price-label {
            font-size: 0.8rem;
            color: #999;
            margin-top: 12px;
            margin-bottom: 0;
        }

        .package-price {
            font-size: 1.1rem;
            font-weight: 700;
            color: #f29b05;
        }

        /* Config sections */
        .config-card {
            border-radius: 12px;
            border: 1px solid #e0e0e0;
            background-color: #fff;
            padding: 20px 24px;
        }

        .config-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 16px;
        }

        .config-subtitle {
            font-size: 0.9rem;
            color: #777;
            margin-bottom: 12px;
        }

        /* Hourly duration buttons */
        .duration-btn {
            border-radius: 8px;
            border-width: 1px;
            padding: 10px 0;
            font-size: 0.9rem;
            background-color: #fff;
            transition: all 0.15s ease-in-out;
        }

        .duration-btn.active,
        .duration-btn:hover {
            border-color: #f29b05;
            background-color: #fffaf2;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.04);
            color: #333;
        }

        /* Airport transfer info box */
        .airport-info {
            margin-top: 18px;
            border-radius: 8px;
            background-color: #f4f8ff;
            padding: 16px 18px;
            font-size: 0.9rem;
        }

        .airport-info-title {
            font-weight: 600;
            margin-bottom: 8px;
        }

        .airport-info ul {
            padding-left: 18px;
            margin-bottom: 0;
        }

        .airport-info li {
            margin-bottom: 4px;
        }

        /* Continue button */
        .bottom-cta {
            margin-top: 24px;
        }

        .btn-continue {
            width: 100%;
            border-radius: 999px;
            background-image: linear-gradient(90deg, #f29b05, #f5b623);
            border: none;
            font-weight: 600;
            padding: 12px 0;
        }

        .btn-continue:hover {
            filter: brightness(0.96);
        }

        @media (max-width: 767.98px) {
            .page-wrapper {
                margin: 16px auto 32px;
                padding: 0 12px;
            }
        }

        .active p {
            color:unset !important;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="page-wrapper px-3 px-md-0">
        <!-- Back link -->
        <a href="javascript:void(0)" onclick="redirectBack()" class="back-link d-inline-flex align-items-center text-decoration-none">
            <i class="fas fa-chevron-left"></i>
            <span>Back</span>
        </a>

        <!-- Heading -->
        <div class="mb-3">
            <div class="section-title">Select Your Package</div>
            <div class="section-subtitle">Choose the service that best fits your needs</div>
        </div>

        <!-- Package Selection -->
        <div class="row g-3 mb-4">
            <!-- Hourly Hire -->
            <div class="col-md-6">
                <label class="package-card active" data-package="hourly">
                    <div class="d-flex align-items-start">
                        <i class="far fa-clock package-card-icon"></i>
                        <div>
                            <div class="package-title">Hourly Hire</div>
                            <p class="package-desc mb-0">Perfect for short trips and meetings</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->hourly_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="hourly" checked>
                    </div>
                </label>
            </div>

            <!-- Daily Hire -->
            <div class="col-md-6">
                <label class="package-card" data-package="daily">
                    <div class="d-flex align-items-start">
                        <i class="far fa-calendar-alt package-card-icon"></i>
                        <div>
                            <div class="package-title">Daily Hire</div>
                            <p class="package-desc mb-0">Full day at your disposal (up to 10 hours)</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->daily_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="daily">
                    </div>
                </label>
            </div>

            <!-- Airport Transfer -->
            <div class="col-md-6">
                <label class="package-card" data-package="airport">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-plane-departure package-card-icon"></i>
                        <div>
                            <div class="package-title">Airport Transfer</div>
                            <p class="package-desc mb-0">Meet &amp; greet with flight monitoring</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->airport_transfer_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="airport">
                    </div>
                </label>
            </div>

            <!-- Long Distance -->
            <div class="col-md-6">
                <label class="package-card" data-package="long">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-route package-card-icon"></i>
                        <div>
                            <div class="package-title">Long Distance</div>
                            <p class="package-desc mb-0">City-to-city journeys with mileage included</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->long_transfer_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="long">
                    </div>
                </label>
            </div>

            <!-- Event Hire -->
            <div class="col-md-6">
                <label class="package-card" data-package="event">
                    <div class="d-flex align-items-start">
                        <i class="fas fa-glass-cheers package-card-icon"></i>
                        <div>
                            <div class="package-title">Event Hire</div>
                            <p class="package-desc mb-0">Weddings, corporate events, VIP occasions</p>
                        </div>
                    </div>
                    <div class="mt-2">
                        <p class="package-price-label">From</p>
                        <p class="package-price mb-0">{{ amt($car->event_hire_rate) }}</p>
                    </div>
                    <div class="package-radio">
                        <span class="fake-radio"></span>
                        <input type="radio" name="package" value="event">
                    </div>
                </label>
            </div>
        </div>

        <!-- Config: Hourly Hire -->
        <div id="config-hourly" class="mb-4">
            <div class="config-card">
                <div class="config-title">Configure Your Hourly Hire</div>
                <div class="config-subtitle">Select Duration</div>
                <input type="hidden" name="hourly_duration" value="3">
                <div class="row g-2">
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn btn-outline-secondary duration-btn w-100" data-duration="2">2 hours</button>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn btn-outline-secondary duration-btn w-100 active" data-duration="3">3 hours</button>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn btn-outline-secondary duration-btn w-100" data-duration="4">4 hours</button>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn btn-outline-secondary duration-btn w-100" data-duration="5">5 hours</button>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn btn-outline-secondary duration-btn w-100" data-duration="8">8 hours</button>
                    </div>
                    <div class="col-6 col-md-2">
                        <button type="button" class="btn btn-outline-secondary duration-btn w-100" data-duration="custom">Custom</button>
                    </div>
                </div>
                <div class="form-group d-none mt-3" id="custom_hours_container">
                    <input type="number" class="form-control" name="hourly_custom_duration" placeholder="Enter custom hours">
                </div>
            </div>
        </div>

        <!-- Config: Daily Hire -->
        <div id="config-daily" class="mb-4 d-none">
            <div class="config-card">
                <div class="config-title">Configure Your Daily Hire</div>
                <div class="config-subtitle">Select Duration</div>
                <input type="hidden" name="daily_duration" value="3">
                <div class="row g-2">
                    <div class="col-6 col-md-3">
                        <button type="button" class="btn btn-outline-secondary day-duration-btn w-100" data-duration="1">1 day</button>
                    </div>
                    <div class="col-6 col-md-3">
                        <button type="button" class="btn btn-outline-secondary day-duration-btn w-100 active" data-duration="2">2 days</button>
                    </div>
                    <div class="col-6 col-md-3">
                        <button type="button" class="btn btn-outline-secondary day-duration-btn w-100" data-duration="3">3 days</button>
                    </div>
                    <div class="col-6 col-md-3">
                        <button type="button" class="btn btn-outline-secondary day-duration-btn w-100" data-duration="7">7 days</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Config: Airport Transfer -->
        <div id="config-airport" class="mb-4 d-none">
            <div class="config-card">
                <div class="config-title">Configure Your Airport Transfer</div>

                <label class="form-label mb-1">Flight Number <span class="text-muted">(Optional)</span></label>
                <input type="text" class="form-control mb-1" name="flight_number" placeholder="e.g. BA123">

                <div class="config-subtitle">For flight monitoring and adjusted pickup time</div>

                <div class="airport-info">
                    <div class="airport-info-title">Airport Transfer Includes:</div>
                    <ul class="mb-0">
                        @foreach($car->chauffer_airport_terms ?? [] as $term)
                        <li>✓ {{ $term }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Config: Long Distance -->
        <div id="config-long" class="mb-4 d-none">
            <div class="config-card">
                <div class="config-title">Configure Your Long Distance</div>

                <div class="airport-info">
                    <div class="airport-info-title">Long Distance Service Includes:</div>
                    <ul class="mb-0">
                        @foreach($car->chauffer_long_terms ?? [] as $term)
                        <li>✓ {{ $term }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Config: Long Distance -->
        <div id="config-event" class="mb-4 d-none">
            <div class="config-card">
                <div class="config-title">Configure Your Event Hire</div>

                <div class="airport-info">
                    <div class="airport-info-title">Event Hire Includes:</div>
                    <ul class="mb-0">
                        @foreach($car->chauffer_event_terms ?? [] as $term)
                        <li>✓ {{ $term }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <!-- Bottom CTA -->
        <div class="bottom-cta">
            <button type="button" onclick="continueToCheckout()" class="btn btn-continue text-white">
                Continue to Booking Details
            </button>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Switch active package card + config section
        document.querySelectorAll('.package-card').forEach(function(card) {
            card.addEventListener('click', function() {
                // Activate this card
                document.querySelectorAll('.package-card').forEach(function(c) {
                    c.classList.remove('active');
                    c.querySelector('input[type="radio"]').checked = false;
                });
                card.classList.add('active');
                card.querySelector('input[type="radio"]').checked = true;

                const pkg = card.getAttribute('data-package');

                // Show relevant config section
                document.getElementById('config-hourly').classList.add('d-none');
                document.getElementById('config-daily').classList.add('d-none');
                document.getElementById('config-airport').classList.add('d-none');
                document.getElementById('config-long').classList.add('d-none');
                document.getElementById('config-event').classList.add('d-none');

                if (pkg === 'hourly') {
                    document.getElementById('config-hourly').classList.remove('d-none');
                } else if (pkg === 'daily') {
                    document.getElementById('config-daily').classList.remove('d-none');
                } else if (pkg === 'long') {
                    document.getElementById('config-long').classList.remove('d-none');
                } else if (pkg === 'event') {
                    document.getElementById('config-event').classList.remove('d-none');
                } else if (pkg === 'airport') {
                    document.getElementById('config-airport').classList.remove('d-none');
                }
            });
        });

        // Hourly duration button active state
        document.querySelectorAll('.duration-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.duration-btn').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
                jQuery('[name="hourly_duration"]').val( btn.getAttribute('data-duration') );
                if (btn.getAttribute('data-duration') === 'custom') {
                    document.querySelector('#custom_hours_container').classList.remove('d-none');
                } else {
                    document.querySelector('#custom_hours_container').classList.add('d-none');
                }
            });
        });

        // Daily duration button active state
        document.querySelectorAll('.day-duration-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.querySelectorAll('.day-duration-btn').forEach(function(b) {
                    b.classList.remove('active');
                });
                btn.classList.add('active');
                jQuery('[name="daily_duration"]').val( btn.getAttribute('data-duration') );
            });
        });

        function redirectBack(){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            const url = '{{ route('frontpage.chauffeur.single', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }

        function continueToCheckout(){
            const params = new URLSearchParams();

            @foreach ($query as $key => $value)
                params.append('{{ $key }}', '{{ $value }}');
            @endforeach

            var package = jQuery('[name="package"]:checked').val();
            if (!package) {
                return;
            }

            params.append('package', package);

            if (package === 'hourly') {
                var duration = jQuery('[name="hourly_duration"]').val();
                if (!duration) {
                    return;
                }

                params.append('duration', duration);

                if(duration == 'custom'){
                    var custom = jQuery('[name="hourly_custom_duration"]').val();
                    if(!custom){
                        return;
                    }
                    params.append('custom', custom);
                }
            }

            if (package === 'daily') {
                var duration = jQuery('[name="daily_duration"]').val();
                if (!duration) {
                    return;
                }
            }

            if(package == 'airport'){
                var flight = jQuery('[name="airport_flight"]').val();
                if(flight){
                    params.append('flight', flight);
                }
            }
            
            window.location = '{{ route('frontpage.chauffeur.details', $car->id) }}?' + params.toString();
        }
    </script>
@endpush
