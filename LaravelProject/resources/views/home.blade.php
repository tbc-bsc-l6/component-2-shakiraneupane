@extends('layout')
@section('title', 'Home')
@section('content')
    <section><div class="slider-container">
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

<div class="genres-section">
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
                <span>History, Biography, and More</span>
            </a>
        </div>
        <div class="genre-item">
            <a href="{{ route('genre.show', ['genre' => 'kids']) }}">
                <i class="fas fa-child"></i>
                <span>Kids and Teens</span>
            </a>
        </div>
    </div>
</div>


    </div>
</div>


<div class="new-arrivals-section">
    <h2>New Arrivals</h2>
    <p>Explore Fresh Arrivals and Find Your Next Great Read.</p>
    <div class="books-grid">
        <div class="book-item">
            <img src="" alt="Busy Fire Station">
            <h3>Busy Fire Station</h3>
            <p>by Campbell Books</p>
            <span>Rs. 760</span>
            <button>Add to Cart</button>
            <button class="favorite-button"><i class="fas fa-heart"></i></button>
        </div>
        <div class="book-item">
            <img src="" alt="Busy Builders">
            <h3>Busy Builders</h3>
            <p>by Campbell Books</p>
            <span>Rs. 760</span>
            <button>Add to Cart</button>
            <button class="favorite-button"><i class="fas fa-heart"></i></button>
        </div>
        <div class="book-item">
            <img src="" alt="Busy Royal Family">
            <h3>Busy Royal Family</h3>
            <p>by Campbell Books</p>
            <span>Rs. 760</span>
            <button>Add to Cart</button>
            <button class="favorite-button"><i class="fas fa-heart"></i></button>
        </div>
        <div class="book-item">
            <img src="" alt="The Little Mermaid">
            <h3>The Little Mermaid</h3>
            <p>by Campbell Books</p>
            <span>Rs. 760</span>
            <button>Add to Cart</button>
            <button class="favorite-button"><i class="fas fa-heart"></i></button>
        </div>
        <div class="book-item">
            <img src="" alt="Telling Fish">
            <h3>Telling Fish</h3>
            <p>by Julia Donaldson</p>
            <span>Rs. 720</span>
            <button>Add to Cart</button>
            <button class="favorite-button"><i class="fas fa-heart"></i></button>
        </div>
    </div>
</div>

    </section>

@endsection
