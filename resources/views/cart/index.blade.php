@extends('layouts.main')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">🛒 Your Cart</h2>

    @if(session('cart'))
    @php $grandTotal = 0; @endphp

    <div class="row">
        <!-- Cart Items -->
        <div class="col-lg-8">

            @foreach($cart as $id => $item)
            @php
                $itemTotal = $item['price'] * $item['quantity'];
                $grandTotal += $itemTotal;
            @endphp

            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="row align-items-center">

                        <!-- Product Info -->
                        <div class="col-md-5">
                            <h5 class="fw-semibold mb-1">{{ $item['name'] }}</h5>
                            <small class="text-muted">
                                Price: ₹{{ number_format($item['price']) }}
                            </small>
                        </div>

                        <!-- Quantity -->
                        <div class="col-md-3">
                            <form action="{{ route('cart.update', $id) }}" method="POST" class="d-flex">
                                @csrf
                                <input type="number"
                                       name="quantity"
                                       value="{{ $item['quantity'] }}"
                                       min="1"
                                       class="form-control form-control-sm me-2"
                                       style="max-width:80px">
                                <button class="btn btn-sm btn-outline-primary">
                                    Update
                                </button>
                            </form>
                        </div>

                        <!-- Total -->
                        <div class="col-md-2 fw-bold text-success">
                            ₹{{ number_format($itemTotal) }}
                        </div>

                        <!-- Remove -->
                        <div class="col-md-2 text-end">
                            <a href="{{ route('cart.remove', $id) }}"
                               class="btn btn-sm btn-outline-danger">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
            @endforeach

        </div>

        <!-- Order Summary -->
        <div class="col-lg-4">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Order Summary</h5>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Subtotal</span>
                        <span>₹{{ number_format($grandTotal) }}</span>
                    </div>

                    <div class="d-flex justify-content-between mb-2">
                        <span>Shipping</span>
                        <span class="text-success">Free</span>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5 mb-4">
                        <span>Total</span>
                        <span>₹{{ number_format($grandTotal) }}</span>
                    </div>

                    {{-- 🔐 Flipkart-style button --}}
                    @auth
                        <a href="{{ route('checkout') }}"
                           class="btn btn-success w-100 btn-lg">
                            Proceed to Checkout
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="btn btn-success w-100 btn-lg">
                            Login to Continue
                        </a>

                        <p class="text-center text-muted small mt-2">
                            <a href="{{ route('register') }}">New user?</a> Account will be created during checkout
                        </p>
                    @endauth

                </div>
            </div>
        </div>
    </div>

    @else
    <!-- Empty Cart -->
    <div class="text-center py-5">
        <i class="fas fa-shopping-cart fa-4x text-muted mb-3"></i>
        <h4 class="fw-bold">Your cart is empty</h4>
        <p class="text-muted mb-4">Looks like you haven’t added anything yet</p>
        <a href="{{ url('/') }}" class="btn btn-primary btn-lg">
            Continue Shopping
        </a>
    </div>
    @endif

</div>
@endsection
