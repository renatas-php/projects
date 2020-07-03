<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Cart;

class Category extends Model
{
   protected $fillable = ['name'];

   public function product(){
      return $this->hasMany(Product::class);
   }

   public function userCount(){
      $guest = Cart::all()->where('user_id', request()->ip());
      $countUser = $guest->count();
      return $countUser;
  }

}
