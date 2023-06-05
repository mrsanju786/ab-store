@section('content')
@extends('frontend.layouts.inner_main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-95 pb-50">
   <div class="container">
      <div class="row">
         <div class="col-xxl-12">
            <div class="breadcrumb__content p-relative z-index-1">
               <h3 class="breadcrumb__title">Shopping Cart</h3>
               <div class="breadcrumb__list">
                  <span><a href="{{url('/home')}}">Home</a></span>
                  <span>Shopping Cart</span>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- breadcrumb area end -->

<!-- cart area start -->
<section class="tp-cart-area pb-120">
   <div class="container">
      <div class="row">
         <div class="col-xl-9 col-lg-8">
            <div class="tp-cart-list mb-25 mr-30">
               <table class="table">
                  <thead>
                     <tr>
                        <th colspan="2" class="tp-cart-header-product">Product</th>
                        <th class="tp-cart-header-price">Price</th>
                        <th class="tp-cart-header-quantity">Quantity</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                     $sub_total =0;
                     $total     =0;
                    
                     ?>
                     @if(!empty($products))
                     @foreach($products as $product)
                     <tr>
                        <!-- img -->
                        <td class="tp-cart-img"><a href="{{url('/product-detail')}}/{{base64_encode($product->variant_id)}}"> <img src="{{env('APP_URL')."product"}}/{{$product->color_product_image}}" alt=""></a></td>
                        <!-- title -->
                        <?php  
                               $product_name =App\Models\Product::where('id',$product->product_id)->where('status',1)->first();
                               $productSizePrice =App\Models\ProductSizeVariant::where('id',$product->variant_size)->where('status',1)->first();
                               $productColorPrice =App\Models\ProductColorVariant::where('id',$product->variant_color_id)->where('status',1)->first();
                               $sub_total +=($productSizePrice['offer_price']-$productColorPrice['extra_amount']) * $product->quantity;
                               $total     +=($productSizePrice['offer_price']-$productColorPrice['extra_amount']) * $product->quantity;
                        ?>
                        <td class="tp-cart-title"><a href="javascript:;">{{$product_name->name ?? "-"}} <br>Size : {{$productSizePrice->size ?? "-"}}GB <br>Color : {{$product->color_name ?? "-"}}</a></td>
                        
                        <!-- price -->
                        <td class="tp-cart-price"><span>&#x20B9;{{number_format(($productSizePrice['offer_price']-$productColorPrice['extra_amount']),2) ?? "-"}}</span></td>
                        <!-- quantity -->
                        <td class="tp-cart-quantity ">
                           <div class="tp-product-quantity mt-10 mb-10" >
                              <!-- <span class="tp-cart-minus decrement-btn "  data-pid="{{$product->id}}">

                                 <svg width="10" height="2" viewBox="0 0 10 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1 1H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>                                                             
                              </span> -->
                              
                              <input type="number"  id="quantity" class="tp-cart-input update_quantity" value="{{$product->quantity}}" min="1" max="20"
                                                name="quantity"  data-pid="{{$product->id}}" style="height:40px;">
                            
                              <!-- <span class="tp-cart-plus increment-btn "  data-pid="{{$product->id}}">
                                 <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 1V9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M1 5H9" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                 </svg>
                              </span> -->
                           </div>
                        </td>
                        
                        <td class="tp-cart-action">
                           <a href="{{url('/delete-from-cart')}}/{{$product->id}}"class="tp-cart-action-btn">
                              <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path fill-rule="evenodd" clip-rule="evenodd" d="M9.53033 1.53033C9.82322 1.23744 9.82322 0.762563 9.53033 0.46967C9.23744 0.176777 8.76256 0.176777 8.46967 0.46967L5 3.93934L1.53033 0.46967C1.23744 0.176777 0.762563 0.176777 0.46967 0.46967C0.176777 0.762563 0.176777 1.23744 0.46967 1.53033L3.93934 5L0.46967 8.46967C0.176777 8.76256 0.176777 9.23744 0.46967 9.53033C0.762563 9.82322 1.23744 9.82322 1.53033 9.53033L5 6.06066L8.46967 9.53033C8.76256 9.82322 9.23744 9.82322 9.53033 9.53033C9.82322 9.23744 9.82322 8.76256 9.53033 8.46967L6.06066 5L9.53033 1.53033Z" fill="currentColor"/>
                              </svg>
                              <span>Remove</span>
                           </a>
                        </td>
                     </tr>

                     @endforeach
                     @endif
                     <?php 
                     //  $sub_total +=$productSizePrice['actual_price']-$productSizePrice['offer_price'] * $product->quantity;
                     //  $total     +=$productSizePrice['actual_price']-$productSizePrice['offer_price'] * $product->quantity;
                     ?>
                  </tbody>
                  </table>
            </div>
            <div class="tp-cart-bottom">
               <div class="row align-items-end">
                  <div class="col-xl-6 col-md-8">
                     <div class="tp-cart-coupon">
                        <form action="#">
                           <div class="tp-cart-coupon-input-box">
                              <!-- <label>Coupon Code:</label>
                              <div class="tp-cart-coupon-input d-flex align-items-center">
                                 <input type="text" placeholder="Enter Coupon Code">
                                 <button type="submit">Apply</button>
                              </div> -->
                           </div>
                        </form>
                     </div>
                  </div>
                  <br>
                  <!-- <div class="col-xl-6 col-md-4">
                     <div class="tp-cart-update text-md-end">
                        <a href="javascript:location.reload();" class="tp-cart-update-btn">Update Cart</a>
                     </div>
                  </div> -->
               </div>
            </div>
         </div>
         <div class="col-xl-3 col-lg-4 col-md-6">
            <div class="tp-cart-checkout-wrapper">
               <div class="tp-cart-checkout-top d-flex align-items-center justify-content-between">
                  <span class="tp-cart-checkout-top-title">Subtotal</span>
                  <span class="tp-cart-checkout-top-price">&#x20B9;{{number_format($sub_total,2)}}</span>
               </div>
               <div class="tp-cart-checkout-shipping">
                  <h4 class="tp-cart-checkout-shipping-title">Shipping</h4>

                  <div class="tp-cart-checkout-shipping-option-wrapper">
                     <!-- <div class="tp-cart-checkout-shipping-option">
                        <input id="flat_rate" type="radio" name="shipping">
                        <label for="flat_rate">Flat rate: <span>$20.00</span></label>
                     </div>
                     <div class="tp-cart-checkout-shipping-option">
                        <input id="local_pickup" type="radio" name="shipping">
                        <label for="local_pickup">Local pickup: <span> $25.00</span></label>
                     </div> -->
                     <div class="tp-cart-checkout-shipping-option">
                        <input id="free_shipping" type="radio" name="shipping" checked>
                        <label for="free_shipping">Free shipping</label>
                     </div>
                  </div>
               </div>
               <div class="tp-cart-checkout-total d-flex align-items-center justify-content-between">
                  <span>Total</span>
                  <span>&#x20B9;{{number_format($total,2)}}</span>
               </div>
               <div class="tp-cart-checkout-proceed">
                  <a href="{{url('/checkout')}}" class="tp-cart-checkout-btn w-100">Proceed to Checkout</a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
   $(document).ready(function() {
   $(".update_quantity").click(function (e) {
        e.preventDefault();
         var product_id = $(this).data("pid");
        
         var product_qty = $(this).val();
         var token = '{{csrf_token()}}';
         $.ajax({
               type:"POST",
               url:"{{route('updateQuantity')}}",
               data:{
                  'product_id':product_id,
                  'quantity':product_qty,
                  _token:token,
               },
               success:function(data){
                  console.log("success");
                  if(data.msg==true){
                     location.reload();  
                    toastr.success('Update quantity successfully!');
                    
                }else{
                    toastr.error("Something Went Wrong!");
                }
               }
         });

      });
   
   });
   
  
</script>


@endsection

