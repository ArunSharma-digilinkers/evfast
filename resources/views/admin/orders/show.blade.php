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

                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-3">
                    @csrf
                    <select name="status" class="form-select w-25 d-inline-block">
                        <option value="pending" {{ $order->status=='pending' ? 'selected' : '' }}>Pending</option>
                        <option value="completed" {{ $order->status=='completed' ? 'selected' : '' }}>Completed</option>
                        <option value="canceled" {{ $order->status=='canceled' ? 'selected' : '' }}>Canceled</option>
                    </select>
                    <button class="btn btn-success">Update Status</button>
                </form>

            </div>
        </div>

    </div>
</div>
@endsection
