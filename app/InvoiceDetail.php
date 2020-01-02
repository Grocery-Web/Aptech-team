<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'invoice_id', 'user_id', 'product_id', 'total', 'product_quantity'
    ];
}
