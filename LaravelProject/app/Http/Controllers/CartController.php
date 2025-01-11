<?php
namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display the current user's cart items.
     */
    public function index()
    {
        // Get the current user's cart items, including associated book data
        $cartItems = Cart::where('user_id', Auth::id())->with('book')->get();

        // Return the cart view with the cart items
        return view('customer.cart', compact('cartItems'));
    }

    /**
     * Add a book to the cart.
     */
    public function addToCart(Request $request)
    {
        // Validate the book ID to ensure it exists in the books table
        $request->validate([
            'book_id' => 'required|exists:books,id',
        ]);

        $userId = Auth::id();
        $bookId = $request->input('book_id');

        // Check if the book is already in the user's cart
        $cartItem = Cart::where('user_id', $userId)->where('book_id', $bookId)->first();

        if ($cartItem) {
            // If the book is already in the cart, increment the quantity
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            // If the book is not in the cart, add a new item with quantity 1
            Cart::create([
                'user_id' => $userId,
                'book_id' => $bookId,
                'quantity' => 1,
            ]);
        }

        // Redirect back with a success message
        return back()->with('success', 'Book added to cart successfully!');
    }

    /**
     * Update the quantity of an item in the cart.
     */
    public function update(Request $request, $id)
    {
        // Find the cart item by its ID
        $cartItem = Cart::findOrFail($id);

        // Ensure the quantity does not go below 1
        $newQuantity = max(1, $request->input('quantity'));

        // Update the quantity of the cart item
        $cartItem->update(['quantity' => $newQuantity]);

        // Redirect to the cart page with a success message
        return redirect()->route('cart.index')->with('success', 'Cart updated successfully!');
    }

    /**
     * Remove an item from the cart.
     */
    public function remove($id)
    {
        // Find the cart item by its ID
        $cartItem = Cart::findOrFail($id);

        // Delete the cart item
        $cartItem->delete();

        // Redirect back with a success message
        return back()->with('success', 'Book removed from cart successfully!');
    }
}
