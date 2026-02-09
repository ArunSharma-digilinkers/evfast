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

                    <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ url('contact-us') }}">Contact Us</a></li>

                    {{-- Cart --}}
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="{{ route('cart.index') }}">
                            <i class="fas fa-shopping-cart"></i>
                            @php $cartCount = count(session('cart', [])); @endphp
                            @if($cartCount > 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">
                                    {{ $cartCount }}
                                </span>
                            @endif
                        </a>
                    </li>

                    @guest
                        {{-- Login / Register --}}
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <i class="fas fa-sign-in-alt me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">
                                <i class="fas fa-user-plus me-1"></i>Register
                            </a>
                        </li>
                    @else
                        {{-- User Dropdown --}}
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown"
                               role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ auth()->user()->avatar_url }}" alt="" class="rounded-circle me-1"
                                     style="width: 24px; height: 24px; object-fit: cover;">
                                {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                @if(auth()->user()->role === 'admin')
                                    <li><a class="dropdown-item" href="{{ route('admin.dashboard') }}"><i class="fas fa-tachometer-alt me-2"></i>Admin Panel</a></li>
                                @else
                                    <li><a class="dropdown-item" href="{{ route('user.dashboard') }}"><i class="fas fa-box me-2"></i>My Orders</a></li>
                                    <li><a class="dropdown-item" href="{{ route('user.addresses.index') }}"><i class="fas fa-map-marker-alt me-2"></i>Addresses</a></li>
                                @endif
                                <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="fas fa-user-edit me-2"></i>Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item"><i class="fas fa-sign-out-alt me-2"></i>Logout</button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>