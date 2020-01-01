<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'headline', 'content', 'parent_id', 'user_id', 'product_id', 'level'
    ];
}
