@extends('layout')
@section('title', 'Home')

@section('content')
    <!-- Slider Section -->
    <section>
        <div class="slider-container">
            <div class="slider">
                <div class="slider-item">
                    <img src="/images/book1.jpg" alt="Book Image 1">
                </div>
                <div class="slider-item">
                    <img src="/images/book2.jpg" alt="Book Image 2">
                </div>
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
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'arts']) }}">
                    <i class="fas fa-palette"></i>
                    <span>Arts & Photography</span>
                </a>
            </div>
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'lifestyle']) }}">
                    <i class="fas fa-running"></i>
                    <span>Lifestyle and Wellness</span>
                </a>
            </div>
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'fiction']) }}">
                    <i class="fas fa-theater-masks"></i>
                    <span>Fiction and Literature</span>
                </a>
            </div>
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'history']) }}">
                    <i class="fas fa-book-open"></i>
                    <span>History & Biography</span>
                </a>
            </div>
            <div class="genre-item">
                <a href="{{ route('genre.show', ['genre' => 'kids']) }}">
                    <i class="fas fa-child"></i>
                    <span>Kids and Teens</span>
                </a>
            </div>
        </div>
    </section>

    <section class="filter-sidebar-section">
        <div class="filter-sidebar">
            <h2>Filter Books</h2>
            <form action="{{ route('home') }}" method="GET">
                <!-- Genre Filter -->
                <div class="filter-item">
                    <label for="genre">Genre</label>
                    <select name="genre" id="genre">
                        <option value="">All Genres</option>
                        <option value="fiction">Fiction</option>
                        <option value="history">History</option>
                        <option value="lifestyle">Lifestyle</option>
                        <option value="arts">Arts</option>
                        <option value="kids">Kids</option>
                    </select>
                </div>

                <!-- Min Price Filter -->
                <div class="filter-item">
                    <label for="min_price">Min Price</label>
                    <input type="number" name="min_price" id="min_price" placeholder="0" value="{{ request('min_price') }}">
                </div>

                <!-- Max Price Filter -->
                <div class="filter-item">
                    <label for="max_price">Max Price</label>
                    <input type="number" name="max_price" id="max_price" placeholder="500" value="{{ request('max_price') }}">
                </div>

                <!-- Apply Filters Button -->
                <button type="submit">Apply Filters</button>
            </form>
        </div>


        <!-- About Us Section -->
    <div class="about-us">
        <h2>About Us</h2>
        <p>
            Welcome to <strong>Chapter House</strong>,  We are passionate about connecting readers with their favorite books.
            From timeless classics to the latest bestsellers, we offer a wide variety of genres to suit every taste.
            Whether you are a bookworm, a casual reader, or looking for a gift, our collection is curated just for you.

        </p>
        <p>
            Our mission is simple: to ignite a passion for reading and make books accessible to all. Whether you're a curious learner, an avid bookworm, or shopping for a gift,
            we promise an unforgettable browsing experience.
        </p>
        <p class="about-us-highlight">
            📚 Discover. 📖 Read. 🌟 Inspire. <br>
            Let’s turn the pages of imagination together!
        </p>
    </div>
</section>


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

                    <!-- Add to Cart Button -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="add-to-cart-btn">
                                Add to Cart
                            </button>
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

                    <!-- Add to Cart Button -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="add-to-cart-btn">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <a href="/login" class="add-to-cart-btn">Add to Cart</a>
                    @endauth
                </div>
            @endforeach
        </div>
    </section>

@endsection
