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

            <p>Thank you for your purchase! An account has been created for you on EVFast. With your account you can:</p>

            <ul>
                <li>Track your orders</li>
                <li>Save delivery addresses for faster checkout</li>
                <li>View your purchase history</li>
            </ul>

            <div class="info-box">
                <strong>Your account email:</strong> {{ $user->email }}
            </div>

            <p>To get started, please set your password by clicking the button below:</p>

            <div style="text-align: center;">
                <a href="{{ $resetUrl }}" class="btn">Set Your Password</a>
            </div>

            <p style="color: #666; font-size: 13px;">This link will expire in 60 minutes. If it expires, you can use the "Forgot Password" option on the login page.</p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} EVFast. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
