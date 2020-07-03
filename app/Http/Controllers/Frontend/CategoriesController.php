<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

use App\Category;
use App\Product;
use App\Cart;
use App\MenuBanner;

class CategoriesController extends Controller
{
    public function show(Category $category){

       
        
        
        

        $cart = Cart::all()->where('user_id', request()->ip());

        
        $products = Product::where('category_id', $category->id)->paginate(8);

        if(request()->sort == 'low_high'){
            $products = DB::table('products')->where('category_id', $category->id)->orderBy('price', 'asc')->paginate(8); 
            
            
        }
        elseif(request()->sort == 'high_low'){
            $products = DB::table('products')->where('category_id', $category->id)->orderBy('price', 'desc')->paginate(8);
            
           
        } 
            
        
        
        
        return view('front.category')->with('cart', $cart)
        ->with('cart', Cart::all())
        ->with('menubans', MenuBanner::all())
        ->with('categories', Category::all())
        ->with('category', $category)
        ->with('products', $products);
        

    }

    
}
