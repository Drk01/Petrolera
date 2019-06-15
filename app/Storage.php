<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    public function environments()
    {
        return $this->belongsToMany('App\Environments')->withTimestamps();
    }

    public function driveTypes()
    {
        return $this->belongsToMany('App\DriveType')->withTimestamps();
    }

    public function trademarks()
    {
        return $this->belongsToMany('App\Trademark')->withTimestamps();
    }

    public function units()
    {
        return $this->belongsToMany('App\Unit')->withTimestamps();
    }
}
