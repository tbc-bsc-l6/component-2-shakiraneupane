@extends('layout')

@section('title', ucfirst($genre) . ' Books')

@section('content')
<section class="new-arrivals-section">
    <h2>{{ ucfirst($genre) }} Books</h2>
    <p>Explore captivating books in the {{ ucfirst($genre) }} genre.</p>

    <!-- Sorting options -->
    <form method="GET" action="{{ route('genre.show', ['genre' => $genre]) }}">
        <div class="sorting-options">
            <label for="sort">Sort by:</label>
            <select name="sort" id="sort" onchange="this.form.submit()">
                <option value="price" {{ request()->get('sort') == 'price' ? 'selected' : '' }}>Price</option>
                <option value="title" {{ request()->get('sort') == 'title' ? 'selected' : '' }}>Title</option>
            </select>

            <label for="order">Order:</label>
            <select name="order" id="order" onchange="this.form.submit()">
                <option value="asc" {{ request()->get('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                <option value="desc" {{ request()->get('order') == 'desc' ? 'selected' : '' }}>Descending</option>
            </select>
        </div>
    </form>

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

    <!-- Display pagination links -->
    <div class="pagination-container">
        {{ $books->links() }}
    </div>
</section>
@endsection
