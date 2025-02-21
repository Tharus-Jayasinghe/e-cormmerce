<?php

namespace App\Http\Controllers;

use App\Models\ShoppingList;
use Illuminate\Http\Request;

class ShoppingListController extends Controller
{
    public function index()
    {
        $shoppingLists = ShoppingList::with('user')->latest()->get();
        return view('shopping.index', compact('shoppingLists'));
    }

    public function create()
    {
        return view('shopping.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'products' => 'required|array',
        ]);

        ShoppingList::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'products' => $request->products,
        ]);

        return redirect()->route('shopping.index')->with('success', 'Shopping list created!');
    }

    public function show(ShoppingList $shoppingList)
    {
        return view('shopping.show', compact('shoppingList'));
    }
}
