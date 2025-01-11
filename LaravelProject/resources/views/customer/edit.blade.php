@extends('layout')

@section('content')
    <div class="container">
        <!-- Edit Profile Title -->
        <h2>Edit Profile</h2>

        <!-- Edit Profile Form -->
        <form action="{{ route('customer.update', $customer->id) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- First Name Field -->
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" class="form-control" name="first_name" value="{{ $customer->first_name }}" required>
            </div>

            <!-- Last Name Field -->
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" class="form-control" name="last_name" value="{{ $customer->last_name }}" required>
            </div>

            <!-- Email Field -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
            </div>

            <!-- Phone Number Field -->
            <div class="form-group">
                <label for="phone_number">Phone Number</label>
                <input type="text" class="form-control" name="phone_number" value="{{ $customer->phone_number }}">
            </div>

            <!-- Address Field -->
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control" name="address" value="{{ $customer->address }}">
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Update Profile</button>
        </form>
    </div>
@endsection
