<!-- Preheader (hidden) -->
<span style="display:none; font-size:1px; color:#ffffff; line-height:1px; max-height:0; max-width:0; opacity:0; overflow:hidden;">
  A new chauffeur booking request requires your attention.
</span>

<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>New Chauffeur Booking Request – {{ $booking->id }}</title>
</head>

<body style="margin:0; padding:0; background:#f3f5f7; font-family:-apple-system, BlinkMacSystemFont,'Segoe UI',Roboto,'Helvetica Neue',Arial,sans-serif; color:#333;">

  <table width="100%" cellpadding="0" cellspacing="0" role="presentation" style="background:#f3f5f7; padding:24px 12px;">
    <tr>
      <td align="center">

        <table width="700" cellpadding="0" cellspacing="0" role="presentation" style="max-width:700px; width:100%; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 6px 18px rgba(33,35,38,0.08);">

          <!-- HEADER -->
          <tr>
            <td style="padding:22px 28px; background:linear-gradient(90deg,#0b6efd 0%,#0b9efd 100%); color:#ffffff;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <h1 style="margin:0; font-size:20px; font-weight:700; color:#ffffff;">
                      {{ settings('site_name') }}
                    </h1>
                    <div style="margin-top:6px; font-size:13px; color:#e8f3ff;">
                      New chauffeur booking request
                    </div>
                  </td>
                  <td style="text-align:right; vertical-align:middle;">
                    <div style="width:48px; height:48px; border-radius:8px; background:rgba(255,255,255,0.14); display:inline-block; line-height:48px; text-align:center; font-size:22px;">
                      📥
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
                Hello <strong>{{ $car->company->name }}</strong>,
              </p>

              <p style="margin:0 0 18px; font-size:15px;">
                A new Chauffeur booking request is waiting for your action.
              </p>

              <!-- Info Card -->
              <table width="100%" cellpadding="0" cellspacing="0" role="presentation" 
                style="background:#f8f9fb; border-radius:10px; padding:16px; margin-bottom:22px;">
                <tr>
                  <td style="padding:6px 8px; font-size:14px; color:#444;">
                    <strong>Booking ID:</strong> {{ $booking->id }}<br>
                    <strong>Service type:</strong> {{ $booking->trip_type }}<br>
                    <strong>Pickup:</strong> {{ $booking->pickup_date }} {{ $booking->pickup_time }} – {{ $booking->pickup_location }}<br>
                    <strong>Drop-off:</strong> {{ $booking->dropoff_location }}<br>
                    <strong>Vehicle class:</strong> {{ $booking->type }}<br>
                    <strong>Add-ons:</strong> {{ implode(',', array_map(function ($addon) {
                        return $addon['name'];
                    }, $booking->addons ?? [])) }}<br>
                  </td>
                </tr>
              </table>

              <!-- CTA -->
              <div style="text-align:center; margin:28px 0 10px;">
                <a href="#" 
                   style="display:inline-block; background:#0b6efd; color:#ffffff; text-decoration:none; padding:12px 22px; border-radius:8px; font-size:14px; font-weight:600;">
                  Open Supplier Portal
                </a>
              </div>

            </td>
          </tr>

          <!-- FOOTER -->
          <tr>
            <td style="padding:18px 28px 26px; border-top:1px solid #eef1f5; font-size:13px; color:#6b7280;">
              <table width="100%" cellpadding="0" cellspacing="0">
                <tr>
                  <td>
                    <div style="font-weight:600; color:#2b2f36;">{{ settings('site_name') }}</div>
                    <div style="margin-top:6px;">Booking ID: {{ $booking->id }}</div>
                  </td>
                  <td style="text-align:right; color:#98a0aa; font-size:12px;">
                    Supplier Notification
                  </td>
                </tr>
              </table>
            </td>
          </tr>

        </table>

        <!-- SMALL PRINT -->
        <table width="700" cellpadding="0" cellspacing="0" style="max-width:700px; width:100%; margin-top:10px;">
          <tr>
            <td style="text-align:center; font-size:12px; color:#9aa2ab; padding:6px 12px;">
              Please respond promptly to maintain service quality.
            </td>
          </tr>
        </table>

      </td>
    </tr>
  </table>

</body>
</html>
