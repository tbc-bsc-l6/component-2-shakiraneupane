@extends('layout')

@section('title', $book->title)

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex flex-col md:flex-row items-center gap-8">
        <!-- Book Image -->
        <div class="flex-shrink-0">
            <img src="{{ Storage::url($book->image_url) }}" alt="{{ $book->title }}" class="rounded-xl shadow-lg max-w-xs ">
        </div>

        <!-- Book Details -->
        <div class="text-center md:text-left">
            <h1 class="text-2xl font-bold text-gray-800">{{ $book->title }}</h1>
            <p class="text-lg text-gray-600 mt-2">by <span class="font-medium text-gray-700">{{ $book->author }}</span></p>
            <p class="text-gray-700 mt-4">{{ $book->description }}</p>
            <span class="text-xl font-semibold text-gray-800 mt-6 block">Rs. {{ $book->price }}</span>

            <!-- Add to Cart Button (Authenticated users only) -->
            @auth
                <form action="{{ route('cart.add') }}" method="POST" class="mt-6">
                    @csrf
                    <input type="hidden" name="book_id" value="{{ $book->id }}">
                    <button type="submit" class="w-full md:w-auto py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105">
                        Add to Cart
                    </button>
                </form>
            @else
                <a href="/login" class="w-full md:w-auto py-3 px-6 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 transition duration-300 transform hover:scale-105 mt-6 inline-block">
                    Add to Cart
                </a>
            @endauth
        </div>
    </div>
</div>
@endsection
