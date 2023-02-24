<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Dish;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;

class OrderController extends Controller
{
    public function placeOrder()
    {
       $get_cart = Cart::with('Dish.counter.branch')->where('ip_address', request()->ip())->get();

       $sub_total = 0;
       foreach ($get_cart as $cart_data) {
        $sub_total += $cart_data->total_price;
       }
        $order = new order();
        $order->order_number = "ORDER-".uniqid();
        $order->user_id = 0;
        $order->branch_id = 1;
        $order->order_through = 'web';    
        $order->sub_total = $sub_total;
        $order->tax_amount = 0;
        $order->tax_percent = 0;
        $order->mode_of_transaction = 'online';
        $order->payment_timestamp = \Carbon\Carbon::now();
        $order->grand_total = $sub_total;
        $order->invoice_number = "#".uniqid();
        $order->save();

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

        $get_cart = Cart::where('ip_address', request()->ip())->delete();
         
        return redirect()->route('all_counter')->with('success', 'your order has been placed successfully');
    }
}
