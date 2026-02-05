@extends('layouts.main')

@section('content')
<div class="main-wrapper">
    <div class="container  section-entry">

        <div class="row g-5">

            {{-- LEFT : IMAGE GALLERY --}}
            <div class="col-md-6 d-flex">

                @php
                $gallery = $product->images ?? [];
                @endphp

                {{-- Thumbnails --}}
                <div class="me-3 d-flex flex-column gap-2">
                    <img src="{{ asset('storage/products/'.$product->image) }}" class="img-thumbnail thumb active-thumb"
                        onclick="changeImage(this)">

                    @foreach($gallery as $img)
                    <img src="{{ asset('storage/products/gallery/'.$img) }}" class="img-thumbnail thumb"
                        onclick="changeImage(this)">
                    @endforeach
                </div>

                {{-- Main Image --}}
                <div class="border rounded p-3 flex-fill text-center">
                    <img id="mainImage" src="{{ asset('storage/products/'.$product->image) }}"
                        class="img-fluid main-img" alt="{{ $product->name }}">
                </div>
            </div>

            {{-- RIGHT : PRODUCT INFO --}}
            <div class="col-md-6">

                <h2 class="fw-bold">{{ $product->name }}</h2>

                <p class="text-muted mb-1">
                    Category: <strong>{{ $product->category->name }}</strong>
                </p>

                {{-- Price --}}
                <h3 class="text-success fw-bold">
                    ₹{{ number_format($product->price) }}
                    @if($product->old_price)
                    <span class="text-muted fs-6 text-decoration-line-through ms-2">
                        ₹{{ number_format($product->old_price) }}
                    </span>
                    <span class="badge bg-success ms-2">Sale</span>
                    @endif
                </h3>

                <p class="text-muted small">Taxes and shipping included</p>

                {{-- Features --}}
                <ul class="list-unstyled my-3 product-detail-feature">
                    <li>Rugged & Durable</li>
                    <li>No Over-Heating Issues</li>
                    <li>Same Day Dispatch</li>
                    <li>Best After Sales Support</li>
                </ul>

                {{-- Quantity --}}
               

                {{-- Buttons --}}
                <form action="{{ route('cart.add', $product->slug) }}" method="POST">
                    @csrf
                    <button class="btn-submit mb-2">
                        Add to cart
                    </button>
                </form>

                {{-- Add Ons --}}
                <div class="accordion mt-3" id="productAccordion">

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#desc">
                                Product Description
                            </button>
                        </h2>
                        <div id="desc" class="accordion-collapse collapse show">
                            <div class="accordion-body">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#features">
                                Technical Features
                            </button>
                        </h2>
                        <div id="features" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                {!! $product->technical_features ?? 'N/A' !!}
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#warranty">
                                Warranty
                            </button>
                        </h2>
                        <div id="warranty" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                {{ $product->warranty ?? '1 Year Manufacturer Warranty' }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


        {{-- VIDEO --}}
        @if($product->youtube_url)
        <div class="ratio ratio-16x9 my-5">
            <iframe src="{{ $product->youtube_url }}" allowfullscreen></iframe>
        </div>
        @endif

    </div>
</div>
{{-- JS --}}
<script>
function changeImage(el) {
    document.getElementById('mainImage').src = el.src;
    document.querySelectorAll('.thumb').forEach(i => i.classList.remove('active-thumb'));
    el.classList.add('active-thumb');
}
</script>

{{-- CSS --}}
<style>
.thumb {
    width: 70px;
    cursor: pointer;
    border: 2px solid transparent;
}

.active-thumb {
    border-color: #198754;
}

.main-img {
    max-height: 420px;
    object-fit: contain;
}
</style>
@endsection