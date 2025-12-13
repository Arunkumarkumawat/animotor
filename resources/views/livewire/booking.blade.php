<header class="hero">
    <div class="container">
        <div class="hero-grid">
            <div class="hero-copy">
                <h1>World-class vehicle marketplace — standard hire, PHV/PCO, and chauffeur.</h1>
                <p>
                    {{ settings('site_name') }} brings trusted suppliers into one place. Search quickly, compare clearly, and book with confidence —
                    whether you’re hiring for travel, driving private hire, or booking executive chauffeur service.
                </p>

                <div class="hero-cta">
                    <button class="btn" onclick="scrollToId('search')">
                        <svg class="ico"><use href="#i-search"/></svg>
                        Start searching
                    </button>
                    <button class="btn secondary" onclick="scrollToId('join')">
                        <svg class="ico"><use href="#i-building"/></svg>
                        Join as a business
                    </button>
                </div>

                <div class="badges" aria-label="Trust highlights">
                    <div class="badge green"><svg><use href="#i-check"/></svg> Verified suppliers</div>
                    <div class="badge blue"><svg><use href="#i-shield"/></svg> Secure payments</div>
                    <div class="badge orange"><svg><use href="#i-briefcase"/></svg> PHV/PCO compliance aware</div>
                </div>
            </div>

            <div class="search-card anchor" id="search" role="region" aria-label="Search widget">
                <div class="tabs" role="tablist" aria-label="Service tabs">
                    <div class="tab active" role="tab" aria-selected="true" data-tab="standard" style="min-width:100px;">
                        <svg style="width:16px;height:16px"><use href="#i-car"/></svg>
                        Standard Car Hire
                    </div>
                    <!--<div class="tab" role="tab" aria-selected="false" data-tab="phv">
                        <svg style="width:16px;height:16px"><use href="#i-briefcase"/></svg>
                        Private Hire <span class="pill pco">PCO/PHV</span>
                    </div>
                    <div class="tab" role="tab" aria-selected="false" data-tab="chauffeur">
                        <svg style="width:16px;height:16px"><use href="#i-crown"/></svg>
                        Chauffeur <span class="pill premium">Premium</span>
                    </div>-->
                </div>

                <div class="form-wrap">
                    <div class="info-banner" id="phvBanner">
                        <h4><svg><use href="#i-warning"/></svg> Private Hire Vehicles (PHV/PCO)</h4>
                        <p>For licensed drivers. Eligibility checks, deposit, and supplier terms may apply.</p>
                    </div>

                    <form id="standardForm" method="post" wire:submit="save">
                        <div class="">
                            <div class="field mb-2" @click.away="$wire.set('pickup_locations', [])">
                                <label for="pickup">Pickup location</label>
                                <div class="control">
                                    <svg><use href="#i-pin"/></svg>
                                    <input id="pickup" placeholder="e.g., Heathrow Airport" wire:model.live="pick_up_location" />
                                </div>
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
                                @error('pick_up_location')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>

                            @if ($this->diff_location)
                            <div class="field mb-2" id="dropField" @click.away="$wire.set('drop_off_locations', []);">
                                <label for="dropoff">Dropoff location</label>
                                <div class="control">
                                    <svg><use href="#i-pin"/></svg>
                                    <input id="dropoff" placeholder="e.g., Gatwick Airport" wire:model.live="drop_off_location" />
                                </div>
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
                                @error('drop_off_location')
                                    <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                @enderror
                            </div>
                            @endif

                            <div class="d-flex">
                                <div class="field mb-2 w-100">
                                    <label for="pickDate">Pickup date</label>
                                    <div class="control">
                                        <svg><use href="#i-calendar"/></svg>
                                        <input id="pickDate" type="date" wire:model.live="pick_up_date" min="{{ date('Y-m-d') }}" />
                                    </div>
                                    @error('pick_up_date')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>

                                <div class="field mb-2 w-100">
                                    <label for="pickTime">Pickup time</label>
                                    <div class="control">
                                        <svg><use href="#i-clock"/></svg>
                                        <select id="pickTime" class="form-control" wire:model="pick_up_time">
                                            @foreach (listTime() as $time)
                                                <option value="{{ $time }}">{{ $time }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pick_up_time')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex">
                                <div class="field mb-2 w-100">
                                    <label for="retDate">Return date</label>
                                    <div class="control">
                                        <svg><use href="#i-calendar"/></svg>
                                        <input id="retDate" type="date" min="{{ date('Y-m-d') }}" wire:model="drop_off_date" />
                                    </div>
                                    @error('drop_off_date')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>

                                <div class="field mb-2 w-100">
                                    <label for="retTime">Return time</label>
                                    <div class="control">
                                        <svg><use href="#i-clock"/></svg>
                                        <select id="retTime" class="form-control" wire:model="drop_off_time">
                                            @foreach (listTime() as $time)
                                                <option value="{{ $time }}">{{ $time }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('pick_up_time')
                                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="switch {{ $diff_location ? 'on' : '' }}" id="sameDropSwitch" onclick="toggleSwitch(this)">
                                <div class="toggle"></div>
                                <input type="checkbox" class="switch-checkbox d-none" wire:model="diff_location" wire:change="updateDiffLocation($event.target.checked)">
                                Different Drop-off location
                            </div>
                            <div class="switch {{ $aged ? 'on' : '' }}" id="ageSwitch" onclick="toggleSwitch(this)">
                                <div class="toggle"></div>
                                <input type="checkbox" class="switch-checkbox d-none" wire:model="aged" wire:change="updateAged($event.target.checked)">
                                Driver aged between 30 - 65 years
                            </div>
                            @if ($aged)
                                <div class="control w-100">
                                    <input type="number" wire:model="age" class="form-control" min="18"
                                        max="99" pattern="/[0-9]*/" placeholder="Driver Age"
                                        style="width:100%; margin-left:20px;">
                                </div>
                            @endif
                        </div>

                        <div class="actions">
                            <button type="reset" class="btn ghost">Reset</button>
                            <button class="btn" type="submit">
                                <svg class="ico"><use href="#i-search"/></svg>
                                Search 100+ vehicles
                            </button>
                        </div>
                    </form>
                    
                    <form id="phvForm" style="display:none;" onsubmit="return handleSearch(event,'phv')">
                        <div class="grid">
                            <div class="field mb-2" style="grid-column: span 2;">
                                <label for="phvLoc">Location for Hire</label>
                                <div class="control">
                                    <svg><use href="#i-pin"/></svg>
                                    <input id="phvLoc" placeholder="e.g., Greater London, Manchester" />
                                </div>
                            </div>
                            <div class="field mb-2">
                                <label for="phvDuration">Duration (Weeks)</label>
                                <div class="control">
                                    <svg><use href="#i-calendar"/></svg>
                                    <select id="phvDuration">
                                        <option>4 Weeks</option><option>8 Weeks</option><option>12 Weeks</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field mb-2">
                                <label for="phvStart">Start Date</label>
                                <div class="control">
                                    <svg><use href="#i-calendar"/></svg>
                                    <input id="phvStart" type="date" />
                                </div>
                            </div>
                        </div>
                        <p class="helper">PHV/PCO vehicles are usually hired weekly/monthly. Eligibility checks apply.</p>
                        <div class="actions">
                            <button class="btn ghost">Reset</button>
                            <button class="btn" type="submit">
                                <svg class="ico"><use href="#i-search"/></svg>
                                Search PHV/PCO
                            </button>
                        </div>
                    </form>
                    
                    <form id="chauffeurForm" style="display:none;" onsubmit="return handleSearch(event,'chauffeur')">
                        <div class="grid">
                            <div class="field mb-2" style="grid-column: span 2;">
                                <label for="chaufPickup">Pickup Address</label>
                                <div class="control">
                                    <svg><use href="#i-pin"/></svg>
                                    <input id="chaufPickup" placeholder="Full address or postcode" />
                                </div>
                            </div>
                            <div class="field mb-2" style="grid-column: span 2;">
                                <label for="chaufService">Service Type</label>
                                <div class="control">
                                    <svg><use href="#i-crown"/></svg>
                                    <select id="chaufService">
                                        <option>Airport Transfer (One-way)</option>
                                        <option>Full Day Hire (10h)</option>
                                        <option>Business Meeting</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field mb-2">
                                <label for="chaufDate">Service Date</label>
                                <div class="control">
                                    <svg><use href="#i-calendar"/></svg>
                                    <input id="chaufDate" type="date" />
                                </div>
                            </div>
                            <div class="field mb-2">
                                <label for="chaufTime">Service Time</label>
                                <div class="control">
                                    <svg><use href="#i-clock"/></svg>
                                    <input id="chaufTime" type="time" />
                                </div>
                            </div>
                            <div class="field mb-2" style="grid-column: span 2;">
                                <label for="chaufPassengers">No. of Passengers</label>
                                <div class="control">
                                    <svg><use href="#i-user"/></svg>
                                    <select id="chaufPassengers">
                                        <option>1-2 Passengers</option><option>3-4 Passengers</option><option>5+ Passengers</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="btn ghost">Reset</button>
                            <button class="btn" type="submit">
                                <svg class="ico"><use href="#i-search"/></svg>
                                Request Chauffeur Quote
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <style>
        .d-none {
            display:none;
        }

        .d-flex {
            display:flex;
        }

        .w-100 {
            width:100%;
        }

        .field {
            position:relative;
        }

        .mb-2 {
            margin-bottom:10px;
        }

        .field ul {
            z-index: 99;
            position: absolute;
            top: 80%;
            background: white;
            list-style-type: none;
            list-style-position: outside;
            padding: 10px;
            width: 100%;
            cursor: pointer;
            border: 1px solid #eee;
            border-radius: 10px;
        }
    </style>
    @push('scripts')
        <script>
            window.addEventListener('booking-error', e => {
                alert(e.detail.message)
            });
        </script>
    @endpush
</header>