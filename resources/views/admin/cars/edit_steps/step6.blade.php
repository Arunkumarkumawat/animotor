<div class="row">
    <div class="col-md-12 mt-3">
        <h5>MOT</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>{{ __('admin.test_date') }}</th>
                    <th>{{ __('admin.expiry_date') }}</th>
                    <th>{{ __('admin.result') }}</th>
                </tr>
            </thead>
            <tbody data-container-full="mots">
                @foreach ($car->carExtra->mots as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item['test_date'] }}</td>
                        <td>{{ $item['expiry_date'] }}</td>
                        <td class="text-capitalize">{{ $item['result'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="mots">
                <tr>
                    <td colspan="4" class="text-center">No items</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 mt-3">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_mot', $car->id) }}" onsuccess="addMot" onfailure="showError">
                @csrf

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label">Test date</label>
                            <input name="test_date" type="text" data-type="date" class="form-control flatpickr" maxlength="20" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="expiry_date">Expiry date</label>
                            <input name="expiry_date" type="text" data-type="date" class="form-control flatpickr" id="expiry_date" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="result">Result</label>
                            <select name="result" class="form-select form-control" id="result">
                                <option value="pass">Pass</option>
                                <option value="fail">Fail</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-12 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="details">Failure Details</label>
                            <textarea class="form-control" id="details" name="details" maxlength="255"></textarea>
                        </div>
                    </div>
                </div>

                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<hr>

<div class="row">
    <div class="col-md-12 mt-3">
        <h5>Services</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>{{ __('admin.last_service_date') }}</th>
                    <th>{{ __('admin.next_service_date') }}</th>
                    <th>{{ __('admin.last_service_mileage') }}</th>
                    <th>{{ __('admin.next_service_mileage') }}</th>
                </tr>
            </thead>
            <tbody data-container-full="services">
                @foreach ($car->carExtra->service as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item['last_service_date'] }}</td>
                        <td>{{ $item['next_service_date'] }}</td>
                        <td>{{ $item['last_service_mileage'] }}</td>
                        <td>{{ $item['next_service_mileage'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="services">
                <tr>
                    <td colspan="5" class="text-center">No items</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_service', $car->id) }}" onsuccess="addService" onfailure="showError">
                @csrf

                <div class="row">
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="last_service_date">Last Service Date</label>
                            <input name="last_service_date" type="text" data-type="date" class="form-control flatpickr" maxlength="20" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="next_service_date">Next Service Date</label>
                            <input name="next_service_date" type="text" data-type="date" class="form-control flatpickr" maxlength="20" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="last_service_mileage">Last Service Mileage</label>
                            <input name="last_service_mileage" type="text" class="form-control" id="last_service_mileage" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                        </div>
                    </div>
                    <div class="col-md-6 mt-3">
                        <div class="form-group">
                            <label class="form-label" for="next_service_mileage">Next Service Mileage</label>
                            <input name="next_service_mileage" type="text" class="form-control" id="next_service_mileage" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                        </div>
                    </div>
                </div>

                <br>

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script type="text/javascript">
window.addEventListener('DOMContentLoaded', function() {
    containerFullOrEmpty('mots');
    containerFullOrEmpty('services');
});

function component_mot(item, index){
    return `<tr>
        <td>${index+1}</td>
        <td>${item.test_date}</td>
        <td>${item.expiry_date}</td>
        <td class="text-capitalize">${item.result}</td>
    </tr>`
}

function addMot(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="mots"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="mots"]').append(component_mot(response.data[i], i));
        }
        containerFullOrEmpty('mots');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function component_service(item, index){
    return `<tr>
        <td>${ index + 1 }</td>
        <td>${ item.last_service_date }</td>
        <td>${ item.next_service_date }</td>
        <td>${ item.last_service_mileage }</td>
        <td>${ item.next_service_mileage }</td>
    </tr>`
}

function addService(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="services"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="services"]').append(component_service(response.data[i], i));
        }
        containerFullOrEmpty('services');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}
</script>
@endpush