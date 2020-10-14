<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function cashier()
    {
        return $this->hasMany('App\Cashier','branch_id');
    }
}
