<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_product extends Model
{
    public function orders () {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->belongsto('App\Oder');
    }
    public function products () {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->hasMany('App\Product');
    }
}
