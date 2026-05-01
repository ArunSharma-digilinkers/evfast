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

        th,
        td {
            border: 1px solid #000;
            padding: 6px;
        }

        th {
            background: #f2f2f2;
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
        }

        .header-table td {
            vertical-align: top;
            padding: 5px;
        }
        
        .footer-table td {
            padding-top: 10px;
            padding-bottom: 5px;
        }

        .footer-table {
            border: none;
        }
    </style>
</head>

<body>

<div class="container">

<!-- HEADER -->
<table class="no-border header-table">
    <tr>
        <td width="20%">
            @if(file_exists(public_path('uploads/footer-logo.png')))
                <img src="{{ public_path('uploads/footer-logo.png') }}" height="80">
            @endif
        </td>

        <td width="50%">
            <b>Advance Ev Charging Solutions</b><br>
            Regd.Add:- C-68, First Floor,<br>
            Mangolpuri Industrial Area, Phase - I<br>
            Delhi - 110083<br>
            GSTIN/UIN: 07ABPFA6419B1ZK<br>
            State Name : Delhi, Code : 07
        </td>

        <td width="30%" class="right">
            <div class="title">TAX INVOICE</div>
            Invoice No: {{ $order->invoice_number ?? 'INV-'.$order->id }}<br>
            Order Id: #{{ $order->id }}<br>
            Date: {{ date('d-m-Y', strtotime($order->created_at)) }}
        </td>
    </tr>
</table>

<br>

<!-- BILL / SHIP -->
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

<!-- GST LOGIC -->
@php
$companyStateCode = '07';

if (!empty($order->gstin)) {
    $customerStateCode = substr($order->gstin, 0, 2);
} elseif (!empty($order->shipping_state)) {
    $customerStateCode = strtolower(trim($order->shipping_state)) === 'delhi' ? '07' : 'other';
} else {
    $customerStateCode = 'other';
}

if ($customerStateCode === $companyStateCode) {
    $cgst = $order->gst_total / 2;
    $sgst = $order->gst_total / 2;
    $igst = 0;
} else {
    $cgst = 0;
    $sgst = 0;
    $igst = $order->gst_total;
}
@endphp

<!-- PRODUCT TABLE -->
<table>
    <tr class="bold center">
        <th>Description</th>
        <th>HSN</th>
        <th>GST %</th>
        <th>Rate (Basic)</th>
        <th>Qty</th>
        <th>Total (Rs.)</th>
    </tr>

    @foreach($order->items as $item)
    <tr class="center">
        <td style="text-align:left;">
            <b>{{ $item->product->name }}</b>
            @if(!empty($item->serial_number))
                <br>Serial No: {{ $item->serial_number }}
            @endif
        </td>

        <td>{{ $item->product->hsn_code }}</td>
        <td>{{ $item->product->gst_percentage }}%</td>
        <td>{{ number_format($item->price,2) }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ number_format($item->total_price,2) }}</td>
    </tr>
    @endforeach

    <!-- SHIPPING FIX -->
    @if($order->shipping_amount > 0)
    <tr class="center">
        <td style="text-align:left;"><b>Shipping Charges</b></td>
        <td>9967</td>
        <td>18%</td>
        <td>{{ number_format($order->shipping_amount,2) }}</td>
        <td>1</td>
        <td>{{ number_format($order->shipping_amount,2) }}</td>
    </tr>
    @endif
</table>

<br>

<!-- TOTAL -->
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
                    <td>Shipping</td>
                    <td class="right">{{ number_format($order->shipping_amount,2) }}</td>
                </tr>

                @if($cgst > 0)
                    <tr>
                        <td>CGST</td>
                        <td class="right">{{ number_format($cgst,2) }}</td>
                    </tr>
                    <tr>
                        <td>SGST</td>
                        <td class="right">{{ number_format($sgst,2) }}</td>
                    </tr>
                @else
                    <tr>
                        <td>IGST</td>
                        <td class="right">{{ number_format($igst,2) }}</td>
                    </tr>
                @endif

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
<table class="footer-table">
    <tr>
        <td width="60%">
            <b>Declaration:</b><br>
            1. Goods once sold will not be taken back.<br>
            2. Subject to Delhi jurisdiction.<br>
            3. This is a computer generated invoice.
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