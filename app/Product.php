<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'category_id', 'user_id' , 'price', 'category_name', 'avg_rating', 'image', 'quantity',
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
