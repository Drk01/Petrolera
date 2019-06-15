<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanStatus extends Model
{

    public function loans()
    {
        return $this->belongsToMany('App\Loans')->withTimestamps();
    }
}
