<?php

namespace App\Http\Controllers;
use App\Models\Book;

use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function show($genre)
    {
        // List of valid genres
        $validGenres = ['fiction', 'kids', 'arts', 'history', 'lifestyle'];

        // Check if the genre exists in the list
        if (!in_array($genre, $validGenres)) {
            abort(404);  // Return a 404 page if the genre doesn't exist
        }

        // Fetch books based on the genre
        $books = Book::where('genre', $genre)->get();
        // Debug: Check if books are being retrieved


        // Return the corresponding genre Blade view with books data
        return view('genre', compact('books', 'genre'));  // Directly use genre.blade.php


    }
}
