@extends('layout')

@section('title', 'Your Shopping Cart')

@section('content')

<section class="cart-section">
    <!-- Page Title -->
    <h1>Your Shopping Cart</h1>

    <!-- Success Message if exists -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Empty Cart Message -->
    @if($cartItems->isEmpty())
        <p>Your cart is currently empty. <a href="/">Continue shopping</a></p>
    @else
        <!-- Cart Table -->
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through Cart Items -->
                @foreach($cartItems as $item)
                    <tr>
                        <!-- Book Image -->
                        <td>
                            <img src="{{ Storage::url($item->book->image_url) }}" alt="{{ $item->book->title }}" class="cart-book-image">
                        </td>

                        <!-- Book Title -->
                        <td>{{ $item->book->title }}</td>

                        <!-- Quantity Control -->
                        <td>
                            <div class="quantity-control">
                                <form action="{{ route('cart.update', $item->id) }}" method="POST" class="update-form">
                                    @csrf
                                    @method('PUT')

                                    <!-- Decrease Quantity Button -->
                                    <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}" class="quantity-btn">-</button>

                                    <!-- Quantity Display -->
                                    <input type="text" value="{{ $item->quantity }}" readonly class="quantity-display">

                                    <!-- Increase Quantity Button -->
                                    <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}" class="quantity-btn">+</button>
                                </form>
                            </div>
                        </td>

                        <!-- Book Price -->
                        <td>Rs. {{ $item->book->price }}</td>

                        <!-- Subtotal Calculation -->
                        <td>Rs. {{ $item->book->price * $item->quantity }}</td>

                        <!-- Remove Item from Cart -->
                        <td>
                            <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Remove</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Cart Summary Section -->
        <div class="cart-summary-box">
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <p>Total Items: {{ $cartItems->sum('quantity') }}</p>
                <p>Total Price: Rs. {{ $cartItems->sum(fn($item) => $item->book->price * $item->quantity) }}</p>

                <!-- Checkout Button -->
                <a href="{{ route('checkout.index') }}" class="btn-checkout">Checkout</a>
            </div>
        </div>
    @endif
</section>

@endsection
