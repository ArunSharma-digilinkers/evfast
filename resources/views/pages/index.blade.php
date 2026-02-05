@extends('layouts.main')
@section('content')

<div class="main-wrapper">
  <!-- Start Slider -->
<div id="carouselExampleIndicators"
     class="carousel slide"
     data-bs-ride="carousel"
     data-bs-interval="3000"
     data-bs-pause="hover">

    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"></button>
    </div>

    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('img/portable-charger.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/wall-mount-ev-charger.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/ac-charger.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/EV-accessories.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/30-KW-DC-Charger.jpg') }}" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('img/EV-Charging-Gun.jpg') }}" class="d-block w-100" alt="">
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<!-- End Slider -->



    <div class="hm-product-wrapper section-entry">
        <div class="container-fluid">
            <div class="row align-items-center">

                <!-- LEFT CONTENT -->
                <div class="col-lg-12 mb-4" data-aos="fade-up">
                    <div class="product-intro text-center">
                        <span class="sub-title">Our Range</span>
                        <h2>Smart EV Charging Products</h2>
                        <p>
                            Discover advanced EV chargers and accessories designed
                            for speed, safety, and sustainability.
                        </p>
                    </div>
                </div>

                <!-- RIGHT PRODUCTS -->
                <div class="product-grid" data-aos="fade-up">

                    <a href="{{ url('portable-ev-chargers') }}">
                        <div class="product-card">
                            <img src="{{ asset('img/product/portable-ev-charger.jpg') }}" alt="">
                            <h4>Portable EV Charger</h4>
                        </div>
                    </a>

                    <a href="{{ url('wall-mount-ev-chargers') }}">
                        <div class="product-card">
                            <img src="{{ asset('img/product/wall-mount-ev-charger.jpg') }}" alt="">
                            <h4>Wall Mount EV Charger</h4>
                        </div>
                    </a>

                    <a href="{{ url('ac-chargers') }}">
                        <div class="product-card">
                            <img src="{{ asset('img/product/ac-charger.jpg') }}" alt="">
                            <h4>AC Charger</h4>
                        </div>
                    </a>

                    <a href="{{ url('dc-chargers') }}">
                        <div class="product-card">
                            <img src="{{ asset('img/product/dc-chargers.jpg') }}" alt="">
                            <h4>DC Charger</h4>
                        </div>
                    </a>

                    <a href="{{ url('gun-holders') }}">
                        <div class="product-card">
                            <img src="{{ asset('img/product/gun-holder.jpg') }}" alt="">
                            <h4>Gun Holder</h4>
                        </div>
                    </a>

                    <a href="{{ url('accessories') }}">
                        <div class="product-card">
                            <img src="{{ asset('img/product/accessories.jpg') }}" alt="">
                            <h4>Accessories</h4>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
    <div class="new-arrival-wrapper section-entry" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <span class="sub-title">Future-Ready Charging Solutions</span>
                    <h2>New Arrival</h2>
                </div>
                <div class="inner-product-grid">
                    @foreach($products as $product)

                    <a href="{{ route('product.show', $product->slug) }}" class="product-card-link">
                        <div class="product-card">

                            {{-- New Badge --}}
                            @if($product->is_new)
                            <div class="product-badge new">New</div>
                            @endif

                            {{-- Latest Badge (based on date) --}}
                            @if($product->created_at >= now()->subDays(7))
                            <div class="product-badge latest">New</div>
                            @endif

                            <div class="product-img">
                                <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->name }}">
                            </div>

                            <div class="product-body">
                                <h4 class="product-title">{{ $product->name }}</h4>
                                <p class="product-desc">
                                    {{ Str::limit(strip_tags($product->description), 80) }}
                                </p>
                            </div>

                        </div>
                    </a>

                    @endforeach
                </div>



            </div>
        </div>
    </div>


    <section class="cta-section">
        <h2>Power the Future with Smart EV Charging</h2>
        <p class="text-white">Fast, reliable, and future-ready EV charging solutions for homes, businesses, and fleets.
        </p>
        <div class="cta-btns" data-aos="fade-up">
            <a href="tel: +91-8595264742" class="btn-outline">Talk to an Expert</a>
        </div>
    </section>

    <div class="why-us section-entry" data-aos="fade-up">
        <div class="container">

            <div class="section-heading text-center">
                <h2>Why Choose Us</h2>
                <p>Powering trust with innovation, quality & support</p>
            </div>

            <div class="row">

                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="why-card">
                        <div class="icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Advanced Technology</h4>
                        <p>
                            We use cutting-edge EV and battery technology to deliver
                            high performance and long-lasting solutions.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="why-card">
                        <div class="icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4>Quality & Safety</h4>
                        <p>
                            Every product passes strict quality and safety checks
                            to ensure reliable operation.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="why-card">
                        <div class="icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h4>Strong Support</h4>
                        <p>
                            Dedicated after-sales support with quick response
                            and hassle-free warranty service.
                        </p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="why-card">
                        <div class="icon">
                            <i class="fas fa-leaf"></i>
                        </div>
                        <h4>Eco Friendly</h4>
                        <p>
                            Our products support clean energy adoption
                            and help reduce carbon footprint.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="testimonial-section section-entry" data-aos="fade-up">
        <div class="container">

            <div class="section-heading text-center">
                <h2>What Our Clients Say</h2>
                <p>Trusted EV & Battery Solutions</p>
            </div>

            <div class="owl-carousel testimonial-carousel">

                <div class="testimonial-card">
                    <p>
                        “Excellent EV charger quality and quick installation support.
                        Highly recommended.”
                    </p>

                    <div class="testimonial-user">
                        <img src="{{ asset('img/user.png') }}" alt="">
                        <div>
                            <h5>Rahul Mehta</h5>
                            <span>EV Dealer, Delhi</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <p>
                        “Reliable products with solid performance.
                        Warranty process is very smooth.”
                    </p>

                    <div class="testimonial-user">
                        <img src="{{ asset('img/user.png') }}" alt="">
                        <div>
                            <h5>Ankit Sharma</h5>
                            <span>Fleet Owner, Jaipur</span>
                        </div>
                    </div>
                </div>

                <div class="testimonial-card">
                    <p>
                        “Best after-sales support and premium build quality.”
                    </p>

                    <div class="testimonial-user">
                        <img src="{{ asset('img/user.png') }}" alt="">
                        <div>
                            <h5>Priya Verma</h5>
                            <span>Business Partner, Pune</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>



</div>

@endsection