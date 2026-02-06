@extends('layouts.main')

@section('content')
<div class="main-wrapper">
    <div class="container section-entry">

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

                {{-- TITLE --}}
                <h2 class="fw-bold mb-1">{{ $product->name }}</h2>

                <p class="text-muted mb-2">
                    Category: <strong>{{ $product->category->name }}</strong>
                </p>

                {{-- PRICE --}}
                <h3 class="fw-bold text-success mb-1">
                    ₹{{ number_format($product->sale_price ?? $product->price) }}

                    @if($product->sale_price)
                    <span class="text-muted fs-6 text-decoration-line-through ms-2">
                        ₹{{ number_format($product->price) }}
                    </span>
                    @endif
                </h3>

                <p class="text-muted small mb-3">
                    Inclusive of all taxes<br>Free Shipping
                </p>

                {{-- FEATURES (CKEDITOR CONTENT) --}}
                <div class="product-detail-feature mb-3">
                    {!! $product->short_description ?? '<p>N/A</p>' !!}
                </div>

                {{-- ACTION BUTTONS --}}
                <div class="d-flex gap-2 flex-wrap align-items-center mb-4">

                    <form action="{{ route('cart.add', $product->slug) }}" method="POST" class="m-0">
                        @csrf
                        <button type="submit" class="btn-submit">
                            Add to cart
                        </button>
                    </form>

                    <a href="#" class="btn-submit">
                        Buy Now
                    </a>

                    <a href="https://wa.me/918595264742?text={{ urlencode($product->name) }}" target="_blank"
                        class="btn-submit">
                        <i class="fab fa-whatsapp me-1"></i> Any query..?
                    </a>

                </div>

                {{-- ACCORDION --}}
                <div class="accordion" id="productAccordion">

                    {{-- DESCRIPTION --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#desc">
                                Product Description
                            </button>
                        </h2>
                        <div id="desc" class="accordion-collapse collapse show" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                {!! nl2br(e($product->description)) !!}
                            </div>
                        </div>
                    </div>

                    {{-- TECHNICAL FEATURES --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#features">
                                Technical Features
                            </button>
                        </h2>
                        <div id="features" class="accordion-collapse collapse" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                {!! $product->technical_features ?? 'N/A' !!}
                            </div>
                        </div>
                    </div>

                    {{-- WARRANTY --}}
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#warranty">
                                Warranty
                            </button>
                        </h2>
                        <div id="warranty" class="accordion-collapse collapse" data-bs-parent="#productAccordion">
                            <div class="accordion-body">
                                {!! $product->warranty ?? 'N/A' !!}
                            </div>
                        </div>
                    </div>
                      {{-- SHARE BUTTON --}}
                    <div class="mt-4">
                        <button type="button" class="share-btn" onclick="shareProduct()">
                            <i class="fas fa-share-alt me-1"></i> Share
                        </button>
                    </div>

                </div>
            </div>
          

        </div>
        {{-- ADD ONS --}}
        @if(isset($addons) && $addons->count())
        <h3 class="fw-bold mt-5">Add Ons</h3>

        <div class="row g-4 mt-2">
            @foreach($addons as $addon)
            <div class="col-md-4">
                <div class="card text-center p-3 border-success h-100">
                    <img src="{{ asset('storage/products/'.$addon->image) }}" class="img-fluid mb-2">

                    <h6 class="fw-bold">{{ $addon->name }}</h6>

                    <p class="fw-bold text-success mb-1">
                        ₹{{ number_format($addon->sale_price) }}
                        <span class="text-muted text-decoration-line-through small">
                            ₹{{ number_format($addon->price) }}
                        </span>
                    </p>

                    <small class="text-muted">
                        Inclusive of all taxes<br>Free Shipping
                    </small>
                </div>
            </div>
            @endforeach
        </div>
        @endif

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