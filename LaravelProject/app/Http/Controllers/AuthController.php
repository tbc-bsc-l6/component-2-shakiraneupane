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
                             ->withErrors($validator)
                             ->withInput();
        }

        // Create the customer user
        $user = User::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'customer', // Default role is 'customer'
        ]);

        // Log the user in
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
        // Validate the login form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:customer,admin',
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->input('role');

        if (Auth::attempt($credentials)) {
            // Check if the user's role matches the selected role
            if (Auth::user()->role === $role) {
                if ($role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }

                if ($role === 'customer') {
                    return redirect()->route('home');
                }
            }

            // If role doesn't match, logout and return an error
            Auth::logout();
            return redirect()->route('login')->withErrors(['email' => 'Access denied for this role.']);
        }

        return redirect()->route('login')->withErrors(['email' => 'Invalid credentials.']);
    }
}
