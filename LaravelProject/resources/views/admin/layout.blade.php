<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="/css/admin.css">
    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <div class="dashboard flex flex-col lg:flex-row">
        <!-- Sidebar -->
        <aside class="sidebar bg-gray-800 text-white w-full lg:w-1/5 p-4 lg:block hidden">
            <div class="logo text-xl font-bold mb-4">Admin Dashboard</div>
            <nav>
                <ul>
                    <li><a href="{{ route('admin.dashboard') }}" class="active flex items-center py-2 px-4 hover:bg-gray-700"><i class="fas fa-home mr-2"></i> Dashboard</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'users']) }}" class="flex items-center py-2 px-4 hover:bg-gray-700"><i class="fas fa-users mr-2"></i> Users</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'products']) }}" class="flex items-center py-2 px-4 hover:bg-gray-700"><i class="fas fa-box mr-2"></i> Products</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'orders']) }}" class="flex items-center py-2 px-4 hover:bg-gray-700"><i class="fas fa-shopping-cart mr-2"></i> Orders</a></li>
                    <li><a href="{{ route('admin.section', ['section' => 'contacts']) }}" class="flex items-center py-2 px-4 hover:bg-gray-700"><i class="fas fa-envelope mr-2"></i> Contacts</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Hamburger Icon for Small Screens -->
        <div class="lg:hidden p-4">
            <button class="hamburger-icon text-3xl text-gray-800" onclick="toggleSidebar()">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <!-- Main Content -->
        <main class="main-content flex-1 p-4">
            <header class="header mb-6">
                <h1 class="text-2xl font-semibold">Welcome to the Admin Panel</h1>
                <div class="user-info flex justify-between items-center mt-4">
                    <!-- Logout Button -->
                    <button class="logout-btn py-2 px-4 bg-red-600 text-white rounded-md hover:bg-red-700" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
                </div>
            </header>
            @yield('content')
        </main>
    </div>

    <!-- Logout Form (Hidden) -->
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>

    <script>
        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            sidebar.classList.toggle('hidden');
        }
    </script>

    <script src="/js/admin.js"></script>
</body>
</html>
