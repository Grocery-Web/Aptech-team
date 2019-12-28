<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'parent_id', 'user_id', 'product_id', 'level'
    ];
}
