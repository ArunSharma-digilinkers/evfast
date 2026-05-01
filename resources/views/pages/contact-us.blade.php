@extends('layouts.main')

@section('title', 'Contact EVFAST for EV Car Charger Support India')

@section('description', 'Contact EVFAST for EV car charger support. Call +91-8595264742 or email aces@ev-fast.com for sales, service and dealership help.')

@section('keywords', '')

@section('content')

<div class="main-wrapper">

    <div class="banner-wrapper">
        <img src="{{ asset('img/contact-us.jpg') }}" alt="" class="img-fluid">
    </div>

    <div class="contact-wrapper section-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <h3>Get In Touch</h3>
                    <p>Send us your requirement and our team will contact you shortly.</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                       
                    <form class="contact-form" method="POST" action="{{ route('contact.submit') }}">
                        @csrf
                        
                         @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                        @endif
                    
                        <!-- Name -->
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>

                        <!-- Email (Multiple) -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Enter email" required>
                        </div>

                        <!-- Mobile (Multiple) -->
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="tel" name="mobile" placeholder="Enter mobile number" required>
                        </div>

                        <!-- Requirement -->
                        <div class="form-group">
                            <label>Requirement</label>
                            <select name="requirement" required>
                                <option value="">-- Select Requirement --</option>
                                <option value="EV Charger">EV Charger</option>
                                <option value="Portable EV Charger">Portable EV Charger</option>
                                <option value="Commercial Charging Setup">Commercial Charging Setup</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Dealership">Dealership</option>
                                <option value="Distribution">Distribution</option>
                                <option value="Service & Support">Service & Support</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" rows="4" placeholder="Write your message"></textarea>
                        </div>
                         <div class="g-recaptcha" data-sitekey="6LeCALUsAAAAAO8U5-SaU-dDGcE78Tx-N4TVb0K9"></div>
                            @error('captcha')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        <button type="submit" class="btn-submit">
                            Submit Enquiry
                        </button>

                    </form>

                </div>


                <div class="col-lg-6 col-md-12 col-sm-12 mt-3">

                    <div class="contact-info-box">

                        <h4>Contact Information</h4>
                        <p>Reach us directly for sales, support or dealership enquiries.</p>

                        <ul class="contact-info-list">

                            <li>
                                <i class="fas fa-phone"></i>
                                <div>
                                    <strong>Phone</strong>
                                    <span>
                                        +91-8595264742,

                                        +91-9350430777,<br>
                                        +91-9310430888
                                    </span>
                                </div>
                            </li>

                            <li>
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <strong>Email</strong>
                                    <span>
                                        aecs@ev-fast.com
                                    </span><br>
                                    <span>
                                        evjunction02@gmail.com
                                    </span>
                                </div>
                            </li>

                            <li>
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <strong>Office Address</strong>
                                    <span>
                                        121, First Floor, Vardhaman Premium Mall, LSC, Outer Ring Road, Deepali,
                                        Pitampura, Delhi-110034
                                    </span>
                                </div>
                            </li>

                            <li>
                              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.77483532951!2d77.11314517457544!3d28.696381381179997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390da9be2b3a13bf%3A0x2f7d385a0bb1c890!2sEVFAST%20Charging%20Solutions!5e0!3m2!1sen!2sin!4v1772077327043!5m2!1sen!2sin" width="100%" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </li>
                        </ul>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="map-wrapper">

    </div>

</div>

@endsection