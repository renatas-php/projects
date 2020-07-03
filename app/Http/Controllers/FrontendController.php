<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;


use App\Category;
use App\Product;
use App\Cart;
use App\MenuBanner;
use App\AfterSlider;
Use App\Slider;
use App\Brand;

class FrontendController extends Controller
{
    public function index(){
        return view('/front/index')
        ->with('products', Product::all()->take(8))
        ->with('cart', Cart::all())
        ->with('menubans', MenuBanner::all())
        ->with('after', AfterSlider::all())
        ->with('sliders', Slider::all())
        ->with('brands', Brand::all())
        ->with('categories', Category::all());
        
    }

    public function thanks(){
        return view('front/thanks')
        ->with('cart', Cart::all())
        ->with('categories', Category::all());
    }

    public function search(Request $request){

        $search = $request->input('search');
        $products = DB::table('products')->where('name', 'like', "%$search%")->get();
        
    

        return view('front.search')
        ->with('products', $products)
        ->with('cart', Cart::all())
        
        ->with('menubans', MenuBanner::all())
        ->with('brands', Brand::all())
        ->with('categories', Category::all());
    }

    
}
