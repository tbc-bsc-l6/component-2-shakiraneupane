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

            <!-- Update Profile Form -->
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Hidden Input for User ID -->
                <input type="hidden" name="user_id" value="{{ $user->id }}">

                <!-- Section for Personal Information -->
                <h2>Personal Information</h2>

                <!-- Full Name Field -->
                <div class="form-group">
                    <label for="full_name">Full Name</label>
                    <input type="text" name="name" id="full_name" class="form-control" value="{{ $user->name }}" required>
                </div>

                <!-- Email Address Field -->
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
                </div>

                <!-- Address Field -->
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}" required>
                </div>

                <!-- Update Password Fields -->
                <div class="form-group">
                    <label for="confirm_password">Update New Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm_password_confirmation">Confirm New Password</label>
                    <input type="password" name="confirm_password_confirmation" id="confirm_password_confirmation" class="form-control">
                </div>

                <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </form>

        </div>
    </div>

@endsection
