<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'name', 'description', 'image','price','type'
    ];

    public function getPriceAttribute($value){
        return $value;
    }

    public function product_photo()
    {
        return $this->hasMany('App\ProductsPhoto');
    }
}
