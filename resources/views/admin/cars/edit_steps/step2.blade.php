<form method="post" action="{{ route('admin.cars.edit.update_step', ['id' => $car->id, 'step' => 2]) }}" onsuccess="updateStepData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div for="daily_rate" class="d-flex justify-content-between">
                    <div>Daily Rate {{ settings('currency_symbol', '$') }}</div>
                    <div>
                        <div class="form-control-wrap">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="daily_rate_tax_incl"
                                    name="daily_rate_tax_incl" style="width: 3em; height: 1.5em; margin-top : -1px"
                                    disabled {{ $car->daily_rate_tax_incl ? 'checked' : '' }} value="1" data-ha-callback="toggler">
                                <label class="form-check-label ms-2" for="daily_rate_tax_incl">
                                    <span data-ha-relative="daily_rate_tax_incl" data-ha-equal="1">Tax Included</span>
                                    <span data-ha-relative="daily_rate_tax_incl" data-ha-else="1">Tax Excluded</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" min="1" name="daily_rate" name="daily_rate"
                    class="form-control form-control-lg" data-ui="xl" id="daily_rate"
                    pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ $car->daily_rate }}">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div for="weekly_rate" class="d-flex justify-content-between">
                    <div>Weekly Rate {{ settings('currency_symbol', '$') }}</div>
                    <div>
                        <div class="form-control-wrap">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="weekly_rate_tax_incl"
                                    name="weekly_rate_tax_incl" style="width: 3em; height: 1.5em; margin-top : -1px"
                                    disabled {{ $car->weekly_rate_tax_incl ? 'checked' : '' }} value="1" data-ha-callback="toggler">
                                <label class="form-check-label ms-2" for="weekly_rate_tax_incl">
                                    <span data-ha-relative="weekly_rate_tax_incl" data-ha-equal="1">Tax Included</span>
                                    <span data-ha-relative="weekly_rate_tax_incl" data-ha-else="1">Tax Excluded</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" min="1" name="weekly_rate" name="weekly_rate"
                    class="form-control form-control-lg" data-ui="xl" id="weekly_rate"
                    pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ $car->weekly_rate }}">
            </div>
        </div>
        <div class="col-md-4 mt-3">
            <div class="form-group">
                <div for="monthly_rate" class="d-flex justify-content-between">
                    <div>Monthly Rate {{ settings('currency_symbol', '$') }}</div>
                    <div>
                        <div class="form-control-wrap">
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="monthly_rate_tax_incl"
                                    name="monthly_rate_tax_incl" style="width: 3em; height: 1.5em; margin-top : -1px"
                                    disabled {{ $car->monthly_rate_tax_incl ? 'checked' : '' }} value="1" data-ha-callback="toggler">
                                <label class="form-check-label ms-2" for="monthly_rate_tax_incl">
                                    <span data-ha-relative="monthly_rate_tax_incl" data-ha-equal="1">Tax Included</span>
                                    <span data-ha-relative="monthly_rate_tax_incl" data-ha-else="1">Tax Excluded</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="text" min="1" name="monthly_rate" name="monthly_rate"
                    class="form-control form-control-lg" data-ui="xl" id="monthly_rate"
                    pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ $car->monthly_rate }}">
            </div>
        </div>
    </div>

    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

@php
    $dynamic_pricings = $car->dynamic_pricings ?? [];
    $adjustmentTypes = ['percentage_increase' => 'Percentage Increase', 'fixed_surcharge' => 'Fixed Surcharge', 'fixed_price' => 'Fixed Price'];
@endphp
<div class="row">
    <div class="col-md-12 mt-3">
        <hr>
        <h5>Dynamic Pricing</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Rule Name</th>
                    <th>Adjustment Type</th>
                    <th>Adjustment Value</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-container-full="dynamic_pricings">
                @foreach ($dynamic_pricings ?? [] as $index => $pricing)
                    <tr>
                        <td>{{ $pricing['rule_name'] }}</td>
                        <td>{{ $adjustmentTypes[$pricing['adjustment_type']] }}</td>
                        <td>{{ $pricing['adjustment_value'] }}
                            {{ $pricing['adjustment_type'] == 'percentage_increase' ? '%' : settings('currency_symbol', '$') }}
                        </td>
                        <td>{{ $pricing['start_date'] }}</td>
                        <td>{{ $pricing['end_date'] }}</td>
                        <td>
                            <button type="button" onclick="removeDynamicPricing({{$index}})" class="btn btn-danger">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="dynamic_pricings">
                <tr>
                    <td colspan="6" class="text-center">No dynamic pricing
                        rules found</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 mt-3">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_dynamic_pricing', $car->id) }}" onsuccess="addDynamicPricing" onfailure="showError">
                @csrf

                <div class="form-group">
                    <label for="rule_name">Rule Name</label>
                    <input type="text" name="rule_name" minlength="3" maxlength="100" name="rule_name" class="form-control form-control-lg" data-ui="xl" id="rule_name">
                </div>
                <div class="form-group">
                    <label for="adjustment_type">Adjustment Type</label>
                    <select name="adjustment_type"
                        class="form-control form-control-lg" data-ui="xl" id="adjustment_type" data-ha-callback="toggler">
                        <option value="percentage_increase">Percentage Increase</option>
                        <option value="fixed_surcharge">Fixed Surcharge</option>
                        <option value="fixed_price">Fixed Price</option>
                    </select>
                </div>

                <div class="form-group" data-ha-relative="adjustment_type" data-ha-equal="percentage_increase">
                    <label for="adjustment_percent">Adjustment Value %</label>
                    <input type="text" min="1" max="100" name="adjustment_percent"
                        class="form-control form-control-lg" data-ui="xl"
                        id="adjustment_percent" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                </div>

                <div class="form-group" data-ha-relative="adjustment_type" data-ha-else="percentage_increase">
                    <label for="adjustment_value">Adjustment Value
                        {{ settings('currency_symbol', '$') }}</label>
                    <input type="text" min="1" name="adjustment_value"
                        class="form-control form-control-lg" data-ui="xl"
                        id="adjustment_value" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date</label>
                    <input type="text" data-type="date" maxlength="20" name="start_date"
                        class="form-control form-control-lg flatpickr" data-ui="xl"
                        id="start_date" placeholder="YYYY-MM-DD">
                </div>

                <div class="form-group">
                    <label for="end_date">End Date</label>
                    <input type="text" data-type="date" maxlength="20" name="end_date"
                        class="form-control form-control-lg flatpickr" data-ui="xl" id="end_date"
                        placeholder="YYYY-MM-DD">
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
    containerFullOrEmpty('dynamic_pricings');
});

const adjustmentTypes = @json($adjustmentTypes);

function component_dynamic_pricing(item, index){
    return `<tr>
        <td>${item.rule_name}</td>
        <td>${adjustmentTypes[item.adjustment_type]}</td>
        <td>${item.adjustment_value}
            ${item.adjustment_type == 'percentage_increase' ? '%' : settings('currency_symbol', '$')}
        </td>
        <td>${item.start_date}</td>
        <td>${item.end_date}</td>
        <td>
            <button type="button" onclick="removeDynamicPricing(${index})"
                class="btn btn-danger">Remove</button>
        </td>
    </tr>`
}

function addDynamicPricing(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="dynamic_pricings"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="dynamic_pricings"]').append(component_dynamic_pricing(response.data[i], i));
        }
        containerFullOrEmpty('dynamic_pricings');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function removeDynamicPricing(index){
    if(!confirm('Are you sure?')){
        return;
    }

    $.post('{{ route('admin.cars.edit.delete_dynamic_pricing', $car->id) }}', {index: index, _token: '{{ csrf_token() }}'}, function(response){
        addDynamicPricing(response);
    })  
}

function triggerSubmit(){
    jQuery('#submit_button').trigger('click')
}
</script>