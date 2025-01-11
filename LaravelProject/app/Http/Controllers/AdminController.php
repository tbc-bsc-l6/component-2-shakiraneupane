<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AdminController extends Controller
{
    // Method to handle dynamic sections of the admin panel
    public function handleSection($section)
    {
        // Valid sections that can be accessed by the admin
        $validSections = ['users', 'products', 'orders', 'addBooks', 'contacts'];

        // Check if the requested section is valid
        if (in_array($section, $validSections)) {
            // Handle the 'users' section: Show non-admin users with pagination
            if ($section == 'users') {
                $users = User::where('role', '!=', 'admin')->paginate(5); // Fetch users excluding admin
                return view("admin.{$section}", compact('users'));
            }

            // Handle the 'products' section: Show all books
            if ($section == 'products') {
                $books = Book::all(); // Fetch all books
                return view("admin.{$section}", compact('books'));
            }

            // Handle the 'orders' section: Show orders with associated customer data and pagination
            if ($section == 'orders') {
                $orders = Order::with('customer')->paginate(5); // Fetch orders with customer details
                return view("admin.{$section}", compact('orders'));
            }

            // Handle the 'contacts' section: Show contact messages with pagination
            if ($section == 'contacts') {
                $contacts = \App\Models\Contact::paginate(5);  // Fetch all contact messages
                return view("admin.{$section}", compact('contacts'));
            }

            // Handle other sections (e.g., reports, addBooks)
            return view("admin.{$section}");
        }

        // If the section is invalid, return a 404 error
        return abort(404, "The requested admin section does not exist.");
    }

    // Method to delete a user by ID
    public function destroy($id)
    {
        // Find the user by ID or fail if not found
        $user = User::findOrFail($id);

        // Delete the user
        $user->delete();

        // Redirect back with a success message
        return redirect()->route('admin.section', ['section' => 'users'])->with('success', 'User deleted successfully!');
    }

    // Method to handle search functionality for users
    public function search(Request $request)
    {
        // Start a query to fetch users
        $query = User::query();

        // If a search term is provided, filter users by name or email
        if ($request->has('search') && $request->search) {
            $query->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('email', 'like', '%' . $request->search . '%');
        }

        // Execute the query and get the filtered users
        $users = $query->get();

        // Return the users to the view
        return view('admin.users', compact('users'));
    }

    // Method to display the details of a specific order
    public function showOrder($orderId)
    {
        // Fetch the order by its ID, including related order items and book data
        $order = Order::with('orderItems.book')->findOrFail($orderId);

        // Return the view with the order details
        return view('admin.show', compact('order'));
    }

    // Method to display the admin dashboard with summary data
    public function dashboard()
    {
        // Calculate the total number of users, products, orders, and total revenue
        $totalUsers = \App\Models\User::count();
        $totalProducts = \App\Models\Book::count();
        $totalOrders = \App\Models\Order::count();
        $totalRevenue = \App\Models\Order::sum('total_amount'); // Assuming 'total_amount' stores the total price of the order

        // Return the dashboard view with the calculated data
        return view('admin.dashboard', compact('totalUsers', 'totalProducts', 'totalOrders', 'totalRevenue'));
    }
}
