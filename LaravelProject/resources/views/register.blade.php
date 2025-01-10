@extends('layout')
@section('title', 'Register')
@section('content')

    <div class="auth-container">
        <!-- Registration Form -->
        <div class="registration-form">
            <h2 class = "text-2xl font-semibold mb-4">Register</h2>

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ old('name') }}" required>
                    <!-- Show error for name if validation fails -->
                    @error('name')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" placeholder="Enter your address" value="{{ old('address') }}" required>
                    <!-- Show error for address if validation fails -->
                    @error('address')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Enter your email" value="{{ old('email') }}" required>
                    <!-- Show error for email if validation fails -->
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-container">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <span class="toggle-password" onclick="togglePassword('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <!-- Show error for password if validation fails -->
                    @error('password')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="password-container">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm your password" required>
                        <span class="toggle-password" onclick="togglePassword('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                    <!-- Show error for password_confirmation if validation fails -->
                    @error('password_confirmation')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Agree to Terms and Conditions -->
            <div class="form-checkbox">
                <div class="form-item">
                    <label>
                        <input type="checkbox" name="agree_terms" required> I agree to the terms and conditions</a>
                    </label>
                    @error('agree_terms')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <button type="submit" class="btn">Register</button>
            </form>

            <!-- Login Option -->
            <p class="register-option">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </p>
        </div>
    </div>
@endsection
