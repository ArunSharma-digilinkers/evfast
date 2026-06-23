<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 12px;
            color: #111;
        }

        .container {
            box-sizing: border-box;
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
        .nowrap { white-space: nowrap; }

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
            Regd. Add.: C-68, First Floor,<br>
            Mangolpuri Industrial Area, Phase - I<br>
            Delhi - 110083<br>
            GSTIN/UIN: 07ABPFA6419B1ZK<br>
            State: Delhi, Code: 07
        </td>

        <td width="30%" class="right">
            <div class="title">TAX INVOICE</div>
            Invoice No: {{ $order->invoice_number ?? 'INV-'.$order->id }}<br>
            Order Id: #{{ $order->id }}<br>
            Date: {{ $order->created_at->format('d-m-Y') }}
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
$placeOfSupplyState = $order->shipping_state ?: $order->state;

if (!empty($placeOfSupplyState)) {
    $customerStateCode = strtolower(trim($placeOfSupplyState)) === 'delhi' ? '07' : 'other';
} elseif (!empty($order->gstin)) {
    $customerStateCode = substr($order->gstin, 0, 2);
} else {
    $customerStateCode = 'other';
}

$isIntraState = $customerStateCode === $companyStateCode;

if ($isIntraState) {
    $cgst = $order->gst_total / 2;
    $sgst = $order->gst_total / 2;
    $igst = 0;
} else {
    $cgst = 0;
    $sgst = 0;
    $igst = $order->gst_total;
}

$shippingGstRate = $order->shipping_amount > 0 && $order->shipping_gst > 0
    ? ($order->shipping_gst / $order->shipping_amount) * 100
    : 0;
@endphp

<!-- PRODUCT TABLE -->
<table>
    <tr class="bold center">
        <th>Description</th>
        <th>HSN</th>
        <th>GST %</th>
        <th>Taxable Rate</th>
        <th>Qty</th>
        <th>Taxable Value</th>
    </tr>

    @foreach($order->items as $item)
    <tr class="center">
        <td style="text-align:left;">
            <b>{{ $item->product?->name ?? 'Product' }}</b>
            @if(!empty($item->serial_number))
                <br>Serial No: {{ $item->serial_number }}
            @endif
        </td>

        <td>{{ $item->product?->hsn_code ?? '-' }}</td>
        <td>{{ rtrim(rtrim(number_format($item->gst_percentage, 2), '0'), '.') }}%</td>
        <td>{{ number_format($item->base_price, 2) }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ number_format(($item->base_price * $item->quantity) - $item->discount_amount, 2) }}</td>
    </tr>
    @endforeach

    <!-- SHIPPING FIX -->
    @if($order->shipping_amount > 0)
    <tr class="center">
        <td style="text-align:left;"><b>Shipping Charges</b></td>
        <td>9967</td>
        <td>{{ rtrim(rtrim(number_format($shippingGstRate, 2), '0'), '.') }}%</td>
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

                @if($order->discount_amount > 0)
                    <tr>
                        <td>Discount</td>
                        <td class="right">- {{ number_format($order->discount_amount, 2) }}</td>
                    </tr>
                @endif

                <tr>
                    <td>Shipping</td>
                    <td class="right">{{ number_format($order->shipping_amount,2) }}</td>
                </tr>

                @if($isIntraState)
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
                    <td class="right nowrap">&#8377; {{ number_format($order->total_amount, 2) }}</td>
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
