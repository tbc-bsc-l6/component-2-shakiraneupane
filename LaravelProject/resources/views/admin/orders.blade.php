@extends('admin.layout')

@section('content')
    <h1 class= "text-2xl font-semibold mb-4">Orders</h1>


    <!-- Display success message if any -->
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
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user_id }}</td>
                    <td>{{ $order->customer ? $order->customer->name : 'No Customer' }}</td> <!-- Safe check for customer -->
                    <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    <td>{{ $order->status }}</td>
                    <td>
                        <a href="{{ route('admin.orders.show', $order->id) }}" style="transition: all 0.3s ease;">
                            View
                        </a>

                        <!-- Additional actions can go here, like edit or delete -->
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

 <!-- Pagination -->

    {{ $orders->links() }}


@endsection
