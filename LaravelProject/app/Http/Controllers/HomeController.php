<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
{
    // Initialize the query for filtering
    $query = Book::query();

    // Filter by Genre if specified
    if ($request->filled('genre')) {
        $query->where('genre', $request->genre);
    }

    // Filter by Min Price if specified
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->min_price);
    }

    // Filter by Max Price if specified
    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->max_price);
    }

    // Fetch the filtered books for the home page
    $filteredBooks = $query->get();  //

    // Apply the same filters to New Arrivals
    $newArrivals = $query->latest()->take(5)->get();  // Get the 5 most recent filtered books

    // Apply the same filters to Best Sellers
    $bestSellers = $query->orderBy('sales_count', 'desc')->take(5)->get();  // Get the top 5 filtered best-selling books

    // Pass the data to the view
    return view('home', compact('newArrivals', 'bestSellers', 'filteredBooks'));
}

}
