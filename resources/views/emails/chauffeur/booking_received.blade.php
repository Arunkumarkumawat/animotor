<!-- Preheader (hidden) -->
<span style="display:none; font-size:1px; color:#ffffff; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
  We received your chauffeur request — Booking ID {{ $booking->id }}. We'll take care of the driving.
</span>

<!-- HTML Email -->
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Your Chauffeur Request Received – {{ $booking->id }}</title>
</head>
<body style="margin:0; padding:0; background-color:#f3f5f7; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif; color:#333333;">
  <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background-color:#f3f5f7; padding:24px 12px;">
    <tr>
      <td align="center">
        <table width="700" cellpadding="0" cellspacing="0" role="presentation" style="max-width:700px; width:100%; background-color:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 6px 18px rgba(33,35,38,0.08);">
          <!-- Header -->
          <tr>
            <td style="padding:22px 28px; background: linear-gradient(90deg,#0b6efd 0%, #0b9efd 100%); color:#ffffff;">
              <table width="100%" role="presentation" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="vertical-align:middle;">
                    <h1 style="margin:0; font-size:20px; font-weight:700; letter-spacing:0.2px; color:#ffffff;">{{ settings('site_name') }}</h1>
                    <div style="margin-top:6px; font-size:13px; color:#e8f3ff;">
                      Your chauffeur request has been received
                    </div>
                  </td>
                  <td style="text-align:right; vertical-align:middle;">
                    <div style="width:48px; height:48px; border-radius:8px; background-color:rgba(255,255,255,0.14); display:inline-block; text-align:center; line-height:48px; font-weight:700;">
                      🚘
                    </div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Body -->
          <tr>
            <td style="padding:24px 28px 12px;">
              <p style="margin:0 0 14px 0; font-size:15px; line-height:1.5;">
                Hello <strong>{{ $booking->full_name }}</strong>,
              </p>

              <p style="margin:0 0 18px 0; font-size:15px; line-height:1.5;">
                We’ve received your Chauffeur booking request. Sit back and relax — we’re on it.
              </p>

              <!-- Booking summary card -->
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="border-radius:10px; background:#f8f9fb; padding:16px; margin-bottom:18px;">
                <tr>
                  <td style="padding:6px 8px; font-size:14px; color:#444;">
                    <strong>Booking ID:</strong> {{ $booking->id }}<br>
                    <strong>Service type:</strong> {{ strtoupper($booking->trip_type) }}<br>
                    <strong>Pickup:</strong> {{ $booking->pickup_date }} {{ $booking->pickup_time }} – {{ $booking->pickup_location }}<br>
                    <strong>Drop-off:</strong> {{ $booking->dropoff_location }}<br>
                    <strong>Vehicle class:</strong> {{ $booking->type }}<br>
                    <strong>Add-ons:</strong> {{ implode(',', array_map(function ($addon) {
                        return $addon['name'];
                    }, $booking->addons ?? [])) }}<br>s
                    <strong>Total paid now:</strong> {{ $booking->total_amount }}
                  </td>
                </tr>
              </table>

              <p style="margin:0 0 20px 0; font-size:15px; line-height:1.5;">
                <strong>Next step:</strong> @if ($booking->payment_status === 'pending') Waiting for payment @elseif ($booking->status === 'pending') Waiting for confirmation @else Chauffeur will be with you soon @endif
              </p>

              <!-- CTA -->
              <table cellpadding="0" cellspacing="0" role="presentation" style="width:100%; margin:14px 0 6px;">
                <tr>
                  <td align="center">
                    <a href="{{ route('frontpage.chauffeur.confirmation', $booking->id) }}" style="display:inline-block; text-decoration:none; padding:12px 22px; border-radius:8px; font-weight:600; font-size:15px; background-color:#0b6efd; color:#ffffff;">
                      View booking
                    </a>
                  </td>
                </tr>
              </table>

              <p style="margin:14px 0 0 0; font-size:13px; color:#666;">
                Need help? <a href="tel:{{settings('contact_phone')}}" style="color:#0b6efd; text-decoration:none;">{{settings('contact_phone')}}</a> | 
                <a href="mailto:{{ settings('contact_email') }}" style="color:#0b6efd; text-decoration:none;">{{settings('contact_email')}}</a>
              </p>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding:18px 28px 26px; border-top:1px solid #eef1f5; font-size:13px; color:#6b7280;">
              <table width="100%" role="presentation" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="vertical-align:middle;">
                    <div style="font-weight:600; color:#2b2f36;">Thank you,</div>
                    <div style="margin-top:6px;">{{ settings('site_name') }}</div>
                  </td>
                  <td style="text-align:right; vertical-align:middle;">
                    <div style="font-size:12px; color:#98a0aa;">Booking ID: {{ $booking->id }}</div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>

        <!-- Small print -->
        <table width="700" cellpadding="0" cellspacing="0" role="presentation" style="max-width:700px; width:100%; margin-top:10px;">
          <tr>
            <td style="text-align:center; font-size:12px; color:#9aa2ab; padding:6px 12px;">
              If you didn't request this booking, please contact support immediately: <a href="mailto:{{ settings('contact_email') }}" style="color:#0b6efd;">{{ settings('contact_email') }}</a>.
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>
</body>
</html>
