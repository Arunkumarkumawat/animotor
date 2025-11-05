<div class="col-xl-4 col-lg-4" id="car_info">
    @if(!request()->routeIs('checkout'))
    <div class="hotel__confirm__invocie car__confirmdetails__right">
        <p class="text-heading">Pick-up and drop-off</p>
        <div class="carferrari__item flex-wrap mt-3 d-flex align-items-center-">
            {{--            <img style="height: 100%" src="/assets/img/icons/dot_v.png" /> --}}
            <div class="carferrari__content">
                <p class="m2">{{ request()->query('pick_up_date') . ', ' . request()->query('pick_up_time') }}</p>
                <p class="mt-1">{{ request()->query('pick_up_location') }}</p>
                <p class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#pickup_instructions">View
                        pick-up instructions</a> </p>

                <p class="mt-2">{{ request()->query('drop_off_date') . ', ' . request()->query('drop_off_time') }}</p>
                <p class="mt-1">{{ request()->query('drop_off_location') }}</p>
                <p class="mt-2"><a href="#" data-bs-toggle="modal" data-bs-target="#dropoff_instructions">View
                        Drop-off instructions</a> </p>
            </div>
        </div>
    </div>
    @endif
    @if(request()->routeIs('protection'))
    <div class="alert alert-success mt-3">
        <h6><i class="fa fa-check"></i> Fast and reliable</h6>
        <p>Over 97% of claims paid out</p>
    </div>
    @endif
    <div class="hotel__confirm__invocie mt-4 car__confirmdetails__right">
        <p class="text-heading">Car price breakdown</p>
        <div class="carferrari__item flex-wrap mt-3 align-items-center-">
            <div class="carferrari__content">
                <div class="d-flex justify-content-between">
                    <p class="m2">Car hire charge per {{ $car->booking_period }}</p>
                    <p class="">{{ amt($car->price) }}</p>
                </div>

                <div class="d-flex mt-2 justify-content-between">
                    <p class="m2">Price for {{ $car->booking_day }} {{ $car->booking_period }}(s)</p>
                    <p class="text-heading_">{{ amt($car->total0) }}</p>
                </div>

                @if (request()->get('book_type') == 'with_full_protection')
                    <div class="d-flex mt-2 justify-content-between">
                        <p class="m2">
                            @php
                                foreach($car->insurance_coverage as $index => $coverage){
                                    if($index == request()->insurance_id){
                                        echo ucwords($coverage['level']) . ' Protection Fee';
                                    }
                                }
                            @endphp
                        </p>
                        <p class="text-heading_">{{ amt($car->insurance_fee ?? 0) }}</p>
                    </div>
                @endif

                <!--@if ($car->tax)-->
                <!--    <div class="d-flex mt-2 justify-content-between">-->
                <!--        <p class="m2">Tax </p>-->
                <!--        <p class="text-heading_">{{ amt($car->tax ?? 0) }}</p>-->
                <!--    </div>-->
                <!--@endif-->

                @if ($car->extra_fees)
                    @foreach ($car->extra_fees as $extra_fee)
                        <div class="d-flex mt-2 justify-content-between">
                            <p class="m2">{{ $extra_fee['name'] }} </p>
                            <p class="text-heading_">{{ amt($extra_fee['amount'] ?? 0) }}</p>
                        </div>
                    @endforeach
                @endif

                <p class="my-3">Prices shown in currency (customer local currency) are approximate. Payment will be charged in Euro, as it is your local currency.</p>
                <br>

                @if ($car->total)
                    <div class="d-flex mt-2 justify-content-between">
                        <p class="m2 text-heading">Total </p>
                        <p class="text-heading">{{ amt($car->total ?? 0) }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
    @if ($car->total)
    <div class="hotel__confirm__invocie mt-4 car__confirmdetails__right">
        <p class="text-heading my-3">This car is costing you just {{ amt($car->total ?? 0) }} - a real bargain...
        </p>
        <p>At that time of year, the average small car at multiple pickup locations costs {{ amt($car->total ?? 0) }}!</p>
    </div>
    @endif

    @if(request()->routeIs('checkout'))
    <div class="hotel__confirm__invocie mt-4 car__confirmdetails__right">
        <div class="row" id="car_info">
            <div class="col-12 mb-3">
                <p class="text-heading">Great choice</p>
            </div>
            <div class="row">
                @foreach ($car->why as $i)
                    <div class="col-12 d-flex mt-1">
                        <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                        <p>{{ $i }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    @if(!request()->routeIs('checkout'))
    <div class="accordion accordion-flush mt-4" id="further_info">
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
                    aria-expanded="true" aria-controls="collapseOne">
                    Further Information
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#further_info">
                <div class="accordion-body">
                    <p>
                        Legal Entity Name: Drivalia UK Limited<br>
                        Trade Register Name: Companies House<br>
                        Trade Number: 08272510<br><br>
                        This partner has self-certified that its product and services conform to EU law under the Digital Services Act.<br><br>
                        Email address: uk.branchsupport@drivalia.com<br>
                        Phone number: +442031300448
                    </p>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>

<div class="modal fade" id="pickup_instructions">
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
                    @foreach ($car->availabilities()->where('status', '1')->get() as $availability)
                        <p>{{ $availability->day_of_week }} / {{ $availability->pickup_hours_start }} -
                            {{ $availability->pickup_hours_end }}</p>
                    @endforeach
                </div>

                @if($car->pickup)
                    <br>
                    <div id="map_pickup" style="height: 300px;"></div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="dropoff_instructions">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title">Drop-off instruction</p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><img src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}"
                        alt="{{ $car->company->name }}" style="max-width:50px;"> Supplied by {{ $car->company->name }}
                </p>

                <br>
                <p>{!! $car->drop_off_instruction !!}</p>
                <br>

                @if($car->pickup)
                <p>Drop-off locations</p>
                @foreach($car->dropup as $dropup)
                <p>{{ $dropup['location'] }}</p>
                @endforeach
                @endif

                <br>
                <p>Drop-off time</p>
                <div>
                    @foreach ($car->availabilities()->where('status', '1')->get() as $availability)
                        <p>{{ $availability->day_of_week }} / {{ $availability->return_hours_start }} -
                            {{ $availability->return_hours_end }}</p>
                    @endforeach
                </div>

                @if ($car->dropup)
                    <br>
                    <div id="map_dropoff" style="height: 300px;"></div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&libraries=places"></script>
<script>
    function initMap() {
        @if(!empty($car->pickup))
            const mapPickup = new google.maps.Map(document.getElementById("map_pickup"), {
                zoom: 14,
                center: {
                    lat: {{ $car->pickup[0]['latitude'] }},
                    lng: {{ $car->pickup[0]['longitude'] }}
                },
            });
    
            const pickupCoords = [
                @foreach($car->pickup as $point)
                    { lat: {{ $point['latitude'] }}, lng: {{ $point['longitude'] }} },
                @endforeach
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
        @endif
    
        @if(!empty($car->dropup))
            const mapDropOff = new google.maps.Map(document.getElementById("map_dropoff"), {
                zoom: 14,
                center: {
                    lat: {{ $car->dropup[0]['latitude'] }},
                    lng: {{ $car->dropup[0]['longitude'] }}
                },
            });
    
            const dropoffCoords = [
                @foreach($car->dropup as $point)
                    { lat: {{ $point['latitude'] }}, lng: {{ $point['longitude'] }} },
                @endforeach
            ];
    
            const bounds2 = new google.maps.LatLngBounds();
            dropoffCoords.forEach(coord => {
                new google.maps.Marker({
                    position: coord,
                    map: mapDropOff,
                });
                bounds2.extend(coord);
            });
    
            mapDropOff.fitBounds(bounds2);
        @endif
    }

    document.addEventListener("DOMContentLoaded", function() {
        initMap();
    });
</script>
