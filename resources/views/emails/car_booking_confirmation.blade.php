@php
    $car = $booking?->car;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ settings('site_name') }} - Booking Confirmation</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: "Segoe UI", Arial, Helvetica, sans-serif;
            background-color: #f5f5f5;
            color: #333333;
            line-height: 1.6;
        }
        
        .email-container {
            max-width: 680px;
            margin: 0 auto;
            background-color: #ffffff;
        }
        
        /* Header */
        .header {
            background-color: #003580;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            color: #ffffff;
            font-size: 26px;
            font-weight: 700;
            letter-spacing: -0.5px;
        }
        
        .confirmation-number {
            color: #ffffff;
            font-size: 14px;
            font-weight: 400;
        }
        
        .confirmation-number strong {
            font-weight: 600;
        }
        
        /* Main Content */
        .content {
            padding: 30px;
        }
        
        .main-heading {
            font-size: 24px;
            font-weight: 700;
            color: #262626;
            margin-bottom: 20px;
            line-height: 1.3;
        }
        
        .intro-text {
            font-size: 14px;
            color: #333333;
            margin-bottom: 25px;
        }
        
        .intro-text a {
            color: #0071c2;
            text-decoration: none;
        }
        
        .intro-text a:hover {
            text-decoration: underline;
        }
        
        /* Checklist Box */
        .checklist-box {
            background-color: #fef9e6;
            border: 1px solid #f4e7c3;
            border-radius: 4px;
            padding: 20px;
            margin-bottom: 30px;
        }
        
        .checklist-heading {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 16px;
            font-weight: 700;
            color: #262626;
            margin-bottom: 15px;
        }
        
        .checklist-icon {
            width: 20px;
            height: 20px;
            background-color: #febb02;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            font-size: 14px;
            font-weight: 700;
        }
        
        .checklist-intro {
            font-size: 14px;
            color: #333333;
            margin-bottom: 15px;
        }
        
        .checklist-items {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }
        
        .checklist-items li {
            font-size: 14px;
            color: #333333;
            list-style: none;
            padding-left: 20px;
            position: relative;
        }
        
        .checklist-items li:before {
            content: "•";
            position: absolute;
            left: 0;
            font-weight: 700;
        }
        
        .checklist-items a {
            color: #0071c2;
            text-decoration: none;
        }
        
        .checklist-items a:hover {
            text-decoration: underline;
        }
        
        .dvla-info {
            font-size: 13px;
            color: #333333;
            margin-top: 15px;
            padding-top: 15px;
            border-top: 1px solid #f4e7c3;
        }
        
        .dvla-info p {
            margin-bottom: 8px;
        }
        
        .dvla-info ul {
            margin-left: 20px;
            margin-top: 5px;
        }
        
        .dvla-info li {
            font-size: 13px;
            margin-bottom: 3px;
        }
        
        .dvla-info a {
            color: #0071c2;
            text-decoration: none;
        }
        
        .dvla-info a:hover {
            text-decoration: underline;
        }
        
        /* Booking Details Table */
        .booking-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            border: 1px solid #e6e6e6;
        }
        
        .booking-table tr {
            border-bottom: 1px solid #e6e6e6;
        }
        
        .booking-table tr:last-child {
            border-bottom: none;
        }
        
        .booking-table td {
            padding: 15px 20px;
            font-size: 14px;
        }
        
        .booking-table td:first-child {
            color: #6b6b6b;
            width: 180px;
            vertical-align: top;
        }
        
        .booking-table td:last-child {
            color: #262626;
        }
        
        .booking-table strong {
            font-weight: 600;
        }
        
        .booking-table a {
            color: #0071c2;
            text-decoration: none;
            word-break: break-all;
        }
        
        .booking-table a:hover {
            text-decoration: underline;
        }
        
        /* Vehicle Details */
        .vehicle-section {
            display: flex;
            gap: 20px;
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 4px;
            margin-bottom: 25px;
        }
        
        .vehicle-image {
            flex-shrink: 0;
        }
        
        .vehicle-image img {
            width: 120px;
            height: auto;
            border-radius: 4px;
        }
        
        .vehicle-info {
            flex-grow: 1;
        }
        
        .vehicle-name {
            font-size: 16px;
            font-weight: 700;
            color: #262626;
            margin-bottom: 12px;
        }
        
        .vehicle-specs {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 8px;
        }
        
        .vehicle-spec {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 13px;
            color: #333333;
        }
        
        .spec-icon {
            width: 18px;
            height: 18px;
            color: #6b6b6b;
        }
        
        /* Pickup/Dropoff Section */
        .location-section {
            margin-bottom: 30px;
        }
        
        .location-row {
            display: grid;
            grid-template-columns: 140px 1fr;
            gap: 20px;
            padding: 20px;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        
        .location-label {
            font-size: 14px;
            color: #6b6b6b;
            font-weight: 600;
        }
        
        .location-details {
            font-size: 14px;
            color: #262626;
        }
        
        .location-datetime {
            font-weight: 700;
            font-size: 15px;
            margin-bottom: 5px;
        }
        
        .location-address {
            margin-bottom: 10px;
        }
        
        .location-instructions {
            font-size: 13px;
            color: #333333;
            line-height: 1.5;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px solid #e6e6e6;
        }
        
        /* Payment Section */
        .payment-section {
            background-color: #ffffff;
            border: 1px solid #e6e6e6;
            border-radius: 4px;
            margin-bottom: 30px;
        }
        
        .payment-header {
            background-color: #f7f7f7;
            padding: 15px 20px;
            font-size: 16px;
            font-weight: 700;
            color: #262626;
            border-bottom: 1px solid #e6e6e6;
        }
        
        .payment-row {
            display: flex;
            justify-content: space-between;
            padding: 15px 20px;
            border-bottom: 1px solid #e6e6e6;
            font-size: 14px;
        }
        
        .payment-row:last-child {
            border-bottom: none;
            background-color: #f7f7f7;
            font-weight: 700;
            font-size: 16px;
        }
        
        .payment-label {
            color: #333333;
        }
        
        .payment-amount {
            color: #262626;
            font-weight: 600;
        }
        
        /* Buttons */
        .button-group {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
        }
        
        .btn {
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            border: none;
            cursor: pointer;
            transition: all 0.2s;
        }
        
        .btn-primary {
            background-color: #0071c2;
            color: #ffffff;
        }
        
        .btn-primary:hover {
            background-color: #00509e;
        }
        
        .btn-secondary {
            background-color: #ffffff;
            color: #0071c2;
            border: 1px solid #0071c2;
        }
        
        .btn-secondary:hover {
            background-color: #f0f8ff;
        }
        
        /* Footer */
        .footer {
            background-color: #f7f7f7;
            padding: 25px 30px;
            border-top: 1px solid #e6e6e6;
            font-size: 12px;
            color: #6b6b6b;
            text-align: center;
        }
        
        .footer p {
            margin-bottom: 8px;
        }
        
        .footer a {
            color: #0071c2;
            text-decoration: none;
        }
        
        .footer a:hover {
            text-decoration: underline;
        }
        
        /* Responsive */
        @media only screen and (max-width: 600px) {
            .header {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }
            
            .content {
                padding: 20px;
            }
            
            .checklist-items {
                grid-template-columns: 1fr;
            }
            
            .vehicle-section {
                flex-direction: column;
            }
            
            .vehicle-image img {
                width: 100%;
            }
            
            .location-row {
                grid-template-columns: 1fr;
            }
            
            .button-group {
                flex-direction: column;
            }
            
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="email-container">
        <!-- Header -->
        <div class="header">
            <div class="logo">{{ settings('site_name') }}</div>
            <div class="confirmation-number">Reference No.: <strong>{{ $booking->reference }}</strong></div>
        </div>
        
        <!-- Main Content -->
        <div class="content">
            <h1 class="main-heading">{{ $booking?->customer?->name }}, your car hire for {{ $booking?->drop_off_location ?? $booking?->pick_location }} is confirmed!</h1>
            
            <p class="intro-text">
                The counter staff will need to see your voucher when you pick your car up. You can now 
                <a href="{{ route('booking', $booking->id) }}">manage your booking</a> or 
                <a href="{{ route('voucher', $booking->id) }}">print your voucher</a>
            </p>
            
            <!-- Checklist Box -->
            <div class="checklist-box">
                <div class="checklist-heading">
                    <div class="checklist-icon">!</div>
                    <span>Your checklist</span>
                </div>
                
                <p class="checklist-intro">When you pick your car up, you'll need:</p>
                
                <ul class="checklist-items">
                    <li><a href="{{ route('voucher', $booking->id) }}">Your voucher</a></li>
                    <li>Your passport or ID card</li>
                    <li>Each driver's driving licence</li>
                    <li>Credit card in the main driver's name</li>
                </ul>
                
                <div class="dvla-info">
                    <p><strong>DVLA licence check code so ANI Motors can check your driving record.</strong><br>You can get it:</p>
                    <ul>
                        <li>From the <a href="https://www.gov.uk/view-driving-licence">DVLA website</a> for free</li>
                        <li>At the counter (but you may be charged a fee)</li>
                    </ul>
                    <p style="margin-top: 10px;">You'll find more details on your <a href="{{ route('voucher', $booking->id) }}">voucher</a>. Don't forget to take a look before you go to pick your car up.</p>
                </div>
            </div>
            
            <!-- Booking Details -->
            <table class="booking-table">
                <tr>
                    <td>Main driver</td>
                    <td><strong>{{ $booking?->customer?->name }}</strong></td>
                </tr>
                <tr>
                    <td>Email address</td>
                    <td><a href="mailto:{{ $booking?->customer?->email }}">{{ $booking?->customer?->email }}</a></td>
                </tr>
                <tr>
                    <td>Phone number</td>
                    <td>{{ $booking?->customer?->phone }}</td>
                </tr>
                <tr>
                    <td>Rental company</td>
                    <td><strong>{{ $booking?->company?->name }}</strong></td>
                </tr>
            </table>
            
            <!-- Vehicle Details -->
            <div class="vehicle-section">
                <div class="vehicle-image">
                    <img src="{{ $booking?->car?->image }}" alt="{{ $booking?->car?->name }}">
                </div>
                <div class="vehicle-info">
                    <div class="vehicle-name">{{ $booking?->car?->name }} <span style="color: #6b6b6b; font-weight: 400;">or similar</span></div>
                    <div class="vehicle-specs">
                        <div class="vehicle-spec">
                            <span class="spec-icon">⚙️</span>
                            <span>{{ $booking?->car?->gear }}</span>
                        </div>
                        <div class="vehicle-spec">
                            <span class="spec-icon">❄️</span>
                            <span>{{ $booking?->car?->air_condition }}</span>
                        </div>
                        <div class="vehicle-spec">
                            <span class="spec-icon">⛽</span>
                            <span>{{ $car->mileage_policy == 'unlimited' ? '' : $car->mileage_limit }} {{ ucwords(str_replace('_', ' ', $car->mileage_policy)) }}</span>
                        </div>
                        <div class="vehicle-spec">
                            <span class="spec-icon">👥</span>
                            <span>{{ $booking?->car?->seats }} seats</span>
                        </div>
                        <div class="vehicle-spec">
                            <span class="spec-icon">🚪</span>
                            <span>{{ $booking?->car?->door }} doors</span>
                        </div>
                        <div class="vehicle-spec">
                            <span class="spec-icon">🧳</span>
                            <span>{{ $booking?->car?->bags_large }} Large bag</span>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Location Section -->
            <div class="location-section">
                <div class="location-row">
                    <div class="location-label">Pick-up</div>
                    <div class="location-details">
                        <div class="location-datetime">{{ $booking?->pick_up_date }} {{ $booking?->pick_up_time }}</div>
                        <div class="location-address">
                            <strong>{{ $booking?->pick_up_location }}</strong>
                        </div>
                        <div class="location-instructions">
                            {!! $booking?->car?->pickup_instruction !!}
                        </div>
                    </div>
                </div>
                
                <div class="location-row">
                    <div class="location-label">Drop-off</div>
                    <div class="location-details">
                        <div class="location-datetime">{{ $booking?->drop_off_date }} {{ $booking?->drop_off_time }}</div>
                        <div class="location-address">
                            <strong>{{ $booking?->drop_off_location }}</strong>
                        </div>
                        <div class="location-instructions">
                            {!! $booking?->car?->drop_off_instruction !!}
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Buttons -->
            <div class="button-group">
                <a href="{{ route('voucher', $booking->id) }}" class="btn btn-primary">Print voucher</a>
                <a href="{{ route('booking', $booking->id) }}" class="btn btn-secondary">Manage booking</a>
            </div>
            
            <!-- Payment Section -->
            <div class="payment-section">
                <div class="payment-header">What you've paid</div>
                <div class="payment-row">
                    <span class="payment-label">Car Hire Charge</span>
                    <span class="payment-amount">{{ settings('currency_symbol') }}{{ $booking?->fee }}</span>
                </div>
                <div class="payment-row">
                    <span class="payment-label">Insurance</span>
                    <span class="payment-amount">{{ settings('currency_symbol') }}{{ $booking?->insurance_fee }}</span>
                </div>
                <div class="payment-row">
                    <span class="payment-label">Total</span>
                    <span class="payment-amount">{{ settings('currency_symbol') }}{{ $booking?->grand_total }}</span>
                </div>
            </div>
        </div>
        
        <!-- Footer -->
        <div class="footer">
            <p><strong>{{ settings('site_name') }} - Premium Car Rental Services</strong></p>
            <p>Need help? Contact us at <a href="mailto:{{ settings('contact_email') }}">{{ settings('contact_email') }}</a> or call {{ settings('contact_phone') }}</p>
            <p style="margin-top: 15px;">© {{ date('Y') }} {{ settings('site_name') }}. All rights reserved.</p>
            <p><a href="{{ settings('privacy_url') }}">Privacy Policy</a> | <a href="{{ settings('terms_url') }}">Terms & Conditions</a></p>
        </div>
    </div>
</body>
</html>