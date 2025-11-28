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
            <aside class="col-12 col-lg-3">
                <div class="sidebar-card">
                    <div class="section-title">Car Type</div>
                    <div class="row gx-2">
                        <div class="col-6 col-xl-12">
                            <div class="form-check"><input class="form-check-input" id="ctSmall" type="checkbox"><label
                                    class="form-check-label small-muted" for="ctSmall">Small</label></div>
                            <div class="form-check"><input class="form-check-input" id="ctLarge" type="checkbox"><label
                                    class="form-check-label small-muted" for="ctLarge">Large</label></div>
                            <div class="form-check"><input class="form-check-input" id="ctEstate" type="checkbox"><label
                                    class="form-check-label small-muted" for="ctEstate">Estate</label></div>
                            <div class="form-check"><input class="form-check-input" id="ctLuxury" type="checkbox"><label
                                    class="form-check-label small-muted" for="ctLuxury">Luxury</label></div>
                        </div>
                        <div class="col-6 col-xl-12">
                            <div class="form-check"><input class="form-check-input" id="ctMedium" type="checkbox"><label
                                    class="form-check-label small-muted" for="ctMedium">Medium</label></div>
                            <div class="form-check"><input class="form-check-input" id="ctSUV" type="checkbox"><label
                                    class="form-check-label small-muted" for="ctSUV">SUV</label></div>
                            <div class="form-check"><input class="form-check-input" id="ct7" type="checkbox"><label
                                    class="form-check-label small-muted" for="ct7">7-Seater</label></div>
                            <div class="form-check"><input class="form-check-input" id="ctPHV" type="checkbox"
                                    checked><label class="form-check-label small-muted" for="ctPHV">Private Hire</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sidebar-card">
                    <div class="section-title">PHV Hire Options</div>
                    <div class="form-check"><input class="form-check-input" id="optFlex" type="checkbox"><label
                            class="form-check-label small-muted" for="optFlex">Flex (Short-term)</label></div>
                    <div class="form-check"><input class="form-check-input" id="optLong" type="checkbox"><label
                            class="form-check-label small-muted" for="optLong">Long-term (3+ months)</label></div>
                    <div class="form-check"><input class="form-check-input" id="optRent" type="checkbox"><label
                            class="form-check-label small-muted" for="optRent">Rent-to-Buy</label></div>
                </div>

                <div class="sidebar-card">
                    <div class="section-title">Weekly Rent</div>
                    <input type="range" class="form-range" min="0" max="500" value="120">
                    <div class="small-muted mt-2">Up to £500/week</div>
                </div>

                <div class="sidebar-card">
                    <div class="section-title">Licensed Council</div>
                    <div class="form-check"><input class="form-check-input" id="lcAny" type="checkbox"><label
                            class="form-check-label small-muted" for="lcAny">Any Council</label></div>
                    <div class="form-check"><input class="form-check-input" id="lcLondon" type="checkbox"><label
                            class="form-check-label small-muted" for="lcLondon">London (TFL PHV)</label></div>
                    <div class="form-check"><input class="form-check-input" id="lcWolver" type="checkbox"><label
                            class="form-check-label small-muted" for="lcWolver">Wolverhampton</label></div>
                    <div class="form-check"><input class="form-check-input" id="lcBham" type="checkbox"><label
                            class="form-check-label small-muted" for="lcBham">Birmingham</label></div>
                    <div class="form-check"><input class="form-check-input" id="lcManc" type="checkbox"><label
                            class="form-check-label small-muted" for="lcManc">Manchester</label></div>
                </div>

                <div class="sidebar-card">
                    <div class="section-title">More Filters</div>
                    <div class="small-muted mb-2">Licensing Type</div>
                    <div class="form-check"><input class="form-check-input" id="ltPHV" type="checkbox"><label
                            class="form-check-label small-muted" for="ltPHV">Private Hire Vehicle (PHV)</label></div>
                    <div class="form-check"><input class="form-check-input" id="ltTaxi" type="checkbox"><label
                            class="form-check-label small-muted" for="ltTaxi">Public Hire (Taxi)</label></div>
                    <div class="form-check"><input class="form-check-input" id="ltReady" type="checkbox"><label
                            class="form-check-label small-muted" for="ltReady">Ready to Licence</label></div>
                    <div class="form-check"><input class="form-check-input" id="ltPre" type="checkbox"><label
                            class="form-check-label small-muted" for="ltPre">Pre-Plated</label></div>

                    <hr>
                    <div class="small-muted mb-2">Platform Eligibility</div>
                    <div class="row">
                        <div class="col-6 small-muted">
                            <div class="form-check"><input class="form-check-input" id="uberX"
                                    type="checkbox"><label class="form-check-label small-muted" for="uberX">Uber
                                    X</label></div>
                            <div class="form-check"><input class="form-check-input" id="uberG"
                                    type="checkbox"><label class="form-check-label small-muted" for="uberG">Uber
                                    Green</label></div>
                            <div class="form-check"><input class="form-check-input" id="uberC"
                                    type="checkbox"><label class="form-check-label small-muted" for="uberC">Uber
                                    Comfort</label></div>
                        </div>
                        <div class="col-6 small-muted">
                            <div class="form-check"><input class="form-check-input" id="boltStd"
                                    type="checkbox"><label class="form-check-label small-muted" for="boltStd">Bolt
                                    Standard</label></div>
                            <div class="form-check"><input class="form-check-input" id="boltComf"
                                    type="checkbox"><label class="form-check-label small-muted" for="boltComf">Bolt
                                    Comfort</label></div>
                            <div class="form-check"><input class="form-check-input" id="boltXL"
                                    type="checkbox"><label class="form-check-label small-muted" for="boltXL">Bolt
                                    XL</label></div>
                        </div>
                    </div>

                    <hr>
                    <div class="small-muted mb-2">Body Type</div>
                    <div class="form-check"><input class="form-check-input" id="btSaloon" type="checkbox"><label
                            class="form-check-label small-muted" for="btSaloon">Saloon</label></div>
                    <div class="form-check"><input class="form-check-input" id="btEstate" type="checkbox"><label
                            class="form-check-label small-muted" for="btEstate">Estate</label></div>
                    <div class="form-check"><input class="form-check-input" id="btSUV" type="checkbox"><label
                            class="form-check-label small-muted" for="btSUV">SUV</label></div>
                    <div class="form-check"><input class="form-check-input" id="btMPV" type="checkbox"><label
                            class="form-check-label small-muted" for="btMPV">MPV</label></div>
                    <div class="form-check"><input class="form-check-input" id="bt7s" type="checkbox"><label
                            class="form-check-label small-muted" for="bt7s">7-Seater</label></div>

                    <hr>
                    <div class="small-muted mb-2">Features & Extras</div>
                    <div class="form-check"><input class="form-check-input" id="feUL" type="checkbox"><label
                            class="form-check-label small-muted" for="feUL">Unlimited Mileage</label></div>
                    <div class="form-check"><input class="form-check-input" id="feIns" type="checkbox"><label
                            class="form-check-label small-muted" for="feIns">Insurance Included</label></div>
                    <div class="form-check"><input class="form-check-input" id="feMaint" type="checkbox"><label
                            class="form-check-label small-muted" for="feMaint">Maintenance Included</label></div>
                    <div class="form-check"><input class="form-check-input" id="feDash" type="checkbox"><label
                            class="form-check-label small-muted" for="feDash">Dashcam</label></div>
                    <div class="form-check"><input class="form-check-input" id="feCarplay" type="checkbox"><label
                            class="form-check-label small-muted" for="feCarplay">CarPlay/Android Auto</label></div>
                </div>

                <div class="d-grid gap-2 mt-2">
                    <button class="btn btn-primary">Apply Filters</button>
                    <button class="btn btn-outline-secondary">Clear All</button>
                </div>
            </aside>

            <!-- Main -->
            <main class="col-12 col-lg-9">
                <div class="p-2">
                    <div class="topbar mb-2">
                        <div>
                            <h5 class="mb-0">1 cars available <small class="small-muted">(0 standard, 1 PHC)</small>
                            </h5>
                            <div class="active-filters mt-2">
                                <div class="filter-pill">Private Hire</div>
                                <div class="filter-pill">Free Cancellation</div>
                                <a href="#" class="small-muted ms-2">Clear all filters</a>
                            </div>
                        </div>

                        <div class="d-flex align-items-center">
                            <div class="me-2 d-none d-md-flex gap-2">
                                <button class="toggle-btn" title="Recommended">Recommended ▾</button>
                            </div>
                            <div class="btn-group me-2" role="group" aria-label="view toggle">
                                <button class="btn btn-light toggle-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-list"
                                        viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                    </svg></button>
                                <button class="btn btn-light toggle-btn"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-map"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.817.113a.5.5 0 0 0-.56-.041L10 2.5 5.223.072a.5.5 0 0 0-.446 0L.182 2.145A.5.5 0 0 0 0 2.59v12.667a.5.5 0 0 0 .683.47L5 13.5l4.777 2.428a.5.5 0 0 0 .446 0l4.595-2.072A.5.5 0 0 0 15 13.41V.5a.5.5 0 0 0-.183-.387z" />
                                    </svg></button>
                            </div>
                        </div>
                    </div>

                    <!-- Car Card -->
                    <div class="car-card">
                        <img src="/mnt/data/a15def2d-ad87-45f5-a323-5fbf3e71991b.png" alt="car" class="car-image">

                        <div class="car-meta flex-grow-1">
                            <div class="tags">
                                <div class="tag">Private Hire</div>
                                <div class="tag">Free Cancellation</div>
                            </div>

                            <div class="d-flex align-items-start justify-content-between">
                                <div>
                                    <div class="title">Toyota Auris <span class="badge rounded-pill"
                                            style="background:#ffddcc;color:#9a4a00;font-weight:600">★ 4.5</span></div>
                                    <div class="subtitle">Private Hire Vehicle</div>
                                </div>
                                <div class="small-muted text-end">From:</div>
                            </div>

                            <div class="row mt-3 small-muted">
                                <div class="col-6 col-md-3">👥 5 Seats</div>
                                <div class="col-6 col-md-3">🧳 2 Bags</div>
                                <div class="col-6 col-md-3">⚙️ Automatic</div>
                                <div class="col-6 col-md-3">⛽ Petrol</div>
                            </div>

                            <div class="mt-2 small-muted"> <span class="pill-green">Min 3 month(s)</span> · <span
                                    style="color:#2f8f4f;font-weight:600">Free Cancellation</span></div>
                            <div class="mt-2"><a href="#" class="small-muted">Important info & rental terms</a>
                            </div>
                        </div>

                        <div class="price-box">
                            <div class="mb-2 small-muted text-end">Weekly/Monthly rates available</div>
                            <div class="price">£23 <span class="small-muted" style="font-weight:600;font-size:12px">per
                                    week</span></div>
                            <div class="mt-2 deposit">
                                <div class="small-muted">Deposit</div>
                                <input class="form-control form-control-sm mt-1" value="£200">
                            </div>
                            <div class="mt-3 d-grid">
                                <button class="btn" style="background:var(--accent);color:#fff" data-bs-toggle="modal" data-bs-target="#phvModal">View Options</button>
                            </div>
                        </div>
                    </div>

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
                    <a class="btn btn-primary px-4" href="{{ route('private_hire_single', 1) }}">
                        I Understand & Continue
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection
