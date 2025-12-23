@php $carExtra = $car->carExtra; @endphp
<form method="post" action="{{ route('admin.cars.edit.update_step', ['id' => $car->id, 'step' => 1]) }}" onsuccess="updateStepData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12 mt-3">
            <div class="form-group">
                <label class="form-label" for="description">Vehicle Description (Max Characters: 200)</label>
                <textarea class="form-control form-control-lg" id="description" name="description" placeholder="Vehicle description" maxlength="200" required>{{ $car->description }}</textarea>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="" for="top_pick">Top Pick</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="top_pick" name="top_pick"
                        style="width: 3em; height: 1.5em;" value="1" {{ $car->top_pick ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="top_pick">
                        {{ $car->top_pick ? 'Yes' : 'No' }}
                    </label>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="" for="ideal_for_family">Ideal for
                    Family</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="ideal_for_family" name="ideal_for_family"
                        style="width: 3em; height: 1.5em;" value="1" {{ $car->ideal_for_family ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="ideal_for_family">
                        {{ $car->ideal_for_family ? 'Yes' : 'No' }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="" for="free_cancellation">Free
                    cancellation up to 24 hours before pick-up</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="free_cancellation" name="free_cancellation"
                        style="width: 3em; height: 1.5em;" value="1" {{ $car->free_cancellation ? 'checked' : '' }} data-ha-callback="toggler">
                    <label class="form-check-label ms-2" for="free_cancellation">
                        {{ $car->free_cancellation ? 'Yes' : 'No' }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="" for="collision_damage_waiver">Collision
                    Damage Waiver</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="collision_damage_waiver"
                        name="collision_damage_waiver" style="width: 3em; height: 1.5em;" value="1" {{ $car->collision_damage_waiver ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="collision_damage_waiver">
                        {{ $car->collision_damage_waiver ? 'Yes' : 'No' }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="" for="theft_protection">Theft
                    Protection</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="theft_protection" name="theft_protection"
                        style="width: 3em; height: 1.5em;" value="1" {{ $car->theft_protection ? 'checked' : '' }}>
                    <label class="form-check-label ms-2" for="theft_protection">
                        {{ $car->theft_protection ? 'Yes' : 'No' }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-4  class="btn btn-lgmt-3">
            <div class="form-group">
                <label class="" for="unlimited_mileage">Unlimited
                    mileage</label>
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input" id="unlimited_mileage" name="unlimited_mileage"
                        style="width: 3em; height: 1.5em;" value="1" {{ $car->unlimited_mileage ? 'checked' : '' }} data-ha-callback="toggler_unlimited_mileage">
                    <label class="form-check-label ms-2" for="unlimited_mileage">
                        {{ $car->unlimited_mileage ? 'Yes' : 'No' }}</label>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <hr>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for="fuel_type">Fuel Type</label>
                <select name="fuel_type" class="form-select js-select2" id="fuel_type" data-ha-callback="toggler" required>
                    <option value="">Select Fuel Type</option>
                    @foreach ([
                        'Diesel',
                        'Petrol',
                        'Diesel hybrid',
                        'Petrol Hybrid',
                        'Electric',
                        'Plug in hybrid',
                        'Diesel Plug in Hybrid',
                        'Petrol Plug in Hybrid',
                        'Hydrogen'
                    ] as $item)
                        <option value="{{ $item }}" {{ $car->fuel_type == $item ? 'selected' : '' }}>{{ $item }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for="engine_size">
                    <span data-ha-relative="fuel_type" data-ha-equal="Electric">Battery</span>
                    <span data-ha-relative="fuel_type" data-ha-else="Electric">Engine</span>
                    size
                </label>
                <input name="engine_size" type="text" class="form-control form-control-xl" id="engine_size" maxlength="20" value="{{ $car->engine_size }}" required />
            </div>
        </div>

        <div class="col-md-4 mt-3" data-ha-relative="unlimited_mileage" data-ha-else="1">
            <div class="form-group mb-2">
                <label class="form-label">Mileage Policy</label>
                <select class="form-select js-select2" name="mileage_policy" data-ha-callback="toggler">
                    <option value="">Select Mileage Policy</option>
                    @foreach([
                        'unlimited' => 'Unlimited',
                        'limited_per_day' => 'Limited per day',
                        'limited_per_week' => 'Limited per week',
                        'limited_per_month' => 'Limited per month',
                        'limited_per_rental' => 'Limited per rental',
                    ] as $key => $value)
                    <option value="{{ $key }}" {{ $car->mileage_policy == $key ? 'selected' : '' }}>{{ $value }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-4 mt-3" data-ha-relative="mileage_policy" data-ha-else="unlimited">
            <div class="form-group mb-2">
                <label class="form-label">Mileage Limit</label>
                <input class="form-control form-control-xl" min="1" type="text" name="mileage_limit" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ $car->mileage_limit }}">
            </div>
        </div>
        <div class="col-md-4 mt-3" data-ha-relative="mileage_policy" data-ha-else="unlimited">
            <div class="form-group mb-2">
                <label class="form-label">Excess Mileage Rate ({{ settings('currency_symbol', '$') }}
                    per mile)</label>
                <input class="form-control form-control-xl" type="text" name="excess_mileage_rate"
                    placeholder="Excess Mileage Rate" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                    maxlength="20" value="{{ $car->excess_mileage_rate }}">
            </div>
        </div>

        <div class="col-md-4 mt-3" data-ha-relative="free_cancellation" data-ha-else="1">
            <label class="form-label">Cancellation Policy</label>
            <select class="form-select js-select2" name="cancellation_policy">
                <option value="">Select</option>
                @foreach([
                    '336' => 'Flexible - 336h Free Cancellation',
                    '168' => 'Flexible - 168h Free Cancellation',
                    '72' => 'Moderate - 72h Free Cancellation',
                    '48' => 'Moderate - 48h Free Cancellation',
                    '24' => 'Strict - 24h Free Cancellation',
                    '0'  => 'Non-Refundable - 0h Free Cancellation',
                ] as $key => $value)
                <option value="{{ $key }}" {{ $car->cancellation_policy == $key ? 'selected' : '' }}>{{ $value }}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <hr>
            <h5>Road Tax</h5>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for="is_taxed">Is vehicle taxed</label>
                <select name="is_taxed" class="form-select js-select2" id="is_taxed" data-ha-callback="toggler">
                    <option value="1" {{ $carExtra->is_taxed == '1' ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ $carExtra->is_taxed == '0' ? 'selected' : '' }}>No</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 mt-3"  data-ha-relative="is_taxed" data-ha-equal="1">
            <div class="form-group">
                <label class="form-label" for="tax_expiry_date">Expiry Date</label>
                <input name="tax_expiry_date" type="text" data-type="date"
                        class="form-control flatpickr form-control-xl"
                        id="tax_expiry_date" maxlength="20" placeholder="YYYY-MM-DD" value="{{ $carExtra->tax_expiry_date }}" />
            </div>
        </div>

        <div class="col-md-4 mt-3" data-ha-relative="is_taxed" data-ha-equal="1">
            <div class="form-group">
                <label class="form-label" for="tax_type">Tax type</label>
                <select name="tax_type" class="form-select js-select2" id="tax_type">
                    <option value="yearly" {{ $carExtra->tax_type == 'yearly' ? 'selected' : '' }}>Yearly</option>
                    <option value="monthly" {{ $carExtra->tax_type == 'monthly' ? 'selected' : '' }}>Monthly</option>
                </select>
            </div>
        </div>

        <div class="col-md-4 mt-3" data-ha-relative="is_taxed" data-ha-equal="1">
            <div class="form-group">
                <label class="form-label" for="tax_amount">Tax Amount
                    {{ settings('currency_symbol', '$') }}</label>
                <input name="tax_amount" type="text" step="any" class="form-control form-control-xl" id="tax_amount"
                        pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ $carExtra->tax_amount }}" />
            </div>
        </div>

        <div class="col-md-12">
            <hr>
            <h5>Finance</h5>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for=finance_finance_type">{{ __('admin.finance_type') }}</label>
                <input name="finance[finance_type]" type="text" class="form-control form-control-xl"
                        id=finance_finance_type" maxlength="20" value="{{ isset($carExtra->finance['finance_type']) ? $carExtra->finance['finance_type'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for=finance_purchase_price">{{ __('admin.purchase_price') }}
                    {{ settings('currency_symbol', '$') }}</label>
                <input name="finance[purchase_price]" type="text" step="any" class="form-control form-control-xl"
                        id=finance_purchase_price" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                        maxlength="20" value="{{ isset($carExtra->finance['purchase_price']) ? $carExtra->finance['purchase_price'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for=finance_agreement_number">{{ __('admin.agreement_number') }}</label>
                <input name="finance[agreement_number]" type="text" class="form-control form-control-xl"
                        id=finance_agreement_number" maxlength="20" value="{{ isset($carExtra->finance['agreement_number']) ? $carExtra->finance['agreement_number'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for=finance_funder_name">{{ __('admin.funder_name') }}</label>
                <input name="finance[funder_name]" type="text" class="form-control form-control-xl"
                        id=finance_funder_name" maxlength="20" value="{{ isset($carExtra->finance['funder_name']) ? $carExtra->finance['funder_name'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label"
                    for=finance_agreement_start_date">{{ __('admin.agreement_start_date') }}</label>
                <input name="finance[agreement_start_date]" type="text" data-type="date"
                        class="form-control flatpickr form-control-xl"
                        id=finance_agreement_start_date" placeholder="YYYY-MM-DD" value="{{ isset($carExtra->finance['agreement_start_date']) ? $carExtra->finance['agreement_start_date'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label"
                    for=finance_agreement_end_date">{{ __('admin.agreement_end_date') }}</label>
                <input name="finance[agreement_end_date]" type="text" data-type="date"
                        class="form-control flatpickr form-control-xl"
                        id=finance_agreement_end_date" placeholder="YYYY-MM-DD" value="{{ isset($carExtra->finance['agreement_end_date']) ? $carExtra->finance['agreement_end_date'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for=finance_loan_amount">{{ __('admin.loan_amount') }}
                    {{ settings('currency_symbol', '$') }}</label>
                <input name="finance[loan_amount]" type="text" step="any"
                        class="form-control form-control-xl"
                        id=finance_loan_amount" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                        maxlength="20" value="{{ isset($carExtra->finance['loan_amount']) ? $carExtra->finance['loan_amount'] : '' }}" />
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label"
                    for=finance_repayment_frequency">{{ __('admin.repayment_frequency') }}</label>
                <input name="finance[repayment_frequency]" type="text" step="any"
                        class="form-control form-control-xl"
                        id=finance_repayment_frequency" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                        maxlength="20" value="{{ isset($carExtra->finance['repayment_frequency']) ? $carExtra->finance['repayment_frequency'] : '' }}" />
            </div>
        </div>

        <div class="col-md-4 mt-3">
            <div class="form-group">
                <label class="form-label" for="finance_amount">{{ __('admin.amount') }}
                    {{ settings('currency_symbol', '$') }}</label>
                <input name="finance[amount]" type="text" step="any"
                        class="form-control form-control-xl"
                        id="finance_amount" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ isset($carExtra->finance['amount']) ? $carExtra->finance['amount'] : '' }}" />
            </div>
        </div>

        <div class="col-12 mb-2">
            <hr>
            <h5>Vehicle Photos</h5>
        </div>

        <div class="col-md-12">
            <div class="row mb-2">
                @foreach ($car->vehicle_photos ?? [] as $vehicle_photo)
                    <div class="col-md-2">
                        <img src="{{ $vehicle_photo }}" class="img-fluid">
                    </div>
                @endforeach
            </div>
            <div class="row" id="image_preview_container">

            </div>
            <div class="form-group mt-2">
                <label class="form-label">Photos</label>
                <input type="file" name="photos_input" id="photos_input" multiple class="form-control">
            </div>
        </div>
    </div>

    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

<script>    
    function toggler_unlimited_mileage(select, div, to_enable){
        if(to_enable){
            jQuery('[name="mileage_policy"]').val('').trigger('change');
        }else{
            jQuery('[name="mileage_policy"]').val('unlimited').trigger('change');
        }

        toggler(select, div, to_enable);
    }

    function triggerSubmit(){
        jQuery('#submit_button').trigger('click')
    }
</script>