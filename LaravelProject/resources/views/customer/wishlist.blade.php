@extends('layout')

@section('title', 'Your Wishlist')

@section('content')

<section class="wishlist-section p-8 bg-gray-50 min-h-screen">
    <!-- Page Title -->
    <h1 class="text-3xl font-bold mb-6">Your Wishlist</h1>

    <!-- Success or Error Message if exists -->
    @if(session('success'))
        <div class="alert alert-success mb-6 p-4 bg-green-100 text-green-800 border-l-4 border-green-500 rounded-lg">
            {{ session('success') }}
        </div>
    @elseif(session('error'))
        <div class="alert alert-error mb-6 p-4 bg-red-100 text-red-800 border-l-4 border-red-500 rounded-lg">
            {{ session('error') }}
        </div>
    @endif

    <!-- Empty Wishlist Message -->
    @if($wishlistItems->isEmpty())
        <p class="text-lg">Your wishlist is currently empty. <a href="/" class="text-blue-500 hover:underline">Continue shopping</a></p>
    @else
        <!-- Wishlist Table -->
        <table class="wishlist-table w-full table-auto border-collapse mb-8">
            <thead>
                <tr class="border-b">
                    <th class="py-2 px-4 text-left">Book</th>
                    <th class="py-2 px-4 text-left">Title</th>
                    <th class="py-2 px-4 text-left">Price</th>
                    <th class="py-2 px-4 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through Wishlist Items -->
                @foreach($wishlistItems as $item)
                    <tr class="border-b">
                        <!-- Book Image -->
                        <td class="py-4 px-4">
                            <img src="{{ Storage::url($item->book->image_url) }}" alt="{{ $item->book->title }}" class="w-16 h-24 object-cover rounded-md">
                        </td>

                        <!-- Book Title -->
                        <td class="py-4 px-4">{{ $item->book->title }}</td>

                        <!-- Book Price -->
                        <td class="py-4 px-4">Rs. {{ $item->book->price }}</td>

                        <!-- Remove Item from Wishlist -->
                        <td class="py-4 px-4">
                            <form action="{{ route('wishlist.destroy', $item->book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @endif
</section>

@endsection
