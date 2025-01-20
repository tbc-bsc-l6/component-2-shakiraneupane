@extends('layout')

@section('title', 'Checkout')

@section('content')

    <!-- Customer Profile Section -->
    <div class="customer-profile">

        <!-- Sidebar for Avatar and User Information -->
        <div class="profile-sidebar">
            <div class="avatar">
                <!-- Display user's initials as the avatar -->
                <div class="avatar-circle">{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}</div>
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>
            </div>


        </div>

        <!-- Profile Content Section -->
        <div class="profile-content">

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                <h2>Personal Information</h2>
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="name" id="full_name" class="form-control" value="{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Update New Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm_password_confirmation">Confirm New Password</label>
                    <input type="password" name="confirm_password_confirmation" id="confirm_password_confirmation" class="form-control">
                </div>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Update Profile</button>
            </form> <br>

            <form action="{{ route('account.delete') }}" method="POST" onsubmit="return confirm('Are you sure you want to delete your account?')">
                @csrf
                @method('DELETE') <!-- This will make the form use the DELETE method -->
                <button type="submit" class="px-4 py-2 bg-red-500 text-white font-semibold rounded-lg hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                    Delete Account
                </button>
            </form>


        </div>
    </div>

@endsection
