<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    /**
     * Display the checkout page with the user's cart items.
     */
    public function index()
    {
        // Retrieve the cart items for the logged-in user
        $cartItems = Cart::where('user_id', Auth::id())->get();

        // If the cart is empty, redirect the user back to the cart page with an error message
        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Pass the cart items to the checkout view
        return view('customer.checkout', compact('cartItems'));
    }

    /**
     * Process the checkout, create an order, and clear the user's cart.
     */
    public function processCheckout(Request $request)
{
    // Get cart items and shipping address from the request
    $cartItems = Cart::where('user_id', Auth::id())->get();
    $shippingAddress = $request->input('shipping_address');

    // If the cart is empty, redirect to the cart page with an error message
    if ($cartItems->isEmpty()) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    // Create a new order instance
    $order = new Order();
    $order->user_id = Auth::id(); // Associate the order with the current user
    $order->shipping_address = $shippingAddress; // Set the shipping address
    $order->total_amount = $cartItems->sum(fn($item) => $item->book->price * $item->quantity); // Calculate the total amount based on cart items
    $order->save(); // Save the order to the database

    // Step to populate the order_items table
    foreach ($cartItems as $cartItem) {
        // Create a new order item for each cart item
        OrderItem::create([
            'order_id' => $order->id, // Associate with the created order
            'book_id' => $cartItem->book_id, // Book ID from cart item
            'quantity' => $cartItem->quantity, // Quantity from cart item
            'price' => $cartItem->book->price, // Price from the book associated with the cart item
        ]);
    }

    // Clear the user's cart after placing the order
    Cart::where('user_id', Auth::id())->delete();

    // Redirect to the order confirmation page with the order ID
    return redirect()->route('order.confirmation')->with('order_id', $order->id);
}
}
