<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $fillable = [
        'category_id', 'price', 'category_name', 'price', 'avg_rating', 'image', 'quantity',
    ];    
    public function orders() {
        return $this->belongsToMany('App\Order');
    }
    public function users() {
        return $this->belongsToMany('App\User');
    }
}
