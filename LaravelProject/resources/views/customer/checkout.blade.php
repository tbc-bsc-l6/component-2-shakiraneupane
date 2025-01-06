@extends('layout')

@section('title', 'Checkout')

@section('content')

<section class="checkout-section">
    <h1>Checkout</h1>

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf

        <!-- Shipping Address -->
        <div class="form-group">
            <label for="shipping_address">Shipping Address</label>
            <input type="text" id="shipping_address" name="shipping_address" value="{{ old('shipping_address') }}" required>
        </div>

        <h3>Your Order</h3>
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

        <h3>Total Price: Rs. {{ $cartItems->sum(fn($item) => $item->book->price * $item->quantity) }}</h3>

        <!-- Confirm Order Button -->
        <button type="submit" class="btn btn-primary">Confirm Order</button>
    </form>

</section>

@endsection
