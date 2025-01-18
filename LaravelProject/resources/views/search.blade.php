@extends('layout')

@section('title', 'Search Results')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>
    <!-- Checks if there are no books matching the query -->
    @if ($books->isEmpty())
        <p>No books found matching your query.</p>
    @else
        <div class="book-list">
            @foreach ($books as $book)
                <div class="book-item">

                    <!-- Link to the book details page -->
                    <a href="{{ route('home.show', ['id' => $book->id]) }}">
                        <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">
                    </a>

                    <!-- Book title with a link to the book details page -->
                    <h2><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></h2>

                    <!-- Displays the author's name -->
                    <p>Author: {{ $book->author }}</p>

                    <!-- Add to Cart Button -->
                    <form action="{{ route('cart.add', $book->id) }}" method="POST" class="add-to-cart-form">
                        @csrf <!-- Generates a CSRF token for form security -->
                        <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
