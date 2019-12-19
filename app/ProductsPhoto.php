<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductsPhoto extends Model
{
    public $timestamps = true;
    protected $fillable = ['product_id', 'photos'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
