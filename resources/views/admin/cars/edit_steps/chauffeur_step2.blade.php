<form method="post" action="{{ route('admin.cars.edit.store_ch_data', ['id' => $car->id]) }}?type=ch_pricing"
    onsuccess="storeChaufferData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    <div class="row">
        @foreach ([
        'hourly_rate' => 'Hourly Rate',
        'p2p_rate' => 'P2P Rate',
        'airport_transfer_rate' => 'Airport Transfer Rate',
        'long_transfer_rate' => 'Long Transfer Rate',
        'event_hire_rate' => 'Event Hire Rate',
    ] as $key => $label)
            <div class="col-md-4 mt-3">
                <div class="form-group">
                    <div for="{{ $key }}" class="d-flex justify-content-between">
                        <div>{{ $label }} {{ settings('currency_symbol', '$') }}</div>
                        <div>
                            <div class="form-check form-switch">
                                <input type="checkbox" class="form-check-input" id="{{ $key }}_tax_incl"
                                    name="{{ $key }}_tax_incl" value="1" data-ha-callback="toggler"
                                    style="width: 3em; height: 1.5em; margin-top : -1px"
                                    {{ $car->{$key . '_tax_incl'} ? 'checked' : '' }} disabled>
                                <label class="form-check-label ms-2" for="{{ $key }}_tax_incl">
                                    <span data-ha-relative="{{ $key }}_tax_incl" data-ha-equal="1">Tax
                                        Included</span>
                                    <span data-ha-relative="{{ $key }}_tax_incl" data-ha-else="1">Tax
                                        Excluded</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <input type="number" min="1" name="{{ $key }}"
                        class="form-control form-control-xl" id="{{ $key }}"
                        pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" value="{{ $car->{$key} }}">
                </div>
            </div>
        @endforeach
    </div>
    <div class="row pt-4">
        <div class="col-md-3">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#chauffer_features1_modal">
                <i class="ni ni-edit"></i> Edit Features
            </a>
        </div>
        <div class="col-md-3">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#chauffer_features2_modal">
                <i class="ni ni-edit"></i> Edit Basic Features
            </a>
        </div>
        <div class="col-md-3">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#chauffer_addons_modal">
                <i class="ni ni-edit"></i> Edit Addons
            </a>
        </div>
        <div class="col-md-3">
            <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#chauffer_terms_modal">
                <i class="ni ni-edit"></i> Edit Terms
            </a>
        </div>
    </div>

    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

<form method="post" action="{{ route('admin.cars.edit.store_ch_data', ['id' => $car->id]) }}?type=features1" onsuccess="storeChaufferData" onfailure="showError" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="chauffer_features1_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chauffer Features</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="chauffer_features1">
                    @if (count($car->chauffer_features1) == 0)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="chauffer_features1[0]"
                                placeholder="Enter feature">
                            <button type="button" onclick="addChaufferFeature1()" class="btn btn-outline-secondary">Add
                                Feature</button>
                        </div>
                    @endif

                    @foreach ($car->chauffer_features1 as $index => $term)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="chauffer_features1[{{ $index }}]"
                                value="{{ $term }}" placeholder="Enter feature">
                            @if ($index == 0)
                                <button type="button" onclick="addChaufferFeature1()"
                                    class="btn btn-outline-secondary">Add Feature</button>
                            @else
                                <button type="button" onclick="removeChaufferFeature1({{ $index }})"
                                    class="btn btn-outline-danger">Remove</button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="{{ route('admin.cars.edit.store_ch_data', ['id' => $car->id]) }}?type=features2" onsuccess="storeChaufferData" onfailure="showError" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="chauffer_features2_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chauffer Other Features</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="chauffer_features2">
                    @if (count($car->chauffer_features2) == 0)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="chauffer_features2[0]"
                                placeholder="Enter feature">
                            <button type="button" onclick="addChaufferFeature2()" class="btn btn-outline-secondary">Add
                                Feature</button>
                        </div>
                    @endif

                    @foreach ($car->chauffer_features2 as $index => $term)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control"
                                name="chauffer_features2[{{ $index }}]" value="{{ $term }}"
                                placeholder="Enter feature">
                            @if ($index == 0)
                                <button type="button" onclick="addChaufferFeature2()"
                                    class="btn btn-outline-secondary">Add Feature</button>
                            @else
                                <button type="button" onclick="removeChaufferFeature2({{ $index }})"
                                    class="btn btn-outline-danger">Remove</button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="{{ route('admin.cars.edit.store_ch_data', ['id' => $car->id]) }}?type=addons" onsuccess="storeChaufferData" onfailure="showError" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="chauffer_addons_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chauffer Addons</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="chauffer_addons">
                    @if (count($car->chauffer_addons) == 0)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="chauffer_addons[0][name]"
                                placeholder="Enter name">
                            <input type="price" min="0" class="form-control"
                                name="chauffer_addons[0][price]" placeholder="Enter price">
                            <button type="button" onclick="addChaufferAddon()" class="btn btn-outline-secondary">Add
                                Addon</button>
                        </div>
                    @endif

                    @foreach ($car->chauffer_addons as $index => $term)
                        <div class="input-group mb-2">
                            <input type="text" class="form-control"
                                name="chauffer_addons[{{ $index }}][name]" value="{{ $term['name'] }}"
                                placeholder="Enter name">
                            <input type="price" min="0" class="form-control"
                                name="chauffer_addons[{{ $index }}][price]" value="{{ $term['price'] }}"
                                placeholder="Enter price">
                            @if ($index == 0)
                                <button type="button" onclick="addChaufferAddon()"
                                    class="btn btn-outline-secondary">Add Addon</button>
                            @else
                                <button type="button" onclick="removeChaufferAddon({{ $index }})"
                                    class="btn btn-outline-danger">Remove</button>
                            @endif
                        </div>
                    @endforeach
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

<form method="post" action="{{ route('admin.cars.edit.store_ch_data', ['id' => $car->id]) }}?type=terms" onsuccess="storeChaufferData" onfailure="showError" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="chauffer_terms_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Chauffer Service Terms</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-borderless">
                        <tbody>
                            <tr>
                                <td class="ps-0" style="width: 40%;"><strong>Minimum Hire</strong>
                                </td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[minimum_hire]"
                                        placeholder="2 hours for hourly bookings" value="{{ isset($car->chauffer_terms['minimum_hire']) ? $car->chauffer_terms['minimum_hire'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Overtime</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[overtime]"
                                        placeholder="Charged at hourly rate in 30-minute increments" value="{{ isset($car->chauffer_terms['overtime']) ? $car->chauffer_terms['overtime'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Extra Mileage</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[extra_mileage]"
                                        placeholder="£2 per mile beyond included distance" value="{{ isset($car->chauffer_terms['extra_mileage']) ? $car->chauffer_terms['extra_mileage'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Waiting Time</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[waiting_time]"
                                        placeholder="First 30 minutes free, then £15 per 15 minutes" value="{{ isset($car->chauffer_terms['waiting_time']) ? $car->chauffer_terms['waiting_time'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Chauffeur Standards</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control"
                                        name="chauffer_terms[chauffeur_standards]"
                                        placeholder="Professional dress code, courteous behavior" value="{{ isset($car->chauffer_terms['chauffeur_standards']) ? $car->chauffer_terms['chauffeur_standards'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Vehicle Policy</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[vehicle_policy]"
                                        placeholder="No smoking, no pets (except service animals)" value="{{ isset($car->chauffer_terms['vehicle_policy']) ? $car->chauffer_terms['vehicle_policy'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Insurance</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[insurance]"
                                        placeholder="Comprehensive coverage up to £10,000,000" value="{{ isset($car->chauffer_terms['insurance']) ? $car->chauffer_terms['insurance'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Operator Compliance</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control"
                                        name="chauffer_terms[operator_compliance]"
                                        placeholder="Fully licensed and insured operator" value="{{ isset($car->chauffer_terms['operator_compliance']) ? $car->chauffer_terms['operator_compliance'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Cancellation</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[cancellation]"
                                        placeholder="Free up to 24 hours before pickup, 50% charge within 24 hours" value="{{ isset($car->chauffer_terms['cancellation']) ? $car->chauffer_terms['cancellation'] : '' }}">
                                </td>
                            </tr>
                            <tr>
                                <td class="ps-0"><strong>Payment</strong></td>
                                <td class="pe-0">
                                    <input type="text" class="form-control" name="chauffer_terms[payment]"
                                        placeholder="50% deposit required, balance due before journey" value="{{ isset($car->chauffer_terms['payment']) ? $car->chauffer_terms['payment'] : '' }}">
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

<script type="text/javascript">
    function triggerSubmit() {
        jQuery('#submit_button').trigger('click')
    }

    function storeChaufferData(response){
        if(response.status == 'success'){
            NioApp.Toast(response.message, 'success', {
                position: 'top-right'
            });
        } else {
            showError(response);
        }
    }
</script>
