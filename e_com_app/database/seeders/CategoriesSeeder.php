<?php

use Illuminate\Database\Seeder;
use App\Models\Category; // Import the Category model

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        // Insert some categories into the categories table
        Category::create(['category_name' => 'Electronics']);
        Category::create(['category_name' => 'Fashion']);
        Category::create(['category_name' => 'Home']);
        Category::create(['category_name' => 'Books']);
        // Add more categories as needed
    }
}
