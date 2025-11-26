<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Your Partner Application Is Under Review</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            background: #f6f7fb;
            font-family: Arial, Helvetica, sans-serif;
        }

        a {
            text-decoration: none;
        }

        .wrap {
            max-width: 600px;
            margin: 32px auto;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 6px 18px rgba(0, 0, 0, .06);
        }

        .hdr {
            background: #4F46E5;
            color: #fff;
            padding: 28px 24px;
            text-align: center;
        }

        .hdr h1 {
            margin: 0;
            font-size: 22px;
            line-height: 1.3;
        }

        .badge {
            display: inline-block;
            background: rgba(255, 255, 255, .2);
            border: 1px solid rgba(255, 255, 255, .55);
            color: #fff;
            font-size: 12px;
            padding: 4px 10px;
            border-radius: 999px;
            margin-top: 10px;
        }

        .bd {
            padding: 28px 32px;
            color: #1f2937;
            line-height: 1.6;
        }

        .bd h2 {
            margin: 0 0 8px;
            font-size: 18px;
            color: #111827;
        }

        .muted {
            color: #6b7280;
            font-size: 13px;
        }

        .ftr {
            background: #f9fafb;
            color: #6b7280;
            text-align: center;
            padding: 16px;
            font-size: 12px;
        }

        @media (max-width:620px) {
            .bd {
                padding: 22px;
            }

            .hdr {
                padding: 24px 18px;
            }
        }
    </style>
</head>

<body>
    <div class="wrap">
        <div class="hdr">
            <h1>Your Partner Application Is Under Review</h1>

        </div>

        <div class="bd">
            <h2>Dear {{ $company->name }},</h2>

            <p>
                We’ve received your full application to join <strong>ANI Motors</strong> — thank you for submitting all
                required details.
            </p>

            <p>
                Your application is now under review by our verification team. We’re currently validating your business
                information, vehicle details, and compliance documents to ensure they meet our marketplace standards.
            </p>

            <p>
                You will receive an update within <strong>1–2 business days</strong> regarding your approval status.
            </p>

            <p>
                Thank you for your patience and for choosing ANI Motors as your business partner.
            </p>

            <p style="margin-top:20px;">
                Kind regards, <br>
                ANI Motors Onboarding Team <br>
                📧 onboarding@animotors.co.uk <br>
                🌐 www.animotor.co.uk
            </p>
        </div>

        <div class="ftr">
            &copy; {{ date('Y') }} {{ settings('site_name') }} · {{ config('app.url') }}
        </div>
    </div>
</body>

</html>
