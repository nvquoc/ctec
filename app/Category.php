<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';

    public $timestamps = false;

    public function post()
    {
        return $this->hasMany('App\Post', 'category_id', 'id');
    }
}
