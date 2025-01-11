<?php

namespace App\Http\Controllers;
use App\Models\Book;
use Illuminate\Http\Request;


class GenreController extends Controller
{

 public function show(Request $request, $genre)
    {
        // List of valid genres
        $validGenres = ['Fiction & Literature', 'Lifestyle & Wellness', 'Arts & Photography', 'History & Biography', 'Kids & Teens'];

        // Check if the genre exists in the list
        if (!in_array($genre, $validGenres)) {
            abort(404);  // Return a 404 page if the genre doesn't exist
        }

        // Get the sorting parameters from the request, default to 'price' and 'asc'
        $sortBy = $request->get('sort', 'price');  // Default sort by 'price'
        $sortOrder = $request->get('order', 'asc'); // Default order is ascending

        // Fetch books based on the genre and apply sorting
        $books = Book::where('genre', $genre)
            ->orderBy($sortBy, $sortOrder)  // Apply sorting by 'price'
            ->paginate(10);  // Paginate the results

        // Return the corresponding genre Blade view with books data
        return view('genre', compact('books', 'genre'));
    }
}


