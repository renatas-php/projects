<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MenuBanner;
use App\Order;
use App\AdminUser;

use Storage;

class MenuBannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('extra.banner')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('banners', MenuBanner::all());
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
    {   $banner = MenuBanner::find($id);
       
        return view('extra.create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('menubanner', $banner);
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
        $banner = MenuBanner::find($id);

        $data = $request->only(['text']);
       

        
       if($request->hasFile('icon')){
            $icon = $request->icon->store('images');

            Storage::delete($banner->icon);
            $data['icon'] = $icon;
            
        
       }

        $banner->update($data);

        session()->flash('ok', 'Meniu info juosta atnaujinta');

        return redirect()->route('banners.index');
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
