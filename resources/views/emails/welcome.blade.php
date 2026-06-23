<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #0f9b0f; padding: 30px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 24px; }
        .body { padding: 30px; }
        .btn { display: inline-block; background: #0f9b0f; color: #fff; padding: 14px 35px; text-decoration: none; border-radius: 6px; font-weight: bold; font-size: 16px; margin: 20px 0; }
        .info-box { background: #f0faf0; border: 1px solid #c3e6c3; border-radius: 6px; padding: 20px; margin: 20px 0; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to EVFast!</h1>
        </div>

        <div class="body">
            <p>Hi {{ $user->name }},</p>

            <p>Thank you for your purchase. We created an EVFast account for you using the email address from your order.</p>

            <p>With your account you can:</p>

            <ul>
                <li>Track your orders</li>
                <li>Save delivery addresses for faster checkout</li>
                <li>View your purchase history</li>
            </ul>

            <div class="info-box">
                <strong>Your account email:</strong> {{ $user->email }}
            </div>

            <p>To activate your account, create a password using the secure button below:</p>

            <div style="text-align: center;">
                <a href="{{ $resetUrl }}" class="btn">Set Your Password</a>
            </div>

            <p style="color: #666; font-size: 13px;">
                This secure link expires in {{ $expiresInMinutes }} minutes and can be used once.
                If it expires, request a new link using "Forgot Password" on the login page.
            </p>

            <p style="color: #666; font-size: 13px; word-break: break-all;">
                If the button does not work, copy and paste this address into your browser:<br>
                <a href="{{ $resetUrl }}" style="color: #0f9b0f;">{{ $resetUrl }}</a>
            </p>

            <p style="color: #666; font-size: 13px;">
                If you did not place this order, you can safely ignore this email.
            </p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} EVFast. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
