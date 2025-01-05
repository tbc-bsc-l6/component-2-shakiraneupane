@extends('layout') {{-- Assuming a common layout --}}

@section('title', ucfirst($genre) . ' Books') {{-- Dynamic title based on genre name --}}

@section('content')
<section class="new-arrivals-section">
    <h2>{{ ucfirst($genre) }} Books</h2> {{-- Dynamic header based on genre name --}}
    <p>Explore captivating books in the {{ ucfirst($genre) }} genre.</p> {{-- Dynamic paragraph text --}}

    <div class="books-grid">
        @if($books->isEmpty())
            <p>No books available in this genre at the moment.</p>
        @else
            @foreach($books as $book)
                <div class="book-item">
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">
                    <h3>{{ $book->title }}</h3>
                    <p>by {{ $book->author }}</p>
                    <span>Rs. {{ number_format($book->price, 2) }}</span>

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
        @endif
    </div>
</section>
@endsection
