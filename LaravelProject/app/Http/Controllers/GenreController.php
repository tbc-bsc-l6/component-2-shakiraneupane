<?php

namespace App\Http\Controllers;

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

        // Return the corresponding genre Blade view
        return view('genres.' . $genre);
    }
}
