@extends('layout')

@section('title', 'Checkout')

@section('content')

<section class=" px-6 py-8 ">
    <!-- Checkout Section Title -->
    <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">Checkout</h1>

    <!-- Error Message if exists -->
    @if(session('error'))
        <div class="bg-red-500 text-white px-4 py-2 rounded-lg mb-4 text-center">
            {{ session('error') }}
        </div>
    @endif

    <!-- Checkout Form -->
    <form action="{{ route('checkout.process') }}" method="POST" class="bg-white shadow-md rounded-lg p-6 max-w-xl mx-auto">
        @csrf

        <!-- Shipping Address Field -->
        <div class="mb-4">
            <label for="shipping_address" class="block text-sm font-medium text-gray-700 mb-2">Shipping Address</label>
            <input
                type="text"
                id="shipping_address"
                name="shipping_address"
                value="{{ old('shipping_address') }}"
                required
                class="w-full border border-gray-300 rounded-lg px-4 py-2 text-gray-700 focus:ring-2 focus:ring-blue-400 focus:outline-none"
            >
        </div>

        <!-- Order Summary Title -->
        <h3 class="text-xl font-semibold text-gray-800 mt-6 mb-4">Your Order</h3>

        <!-- Order Items Table -->
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse border border-gray-300 rounded-lg shadow-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="text-left px-4 py-2 font-medium text-gray-800">Book</th>
                        <th class="text-left px-4 py-2 font-medium text-gray-800">Quantity</th>
                        <th class="text-left px-4 py-2 font-medium text-gray-800">Price</th>
                        <th class="text-left px-4 py-2 font-medium text-gray-800">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loop Through Cart Items -->
                    @foreach($cartItems as $item)
                        <tr class="border-t border-gray-300">
                            <td class="px-4 py-2 text-gray-700">{{ $item->book->title }}</td>
                            <td class="px-4 py-2 text-gray-700">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 text-gray-700">Rs. {{ $item->book->price }}</td>
                            <td class="px-4 py-2 text-gray-700">Rs. {{ $item->book->price * $item->quantity }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Total Price -->
        <h3 class="text-lg font-semibold text-gray-800 mt-6">Total Price: Rs. {{ $cartItems->sum(fn($item) => $item->book->price * $item->quantity) }}</h3>

        <!-- Confirm Order Button -->
        <div class="mt-6 text-center">
            <button
                type="submit"
                class="px-6 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400"
            >
                Place Order
            </button>
        </div>
    </form>
</section>

@endsection
