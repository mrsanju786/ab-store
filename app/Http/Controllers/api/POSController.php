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
use App\Models\userHasCompany;
use Storage;
use Auth;
use Redirect;
use Response;
use Validator;
use DB;
use Log;

class POSController extends Controller
{
     //get counter,menu, category and dish
     public function counterWiseDish(Request $request){
        try {

            $validator = Validator::make($request->all(), [
                'branch_id'    => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()->all() ]);
            }

            $branch_id = $request->branch_id;
            //get counter list
            $counterList = Counter::where('branch_id',$branch_id)->orderBy('id','desc')->get();
            $menu_list =[];
            foreach($counterList as $value){
                //get menu list
                $menuList = Menu::where('counter_id',$value->id)
                                ->where('is_active',1)
                                ->orderBy('id','desc')
                                ->get();
                $menu_list =   $menuList; 
  
            }
            $category_list =[];
            foreach($menu_list as $value){
                //find menu wise multiple category
                $categoryId = CategoryHasMenu::where('menu_id',$value->id)->pluck('category_id');
                //get category list
                $categoryList = Category::whereIn('id',$categoryId)
                                    ->where('is_active',1)
                                    ->orderBy('id','desc')
                                    ->get();
                $category_list =   $categoryList; 
            }

            $dish_list =[];
            foreach($category_list as $value){
                //get dish list
                $dishList = Dish::with('dishVariant')->where('category_id',$value->id)
                                    ->where('is_active',1)
                                    ->orderBy('id','desc')
                                    ->get();
                $array =[];
                foreach($dishList as $dish){
                    
                    $taxPercent =0;
                    $taxName =Null;
                    $dish_tax =0;
                    $tax =0;
                    $discount =0;
                    $discount_percent =0;
                    $discount_name =Null;
                    $discount_dish_amount =0;
                    $tax_with_dish_amount =0;
                    $dish_discount_with_tax=0;
                    //get discount
                    $discount_amount =0;
                    if(!empty($dish->discount_ids)){
                        $discount = DB::table('discounts')
                                        ->where('id',$dish->discount_ids)
                                        ->where('is_active',1)
                                        ->first();  
                                        
                        $discount_percent =$discount->discount_percent;
                        $discount_name    =$discount->discount_name; 
                        $discount_amount  =($dish->dish_price *$discount->discount_percent)/100; 
                        $discount_dish_amount =$dish->dish_price-$discount_amount;
                                          
                    }
                    //dish tax
                    if($dish->is_tax_inclusive ==1){
                        
                        //get tax on dish
                        $dish_has_taxes = DB::table('dish_has_taxes')
                                            ->where('dish_id',$dish->id)
                                            ->first();
                        
                        //country tax  
                        if(!empty($dish_has_taxes)) {
                            $tax = DB::table('country_taxes')
                                        ->where('id',$dish_has_taxes->tax_id)
                                        ->where('is_active',1)
                                        ->first();
                            
                            $taxPercent = $tax->tax_percent;
                            $taxName    = $tax->name; 
                        }
                        $dish_tax  = ($dish->dish_price *$taxPercent) /100;
                        $tax_with_dish_amount =$dish->dish_price+$dish_tax;
                        $dish_discount_with_tax = ($discount_dish_amount * $taxPercent)/100;
                    }
                    //get final price
                    $final_price  = 0;
                    if($discount_dish_amount || $dish_discount_with_tax){
                        $final_price  = $discount_dish_amount +  $dish_discount_with_tax;
                    }elseif($discount_dish_amount){
                        $final_price  = $discount_dish_amount;
                    }elseif($tax_with_dish_amount){
                        $final_price  = $tax_with_dish_amount;
                    }else{
                        $final_price  = $dish->dish_price;
                    }
                    
                     //get dish variant 
                    $dish_variant = [];
                    $variant_price =0;
                    $discount_variant_price =0;
                    $dishvariant = DishVariant::where('dish_id',$dish->id)->get(); 
                    foreach($dishvariant as $variant){
                        
                        if($discount_percent || $taxPercent){
                            $discount_percent =!empty($discount->discount_percent) ? $discount->discount_percent : 0;
                            $taxPercent = !empty($tax->tax_percent) ? $tax->tax_percent :0;
                            $discount_variant_price = $variant->variant_price - ($variant->variant_price * $discount_percent)/100;
                            $variant_price = $discount_variant_price + ($discount_variant_price * $taxPercent)/100;
                        }elseif($discount_percent){
                            $discount_percent =!empty($discount->discount_percent) ? $discount->discount_percent : 0;
                            $variant_price = $variant->variant_price - ($variant->variant_price * $discount_percent)/100;
                        }elseif($taxPercent){
                            $taxPercent = !empty($tax->tax_percent) ? $tax->tax_percent :0;
                            $variant_price = $variant->variant_price + ($variant->variant_price * $taxPercent)/100;
                        }else{
                            $variant_price = $variant->variant_price;
                        }
                        
                        $dish_variant[] = array(
                            "id"           => $variant->id,
                            "variant_name" => $variant->variant_name,
                            "variant_price"=> $variant_price  ?? 0,
                            "dish_id"      => $variant->dish_id,
                            "created_at"   => $variant->created_at,
                            "updated_at"   => $variant->updated_at
                        ); 
                    }   
                    $array[] =array(
                        "id"       => $dish->id,
                        "dish_name"=>$dish->dish_name,
                        "dish_price"=> $final_price,
                        "dish_code"=> $dish->dish_code,
                        "dish_images"=> $dish->dish_images,
                        "has_variant"=> $dish->has_variant,
                        "is_tax_inclusive"=> $dish->is_tax_inclusive,
                        "is_discount"=> $dish->is_discount,
                        "category_id"=> $dish->category_id,
                        "counter_id"=> $dish->counter_id,
                        "chef_preparation"=> $dish->chef_preparation,
                        "dish_hsn"=> $dish->dish_hsn,
                        "tax_name"=> $taxName,
                        "tax_percent"=> $taxPercent,
                        "discount_name"=> $discount_name,
                        "discount_percent"=> $discount_percent,
                        "edited_at"=> $dish->edited_at,
                        "edited_by"=> $dish->edited_by,
                        "is_active"=> $dish->is_active,
                        "created_at"=>$dish->created_at,
                        "updated_at"=> $dish->updated_at,
                        'dish_variant'=>$dish_variant ?? Null
                    );
                }
                                    
                $dish_list =   $array; 
            }
           
            return response()->json(['message'=>'Counter Dish List!','dish_image_url'=>env('IMAGE_URL')."/dish/",'category_image_url'=>env('IMAGE_URL')."/category/",'status'=>true,'data'=>['counter_list'=>$counterList,'menu_list'=>$menu_list,'category_list'=>$category_list,'dish_list'=>$dish_list]]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
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
                $cartList = Cart::with('Dish','dish_variants','Dish.category')
                                ->where('ip_address', $ip_address)
                                ->get();
            }else{
                $cartList = Cart::with('Dish','dish_variants','Dish.category')
                                ->where('user_id', $user_id)
                                ->get();
            }
            
            return response()->json(['message'=>'Cart List!','image_url'=>env('IMAGE_URL')."/dish/",'status'=>true,'data'=>$cartList]);   
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
                'user_id'     => 'required',
                'order_number' => 'required',
                'order_status' => 'required',
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
            $order->order_number  = $request['order_number'];
            $order->user_id       = $request['user_id'];
            $order->order_status  = $request['order_status'];
            $order->cd_status     = $request['cd_status'];
            $order->order_date    = $request['order_date'];
            $order->branch_id     = $request['branch_id'];
            $order->order_through = $request['order_through'];    
            $order->sub_total     = $request['sub_total'];
            $order->tax_amount    = $request['tax_amount'];
            $order->tax_percent   = $request['tax_percent'];
            $order->discount_name   = $request['discount_name'];
            $order->discount_type   = $request['discount_type'];
            $order->discount_amount   = $request['discount_amount'];
            $order->mode_of_transaction = $request['mode_of_transaction'];
            $order->payment_timestamp   = $request['payment_timestamp'];
            $order->order_prepared_by   = $request['order_prepared_by'];
            $order->order_closed_by   = $request['order_closed_by'];
            $order->order_closed_time   = $request['order_closed_time'];
            $order->grand_total    = $request['grand_total'];
            $order->invoice_number = $request['invoice_number'];
            $order->paid_or_cancel = $request['paid_or_cancel'];
            $order->refund_through = $request['refund_through'];
            $order->instruction = $request['instruction'];
            $order->transaction_id = $request['transaction_id'];
            $order->table_id      = $request['table_id'];
            $order->save();

            $get_cart = Cart::where('user_id', $request->user_id)->delete();

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

            $get_cart = Cart::where('user_id', $request->user_id)->delete();
            DB::commit();
            return response()->json(['message'=>'Your order has been placed successfully!','status'=>true,'data'=>[]]);                
        }catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
    
    //company list
    public function companyList(Request $request){
        try {
            $user_id     = Auth::user()->id;
            $user        = userHasCompany::where('user_id',$user_id)->first();
            $companyList = Company::with(['foodLicense','country','state','cities' ,'country.countryTax','country.currency'])
                                    ->where('is_active',1)
                                    ->where('id',$user->company_id)
                                    ->orderBy('id','desc')
                                    ->first(); 
                  
            return response()->json(['message'=>'Company List!','image_url'=>env('IMAGE_URL')."/company/",'status'=>true,'data'=>$companyList]);                
        }catch (\Throwable $th) {
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
        
    }

    //order list
    public function orderList(Request $request){
        try{
            $user_id = $request->user_id;
            $orders = Order::with('user')->where('user_id',$user_id)->orderBy('id','desc')->get();
            foreach($orders as $order){
                $orderDetailsList = OrderDetail::with(['dish','dish_variant','dish.counter','dish.counter.area'])->where('order_id',$order->id)->orderBy('id','desc')->get();
                $orde_number = Null;
                $grand_total = 0;
                $order_status = Null;
                $cd__status = Null;
                $sub_total =0;
                $tax_amount =0;
                $discount_amount =0;
                $order_through =0;
                $orde_number = $order->order_number;
                $grand_total = $order->grand_total;
                $order_status = $order->order_status;
                $cd__status = $order->cd__status;
                $sub_total  =$order->sub_total;
                $tax_amount  =$order->tax_amount;
                $discount_amount  =$order->discount_amount;
                $order_through  =$order->order_through;

                $order_list = [];
                foreach($orderDetailsList as $value){
                    $order_list[]=array(
                        'id' =>$value->id,
                        'dish_name' =>$value->dish->dish_name,
                        'dish_image'=>$value->dish->dish_images, 
                        'price'     =>$value->dish_price,
                        'counter_name' =>$value->dish->counter->counter_name,
                        'counter_address' =>$value->dish->counter->counter_address,
                        'order_status'    =>$value->order_status,
                        'cd_status'    =>$value->cd_status,
                        'quantity'        =>$value->order_quantity,
                        'total_price' =>$value->dish_price * $value->order_quantity
                     );
                }
            }
            
            return response()->json(['message'=>'Order List!','image_url'=>env('IMAGE_URL')."/dish/",'status'=>true,'data'=>$order_list,'orde_number'=>$orde_number,
            'grand_total'=>$grand_total,'order_status'=>$order_status,'cd__status'=>$cd__status,'sub_total'=>$sub_total,
             'tax_amount'=>$tax_amount,'discount_amount'=>$discount_amount,'order_through'=>$order_through]);                
        }catch (\Throwable $th) {
            
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }
   
    //order details list
    public function orderDetailsList(Request $request){
        try{
            $order_id = $request->order_id;
            $orderDetailsList = OrderDetail::with(['dish','dish_variant'])->where('order_id',$order_id)->orderBy('id','desc')->get();
            return response()->json(['message'=>'Order Details List!','status'=>true,'data'=>$orderDetailsList]);                
        }catch (\Throwable $th) {
            
            Log::debug($th);
            return response()->json(['status' => false, 'message' => 'Something went wrong.'], 400);
        }
    }

}
