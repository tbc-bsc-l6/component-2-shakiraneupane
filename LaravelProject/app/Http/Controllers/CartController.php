<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{


    public function index()
{
    // Get the current user's cart items
    $cartItems = Cart::where('user_id', Auth::id())->with('book')->get();

    // Return the cart view with the cart items from the customer folder
    return view('customer.cart', compact('cartItems'));
}


    public function addToCart(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $userId = Auth::id();
        $bookId = $request->input('book_id');

        // Check if the book is already in the cart
        $cartItem = Cart::where('user_id', $userId)->where('book_id', $bookId)->first();

        if ($cartItem) {
            // Increment the quantity if it exists
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // Add a new item to the cart
            Cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => 1,
            ]);
        }

        return back()->with('success');
    }

    public function update(Request $request, $id)
    {
        $cartItem = Cart::findOrFail($id);

        // Ensure quantity does not go below 1
        $newQuantity = max(1, $request->input('quantity'));

        $cartItem->update(['quantity' => $newQuantity]);

        return redirect()->route('cart.index')->with('success');
    }


    public function remove($id)
    {
        $cartItem = Cart::findOrFail($id);
        $cartItem->delete();

        return back()->with('success');
    }

}
