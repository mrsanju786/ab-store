<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\ProductSizeVariant;
use App\Models\ProductColorVariant;
use Auth,DB,Log;
use App\Models\BillingAddress;

class CheckoutController extends Controller
{
    public function index(){
        
    }

    public function view(){
            $user_id = Auth::user()->id;
            $products = DB::table('carts')
                        ->join('product_color_variants', 'carts.variant_color_id','=','product_color_variants.id')
                        ->select('carts.*', 'product_color_variants.id as variant_id','product_color_variants.product_id','product_color_variants.color_product_image','product_color_variants.color_name',)
                        ->where('user_id',$user_id)
                        ->get();
            $billingAddress =BillingAddress::where('user_id',Auth::user()->id)->first(); 
            return view('frontend.checkout',compact('products','user_id','billingAddress'));
        
    }

    
}
