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
                                        <h4 class="nk-block-title">Booking Details</h4>
                                        <div class="nk-block-des">
                                            <p>View complete booking information</p>
                                        </div>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <a href="{{ route('admin.ch_bookings.index') }}" class="btn btn-outline-light">
                                            <em class="icon ni ni-arrow-left"></em> Back to Bookings
                                        </a>
                                        @if($booking->status == 'pending')
                                        <div class="dropdown">
                                            <button class="btn btn-outline-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fas fa-rocket" aria-hidden="true"></i> &nbsp; Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><a class="dropdown-item" href="{{ route('admin.ch_bookings.status', ['id' => $booking->id, 'status' => 'accepted']) }}">Accept</a></li>
                                                <li><a class="dropdown-item" href="{{ route('admin.ch_bookings.status', ['id' => $booking->id, 'status' => 'rejected']) }}">Reject</a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="card card-bordered">
                                <div class="card-inner">
                                    <!-- Customer Information -->
                                    <div class="row mb-4">
                                        <div class="col-md-6">
                                            <h6 class="title">Customer Information</h6>
                                            <div class="preview-block">
                                                <div class="row gy-3">
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Full Name</span>
                                                        <span>{{ $booking->full_name ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Phone Number</span>
                                                        <span>{{ $booking->phone_no ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Email Address</span>
                                                        <span>{{ $booking->email_addr ?? 'N/A' }}</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Company Name</span>
                                                        <span>{{ $booking->company_name ?? 'N/A' }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <h6 class="title">Booking Status</h6>
                                            <div class="preview-block">
                                                <div class="row gy-3">
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Booking Status</span>
                                                        <span >
                                                            {{ strtoupper($booking->status) }}
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Payment Status</span>
                                                        <span >
                                                            {{ strtoupper($booking->pg_status) }}
                                                        </span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Passengers</span>
                                                        <span>{{ $booking->passengers }}</span>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <span class="sub-text">Trip Type</span>
                                                        <span>{{ strtoupper($booking->trip_type) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Trip Details -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="title">Trip Details</h6>
                                            <div class="preview-block">
                                                <div class="row gy-3">
                                                    <div class="col-md-6">
                                                        <span class="sub-text">Pickup Location</span>
                                                        <span>{{ $booking->pickup_location }}</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="sub-text">Dropoff Location</span>
                                                        <span>{{ $booking->dropoff_location }}</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="sub-text">Pickup Date</span>
                                                        <span>{{ $booking->pickup_date }}</span>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <span class="sub-text">Pickup Time</span>
                                                        <span>{{ $booking->pickup_time }}</span>
                                                    </div>
                                                </div>
                                                
                                                @if($booking->stops)
                                                    <div class="mt-3">
                                                        <span class="sub-text">Stops</span>
                                                        <div class="mt-1">
                                                            @foreach($booking->stops as $stop)
                                                                <div class="mb-1">{{ $stop }}</div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif

                                                @if($booking->trip_type_extra)
                                                    <div class="mt-3">
                                                        <span class="sub-text">Trip Type Extra Details</span>
                                                        <div class="mt-1">
                                                            @if($booking->trip_type_extra)
                                                                @foreach($booking->trip_type_extra as $key => $value)
                                                                    <div class="mb-1"><strong>{{ ucfirst($key) }}:</strong> {{ $value }}</div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Vehicle Information -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="title">Vehicle Information</h6>
                                            <div class="preview-block">
                                                <div class="row gy-3">
                                                    <div class="col-md-6">
                                                        <span class="sub-text">Vehicle</span>
                                                        <span>{{ $booking->car ? $booking->car->title : 'N/A' }}</span>
                                                    </div>
                                                </div>
                                                
                                                @if($booking->car_snapshot)
                                                    @php $carSnapshot = $booking->car_snapshot; @endphp
                                                    <div class="mt-3">
                                                        <span class="sub-text">Vehicle Features</span>
                                                        <div class="row mt-1">
                                                            @if(isset($carSnapshot['features1']))
                                                                <div class="col-md-4 mb-2">
                                                                    <strong>Main Features:</strong>
                                                                    <ul class="list-unstyled">
                                                                        @foreach($carSnapshot['features1'] as $feature)
                                                                            <li>• {{ $feature }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            @if(isset($carSnapshot['features2']))
                                                                <div class="col-md-4 mb-2">
                                                                    <strong>Amenities:</strong>
                                                                    <ul class="list-unstyled">
                                                                        @foreach($carSnapshot['features2'] as $feature)
                                                                            <li>• {{ $feature }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                            @if(isset($carSnapshot['chauffer_terms']))
                                                                <div class="col-md-4 mb-2">
                                                                    <strong>Chauffeur Terms:</strong>
                                                                    <ul class="list-unstyled">
                                                                        @foreach($carSnapshot['chauffer_terms'] as $key => $term)
                                                                            <li>• {{ $key }}: {{ $term }}</li>
                                                                        @endforeach
                                                                    </ul>
                                                                </div>
                                                            @endif
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Add-ons -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="title">Add-ons</h6>
                                            <div class="preview-block">
                                                @if($booking->addons)
                                                    @php $addons = $booking->addons; @endphp
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>Add-on Name</th>
                                                                    <th>Price</th>
                                                                    <th>Quantity</th>
                                                                    <th>Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach($addons as $addon)
                                                                    <tr>
                                                                        <td>{{ $addon['name'] ?? 'N/A' }}</td>
                                                                        <td>{{ amt($addon['price'] ?? 0) }}</td>
                                                                        <td>{{ $addon['count'] ?? 1 }}</td>
                                                                        <td>{{ amt(($addon['price'] ?? 0) * ($addon['count'] ?? 1)) }}</td>
                                                                    </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                @else
                                                    <span>No add-ons selected</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Pricing Information -->
                                    <div class="row mb-4">
                                        <div class="col-12">
                                            <h6 class="title">Pricing Information</h6>
                                            <div class="preview-block">
                                                <div class="row gy-3">
                                                    <div class="col-md-4">
                                                        <span class="sub-text">Trip Amount</span>
                                                        <span class="text-primary fw-bold">{{ amt($booking->trip_amount) }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="sub-text">Add-ons Total</span>
                                                        <span class="text-info fw-bold">{{ amt($booking->addons_total) }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="sub-text">Total Amount</span>
                                                        <span class="text-success fw-bold">{{ amt($booking->total_amount) }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Special Requirements -->
                                    @if($booking->special_reqs)
                                        <div class="row mb-4">
                                            <div class="col-12">
                                                <h6 class="title">Special Requirements</h6>
                                                <div class="preview-block">
                                                    <p>{{ $booking->special_reqs }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- Additional Information -->
                                    <div class="row">
                                        <div class="col-12">
                                            <h6 class="title">Additional Information</h6>
                                            <div class="preview-block">
                                                <div class="row gy-3">
                                                    <div class="col-md-4">
                                                        <span class="sub-text">Booking ID</span>
                                                        <span>{{ $booking->id }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="sub-text">Created At</span>
                                                        <span>{{ $booking->created_at }}</span>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="sub-text">Updated At</span>
                                                        <span>{{ $booking->updated_at }}</span>
                                                    </div>
                                                    @if($booking->paid_at)
                                                        <div class="col-md-4">
                                                            <span class="sub-text">Paid At</span>
                                                            <span>{{ $booking->paid_at }}</span>
                                                        </div>
                                                    @endif
                                                    @if($booking->pg_tx_id)
                                                        <div class="col-md-4">
                                                            <span class="sub-text">Transaction ID</span>
                                                            <span>{{ $booking->pg_tx_id }}</span>
                                                        </div>
                                                    @endif
                                                    @if($booking->cancellation_reason)
                                                        <div class="col-md-4">
                                                            <span class="sub-text">Cancellation Reason</span>
                                                            <span>{{ $booking->cancellation_reason }}</span>
                                                        </div>
                                                    @endif
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
    </div>
@endsection
