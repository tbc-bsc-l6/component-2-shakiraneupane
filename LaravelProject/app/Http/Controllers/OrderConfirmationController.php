<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderConfirmationController extends Controller
{
    public function showConfirmationPage(Request $request)
    {
        // Get the order ID from session
        $orderId = $request->session()->get('order_id');

        if (!$orderId) {
            return redirect()->route('home')->with('error', 'Order not found.');
        }

        // Fetch the order details
        $order = Order::with('items.book')->find($orderId);

        if (!$order || $order->user_id != Auth::id()) {
            return redirect()->route('home')->with('error', 'You are not authorized to view this order.');
        }

        // Display the order details
        return view('customer.order-success', compact('order'));
    }
}
