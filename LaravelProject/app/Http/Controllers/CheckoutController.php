<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index()
    {
        // Retrieve cart items for the logged-in user
        $cartItems = Cart::where('user_id', Auth::id())->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Pass the cart items to the checkout view
        return view('customer.checkout', compact('cartItems'));
    }
    public function processCheckout(Request $request)
    {
        // Get cart items and shipping address
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $shippingAddress = $request->input('shipping_address');

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
        }

        // Create a new order
        $order = new Order();
        $order->user_id = Auth::id();
        $order->shipping_address = $shippingAddress;
        $order->total_amount = $cartItems->sum(fn($item) => $item->book->price * $item->quantity);
        $order->save();

        // Redirect to the confirmation page
        return redirect()->route('order.confirmation')->with('order_id', $order->id);
    }
}
