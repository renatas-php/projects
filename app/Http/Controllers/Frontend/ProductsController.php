<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

use App\Product;
use App\Category;
use App\Cart;
use App\MenuBanner;
use App\Brand;

class ProductsController extends Controller
{
    public function show(Product $product){

       $id = $product->id;
       
       

        return view('front.product')
        ->with('product', $product)
        ->with('cart', Cart::all())
        ->with('menubans', MenuBanner::all())
        ->with('categories', Category::all())
        ->with('relatedProd', Product::all()->random(4));
        
    }

    public function search(Request $request){
        $search = $request->input('search');
        $products = Product::where('name', 'like', "%$search%");
        

        

        return view('front.search')
        ->with('products', $products)
        ->with('cart', Cart::all())
        
        ->with('menubans', MenuBanner::all())
        ->with('brands', Brand::all())
        ->with('categories', Category::all());
    }

    
}
