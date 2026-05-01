@extends('layouts.main')

@section('title', 'Career')

@section('description', '')

@section('keywords', '')

@section('content')

<div class="main-wrapper">

    <!-- Hero Section -->
    <section class="career-hero text-center py-5">
        <div class="container">
            <h1 class="fw-bold mb-3">Build Your Future With Us</h1>
            <p class="lead">
                Join our team of innovators and help power the future with reliable energy solutions.
            </p>
        </div>
    </section>

    <!-- Why Join Us -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-4 mb-4">
                    <h4>Growth Opportunities</h4>
                    <p>Continuous learning and career advancement programs.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Innovative Culture</h4>
                    <p>Work with modern technologies and creative teams.</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Supportive Environment</h4>
                    <p>We value teamwork, respect, and collaboration.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="card shadow p-4">
                        <h3 class="mb-4 fw-bold">Apply Now</h3>

                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif

                        <form action="{{ route('career.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Full Name *</label>
                                    <input type="text" name="name" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Email *</label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Phone *</label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label>Position Applying For *</label>
                                    <input type="text" name="position" class="form-control" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Upload Resume (PDF/DOC/DOCX) *</label>
                                    <input type="file" name="resume" class="form-control" required>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label>Cover Letter</label>
                                    <textarea name="message" rows="4" class="form-control"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn-submit px-4">
                                        Submit Application
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                 <div class="career-img"></div>
                </div>
            </div>

        </div>
    </section>

</div>

@endsection