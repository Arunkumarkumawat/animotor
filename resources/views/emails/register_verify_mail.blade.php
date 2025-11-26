<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Email Verification OTP</title>
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
      box-shadow: 0 2px 8px rgba(0,0,0,0.05);
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
      <h1>Welcome to {{ settings('site_name') }} 🎉</h1>
    </div>

    <div class="content">
      <h2>Hello User,</h2>
      <p>
        Your verification OTP is: {{ $otp }}
      </p>
      <p>
        Please use the OTP to verify your email address.
      </p>

      <p style="margin-top: 25px;">
        If you didn’t sign up for this account, please ignore this email or contact our support team.
      </p>

      <p>Welcome again, <br> The {{ settings('site_name') }} Team</p>
    </div>

    <div class="footer">
      &copy; {{ date('Y') }} {{ settings('site_name') }}. All rights reserved.<br>
      {{ config('app.url') }}
    </div>
  </div>
</body>
</html>
