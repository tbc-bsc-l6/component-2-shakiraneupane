<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    // Constructor to apply middleware for all methods


    // Handle dynamic sections (products, users, orders, etc.)
    public function handleSection($section)
    {
        // Define valid sections
        $validSections = ['users', 'products', 'orders', 'reports', 'addBooks'];

        // Check if the requested section is valid
        if (in_array($section, $validSections)) {
            // Handle the 'users' section
            if ($section == 'users') {
                // Fetch all users except those with 'admin' role
                $users = User::where('role', '!=', 'admin')->get();
                return view("admin.{$section}", compact('users'));
            }

            // Handle the 'products' section
            if ($section == 'products') {
                $books = Book::all();
                return view("admin.{$section}", compact('books'));
            }

            // Handle other sections (orders, reports, etc.)
            return view("admin.{$section}");
        }

        // If the section is invalid, show a 404 error
        return abort(404, "The requested admin section does not exist.");
    }

    public function destroy($id)
    {
        // Find the user by ID
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect back with success message
        return redirect()->route('admin.section', ['section' => 'users'])->with('success', 'User deleted successfully!');
    }

    public function search(Request $request)
    {
        // Get the search query from the request
        $query = User::query();

        // If a search term is present, filter users by name or email
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        // Get the filtered users
        $users = $query->get();

        // Return the view with the filtered users
        return view('admin.users', compact('users'));
    }
}
