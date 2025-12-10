@extends('frontpage.layout')

@section('style')
    <style>
        body {
            background-color: #f3f4fb;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI",
                sans-serif;
        }

        .page-wrapper {
            padding: 24px 16px;
        }

        .results-header {
            background-color: #ffffff;
            border-radius: 12px;
            padding: 16px 20px;
            margin-bottom: 14px;
            box-shadow: 0 4px 12px rgba(15, 23, 42, 0.06);
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 0.75rem;
        }

        .results-title {
            font-weight: 600;
            font-size: 1.1rem;
        }

        .results-subtitle {
            color: #6b7280;
            font-size: 0.9rem;
            margin-left: 4px;
        }

        .pill-filters .btn {
            border-radius: 999px;
            font-size: 0.8rem;
            padding: 4px 12px;
        }

        .btn-filter {
            border-radius: 999px;
            background-color: #111827;
            color: #ffffff;
            font-size: 0.85rem;
            padding-inline: 14px;
        }

        .btn-filter i {
            margin-right: 4px;
        }

        .view-toggle .btn {
            border-radius: 999px;
            font-size: 0.8rem;
            padding: 6px 10px;
        }

        .car-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(15, 23, 42, 0.08);
            margin-bottom: 16px;
            overflow: hidden;
            border: 0;
        }

        .car-card img {
            height: 215px;
            width: 100%;
            object-fit: cover;
        }

        .tag-badge {
            border-radius: 999px;
            padding: 2px 10px;
            font-size: 0.7rem;
            margin-right: 4px;
            margin-bottom: 4px;
            font-weight: 500;
        }

        .tag-primary {
            background: #4f46e5;
            color: #ffffff;
        }

        .tag-outline {
            background: #eef2ff;
            color: #4f46e5;
        }

        .tag-green {
            background: #e5f9ed;
            color: #059669;
        }

        .car-name {
            font-weight: 600;
            margin-top: 6px;
            margin-bottom: 0;
        }

        .car-subtitle {
            font-size: 0.8rem;
            color: #6b7280;
        }

        .car-quick-specs {
            font-size: 0.8rem;
            margin-top: 6px;
            margin-bottom: 6px;
        }

        .car-quick-specs span {
            margin-right: 10px;
        }

        .car-quick-specs i {
            font-size: 0.8rem;
            margin-right: 4px;
            color: #6b7280;
        }

        .car-features {
            font-size: 0.75rem;
            margin-bottom: 0;
        }

        .car-features li {
            margin-bottom: 2px;
        }

        .car-left-links {
            font-size: 0.75rem;
            margin-top: 4px;
        }

        .car-left-links a {
            text-decoration: none;
            color: #4f46e5;
        }

        .rating-badge {
            font-size: 0.8rem;
            font-weight: 600;
            color: #f59e0b;
        }

        .price-block {
            text-align: right;
            font-size: 0.8rem;
        }

        .price-block .price-label {
            color: #6b7280;
        }

        .price-block .price-main {
            font-size: 1.1rem;
            font-weight: 700;
            margin-top: 2px;
        }

        .price-block .price-note {
            font-size: 0.75rem;
            color: #6b7280;
        }

        .security-deposit {
            font-size: 0.75rem;
            color: #6b7280;
            margin-top: 6px;
        }

        .btn-main {
            background-color: #2563eb;
            border-color: #2563eb;
            color: #ffffff;
            border-radius: 999px;
            padding: 6px 16px;
            font-size: 0.8rem;
            margin-top: 10px;
        }

        .btn-main:hover {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            color: #ffffff;
        }

        /* Offcanvas / sidebar */
        .offcanvas-filters {
            width: 340px;
        }

        .filter-card {
            border-radius: 12px;
            border: 1px solid #e5e7eb;
            padding: 14px 16px;
            margin-bottom: 12px;
            background-color: #ffffff;
        }

        .filter-title {
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .filter-card .form-check {
            font-size: 0.85rem;
            margin-bottom: 4px;
        }

        .deposit-label {
            font-size: 0.8rem;
            color: #6b7280;
            text-align: center;
            margin-top: 4px;
        }

        @media (max-width: 767.98px) {
            .results-header {
                border-radius: 0;
                margin-inline: -16px;
            }

            .car-card {
                border-radius: 0;
                margin-inline: -16px;
            }

            .price-block {
                text-align: left;
                margin-top: 8px;
            }
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <div class="page-wrapper container-lg">

        <!-- HEADER -->
        <div class="results-header">
            <div class="d-flex flex-column flex-md-row align-items-md-center gap-1">
                <div class="d-flex align-items-baseline">
                    <span class="results-title">{{ $cars->count() }} cars available</span>
                </div>
            </div>

            <div class="d-flex flex-wrap align-items-center gap-2">
                <button class="btn btn-filter" type="button" data-bs-toggle="offcanvas" data-bs-target="#filtersCanvas">
                    <i class="fas fa-sliders-h"></i> Filter
                </button>

                <div class="dropdown">
                    <button class="btn btn-light border dropdown-toggle" type="button" data-bs-toggle="dropdown">
                        {{ request()->get('sort_by', 'Recommended') }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Recommended">Recommended</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Price (low to high)">Price (low to high)</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Price (high to low)">Price (high to low)</a></li>
                        <li><a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Best rated">Best rated</a></li>
                    </ul>
                </div>

                <div class="view-toggle btn-group">
                    <button class="btn btn-light border">
                        <i class="fas fa-list"></i>
                    </button>
                    <button class="btn btn-light border">
                        <i class="fas fa-map-marked-alt"></i>
                    </button>
                </div>
            </div>
        </div>

        @foreach($cars as $car)
        <div class="card car-card">
            <div class="row g-0">
                <div class="col-md-3">
                    <img src="{{ $car->image }}" alt="{{ $car->title }}" />
                </div>
                <div class="col-md-6 p-3">
                    <div class="d-flex flex-wrap">
                        <span class="tag-badge tag-primary">Private Hire</span>
                        @if($car->free_cancellation)
                        <span class="tag-badge tag-green">Free Cancellation</span>
                        @endif
                    </div>
                    <h6 class="car-name">{{ $car->title }}</h6>
                    <div class="car-subtitle">Private Hire Vehicle</div>

                    <div class="car-quick-specs">
                        <span><i class="fas fa-user-friends"></i> {{ $car->seats }} Seats</span>
                        <span><i class="fas fa-cog"></i> {{ $car->gear ?? '-' }}</span>
                        <span><i class="fas fa-suitcase-rolling"></i> {{ $car->bags_large }} Bags</span>
                        <span><i class="fas fa-suitcase-rolling"></i> {{ $car->bags }} Small Bags</span>
                        <span><i class="fas fa-gas-pump"></i> {{ $car->fuel_type ?? '-'}}</span>
                    </div>

                    <ul class="car-features list-unstyled">
                        <li>{{ $car->company->name }}</li>
                        @if($car->free_cancellation || $car->cancellation_policy)
                        <li>Free cancellation up to {{ $car->free_cancellation ? 24 : $car->cancellation_policy }} hours before pick-up</li>
                        @endif
                    </ul>

                    <div class="car-left-links">
                        <a href="#">Important info &amp; rental terms</a>
                    </div>
                </div>
                <div class="col-md-3 d-flex flex-column justify-content-between p-3 border-start">
                    <div class="d-flex justify-content-between">
                        <div class="rating-badge">
                            <i class="fas fa-star"></i> 4.5
                        </div>
                        <div class="text-muted small">From:</div>
                    </div>

                    <div class="price-block mt-1">
                        <div class="price-main">{{ $car->min_rental_cost }}</div>
                        <div class="price-note mt-1">
                            {{ $car->renting_term }} rates available
                        </div>
                    </div>

                    <div class="security-deposit">
                        <div><i class="far fa-dot-circle me-1"></i>Deposit</div>
                        <div>{{ $car->min_deposit }}</div>
                    </div>

                    <div class="text-end">
                        <button onclick="view_options('{{ $car->id }}')" class="btn btn-main">View Options</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- RIGHT SIDEBAR / FILTERS -->
    <div class="offcanvas offcanvas-end offcanvas-filters" tabindex="-1" id="filtersCanvas">
        <div class="offcanvas-header border-bottom">
            <h6 class="offcanvas-title">search.filterResults</h6>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"></button>
        </div>
        <form method="get" class="offcanvas-body">
            <!-- Car Type -->
            <div class="filter-card">
                <div class="filter-title">Car Type</div>
                <div class="row">
                    @php $selectedCarTypes = request()->get('car_types', []); @endphp
                    @foreach ($carTypes as $carType)
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" id="ct-{{ $carType->id }}" value="{{ $carType->name }}"
                                type="checkbox" name="car_types[]" {{ in_array($carType->name, $selectedCarTypes) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted"
                                for="ct-{{ $carType->id }}">{{ $carType->name }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Transmission -->
            <div class="filter-card">
                <div class="filter-title">Transmission</div>
                <div class="row">
                    @php $selectedTransmissions = request()->get('transmission', []); @endphp
                    @foreach(['Automatic','Manual'] as $index => $transmission)
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" name="transmission[]" id="tm-{{ $index }}"
                                value="{{ $transmission }}" type="checkbox" {{ in_array($transmission, $selectedTransmissions) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted"
                                for="tm-{{ $index }}">{{ $transmission }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Fuel Type -->
            <div class="filter-card">
                <div class="filter-title">Fuel Type</div>
                <div class="row">
                    @php $selectedFuelTypes = request()->get('fuel_types', []); @endphp
                    @foreach([
                        'Diesel',
                        'Petrol',
                        'Diesel hybrid',
                        'Petrol Hybrid',
                        'Electric',
                        'Plug in hybrid',
                        'Diesel Plug in Hybrid',
                        'Petrol Plug in Hybrid',
                        'Hydrogen'
                    ] as $index => $fuel)
                    <div class="col-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="ft-{{ $index }}" name="fuel_types[]" value="{{ $fuel }}" {{ in_array($fuel, $selectedFuelTypes) ? 'selected' : '' }} />
                            <label class="form-check-label" for="ft-{{ $index }}">{{ $fuel }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- PHV Hire Options -->
            <div class="filter-card">
                <div class="filter-title">PHV Hire Options</div>
                <div class="row">
                    @php $selectedRentingTerms = request()->get('renting_terms', []); @endphp
                    @foreach ([
                        'short_term' => 'Flex (Short-term)',
                        'long_term' => 'Long-term (3+ months)',
                        'rent_to_buy' => 'Rent-to-Buy',
                    ] as $key => $value)
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" id="opt-{{ $key }}" type="checkbox" name="renting_terms[]" value="{{  $key }}" {{ in_array($key, $selectedRentingTerms) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted"
                                for="opt-{{ $key }}">{{ $value }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Licensed Council -->
            <div class="filter-card">
                <div class="filter-title">Licensed Council</div>
                <div class="row">
                    @php $selectedCouncils = request()->get('councils', []); @endphp
                    @foreach (['Transport for London', 'Manchester City Council', 'Birmingham City Council', 'Leeds City Council', 'Liverpool City Council', 'Newcastle City Council', 'Nottingham City Council', 'Salford City Council', 'Sheffield City Council', 'West Midlands City Council'] as $index => $council)
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" name="councils[]" id="lc-{{ $index }}"
                                value="{{ $council }}" type="checkbox" {{ in_array($council, $selectedCouncils) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted"
                                for="lc-{{ $index }}">{{ $council }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Features & Extras -->
            <div class="filter-card">
                <div class="filter-title">Features &amp; Extras</div>
                <div class="row">
                    @php $selectedFeatures = request()->get('features', []); @endphp 
                    @foreach ([
                        'ideal_for_family' => 'Ideal for Family',
                        'free_cancellation' => 'Free cancellation',
                        'collision_damage_waiver' => 'Collision Damage Waiver',
                        'theft_protection' => ' Theft Protection',
                        'unlimited_mileage' => 'Unlimited Mileage',
                    ] as $key => $value)
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" id="fe{{ $key }}" type="checkbox" name="features[]" value="{{ $key }}" {{ in_array($key, $selectedFeatures) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted" for="fe{{ $key }}">{{ $value }}</label>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Max Weekly Rent -->
            <div class="filter-card">
                <div class="filter-title">Max Weekly Rent</div>
                <input type="range" class="form-range" min="0" max="1500" value="{{ request()->get('max_weekly_rent', 1500) }}" id="weeklyRentRange" />
                <div class="weekly-rent-label">Search upto {{ settings('currency_symbol', '$') }}<span id="max-weekly-rent">{{ request()->get('max_weekly_rent', 1500) }}</span></div>
            </div>

            <button class="btn btn-main w-100 mt-2">
                <i class="fas fa-check me-2"></i>Apply Filters
            </button>
        </form>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="phvModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-3">

                <!-- Header -->
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title d-flex align-items-center fw-bold">
                        <span class="me-2 text-warning fs-4">⚠️</span>
                        Important: Private Hire Vehicle (PHV)
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Body -->
                <div class="modal-body">

                    <!-- Yellow info box -->
                    <div class="p-3 rounded-3 mb-4" style="background:#FFF7E6; border:1px solid #FAD7A0;">
                        <p class="mb-0">
                            This vehicle is available <strong>exclusively for licensed Private Hire drivers</strong>
                            (e.g., PCO licensed in London) and is <strong>NOT</strong> intended for Social, Domestic, or
                            Pleasure (SDP) use.
                        </p>
                    </div>

                    <p class="fw-semibold">You will need:</p>
                    <ul class="mb-4">
                        <li>Valid Private Hire Driver's Licence (e.g., PCO Badge)</li>
                        <li>Hire & Reward Insurance</li>
                        <li>Right to work in the UK</li>
                        <li>Proof of licensing authority registration</li>
                    </ul>

                    <p class="small text-muted">
                        By proceeding, you confirm that you are a licensed Private Hire driver
                        or booking on behalf of one.
                    </p>

                </div>

                <!-- Footer -->
                <div class="modal-footer border-0">
                    <button class="btn btn-light px-4" data-bs-dismiss="modal">
                        Cancel / Go Back
                    </button>
                    <a class="btn btn-primary px-4" href="#" data-link="proceed">
                        I Understand & Continue
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script type="text/javascript">
    function view_options(id){
        jQuery('[data-link="proceed"]').attr('href', '{{ route('private_hire_single', '%id%') }}'.replace('%id%', id));
        jQuery('#phvModal').modal('show');
    }

    jQuery('[data-filter="sort"]').each((idx, elem) => {
        elem.addEventListener('click', () => {
            jQuery('[data-filter="sort"]').removeClass('active');
            jQuery(elem).addClass('active');

            const sortBy = jQuery(elem).attr('data-filter-val');
            const url = new URL(window.location.href);
            url.searchParams.set('sort_by', sortBy);
            window.location = url.toString();
        });
    });

    jQuery('#weeklyRentRange').on('change', function(){
        jQuery('#max-weekly-rent').text(this.value);
    });

    jQuery('#depositRange').on('change', function(){
        jQuery('#max-security-deposit').text(this.value);
    });
</script>
@endpush