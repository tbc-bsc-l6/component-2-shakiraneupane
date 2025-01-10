@extends('layout')

@section('title', ucfirst($genre) . ' Books')

@section('content')
<section class="new-arrivals-section py-8 px-4">
    <h2 class="text-3xl font-semibold text-center">{{ ucfirst($genre) }} Books</h2>
    <p class="text-xl text-center text-gray-600 mt-2">Explore captivating books in the {{ ucfirst($genre) }} genre.</p>

    <!-- Sorting options -->
    <form method="GET" action="{{ route('genre.show', ['genre' => $genre]) }}" class="mt-6">
        <div class="flex justify-center gap-6">
            <div class="flex items-center">
                <label for="sort" class="mr-2">Sort by:</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="px-4 py-2 border rounded-md">
                    <option value="price" {{ request()->get('sort') == 'price' ? 'selected' : '' }}>Price</option>
                    <option value="title" {{ request()->get('sort') == 'title' ? 'selected' : '' }}>Title</option>
                </select>
            </div>
            <div class="flex items-center">
                <label for="order" class="mr-2">Order:</label>
                <select name="order" id="order" onchange="this.form.submit()" class="px-4 py-2 border rounded-md">
                    <option value="asc" {{ request()->get('order') == 'asc' ? 'selected' : '' }}>Ascending</option>
                    <option value="desc" {{ request()->get('order') == 'desc' ? 'selected' : '' }}>Descending</option>
                </select>
            </div>
        </div>
    </form>

    <div class="books-grid mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @if($books->isEmpty())
            <p class="text-center text-xl text-gray-600">No books available in this genre at the moment.</p>
        @else
            @foreach($books as $book)
                <div class="book-item bg-white p-6 rounded-lg shadow-lg hover:shadow-xl transition duration-300">
                    <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}" class="w-full h-64 object-cover rounded-md mb-4">
                    <h3 class="text-xl font-semibold text-gray-800">{{ $book->title }}</h3>
                    <p class="text-md text-gray-600 mb-2">by {{ $book->author }}</p>
                    <span class="text-lg font-semibold text-gray-800">Rs. {{ number_format($book->price, 2) }}</span>

                    <!-- Add to Cart Button -->
                    @auth
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="book_id" value="{{ $book->id }}">
                            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300">
                                Add to Cart
                            </button>
                        </form>
                    @else
                        <a href="/login" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition duration-300 text-center block">
                            Add to Cart
                        </a>
                    @endauth
                </div>
            @endforeach
        @endif
    </div>

</section>
@endsection
