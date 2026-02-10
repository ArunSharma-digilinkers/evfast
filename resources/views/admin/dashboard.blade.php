@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')

<div class="main-wrapper py-4">
    <div class="container-fluid">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold mb-0">Dashboard</h2>
                <small class="text-muted">Overview & statistics</small>
            </div>
            <div class="text-end">
                <span class="badge bg-light text-dark px-3 py-2 shadow-sm">
                    👋 Welcome, <strong>{{ auth()->user()->name }}</strong>
                </span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-primary">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div>
                        <h6>Total Users</h6>
                        <h3>{{ number_format($totalUsers) }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-success">
                    <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                    <div>
                        <h6>Total Orders</h6>
                        <h3>{{ number_format($totalOrders) }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-warning">
                    <div class="stat-icon"><i class="fas fa-rupee-sign"></i></div>
                    <div>
                        <h6>Revenue</h6>
                        <h3>{{ $revenue > 0 ? '₹' . number_format($revenue) : '₹0' }}</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-danger">
                    <div class="stat-icon"><i class="fas fa-box-open"></i></div>
                    <div>
                        <h6>Total Products</h6>
                        <h3>{{ number_format($totalProducts) }}</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Secondary Stats -->
        <div class="row g-4 mb-4">
            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-info">
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                    <div>
                        <h6>Pending Orders</h6>
                        <h3>{{ number_format($pendingOrders) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-secondary">
                    <div class="stat-icon"><i class="fas fa-tags"></i></div>
                    <div>
                        <h6>Categories</h6>
                        <h3>{{ number_format($totalCategories) }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('admin.abandoned-checkouts.index') }}" class="text-decoration-none">
                    <div class="stat-card bg-dark">
                        <div class="stat-icon"><i class="fas fa-cart-arrow-down"></i></div>
                        <div>
                            <h6>Abandoned Checkouts</h6>
                            <h3>{{ number_format($abandonedCheckouts) }}</h3>
                        </div>
                    </div>
                </a>
            </div>
        </div>

        <!-- Recent Orders -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">
                <i class="fas fa-clock me-2"></i> Recent Orders
            </div>
            <div class="card-body table-responsive">
                @if($recentOrders->count())
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Order #</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentOrders as $order)
                        @php
                            $statusColors = [
                                'pending' => 'warning',
                                'dispatched' => 'info',
                                'completed' => 'success',
                                'canceled' => 'danger',
                            ];
                            $color = $statusColors[$order->status] ?? 'secondary';
                        @endphp
                        <tr>
                            <td class="fw-semibold">#{{ $order->id }}</td>
                            <td>{{ $order->name }}</td>
                            <td class="fw-bold">₹{{ number_format($order->total_amount) }}</td>
                            <td>{{ $order->created_at->format('d M Y') }}</td>
                            <td><span class="badge bg-{{ $color }}">{{ ucfirst($order->status ?? 'pending') }}</span></td>
                            <td>
                                <a href="{{ route('admin.orders.show', $order->id) }}" class="btn btn-sm btn-outline-success" style="border-radius: 50px;">View</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @else
                <p class="text-muted text-center py-3 mb-0">No orders yet.</p>
                @endif
            </div>
        </div>

        <!-- Charts -->
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-chart-line me-2"></i> Sales Overview
                    </div>
                    <div class="card-body">
                        <canvas id="salesChart" height="130"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-user-plus me-2"></i> User Registrations
                    </div>
                    <div class="card-body">
                        <canvas id="userChart" height="130"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
