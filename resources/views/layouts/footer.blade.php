<div class="top-footer-wrapper section-entry">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-sm-12 mb-2">
                <div class="footer-wrap">
                    <img src="{{ asset('img/logo.png') }}" class="img-fluid logo-img">
                    <p class="mrt30">
                        Accelerate electric vehicle charging revolution by offering the best charging experience to its customers through affordable technology.
                    </p>

                    <ul class="footer-social-list">
                        <li class="pr-3">
                            <a href="#" target="_blank"><i
                                    class="fab fa-facebook-f"></i></a>
                        </li>
                        <li class="pr-3">
                            <a href="#" target="_blank"><i
                                    class="fab fa-instagram"></i></a>
                        </li>
                        <li class="pr-3">
                            <a href="#" target="_blank"><i
                                    class="fa-brands fa-youtube"></i></a>
                        </li>
                        <li class="pr-3">
                            <a href="#"
                                target="_blank"><i class="fab fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 mb-2">
                <div class="footer-wrap">
                    <h5>Quicks Links</h5>
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url('about-us') }}">About Us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="{{ url('contact-us') }}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
         
            <div class="col-xl-3 col-lg-3 col-sm-12">
                <div class="footer-wrap">
                    <h5>Products</h5>
                    <ul>
                        <li><a href="{{ url('portable-ev-chargers') }}">Portable EV Chargers</a></li>
                        <li><a href="{{ url('wall-mount-ev-chargers') }}">Wall Mount EV Chargers</a></li>
                        <li><a href="{{ url('ac-chargers') }}">AC Chargers</a></li>
                        <li><a href="{{ url('dc-chargers') }}">DC Chargers</a></li>
                        <li><a href="{{ url('gun-holders') }}">Gun Holders</a></li>
                        <li><a href="{{ url('accessories') }}">Accessories</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 mb-2">
                <div class="footer-wrap">
                    <h5>Connect Us</h5>
                    <ul class="contact-list">
                        <li>
                            <i class="fa-solid fa-envelope"></i> Corporate Office <br>
                           121, First Floor, Vardhaman Premium Mall, LSC, Outer Ring Road, Deepali, Pitampura, Delhi-110034
                        </li>
                        <li>
                            <i class="fa-solid fa-phone"></i><a href="tel:+91-8595264742"> +91-8595264742</a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</div>
<div class="bottom-footer-wrapper">
    <div class="container">
        <p class="footer-copyright-text">
            &copy; copyright Evfast All Rights Reserved. Site Created & Maintained By <a
                href="http://www.digilinkers.com" target="_blank" class="creator-link">Digilinkers</a>
        </p>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

</body>
</html>