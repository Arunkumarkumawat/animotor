<!-- Preheader (hidden) -->
<span
    style="display:none; font-size:1px; color:#ffffff; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
    Your chauffeur booking is confirmed — Booking ID {{ $booking->id }}.
</span>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Booking Confirmed – Chauffeur Service – {{ $booking->id }}</title>
</head>

<body
    style="margin:0; padding:0; background-color:#f3f5f7; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; color:#333333;">

    <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
        style="background-color:#f3f5f7; padding:24px 12px;">
        <tr>
            <td align="center">

                <table width="700" cellpadding="0" cellspacing="0" role="presentation"
                    style="max-width:700px; width:100%; background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 6px 18px rgba(33,35,38,0.08);">

                    <!-- HEADER -->
                    <tr>
                        <td
                            style="padding:22px 28px; background:linear-gradient(90deg,#0b6efd 0%,#0b9efd 100%); color:#ffffff;">
                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td style="vertical-align:middle;">
                                        <h1 style="margin:0; font-size:20px; font-weight:700; color:#ffffff;">
                                            {{ settings('site_name') }}</h1>
                                        <div style="margin-top:6px; font-size:13px; color:#e8f3ff;">
                                            Your chauffeur booking is confirmed
                                        </div>
                                    </td>
                                    <td style="text-align:right; vertical-align:middle;">
                                        <div
                                            style="width:48px; height:48px; border-radius:8px; background-color:rgba(255,255,255,0.14); display:inline-block; text-align:center; line-height:48px; font-size:20px;">
                                            ✅
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:24px 28px 12px;">

                            <p style="margin:0 0 14px; font-size:15px;">Hello
                                <strong>{{ $booking->full_name }}</strong>,</p>

                            <p style="margin:0 0 18px; font-size:15px;">
                                Great news — your Chauffeur booking is officially <strong>confirmed</strong>.
                                Your ride is good to go!
                            </p>

                            <!-- Booking summary card -->
                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                                style="border-radius:10px; background:#f8f9fb; padding:16px; margin-bottom:20px;">
                                <tr>
                                    <td style="padding:6px 8px; font-size:14px; color:#444;">
                                        <strong>Booking ID:</strong> {{ $booking->id }}<br>
                                        <strong>Service type:</strong> {{ strtoupper($booking->trip_type) }}<br>
                                        <strong>Pickup:</strong> {{ $booking->pickup_date }} {{ $booking->pickup_time }}
                                        – {{ $booking->pickup_location }}<br>
                                        <strong>Drop-off:</strong> {{ $booking->dropoff_location }}<br>
                                        <strong>Vehicle class:</strong> {{ $booking->type }}<br>
                                        <strong>Add-ons:</strong> {{ implode(',', array_map(function ($addon) {
                                            return $addon['name'];
                                        }, $booking->addons ?? [])) }}<br>
                                    </td>
                                </tr>
                            </table>

                            <!-- Policy summary -->
                            <h3 style="margin:0 0 10px; font-size:16px;">Policy summary</h3>

                            <ul style="margin:0 0 20px 18px; padding:0; font-size:14px; color:#444; line-height:1.5;">
                                @foreach ($car->chauffer_terms as $key => $val)
                                    @php
                                        switch ($key) {
                                            case 'minimum_hire':
                                                $key = 'Minimum Hire';
                                                break;
                                            case 'overtime':
                                                $key = 'Overtime';
                                                break;
                                            case 'extra_mileage':
                                                $key = 'Extra Mileage';
                                                break;
                                            case 'waiting_time':
                                                $key = 'Waiting Time';
                                                break;
                                            case 'chauffeur_standards':
                                                $key = 'Chauffeur Standards';
                                                break;
                                            case 'vehicle_policy':
                                                $key = 'Vehicle Policy';
                                                break;
                                            case 'insurance':
                                                $key = 'Insurance';
                                                break;
                                            case 'operator_compliance':
                                                $key = 'Operator Compliance';
                                                break;
                                            case 'cancellation':
                                                $key = 'Cancellation';
                                                break;
                                            case 'payment':
                                                $key = 'Payment';
                                                break;
                                        }
                                    @endphp
                                    <li>{{ $key }}: {{ $val }}</li>
                                @endforeach
                            </ul>

                            <!-- CTA -->
                            <table cellpadding="0" cellspacing="0" role="presentation"
                                style="width:100%; margin:14px 0 6px;">
                                <tr>
                                    <td align="center">
                                        <a href="{{ route('frontpage.chauffeur.confirmation', $booking->id) }}"
                                            style="display:inline-block; text-decoration:none; padding:12px 22px; border-radius:8px; font-weight:600; font-size:15px; background-color:#0b6efd; color:#ffffff;">
                                            View details
                                        </a>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                    <!-- FOOTER -->
                    <tr>
                        <td
                            style="padding:18px 28px 26px; border-top:1px solid #eef1f5; font-size:13px; color:#6b7280;">
                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation">
                                <tr>
                                    <td>
                                        <div style="font-weight:600; color:#2b2f36;">{{ settings('site_name') }}</div>
                                        <div style="margin-top:6px;">Booking ID: {{ $booking->id }}</div>
                                    </td>
                                    <td style="text-align:right; color:#98a0aa; font-size:12px;">
                                        Chauffeur Service Confirmation
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                </table>

                <!-- Small print -->
                <table width="700" cellpadding="0" cellspacing="0" role="presentation"
                    style="max-width:700px; width:100%; margin-top:10px;">
                    <tr>
                        <td style="text-align:center; font-size:12px; color:#9aa2ab; padding:6px 12px;">
                            If you did not make this booking, please contact support immediately.
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>

</html>
