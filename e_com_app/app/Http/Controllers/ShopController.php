<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    public function shop()
    {
        $product = Product::all();

        if (Auth::id()) {
            $user = Auth::user();
            $userid = $user->id;
            $count = Cart::where('user_id', $userid)->count();
        } else {
            $count = '';
        }

        return view('home.shop', compact('product', 'count'));
    }
}
