<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/admin.css">
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="dashboard">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="logo">Admin Dashboard</div>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'users']) }}">Users</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'products']) }}">Products</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'orders']) }}">Orders</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'reports']) }}">Reports</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="header">
                <h1>Welcome to the Admin Panel</h1>
                <div class="user-info">
                    <!-- Logout Button -->
                    <button class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                </div>
            </header>
            @yield('content')
            <!-- Dashboard Stats Section -->

            </section>
        </main>
    </div>

    <!-- Logout Form (Hidden) -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script src="/js/admin.js"></script>
</body>
</html>
