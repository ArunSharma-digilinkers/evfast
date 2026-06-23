@extends('layouts.main')

@section('title', 'Careers at EVFAST | Join Our EV Charging Team')

@section('description', 'Build your career with EVFAST and help shape the future of electric mobility. Explore opportunities and submit your application online.')

@section('keywords', 'EVFAST careers, EV charging jobs, electric mobility careers, EV jobs Delhi')

@section('content')

<main class="career-page">
    <section class="career-hero">
        <div class="container">
            <div class="career-hero-content">
                <nav class="career-breadcrumb" aria-label="Breadcrumb">
                    <ol>
                        <li>
                            <a href="{{ url('/') }}">
                                <i class="fa-solid fa-house" aria-hidden="true"></i>
                                Home
                            </a>
                        </li>
                        <li aria-current="page">Careers</li>
                    </ol>
                </nav>

                <span class="career-eyebrow">
                    <i class="fa-solid fa-bolt"></i>
                    Careers at EVFAST
                </span>
                <h1>Power the future of mobility with us.</h1>
                <p>
                    Join a team building practical, reliable EV charging solutions for a cleaner and
                    better-connected India.
                </p>
                <div class="career-hero-actions">
                    <a href="#apply-now" class="career-primary-btn">
                        View opportunities
                        <i class="fa-solid fa-arrow-down"></i>
                    </a>
                    <a href="{{ url('about-us') }}" class="career-secondary-btn">
                        Learn about EVFAST
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="career-section career-section-soft">
        <div class="container">
            <div class="career-section-heading">
                <span>Why join us</span>
                <h2>Do meaningful work that keeps India moving</h2>
                <p>
                    We bring together technical thinking, customer focus and a shared belief that
                    dependable charging infrastructure can accelerate electric mobility.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <article class="career-benefit-card">
                        <div class="career-benefit-icon">
                            <i class="fa-solid fa-chart-line"></i>
                        </div>
                        <h3>Learn and grow</h3>
                        <p>Build hands-on expertise while working across a fast-evolving clean-energy industry.</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6">
                    <article class="career-benefit-card">
                        <div class="career-benefit-icon">
                            <i class="fa-solid fa-lightbulb"></i>
                        </div>
                        <h3>Build useful solutions</h3>
                        <p>Turn practical ideas into products and services that solve real charging challenges.</p>
                    </article>
                </div>

                <div class="col-lg-4 col-md-6">
                    <article class="career-benefit-card">
                        <div class="career-benefit-icon">
                            <i class="fa-solid fa-people-group"></i>
                        </div>
                        <h3>Work as one team</h3>
                        <p>Collaborate in an environment built on ownership, respect and clear communication.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="career-section career-application-wrap" id="apply-now">
        <div class="container">
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-5">
                    <aside class="career-application-info">
                        <span class="small-title">Your next move</span>
                        <h2>Find your place at EVFAST</h2>
                        <p>
                            Tell us what you do best and where you would like to contribute. If your
                            experience matches an opening, our team will get in touch.
                        </p>

                        <ul class="career-steps">
                            <li>
                                <span class="career-step-number">1</span>
                                <div>
                                    <strong>Share your profile</strong>
                                    <p>Complete the short application and attach your latest resume.</p>
                                </div>
                            </li>
                            <li>
                                <span class="career-step-number">2</span>
                                <div>
                                    <strong>Application review</strong>
                                    <p>Our team reviews your skills and experience against available roles.</p>
                                </div>
                            </li>
                            <li>
                                <span class="career-step-number">3</span>
                                <div>
                                    <strong>Let's talk</strong>
                                    <p>Shortlisted candidates will be contacted for the next conversation.</p>
                                </div>
                            </li>
                        </ul>
                    </aside>
                </div>

                <div class="col-lg-7">
                    <div class="career-form-card">
                        <h2>Apply to join our team</h2>
                        <p class="form-intro">Fields marked with an asterisk are required.</p>

                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                <i class="fa-solid fa-circle-check me-2"></i>{{ session('success') }}
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger" role="alert">
                                <strong>Please check your application:</strong>
                                <ul class="mb-0 mt-2 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="career-name" class="form-label">Full name *</label>
                                    <input id="career-name" type="text" name="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ old('name') }}" placeholder="Your full name" maxlength="255" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="career-email" class="form-label">Email address *</label>
                                    <input id="career-email" type="email" name="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        value="{{ old('email') }}" placeholder="you@example.com" maxlength="255" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="career-phone" class="form-label">Phone number *</label>
                                    <input id="career-phone" type="tel" name="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        value="{{ old('phone') }}" placeholder="+91 98765 43210" maxlength="20" required>
                                    @error('phone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="career-position" class="form-label">Position applying for *</label>
                                    <input id="career-position" type="text" name="position"
                                        class="form-control @error('position') is-invalid @enderror"
                                        value="{{ old('position') }}" placeholder="e.g. Service Engineer" maxlength="150" required>
                                    @error('position')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="career-resume" class="form-label">Resume *</label>
                                    <input id="career-resume" type="file" name="resume"
                                        class="form-control @error('resume') is-invalid @enderror"
                                        accept=".pdf,.doc,.docx" required>
                                    <small class="career-file-note">PDF, DOC or DOCX only. Maximum file size: 2 MB.</small>
                                    @error('resume')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="career-message" class="form-label">Cover note</label>
                                    <textarea id="career-message" name="message"
                                        class="form-control @error('message') is-invalid @enderror"
                                        placeholder="Briefly tell us about your experience and why you would like to join EVFAST."
                                        maxlength="3000">{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12 pt-2">
                                    <button type="submit" class="career-submit-btn">
                                        Submit application
                                        <i class="fa-solid fa-arrow-right ms-2"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

@endsection
