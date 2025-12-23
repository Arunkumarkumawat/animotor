<div class="row">
    <div class="col-md-12 mt-3">
        <h5>Damage History</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>{{ __('admin.reported_date') }}</th>
                    <th>{{ __('admin.incident_date') }}</th>
                    <th>{{ __('admin.insurance_reference_no') }}</th>
                    <th>{{ __('admin.total_claim_cost') }}</th>
                    <th>{{ __('admin.status') }}</th>
                </tr>
            </thead>
            <tbody data-container-full="damage_history">
                @foreach ($car->carExtra->damage_history as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item['reported_date'] }}</td>
                        <td>{{ $item['incident_date'] }}</td>
                        <td>{{ $item['insurance_reference_no'] }}</td>
                        <td>{{ amt($item['total_claim_cost']) }}</td>
                        <td>{{ $item['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="damage_history">
                <tr>
                    <td colspan="6" class="text-center">No items</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4 mt-3">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_damage_history', $car->id) }}" onsuccess="addDamageHistory" onfailure="showError">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">{{ __('admin.reported_date') }}</label>
                            <input name="reported_date" type="text" data-type="date" class="form-control flatpickr" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">{{ __('admin.incident_date') }}</label>
                            <input name="incident_date" type="text" data-type="date" class="form-control flatpickr" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">{{ __('admin.insurance_reference_no') }}</label>
                            <input name="insurance_reference_no" type="text" class="form-control" maxlength="20" />
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">{{ __('admin.total_claim_cost') }} {{ settings('currency_symbol', '$') }}</label>
                            <input name="total_claim_cost" type="text" step="any" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                        </div>
                    </div>


                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select form-control form-control-lg">
                                <option value="open">Open</option>
                                <option value="settled">Settled</option>
                                <option value="closed">Closed</option>
                            </select>
                        </div>
                    </div>
                </div>

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
        <h5>Repairs</h5>
    </div>
    <div class="col-md-8 mt-3 table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>{{ __('admin.booking_id') }}</th>
                    <th>{{ __('admin.booking_date') }}</th>
                    <th>{{ __('admin.date_time') }}</th>
                    <th>{{ __('admin.mileage_at_repair') }}</th>
                    <th>{{ __('admin.workshop_name') }}</th>
                    <th>{{ __('admin.repair_type') }}</th>
                    <th>{{ __('admin.total_cost') }}</th>
                    <th>{{ __('admin.vat') }}</th>
                    <th>{{ __('admin.invoice') }}</th>
                </tr>
            </thead>
            <tbody data-container-full="repairs">
                @foreach ($car->carExtra->repairs as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item['booking_id'] }}</td>
                        <td>{{ $item['booking_date'] }}</td>
                        <td>{{ $item['date_time'] }}</td>
                        <td>{{ $item['mileage_at_repair'] }}</td>
                        <td>{{ $item['workshop_name'] }}</td>
                        <td>{{ $item['repair_type'] }}</td>
                        <td>{{ amt($item['total_cost']) }}</td>
                        <td>{{ amt($item['vat']) }}</td>
                        <td>
                            @if (isset($item['invoice']))
                                <a target="_blank"
                                    href="{{ $item['invoice'] }}">View
                                    Invoice</a>
                            @else
                                No Invoice
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot data-container-empty="repairs">
                <tr>
                    <td colspan="10" class="text-center">No items</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="col-md-4">
        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
            <form method="post" action="{{ route('admin.cars.edit.add_repair', $car->id) }}" onsuccess="addRepair"
                onfailure="showError">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="booking_id">{{ __('admin.booking_id') }}</label>
                            <input name="booking_id" type="text" class="form-control" id="booking_id" maxlength="20" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="booking_date">{{ __('admin.booking_date') }}</label>
                            <input name="booking_date" type="text" data-type="date" class="form-control flatpickr" id="booking_date" placeholder="YYYY-MM-DD" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="date_time">{{ __('admin.date_time') }}</label>
                            <input name="date_time" type="text" data-type="datetime" class="form-control flatpickr" id="date_time" placeholder="YYYY-MM-DD hh:mm AA" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="mileage_at_repair">{{ __('admin.mileage_at_repair') }}</label>
                            <input name="mileage_at_repair" type="text" class="form-control" id="mileage_at_repair" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="workshop_name">{{ __('admin.workshop_name') }}</label>
                            <input name="workshop_name" type="text" class="form-control" id="workshop_name" maxlength="20" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="repair_type">{{ __('admin.repair_type') }}</label>
                            <input name="repair_type" type="text" class="form-control" id="repair_type" maxlength="20" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="total_cost">{{ __('admin.total_cost') }} {{ settings('currency_symbol', '$') }}</label>
                            <input name="total_cost" type="text" class="form-control" id="total_cost" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                        </div>
                    </div>

                    <div class="col-md-6 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="vat">{{ __('admin.vat') }} {{ settings('currency_symbol', '$') }}</label>
                            <input name="vat" type="text" class="form-control" id="vat" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                        </div>
                    </div>

                    <div class="col-md-12 mb-3">
                        <div class="form-group">
                            <label class="form-label" for="invoice">{{ __('admin.invoice') }}</label>
                            <input name="invoice" type="file" class="form-control" id="invoice" />
                        </div>
                    </div>
                </div>

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
            containerFullOrEmpty('damage_history');
            containerFullOrEmpty('repairs');
        });

        function component_damage_history(item, index) {
            return `<tr>
                <td>${ index + 1 }</td>
                <td>${ item.reported_date }</td>
                <td>${ item.incident_date }</td>
                <td>${ item.insurance_reference_no }</td>
                <td>{{ settings('currency_symbol', '$') }} ${ item.total_claim_cost }</td>
                <td>${ item.status }</td>
            </tr>`
        }

        function addDamageHistory(response) {
            if (response.status == 'success') {
                jQuery('[data-container-full="damage_history"]').html('');

                for (let i = 0; i < response.data.length; i++) {
                    jQuery('[data-container-full="damage_history"]').append(component_damage_history(response.data[i], i));
                }
                containerFullOrEmpty('damage_history');

                NioApp.Toast(response.message, 'success', {
                    position: 'top-right'
                });

                jQuery('form').trigger('reset');
            } else {
                showError(response);
            }
        }

        function component_repair(item, index) {
            return `<tr>
                <td>${ index + 1 }</td>
                <td>${ item.booking_id }</td>
                <td>${ item.booking_date }</td>
                <td>${ item.date_time }</td>
                <td>${ item.mileage_at_repair }</td>
                <td>${ item.workshop_name }</td>
                <td>${ item.repair_type }</td>
                <td>{{ settings('currency_symbol', '$') }}${ item.total_cost }</td>
                <td>{{ settings('currency_symbol', '$') }}${ item.vat }</td>
                <td>
                    ${
                        item.invoice ? `<a target="_blank" href="${ item.invoice }">View Invoice</a>` : 'No Invoice'
                    }
                </td>
            </tr>`
        }

        function addRepair(response) {
            if (response.status == 'success') {
                jQuery('[data-container-full="repairs"]').html('');

                for (let i = 0; i < response.data.length; i++) {
                    jQuery('[data-container-full="repairs"]').append(component_repair(response.data[i], i));
                }
                containerFullOrEmpty('repairs');

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
