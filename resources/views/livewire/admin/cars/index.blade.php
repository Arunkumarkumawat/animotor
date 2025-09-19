<div class="nk-block nk-block-lg">

    <div class="nk-block-head">
        <div class="nk-block-between">
            <div class="nk-block-head-content">
                <h4 class="nk-block-title">Vehicle List</h4>
            </div>


            <div class="nk-block-head-content">
                <div class="toggle-wrap nk-block-tools-toggle">
                    <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                    <div class="toggle-expand-content" data-content="pageMenu">
                        <ul class="nk-block-tools g-3">

                            @if(count($selected_items) > 0)
                            <li class="nk-block-tools-opt d-none d-sm-block">
                                <span class="btn btn-warning"><span>{{ __('admin.selected_items') }} ({{ count($selected_items) }})</span></span>
                            </li>

                                <li>
                                    <div class="drodown">
                                        <a href="#" class="dropdown-toggle dropdown-indicator btn btn-outline-light btn-white" data-bs-toggle="dropdown" aria-expanded="false">Bulk Action</a>
                                        <div class="dropdown-menu dropdown-menu-end" style="">
                                            <ul class="link-list-opt no-bdr">
                                                <li class="text-center">
                                                    <button wire:confirm="Are you sure, you want to delete this records?"  type="button" class="btn btn-danger" wire:click="deleteSelectedItems">
                                                        <span>Delete selected</span>
                                                    </button>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            @endif
                            <li class="nk-block-tools-opt d-none d-sm-block">
                                <a class="btn btn-primary" wire:navigate href="{{ route('admin.cars.create') }}"><em class="icon ni ni-plus"></em><span>{{ __('admin.add_new') }}</span></a>
                            </li>
                            <li class="nk-block-tools-opt d-none d-sm-block">
                                <button type="button" class="btn btn-warning" wire:click="resetPageData"><span>{{ __('admin.reset_page') }}</span></button>
                            </li>
                            <li class="nk-block-tools-opt d-block d-sm-none">
                                <a class="btn btn-icon btn-primary" wire:navigate data-bs-toggle="modal" href="{{ route('admin.cars.create') }}"><em class="icon ni ni-plus"></em></a>
                            </li>
                        </ul>
                    </div>
                </div><!-- .toggle-wrap -->
            </div><!-- .nk-block-head-content -->

        </div>

    </div>
    @if($carsWithoutRegionCount > 0)
    <div class="alert alert-danger alert-icon alert-dismissible">
        <em class="icon ni ni-cross-circle"></em> <strong>{{ __('admin.notice') }}</strong>! {{ $carsWithoutRegionCount }} {{ __('admin.car_without_service_area_message') }}. <button class="close" data-bs-dismiss="alert"></button>
    </div>
    @endif
    <div class="card card-bordered card-preview">

        <div class="card-inner">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                <div class="d-flex">
                    <div class="form-control-wrap">
                        <div class="form-icon form-icon-right">
                            <em class="icon ni ni-search"></em>
                        </div>
                        <input wire:model.live="search" type="text" class="form-control" id="default-04" placeholder="Car search">
                    </div>
                </div>


                <div class="datatable-wrap- table-responsive my-3">



                    <table class="datatable-init- table-bordered nowrap table" data-export-title="{{ __('admin.export_title') }}">
                        <thead>
                        <tr>
                            <th><input type="checkbox" wire:model.live="selectAll"></th>
                            <th>{{ __('admin.sn') }}</th>
                            @if(isAdmin())<th>Company Name</th>@endif
                            <th>{{ __('admin.service_area') }}</th>
                            <th>{{ __('admin.vrm') }}</th>
                            <th>{{ __('admin.make') }}</th>
                            <th>{{ __('admin.is_available') }}</th>
                            <th>{{ __('admin.model') }}</th>
                            <th>Is Approved</th>
{{--                            <th>{{ __('admin.extras') }}</th>--}}
                            <th>{{ __('admin.action') }}</th>
                        </tr>

                        </thead>
                        <tbody>
                        @foreach($data as $item)
                            <tr>
                                <td><input type="checkbox" wire:model.live="selected_items" value="{{ $item->id }}"></td>
                                <td>{{ $loop->index+1 }}</td>
                                @if(isAdmin())<td>{{ $item->company->name ?? ''}}<br>{{ $item->company->contact_email ?? '' }}</td>@endif
                                <td>{{ $item->region->name ?? ''}}</td>
                                <td><a href="{{ route('admin.cars.edit',$item->id) }}" class="btn btn-warning"> {{ $item->registration_number }}</a></td>
                                <td>{{ $item->make }}</td>
                                <td>
{{--                                    @include('admin.components.toggle-switch', ['model' => "Car", 'item' => $item, 'checked' => $item->is_available, 'field' => 'is_available'])--}}

                                    <button type="button" wire:key="{{ $item->id }}" wire:click="toggleAvailable('{{ $item->id }}')" class="btn btn-sm {{ $item->is_available ? 'btn-success' : 'btn-danger' }}">
                                        {{ $item->is_available ? 'yes' : 'No' }}
                                    </button>
                                </td>
                                <td>{{ $item->model }}</td>
                                <td>{{ $item->is_approved == 1 ? 'Approved' : 'Not Approved' }}</td>
                                <td>
                                    @if(\Auth::user()->hasRole('admin') && $item->is_approved == 0)
                                    <button type="button" wire:key="{{ $item->id }}" wire:click="toggleApproved('{{ $item->id }}')" class="btn btn-sm btn-primary">
                                        Review
                                    </button>
                                    @endif
                                    <a class="btn btn-warning btn-sm rounded" wire:navigate href="{{ route('admin.cars.edit',$item->id) }}"><em class="icon ni ni-edit"></em><span>{{ __('admin.edit_item') }}</span></a>
                                </td>
                            </tr>
                            @if(!$item->is_approved)
                            <tr data-id="{{ $item->id }}" class="{{ $opened == $item->id ? '' : 'd-none' }}">
                                <td colspan="11">
                                    <div class="row mt-2">
                                        <div class="col-md-3">
                                            <h5>Pricing &amp; Commission</h5>
                                            <p class="mb-0">Vendor Rates (Gross)</p>
                                            <p class="mb-0">Daily: {{ amt($item->daily_rate) }}</p>
                                            <p class="mb-0">Weekly: {{ amt($item->weekly_rate) }}</p>
                                            <p class="mb-0">Monthly: {{ amt($item->monthly_rate) }}</p>
                                            <div>
                                                <p class="mb-0">Commission Rate</p>
                                                <div class="input-group">
                                                    <input type="number" value="{{ $commission_rate[$item->id] ?? 0 }}" wire:change="updateCommissionRate('{{ $item->id }}', $event.target.value)" class="form-control">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Simulated Daily Rentals</h5>
                                            <p class="mb-0">Price: {{ amt($item->daily_rate) }}</p>
                                            <p class="mb-0">Commission: {{ amt($item->daily_rate * ($commission_rate[$item->id] ?? 0) / 100) }}</p>
                                            <p class="mb-0">Vendor Payout: {{ amt($item->daily_rate - ($item->daily_rate * ($commission_rate[$item->id] ?? 0) / 100)) }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Simulated Weekly Rentals</h5>
                                            <p class="mb-0">Price: {{ amt($item->weekly_rate) }}</p>
                                            <p class="mb-0">Commission: {{ amt($item->weekly_rate * ($commission_rate[$item->id] ?? 0) / 100) }}</p>
                                            <p class="mb-0">Vendor Payout: {{ amt($item->weekly_rate - ($item->weekly_rate * ($commission_rate[$item->id] ?? 0) / 100)) }}</p>
                                        </div>
                                        <div class="col-md-2">
                                            <h5>Simulated Monthly Rentals</h5>
                                            <p class="mb-0">Price: {{ amt($item->monthly_rate) }}</p>
                                            <p class="mb-0">Commission: {{ amt($item->monthly_rate * ($commission_rate[$item->id] ?? 0) / 100) }}</p>
                                            <p class="mb-0">Vendor Payout: {{ amt($item->monthly_rate - ($item->monthly_rate * ($commission_rate[$item->id] ?? 0) / 100)) }}</p>
                                        </div>
                                        <div class="col-md-3">
                                            <h5>Calendar & Rules</h5>
                                            <p class="mb-0">Availability: {{ $item->availabilities->count() }} rules</p>
                                            <p class="mb-0">Blackout: {{ $item->blackouts->count() }} rules</p>
                                            <p class="mb-0">Pricing: {{ count($item->dynamic_pricings ?? []) }} rules</p>
                                            <div>
                                                <button type="button" wire:key="{{ $item->id }}" wire:click="applyApproval('{{ $item->id }}', 1)" class="btn btn-sm btn-primary">
                                                    Approve
                                                </button>
                                                <button type="button" wire:key="{{ $item->id }}" wire:click="applyApproval('{{ $item->id }}', -1)" class="btn btn-sm btn-danger">
                                                    Reject
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>

                    <div class="d-flex mt-2">
                        {!! $data->links() !!}
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
