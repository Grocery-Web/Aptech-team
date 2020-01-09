<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id', 'total_quantity', 'total_price', 'receiver_name', 'receiver_phone', 'shipping_address', 'status'
    ];
}
