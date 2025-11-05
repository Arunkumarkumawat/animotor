<div class="nk-block nk-block-lg">
    <div class="nk-block-between g-3">
        <div class="nk-block-head-content ">
            <h4 class="title nk-block-title">{{ 'Editing ' .$car->title  }} {{ $this->currentStepName }}</h4>
            @if($step > 1)
                <h4 wire:click.prevent="goBack" class="title nk-block-title" style="cursor: pointer">
                    <img src="{{ asset('assets/img/icons/arrow-left.png') }}"/>
                    {{ $this->currentStepName }}
                </h4>
            @endif
        </div>

        <div class="nk-block-head-content">
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.cars.index') }}"
               wire:navigate class="btn btn-outline-light bg-white d-none d-sm-inline-flex"><em
                    class="icon ni ni-arrow-left"></em><span>Back</span></a>
            <a href="{{ request()->has('back_url') ? request()->get('back_url') : route('admin.cars.index') }}"
               wire:navigate class="btn btn-icon btn-outline-light bg-white d-inline-flex d-sm-none"><em
                    class="icon ni ni-arrow-left"></em></a>
        </div>
    </div>
    <div class="row g-gs">

        <div class="col-lg-12">
            <div class="card card-bordered- h-100">
                <div class="card-inner">

                    <form method="post" wire:submit="saveUpdate">
                        <div class="row">
                            <div class="step-form">
                                @foreach($steps as $item)
                                    @if($loop->index == 9)
                                    </div>
                                    <div class="step-form">
                                    @endif
                                    <div wire:key="{{ $item }}" wire:click.prevent="setStep({{ $loop->index + 1 }})"
                                        class="step {{ $step > $loop->index + 1 ? 'prev' : '' }} {{ $step == $loop->index + 1 ? 'active' : '' }}">
                                        @if($step > $loop->index + 1)
                                            <img class="step_img" src="{{ asset('admin/assets/images/mark.png') }}"
                                                style="height: 30px"/>
                                        @else
                                            <p>{{ $item }}</p>
                                        @endif
                                    </div>
                                @endforeach
                            </div>

                        </div>

                        @if(session()->has('success'))
                            <div class="alert alert-success">
                                {{ session()->get('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        {{--    {{ $step }}--}}

                        <div class="container">

                            @if($step == 1)
                                <div wire:key="1" class="row mt-3">

                                    <div class="col-md-4 mt-3">

                                        <div class="form-group">
                                            <label class="form-label" for="engine_size">Vehicle name</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="title" type="text"
                                                       class="form-control @error('title') error @enderror  form-control-xl"
                                                       id="title" maxlength="20" />
                                                @error("title") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>

                                    </div>
                                    
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="top_pick">Top Pick</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="top_pick" 
                                                           wire:model.live="top_pick"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="top_pick">
                                                        {{ $top_pick ? 'Yes' : 'No' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="ideal_for_family">Ideal for Family</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="ideal_for_family" 
                                                           wire:model.live="ideal_for_family"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="ideal_for_family"> {{ $ideal_for_family ? 'Yes' : 'No' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="free_cancellation">Free cancellation up to 24 hours before pick-up</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="free_cancellation" 
                                                           wire:model.live="free_cancellation"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="free_cancellation"> {{ $free_cancellation ? 'Yes' : 'No' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="collision_damage_waiver">Collision Damage Waiver</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="collision_damage_waiver" 
                                                           wire:model.live="collision_damage_waiver"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="collision_damage_waiver"> {{ $collision_damage_waiver ? 'Yes' : 'No' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="theft_protection">Theft Protection</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="theft_protection" 
                                                           wire:model.live="theft_protection"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="theft_protection"> {{ $theft_protection ? 'Yes' : 'No' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="unlimited_mileage">Unlimited mileage</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="unlimited_mileage" 
                                                           wire:model.live="unlimited_mileage"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="unlimited_mileage"> {{ $unlimited_mileage ? 'Yes' : 'No' }}</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label-outlined-" for="private_hire">Private Hire</label>
                                            <div class="form-control-wrap">
                                                <div class="form-check form-switch">
                                                    <input type="checkbox" class="form-check-input" id="private_hire" 
                                                           wire:model.live="private_hire" 
                                                           wire:change="updatePrivateHire($event.target.checked ? 1 : 0)"
                                                           style="width: 3em; height: 1.5em;">
                                                    <label class="form-check-label ms-2" for="private_hire">
                                                        {{ $private_hire ? 'Yes' : 'No' }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    @if(\Auth::user()->hasRole("admin"))
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="commission_fee">Commission Fee (%)</label>

                                            <div class="form-control-wrap">
                                                <input wire:model="commission_fee" type="text"
                                                       class="form-control @error('commission_fee') error @enderror form-control-xl"
                                                       id="commission_fee" step="any" min="1" max="100" maxlength="5">
                                                @error("commission_fee") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="description">Vehicle Description (Max Characters: 200)</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-lg" id="description" wire:model="description" placeholder="Vehicle description" maxlength="200"></textarea>
                                                @error("description") <span
                                                    class="invalid">{{ $message }}</span>@enderror

                                            </div>
                                        </div>
                                    </div>

                                    @if($private_hire)
                                    <div class="row">
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label class="form-label" for="private_hire">Licensing Authority</label>
                                                <select class="form-control" name="licensing_authority" wire:model="licensing_authority">
                                                    <option value="">Select Licensing Authority</option>
                                                    <option value="Transport for London">Transport for London</option>
                                                    <option value="Manchester City Council">Manchester City Council</option>
                                                    <option value="Birmingham City Council">Birmingham City Council</option>
                                                    <option value="Leeds City Council">Leeds City Council</option>
                                                    <option value="Liverpool City Council">Liverpool City Council</option>
                                                    <option value="Newcastle City Council">Newcastle City Council</option>
                                                    <option value="Nottingham City Council">Nottingham City Council</option>
                                                    <option value="Salford City Council">Salford City Council</option>
                                                    <option value="Sheffield City Council">Sheffield City Council</option>
                                                    <option value="West Midlands City Council">West Midlands City Council</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>PHV Plate Number</label>
                                                <input type="text" wire:model="phv_plate_number" pattern="^[A-Za-z0-9]{4,20}$" class="form-control" placeholder="PHV Plate Number" maxlength="20">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group" wire:ignore>
                                                <label>PHV Expiry Date</label>
                                                <input type="text" data-type="date" wire:model="phv_expiry_date" class="form-control flatpickr" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group" wire:ignore>
                                                <label>H&R Insurance Expiry</label>
                                                <input type="text" data-type="date" wire:model="hr_insurance_expiry" class="form-control flatpickr" placeholder="YYYY-MM-DD">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>Plate Certificate</label>
                                                <input type="file" wire:model="plate_certificate_input" class="form-control" placeholder="Plate Certificate">
                                                @if($plate_certificate)
                                                    <a href="{{ $plate_certificate }}" target="_blank">View Plate Certificate</a>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>H&R Insurance Proof</label>
                                                <input type="file" wire:model="hr_insurance_proof_input" class="form-control" placeholder="H&R Insurance Proof">
                                                @if($hr_insurance_proof)
                                                    <a href="{{ $hr_insurance_proof }}" target="_blank">View H&R Insurance Proof</a>
                                                @endif
                                            </div>
                                        </div>                                                
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12 mt-2">
                                            <h6>Hire Types Enabled</h6>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" wire:model="short_term" value="1" wire:change="updateData('short_term', $event.target.checked)">
                                                    Short Term Flexible
                                                </label>
                                                <p>1 week - 3 months</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" wire:model="long_term" value="1" wire:change="updateData('long_term', $event.target.checked)">
                                                    Long Term
                                                </label>
                                                <p>3 months+</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>
                                                    <input type="checkbox" wire:model="rent_to_buy" value="1" wire:change="updateData('rent_to_buy', $event.target.checked)">
                                                    Rent-to-Buy
                                                </label>
                                                <p>R2B Option</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if($short_term)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    <h6>Short Term Flexible Configuration</h6>
                                                    <p>Weekly Pricing with flexible terms upto 12 weeks.</p>
                                                </div>
                                                <div class="col-md-4 mt-3 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="minimum_term">Minimum Term</label>
                                                        <select wire:model="short_term_minimum_term" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="4">4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-3 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="maximum_term">Maximum Term</label>
                                                        <select wire:model="short_term_maximum_term" class="form-control" readonly>
                                                            <option value="12">Up to 12 weeks</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-3 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="pricing_cadence">Pricing Cadence</label>
                                                        <select wire:model="short_term_pricing_cadence" class="form-control" readonly>
                                                            <option value="weekly">Weekly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="weekly_price_wo_ins">Weekly Price (Without Insurance) {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="short_term_weekly_price_wo_ins" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="weekly_price_w_ins">Weekly Price (With Insurance) {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="short_term_weekly_price_w_ins" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="maintenance_included">
                                                            <input wire:model="short_term_maintenance_included" type="checkbox">
                                                            Maintenance Included
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="deposit">Deposit {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="short_term_deposit" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="excess_liability">Excess/Liability {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="short_term_excess_liability" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="early_return_fee">Early Return Fee {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="short_term_early_return_fee" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="notice_period_to_return">Notice Period to Return</label>
                                                        <input wire:model="short_term_notice_period_to_return" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="alert alert-info">
                                                        <p>Extensions are automatically allowed week-by-week up to 12 weeks total.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if($long_term)
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-12 mt-2">
                                                    <h6>Long Term Configuration</h6>
                                                    <p>3+ months with flexible pricing matrix</p>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="billing_cycle">Billing Cycle</label>
                                                        <select wire:model="long_term_billing_cycle" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="weekly">Weekly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quarterly">Quarterly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-3">
                                                    <div class="form-group">
                                                        <label class="form-label" for="default_deposit">Default Deposit {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="long_term_default_deposit" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-3">
                                                    <h5>Term Options</h5>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="long_term_term_options">
                                                            <input wire:model="long_term_term_options" type="checkbox" value="3m" wire:change="updateLttOptions($event.target.value, $event.target.checked  )">
                                                            3 Months
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="long_term_term_options">
                                                            <input wire:model="long_term_term_options" type="checkbox" value="6m" wire:change="updateLttOptions($event.target.value, $event.target.checked)">
                                                            6 Months
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="long_term_term_options">
                                                            <input wire:model="long_term_term_options" type="checkbox" value="9m" wire:change="updateLttOptions($event.target.value, $event.target.checked)">
                                                            9 Months
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="long_term_term_options">
                                                            <input wire:model="long_term_term_options" type="checkbox" value="12m" wire:change="updateLttOptions($event.target.value, $event.target.checked)">
                                                            12 Months
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-2 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label" for="long_term_term_options">
                                                            <input wire:model="long_term_term_options" type="checkbox" value="18m">
                                                            18 Months
                                                        </label>
                                                    </div>
                                                </div>

                                                <table class="table mt-2">
                                                    <thead>
                                                        <tr>
                                                            <th>Term</th>
                                                            <th>Price w/o Insurance</th>
                                                            <th>Price w/ Insurance</th>
                                                            <th>Maintenance Included?</th>
                                                            <th>Maintenance Type</th>
                                                            <th>Maintenance Price</th>
                                                            <th>Mileage</th>
                                                            <th>Excess Rate</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @if(in_array('3m', $long_term_term_options))
                                                        <tr>
                                                            <td>3 Months</td>
                                                            <td>
                                                                <input type="text"  min="1" wire:model="long_term_prices.3m.price_wo_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.3m.price_w_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" wire:model="long_term_prices.3m.maintenance_included" wire:change="updateMaintenanceField('3m', $event.target.checked)">
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['3m']) || !isset($long_term_prices['3m']['maintenance_included']) || !$long_term_prices['3m']['maintenance_included'])
                                                                    <select class="form-control" wire:model="long_term_prices.3m.maintenance_type">
                                                                        <option value="">Select</option>
                                                                        <option value="basic">Basic</option>
                                                                        <option value="full">Full</option>
                                                                    </select>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['3m']) || !isset($long_term_prices['3m']['maintenance_included']) || !$long_term_prices['3m']['maintenance_included'])
                                                                    <input type="text" min="1" wire:model="long_term_prices.3m.maintenance_price" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.3m.mileage" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.3m.excess_rate" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        @endif

                                                        @if(in_array('6m', $long_term_term_options))
                                                        <tr>
                                                            <td>6 Months</td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.6m.price_wo_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.6m.price_w_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" wire:model="long_term_prices.6m.maintenance_included" wire:change="updateMaintenanceField('6m', $event.target.checked)">
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['6m']) || !isset($long_term_prices['6m']['maintenance_included']) || !$long_term_prices['6m']['maintenance_included'])
                                                                    <select class="form-control" wire:model="long_term_prices.6m.maintenance_type">
                                                                        <option value="">Select</option>
                                                                        <option value="basic">Basic</option>
                                                                        <option value="full">Full</option>
                                                                    </select>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['6m']) || !isset($long_term_prices['6m']['maintenance_included']) || !$long_term_prices['6m']['maintenance_included'])
                                                                    <input type="text" min="1" wire:model="long_term_prices.6m.maintenance_price" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.6m.mileage" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.6m.excess_rate" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        @endif

                                                        @if(in_array('9m', $long_term_term_options))
                                                        <tr>
                                                            <td>9 Months</td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.9m.price_wo_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.9m.price_w_ins" class="form-control">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" wire:model="long_term_prices.9m.maintenance_included" wire:change="updateMaintenanceField('9m', $event.target.checked)" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['9m']) || !isset($long_term_prices['9m']['maintenance_included']) || !$long_term_prices['9m']['maintenance_included'])
                                                                    <select class="form-control" wire:model="long_term_prices.9m.maintenance_type">
                                                                        <option value="">Select</option>
                                                                        <option value="basic">Basic</option>
                                                                        <option value="full">Full</option>
                                                                    </select>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['9m']) || !isset($long_term_prices['9m']['maintenance_included']) || !$long_term_prices['9m']['maintenance_included'])
                                                                    <input type="text" min="1" wire:model="long_term_prices.9m.maintenance_price" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.9m.mileage" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.9m.excess_rate" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        @endif

                                                        @if(in_array('12m', $long_term_term_options))
                                                        <tr>
                                                            <td>12 Months</td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.12m.price_wo_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.12m.price_w_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" wire:model="long_term_prices.12m.maintenance_included" wire:change="updateMaintenanceField('12m', $event.target.checked)">
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['12m']) || !isset($long_term_prices['12m']['maintenance_included']) || !$long_term_prices['12m']['maintenance_included'])
                                                                    <select class="form-control" wire:model="long_term_prices.12m.maintenance_type">
                                                                        <option value="">Select</option>
                                                                        <option value="basic">Basic</option>
                                                                        <option value="full">Full</option>
                                                                    </select>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['12m']) || !isset($long_term_prices['12m']['maintenance_included']) || !$long_term_prices['12m']['maintenance_included'])
                                                                    <input type="text" min="1" wire:model="long_term_prices.12m.maintenance_price" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.12m.mileage" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.12m.excess_rate" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        @endif

                                                        @if(in_array('18m', $long_term_term_options))
                                                        <tr>
                                                            <td>18 Months</td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.18m.price_wo_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.18m.price_w_ins" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="checkbox" wire:model="long_term_prices.18m.maintenance_included" wire:change="updateMaintenanceField('18m', $event.target.checked)">
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['18m']) || !isset($long_term_prices['18m']['maintenance_included']) || !$long_term_prices['18m']['maintenance_included'])
                                                                    <select class="form-control" wire:model="long_term_prices.18m.maintenance_type">
                                                                        <option value="">Select</option>
                                                                        <option value="basic">Basic</option>
                                                                        <option value="full">Full</option>
                                                                    </select>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                @if(!isset($long_term_prices['18m']) || !isset($long_term_prices['18m']['maintenance_included']) || !$long_term_prices['18m']['maintenance_included'])
                                                                    <input type="text" min="1" wire:model="long_term_prices.18m.maintenance_price" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.18m.mileage" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                            <td>
                                                                <input type="text" min="1" wire:model="long_term_prices.18m.excess_rate" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                            </td>
                                                        </tr>
                                                        @endif
                                                    </tbody>
                                                </table>

                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Excess/Liability {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="long_term_excess_liability" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <label>
                                                            <input wire:model="long_term_vehicle_swap_allowed" type="checkbox">
                                                            Vehicle Swap Allowed
                                                        </label>
                                                    </div>
                                                </div>
                                                
                                                <div class="col-md-12 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Early Termination Rules</label>
                                                        <textarea wire:model="long_term_early_termination_rules" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif

                                    @if($rent_to_buy)
                                    <div class="card">
                                        <div class="card-body">
                                            <h5>Rent To Buy</h5>
                                            <div class="row">
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Term (Months)</label>
                                                        <input wire:model="rent_to_buy_term" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Billing Cycle</label>
                                                        <select wire:model="rent_to_buy_billing_cycle" class="form-control">
                                                            <option value="">Select</option>
                                                            <option value="weekly">Weekly</option>
                                                            <option value="monthly">Monthly</option>
                                                            <option value="quarterly">Quarterly</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Price Per Cycle {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="rent_to_buy_price_per_cycle" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Deposit Amount {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="rent_to_buy_deposit_amount" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Balloon Payment {{  settings('currency_symbol', '$')  }}</label>
                                                        <input wire:model="rent_to_buy_balloon_payment" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Payment Break Weeks/Year</label>
                                                        <input wire:model="rent_to_buy_payment_break_weeks_year" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Mileage Allowance (Per Cycle)</label>
                                                        <input wire:model="rent_to_buy_mileage_allowance_per_cycle" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">Excess Mileage Rate</label>
                                                        <input wire:model="rent_to_buy_excess_mileage_rate" type="text" min="1" class="form-control" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            <input wire:model="rent_to_buy_insurance_included" type="checkbox">
                                                            Insurance Included
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            <input wire:model="rent_to_buy_maintenance_included" type="checkbox">
                                                            Maintenance Included
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mt-2">
                                                    <div class="form-group">
                                                        <label class="form-label">
                                                            <input wire:model="rent_to_buy_ev_incentive_included" type="checkbox">
                                                            EV Incentive Included
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mt-2">
                                                    <div class="form-group">
                                                        <label>Ownership Transfer Notes</label>
                                                        <textarea wire:model="rent_to_buy_ownership_transfer_notes" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endif
                 
                            @if($step == 2)
                            <div style="margin-top: 10px; text-align: left; font-size: 20px;  font-weight: bold;">Enter pricing rates inclusive of all applicable taxes. </div>
                                <div wire:key="2" class="row">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            
                                            <div for="daily_rate" class="d-flex justify-content-between">
                                                
                                                <div>Daily Rate {{  settings('currency_symbol', '$')  }}</div>
                                                <div>
                                                    <div class="form-control-wrap">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="daily_rate_tax_incl" 
                                                                   wire:model.live="daily_rate_tax_incl"
                                                                   style="width: 3em; height: 1.5em; margin-top : -1px" disabled>
                                                            <label class="form-check-label ms-2" for="daily_rate_tax_incl">
                                                                {{ $daily_rate_tax_incl ? 'Tax Included' : 'Tax Excluded' }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" min="1" wire:model.live="daily_rate" name="daily_rate" class="form-control form-control-lg" data-ui="xl" id="daily_rate" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div for="weekly_rate" class="d-flex justify-content-between">
                                                <div>Weekly Rate {{  settings('currency_symbol', '$')  }}</div>
                                                <div>
                                                    <div class="form-control-wrap">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="weekly_rate_tax_incl" 
                                                                   wire:model.live="weekly_rate_tax_incl"
                                                                   style="width: 3em; height: 1.5em; margin-top : -1px" disabled>
                                                            <label class="form-check-label ms-2" for="weekly_rate_tax_incl">
                                                                {{ $weekly_rate_tax_incl ? 'Tax Included' : 'Tax Excluded' }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" min="1" wire:model.live="weekly_rate" name="weekly_rate" class="form-control form-control-lg" data-ui="xl" id="weekly_rate" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <div for="monthly_rate" class="d-flex justify-content-between">
                                                <div>Monthly Rate {{  settings('currency_symbol', '$')  }}</div>
                                                <div>
                                                    <div class="form-control-wrap">
                                                        <div class="form-check form-switch">
                                                            <input type="checkbox" class="form-check-input" id="monthly_rate_tax_incl" 
                                                                   wire:model.live="monthly_rate_tax_incl"
                                                                   style="width: 3em; height: 1.5em; margin-top : -1px" disabled>
                                                            <label class="form-check-label ms-2" for="monthly_rate_tax_incl">
                                                                {{ $monthly_rate_tax_incl ? 'Tax Included' : 'Tax Excluded' }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="text" min="1" wire:model.live="monthly_rate" name="monthly_rate" class="form-control form-control-lg" data-ui="xl" id="monthly_rate" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <hr>
                                        <h5>Dynamic Pricing</h5>
                                    </div>
                                    <div class="col-md-8 mt-3 table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Rule Name</th>
                                                    <th>Adjustment Type</th>
                                                    <th>Adjustment Value</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $adjustmentTypes = ['percentage_increase' => 'Percentage Increase', 'fixed_surcharge' => 'Fixed Surcharge', 'fixed_price' => 'Fixed Price']; @endphp
                                                @foreach($dynamic_pricings ?? [] as $pricing)
                                                <tr>
                                                    <td>{{ $pricing['rule_name'] }}</td>
                                                    <td>{{ $adjustmentTypes[$pricing['adjustment_type']] }}</td>
                                                    <td>{{ $pricing['adjustment_value'] }} {{ $pricing['adjustment_type'] == 'percentage_increase' ? '%' : settings('currency_symbol', '$')  }}</td>
                                                    <td>{{ $pricing['start_date'] }}</td>
                                                    <td>{{ $pricing['end_date'] }}</td>
                                                    <td>
                                                        <button type="button" wire:confirm="Are you sure?" wire:click="removeDynamicPricing({{ $loop->index }})" class="btn btn-danger">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @if(count($dynamic_pricings) == 0)
                                                <tr>
                                                    <td colspan="6" class="text-center">No dynamic pricing rules found</td>
                                                </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
                                            <div class="form-group">
                                                <label for="rule_name">Rule Name</label>
                                                <input type="text" wire:model.live="dynamic_pricing_rule_name" minlength="3" maxlength="100" name="rule_name" class="form-control form-control-lg" data-ui="xl" id="rule_name">
                                                @error("dynamic_pricing_rule_name") <span class="error">Rule name is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="adjustment_type">Adjustment Type</label>
                                                <select wire:model.live="dynamic_pricing_adjustment_type" name="adjustment_type" class="form-control form-control-lg" data-ui="xl" id="adjustment_type">
                                                    <option value="percentage_increase">Percentage Increase</option>
                                                    <option value="fixed_surcharge">Fixed Surcharge</option>
                                                    <option value="fixed_price">Fixed Price</option>
                                                </select>
                                                @error("dynamic_pricing_adjustment_type") <span class="error">Adjustment type is required</span> @enderror
                                            </div>
                                            @if($dynamic_pricing_adjustment_type == "percentage_increase")
                                            <div class="form-group">
                                                <label for="adjustment_value">Adjustment Value  %</label>
                                                <input type="text" min="1" max="100" wire:model.live="dynamic_pricing_adjustment_value" name="adjustment_value" class="form-control form-control-lg" data-ui="xl" id="adjustment_value" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                @error("dynamic_pricing_adjustment_value") <span class="error">Adjustment value is required</span> @enderror
                                            </div>
                                            @elseif($dynamic_pricing_adjustment_type == "fixed_surcharge" || $dynamic_pricing_adjustment_type == 'fixed_price')
                                            <div class="form-group">
                                                <label for="adjustment_value">Adjustment Value  {{  settings('currency_symbol', '$')  }}</label>
                                                <input type="text" min="1" wire:model.live="dynamic_pricing_adjustment_value" name="adjustment_value" class="form-control form-control-lg" data-ui="xl" id="adjustment_value" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                @error("dynamic_pricing_adjustment_value") <span class="error">Adjustment value is required</span> @enderror
                                            </div>
                                            @endif
                                            <div class="form-group" wire:ignore>
                                                <label for="start_date">Start Date</label>
                                                <input type="text" data-type="date" maxlength="20" wire:model="dynamic_pricing_start_date" name="start_date" class="form-control form-control-lg flatpickr" data-ui="xl" id="start_date" placeholder="YYYY-MM-DD">
                                                @error("dynamic_pricing_start_date") <span class="error">Start date is required</span> @enderror
                                            </div>
                                            <div class="form-group" wire:ignore>
                                                <label for="end_date">End Date</label>
                                                <input type="text" data-type="date" maxlength="20" wire:model="dynamic_pricing_end_date" name="end_date" class="form-control form-control-lg flatpickr" data-ui="xl" id="end_date" placeholder="YYYY-MM-DD">
                                                @error("dynamic_pricing_end_date") <span class="error">End date is required</span> @enderror
                                            </div>
                                            <div class="text-center">
                                                <button type="button" wire:click="addDynamicPricing" class="btn btn-primary">Add</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($step == 3)
                                <div class="row mt-3">
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="fuel_type">Fuel Type</label>
                                            <div class="form-control-wrap custom-select-wrapper">
                                                <select wire:model="fuel_type"
                                                        class="form-control form-control-lg" id="fuel_type" wire:change="updateData('fuel_type', $event.target.value)">
                                                    <option value="">Select Fuel Type</option>
                                                    @foreach($full_types as $item)
                                                        <option value="{{ $item }}">{{ $item }}</option>
                                                    @endforeach

                                                </select>
                                                
                                                <span class="select-icon"> <i class="fas fa-chevron-down"></i> </span>
                                                
                                                @error("fuel_type") <span class="invalid">{{ $message }}</span>@enderror

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="engine_size">@if($fuel_type == 'Electric') Battery @else Engine @endif size</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="engine_size" type="text"
                                                       class="form-control @error('engine_size') error @enderror  form-control-lg"
                                                       id="engine_size" maxlength="20"/>
                                                @error("engine_size") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($step == 4)
                                <div class="row mt-3">
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="mot.test_date">Test date</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="mots.test_date" type="text" data-type="date" class="form-control flatpickr @error('mots.test_date') error @enderror  form-control-xl"
                                                       id="mot.test_date" maxlength="20" placeholder="YYYY-MM-DD" />
                                                @error("mot.test_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="expiry_date">Expiry date</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="mots.expiry_date" type="text" data-type="date" class="form-control flatpickr @error('mots.expiry_date') error @enderror  form-control-xl"
                                                       id="expiry_date" placeholder="YYYY-MM-DD" />
                                                @error("mots.expiry_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="result">Result</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="mots.result"
                                                        class="form-select form-control form-control-lg " id="result">
                                                    <option value="pass">Pass</option>
                                                    <option value="fail">Fail</option>
                                                </select>
                                                @error("mots.result") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="details">Failure Details</label>
                                            <div class="form-control-wrap">
                                                <textarea class="form-control form-control-lg" id="details" wire:model="mots.details" maxlength="255"></textarea>
                                                @error("mots.details") <span class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="addMOT" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add MOT
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                @if(count($car->carExtra->mots) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>MOTS</h5>
                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.test_date') }}</th>
                                                <th>{{ __('admin.expiry_date') }}</th>
                                                <th>{{ __('admin.result') }}</th>
                                                {{--<th>{{ __('admin.next_service_mileage') }}</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->mots as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['test_date'] }}</td>
                                                    <td>{{ $item['expiry_date'] }}</td>
                                                    <td class="text-capitalize">{{ $item['result'] }}</td>
                                                    {{--<td>{{ $item['next_service_mileage'] }}</td>--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif
                            @endif

                            @if($step == 5)
                                <div class="row mt-3">

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="is_taxed">Is vehicle taxed</label>
                                            <div class="form-control-wrap">
                                                <select wire:model.live="is_taxed"
                                                        class="form-select form-control form-control-lg " id="is_taxed">
                                                    <option value="1">yes</option>
                                                    <option value="0">no</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    @if($is_taxed == 1)
                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="tax_expiry_date">Expiry Date</label>
                                                <div class="form-control-wrap" wire:ignore>
                                                    <input wire:model="tax_expiry_date" type="text" data-type="date" class="form-control flatpickr @error('tax_expiry_date') error @enderror  form-control-xl"
                                                           id="tax_expiry_date"  maxlength="20" placeholder="YYYY-MM-DD" />
                                                    @error("tax_expiry_date") <span
                                                        class="invalid">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="tax_type">Tax type</label>
                                                <div class="form-control-wrap">
                                                    <select wire:model="tax_type"
                                                            class="form-select form-control form-control-lg "
                                                            id="tax_type">
                                                        <option value="yearly">Yearly</option>
                                                        <option value="monthly">Monthly</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6 mt-3">
                                            <div class="form-group">
                                                <label class="form-label" for="tax_amount">Tax Amount {{  settings('currency_symbol', '$')  }}</label>
                                                <div class="form-control-wrap">
                                                    <input wire:model="tax_amount" type="text" step="any"
                                                           class="form-control @error('tax_amount') error @enderror  form-control-xl"
                                                           id="tax_amount"  pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                                                    @error("tax_amount") <span
                                                        class="invalid">{{ $message }}</span>@enderror
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            @endif

                            @if($step == 6)
                                <div class="row mt-3">

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="last_service_date">Last Service Date</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="service.last_service_date" type="text" data-type="date" class="form-control flatpickr @error('service.last_service_date') error @enderror  form-control-xl"
                                                       id="last_service_date" maxlength="20" placeholder="YYYY-MM-DD" />
                                                @error("service.last_service_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="next_service_date">Next Service Date</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="service.next_service_date" type="text" data-type="date" class="form-control flatpickr @error('service.next_service_date') error @enderror  form-control-xl"
                                                       id="next_service_date" maxlength="20" placeholder="YYYY-MM-DD" />
                                                @error("service.next_service_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="last_service_mileage">Last Service
                                                Mileage</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="service.last_service_mileage" type="text"
                                                       step="any"
                                                       class="form-control @error('service.last_service_mileage') error @enderror  form-control-xl"
                                                       id="last_service_mileage"  pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                                                @error("service.last_service_mileage") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="next_service_mileage">Next Service
                                                Mileage</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="service.next_service_mileage" type="text"
                                                       step="any"
                                                       class="form-control @error('service.next_service_mileage') error @enderror  form-control-xl"
                                                       id="next_service_mileage" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                                                @error("service.next_service_mileage") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="addService" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add
                                                    Service
                                                </button>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                @if(count($car->carExtra->service) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Service History</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.last_service_date') }}</th>
                                                <th>{{ __('admin.next_service_date') }}</th>
                                                <th>{{ __('admin.last_service_mileage') }}</th>
                                                <th>{{ __('admin.next_service_mileage') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->service as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['last_service_date'] }}</td>
                                                    <td>{{ $item['next_service_date'] }}</td>
                                                    <td>{{ $item['last_service_mileage'] }}</td>
                                                    <td>{{ $item['next_service_mileage'] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif
                            @endif

                            @if($step == 7)
                                <div class="mt-4">
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="driverName" class="form-label">Driver Name</label>
                                            <input type="text" class="form-control" id="driverName"
                                                   wire:model="driver.name" placeholder="John Doe" maxlength="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="driverPhoto" class="form-label">Photo</label>
                                            <input type="file" class="form-control" id="driverPhoto"
                                                   wire:model="driver.photo">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="yearsExperience" class="form-label">Years of Experience</label>
                                            <input type="text" class="form-control" id="yearsExperience"
                                                   wire:model="driver.years_experience" placeholder="15 years" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                        </div>
                                    </div>

                                    <!-- Experience -->
                                    <div class="row mb-3">
                                        <div class="col-md-4">
                                            <label for="specialSkills" class="form-label">Special Skills</label>
                                            <input type="text" class="form-control" id="specialSkills"
                                                   wire:model="driver.special_skills"
                                                   placeholder="Defensive driving, off-road driving" maxlength="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="primaryLanguage" class="form-label">Primary Language</label>
                                            <input type="text" class="form-control" id="primaryLanguage"
                                                   wire:model="driver.primary_language" placeholder="English" maxlength="20">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="additionalLanguages" class="form-label">Additional
                                                Languages</label>
                                            <input type="text" class="form-control" id="additionalLanguages"
                                                   wire:model="driver.additional_languages"
                                                   placeholder="Spanish, French" maxlength="20">
                                        </div>
                                    </div>

                                    <!-- Local Knowledge -->
                                    <div class="row mb-3">
                                        <div class="col-md-3">
                                            <label for="areaExpertise" class="form-label">Area Expertise</label>
                                            <input type="text" class="form-control" id="areaExpertise"
                                                   wire:model="driver.area_expertise" placeholder="New York City" maxlength="20">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="tourGuideExperience" class="form-label">Tour Guide
                                                Experience</label>
                                            <input type="text" class="form-control" id="tourGuideExperience"
                                                   wire:model="driver.tour_guide_experience" placeholder="5 years" maxlength="20">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="drivingLicenses" class="form-label">Driving Licenses</label>
                                            <input type="text" class="form-control" id="drivingLicenses"
                                                   wire:model="driver.driving_licenses"
                                                   placeholder="CDL, motorcycle license" maxlength="20">
                                        </div>
                                        <div class="col-md-3">
                                            <label for="certifications" class="form-label">Certifications</label>
                                            <input type="text" class="form-control" id="certifications"
                                                   wire:model="driver.certifications"
                                                   placeholder="First Aid Certified, Advanced Defensive Driving" maxlength="20">
                                        </div>
                                    </div>


                                    <!-- Reviews and Ratings -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label for="customerReviews" class="form-label">Customer Reviews</label>
                                                <textarea class="form-control" id="customerReviews" rows="4"
                                                          wire:model="driver.customer_reviews"
                                                          placeholder='"John was an excellent driver and guide..."'></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="overallRating" class="form-label">Overall Rating</label>
                                                <input type="text" class="form-control" id="overallRating"
                                                       wire:model="driver.overall_rating"
                                                       placeholder="★★★★☆ (4.8 out of 5)" maxlength="20">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Availability -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="workHours" class="form-label">Work Hours</label>
                                            <input type="text" class="form-control" id="workHours"
                                                   wire:model="driver.work_hours" placeholder="8:00 AM to 8:00 PM">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="daysOff" class="form-label">Days Off</label>
                                            <input type="text" class="form-control" id="daysOff"
                                                   wire:model="driver.days_off"
                                                   placeholder="Sundays and public holidays" maxlength="20">
                                        </div>
                                    </div>

                                    <!-- Contact Information -->
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <label for="phoneNumber" class="form-label">Phone Number</label>
                                            <input type="tel" class="form-control" id="phoneNumber"
                                                   wire:model="driver.phone_number" placeholder="(555) 123-4567">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="emailAddress" class="form-label">Email Address</label>
                                            <input type="email" class="form-control" id="emailAddress"
                                                   wire:model="driver.email_address" placeholder="john.doe@example.com">
                                        </div>
                                    </div>

                                    <!-- Terms and Conditions -->
                                    <h4 class="mt-4">Terms and Conditions</h4>

                                    <div class="mb-3">
                                        <label for="workingHours" class="form-label">Driver's Working Hours</label>
                                        <textarea class="form-control" id="workingHours" rows="3"
                                                  wire:model="driver.working_hours"
                                                  placeholder="Standard Hours, Overtime..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="driverBreaks" class="form-label">Driver Breaks</label>
                                        <textarea class="form-control" id="driverBreaks" rows="3"
                                                  wire:model="driver.driver_breaks"
                                                  placeholder="Mandatory Breaks, Extended Trips..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="accommodation" class="form-label">Accommodation for Overnight
                                            Stays</label>
                                        <textarea class="form-control" id="accommodation" rows="3"
                                                  wire:model="driver.accommodation"
                                                  placeholder="Customer Responsibility, Additional Charges..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="food" class="form-label">Driver’s Food</label>
                                        <textarea class="form-control" id="food" rows="3" wire:model="driver.food"
                                                  placeholder="During Standard Hours, Overtime and Overnight..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="tollTax" class="form-label">Toll Tax</label>
                                        <textarea class="form-control" id="tollTax" rows="3"
                                                  wire:model="driver.toll_tax"
                                                  placeholder="Customer Responsibility, Reimbursement..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dropoffLocation" class="form-label">Drop-off Location</label>
                                        <textarea class="form-control" id="dropoffLocation" rows="3"
                                                  wire:model="driver.dropoff_location"
                                                  placeholder="Different Drop-off Location..."></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="miscellaneous" class="form-label">Miscellaneous</label>
                                        <textarea class="form-control" id="miscellaneous" rows="3"
                                                  wire:model="driver.miscellaneous"
                                                  placeholder="Traffic Violations, Personal Belongings, Cancellation Policy..."></textarea>
                                    </div>
                                </div>

                            @endif

                            @if($step == 8)
                                <div class="row">
                                    <div class="col-12 mb-2 mt-2">
                                        <h6>Extras (Booking addons)</h6>
                                    </div>

                                    <div class="col-8 mt-2">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Interval</th>
                                                    <th>Price  {{  settings('currency_symbol', '$')  }}</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($car->extras as $index => $extra)
                                                <tr>
                                                    <td>{{ $extra['title'] }}</td>
                                                    <td>{{ $extra['description'] ?? 'N/A' }}</td>
                                                    <td>{{ $extra['interval'] ?? 'daily' }}</td>
                                                    <td>{{ amt($extra['price']) }}</td>
                                                    <td>
                                                        <button type="button" wire:key="remove-{{ $index }}" class="btn btn-warning" wire:confirm="Are you sure?" wire:click="removeExtra({{ $index }})">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
                                            <div class="form-group">
                                                <input class="form-control  form-control-lg" type="text" wire:model="extras.title" placeholder="Title" maxlength="50">
                                                @error("extras.title") <span class="error">This title is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control  form-control-lg" type="text" wire:model="extras.description" placeholder="Description" maxlength="200">
                                                @error("extras.description") <span class="error">This description is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" min="1" type="text" wire:model="extras.price" placeholder="Price {{  settings('currency_symbol', '$')  }}" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                @error("extras.price") <span class="error">This price is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control form-control-lg select2" wire:model="extras.interval" placeholder="Interval">
                                                    <option value="">Select Interval</option>
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="one_time">One Time</option>
                                                </select>
                                                @error("extras.interval") <span class="error">This interval is required</span> @enderror
                                            </div>
                                            <div class="form-group mt-3">
                                                <button type="button" wire:click.prevent="addExtras" class="btn btn-lg btn-success">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($step == 9)
                                <div class="row mt-3">
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="requirements">Booking requirements </label>
                                            <div class="form-control-wrap" 
                                                x-data="{
                                                    initSummernote: function() {
                                                        $('#requirements').summernote({
                                                            height: 200,
                                                            callbacks: {
                                                                onChange: function(contents, $editable) {
                                                                    // Crucial: Push the content back to the Livewire property
                                                                    @this.set('requirements', contents);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }" x-init="initSummernote()"
                                                wire:ignore
                                            >
                                                <textarea class="form-control form-control-lg" id="requirements" wire:model="requirements" placeholder="Enter requirements" x-ref="editor">{{ $requirements }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="security_deposit">Security Deposit
                                                Message</label>
                                            <div class="form-control-wrap" 
                                                x-data="{
                                                    initSummernote: function() {
                                                        $('#security_deposit').summernote({
                                                            height: 200,
                                                            callbacks: {
                                                                onChange: function(contents, $editable) {
                                                                    // Crucial: Push the content back to the Livewire property
                                                                    @this.set('security_deposit', contents);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }" x-init="initSummernote()"
                                                wire:ignore
                                            >
                                                <textarea class="form-control form-control-lg" id="security_deposit" wire:model="security_deposit" placeholder="Enter security_deposit" x-ref="editor">{{ $security_deposit }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="damage_excess">Damage Excess info</label>
                                            <div class="form-control-wrap"
                                                x-data="{
                                                    initSummernote: function() {
                                                        $('#damage_excess').summernote({
                                                            height: 200,
                                                            callbacks: {
                                                                onChange: function(contents, $editable) {
                                                                    // Crucial: Push the content back to the Livewire property
                                                                    @this.set('damage_excess', contents);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }" x-init="initSummernote()"
                                                wire:ignore>
                                                <textarea class="form-control form-control-lg" id="damage_excess" wire:model="damage_excess" placeholder="Enter damage excess" x-ref="editor">{{ $damage_excess }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="mileage_text">Mileage text info</label>
                                            <div class="form-control-wrap"
                                                x-data="{
                                                    initSummernote: function() {
                                                        $('#mileage_text').summernote({
                                                            height: 200,
                                                            callbacks: {
                                                                onChange: function(contents, $editable) {
                                                                    // Crucial: Push the content back to the Livewire property
                                                                    @this.set('mileage_text', contents);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }" x-init="initSummernote()"
                                                wire:ignore>
                                                <textarea class="form-control form-control-lg" id="mileage_text" wire:model="mileage_text" placeholder="Enter mileage text" x-ref="editor">{{ $mileage_text }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mb-2">
                                        <div class="form-group">
                                            <label class="form-label" for="important_text">Important Text</label>
                                            <div class="form-control-wrap"
                                                x-data="{
                                                    initSummernote: function() {
                                                        $('#important_text').summernote({
                                                            height: 200,
                                                            callbacks: {
                                                                onChange: function(contents, $editable) {
                                                                    // Crucial: Push the content back to the Livewire property
                                                                    @this.set('important_text', contents);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }" x-init="initSummernote()"
                                                wire:ignore>
                                                <textarea class="form-control form-control-lg" id="important_text" wire:model="important_text" placeholder="Enter important text for booking" x-ref="editor">{{ $important_text }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if($step == 10)
                                <div class="my-3">
                                    <h4 class="text-center">Documents</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.document_type">{{ __('admin.document_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.document_type" type="text"
                                                       class="form-control @error('document.document_type') error @enderror  form-control-xl"
                                                       id="document.document_type" maxlength="20"/>
                                                @error("document.document_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.document_name">{{ __('admin.document_name') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.document_name" type="text"
                                                       class="form-control @error('document.document_name') error @enderror  form-control-xl"
                                                       id="document.document_name" maxlength="20"/>
                                                @error("document.document_name") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.upload_date">{{ __('admin.upload_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="document.upload_date" type="text" data-type="date" class="form-control flatpickr @error('document.upload_date') error @enderror  form-control-xl"
                                                       id="document.upload_date" placeholder="YYYY-MM-DD" />
                                                @error("document.upload_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.expiry_date">{{ __('admin.expiry_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="document.expiry_date" type="text" data-type="date" class="form-control flatpickr @error('document.expiry_date') error @enderror  form-control-xl"
                                                       id="document.expiry_date" placeholder="YYYY-MM-DD" />
                                                @error("document.expiry_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.action_type">{{ __('admin.action_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.action_type" type="text"
                                                       class="form-control @error('document.action_type') error @enderror  form-control-xl"
                                                       id="document.action_type" maxlength="20"/>
                                                @error("document.action_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="document.action_date">{{ __('admin.action_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="document.action_date" type="text" data-type="date" class="form-control flatpickr @error('document.action_date') error @enderror  form-control-xl"
                                                       id="document.action_date" placeholder="YYYY-MM-DD" />
                                                @error("document.action_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="document.file">{{ __('admin.file') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="document.file" type="file"
                                                       class="form-control @error('document.file') error @enderror  form-control-xl"
                                                       id="document.file"/>
                                                @error("document.file") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="updateDocument" type="button"
                                                        class="btn btn-lg btn-primary  text-center">
                                                    Add Document
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @if(count($car->carExtra->documents) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Documents</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.document_type') }}</th>
                                                <th>{{ __('admin.document_name') }}</th>
                                                <th>{{ __('admin.upload_date') }}</th>
                                                <th>{{ __('admin.expiry_date') }}</th>
                                                <th>{{ __('admin.action_type') }}</th>
                                                <th>{{ __('admin.action_date') }}</th>
                                                <th>{{ __('admin.file') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->documents as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['document_type'] }}</td>
                                                    <td>{{ $item['document_name'] }}</td>
                                                    <td>{{ $item['upload_date'] }}</td>
                                                    <td>{{ $item['expiry_date'] }}</td>
                                                    <td>{{ $item['action_type'] }}</td>
                                                    <td>{{ $item['action_date'] }}</td>
                                                    <td>
                                                        @if($item['file'])
                                                            <img src="{{ $item['file'] }}"
                                                                 style="height: 50px; width: 50px"/>
                                                        @else
                                                            No file
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                            @endif
                            @if($step == 11)
                                <div class="my-3">
                                    <h4 class="text-center">Finance</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.finance_type">{{ __('admin.finance_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.finance_type" type="text"
                                                       class="form-control @error('finance.finance_type') error @enderror  form-control-xl"
                                                       id="finance.finance_type" maxlength="20"/>
                                                @error("finance.finance_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.purchase_price">{{ __('admin.purchase_price') }} {{  settings('currency_symbol', '$')  }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.purchase_price" type="text" step="any"
                                                       class="form-control @error('finance.purchase_price') error @enderror  form-control-xl"
                                                       id="finance.finance_type"  pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                                                @error("finance.purchase_price") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.agreement_number">{{ __('admin.agreement_number') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.agreement_number" type="text"
                                                       class="form-control @error('finance.agreement_number') error @enderror  form-control-xl"
                                                       id="finance.agreement_number" maxlength="20" />
                                                @error("finance.agreement_number") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.funder_name">{{ __('admin.funder_name') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.funder_name" type="text"
                                                       class="form-control @error('finance.funder_name') error @enderror  form-control-xl"
                                                       id="finance.funder_name" maxlength="20"/>
                                                @error("finance.funder_name") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.agreement_start_date">{{ __('admin.agreement_start_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="finance.agreement_start_date" type="text" data-type="date" class="form-control flatpickr @error('finance.agreement_start_date') error @enderror  form-control-xl"
                                                       id="finance.agreement_start_date" placeholder="YYYY-MM-DD" />
                                                @error("finance.agreement_start_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.agreement_end_date">{{ __('admin.agreement_end_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="finance.agreement_end_date" type="text" data-type="date" class="form-control flatpickr @error('finance.agreement_end_date') error @enderror  form-control-xl"
                                                       id="finance.agreement_end_date" placeholder="YYYY-MM-DD" />
                                                @error("finance.agreement_end_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.loan_amount">{{ __('admin.loan_amount') }} {{  settings('currency_symbol', '$')  }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.loan_amount" type="text" step="any"
                                                       class="form-control @error('finance.loan_amount') error @enderror  form-control-xl"
                                                       id="finance.loan_amount" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"/>
                                                @error("finance.loan_amount") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.repayment_frequency">{{ __('admin.repayment_frequency') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.repayment_frequency" type="text" step="any"
                                                       class="form-control @error('finance.repayment_frequency') error @enderror  form-control-xl"
                                                       id="finance.repayment_frequency" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"/>
                                                @error("finance.repayment_frequency") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="finance.amount">{{ __('admin.amount') }} {{  settings('currency_symbol', '$')  }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="finance.amount" type="text" step="any"
                                                       class="form-control @error('finance.amount') error @enderror  form-control-xl"
                                                       id="finance.amount" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"/>
                                                @error("finance.amount") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            @endif

                            @if($step == 12)
                                <div class="my-3">
                                    <h4 class="text-center">Damage History</h4>
                                </div>
                                <div wire:key="3" class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.reported_Date">{{ __('admin.reported_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="damage.reported_date" type="text" data-type="date" class="form-control flatpickr @error('damage.reported_date') error @enderror  form-control-xl"
                                                       id="damage.reported_date" placeholder="YYYY-MM-DD" />
                                                @error("damage.reported_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.incident_date">{{ __('admin.incident_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="damage.incident_date" type="text" data-type="date" class="form-control flatpickr @error('damage.incident_date') error @enderror  form-control-xl"
                                                       id="damage.incident_date" placeholder="YYYY-MM-DD" />
                                                @error("damage.incident_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.insurance_reference_no">{{ __('admin.insurance_reference_no') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="damage.insurance_reference_no" type="text"
                                                       class="form-control @error('damage.insurance_reference_no') error @enderror  form-control-xl"
                                                       id="damage.insurance_reference_no" maxlength="20"/>
                                                @error("damage.insurance_reference_no") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="damage.total_claim_cost">{{ __('admin.total_claim_cost') }} {{  settings('currency_symbol', '$')  }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="damage.total_claim_cost" type="text" step="any"
                                                       class="form-control @error('damage.total_claim_cost') error @enderror  form-control-xl"
                                                       id="damage.total_claim_cost" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"/>
                                                @error("damage.total_claim_cost") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="status">Status</label>
                                            <div class="form-control-wrap">
                                                <select wire:model="damage.status"
                                                        class="form-select form-control form-control-lg "
                                                        id="status">
                                                    <option value="open">Open</option>
                                                    <option value="settled">Settled</option>
                                                    <option value="closed">Closed</option>
                                                </select>
                                                @error("damage.status") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="updateDamage" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add
                                                    Damage History
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @if(count($car->carExtra->damage_history) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Damage Histories</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.reported_date') }}</th>
                                                <th>{{ __('admin.incident_date') }}</th>
                                                <th>{{ __('admin.insurance_reference_no') }}</th>
                                                <th>{{ __('admin.total_claim_cost') }}</th>
                                                <th>{{ __('admin.status') }}</th>
                                                {{--                        <th>{{ __('admin.next_service_mileage') }}</th>--}}
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->damage_history as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['reported_date'] }}</td>
                                                    <td>{{ $item['incident_date'] }}</td>
                                                    <td>{{ $item['insurance_reference_no'] }}</td>
                                                    <td>{{ amt($item['total_claim_cost']) }}</td>
                                                    <td>{{ $item['status'] }}</td>
                                                    {{--                            <td>{{ $item['next_service_mileage'] }}</td>--}}
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                            @endif

                            @if($step == 13)
                                <div class="my-3">
                                    <h4 class="text-center">Add Repair</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.booking_id">{{ __('admin.booking_id') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.booking_id" type="text"
                                                       class="form-control @error('repair.booking_id') error @enderror  form-control-xl"
                                                       id="repair.booking_id" maxlength="20" />
                                                @error("repair.booking_id") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.booking_date">{{ __('admin.booking_date') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="repair.booking_date" type="text" data-type="date" class="form-control flatpickr @error('repair.booking_date') error @enderror  form-control-xl"
                                                       id="repair.booking_date" placeholder="YYYY-MM-DD" />
                                                @error("repair.booking_date") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.date_time">{{ __('admin.date_time') }}</label>
                                            <div class="form-control-wrap" wire:ignore>
                                                <input wire:model="repair.date_time" type="text" data-type="datetime" class="form-control flatpickr @error('repair.date_time') error @enderror  form-control-xl"
                                                       id="damage.insurance_reference_no" placeholder="YYYY-MM-DD hh:mm AA"/>
                                                @error("repair.date_time") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.mileage_at_repair">{{ __('admin.mileage_at_repair') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.mileage_at_repair" type="text" step="any"
                                                       class="form-control @error('repair.mileage_at_repair') error @enderror  form-control-xl"
                                                       id="repair.mileage_at_repair" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"/>
                                                @error("repair.mileage_at_repair") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.workshop_name">{{ __('admin.workshop_name') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.workshop_name" type="text"
                                                       class="form-control @error('repair.workshop_name') error @enderror  form-control-xl"
                                                       id="repair.mileage_at_repair" maxlength="20"/>
                                                @error("repair.workshop_name") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.repair_type">{{ __('admin.repair_type') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.repair_type" type="text"
                                                       class="form-control @error('repair.repair_type') error @enderror  form-control-xl"
                                                       id="repair.repair_type" maxlength="20"/>
                                                @error("repair.repair_type") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.total_cost">{{ __('admin.total_cost') }} {{  settings('currency_symbol', '$')  }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.total_cost" type="text" step="any"
                                                       class="form-control @error('repair.total_cost') error @enderror  form-control-xl"
                                                       id="repair.total_cost" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20"/>
                                                @error("repair.total_cost") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label" for="repair.vat">{{ __('admin.vat') }} {{  settings('currency_symbol', '$')  }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.vat" type="text" step="any"
                                                       class="form-control @error('repair.vat') error @enderror  form-control-xl"
                                                       id="repair.vat" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                                                @error("repair.vat") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-3">
                                        <div class="form-group">
                                            <label class="form-label"
                                                   for="repair.invoice">{{ __('admin.invoice') }}</label>
                                            <div class="form-control-wrap">
                                                <input wire:model="repair.invoice" type="file"
                                                       class="form-control @error('repair.invoice') error @enderror  form-control-xl"
                                                       id="repair.invoice" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20" />
                                                @error("repair.invoice") <span
                                                    class="invalid">{{ $message }}</span>@enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row justify-content-center-">
                                        <div class="col-4">
                                            <div class="form-group mt-3 w-100">
                                                <button wire:click.prevent="updateRepair" type="button"
                                                        class="btn btn-lg btn-primary  text-center">Add
                                                    Repair
                                                </button>
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                @if(count($car->carExtra->repairs) > 0)
                                    <div class="col-md-12 mt-4 mb-2">
                                        <h5>Repairs Histories</h5>

                                        <table class="nowrap table">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>{{ __('admin.booking_id') }}</th>
                                                <th>{{ __('admin.booking_date') }}</th>
                                                <th>{{ __('admin.date_time') }}</th>
                                                <th>{{ __('admin.mileage_at_repair') }}</th>
                                                <th>{{ __('admin.workshop_name') }}</th>
                                                <th>{{ __('admin.repair_type') }}</th>
                                                <th>{{ __('admin.total_cost') }}</th>
                                                <th>{{ __('admin.vat') }}</th>
                                                <th>{{ __('admin.invoice') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($car->carExtra->repairs as $item)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $item['booking_id'] }}</td>
                                                    <td>{{ $item['booking_date'] }}</td>
                                                    <td>{{ $item['date_time'] }}</td>
                                                    <td>{{ $item['mileage_at_repair'] }}</td>
                                                    <td>{{ $item['workshop_name'] }}</td>
                                                    <td>{{ $item['repair_type'] }}</td>
                                                    <td>{{ amt($item['total_cost']) }}</td>
                                                    <td>{{ amt($item['vat']) }}</td>
                                                    <td>
                                                        @if(isset($item['invoice']))
                                                            <a target="_blank" href="{{ $item['invoice'] }}">View
                                                                Invoice</a>
                                                        @else
                                                            No Invoice
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                @endif

                            @endif
                            @if($step == 14)
                                <div class="my-3">
                                    <h4 class="text-center">PCN Histories</h4>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th>{{ __('admin.sn') }}</th>
                                            <th>Created On</th>
                                            <th>Driver</th>
                                            <th>{{ __('admin.vrm') }}</th>
                                            <th>{{ __('admin.pcn_no') }}</th>
                                            <th>Issue Date</th>
                                            <th>Deadline Date</th>
                                            <th>Issuing Authority</th>
                                            <th>{{ __('admin.status') }}</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        @foreach($pcns as $item)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{ $item->created_at->format('d M, Y') }}</td>
                                                <td><a href="{{ route('admin.driverPcn', $item->driver->id ?? '') }}" class="btn btn-sm btn-primary">{{ $item->driver->first_name ?? '' }} {{ $item->driver->last_name ?? '' }}</a></td>
                                                <td><a href="#"> {{ $item->vrm }}</a></td>
                                                <td>{{ $item->pcn_no }}</td>
                                                <td>{{ $item?->date_of_issue }}</td>
                                                <td>{{ $item->deadline_date }}</td>
                                                <td>{{ $item->issuing_authority }}</td>
                                                <td>{{ $item->status }}</td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>

                            @endif
                            @if($step == 15)
                                <div class="my-3">
                                    <h4 class="text-center">Reports</h4>
                                </div>

                                @if(count($car->bookings) < 1)
                                    <h6 class="text-center mt-5">{{ __('admin.no_booking_history') }}</h6>
                                @endif

                                @if(count($car->bookings) > 0)
                                    <div class="dataTables_wrapper dt-bootstrap4 no-footer mt-4">
                                        <div class="datatable-wrap- my-3">
                                            <table class="nowrap table"
                                                   data-export-title="{{ __('admin.export_title') }}">
                                                <thead>

                                                <tr>
                                                    <th>{{ __('admin.sn') }}</th>
                                                    <th>{{ __('admin.booking_no') }}</th>
                                                    <th>{{ __('admin.booking_date') }}</th>
                                                    <th>{{ __('admin.pickup_date_time') }}</th>
                                                    {{--                            <th>{{ __('admin.dropoff_date_time') }}</th>--}}
                                                    <th>{{ __('admin.period') }}</th>
                                                    <th>{{ __('admin.customer_name') }}</th>
                                                    <th>{{ __('admin.service_area') }}</th>
                                                    <th>{{ __('admin.booking_status') }}</th>
                                                    <th>{{ __('admin.total_cost') }}</th>
                                                    <th>{{ __('admin.payment_status') }}</th>
                                                    <th>{{ __('admin.booking_type') }}</th>
                                                </tr>

                                                </thead>
                                                <tbody>
                                                @foreach($car->bookings as $item)
                                                    <tr>
                                                        <td>{{ $loop->index + 1 }}</td>

                                                        <td>
                                                            <a href="{{ route('admin.bookings.show', $item->id) }}">{{ $item->booking_number }}</a>
                                                        </td>
                                                        <td>{{ $item->created_at->format('Y-m-d H:i:s') }}</td>
                                                        <td>{{ $item->pick_up_date }} {{ $item->pick_up_time }}</td>
                                                        <td>{{ $item->days }} {{ __('admin.booking_days') }}</td>


                                                        <td>
                                                            @if($item?->customer)
                                                                <a href="{{ route('admin.user.show',$item?->customer?->id) }}"> {{ $item?->customer?->name }} </a>
                                                            @else
                                                                {{ "not found" }}
                                                            @endif
                                                        </td>
                                                        <td>{{ $item?->region?->name }}</td>

                                                        <td>{{ $item->status }}</td>
                                                        <td>{{ number_format($item->grand_total, 2) }}</td>


                                                        {{--    <td></td>--}}
                                                        <td>{{ $item->status }}</td>

                                                        <td>{{ $item->payment_status }}</td>

                                                        <td>{{ $item->booking_type }}</td>


                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif
                            @endif

                            @if($step == 16)
                                <div class="my-3">

                                    <h4 class="text-center">Subscription</h4>
                                </div>

                                <div class="row mt-3">

                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.tfl_congestion_charge') }}</span>
                                                <input id="tfl_congestion_charge"
                                                       wire:model="subscription.tfl_congestion_charge" value="yes"
                                                       type="radio"/> <span class="me-3">Yes</span>
                                                <input id="tfl_congestion_charge"
                                                       wire:model="subscription.tfl_congestion_charge" value="no"
                                                       type="radio"/> No

                                            </div>
                                            @error("subscription.tfl_congestion_charge") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.dartford_charge') }}</span>
                                                <input id="dartford_charge" wire:model="subscription.dartford_charge"
                                                       value="yes" type="radio"/> <span class="me-3">Yes</span>
                                                <input id="dartford_charge" wire:model="subscription.dartford_charge"
                                                       value="no" type="radio"/> No

                                            </div>
                                            @error("subscription.dartford_charge") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.heathrow_airport') }}</span>
                                                <input id="heathrow_airport" wire:model="subscription.heathrow_airport"
                                                       value="yes" type="radio"/> <span class="me-3">Yes</span>
                                                <input id="heathrow_airport" wire:model="subscription.heathrow_airport"
                                                       value="no" type="radio"/> No

                                            </div>
                                            @error("subscription.heathrow_airport") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <div class="form-group">
                                            <div class="form-control-wrap">
                                                <span class="me-4">{{ __('admin.gatwick_airport') }}</span>
                                                <input id="gatwick_airport" wire:model="subscription.gatwick_airport"
                                                       value="yes" type="radio"/> <span class="me-3">Yes</span>
                                                <input id="gatwick_airport" wire:model="subscription.gatwick_airport"
                                                       value="no" type="radio"/> No

                                            </div>
                                            @error("subscription.gatwick_airport") <span
                                                class="invalid">{{ $message }}</span>@enderror

                                        </div>
                                    </div>


                                </div>

                            @endif

                            @if($step == 17)
                                <div class="row">
                                    <div class="col-12 mb-2 mt-2">
                                        <h6>Insurance Coverage</h6>
                                    </div>

                                    <div class="col-8 mt-2 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Coverage Level</th>
                                                    <th>What's Covered</th>
                                                    <th>Daily Price {{ settings('currency_symbol', '$') }}</th>
                                                    <th>Excess {{ settings('currency_symbol', '$') }}</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($car->insurance_coverage ?? [] as $index => $insurance_coverage0)
                                                <tr>
                                                    <td>{{ $insurance_coverage0['level'] }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-link" data-bs-toggle="dropdown" aria-expanded="false" style="text-decoration: none;">
                                                                {{ $insurance_coverage0['cover'] }}
                                                            </button>
                                                            @if( isset($insurance_coverage0['cover_descr']) )
                                                            <div class="dropdown-menu dropdown-menu-start" style="min-width: 400px; max-height:400px; overflow-y:auto; padding: 10px;">
                                                                {!! $insurance_coverage0['cover_descr'] !!}
                                                            </div>
                                                            @endif
                                                        </div>
                                                    </td>
                                                    <td>{{ amt($insurance_coverage0['daily_price']) }}</td>
                                                    <td>{{ amt($insurance_coverage0['excess']) }}</td>
                                                    <td>
                                                        <button type="button" wire:key="remove-{{ $index }}" class="btn btn-warning" wire:confirm="Are you sure?" wire:click="removeInsuranceCoverage({{ $index }})">Remove</button>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-4 mt-2">
                                        <div style="background: #fbfbfb;border-radius: 15px;padding: 20px;">
                                            <div class="form-group">
                                                <select class="form-control form-control-lg select2" wire:model="insurance_coverage.level">
                                                    <option value="">Select Level</option>
                                                    <option value="basic">Basic</option>
                                                    <option value="full">Full</option>
                                                    <option value="excess">Excess</option>
                                                </select>
                                                @error("insurance_coverage.level") <span class="error">Level is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" type="text" wire:model="insurance_coverage.cover" placeholder="What's Covered" maxlength="20">
                                                @error("insurance_coverage.cover") <span class="error">Cover is required</span> @enderror
                                            </div>
                                            <div class="form-group"
                                                wire:ignore
                                                x-data="{
                                                    initSummernote: function() {
                                                        $('#whats_covered_descr').summernote({
                                                            height: 200,
                                                            callbacks: {
                                                                onChange: function(contents, $editable) {
                                                                    // Crucial: Push the content back to the Livewire property
                                                                    @this.set('insurance_coverage.cover_descr', contents);
                                                                }
                                                            }
                                                        });
                                                    }
                                                }" x-init="initSummernote()"
                                                @clear-summernotes.window="$('#whats_covered_descr').summernote('code', '')"
                                            >
                                                <textarea class="form-control form-control-lg" wire:model="insurance_coverage.cover_descr" id="whats_covered_descr" type="text" placeholder="What's Covered Description" maxlength="255">{{ isset($insurance_coverage['cover_descr']) ? $insurance_coverage['cover_descr'] : '' }}</textarea>
                                                @error("insurance_coverage.cover_descr") <span class="error">Cover Description is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" type="text" wire:model="insurance_coverage.daily_price" placeholder="Daily Price  {{  settings('currency_symbol', '$')  }}" min="1" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                @error("insurance_coverage.daily_price") <span class="error">Daily price is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control form-control-lg" type="text" wire:model="insurance_coverage.excess" placeholder="Excess" min="1" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                                @error("insurance_coverage.excess") <span class="error">Excess is required</span> @enderror
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control form-control-lg select2" wire:model="insurance_coverage.interval" placeholder="Interval">
                                                    <option value="">Select Interval</option>
                                                    <option value="daily">Daily</option>
                                                    <option value="weekly">Weekly</option>
                                                    <option value="one_time">One Time</option>
                                                </select>
                                                @error("extras.interval") <span class="error">This interval is required</span> @enderror
                                            </div>
                                            <div class="form-group mt-3">
                                                <button type="button" wire:click.prevent="addInsuranceCoverage" class="btn btn-lg btn-success">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($step == 18)
                            <h6 class="mb-2 mt-2">Calendar</h6>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $calendarTab == 'availability' ? 'active' : '' }}" wire:click="setCalendarTab('availability')" type="button" role="tab">Availability</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link {{ $calendarTab == 'blackout' ? 'active' : '' }}" wire:click="setCalendarTab('blackout')" type="button" role="tab">Blackout</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade {{ $calendarTab == 'availability' ? 'show active' : '' }}" role="tabpanel">
                                    <h4>Availability</h4>
                                    <div style="background:#f5f5f5;padding:20px;border-radius:15px;">
                                        <div class="row">
                                            <div class="col-12 mb-2">
                                                <div class="form-group">
                                                    <label for="day_of_week">Day of Week</label>
                                                    <select class="form-control select2" id="availability.day_of_week" wire:model="availability.day_of_week">
                                                        <option value="">Select Day of Week</option>
                                                        <option value="Monday">Monday</option>
                                                        <option value="Tuesday">Tuesday</option>
                                                        <option value="Wednesday">Wednesday</option>
                                                        <option value="Thursday">Thursday</option>
                                                        <option value="Friday">Friday</option>
                                                        <option value="Saturday">Saturday</option>
                                                        <option value="Sunday">Sunday</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <h6>Pickup Hours</h6>
                                            </div>
                                            <div class="col-6 mb-2" wire:ignore>
                                                <label for="pickup_hours_start">Start</label>
                                                <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" id="pickup_hours_start" wire:model="availability.pickup_hours_start">
                                            </div>
                                            <div class="col-6 mb-2" wire:ignore>
                                                <label for="pickup_hours_end">End</label>
                                                <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" id="pickup_hours_end" wire:model="availability.pickup_hours_end">
                                            </div>
                                            <div class="col-12 mb-2">
                                                <h6>Return Hours</h6>
                                            </div>
                                            <div class="col-6 mb-2" wire:ignore>
                                                <label for="return_hours_start">Start</label>
                                                <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" id="return_hours_start" wire:model="availability.return_hours_start">
                                            </div>
                                            <div class="col-6 mb-2" wire:ignore>
                                                <label for="return_hours_end">End</label>
                                                <input type="text" data-type="time" class="form-control flatpickr" placeholder="hh:mm AA" id="return_hours_end" wire:model="availability.return_hours_end">
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="button" wire:click.prevent="saveAvailability" class="btn btn-lg btn-success">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-2">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Day of Week</th>
                                                    <th>Pickup Hours</th>
                                                    <th>Return Hours</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($availabilities as $item)
                                                    <tr>
                                                        <td>{{ $item['day_of_week'] }}</td>
                                                        <td>{{ $item['pickup_hours_start'] }} - {{ $item['pickup_hours_end'] }}</td>
                                                        <td>{{ $item['return_hours_start'] }} - {{ $item['return_hours_end'] }}</td>
                                                        <td>
                                                            <button type="button" wire:click="removeAvailability({{ $item['id'] }})" wire:confirm="Are you sure you want to remove this item?" class="btn btn-danger btn-sm">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade {{ $calendarTab == 'blackout' ? 'show active' : '' }}" role="tabpanel">
                                    <h4>Blackout</h4>
                                    <div style="background-color: #f8f9fa; padding: 20px; border-radius: 15px;">
                                        <div class="row">
                                            <div class="col-6 mb-2" wire:ignore>
                                                <label for="start_date_time">Start Date/Time</label>
                                                <input type="text" data-type="datetime" class="form-control flatpickr" placeholder="YYYY-MM-DD hh:mm AA" id="start_date_time" wire:model="blackout.start_date_time">
                                            </div>
                                            <div class="col-6 mb-2" wire:ignore>
                                                <label for="end_date_time">End Date/Time</label>
                                                <input type="text" data-type="datetime" class="form-control flatpickr" placeholder="YYYY-MM-DD hh:mm AA" id="end_date_time" wire:model="blackout.end_date_time">
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="reason">Reason</label>
                                                <select class="form-control" id="reason" wire:model="blackout.reason">
                                                    <option value="">Select Reason</option>
                                                    <option value="maintenance">Maintenance</option>
                                                    <option value="mot">MOT</option>
                                                    <option value="insurance">Insurance</option>
                                                    <option value="personal_use">Personal Use</option>
                                                </select>  
                                            </div>
                                            <div class="col-6 mb-2">
                                                <label for="hard_block">Hard Block (cannot be overriden)</label>
                                                <select class="form-control" id="hard_block" wire:model="blackout.hard_block">
                                                    <option value="">Select Option</option>
                                                    <option value="1">Yes</option>
                                                    <option value="0">No</option>
                                                </select>
                                            </div>
                                            <div class="col-12 mb-2">
                                                <label for="">Notes (optional)</label>
                                                <textarea class="form-control" id="" wire:model="blackout.notes" maxlength="255"></textarea>
                                            </div>
                                            <div class="col-12 text-center">
                                                <button type="button" wire:click.prevent="saveBlackout" class="btn btn-lg btn-success">
                                                    Save
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive mt-2">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Start Date/Time</th>
                                                    <th>End Date/Time</th>
                                                    <th>Reason</th>
                                                    <th>Hard Block</th>
                                                    <th>Notes</th>
                                                    <th>Actions</th>
                                                </tr>
                                            </thead>    
                                            <tbody>
                                                @foreach ($blackouts as $item)
                                                    <tr>
                                                        <td>{{ $item['start_date_time'] }}</td>
                                                        <td>{{ $item['end_date_time'] }}</td>
                                                        <td>{{ $item['reason'] }}</td>
                                                        <td>{{ $item['hard_block'] ? 'Yes' : 'No' }}</td>
                                                        <td>{{ $item['notes'] }}</td>
                                                        <td>
                                                            <button type="button" wire:click="deleteBlackout({{ $item['id'] }})" wire:confirm="Are you sure?" class="btn btn-danger btn-sm">
                                                                Remove
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if($step == 19)
                                <div class="row">
                                    <div class="col-12 mb-2 mt-2">
                                        <h6>Mileage and Cancellation Policies</h6>
                                    </div>
                                    @if(!$unlimited_mileage)
                                    <div class="col-4">
                                        <div class="form-group mb-2">
                                            <label>Mileage Policy</label>
                                            <select class="form-control form-control-lg" 
                                                wire:model="mileage_policy"
                                                wire:change="updateData('mileage_policy', $event.target.value)">
                                                <option value="">Select Mileage Policy</option>
                                                <option value="unlimited">Unlimited</option>
                                                <option value="limited_per_day">Limited per day</option>
                                                <option value="limited_per_week">Limited per week</option>
                                                <option value="limited_per_month">Limited per month</option>
                                                <option value="limited_per_rental">Limited per rental</option>
                                            </select>
                                            @error("mileage_policy") <span class="error">Mileage policy is required</span> @enderror
                                        </div>
                                    </div>
                                    @if($mileage_policy != 'unlimited')
                                    <div class="col-4">
                                        <div class="form-group mb-2">
                                            <label>Mileage Limit</label>
                                            <input class="form-control form-control-lg" min="1" type="text" wire:model="mileage_limit"  pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                            @error("mileage_limit") <span class="error">Mileage limit is required</span> @enderror
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-group mb-2">
                                            <label>Excess Mileage Rate ({{  settings('currency_symbol', '$')  }} per mile)</label>
                                            <input class="form-control form-control-lg" type="text" wire:model="excess_mileage_rate" placeholder="Excess Mileage Rate" pattern="^[0-9]+(\.[0-9]{2}){0,1}$" step="0.01" maxlength="20">
                                            @error("excess_mileage_rate") <span class="error">Excess mileage rate is required</span> @enderror
                                        </div>
                                    </div>
                                    @endif
                                    @endif
                                    @if(!$free_cancellation)
                                    <div class="col-12">
                                        <label>Cancellation Policy</label>
                                        <select class="form-control form-control-lg" wire:model="cancellation_policy">
                                            <option value="">Select</option>
                                            <option value="336">Flexible - 336h Free Cancellation</option>
                                            <option value="168">Flexible - 168h Free Cancellation</option>
                                            <option value="72">Moderate - 72h Free Cancellation</option>
                                            <option value="48">Moderate - 48h Free Cancellation</option>
                                            <option value="24">Strict - 24h Free Cancellation</option>
                                            <option value="0">Non-Refundable - 0h Free Cancellation</option>                                            
                                        </select>
                                        @error("cancellation_policy") <span class="error">Cancellation policy is required</span> @enderror
                                    </div>
                                    @endif
                                </div>
                            @endif

                            @if($step == 20)
                                <div class="row">
                                    <div class="col-12 mb-2 mt-2">
                                        <h6>Vehicle Photos</h6>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="row mb-2">
                                            @foreach ($vehicle_photos as $vehicle_photo)
                                                <div class="col-md-2">
                                                    <img src="{{ $vehicle_photo }}" class="img-fluid">
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="row" wire:ignore id="image_preview_container">
                                            
                                        </div>
                                        <div class="form-group mt-2">
                                            <label>Photos</label>
                                            <input type="file" wire:model="photos_input" id="photos_input" multiple class="form-control form-control-lg">
                                            @error("photos_input") <span class="error">Photos are required</span> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="row justify-content-center-">
                                <div class="col-4">
                                    <div class="form-group mt-3 w-100">
                                        <button type="submit"
                                                class="btn btn-lg btn-primary  text-center">{{ $step > 7 ? 'Save' : 'Next' }}</button>
                                    </div>
                                </div>

                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- .nk-block -->