<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Category extends Model
 


{
    public function show()
    {
        // Fetch all categories from the database
        $categories = Category::all();

        // Pass the categories to the view
        return view('your-view-name', compact('categories'));
    }
}
