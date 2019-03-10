<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'total_price', 'description','status',
    ];
<<<<<<< HEAD
    public function order_products () {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->hasMany('App\order_product');
=======
    public function products() {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->belongsToMany('App\Product');
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a
    }
}
