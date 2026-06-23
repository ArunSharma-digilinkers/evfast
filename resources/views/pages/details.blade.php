@extends('layouts.main')

@section('title', $blogs->title ?: $blogs->post_title)

@section('description', $blogs->description ?: \Illuminate\Support\Str::limit(strip_tags($blogs->blog_post), 155))

@section('keywords', $blogs->tags ?? '')

@section('content')

<main class="blog-detail-page">
    <header class="blog-detail-hero">
        <div class="container">
            <nav class="blog-detail-breadcrumb" aria-label="Breadcrumb">
                <ol>
                    <li>
                        <a href="{{ url('/') }}">
                            <i class="fa-solid fa-house" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li><a href="{{ route('blog') }}">Blog</a></li>
                    <li aria-current="page">{{ \Illuminate\Support\Str::limit($blogs->post_title, 45) }}</li>
                </ol>
            </nav>

            <div class="blog-detail-heading">
                @if ($blogs->category)
                    <span class="blog-detail-category">{{ $blogs->category }}</span>
                @endif

                <h1>{{ $blogs->post_title }}</h1>

                <div class="blog-detail-meta">
                    <span>
                        <i class="fa-regular fa-calendar"></i>
                        {{ $blogs->created_at->format('d M Y') }}
                    </span>

                    @if ($blogs->author)
                        <span>
                            <i class="fa-regular fa-user"></i>
                            {{ $blogs->author }}
                        </span>
                    @endif

                    <span>
                        <i class="fa-regular fa-clock"></i>
                        {{ max(1, ceil(str_word_count(strip_tags($blogs->blog_post)) / 200)) }} min read
                    </span>
                </div>
            </div>
        </div>
    </header>

    <article class="blog-detail-section">
        <div class="container">
            <div class="blog-detail-layout">
                @if ($blogs->featured_image)
                    <figure class="blog-detail-image">
                        <img src="{{ asset('storage/blog/' . $blogs->featured_image) }}"
                            alt="{{ $blogs->post_title }}">
                    </figure>
                @endif

                <div class="blog-detail-content">
                    {!! $blogs->blog_post !!}
                </div>

                <footer class="blog-detail-footer">
                    @if ($blogs->tags)
                        <div class="blog-detail-tags">
                            <strong>Topics:</strong>
                            @foreach (array_filter(array_map('trim', explode(',', $blogs->tags))) as $tag)
                                <span>{{ $tag }}</span>
                            @endforeach
                        </div>
                    @endif

                    <div class="blog-detail-navigation">
                        <a href="{{ route('blog') }}">
                            <i class="fa-solid fa-arrow-left"></i>
                            Back to all articles
                        </a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
</main>

@endsection
