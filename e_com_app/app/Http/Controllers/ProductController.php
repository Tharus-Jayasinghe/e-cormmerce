<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // public function search(Request $request)
    // {
    //     $query = $request->query('query');
    //     $products = Product::where('title', 'LIKE', "%{$query}%")
    //         ->orWhere('description', 'LIKE', "%{$query}%")
    //         ->get();

    //     return response()->json($products);
    // }

    public function getProductsByCategory($id)
{
    $products = Product::where('category_id', $id)->get();

    // Ensure the data is returned as JSON
    return response()->json($products);
}

}
