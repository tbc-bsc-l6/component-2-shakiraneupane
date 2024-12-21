<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bookstore</title>

    <!-- Custom CSS -->
    <link href="/css/layout.css" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>

    <!-- Navbar -->
    <header>

        <div class="navbar">
            <div class="logo">
                <a href="/">
                    <img src="/images/logobook.jpg" alt="BookStore Logo" class="main-logo">
                </a>
            </div>


            <nav class="navbar-links">
                <ul>

                    <li><a href="/" class="home-link">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/contact-us">Contact Us</a></li>



                    <form class="search-form" action="/search" method="GET">
                        <input type="text" name="query" placeholder="Search Books...">
                        <button type="submit">Search</button>
                    </form>

                    <div class="dropdown">
                        <button class="dropbtn">
                            Books <i class="fas fa-chevron-down"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a href="#">Fictional</a>
                            <a href="#">Psychological</a>
                            <a href="#">Literature</a>
                        </div>
                    </div>


                    <li><a href="/favorites" title="Favorites"><i class="fas fa-heart"></i></a></li>
                    <li><a href="/cart"><i class="fas fa-shopping-cart"></i></a></li>
                    <li><a href="/profile" title="Profile"><i class="fas fa-user-circle"></i></a></li>








                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>


    <footer>
        <div class="footer-container">
            <div class="footer-section about">
                <h2>About Us</h2>
                <p>Your trusted online bookstore offering a wide variety of genres and titles for every book lover. We aim to connect readers with the best books worldwide.</p>
            </div>

            <div class="footer-section quick-links">
                <h2>Quick Links</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/about-us">About Us</a></li>
                    <li><a href="/contact-us">Contact Us</a></li>



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
