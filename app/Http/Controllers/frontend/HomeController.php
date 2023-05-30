<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductSizeVariant;
use App\Models\ProductColorVariant;
use App\Models\Subscribe;
use App\Models\ContactUs;
use Auth;
use Validator,Redirect,Response;

class HomeController extends Controller
{
    public function home()
    {
        $banner   = Banner::where('status',1)->orderBy('id','desc')->get();
        $category = Category::where('status',1)->orderBy('id','desc')->limit('5')->get();
        $newProduct  = Product::with(['productSize','productColor','category'])->where('product_type',4)->where('status',1)->orderBy('id','desc')->limit('8')->get();
        $featuredProduct  = Product::with(['productSize','productColor','category'])->where('product_type',2)->where('status',1)->orderBy('id','desc')->limit('8')->get();
        $categoryList = Category::where('status',1)->orderBy('id','desc')->get();
        return view('frontend/home',compact('banner','category','newProduct','featuredProduct','categoryList'));
    }

    public function category($id)
    {
        $products  = Product::with(['productSize','productColor','category'])
                                ->where('status',1)
                                ->where('id',base64_decode($id))
                                ->orderBy('id','desc')
                                ->get();

        // $category = Category::where('status',1)->orderBy('id','desc')->get();
        return view('frontend/category',compact('products'));
    }

    public function Products()
    {
        $products  = Product::with(['productSize','productColor','category'])
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->get();

        return view('frontend/product',compact('products'));
    }

    public function ProductDetails($id)
    {
        $productDetail  = Product::with(['productSize','productColor','category'])
                                ->where('id',base64_decode($id))
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->first();
                                
        $relatedProduct = Product::with(['productSize','productColor','category'])
                                ->where('category_id',$productDetail->category_id)
                                ->whereNotIn('id',[$productDetail->id])
                                ->where('status',1)
                                ->orderBy('id','desc')
                                ->first();

        return view('frontend/product_detail',compact('productDetail','relatedProduct'));
    }


    public function subscribe(Request $request)
    {
        $newsletters = new Subscribe;
        $newsletters->email = $request->email;
        $newsletters->save();
        
        return redirect()->back()->with('success', 'User subscribed successfully!');
       
    }

    public function contactUs(){
        
        return view('frontend.contact');

    }

    public function addContactUs(Request $request){
       
        request()->validate([
            'name'    => 'required|max:100',
            'email'   => 'required|email|max:255',
            'subject' => 'required|max:255',
            'message' => 'nullable', 
        ]);
       
        $contactUs = new ContactUs;
        $contactUs->user_id = Auth::id() ? Auth::id() : 0;
        $contactUs->name    = $request->name;
        $contactUs->email   = $request->email;
        $contactUs->subject = $request->subject;
        $contactUs->message = $request->message;
        $contactUs->save();

        return redirect()->back()->with('success', 'Conatct form submitted successfully!');
     

    }


}
