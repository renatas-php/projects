<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\AfterSlider;
use App\Order;
use App\AdminUser;

use Storage;

class AfterSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('afterSlider/index')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('afterSlider', AfterSlider::all());
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
        $after = AfterSlider::find($id);

        return view('afterSlider/create')
        ->with('admin', AdminUser::all())
        ->with('after', $after)->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4));
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
        $after = AfterSlider::find($id);
        $data = $request->only(['title', 'text']);

       if($request->hasFile('image')){
           $image = $request->image->store('images');

           Storage::delete($after->image);
           $data['image'] = $image;
       }

       $after->update($data);

       return redirect()->route('afterSlider.index');
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
