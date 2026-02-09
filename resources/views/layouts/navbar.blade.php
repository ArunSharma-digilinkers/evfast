<header>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="" class="img-fluid logo-img">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('about-us') }}">About Us</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                           Our Products
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="servicesDropdown">
                            <li><a class="dropdown-item" href="{{ url('portable-ev-chargers') }}">Portable EV Chargers</a></li>
                            <li><a class="dropdown-item" href="{{ url('popular-ac-charger') }}">	Popular AC Charger</a></li>
                            <li><a class="dropdown-item" href="{{ url('ac-chargers') }}">AC Chargers</a></li>
                            <li><a class="dropdown-item" href="{{ url('dc-chargers') }}">DC Chargers</a></li>
                            <li><a class="dropdown-item" href="{{ url('gun-holders') }}">Gun Holder</a></li>
                            <li><a class="dropdown-item" href="{{ url('accessories') }}">Accessories</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{ url('blog') }}">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>