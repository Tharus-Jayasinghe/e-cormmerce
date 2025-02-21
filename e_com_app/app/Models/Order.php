<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'size',
        'receiver_name',
        'receiver_address',
        'receiver_phone',
        'total_price',
        'payment_method',
        'status',
    ];
}
