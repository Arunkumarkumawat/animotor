@extends('frontpage.layout')

@section('style')
    <style>
        :root {
            --muted: #8b94a6;
            --panel: #ffffff;
            --accent: #6b46ff;
            /* purple-ish */
            --tag-bg: #eef3ff;
            --tag-color: #2f4bff;
            --card-shadow: 0 6px 18px rgba(42, 52, 84, 0.06);
            --radius: 12px;
        }

        body {
            background: #f6f7fb;
            font-family: system-ui, -apple-system, Segoe UI, Roboto, "Helvetica Neue", Arial
        }


        /* Sidebar */
        .sidebar-card {
            background: var(--panel);
            border-radius: 10px;
            padding: 18px;
            margin-bottom: 16px;
            box-shadow: var(--card-shadow)
        }

        .sidebar-title {
            font-weight: 600;
            margin-bottom: 10px
        }

        .filter-section {
            padding: 8px 0;
            border-top: 1px solid #eef2f7
        }


        /* Main */
        .topbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 6px
        }

        .toggle-list {
            gap: 8px
        }

        .toggle-btn {
            background: #fff;
            border: 1px solid #e6e9ef;
            border-radius: 8px;
            padding: 6px 10px
        }


        /* Active filters */
        .active-filters {
            display: flex;
            gap: 8px;
            align-items: center;
            flex-wrap: wrap;
            margin: 8px 0
        }

        .filter-pill {
            background: #f0f6ff;
            color: var(--tag-color);
            padding: 6px 10px;
            border-radius: 999px;
            font-size: 13px;
            border: 1px solid rgba(47, 75, 255, 0.08)
        }


        /* Car card */
        .car-card {
            background: var(--panel);
            border-radius: 12px;
            padding: 14px;
            display: flex;
            gap: 18px;
            align-items: center;
            box-shadow: var(--card-shadow);
        }

        .car-image {
            width: 260px;
            height: 140px;
            border-radius: 8px;
            object-fit: cover
        }

        .car-meta .title {
            font-weight: 700;
            font-size: 18px
        }

        .car-meta .subtitle {
            color: var(--muted);
            font-size: 13px
        }

        .tags {
            display: flex;
            gap: 8px;
            margin-bottom: 8px
        }

        .tag {
            background: var(--tag-bg);
            color: var(--tag-color);
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 12px;
            border: 1px solid rgba(47, 75, 255, 0.08)
        }

        .pill-green {
            background: #e6fbef;
            color: #0f9b49;
            border: 1px solid rgba(15, 155, 73, 0.08)
        }


        /* Price box */
        .price-box {
            min-width: 150px;
            text-align: right
        }

        .price-box .price {
            font-weight: 700;
            font-size: 22px
        }

        .deposit {
            border: 1px solid #edf0f5;
            border-radius: 8px;
            padding: 10px;
            background: #fbfcff
        }


        /* Misc */
        .small-muted {
            color: var(--muted);
            font-size: 13px
        }

        .section-title {
            font-weight: 700;
            margin-bottom: 8px
        }


        @media(max-width:991px) {
            .car-card {
                flex-direction: column;
                align-items: flex-start
            }

            .car-image {
                width: 100%;
                height: 200px
            }

            .price-box {
                text-align: left;
                width: 100%
            }
        }
    </style>
@endsection

@section('content')
    @include('frontpage.partials.private_hire.header')
    <div class="container p-4">
        <div class="row">
            <!-- Sidebar -->
            <form method="get" class="col-12 col-lg-3">
                <div class="sidebar-card">
                    <div class="section-title">Car Type</div>
                    <div class="row gx-2">
                        <div class="col-6 col-xl-12">
                            @php $selectedCarTypes = request()->get('car_types', []); @endphp
                            @foreach ($carTypes as $carType)
                                <div class="form-check">
                                    <input class="form-check-input" id="ct-{{ $carType->id }}" value="{{ $carType->name }}"
                                        type="checkbox" name="car_types[]" {{ in_array($carType->name, $selectedCarTypes) ? 'checked' : '' }}>
                                    <label class="form-check-label small-muted"
                                        for="ct-{{ $carType->id }}">{{ $carType->name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="sidebar-card">
                    <div class="section-title">PHV Hire Options</div>
                    @php $selectedRentingTerms = request()->get('renting_terms', []); @endphp
                    @foreach ([
                        'short_term' => 'Flex (Short-term)',
                        'long_term' => 'Long-term (3+ months)',
                        'rent_to_buy' => 'Rent-to-Buy',
                    ] as $key => $value)
                        <div class="form-check">
                            <input class="form-check-input" id="opt-{{ $key }}" type="checkbox" name="renting_terms[]" value="{{  $key }}" {{ in_array($key, $selectedRentingTerms) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted"
                                for="opt-{{ $key }}">{{ $value }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="sidebar-card">
                    <div class="section-title">Max Weekly Rent</div>
                    <input type="range" id="max-weekly-rent" class="form-range" min="0" max="500"
                        value="{{ request()->get('max_weekly_rent', 500) }}" name="max_weekly_rent">
                    <div class="small-muted mt-2">Up to {{ settings('currency_symbol', '$') }}<span
                            id="max-weekly-rent-value">{{ request()->get('max_weekly_rent', 500) }}</span>/week</div>
                </div>

                <div class="sidebar-card">
                    <div class="section-title">Licensed Council</div>
                    @php $selectedCouncils = request()->get('councils', []); @endphp
                    @foreach (['Transport for London', 'Manchester City Council', 'Birmingham City Council', 'Leeds City Council', 'Liverpool City Council', 'Newcastle City Council', 'Nottingham City Council', 'Salford City Council', 'Sheffield City Council', 'West Midlands City Council'] as $index => $council)
                    <div class="form-check">
                        <input class="form-check-input" name="councils[]" id="lc-{{ $index }}"
                            value="{{ $council }}" type="checkbox" {{ in_array($council, $selectedCouncils) ? 'checked' : '' }}>
                        <label class="form-check-label small-muted"
                            for="lc-{{ $index }}">{{ $council }}</label>
                    </div>
                    @endforeach
                </div>

                <div class="sidebar-card">
                    <div class="small-muted mb-2">Transmission</div>
                    @php $selectedTransmissions = request()->get('transmission', []); @endphp
                    @foreach(['Automatic','Manual'] as $index => $transmission)
                    <div class="form-check">
                        <input class="form-check-input" name="transmission[]" id="tm-{{ $index }}"
                            value="{{ $transmission }}" type="checkbox" {{ in_array($transmission, $selectedTransmissions) ? 'checked' : '' }}>
                        <label class="form-check-label small-muted"
                            for="tm-{{ $index }}">{{ $transmission }}</label>
                    </div>
                    @endforeach

                    <hr>

                    <div class="small-muted mb-2">Fuel Type</div>
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
                    ] as $index => $fuelType)
                    <div class="form-check">
                        <input class="form-check-input" name="fuel_type[]" id="ft-{{ $index }}"
                            value="{{ $fuelType }}" type="checkbox" {{ in_array($fuelType, $selectedFuelTypes) ? 'checked' : '' }}>
                        <label class="form-check-label small-muted"
                            for="ft-{{ $index }}">{{ $fuelType }}</label>
                    </div>
                    @endforeach

                    <hr>

                    <div class="small-muted mb-2">Features & Extras</div>
                    @php $selectedFeatures = request()->get('features', []); @endphp 
                    @foreach ([
                        'ideal_for_family' => 'Ideal for Family',
                        'free_cancellation' => 'Free cancellation',
                        'collision_damage_waiver' => 'Collision Damage Waiver',
                        'theft_protection' => ' Theft Protection',
                        'unlimited_mileage' => 'Unlimited Mileage',
                    ] as $key => $value)
                        <div class="form-check">
                            <input class="form-check-input" id="fe{{ $key }}" type="checkbox" name="features[]" value="{{ $key }}" {{ in_array($key, $selectedFeatures) ? 'checked' : '' }}>
                            <label class="form-check-label small-muted" for="fe{{ $key }}">{{ $value }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="d-grid gap-2 mt-2">
                    <button type="submit" class="btn btn-primary">Apply Filters</button>
                    <button type="reset" class="btn btn-outline-secondary">Clear All</button>
                </div>
            </form>

            <!-- Main -->
            <main class="col-12 col-lg-9">
                <div class="p-2">
                    <div class="topbar mb-2">
                        <div>
                            <h5 class="mb-0">{{ $cars->count() }} cars available</h5>
                            <div class="active-filters mt-2">
                                <a href="{{ route('private_hire_list_alt') }}" class="filter-pill">Private Hire</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="me-2 d-none d-md-flex gap-2">
                                <div class="dropdown">
                                    <button class="btn btn-light dropdown-toggle toggle-btn" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">{{ request()->get('sort_by','Recommended') }}</button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Recommended">Recommended</a>
                                        <a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Price (low to high)">Price (low to high)</a>
                                        <a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Price (high to low)">Price (high to low)</a>
                                        <a class="dropdown-item" href="javascript:void(0)" data-filter="sort" data-filter-val="Best rated">Best rated</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @foreach($cars as $car)
                    <!-- Car Card -->
                    <div class="car-card">
                        <img src="{{ $car->image }}" alt="car" class="car-image">

                        <div class="car-meta flex-grow-1">
                            <div class="tags">
                                @if($car->top_pick)
                                <div class="tag">Top Pick</div>
                                @endif
                                @if($car->free_cancellation)
                                <div class="tag">Free Cancellation</div>
                                @endif
                            </div>

                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <div class="title">{{ $car->title }}</div>
                                    <div class="subtitle">Private Hire Vehicle</div>
                                </div>
                                <div class="small-muted text-end">From:</div>
                            </div>

                            <div class="row mt-3 small-muted">
                                <div class="col-6 col-md-3">👥 {{ $car->seats }} Seats</div>
                                <div class="col-6 col-md-3">🧳 {{ $car->bags_large }}+{{ $car->bags }} Bags</div>
                                <div class="col-6 col-md-3">⚙️{{ $car->gear }}</div>
                                <div class="col-6 col-md-3">⛽ {{ $car->fuel_type ?? 'Unknown' }}</div>
                            </div>

                            <div class="mt-2 small-muted">
                                <span class="pill-green">Min {{ $car->min_rental_period }}</span> · 
                                @if($car->free_cancellation)
                                <span class="pill-green">Free Cancellation</span> · 
                                @endif
                            </div>
                            <div class="mt-2">
                                <a href="#" class="small-muted">Important info & rental terms</a>
                            </div>
                        </div>

                        <div class="price-box">
                            <div class="mb-2 small-muted text-end">{{ $car->renting_term }} rates available</div>
                            <div class="price">{{ $car->min_rental_cost }}</div>
                            <div class="mt-2 deposit">
                                <div class="small-muted">Deposit</div>
                                <input class="form-control form-control-sm mt-1" value="{{ $car->min_deposit }}" readonly>
                            </div>
                            <div class="mt-3 d-grid">
                                <button class="btn" style="background:var(--accent);color:#fff" onclick="view_options('{{ $car->id }}')">View Options</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </main>
        </div>
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
<script type="Text/javascript">
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