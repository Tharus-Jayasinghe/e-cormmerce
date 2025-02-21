<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            border: 2px solid #000;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
        }
        .content {
            text-align: left;
            line-height: 1.6;
        }
        .content h3, .content h2 {
            margin: 10px 0;
        }
        .center {
            text-align: center;
            margin: 20px 0;
        }
        img {
            display: block;
            margin: 20px auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <h3>Customer Name: {{$data->name}}</h3>
            <h3>Customer Address: {{$data->rec_address}}</h3>
            <h3>Phone: {{$data->phone}}</h3>
            <h3>Product Title: {{$data->product->title}}</h3>
            <h3>Price: {{$data->product->price}}</h3>
        </div>
        <img src="products/{{$data->product->image}}" alt="Product Image" height="150" width="200">
    </div>
</body>
</html>
