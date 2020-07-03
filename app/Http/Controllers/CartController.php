<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Cart\CartStoreRequest;
use App\Http\Requests\Cart\CartQtyUpdateRequest;


use App\Cart;
use App\Category;
use App\User;
use App\Shipping;
use App\MenuBanner;


class CartController extends Controller
{


   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cart $cart)

    {   
        

        if(auth()->user()){
            return view('cart/checkout')
        ->with('categories', Category::all())
        ->with('shippings', Shipping::all())
        ->with('menubans', MenuBanner::all())
        ->with('carts', Cart::all()->where('user_id', auth()->user()->id));
        }else

       
        
      
        return view('cart/checkout')->with('cart', $cart)
        ->with('categories', Category::all())
        ->with('shippings', Shipping::all())
        ->with('menubans', MenuBanner::all())
        ->with('carts', Cart::all()->where('user_id', request()->ip()));

        
    
        
    }

    public function cart(Cart $cart)
    {
     
      
    
    
        
    }


     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function proceed()
    {
     
        if(auth()->user()){
            return view('cart/final')
        ->with('categories', Category::all())
        ->with('shippings', Shipping::all())
        ->with('menubans', MenuBanner::all())
        ->with('carts', Cart::all()->where('user_id', auth()->user()->id));
        }else

        
        return view('cart/final')
        ->with('categories', Category::all())
        ->with('shippings', Shipping::all())
        ->with('menubans', MenuBanner::all())
        ->with('cart', Cart::all()->where('user_id', request()->ip()))
        ->with('carts', Cart::all()->where('user_id', request()->ip()));
      

        //->where('user_id', auth()->user()->id)
    
        
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
    public function store(CartStoreRequest $request, Cart $cart)

    {   
        $cart = Cart::all()->pluck('product_id');
        
        $cartid = $cart->toArray();
         
        if(in_array($request->product_id, $cartid)){

           
            session()->flash('ok', 'Produktas jau yra Jūsų krepšelyję');

            return redirect()->route('cart.index');

        } 
              
    
           

        
        $total = $request->qty * $request->price;
        

         Cart::create([
           

            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'product_name' => $request->product_name,
            'price' => $request->price,
            'qty' => $request->qty,
            'total' => $total,
            'product_image' => $request->product_image

        ]);


        session()->flash('ok', 'Prekė pridėta į krepšelį');

        return redirect()->route('cart.index')->with('carts', $cart);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        
       
       $total = $request->qty * $request->price;
      
       $data = $request->only(['qty']);
       $data['total'] = $total;


       $id = Cart::where('id', $id);

       $id->update($data);
       
       
       

       

       

        
        

       
       

       session()->flash('ok', 'Produkto kiekis atnaujintas');

       return redirect()->route('cart.index');
       // return response()->json([ 'success' => true ]);
        

      

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();

        session()->flash('ok', 'Prekė išimta iš krepšelio');

        return redirect()->route('cart.index');
    }
}
