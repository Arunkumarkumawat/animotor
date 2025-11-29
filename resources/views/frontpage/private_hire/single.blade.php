@extends('frontpage.layout')

@section('style')
    <style>
        .booking-page {
            font-family: "Inter", sans-serif;
        }

        .back-link {
            font-size: 15px;
            color: #4a65f7;
            font-weight: 500;
        }

        .car-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 4px;
        }

        .car-sub {
            font-size: 16px;
            color: #6b7280;
        }

        .badge-ph {
            background: #6a35ff;
            padding: 4px 10px;
            border-radius: 14px;
            color: #fff;
            font-size: 13px;
        }

        .car-image img {
            border-radius: 14px;
        }

        .spec-row {
            border-top: 1px solid #ececec;
            border-bottom: 1px solid #ececec;
        }

        .spec-icon {
            font-size: 24px;
            color: #4b5563;
        }

        .spec-text {
            font-size: 14px;
            margin-top: 6px;
            color: #4b5563;
        }

        .license-box {
            background: #fafafa;
            border: 1px solid #e8e8e8;
            padding: 14px 18px;
            border-radius: 10px;
            color: #444;
            font-size: 14px;
        }

        .hire-card {
            border-radius: 14px;
            border: 1px solid #eee;
            box-shadow: 0px 4px 22px rgba(0, 0, 0, 0.08);
        }

        .hire-title {
            font-size: 20px;
            font-weight: 700;
        }

        .hire-tabs {
            gap: 8px;
        }

        .hire-tab {
            background: #f4f5f7;
            padding: 8px 0;
            border-radius: 8px;
            border: none;
            font-weight: 500;
            color: #444;
        }

        .hire-tab.active {
            background: #4a65f7;
            color: white;
        }

        .custom-select {
            height: 45px;
            border-radius: 8px;
            font-size: 15px;
        }

        .details-box {
            background: #f8f9fa;
            padding: 14px;
            border-radius: 10px;
            border: 1px solid #e5e7eb;
            font-size: 14px;
            line-height: 22px;
            color: #555;
        }

        .custom-date {
            height: 45px;
            font-size: 15px;
            border-radius: 8px;
        }

        .date-label {
            font-size: 14px;
            margin-bottom: 4px;
        }

        .price-line {
            font-size: 14px;
            display: flex;
            justify-content: space-between;
            color: #555;
        }

        .total-line {
            font-size: 18px;
            font-weight: 700;
            display: flex;
            justify-content: space-between;
        }

        .continue-btn {
            height: 48px;
            font-size: 16px;
            border-radius: 10px;
        }

        .bottom-note {
            margin-top: 10px;
            font-size: 13px;
            text-align: center;
            color: #888;
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <div class="container py-4 booking-page">

        <!-- Back to search -->
        <a href="{{ route('private_hire_list') }}" class="back-link d-inline-flex align-items-center mb-3">
            <i class="fas fa-arrow-left me-2"></i> Back to search results
        </a>

        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-8 pe-lg-4">

                <h2 class="car-title">{{ $car->name }}</h2>

                <div class="d-flex align-items-center gap-2 mb-3">
                    <span class="car-sub">{{ $car->name }} • {{ $car->year }}</span>
                    <span class="badge badge-ph">Private Hire</span>
                </div>

                <!-- Car image -->
                <div class="car-image mb-4">
                    <img src="{{ $car->image }}" class="img-fluid w-100" style="max-height: 400px;" />
                </div>

                <!-- Specs -->
                <div class="spec-row d-flex justify-content-between text-center py-3">
                    <div>
                        <i class="fas fa-users spec-icon"></i>
                        <div class="spec-text">{{ $car->seats }} Seats</div>
                    </div>
                    <div>
                        <i class="fas fa-suitcase-rolling spec-icon"></i>
                        <div class="spec-text">{{ $car->bags }} Small Bags</div>
                    </div>
                    <div>
                        <i class="fas fa-suitcase-rolling spec-icon"></i>
                        <div class="spec-text">{{ $car->bags_large }} Large Bags</div>
                    </div>
                    <div>
                        <i class="fas fa-cog spec-icon"></i>
                        <div class="spec-text">{{ $car->gear }}</div>
                    </div>
                    <div>
                        <i class="fas fa-gas-pump spec-icon"></i>
                        <div class="spec-text">{{ $car->fuel_type ?? 'Unknown' }}</div>
                    </div>
                </div>

                <!-- Licensed Box -->
                <div class="license-box mt-4">
                    <i class="fas fa-info-circle me-2"></i>
                    <strong>Licensed Vehicle:</strong>
                    This vehicle is licensed by {{ $car->licensing_authority }} for private hire operations. (Plate: {{ $car->phv_plate_number }})
                </div>

            </div>

            <!-- RIGHT -->
            <div class="col-lg-4">

                <div class="hire-card card">
                    <div class="card-body">

                        <h5 class="hire-title mb-3">Select Hire Options</h5>

                        <!-- Hire Tabs -->
                        <div class="hire-tabs d-flex mb-3">
                            <input type="hidden" id="g_hire_option" name="hire_option" value="short_term">
                            @if($car->short_term)
                                <button type="button" onclick="selectHireOption(this, 'short_term')" class="hire-tab active w-100">Flex</button>
                            @endif
                            @if($car->long_term)
                                <button type="button" onclick="selectHireOption(this, 'long_term')" class="hire-tab w-100">Long-Term</button>
                            @endif
                            @if($car->rent_to_buy)
                                <button type="button" onclick="selectHireOption(this, 'rent_to_buy')" class="hire-tab w-100">R2B</button>
                            @endif
                        </div>

                        <div id="short_term_pricing">
                            <!-- Insurance -->
                            <label class="form-label fw-semibold">Insurance</label>
                            <select class="form-select custom-select mb-3">
                                <option>No Insurance ({{ amt($car->short_term_weekly_price_wo_ins) }}/week)</option>
                                <option>With Insurance ({{ amt($car->short_term_weekly_price_w_ins) }}/week)</option>
                            </select>
                        </div>

                        <div id="long_term_pricing" class="d-none">
                            <div>
                                <label class="form-label fw-semibold">Term</label>
                                <select class="form-select custom-select mb-3">
                                    <option>3 months</option>
                                    <option>6 months</option>
                                    <option>9 months</option>
                                    <option>12 months</option>
                                    <option>18 months</option>
                                </select>
                            </div>
                            <div>
                                <label class="form-label fw-semibold">Insurance</label>
                                <select class="form-select custom-select mb-3">
                                    <option>No Insurance ({{ amt($car->short_term_weekly_price_wo_ins) }}/week)</option>
                                    <option>With Insurance ({{ amt($car->short_term_weekly_price_w_ins) }}/week)</option>
                                </select>
                            </div>
                        </div>

                        <div id="rent_to_buy_pricing" class="d-none">

                        </div>

                        <!-- Gray details box -->
                        <div class="details-box mb-3">
                            • Min term: 1 week(s)<br>
                            • Max term: 12 weeks<br>
                            • Deposit: £300<br>
                            • Excess: £1000<br>
                            • Notice: 7d
                        </div>

                        <!-- Dates -->
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="date-label fw-semibold">Start Date</label>
                                <input type="date" class="form-control custom-date">
                            </div>
                            <div class="col-6">
                                <label class="date-label fw-semibold">End Date</label>
                                <input type="date" class="form-control custom-date">
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="price-line">
                            <span>Weekly rental</span>
                            <span>£220.00</span>
                        </div>

                        <div class="price-line mb-2">
                            <span>Deposit</span>
                            <span>£300</span>
                        </div>

                        <hr>

                        <div class="total-line mb-3">
                            <span>Total</span>
                            <span>£220.00</span>
                        </div>

                        <a href="{{ route('private_hire_extras', 1) }}" class="btn btn-primary continue-btn w-100">Continue Booking</a>

                        <p class="bottom-note">Flexible terms available</p>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectHireOption(initiator,value){
            jQuery('#g_hire_option').val(value);
            jQuery('.hire-tab').removeClass('active');
            jQuery(initiator).addClass('active');
        }
    </script>
@endsection
