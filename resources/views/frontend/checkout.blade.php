@extends('frontend.layouts.inner_main')
@section('title')
<title>Demo | Product Detail</title>
@endsection
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-95 pb-50" data-bg-color="#EFF1F5">
<div class="container">
    <div class="row">
        <div class="col-xxl-12">
            <div class="breadcrumb__content p-relative z-index-1">
            <h3 class="breadcrumb__title">Checkout</h3>
            <div class="breadcrumb__list">
                <span><a href="{{url('/home')}}">Home</a></span>
                <span>Checkout</span>
            </div>
            </div>
        </div>
    </div>
</div>
</section>
<!-- breadcrumb area end -->

<!-- checkout area start -->
<section class="tp-checkout-area pb-120" data-bg-color="#EFF1F5">
<div class="container">
    <div class="row">
        <div class="col-xl-7 col-lg-7">
            <div class="tp-checkout-verify">
            <!-- <div class="tp-checkout-verify-item">
                <p class="tp-checkout-verify-reveal">Returning customer? <button type="button" class="tp-checkout-login-form-reveal-btn">Click here to login</button></p>

                <div id="tpReturnCustomerLoginForm" class="tp-return-customer">
                    <form action="#">
                        
                        <div class="tp-return-customer-input">
                        <label>Email</label>
                        <input type="text" placeholder="Your Email">
                        </div>
                        <div class="tp-return-customer-input">
                        <label>Password</label>
                        <input type="password" placeholder="Password">
                        </div>

                        <div class="tp-return-customer-suggetions d-sm-flex align-items-center justify-content-between mb-20">
                        <div class="tp-return-customer-remeber">
                            <input id="remeber" type="checkbox">
                            <label for="remeber">Remember me</label>
                        </div>
                        <div class="tp-return-customer-forgot">
                            <a href="forgot.html">Forgot Password?</a>
                        </div>
                        </div>
                        <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Login</button>
                    </form>
                </div>
            </div> -->
            <!-- <div class="tp-checkout-verify-item">
                <p class="tp-checkout-verify-reveal">Have a coupon? <button type="button" class="tp-checkout-coupon-form-reveal-btn">Click here to enter your code</button></p>

                <div id="tpCheckoutCouponForm" class="tp-return-customer">
                    <form action="#">
                        <div class="tp-return-customer-input">
                        <label>Coupon Code :</label>
                        <input type="text" placeholder="Coupon">
                        </div>
                        <button type="submit" class="tp-return-customer-btn tp-checkout-btn">Apply</button>
                    </form>
                </div>
            </div> -->
            </div>
        </div>
        <div class="col-lg-7">
            <div class="tp-checkout-bill-area">
            <h3 class="tp-checkout-bill-title">Billing Details</h3>

            <div class="tp-checkout-bill-form">
                <form action="{{url('/update')}}" method="POST">
                    @csrf
                    <div class="tp-checkout-bill-inner">
                        <div class="row">
                        <div class="col-md-6">
                            <div class="tp-checkout-input">
                                <label>First Name <span>*</span></label>
                                <input type="text" placeholder="First Name" name="first_name" value="{{Auth::user()->first_name}}" readonly>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="tp-checkout-input">
                                <label>Last Name <span>*</span></label>
                                <input type="text" placeholder="Last Name" name="last_name" value="{{Auth::user()->last_name}}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="tp-checkout-input">
                                <label>Address</label>
                                <input type="text" placeholder="House number and street name" name="address" value="{{$billingAddress->address ?? ""}}">
                                @if ($errors->has('address'))
                                    <span class="text-danger">{{ $errors->first('address') }}</span>
                                @endif 
                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tp-checkout-input">
                                    <label>Country</label>
                                    <input type="text" placeholder="Enter country" name="country" value="{{$billingAddress->country ?? ""}}"> 
                                    @if ($errors->has('country'))
                                       <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tp-checkout-input">
                                    <label>State</label>
                                    <input type="text" placeholder="Enter state" name="state" value="{{$billingAddress->state ?? ""}}">
                                    @if ($errors->has('state'))
                                       <span class="text-danger">{{ $errors->first('state') }}</span>
                                    @endif 
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="tp-checkout-input">
                                    <label>City/Town</label>
                                    <input type="text" placeholder="Enter city" name="city" value="{{$billingAddress->city ?? ""}}"> 
                                    @if ($errors->has('city'))
                                       <span class="text-danger">{{ $errors->first('city') }}</span>
                                    @endif 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="tp-checkout-input">
                                    <label>Pincode</label>
                                    <input type="text" placeholder="Enter pincode" name="pincode" value="{{$billingAddress->pincode ?? ""}}">
                                    @if ($errors->has('pincode'))
                                       <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                    @endif 
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-12">
                            <!-- <div class="tp-checkout-input">
                                <button type="submit">Submit</button>
                               
                            </div> -->
                            <div class="col-xxl-6 col-md-6">
                                <div class="profile__btn">
                                    <button type="submit" class="tp-btn">Update</button>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            </div>
        </div>
       
          
            <div class="col-lg-5">
                <!-- checkout place order -->
                <div class="tp-checkout-place white-bg">
                <h3 class="tp-checkout-place-title">Your Order</h3>
                <form action="{{route('saveOrder')}}" method="post" >
                @csrf
                <div class="tp-order-info-list">
                    <ul>

                        <!-- header -->
                    
                        <li class="tp-order-info-list-header">
                            <h4>Product</h4>
                            <h4>Size</h4>
                            <h4>Color</h4>
                            <h4>Total</h4>
                        </li>
                    
                        <?php 
                            $sub_total =0;
                            $total     =0;
                            $price     =0;
                            
                        ?>
                        <!-- item list -->
                        @if(!empty($products))
                        @foreach($products as $product)

                        <?php  
                            $product_name =App\Models\Product::where('id',$product->product_id)->where('status',1)->first();
                            $productSizePrice =App\Models\ProductSizeVariant::where('id',$product->variant_size)->where('status',1)->first();
                            $productColorPrice =App\Models\ProductColorVariant::where('id',$product->variant_color_id)->where('status',1)->first();
                            $price      =($productSizePrice['offer_price']-$productColorPrice['extra_amount']) * $product->quantity;
                            $sub_total +=($productSizePrice['offer_price']-$productColorPrice['extra_amount']) * $product->quantity;
                            $total     +=($productSizePrice['offer_price']-$productColorPrice['extra_amount']) * $product->quantity;
                        ?>

                        <li class="tp-order-info-list-desc">
                            <p>{{$product_name->name ?? "-"}} <span> x {{$product->quantity ?? "-"}}</span></p>
                           
                            <span>{{$productSizePrice->size ?? "-"}} GB</span>
                            <span>{{$productColorPrice->color_name ?? "-"}}</span>
                            <span>&#x20B9;{{number_format($price ,2) ?? "-"}}</span>
                        </li>
                        @endforeach
                        @endif

                        <!-- subtotal -->
                        <li class="tp-order-info-list-total">
                            <span>Subtotal</span>
                            <span>&#x20B9;{{number_format($sub_total ,2) ?? "-"}}</span>
                        </li>

                        <!-- shipping -->
                        <li class="tp-order-info-list-shipping">
                            <span>Shipping</span>
                            <div class="tp-order-info-list-shipping-item d-flex flex-column align-items-end">
                            <span>
                                <input id="flat_rate" type="radio" name="shipping" checked>
                                <label for="flat_rate">Free Shipping: <span></span></label>
                            </span>
                            <!-- <span>
                                <input id="local_pickup" type="radio" name="shipping">
                                <label for="local_pickup">Local pickup: <span>$25.00</span></label>
                            </span>
                            <span>
                                <input id="free_shipping" type="radio" name="shipping">
                                <label for="free_shipping">Free shipping</label>
                            </span> -->
                            </div>
                        </li>

                        <!-- total -->
                        <li class="tp-order-info-list-total">
                            <span>Total</span>
                            <span>&#x20B9;{{number_format($total ,2) ?? "-"}}</span>
                        </li>
                    </ul>
                </div>
                <div class="tp-checkout-payment">
                    <!-- <div class="tp-checkout-payment-item">
                        <input type="radio" id="back_transfer" name="payment">
                        <label for="back_transfer" data-bs-toggle="direct-bank-transfer">Direct Bank Transfer</label>
                        <div class="tp-checkout-payment-desc direct-bank-transfer">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                    </div> -->
                    <!-- <div class="tp-checkout-payment-item">
                        <input type="radio" id="cheque_payment" name="payment">
                        <label for="cheque_payment">Cheque Payment</label>
                        <div class="tp-checkout-payment-desc cheque-payment">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                    </div> -->
                    <div class="tp-checkout-payment-item">
                        <input type="radio" id="cod" name="payment" value="cod">
                        <label for="cod">Cash on Delivery</label>
                        
                        <div class="tp-checkout-payment-desc cash-on-delivery">
                            <p>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order will not be shipped until the funds have cleared in our account.</p>
                        </div>
                    </div>
                    <div class="tp-checkout-payment-item paypal-payment">
                        <input type="radio" id="paypal" name="payment" value="online">
                        <label for="paypal">Online <img src="assets/img/icon/payment-option.png" alt=""></label>
                    </div>
                </div>

                <input type="hidden" id="paypal" name="total_amount" value="{{$total}}">
                <input type="hidden" id="address" name="address" value="{{$billingAddress->id ?? ""}}">
                
                <div class="tp-checkout-btn-wrapper">
                    <button type="submit" class="tp-checkout-btn w-100">Place Order</button>
                </div>
                </div>
                </form> 
            </div>
      
    </div>
</div>
</section>
<!-- checkout area end -->
@endsection          