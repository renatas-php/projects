<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Category\CategoryStoreRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;

use App\Category;
use App\Cart;
use App\Order;
use App\AdminUser;


class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        return view('category/index')->with('categories', Category::all())
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('cart', Cart::all());
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        Category::create([
            'name' => $request->name
        ]);

        session()->flash('ok', 'Nauja kategorija pridėta');
        return redirect(route('categories.index'));
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
    public function edit(Category $category)
    {
        return view('category.create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
       $category->name = $request->name;

       $category->save();

       session()->flash('ok', 'Kategorija atnaujinta');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       $category->delete();

       session()->flash('ok', 'Kategorija ištrinta');

       return redirect(route('categories.index'));
    }
}
