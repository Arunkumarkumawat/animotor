<form method="post" action="{{ route('admin.cars.edit.store_ph_data', ['id' => $car->id]) }}"
    onsuccess="storePrivateHireData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    @php
        $authorities = [
            'Transport for London',
            'Manchester City Council',
            'Birmingham City Council',
            'Leeds City Council',
            'Liverpool City Council',
            'Newcastle City Council',
            'Nottingham City Council',
            'Salford City Council',
            'Sheffield City Council',
            'West Midlands City Council',
        ];
    @endphp
    <h5 class="mt-4">Private Hire</h5>
    <div class="row">
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label class="form-label" for="private_hire">Licensing Authority</label>
                <select class="form-control" name="licensing_authority">
                    <option value="">Select Licensing Authority</option>
                    @foreach ($authorities as $authority)
                        <option value="{{ $authority }}"
                            {{ $car->licensing_authority == $authority ? 'selected' : '' }}>{{ $authority }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>PHV Plate Number</label>
                <input type="text" name="phv_plate_number" pattern="^[A-Za-z0-9]{4,20}$" class="form-control"
                    placeholder="PHV Plate Number" maxlength="20" value="{{ $car->phv_plate_number }}">
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>PHV Expiry Date</label>
                <input type="text" data-type="date" name="phv_expiry_date" class="form-control flatpickr"
                    placeholder="YYYY-MM-DD" value="{{ $car->phv_expiry_date }}">
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>H&R Insurance Expiry</label>
                <input type="text" data-type="date" name="hr_insurance_expiry" class="form-control flatpickr"
                    placeholder="YYYY-MM-DD" value="{{ $car->hr_insurance_expiry }}">
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>Plate Certificate</label>
                <input type="file" name="plate_certificate" class="form-control" placeholder="Plate Certificate">
                @if ($car->plate_certificate)
                    <a href="{{ $car->plate_certificate }}" target="_blank">View Plate
                        Certificate</a>
                @endif
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>H&R Insurance Proof</label>
                <input type="file" name="hr_insurance_proof" class="form-control" placeholder="H&R Insurance Proof">
                @if ($car->hr_insurance_proof)
                    <a href="{{ $car->hr_insurance_proof }}" target="_blank">View H&R
                        Insurance Proof</a>
                @endif
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 mt-2">
            <h6>Hire Types Enabled</h6>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="short_term" value="1" {{ $car->short_term ? 'checked' : '' }}
                        data-ha-callback="toggler">
                    Short Term Flexible
                </label>
                <p>1 week - 3 months</p>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="long_term" value="1" {{ $car->long_term ? 'checked' : '' }}
                        data-ha-callback="toggler">
                    Long Term
                </label>
                <p>3 months+</p>
            </div>
        </div>
        <div class="col-md-4 mt-2">
            <div class="form-group">
                <label>
                    <input type="checkbox" name="rent_to_buy" value="1" {{ $car->rent_to_buy ? 'checked' : '' }}
                        data-ha-callback="toggler">
                    Rent-to-Buy
                </label>
                <p>R2B Option</p>
            </div>
        </div>
    </div>

    <div class="card" style="margin-left: -15px; margin-right: -15px;" data-ha-relative="short_term"
        data-ha-equal="1">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h6>Short Term Flexible Configuration</h6>
                    <p>Weekly Pricing with flexible terms upto 12 weeks.</p>
                </div>
                <div class="col-md-4 mt-3 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="minimum_term">Minimum
                            Term</label>
                        <select name="short_term_minimum_term" class="form-control">
                            <option value="">Select</option>
                            @foreach (range(1, 4) as $term)
                                <option value="{{ $term }}"
                                    {{ $car->short_term_minimum_term == $term ? 'selected' : '' }}>{{ $term }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="maximum_term">Maximum
                            Term</label>
                        <select name="short_term_maximum_term" class="form-control" readonly>
                            <option value="12" {{ $car->short_term_maximum_term == '12' ? 'selected' : '' }}>Up to
                                12 weeks</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-3 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="pricing_cadence">Pricing
                            Cadence</label>
                        <select name="short_term_pricing_cadence" class="form-control" readonly>
                            <option value="weekly"
                                {{ $car->short_term_pricing_cadence == 'weekly' ? 'selected' : '' }}>Weekly</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="weekly_price_wo_ins">Weekly
                            Price (Without Insurance)
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="short_term_weekly_price_wo_ins" type="text" min="1"
                            class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->short_term_weekly_price_wo_ins }}">
                    </div>
                </div>
                <div class="col-md-6 mt-3 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="weekly_price_w_ins">Weekly
                            Price (With Insurance)
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="short_term_weekly_price_w_ins" type="text" min="1"
                            class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->short_term_weekly_price_w_ins }}">
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="maintenance_included">
                            <input name="short_term_maintenance_included" type="checkbox" value="1"
                                {{ $car->short_term_maintenance_included ? 'checked' : '' }}>
                            Maintenance Included
                        </label>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="deposit">Deposit
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="short_term_deposit" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->short_term_deposit }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="excess_liability">Excess/Liability
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="short_term_excess_liability" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->short_term_excess_liability }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="early_return_fee">Early
                            Return Fee
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="short_term_early_return_fee" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->short_term_early_return_fee }}">
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="notice_period_to_return">Notice Period to
                            Return</label>
                        <input name="short_term_notice_period_to_return" type="text" min="1"
                            class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->short_term_notice_period_to_return }}">
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="alert alert-info">
                        <p>Extensions are automatically allowed week-by-week up to
                            12 weeks total.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-left: -15px; margin-right: -15px;" data-ha-relative="long_term"
        data-ha-equal="1">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mt-2">
                    <h6>Long Term Configuration</h6>
                    <p>3+ months with flexible pricing matrix</p>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label class="form-label" for="billing_cycle">Billing
                            Cycle</label>
                        <select name="long_term_billing_cycle" class="form-control">
                            <option value="">Select</option>
                            @foreach ([
        'weekly' => 'Weekly',
        'monthly' => 'Monthly',
        'quarterly' => 'Quarterly',
    ] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ $car->long_term_billing_cycle == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 mt-3">
                    <div class="form-group">
                        <label class="form-label" for="default_deposit">Default
                            Deposit {{ settings('currency_symbol', '$') }}</label>
                        <input name="long_term_default_deposit" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->long_term_default_deposit }}">
                    </div>
                </div>
                <div class="col-md-12 mt-3">
                    <h5>Term Options</h5>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="long_term_term_options">
                            <input name="long_term_term_options[]" type="checkbox" value="3m"
                                {{ in_array('3m', $car->long_term_term_options ?? []) ? 'checked' : '' }}
                                data-ha-callback="toggler">
                            3 Months
                        </label>
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="long_term_term_options">
                            <input name="long_term_term_options[]" type="checkbox" value="6m"
                                {{ in_array('6m', $car->long_term_term_options ?? []) ? 'checked' : '' }}
                                data-ha-callback="toggler">
                            6 Months
                        </label>
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="long_term_term_options">
                            <input name="long_term_term_options[]" type="checkbox" value="9m"
                                {{ in_array('9m', $car->long_term_term_options ?? []) ? 'checked' : '' }}
                                data-ha-callback="toggler">
                            9 Months
                        </label>
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="long_term_term_options">
                            <input name="long_term_term_options[]" type="checkbox" value="12m"
                                {{ in_array('12m', $car->long_term_term_options ?? []) ? 'checked' : '' }}
                                data-ha-callback="toggler">
                            12 Months
                        </label>
                    </div>
                </div>
                <div class="col-md-2 mt-2">
                    <div class="form-group">
                        <label class="form-label" for="long_term_term_options">
                            <input name="long_term_term_options[]" type="checkbox" value="18m"
                                {{ in_array('18m', $car->long_term_term_options ?? []) ? 'checked' : '' }}
                                data-ha-callback="toggler">
                            18 Months
                        </label>
                    </div>
                </div>

                <div class="col-md-12 mt-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Term</th>
                                <th>Price w/o Insurance</th>
                                <th>Price w/ Insurance</th>
                                <th>Maintenance Included?</th>
                                <th>Maintenance Type</th>
                                <th>Maintenance Price</th>
                                <th>Mileage</th>
                                <th>Excess Rate</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr data-ha-relative="long_term_term_options[]" data-ha-resolver="longTermOptionsToggler"
                                data-val="3m">
                                <td>3 Months</td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[3m][price_wo_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['3m']['price_wo_ins']) ? $car->long_term_prices['3m']['price_wo_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[3m][price_w_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['3m']['price_w_ins']) ? $car->long_term_prices['3m']['price_w_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="long_term_prices[3m][maintenance_included]"
                                        value="1"
                                        {{ isset($car->long_term_prices['3m']['maintenance_included']) && $car->long_term_prices['3m']['maintenance_included'] ? 'checked' : '' }}
                                        data-ha-callback="toggler">
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[3m][maintenance_included]"
                                        data-ha-equal="1">
                                        <select class="form-control" name="long_term_prices[3m][maintenance_type]">
                                            <option value="">Select</option>
                                            <option value="basic"
                                                {{ isset($car->long_term_prices['3m']['maintenance_type']) && $car->long_term_prices['3m']['maintenance_type'] == 'basic' ? 'selected' : '' }}>
                                                Basic</option>
                                            <option value="full"
                                                {{ isset($car->long_term_prices['3m']['maintenance_type']) && $car->long_term_prices['3m']['maintenance_type'] == 'full' ? 'selected' : '' }}>
                                                Full</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[3m][maintenance_included]"
                                        data-ha-equal="1">
                                        <input type="text" min="1"
                                            name="long_term_prices[3m][maintenance_price]" class="form-control"
                                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                                            value="{{ isset($car->long_term_prices['3m']['maintenance_price']) ? $car->long_term_prices['3m']['maintenance_price'] : '' }}">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[3m][mileage]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['3m']['mileage']) ? $car->long_term_prices['3m']['mileage'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[3m][excess_rate]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['3m']['excess_rate']) ? $car->long_term_prices['3m']['excess_rate'] : '' }}">
                                </td>
                            </tr>

                            <tr data-ha-relative="long_term_term_options[]" data-ha-resolver="longTermOptionsToggler"
                                data-val="6m">
                                <td>6 Months</td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[6m][price_wo_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['6m']['price_wo_ins']) ? $car->long_term_prices['6m']['price_wo_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[6m][price_w_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['6m']['price_w_ins']) ? $car->long_term_prices['6m']['price_w_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="long_term_prices[6m][maintenance_included]"
                                        value="1"
                                        {{ isset($car->long_term_prices['6m']['maintenance_included']) && $car->long_term_prices['6m']['maintenance_included'] ? 'checked' : '' }}
                                        data-ha-callback="toggler">
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[6m][maintenance_included]"
                                        data-ha-equal="1">
                                        <select class="form-control" name="long_term_prices[6m][maintenance_type]">
                                            <option value="">Select</option>
                                            <option value="basic"
                                                {{ isset($car->long_term_prices['6m']['maintenance_type']) && $car->long_term_prices['6m']['maintenance_type'] == 'basic' ? 'selected' : '' }}>
                                                Basic</option>
                                            <option value="full"
                                                {{ isset($car->long_term_prices['6m']['maintenance_type']) && $car->long_term_prices['6m']['maintenance_type'] == 'full' ? 'selected' : '' }}>
                                                Full</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[6m][maintenance_included]"
                                        data-ha-equal="1">
                                        <input type="text" min="1"
                                            name="long_term_prices[6m][maintenance_price]" class="form-control"
                                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                                            value="{{ isset($car->long_term_prices['6m']['maintenance_price']) ? $car->long_term_prices['6m']['maintenance_price'] : '' }}">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[6m][mileage]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['6m']['mileage']) ? $car->long_term_prices['6m']['mileage'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[6m][excess_rate]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['6m']['excess_rate']) ? $car->long_term_prices['6m']['excess_rate'] : '' }}">
                                </td>
                            </tr>

                            <tr data-ha-relative="long_term_term_options[]" data-ha-resolver="longTermOptionsToggler"
                                data-val="9m">
                                <td>9 Months</td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[9m][price_wo_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['9m']['price_wo_ins']) ? $car->long_term_prices['9m']['price_wo_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[9m][price_w_ins]"
                                        class="form-control"
                                        value="{{ isset($car->long_term_prices['9m']['price_w_ins']) ? $car->long_term_prices['9m']['price_w_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="long_term_prices[9m][maintenance_included]"
                                        value="1"
                                        {{ isset($car->long_term_prices['9m']['maintenance_included']) && $car->long_term_prices['9m']['maintenance_included'] ? 'checked' : '' }}
                                        data-ha-callback="toggler">
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[9m][maintenance_included]"
                                        data-ha-equal="1">
                                        <select class="form-control" name="long_term_prices[9m][maintenance_type]">
                                            <option value="">Select</option>
                                            <option value="basic"
                                                {{ isset($car->long_term_prices['9m']['maintenance_type']) && $car->long_term_prices['9m']['maintenance_type'] == 'basic' ? 'selected' : '' }}>
                                                Basic</option>
                                            <option value="full"
                                                {{ isset($car->long_term_prices['9m']['maintenance_type']) && $car->long_term_prices['9m']['maintenance_type'] == 'full' ? 'selected' : '' }}>
                                                Full</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[9m][maintenance_included]"
                                        data-ha-equal="1">
                                        <input type="text" min="1"
                                            name="long_term_prices[9m][maintenance_price]" class="form-control"
                                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                                            value="{{ isset($car->long_term_prices['9m']['maintenance_price']) ? $car->long_term_prices['9m']['maintenance_price'] : '' }}">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[9m][mileage]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['9m']['mileage']) ? $car->long_term_prices['9m']['mileage'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[9m][excess_rate]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['9m']['excess_rate']) ? $car->long_term_prices['9m']['excess_rate'] : '' }}">
                                </td>
                            </tr>

                            <tr data-ha-relative="long_term_term_options[]" data-ha-resolver="longTermOptionsToggler"
                                data-val="12m">
                                <td>12 Months</td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[12m][price_wo_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['12m']['price_wo_ins']) ? $car->long_term_prices['12m']['price_wo_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[12m][price_w_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['12m']['price_w_ins']) ? $car->long_term_prices['12m']['price_w_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="long_term_prices[12m][maintenance_included]"
                                        value="1"
                                        {{ isset($car->long_term_prices['12m']['maintenance_included']) && $car->long_term_prices['12m']['maintenance_included'] ? 'checked' : '' }}
                                        data-ha-callback="toggler">
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[12m][maintenance_included]"
                                        data-ha-equal="1">
                                        <select class="form-control" name="long_term_prices[12m][maintenance_type]">
                                            <option value="">Select</option>
                                            <option value="basic"
                                                {{ isset($car->long_term_prices['12m']['maintenance_type']) && $car->long_term_prices['12m']['maintenance_type'] == 'basic' ? 'selected' : '' }}>
                                                Basic</option>
                                            <option value="full"
                                                {{ isset($car->long_term_prices['12m']['maintenance_type']) && $car->long_term_prices['12m']['maintenance_type'] == 'full' ? 'selected' : '' }}>
                                                Full</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[12m][maintenance_included]"
                                        data-ha-equal="1">
                                        <input type="text" min="1"
                                            name="long_term_prices[12m][maintenance_price]" class="form-control"
                                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                                            value="{{ isset($car->long_term_prices['12m']['maintenance_price']) ? $car->long_term_prices['12m']['maintenance_price'] : '' }}">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[12m][mileage]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['12m']['mileage']) ? $car->long_term_prices['12m']['mileage'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[12m][excess_rate]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['12m']['excess_rate']) ? $car->long_term_prices['12m']['excess_rate'] : '' }}">
                                </td>
                            </tr>

                            <tr data-ha-relative="long_term_term_options[]" data-ha-resolver="longTermOptionsToggler"
                                data-val="18m">
                                <td>18 Months</td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[18m][price_wo_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['18m']['price_wo_ins']) ? $car->long_term_prices['18m']['price_wo_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[18m][price_w_ins]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['18m']['price_w_ins']) ? $car->long_term_prices['18m']['price_w_ins'] : '' }}">
                                </td>
                                <td>
                                    <input type="checkbox" name="long_term_prices[18m][maintenance_included]"
                                        value="1"
                                        {{ isset($car->long_term_prices['18m']['maintenance_included']) && $car->long_term_prices['18m']['maintenance_included'] ? 'checked' : '' }}
                                        data-ha-callback="toggler">
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[18m][maintenance_included]"
                                        data-ha-equal="1">
                                        <select class="form-control" name="long_term_prices[18m][maintenance_type]">
                                            <option value="">Select</option>
                                            <option value="basic"
                                                {{ isset($car->long_term_prices['18m']['maintenance_type']) && $car->long_term_prices['18m']['maintenance_type'] == 'basic' ? 'selected' : '' }}>
                                                Basic</option>
                                            <option value="full"
                                                {{ isset($car->long_term_prices['18m']['maintenance_type']) && $car->long_term_prices['18m']['maintenance_type'] == 'full' ? 'selected' : '' }}>
                                                Full</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div data-ha-relative="long_term_prices[18m][maintenance_included]"
                                        data-ha-equal="1">
                                        <input type="text" min="1"
                                            name="long_term_prices[18m][maintenance_price]" class="form-control"
                                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                                            value="{{ isset($car->long_term_prices['18m']['maintenance_price']) ? $car->long_term_prices['18m']['maintenance_price'] : '' }}">
                                    </div>
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[18m][mileage]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['18m']['mileage']) ? $car->long_term_prices['18m']['mileage'] : '' }}">
                                </td>
                                <td>
                                    <input type="text" min="1" name="long_term_prices[18m][excess_rate]"
                                        class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                                        maxlength="20"
                                        value="{{ isset($car->long_term_prices['18m']['excess_rate']) ? $car->long_term_prices['18m']['excess_rate'] : '' }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label class="form-label">Excess/Liability
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="long_term_excess_liability" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->long_term_excess_liability }}">
                    </div>
                </div>

                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label>
                            <input name="long_term_vehicle_swap_allowed" type="checkbox" value="1"
                                {{ $car->long_term_vehicle_swap_allowed ? 'checked' : '' }}>
                            Vehicle Swap Allowed
                        </label>
                    </div>
                </div>

                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label class="form-label">Early Termination Rules</label>
                        <textarea name="long_term_early_termination_rules" class="form-control">{{ $car->long_term_early_termination_rules }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="margin-left: -15px; margin-right: -15px;" data-ha-relative="rent_to_buy"
        data-ha-equal="1">
        <div class="card-body">
            <h5>Rent To Buy</h5>
            <div class="row">
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">Term (Weeks)</label>
                        <input name="rent_to_buy_term" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_term }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">Billing Cycle</label>
                        <select name="rent_to_buy_billing_cycle" class="form-control">
                            <option value="">Select</option>
                            @foreach ([
        'weekly' => 'Weekly',
        'monthly' => 'Monthly',
        'quarterly' => 'Quarterly',
    ] as $value => $label)
                                <option value="{{ $value }}"
                                    {{ $car->rent_to_buy_billing_cycle == $value ? 'selected' : '' }}>
                                    {{ $label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">Price Per Cycle
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="rent_to_buy_price_per_cycle" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_price_per_cycle }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">Deposit Amount
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="rent_to_buy_deposit_amount" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_deposit_amount }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">Balloon Payment
                            {{ settings('currency_symbol', '$') }}</label>
                        <input name="rent_to_buy_balloon_payment" type="text" min="1" class="form-control"
                            pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_balloon_payment }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">Payment Break Weeks/Year</label>
                        <input name="rent_to_buy_payment_break_weeks_year" type="text" min="1"
                            class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_payment_break_weeks_year }}">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label class="form-label">Mileage Allowance (Per
                            Cycle)</label>
                        <input name="rent_to_buy_mileage_allowance_per_cycle" type="text" min="1"
                            class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_mileage_allowance_per_cycle }}">
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group">
                        <label class="form-label">Excess Mileage Rate</label>
                        <input name="rent_to_buy_excess_mileage_rate" type="text" min="1"
                            class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"
                            value="{{ $car->rent_to_buy_excess_mileage_rate }}">
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">
                            <input name="rent_to_buy_insurance_included" type="checkbox" value="1"
                                {{ $car->rent_to_buy_insurance_included ? 'checked' : '' }}>
                            Insurance Included
                        </label>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">
                            <input name="rent_to_buy_maintenance_included" type="checkbox" value="1"
                                {{ $car->rent_to_buy_maintenance_included ? 'checked' : '' }}>
                            Maintenance Included
                        </label>
                    </div>
                </div>
                <div class="col-md-4 mt-2">
                    <div class="form-group">
                        <label class="form-label">
                            <input name="rent_to_buy_ev_incentive_included" type="checkbox" value="1"
                                {{ $car->rent_to_buy_ev_incentive_included ? 'checked' : '' }}>
                            EV Incentive Included
                        </label>
                    </div>
                </div>
                <div class="col-md-12 mt-2">
                    <div class="form-group">
                        <label>Ownership Transfer Notes</label>
                        <textarea name="rent_to_buy_ownership_transfer_notes" class="form-control">{{ $car->rent_to_buy_ownership_transfer_notes }}</textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

<script>
    function triggerSubmit() {
        jQuery('#submit_button').trigger('click')
    }
    
    function storePrivateHireData(response){
        if(response.status == 'success'){
            NioApp.Toast(response.message, 'success', {
                position: 'top-right'
            });
        } else {
            showError(response);
        }
    }

    function longTermOptionsToggler(relative, val, input) {
        if (input.value == relative.getAttribute('data-val')) {
            return input.checked;
        }

        return null;
    }
</script>