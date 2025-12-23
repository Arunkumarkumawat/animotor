<form method="post" action="{{ route('admin.cars.edit.update_step', ['id' => $car->id, 'step' => 8]) }}" onsuccess="updateStepData" onfailure="showError" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-12 mt-3">
            <h5>Booking Requirements</h5>
        </div>

        <div class="col-12 mt-3 mb-2">
            <div class="form-group">
                <label class="form-label" for="requirements">Booking requirements</label>
                <textarea class="form-control" id="requirements" name="requirements" placeholder="Enter requirements">{{ $car->requirements }}</textarea>
            </div>
        </div>

        <div class="col-12 mb-2">
            <div class="form-group">
                <label class="form-label" for="security_deposit">Security Deposit Message</label>
                <textarea class="form-control" id="security_deposit" name="security_deposit" placeholder="Enter security deposit">{{ $car->security_deposit }}</textarea>
            </div>
        </div>

        <div class="col-12 mb-2">
            <div class="form-group">
                <label class="form-label" for="damage_excess">Damage Excess info</label>
                <textarea class="form-control" id="damage_excess" name="damage_excess" placeholder="Enter damage excess">{{ $car->damage_excess }}</textarea>
            </div>
        </div>

        <div class="col-12 mb-2">
            <div class="form-group">
                <label class="form-label" for="mileage_text">Mileage text info</label>
                <textarea class="form-control" id="mileage_text" name="mileage_text" placeholder="Enter mileage text">{{ $car->mileage_text }}</textarea>
            </div>
        </div>

        <div class="col-12 mb-2">
            <div class="form-group">
                <label class="form-label" for="important_text">Important Text</label>
                <textarea class="form-control" id="important_text" name="important_text" placeholder="Enter important text for booking">{{ $car->important_text }}</textarea>
            </div>
        </div>
    </div>

    <button type="submit" class="d-none" id="submit_button">Submit</button>
</form>

@push('car_edit_form_button')
    <button type="submit" onclick="triggerSubmit()" class="btn btn-lg btn-primary">Save</button>
@endpush

<script>
    window.addEventListener('load', function(){
        $('#requirements, #security_deposit, #damage_excess, #mileage_text, #important_text').summernote({
            height: 200,
        });
    })

    function triggerSubmit(){
        jQuery('#submit_button').trigger('click')
    }
</script>