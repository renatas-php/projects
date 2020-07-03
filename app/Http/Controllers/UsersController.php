<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\Product;

use App\AdminUser;
use App\MenuBanner;

class UsersController extends Controller
{
    public function index(){
        return view('user.index')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('users', User::all());
    }

    public function profile(User $user){
        $user_id = auth()->user()->id;

        return view('front.profile')
        ->with('users', User::all())
        ->with('menubans', MenuBanner::all())
        ->with('orders', Order::all()->where('user_id', $user_id))
        ->with('categories', Category::all());

    }

    public function ordersUser(Order $order){

        $user_id = auth()->user()->id;

        
       
        
        
        
        
        
      

        return view('front/orders')->with('order', $order)
        ->with('menubans', MenuBanner::all())
        ->with('orderProducts', OrderProduct::all()->where('order_id', $order->id))
        ->with('products', Product::all())
        ->with('users', User::all())
       
        ->with('categories', Category::all());
    }
}
