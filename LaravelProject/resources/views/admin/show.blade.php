@extends('admin.layout')

@section('content')
    <!-- Page Title: Order Details -->
    <h1><strong> Order Details</strong></h1>

    <!-- Display success message if any (e.g., after an action like updating an order) -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Order Details Section -->
    <div class="order-details">
        <!-- Display the Order Information -->
        <p><strong>Order ID:</strong> {{ $order->id }}</p> <!-- Display Order ID -->
        <p><strong>User ID:</strong> {{ $order->user_id }}</p> <!-- Display User ID -->

        <!-- Check if a customer exists and display their name and email -->
        <p><strong>Customer Name:</strong> {{ $order->customer ? $order->customer->name : 'No Customer' }}</p>
        <p><strong>Customer Email:</strong> {{ $order->customer ? $order->customer->email : 'No Email' }}</p>

        <!-- Display Order Date -->
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>

        <!-- Display Order Status -->
        <p><strong>Status:</strong> {{ $order->status }}</p>

        <!-- Display Order Items Section -->
        <h3>Order Items</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <!-- Loop through each order item and display its details -->
                @foreach($order->orderItems as $orderItem)
                    <tr>
                        <!-- Display Book Title from the related book -->
                        <td>{{ $orderItem->book->title }}</td>
                        <!-- Display Quantity of the item ordered -->
                        <td>{{ $orderItem->quantity }}</td>
                        <!-- Display Price of the item -->
                        <td>{{ $orderItem->price }}</td>
                        <!-- Display Total Price for the item (Quantity * Price) -->
                        <td>{{ $orderItem->quantity * $orderItem->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Display the Total Price of the order -->
        <h3>Total Price: {{ $order->total_price }}</h3>
    </div>

    <!-- Back Button to navigate back to the orders page -->
    <a href="{{ route('admin.orders') }}" class="btn btn-primary">Back to Orders</a>
@endsection
