<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>
    @include('home.css')

    <style>
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 1200px;
            margin: 40px auto;
        }

        .cart_section {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .cart_section h2 {
            text-align: center;
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            border-radius: 12px;
            overflow: hidden;
        }

        th, td {
            padding: 14px;
            text-align: center;
            border: 1px solid #e5e7eb;
        }

        th {
            background-color: #000000;
            color: #ffffff;
            font-size: 16px;
        }

        td {
            background-color: #f9fafb;
        }

        td img {
            width: 80px;
            border-radius: 8px;
        }

        .btn-danger {
            background-color: #ef4444;
            color: #ffffff;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #dc2626;
        }

        .btn-primary {
            background-color: #2563eb;
            color: #ffffff;
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 14px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .cart_value {
            margin-top: 20px;
            padding: 15px;
            background-color: #f9fafb;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .cart_value h3 {
            color: #333333;
            font-size: 20px;
            margin: 0;
        }

        .order_form {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 50%;
            margin: 0 auto;
        }

        .order_form h2 {
            text-align: center;
            color: #333333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .form_group {
            margin-bottom: 20px;
        }

        .form_group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555555;
        }

        .form_group input, .form_group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 16px;
        }

        .form_group textarea {
            resize: vertical;
        }

        .button-container {
            display: flex;
            gap: 10px;
            justify-content: space-between;
        }

        .btn-success {
            flex: 1;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            background-color: #16a34a;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #15803d;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <div class="container">
        <div class="cart_section">
            <h2>Your Cart</h2>
            <table>
                <thead>
                    <tr>
                        <th>Product Title</th>
                        <th>Price</th>
                        <th>Image</th>
                        <th>Remove</th>
                        <th>Order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Initialize $value as a numeric value
                    $value = 0;
                    ?>
                    @foreach($cart as $cart)
                    <tr>
                        <td>{{$cart->product->title}}</td>
                        <td>${{$cart->product->price}}</td>
                        <td><img src="/products/{{$cart->product->image}}" alt="{{$cart->product->title}}"></td>
                        <td><a href="{{url('delete_cart', $cart->id)}}" class="btn-danger">Remove</a></td>
                        <td>
                        <a href="{{ url('order_product', $cart->id) }}" class="btn-primary">Order</a>

                        </td>
                    </tr>
                    <?php
                    // Ensure price is treated as a float
                    $price = (float) $cart->product->price;

                    // Check if price is numeric before adding
                    if (is_numeric($price)) {
                        $value += $price;
                    } else {
                        // Handle non-numeric price (optional)
                        $value += 0; // Assuming you want to add 0 in case of an invalid price
                    }
                    ?>
                    @endforeach
                </tbody>
            </table>
            <div class="cart_value">
                <h3>Total Value of Cart: ${{$value}}</h3>
            </div>
        </div>

        <!-- Order Form (optional code, commented out for now) -->
        <!--
        <div class="order_form">
            <h2>Place Your Order</h2>
            <form action="{{url('comfirm_order')}}" method="post">
                @csrf
                <div class="form_group">
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{Auth::user()->name}}" required>
                </div>
                <div class="form_group">
                    <label>Receiver Address</label>
                    <textarea name="address" rows="4" required>{{Auth::user()->address}}</textarea>
                </div>
                <div class="form_group">
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" value="{{Auth::user()->phone}}" required>
                </div>
                <div class="form_group">
                    <div class="button-container">
                        <button type="submit" class="btn-success">Cash on Delivery</button>
                        <a href="{{url('stripe', $value)}}" class="btn-primary">Pay Using Card</a>
                    </div>
                </div>
            </form>
        </div>
        -->
    </div>

    @include('home.footer')
</body>

</html>
