<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

    <!-- Order Confirmation Section -->
    <div class="max-w-2xl mx-auto my-10 p-8 bg-gray-50 rounded-xl shadow-lg font-sans text-gray-700">

        <!-- Main Heading -->
        <h1 class="text-4xl font-bold text-[#2b3a55] text-center mb-6">Order Confirmed!</h1>

        <!-- Thank you message with user name -->
        <p class="text-lg text-gray-600 text-center mb-8">Thank you for your order, {{ Auth::user()->name }}.</p>

        <!-- Order Details Section -->
        <h3 class="text-2xl font-semibold text-[#2b3a55] border-b-4 border-[#2b3a55] pb-2 mb-6">Order Details</h3>

        <!-- Order Details Table -->
        <table class="w-full text-left border-collapse">
            <!-- Order ID Row -->
            <tr class="border-b">
                <th class="px-4 py-2 font-medium text-[#2b3a55]">Order ID</th>
                <td class="px-4 py-2">{{ $order->id }}</td>
            </tr>

            <!-- Total Price Row -->
            <tr class="border-b">
                <th class="px-4 py-2 font-medium text-[#2b3a55]">Total Price</th>
                <td class="px-4 py-2">Rs. {{ $order->total_amount }}</td>
            </tr>

            <!-- Shipping Address Row -->
            <tr class="border-b">
                <th class="px-4 py-2 font-medium text-[#2b3a55]">Shipping Address</th>
                <td class="px-4 py-2">{{ $order->shipping_address }}</td>
            </tr>
        </table>

        <!-- Shipping Information -->
        <p class="text-lg text-gray-600 text-center mt-6 mb-8">Your order will be shipped shortly. We’ll notify you once it’s on the way!</p>

        <!-- Button to go back to Home -->
        <a href="{{ route('home') }}" class="inline-block bg-[#2b3a55] text-white py-3 px-6 rounded-lg text-lg font-semibold text-center w-full hover:bg-[#1f2c44] transition-colors">Go to Home</a>
    </div>

</body>

</html>
