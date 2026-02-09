@extends('layouts.main')

@section('content')
<div class="main-wrapper">
    <div class="container py-4">

        <a href="{{ route('user.dashboard') }}" class="text-decoration-none mb-3 d-inline-block">
            <i class="fas fa-arrow-left me-1"></i> Back to Orders
        </a>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold mb-0">Order #{{ $order->id }}</h3>
            @php
                $statusColors = [
                    'pending' => 'warning',
                    'completed' => 'success',
                    'canceled' => 'danger',
                ];
                $color = $statusColors[$order->status] ?? 'secondary';
            @endphp
            <span class="badge bg-{{ $color }} fs-6 px-3 py-2">{{ ucfirst($order->status ?? 'pending') }}</span>
        </div>

        <div class="row g-4">

            {{-- Order Items --}}
            <div class="col-lg-8">
                <div class="border rounded p-4 mb-4">
                    <h5 class="fw-bold mb-3">Order Items</h5>

                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Product</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-end">Base Price</th>
                                    <th class="text-end">GST</th>
                                    <th class="text-end">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order->items as $item)
                                <tr>
                                    <td>
                                        @if($item->product)
                                            <a href="{{ route('product.show', $item->product->slug) }}" class="text-decoration-none text-dark fw-semibold">
                                                {{ $item->product->name }}
                                            </a>
                                        @else
                                            <span class="text-muted">Product unavailable</span>
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $item->quantity }}</td>
                                    <td class="text-end">₹{{ number_format($item->base_price * $item->quantity, 2) }}</td>
                                    <td class="text-end">₹{{ number_format($item->gst_amount, 2) }}</td>
                                    <td class="text-end fw-semibold">₹{{ number_format($item->total_price, 2) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Price Breakdown --}}
                <div class="border rounded p-4">
                    <h5 class="fw-bold mb-3">Price Breakdown</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Subtotal</span>
                        <span>₹{{ number_format($order->subtotal, 2) }}</span>
                    </div>

                    @if($order->discount_amount > 0)
                    <div class="d-flex justify-content-between mb-2 text-success">
                        <span>Discount</span>
                        <span>- ₹{{ number_format($order->discount_amount, 2) }}</span>
                    </div>
                    @endif

                    @if($order->gst_total > 0)
                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">GST</span>
                        <span>+ ₹{{ number_format($order->gst_total, 2) }}</span>
                    </div>
                    @endif

                    <div class="d-flex justify-content-between mb-2">
                        <span class="text-muted">Shipping</span>
                        @if($order->shipping_amount > 0)
                            <span>₹{{ number_format($order->shipping_amount, 2) }}</span>
                        @else
                            <span class="text-success">Free</span>
                        @endif
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between">
                        <span class="fw-bold fs-5">Total</span>
                        <span class="fw-bold fs-5">₹{{ number_format($order->total_amount) }}</span>
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">

                {{-- Order Info --}}
                <div class="border rounded p-4 mb-4">
                    <h5 class="fw-bold mb-3">Order Info</h5>

                    <div class="mb-2">
                        <small class="text-muted">Order Date</small>
                        <div>{{ $order->created_at->format('d M Y, h:i A') }}</div>
                    </div>

                    <div class="mb-2">
                        <small class="text-muted">Payment Method</small>
                        <div class="text-capitalize">{{ $order->payment_method }}</div>
                    </div>

                    <div class="mb-2">
                        <small class="text-muted">Payment Status</small>
                        <div><span class="badge bg-success">{{ strtoupper($order->payment_status) }}</span></div>
                    </div>

                    <div>
                        <small class="text-muted">Payment ID</small>
                        <div class="text-break" style="font-size: 13px;">{{ $order->payment_id }}</div>
                    </div>
                </div>

                {{-- Delivery Address --}}
                <div class="border rounded p-4">
                    <h5 class="fw-bold mb-3">Delivery Address</h5>

                    <p class="mb-1 fw-semibold">{{ $order->name }}</p>
                    <p class="mb-1">{{ $order->address }}</p>
                    <p class="mb-1">{{ $order->city }}, {{ $order->state }} - {{ $order->pincode }}</p>
                    <p class="mb-0">Phone: {{ $order->phone }}</p>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
