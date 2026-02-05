@extends('layouts.main')
@section('content')

<div class="main-wrapper">

     <div class="banner-wrapper">
        <img src="{{ asset('img/about-banner.jpg') }}" alt="" class="img-fluid">
    </div>

    <div class="contact-wrapper section-entry">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-3">
                    <h3>Get In Touch</h3>
                    <p>Send us your requirement and our team will contact you shortly.</p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">

                    <form class="contact-form" method="POST" action="">

                        <!-- Name -->
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="name" placeholder="Enter your name" required>
                        </div>

                        <!-- Email (Multiple) -->
                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="emails[]" placeholder="Enter email" required>
                        </div>

                        <!-- Mobile (Multiple) -->
                        <div class="form-group">
                            <label>Mobile Number</label>
                            <input type="tel" name="mobiles" placeholder="Enter mobile number" required>
                        </div>

                        <!-- Requirement -->
                        <div class="form-group">
                            <label>Requirement</label>
                            <select name="requirement" required>
                                <option value="">-- Select Requirement --</option>
                                <option>EV Charger</option>
                                <option>Portable EV Charger</option>
                                <option>Commercial Charging Setup</option>
                                <option>Accessories</option>
                                <option>Dealership / Distribution</option>
                                <option>Service & Support</option>
                            </select>
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                            <label>Message</label>
                            <textarea name="message" rows="4" placeholder="Write your message"></textarea>
                        </div>

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
                                 <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3499.767519307047!2d77.113276915084!3d28.696600182392572!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d03e51f8e982b%3A0x291aaf478f83e026!2sVardhaman%20Premium%20Mall!5e0!3m2!1sen!2sin!4v1589608920465!5m2!1sen!2sin"
            width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
            tabindex="0"></iframe>
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