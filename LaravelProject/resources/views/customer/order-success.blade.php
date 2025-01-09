<!DOCTYPE html>
<html>
<head>
    <title>Order Confirmation</title>
    <style>
        .order-success-section {
            max-width: 500px;
            margin: 40px auto;
            padding: 30px;
            background-color: #f5f5f5;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
            font-family: 'Helvetica Neue', Arial, sans-serif;
            color: #444;
        }

        .order-success-section h1 {
            color: #2b3a55;
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
            font-weight: bold;
        }

        .order-success-section p {
            margin: 15px 0;
            line-height: 1.8;
            font-size: 1.1em;
            color: #666;
            text-align: center;
        }

        .order-success-section h3 {
            font-size: 1.8em;
            color: #2b3a55;
            margin-top: 30px;
            margin-bottom: 15px;
            font-weight: bold;
            border-bottom: 3px solid #2b3a55;
            padding-bottom: 5px;
        }

        .order-success-section table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 1em;
            border: 1px solid #ddd;
        }

        .order-success-section table th,
        .order-success-section table td {
            padding: 15px;
            text-align: left;
        }

        .order-success-section table th,  .order-success-section table td  {
            background-color: #f7f9fc;
            color: #2b3a55;
            font-weight: bold;
            border-bottom: 2px solid #ddd;
        }


        .order-success-section .total-price {
            text-align: right;
            font-size: 1.2em;
            font-weight: bold;
            color: #2b3a55;
            margin-top: 15px;
        }

        .order-success-section .btn {
            display: inline-block;
            padding: 12px 24px;
            font-size: 1em;
            text-decoration: none;
            color: white;
            background-color: #2b3a55;
            border-radius: 6px;
            transition: background-color 0.3s ease;
            margin: 20px auto;
            text-align: center;
            font-weight: bold;
        }

        .order-success-section .btn:hover {
            background-color: #1f2c44;
            cursor: pointer;
        }

        .order-success-section .btn-primary {
            text-align: center;
            display: block;
        }
    </style>
</head>
<body>
    <div class="order-success-section">
        <h1>Order Confirmed!</h1>
        <p>Thank you for your order, {{ Auth::user()->name }}.</p>
        <h3>Order Details</h3>
        <table>
            <tr>
                <th>Order ID</th>
                <td>{{ $order->id }}</td>
            </tr>
            <tr>
                <th>Total Price</th>
                <td>Rs. {{ $order->total_amount }}</td>
            </tr>
            <tr>
                <th>Shipping Address</th>
                <td>{{ $order->shipping_address }}</td>
            </tr>
        </table>
        <p>Your order will be shipped shortly. We’ll notify you once it’s on the way!</p>
        <a href="{{ route('home') }}" class="btn btn-primary">Go to Home</a>
    </div>
</body>
</html>
