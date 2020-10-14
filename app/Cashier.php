<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cashier extends Model
{
    public function orders()
    {
        return $this->hasMany('App\Order','cashier_id');
    }

}
