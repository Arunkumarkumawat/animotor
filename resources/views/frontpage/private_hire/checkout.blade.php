@extends('frontpage.layout')

@section('style')
    <style>
        .tag-badge {
            font-size: 12px;
            background: #eef2ff;
            color: #3b5bdb;
            padding: 4px 8px;
            border-radius: 6px;
        }

        .section-title {
            font-weight: 600;
            font-size: 15px;
            color: #444;
        }

        .icon-small {
            font-size: 14px;
            color: #6c757d;
        }

        .price-box {
            border: 1px solid #eee;
            border-radius: 12px;
            padding: 20px;
        }

        .summary-card {
            border-radius: 14px;
        }

        .label-line {
            font-size: 14px;
            color: #6c757d;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <div class="container py-4">

        <!-- Back -->
        <a href="javascript:void(0)" onclick="redirectBack()" class="text-decoration-none mb-3 d-flex align-items-center">
            <i class="fas fa-arrow-left me-2"></i> Back
        </a>

        <div class="row g-4">

            <!-- Left Column -->
            <div class="col-lg-8">

                <div class="alert alert-primary d-flex align-items-center">
                    <i class="fas fa-taxi me-2"></i>
                    <strong>Private Hire Vehicle</strong> - {{ ucwords(str_replace('_', ' ', $query['hire_option'])) }} Hire for licensed drivers
                </div>

                <div class="card p-4 summary-card">
                    <h4 class="mb-4">Your Booking Summary</h4>

                    <!-- Car Section -->
                    <div class="d-flex mb-3">
                        <img src="{{ $car->image }}" class="rounded me-3" width="180">
                        <div>
                            <h5 class="mb-1">{{ $car->name }}</h5>
                            <small class="text-muted">{{ $car->year }} • {{ $car->model }}</small>
                            <div class="tag-badge mt-2">Private Hire</div>

                            <div class="mt-2 d-flex align-items-center text-muted small">
                                <i class="fas fa-star text-warning me-1"></i> 4.5 (123 reviews)
                            </div>

                            <div class="d-flex mt-2 small text-muted">
                                <div class="me-3"><i class="fas fa-users"></i> {{ $car->seats }} seats</div>
                                <div class="me-3"><i class="fas fa-cog"></i> {{ $car->transmission }}</div>
                                <div><i class="fas fa-gas-pump"></i> {{ $car->fuel_type }}</div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row text-center text-md-start">
                        <div class="col-md-6 mb-3">
                            <div class="section-title">Start Date</div>
                            <strong>{{ $query['start_date']->format('M d, Y') }}</strong>
                        </div>
                        <div class="col-md-6 mb-3">
                            <div class="section-title">End Date</div>
                            <strong>{{ $query['end_date']->format('M d, Y') }}</strong>
                        </div>
                    </div>

                    <hr>

                    <h6 class="mb-3">Hire Details:</h6>

                    <div class="p-3 rounded" style="background: #f1f3f5;">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="label-line">Hire Type:</div>
                                <strong>{{ ucwords(str_replace('_', ' ', $query['hire_option'])) }}</strong>

                                <div class="label-line mt-3">Insurance:</div>
                                <strong>
                                    @if($query['hire_option'] == 'rent_to_buy')
                                        {{ $car->rent_to_buy_insurance_included ? 'Included' : 'Not Included' }}
                                    @elseif($query['insurance'] == 'w')
                                        Included
                                    @elseif($query['insurance'] == 'wo')
                                        Not included
                                    @endif
                                </strong>

                                <div class="label-line mt-3">Deposit:</div>
                                <strong>{{ amt($deposit) }}</strong>
                            </div>

                            <div class="col-md-6">
                                <div class="label-line">Period:</div>
                                <strong>{{ $query['term'] }} {{ $period }}(s)</strong>

                                <div class="label-line mt-3">Maintenance:</div>
                                <strong>
                                    @if($query['hire_option'] == 'rent_to_buy')
                                        {{ $car->rent_to_buy_maintenance_included ? 'Included' : 'Not Included' }}
                                    @elseif($query['hire_option'] == 'long_term' && isset($query['term']) && isset($car->long_term_prices[$query['term']]['maintenance_included']))
                                        {{ $car->long_term_prices[$query['term']]['maintenance_included'] ? 'Included' : 'Not Included' }}
                                    @elseif($query['hire_option'] == 'short_term' && isset($car->short_term_maintenance_included))
                                        {{ $car->short_term_maintenance_included ? 'Included' : 'Not Included' }}
                                    @endif
                                </strong>

                                <div class="label-line mt-3">Excess:</div>
                                <strong>{{ amt($excess) }}</strong>
                            </div>
                        </div>
                    </div>

                    <h6 class="mt-4">Included with your hire:</h6>
                    <ul class="list-unstyled small mt-2">
                        <li><i class="fas fa-check-circle text-success me-2"></i> PHC Licensing Compliance</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Mileage Allowance</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Roadside Assistance</li>
                        <li><i class="fas fa-check-circle text-success me-2"></i> Flexible Terms</li>
                    </ul>

                </div>
            </div>

            <!-- Right Column -->
            <div class="col-lg-4">

                <div class="price-box bg-white">

                    <h5 class="mb-3">Price Breakdown</h5>

                    <div class="d-flex justify-content-between small mb-2">
                        <span>{{ ucwords(str_replace('_', ' ', $query['hire_option'])) }} Hire - {{ $query['term'] }} {{ $period }}(s) @ {{ amt($rate) }}/{{ $cycle }}</span>
                        <strong>{{ amt($rate * $term) }}</strong>
                    </div>

                    <div class="d-flex justify-content-between small mb-3">
                        <span>Taxes & Fees</span>   
                        <strong>Included</strong>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <h5>Total</h5>
                        <h5>{{ amt($rate * $term) }}</h5>
                    </div>

                    <div class="alert alert-warning small mt-2">
                        Plus {{ amt($deposit) }} refundable deposit due at collection
                    </div>

                    <h6 class="mt-4">Payment Details</h6>

                    <input class="form-control mb-2" placeholder="Cardholder Name" id="cardholder_name">
                    <input class="form-control mb-2" placeholder="Card Number" id="card_number">
                    <div class="row g-2">
                        <div class="col">
                            <input class="form-control" placeholder="MM/YY" id="card_expiry">
                        </div>
                        <div class="col">
                            <input class="form-control" placeholder="CVC" id="card_cvc">
                        </div>
                    </div>

                    <div class="small mt-2 text-muted">
                        <i class="fas fa-lock me-1"></i>
                        Your payment is secured with 256-bit SSL encryption
                    </div>

                    <button class="btn btn-primary btn-lg w-100 mt-3" onclick="checkout()">
                        @lang('Confirm and Pay')
                    </button>

                    <p class="small text-muted mt-2">
                        By clicking "Confirm and Pay", you agree to the ANI Motors Terms of Service, Privacy Policy, and the
                        cancellation policy shown above.
                    </p>

                </div>
            </div>
        </div>
    </div>

    

    <script>
        function checkout(){
            $.ajax({
                url: '{{ url()->full() }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    name: jQuery('#cardholder_name').val(),
                    card_number: jQuery('#card_number').val(),
                    card_expiry: jQuery('#card_expiry').val(),
                    card_cvc: jQuery('#card_cvc').val()
                },
                success: function(response){
                    window.location.href = response.url;
                }
            });
        }

        function redirectBack(){
            const params = new URLSearchParams();
            
            @foreach($query as $key => $value)
                @if($key != 'extras')
                    params.append('{{ $key }}', '{{ $value }}');
                @endif
            @endforeach

            const url = '{{ route('private_hire_extras', $car->id) }}';
            window.location.href = url + '?' + params.toString();
        }
    </script>
@endsection
