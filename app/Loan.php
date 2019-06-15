<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function stock()
    {
        return $this->belongsTo('App\Stock');
    }

    public function loanstatuses()
    {
        return $this->belongsToMany('App\LoanStatus')->withTimestamps();
    }
}
