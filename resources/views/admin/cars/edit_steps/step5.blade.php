<div class="row">
    <div class="col-md-12 mt-3">
        <h5>Availabilities</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Day of Week</th>
                    <th>Pickup Hours</th>
                    <th>Return Hours</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-container-full="availabilities">
                @foreach ($car->availabilities as $item)
                    <tr>
                        <td>{{ $item['day_of_week'] }}</td>
                        <td>{{ $item['pickup_hours_start'] }} - {{ $item['pickup_hours_end'] }}</td>
                        <td>{{ $item['return_hours_start'] }} - {{ $item['return_hours_end'] }}</td>
                        <td>
                            <button type="button" onclick="removeAvailability({{ $item['id'] }})" class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="availabilities">
                <tr>
                    <td colspan="4" class="text-center">No items</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 mt-3">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_availability', $car->id) }}" onsuccess="addAvailability" onfailure="showError">
                @csrf

                <div class="row">
                    <div class="col-12 mb-2">
                        <div class="form-group">
                            <label for="day_of_week">Day of Week</label>
                            <select class="form-control select2" name="day_of_week" required>
                                <option value="">Select Day of Week</option>
                                <option value="Monday">Monday</option>
                                <option value="Tuesday">Tuesday</option>
                                <option value="Wednesday">Wednesday</option>
                                <option value="Thursday">Thursday</option>
                                <option value="Friday">Friday</option>
                                <option value="Saturday">Saturday</option>
                                <option value="Sunday">Sunday</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-2">
                        <p class="fw-bold   ">Pickup Hours</p>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="pickup_hours_start">Start</label>
                        <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" name="pickup_hours_start">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="pickup_hours_end">End</label>
                        <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" name="pickup_hours_end">
                    </div>
                    <div class="col-12 mb-2">
                        <p class="fw-bold   ">Return Hours</p>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="return_hours_start">Start</label>
                        <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" name="return_hours_start">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="return_hours_end">End</label>
                        <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" name="return_hours_end">
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
        <h5>Blackouts</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Start Date/Time</th>
                    <th>End Date/Time</th>
                    <th>Reason</th>
                    <th>Hard Block</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody data-container-full="blackouts">
                @foreach ($car->blackouts as $item)
                    <tr>
                        <td>{{ $item['start_date_time'] }}</td>
                        <td>{{ $item['end_date_time'] }}</td>
                        <td>{{ $item['reason'] }}</td>
                        <td>{{ $item['hard_block'] ? 'Yes' : 'No' }}</td>
                        <td>{{ $item['notes'] }}</td>
                        <td>
                            <button type="button" onclick="removeBlackout({{ $item['id'] }})" class="btn btn-danger btn-sm">
                                Remove
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="blackouts">
                <tr>
                    <td colspan="6" class="text-center">No items</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 mt-3">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_blackout', $car->id) }}" onsuccess="addBlackout" onfailure="showError">
                @csrf

                <div class="row">
                    <div class="col-6 mb-2">
                        <label>Start Date/Time</label>
                        <input type="text" data-type="datetime" class="form-control flatpickr" placeholder="YYYY-MM-DD hh:mm AA" name="start_date_time">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="end_date_time">End Date/Time</label>
                        <input type="text" data-type="datetime" class="form-control flatpickr" placeholder="YYYY-MM-DD hh:mm AA" name="end_date_time">
                    </div>
                    <div class="col-6 mb-2">
                        <label for="reason">Reason</label>
                        <select class="form-control" name="reason">
                            <option value="">Select Reason</option>
                            <option value="maintenance">Maintenance</option>
                            <option value="mot">MOT</option>
                            <option value="insurance">Insurance</option>
                            <option value="personal_use">Personal Use</option>
                        </select>
                    </div>
                    <div class="col-6 mb-2">
                        <label for="hard_block">Hard Block</label>
                        <select class="form-control" name="hard_block">
                            <option value="">Select Option</option>
                            <option value="1">Yes</option>
                            <option value="0">No</option>
                        </select>
                        <small>(cannot be overriden)</small>
                    </div>
                    <div class="col-12 mb-2">
                        <label for="">Notes (optional)</label>
                        <textarea class="form-control" name="notes" maxlength="255"></textarea>
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
    containerFullOrEmpty('availabilities');
    containerFullOrEmpty('blackouts');
});

function component_availability(item, index){
    return `<tr>
        <td>${item.day_of_week}</td>
        <td>${item.pickup_hours_start} - ${item.pickup_hours_end}</td>
        <td>${item.return_hours_start} - ${item.return_hours_end}</td>
        <td>
            <button type="button" onclick="removeAvailability(${item.id})" class="btn btn-danger btn-sm">Remove</button>
        </td>
    </tr>`
}

function addAvailability(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="availabilities"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="availabilities"]').append(component_availability(response.data[i], i));
        }
        containerFullOrEmpty('availabilities');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function removeAvailability(index){
    if(!confirm('Are you sure?')){
        return;
    }

    $.post('{{ route('admin.cars.edit.delete_availability', $car->id) }}', {availability_id: index, _token: '{{ csrf_token() }}'}, function(response){
        addAvailability(response);
    });
}

function component_blackout(item, index){
    return `<tr>
        <td>${item.start_date_time}</td>
        <td>${item.end_date_time}</td>
        <td>${item.reason}</td>
        <td>${item.hard_block ? 'Yes' : 'No'}</td>
        <td>${item.notes}</td>
        <td>
            <button type="button" onclick="removeBlackout(${item.id})" class="btn btn-danger btn-sm">
                Remove
            </button>
        </td>
    </tr>`
}

function addBlackout(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="blackouts"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="blackouts"]').append(component_blackout(response.data[i], i));
        }
        containerFullOrEmpty('blackouts');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function removeBlackout(index){
    if(!confirm('Are you sure?')){
        return;
    }

    $.post('{{ route('admin.cars.edit.delete_blackout', $car->id) }}', {blackout_id: index, _token: '{{ csrf_token() }}'}, function(response){
        addBlackout(response);
    });
}
</script>
@endpush