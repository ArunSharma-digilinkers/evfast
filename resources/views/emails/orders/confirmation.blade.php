<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <style>
        body { font-family: Arial, sans-serif; line-height: 1.6; color: #333; margin: 0; padding: 0; background: #f4f4f4; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; }
        .header { background: #0f9b0f; padding: 30px; text-align: center; }
        .header h1 { color: #fff; margin: 0; font-size: 24px; }
        .header p { color: rgba(255,255,255,0.9); margin: 5px 0 0; }
        .body { padding: 30px; }
        .order-id { background: #f0faf0; border: 1px solid #0f9b0f; border-radius: 6px; padding: 15px; text-align: center; margin-bottom: 25px; }
        .order-id span { font-size: 20px; font-weight: bold; color: #0f9b0f; }
        table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
        th { background: #f8f9fa; text-align: left; padding: 10px; border-bottom: 2px solid #dee2e6; font-size: 14px; }
        td { padding: 10px; border-bottom: 1px solid #eee; font-size: 14px; }
        .summary-row { display: flex; justify-content: space-between; padding: 6px 0; }
        .summary-label { color: #666; }
        .total-row { border-top: 2px solid #0f9b0f; padding-top: 10px; margin-top: 5px; font-size: 18px; font-weight: bold; }
        .address-box { background: #f8f9fa; border-radius: 6px; padding: 15px; margin-top: 20px; }
        .footer { background: #f8f9fa; padding: 20px; text-align: center; font-size: 12px; color: #999; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Order Confirmed!</h1>
            <p>Thank you for shopping with EVFast</p>
        </div>

        <div class="body">
            <p>Hi {{ $order->name }},</p>
            <p>Your order has been placed successfully. Here are the details:</p>

            <div class="order-id">
                Order <span>#{{ $order->id }}</span>
            </div>

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

            <div style="text-align: right;">
                <div class="summary-row">
                    <span class="summary-label">Subtotal:</span>
                    <span>{{ number_format($order->subtotal, 2) }}</span>
                </div>

                @if($order->discount_amount > 0)
                <div class="summary-row" style="color: #0f9b0f;">
                    <span>Discount:</span>
                    <span>- {{ number_format($order->discount_amount, 2) }}</span>
                </div>
                @endif

                @if($order->gst_total > 0)
                <div class="summary-row">
                    <span class="summary-label">GST:</span>
                    <span>+ {{ number_format($order->gst_total, 2) }}</span>
                </div>
                @endif

                @if($order->shipping_amount > 0)
                <div class="summary-row">
                    <span class="summary-label">Shipping:</span>
                    <span>{{ number_format($order->shipping_amount, 2) }}</span>
                </div>
                @else
                <div class="summary-row">
                    <span class="summary-label">Shipping:</span>
                    <span style="color: #0f9b0f;">Free</span>
                </div>
                @endif

                <div class="total-row">
                    Total: &#8377;{{ number_format($order->total_amount) }}
                </div>
            </div>

            <div class="address-box">
                <strong>Delivery Address:</strong><br>
                {{ $order->name }}<br>
                {{ $order->address }}<br>
                {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}<br>
                Phone: {{ $order->phone }}
            </div>

            <p style="margin-top: 20px;">Payment ID: <strong>{{ $order->payment_id }}</strong></p>
        </div>

        <div class="footer">
            <p>&copy; {{ date('Y') }} EVFast. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
