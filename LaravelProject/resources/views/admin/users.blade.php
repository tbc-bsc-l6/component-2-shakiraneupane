@extends('admin.layout')

@section('content')
<div class="container">
    <!-- Page Title: Registered Users -->
    <h2 class="text-2xl font-semibold mb-4">Registered Users</h2>

    <!-- Success Message: Display if an action like delete or update was successful -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form: Allows admin to search users by name or email -->
    <form class="search-form" method="GET" action="{{ route('admin.users.search') }}">
        <div class="search-wrapper">
            <!-- Search Input: The value is prefilled with the current search term -->
            <input class="search-input" type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
            <i class="fas fa-search search-icon"></i> <!-- Search Icon -->
        </div>
    </form>

    <!-- Users Table: Displays a list of registered users -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through each user and display their details in the table -->
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td> <!-- Display User ID -->
                    <td>{{ $user->name }}</td> <!-- Display User Name -->
                    <td>{{ $user->email }}</td> <!-- Display User Email -->
                    <td>{{ $user->role }}</td> <!-- Display User Role -->
                    <td>
                        <!-- Delete Button: Allows admin to delete a user -->
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button class="delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links: Display pagination for the users list -->
    {{ $users->links() }}

</div>
@endsection
