@extends('frontpage.layout')


@section('content')

    @if(!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60">

        @include('frontpage.components.home_booking')


        <div class="container">

            <div class="row booking_stage">

                    <div class="col-md col-sm-12">
                        <a href="javascript:void(0)" class="cmn__btn">
                            <img src="/assets/img/icons/deal.png"><span class="mx-3">Your deal</span>
                        </a>
                    </div>
                    <div class="col-md col-sm-12 d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class="col-md col-sm-12 d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/shield.png"><span class="mx-3">Protection option</span>
                        </a>
                    </div>
                    <div class="col-md col-sm-12 d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class="col-md col-sm-12 d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/cart.png"><span class="mx-3">Checkout</span>
                        </a>
                    </div>

{{--                </div>--}}
            </div>

            <div class="row g-4 justify-content-center mt-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    @if($car->cancellation_fee > 0)
                    <div class="alert alert-danger alert-dismissible mb-4">
                        <p>Cancellation Fee is {{ amt($car->cancellation_fee) }}</p>
                    </div>
                    @else
                        <div class="alert alert-success alert-dismissible mb-4">
                            <p>Free Cancellation up to 48 hours before pick-up</p>
                        </div>
                    @endif

                    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
                        <div class="row d-flex p__10 align-items-center car_section">
                            <a href="#0" class="thumb col-sm-12 col-md-5">
                                <img src="{{ $car?->image }}" class="img-fluid" alt="cars" />
                            </a>
                            <div class="carferrari__content col-md-6 col-sm-12">
                                <div class="d-flex- carferari__box justify-content-between">

                                    <div class="row">
                                        <div class="col-12">
                                            <p><span class="text-title">{{ $car->title }} </span>or similar car</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/profile.png" />
                                                {{ $car->seats }} seats </p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/gear.png" />
                                                {{ $car->gear }}</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/bag.png" />
                                                {{ $car->bags ?? '1 large bag' }}</p>
                                        </div>

                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/signpost.png" />
                                                {{ $car->mileage }} miles per rental</p>
                                        </div>

                                        <div class="col-6 mt-3">
                                            <p class="text-primary">{{ $car?->pick_up_location ?? 'Pick-up Not set' }}</p>
                                            <p class="mt-2">{{ $car?->type }}</p>
                                        </div>

                                        @if($car->mileage_policy)
                                        <div class="col-6 mt-3">
                                            <p>Mileage Policy</p>
                                            <p class="mt-2 text-title">{{ ucwords(str_replace('_', ' ', $car->mileage_policy)) }}</p>
                                        </div>
                                        @endif
                                        
                                        @if($car->mileage_limit)
                                        <div class="col-6 mt-3">
                                            <p>Mileage Limit</p>
                                            <p class="mt-2 text-title">{{ $car->mileage_limit }}</p>
                                        </div>
                                        @endif

                                        @if($car->excess_mileage_rate)
                                        <div class="col-6 mt-3">
                                            <p>Excess Mileage Rate</p>
                                            <p class="mt-2 text-title">{{ $car->excess_mileage_rate }}</p>
                                        </div>
                                        @endif

                                        @if($car->cancellation_policy)
                                        <div class="col-6 mt-3">
                                            <p>Cancellation Policy</p>
                                            <p class="mt-2 text-title">{{ ucwords(str_replace('_', ' ', $car->cancellation_policy)) }}</p>
                                        </div>
                                        @endif
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-between mt-3">
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center justify-content-between">

                                    <img style="max-height: 30px" src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}" alt="{{ $car?->company->name }}">

                                    <div class="d-flex">
                                        <div class="review_count">
                                            0.0
                                        </div>
                                        <div class="review_text">
                                            <p>Good</p>
                                            <p>No review yet</p>
                                        </div>
                                    </div>

                                </div>
                            </div>


{{--                            Important Info--}}
                            <div class="col-12 col-md-6 d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="d-flex mt-3" data-bs-toggle="modal" data-bs-target="#importantInfoModal{{ $car->id }}">
                                        <p class="text-primary mb-0">Important info</p>
                                        <img src="assets/img/icons/info.png" class="mx-3" alt="cars">
                                    </a>

                                </div>
                            </div>
                        </div>

                        <div class="row- car_info mt-2" id="car_info">
                            <div class="col-12 mt-4 mb-3">
                                <p class="text-heading">Great choice</p>
                            </div>
                            <div class="row">
                                @foreach($car->why as $i)
                                <div class="col-6 d-flex mt-1">
                                    <img src="/assets/img/icons/star.png" />
                                    <p>{{ $i }}</p>
                                </div>
                                @endforeach
                            </div>
                            <div class="col-12 mt-4 mb-3">
                                <p class="text-heading">Included in the price</p>
                            </div>
                            <div class="row">
                                @foreach($car->includes as $i)
                                <div class="col-12 d-flex mt-1">
                                    <img src="/assets/img/icons/star.png" />
                                    <p>{{ $i }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <form method="get" action="{{ url('protection_option') }}" class="justify-content-end">
                        @foreach(request()->query() as $key => $value)
                        <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <div class="row row-cols-1 row-cols-md-2">
                        @foreach($car->extras as $index => $extra)
                            <div class="col mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="card-title">{{ $extra['title'] }}</h5>
                                            <div class="input-group" style="max-width: 125px;">
                                                <button type="button" class="btn btn-light" onclick="decrement({{ $index }})">-</button>
                                                <input type="number" class="form-control" style="appearance: textfield;" name="extras[{{ $index }}]" min="0" step="1" value="0" />
                                                <button type="button" class="btn btn-light" onclick="increment({{ $index }})">+</button>
                                            </div>
                                        </div>
                                        <p class="card-text">{{ isset($extra['description']) ? $extra['description'] : '' }}</p>
                                        <p class="card-text text-primary"><small class="text-muted">{{ amt($extra['price']) }} {{ isset($extra['interval']) ? ucwords(str_replace('_', ' ', $extra['interval'])) : '' }}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                        <button type="submit" class="cmn__btn"> 
                            Continue to book
                        </button>
                    </form>
                </div>
                @include('frontpage.partials.car_booking.checkout_right')
            </div>
        </div>

    </section>


    @include('frontpage.components.subscribe')

    {{--Important text modal--}}
    <div class="modal fade" id="importantInfoModal{{ $car->id }}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Important Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if($car->important_text)
                        {!! $car->important_text !!}
                    @else
                        <p>No important information available for this car.</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        function decrement(index) {
            var input = document.querySelector('input[name="extras[' + index + ']"]');
            var value = parseInt(input.value);
            if (value > 0) {
                input.value = value - 1;
            }
        }

        function increment(index) {
            var input = document.querySelector('input[name="extras[' + index + ']"]');
            var value = parseInt(input.value);
            input.value = value + 1;
        }
    </script>
@endsection
