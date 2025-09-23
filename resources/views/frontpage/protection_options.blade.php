@extends('frontpage.layout')


@section('content')

    @if(!is_app())
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60 ">

        @if(!is_app())
            @include('frontpage.components.home_booking')
        @endif


        <div class="container">

            <div class="row ">

                <div class="d-flex booking_stage align-items-center justify-content-between">
                    <div class=" d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/check.png"><span class="mx-3">Your deal</span>
                        </a>
                    </div>
                    <div class=" d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class="">
                        <a href="javascript:void(0)" class="cmn__btn">
                            <img class="text-white" src="/assets/img/icons/shield.png"><span class="mx-3">Protection option</span>
                        </a>
                    </div>
                    <div class=" d-none d-md-block">
                        <img src="/assets/img/icons/dot.png" />
                    </div>

                    <div class=" d-none d-md-block">
                        <a href="javascript:void(0)" class="btn-white">
                            <img src="/assets/img/icons/cart.png"><span class="mx-3">Checkout</span>
                        </a>
                    </div>

                </div>
            </div>

            <div class="row g-4 justify-content-center mt-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8">

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Please note:</strong>  Your own car insurance is unlikely to cover hire cars.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
                        <div class="qustion__content">

                            <div class="accordion__wrap">
                                <div class="accordion" id="accordionExample">

                                    <div class="p-3">
                                        <div class="d-md-flex d-sm-block justify-content-between">
                                        <p class="text-heading">Insurance for peace of mind</p>
                                            <div class="justify-content-end align-items-end">
                                                <p class="">{{ $car->cancellation_fee > 0 ? 'Cancellation Fee : '.amt($car->cancellation_fee) : 'Free cancellation' }}</p>
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <p>{!! $car->security_deposit !!}</p>
                                        </div>

                                        <div class="d-flex justify-content-between mt-4 row">
                                            <!-- Insurance Comparison Table -->
                                            <div class="row border-bottom py-3">
                                                <div class="col-2">
                                                    <h6>Plan</h6>
                                                </div>
                                                <div class="col-4 text-center">
                                                    <h6 class="text-success">What's covered</h6>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <h6>Daily Price</h6>
                                                </div>
                                                <div class="col-2 text-center">
                                                    <h6>Excess Amount</h6>
                                                </div>
                                                <div class="col-2">
                                                    <h6>Actions</h6>
                                                </div>
                                            </div>
                                            @php
                                                $insurance_data = $car->insurance_coverage ?? [];
                                                $total_price = 0;
                                            @endphp

                                            @foreach($insurance_data as $index => $coverage)
                                                <div class="row border-bottom py-4">
                                                    <div class="col-2">
                                                        <h6>{{ ucfirst($coverage['level']) }}</h6>
                                                    </div>
                                                    <div class="col-4 text-center">
                                                        <div class="text-center">
                                                            <p style="margin-top:5px;">{{ $coverage['cover'] }}</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <p style="margin-top:5px;">{{ amt($coverage['daily_price']) }}</p>
                                                    </div>
                                                    <div class="col-2 text-center">
                                                        <p style="margin-top:5px;">{{ amt($coverage['excess']) }}</p>
                                                    </div>
                                                    <div class="col-2">
                                                        <a href="{{ url('checkout') }}?{{ http_build_query(['book_type' => 'with_full_protection', 'insurance_id' => $index] + request()->query()) }}" class="cmn__btn" style="padding:5px 14px; font-size:16px;">
                                                            <span>
                                                                Add
                                                            </span>
                                                        </a>
                                                    </div>
                                                </div>
                                                @php
                                                    $total_price += $coverage['daily_price'];
                                                @endphp
                                            @endforeach

                                            <!-- Price -->
                                            <div class="row py-4">
                                                <div class="col-3"></div>
                                                <div class="col-3 text-center">
                                                    <p>No protection price</p>
                                                    <h6>{{ amt(0) }}</h6>
                                                </div>
                                                <div class="col-3 text-center">
                                                    <p>Total protection price</p>
                                                    <h6 class="text-success">{{ amt($total_price) }}</h6>
                                                </div>
                                                <div class="col-3"></div>
                                            </div>



                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>


                    <div class="justify-content-center d-flex gap-4 text-center">
                        <div>
                            <p>Without <br/>Full Protection</p>
                            <a href="{{ url('checkout') }}?{{ http_build_query(['book_type' => 'without_full_protection'] + request()->query()) }}" class="cmn_btn_white">
                                               <span>
                                                 Go to book
                                               </span>
                            </a>
                        </div>

                    </div>



                </div>

                @include('frontpage.partials.car_booking.checkout_right')
            </div>
        </div>

    </section>


    @if(!is_app())
        <section class="flight__onewaysection">
        <div class="container p-5">
        <div class="hotelbooking__categoris__wra">

            <div class="dating__body text-center">
                <p class="text-title">save time, save money!</p>
                <p class="text-center my-4">sign up and we'll send the best deals to you</p>
                <div class="row">
                    <div class="col"></div>
                    <div class="col text-center ps-5 "> <div class="input">
                            <p class="px-3 text-center">exampls@gmail.com <span> <button class=" ms-5 btn btn_style">Subscribe</button></span></p>
                        </div></div>
                    <div class="col"></div>
                </div>

            </div>
        </div>
    </div>
    </section>
    @endif

@endsection
