<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DriveType extends Model
{

    public function storages()
    {
        return $this->belongsToMany('App\Storage')->withTimestamps();
    }
}
