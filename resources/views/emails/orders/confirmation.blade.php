<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #0f9b0f; padding: 25px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 22px; }
        .body { padding: 30px; }
        .highlight-box { background: #f8f9fa; border-radius: 6px; padding: 20px; text-align: center; margin-bottom: 25px; }
        .highlight-box .amount { font-size: 28px; font-weight: bold; color: #0f9b0f; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th { background: #f8f9fa; text-align: left; padding: 8px; border-bottom: 2px solid #dee2e6; font-size: 13px; }
        td { padding: 8px; border-bottom: 1px solid #eee; font-size: 13px; }
        .btn { display: inline-block; background: #0f9b0f; color: #fff; padding: 12px 30px; text-decoration: none; border-radius: 6px; font-weight: bold; margin-top: 20px; }
        .footer { background: #f8f9fa; padding: 15px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">

        <div class="header">
            <h1>Thank You for Your Order!</h1>
        </div>

        <div class="body">

            <p>Hi <strong>{{ $order->name }}</strong>,</p>

            <p>We’re happy to let you know that your order has been successfully placed.</p>

            <div class="highlight-box">
                <div>Order #{{ $order->id }}</div>
                <div class="amount">&#8377;{{ number_format($order->total_amount) }}</div>
            </div>

            <h3>Order Details</h3>

            <table>
                <thead>
                    <tr>
                        <th>Product</th>
                        <th style="text-align:center">Qty</th>
                        <th style="text-align:right">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name ?? 'Product' }}</td>
                        <td style="text-align:center">{{ $item->quantity }}</td>
                        <td style="text-align:right">{{ number_format($item->total_price, 2) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            <div style="text-align: right; font-size: 14px;">
                <div>Subtotal: &#8377;{{ number_format($order->subtotal, 2) }}</div>

                @if($order->discount_amount > 0)
                <div style="color: #0f9b0f;">Discount: - &#8377;{{ number_format($order->discount_amount, 2) }}</div>
                @endif

                @if($order->gst_total > 0)
                <div>GST: + &#8377;{{ number_format($order->gst_total, 2) }}</div>
                @endif

                <div>Shipping: &#8377;{{ number_format($order->shipping_amount, 2) }}</div>

                <div style="font-size: 18px; font-weight: bold; border-top: 2px solid #333; padding-top: 8px; margin-top: 8px;">
                    Total Paid: &#8377;{{ number_format($order->total_amount) }}
                </div>
            </div>

            <h3>Shipping Address</h3>
            <p>
                {{ $order->address }}<br>
                {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}
            </p>

            <div style="text-align: center;">
                <a href="{{ route('orders.show', $order->id) }}" class="btn">
                    View Your Order
                </a>
            </div>

            <p style="margin-top: 25px;">
                We will notify you once your order has been shipped.
                <br><br>
                If you have any questions, feel free to reply to this email.
            </p>

        </div>

        <div class="footer">
            <p>Thank you for shopping with EVFast ❤️</p>
        </div>

    </div>
</body>
</html>
