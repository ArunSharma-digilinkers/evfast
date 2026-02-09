@extends('layouts.admin')

@section('title','Orders')

@section('content')
<div class="main-wrapper py-4">
    <div class="container-fluid">
        <h2 class="mb-4">All Orders</h2>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Date & Time</th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($orders as $order)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>₹{{ number_format($order->total_amount) }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->created_at }}</td>
                            <td>
                                <span class="badge 
                                    {{ $order->status == 'pending' ? 'bg-warning' : '' }}
                                    {{ $order->status == 'completed' ? 'bg-success' : '' }}
                                    {{ $order->status == 'canceled' ? 'bg-danger' : '' }}">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}"
                                    class="btn btn-sm btn-primary">View</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">No orders found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>
@endsection