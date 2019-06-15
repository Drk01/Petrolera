<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function storage()
    {
        return $this->belongsTo('App\Stock');
    }
}
