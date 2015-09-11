<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

    protected $fillable = ['county', 'city', 'state'];

    public function products()
    {
        return $this->hasMany('App\Product');
    }
}
