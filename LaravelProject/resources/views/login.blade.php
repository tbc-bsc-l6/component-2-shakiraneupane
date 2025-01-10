@extends('layout')
@section('title', 'Login')
@section('content')
    <div class="auth-container">
        <div class="form-login">
            <h2 class="text-2xl font-semibold mb-4">You must login</h2>


            <!-- Login Form -->
            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" required value="{{ old('email') }}">
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <div class="password-container">
                        <input type="password" name="password" id="login_password" placeholder="Password" required>
                        <span class="toggle-password" onclick="togglePassword('login_password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    @error('password')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="role">Select Role</label>
                    <select name="role" id="role" class="form-control" required>
                        <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    @error('role')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn">Login</button>
            </form>

            <!-- Additional Options -->
            <div class="additional-options">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>

            </div>

            <!-- Registration Option -->
            <p class="register-option">
                Don't have an account? <a href="{{ route('register') }}">Register</a>
            </p>

        </div>
    </div>
@endsection
