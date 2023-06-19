<?php

namespace App\Http\Controllers;

use App\Model\Order;
use Illuminate\Http\Request;
use App\Model\Product;
use App\Model\Cart;
use App\Model\OrderDetail;
use App\Model\OrderTempDetail;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Razorpay\Api\Api;
use Redirect;
use Session;
use App\User;
use Mail;


class RazorPayController extends Controller
{
    
    public function payWithRazorpay()
    {
        return view('razor-pay');
    }

    public function payment(Request $request)
    {
        $callback = $request['callback'];
        $amount = $request['order_amount'];
        $success = false;
        
        //Input items of form
        $input = $request->all();

        //token string generate
        $transaction_reference = $input['razorpay_payment_id'];
        $token_string = 'payment_method=razor_pay&&transaction_reference=' . $transaction_reference;

        if (count($input) && !empty($input['razorpay_payment_id'])) {
            try {
                $callback_request = array('razorpay_signature'=>$input['razorpay_signature'], 'razorpay_payment_id'=>$input['razorpay_payment_id'], 'razorpay_order_id'=>$input['razorpay_order_id']);
                $callback = json_encode($callback_request);
                //get API Configuration
                $config = array(
                    'razor_key' => env('RAZOR_KEY'),
                    'razor_secret' => env('RAZOR_SECRET')
                );
                $api = new Api(config('razor_key'), config('razor_secret'));
                //Fetch payment information by razorpay_payment_id
                $payment = $api->payment->fetch($input['razorpay_payment_id']);

                $order_verify = $api->utility->verifyPaymentSignature($callback_request);
                $success = true;

            } catch (SignatureVerificationError $e) {
                //fail
                $success = false;
                return \redirect()->route('payment-fail', ['token' => base64_encode($token_string)]);
                
            }
        }
        if($success === true ){
            $p_method = 'online'; 
            $order = new Order();
            $order->user_id = Auth::id();
            $order->order_amount = $request->order_amount;
            $order->payment_method = $p_method;
            $order->delivery_address_id = $request->addr_id;
            $order->unique_no = $request->unique_no;
            $order->transaction_reference = $transaction_reference;
            $order->callback = $callback;
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
           
            Cart::where('user_id',Auth::id())->delete();
            OrderTempDetail::where('user_id', Auth::id())->delete();
            return redirect()->to('order-success')->with('success', 'Order Placed successfully!',compact('parent_order_id'));

        }else{
            return \redirect()->route('payment-fail', ['token' => base64_encode($token_string)]);
        }

    }

}
