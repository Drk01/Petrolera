<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    public function storage()
    {
        return $this->belongsTo('App\Stock');
    }

    public function ubications()
    {
        return $this->belongsToMany('App\Ubication')->withTimestamps();
    }

    public function trash()
    {
        return $this->hasOne('App\Trash');
    }
}
