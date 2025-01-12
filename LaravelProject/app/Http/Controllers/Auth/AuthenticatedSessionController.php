<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // Validate the role
        $role = $request->input('role');
        $validator = Validator::make($request->all(), [
            'role' => ['required', 'in:admin,customer'], // Ensures role is either 'admin' or 'customer'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Check the user's role after authentication
            $user = Auth::user();
            if ($user->role !== $role) {
                Auth::logout();
                return redirect()->back()->withErrors(['role' => 'The selected role does not match your user role.'])->withInput();
            }

            // Regenerate the session
            $request->session()->regenerate();

            // Redirect to different dashboards based on role
            if ($user->role == 'admin') {
                return redirect()->route('admin.dashboard'); // Replace with your actual admin route
            } elseif ($user->role == 'customer') {
                return redirect()->route('home'); // Replace with your actual customer route
            }
        }

        // Authentication failed
        return redirect()->back()->withErrors(['email' => 'The provided credentials are incorrect.'])->withInput();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
