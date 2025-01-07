@extends('admin.layout')

@section('content')
<div class="container">
    <h2>Registered Users</h2>

    <!-- Success message -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Search Form -->
    <form class="search-form" method="GET" action="{{ route('admin.users.search') }}">
        <div class="search-wrapper">
            <input class="search-input" type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
            <i class="fas fa-search search-icon"></i>
        </div>
    </form>

    <!-- Users Table -->
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Role</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->address }}</td>
                    <td>{{ $user->role }}</td>
                    <td>
                        <!-- Delete Button -->
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
</div>
@endsection
