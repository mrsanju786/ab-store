<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSizeVariant;
use App\Models\ProductColorVariant;

class HomeController extends Controller
{
    public function home()
    {
        $banner = Banner::where('status',1)->orderBy('id','desc')->get();
        $category = Category::where('status',1)->orderBy('id','desc')->limit('5')->get();
        $product  = Product::with(['productSize','productColor'])->where('status',1)->orderBy('id','desc')->limit('8')->get();
        
        return view('frontend/home',compact('banner','category','product'));
    }

    public function category()
    {
        $category = Category::where('status',1)->orderBy('id','desc')->get();
        return view('frontend/category',compact('category'));
    }


}
