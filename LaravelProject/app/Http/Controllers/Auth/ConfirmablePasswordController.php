<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use App\Models\User;
class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password and proceed with account deletion.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the provided password
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Store session for password confirmation
        $request->session()->put('auth.password_confirmed_at', time());

        // Find the user by ID or fail
        $user = User::findOrFail(Auth::id()); // Get the currently authenticated user by their ID
        // Delete the user
        $user->delete();

        // Log out the user after account deletion
        Auth::logout();

        // Redirect to the homepage with a success message
        return redirect('/')->with('success', 'Your account has been deleted successfully.');
    }
}


