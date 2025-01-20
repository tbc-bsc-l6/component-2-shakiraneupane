<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class ProfileController extends Controller
{
    public function show()
{
    // Assuming you want the authenticated user's data
    $user = Auth::user();
    // Pass the user to the view
    return view('customer.profile', compact('user'));
}
    public function update(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $request->user_id,
            'confirm_password' => 'nullable|string|min:8|confirmed',
        ]);
        // Find the user by ID
        $user = User::findOrFail($request->user_id);
        // Update the user's profile data
        $user->name = $request->name;
        $user->email = $request->email;
        // Check if a password update is requested
        if ($request->filled('confirm_password')) {
            $user->password = bcrypt($request->confirm_password);
        }
        $user->save(); // Save the changes to the database
        // Redirect back with a success message
        return redirect()->route('customer.profile', ['user_id' => $user->id])->with('success', 'Profile updated successfully!');
    }
}
