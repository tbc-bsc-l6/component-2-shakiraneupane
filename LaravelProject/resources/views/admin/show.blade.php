@extends('admin.dashboard')

@section('content')
    <h1>Order Details</h1>

    <!-- Display success message if any -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="order-details">
        <p><strong>Order ID:</strong> {{ $order->id }}</p>
        <p><strong>Customer Name:</strong> {{ $order->customer ? $order->customer->name : 'No Customer' }}</p>
        <p><strong>Customer Email:</strong> {{ $order->customer ? $order->customer->email : 'No Email' }}</p>
        <p><strong>Order Date:</strong> {{ $order->created_at->format('d-m-Y') }}</p>
        <p><strong>Status:</strong> {{ $order->status }}</p>

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
                @foreach($order->orderItems as $orderItem)
                    <tr>
                        <td>{{ $orderItem->book->title }}</td>
                        <td>{{ $orderItem->quantity }}</td>
                        <td>{{ $orderItem->price }}</td>
                        <td>{{ $orderItem->quantity * $orderItem->price }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Total Price: {{ $order->total_price }}</h3>
    </div>

    <a href="{{ route('admin.orders') }}" class="btn btn-primary">Back to Orders</a>
@endsection
