@extends('admin.layout')

@section('content')
    <!-- Page Title -->
    <h1 class="text-2xl font-semibold mb-4">Orders</h1>

    <!-- Display success message if any (e.g., after order update or creation) -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th> <!-- Order ID column -->
                <th>User ID</th> <!-- User ID column -->
                <th>Customer Name</th> <!-- Customer name column -->
                <th>Order Date</th> <!-- Order date column -->
                <th>Status</th> <!-- Order status column -->
                <th>Actions</th> <!-- Action buttons for order (view, edit, etc.) -->
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <!-- Displaying order details in each row -->
                    <td>{{ $order->id }}</td> <!-- Order ID -->
                    <td>{{ $order->user_id }}</td> <!-- User ID associated with the order -->
                    <td>{{ $order->customer ? $order->customer->name : 'No Customer' }}</td> <!-- Safe check for customer (if exists) -->
                    <td>{{ $order->created_at->format('d-m-Y') }}</td> <!-- Order creation date formatted as d-m-Y -->
                    <td>{{ $order->status }}</td> <!-- Order status (e.g., pending, shipped) -->
                    <td>
                        <!-- View link for individual order details -->
                        <a href="{{ route('admin.orders.show', $order->id) }}" style="transition: all 0.3s ease;">
                            View
                        </a>

                        <!-- Additional actions can go here, such as edit or delete buttons -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $orders->links() }} <!-- Laravel's pagination links for navigating through multiple pages of orders -->

@endsection
