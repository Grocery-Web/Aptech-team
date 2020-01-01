<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = true;
    protected $fillable = ['name', 'parent_id'];
    
    public function subcategory(){
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function product(){
        return $this->hasMany('App\Product', 'cate_id');
    }
}
