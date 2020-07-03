<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderProduct;
use App\Cart;
use App\MenuBanner;
use App\Mail\OrderPlaced;
use App\AdminUser;

use Stripe\Error\Card;
use Stripe;
use Mail;




class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders/index')
        ->with('menubans', MenuBanner::all())
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('orders', Order::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    
    {     try{
        
        $charge = Stripe::charges()->create([
                'amount' => $request->total_price,
                'currency' => 'EUR',
                'source' => $request->stripeToken,
                'description' => 'uzsakymas',
                'receipt_email' => $request->bil_email,

        ]);

    } catch (Exception $e){

    }

        $guest = mt_rand(1000000, 9999999);
       
        

       $order = Order::create([
            
            'bil_name' => $request->bil_name,
            'bil_email' => $request->bil_email,
            'bil_adress' => $request->bil_adress,
            'bil_city' => $request->bil_city,
            'bil_phone' => $request->bil_phone,
            'postcode' => $request->postcode,
            'user_id' => auth()->user() ? auth()->user()->id : $guest,
            'shipping' => $request->shipping,
            'ship_price' => $request->ship_price,
            'total_price' => $request->total_price


        ]);

        foreach(Cart::all() as $cart){
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'qty' => $cart->qty,
                'user_id' => $order->user_id,
                'product_name' => $cart->product_name,
                'product_price' => $cart->price,
                'product_img' => $cart->product_image
            ]);
        }
       
       
       
       

        if(auth()->user()){
        $id = $cart->user_id;
        Cart::where('user_id', $id)->delete();
        return redirect()->route('front.thankyou');
        }else{
           Mail::send(new OrderPlaced($order));
           
           $cart = $cart->user_id;
           Cart::where('user_id', $cart)->delete();
           return redirect()->route('front.thankyou');
           
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('orders/show')
        ->with('menubans', MenuBanner::all())
        ->with('order', $order)
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('orderProducts', OrderProduct::all()->where('order_id', $order->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
      
       $data = $request->only(['status']);
      


       $order = Order::where('id', $id);

       $order->update($data);

       session()->flash('ok', 'Užsakymo statusas pakeistas');

       return redirect()->route('admin.dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      
        

        Cart::where('user_id', $id)->delete();

        return redirect()->route('cart.index');

        
    }
}
