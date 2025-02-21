<?php

namespace App\Http\Controllers;

use App\Models\Product; // Assuming you have a Product model
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
{
    $query = $request->input('query');
    $category = $request->input('category');
    $products = Product::where('title', 'like', '%' . $query . '%')
                       ->when($category, function ($query) use ($category) {
                           return $query->where('category_id', $category);
                       })
                       ->get();

    return response()->json($products);
}


}
