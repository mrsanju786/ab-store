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
use Brian2694\Toastr\Facades\Toastr;

class CartController extends Controller
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

   
    public function deleteFromCart($id)
    {
        $cart_detail = Cart::where('user_id', Auth::id())->where(['id' => $id])->first();
        $cart_detail->delete();
        return redirect()->back()->with('success', 'Cart item removed successfully!');
      
    }

    public function updateQuantity(Request $request){
        dd('adsd');
        $cart = Cart::where('id',$request->product_id);
        $cart->limit(1)->update(['quantity'=>$request->quantity]);
        Toastr::success(translate('Update quantity successfully!'));    
           
        // return redirect()->back()->with('success', 'Update quantity successfully!');
           
    }

    public function clearUserCart(Request $request){
        $cart_detail = Cart::where('user_id',$request->uid)
                            ->delete();
        Toastr::success(translate('Cart item cleared successfully!'));                           
        return redirect()->back()->with('message', 'Cart item Cleared.');
    }

    public function wishlistToCart(Request $request,$id){
        $user_id = Auth::user()->id;
        $product_detail = ProductColorVariant::where('id',$id)->first();
        
        $result = Cart::where('user_id',$user_id)
                    ->where('variant_color_id', $id)
                    ->first();

        $productSizePrice =ProductSizeVariant::where('product_id',$product_detail->product_id)
                    ->where('status',1)
                    ->first();            
        if($result == null){
            $cart = new Cart;
            $cart->user_id         = $user_id;
            $cart->product_id      = $product_detail->product_id;
            $cart->variant_color_id  = $product_detail->id;
            $cart->quantity        = 1;
            $cart->variant_color   = $product_detail->id;
            $cart->variant_size    = $productSizePrice->id;
            if(!empty($productSizePrice)){
              $cart->price  = $productSizePrice['actual_price']-$productSizePrice['offer_price'];
            }
          
            $cart->save();
            Wishlist::where('product_id',$request->id)->limit(1)->delete();
            return redirect()->back()->with('success', 'Product added to cart successfully!');
           
        }else{
            Wishlist::where('product_id',$request->id)->limit(1)->delete();
            return redirect()->back()->with('success', 'Product added to cart successfully!');
          
        }
    }

    public function RemoveProduct($id)
    {
        $wishlist = Wishlist::where('user_id', Auth::id())->where(['id' => $id])->first();
        $wishlist->delete();
        return redirect()->back()->with('success', 'Wishlist product removed successfully!');
      
    }
}
