@extends('layouts.main')

@section('content')
<div class="main-wrapper">
    <div class="container py-4">

        {{-- User Header --}}
        <div class="d-flex align-items-center gap-3 mb-4">
            <img src="{{ auth()->user()->avatar_url }}" alt="{{ auth()->user()->name }}"
                 class="rounded-circle" style="width: 60px; height: 60px; object-fit: cover;">
            <div>
                <h4 class="fw-bold mb-0">{{ auth()->user()->name }}</h4>
                <span class="text-muted">{{ auth()->user()->email }}</span>
            </div>
        </div>

        {{-- Nav Tabs --}}
        <ul class="nav nav-tabs mb-4">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('user.dashboard') }}">My Orders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('user.addresses.index') }}">Addresses</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('profile.edit') }}">Profile</a>
            </li>
        </ul>

        {{-- Orders Table --}}
        @if($orders->count())
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Order #</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        <tr>
                            <td class="fw-semibold">#{{ $order->id }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td>{{ $order->items->count() }} item(s)</td>
                            <td class="fw-bold">₹{{ number_format($order->total_amount) }}</td>
                            <td>
                                @php
                                    $statusColors = [
                                        'pending' => 'warning',
                                        'completed' => 'success',
                                        'canceled' => 'danger',
                                    ];
                                    $color = $statusColors[$order->status] ?? 'secondary';
                                @endphp
                                <span class="badge bg-{{ $color }}">{{ ucfirst($order->status ?? 'pending') }}</span>
                            </td>
                            <td>
                                <a href="{{ route('user.orders.show', $order->id) }}" class="btn btn-sm btn-outline-success" style="border-radius: 50px;">
                                    View
                                </a>
                                @if($order->invoice_number && in_array($order->status, ['dispatched', 'completed']))
                                    <a href="{{ route('invoice.download', $order->id) }}" class="btn btn-sm btn-outline-danger" style="border-radius: 50px;" title="Download Invoice">
                                        <i class="fas fa-file-pdf"></i>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{ $orders->links() }}
        @else
            <div class="text-center py-5">
                <i class="fas fa-shopping-bag fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">No orders yet</h5>
                <p class="text-muted">Start shopping to see your orders here.</p>
                <a href="{{ url('/') }}" class="btn-submit">Shop Now</a>
            </div>
        @endif

    </div>
</div>
@endsection
