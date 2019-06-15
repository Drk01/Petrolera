<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    public function storages()
    {
        return $this->belongsToMany('App\Storage')->withTimestamps();
    }
}
