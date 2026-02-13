<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<style>
body {
    font-family: DejaVu Sans, sans-serif;
    font-size: 12px;
}

.container {
    width: 100%;
    border: 2px solid #000;
    padding: 10px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #000;
    padding: 6px;
}

.no-border td {
    border: none !important;
}

.center { text-align: center; }
.right { text-align: right; }
.bold { font-weight: bold; }

.title {
    text-align: center;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 5px;
}

.logo {
    height: 60px;
}

.header-table td {
    vertical-align: top;
}
</style>
</head>
<body>

<div class="container">

    <!-- HEADER -->
    <table class="no-border header-table">
        <tr>
            <td width="20%">
              <img src="{{ public_path('img/footer-logo.png') }}" height="60">
            </td>

            <td width="55%">
                <b>Advance Ev Charging Solutions</b><br>
                Regd.Add:- C-68, First Floor,<br>
                Mangolpuri Industrial Area, Phase - I<br>
                Delhi - 110083<br>
                GSTIN/UIN: 07ABPFA6419B1ZK<br>
                State Name : Delhi, Code : 07
            </td>

            <td width="23%" class="right">
                <div class="title">TAX INVOICE</div>
                Invoice No: {{ $order->invoice_number ?? 'INV-'.$order->id }}<br>
                Order Id: #{{ $order->id }}<br>
                Date: {{ date('d-m-Y', strtotime($order->created_at)) }}
            </td>
        </tr>
    </table>

    <br>

    <!-- BILLING & SHIPPING -->
    <table>
        <tr class="bold">
            <th width="50%">Bill To</th>
            <th width="50%">Ship To</th>
        </tr>
        <tr>
            <td>
                {{ $order->name }}<br>
                {{ $order->address }}<br>
                {{ $order->city }} - {{ $order->pincode }}<br>
                State: {{ $order->state }}<br>
                Phone: {{ $order->phone }}<br>
                @if($order->gstin)
                GSTIN: {{ $order->gstin }}
                @endif
            </td>

            <td>
                {{ $order->shipping_name ?? $order->name }}<br>
                {{ $order->shipping_address ?? $order->address }}<br>
                {{ $order->shipping_city ?? $order->city }} - {{ $order->shipping_pincode ?? $order->pincode }}<br>
                State: {{ $order->shipping_state ?? $order->state }}<br>
                Phone: {{ $order->shipping_phone ?? $order->phone }}
            </td>
        </tr>
    </table>

    <br>

    <!-- PRODUCT TABLE -->
    <table>
        <thead>
        <tr class="bold center">
            <th>#</th>
            <th>Description</th>
            <th>HSN</th>
            <th>Qty</th>
            <th>Rate</th>
            <th>Taxable</th>
            <th>GST %</th>
            <th>Total</th>
        </tr>
        </thead>

        <tbody>
        @foreach($order->items as $index => $item)
        <tr>
            <td class="center">{{ $index + 1 }}</td>
            <td>{{ $item->product->name }}</td>
            <td class="center">{{ $item->product->hsn_code }}</td>
            <td class="center">{{ $item->quantity }}</td>
            <td class="right">{{ number_format($item->price,2) }}</td>
            <td class="right">{{ number_format($item->price * $item->quantity,2) }}</td>
            <td class="center">{{ $item->product->gst_percentage }}%</td>
            <td class="right">{{ number_format($item->total_price,2) }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <br>

    @php
        $cgst = $order->gst_total / 2;
        $sgst = $order->gst_total / 2;
    @endphp

    <!-- TOTAL SECTION -->
    <table>
        <tr>
            <td width="65%" class="no-border"></td>
            <td width="35%">
                <table>
                    <tr>
                        <td>Subtotal</td>
                        <td class="right">{{ number_format($order->subtotal,2) }}</td>
                    </tr>
                    <tr>
                        <td>CGST</td>
                        <td class="right">{{ number_format($cgst,2) }}</td>
                    </tr>
                    <tr>
                        <td>SGST</td>
                        <td class="right">{{ number_format($sgst,2) }}</td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td class="right">{{ number_format($order->shipping_amount,2) }}</td>
                    </tr>
                    <tr class="bold">
                        <td>Total</td>
                        <td class="right">₹ {{ number_format($order->total_amount,2) }}</td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>

    <br><br>

    <!-- FOOTER -->
    <table class="no-border">
        <tr>
            <td width="60%">
                <b>Declaration:</b><br>
                1. Goods once sold will not be taken back.<br>
                2. Subject to Delhi jurisdiction.
            </td>

            <td width="40%" class="right">
                For Advance Ev Charging Solutions<br><br><br>
                Authorised Signatory
            </td>
        </tr>
    </table>

</div>

</body>
</html>
