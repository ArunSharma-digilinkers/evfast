@extends('layouts.main')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">Checkout</h2>

    <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-7">
            <div class="card shadow-sm mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Billing Details</h5>

                    <form action="{{ route('checkout.place') }}" method="POST">
                        @csrf

                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Full Name *</label>
                                <input type="text" name="name" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Mobile Number *</label>
                                <input type="text" name="phone" class="form-control" maxlength="10" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Email *</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Pincode *</label>
                                <input type="text" name="pincode" class="form-control" maxlength="6" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">State *</label>
                                <input type="text" name="state" class="form-control" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">City *</label>
                                <input type="text" name="city" class="form-control" required>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Full Address *</label>
                                <textarea name="address" rows="3" class="form-control" required></textarea>
                            </div>

                        </div>

                        <button class="btn btn-success w-100 mt-4">
                            Place Order (Cash on Delivery)
                        </button>

                    </form>


                </div>
            </div>
        </div>

        <!-- Order Summary -->
        <div class="col-lg-5">
            <div class="card shadow-sm">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Order Summary</h5>

                    @php $total = 0; @endphp

                    @foreach($cart as $item)
                    @php
                    $itemTotal = $item['price'] * $item['quantity'];
                    $total += $itemTotal;
                    @endphp

                    <div class="d-flex justify-content-between mb-2">
                        <span>{{ $item['name'] }} × {{ $item['quantity'] }}</span>
                        <span>₹{{ number_format($itemTotal) }}</span>
                    </div>
                    @endforeach

                    <hr>

                    <div class="d-flex justify-content-between fw-bold fs-5">
                        <span>Total</span>
                        <span>₹{{ number_format($total) }}</span>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection