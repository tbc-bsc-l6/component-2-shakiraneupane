<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    // Constructor to apply middleware for all methods


    public function handleSection($section)
    {
        // Define valid sections
        $validSections = ['users', 'products', 'orders', 'addBooks', 'contacts'];

        // Check if the requested section is valid
        if (in_array($section, $validSections)) {
            // Handle the 'users' section
            if ($section == 'users') {
                $users = User::where('role', '!=', 'admin')->paginate(5);
                return view("admin.{$section}", compact('users'));
            }

            // Handle the 'products' section
            if ($section == 'products') {
                $books = Book::all();
                return view("admin.{$section}", compact('books'));
            }

            // Handle the 'orders' section
            if ($section == 'orders') {
                $orders = Order::with('customer')->paginate(5);
                return view("admin.{$section}", compact('orders'));
            }

            // Handle the 'contacts' section
            if ($section == 'contacts') {
                $contacts = \App\Models\Contact::paginate(5);  // Fetch all contact messages
                return view("admin.{$section}", compact('contacts'));
            }

            // Handle other sections (reports, addBooks, etc.)
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

    public function showOrder($orderId)
{
    // Fetch the order by its ID, including the associated order items and book information
    $order = Order::with('orderItems.book')->findOrFail($orderId);

    // Return the view with the order details
    return view('admin.show', compact('order'));
}

public function dashboard()
{
    $totalUsers = \App\Models\User::count();
    $totalProducts = \App\Models\Book::count();
    $totalOrders = \App\Models\Order::count();
    $totalRevenue = \App\Models\Order::sum('total_amount'); // Assuming 'total_amount' is the column storing order total price

    return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue'));
}

}
