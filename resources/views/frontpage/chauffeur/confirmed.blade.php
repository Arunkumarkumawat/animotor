@extends('frontpage.layout')

@section('style')
   <style>
    body {
      background-color: #f5f6fa;
      font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
    }

    .page-container {
      max-width: 900px;
    }

    .success-icon {
      width: 72px;
      height: 72px;
      border-radius: 999px;
      border: 4px solid #bbf7d0;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 1.5rem auto 1rem;
      background-color: #ecfdf5;
      color: #22c55e;
      font-size: 1.9rem;
    }

    .main-title {
      font-weight: 700;
      text-align: center;
      margin-bottom: 0.25rem;
    }

    .main-subtitle {
      text-align: center;
      font-size: 0.95rem;
      color: #6b7280;
      margin-bottom: 1.75rem;
    }

    .card-shell {
      border-radius: 14px;
      border: 1px solid #e5e7eb;
      background-color: #ffffff;
      box-shadow: 0 10px 25px rgba(15, 23, 42, 0.03);
    }

    .reference-card {
      border-radius: 14px;
      border: 2px solid #22c55e;
      background-color: #ecfdf5;
      text-align: center;
      padding: 1.2rem 1.25rem;
      margin-bottom: 2rem;
    }

    .reference-label {
      font-size: 0.85rem;
      text-transform: uppercase;
      color: #6b7280;
      letter-spacing: 0.08em;
      margin-bottom: 0.2rem;
    }

    .reference-code {
      font-weight: 700;
      font-size: 1.3rem;
      letter-spacing: 0.18em;
    }

    .reference-note {
      font-size: 0.85rem;
      color: #6b7280;
      margin-top: 0.4rem;
    }

    .section-header {
      padding: 1.1rem 1.5rem 0.75rem;
      border-bottom: 0;
      background-color: transparent;
    }

    .section-title {
      font-weight: 600;
      font-size: 1rem;
      margin-bottom: 0;
    }

    .helper-text {
      font-size: 0.85rem;
      color: #6b7280;
    }

    .divider {
      border-top: 1px solid #e5e7eb;
      margin-top: 0.75rem;
      margin-bottom: 0.75rem;
    }

    .detail-label {
      font-size: 0.8rem;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: #9ca3af;
      margin-bottom: 0.15rem;
    }

    .detail-value {
      font-size: 0.9rem;
      font-weight: 500;
      color: #111827;
    }

    .badge-pill {
      border-radius: 999px;
      padding: 0.15rem 0.65rem;
      font-size: 0.7rem;
      font-weight: 600;
      background-color: #fef3c7;
      color: #b45309;
    }

    .profile-avatar {
      width: 52px;
      height: 52px;
      border-radius: 50%;
      object-fit: cover;
      margin-right: 0.75rem;
    }

    .driver-role {
      font-size: 0.85rem;
      color: #6b7280;
    }

    .status-badge {
      display: inline-flex;
      align-items: center;
      padding: 0.15rem 0.55rem;
      border-radius: 999px;
      background-color: #e6fbf2;
      color: #16a34a;
      font-size: 0.75rem;
      font-weight: 600;
    }

    .vehicle-img {
      width: 120px;
      height: 70px;
      object-fit: cover;
      border-radius: 10px;
      margin-right: 0.75rem;
    }

    .summary-row {
      display: flex;
      justify-content: space-between;
      font-size: 0.9rem;
      color: #4b5563;
      margin-bottom: 0.3rem;
    }

    .summary-row strong {
      font-weight: 600;
    }

    .summary-note {
      font-size: 0.8rem;
      color: #9ca3af;
      margin-top: 0.25rem;
    }

    .action-btn {
      border-radius: 8px;
      font-size: 0.9rem;
      font-weight: 500;
      padding: 0.65rem 1rem;
    }

    .important-card {
      border-radius: 14px;
      border: 1px solid #fed7aa;
      background-color: #fef3c7;
      padding: 1rem 1.25rem;
      font-size: 0.9rem;
      color: #92400e;
    }

    .important-title {
      font-weight: 600;
      margin-bottom: 0.35rem;
    }

    .important-card ul {
      padding-left: 1.25rem;
      margin-bottom: 0;
    }

    .important-card li {
      margin-bottom: 0.2rem;
    }

    .btn-outline-dark-custom {
      border-color: #d1d5db;
      color: #374151;
      background-color: #fff;
      border-radius: 8px;
      padding: 0.75rem;
      font-weight: 500;
    }

    .btn-outline-dark-custom:hover {
      background-color: #f9fafb;
      color: #111827;
    }

    .btn-primary-custom {
      background-color: #f59e0b;
      border-color: #f59e0b;
      color: #fff;
      border-radius: 8px;
      padding: 0.75rem;
      font-weight: 600;
    }

    .btn-primary-custom:hover {
      background-color: #ea580c;
      border-color: #ea580c;
    }
  </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')

    <div class="container page-container py-4">

    <!-- Success icon + title -->
    <div class="success-icon">
      <i class="fas fa-check"></i>
    </div>
    <h3 class="main-title">Booking Confirmed!</h3>
    <p class="main-subtitle mb-4">Your chauffeur has been booked successfully</p>

    <!-- Booking reference -->
    <div class="reference-card">
      <div class="reference-label">Booking Reference</div>
      <div class="reference-code">{{ $cBooking->id }}</div>
      <div class="reference-note">A confirmation email has been sent to {{ $cBooking->email_addr }}</div>
    </div>

    <!-- Booking details -->
    <div class="card card-shell mb-4">
      <div class="section-header">
        <h6 class="section-title mb-0">Booking Details</h6>
      </div>
      <div class="card-body pt-0 pb-2">
        <div class="row g-3">
          <div class="col-md-3">
            <div class="detail-label">Passenger</div>
            <div class="detail-value">{{ $cBooking->full_name }}</div>
          </div>
          <div class="col-md-3">
            <div class="detail-label">Phone</div>
            <div class="detail-value">{{ $cBooking->phone_no }}</div>
          </div>
          <div class="col-md-4">
            <div class="detail-label">Date &amp; Time</div>
            <div class="detail-value">{{ $cBooking->pickup_date }}</div>
            <div class="helper-text">{{ $cBooking->pickup_time }}</div>
          </div>
          <div class="col-md-2 d-flex align-items-center">
            <span class="badge-pill">{{ strtoupper($cBooking->trip_type) }}</span>
          </div>
        </div>

        <div class="divider"></div>

        <div class="detail-label mb-1">Pickup Location</div>
        <div class="detail-value">{{ $cBooking->pickup_location }}</div>
      </div>
    </div>

    <!-- Chauffeur & Vehicle -->
    <div class="card card-shell mb-4">
      <div class="section-header d-flex align-items-center">
        <span class="me-2" style="color:#f97316;">
          <i class="fas fa-shield-alt"></i>
        </span>
        <h6 class="section-title mb-0">Your Chauffeur &amp; Vehicle</h6>
      </div>
      <div class="card-body pt-0">
        <!-- Driver -->
        <div class="d-flex align-items-center mb-3">
          <img
            src="{{ isset($car->driver['photo']) ? $car->driver['photo'] : 'https://placehold.co/600x400' }}"
            alt="Driver"
            class="profile-avatar"
          >
          <div>
            <div class="detail-value mb-0">{{ isset($car->driver['name']) ? $car->driver['name'] : '-' }}</div>
            <div class="driver-role">Professional Chauffeur · {{ isset($car->driver['years_experience']) ? $car->driver['years_experience'] . '+' : 0 }} years experience</div>
            <div class="mt-1">
              <span class="status-badge">
                <i class="fas fa-check-circle me-1"></i>Licensed Operator
              </span>
            </div>
          </div>
        </div>

        <!-- Vehicle -->
        <div class="d-flex align-items-center">
          <img
            src="{{ isset($car->image) ? $car->image : 'https://placehold.co/600x400' }}"
            alt="Car"
            class="vehicle-img"
          >
          <div>
            <div class="detail-value mb-0">{{ isset($car->title) ? $car->title : '-' }}</div>
            <div class="helper-text">{{ isset($car->type) ? $car->type : '-' }} · {{ isset($car->year) ? $car->year : '-' }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Payment Summary -->
    <div class="card card-shell mb-4">
      <div class="section-header">
        <h6 class="section-title mb-0">Payment Summary</h6>
      </div>
      <div class="card-body pt-0">
        <div class="summary-row">
          <span>Amount Paid</span>
          <strong>{{ amt($cBooking->total_amount) }}</strong>
        </div>
        <div class="summary-row">
          <span>Trip Charges</span>
          <strong>{{ amt($cBooking->trip_amount) }}</strong>
        </div>
        <div class="summary-row">
          <span>Addons Total</span>
          <strong>{{ amt($cBooking->addons_total) }}</strong>
        </div>
      </div>
    </div>

    <!-- Actions -->
    <div class="row g-3 mb-4">
      <div class="col-md-6">
        <button class="btn btn-outline-dark-custom w-100">
          <i class="fas fa-download me-2"></i>Download Invoice
        </button>
      </div>
    </div>

    <!-- Important info -->
    <div class="important-card mb-4">
      <div class="important-title">
        <i class="fas fa-info-circle me-2"></i>Important Information
      </div>
      <ul>
        <li>Your chauffeur will contact you 24 hours before pickup</li>
        <li>Free cancellation up to 24 hours before scheduled time</li>
        <li>Please be ready 5 minutes before pickup time</li>
        <li>Your chauffeur will wait up to 30 minutes free of charge</li>
        <li>For any changes, contact us at support@animotors.com</li>
      </ul>
    </div>

    <!-- Bottom buttons -->
    <div class="row g-3 pb-4">
      <div class="col-md-6">
        <a href="{{ url('/') }}" class="btn btn-outline-dark-custom w-100">Back to Home</a>
      </div>
      <div class="col-md-6">
        <a href="{{ route('frontpage.chauffeur.search') }} class="btn btn-primary-custom w-100">Book Another Chauffeur</a>
      </div>
    </div>
  </div>
@endsection
