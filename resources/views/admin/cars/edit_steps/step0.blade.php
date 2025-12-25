@php
    $car_makes = \App\Models\VehicleMake::all();
    $car_types = \App\Models\VehicleType::all();
    $regions = \App\Models\Region::select('id', 'name')->get();
    $car_models = \App\Models\VehicleModel::whereHas('make', function ($query) use ($car) {
        $query->where('name', $car->make);
    })->get();
@endphp
<form method="post" action="{{ route('admin.cars.edit.update_step', ['id' => $car->id, 'step' => 0]) }}"
    onsuccess="updateStepData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12 mb-3">
            <h5>Car Details</h5>
        </div>
        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label class="form-label" for="title">Title</label>
                <input name="title" type="text" class="form-control form-control-xl" id="title" maxlength="30"
                    value="{{ $car->title }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="type">Car Type</label>
                <select name="type" class="form-control form-control-xl" id="type" required>
                    <option value="">Select Type</option>
                    @foreach ($car_types as $car_type)
                        <option value="{{ $car_type->name }}" {{ $car_type->name == $car->type ? 'selected' : '' }}>
                            {{ $car_type->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="make">Car Maker</label>
                <select name="make" class="form-control form-control-xl" id="make" required
                    onchange="loadModels(this.value)">
                    <option value="">Select Maker</option>
                    @foreach ($car_makes as $car_make)
                        <option value="{{ $car_make->name }}" {{ $car_make->name == $car->make ? 'selected' : '' }}>
                            {{ $car_make->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="model">Car Model</label>
                <select name="model" class="form-control form-control-xl" id="model" required>
                    <option value="">Select Model</option>
                    @foreach ($car_models as $car_model)
                        <option value="{{ $car_model->name }}" {{ $car_model->name == $car->model ? 'selected' : '' }}>
                            {{ $car_model->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="gear">Gear Type</label>
                <select name="gear" class="form-control form-control-xl" id="gear">
                    <option value="">Select Gear Type</option>
                    @foreach (['Automatic', 'Manual'] as $gear)
                        <option value="{{ $gear }}" {{ $gear == $car->gear ? 'selected' : '' }}>
                            {{ $gear }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="color">Color</label>
                <input name="color" type="text" class="form-control form-control-xl" id="color"
                    pattern="^[A-Za-z\s]*$" maxlength="20" value="{{ $car->color }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="door">Door</label>
                <input name="door" type="text" class="form-control form-control-xl" id="door"
                    pattern="^[0-9]{0,2}$" oninput="this.value = this.value.slice(0, 2)" maxlength="2"
                    value="{{ $car->door }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="seats">Seats</label>
                <input name="seats" type="text" class="form-control form-control-xl" id="seats"
                    pattern="^[0-9]{0,2}$" oninput="this.value = this.value.slice(0, 2)" maxlength="2"
                    value="{{ $car->seats }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="bags">Bags Small</label>
                <input name="bags" type="text" class="form-control form-control-xl" id="bags"
                    pattern="^[0-9]{0,2}$" oninput="this.value = this.value.slice(0, 2)" maxlength="2"
                    value="{{ $car->bags }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="bags_large">Bags Large</label>
                <input name="bags_large" type="text" class="form-control form-control-xl" id="bags_large"
                    pattern="^[0-9]{0,2}$" oninput="this.value = this.value.slice(0, 2)" maxlength="2"
                    value="{{ $car->bags_large }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="vehicle_features">Features</label>
                <select class="form-control form-control-xl" name="vehicle_features[]" id="vehicle_features" multiple
                    data-placeholder="Select Car Features">
                    @foreach (['Air Conditioning', 'Bluetooth', 'GPS Navigation', 'Parking Sensors', 'Leather Seats', 'USB Ports', 'Premium Sound System', 'Keyless Entry', 'Cruise Control'] as $feature)
                        <option value="{{ $feature }}"
                            {{ in_array($feature, $car->vehicle_features ?? []) ? 'selected' : '' }}>
                            {{ $feature }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="youtube_link">Youtube ID <small>Make sure it is correct</small></label>
                <input name="youtube_link" type="text" class="form-control form-control-xl mb-2" id="youtube_link"
                    value="{{ $car->youtube_link }}" required />
                <img src="{{ asset('admin/assets/images/yt.png') }}" />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="air_condition">Air Conditioning</label>
                <select name="air_condition" class="form-control form-control-xl" id="air_condition">
                    <option value="">Select Air Conditioning</option>
                    @foreach (['1' => 'Yes', '0' => 'No'] as $key => $val)
                        <option value="{{ $key }}" {{ $key == $car->air_condition ? 'selected' : '' }}>
                            {{ $val }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <h5>Registration Details</h5>
        </div>

        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="vehicle_no">Vehicle No</label>
                <input name="vehicle_no" pattern="^[A-Za-z0-9]{4,20}$" type="text"
                    class="form-control form-control-xl" id="vehicle_no" maxlength="20"
                    value="{{ $car->vehicle_no }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="license_no">License No</label>
                <input name="license_no" pattern="^[A-Za-z0-9]{4,20}$" type="text"
                    class="form-control form-control-xl" id="license_no" maxlength="20"
                    value="{{ $car->license_no }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="registration_number">Registration Number</label>
                <input name="registration_number" pattern="^[A-Za-z0-9]{4,20}$"type="text"
                    class="form-control form-control-xl" id="registration_number" maxlength="20"
                    value="{{ $car->registration_number }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="year">Year</label>
                <input name="year" min="2007" step="1" type="text"
                    class="form-control form-control-xl" id="year" pattern="^[0-9]{4}$" maxlength="4"
                    value="{{ $car->year }}" required />
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="form-group">
                <label class="form-label" for="deposit">Deposit {{ settings('currency_symbol', '$') }}</label>
                <input name="deposit" type="text" class="form-control form-control-xl" id="deposit"
                    step="0.01" value="{{ $car->deposit }}" required />
            </div>
        </div>

        <div class="col-md-12 mb-3">
            <h5>Service Area</h5>
        </div>

        <div class="col-md-12 mb-3">
            <div class="form-group">
                <label class="form-label" for="region">Service Area</label>
                <select name="region_id" class="form-control form-control-xl" id="region" required>
                    <option value="">Select Region</option>
                    @foreach ($regions as $region)
                        <option value="{{ $region->id }}" {{ $region->id == $car->region_id ? 'selected' : '' }}>
                            {{ $region->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-md-6">
            <div id="pickup_container" class="mb-3">
                @php $pickupIndex = 0; @endphp

                @foreach ($car?->pickup ?? [] as $index => $pickup)
                    @php $pickupIndex = $index; @endphp
                    @include('admin.partials.form.text', [
                        'attributes' => 'required',
                        'id' => 'porigin' . $index,
                        'colSize' => 'col-md-12',
                        'fieldName' => 'pickup[' . $index . '][location]',
                        'value' => $pickup['location'],
                        'title' => 'Pickup location',
                    ])
                    <input type="hidden" id="plat{{ $index }}" value="{{ $pickup['latitude'] }}"
                        name="pickup[{{ $index }}][latitude]" />
                    <input type="hidden" id="plng{{ $index }}" value="{{ $pickup['longitude'] }}"
                        name="pickup[{{ $index }}][longitude]" />
                @endforeach

                @if (count($car?->pickup ?? []) == 0)
                    @include('admin.partials.form.text', [
                        'attributes' => 'required',
                        'id' => 'porigin0',
                        'colSize' => 'col-md-12',
                        'fieldName' => 'pickup[0][location]',
                        'value' => '',
                        'title' => 'Pickup location',
                    ])
                    <input type="hidden" id="plat0" value="" name="pickup[0][latitude]" />
                    <input type="hidden" id="plng0" value="" name="pickup[0][longitude]" />
                @endif
            </div>
            <button type="button" class="btn btn-success d-block" onclick="addAutocompleteItem(true)">Add
                More</button>
        </div>

        <div class="col-md-6">
            <div id="dropup_container" class="mb-3">
                @php $dropupIndex = 0; @endphp

                @foreach ($car?->dropup ?? [] as $index => $dropup)
                    @php $dropupIndex = $index; @endphp
                    @include('admin.partials.form.text', [
                        'attributes' => 'required',
                        'id' => 'dorigin' . $index,
                        'colSize' => 'col-md-12',
                        'fieldName' => 'dropup[' . $index . '][location]',
                        'value' => $dropup['location'],
                        'title' => 'Dropoff location',
                    ])
                    <input type="hidden" id="dlat{{ $index }}" value="{{ $dropup['latitude'] }}"
                        name="dropup[{{ $index }}][latitude]" />
                    <input type="hidden" id="dlng{{ $index }}" value="{{ $dropup['longitude'] }}"
                        name="dropup[{{ $index }}][longitude]" />
                @endforeach

                @if (count($car?->dropup ?? []) == 0)
                    @include('admin.partials.form.text', [
                        'attributes' => 'required',
                        'id' => 'dorigin0',
                        'colSize' => 'col-md-12',
                        'fieldName' => 'dropup[0][location]',
                        'value' => '',
                        'title' => 'Dropoff location',
                    ])
                    <input type="hidden" id="dlat0" value="" name="dropup[0][latitude]" />
                    <input type="hidden" id="dlng0" value="" name="dropup[0][longitude]" />
                @endif
            </div>
            <button type="button" class="btn btn-success d-block" onclick="addAutocompleteItem(false)">Add
                More</button>
        </div>
    </div>

    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

@push('scripts')
    <style>
        .select2-container--default .select2-selection--multiple {
            position: relative;
            padding: 0.6rem;
            padding-right: 36px;
            min-height: 38px;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
        }

        .select2-container--default .select2-selection--multiple::after {
            content: "";
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            pointer-events: none;
            background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20' fill='none' stroke='%23333' stroke-width='1.5'><path d='M6 8l4 4 4-4' stroke-linecap='round' stroke-linejoin='round'/></svg>");
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.8;
        }

        .select2-container--open .select2-selection--multiple::after {
            transform: translateY(-50%) rotate(180deg);
        }
    </style>
    <script>
        function initAutocomplete(element) {
            const autocomplete = new google.maps.places.Autocomplete(element, {
                types: ['geocode']
            });

            autocomplete.addListener('place_changed', function() {
                var place = autocomplete.getPlace();

                if (!place.geometry) {
                    return;
                }

                var latitudeInput = document.getElementById(element.id.replace('origin', 'lat'));
                var longitudeInput = document.getElementById(element.id.replace('origin', 'lng'));

                element.value = place.name;
                latitudeInput.value = place.geometry.location.lat();
                longitudeInput.value = place.geometry.location.lng();
            })
        }

        var pickupIndex = {{ $pickupIndex }};
        var dropupIndex = {{ $dropupIndex }};

        function addAutocompleteItem(p = true) {
            if (p === true) {
                pickupIndex++;

                jQuery('#pickup_container').append(`<div class="input-group mt-3">
                <input type="text" placeholder="Pickup location" required id="porigin${pickupIndex}" class="col-md-12 form-control" name="pickup[${pickupIndex}][location]">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                <input type="hidden" id="plat${pickupIndex}" value="" name="pickup[${pickupIndex}][latitude]" />
                <input type="hidden" id="plng${pickupIndex}" value="" name="pickup[${pickupIndex}][longitude]" />
            </div>`);

                initAutocomplete(document.querySelector(`#porigin${pickupIndex}`));
            } else {
                dropupIndex++;

                jQuery('#dropup_container').append(`<div class="input-group mt-3">
                <input type="text" placeholder="Dropoff location" required id="dorigin${dropupIndex}" class="col-md-12 form-control" name="dropup[${dropupIndex}][location]">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                <input type="hidden" id="dlat${dropupIndex}" value="" name="dropup[${dropupIndex}][latitude]" />
                <input type="hidden" id="dlng${dropupIndex}" value="" name="dropup[${dropupIndex}][longitude]" />
            </div>`);

                initAutocomplete(document.querySelector(`#dorigin${dropupIndex}`));
            }
        }

        function loadModels(makeId) {
            var modelElement = document.getElementById('model');

            if (makeId) {
                var xhr = new XMLHttpRequest();
                xhr.open('GET', "{{ route('admin.api.get.models') }}?make_id=" + makeId, true);
                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        var data = JSON.parse(xhr.responseText);
                        modelElement.innerHTML = '<option value="">Select Model</option>';
                        if (data.data.length > 0) {
                            data.data.forEach(function(model) {
                                var option = document.createElement('option');
                                option.value = model.name;
                                option.text = model.name;
                                modelElement.appendChild(option);
                            });

                            jQuery(modelElement).trigger('change')
                        }
                    }
                };
                xhr.send();
            } else {
                modelElement.innerHTML = '<option value="">Select Model</option>';
                jQuery(modelElement).trigger('change')
            }
        }

        function triggerSubmit() {
            jQuery('#submit_button').trigger('click')
        }

        jQuery('#type, #make, #model, #gear, #region, #vehicle_features').select2();
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&libraries=places" async defer>
    </script>
@endpush
