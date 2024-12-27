<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    // Store book details in the database
    public function store(Request $request)
    {
        // Validate the form input
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'genre' => 'required|string|max:255',
            'description' => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle the file upload
        $imagePath = $request->file('cover_image')->store('images', 'public');

        // Create a new book entry in the database
        Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'price' => $request->price,
            'genre' => $request->genre,
            'description' => $request->description,
            'image_url' => $imagePath,
        ]);

        // Redirect to the products page with success message
        return redirect()->route('admin.section', ['section' => 'products'])->with('success', 'Book added successfully!');
    }

    // Retrieve all books for the products page
    public function index()
    {
        $books = Book::all();
        return view('admin.products', compact('books'));
    }

/*-------------------------------for editing book details-----------------------------------------*/
    public function edit(Book $book)
{
    // Show the edit form with the book's current details
    return view('admin.editBooks', compact('book'));
}

public function update(Request $request, Book $book)
{
    // Validate the form input
    $request->validate([
        'title' => 'required|string|max:255',
        'author' => 'required|string|max:255',
        'price' => 'required|numeric|min:0',
        'genre' => 'required|string|max:255',
        'description' => 'required|string',
        'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Optional image update
    ]);

    // Update the book details
    $book->title = $request->title;
    $book->author = $request->author;
    $book->price = $request->price;
    $book->genre = $request->genre;
    $book->description = $request->description;

    // If a new cover image is uploaded, handle the file upload and update the image path
    if ($request->hasFile('cover_image')) {
        // Delete the old image if a new one is uploaded
        if ($book->image_url) {
            Storage::delete('public/' . $book->image_url);
        }

        $imagePath = $request->file('cover_image')->store('images', 'public');
        $book->image_url = $imagePath;
    }

    // Save the updated book details
    $book->save();

    // Redirect to the products page with a success message
    return redirect()->route('admin.section', ['section' => 'products'])->with('success', 'Book updated successfully!');
}

public function destroy(Book $book)
{
    // Delete the cover image from storage if it exists
    if ($book->image_url) {
        Storage::delete('public/' . $book->image_url);
    }

    // Delete the book from the database
    $book->delete();

    // Redirect back to the products page with a success message
    return redirect()->route('admin.section', ['section' => 'products'])->with('success', 'Book deleted successfully!');
}


}
