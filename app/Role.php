<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $timestamps = true;
    protected $fillable = ['lv_user'];

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
