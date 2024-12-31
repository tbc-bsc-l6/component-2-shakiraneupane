<?php
namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        // Fetch the latest 5 books for New Arrivals
        $newArrivals = Book::latest()->take(5)->get(); // Get the 5 most recent books

        // Fetch the top 5 best-selling books (assuming you have a 'sales_count' column or similar)
        //$bestSellers = Book::orderBy('sales_count', 'desc')->take(5)->get(); // Get top 5 best-selling books

        // Pass both newArrivals and bestSellers data to the view
        return view('home', compact('newArrivals'));
    }
}
