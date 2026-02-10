@extends('layouts.admin')

@section('title','Order Details')

@section('content')
<div class="main-wrapper py-4">
    <div class="container-fluid">
        <h2 class="mb-4">Order #{{ $order->id }} Details</h2>

        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h5>Customer Info</h5>
                <p><strong>Name:</strong> {{ $order->name }}</p>
                <p><strong>Email:</strong> {{ $order->email }}</p>
                <p><strong>Phone:</strong> {{ $order->phone }}</p>
                <p><strong>Address:</strong> {{ $order->address }}</p>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <h5>Order Items</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($order->items as $item)
                        <tr>
                            <td>{{ $item->product->name ?? 'Deleted Product' }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>₹{{ number_format($item->price) }}</td>
                            <td>₹{{ number_format($item->price * $item->quantity) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="mt-3 fw-bold fs-5">
                    Total: ₹{{ number_format($order->total_amount) }}
                </div>

                <div class="mt-3 d-flex align-items-center gap-2 flex-wrap">
                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="d-flex align-items-center gap-2">
                        @csrf
                        <select name="status" class="form-select d-inline-block" style="width: auto;">
                            <option value="pending" {{ $order->status=='pending' ? 'selected' : '' }}>Pending</option>
                            <option value="dispatched" {{ $order->status=='dispatched' ? 'selected' : '' }}>Dispatched</option>
                            <option value="completed" {{ $order->status=='completed' ? 'selected' : '' }}>Completed</option>
                            <option value="canceled" {{ $order->status=='canceled' ? 'selected' : '' }}>Canceled</option>
                        </select>
                        <button class="btn btn-success">Update Status</button>
                    </form>

                    @if($order->invoice_number)
                        <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-outline-success">
                            <i class="fas fa-file-pdf me-1"></i> Download Invoice
                        </a>
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
