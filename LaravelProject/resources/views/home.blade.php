@extends('layout')

@section('content')
    <section class="slider-container">
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
    </section>
@endsection
