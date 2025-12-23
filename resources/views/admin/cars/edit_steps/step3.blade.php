<div class="row">
    <div class="col-12 mb-2 mt-2">
        <h6>Extras (Booking addons)</h6>
    </div>

    <div class="col-8 mt-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Interval</th>
                    <th>Price {{ settings('currency_symbol', '$') }}</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-container-full="extras">
                @foreach ($car->extras as $index => $extra)
                    <tr>
                        <td>{{ $extra['title'] }}</td>
                        <td>{{ $extra['description'] ?? 'N/A' }}</td>
                        <td>{{ $extra['interval'] ?? 'daily' }}</td>
                        <td>{{ amt($extra['price']) }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="removeExtra({{ $index }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="extras">
                <tr>
                    <td colspan="5">No extras found</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-4 mt-2">
        <form method="post" action="{{ route('admin.cars.edit.add_extra', $car->id) }}" onsuccess="addExtra" onfailure="showError" style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            @csrf
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="title"
                    placeholder="Title" maxlength="50" required>
            </div>
            <div class="form-group">
                <input class="form-control  form-control-lg" type="text" name="description"
                    placeholder="Description" maxlength="200" required>
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" min="1" type="text" name="price"
                    placeholder="Price {{ settings('currency_symbol', '$') }}" pattern="^[0-9]+(\.[0-9]{2}){0,1}$"
                    step="0.01" maxlength="20" required>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg select2" name="interval"
                    placeholder="Interval" required>
                    <option value="">Select Interval</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="one_time">One Time</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-lg btn-success">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-12 mb-2 mt-2">
        <h6>Insurance Coverage</h6>
    </div>

    <div class="col-8 mt-2 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Coverage Level</th>
                    <th>What's Covered</th>
                    <th>Daily Price {{ settings('currency_symbol', '$') }}</th>
                    <th>Excess {{ settings('currency_symbol', '$') }}</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-container-full="insurance_coverages">
                @foreach ($car->insurance_coverage ?? [] as $index => $insurance_coverage0)
                    <tr>
                        <td>
                            {{ $insurance_coverage0['level'] }}
                            @if (isset($insurance_coverage0['policy_id']))
                                <button type="button" class="btn btn-link"
                                    onclick="showPolicyDetails('{{ route('admin.insurance-coverages.show', $insurance_coverage0['policy_id']) }}')">
                                    View Policy
                                </button>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-link" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="text-decoration: none;">
                                    {{ $insurance_coverage0['cover'] }}
                                </button>
                                @if (isset($insurance_coverage0['cover_descr']))
                                    <div class="dropdown-menu dropdown-menu-start"
                                        style="min-width: 400px; max-height:400px; overflow-y:auto; padding: 10px;">
                                        {!! $insurance_coverage0['cover_descr'] !!}
                                    </div>
                                @endif
                            </div>
                        </td>
                        <td>{{ amt($insurance_coverage0['daily_price']) }}</td>
                        <td>{{ amt($insurance_coverage0['excess']) }}</td>
                        <td>
                            <button type="button" class="btn btn-warning" onclick="removeInsuranceCoverage({{ $index }})">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="insurance_coverages">
                <tr>
                    <td colspan="5">No insurance coverages found</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-4 mt-2">
        <form method="post" action="{{ route('admin.cars.edit.add_insurance_coverage', $car->id) }}" onsuccess="addInsuranceCoverage" onfailure="showError" style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            @csrf
            <div class="form-group">
                <select class="form-control form-control-lg select2" name="level" onchange="updatePolicyDropdown(this.value)">
                    <option value="">Select Level</option>
                    <option value="Full Protection">Full Protection</option>
                    <option value="CDW">CDW</option>
                    <option value="Excess">Excess</option>
                    <option value="Theft">Theft</option>
                    <option value="Addons">Addons</option>
                    <option value="Basic">Basic</option>
                </select>
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg select2" name="policy_id">
                    <option value="">Select Policy</option>
                    {{-- @foreach ($policies as $policy)
                        <option value="{{ $policy->id }}">
                            {{ $policy->policy_number }}</option>
                    @endforeach --}}
                </select>
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="cover" placeholder="What's Covered" maxlength="20">
            </div>
            <div class="form-group">
                <textarea class="form-control form-control-lg" name="cover_descr" id="whats_covered_descr" type="text" placeholder="What's Covered Description" maxlength="255"></textarea>
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text"
                    name="daily_price"
                    placeholder="Daily Price  {{ settings('currency_symbol', '$') }}" min="1"
                    pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
            </div>
            <div class="form-group">
                <input class="form-control form-control-lg" type="text" name="excess"
                    placeholder="Excess" min="1" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01"
                    maxlength="20">
            </div>
            <div class="form-group">
                <select class="form-control form-control-lg select2" name="interval"
                    placeholder="Interval">
                    <option value="">Select Interval</option>
                    <option value="daily">Daily</option>
                    <option value="weekly">Weekly</option>
                    <option value="one_time">One Time</option>
                </select>
            </div>
            <div class="form-group mt-3">
                <button type="submit" class="btn btn-lg btn-success">
                    Save
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="policy_show_modal" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true" wire:ignore.self>
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Policy Details</h5>
                <button type="button" class="close" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <iframe id="policy_details_iframe" style="height:400px;border:none;padding:0;margin:0;width:100%;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"
                    data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
    containerFullOrEmpty('extras');
    containerFullOrEmpty('insurance_coverages');
    updatePolicyDropdown(document.querySelector('[name="level"]').value);
});

function component_extra(item, index){
    return `<tr>
        <td>${item.title}</td>
        <td>${item.description ?? 'N/A'}</td>
        <td>${item.interval ?? 'daily'}</td>
        <td>{{settings('currency_symbol', '$')}} ${item.price}</td>
        <td>
            <button type="button" class="btn btn-warning" onclick="removeExtra(${index})">Remove</button>
        </td>
    </tr>`
}

function addExtra(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="extras"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="extras"]').append(component_extra(response.data[i], i));
        }
        containerFullOrEmpty('extras');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function removeExtra(index){
    if(!confirm('Are you sure?')){
        return;
    }

    $.post('{{ route('admin.cars.edit.delete_extra', $car->id) }}', {index: index, _token: '{{ csrf_token() }}'}, function(response){
        addExtra(response);
    })  
}

function component_insurance_coverage(item, index){
    const route = '{{ route('admin.insurance-coverages.show', '%id%') }}'.replace('%id%', item.policy_id);
    
    return `<tr>
        <td>
            ${item.level}
            ${item.policy_id ? `<button type="button" class="btn btn-link"
                    onclick="showPolicyDetails('${route}')">
                    View Policy
                </button>` : ''}
        </td>
        <td>
            <div class="btn-group">
                <button type="button" class="btn btn-link" data-bs-toggle="dropdown"
                    aria-expanded="false" style="text-decoration: none;">
                    ${item.cover}
                </button>
                ${item.cover_descr ? `<div class="dropdown-menu dropdown-menu-start"
                        style="min-width: 400px; max-height:400px; overflow-y:auto; padding: 10px;">
                        ${item.cover_descr}
                    </div>` : ''}
            </div>
        </td>
        <td>{{settings('currency_symbol', '$')}} ${item.daily_price}</td>
        <td>{{settings('currency_symbol', '$')}} ${item.excess}</td>
        <td>
            <button type="button" class="btn btn-warning" onclick="removeInsuranceCoverage(${index})">Remove</button>
        </td>
    </tr>`
}

function addInsuranceCoverage(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="insurance_coverages"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="insurance_coverages"]').append(component_insurance_coverage(response.data[i], i));
        }
        containerFullOrEmpty('insurance_coverages');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function removeInsuranceCoverage(index){
    if(!confirm('Are you sure?')){
        return;
    }

    $.post('{{ route('admin.cars.edit.delete_insurance_coverage', $car->id) }}', {index: index, _token: '{{ csrf_token() }}'}, function(response){
        addInsuranceCoverage(response);
    })  
}

function showPolicyDetails(route){
    jQuery('#policy_details_iframe').attr('src', route);
    jQuery('#policy_show_modal').modal('show');
}

function updatePolicyDropdown(level){
    if(level == ''){
        jQuery('[name="policy_id"]').html('<option value="">Select Policy</option>');
        return;
    }

    $.post('{{ route('admin.cars.edit.update_policy_dropdown') }}', {level: level, _token: '{{ csrf_token() }}'}, function(response){
        jQuery('[name="policy_id"]').html('<option value="">Select Policy</option>');
        for(var i = 0; i < response.data.length; i++){
            jQuery('[name="policy_id"]').append(`<option value="${response.data[i].id}">${response.data[i].policy_number}</option>`);
        }
    });
}
</script>
@endpush