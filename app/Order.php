<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Order extends Model
{
    protected $fillable = ['user_id', 'bil_email', 'bil_name', 
    'bil_adress', 'bil_city', 'postcode', 'bil_phone',
     'shipping', 'ship_price', 'total_price', 'status'];
    
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function products(){
        return $this->belongsToMany('App\Product')->withPivot('qty');
    }

    public function deleteCart(){
        Cart::destroy()->where('user_id', @auth()->user()->id);
    }

    
}
