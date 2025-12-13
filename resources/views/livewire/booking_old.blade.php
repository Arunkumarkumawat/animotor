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
                            <label for="bcheckbok">
                                Drop car off at different location?
                            </label>
                            <input class="form-check-input" wire:model="aged"
                                wire:change="updateAged($event.target.checked)" type="checkbox" value=""
                                id="bcheckbok1">
                            <label for="bcheckbok1">
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
</div>
@push('scripts')
    <script>
        window.addEventListener('booking-error', e => {
            alert(e.detail.message)
        });
    </script>
@endpush
