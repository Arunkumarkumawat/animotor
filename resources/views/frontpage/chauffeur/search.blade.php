@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background: #f7f8fb;
        }

        .form-card {
            background: white;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        }

        .trip-option {
            border: 1px solid #ddd;
            padding: 16px;
            border-radius: 10px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: 0.2s;
        }

        .trip-option.active {
            border-color: #0d6efd;
            background: #e9f2ff;
        }

        .trip-option:hover {
            border-color: #0d6efd;
        }

        .hidden {
            display: none;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container my-5" style="max-width: 900px;">
        <h2 class="fw-bold mb-1">Book Executive Chauffeur</h2>
        <p class="text-muted mb-4">Select your trip type and provide journey details</p>

        <!-- Trip Type Selection -->
        <div class="form-card mb-4">
            <h5 class="mb-3 fw-bold">Trip Type</h5>

            <div id="tripOptions">

                <div class="trip-option" data-target="airport" onclick="tripTypeChanged(this)">
                    <div class="form-check">
                        <input class="form-check-input trip-radio" type="radio" name="trip_type" value="airport">
                        <label class="form-check-label fw-bold">Airport Transfer</label>
                        <div class="small text-muted">Airport pickups and drop-offs</div>
                    </div>
                </div>

                <div class="trip-option" data-target="p2p" onclick="tripTypeChanged(this)">
                    <div class="form-check">
                        <input class="form-check-input trip-radio" type="radio" name="trip_type" value="p2p">
                        <label class="form-check-label fw-bold">Point-to-Point</label>
                        <div class="small text-muted">City or local trips</div>
                    </div>
                </div>

                <div class="trip-option" data-target="hourly" onclick="tripTypeChanged(this)">
                    <div class="form-check">
                        <input class="form-check-input trip-radio" type="radio" name="trip_type" value="hourly">
                        <label class="form-check-label fw-bold">Hourly Hire</label>
                        <div class="small text-muted">Hire by the hour (min. 2 hours)</div>
                    </div>
                </div>

                <div class="trip-option" data-target="event" onclick="tripTypeChanged(this)">
                    <div class="form-check">
                        <input class="form-check-input trip-radio" type="radio" name="trip_type" value="event">
                        <label class="form-check-label fw-bold">Event Hire</label>
                        <div class="small text-muted">Weddings, corporate events, parties</div>
                    </div>
                </div>

                <div class="trip-option" data-target="intercity" onclick="tripTypeChanged(this)">
                    <div class="form-check">
                        <input class="form-check-input trip-radio" type="radio" name="trip_type" value="intercity">
                        <label class="form-check-label fw-bold">Long-Distance / Intercity</label>
                        <div class="small text-muted">Travel between cities</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Journey Details Forms -->
        <div class="form-card">
            <h5 class="fw-bold mb-3">Journey Details</h5>

            <div class="row g-3 mb-2">
                <div class="col-md-6">
                    <label>Date *</label>
                    <input type="date" name="date" min="{{ date('Y-m-d') }}" class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Time *</label>
                    <input type="text" name="time" class="form-control timepicker">
                </div>

                <div class="col-md-12">
                    <label>Number of Passengers *</label>
                    <select class="form-select" name="passengers">
                        <option value="1">1 passenger</option>
                        <option value="2">2 passengers</option>
                        <option value="3">3 passengers</option>
                        <option value="4">4 passenger</option>
                        <option value="5">5 passengers</option>
                        <option value="6">6+ passengers</option>
                    </select>
                </div>
            </div>

            <!-- Airport Transfer -->
            <div id="form-airport" class="hidden">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label>Direction *</label>
                        <select class="form-select" name="airport_direction" onchange="airportDirChanged(this.value)">
                            <option value="a2c">Airport to City</option>
                            <option value="c2a">City to Airport</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label>Airport *</label>
                        <input type="text" name="airport_location" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Terminal (optional)</label>
                        <input type="text" name="airport_terminal" class="form-control" placeholder="e.g. Terminal 5">
                    </div>

                    <div class="col-md-6">
                        <label>Flight Number (optional)</label>
                        <input type="text" name="airport_flight_number" class="form-control" placeholder="e.g. BA123">
                    </div>

                    <div class="col-md-12 airport-dir hidden" data-dir="c2a">
                        <label>Pickup Location *</label>
                        <input type="text" name="airport_pickup_location" class="form-control" placeholder="Enter pickup address">
                    </div>

                    <div class="col-md-12 airport-dir hidden" data-dir="a2c">
                        <label>Drop-off Location *</label>
                        <input type="text" name="airport_dropoff_location" class="form-control" placeholder="Enter dropoff address">
                    </div>
                </div>
            </div>

            <!-- Point to Point -->
            <div id="form-p2p" class="hidden">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label>Pickup Location *</label>
                        <input type="text" name="p2p_pickup_location" class="form-control" placeholder="Enter pickup address">
                    </div>
                    <div class="col-md-12">
                        <label>Drop-off Location *</label>
                        <input type="text" name="p2p_dropoff_location" class="form-control" placeholder="Enter destination address">
                    </div>
                    <div class="col-md-12">
                        <label>Trip Direction</label><br>
                        <input type="radio" name="p2p_dir" value="one_way" checked> One-Way
                        <input type="radio" name="p2p_dir" value="return" class="ms-3"> Return Trip
                    </div>
                </div>
            </div>

            <!-- Hourly Hire -->
            <div id="form-hourly" class="hidden">
                <div class="row g-3">
                    <div class="col-12">
                        <label>City / Area *</label>
                        <input type="text" class="form-control" name="hourly_city" placeholder="Enter city or area">
                    </div>

                    <div class="col-12">
                        <label>Duration *</label>
                        <select class="form-select" name="hourly_duration">
                            <option value="3">3 hours</option>
                            <option value="4">4 hours</option>
                            <option value="5">5 hours</option>
                            <option value="6">6 hours</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Event Hire -->
            <div id="form-event" class="hidden">
                <div class="row g-3">
                    <div class="col-12">
                        <label>Event Type *</label>
                        <select class="form-select" name="event_type">
                            <option value="">Select event type</option>
                            <option value="corporate">Corporate Event</option>
                            <option value="wedding">Wedding</option>
                            <option value="party">Party</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="col-12">
                        <label>Event Location *</label>
                        <input type="text" name="event_location" class="form-control" placeholder="Enter event address">
                    </div>

                    <div class="col-md-6">
                        <label>Event Start Time *</label>
                        <input type="text" name="event_start_time" class="form-control timepicker" placeholder="Enter event start time">
                    </div>

                    <div class="col-md-6">
                        <label>Approximate End Time *</label>
                        <input type="text" name="event_end_time" class="form-control timepicker" placeholder="Enter event end time">
                    </div>
                </div>
            </div>

            <!-- Intercity -->
            <div id="form-intercity" class="hidden">
                <div class="row g-3">
                    <div class="col-12">
                        <label>Pickup City *</label>
                        <input type="text" name="long_pickup_city" class="form-control" placeholder="Enter pickup city">
                    </div>  

                    <div class="col-12">
                        <label>Drop-off City *</label>
                        <input type="text" name="long_dropoff_city" class="form-control" placeholder="Enter destination city">
                    </div>

                    <div class="col-12">
                        <label>Additional Notes (optional)</label>
                        <input type="text" name="long_additional_notes" class="form-control" placeholder="Approx distance or duration">
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Bottom Buttons -->
        <div class="mt-4 d-flex gap-2 justify-content-between">
            <a href="{{ url('/') }}" class="btn w-100 btn-secondary" >Cancel</a>
            <button class="btn w-100 btn-primary" type="button" onclick="submitForm()">Continue <i class="fas fa-arrow-right"></i></button>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&libraries=places"></script>

    <script>
        $(document).ready(function() {
            $('.timepicker').timepicker({
                timeFormat: 'hh:mm p',
                interval: 30,
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            // Initialize Google Places autocomplete
            new google.maps.places.Autocomplete(
                document.querySelector('[name="airport_location"]'), {
                    types: ['airport'],
                    componentRestrictions: {
                        country: ['uk']
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="airport_pickup_location"]'), {
                    types: ['address'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="airport_dropoff_location"]'), {
                    types: ['address'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="p2p_pickup_location"]'), {
                    types: ['address'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="p2p_dropoff_location"]'), {
                    types: ['address'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="p2p_dropoff_location"]'), {
                    types: ['address'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="hourly_city"]'), {
                    types: ['locality', 'sublocality', 'postal_code'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="event_location"]'), {
                    types: ['address'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="long_pickup_city"]'), {
                    types: ['locality'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );

            new google.maps.places.Autocomplete(
                document.querySelector('[name="long_dropoff_city"]'), {
                    types: ['locality'],
                    componentRestrictions: {
                        country: ['uk'],
                    }
                }
            );
        });
    </script>

    <script>
        const forms = {
            airport: document.getElementById("form-airport"),
            p2p: document.getElementById("form-p2p"),
            hourly: document.getElementById("form-hourly"),
            event: document.getElementById("form-event"),
            intercity: document.getElementById("form-intercity")
        };

        function tripTypeChanged(opt){
            document.querySelectorAll(".trip-option").forEach(x => x.classList.remove("active"));
            opt.classList.add("active");

            const target = opt.getAttribute("data-target");

            Object.values(forms).forEach(f => f.classList.add("hidden"));
            forms[target].classList.remove("hidden");
            opt.querySelector('input[name="trip_type"]').checked = true;
        }

        function airportDirChanged(dir){
            document.querySelectorAll(".airport-dir").forEach(x => x.classList.add("hidden"));
            document.querySelector(".airport-dir[data-dir='" + dir + "']").classList.remove("hidden");
        }

        tripTypeChanged(document.querySelector(".trip-option[data-target='airport']"));
        airportDirChanged('a2c');

        function submitForm(){
            const searchParams = new URLSearchParams();

            const tripType = document.querySelector('input[name="trip_type"]:checked').value;
            const date = document.querySelector('input[name="date"]').value;
            const time = document.querySelector('input[name="time"]').value;
            const passengers = document.querySelector('select[name="passengers"]').value;

            if(tripType == '' || date == '' || time == '' || passengers == ''){
                alert('Please fill all the required fields');
                return;
            }

            searchParams.append('trip_type', tripType);
            searchParams.append('date', date);
            searchParams.append('time', time);
            searchParams.append('passengers', passengers);
            
            if(tripType == 'airport'){
                const dir = document.querySelector('[name="airport_direction"]').value;
                const airport = document.querySelector('input[name="airport_location"]').value;
                const terminal = document.querySelector('input[name="airport_terminal"]').value;
                const flight = document.querySelector('input[name="airport_flight_number"]').value;

                let dropoff = '';
                let pickup = '';
                if(dir == 'a2c'){
                    pickup = airport;
                    dropoff = document.querySelector('input[name="airport_dropoff_location"]').value;
                } else {
                    pickup = document.querySelector('input[name="airport_pickup_location"]').value;
                    dropoff = airport;
                }

                if(dir == '' || pickup == '' || dropoff == ''){
                    alert('Please fill all the required fields');
                    return;
                }

                searchParams.append('dir', dir);
                searchParams.append('pickup', pickup);
                searchParams.append('dropoff', dropoff);

                if(terminal){
                    searchParams.append('terminal', terminal);
                }

                if(flight){
                    searchParams.append('flight', flight);
                }
            } else if(tripType == 'p2p'){
                const dir = document.querySelector('[name="p2p_dir"]').value;
                const pickup = document.querySelector('input[name="p2p_pickup_location"]').value;
                const dropoff = document.querySelector('input[name="p2p_dropoff_location"]').value;

                if(dir == '' || pickup == '' || dropoff == ''){
                    alert('Please fill all the required fields');
                    return;
                }

                searchParams.append('dir', dir);
                searchParams.append('pickup', pickup);
                searchParams.append('dropoff', dropoff);
            } else if(tripType == 'hourly'){
                const city = document.querySelector('input[name="hourly_city"]').value;
                const duration = document.querySelector('select[name="hourly_duration"]').value;

                if(city == '' || duration == ''){
                    alert('Please fill all the required fields');
                    return;
                }

                searchParams.append('city', city);
                searchParams.append('duration', duration);
            } else if(tripType == 'event'){
                const type = document.querySelector('[name="event_type"]').value;
                const location = document.querySelector('input[name="event_location"]').value;
                const startTime = document.querySelector('input[name="event_start_time"]').value;
                const endTime = document.querySelector('input[name="event_end_time"]').value;

                if(type == '' || location == '' || startTime == '' && endTime == ''){
                    alert('Please fill all the required fields');
                    return;
                }

                searchParams.append('type', type);
                searchParams.append('dropoff', location);
                searchParams.append('startTime', startTime);
                searchParams.append('endTime', endTime);
            } else if(tripType == 'intercity'){
                const pickup = document.querySelector('input[name="long_pickup_city"]').value;
                const dropoff = document.querySelector('input[name="long_dropoff_city"]').value;
                const notes = document.querySelector('input[name="long_additional_notes"]').value;

                if(pickup == '' || dropoff == ''){
                    alert('Please fill all the required fields');
                    return;
                }

                searchParams.append('pickup', pickup);
                searchParams.append('dropoff', dropoff);

                if(notes){
                    searchParams.append('notes', notes);
                }
            }

            window.location = '{{ route('frontpage.chauffeur.list') }}?'+searchParams.toString();
        }
    </script>
@endpush
