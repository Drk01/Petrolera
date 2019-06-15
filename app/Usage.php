<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    public function storages()
    {
        return $this->belongsToMany('App\Storage')->withTimestamps();
    }
}
