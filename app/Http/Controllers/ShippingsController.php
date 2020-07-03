<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Shipping\ShippingStoreRequest;

use App\Shipping;
use App\Order;
use App\AdminUser;

class ShippingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('shipping.index')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('shippings', Shipping::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shipping.create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingStoreRequest $request)
    {
        Shipping::create([
            'name' => $request->name,
            'price' => $request->price
        ]);

        session()->flash('ok', 'Pristatymo metodas pridetas');

        return redirect()->route('shippings.index');
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
    public function edit(Shipping $shipping)
    {
        return view('shipping.create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('shipping', $shipping);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
