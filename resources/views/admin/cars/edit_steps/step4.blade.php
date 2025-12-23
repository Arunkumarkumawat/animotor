<div class="row">
    <div class="col-md-12 mt-3">
        <hr>
        <h5>Documents</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>{{ __('admin.document_type') }}</th>
                    <th>{{ __('admin.document_name') }}</th>
                    <th>{{ __('admin.upload_date') }}</th>
                    <th>{{ __('admin.expiry_date') }}</th>
                    <th>{{ __('admin.action_type') }}</th>
                    <th>{{ __('admin.action_date') }}</th>
                    <th>{{ __('admin.file') }}</th>
                </tr>
            </thead>
            <tbody data-container-full="documents">
                @foreach ($car->carExtra->documents as $item)
                <tr>
                    <td>{{ $item['document_type'] }}</td>
                    <td>{{ $item['document_name'] }}</td>
                    <td>{{ $item['upload_date'] }}</td>
                    <td>{{ $item['expiry_date'] }}</td>
                    <td>{{ $item['action_type'] }}</td>
                    <td>{{ $item['action_date'] }}</td>
                    <td>
                        @if ($item['file'])
                            <img src="{{ $item['file'] }}" style="height: 50px; width: 50px" />
                        @else
                            No file
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="documents">
                <td colspan="8" class="text-center">No documents found</td>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 mt-3">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_document', $car->id) }}" onsuccess="addDocument" onfailure="showError">
                @csrf

                <div class="row">

                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('admin.document_type') }}</label>
                        <div class="form-control-wrap">
                            <input name="document_type" type="text" class="form-control" maxlength="20" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('admin.document_name') }}</label>
                        <div class="form-control-wrap">
                            <input name="document_name" type="text" class="form-control" maxlength="20" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('admin.upload_date') }}</label>
                        <div class="form-control-wrap">
                            <input name="upload_date" type="text" data-type="date" class="form-control flatpickr" placeholder="YYYY-MM-DD" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('admin.expiry_date') }}</label>
                        <div class="form-control-wrap">
                            <input name="expiry_date" type="text" data-type="date" class="form-control flatpickr" placeholder="YYYY-MM-DD" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('admin.action_type') }}</label>
                        <div class="form-control-wrap">
                            <input name="action_type" type="text" class="form-control" maxlength="20" required />
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">{{ __('admin.action_date') }}</label>
                        <div class="form-control-wrap">
                            <input name="action_date" type="text" data-type="date"class="form-control flatpickr" placeholder="YYYY-MM-DD" required />
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="form-label">{{ __('admin.file') }} <small>Should be an image</small></label>
                        <div class="form-control-wrap">
                            <input name="file" type="file" class="form-control" />
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
    containerFullOrEmpty('documents');
});

function component_document(item, index){
    return `<tr>
        <td>${item.document_type}</td>
        <td>${item.document_name}</td>
        <td>${item.upload_date}</td>
        <td>${item.expiry_date}</td>
        <td>${item.action_type}</td>
        <td>${item.action_date}</td>
        <td>
            ${item.file ? `<img src="${item.file}" style="height: 50px; width: 50px" />` : 'No file'}
        </td>
    </tr>`
}

function addDocument(response){
    if(response.status == 'success'){
        jQuery('[data-container-full="documents"]').html('');
        
        for(let i = 0; i < response.data.length; i++){
            jQuery('[data-container-full="documents"]').append(component_document(response.data[i], i));
        }
        containerFullOrEmpty('documents');

        NioApp.Toast(response.message, 'success', {
            position: 'top-right'
        });

        jQuery('form').trigger('reset');
    } else {
        showError(response);
    }
}

function removeDocument(index){
    if(!confirm('Are you sure?')){
        return;
    }

    $.post('{{ route('admin.cars.edit.delete_document', $car->id) }}', {index: index, _token: '{{ csrf_token() }}'}, function(response){
        addDocument(response);
    });
}
</script>
@endpush