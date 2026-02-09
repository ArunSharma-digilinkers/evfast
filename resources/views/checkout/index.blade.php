@extends('layouts.main')

@section('content')
<div class="container py-5">

    <h2 class="fw-bold mb-4">Checkout</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="row">
        <!-- Billing Details -->
        <div class="col-lg-7">
            <div class="card shadow-sm mb-4">
                <div class="card-body">

                    <h5 class="fw-bold mb-3">Billing Details</h5>

                    <form id="checkout-form" action="{{ route('checkout.place') }}" method="POST">
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
                                <input type="text" name="pincode" class="form-control" required>
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

                        <!-- Razorpay Hidden Fields -->
                        <input type="hidden" name="payment_method" value="razorpay">
                        <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">

                        <!-- Razorpay Button -->
                        <button type="button"
                            class="btn btn-primary w-100 mt-4"
                            onclick="payWithRazorpay()">
                            Pay Securely (Razorpay)
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

<!-- Razorpay Script -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
function payWithRazorpay() {

    let name = document.querySelector('[name="name"]').value;
    let phone = document.querySelector('[name="phone"]').value;
    let email = document.querySelector('[name="email"]').value;

    if (!name || !phone || !email) {
        alert('Please fill billing details first');
        return;
    }

    let options = {
        key: "{{ config('services.razorpay.key') }}",
        amount: "{{ $total * 100 }}", // in paise
        currency: "INR",
        name: "EVFAST",
        description: "Order Payment",
        handler: function (response) {
            document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
            document.getElementById('checkout-form').submit();
        },
        prefill: {
            name: name,
            email: email,
            contact: phone
        },
        theme: {
            color: "#0d6efd"
        }
    };

    let rzp = new Razorpay(options);
    rzp.open();
}
</script>
@endsection
