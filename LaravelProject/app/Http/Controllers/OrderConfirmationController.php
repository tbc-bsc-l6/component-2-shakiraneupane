<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

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

    // Send the order confirmation email
    Mail::to(Auth::user()->email)->send(new OrderConfirmationMail($order));

    // Display the order details
    return view('customer.order-success', compact('order'));
}

}
