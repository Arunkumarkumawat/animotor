<!-- Preheader (hidden) -->
<span
    style="display:none; font-size:1px; color:#ffffff; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
    Your chauffeur has been assigned — Booking ID {{ $booking->id }}.
</span>

<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Your Chauffeur is Assigned – {{ $booking->id }}</title>
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
                                        <h1 style="margin:0; font-size:20px; font-weight:700; color:#ffffff;">{{ settings('site_name') }}
                                        </h1>
                                        <div style="margin-top:6px; font-size:13px; color:#e8f3ff;">
                                            Your chauffeur is assigned
                                        </div>
                                    </td>
                                    <td style="text-align:right; vertical-align:middle;">
                                        <div
                                            style="width:48px; height:48px; border-radius:8px; background-color:rgba(255,255,255,0.14); display:inline-block; text-align:center; line-height:48px; font-size:20px;">
                                            🧑‍✈️
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <!-- BODY -->
                    <tr>
                        <td style="padding:24px 28px 12px;">

                            <p style="margin:0 0 14px; font-size:15px;">
                                Hello <strong>{{ $booking->full_name }}</strong>,
                            </p>

                            <p style="margin:0 0 18px; font-size:15px;">
                                Good news — your chauffeur has been assigned and is getting ready for your ride.
                            </p>

                            <!-- Details card -->
                            <table width="100%" cellpadding="0" cellspacing="0" role="presentation"
                                style="border-radius:10px; background:#f8f9fb; padding:16px; margin-bottom:20px;">
                                <tr>
                                    <td style="padding:6px 8px; font-size:14px; color:#444;">
                                        <strong>Booking ID:</strong> {{ $booking->id }}<br>
                                        <strong>Chauffeur:</strong> {{ $car->driver['name'] ?? 'N/A' }}<br>
                                        <strong>Vehicle:</strong> {{ $car->make }} {{ $car->model }}
                                        ({{ $car->class }})<br>
                                        <strong>Pickup:</strong> {{ $booking->pickup_date }} {{ $booking->pickup_time }}
                                        – {{ $booking->pickup_location }}
                                    </td>
                                </tr>
                            </table>

                            <p style="margin:0 0 16px; font-size:14px; color:#555;">
                                Support: <a href="tel:{{ settings('contact_phone') }}"
                                    style="color:#0b6efd; text-decoration:none;">{{ settings('contact_phone') }}</a> |
                                <a href="mailto:{{ settings('contact_email') }}"
                                    style="color:#0b6efd; text-decoration:none;">{{ settings('contact_email') }}</a>
                            </p>

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
                                        <div style="margin-top:6px;">Chauffeur Assigned</div>
                                    </td>
                                    <td style="text-align:right; color:#98a0aa; font-size:12px;">
                                        Booking ID: {{ $booking->id }}
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
                            If this looks incorrect, please contact support.
                        </td>
                    </tr>
                </table>

            </td>
        </tr>
    </table>

</body>

</html>
