<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Store a new book in the database.
     */
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $imagePath = $request->file('image_url')->store('images', 'public'); // Save in storage/app/public/images

        // Create a new book entry in the database
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'genre' => $request->genre,
            'description' => $request->description,
            'image_url' => $imagePath, // Store the relative path
        ]);

        // Redirect with success message
        return redirect()->route('admin.section', ['section' => 'products'])
                         ->with('success', 'Book added successfully!');
    }

    /**
     * Retrieve all books for the products page.
     */
    public function index()
    {
        $books = Book::all();
        return view('admin.products', compact('books'));
    }

    /**
     * Show the edit form for a book.
     */
    public function edit(Book $book)
    {
        return view('admin.editBooks', compact('book'));
    }

    /**
     * Update a book in the database.
     */
    public function update(Request $request, Book $book)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image
        ]);

        // Update book details
        $book->title = $request->title;
        $book->author = $request->author;
        $book->price = $request->price;
        $book->genre = $request->genre;
        $book->description = $request->description;

        // Handle the image upload if a new file is provided
        if ($request->hasFile('image_url')) {
            // Delete the old image if it exists
            if ($book->image_url) {
                Storage::delete('public/' . $book->image_url);
            }

            // Store the new image and update the path
            $imagePath = $request->file('image_url')->store('images', 'public');
            $book->image_url = $imagePath;
        }

        // Save the updated book
        $book->save();

        // Redirect with success message
        return redirect()->route('admin.section', ['section' => 'products'])
                         ->with('success', 'Book updated successfully!');
    }

    /**
     * Delete a book from the database.
     */
    public function destroy(Book $book)
    {
        // Delete the cover image if it exists
        if ($book->image_url) {
            Storage::delete('public/' . $book->image_url);
        }

        // Delete the book record
        $book->delete();

        // Redirect with success message
        return redirect()->route('admin.section', ['section' => 'products'])
                         ->with('success', 'Book deleted successfully!');
    }



    public function search(Request $request)
{
    $query = $request->input('query');
    $books = Book::where('title', 'like', '%' . $query . '%')
                 ->orWhere('author', 'like', '%' . $query . '%')
                 ->orWhere('description', 'like', '%' . $query . '%')
                 ->get();

    return view('search', compact('books', 'query'));
}
}
