<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['name', 'opis_avg', 'freight', 'margin', 'location_id'];

    public function location()
    {
        return $this->belongsTo('App\Location');
    }
}
