<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;
class ReviewController extends Controller
{
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'rating' => 'required|integer|between:1,5',
            'review' => 'nullable|string|max:1000',
        ]);

        // Create or update the review for the current book and user
        Review::create([
            'book_id' => $bookId,
            'user_id' => Auth::id(),
            'rating' => $request->input('rating'),
            'review' => $request->input('review'),
        ]);

        // Redirect back to the book page with a success message
        return redirect()->route('book.show', $bookId)->with('success', 'Your review has been submitted!');
}




}
