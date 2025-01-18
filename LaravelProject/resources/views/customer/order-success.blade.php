<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title> <!-- Sets the title of the page -->
</head>
<body style="background-color: #f9f9f9; font-family: Arial, sans-serif; color: #555555; margin: 0; padding: 20px;">
    <!-- Wrapper Table -->
    <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); padding: 20px;">
        <tr>
            <td align="center">
                <!-- Header Section -->
                <h1 style="font-size: 24px; color: #2b3a55; margin: 0;">Order Confirmed!</h1>
                <p style="font-size: 16px; color: #777777; margin: 8px 0 20px;">Thank you for your order, {{ Auth::user()->name }}.</p>
            </td>
        </tr>
        <tr>
            <td>
                <!-- Order Details Section -->
                <h3 style="font-size: 20px; color: #2b3a55; border-bottom: 2px solid #2b3a55; padding-bottom: 8px; margin: 0 0 16px;">Order Details</h3>
                <table width="100%" cellpadding="5" cellspacing="0" style="border-collapse: collapse;">
                    <!-- Order ID -->
                    <tr>
                        <th align="left" style="color: #2b3a55; padding: 8px; border-bottom: 1px solid #dddddd;">Order ID</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dddddd;">{{ $order->id }}</td>
                    </tr>
                    <!-- Total Price -->
                    <tr>
                        <th align="left" style="color: #2b3a55; padding: 8px; border-bottom: 1px solid #dddddd;">Total Price</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dddddd;">Rs. {{ $order->total_amount }}</td>
                    </tr>
                    <!-- Shipping Address -->
                    <tr>
                        <th align="left" style="color: #2b3a55; padding: 8px; border-bottom: 1px solid #dddddd;">Shipping Address</th>
                        <td style="padding: 8px; border-bottom: 1px solid #dddddd;">{{ $order->shipping_address }}</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td align="center">
                <!-- Additional Message -->
                <p style="font-size: 16px; color: #777777; margin: 16px 0;">Your order will be shipped shortly. We’ll notify you once it’s on the way!</p>
                <!-- Link to Home Page -->
                <a href="{{ route('home') }}" style="display: inline-block; background-color: #2b3a55; color: #ffffff; text-decoration: none; padding: 12px 24px; border-radius: 4px; font-size: 16px;">Go to Home</a>
            </td>
        </tr>
    </table>
</body>
</html>
