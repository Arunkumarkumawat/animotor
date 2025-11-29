<style>
    /* Custom Font Family */
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
        /* Light gray background */
    }

    /* ---------------------------------- */
    /* EXECUTIVE CARD (Orange/Black) STYLES */
    /* ---------------------------------- */
    .gradient-executive {
        /* UPDATED: Changed the final color stop from almost black (#503700) to a richer, darker orange (#CC7A00). */
        background: linear-gradient(90deg, #ffb300 0%, #ff8c00 70%, #CC7A00 100%);
        color: #fff;
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.25);
        transition: transform 0.3s ease;
    }

    .gradient-executive:hover {
        transform: translateY(-5px);
    }

    .badge-premium {
        background-color: rgba(0, 0, 0, 0.2);
        color: #fff;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 50rem;
        /* pill shape */
    }

    /* ---------------------------------- */
    /* PRIVATE HIRE CARD (Purple) STYLES */
    /* ---------------------------------- */
    .gradient-private-hire {
        /* Mimics the vibrant purple gradient */
        background: linear-gradient(90deg, #5c3589 0%, #7d44c8 40%, #b366ff 100%);
        color: #fff;
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.25);
        position: relative;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .gradient-private-hire:hover {
        transform: translateY(-5px);
    }

    /* Subtle geometric pattern overlay using pseudo-element */
    .gradient-private-hire::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        /* Simple dotted/geometric pattern for effect */
        background-image: radial-gradient(circle at 15% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 0),
            radial-gradient(circle at 85% 50%, rgba(255, 255, 255, 0.1) 1px, transparent 0);
        background-size: 20px 20px;
        opacity: 0.4;
        z-index: 0;
    }

    /* Ensure content is above the pseudo-element pattern */
    .card-content {
        position: relative;
        z-index: 1;
    }

    /* Custom badge for the purple card */
    .badge-driver {
        background-color: rgba(255, 255, 255, 0.2);
        color: #fff;
        font-weight: 600;
        padding: 0.5rem 1rem;
        border-radius: 50rem;
    }

    /* Button styling for purple card */
    .btn-phv {
        background-color: #fff;
        /* White button */
        color: #6a1b9a;
        /* Deep purple text */
        font-weight: 600;
        border: none;
        padding: 0.75rem 2rem;
        border-radius: 0.75rem;
        transition: background-color 0.3s;
    }

    .btn-phv:hover {
        background-color: #f1f1f1;
        color: #6a1b9a;
    }

    /* Title size adjustments */
    .card-title {
        font-size: 2rem;
        font-weight: 800;
        line-height: 1.2;
        margin-top: 1rem;
        margin-bottom: 0.5rem;
    }
</style>

<div class="hotelbokking__categoris mt-3">
    <div class="container">

        @if ($has_request)
            <div class="hotelbooking__categoris__wrap mt-5">
                <div class="row booking-info">
                    <div class="col-md-4 col-sm-6 pickup-address">
                        <h6>Pick-up</h6>
                        <p>{{ $pick_up_location }}</p>
                        <span>Date &amp; time : {{ $pick_up_date }} : {{ $pick_up_time }}</span>
                    </div>
                    <div class="col-md-4 col-sm-6 drop-address">
                        <h6>Drop Off</h6>
                        <p>{{ $drop_off_location }}</p>
                        <span>Date &amp; time : {{ $drop_off_date }} : {{ $drop_off_time }}</span>
                    </div>

                    <div class="col-md-4 col-sm-6 d-flex justify-content-end align-items-center">


                        <button wire:click="toggleSearch" type="submit" class="cmn__btn">
                            <span>
                                Edit search
                            </span>
                        </button>


                    </div>
                </div>

            </div>
        @endif

        @if ($show_booking)

            <div class="hotelbooking__categoris__wrap mt-3">

                <div class="dating__body">
                    <h5 class="hoteltitle">
                        <strong>Book a car</strong>
                    </h5>
                    <form method="post" wire:submit="save">
                        <div class="dating__body">
                            <div class="dating__body__box justify-content-center">


                                <div class="search-box dating__item" @click.away="$wire.set('pickup_locations', [])">

                                    <input placeholder="Airport, City or Station" autocomplete="off" type='text'
                                        wire:model.live="pick_up_location" />

                                    @error('pick_up_location')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror

                                    <!-- Search result list -->
                                    @if (count($this->pickup_locations) > 0)
                                        <ul>
                                            @foreach ($this->pickup_locations as $item)
                                                <li
                                                    wire:click="selectLocation('{{ $item['place_id'] }}', '{{ $item['description'] }}', 'pick_up')">
                                                    @if ($item['type'] == 'city')
                                                        <svg style="width:24px; height:24px;"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path
                                                                d="M335.9 84.2C326.1 78.6 314 78.6 304.1 84.2L80.1 212.2C67.5 219.4 61.3 234.2 65 248.2C68.7 262.2 81.5 272 96 272L128 272L128 480L128 480L76.8 518.4C68.7 524.4 64 533.9 64 544C64 561.7 78.3 576 96 576L544 576C561.7 576 576 561.7 576 544C576 533.9 571.3 524.4 563.2 518.4L512 480L512 272L544 272C558.5 272 571.2 262.2 574.9 248.2C578.6 234.2 572.4 219.4 559.8 212.2L335.8 84.2zM464 272L464 480L400 480L400 272L464 272zM352 272L352 480L288 480L288 272L352 272zM240 272L240 480L176 480L176 272L240 272zM320 160C337.7 160 352 174.3 352 192C352 209.7 337.7 224 320 224C302.3 224 288 209.7 288 192C288 174.3 302.3 160 320 160z" />
                                                        </svg>
                                                    @elseif($item['type'] == 'airport')
                                                        <svg style="width:24px; height:24px;"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path
                                                                d="M404 207.9L204.7 104.2C196.7 100.1 187.4 99.4 179 102.5L137.9 117.5C127.6 121.2 124.1 133.9 130.8 142.5L232.3 270.4L132.1 306.8L72 270.2C65.8 266.4 58.2 265.7 51.3 268.1L35 274.1C25.6 277.5 21.6 288.6 26.7 297.2L80.3 389C95.9 415.7 128.4 427.4 157.4 416.8L170.3 412.1L170.3 412.1L568.7 267.1C597.8 256.5 612.7 224.4 602.2 195.3C591.7 166.2 559.5 151.3 530.4 161.8L404 207.9zM64.2 512C46.5 512 32.2 526.3 32.2 544C32.2 561.7 46.5 576 64.2 576L576.2 576C593.9 576 608.2 561.7 608.2 544C608.2 526.3 593.9 512 576.2 512L64.2 512z" />
                                                        </svg>
                                                    @else
                                                        <svg style="width:24px; height:24px;"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                            <path
                                                                d="M576 112C576 100.9 570.3 90.6 560.8 84.8C551.3 79 539.6 78.4 529.7 83.4L413.5 141.5L234.1 81.6C226 78.9 217.3 79.5 209.7 83.3L81.7 147.3C70.8 152.8 64 163.9 64 176L64 528C64 539.1 69.7 549.4 79.2 555.2C88.7 561 100.4 561.6 110.3 556.6L226.4 498.5L399.7 556.3C395.4 549.9 391.2 543.2 387.1 536.4C376.1 518.1 365.2 497.1 357.1 474.6L255.9 440.9L255.9 156.4L383.9 199.1L383.9 298.4C414.9 262.6 460.9 240 511.9 240C534.5 240 556.1 244.4 575.9 252.5L576 112zM512 288C445.7 288 392 340.8 392 405.9C392 474.8 456.1 556.3 490.6 595.2C502.2 608.2 521.9 608.2 533.5 595.2C568 556.3 632.1 474.8 632.1 405.9C632.1 340.8 578.4 288 512.1 288zM472 408C472 385.9 489.9 368 512 368C534.1 368 552 385.9 552 408C552 430.1 534.1 448 512 448C489.9 448 472 430.1 472 408z" />
                                                        </svg>
                                                    @endif &nbsp;
                                                    {{ $item['description'] }}
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </div>

                                @if ($this->diff_location)
                                    <div class="search-box dating__item"
                                        @click.away="$wire.set('drop_off_locations', []);">
                                        <input placeholder="Airport, City or Station" type='text'
                                            wire:model.live="drop_off_location" />


                                        @error('drop_off_location')
                                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                        @enderror


                                        <!-- Search result list -->
                                        @if (count($this->drop_off_locations) > 0)
                                            <ul>
                                                @foreach ($this->drop_off_locations as $item)
                                                    <li
                                                        wire:click="selectLocation('{{ $item['place_id'] }}', '{{ $item['description'] }}', 'drop_off')">
                                                        @if ($item['type'] == 'city')
                                                            <svg style="width:24px; height:24px;"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                                <path
                                                                    d="M335.9 84.2C326.1 78.6 314 78.6 304.1 84.2L80.1 212.2C67.5 219.4 61.3 234.2 65 248.2C68.7 262.2 81.5 272 96 272L128 272L128 480L128 480L76.8 518.4C68.7 524.4 64 533.9 64 544C64 561.7 78.3 576 96 576L544 576C561.7 576 576 561.7 576 544C576 533.9 571.3 524.4 563.2 518.4L512 480L512 272L544 272C558.5 272 571.2 262.2 574.9 248.2C578.6 234.2 572.4 219.4 559.8 212.2L335.8 84.2zM464 272L464 480L400 480L400 272L464 272zM352 272L352 480L288 480L288 272L352 272zM240 272L240 480L176 480L176 272L240 272zM320 160C337.7 160 352 174.3 352 192C352 209.7 337.7 224 320 224C302.3 224 288 209.7 288 192C288 174.3 302.3 160 320 160z" />
                                                            </svg>
                                                        @elseif($item['type'] == 'airport')
                                                            <svg style="width:24px; height:24px;"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                                <path
                                                                    d="M404 207.9L204.7 104.2C196.7 100.1 187.4 99.4 179 102.5L137.9 117.5C127.6 121.2 124.1 133.9 130.8 142.5L232.3 270.4L132.1 306.8L72 270.2C65.8 266.4 58.2 265.7 51.3 268.1L35 274.1C25.6 277.5 21.6 288.6 26.7 297.2L80.3 389C95.9 415.7 128.4 427.4 157.4 416.8L170.3 412.1L170.3 412.1L568.7 267.1C597.8 256.5 612.7 224.4 602.2 195.3C591.7 166.2 559.5 151.3 530.4 161.8L404 207.9zM64.2 512C46.5 512 32.2 526.3 32.2 544C32.2 561.7 46.5 576 64.2 576L576.2 576C593.9 576 608.2 561.7 608.2 544C608.2 526.3 593.9 512 576.2 512L64.2 512z" />
                                                            </svg>
                                                        @else
                                                            <svg style="width:24px; height:24px;"
                                                                xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 640 640"><!--!Font Awesome Free v7.1.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.-->
                                                                <path
                                                                    d="M576 112C576 100.9 570.3 90.6 560.8 84.8C551.3 79 539.6 78.4 529.7 83.4L413.5 141.5L234.1 81.6C226 78.9 217.3 79.5 209.7 83.3L81.7 147.3C70.8 152.8 64 163.9 64 176L64 528C64 539.1 69.7 549.4 79.2 555.2C88.7 561 100.4 561.6 110.3 556.6L226.4 498.5L399.7 556.3C395.4 549.9 391.2 543.2 387.1 536.4C376.1 518.1 365.2 497.1 357.1 474.6L255.9 440.9L255.9 156.4L383.9 199.1L383.9 298.4C414.9 262.6 460.9 240 511.9 240C534.5 240 556.1 244.4 575.9 252.5L576 112zM512 288C445.7 288 392 340.8 392 405.9C392 474.8 456.1 556.3 490.6 595.2C502.2 608.2 521.9 608.2 533.5 595.2C568 556.3 632.1 474.8 632.1 405.9C632.1 340.8 578.4 288 512.1 288zM472 408C472 385.9 489.9 368 512 368C534.1 368 552 385.9 552 408C552 430.1 534.1 448 512 448C489.9 448 472 430.1 472 408z" />
                                                            </svg>
                                                        @endif &nbsp;
                                                        {{ $item['description'] }}
                                                    </li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                @endif

                            </div>


                            <div class="dating__body__box justify-content-center mt-4">

                                <div class="dating__item dating__hidden-">
                                    <div class="input-group- date-input-container">
                                        <input wire:model.live="pick_up_date" class="form-control date- date-input"
                                            type="date" placeholder="Pick-up date" min="{{ date('Y-m-d') }}" />
                                        <span class="date-placeholder">Pick-up date</span>

                                        @error('pick_up_date')
                                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="dating__item select__border">
                                    <select class="nice-select" wire:model="pick_up_time">
                                        @foreach (listTime() as $time)
                                            <option value="{{ $time }}">
                                                {{ $time }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('pick_up_time')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>

                                <div class="dating__item dating__hidden-">
                                    <div id="datepicker2-" class="input-group- date-input-container">
                                        <input wire:model="drop_off_date" class="form-control date-input" type="date"
                                            placeholder="Drop-off date" min="{{ date('Y-m-d') }}" />
                                        <span class="date-placeholder">Drop-off date</span>

                                        @error('drop_off_date')
                                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="dating__item select__border">
                                    <select class="nice-select" wire:model="drop_off_time">

                                        @foreach (listTime(true) as $time => $time_f)
                                            <option value="{{ $time }}">
                                                {{ $time_f }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="dating__item">
                                    <button type="submit" class="cmn__btn">
                                        <span>
                                            Search Cars
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="boock__check mt__30">
                            <input class="form-check-input" wire:model="diff_location"
                                wire:change="updateDiffLocation($event.target.checked)" type="checkbox" value=""
                                id="bcheckbok">
                            <label class="form-check-label" for="bcheckbok">
                                Drop car off at different location?
                            </label>
                            <input class="form-check-input" wire:model="aged"
                                wire:change="updateAged($event.target.checked)" type="checkbox" value=""
                                id="bcheckbok1">
                            <label class="form-check-label" for="bcheckbok1">
                                Driver aged between 30 - 65?
                            </label>
                            @if ($aged)
                                <input type="number" wire:model="age" class="form-control" min="18"
                                    max="99" pattern="/[0-9]*/" placeholder="Age Number"
                                    style="max-width:250px; margin-left:20px;">
                            @endif
                        </div>
                    </form>
                </div>

            </div>
        @endif
    </div>


    <div class="container mb-5">
        <div class="row g-4 mb-4">

            <!-- CARD 1: EXECUTIVE CHAUFFEUR -->
            <div class="col-12">
                <div
                    class="p-4 p-md-5 rounded-4 gradient-executive d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                    <!-- Left Content -->
                    <div class="mb-4 mb-md-0 card-content w-100 me-md-4">
                        <span class="badge badge-premium mb-3 d-inline-flex align-items-center">
                            <!-- Star Icon (Inline SVG) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-star-fill me-2" viewBox="0 0 16 16">
                                <path
                                    d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.063.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            Premium Service
                        </span>

                        <h2 class="card-title">
                            <!-- Shield Icon (Inline SVG) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-shield-fill-check me-2 mb-1" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 0c-.69 0-1.843.265-2.928.707L1.535 4.1A10.64 10.64 0 0 0 0 8c0 2.686 1.488 4.673 2.913 5.578A14.28 14.28 0 0 0 8 16c2.585 0 4.194-.852 5.09-1.314.834-.413 1.7-1.135 1.7-1.897 0-.585-.63-.984-1.258-1.428A22.583 22.583 0 0 1 8 11.25a22.58 22.58 0 0 1-5.532-1.748C1.865 9.043 1.5 8.7 1.5 8c0-1.859 1.187-2.739 2.872-3.879L8 1.487l3.628 2.634C13.313 5.26 14.5 6.141 14.5 8c0 .7-.365 1.043-1.09.43A22.58 22.58 0 0 0 8 11.25a22.58 22.58 0 0 0-5.404-1.618C1.865 9.043 1.5 8.7 1.5 8c0-.462.196-.867.43-1.22l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.063.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z" />
                            </svg>
                            Executive Chauffeur Cars & Drivers
                        </h2>
                        <p class="lead fw-normal text-white-50 fs-6">Premium vehicles and verified drivers with
                            complete operator compliance.</p>
                    </div>

                    <!-- Right Button -->
                    <div class="card-content">
                        <button class="btn btn-dark btn-lg px-5 py-3 rounded-4 fw-bold shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.144.13.29.25.43.355l4.202 4.202a1 1 0 0 0 1.414-1.414l-4.202-4.202c-.105-.14-.225-.286-.355-.43zM7.5 12a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9" />
                            </svg>
                            Search Chauffeurs
                        </button>
                    </div>

                </div>
            </div>

            <!-- CARD 2: PRIVATE HIRE -->
            <div class="col-12">
                <div
                    class="p-4 p-md-5 rounded-4 gradient-private-hire mt-4 d-flex flex-column flex-md-row justify-content-between align-items-md-center">

                    <!-- Left Content -->
                    <div class="mb-4 mb-md-0 card-content w-100 me-md-4">
                        <span class="badge badge-driver mb-3 d-inline-flex align-items-center">
                            <!-- Driver Icon (Inline SVG) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                fill="currentColor" class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            For Drivers
                        </span>

                        <h2 class="card-title">
                            <!-- Briefcase/Luggage Icon (Inline SVG) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                fill="currentColor" class="bi bi-briefcase-fill me-2 mb-1" viewBox="0 0 16 16">
                                <path
                                    d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.037a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z" />
                                <path
                                    d="M14.5 6.425C14.07 7.218 12.87 8.5 8 8.5s-6.07-1.282-6.5-2.075V14.5a1.5 1.5 0 0 0 1.5 1.5h11a1.5 1.5 0 0 0 1.5-1.5V6.425z" />
                            </svg>
                            Private Hire / Public Hire Cars
                        </h2>
                        <p class="lead fw-normal text-light fs-6">PCO/PHV rentals, rent-to-buy options, and plated or
                            ready-to-plate vehicles.</p>
                        <p class="lead fw-bold text-light fs-6">Flexible weekly rates starting from <span
                                class="text-warning">£250/week</span></p>
                    </div>

                    <!-- Right Button -->
                    <div class="card-content">
                        <a href="{{ route('private_hire_list') }}" class="btn btn-phv btn-lg px-5 py-3 rounded-4 fw-bold shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                fill="currentColor" class="bi bi-search me-2" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.144.13.29.25.43.355l4.202 4.202a1 1 0 0 0 1.414-1.414l-4.202-4.202c-.105-.14-.225-.286-.355-.43zM7.5 12a4.5 4.5 0 1 1 0-9 4.5 4.5 0 0 1 0 9" />
                            </svg>
                            Search PHV Cars
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@push('scripts')
    <script>
        window.addEventListener('booking-error', e => {
            alert(e.detail.message)
        });
    </script>
@endpush
