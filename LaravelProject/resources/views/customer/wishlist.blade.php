@extends('layout')

@section('title', 'Your Wishlist')

@section('content')

<section class="wishlist-section">
    <!-- Page Title -->
    <h1>Your Wishlist</h1>

    <!-- Success Message if exists -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Empty Wishlist Message -->
    @if($wishlistItems->isEmpty())
        <p>Your wishlist is currently empty. <a href="/">Continue shopping</a></p>
    @else
        <!-- Wishlist Table -->
        <table class="wishlist-table">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through Wishlist Items -->
                @foreach($wishlistItems as $item)
                    <tr>
                        <!-- Book Image -->
                        <td>
                            <img src="{{ Storage::url($item->book->image_url) }}" alt="{{ $item->book->title }}" class="wishlist-book-image">
                        </td>

                        <!-- Book Title -->
                        <td>{{ $item->book->title }}</td>

                        <!-- Book Price -->
                        <td>Rs. {{ $item->book->price }}</td>

                        <!-- Remove Item from Wishlist -->
                        <td>
                            <form action="{{ route('wishlist.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Wishlist Summary Section -->
        <div class="wishlist-summary-box">
            <div class="wishlist-summary">
                <h2>Wishlist Summary</h2>
                <p>Total Items: {{ $wishlistItems->count() }}</p>

                <!-- Proceed to Checkout (Optional) -->
                <a href="{{ route('checkout.index') }}" class="btn-checkout">Proceed to Checkout</a>
            </div>
        </div>
    @endif
</section>

@endsection
