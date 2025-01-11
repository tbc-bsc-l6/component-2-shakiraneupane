@extends('admin.layout')

@section('content')
    <!-- Dashboard Stats Section -->
    <section class="stats">
        <!-- Total Users Stat -->
        <div class="stat-item">
            <i class="fas fa-users"></i> <!-- Icon for users -->
            <div class="stat-info">
                <h3>{{ number_format($totalUsers) }}</h3> <!-- Display total users -->
                <p>Total Users</p>
            </div>
        </div>

        <!-- Total Products Stat -->
        <div class="stat-item">
            <i class="fas fa-box"></i> <!-- Icon for products -->
            <div class="stat-info">
                <h3>{{ number_format($totalProducts) }}</h3> <!-- Display total products -->
                <p>Total Products</p>
            </div>
        </div>

        <!-- Total Orders Stat -->
        <div class="stat-item">
            <i class="fas fa-shopping-cart"></i> <!-- Icon for orders -->
            <div class="stat-info">
                <h3>{{ number_format($totalOrders) }}</h3> <!-- Display total orders -->
                <p>Total Orders</p>
            </div>
        </div>

        <!-- Total Revenue Stat -->
        <div class="stat-item">
            <i class="fas fa-dollar-sign"></i> <!-- Icon for revenue -->
            <div class="stat-info">
                <h3>${{ number_format($totalRevenue, 2) }}</h3> <!-- Display total revenue formatted -->
                <p>Total Revenue</p>
            </div>
        </div>
    </section>
@endsection
