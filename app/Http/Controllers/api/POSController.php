<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Country;
use App\Models\License;
use App\Models\CompanyHasRegion;
use App\Models\CategoryHasMenu;
use App\Models\State;
use App\Models\Branch;
use App\Models\Counter;
use App\Models\Area;
use App\Models\Dish;
use App\Models\Menu;
use App\Models\Category;
use App\Models\Location;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\DishVariant;
use Storage;
use Auth;
use Redirect;
use Response;
use Validator;
use DB;
use Log;

class POSController extends Controller
{
    //add to cart
    public function addToCart(Request $request)
    {
        try {
            if($request->is_variant ==1){
                $validator = Validator::make($request->all(), [
                    'dish_id'    =>'required',
                    'ip_address' =>'nullable',
                    'user_id'    =>'nullable',
                    'quantity'   =>'required',
                    'variant_id' =>'required',
                    'variant_price' =>'required',
                    
                ]);
            }else{
                $validator = Validator::make($request->all(), [
                    'dish_id'    =>'required',
                    'ip_address' =>'nullable',
                    'user_id'    =>'nullable',
                    'quantity'   =>'required',
                    'price'      =>'required',
                ]);
            }
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
           
            //request parameter
            $dish_id    = $request->dish_id;
            $ip_address = $request->ip_address;
            $user_id    = $request->user_id;
            $quantity   = $request->quantity;
            $dish_price = $request->price;
            $variant_id = $request->variant_id;
            $variant_price = $request->variant_price;
            $is_variant = $request->is_variant;
            
            //get dish price
            if($is_variant ==1){
                $price       = $variant_price;
                $total_price = $variant_price * $quantity;
            }else{
                $price       = $dish_price;
                $total_price = $dish_price * $quantity;
            }
            //db begin
            DB::beginTransaction();

            $add_to_cart = new Cart();
            $add_to_cart->dish_id     = $dish_id ?? Null;
            $add_to_cart->variant_id  = $variant_id ?? Null;
            $add_to_cart->dish_price  = $price ?? Null;
            $add_to_cart->quantity    = $quantity ?? Null;
            $add_to_cart->total_price = $total_price ??  Null;
            $add_to_cart->ip_address  = $ip_address ?? Null ;
            $add_to_cart->user_id     = $user_id ?? Null;           
            $add_to_cart->save();

            //db commit
            DB::commit();
            return response()->json(['message'=>'Dish added to cart successfully!','status'=>true,'data'=>[]]);                
        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.'], 400);
        }
    }

    //cart list
    public function cartList(Request $request)
    {
        try {
            if($request->ip_address){
                $validator = Validator::make($request->all(), [
                    'ip_address'    => 'required',
                ]);
            }elseif($request->user_id){
                $validator = Validator::make($request->all(), [
                    'user_id'    => 'required',
                ]);
    
                
            }else{
                $validator = Validator::make($request->all(), [
                    'ip_address'    => 'required',
                    'user_id'    => 'required',
                ]);
    
            }
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $ip_address = $request->ip_address;
            $user_id    = $request->user_id;

            if($ip_address){
                $cartList = Cart::with('Dish')
                                ->where('ip_address', $ip_address)
                                ->get();
            }else{
                $cartList = Cart::with('Dish','dish_variants')
                                ->where('user_id', $user_id)
                                ->get();
            }
            
            return response()->json(['message'=>'Cart List!','image_url'=>'https://foodiisoft-v3.e-go.biz/foodisoft3.0/public/storage/upload/dish/','status'=>true,'data'=>$cartList]);   
        }catch (\Throwable $th) {
           
            Log::debug($th);
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.'], 400);
        }           
    }

    //save order
    public function orderPlaced(Request $request)
    {
      try {
        
            $validator = Validator::make($request->all(), [
                'user_id'     => 'required',
                'total_price' => 'required',
            ]);   
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
            
            //request parameter
            $user_id         = $request->user_id;
            $total_price     = $request->total_price;
            $payment_method  = $request->payment_method;

            if($payment_method=='online'){
                $via_payment = "online";
            }else{
                $via_payment = "online";
            }

            $order_through   = $request->order_through;
            if($order_through=='app'){
                $order_type = "app";
            }else{
                $order_type = "web";
            }
            
            //get cart details
            $get_cart = Cart::with('Dish.counter.branch')
                            ->where('user_id', $user_id)
                            ->get();
            
            //get branch id
            $branch_id = Null;
            foreach ($get_cart as $cart_data) {
                $branch_id = $cart_data->Dish->counter->branch->id;
            }                
            DB::beginTransaction();

            $order = new order();
            $order->order_number  = "ORDER-".uniqid();
            $order->user_id       = $user_id ?? Null;
            $order->branch_id     = $branch_id;
            $order->order_through = $order_type;    
            $order->sub_total     = $total_price;
            $order->tax_amount    = 0;
            $order->tax_percent   = 0;
            $order->mode_of_transaction = $via_payment;
            $order->payment_timestamp   = \Carbon\Carbon::now();
            $order->grand_total    = $total_price;
            $order->invoice_number = "#".uniqid();
            $order->save();

            //store order details
            $sub_total =0;
            foreach ($get_cart as $cart_data) {
                $sub_total += $cart_data->total_price;
            
                $order_detail = new orderDetail();
                $order_detail->order_id = $order->id;
                $order_detail->dish_id = $cart_data->dish_id;
                $order_detail->dish_variant_id = 0;
                $order_detail->dish_variant_price = 0;    
                $order_detail->dish_name = $cart_data->dish->dish_name;
                $order_detail->order_quantity = $cart_data->quantity;
                $order_detail->dish_price = $cart_data->dish_price;
                $order_detail->save();
            }

            $get_cart = Cart::where('user_id', $user_id)->delete();

            DB::commit();

            return response()->json(['message'=>'Your order has been placed successfully!','status'=>true,'data'=>['order_id'=>$order->id]]);                

        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => 'error', 'message' => 'Something went wrong.'], 400);
        }
    }
}
