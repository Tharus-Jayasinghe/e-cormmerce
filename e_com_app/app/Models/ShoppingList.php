<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    protected $fillable = ['user_id', 'title', 'description', 'products'];

    protected $casts = [
        'products' => 'array', // Automatically convert JSON to array
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

