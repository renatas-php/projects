<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use App\Cart;
use App\MenuBanner;
use App\Order;
use App\AdminUser;

use Storage;

use Illuminate\Http\Request;
use App\Http\Requests\Product\ProductStoreRequest;
use App\Http\Requests\Product\ProductUpdateRequest;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('/product/index')
        ->with('menubans', MenuBanner::all())
        ->with('products', Product::all())
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('categories', Category::all())
        ->with('cart', Cart::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/product/create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('categories', Category::all())->with('brands', Brand::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {
       $image = $request->image->store('images');

      Product::create([
           'name' => $request->name,
           'description' => $request->description,
           'price' => $request->price,
           'image' => $image,
           'category_id' => $request->category,
           'brand_id' => $request->brand
       ]);

       
       session()->flash('ok', 'Produktas pridetas');

       return redirect(route('products.index'));
       
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

    public function showById($categoryId){
        
        return view('/product/index')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('products', Product::all()->where('category_id', $categoryId))
        ->with('categories', Category::all());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('product/create')
        ->with('ordersNote', Order::all()->sortByDesc('created_at')->take(4))
        ->with('admin', AdminUser::all())
        ->with('product', $product)->with('categories', Category::all())->with('brands', Brand::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {   
        $data = $request->only(['name', 'description', 'price', 'category', 'brand']);

        if($request->hasFile('image')){
            
            $image = $request->image->store('images');

            Storage::delete($product->image);
            $data['image'] = $image;
        }

        


        $product->update($data);

        session()->flash('ok', 'Produkto informacija atnaujinta');

        return redirect(route('products.index'));
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
