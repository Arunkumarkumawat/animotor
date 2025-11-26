<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        @if ($user->onboarding_status === 'approved')
            Congratulations! Your ANI Motors Partner Account Is Approved 🎉
        @else
            Update on Your ANI Motors Partner Application
        @endif
    </title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f4f6f8;
            margin: 0;
            padding: 0;
        }

        .email-container {
            max-width: 600px;
            margin: 30px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .header {
            background-color: #4f46e5;
            color: #ffffff;
            text-align: center;
            padding: 30px 20px;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px 40px;
            color: #333333;
            line-height: 1.6;
        }

        .content h2 {
            color: #111827;
            font-size: 20px;
            margin-top: 0;
        }

        .status-box {
            background-color: #eef2ff;
            border-left: 4px solid #4f46e5;
            padding: 12px 16px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 14px;
        }

        .reason-box {
            background-color: #fff8e1;
            border-left: 4px solid #f59e0b;
            padding: 12px 16px;
            border-radius: 6px;
            margin-top: 20px;
            font-size: 14px;
            color: #78350f;
        }

        .button {
            display: inline-block;
            background-color: #4f46e5;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-weight: bold;
            margin-top: 20px;
        }

        .footer {
            background-color: #f3f4f6;
            text-align: center;
            padding: 15px;
            font-size: 13px;
            color: #6b7280;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h1>
                @if ($user->onboarding_status === 'approved')
                    Congratulations! Your ANI Motors Partner Account Is Approved 🎉
                @else
                    Update on Your ANI Motors Partner Application
                @endif
            </h1>
        </div>

        <div class="content">
            <h2>Hello {{ $user->first_name }},</h2>

            @if ($user->onboarding_status === 'approved')
                <p>
                    We’re pleased to inform you that your onboarding for <strong>{{ $user->company->name }}</strong> has
                    been <strong>approved</strong>.
                    You now have full access to your company dashboard and system features.
                </p>
                <a href="{{ url('/login') }}" class="button">Access Dashboard</a>
            @elseif($user->onboarding_status === 'pending')
                <p>
                    Your onboarding details are currently <strong>under review</strong> by our team.
                    You’ll receive an update once the verification process is complete.
                </p>
                @if ($user->onboarding_rejection_reason)
                    <div class="reason-box">
                        <strong>Note:</strong> {{ $user->onboarding_rejection_reason }}
                    </div>
                @endif
            @elseif($user->onboarding_status === 'rejected')
                <p>
                    We regret to inform you that your onboarding for <strong>{{ $user->company->name }}</strong> was
                    <strong>not approved</strong>.
                    Please review the reason below and update your information for reconsideration.
                </p>
                @if ($user->onboarding_rejection_reason)
                    <div class="reason-box">
                        <strong>Reason:</strong> {{ $user->onboarding_rejection_reason }}
                    </div>
                @endif
                <a href="{{ url('/login') }}" class="button">Update Information</a>
            @endif

            <p style="margin-top: 25px;">
                Kind regards, <br>
                The {{ settings('site_name') }} Team
            </p>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} {{ settings('site_name') }}. All rights reserved.<br>
            {{ config('app.url') }}
        </div>
    </div>
</body>

</html>
