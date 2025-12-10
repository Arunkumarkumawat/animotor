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
                                        <h4 class="nk-block-title">All Private Hire Bookings</h4>
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
                                                        <th>Hire Type</th>
                                                        <th>Insurance</th>
                                                        <th>Term</th>
                                                        <th>Start Date</th>
                                                        <th>End Date</th>
                                                        <th>Deposit Paid</th>
                                                        <th>Rate Paid</th>
                                                        <th>Extra Paid</th>
                                                        <th>Total</th>
                                                        <th>Payment Status</th>
                                                        <th>Booking Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($items as $item)
                                                        <tr>
                                                            <td>{{ $item->user->first_name }} {{ $item->user->last_name }}</td>
                                                            <td>{{ $item->car->title }}</td>
                                                            <td>{{ ucwords(str_replace('_', ' ', $item->term)) }}</td>
                                                            <td>{{ $item->insurance == 'w' ? 'Yes' : 'No' }}</td>
                                                            <td>{{ $item->term_count }} {{ $item->term_period }}</td>
                                                            <td>{{ $item->start_date }}</td>
                                                            <td>{{ $item->expected_end_date }}</td>
                                                            <td>{{ amt($item->deposit_paid) }}</td>
                                                            <td>{{ amt($item->rate_paid) }}</td>
                                                            <td>{{ amt($item->extras_paid) }}</td>
                                                            <td>{{ amt($item->total_paid) }}</td>
                                                            <td>{{ $item->pg_status }}</td>
                                                            <td>{{ $item->booking_status }}</td>
                                                            <td>
                                                                <div class="btn-group">
                                                                    <button type="button" class="btn btn-sm btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                                        Actions
                                                                    </button>
                                                                    <ul class="dropdown-menu">
                                                                        <li><a class="dropdown-item" href="#">View</a></li>
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
