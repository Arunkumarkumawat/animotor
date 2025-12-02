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

                <div class="hire-card card" method="get" action="{{ route('private_hire_extras', $car->id) }}">
                    <div class="card-body">

                        <h5 class="hire-title mb-3">Select Hire Options</h5>

                        <!-- Hire Tabs -->
                        <div class="hire-tabs d-flex mb-3">
                            <input type="hidden" id="g_hire_option" value="short_term">
                            @if($car->short_term)
                                <button type="button" onclick="selectHireOption(this, 'short_term')" class="hire-tab active w-100">Flex</button>
                            @endif
                            @if($car->long_term)
                                <button type="button" onclick="selectHireOption(this, 'long_term')" class="hire-tab w-100">Long-Term</button>
                            @endif
                            @if($car->rent_to_buy)
                                <button type="button" onclick="selectHireOption(this, 'rent_to_buy')" id="rent_to_buy_button" class="hire-tab w-100"
                                    data-rate="{{ $car->rent_to_buy_price_per_cycle }}"
                                    data-deposit="{{ $car->rent_to_buy_deposit_amount }}"
                                    data-cycle="{{ $car->rent_to_buy_billing_cycle }}"
                                    data-term="{{ $car->rent_to_buy_term }}"
                                >R2B</button>
                            @endif
                        </div>

                        @if($car->short_term)
                        <div id="short_term_pricing" class="pricing-section">
                            <!-- Term -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Term</label>
                                <select class="form-select custom-select mb-3" id="short_term_term_select" onchange="calculateTotals()">
                                    @for($i = $car->short_term_minimum_term; $i <= 12; $i++)
                                    <option value="{{ $i }}">{{ $i }} Week(s)</option>
                                    @endfor
                                </select>
                            </div>
                            
                            <!-- Insurance -->
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Insurance</label>
                                <select class="form-select custom-select mb-3" id="short_term_insurance_select" onchange="calculateTotals()">
                                    <option value="wo" data-rate="{{ $car->short_term_weekly_price_wo_ins }}" data-deposit="{{ $car->short_term_deposit }}" data-cycle="{{ $car->short_term_pricing_cadence }}">No Insurance ({{ amt($car->short_term_weekly_price_wo_ins) }} {{ $car->short_term_pricing_cadence }})</option>
                                    <option value="w" data-rate="{{ $car->short_term_weekly_price_w_ins }}" data-deposit="{{ $car->short_term_deposit }}" data-cycle="{{ $car->short_term_pricing_cadence }}">With Insurance ({{ amt($car->short_term_weekly_price_w_ins) }} {{ $car->short_term_pricing_cadence }})</option>
                                </select>
                            </div>
                            
                            <!-- Gray details box -->
                            <div class="details-box mb-3">
                                • Min term: {{ $car->short_term_minimum_term }} week(s)<br>
                                • Max term: 12 weeks<br>
                                • Deposit: {{ amt($car->short_term_deposit) }}<br>
                                • Excess: {{ amt($car->short_term_excess_liability) }}<br>
                                • Notice: {{ $car->short_term_notice_period_to_return }}d
                            </div>
                        </div>
                        @endif

                        @if($car->long_term)
                        <div id="long_term_pricing" class="d-none pricing-section">
                            <div>
                                <label class="form-label fw-semibold">Term</label>
                                <select class="form-select custom-select mb-3" id="long_term_term_select" onchange="updateLongTermPricing()">
                                    @foreach($car->long_term_term_options as $termOption)
                                    <option
                                        value="{{ $termOption }}"
                                        data-w-price="{{ isset($car->long_term_prices[$termOption]['price_w_ins']) ? $car->long_term_prices[$termOption]['price_w_ins'] : 0 }}"
                                        data-wo-price="{{ isset($car->long_term_prices[$termOption]['price_wo_ins']) ? $car->long_term_prices[$termOption]['price_wo_ins'] : 0 }}"
                                        data-m-include="{{ isset($car->long_term_prices[$termOption]['maintenance_included']) ? $car->long_term_prices[$termOption]['maintenance_included'] : 0 }}"
                                        data-m-type="{{ isset($car->long_term_prices[$termOption]['maintenance_type']) ? $car->long_term_prices[$termOption]['maintenance_type'] : '' }}"
                                        data-m-price="{{ isset($car->long_term_prices[$termOption]['maintenance_price']) ? $car->long_term_prices[$termOption]['maintenance_price'] : 0 }}"
                                        data-mileage="{{ isset($car->long_term_prices[$termOption]['mileage']) ? $car->long_term_prices[$termOption]['mileage'] : 0 }}"
                                        data-excess="{{ isset($car->long_term_prices[$termOption]['excess_rate']) ? $car->long_term_prices[$termOption]['excess_rate'] : 0 }}"
                                        data-cycle="{{ $car->long_term_billing_cycle }}"
                                        data-deposit="{{ $car->long_term_default_deposit }}"
                                    >
                                        {{ str_replace('m', ' months', $termOption) }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label class="form-label fw-semibold">Insurance</label>
                                <select class="form-select custom-select mb-3" id="long_term_insurance_select" onchange="calculateTotals()">
                                    
                                </select>
                            </div>
                            <!-- Gray details box -->
                            <div class="details-box mb-3">
                                • Billing: {{ $car->long_term_billing_cycle }}<br>   
                                • Deposit: {{ amt($car->long_term_default_deposit) }}<br>
                                • Mileage: <span id="long_term_mileage_value"></span> {{ $car->long_term_billing_cycle }}<br>
                                • Excess Rate: <span id="long_term_excess_value"></span>/mile
                            </div>
                        </div>
                        @endif

                        @if($car->rent_to_buy)
                        <div id="rent_to_buy_pricing" class="d-none pricing-section">
                            <div class="alert alert-light d-flex align-items-center">
                                <i class="fas fa-info-circle me-2"></i>
                                <div>Rent-to-Buy: Own this vehicle at the end of the term</div>
                            </div>
                            <!-- Gray details box -->
                            <div class="details-box mb-3">
                                • Term: {{ $car->rent_to_buy_term }} months<br>   
                                • Deposit: {{ amt($car->rent_to_buy_deposit_amount) }}<br>
                                • Payment: {{ amt($car->rent_to_buy_price_per_cycle) }} {{ $car->rent_to_buy_billing_cycle }}<br>
                                • Final balloon: {{ amt($car->rent_to_buy_balloon_payment) }}<br>
                                • Insurance: {{ $car->rent_to_buy_insurance_included ? 'Included' : 'Not included' }}<br>
                                • Maintenance: {{ $car->rent_to_buy_maintenance_included ? 'Included' : 'Not included' }}<br>
                            </div>
                        </div>
                        @endif

                        <!-- Dates -->
                        <div class="row g-3 mb-3">
                            <div class="col-6">
                                <label class="date-label fw-semibold">Start Date</label>
                                <input type="date" class="form-control custom-date" id="term_start_date" min="{{ date('Y-m-d') }}" onchange="calculateTotals()">
                            </div>
                            <div class="col-6">
                                <label class="date-label fw-semibold">End Date</label>
                                <input type="date" class="form-control custom-date" id="term_end_date" min="{{ date('Y-m-d') }}" readonly style="background:#f7f7f7;">
                            </div>
                        </div>

                        <!-- Pricing -->
                        <div class="price-line">
                            <span>Weekly rental</span>
                            <span id="term_weekly_rental"></span>
                        </div>

                        <div class="price-line mb-2">
                            <span>Deposit</span>
                            <span id="term_deposit"></span>
                        </div>

                        <hr>

                        <div class="total-line mb-3">
                            <span>Total</span>
                            <span id="term_total"></span>
                        </div>

                        <a href="javascript:void(0)" onclick="redirectMe()" class="btn btn-primary continue-btn w-100">Continue Booking</a>
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
            jQuery('.pricing-section').addClass('d-none');
            jQuery('#' + value + '_pricing').removeClass('d-none');

            calculateTotals()
        }

        function updateLongTermPricing() {
            const selectedOption = $('#long_term_term_select option:selected');
            const mileage = selectedOption.data('mileage');
            const excess = selectedOption.data('excess');
            
            $('#long_term_mileage_value').text(mileage ? mileage : '0');
            $('#long_term_excess_value').text('{{ settings("currency_symbol", "$") }}' + (excess ? excess : '0'));

            const wi_rate = selectedOption.data('w-price');
            const wo_rate = selectedOption.data('wo-price');
            const cycle = selectedOption.data('cycle');
            const deposit = selectedOption.data('deposit');

            const ltis = $('#long_term_insurance_select');
            ltis.html(`
                <option value="wo" data-rate="${wo_rate}" data-deposit="${deposit}" data-cycle="${cycle}">No Insurance ({{ settings("currency_symbol", "$") }}${wo_rate} ${cycle})</option>
                <option value="w" data-rate="${wi_rate}" data-deposit="${deposit}" data-cycle="${cycle}">With Insurance ({{ settings("currency_symbol", "$") }}${wi_rate} ${cycle})</option>
            `)

            calculateTotals()
        }

        function calculateTotals(){
            var hire_option = jQuery('#g_hire_option').val();
                
            if(hire_option === 'short_term') {
                const selectInsurance = jQuery('#short_term_insurance_select option:selected');
                const weekly_rent = parseFloat(selectInsurance.data('rate'));
                const deposit = parseFloat(selectInsurance.data('deposit'));
                
                jQuery('#term_weekly_rental').text('{{ settings("currency_symbol", "$") }}' + weekly_rent);
                jQuery('#term_deposit').text('{{ settings("currency_symbol", "$") }}' + deposit);
                jQuery('#term_total').text('{{ settings("currency_symbol", "$") }}' + (weekly_rent + deposit));

                const term = parseInt(jQuery('#short_term_term_select').val());
                const startDate = jQuery('#term_start_date').val();
                if(startDate){
                    const endDate = new Date(startDate);
                    endDate.setDate(endDate.getDate() + (term * 7));
                    jQuery('#term_end_date').val(endDate.toISOString().split('T')[0]);
                } else {
                    jQuery('#term_end_date').val('');
                }
            } else if(hire_option === 'long_term') {
                const selectInsurance = jQuery('#long_term_insurance_select option:selected');
                const weekly_rent = parseFloat(selectInsurance.data('rate'));
                const deposit = parseFloat(selectInsurance.data('deposit'));
                const cycle = selectInsurance.data('cycle');
                
                jQuery('#term_weekly_rental').text('{{ settings("currency_symbol", "$") }}' + weekly_rent + ' ' + cycle);
                jQuery('#term_deposit').text('{{ settings("currency_symbol", "$") }}' + deposit);
                jQuery('#term_total').text('{{ settings("currency_symbol", "$") }}' + (weekly_rent + deposit));

                const term = jQuery('#long_term_term_select').val();
                const startDate = jQuery('#term_start_date').val();
                if(startDate){
                    const endDate = new Date(startDate);
                    endDate.setMonth(endDate.getMonth() + parseInt(term.replace('m', '')));
                    jQuery('#term_end_date').val(endDate.toISOString().split('T')[0]);
                } else {
                    jQuery('#term_end_date').val('');
                }
            } else if(hire_option === 'rent_to_buy'){
                var rent_to_buy_button = jQuery('#rent_to_buy_button');
                const weekly_rent = parseFloat(rent_to_buy_button.data('rate'));
                const deposit = parseFloat(rent_to_buy_button.data('deposit'));
                const cycle = rent_to_buy_button.data('cycle');
                const term = rent_to_buy_button.data('term');
                
                jQuery('#term_weekly_rental').text('{{ settings("currency_symbol", "$") }}' + weekly_rent + ' ' + cycle);
                jQuery('#term_deposit').text('{{ settings("currency_symbol", "$") }}' + deposit);
                jQuery('#term_total').text('{{ settings("currency_symbol", "$") }}' + (weekly_rent + deposit));

                const startDate = jQuery('#term_start_date').val();
                if(startDate){
                    const endDate = new Date(startDate);
                    endDate.setMonth(endDate.getMonth() + parseInt(term));
                    jQuery('#term_end_date').val(endDate.toISOString().split('T')[0]);
                } else {
                    jQuery('#term_end_date').val('');
                }
            }
        }

        function redirectMe(){
            var formData = new FormData();

            const hireOption = jQuery('#g_hire_option').val();

            if(!hireOption){
                return;
            }

            formData.append('hire_option', hireOption);
            
            if(hireOption === 'short_term') {
                const selectInsurance = jQuery('#short_term_insurance_select').val();
                if(!selectInsurance){
                    return;
                }
                formData.append('insurance', selectInsurance);

                const term = jQuery('#short_term_term_select').val();
                if(!term){
                    return;
                }
                formData.append('term', term);
            } else if(hireOption === 'long_term') {
                const term = jQuery('#long_term_term_select').val();
                if(!term){
                    return;
                }
                formData.append('term', term);
                
                const selectInsurance = jQuery('#long_term_insurance_select').val();
                if(!selectInsurance){
                    return;
                }
                formData.append('insurance', selectInsurance);
            } else if(hireOption === 'rent_to_buy'){
                const rentToBuyButton = jQuery('#rent_to_buy_button');
                const term = rentToBuyButton.data('term');
                if(!term){
                    return;
                }
                formData.append('term', term);
            }

            const startDate = jQuery('#term_start_date').val();
            if(!startDate){
                return;
            }

            formData.append('start_date', startDate);
            
            var queryString = Array.from(formData.entries()).reduce((acc, [key, value]) => {
                return acc + `&${key}=${encodeURIComponent(value)}`;
            }, '');
            
            window.location = '{{ route('private_hire_extras', $car->id) }}' + '?' + queryString.slice(1);
        }

        window.addEventListener('load', function() {
            updateLongTermPricing();
        });
    </script>
@endsection
