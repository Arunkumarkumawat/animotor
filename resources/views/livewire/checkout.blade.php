<div class="col-xxl-8 col-xl-8 col-lg-8">
    @if ($car->cancellation_policy == 0)
        <div class="alert alert-danger alert-dismissible mb-4">
            <p>No Cancellation Allowed</p>
        </div>
    @else
        <div class="alert alert-success alert-dismissible mb-4">
            <h6><i class="fa fa-info-circle"></i> What if my plans change?</h6>
            <p>Cancel at least {{ $car->cancellation_policy }} hours before pick-up to get a full refund.</p>
        </div>
    @endif

    <div class="carferrari__item mb__30 car_item d-flex-  bgwhite p-3">
        <div class="row d-flex p__10 align-items-center car_section">
            <a href="#0" class="thumb col-sm-12 col-md-5">
                <img src="{{ $car?->image }}" class="img-fluid" alt="cars" />
            </a>
            <div class="carferrari__content col-md-6 col-sm-12">
                <div class="d-flex- carferari__box justify-content-between">

                    <div class="row">
                        <div class="col-12 mb-2">
                            <h4>
                                {{ $car->title }}
                                <div class="dropdown" style="display:inline">
                                    <button class="btn btn-link" style="text-decoration: none;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        or similar car
                                    </button>
                                    <div class="dropdown-menu" style="min-width: 300px;background: #2d2b2b;">
                                        <h6 class="dropdown-header text-white">What does "or similar" mean?</h6>
                                        <p class="p-2 text-white">When you book a car, you can expect to receive a car that is similar to the one you booked. This means that the car will have the same make, model, and year as the one you booked, but it may not be exactly the same car. This is because the car may have been sold or may have been replaced by a newer model.</p>
                                    </div>
                                </div>
                            </h4>
                        </div>

                        <div class="col-6 mt-2">
                            <p><img src="/assets/img/icons/profile.png" />
                                {{ $car->seats }} seats </p>
                        </div>

                        <div class="col-6 mt-2">
                            <p><img src="/assets/img/icons/gear.png" />
                                {{ $car->gear }}</p>
                        </div>

                        <div class="col-6 mt-2">
                            <p><img src="/assets/img/icons/bag.png" />
                                {{ $car->bags ?? '1' }} bag</p>
                        </div>

                        @if ($car->mileage_policy)
                            <div class="col-6 mt-2">
                                <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20px">
                                        <path
                                            d="M9.75 15.292v-.285a2.25 2.25 0 0 1 4.5 0v.285a.75.75 0 0 0 1.5 0v-.285a3.75 3.75 0 1 0-7.5 0v.285a.75.75 0 0 0 1.5 0M13.54 5.02l-2.25 6.75a.75.75 0 0 0 1.424.474l2.25-6.75a.75.75 0 1 0-1.424-.474M6.377 6.757a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m12.75 3.75a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m-1.496-3.75a1.125 1.125 0 1 0 1.119 1.131v-.006c0-.621-.504-1.125-1.125-1.125a.75.75 0 0 0 0 1.5.375.375 0 0 1-.375-.375V7.88a.375.375 0 1 1 .373.377.75.75 0 1 0 .008-1.5m-8.254-3a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5M21.88 17.541a16.5 16.5 0 0 0-19.76 0 .75.75 0 1 0 .898 1.202 15 15 0 0 1 17.964 0 .75.75 0 1 0 .898-1.202m.62-5.534c0 5.799-4.701 10.5-10.5 10.5s-10.5-4.701-10.5-10.5 4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5m1.5 0c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12m-19.123-1.5a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5">
                                        </path>
                                    </svg>
                                    {{ $car->mileage_policy == 'unlimited' ? '' : $car->mileage_limit }}
                                    {{ ucwords(str_replace('_', ' ', $car->mileage_policy)) }}</p>
                            </div>
                        @endif

                        @if ($car->excess_mileage_rate)
                            <div class="col-6 mt-2">
                                <p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20px">
                                        <path
                                            d="M9.75 15.292v-.285a2.25 2.25 0 0 1 4.5 0v.285a.75.75 0 0 0 1.5 0v-.285a3.75 3.75 0 1 0-7.5 0v.285a.75.75 0 0 0 1.5 0M13.54 5.02l-2.25 6.75a.75.75 0 0 0 1.424.474l2.25-6.75a.75.75 0 1 0-1.424-.474M6.377 6.757a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m12.75 3.75a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5m-1.496-3.75a1.125 1.125 0 1 0 1.119 1.131v-.006c0-.621-.504-1.125-1.125-1.125a.75.75 0 0 0 0 1.5.375.375 0 0 1-.375-.375V7.88a.375.375 0 1 1 .373.377.75.75 0 1 0 .008-1.5m-8.254-3a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5M21.88 17.541a16.5 16.5 0 0 0-19.76 0 .75.75 0 1 0 .898 1.202 15 15 0 0 1 17.964 0 .75.75 0 1 0 .898-1.202m.62-5.534c0 5.799-4.701 10.5-10.5 10.5s-10.5-4.701-10.5-10.5 4.701-10.5 10.5-10.5 10.5 4.701 10.5 10.5m1.5 0c0-6.627-5.373-12-12-12s-12 5.373-12 12 5.373 12 12 12 12-5.373 12-12m-19.123-1.5a1.125 1.125 0 1 0 0 2.25 1.125 1.125 0 0 0 0-2.25.75.75 0 0 0 0 1.5.375.375 0 1 1 0-.75.375.375 0 0 1 0 .75.75.75 0 0 0 0-1.5">
                                        </path>
                                    </svg> Excess {{ $car->excess_mileage_rate }} per mile</p>
                            </div>
                        @endif
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-12">
                            <p class="text-primary text-truncate"><a
                                    href="">{{ $car?->pickup ? $car?->pickup[0]['location'] : 'Pick-up Not set' }}</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-between">
            <div class="col-12 col-md-6">
                <div class="d-flex align-items-center">
                    <img style="max-height: 45px; margin-right:8px;"
                        src="{{ $car?->company?->logo ?? '/assets/img/icons/compony.png' }}"
                        alt="{{ $car?->company->name }}">
                    <div class="review_count">
                        0.0
                    </div>
                    <div class="review_text" data-bs-toggle="offcanvas" href="#offcanvasExample">
                        <p>Good</p>
                        <p>No review yet</p>
                    </div>
                </div>
            </div>

            {{--                            Important Info --}}
            <div class="col-12 col-md-6 d-flex justify-content-end">
                
            </div>
        </div>
    </div>

    <div class="car__driverdetails mb__40">
        <h5 class="dtext border__bottom pb__24">
            Main driver's details
        </h5>
        <p>As they appear on driving license</p>
        <form method="post" wire:submit="checkout" class="signup__form pt__40">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row g-4 justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="fname">First Name</label>
                        <input wire:model="first_name" class="form-control form-control-lg" type="text"
                            id="fname" placeholder="Enter First Name">
                    </div>
                    @error('first_name')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="last">Last Name</label>
                        <input wire:model="last_name" class="form-control form-control-lg" type ="text" id="last"
                            placeholder="Enter Last Name">
                    </div>
                    @error('last_name')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="phone">Contact Number</label>
                        <input wire:model="phone" class="form-control form-control-lg" type="text" id="phone"
                            placeholder="Enter Phone Number">
                    </div>
                    @error('phone')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label>Country</label>
                        <select wire:model="country" class="form-control form-control-lg">
                            @foreach ($countries as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('country')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="address">City</label>
                        <input wire:model="city" class="form-control form-control-lg" type="text" id="city"
                            placeholder="Enter city">
                    </div>
                    @error('city')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="address">Address</label>
                        <input wire:model="address" class="form-control form-control-lg" type="text"
                            id="address" placeholder="Enter Address">
                    </div>
                    @error('address')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="zipcode">ZIP Code</label>
                        <input wire:model="zipcode" class="form-control form-control-lg" type="text"
                            id="zipcode" placeholder="Enter ZIP Code">
                    </div>
                    @error('zipcode')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
            </div>

            <h5 class="dtext border__bottom pt-4 pb-4">
                Billing details
            </h5>

            <div class="row g-4 justify-content-center">
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="fname">First Name</label>
                        <input wire:model="billing.first_name" class="form-control form-control-lg" type="text"
                            id="fname" placeholder="Enter First Name">
                    </div>
                    @error('billing.first_name')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="last">Last Name</label>
                        <input wire:model="billing.last_name" class="form-control form-control-lg" type ="text" id="last"
                            placeholder="Enter Last Name">
                    </div>
                    @error('billing.last_name')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="phone">Contact Number</label>
                        <input wire:model="billing.phone" class="form-control form-control-lg" type="text" id="phone"
                            placeholder="Enter Phone Number">
                    </div>
                    @error('billing.phone')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label>Country</label>
                        <select wire:model="billing.country" class="form-control form-control-lg">
                            @foreach ($countries as $item)
                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('billing.country')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="address">City</label>
                        <input wire:model="billing.city" class="form-control form-control-lg" type="text" id="city"
                            placeholder="Enter city">
                    </div>
                    @error('billing.city')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="address">Address</label>
                        <input wire:model="billing.address" class="form-control form-control-lg" type="text"
                            id="address" placeholder="Enter Address">
                    </div>
                    @error('billing.address')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div class="input__grp">
                        <label for="zipcode">ZIP Code</label>
                        <input wire:model="billing.zipcode" class="form-control form-control-lg" type="text"
                            id="zipcode" placeholder="Enter ZIP Code">
                    </div>
                    @error('billing.zipcode')
                        <div class="error"><span class="text-danger">{{ $message }}</span></div>
                    @enderror
                </div>

                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="input__grp">
                        <p for="address">Is this business booking?</p>
                        <input wire:model="is_business" type="radio" name="is_business" value="yes"> Yes
                        <input wire:model="is_business" type="radio" name="is_business" value="no"> No
                    </div>
                </div>
            </div>

            @guest()
                <div class="row mt-5">
                    <div class="col-12 mb-3">
                        <p class="text-heading">Create an account</p>
                        <p>enter email and password to create {{ settings('site_name') }} account</p>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="input__grp">
                            <label for="email">Email address</label>
                            <input class="form-control form-control-lg" wire:model="email" type="email" id="email"
                                placeholder="Enter Email">
                        </div>
                        @error('email')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="input__grp">
                            <label for="last">Password</label>
                            <input class="form-control form-control-lg" wire:model="password" type="password"
                                id="last" name="password" placeholder="Enter password">
                        </div>
                        @error('password')
                            <div class="error"><span class="text-danger">{{ $message }}</span></div>
                        @enderror
                    </div>
                </div>
            @endguest

            <div class="row">
                <div class="pt-5">
                    <div class="d-flex justify-content-between">
                        <p class="text-heading">Ready for some money-saving ideas?</p>
                    </div>
                    <div class="mt-3">
                        <p>
                            We can send you discounts and other car rental offers,
                            saving you even more money in the future.
                        </p>

                        <p class="mt-2">
                            <input type="checkbox" />
                            No thanks, count me out.
                        </p>
                        <p class="mt-2">
                            Our <a href="#" data-bs-toggle="modal" data-bs-target="#privacyModal">Privacy
                                Statement</a> tells you how to Subscribe .
                            It also explains how we use and protect your personal information.
                        </p>
                    </div>
                    
                    @if ($car->cancellation_policy > 0)
                        <div class="alert alert-success alert-dismissible my-4">
                            Cancel at least {{ $car->cancellation_policy }} hours before pick-up to get a full refund.
                        </div>
                    @endif

                    <div class="mt-3">
                        <p class="text-heading">Terms and conditions</p>
                        <p>
                        By clicking 'Book and pay', you are confirming that you have downloaded (where applicable), read, understood and accepted our <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#termsModal">Terms of service, Policy Terms and the Budget rental terms.</a>
                        </p>
                    </div>
                </div>
            </div>


            <div class="justify-content-end d-flex mt-3">
                <button type="submit" class="cmn__btn">
                    <span>
                        Book now
                    </span>
                </button>
            </div>

        </form>
    </div>

    {{-- Important text modal --}}
    <div class="modal fade" id="importantInfoModal{{ $car->id }}">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Important Information</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        @if ($car->important_text)
                            <tr>
                                <th>Important Information</th>
                                <td>{!! $car->important_text !!}</td>
                            </tr>
                        @endif
                        @if ($car->requirements)
                            <tr>
                                <th>Driver & License Requirements</th>
                                <td>{!! $car->requirements !!}</td>
                            </tr>
                        @endif
                        @if ($car->security_deposit)
                            <tr>
                                <th>Security Deposit</th>
                                <td>{!! $car->security_deposit !!}</td>
                            </tr>
                        @endif
                        @if ($car->damage_excess)
                            <tr>
                                <th>Damace Excess</th>
                                <td>{!! $car->damage_excess !!}</td>
                            </tr>
                        @endif
                        @if ($car->mileage_text)
                            <tr>
                                <th>Mileage Policy</th>
                                <td>{!! $car->mileage_text !!}</td>
                            </tr>
                        @endif
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
