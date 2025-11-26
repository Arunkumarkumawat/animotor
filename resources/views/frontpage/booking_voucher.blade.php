@php
    $car = $booking?->car;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ settings('site_name') }} Official Booking Voucher</title>
    <!-- Use Inter, Arial, or Helvetica as requested, with Arial as fallback -->
    <style>
        /* 1. GENERAL UI/UX PRINCIPLES */
        body {
            font-family: 'Inter', 'Arial', 'Helvetica', sans-serif;
            color: #1b1b1b; /* Text Color */
            margin: 0;
            padding: 0;
            background-color: #fff;
            /* A4 size and margins for PDF/Print (20mm-25mm margin requirement) */
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto;
            padding: 22mm;
            box-sizing: border-box;
            font-size: 11pt; /* Minimum 11pt for readability */
        }

        /* Branding Colors */
        .primary-bg { background-color: #003c7e; }
        .primary-color { color: #003c7e; }
        .border-color { border-color: #e8e8e8; }
        .subtle-bg { background-color: #f7f7f7; }

        /* Typography */
        h1 { font-size: 24pt; color: #1b1b1b; margin-top: 0; margin-bottom: 25pt; text-align: left; }
        h2 { 
            font-size: 14pt; 
            color: #003c7e; 
            margin-top: 18pt; 
            margin-bottom: 10pt; 
            border-bottom: 1pt solid #e8e8e8; 
            padding-bottom: 4pt; 
            font-weight: bold; /* Strong section headings */
        }
        p, ul, table { font-size: 11pt; line-height: 1.5; margin: 0 0 10pt 0; padding: 0; }
        strong { font-weight: bold; }

        /* Layout and Spacing */
        .header-section { padding-bottom: 10pt; border-bottom: 3pt solid #003c7e; margin-bottom: 15pt; }
        .section-separator { margin-bottom: 20px; } /* Spacing between sections */
        .detail-group { margin-bottom: 15pt; }

        /* Tables for Structured Data (Vehicle, Vendor, Pick-up) */
        .info-table { width: 100%; border-collapse: collapse; margin-bottom: 15pt; }
        .info-table td { padding: 4pt 0; vertical-align: top; }
        
        /* Two-Column Layout (Vehicle, Pick-up/Drop-off) */
        .two-col-container { 
            width: 100%; 
            border-collapse: collapse;
            /* Use table for reliable printing */
        }
        .two-col-container td { 
            width: 50%; 
            vertical-align: top; 
            padding-right: 10pt; 
        }
        .two-col-container .right-col { 
            padding-left: 10pt; 
            padding-right: 0; 
        }

        /* 3.2 Booking Details - Highlight */
        .booking-ref-box { 
            background-color: #f7f7f7; 
            border: 1pt solid #e8e8e8; 
            padding: 15pt; 
            border-radius: 4pt; 
            margin-bottom: 20pt;
        }
        .booking-ref-number {
            font-size: 20pt; /* Large and bold (18-20pt) */
            font-weight: bold;
            color: #003c7e;
        }
        
        /* 3.6 Financial Summary Table */
        .summary-table { width: 100%; border-collapse: collapse; margin-top: 10pt; border: 1pt solid #e8e8e8; }
        .summary-table td { padding: 8pt 15pt; font-size: 11pt; border-bottom: 1pt solid #e8e8e8; }
        .summary-table tr:nth-child(even) { background-color: #f7f7f7; }
        
        .total-row {
            background-color: #e8e8e8 !important; 
            font-weight: bold; 
        }
        .total-row td {
            font-size: 12pt;
            color: #003c7e;
            border-bottom: none;
        }

        /* 3.7 Required Documents Checklist */
        .checklist { list-style: none; padding-left: 0; margin-left: 0; }
        .checklist li { margin-bottom: 4pt; }
        .checklist li::before {
            content: "✔";
            color: #003c7e;
            font-weight: bold;
            display: inline-block; 
            width: 1.5em; 
            margin-left: -1.5em;
        }

        /* 3.8 Terms & Conditions */
        .terms-list { list-style-type: disc; padding-left: 18pt; margin-left: 0; }
        .terms-list li { margin-bottom: 4pt; }

    </style>
</head>
<body>

    <!-- A. Header Section -->
    <div class="header-section">
        <table class="info-table">
            <tr>
                <td width="30%">
                    <!-- ANI Motors Logo -->
                    <img src="{{ settings('site_logo') }}" alt="ANI Motors Logo" style="display: block; max-width: 150px; height: auto;" />
                </td>
                <td width="70%" style="text-align: right; vertical-align: bottom;">
                    <p style="font-size: 10pt; margin-bottom: 0;">Rental Provided By:</p>
                    <h1 class="primary-color" style="font-size: 16pt; margin: 0; text-align: right;">{{ $booking?->company?->name }}</h1>
                </td>
            </tr>
        </table>
        
    </div>

    <h1>YOUR BOOKING IS CONFIRMED</h1>

    <!-- B. Booking Details & C. Customer Information -->
    <div class="booking-ref-box">
        <table class="info-table" style="margin-bottom: 0;">
            <tr>
                <td width="66%">
                    <p style="font-size: 10pt; color: #777;">BOOKING REFERENCE</p>
                    <p class="booking-ref-number">{{ $booking?->reference }}</p>
                </td>
                <td width="34%">
                    <p style="font-size: 10pt; color: #777;">BOOKING DATE</p>
                    <p style="font-size: 12pt;">{{ $booking?->created_at->format('Y-m-d') }}</p>
                </td>
            </tr>
        </table>
    </div>

    <!-- C. Customer Information -->
    <h2>1. Customer Information</h2>
    <div class="detail-group">
        <table class="info-table">
            <tr>
                <td width="50%"><strong>Customer Name:</strong> {{ $booking?->customer?->name }}</td>
                <td width="50%"><strong>Phone:</strong> {{ $booking?->customer?->phone }}</td>
            </tr>
            <tr>
                <td><strong>Email:</strong> {{ $booking?->customer?->email }}</td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </div>

    <!-- D. Vehicle Information -->
    <h2>2. Vehicle Information</h2>
    <div class="detail-group">
        <table class="two-col-container">
            <tr>
                <!-- Left Column: Details -->
                <td width="60%">
                    <p style="font-size: 13pt; font-weight: bold;" class="primary-color">{{ $car?->make }} {{ $car?->model }} (or similar)</p>
                    <table class="info-table" style="margin-top: 5pt; font-size: 11pt;">
                        <tr>
                            <td width="35%"><strong>Category:</strong></td>
                            <td width="65%">{{ $car?->type }}</td>
                        </tr>       
                        <tr>
                            <td><strong>Transmission:</strong></td>
                            <td>{{ $car?->gear }}</td>
                        </tr>   
                        <tr>
                            <td><strong>Fuel Type:</strong></td>
                            <td>{{ $car?->fuel_type }}</td>
                        </tr>
                        <tr>
                            <td><strong>Seats / Doors:</strong></td>
                            <td>{{ $car?->seats }} / {{ $car?->door }}</td>
                        </tr>
                        <tr>
                            <td><strong>Luggage:</strong></td>
                            <td>{{ $car?->bags }} Small / {{ $car?->bags_large }} Large</td>
                        </tr>
                    </table>
                </td>
                <!-- Right Column: Image Placeholder -->
                <td width="40%" class="right-col" style="text-align: center;">
                    <p style="font-size: 10pt; color: #777;">VEHICLE IMAGE</p>
                    <img src="{{  $car->image }}" alt="{{ $car->name }}" width="100%" style="max-width: 150px; height: auto; border: 1px solid #e8e8e8; border-radius: 4px;" />
                </td>
            </tr>
        </table>
    </div>

    <!-- E. Vendor (Supplier) Information -->
    <h2>3. Vendor (Supplier) Information</h2>
    <div class="detail-group">
        <p style="font-size: 12pt; font-weight: bold;" class="primary-color">{{ $car?->company?->name }}</p>
        <table class="info-table">
            <tr>
                <td width="50%"><strong>Address:</strong> {{ $car?->company?->address }}</td>
                <td width="50%"><strong>Operating Hours:</strong> {{ $car?->company?->operating_hours }}</td>
            </tr>
            <tr>
                <td><strong>Contact Phone:</strong> {{ $car?->company?->contact_phone }}</td>
                <td><strong>Email:</strong> {{ $car?->company?->contact_email }}</td>
            </tr>
        </table>
    </div>

    <!-- F. Pick-up & Drop-off Sections -->
    <h2>4. Pick-up & Drop-off Details</h2>
    <table class="two-col-container">
        <tr>
            <!-- Pick-up Column -->
            <td style="border: 1pt solid #e8e8e8; padding: 10pt; border-radius: 4px;">
                <p style="font-weight: bold; font-size: 12pt;" class="primary-color">PICK-UP: {{ $booking?->pick_up_date }} {{ $booking?->pick_up_time }}</p>
                <p><strong>Location:</strong> {{ $booking?->pick_location }}</p>
                <p><strong>Instructions:</strong> {{ $car?->pickup_instruction }}</p>
            </td>
            <!-- Drop-off Column -->
            <td class="right-col" style="border: 1pt solid #e8e8e8; padding: 10pt; border-radius: 4px;">
                <p style="font-weight: bold; font-size: 12pt;" class="primary-color">DROP-OFF: {{ $booking?->drop_off_date }} {{ $booking?->drop_off_time }}</p>
                <p><strong>Location:</strong> {{ $booking?->drop_off_location }}</p>
                <p><strong>Instructions:</strong> {{ $car?->drop_off_instruction }}</p>
            </td>
        </tr>
    </table>
    <div class="section-separator"></div>

    <!-- G. Financial Summary -->
    <h2>5. Financial Summary</h2>
    <div class="detail-group">
        <table class="summary-table">
            <thead>
                <tr style="background-color: #e8e8e8;">
                    <td width="65%" style="font-weight: bold;">Item</td>
                    <td width="35%" style="font-weight: bold; text-align: right;">Price ({{ settings('currency') }})</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Car Hire Cost</td>
                    <td align="right">{{ settings('currency') }}{{ $booking?->fee }}</td>
                </tr>
                <!-- 4. DYNAMIC LOGIC: Insurance -->
                <tr>
                    <td>
                        Insurance Policy (Full Protection)
                        <br>
                        <span style="font-size: 10pt; font-weight: bold;" class="primary-color">Full Protection Included</span>
                    </td>
                    <td align="right">{{ settings('currency') }}{{ $booking?->insurance_fee }}</td>
                </tr>
                <tr>
                    <td>Taxes & Fees</td>
                    <td align="right">{{ settings('currency') }}{{ $booking?->tax }}</td>
                </tr>
                @if($booking?->discount > 0)
                <tr>
                    <td>Discounts Applied</td>
                    <td align="right">-{{ settings('currency') }}{{ $booking?->discount }}</td>
                </tr>
                @endif
                <tr class="total-row">
                    <td>TOTAL PAID ONLINE (Voucher Value)</td>
                    <td align="right">{{ settings('currency') }}{{ $booking?->grand_total }}</td>
                </tr>
            </tbody>
        </table>
        
        <p style="margin-top: 15pt; font-size: 12pt; font-weight: bold;">
            Amount Payable at Counter: <span class="primary-color">{{ settings('currency') }}{{ $booking?->grand_total }}</span>
            <!-- Dynamic Excess Disclosure -->
            @if($booking?->extra_time_price > 0)
            <span style="font-size: 10pt; font-weight: normal; color: #777;">(Deposit/Excess Required: {{ settings('currency') }}{{ $booking?->extra_time_price }})</span>
            @endif
        </p>
        
    </div>

    <table class="two-col-container">
        <tr>
            <!-- H. Required Documents (Checklist) -->
            <td width="50%">
                <h2>6. Required Documents</h2>
                <ul class="checklist">
                    <li>Booking Voucher (This document)</li>
                    <li>Valid Driving Licence</li>
                    <li>Passport / National ID</li>
                    <li>Credit Card in Main Driver’s Name <span style="font-size: 10pt; color: #777;">(For deposit/excess)</span></li>
                    <li>DVLA Check Code (UK Drivers)</li>
                </ul>
            </td>
            <!-- I. Important Terms & Conditions -->
            <td width="50%" class="right-col">
                <h2>7. Important Terms & Conditions</h2>
                <ul class="terms-list">
                    <li>Present the same credit card used for booking.</li>
                    <li>Late pick-up without notification may cancel booking.</li>
                    <li>Car type is not guaranteed (similar model may be provided).</li>
                    <li>Mileage Policy: {{ $car->mileage_policy == 'unlimited' ? '' : $car->mileage_limit }} {{ ucwords(str_replace('_', ' ', $car->mileage_policy)) }}</li>
                    <li>No-shows may be non-refundable.</li>
                    <li>Insurance exclusions apply – check your policy.</li>
                </ul>
            </td>
        </tr>
    </table>
    
    <!-- J. Help & Support -->
    <h2>8. Help & Support</h2>
    <div style="padding: 10pt; background-color: #f7f7f7; border: 1px solid #e8e8e8; text-align: center;">
        <p style="font-size: 10pt; margin-bottom: 5pt;">
            {{ settings('site_name') }} Support: <a href="mailto:{{ settings('contact_email') }}" class="primary-color">{{ settings('contact_email') }}</a> | 
            Manage Booking: <a href="{{ route('booking', $booking->id) }}" class="primary-color">{{ route('booking', $booking->id) }}</a>
        </p>
        <p style="font-size: 10pt; font-weight: bold; margin-bottom: 0;">
            Vendor Support ({{ $booking?->company?->name }}): {{ $booking?->company?->contact_email }}
        </p>
    </div>

    <p style="font-size: 9pt; color: #777; text-align: center; margin-top: 20pt;">
        © {{ settings('site_name') }}. This voucher is valid only for the details listed above. Please check all information prior to travel.
    </p>

</body>
</html>