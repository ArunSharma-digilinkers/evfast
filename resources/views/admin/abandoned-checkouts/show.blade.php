@extends('layouts.admin')

@section('title', 'Abandoned Checkout Details')

@section('content')
<div class="main-wrapper py-4">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Abandoned Checkout #{{ $checkout->id }}</h2>
            <a href="{{ route('admin.abandoned-checkouts.index') }}" class="btn btn-outline-secondary" style="border-radius: 50px;">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>

        <div class="row g-4">
            {{-- Customer Info --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-user me-2"></i> Customer Info
                    </div>
                    <div class="card-body">
                        <p><strong>Name:</strong> {{ $checkout->name }}</p>
                        <p><strong>Email:</strong> <a href="mailto:{{ $checkout->email }}">{{ $checkout->email }}</a></p>
                        <p><strong>Phone:</strong> <a href="tel:{{ $checkout->phone }}">{{ $checkout->phone }}</a></p>
                        @if($checkout->address)
                            <p><strong>Address:</strong> {{ $checkout->address }}</p>
                        @endif
                        @if($checkout->city || $checkout->state)
                            <p><strong>Location:</strong> {{ $checkout->city }}{{ $checkout->city && $checkout->state ? ', ' : '' }}{{ $checkout->state }} {{ $checkout->pincode }}</p>
                        @endif
                        @if($checkout->user)
                            <p><strong>Registered User:</strong> Yes (ID: {{ $checkout->user_id }})</p>
                        @else
                            <p><strong>Registered User:</strong> <span class="text-muted">Guest</span></p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Status & Summary --}}
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-info-circle me-2"></i> Summary
                    </div>
                    <div class="card-body">
                        <p><strong>Total Amount:</strong> <span class="fw-bold fs-5">₹{{ number_format($checkout->total_amount) }}</span></p>
                        @if($checkout->coupon_code)
                            <p><strong>Coupon Used:</strong> <span class="badge bg-info">{{ $checkout->coupon_code }}</span></p>
                        @endif
                        <p><strong>Abandoned At:</strong> {{ $checkout->created_at->format('d M Y, h:i A') }}</p>
                        <p><strong>Time Since:</strong> {{ $checkout->created_at->diffForHumans() }}</p>
                        <hr>
                        <p>
                            <strong>Status:</strong>
                            @if($checkout->recovered)
                                <span class="badge bg-success">Recovered</span>
                                @if($checkout->recovered_order_id)
                                    — <a href="{{ route('admin.orders.show', $checkout->recovered_order_id) }}">
                                        View Order #{{ $checkout->recovered_order_id }}
                                    </a>
                                @endif
                            @else
                                <span class="badge bg-danger">Not Recovered</span>
                            @endif
                        </p>
                    </div>
                </div>
            </div>

            {{-- Cart Items --}}
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-white fw-bold">
                        <i class="fas fa-shopping-cart me-2"></i> Cart Items
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(is_array($checkout->cart_data))
                                    @foreach($checkout->cart_data as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $item['name'] ?? 'Unknown' }}</td>
                                            <td>{{ $item['quantity'] ?? 1 }}</td>
                                            <td>₹{{ number_format($item['price'] ?? 0) }}</td>
                                            <td class="fw-bold">₹{{ number_format(($item['price'] ?? 0) * ($item['quantity'] ?? 1)) }}</td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No cart data available</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="col-12">
                <form action="{{ route('admin.abandoned-checkouts.destroy', $checkout->id) }}" method="POST"
                      onsubmit="return confirm('Delete this abandoned checkout record?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" style="border-radius: 50px;">
                        <i class="fas fa-trash me-1"></i> Delete Record
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection
