@extends('layouts.main')
@section('content')

<div class="main-wrapper">

    <div class="new-arrival-wrapper section-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="sub-title">Future-Ready Charging Solutions</span>
                    <h2>Gun Holder </h2>
                </div>
                <div class="inner-product-grid">
    @forelse($products as $product)

        <a href="{{ route('product.show', $product->slug) }}"
           class="product-card-link">

            <div class="product-card">

                {{-- New Badge --}}
                @if($product->is_new)
                    <div class="product-badge">New</div>
                @endif

                {{-- Product Image --}}
                <div class="product-img">
                    <img src="{{ $product->image
                        ? asset('storage/products/'.$product->image)
                        : asset('img/no-image.png') }}"
                         alt="{{ $product->name }}">
                </div>

                <div class="product-body">
                    <h4 class="product-title">{{ $product->name }}</h4>

                    <p class="product-desc">
                        {{ Str::limit(strip_tags($product->description), 80) }}
                    </p>
                </div>

            </div>
        </a>

    @empty
        <p class="text-center w-100">No products found in this category.</p>
    @endforelse
</div>



            </div>

        </div>
    </div>


</div>

@endsection