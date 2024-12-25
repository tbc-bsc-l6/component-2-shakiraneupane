<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/admin.css">
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
            @yield('content')
            <header class="header">
                <h1>Welcome to the Admin Panel</h1>
                <div class="user-info">

                    <button class="logout-btn">Logout</button>
                </div>
            </header>

        </main>
    </div>


    <script src="/js/admin.js"></script>
</body>
</html>
