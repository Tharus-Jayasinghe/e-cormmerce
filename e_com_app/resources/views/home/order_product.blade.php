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

        .form_group input,
        .form_group textarea {
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

        .btn-success,
        .btn-primary {
            flex: 1;
            padding: 12px;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-success {
            background-color: #16a34a;
        }

        .btn-success:hover {
            background-color: #15803d;
        }

        .btn-primary {
            background-color: #2563eb;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }
    </style>
</head>

<body>
    <div class="hero_area">
        @include('home.header')
    </div>

    <div class="container">
        <div class="order_form">
            <h2>Place Your Order</h2>
            <form action="{{ url('confirm_order') }}" method="post">
                @csrf
                <div class="form_group">
                    <label>Product Title</label>
                    <input type="text" value="{{ $cart->product->title }}" disabled>
                </div>
                <div class="form_group">
                    <label>Receiver Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="form_group">
                    <label>Receiver Address</label>
                    <textarea name="address" rows="4" required>{{ Auth::user()->address }}</textarea>
                </div>
                <div class="form_group">
                    <label>Receiver Phone</label>
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" required>
                </div>
                <div class="form_group">
                    <label>Total Price</label>
                    <input type="text" value="${{ $cart->product->price }}" disabled>
                    <input type="hidden" name="cart_id" value="{{ $cart->id }}">
                </div>

                <!-- New Quantity Field -->
                <div class="form_group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" required>
                </div>

                <!-- New Size Field -->
                <div class="form_group">
                    <label>Size</label>
                    <select name="size" required>
                        <option value="small">S</option>
                        <option value="medium">M</option>
                        <option value="large">L</option>
                    </select>
                </div>

                <div class="form_group">
                    <div class="button-container">
                        <button type="submit" class="btn-success">Cash on Delivery</button>
                        <a href="{{ url('stripe', $cart->product->price) }}" class="btn-primary">Pay Using Card</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @include('home.footer')
</body>

</html>
