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
    public function products() {
        // return $this->belongsToMany('App\OrderDetail', 'order_detail', 'order_id', 'product_id');
        return $this->belongsToMany('App\Product');
    }
}
