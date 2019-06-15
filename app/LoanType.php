<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanType extends Model
{

    public function loans()
    {
        return $this->belongsToMany('App\Loan')->withTimestamps();
    }
}
