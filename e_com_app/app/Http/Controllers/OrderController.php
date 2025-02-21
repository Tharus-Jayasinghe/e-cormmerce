<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Cart;

class OrderController extends Controller
{
    public function confirmOrder(Request $request)
    {
        // Retrieve cart by ID
        $cart = Cart::find($request->cart_id);

        if (!$cart) {
            return redirect()->back()->with('error', 'Cart not found.');
        }

        // Create a new order
        $order = new Order();
        $order->user_id = auth()->id();
        $order->product_id = $cart->product_id;
        $order->quantity = $request->quantity;
        $order->size = $request->size;
        $order->receiver_name = $request->name;
        $order->receiver_address = $request->address;
        $order->receiver_phone = $request->phone;
        $order->total_price = $cart->product->price * $request->quantity;
        $order->payment_method = 'Cash on Delivery';
        $order->status = 'Pending';

        $order->save();

        // Remove the cart item
        $cart->delete();

        return redirect()->route('home')->with('success', 'Order placed successfully!');
    }
}
