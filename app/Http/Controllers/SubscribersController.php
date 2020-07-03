<?php

namespace App\Http\Controllers;

use App\Subscriber;
use App\Order;
use App\AdminUser;


use Illuminate\Http\Request;

class SubscribersController extends Controller
{
    public function index(){
        return view('subscribers.index')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('subscribers', Subscriber::all());
    }

    public function store(Request $request){
        
        $email = Subscriber::all();
        if( $email == $request->email ){

            
            return redirect()->route('/');
           
        }
        Subscriber::create([
            'email' => $request->email
        ]);

        
        session()->flash('ok', 'Naujienlaiškis užprenumeruotas'); 
        return redirect()->route('/');
        }

    
}
