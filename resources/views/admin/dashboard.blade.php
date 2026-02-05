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
                        <h3>125</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-success">
                    <div class="stat-icon"><i class="fas fa-shopping-cart"></i></div>
                    <div>
                        <h6>Active Orders</h6>
                        <h3>78</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-warning">
                    <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                    <div>
                        <h6>Revenue</h6>
                        <h3>$12,450</h3>
                    </div>
                </div>
            </div>

            <div class="col-xl-3 col-md-6">
                <div class="stat-card bg-danger">
                    <div class="stat-icon"><i class="fas fa-headset"></i></div>
                    <div>
                        <h6>Support Tickets</h6>
                        <h3>9</h3>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="card shadow-sm mb-4">
            <div class="card-header bg-white fw-bold">
                <i class="fas fa-clock me-2"></i> Recent Activities
            </div>
            <div class="card-body table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>User</th>
                            <th>Activity</th>
                            <th>Date</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John Doe</td>
                            <td>Logged in</td>
                            <td>Jan 24, 2026</td>
                            <td><span class="badge bg-success">Success</span></td>
                        </tr>
                        <tr>
                            <td>Jane Smith</td>
                            <td>Updated Profile</td>
                            <td>Jan 23, 2026</td>
                            <td><span class="badge bg-info">Info</span></td>
                        </tr>
                        <tr>
                            <td>Mike Johnson</td>
                            <td>Created Order</td>
                            <td>Jan 22, 2026</td>
                            <td><span class="badge bg-warning text-dark">Pending</span></td>
                        </tr>
                    </tbody>
                </table>
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
