<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Product;
use App\City;

class OraiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('index');
    }

    public function main(){



        if(request()->filled('city')){
        $pl = request('city');
        
        $response = Http::get("https://api.meteo.lt/v1/places/{$pl}/forecasts/long-term");
        $response->json();
        
        
        $cond =  $response['forecastTimestamps'][1]['conditionCode'];

        $products = Product::all()->where('conditions', $cond);
        
     
        return view('index')->with('data', $cond)->with('products', $products)->with('cities', City::all());
    }
    $cond = 'Pasirinkite miestą';
    $products = Product::all()->where('conditions', $cond);
    return view('index')->with('data', $cond)->with('products', $products)->with('cities', City::all());
       
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
    {
        //
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
