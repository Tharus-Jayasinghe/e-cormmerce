<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;  // Assuming you have a Cart model for your cart data

class CartController extends Controller
{
    // Show the cart view
    public function index()
    {
        // Assuming you have a Cart model to fetch the user's cart items
        $cart = Cart::where('user_id', auth()->id())->first();  // Fetch the current user's cart
        return view('cart.index', compact('cart'));  // Return a view with cart data
    }

    // Add item to the cart
    public function addItem(Request $request, $productId)
    {
        // Logic to add an item to the cart
        $cart = Cart::where('user_id', auth()->id())->firstOrCreate(['user_id' => auth()->id()]);
        $cart->products()->attach($productId, ['quantity' => $request->input('quantity')]);  // Assuming a many-to-many relation with products
        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

    // Remove an item from the cart
    public function removeItem($productId)
    {
        $cart = Cart::where('user_id', auth()->id())->first();
        $cart->products()->detach($productId);  // Detach the product from the cart
        return redirect()->route('cart.index')->with('success', 'Item removed from cart.');
    }

    // Confirm order (this can be used after checking the cart)
    public function confirmOrder(Request $request)
    {
        // Logic for confirming the order, e.g., saving order details, processing payment, etc.
        // This is where you could handle the checkout process
        return redirect()->route('home')->with('success', 'Order confirmed.');
    }

    // public function showCart()
    // {
    //     // Fetch the authenticated user's cart items
    //     $cartItems = Cart::where('user_id', auth()->id())->with('product')->get();

    //     return view('cart.index', compact('cartItems'));
    // }
}

