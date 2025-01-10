<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Online Bookstore')</title>

    <!-- Custom CSS -->
    <link href="/css/layout.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>


    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <header>
        <div class="navbar">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="/images/logobook.jpg" alt="BookStore Logo" class="main-logo">
                </a>
            </div>

            <span><a href="{{ route('home') }}" class="chapter-house">Chapter House</a></span>

            <nav class="navbar-links">
                <ul>
                    <li><a href="{{ route('home') }}" class="home-link">Home</a></li>
                    <li><a href="{{ route('contact') }}" class="contact-us">Contact Us</a></li>

                    <form class="search-form" action="{{ route('search') }}" method="GET">
                        <input type="text" name="query" placeholder="Search Books..." value="{{ request()->query('query') }}">
                        <button type="submit">Search</button>
                    </form>


                    <div class="dropdown">
                        <button class="dropbtn">
                            Books <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ route('genre.show', ['genre' => 'arts']) }}">Arts & Photography</a>
                            <a href="{{ route('genre.show', ['genre' => 'lifestyle']) }}">Lifestyle & Wellness</a>
                            <a href="{{ route('genre.show', ['genre' => 'fiction']) }}">Fiction & Literature</a>
                            <a href="{{ route('genre.show', ['genre' => 'history']) }}">History & Biography</a>
                            <a href="{{ route('genre.show', ['genre' => 'kids']) }}">Kids & Teens</a>
                        </div>
                    </div>

                    <!-- Cart Icon with Cart Count -->
<!-- Cart Link / Cart Count -->
<li>
    @auth
        <a href="{{ route('cart.index') }}" class="cart-link">
            <i class="fas fa-shopping-cart"></i>
            <span class="cart-count">
                {{ \App\Models\Cart::where('user_id', Auth::id())->sum('quantity') }}
            </span>
        </a>
    @else
        <a href="{{ route('login') }}" class="cart-link">
            <i class="fas fa-shopping-cart"></i>
        </a>
    @endauth
</li>


<!-- Customer Profile or Login -->
@auth
<!-- If the user is logged in, show the Profile and Logout links -->
<li><a href="{{ route('customer.profile') }}" title="Customer Profile">
    <i class="fas fa-user-circle fa-6x" style="color: orange"></i>
</a></li>

<li>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" title="Logout" class="logout-btn">
            <i class="fas fa-sign-out-alt"></i>
        </button>
    </form>
</li>
@else
<!-- If the user is not logged in, show the Login link -->
<li><a href="/login" title="Login"><i class="fas fa-user-circle"></i></a></li>
@endauth

                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>Your trusted online bookstore offering a wide variety of genres and titles for every book lover. We aim to connect readers with the best books worldwide.</p>
            </div>

            <div class="footer-section quick-links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="{{ route('home') }}" class="home-link">Home</a></li>
                    <li><a href="{{ route('contact') }}" class="contact-us">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="cart-link">Login</a></li>
                </ul>
            </div>

            <div class="footer-section contact">
                <h2>Contact</h2>
                <p><i class="fas fa-map-marker-alt"></i> 123 Book Street, Booktown, BK 45678</p>
                <p><i class="fas fa-phone"></i> +1 234 567 890</p>
                <p><i class="fas fa-envelope"></i> support@onlinebookstore.com</p>
            </div>

            <div class="social-icons">
                <a href="https://facebook.com" target="_blank"><i class="fab fa-facebook-f"></i></a>
                <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="https://youtube.com" target="_blank"><i class="fab fa-youtube"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Online Bookstore. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="/js/layout.js"></script>

</body>
</html>
