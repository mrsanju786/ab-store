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

class CartController extends Controller
{
    public function index(){
        
    }

    public function view(){
            $user_id = Auth::user()->id;
            $products = DB::table('carts')
                        ->join('products', 'carts.product_id','=','products.id')
                        ->select('carts.*', 'products.name')
                        ->where('user_id',$user_id)
                        ->get();
            
            return view('frontend.cart',compact('products','user_id'));
        
    }

    public function addToCart(Product $product, Request $request){

        $product_id = $request->product_id;
        $quantity   = $request->quantity;
        $color      = $request->variant_color;
        $size       = $request->variant_size;
        $variant_id = $request->variant_id;
        $user_id = Auth::user()->id;
        $product_detail = Product::with(['productSize','productColor','category'])->where('id',$product_id)->first();
       
        $result = Cart::where('user_id',$user_id)
                    ->where('variant_color_id', $variant_id)
                    ->first();
        if($result == null){
            $cart = new Cart;
            $cart->user_id         = $user_id;
            $cart->product_id      = $product_id;
            $cart->variant_color_id  = $variant_id;
            $cart->quantity        = $quantity;
            $cart->variant_color   = $color;
            $cart->variant_size    = $size;
            if(!empty($product_detail['productSize'])){
              $cart->price  = $product_detail['productSize']['actual_price']-$product_detail['productSize']['offer_price'];
            }

            if($cart->save()){
                $cart_cnt = Cart::where('user_id',$user_id)->count();
                
                return response()->json(['msg' => true, 'cart_cnt' => $cart_cnt ]);
            }else{
                return response()->json(['msg' => false]);
            }

        }else{
            $result->quantity = $result->quantity + $quantity;
            // $result->price = $AttributeCombination_val->price * $result->quantity;
            if($result->save()){
                $cart = Cart::where('user_id',$user_id)->get();
                $cart_cnt = $cart->count();
                return response()->json(['msg' => true, 'cart_cnt' => $cart_cnt ]);
            }else{
                return response()->json(['msg' => false]);
            }
        }
        
        

    }

    public function deleteFromCart(Product $product, Request $request){
        $cart_detail = Cart::where('user_id',$request->user_id)
                            ->where('product_id',$request->product_id)
                            ->limit(1)->delete();
        Toastr::success(translate('Cart item removed successfully!'));                    
        return redirect()->back()->with('message', 'Cart item removed successfully.');
    }

    public function updateQuantity(Product $product, Request $request){
        
        $cart = Cart::where('id',$request->product_id);
        $cart->limit(1)->update(['quantity'=>$request->quantity]);
        Toastr::success(translate('Update quantity successfully!'));       
           
    }

    public function clearUserCart(Request $request){
        $cart_detail = Cart::where('user_id',$request->uid)
                            ->delete();
        Toastr::success(translate('Cart item cleared successfully!'));                           
        return redirect()->back()->with('message', 'Cart item Cleared.');
    }

    public function wishlistToCart(Request $request){
        $user_id = Auth::user()->id;
        $product_detail = Product::where('id',$request->id)->first();
        
        $result = Cart::where('user_id',$user_id)
                    ->where('product_id', $request->id)
                    ->first();
        if($result == null){
            $cart = new Cart;
            $cart->user_id = $user_id;
            $cart->product_id = $product_detail->id;
            $cart->quantity = 1;
            $original_price = ($product_detail->actual_price);
            $cart->price = $original_price;
           
            $cart->tax_amount = $product_detail->tax ?? 0;
            $cart->discount_on_product = $product_detail->discount ?? 0;
            $cart->discount_type = "percent";
          
            $cart->save();
            FavoriteProduct::where('product_id',$request->id)->limit(1)->delete();
            Toastr::success(translate('Product added to cart successfully!'));
            return redirect()->back();

        }else{
            FavoriteProduct::where('product_id',$request->id)->limit(1)->delete();
            Toastr::success(translate('Product added to cart successfully!'));
            return redirect()->back();
        }
    }
}
