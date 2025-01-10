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
            'name' =>  ['required',
            'string',
            'regex:/^[a-zA-Z\s]+$/', // Ensures the name contains only letters and spaces
        ],
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
        ], [
            // Custom error messages
            'name.regex' => 'The name must only contain letters and spaces',
            'password.required' => 'The password field is required.',
            'password.min' => 'The password must be at least 8 characters.',
            'password.regex' => 'The password must contain at least one uppercase letter, one number, and one special character.',
            'password.confirmed' => 'The password confirmation does not match.',
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

        return redirect()->route('login');
    }

    // Show the login form
    public function showLoginForm()
    {
        return view('login');
    }

    // Handle login
    public function login(Request $request)
    {
        // Validate the login credentials
        $credentials = $request->only('email', 'password');

        // Check if the 'remember' checkbox is checked
        $remember = $request->has('remember');

        // Attempt to authenticate the user with the 'remember' flag
        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            // Check the role and redirect accordingly
            if ($user->role === 'admin') {
                // Redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Redirect to the homepage
                return redirect()->route('home');
            }
        }

        // If authentication fails
        return redirect()->route('login')->withErrors(['email' => 'Invalid Credentials.']);
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

    // Handle logout
    public function logout()
{
    Auth::logout(); // Logout the user
    session()->invalidate(); // Invalidate the session data
    session()->regenerateToken(); // Regenerate CSRF token
    return redirect('/');
}

}
