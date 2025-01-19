<?php

namespace App\Http\Controllers;
use App\Models\Wishlist;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Show the user's wishlist
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->get();
        return view('customer.wishlist', compact('wishlistItems'));
    }

    // Add a product to the wishlist
    public function store($productId)
    {
        $product = Book::findOrFail($productId);

        // Check if the product is already in the user's wishlist
        if (Wishlist::where('user_id', Auth::id())->where('product_id', $product->id)->exists()) {
            return redirect()->back()->with('message', 'Product already in wishlist!');
        }

        Wishlist::create([
            'user_id' => Auth::id(),
            'product_id' => $product->id
        ]);

        return redirect()->route('wishlist.index')->with('message', 'Product added to wishlist!');
    }

    // Remove a product from the wishlist
    public function destroy($productId)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->first();

        if ($wishlist) {
            $wishlist->delete();
            return redirect()->route('wishlist.index')->with('message', 'Product removed from wishlist!');
        }

        return redirect()->route('wishlist.index')->with('message', 'Product not found in wishlist!');
    }


}
