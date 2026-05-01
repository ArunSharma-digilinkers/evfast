@extends('layouts.main')

@section('content')
<div class="main-wrapper section-entry">
    <div class="container">

        <div class="row g-5">

     <div class="col-md-6 product-gallery">

    @php
        $gallery = $product->images ?? [];
    @endphp

    <div class="d-flex flex-row flex-md-row gap-3">

       <!-- MAIN THUMB -->
<img src="{{ asset('storage/products/' . $product->image) }}"
     class="thumb active-thumb mb-2"
     data-src="{{ asset('storage/products/' . $product->image) }}"
     data-index="0" loading="lazy">

<!-- GALLERY -->
@foreach ($gallery as $index => $img)
<img src="{{ asset('storage/products/gallery/' . $img) }}"
     class="thumb"
     data-src="{{ asset('storage/products/gallery/' . $img) }}"
     data-index="{{ $index + 1 }}" loading="lazy">
@endforeach
        </div>

        <!-- MAIN SLIDER -->
        <div class="main-slider position-relative flex-fill text-center">

            <img id="mainImage" class="img-fluid main-img" loading="lazy">

            <!-- PREV -->
            <button class="slider-btn prev">‹</button>

            <!-- NEXT -->
            <button class="slider-btn next">›</button>

            <!-- ZOOM ICON -->
            <span class="zoom-icon">
                <i class="fas fa-search-plus"></i>
            </span>
        </div>

    </div>


<!-- MODAL -->
<div class="modal fade" id="imageModal">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content bg-transparent border-0">

            <button class="btn-close position-absolute end-0 m-3 bg-white" data-bs-dismiss="modal"></button>

            <div class="text-center">
                <img id="modalImage" class="img-fluid">
            </div>

        </div>
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
                <div class="mb-1">
                    <h3 class="fw-bold text-success d-inline mb-0">
                        ₹{{ number_format($product->price) }}
                    </h3>

                    @if ($product->sale_price && $product->sale_price > $product->price)

                    <span class="text-muted fs-6 text-decoration-line-through ms-2">
                        ₹{{ number_format($product->sale_price) }}
                    </span>

                    @php
                    $discountPct = floor(
                    (($product->sale_price - $product->price) / $product->sale_price) * 100
                    );
                    @endphp

                    <span class="badge bg-danger ms-2">{{ $discountPct }}% off</span>

                    @endif

                </div>

                <p class="text-muted small mb-3">
                    @if ($product->gst_percentage > 0)
                    @if ($product->gst_type === 'inclusive')
                    Inclusive of GST ({{ rtrim(rtrim(number_format($product->gst_percentage, 2), '0'), '.') }}%)
                    @else
                    + {{ rtrim(rtrim(number_format($product->gst_percentage, 2), '0'), '.') }}% GST extra
                    @endif
                    @else
                    Price inclusive of all taxes
                    @endif
                    <br>
                    @php
                    $shipping = strtolower($product->shipping_type ?? '');
                    @endphp

                    @if($shipping === 'free')
                    Free Shipping
                    @elseif($shipping === 'zone')
                    Shipping charges extra
                    @else
                    Shipping charges extra
                    @endif
                </p>

                {{-- FEATURES (CKEDITOR CONTENT) --}}
                <div class="product-detail-feature mb-3">
                    {!! $product->short_description ?? '<p>N/A</p>' !!}
                </div>

                @if ($product->quantity > 0)
                {{-- QUANTITY --}}
                <div id="cart-actions" class="mb-4">
                    <div class="d-flex align-items-center gap-3 mb-3">
                        <label class="fw-semibold mb-0">Qty:</label>
                        <div class="d-flex align-items-center border rounded">
                            <button type="button" class="btn btn-sm px-3 py-1" onclick="changeQty(-1)">−</button>
                            <input type="number" id="product-qty" value="1" min="1" max="{{ $product->quantity }}"
                                class="form-control form-control-sm text-center border-0" style="width: 50px;" readonly>
                            <button type="button" class="btn btn-sm px-3 py-1" onclick="changeQty(1)">+</button>
                        </div>
                        <small class="text-muted">{{ $product->quantity }} in stock</small>
                    </div>

                    {{-- ACTION BUTTONS --}}
                    <div class="d-flex gap-2 flex-wrap align-items-center">

                        <button type="button" class="btn-submit" id="add-to-cart-btn" onclick="addToCart()">
                            Add to cart
                        </button>

                        <button type="button" class="btn-submit" onclick="buyNow()">
                            Buy Now
                        </button>

                    </div>
                </div>
                @else
                {{-- OUT OF STOCK --}}
                <div class="mb-4">
                    <span class="badge bg-danger fs-6 px-3 py-2 mb-3">Out of Stock</span>
                    <div class="d-flex gap-2 flex-wrap align-items-center">
                        <a href="https://wa.me/918595264742?text={{ urlencode('Enquiry about ' . $product->name . ' (Out of Stock)') }}"
                            target="_blank" class="btn-submit">
                            <i class="fab fa-whatsapp me-1"></i> Notify me when available
                        </a>
                    </div>
                </div>
                @endif

                {{-- CART SUCCESS MESSAGE (hidden by default) --}}
                <div id="cart-success-msg" class="mb-4" style="display: none;">
                    <div class="alert alert-success d-flex align-items-center gap-2 mb-3">
                        <i class="fas fa-check-circle"></i>
                        <span>Product added to cart!</span>
                    </div>
                    <div class="d-flex gap-2 flex-wrap">
                        <a href="{{ route('cart.index') }}" class="btn-submit">
                            <i class="fas fa-shopping-cart me-1"></i> Go to Cart
                        </a>
                        <a href="{{ route('category.products', $product->category->slug)
                            }}" class="btn-submit">
                            Keep Shopping
                        </a>
                    </div>
                </div>

                {{-- PRODUCT ACCORDION --}}
                <div class="accordion product-accordion" id="productAccordion">

                    {{-- DESCRIPTION --}}
                    @if(!empty(strip_tags($product->description)))
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#desc">
                                Product Description
                            </button>
                        </h2>

                        <div id="desc" class="accordion-collapse collapse show desktop-show">
                            <div class="accordion-body">

                                <div class="description-wrapper">
                                    <div class="short-text" id="productDescription">
                                        {!! $product->description !!}
                                    </div>

                                    <button class="btn btn-link p-0 read-more-btn d-none" id="readMoreBtn"
                                        onclick="toggleDescription(this)">
                                        Read More
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- TECHNICAL FEATURES --}}
                    @if(!empty($product->technical_features))
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#features">
                                Technical Features
                            </button>
                        </h2>
                        <div id="features" class="accordion-collapse collapse desktop-show">
                            <div class="accordion-body">
                                {!! $product->technical_features !!}
                            </div>
                        </div>
                    </div>
                    @endif

                    {{-- WARRANTY --}}
                    @if(!empty($product->warranty))
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse"
                                data-bs-target="#warranty">
                                Warranty
                            </button>
                        </h2>
                        <div id="warranty" class="accordion-collapse collapse desktop-show">
                            <div class="accordion-body">
                                {!! $product->warranty !!}
                            </div>
                        </div>
                    </div>
                    @endif

                </div>

                {{-- SHARE BUTTON --}}
                <div class="mt-4">
                    <button type="button" class="share-btn" onclick="shareProduct()">
                        <i class="fas fa-share-alt me-1"></i> Share
                    </button>
                </div>
            </div>


        </div>
        {{-- ADD ON PRODUCTS --}}
        @if ($product->addons->count())
        <h3 class="fw-bold mt-5">Add-on Products</h3>

        <div class="row g-4 mt-2">
            @foreach ($product->addons as $addon)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="{{ route('product.show', $addon->slug) }}" class="text-decoration-none text-dark">
                    <div class="card text-center p-3 h-100 addon-card border border-success rounded">
                        <img src="{{ asset('storage/products/' . $addon->image) }}" class="img-fluid mb-3"
                            alt="{{ $addon->name }}" style="height: 180px; object-fit: contain;" loading="lazy">

                        <h6 class="fw-bold mb-2">{{ $addon->name }}</h6>

                        <p class="mb-0">
                            <span class="fw-bold text-success">₹{{ number_format($addon->price) }}</span>
                            @if ($addon->sale_price && $addon->sale_price > $addon->price)
                            <span
                                class="text-muted text-decoration-line-through small ms-1">₹{{ number_format($addon->sale_price) }}</span>
                            @endif
                        </p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
        @endif

        {{-- VIDEO --}}
        @if ($product->youtube_url)
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

function shareProduct() {
    if (navigator.share) {
        navigator.share({
            title: "{{ $product->name }}",
            text: "Check out this product",
            url: "{{ url()->current() }}"
        });
    } else {
        navigator.clipboard.writeText("{{ url()->current() }}");
        alert('Product link copied!');
    }
}

function changeQty(delta) {
    let input = document.getElementById('product-qty');
    let max = parseInt(input.getAttribute('max')) || 999;
    let val = parseInt(input.value) + delta;
    if (val < 1) val = 1;
    if (val > max) val = max;
    input.value = val;
}

function buyNow() {
    let qty = document.getElementById('product-qty').value;

    fetch("{{ route('cart.add', $product->slug) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                quantity: qty
            }),
        })
        .then(res => res.json().then(data => ({
            ok: res.ok,
            data
        })))
        .then(({
            ok,
            data
        }) => {
            if (ok && data.success) {
                window.location.href = "{{ route('checkout') }}";
            } else {
                alert(data.message || 'Something went wrong.');
            }
        })
        .catch(() => {
            alert('Something went wrong. Please try again.');
        });
}

function addToCart() {
    let btn = document.getElementById('add-to-cart-btn');
    let qty = document.getElementById('product-qty').value;
    btn.disabled = true;
    btn.textContent = 'Adding...';

    fetch("{{ route('cart.add', $product->slug) }}", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                quantity: qty
            }),
        })
        .then(res => res.json().then(data => ({
            ok: res.ok,
            data
        })))
        .then(({
            ok,
            data
        }) => {
            if (ok && data.success) {
                document.getElementById('cart-actions').style.display = 'none';
                document.getElementById('cart-success-msg').style.display = 'block';
            } else {
                btn.disabled = false;
                btn.textContent = 'Add to cart';
                alert(data.message || 'Something went wrong.');
            }
        })
        .catch(() => {
            btn.disabled = false;
            btn.textContent = 'Add to cart';
            alert('Something went wrong. Please try again.');
        });
}
</script>

{{-- CSS --}}
<style>
.thumbs {
    width: 80px;
}

.thumb {
    width: 100%;
    height: 70px;
    object-fit: cover;
    cursor: pointer;
    border: 2px solid transparent;
    border-radius: 5px;
}

.active-thumb {
    border-color: #198754;
}

/* MAIN IMAGE */
.main-img {
    max-height: 420px;
    object-fit: contain;
    cursor: zoom-in;
}

/* SLIDER BUTTONS */
.slider-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.5);
    color: #fff;
    border: none;
    font-size: 30px;
    padding: 5px 12px;
    cursor: pointer;
    z-index: 2;
}

.prev { left: 10px; }
.next { right: 10px; }

/* ZOOM ICON */
.zoom-icon {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(0,0,0,0.6);
    color: #fff;
    padding: 8px;
    border-radius: 50%;
}

/* MOBILE */
@media (max-width: 767px) {
    .thumbs {
        flex-direction: row !important;
        width: 100%;
    }

    .thumb {
        width: 60px;
        height: 60px;
    }
}

/* Chrome, Safari, Edge */
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>
@endsection