<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;
    //
    protected $fillable = [
        'name', 'description', 'image','price','type', 'quantity'
    ];



    public function getPriceAttribute($value){
        return $value;
    }
}
