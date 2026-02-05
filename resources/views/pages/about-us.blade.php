@extends('layouts.main')
@section('content')

<div class="main-wrapper">

    <div class="banner-wrapper">
        <img src="{{ asset('img/about-banner.jpg') }}" alt="" class="img-fluid">
    </div>

    <div class="about-wrapper section-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <h2>About Us</h2>
                    <p>
                        We are EVFAST
                        Advance EV Charging Solutions has started an unswerving foundation named EV-Fast & EV-Fast App
                        that has stepped into the smart realm of Electronic Vehicle Charging Stations and AC & DC Fast
                        EV Chargers. The company aims to deliver end-to-end electrical infrastructure for reliable
                        charging services to electric vehicles.
                    </p>
                    <p>
                        Advance EV Charging Solutions aims to build the network of Smart open Charging Stations which
                        will allow users to seamlessly charge their EVs. This will include 2-wheelers, 3-wheelers,
                        4-wheelers and all commercial vehicles.
                    </p>
                    <p>
                        Advance EV Charging Solutions R&D team works continuously on further improving the effective
                        combination of individual components, in order to establish high-yield and optimally coordinated
                        efficient Electric Vehicle (EV) charging systems in the first instance in the market. We only
                        use the best components and equipment available. As an independent company we design, install
                        and maintain EV chargers.
                    </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="{{ asset('img/about-img.jpg') }}" alt="" class="img-fluid">
                </div>
            </div>
        </div>
    </div>

    <section class="cta-section">
        <h2>Power the Future with Smart EV Charging</h2>
        <p class="text-white">Fast, reliable, and future-ready EV charging solutions for homes, businesses, and fleets.
        </p>
        <div class="cta-btns">
            <a href="tel:+91-8595264742" class="btn-outline">Talk to an Expert</a>
        </div>
    </section>
      <div class="why-us section-entry">
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

                <div class="col-lg-3 col-md-6 mb-3">
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
</div>

@endsection