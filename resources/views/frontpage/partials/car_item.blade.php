<div class="carferrari__item mb__30 car_item  bgwhite p-3 {{ isset($is_highlighted) && $is_highlighted ? 'highlighted-car' : '' }}"
    style="{{ isset($is_highlighted) && $is_highlighted ? 'border: 2px solid #007bff; box-shadow: 0 0 10px rgba(0, 123, 255, 0.3);' : '' }}">
    <div class="d-flex p__10 align-items-center car_section">
        <div class="justify-content-center text-center thumb">
            <a href="{{ url('deal') }}?{{ http_build_query(['car_id' => $car->id] + request()->query()) }}"
                class=" align-items-center">
                <img style=" max-width: 175px;" src="{{ $car->image }}" alt="{{ $car->title }}">
            </a>
        </div>

        <div class="row">
            <div class="col-12">
                <p>
                    @if (\Cache::has('viewed_car-' . $car->id . '-' . str_replace('.', '', request()->ip())))
                        <span class="badge mb-2"
                            style="border: 1px solid #194685 !important; color: #194685 !important;"><i
                                class="fa fa-eye"></i> Viewed</span>
                    @endif
                    @if ($car->top_pick)
                        <span class="badge mb-2" style="background-color: #194685 !important;">Top Pick</span>
                    @endif
                    @if ($car->ideal_for_family)
                        <span class="badge mb-2" style="background-color: #194685 !important;">Ideal for Family</span>
                    @endif
                    @if (!in_array($car->fuel_type, ['Diesel', 'Petrol']))
                        <span class="badge mb-2"
                            style="background-color: #ffb700 !important; color: #000 !important;">{{ $car->fuel_type }}</span>
                    @endif
                </p>
                <h5 class=" pb-3" style="border-bottom: 1px solid rgba(167, 164, 156, 0.59); font-weight:normal;">
                    <span class="text-title">{{ $car->title }}</span>
                    <div class="dropdown" style="display:inline">
                        <button class="btn btn-link" style="text-decoration: none;" type="button" data-bs-toggle="dropdown" aria-expanded="false" wire:click="$set('selected_car_types', ['{{ $car->type }}'])">
                            or similar {{ $car->type }}
                        </button>
                        <div class="dropdown-menu" style="min-width: 300px;background: #2d2b2b;">
                            <h6 class="dropdown-header text-white">What does "or similar" mean?</h6>
                            <p class="p-2 text-white">When you book a car, you can expect to receive a car that is similar to the one you booked. This means that the car will have the same make, model, and year as the one you booked, but it may not be exactly the same car. This is because the car may have been sold or may have been replaced by a newer model.</p>
                        </div>
                    </div>
                </h5>
            </div>

            <div class="col-8">
                <div class="row">
                    <div class="col-6 mt-3">
                        <p><img src="/assets/img/icons/profile.png" />
                            {{ $car?->seats }} seats </p>
                    </div>
                    <div class="col-6 mt-3">
                        <p class="text-capitalize"><img src="/assets/img/icons/gear.png" />
                            {{ $car?->gear }}</p>
                    </div>
                    <div class="col-6 mt-3">
                        <p><img src="/assets/img/icons/bag.png" />
                            {{ $car?->bags ? $car?->bags . ' Small Bags' : 'Not allowed' }}</p>
                    </div>
                    <div class="col-6 mt-3">
                        <p><img src="/assets/img/icons/bag.png" />
                            {{ $car?->bags_large ? $car?->bags_large . ' Large Bags' : 'Not allowed' }}</p>
                    </div>
                    <div class="col-6 mt-3">
                        <p style="font-size:13px;"><img src="/assets/img/icons/signpost.png" />

                            @if ($car->mileage_policy == 'unlimited')
                                Unlimited Mileage
                            @else
                                {{ $car->mileage_limit }} {{ $car->mileage_policy_formatted }}
                            @endif
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-4 mt-3 text-end">
                <p>Price for {{ $days }} {{ $booking_type }}(s)</p>
                <h4 class="mt-2">
                    {{ amt(
                        match ($booking_type) {
                            'day' => $car->daily_rate,
                            'week' => $car->weekly_rate,
                            'month' => $car->monthly_rate,
                        } * $days,
                    ) }}
                </h4>
                <div>
                    <p style="margin-top:0px;">
                        @if ($car->cancellation_policy > 0)
                            Free Cancellation
                        @else
                            No Cancellation
                        @endif
                    </p>
                </div>
            </div>

            <div class="col-6 mt-3">
                <p class="text-primary text-truncate mb-1"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pickup_instructions_{{ $car->id }}">{{ $car?->pickup ? $car?->pickup[0]['location'] : 'Pick-up Not set' }}</a></p>
                <p>{{ $car->model }}</p>
            </div>

            <div class="col-6 mt-3 text-end">
                <a href="{{ url('deal') }}?{{ http_build_query(['car_id' => $car->id] + request()->query()) }}"
                    class="cmn__btn" style="padding:8px 20px 8px">
                    <span>
                        View deal
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-between pt-3" style="border-top: 1px solid rgba(167, 164, 156, 0.59);">
        <div class="">
            <div class="d-flex align-items-center justify-content-center">
                <img style="max-height: 45px; margin-right:8px;"
                    src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}"
                    alt="{{ $car?->company->name }}">
                <div class="review_count">
                    0.0
                </div>
                <div class="review_text">
                    <div class="btn-group">
                        <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                            <p>Good</p>
                            <p>No review yet</p>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-start" style="min-width: 400px; padding: 10px;">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label">Car Condition – 7.5</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%; height: 10px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Car Cleaniness – 7.5</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%; height: 10px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Easy to find – 7.5</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%; height: 10px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Easy to find – 7.5</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%; height: 10px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Easy to find – 7.5</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%; height: 10px;"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Easy to find – 7.5</label>
                                    <div class="progress">
                                        <div class="progress-bar bg-success" style="width: 75%; height: 10px;"></div>
                                    </div>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-between p-3">
            <div>
                <a href="#" class=" text-bold text-primary" data-bs-toggle="modal"
                    data-bs-target="#importantInfoModal{{ $car->id }}">
                    <img src="assets/img/icons/info.png" class="me-3-" alt="cars" /> Important info
                </a>
            </div>

            <div>
                <a href="#" class="text-bold text-primary" data-bs-toggle="modal"
                    data-bs-target="#emailQuoteModal{{ $car->id }}">
                    <img src="assets/img/icons/email.png" class="me-2" alt="cars">
                    Email quote
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Important text modal --}}
<div class="modal fade" id="importantInfoModal{{ $car->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Important Information</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    @if ($car->important_text)
                        <tr>
                            <th>Important Information</th>
                            <td>{!! $car->important_text !!}</td>
                        </tr>
                    @endif
                    @if ($car->requirements)
                        <tr>
                            <th>Driver & License Requirements</th>
                            <td>{!! $car->requirements !!}</td>
                        </tr>
                    @endif
                    @if ($car->security_deposit)
                        <tr>
                            <th>Security Deposit</th>
                            <td>{!! $car->security_deposit !!}</td>
                        </tr>
                    @endif
                    @if ($car->damage_excess)
                        <tr>
                            <th>Damace Excess</th>
                            <td>{!! $car->damage_excess !!}</td>
                        </tr>
                    @endif
                    @if ($car->mileage_text)
                        <tr>
                            <th>Mileage Policy</th>
                            <td>{!! $car->mileage_text !!}</td>
                        </tr>
                    @endif
                </table>

                @include('frontpage.partials.important_info')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

{{-- Email Quote modal --}}
<div class="modal fade" id="emailQuoteModal{{ $car->id }}">
    <div class="modal-dialog modal-lg" style="max-width: 600px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Email Quote</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('send_quote') }}" method="POST">
                @csrf
                <input type="hidden" name="car_id" value="{{ $car->id }}">
                <input type="hidden" name="days" value="{{ $days }}">

                <div class="modal-body">
                    <div class="car-details mb-4">
                        <p class="mb-2">
                            @if (\Cache::has('viewed_car-' . $car->id . '-' . str_replace('.', '', request()->ip())))
                                <span class="badge mb-2"
                                    style="border: 1px solid #194685 !important; color: #194685 !important;"><i
                                        class="fa fa-eye"></i> Viewed</span>
                            @endif
                            @if ($car->top_pick)
                                <span class="badge mb-2" style="background-color: #194685 !important;">Top Pick</span>
                            @endif
                            @if ($car->ideal_for_family)
                                <span class="badge mb-2" style="background-color: #194685 !important;">Ideal for
                                    Family</span>
                            @endif
                            @if (!in_array($car->fuel_type, ['Diesel', 'Petrol']))
                                <span class="badge mb-2"
                                    style="background-color: #ffb700 !important; color: #000 !important;">{{ $car->fuel_type }}</span>
                            @endif
                        </p>
                        <h6 class="mb-3">
                            {{ $car->title }}
                            <div class="dropdown" style="display:inline">
                                <button class="btn btn-link" style="text-decoration: none;" type="button" data-bs-toggle="dropdown" aria-expanded="false" wire:click="$set('selected_car_types', ['{{ $car->type }}'])">
                                    or similar {{ $car->type }}
                                </button>
                                <div class="dropdown-menu" style="min-width: 300px;background: #2d2b2b;">
                                    <h6 class="dropdown-header text-white">What does "or similar" mean?</h6>
                                    <p class="p-2 text-white">When you book a car, you can expect to receive a car that is similar to the one you booked. This means that the car will have the same make, model, and year as the one you booked, but it may not be exactly the same car. This is because the car may have been sold or may have been replaced by a newer model.</p>
                                </div>
                            </div>
                        </h6>
                        <div class="row">
                            <div class="col-6">
                                <p class="mb-2"><img src="/assets/img/icons/profile.png" />
                                    {{ $car?->seats }} seats </p>
                                <p class="text-capitalize mb-2"><img src="/assets/img/icons/gear.png" />
                                    {{ $car?->gear }}</p>
                                <p class="mb-2"><img src="/assets/img/icons/bag.png" />
                                    {{ $car?->bags ? $car?->bags . ' Small Bags' : 'Not allowed' }}</p>
                                    <p class="mb-2"><img src="/assets/img/icons/bag.png" />
                                    {{ $car?->bags_large ? $car?->bags_large . ' Large Bags' : 'Not allowed' }}</p>
                                <p class="mb-2" style="font-size:13px;"><img src="/assets/img/icons/signpost.png" />
                                    @if ($car->mileage_policy == 'unlimited')
                                        Unlimited Mileage
                                    @else
                                        {{ $car->mileage_limit }} {{ $car->mileage_policy_formatted }}
                                    @endif
                                </p>
                                <p class="text-primary text-truncate mb-1"><a
                                        href="" data-bs-toggle="modal" data-bs-target="#pickup_instructions_{{ $car->id }}">{{ $car?->pickup ? $car?->pickup[0]['location'] : 'Pick-up Not set' }}</a></p>
                                <p>{{ $car->model }}</p>
                                <div class="d-flex align-items-center mt-3">
                                    <img style="max-height: 45px; margin-right:8px;"
                                        src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}"
                                        alt="{{ $car?->company->name }}">
                                    <div class="review_count">
                                        0.0
                                    </div>
                                    <div class="review_text">
                                        <p>Good</p>
                                        <p>No review yet</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <img style=" max-width: 175px;" src="{{ $car->image }}"
                                    alt="{{ $car->title }}">
                            </div>
                        </div>
                    </div>

                    <hr>
                    <p class="text-end">Price for {{ $days }} {{ $booking_type }}(s)</p>
                    <h4 class="mt-2 text-end">
                        {{ amt(
                            match ($booking_type) {
                                'day' => $car->daily_rate,
                                'week' => $car->weekly_rate,
                                'month' => $car->monthly_rate,
                            } * $days,
                        ) }}
                    </h4>

                    <div class="form-group mb-3">
                        <label for="emailInput{{ $car->id }}" class="form-label">Your Email Address</label>
                        <input type="email" class="form-control" id="emailInput{{ $car->id }}"
                            name="email" placeholder="Enter your email" required>
                    </div>
                </div>
                <div class="modal-footer flex-column align-items-stretch">
                    <button type="submit" class="btn btn-primary">Send Quote</button>
                    <p class="mt-2 small text-muted">
                        We'll only use this to send you your quote - no spam. Our Privacy Statement explains how we use
                        and protect your personal information.
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="pickup_instructions_{{ $car->id }}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pick-up instruction</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><img src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}"
                        alt="{{ $car->company->name }}" style="max-width:50px;"> Supplied by {{ $car->company->name }}
                </p>

                <br>
                <p>{!! $car->pick_up_instruction !!}</p>
                <br>
                
                @if($car->pickup)
                <p>Pick-up locations</p>
                @foreach($car->pickup as $pickup)
                <p>{{ $pickup['location'] }}</p>
                @endforeach
                @endif

                <br>
                <p>Pick-up time</p>
                <div>
                    @foreach ($car->availabilities()->where('status', 'Active')->get() as $availability)
                        <p>{{ $availability->day_of_week }} / {{ $availability->pickup_hours_start }} -
                            {{ $availability->pickup_hours_end }}</p>
                    @endforeach
                </div>

                @if($car->pickup)
                    <br>
                    <div id="map_pickup_{{ $car->id }}" style="height: 300px;"></div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@if(!empty($car->pickup))
<script>
    function initMap{{ md5($car->id) }}() {
        const mapPickup = new google.maps.Map(document.getElementById("map_pickup_{{ $car->id }}"), {
            zoom: 14,
            center: {
                lat: {{ $car->pickup[0]['latitude'] }},
                lng: {{ $car->pickup[0]['longitude'] }}
            },
        });

        const pickupCoords = [
            <?php foreach($car->pickup as $point){ ?>
                    { lat: {{ $point['latitude'] }}, lng: {{ $point['longitude'] }} },
            <?php } ?>
        ];

        const bounds1 = new google.maps.LatLngBounds();
        pickupCoords.forEach(coord => {
            new google.maps.Marker({
                position: coord,
                map: mapPickup,
            });
            bounds1.extend(coord); // ✅ Correct — extend using LatLngLiteral
        });

        mapPickup.fitBounds(bounds1);
    }

    document.addEventListener("DOMContentLoaded", function() {
        initMap{{ md5($car->id) }}();
    });
</script>
@endif