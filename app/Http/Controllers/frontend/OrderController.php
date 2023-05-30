<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Wishlist;
use App\Models\Product;
use App\Models\ProductSizeVariant;
use App\Models\ProductColorVariant;
use App\Models\Order;
use App\Models\BillingAddress;
use App\Models\OrderDetail;
use Auth,DB,Log;

class OrderController extends Controller
{
    
    public function saveOrder(Request $request){
         
        if($request->payment =='cod'){
            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_amount = $request->total_amount;
            $p_method = 'cod';
            $order->payment_method = $p_method;
            $order->date = date('Y-m-d');
            $order->delivery_address_id = $request->address;
            $randomNumber=mt_rand(10,999999999);
            $order->unique_no = 'AB-'.str_pad($randomNumber,12,0,STR_PAD_LEFT);
            $order->save();
            $parent_order_id = $order->id;

            $products = DB::table('carts')
                        ->join('product_color_variants', 'carts.variant_color_id','=','product_color_variants.id')
                        ->select('carts.*', 'product_color_variants.id as variant_id','product_color_variants.product_id','product_color_variants.color_product_image','product_color_variants.color_name',)
                        ->where('user_id',Auth::id())
                        ->get();
                           
            foreach($products as $product){

                $order_dettail = new OrderDetail();
                $order_dettail->order_id         = $parent_order_id;
                $order_dettail->product_id       = $product->product_id;
                $order_dettail->variant_color_id = $product->variant_color_id;
                $order_dettail->quantity         = $product->quantity;
                $order_dettail->payment_method       = $order->payment_method;
                $order_dettail->delivery_address_id  = $order->delivery_address_id;
                $order_dettail->price                = $product->price;
                $order_dettail->variant_size         = $product->variant_size;
                $order_dettail->variant_color        = $product->variant_color;
                $order_dettail->save();

            }
            
           
            //send order placed email for customer
            // $emailServices = Helpers::get_business_settings('mail_config');
            // $data = User::where('id',Auth::id())->first();
            // if(isset($emailServices['status']) && $emailServices['status'] == 1) {
            //     Mail::to($data->email)->send(new \App\Mail\OrderPlaced($order));
            // }
           
            Cart::where('user_id',Auth::id())->delete();
            return redirect()->to('order-success')->with('success', 'Order Placed successfully!',compact('parent_order_id'));
         
        }
    }

    public function orderDetail($id){
        $order        = Order::findOrfail(base64_decode($id));
        $order_detail = OrderDetail::where('order_id',$order->id)->get();
        
        $address      = BillingAddress::where('id',$order->delivery_address_id)->first();
       
        return view('frontend.order_placed',compact('order','order_detail','address'));
    }

    public function orderSuccess(){
        return view('frontend.order_success');
    }

    public function orderList(){
        $orders = Order::where('user_id',Auth::id())->orderBy('id','desc')->get();       
        return view('frontend.order_list', ['orders' => $orders]);        
    }

    
}
