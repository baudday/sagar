<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'freight', 'margin', 'delivered_price', 'location_id'];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
