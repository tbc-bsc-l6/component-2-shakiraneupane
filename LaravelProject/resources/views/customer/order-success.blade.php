@extends('layout')

@section('title', 'Order Confirmation')

@section('content')
<section class="order-success-section">
    <h1>Order Confirmed!</h1>

    <p>Your order has been successfully placed.</p>


    <h3>Total Price: Rs. {{ $order->total_amount }}</h3>

    <p>Your order will be shipped to: {{ $order->shipping_address }}</p>

    <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
</section>
@endsection
