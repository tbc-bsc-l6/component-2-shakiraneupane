<?php

namespace App\Http\Controllers;

use App\Models\Book;

class AdminController extends Controller
{
    // Handle dynamic sections
    public function handleSection($section)
    {
        // Define valid sections
        $validSections = ['users', 'products', 'orders', 'reports', 'addBooks'];

        // Check if the requested section is valid
        if (in_array($section, $validSections)) {
            // Return the corresponding view
            if ($section == 'products') {
                // Fetch all books for products view
                $books = Book::all();
                return view("admin.{$section}", compact('books'));
            }

            if ($section == 'addBooks') {
                return view("admin.{$section}");
            }

            return view("admin.{$section}");
        }

        // If the section is invalid, show a 404 error
        return abort(404, "The requested admin section does not exist.");
    }

}
