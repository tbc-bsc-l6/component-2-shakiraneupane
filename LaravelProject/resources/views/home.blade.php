@extends('layout')

@section('title', 'Home')

@section('content')
    <!-- Slider Section -->
    <section>
        <div class="slider-container">
            <div class="slider">
                <!-- Slider Item 1 -->
                <div class="slider-item">
                    <img src="/images/book1.jpg" alt="Book Image 1">
                </div>
                <!-- Slider Item 2 -->
                <div class="slider-item">
                    <img src="/images/book2.jpg" alt="Book Image 2">
                </div>
                <!-- Slider Item 3 -->
                <div class="slider-item">
                    <img src="/images/book3.jpg" alt="Book Image 3">
                </div>
            </div>

            <!-- Navigation Arrows -->
            <button class="prev" onclick="moveSlide(-1)">&#10094;</button>
            <button class="next" onclick="moveSlide(1)">&#10095;</button>

            <!-- Pagination Dots -->
            <div class="dots-container">
                <span class="dot" onclick="currentSlideFunc(1)"></span>
                <span class="dot" onclick="currentSlideFunc(2)"></span>
                <span class="dot" onclick="currentSlideFunc(3)"></span>
            </div>
        </div>
    </section>

    <!-- Genres Section -->
    <section class="genres-section">
        <h2>Genres</h2>
        <p>Browse Our Extensive Collection of Books Across Different Genres.</p>
        <div class="genres-grid">
            <!-- Genre: Arts & Photography -->
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'arts']) }}">
                    <i class="fas fa-palette"></i>
                    <span>Arts & Photography</span>
                </a>
            </div>
            <!-- Genre: Lifestyle and Wellness -->
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'lifestyle']) }}">
                    <i class="fas fa-running"></i>
                    <span>Lifestyle and Wellness</span>
                </a>
            </div>
            <!-- Genre: Fiction and Literature -->
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'fiction']) }}">
                    <i class="fas fa-theater-masks"></i>
                    <span>Fiction and Literature</span>
                </a>
            </div>
            <!-- Genre: History & Biography -->
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'history']) }}">
                    <i class="fas fa-book-open"></i>
                    <span>History & Biography</span>
                </a>
            </div>
            <!-- Genre: Kids and Teens -->
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'kids']) }}">
                    <i class="fas fa-child"></i>
                    <span>Kids and Teens</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Filter Sidebar Section -->
    <section class="filter-sidebar-section flex mb-8">
        <div class="filter-sidebar w-1/4 bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-2xl text-gray-800 mb-6 text-center">Filter Books</h2>
            <form action="{{ route('home') }}" method="GET">
                <!-- Genre Filter -->
                <div class="filter-item mb-4">
                    <label for="genre" class="text-sm block mb-1">Genre</label>
                    <select name="genre" id="genre" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md">
                        <option value="">All Genres</option>
                        <option value="fiction" {{ request('genre') == 'fiction' ? 'selected' : '' }}>Fiction</option>
                        <option value="history" {{ request('genre') == 'history' ? 'selected' : '' }}>History</option>
                        <option value="lifestyle" {{ request('genre') == 'lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                        <option value="arts" {{ request('genre') == 'arts' ? 'selected' : '' }}>Arts</option>
                        <option value="kids" {{ request('genre') == 'kids' ? 'selected' : '' }}>Kids</option>
                    </select>
                </div>

                <!-- Min Price Filter -->
                <div class="filter-item mb-4">
                    <label for="min_price" class="text-sm block mb-1">Min Price</label>
                    <input type="number" name="min_price" id="min_price" placeholder="0" value="{{ request('min_price') }}" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md">
                </div>

                <!-- Max Price Filter -->
                <div class="filter-item mb-6">
                    <label for="max_price" class="text-sm block mb-1">Max Price</label>
                    <input type="number" name="max_price" id="max_price" placeholder="500" value="{{ request('max_price') }}" class="w-full px-3 py-2 text-sm border border-gray-300 rounded-md">
                </div>

                <!-- Apply Filters Button -->
                <button type="submit" class="w-full bg-gray-800 text-white py-2 rounded-md text-lg cursor-pointer">
                    Apply Filters
                </button>
            </form>
        </div>

        <!-- Sidebar Image -->
        <img src="/images/bestbook2024.png" alt="Best Book 2024" class="home-img">
    </section>

    <!-- New Arrivals Section -->
    <section class="new-arrivals-section">
        <h2>New Arrivals</h2>
        <p>Explore Fresh Arrivals and Find Your Next Great Read.</p>
        <div class="books-grid">
            @foreach($newArrivals as $book)
                <div class="book-item">
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">
                    <h3>{{ $book->title }}</h3>
                    <p>by {{ $book->author }}</p>
                    <span>Rs. {{ $book->price }}</span>

                    <!-- Add to Cart Button (Authenticated users only) -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                        </form>
                    @else
                        <a href="/login" class="add-to-cart-btn">Add to Cart</a>
                    @endauth
                </div>
            @endforeach
        </div>
    </section>

    <!-- Best Selling Section -->
    <section class="new-arrivals-section">
        <h2>Best Selling</h2>
        <p>Browse Our Most Popular Books.</p>
        <div class="books-grid">
            @foreach($bestSellers as $book)
                <div class="book-item">
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">
                    <h3>{{ $book->title }}</h3>
                    <p>by {{ $book->author }}</p>
                    <span>Rs. {{ $book->price }}</span>

                    <!-- Add to Cart Button (Authenticated users only) -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                        </form>
                    @else
                        <a href="/login" class="add-to-cart-btn">Add to Cart</a>
                    @endauth
                </div>
            @endforeach
        </div>
    </section>
@endsection
