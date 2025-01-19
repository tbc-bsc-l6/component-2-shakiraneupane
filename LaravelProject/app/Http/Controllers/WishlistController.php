<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Book;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show the user's wishlist
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->get();
        return view('customer.wishlist', compact('wishlistItems'));
    }

    // Add a book to the wishlist
    public function store($bookId)
    {
        $book = Book::findOrFail($bookId);

        // Check if the book is already in the user's wishlist
        if (Wishlist::where('user_id', Auth::id())->where('book_id', $book->id)->exists()) {
            return redirect()->back()->with('message', 'Book already in wishlist!');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id
        ]);

        return redirect()->route('wishlist.index')->with('message', 'Book added to wishlist!');
    }

    // Remove a book from the wishlist
    public function destroy($bookId)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->where('book_id', $bookId)->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->route('wishlist.index')->with('success', 'Book removed from wishlist!');
        }

        return redirect()->route('wishlist.index')->with('error', 'Book not found in wishlist!');
    }
}
