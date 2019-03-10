<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
<<<<<<< HEAD
    public function orders () {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->belongsto('App\Oder');
    }
    public function products () {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->hasMany('App\Product');
    }
=======
    //
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a
}
