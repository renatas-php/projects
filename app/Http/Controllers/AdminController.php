<?php

namespace App\Http\Controllers;

use App\AdminUser;
use App\Order;
use App\User;
use App\Subscriber;
use App\Product;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('/admin/dashboard')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('orders', Order::all()->sortByDesc('created_at')->take(10))
        ->with('users', User::all())
        ->with('subscribers', Subscriber::all())
        ->with('products', Product::all())
        ->with('admin', AdminUser::all());
    }

    public function login(){
        return view('/admin/login');
    }

    public function loged(Request $request){

        $email = AdminUser::all()->pluck('email')->toArray();

        $pass = AdminUser::all()->pluck('password')->toArray();

        if( in_array($request->email, $email) AND in_array($request->password, $pass)){

            session()->put('adminLogin', 'Admin');
            
            return redirect()->route('admin.dashboard');

            }else{
               
                session()->flash('ok', 'Neteisingi prisijungimo duomenys');
            }
            
    }
}
