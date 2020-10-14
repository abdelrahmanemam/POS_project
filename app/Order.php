<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function cashier()
    {
        return $this->hasOne('App\Cashier','cashier_id');
    }

    public function products(){

        return $this->belongsToMany('App\Product','order_products');
    }
}

