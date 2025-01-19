@extends('layout')

@section('title', $book->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <!-- Book Image -->
        <div class="flex-shrink-0">
            <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}" class="rounded-xl shadow-lg max-w-xs">
        </div>

        <!-- Book Details -->
        <div class="text-center md:text-left">
            <h1 class="text-2xl font-bold text-gray-800">{{ $book->title }}</h1>
            <p class="text-lg text-gray-600 mt-2">by <span class="font-medium text-gray-700">{{ $book->author }}</span></p>
            <p class="text-gray-700 mt-4">{{ $book->description }}</p>
            <span class="text-xl font-semibold text-gray-800 mt-6 block">$ {{ $book->price }}</span>

            <!-- Average Rating -->
            <div class="mt-4">
                <p class="text-yellow-500 text-lg font-bold">
                    @if($book->reviews->count())
                        Average Rating: {{ number_format($book->reviews->avg('rating'), 1) }} / 5
                    @else
                        No Ratings Yet
                    @endif
                </p>
            </div>

            <!-- Add to Cart and Add to Wishlist Buttons (Authenticated users only) -->
            @auth
                <form action="{{ route('cart.add') }}" method="POST" class="mt-6 inline-block">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="w-full md:w-auto py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                        Add to Cart
                    </button>
                </form>

                <!-- Add to Wishlist Button -->
                <form action="{{ route('wishlist.store', $book->id) }}" method="POST" class="mt-6 inline-block ml-2">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="bg-transparent border-none cursor-pointer p-2 transition-transform duration-300 hover:scale-110 focus:outline-none focus:ring-2 focus:ring-orange-500">
                        <i class="fas fa-heart text-red-500 text-2xl transition-colors duration-300 hover:text-red-600"></i>
                    </button>
                </form>

                <!-- Review and Rating Form -->
                <div class="mt-6">
                    <h3 class="text-lg font-semibold mb-2">Write a Review</h3>
                    <form action="{{ route('review.store', $book->id) }}" method="POST">
                        @csrf
                        <label for="rating" class="block mb-2">Rating:</label>
                        <select name="rating" id="rating" class="w-full p-2 border rounded">
                            <option value="" disabled selected>Select your rating</option>
                            @for ($i = 1; $i <= 5; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                        @error('rating')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <textarea name="review" class="w-full mt-4 p-2 border rounded" rows="3" placeholder="Write your review">{{ old('review') }}</textarea>
                        @error('review')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="mt-2 py-2 px-4 bg-blue-600 text-white rounded hover:bg-blue-700">Submit Review</button>
                    </form>
                </div>
            @else
                <a href="/login" class="w-full md:w-auto py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105 mt-6 inline-block">
                    Add to Cart
                </a>
                <a href="/login" class="w-full md:w-auto py-3 px-6 bg-transparent border-2 border-gray-600 text-gray-600 font-semibold rounded-lg shadow-md hover:bg-gray-100 transition duration-300 transform hover:scale-105 mt-6 inline-block">
                    Add to Wishlist
                </a>
            @endauth
        </div>
    </div>

    <!-- Reviews Section -->
    <div class="mt-12">
        <h3 class="text-xl font-semibold mb-4">Customer Reviews</h3>
        @if($book->reviews->count())
            @foreach($book->reviews as $review)
                <div class="mb-6 border-b pb-4">
                    <p class="text-yellow-500 font-bold">Rating: {{ $review->rating }} / 5</p>
                    <p class="text-gray-800">{{ $review->review }}</p>
                    <p class="text-gray-500 text-sm mt-2">- {{ $review->user->name }}, {{ $review->created_at->diffForHumans() }}</p>
                </div>
            @endforeach
        @else
            <p class="text-gray-600">No reviews yet. Be the first to review!</p>
        @endif
    </div>
</div>
@endsection
