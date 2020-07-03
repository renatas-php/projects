<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price', 'image', 'category_id', 'brand_id'];





    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }

    public function productOrder(){
        return $this->belongsTo(OrderProduct::class);
    }


}
