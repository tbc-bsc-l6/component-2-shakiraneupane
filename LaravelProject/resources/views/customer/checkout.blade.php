@extends('layout')

@section('title', 'Checkout')

@section('content')

<section class="checkout-section">
    <!-- Checkout Section Title -->
    <h1>Checkout</h1>

    <!-- Error Message if exists -->
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Checkout Form -->
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf

        <!-- Shipping Address Field -->
        <div class="form-group">
            <label for="shipping_address">Shipping Address</label>
            <input type="text" id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}" required>
        </div>

        <!-- Order Summary Title -->
        <h3>Your Order</h3>

        <!-- Order Items Table -->
        <table>
            <thead>
                <tr>
                    <th>Book</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop Through Cart Items -->
                @foreach($cartItems as $item)
                    <tr>
                        <td>{{ $item->book->title }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>Rs. {{ $item->book->price }}</td>
                        <td>Rs. {{ $item->book->price * $item->quantity }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Price -->
        <h3>Total Price: Rs. {{ $cartItems->sum(fn($item) => $item->book->price * $item->quantity) }}</h3>

        <!-- Confirm Order Button -->
        <button type="submit" class="btn btn-primary">Confirm Order</button>
    </form>

</section>

@endsection
