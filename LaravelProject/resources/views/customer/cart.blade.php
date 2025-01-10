@extends('layout')

@section('title', 'Your Shopping Cart')

@section('content')

<section class="cart-section">
        <h1>Your Shopping Cart</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p>Your cart is currently empty. <a href="/">Continue shopping</a></p>
        @else
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
                    @foreach($cartItems as $item)
                        <tr>
                            <td><img src="{{ Storage::url($item->book->image_url) }}" alt="{{ $item->book->title }}" class="cart-book-image"></td>
                            <td>{{ $item->book->title }}</td>
                            <td>
                                <div class="quantity-control">
                                    <form action="{{ route('cart.update', $item->id) }}" method="POST" class="update-form">
                                        @csrf
                                        @method('PUT')

                                        <!-- Decrease Button -->
                                        <button type="submit" name="quantity" value="{{ $item->quantity - 1 }}" class="quantity-btn">-</button>

                                        <!-- Quantity Display -->
                                        <input type="text" value="{{ $item->quantity }}" readonly class="quantity-display">

                                        <!-- Increase Button -->
                                        <button type="submit" name="quantity" value="{{ $item->quantity + 1 }}" class="quantity-btn">+</button>
                                    </form>
                                </div>
                            </td>
                            <td>Rs. {{ $item->book->price }}</td>
                            <td>Rs. {{ $item->book->price * $item->quantity }}</td>
                            <td>
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-opacity-50">Remove</button>


                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            <div class= "cart-summary-box">
            <div class="cart-summary">
                <h2>Cart Summary</h2>
                <p>Total Items: {{ $cartItems->sum('quantity') }}</p>
                <p>Total Price: Rs. {{ $cartItems->sum(fn($item) => $item->book->price * $item->quantity) }}</p>

                <a href="{{ route('checkout.index') }}" class="btn-checkout">Checkout</a>

            </div>
            </div>
        @endif
    </section>
@endsection
