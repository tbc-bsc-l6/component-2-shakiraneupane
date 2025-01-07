@extends('admin.layout')

@section('content')
    <!-- Dashboard Stats Section -->
    <section class="stats">
        <div class="stat-item">
            <i class="fas fa-users"></i>
            <div class="stat-info">
                <h3>{{ number_format($totalUsers) }}</h3> <!-- Display total users -->
                <p>Total Users</p>
            </div>
        </div>
        <div class="stat-item">
            <i class="fas fa-box"></i>
            <div class="stat-info">
                <h3>{{ number_format($totalProducts) }}</h3> <!-- Display total products -->
                <p>Total Products</p>
            </div>
        </div>
        <div class="stat-item">
            <i class="fas fa-shopping-cart"></i>
            <div class="stat-info">
                <h3>{{ number_format($totalOrders) }}</h3> <!-- Display total orders -->
                <p>Total Orders</p>
            </div>
        </div>
        <div class="stat-item">
            <i class="fas fa-dollar-sign"></i>
            <div class="stat-info">
                <h3>${{ number_format($totalRevenue, 2) }}</h3> <!-- Display total revenue formatted -->
                <p>Total Revenue</p>
            </div>
        </div>
    </section>
@endsection
