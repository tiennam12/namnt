<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'user_id' , 'price', 'categor', 'avg_rating', 'image', 'quantity', 'product_name',
    ];

    public function orders_products() {
        return $this->hasMany('App\Product');
    }

    public function users() {
        return $this->belongsto('App\User');
    }    
    public function category() {
        return $this->belongsTo('App\Category');

    }


}
