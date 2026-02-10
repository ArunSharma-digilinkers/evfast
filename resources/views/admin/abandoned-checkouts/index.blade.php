@extends('layouts.admin')

@section('title', 'Abandoned Checkouts')

@section('content')
<div class="main-wrapper py-4">
    <div class="container-fluid">
        <h2 class="mb-4">Abandoned Checkouts</h2>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Stats Row --}}
        <div class="row g-3 mb-4">
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center py-3">
                    <div class="card-body">
                        <h3 class="fw-bold text-danger mb-1">{{ $totalAbandoned }}</h3>
                        <small class="text-muted">Total Abandoned</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center py-3">
                    <div class="card-body">
                        <h3 class="fw-bold text-success mb-1">{{ $totalRecovered }}</h3>
                        <small class="text-muted">Recovered</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card border-0 shadow-sm text-center py-3">
                    <div class="card-body">
                        <h3 class="fw-bold text-primary mb-1">{{ $recoveryRate }}%</h3>
                        <small class="text-muted">Recovery Rate</small>
                    </div>
                </div>
            </div>
        </div>

        <div class="card shadow-sm">
            <div class="card-body table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Total</th>
                            <th>Items</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($checkouts as $checkout)
                            <tr>
                                <td>{{ $loop->iteration + ($checkouts->currentPage() - 1) * $checkouts->perPage() }}</td>
                                <td>{{ $checkout->name }}</td>
                                <td>{{ $checkout->email }}</td>
                                <td>{{ $checkout->phone }}</td>
                                <td class="fw-bold">₹{{ number_format($checkout->total_amount) }}</td>
                                <td>{{ is_array($checkout->cart_data) ? count($checkout->cart_data) : 0 }} items</td>
                                <td>
                                    @if($checkout->recovered)
                                        <span class="badge bg-success">Recovered</span>
                                    @else
                                        <span class="badge bg-danger">Abandoned</span>
                                    @endif
                                </td>
                                <td>{{ $checkout->created_at->format('d M Y, h:i A') }}</td>
                                <td>
                                    <a href="{{ route('admin.abandoned-checkouts.show', $checkout->id) }}"
                                       class="btn btn-sm btn-outline-success" style="border-radius: 50px;">View</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center text-muted py-4">No abandoned checkouts yet.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                @if($checkouts->hasPages())
                    <div class="d-flex justify-content-center mt-3">
                        {{ $checkouts->links() }}
                    </div>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection
