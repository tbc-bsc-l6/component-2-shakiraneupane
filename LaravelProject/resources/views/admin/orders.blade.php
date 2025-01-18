@extends('admin.layout')

@section('content')
    <!-- Page Title -->
    <h1 class="text-2xl font-semibold mb-4">Orders</h1>

    <!-- Display success message if available -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Orders Table -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>User ID</th>
                <th>Customer Name</th>
                <th>Order Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <!-- Displaying order details in each row -->
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->customer ? $order->customer->name : 'No Customer' }}</td>
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <!-- View link for individual order details with underline style -->
                        <a href="{{ route('admin.orders.show', $order->id) }}"
                           style="transition: all 0.3s ease; text-decoration: underline; color:blue">
                            View
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $orders->links() }}

@endsection
