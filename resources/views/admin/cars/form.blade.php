
<div class="row mt-3">

    <div class="col-6">
        <div class="row  gy-3">
            @include('admin.partials.form.text', ['attributes' => 'required maxlength=30',  'value' => $car?->title, 'colSize' => 'col-md-12', 'fieldName' => 'title','title' => 'Car title'])
            @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->region_id, 'colSize' => 'col-md-12', 'fieldName' => 'region_id','title' => 'Service Area','options' => $regions])
            @include('admin.partials.form.select_w_object', ['attributes' => 'required', 'value' => $car?->type, 'option_name' => 'name', 'colSize' => 'col-md-12', 'fieldName' => 'type','title' => 'Car Type','options' => $car_types])
            @include('admin.partials.form.select_p_object', ['attributes' => 'required class="form-select js-select2" data-search="on" data-ui="xl"', 'value' => $car?->make, 'option_name' => 'name', 'colSize' => 'col-md-12', 'fieldName' => 'make','title' => 'Car make','options' => $car_makes])
            @include('admin.partials.form.select_p_object', ['attributes' => 'required class="form-select js-select2" data-search="on" data-ui="xl"','value' => $car?->model, 'colSize' => 'col-md-12', 'fieldName' => 'model','option_name' => 'name','title' => 'Car model','options' => $car_models])
            @include('admin.partials.form.select_array', [ 'colSize' => 'col-md-12', 'fieldName' => 'gear', 'value' => $car?->gear, 'title' => 'Gear type', 'options' => ['Automatic','Manual']])
            @include('admin.partials.form.select', [ 'colSize' => 'col-md-12', 'fieldName' => 'air_condition', 'value' => $car?->air_condition, 'title' => 'Has Air conditioner', 'options' => ['1' => 'Yes','0' => "No"]])

           
            @include('admin.partials.form.text', ['attributes' => 'required pattern="^[A-Za-z\s]*$" maxlength=20', 'colSize' => 'col-md-12', 'value' => $car?->color, 'fieldName' => 'color','title' => 'Car Color'])
            @include('admin.partials.form.text', ['attributes' => '  pattern="^[0-9]{0,2}$" maxlength=10', 'colSize' => 'col-md-12', 'fieldName' => 'bags', 'value' => $car?->bags,'title' => 'Small bags'])
             @include('admin.partials.form.text', ['attributes' => '  pattern="^[0-9]{0,2}$" maxlength=10', 'colSize' => 'col-md-12', 'fieldName' => 'bags_large', 'value' => $car?->bags_large,'title' => 'Large bags'])
            <div class="col-md-12 mt-3">
                <select class="form-control " name="vehicle_features[]" id="vehicle_features" multiple data-placeholder="Select Car Features">
                <option>Air Conditioning</option>
                <option>Bluetooth</option>
                <option>GPS Navigation</option>
                <option>Parking Sensors</option>
                <option>Leather Seats</option>
                <option>USB Ports</option>
                <option>Premium Sound System</option>
                <option>Keyless Entry</option>
                <option>Cruise Control</option>
            </select>
            </div>
        </div>
    </div>

    <div class="col-6">
        <div class="row  gy-3">
            @include('admin.partials.form.text', ['attributes' => 'required pattern="^[A-Za-z0-9]{4,20}$" maxlength=20', 'colSize' => 'col-md-12', 'fieldName' => 'license_no', 'value' => $car?->license_no,'title' => 'License No'])
            @include('admin.partials.form.text', ['attributes' => 'required pattern="^[A-Za-z0-9]{4,20}$" maxlength=20', 'colSize' => 'col-md-12', 'fieldName' => 'registration_number', 'value' => $car?->registration_number,'title' => 'Registration No'])

            <div id="pickup_container" class="col-md-12">
                @php $pickupIndex = 0; @endphp
                
                @foreach(($car?->pickup ?? []) as $index => $pickup)
                    @php $pickupIndex = $index; @endphp
                @include('admin.partials.form.text', ['attributes' => 'required', 'id' => 'porigin'.$index, 'colSize' => 'col-md-12', 'fieldName' => 'pickup['.$index.'][location]', 'value' => $pickup['location'],'title' => 'Pickup location'])
                <input type="hidden" id="plat{{$index}}" value="{{ $pickup['latitude'] }}" name="pickup[{{$index}}][latitude]" />
                <input type="hidden" id="plng{{$index}}" value="{{ $pickup['longitude'] }}" name="pickup[{{$index}}][longitude]" />
                @endforeach
                
                @if(count($car?->pickup ?? []) == 0)
                @include('admin.partials.form.text', ['attributes' => 'required', 'id' => 'porigin0', 'colSize' => 'col-md-12', 'fieldName' => 'pickup[0][location]', 'value' => '','title' => 'Pickup location'])
                <input type="hidden" id="plat0" value="" name="pickup[0][latitude]" />
                <input type="hidden" id="plng0" value="" name="pickup[0][longitude]" />
                @endif
            </div>
            <div class="col-md-12">
                <button type="button" class="btn btn-success d-block" onclick="addAutocompleteItem(true)">Add More</button>
            </div>
            
            <div id="dropup_container" class="col-md-12">
                @php $dropupIndex = 0; @endphp
                
                @foreach(($car?->dropup ?? []) as $index => $dropup)
                    @php $dropupIndex = $index; @endphp
                @include('admin.partials.form.text', ['attributes' => 'required', 'id' => 'dorigin'.$index, 'colSize' => 'col-md-12', 'fieldName' => 'dropup['.$index.'][location]', 'value' => $dropup['location'],'title' => 'Dropoff location'])
                <input type="hidden" id="dlat{{$index}}" value="{{ $dropup['latitude'] }}" name="dropup[{{$index}}][latitude]" />
                <input type="hidden" id="dlng{{$index}}" value="{{ $dropup['longitude'] }}" name="dropup[{{$index}}][longitude]" />
                @endforeach
                
                @if(count($car?->dropup ?? []) == 0)
                @include('admin.partials.form.text', ['attributes' => 'required', 'id' => 'dorigin0', 'colSize' => 'col-md-12', 'fieldName' => 'dropup[0][location]', 'value' => '', 'title' => 'Dropoff location'])
                <input type="hidden" id="dlat0" value="" name="dropup[0][latitude]" />
                <input type="hidden" id="dlng0" value="" name="dropup[0][longitude]" />
                @endif
            </div>
            <div class="col-md-12"><button type="button" class="btn btn-success d-block" onclick="addAutocompleteItem(false)">Add More</button></div>
            
            <img src="{{ asset('admin/assets/images/yt.png') }}" />
            @include('admin.partials.form.text', [ 'colSize' => 'col-md-12', 'fieldName' => 'youtube_link', 'value' => $car?->youtube_link,'title' => 'Youtube Video ID (make sure its correct)'])
            @include('admin.partials.form.text', [ 'attributes' => 'required oninput="this.value = this.value.slice(0, 10)"',  'type' => 'number', 'colSize' => 'col-md-12', 'fieldName' => 'deposit', 'value' => $car?->deposit,'title' => 'Security Deposit '. settings('currency_symbol', '$')])

            @include('admin.partials.form.text', ['attributes' => 'required min=2007 oninput="this.value = this.value.slice(0, 4)"', 'type' => 'number', 'colSize' => 'col-md-12', 'value' => $car?->year, 'fieldName' => 'year','title' => 'Car Year'])

            @include('admin.partials.form.text', ['attributes' => 'required pattern="^[A-Za-z0-9]{4,20}$" maxlength=20',  'colSize' => 'col-md-12', 'value' => $car?->vehicle_no, 'fieldName' => 'vehicle_no','title' => 'Car Number'])
            @include('admin.partials.form.text', ['attributes' => 'required pattern="^[0-9]{0,2}$" oninput="this.value = this.value.slice(0, 2)"',   'colSize' => 'col-md-12', 'type' => 'number', 'fieldName' => 'door', 'value' => $car?->door,'title' => 'Door count'])
            @include('admin.partials.form.text', ['attributes' => 'required pattern="^[0-9]{0,2}$" oninput="this.value = this.value.slice(0, 2)"',   'colSize' => 'col-md-12', 'type' => 'number', 'fieldName' => 'seats', 'value' => $car?->seats,'title' => 'How many seats'])
        </div>
    </div>
</div>

<style>
    .select2-selection.select2-selection--multiple {
        width :100% !important;
    }
</style>

<style>
.select2-container--default .select2-selection--multiple {
  position: relative;
  padding : 0.6rem;
  padding-right: 36px;
  min-height: 38px;
  display:flex; flex-wrap:wrap; align-items:center;
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
    var pickupIndex = {{ $pickupIndex }};
    var dropupIndex = {{ $dropupIndex }};
    
    function addAutocompleteItem(p = true){
        if(p === true){
            pickupIndex++;
            
            jQuery('#pickup_container').append(`<div class="input-group mt-3">
                <input type="text" placeholder="Pickup location" required id="porigin${pickupIndex}" class="col-md-12 form-control" name="pickup[${pickupIndex}][location]">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                <input type="hidden" id="plat${pickupIndex}" value="" name="pickup[${pickupIndex}][latitude]" />
                <input type="hidden" id="plng${pickupIndex}" value="" name="pickup[${pickupIndex}][longitude]" />
            </div>`);
            
            initAutocomplete( document.querySelector(`#porigin${pickupIndex}`) );
        } else {
            dropupIndex++;
            
            jQuery('#dropup_container').append(`<div class="input-group mt-3">
                <input type="text" placeholder="Dropoff location" required id="dorigin${dropupIndex}" class="col-md-12 form-control" name="dropup[${dropupIndex}][location]">
                <button type="button" class="btn btn-danger" onclick="this.parentElement.remove()">Remove</button>
                <input type="hidden" id="dlat${dropupIndex}" value="" name="dropup[${dropupIndex}][latitude]" />
                <input type="hidden" id="dlng${dropupIndex}" value="" name="dropup[${dropupIndex}][longitude]" />
            </div>`);
            
            initAutocomplete( document.querySelector(`#dorigin${dropupIndex}`) );
        }
    }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key={{ env('MAP_API_KEY') }}&libraries=places" async defer></script>

@push('scripts')
<script>
    jQuery('#vehicle_features').select2();
</script>
@endpush