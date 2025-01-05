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


        // Pass both newArrivals and bestSellers data to the view
        return view('home', compact('newArrivals'));
    }
}
