@extends('admin.layout.app')

@section('content')
    <div class="nk-content ">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block">
                        <div class="nk-block nk-block-lg">
                            <div class="nk-block-head">
                                <div class="nk-block-between">
                                    <div class="nk-block-head-content">
                                        <h4 class="nk-block-title">All Chauffeur Bookings</h4>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table
                                                class="datatable-init-export nowrap table dataTable no-footer dtr-inline">
                                                <thead>
                                                    <tr>
                                                        <th>User</th>
                                                        <th>Car</th>
                                                        <th>Trip Type</th>
                                                        <th>Pickup</th>
                                                        <th>Dropoff</th>
                                                        <th>Pickup Date</th>
                                                        <th>Passengers</th>
                                                        <th>Trip Amount</th>
                                                        <th>Extras Paid</th>
                                                        <th>Total</th>
                                                        <th>Payment Status</th>
                                                        <th>Booking Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $item)
                                                        <tr>
                                                            <td>
                                                                @if($item->user)
                                                                    {{ $item->user->first_name }} {{ $item->user->last_name }}
                                                                @else
                                                                    N/A
                                                                @endif
                                                            </td>
                                                            <td>{{ $item->car ? $item->car->title : 'N/A' }}</td>
                                                            <td>{{ strtoupper($item->trip_type) }}</td>
                                                            <td>{{ $item->pickup_location }}</td>
                                                            <td>{{ $item->dropoff_location }}</td>
                                                            <td>{{ $item->pickup_date }} {{ $item->pickup_time }}</td>
                                                            <td>{{ $item->passengers }}</td>
                                                            <td>{{ amt($item->trip_amount) }}</td>
                                                            <td>{{ amt($item->addons_total) }}</td>
                                                            <td>{{ amt($item->total_amount) }}</td>
                                                            <td>{{ $item->pg_status }}</td>
                                                            <td>{{ $item->status }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="{{ route('admin.ch_bookings.show', $item->id) }}">View</a></li>
                                                                        <li><a class="dropdown-item" href="#">Delete</a></li>
                                                                    </ul>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>

                                            <div class="d-flex mt-2">
                                                {!! $items->links() !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
