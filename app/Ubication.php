<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ubication extends Model
{
    public function stocks()
    {
        return $this->belongsToMany('App\Stock')->withTimestamps();
    }
}
