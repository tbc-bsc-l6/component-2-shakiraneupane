<?php
namespace App\Http\Controllers;

use App\Models\Book;


class HomeController extends Controller
{
    public function home()
    {
        // Fetch the latest 5 books for New Arrivals
        $newArrivals = Book::latest()->take(5)->get();  // Get the 5 most recent books

        // Fetch the best-selling books based on sales_count
        $bestSellers = Book::orderBy('sales_count', 'desc')->take(5)->get();  // Get the top 5 best-selling books

        // Pass both newArrivals and bestSellers data to the view
        return view('home', compact('newArrivals', 'bestSellers'));
    }
}

