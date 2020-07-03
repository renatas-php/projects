<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;

class OrderProduct extends Model
{
    protected $table = 'order_product';

    protected $fillable = ['order_id', 'product_id', 'qty', 'user_id', 'product_name', 'product_price', 'product_img'];

    public function products(){
        return $this->belongsTo('App\Product');
    }
}
