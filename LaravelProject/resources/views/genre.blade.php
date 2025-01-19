@extends('layout')

@section('title', ucfirst($genre) . ' Books')

@section('content')
<!-- New Arrivals Section -->
<section class="new-arrivals-section">
    <!-- Section Header -->
    <h2>{{ ucfirst($genre) }} Books</h2>
    <p>Explore captivating books in the {{ ucfirst($genre) }} genre.</p>

    <!-- Sorting Options Form -->
    <form method="GET" action="{{ route('genre.show', ['genre' => $genre]) }}" class="sort-form">
        <div class="sort-options">
            <label for="sort">Sort by:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="price" {{ request()->get('sort') == 'price' ? 'selected' : '' }}>Price</option>
                <option value="title" {{ request()->get('sort') == 'title' ? 'selected' : '' }}>Title</option>
            </select>
        </div>
        <div class="order-options">
            <label for="order">Order:</label>
            <select name="order" id="order" onchange="this.form.submit()">
                <option value="asc" {{ request()->get('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request()->get('order') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
    </form>

    <!-- Books Grid -->
    <div class="books-grid">
        @if($books->isEmpty())
            <!-- No Books Available Message -->
            <p>No books available in this genre at the moment.</p>
        @else
            <!-- Loop Through Books -->
            @foreach($books as $book)
                <div class="book-item">
                    <a href="{{ route('home.show', ['id' => $book->id]) }}">
                    <!-- Book Image -->
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">

                    <!-- Book Title and Author -->
                    <h3>{{ $book->title }}</h3>
                    <p>by {{ $book->author }}</p>

                    <!-- Book Price -->
                    <span>$ {{ number_format($book->price, 2) }}</span>

                    <!-- Add to Cart Button -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="add-to-cart-btn">Add to Cart</button>
                        </form>
                    @else
                        <a href="/login" class="add-to-cart-btn">Add to Cart</a>
                    @endauth


                    <!-- Wishlist Button -->
                    @auth
                    <form action="{{ route('wishlist.store', $book->id) }}" method="POST" class="ml-4 inline-block">
                        @csrf
                        <input type="hidden" name="book_id" value="{{ $book->id }}">
                        <button type="submit" class="bg-transparent border-none cursor-pointer p-2 transition-transform duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-orange-500">
                            <i class="fas fa-heart text-red-500 text-2xl transition-colors duration-300 hover:text-red-600"></i> <!-- Wishlist icon -->
                        </button>
                    </form>

                @endauth
                </div>
            @endforeach
        @endif
    </div>

</section>
@endsection
