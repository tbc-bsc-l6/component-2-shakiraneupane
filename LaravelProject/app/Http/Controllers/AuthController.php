<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Show the registration form
    public function showRegistrationForm()
    {
        return view('register');
    }

    // Handle registration
    public function register(Request $request)
    {
        // Validate the data
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',  //password must be 8 characters long
                'regex:/[A-Z]/',   // Password must contain at least one uppercase letter
                'regex:/[0-9]/',  //// Password must contain at least one number
                'regex:/[!@#$%^&*(),.?":{}|<>]/',  // Password must contain at least one special character
                'confirmed',   // Password must match the confirmation field
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator) // Pass validation errors
                             ->withInput(); //retains the data
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Log the user in
        Auth::login($user);

        return redirect()->route('home'); // Redirect to a page after successful registration
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home'); // Redirect to a page after successful login
        }

        return redirect()->route('login')
                         ->withErrors(['email' => 'Invalid credentials']);
    }

    // Handle logout
    /*public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    } */
}

