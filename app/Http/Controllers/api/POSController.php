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
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
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
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }           
    }

    //save order
    public function saveOrder(Request $request)
    {
      try {
        
            $validator = Validator::make($request->all(), [
                'user_id'     => 'nullable',
                'order_number' => 'nullable',
                'order_status' => 'nullable',
                'cd_status' => 'nullable',
                'order_date' => 'nullable',
                'branch_id' => 'nullable',
                'order_through' => 'nullable',
                'sub_total' => 'nullable',
                'tax_amount' => 'nullable',
                'discount_name' => 'nullable',
                'discount_type' => 'nullable',
                'discount_amount' => 'nullable',
                'mode_of_transaction' => 'nullable',
                'payment_timestamp' => 'nullable',
                'order_prepared_by' => 'nullable',
                'order_closed_by' => 'nullable',
                'grand_total' => 'nullable',
                'invoice_number' => 'nullable',
                'paid_or_cancel' => 'nullable',
                'refund_through' => 'nullable',
                'instruction' => 'nullable',
                'transaction_id' => 'nullable',
                'table_id' => 'nullable',
            ]);   
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
                
            DB::beginTransaction();

            $order = new order();
            $order->order_number  = $request->order_number;
            $order->user_id       = $request->user_id;
            $order->order_status  = $request->order_status;
            $order->cd_status     = $request->cd_status;
            $order->order_date    = $request->order_date;
            $order->branch_id     = $request->branch_id;
            $order->order_through = $request->order_through;    
            $order->sub_total     = $request->sub_total;
            $order->tax_amount    = $request->tax_amount;
            $order->tax_percent   = $request->tax_percent;
            $order->discount_name   = $request->discount_name;
            $order->discount_type   = $request->discount_type;
            $order->discount_amount   = $request->discount_amount;
            $order->mode_of_transaction = $request->mode_of_transaction;
            $order->payment_timestamp   = $request->payment_timestamp;
            $order->order_prepared_by   = $request->order_prepared_by;
            $order->order_closed_by   = $request->order_closed_by;
            $order->order_closed_time   = $request->order_closed_time;
            $order->grand_total    = $request->grand_total;
            $order->invoice_number = $request->invoice_number;
            $order->paid_or_cancel = $request->paid_or_cancel;
            $order->refund_through = $request->refund_through;
            $order->instruction = $request->instruction;
            $order->transaction_id = $request->transaction_id;
            $order->table_id      = $request->table_id;
            $order->save();

            // $get_cart = Cart::where('user_id', $request->user_id)->delete();

            DB::commit();

            return response()->json(['message'=>'Your order has been placed successfully!','status'=>true,'data'=>['order_id'=>$order->id]]);                

        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    //save order details
    public function svaeOrderDetails(Request $request)
    {
      try {
        
            $validator = Validator::make($request->all(), [
                'order_id'         => 'nullable',
                'dish_id'          => 'nullable',
                'dish_variant_id'  => 'nullable',
                'dish_name'        => 'nullable',
                'order_quantity'   => 'nullable',
                'order_status'     => 'nullable',
                'cd_status'        => 'nullable',
                'dish_price'       => 'nullable',
            ]);   
            
            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }
                
            DB::beginTransaction();
            $jsons =  json_decode($request->getContent(), true);
           
            foreach ($jsons as $key => $json) {
                $orderDetails = new orderDetail();
                $orderDetails->order_id          = $json['order_id'] ?? Null;
                $orderDetails->dish_id           = $json['dish_id'] ?? Null;
                $orderDetails->dish_variant_id   = $json['dish_variant_id'] ?? 0;
                $orderDetails->dish_name         = $json['dish_name'] ?? Null;
                $orderDetails->order_quantity    = $json['order_quantity'] ?? Null;
                $orderDetails->order_status      = $json['order_status'] ?? Null;
                $orderDetails->order_status      = $json['order_status'] ?? Null;    
                $orderDetails->cd_status         = $json['cd_status'] ?? Null;
                $orderDetails->dish_price        = $json['dish_price'] ?? Null;
                $orderDetails->dish_variant_price = $json['dish_variant_price'] ?? Null;
                $orderDetails->save();
            }
           
            DB::commit();

            return response()->json(['message'=>'Your order details has been saved successfully!','status'=>true,'data'=>[]]);                

        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

    //bulk/multiple  order save 
    public function bulkOrderSave(Request $request){
        try {

            DB::beginTransaction();

            $jsons =  json_decode($request->getContent(), true);
           
            foreach ($jsons as $key => $json) {
                $order = new order();
                $order->order_number  = $json['order_number'] ?? Null;
                $order->user_id       = $json['user_id'] ?? Null;
                $order->order_status  = $json['order_status'] ?? Null;
                $order->cd_status     = $json['cd_status'] ?? Null;
                $order->order_date    = $json['order_date'] ?? Null;
                $order->branch_id     = $json['branch_id'] ?? Null;
                $order->order_through = $json['order_through'] ?? Null;    
                $order->sub_total     = $json['sub_total'] ?? Null;
                $order->tax_amount    = $json['tax_amount'] ?? Null;
                $order->tax_percent   = $json['tax_percent'] ?? Null;
                $order->discount_name   = $json['discount_name'] ?? Null;
                $order->discount_type   = $json['discount_type'] ?? Null;
                $order->discount_amount   = $json['discount_amount'] ?? Null;
                $order->mode_of_transaction = $json['mode_of_transaction'] ?? Null;
                $order->payment_timestamp   = $json['payment_timestamp'] ?? Null;
                $order->order_prepared_by   = $json['order_prepared_by'] ?? Null;
                $order->order_closed_by   = $json['order_closed_by'] ?? Null;
                $order->order_closed_time   = $json['order_closed_time'] ?? Null;
                $order->grand_total    = $json['grand_total'] ?? Null;
                $order->invoice_number = $json['invoice_number'] ?? Null;
                $order->paid_or_cancel = $json['paid_or_cancel'] ?? Null;
                $order->refund_through = $json['refund_through'] ?? Null;
                $order->instruction = $json['instruction'] ?? Null;
                $order->transaction_id = $json['transaction_id'] ?? Null;
                $order->table_id       = $json['table_id'] ?? Null;
                $order->save();
            }
            DB::commit();
            return response()->json(['message'=>'Your order has been placed successfully!','status'=>true,'data'=>[]]);                
        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
}
