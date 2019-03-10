<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'category_id', 'user_id' , 'price', 'category_name', 'avg_rating', 'image', 'quantity'
    ];

    public function orders_products() {
        return $this->hasMany('App\Product');
    }

    public function users() {
        return $this->belongsto('App\User');
=======
	protected $fillable = [
        'category_id', 'price', 'category_name', 'price', 'avg_rating', 'image', 'quantity',
    ];    
    public function orders() {
        return $this->belongsToMany('App\Order');
    }
    public function users() {
        return $this->belongsToMany('App\User');
>>>>>>> 96cc1124d63e1a0b72c925b7e71bb68753ac271a
    }
}
