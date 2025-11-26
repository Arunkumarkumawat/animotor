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
                                        <h4 class="nk-block-title">{{ $title }}</h4>
                                    </div>
                                    <div class="nk-block-head-content">
                                        <div class="toggle-wrap nk-block-tools-toggle">
                                            <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                            <div class="toggle-expand-content" data-content="pageMenu">
                                                <ul class="nk-block-tools g-3">
                                                    <li class="nk-block-tools-opt d-none d-sm-block">
                                                        <a class="btn btn-primary" href="{{ route('admin.companies.create') }}"><em class="icon ni ni-plus"></em><span>Add New Company</span></a>
                                                    </li>
                                                    <li class="nk-block-tools-opt d-block d-sm-none">
                                                        <a class="btn btn-icon btn-primary" href="{{ route('admin.companies.create') }}"><em class="icon ni ni-plus"></em></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .toggle-wrap -->
                                    </div><!-- .nk-block-head-content -->

                                </div>

                            </div>

                            <div class="card card-bordered card-preview">
                                <div class="card-inner">
                                    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="datatable-wrap- my-3">
                                            <table class="datatable-init nowrap table" data-export-title="Export">
                                                <thead>
                                                <tr>
                                                    <th>S/N</th>
                                                    <th>Company Name</th>
                                                    <th>Company Logo</th>
                                                    <th>Owner Name</th>
                                                    @if(hasRental())
                                                        <th>Total Bookings</th>
                                                    @endif
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Onboarding Status</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($data as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>
                                                        <td>{{ $item?->company?->name }}</td>
                                                        <td>
                                                            <img src="{{  $item?->company?->logo }}" style="height: 40px" />
                                                        </td>
                                                        <td>{{ $item->name }}</td>
                                                        @if(hasRental())
                                                            <td>{{ $item->company?->bookings?->count() }}</td>
                                                        @endif
                                                        <td>{{ $item->email }}</td>
                                                        <td>{{ $item->phone }}</td>

                                                        <td>
                                                            <button type="button" class="btn btn-sm p-0 border-0 bg-transparent" onclick="openOnboardingModal('{{ $item->id }}', '{{ $item->onboarding_status }}', '{{ $item->onboarding_rejection_reason ?? '' }}')"
                                                                data-bs-toggle="modal" data-bs-target="#onboardingModal">
                                                                @if($item->onboarding_status == 'approved')
                                                                    <span class="badge bg-success">Approved</span>
                                                                @elseif($item->onboarding_status == 'rejected')
                                                                    <span class="badge bg-danger">Rejected</span>
                                                                @elseif($item->onboarding_status == 'In Review')
                                                                    <span class="badge bg-warning">In Review</span>
                                                                @else
                                                                    <span class="badge bg-warning">Pending</span>
                                                                @endif
                                                            </button>
                                                        </td>

                                                        <td>
                                                            @if($item->status == 'active')
                                                                <a href="{{ route('admin.companies.change-status', $item->id) }}?status=inactive" class="btn btn-success">Active</a>
                                                            @else
                                                                <a href="{{ route('admin.companies.change-status', $item->id) }}?status=active" class="btn btn-danger">Inactive</a>
                                                            @endif 
                                                        </td>

                                                        <td>
                                                            @if($item->company)
                                                            <a class="btn btn-primary" href="{{ route('admin.companies.view', $item->company->id) }}">View</a>
                                                            <a class="btn btn-warning" href="{{ route('admin.companies.edit', $item->company->id) }}">Edit</a>
                                                            <a class="btn btn-danger" href="{{ route('admin.companies.delete', $item->company->id) }}" onclick="return confirm('Are you sure you want to delete this company?')">Delete</a>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- .card-preview -->
                        </div>

                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>

    <!-- Onboarding Status Modal -->
    <div class="modal fade" id="onboardingModal" tabindex="-1" aria-labelledby="onboardingModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="onboardingModalLabel">Update Onboarding Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="onboardingForm" method="POST" action="{{ route('admin.companies.update-onboarding-status') }}">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" id="userId" name="user_id">
                        
                        <div class="mb-3">
                            <label for="onboardingStatus" class="form-label">Status</label>
                            <select class="form-select" id="onboardingStatus" name="onboarding_status" required>
                                <option value="pending">Pending</option>
                                <option value="In Review">In Review</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        
                        <div class="mb-3" id="reasonField" style="display: none;">
                            <label for="rejectionReason" class="form-label">Reason</label>
                            <textarea class="form-control" id="rejectionReason" name="onboarding_rejection_reason" rows="3" placeholder="Enter reason for rejection/pending status"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openOnboardingModal(userId, currentStatus, rejectionReason) {
            document.getElementById('userId').value = userId;
            document.getElementById('onboardingStatus').value = currentStatus;
            document.getElementById('rejectionReason').value = rejectionReason;
            
            // Show/hide reason field based on current status
            toggleReasonField(currentStatus);
        }
        
        function toggleReasonField(status) {
            const reasonField = document.getElementById('reasonField');
            const reasonTextarea = document.getElementById('rejectionReason');
            
            if (status === 'approved') {
                reasonField.style.display = 'none';
                reasonTextarea.required = false;
            } else {
                reasonField.style.display = 'block';
                reasonTextarea.required = true;
            }
        }
        
        // Listen for status change
        document.getElementById('onboardingStatus').addEventListener('change', function() {
            toggleReasonField(this.value);
        });
    </script>

@endsection
