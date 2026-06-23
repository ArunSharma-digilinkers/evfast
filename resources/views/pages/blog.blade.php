@extends('layouts.main')

@section('title', 'EV Car Charger Blogs & Guides | EVFAST India')

@section('description', 'Read EVFAST EV car charger blogs, tips and complete guides on portable, AC and DC charging solutions for smarter electric mobility.')

@section('keywords', 'EV charger blog, EV charging guides, portable EV charger tips, AC charger, DC charger, EVFAST India')

@section('content')

<main class="blog-page">
    <section class="blog-hero">
        <div class="container">
            <nav class="blog-breadcrumb" aria-label="Breadcrumb">
                <ol>
                    <li>
                        <a href="{{ url('/') }}">
                            <i class="fa-solid fa-house" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li aria-current="page">Blog</li>
                </ol>
            </nav>

            <div class="blog-hero-content">
                <span class="blog-eyebrow">
                    <i class="fa-solid fa-bolt"></i>
                    EVFAST knowledge hub
                </span>
                <h1>Ideas and guides for smarter EV charging</h1>
                <p>
                    Practical advice, product insights and electric-mobility updates to help you
                    understand charging and make confident decisions.
                </p>
            </div>
        </div>
    </section>

    <section class="blog-index-section">
        <div class="container">
            @if ($blogs->isNotEmpty())
                <div class="blog-section-heading blog-section-heading-top">
                    <div>
                        <span>From the EVFAST team</span>
                        <h2>Latest articles</h2>
                    </div>
                    <p>Explore charging advice, EV technology and helpful ownership guides.</p>
                </div>

                <div class="row g-4">
                    @foreach ($blogs as $item)
                        <div class="col-xl-4 col-md-6">
                            <article class="blog-index-card">
                                <a href="{{ route('details.show', $item->slug) }}"
                                    class="blog-index-image" aria-label="Read {{ $item->post_title }}">
                                    @if ($item->featured_image)
                                        <img src="{{ asset('storage/blog/' . $item->featured_image) }}"
                                            alt="{{ $item->post_title }}" loading="lazy">
                                    @else
                                        <span class="blog-image-placeholder">
                                            <i class="fa-solid fa-bolt"></i>
                                        </span>
                                    @endif

                                    @if ($item->category)
                                        <span class="blog-category-badge">{{ $item->category }}</span>
                                    @endif
                                </a>

                                <div class="blog-index-content">
                                    <div class="blog-meta">
                                        <span>
                                            <i class="fa-regular fa-calendar"></i>
                                            {{ $item->created_at->format('d M Y') }}
                                        </span>
                                        @if ($item->author)
                                            <span>
                                                <i class="fa-regular fa-user"></i>
                                                {{ $item->author }}
                                            </span>
                                        @endif
                                    </div>

                                    <h3>
                                        <a href="{{ route('details.show', $item->slug) }}">
                                            {{ $item->post_title }}
                                        </a>
                                    </h3>

                                    <p>{{ \Illuminate\Support\Str::words(strip_tags($item->blog_post), 20, '...') }}</p>

                                    <a href="{{ route('details.show', $item->slug) }}" class="blog-card-link">
                                        Read more
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </a>
                                </div>
                            </article>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="blog-empty-state">
                    <span><i class="fa-regular fa-newspaper"></i></span>
                    <h2>Fresh EV insights are on the way</h2>
                    <p>We are preparing useful charging guides and electric-mobility updates. Please check back soon.</p>
                    <a href="{{ url('/') }}" class="blog-read-button">Return home</a>
                </div>
            @endif
        </div>
    </section>
</main>

@endsection
