@extends('layout')

@section('title', 'Search Results')

@section('content')
    <h1>Search Results for "{{ $query }}"</h1>

    @if ($books->isEmpty())
        <p>No books found matching your query.</p>
    @else
        <div class="book-list">
            @foreach ($books as $book)
                <div class="book-item">
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">
                    <h2><a href="{{ route('book.show', $book->id) }}">{{ $book->title }}</a></h2>
                    <p>Author: {{ $book->author }}</p>
                    <p>{{ Str::limit($book->description, 100) }}</p>

                    <!-- Add to Cart Button -->
                    <form action="{{ route('cart.add', $book->id) }}" method="POST" class="add-to-cart-form">
                        @csrf
                        <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                    </form>
                </div>
            @endforeach
        </div>
    @endif
@endsection
