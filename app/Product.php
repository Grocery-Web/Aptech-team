<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = true;
    //
    protected $fillable = [
        'name', 'description', 'weight', 'width', 'depth', 'height', 'producer', 'image','price','type', 'quantity'
    ];

    public function getPriceAttribute($value){
        return $value;
    }

    public function product_photo()
    {
        return $this->hasMany('App\ProductsPhoto', 'product_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
