@extends('frontpage.layout')

@section('style')
    <style>
        .is_app_top .flight__onewaysection {
            padding-top: 20px!important;
        }
    </style>
@endsection

@section('content')
    @php
        if($booking->car->free_cancellation){
            $diffNeeded = 24;
        }else{
            $diffNeeded = $booking->car->cancellation_policy;
        }

        $diff = Carbon\Carbon::parse($booking->pick_up_date . ' ' . $booking->pick_up_time . ':00')->diffInHours(now());
        $fullRefund = $diff > $diffNeeded;

        if($booking->car->cancellation_policy == 0){
            $fullRefund = false;
        }
    @endphp

    @if(!is_app())
        @include('frontpage.partials.layout.header')
    @endif

    <section class="flight__onewaysection pb__60 pt__60-" style="{{ !is_app() ? 'padding-top: 90px' : 'padding-top: 0px!important' }}">
        <div class="container">

            {{-- Optional cancellation pending banner --}}
            @if($booking->cancelled == "1")
                <div class="alert alert-warning my-4">
                    <strong>Cancellation pending</strong><br>
                    {{ $booking?->car?->company?->name ?? 'The rental company' }} are processing your cancellation request. As soon as they confirm they've cancelled your booking, we'll email {{ $booking?->customer?->email }} to let you know. You don't need to do anything.
                </div>
            @endif

            <div class="row g-4 mt-3">

                {{-- Left column: main cancellation flow --}}
                <div class="col-xxl-8 col-xl-8 col-lg-8">
                    @if($booking->cancelled == "0")
                    {{-- Page title and full refund summary --}}
                    <div class="car__driverdetails mb__30">
                        <div class="p-3_">
                            <p class="text-heading mb-1">Cancel my booking</p>
                            @if($fullRefund)
                            <p class="mb-2">Full refund if you cancel now</p>
                            <p class="mb-1">
                                You can cancel your car rental booking for free right now.
                            </p>
                            <p class="mb-0">
                                <a href="#what-happens" class="text-decoration-underline">View cancellation policy</a>
                            </p>
                            @else
                            <p class="mb-2">No refund if you cancel now</p>
                            <p class="mb-1">
                                You can cancel your car rental booking for no refund.
                            </p>
                            <p class="mb-0">
                                <a href="#what-happens" class="text-decoration-underline">View cancellation policy</a>
                            </p>
                            @endif
                        </div>
                    </div>
                    @endif

                    {{-- Your booking card --}}
                    <div class="car__driverdetails mb__30">
                        <div class="p-3_">
                            <p class="text-heading mb-3">Your booking</p>

                            <div class="carferrari__item car_item bgwhite p-3">
                                <div class="row align-items-center">
                                    <div class="thumb col-sm-12 col-md-4 mb-3 mb-md-0">
                                        <img src="{{ $booking?->car?->image }}" class="img-fluid" alt="car" />
                                    </div>
                                    <div class="carferrari__content col-md-8 col-sm-12">
                                        <p class="mb-1 text-heading">{{ $booking?->car?->title }}</p>
                                        <p class="mb-1 text-muted text-capitalize">{{ $booking?->car?->type }} or similar</p>
                                        <p class="mb-0 text-muted">
                                            Booking number: <strong>{{ $booking->booking_number ?? $booking->reference ?? $booking->id }}</strong>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if($booking->cancelled == "0") 
                    {{-- What happens if you cancel --}}
                    <div id="what-happens" class="car__driverdetails mb__30">
                        <div class="p-3_">
                            <p class="text-heading mb-2">What happens if you cancel?</p>
                            <p class="mb-1">
                                If you cancel right now we'll refund you
                                <strong>{{ $fullRefund ? amt($booking->grand_total) : amt(0) }}</strong>.
                            </p>
                            @if($fullRefund)
                            <p class="mb-0 text-muted">
                                You won't receive it straight away as it can take your bank up to
                                <strong>3 working days</strong> to process it.
                            </p>
                            @endif
                        </div>
                    </div>

                    {{-- Why do you want to cancel? --}}
                    <div class="car__driverdetails mb__40">
                        <div class="p-3_">
                            <p class="text-heading mb-2">Why do you want to cancel?</p>
                            <p class="mb-3 text-muted">
                                This won't affect your refund. It's just to help us improve our service.
                            </p>

                            <form id="cancel-form" action="{{ route('booking.cancel', $booking->id) }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="cancel_reason" class="form-label">Please tell us more</label>
                                    <select name="cancel_reason" id="cancel_reason" class="form-select" required>
                                        <option value="" disabled selected>Select a reason</option>
                                        <option value="no_credit_card">I don't have a credit card</option>
                                        <option value="no_driving_license">I don't have a driving license</option>
                                        <option value="no_longer_want_full_protection">I no longer want full protection</option>
                                        <option value="booked_with_someone_else">I've booked a car with someone else</option>
                                        <option value="booked_elsewhere">I've booked another car elsewhere</option>
                                        <option value="car_too_expensive">My car is too expensive</option>
                                        <option value="deposit_too_high">My deposit is too high</option>
                                        <option value="extras_too_expensive">My extras are too expensive</option>
                                        <option value="pickup_or_drop_off_changed">My pickup/drop-off location has changed</option>
                                        <option value="trip_cancelled">My trip is being cancelled</option>
                                        <option value="timing_changed">The timing of my trip has changed</option>
                                        <option value="other">Other reasons</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="cancel_comment" class="form-label">Additional details (optional)</label>
                                    <textarea name="cancel_comment" id="cancel_comment" class="form-control" rows="3" placeholder="Add any extra details here...">{{ old('cancel_comment') }}</textarea>
                                </div>

                                <input type="hidden" name="confirm" value="1">

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmCancelModal">
                                    Cancel booking
                                </button>
                            </form>
                        </div>
                    </div>
                    @endif

                </div>

                {{-- Right column: refund breakdown --}}
                <div class="col-xl-4 col-lg-4">
                    <div class="hotel__confirm__invocie bg-primary mt-4- car__confirmdetails__right">
                        <p class="text-heading">Refund breakdown</p>
                        <div class="carferrari__item flex-wrap mt-3 align-items-center-">
                            <div class="carferrari__content">
                                <p class="m2 mb-2"><strong>To be refunded</strong></p>
                                <div class="d-flex justify-content-between">
                                    <p class="m2">What you've paid</p>
                                    <p class="">{{ amt($booking->grand_total ?? $booking->total ?? $booking->fee ?? 0) }}</p>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="m2">Subtotal</p>
                                    <p class="">{{ amt($booking->grand_total ?? $booking->total ?? $booking->fee ?? 0) }}</p>
                                </div>

                                <p class="m2 mb-2"><strong>Fees</strong></p>
                                <div class="d-flex justify-content-between">
                                    <p class="m2">Cancellation fee</p>
                                    <p class="">{{ amt($booking->cancellation_fee ?? 0) }}</p>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <p class="m2">Subtotal</p>
                                    <p class="">{{ amt($booking->cancellation_fee ?? 0) }}</p>
                                </div>

                                @php
                                    $totalPaid = $booking->grand_total ?? $booking->total ?? $booking->fee ?? 0;
                                    $cancellationFee = $booking->cancellation_fee ?? 0;
                                    $totalRefund = max($totalPaid - $cancellationFee, 0);
                                @endphp

                                <div class="d-flex justify-content-between mt-2">
                                    <p class="m2"><strong>Total refund</strong></p>
                                    <p class="text-heading"><strong>{{ amt($totalRefund) }}</strong></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="hotel__confirm__invocie bg-primary mt-4 car__confirmdetails__right">
                        <p class="text-heading">Need some help?</p>
                        <div class="carferrari__item flex-wrap mt-2 align-items-center-">
                            <div class="carferrari__content">
                                <p class="mt-2"><img class="me-3" src="/assets/img/icons/message.png" />Help Centre</p>
                                <p class="mt-2">Useful answers to common questions</p>
                                <p class="mt-2">Find an answer</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        @include('frontpage.partials.terms_modal')

        {{-- Confirmation modal --}}
        <div class="modal fade" id="confirmCancelModal" tabindex="-1" aria-labelledby="confirmCancelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmCancelLabel">Are you sure?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you sure you want to cancel your car rental booking?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No, I don't want to cancel</button>
                        <button type="button" class="btn btn-danger" onclick="document.getElementById('cancel-form').submit();">Yes, cancel my booking</button>
                    </div>
                </div>
            </div>
        </div>

    </section>

    @if(!is_app())
        @include('frontpage.components.subscribe')
    @endif

@endsection

