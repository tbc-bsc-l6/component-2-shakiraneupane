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
    <link rel="stylesheet" href="{{ asset('css/customer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Font Awesome Icons for UI -->
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
                    <!-- Navigation Links -->
                    <li><a href="{{ route('home') }}" class="home-link">Home</a></li>
                    <li><a href="{{ route('contact') }}" class="contact-us">Contact Us</a></li>

                    <!-- Search Form -->
                    <form class="search-form" action="{{ route('search') }}" method="GET">
                        <input type="text" name="query" placeholder="Search Books..." value="{{ request()->query('query') }}">
                        <button type="submit">Search</button>
                    </form>

                    <!-- Dropdown for Book Genres -->
                    <div class="dropdown">
                        <button class="dropbtn">
                            Books <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="{{ route('genre.show', ['genre' => 'Arts & Photography']) }}">Arts & Photography</a>
                            <a href="{{ route('genre.show', ['genre' => 'Lifestyle & Wellness']) }}">Lifestyle & Wellness</a>
                            <a href="{{ route('genre.show', ['genre' => 'Fiction & Literature']) }}">Fiction & Literature</a>
                            <a href="{{ route('genre.show', ['genre' => 'History & Biography']) }}">History & Biography</a>
                            <a href="{{ route('genre.show', ['genre' => 'Kids & Teens']) }}">Kids & Teens</a>
                        </div>
                    </div>

                    <!-- Cart Icon with Cart Count -->
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

                    <!-- Wishlist Icon with Wishlist Count -->
                    <li>
                        @auth
                            <a href="{{ route('wishlist.index') }}" class="wishlist-link">
                                <i class="fas fa-heart"></i>
                                <span class="wishlist-count">
                                    {{ \App\Models\Wishlist::where('user_id', Auth::id())->count() }}
                                </span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="wishlist-link">
                                <i class="fas fa-heart"></i>
                            </a>
                        @endauth
                    </li>

                    <!-- Customer Profile or Login -->
                    @auth
                        <!-- If logged in, show Profile and Logout options -->
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
                        <!-- If not logged in, show Login link -->
                        <li><a href="/register" title="Register"><i class="fas fa-user-circle"></i></a></li>
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
    <footer class="bg-[#333] text-white py-10">
        <!-- Footer Container -->
        <div class="container mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">
            <!-- About Us Section -->
            <div class="footer-section">
                <h2 class="text-lg font-semibold mb-4">About Us</h2>
                <p class="text-sm">
                    Your trusted online bookstore offering a wide variety of genres and titles for every book lover. We aim to connect readers with the best books worldwide.
                </p>
            </div>

            <!-- Quick Links Section -->
            <div class="footer-section">
                <h2 class="text-lg font-semibold mb-4">Quick Links</h2>
                <ul class="space-y-2">
                    <li><a href="{{ route('home') }}" class="text-sm hover:underline">Home</a></li>
                    <li><a href="{{ route('contact') }}" class="text-sm hover:underline">Contact Us</a></li>
                    <li><a href="{{ route('login') }}" class="text-sm hover:underline">Login</a></li>
                </ul>
            </div>

            <!-- Contact Information Section -->
            <div class="footer-section">
                <h2 class="text-lg font-semibold mb-4">Contact</h2>
                <p class="text-sm flex items-center"><i class="fas fa-map-marker-alt mr-2"></i> 123 Book Street, Booktown, BK 45678</p>
                <p class="text-sm flex items-center"><i class="fas fa-phone mr-2"></i> +1 234 567 890</p>
                <p class="text-sm flex items-center"><i class="fas fa-envelope mr-2"></i> support@onlinebookstore.com</p>
            </div>
        </div>

        <!-- Social Media Icons -->
        <div class="flex justify-center space-x-4 mt-8">
            <a href="https://facebook.com" target="_blank" class="text-xl hover:text-blue-600">
                <i class="fab fa-facebook-f"></i>
            </a>
            <a href="https://twitter.com" target="_blank" class="text-xl hover:text-blue-400">
                <i class="fab fa-twitter"></i>
            </a>
            <a href="https://instagram.com" target="_blank" class="text-xl hover:text-pink-500">
                <i class="fab fa-instagram"></i>
            </a>
            <a href="https://youtube.com" target="_blank" class="text-xl hover:text-red-600">
                <i class="fab fa-youtube"></i>
            </a>
        </div>

        <!-- Footer Bottom Section -->
        <div class="text-center mt-8 text-sm text-gray-400">
            <p>&copy; 2024 Online Bookstore. All Rights Reserved.</p>
        </div>
    </footer>

    <!-- Custom JS -->
    <script src="/js/layout.js"></script>

</body>
</html>
