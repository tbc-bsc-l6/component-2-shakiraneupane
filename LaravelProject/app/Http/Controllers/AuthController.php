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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'address' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => [
                'required',
                'min:8',
                'regex:/[A-Z]/',
                'regex:/[0-9]/',
                'regex:/[!@#$%^&*(),.?":{}|<>]/',
                'confirmed',
            ],
        ]);

        if ($validator->fails()) {
            return redirect()->route('register')
                             ->withErrors($validator)
                             ->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer',
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Check the role of the user (admin or customer)
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // Default to customer dashboard
            return redirect()->route('customer.dashboard');
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
    }

    // Show customer dashboard
    public function customerDashboard()
    {
        // Ensure the user is logged in
        if (Auth::check()) {
            return view('customer.dashboard');
        }

        // If the user is not logged in, redirect them to the login page
        return redirect()->route('login')->withErrors(['message' => 'You need to login first.']);
    }
}
