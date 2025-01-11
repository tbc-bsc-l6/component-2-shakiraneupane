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
                    <!-- Book Image -->
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}">

                    <!-- Book Title and Author -->
                    <h3>{{ $book->title }}</h3>
                    <p>by {{ $book->author }}</p>

                    <!-- Book Price -->
                    <span>Rs. {{ number_format($book->price, 2) }}</span>

                    <!-- Add to Cart Button -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="add-to-cart">Add to Cart</button>
                        </form>
                    @else
                        <button><a href="/login" class="add-to-cart">Add to Cart</a></button>
                    @endauth
                </div>
            @endforeach
        @endif
    </div>

</section>
@endsection
