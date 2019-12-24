<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'product_id', 'product_quantity','total_price','shipping_address'
    ];
}