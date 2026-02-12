<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice {{ $order->invoice_number }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; color: #333; line-height: 1.5; }

        .invoice-wrapper { padding: 30px; }

        /* Header */
        .header { display: table; width: 100%; margin-bottom: 30px; border-bottom: 2px solid #2563eb; padding-bottom: 15px; }
        .header-left { display: table-cell; width: 50%; vertical-align: top; }
        .header-right { display: table-cell; width: 50%; vertical-align: top; text-align: right; }
        .company-name { font-size: 22px; font-weight: bold; color: #2563eb; margin-bottom: 5px; }
        .company-detail { font-size: 10px; color: #666; }
        .invoice-title { font-size: 26px; font-weight: bold; color: #2563eb; }

        /* Invoice Info */
        .info-section { display: table; width: 100%; margin-bottom: 25px; }
        .info-left { display: table-cell; width: 50%; vertical-align: top; }
        .info-right { display: table-cell; width: 50%; vertical-align: top; text-align: right; }
        .info-label { font-size: 10px; color: #999; text-transform: uppercase; letter-spacing: 0.5px; }
        .info-value { font-size: 12px; font-weight: bold; margin-bottom: 8px; }

        /* Bill To */
        .bill-to { background: #f8f9fa; padding: 15px; border-radius: 5px; margin-bottom: 25px; }
        .bill-to-title { font-size: 10px; color: #999; text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px; }

        /* Items Table */
        .items-table { width: 100%; border-collapse: collapse; margin-bottom: 25px; }
        .items-table thead th { background: #2563eb; color: #fff; padding: 10px 8px; font-size: 10px; text-transform: uppercase; letter-spacing: 0.5px; text-align: left; }
        .items-table thead th.text-right { text-align: right; }
        .items-table thead th.text-center { text-align: center; }
        .items-table tbody td { padding: 10px 8px; border-bottom: 1px solid #eee; font-size: 11px; }
        .items-table tbody td.text-right { text-align: right; }
        .items-table tbody td.text-center { text-align: center; }

        /* Summary */
        .summary-section { display: table; width: 100%; margin-bottom: 30px; }
        .summary-spacer { display: table-cell; width: 55%; }
        .summary-box { display: table-cell; width: 45%; }
        .summary-row { display: table; width: 100%; margin-bottom: 5px; }
        .summary-label { display: table-cell; width: 60%; padding: 5px 0; color: #666; }
        .summary-value { display: table-cell; width: 40%; padding: 5px 0; text-align: right; }
        .summary-total { border-top: 2px solid #2563eb; margin-top: 5px; padding-top: 8px; }
        .summary-total .summary-label,
        .summary-total .summary-value { font-size: 14px; font-weight: bold; color: #2563eb; }

        /* Footer */
        .footer { border-top: 1px solid #eee; padding-top: 15px; text-align: center; color: #999; font-size: 10px; }
        .footer p { margin-bottom: 3px; }

        .text-success { color: #16a34a; }
    </style>
</head>
<body>
    <div class="invoice-wrapper">

        {{-- Header --}}
        <div class="header">
            <div class="header-left">
                <div class="company-name">{{ config('invoice.company_name', 'EVFAST') }}</div>
                @if(config('invoice.company_address'))
                    <div class="company-detail">{{ config('invoice.company_address') }}</div>
                @endif
                @if(config('invoice.company_phone'))
                    <div class="company-detail">Phone: {{ config('invoice.company_phone') }}</div>
                @endif
                @if(config('invoice.company_email'))
                    <div class="company-detail">Email: {{ config('invoice.company_email') }}</div>
                @endif
                @if(config('invoice.company_gstin'))
                    <div class="company-detail"><strong>GSTIN:</strong> {{ config('invoice.company_gstin') }}</div>
                @endif
                @if(config('invoice.company_pan'))
                    <div class="company-detail"><strong>PAN:</strong> {{ config('invoice.company_pan') }}</div>
                @endif
            </div>
            <div class="header-right">
                <div class="invoice-title">INVOICE</div>
            </div>
        </div>

        {{-- Invoice Info --}}
        <div class="info-section">
            <div class="info-left">
                <div class="info-label">Invoice Number</div>
                <div class="info-value">{{ $order->invoice_number }}</div>

                <div class="info-label">Invoice Date</div>
                <div class="info-value">{{ $order->created_at->format('d M Y') }}</div>

                <div class="info-label">Order ID</div>
                <div class="info-value">#{{ $order->id }}</div>
            </div>
            <div class="info-right">
                <div class="info-label">Payment Method</div>
                <div class="info-value">{{ strtoupper($order->payment_method) }}</div>

                <div class="info-label">Payment ID</div>
                <div class="info-value" style="font-size: 10px;">{{ $order->payment_id }}</div>

                <div class="info-label">Payment Status</div>
                <div class="info-value text-success">{{ strtoupper($order->payment_status) }}</div>
            </div>
        </div>

        {{-- Bill To / Ship To --}}
        <div style="display: table; width: 100%; margin-bottom: 25px;">
            <div style="display: table-cell; width: {{ $order->has_separate_shipping ? '50%' : '100%' }}; vertical-align: top;">
                <div class="bill-to" style="margin-bottom: 0; {{ $order->has_separate_shipping ? 'margin-right: 10px;' : '' }}">
                    <div class="bill-to-title">Bill To</div>
                    <strong>{{ $order->name }}</strong><br>
                    {{ $order->email }} | {{ $order->phone }}<br>
                    {{ $order->address }}<br>
                    {{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}
                    @if($order->gstin)
                        <br><strong>GSTIN:</strong> {{ $order->gstin }}
                    @endif
                </div>
            </div>
            @if($order->has_separate_shipping)
            <div style="display: table-cell; width: 50%; vertical-align: top;">
                <div class="bill-to" style="margin-bottom: 0; margin-left: 10px;">
                    <div class="bill-to-title">Ship To</div>
                    <strong>{{ $order->shipping_name }}</strong><br>
                    {{ $order->shipping_phone }}<br>
                    {{ $order->shipping_address }}<br>
                    {{ $order->shipping_city }}, {{ $order->shipping_state }} - {{ $order->shipping_pincode }}
                </div>
            </div>
            @endif
        </div>

        {{-- Items Table --}}
        @php $hasSerials = $order->items->contains(fn($i) => $i->serial_number); @endphp
        <table class="items-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Product</th>
                    @if($hasSerials)
                        <th>Serial No.</th>
                    @endif
                    <th class="text-center">Qty</th>
                    <th class="text-right">Base Price</th>
                    <th class="text-center">GST %</th>
                    <th class="text-right">GST Amt</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $index => $item)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $item->product->name ?? 'Product' }}</td>
                    @if($hasSerials)
                        <td>{{ $item->serial_number ?? '—' }}</td>
                    @endif
                    <td class="text-center">{{ $item->quantity }}</td>
                    <td class="text-right">{{ number_format($item->base_price * $item->quantity, 2) }}</td>
                    <td class="text-center">{{ $item->gst_percentage }}%</td>
                    <td class="text-right">{{ number_format($item->gst_amount, 2) }}</td>
                    <td class="text-right">{{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Summary --}}
        <div class="summary-section">
            <div class="summary-spacer"></div>
            <div class="summary-box">
                <div class="summary-row">
                    <div class="summary-label">Subtotal</div>
                    <div class="summary-value">{{ number_format($order->subtotal, 2) }}</div>
                </div>

                @if($order->discount_amount > 0)
                <div class="summary-row">
                    <div class="summary-label text-success">
                        Discount
                        @if($order->coupon)
                            ({{ $order->coupon->code }})
                        @endif
                    </div>
                    <div class="summary-value text-success">- {{ number_format($order->discount_amount, 2) }}</div>
                </div>
                @endif

                <div class="summary-row">
                    <div class="summary-label">Shipping</div>
                    <div class="summary-value">
                        @if($order->shipping_amount > 0)
                            {{ number_format($order->shipping_amount, 2) }}
                        @else
                            Free
                        @endif
                    </div>
                </div>

                @if($order->gst_total > 0)
                <div class="summary-row">
                    <div class="summary-label">
                        GST
                        @if($order->shipping_gst > 0)
                            (incl. shipping GST {{ number_format($order->shipping_gst, 2) }})
                        @endif
                    </div>
                    <div class="summary-value">+ {{ number_format($order->gst_total, 2) }}</div>
                </div>
                @endif

                <div class="summary-row summary-total">
                    <div class="summary-label">Grand Total</div>
                    <div class="summary-value">INR {{ number_format($order->total_amount, 2) }}</div>
                </div>
            </div>
        </div>

        {{-- Amount in Words --}}
        <div style="margin-bottom: 25px; font-size: 11px;">
            <strong>Amount in Words:</strong> INR {{ number_format($order->total_amount, 2) }}
        </div>

        {{-- Footer --}}
        <div class="footer">
            <p><strong>Thank you for your purchase!</strong></p>
            <p>This is a computer-generated invoice and does not require a signature.</p>
            @if(config('invoice.company_gstin'))
                <p>{{ config('invoice.company_name') }} | GSTIN: {{ config('invoice.company_gstin') }}</p>
            @endif
        </div>

    </div>
</body>
</html>
