<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Brand\BrandStoreRequest;
use App\Http\Requests\Brand\BrandUpdaterequest;

use App\Brand;
use App\Order;
use App\AdminUser;
use Storage;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/brand/index')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('brands', brand::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/brand/create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all());
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {   
        
        Brand::create([
            'name' => $request->name
        ]);

        session()->flash('ok', 'Prekes zenklas pridetas');

        return redirect(route('brands.index'));
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
    public function edit(Brand $brand)
    {
        return view('/brand/create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('brand', $brand);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {   
     

        
       

        $data = $request->only(['name']);

        if($request->hasFile('logo')){
            $logo = $request->logo->store('images');

            Storage::delete($brand->logo);

            $data['logo'] = $logo;
        }
        
        
        $brand->update($data);

        session()->flash('ok', 'Prekės ženklas atnaujintas');

        return redirect(route('brands.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $brand->delete();

        session()->flash('ok', 'Prekės ženklas ištrintas');

        return redirect(route('brands.index'));
    }
}
