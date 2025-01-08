<?php
namespace App\Http\Controllers;


use App\Models\Book;

class CustomerController extends Controller
{

    public function customerDashboard()
    {
        $newArrivals = Book::latest()->take(5)->get(); // Fetch new arrivals or mock data
        return view('customerDashboard', compact('newArrivals'));
    }


}
