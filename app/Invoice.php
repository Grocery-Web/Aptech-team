<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'total_quantity', 'total_price', 'shipping_address', 'status'
    ];
}
