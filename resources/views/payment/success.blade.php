@extends('layouts.main')

@section('content')

<div class="main-wrapper">
<div class="container success-wrapper">
    <div class="success-card">

        <!-- Header -->
        <div class="success-header">
            <div class="success-icon">✓</div>
            <h2>Payment Successful</h2>
            <p>Your order has been placed successfully. A confirmation will be sent to your email.</p>
        </div>

        <!-- Order Details -->
        <div class="info-box">
            <h5 class="fw-bold mb-3">Order Details</h5>

            <div class="info-row">
                <span>Order ID</span>
                <span>#{{ $order->id }}</span>
            </div>

            <div class="info-row">
                <span>Payment ID</span>
                <span>{{ $order->payment_id }}</span>
            </div>

            <div class="info-row">
                <span>Payment Method</span>
                <span class="text-capitalize">{{ $order->payment_method }}</span>
            </div>

            <div class="info-row">
                <span>Payment Status</span>
                <span class="badge bg-success">{{ strtoupper($order->payment_status) }}</span>
            </div>

            <div class="info-row total-row">
                <span>Total Amount</span>
                <span>₹{{ number_format($order->total_amount) }}</span>
            </div>
        </div>

        <!-- Customer Details -->
        <div class="info-box">
            <h5 class="fw-bold mb-3">Customer Details</h5>

            <div class="info-row">
                <span>Name</span>
                <span>{{ $order->name }}</span>
            </div>

            <div class="info-row">
                <span>Email</span>
                <span>{{ $order->email }}</span>
            </div>

            <div class="info-row">
                <span>Phone</span>
                <span>{{ $order->phone }}</span>
            </div>

            <div class="info-row">
                <span>Address</span>
                <span>{{ $order->address }}</span>
            </div>
        </div>

        <!-- Buttons -->
        <div class="action-buttons">
            <a href="{{ url('/') }}" class="btn btn-submit">
                Continue Shopping
            </a>
            @auth
                @if($order->invoice_number)
                    <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-outline-success">
                        <i class="fas fa-file-pdf me-1"></i> Download Invoice
                    </a>
                @endif
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-submit">
                        View Order
                    </a>
                @else
                    <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-submit">
                        View Order
                    </a>
                @endif
            @endauth
        </div>

    </div>
</div>

</div>
@endsection