@extends('frontpage.layout')


@section('content')

    @if (!request()->has('app'))
        @include('frontpage.partials.layout.header')
    @endif


    <!-- hotel list here -->
    <section class="flight__onewaysection pb__60 pt__60">

        @include('frontpage.components.home_booking')


        <div class="container">

            <div class="row booking_stage">

                <div class="col-md col-sm-12">
                    <a href="javascript:void(0)" class="cmn__btn low13" style="padding: 5px 21px 5px; font-size: 1rem;">
                        <img src="/assets/img/icons/deal.png"><span class="mx-3">Your deal</span>
                    </a>
                </div>
                <div class="col-md col-sm-12 pt-2 d-none d-md-block">
                    <img src="/assets/img/icons/dot.png" width="100%" />
                </div>

                <div class="col-md col-sm-12 pt-2 d-none d-md-block text-center">
                    <a href="javascript:void(0)" class="btn-white low13">
                        <img src="/assets/img/icons/shield.png"><span class="mx-3">Protection option</span>
                    </a>
                </div>
                <div class="col-md col-sm-12 pt-2 d-none d-md-block">
                    <img src="/assets/img/icons/dot.png" width="100%" />
                </div>

                <div class="col-md col-sm-12 pt-2 d-none d-md-block text-end">
                    <a href="javascript:void(0)" class="btn-white low13">
                        <img src="/assets/img/icons/cart.png"><span class="mx-3">Checkout</span>
                    </a>
                </div>
            </div>

            <div class="row g-4 justify-content-center mt-3">
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    @if ($car->cancellation_policy == 0)
                        <div class="alert alert-danger alert-dismissible mb-4">
                            <p>No Cancellation Allowed</p>
                        </div>
                    @else
                        <div class="alert alert-success alert-dismissible mb-4">
                            <p>Free Cancellation up to {{ $car->cancellation_policy }} hours before pick-up</p>
                        </div>
                    @endif

                    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
                        <div class="row d-flex p__10 align-items-center car_section">
                            <div class="col-sm-12 col-md-5">
                                @if ($car->vehicle_photos)
                                    <div id="image-slider">
                                        @foreach ($car->vehicle_photos as $photo)
                                            <div>
                                                <img src="{{ $photo }}" class="img-fluid" alt="cars" />
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <div class="image">
                                        <img src="{{ $car->image }}" class="img-fluid" alt="cars" />
                                    </div>
                                @endif
                            </div>
                            <div class="carferrari__content col-md-6 col-sm-12">
                                <div class="d-flex- carferari__box justify-content-between">

                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <h4>
                                                {{ $car->title }}
                                                <div class="dropdown" style="display:inline">
                                                    <button class="btn btn-link" style="text-decoration: none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        or similar  {{ $car->type }}
                                                    </button>
                                                    <div class="dropdown-menu" style="min-width: 300px;background: #2d2b2b;">
                                                        <h6 class="dropdown-header text-white">What does "or similar" mean?</h6>
                                                        <p class="p-2 text-white">When you book a car, you can expect to receive a car that is similar to the one you booked. This means that the car will have the same make, model, and year as the one you booked, but it may not be exactly the same car. This is because the car may have been sold or may have been replaced by a newer model.</p>
                                                    </div>
                                                </div>
                                            </h4>
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
                                                {{ $car->bags ?? '1' }} small bag</p>
                                        </div>
                                        
                                        <div class="col-6 mt-2">
                                            <p><img src="/assets/img/icons/bag.png" />
                                                {{ $car->bags_large ?? '1' }} large bag</p>
                                        </div>

                                        @if ($car->mileage_policy)
                                            <div class="col-6 mt-2">
                                                <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="20px">
                                                        <path
                                                            d="M9.75 15.292v-.285a2.25 2.25 0 0 1 4.5 0v.285a.75.75 0 0 0 1.5 0v-.285a3.75 3.75 0 1 0-7.5 0v.285a.75.75 0 0 0 1.5 0M13.54 5.02l-2.25 6.75a.75.75 0 0 0 1.424.474l2.25-6.75a.75.75 0 1 0-1.424-.474M6.377 6.757a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m12.75 3.75a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m-1.496-3.75a1.125 1.125 0 1 0 1.119 1.131v-.006c0-.621-.504-1.125-1.125-1.125a.75.75 0 0 0 0 1.5.375.375 0 0 1-.375-.375V7.88a.375.375 0 1 1 .373.377.75.75 0 1 0 .008-1.5m-8.254-3a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5M21.88 17.541a16.5 16.5 0 0 0-19.76 0 .75.75 0 1 0 .898 1.202 15 15 0 0 1 17.964 0 .75.75 0 1 0 .898-1.202m.62-5.534c0 5.799-4.701 10.5-10.5 10.5s-10.5-4.701-10.5-10.5 4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5m1.5 0c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12m-19.123-1.5a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5">
                                                        </path>
                                                    </svg>
                                                    {{ $car->mileage_policy == 'unlimited' ? '' : $car->mileage_limit }}
                                                    {{ ucwords(str_replace('_', ' ', $car->mileage_policy)) }}</p>
                                            </div>
                                        @endif

                                        @if ($car->excess_mileage_rate)
                                            <div class="col-6 mt-2">
                                                <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        width="20px">
                                                        <path
                                                            d="M9.75 15.292v-.285a2.25 2.25 0 0 1 4.5 0v.285a.75.75 0 0 0 1.5 0v-.285a3.75 3.75 0 1 0-7.5 0v.285a.75.75 0 0 0 1.5 0M13.54 5.02l-2.25 6.75a.75.75 0 0 0 1.424.474l2.25-6.75a.75.75 0 1 0-1.424-.474M6.377 6.757a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m12.75 3.75a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m-1.496-3.75a1.125 1.125 0 1 0 1.119 1.131v-.006c0-.621-.504-1.125-1.125-1.125a.75.75 0 0 0 0 1.5.375.375 0 0 1-.375-.375V7.88a.375.375 0 1 1 .373.377.75.75 0 1 0 .008-1.5m-8.254-3a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5M21.88 17.541a16.5 16.5 0 0 0-19.76 0 .75.75 0 1 0 .898 1.202 15 15 0 0 1 17.964 0 .75.75 0 1 0 .898-1.202m.62-5.534c0 5.799-4.701 10.5-10.5 10.5s-10.5-4.701-10.5-10.5 4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5m1.5 0c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12m-19.123-1.5a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5">
                                                        </path>
                                                    </svg> Excess {{ $car->excess_mileage_rate }} per mile</p>
                                            </div>
                                        @endif
                                    </div>
                                    
                                    <!--<div class="col-6 mt-3">
                <p class="text-primary text-truncate mb-1"><a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#pickup_instructions_{{ $car->id }}">{{ $car?->pickup ? $car?->pickup[0]['location'] : 'Pick-up Not set' }}</a></p>
                <p>{{ $car->model }}</p>
            </div>-->

                                    <div class="row mt-4">
                                        <div class="col-md-12">
                                            <p class="text-truncate" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#pickup_instructions">{{ $car?->pickup ? $car?->pickup[0]['location'] : 'Pick-up Not set' }}</p>
                                       
                                       <p>{{ $car->model }}</p>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">
                                <div class="d-flex align-items-center">
                                    <img style="max-height: 45px; margin-right:8px;"
                                        src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}"
                                        alt="{{ $car?->company->name }}">
                                    <div class="review_count">
                                        0.0
                                    </div>
                                    <div class="review_text" style="cursor: pointer;" data-bs-toggle="offcanvas" href="#offcanvasExample">
                                        <p>Good</p>
                                        <p>No review yet</p>
                                    </div>
                                </div>
                            </div>

                            {{--                            Important Info --}}
                            <div class="col-12 col-md-6 d-flex justify-content-end">
                                <div class="d-flex align-items-center">
                                    <a href="#" class="d-flex" data-bs-toggle="modal"
                                        data-bs-target="#importantInfoModal{{ $car->id }}">
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
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-6 d-flex mt-1">
                                            <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                            <p>Customer Rating: 7.5 / 10</p>
                                        </div>
                                        <div class="col-6 d-flex mt-1">
                                            <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                            <p>Most Trusted Fuel Policy</p>
                                        </div>
                                        <div class="col-6 d-flex mt-1">
                                            <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                            <p>Easily Accessible Counter</p>
                                        </div>
                                        <div class="col-6 d-flex mt-1">
                                            <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                            <p>Professional & Courteous Staff</p>
                                        </div>
                                        <div class="col-6 d-flex mt-1">
                                            <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                            <p>Well-Serviced, Reliable Cars</p>
                                        </div>
                                        <div class="col-6 d-flex mt-1">
                                            <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                            <p>Hassle-Free Free Cancellation</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4 text-end">
                                    <img src="/assets/img/key.jpg" alt="car" class="img-fluid"
                                        style="max-height:150px; ">
                                </div>
                            </div>
                            <div class="col-12 mt-4 mb-3">
                                <hr><br>
                                <h5>What travellers say about {{ $car->company->name }}</h5>
                                <p>Here's what customers mentioned most often in genuine reviews for
                                    {{ $car->company->name }} at {{ $car->pick_up_location }}.</p>
                                <div class="mt-3">
                                    <div class="badge" style="padding:8px; border:1px solid green; color:green;">
                                        &#128512; Staff Service</div>
                                    <div class="badge" style="padding:8px; border:1px solid green; color:green;">
                                        &#128512; Expected Car</div>
                                    <div class="badge" style="padding:8px; border:1px solid red; color:red;"> &#128552;
                                        Pick-up speed</div>
                                    <div class="badge" style="padding:8px; border:1px solid red; color:red;"> &#128552;
                                        Communication</div>
                                </div>
                                <br>
                                <hr>
                            </div>
                            <div class="col-12 mt-4 mb-3">
                                <p class="text-heading">Included in the price</p>
                            </div>
                            <div class="row">
                                @if($car->free_cancellation)
                                <div class="col-12 d-flex mt-1">
                                    <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                    <p>Free cancellation up to 24 hours before pick-up</p>
                                </div>
                                @endif
                                @if($car->collision_damage_waiver)
                                <div class="col-12 d-flex mt-1">
                                    <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                    <p>Collision Damage Waiver</p>
                                </div>
                                @endif
                                @if($car->theft_protection)
                                <div class="col-12 d-flex mt-1">
                                    <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                    <p>Theft Protection</p>
                                </div>
                                @endif
                                @if($car->unlimited_mileage)
                                <div class="col-12 d-flex mt-1">
                                    <i class="fa fa-check text-success"></i> &nbsp; &nbsp;
                                    <p>Unlimited mileage</p>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <form method="get" action="{{ url('protection_option') }}" class="justify-content-end">
                        @foreach (request()->query() as $key => $value)
                            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
                        @endforeach

                        <div class="row row-cols-1 row-cols-md-2">
                            @foreach ($car->extras as $index => $extra)
                                <div class="col mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="d-flex justify-content-between">
                                                <h5 class="card-title">{{ $extra['title'] }}</h5>
                                                <div class="input-group" style="max-width: 125px;">
                                                    <button type="button" class="btn btn-light"
                                                        onclick="decrement({{ $index }})">-</button>
                                                    <input type="number" class="form-control"
                                                        style="appearance: textfield;" name="extras[{{ $index }}]"
                                                        min="0" step="1" value="0" />
                                                    <button type="button" class="btn btn-light"
                                                        onclick="increment({{ $index }})">+</button>
                                                </div>
                                            </div>
                                            <p class="card-text">
                                                {{ isset($extra['description']) ? $extra['description'] : '' }}</p>
                                            <p class="card-text text-primary"><small
                                                    class="text-muted">{{ amt($extra['price']) }}
                                                    {{ isset($extra['interval']) ? ucwords(str_replace('_', ' ', $extra['interval'])) : '' }}</small>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="cmn__btn">
                            Continue to book
                        </button>
                    </form>

                    <br>
                    <hr><br>

                    <div>
                        <h5>Your pick-up checklist</h5>

                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#arrive-on-time"><i class="fa fa-clock"></i> Arrive on time</a>
                            </li>
                            <li class="nav-item">   
                                <a class="nav-link" data-bs-toggle="tab" href="#what-to-bring-with-you"><i class="fa fa-file"></i> What to bring with you</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#refundable-deposit"><i class="fa fa-money-bill"></i> Refundable deposit</a>
                            </li>
                        </ul>

                        <div class="tab-content" style="border: 1px solid #eee; padding:20px;">
                            <div class="tab-pane fade p-2 show active" id="arrive-on-time" role="tabpanel" aria-labelledby="arrive-on-time-tab">
                                <p class="text-dark">Rental companies will only release your keys at the scheduled pick-up time. They typically hold the car for a short period after your pick-up time, after which it may be given to another customer.</p>
                                <p class="text-dark">Your pick-up time is {{ request()->query('pick_up_time') }}.</p>
                            </div>
                            <div class="tab-pane fade p-2" id="what-to-bring-with-you" role="tabpanel" aria-labelledby="what-to-bring-with-you-tab">
                                <p class="text-dark">At pick-up, you’ll be asked for:</p>
                                <ul>
                                    <li>A valid passport or national ID card</li>
                                    <li>Driver’s licence(s) for all listed drivers</li>
                                </ul>
                            </div>
                            <div class="tab-pane fade p-2" id="refundable-deposit" role="tabpanel" aria-labelledby="refundable-deposit-tab">
                                <p class="text-dark">At pick-up, the main driver must have £500 available on their credit card for the refundable security deposit. Cash and debit cards are not accepted.</p>
                                <p class="text-dark">Accepted credit cards: (cards)</p>
                                <p class="text-dark">Find cars with lower deposit</p>
                            </div>
                        </div>
                    </div>
                </div>
                @include('frontpage.partials.car_booking.checkout_right')
                <div class="col-md-12">
                    <h5 class="mb-3 fw-bold">How are we doing?</h5>
                    <p class="mb-4 small text-muted">(1 of 2) The info on this page makes it easy for me to choose a rental car.</p>

                    <div class="d-flex justify-content-between align-items-center mb-2">
                        <div class="btn-group w-100" role="group" aria-label="Satisfaction rating" style="max-width: 350px;">

                            <input type="radio" class="btn-check" name="rental-car-info" id="option5" autocomplete="off" value="5">
                            <label class="btn btn-outline-secondary flex-fill me-2" for="option5">5</label>

                            <input type="radio" class="btn-check" name="rental-car-info" id="option4" autocomplete="off" value="4">
                            <label class="btn btn-outline-secondary flex-fill me-2" for="option4">4</label>

                            <input type="radio" class="btn-check" name="rental-car-info" id="option3" autocomplete="off" value="3">
                            <label class="btn btn-outline-secondary flex-fill me-2" for="option3">3</label>

                            <input type="radio" class="btn-check" name="rental-car-info" id="option2" autocomplete="off" value="2">
                            <label class="btn btn-outline-secondary flex-fill me-2" for="option2">2</label>

                            <input type="radio" class="btn-check" name="rental-car-info" id="option1" autocomplete="off" value="1">
                            <label class="btn btn-outline-secondary flex-fill" for="option1">1</label>   
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between small text-muted" style="max-width: 350px;">
                        <span>Strongly agree</span>
                        <span>Strongly disagree</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        @media (max-width: 1200px) {
            .low13 {
                font-size: 13px !important;
            }
        }
    </style>


    @include('frontpage.components.subscribe')

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

    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasLabel"
        style="z-index:10000;width: 60%;">
        <div class="offcanvas-body">
            <!-- Ratings -->
            <div class="container mb-4">
                <h5 class="fw-bold">Drivalia</h5>
                <p class="text-muted mb-4">London Heathrow Airport</p>

                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Car Condition – 7.5</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Car Cleaniness – 7.5</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Easy to find – 7.5</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 75%"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Helpfulness – 7.9</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 79%"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Pick-up speed – 5.5</label>
                        <div class="progress">
                            <div class="progress-bar bg-warning" style="width: 55%"></div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Drop-off speed – 8.5</label>
                        <div class="progress">
                            <div class="progress-bar bg-success" style="width: 85%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Traveller Reviews -->
            <div class="container">
                <h6 class="fw-bold mb-2">Traveller reviews</h6>
                <p class="text-muted mb-4">Sorted by most recent</p>

                <!-- Filters -->
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <select class="form-select">
                            <option>All ratings</option>
                            <option>10</option>
                            <option>9+</option>
                            <option>8+</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <select class="form-select">
                            <option>All traveller types</option>
                            <option>Family</option>
                            <option>Solo</option>
                            <option>Business</option>
                        </select>
                    </div>
                </div>

                <!-- Review Topics -->
                <div class="mb-3">
                    <button class="btn btn-outline-secondary btn-sm m-1">Desk location</button>
                    <button class="btn btn-outline-secondary btn-sm m-1">Car condition</button>
                    <button class="btn btn-outline-secondary btn-sm m-1">Expected car</button>
                    <button class="btn btn-outline-secondary btn-sm m-1">Staff service</button>
                    <button class="btn btn-outline-secondary btn-sm m-1">Pick-up speed</button>
                    <button class="btn btn-outline-secondary btn-sm m-1">Insurance at desk</button>
                </div>

                <!-- Review 1 -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary me-2 fs-6">8.9</span>
                            <div>
                                <strong>Family – Victor</strong><br>
                                <small class="text-muted">26 September 2025</small>
                            </div>
                        </div>
                        <p class="mb-1">😊 The car, location, shuttle to the airport and the employees were very kind.
                        </p>
                        <p class="text-muted mb-0">☹️ It took almost two hours to get the car. Everyone was frustrated
                            about the long wait.
                            I believe they need more people manning the desks and having the cars ready from the night
                            before.
                            Check-in is too long.</p>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-2">
                            <span class="badge bg-primary me-2 fs-6">10</span>
                            <div>
                                <strong>Solo traveller – Anonymous</strong><br>
                                <small class="text-muted">25 September 2025</small>
                            </div>
                        </div>
                        <p class="mb-1">😊 Absolutely loved my experience here at Drivalia! Thank you so much Aleena for
                            my upgrade.
                            Came in & spoke about my booking, and everything was handled smoothly. Highly recommended!</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
        integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
        integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
        integrity="sha512-HGOnQO9+SP1V92SrtZfjqxxtLmVzqZpjFFekvzZVWoiASSQgSr4cw9Kqd2+l8Llp4Gm0G8GIFJ4ddwZilcdb8A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery('#image-slider').slick({
            arrows: true,
            dots: false,
        });
    </script>
@endpush
