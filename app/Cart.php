<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'product_name', 'price', 'qty', 'total', 'product_image'];

    
public function userCount(){
    $guest = $this->all()->where('user_id', request()->ip());
    $countUser = $guest->count();
    return $countUser;
}
    
}
