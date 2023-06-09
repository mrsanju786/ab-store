@extends('frontend.layouts.inner_main')
@section('title')
<title>Demo | Product Detail</title>
@endsection
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area breadcrumb__style-2 include-bg pt-50 pb-20">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <div class="breadcrumb__list has-icon">
                           <span class="breadcrumb-icon">
                              <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                 <path d="M1.42393 16H15.5759C15.6884 16 15.7962 15.9584 15.8758 15.8844C15.9553 15.8104 16 15.71 16 15.6054V6.29143C16 6.22989 15.9846 6.1692 15.9549 6.11422C15.9252 6.05923 15.8821 6.01147 15.829 5.97475L8.75305 1.07803C8.67992 1.02736 8.59118 1 8.5 1C8.40882 1 8.32008 1.02736 8.24695 1.07803L1.17098 5.97587C1.11791 6.01259 1.0748 6.06035 1.04511 6.11534C1.01543 6.17033 0.999976 6.23101 1 6.29255V15.6063C1.00027 15.7108 1.04504 15.8109 1.12451 15.8847C1.20398 15.9585 1.31165 16 1.42393 16ZM10.1464 15.2107H6.85241V10.6202H10.1464V15.2107ZM1.84866 6.48977L8.4999 1.88561L15.1517 6.48977V15.2107H10.9946V10.2256C10.9946 10.1209 10.95 10.0206 10.8704 9.94654C10.7909 9.87254 10.683 9.83096 10.5705 9.83096H6.42848C6.316 9.83096 6.20812 9.87254 6.12858 9.94654C6.04904 10.0206 6.00435 10.1209 6.00435 10.2256V15.2107H1.84806L1.84866 6.48977Z" fill="#55585B" stroke="#55585B" stroke-width="0.5"/>
                              </svg>
                           </span>
                           <span><a href="{{url('/home')}}">Home</a></span>
                           <span><a href="{{url('/shop-category')}}/{{base64_encode($productDetail->id)}}">{{$productDetail->category->title ?? "-"}}</a></span>
                           <span>{{$productDetail->name ?? "-"}}</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->

         <!-- product details area start -->
         <section class="tp-product-details-area">
            <div class="tp-product-details-top pb-115">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-7 col-lg-6">
                        <div class="tp-product-details-thumb-wrapper tp-tab d-sm-flex">
                           <nav>
                             
                              <div class="nav nav-tabs flex-sm-column " id="productDetailsNavThumb" role="tablist">
                                 @if(!empty($product_data))
                                 @foreach($product_data as $value)
                                 <button class="nav-link active" id="nav-1-tab" data-bs-toggle="tab" data-bs-target="#nav-1" type="button" role="tab" aria-controls="nav-1" aria-selected="true">
                                    <img src="{{env('APP_URL')."product"}}/{{$value->color_product_image}}" alt="">
                                 </button>
                                 @endforeach
                                 @endif
                                 <!-- <button class="nav-link" id="nav-2-tab" data-bs-toggle="tab" data-bs-target="#nav-2" type="button" role="tab" aria-controls="nav-2" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/product/details/nav/product-details-nav-2.jpg')}}" alt="">
                                 </button>
                                 <button class="nav-link" id="nav-3-tab" data-bs-toggle="tab" data-bs-target="#nav-3" type="button" role="tab" aria-controls="nav-3" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/product/details/nav/product-details-nav-3.jpg')}}" alt="">
                                 </button>
                                 <button class="nav-link" id="nav-4-tab" data-bs-toggle="tab" data-bs-target="#nav-4" type="button" role="tab" aria-controls="nav-4" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/product/details/nav/product-details-nav-4.jpg')}}" alt="">
                                 </button>
                                 <button class="nav-link" id="nav-5-tab" data-bs-toggle="tab" data-bs-target="#nav-5" type="button" role="tab" aria-controls="nav-5" aria-selected="false">
                                    <img src="{{asset('frontend/assets/img/product/details/nav/product-details-nav-5.jpg')}}" alt="">
                                 </button> -->
                              </div>
                           </nav>
                           <div class="tab-content m-img" id="myElement">
                              <div class="tab-pane fade show active" id="nav-1" role="tabpanel" aria-labelledby="nav-1-tab" tabindex="0">
                                 @if(!empty($single_product_data->color_product_image))
                                 <div class="tp-product-details-nav-main-thumb" id= "product_image">
                                    <img src="{{env('APP_URL')."product"}}/{{$single_product_data->color_product_image}}" alt="">
                                 </div>
                                 @else
                                 <div class="tp-product-details-nav-main-thumb" id= "product_image">
                                    <img src="{{env('APP_URL')."product"}}/{{$productDetail->image}}" alt="">
                                 </div>
                                 @endif
                                 
                              </div>
                              <!-- <div class="tab-pane fade" id="nav-2" role="tabpanel" aria-labelledby="nav-2-tab" tabindex="0">
                                 <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{asset('frontend/assets/img/product/details/main/product-details-main-2.jpg')}}" alt="">
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-3" role="tabpanel" aria-labelledby="nav-3-tab" tabindex="0">
                                 <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{asset('frontend/assets/img/product/details/main/product-details-main-3.jpg')}}" alt="">
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-4" role="tabpanel" aria-labelledby="nav-4-tab" tabindex="0">
                                 <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{asset('frontend/assets/img/product/details/main/product-details-main-4.jpg')}}" alt="">
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-5" role="tabpanel" aria-labelledby="nav-5-tab" tabindex="0">
                                 <div class="tp-product-details-nav-main-thumb">
                                    <img src="{{asset('frontend/assets/img/product/details/main/product-details-main-5.jpg')}}" alt="">
                                 </div>
                              </div> -->
                            </div>
                        </div>
                     </div> <!-- col end -->
                     <div class="col-xl-5 col-lg-6">
                        <div class="tp-product-details-wrapper">
                           <div class="tp-product-details-category">
                              <span>{{$productDetail->category->title ?? "-"}}</span>
                           </div>
                           <h3 class="tp-product-details-title">{{$productDetail->name ?? "-"}}</h3>
   
                           <!-- inventory details -->
                           <div class="tp-product-details-inventory d-flex align-items-center mb-10">
                              <div class="tp-product-details-stock mb-10">
                                 <span>In Stock</span>
                              </div>
                              @php 
                                    $cust_rating = \App\Models\Review::where('product_id',$productDetail->id)->get();
                                    $count =0;
                                    $count = \App\Models\Review::where('product_id',$productDetail->id)->count();
                                    if(count($cust_rating)>0){
                                       $total_customer_rating = 0;
                                       $out_of = 0;
                                       $i=5;
                                       foreach($cust_rating as $customer_rating){
                                          $total_customer_rating += $customer_rating->rating*$i;
                                          $out_of++;
                                          $i++;
                                       }
                                       $total_customer_rating;
                                       $total_out_of = round($out_of*5);
                                       $f_rating = round($total_customer_rating/$total_out_of);
                                       $empty_start = 5 - $f_rating;
                                    }else{
                                       $f_rating = 0;
                                       $empty_start = 5;
                                    }
                              @endphp
                              <div class="tp-product-details-rating-wrapper d-flex align-items-center mb-10">
                                 <div class="tp-product-details-rating">
                                 @for($s=1; $s<=$f_rating; $s++)
                                 <i class="fa fa-star"></i>                            
                                 @endfor
                                 @for($t=1; $t<=$empty_start; $t++)
                                 <i class="fa fa-star-o"></i>
                                 @endfor
                                    <!-- <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span>
                                    <span><i class="fa-solid fa-star"></i></span> -->
                                 </div>
                                 <div class="tp-product-details-reviews">
                                    <span> ({{$count}})</span>
                                 </div>
                              </div>
                           </div>
                           <p>{!! Str::words($productDetail->description, 20,'....')  !!}<span>See more</span></p>
                           
                           <!-- price -->
                           <?php $productColor =App\Models\ProductColorVariant::where('product_id',$productDetail->id)->first(); 
                           $price = 0;
                           $price = $productColor->extra_amount;
                           ?>
                           <div class="tp-product-details-price-wrapper mb-20">
                           &#x20B9;<span class="tp-product-details-price old-price" id ="actualPrice">{{number_format(($productDetail['productSize']['actual_price']),2) ?? "-"}}</span>
                           &#x20B9;<span class="tp-product-details-price new-price" id ="new_price">{{number_format(($productDetail['productSize']['offer_price']-$single_product_data['extra_amount']),2) ?? "-"}}</span>
                           </div>
                          
   
                           <!-- variations -->
                           <div class="tp-product-details-variation">
                              <!-- single item -->
                              <div class="tp-product-details-variation-item">
                                 
                                 <h4 class="tp-product-details-variation-title">Color :</h4>
                                 <div class="tp-product-details-variation-list">
                                   <?php $colors = DB::table('product_color_variants')->where('product_id',$productDetail->id)->where('status',1)->get(); ?>
                                    @foreach($colors as $key=>$color)
                                    
                                    <a href="{{url('/product-color')}}/{{base64_encode($productDetail->id)}}/{{$color->id}}" class="color tp-color-variation-btn" onclick="changeStyle('{{$color->color_code}}',{{$color->id}});"style="border-color:{{$color->color_code}}; border-radius: 50%; background-color: {{$color->color_code}}; display: inline-block;width: 26px;height: 26px;border-radius: 50%;position: relative;-webkit-transition: box-shadow 0.2s 0s linear;-moz-transition: box-shadow 0.2s 0s linear;-ms-transition: box-shadow 0.2s 0s linear;-o-transition: box-shadow 0.2s 0s linear;transition: box-shadow 0.2s 0s linear;" id="variant-color" >
                                        <span style="border-color:{{$color->color_code}}; border-radius: 50%; background-color: {{$color->color_code}}; "  data-id="{{$color->id}}"></span>
                                        <span class="tp-color-variation-tootltip">{{$color->color_name}}</span>
                                    </a>
                                    @endforeach


                                    <h4 class="tp-product-details-variation-title">Size ( GB):</h4>
                                    <div class="tp-product-details-variation-list">
                                    <?php $sizes = DB::table('product_size_variants')->where('product_id',$productDetail->id)->where('status',1)->get(); ?>
                                   
                                       <select  class="color tp-color-variation-btn" style="background-color:  #e1d9e9;" id="product_size" onchange="getVariantSize()">
                                       @foreach($sizes as $key=>$size)
                                          <option value="{{$size->id}}">{{$size->size}} GB</option>
                                       @endforeach
                                    </select>
                                  
                                    <!-- <button type="button" class="color tp-color-variation-btn" >
                                       <span data-bg-color="#F8B655"></span>
                                       <span class="tp-color-variation-tootltip">Yellow</span>
                                    </button>
                                    <button type="button" class="color tp-color-variation-btn active" >
                                       <span data-bg-color="#CBCBCB"></span>
                                       <span class="tp-color-variation-tootltip">Gray</span>
                                    </button>
                                    <button type="button" class="color tp-color-variation-btn" >
                                       <span data-bg-color="#494E52"></span>
                                       <span class="tp-color-variation-tootltip">Black</span>
                                    </button>
                                    <button type="button" class="color tp-color-variation-btn" >
                                       <span data-bg-color="#B4505A"></span>
                                       <span class="tp-color-variation-tootltip">Brown</span>
                                    </button> -->
                                 </div>
                              </div>
                           </div>
   
                           <!-- actions -->
                           <input type="hidden" id="variant_color_id" name="variant_color_name" value="{{$single_product_data->id}}">
                           <input type="hidden" id="variant_color" name="variant_color" value="{{$single_product_data->id}}">
                           <input type="hidden" id="variant-size" name="variant_size" value="">
                           <input type="hidden" id="product-id" name="product_id" value="">
                           @if(Auth::check())
                           <div class="tp-product-details-action-wrapper">
                              <h3 class="tp-product-details-action-title">Quantity</h3>
                              <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                 <div class="tp-product-details-quantity">
                                    <div class="tp-product-quantity mb-15 mr-15">
                                       <span class="tp-cart-minus">
                                          <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>                                                            
                                       </span>
                                       <input class="tp-cart-input" type="text" value="1" id="quantity" min="1" max="10" name="quantity">
                                       <span class="tp-cart-plus">
                                          <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="tp-product-details-add-to-cart mb-15 w-100">
                                    <button type ="submit" class="tp-product-details-add-to-cart-btn w-100 add_to_cart" data-id="{{$productDetail->id}}">Add To Cart</button>
                                 </div>
                              </div>
                              <a href="{{url('/checkout')}}" class="tp-product-details-buy-now-btn w-100 add_to_cart"  data-id="{{$productDetail->id}}">Buy Now</a>
                           </div>
                           <div class="tp-product-details-action-sm">
                           @php $countWishlist = 0; @endphp
                           @if(Auth::check())
                           @php
                              $countWishlist = App\Models\Wishlist::countWishlist($single_product_data['id'])
                           @endphp   
                           @endif
                              @if(Auth::check())
                              <a href="javascript:;" class="tp-product-details-action-sm-btn update-wishlist" data-productid ="{{$single_product_data->id}}">
                                 @if($countWishlist > 0)
                                 <i class="fas fa-heart"></i> 
                                 @else  
                                 <i class="far fa-regular fa-heart"></i>  
                                 
                                 @endif
                                 
                              </a>
                              <span class="tp-product-tooltip">Add To Wishlist</span>
                              @else
                              <a href="url('/login')" class="tp-product-details-action-sm-btn update-wishlist" data-productid ="{{$single_product_data->id}}">
                              
                                 <i class="fas fa-heart"></i> 
                              
                                       
                                 
                              </a>
                              <span class="tp-product-tooltip">Add To Wishlist</span>
                              @endif
                            
                           </div>
                           @else
                           <div class="tp-product-details-action-wrapper">
                              <h3 class="tp-product-details-action-title">Quantity</h3>
                              <div class="tp-product-details-action-item-wrapper d-flex align-items-center">
                                 <div class="tp-product-details-quantity">
                                    <div class="tp-product-quantity mb-15 mr-15">
                                       <span class="tp-cart-minus">
                                          <svg width="11" height="2" viewBox="0 0 11 2" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 1H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>                                                            
                                       </span>
                                       <input class="tp-cart-input" type="text" value="1">
                                       <span class="tp-cart-plus">
                                          <svg width="11" height="12" viewBox="0 0 11 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                             <path d="M1 6H10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                             <path d="M5.5 10.5V1.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                          </svg>
                                       </span>
                                    </div>
                                 </div>
                                 <div class="tp-product-details-add-to-cart mb-15 w-100">
                                    <a href="{{url('/login')}}" class="tp-product-details-add-to-cart-btn w-100">Add To Cart</a>
                                 </div>
                              </div>
                              <button class="tp-product-details-buy-now-btn w-100">Buy Now</button>
                           </div>
                           <div class="tp-product-details-action-sm">
                              
                              <button type="button" class="tp-product-details-action-sm-btn">
                                 <svg width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M2.33541 7.54172C3.36263 10.6766 7.42094 13.2113 8.49945 13.8387C9.58162 13.2048 13.6692 10.6421 14.6635 7.5446C15.3163 5.54239 14.7104 3.00621 12.3028 2.24514C11.1364 1.8779 9.77578 2.1014 8.83648 2.81432C8.64012 2.96237 8.36757 2.96524 8.16974 2.81863C7.17476 2.08487 5.87499 1.86999 4.69024 2.24514C2.28632 3.00549 1.68259 5.54167 2.33541 7.54172ZM8.50115 15C8.4103 15 8.32018 14.9784 8.23812 14.9346C8.00879 14.8117 2.60674 11.891 1.29011 7.87081C1.28938 7.87081 1.28938 7.8701 1.28938 7.8701C0.462913 5.33895 1.38316 2.15812 4.35418 1.21882C5.7492 0.776121 7.26952 0.97088 8.49895 1.73195C9.69029 0.993159 11.2729 0.789057 12.6401 1.21882C15.614 2.15956 16.5372 5.33966 15.7115 7.8701C14.4373 11.8443 8.99571 14.8088 8.76492 14.9332C8.68286 14.9777 8.592 15 8.50115 15Z" fill="currentColor"/>
                                    <path d="M8.49945 13.8387L8.42402 13.9683L8.49971 14.0124L8.57526 13.9681L8.49945 13.8387ZM14.6635 7.5446L14.5209 7.4981L14.5207 7.49875L14.6635 7.5446ZM12.3028 2.24514L12.348 2.10211L12.3478 2.10206L12.3028 2.24514ZM8.83648 2.81432L8.92678 2.93409L8.92717 2.9338L8.83648 2.81432ZM8.16974 2.81863L8.25906 2.69812L8.25877 2.69791L8.16974 2.81863ZM4.69024 2.24514L4.73548 2.38815L4.73552 2.38814L4.69024 2.24514ZM8.23812 14.9346L8.16727 15.0668L8.16744 15.0669L8.23812 14.9346ZM1.29011 7.87081L1.43266 7.82413L1.39882 7.72081H1.29011V7.87081ZM1.28938 7.8701L1.43938 7.87009L1.43938 7.84623L1.43197 7.82354L1.28938 7.8701ZM4.35418 1.21882L4.3994 1.36184L4.39955 1.36179L4.35418 1.21882ZM8.49895 1.73195L8.42 1.85949L8.49902 1.90841L8.57801 1.85943L8.49895 1.73195ZM12.6401 1.21882L12.6853 1.0758L12.685 1.07572L12.6401 1.21882ZM15.7115 7.8701L15.5689 7.82356L15.5686 7.8243L15.7115 7.8701ZM8.76492 14.9332L8.69378 14.8011L8.69334 14.8013L8.76492 14.9332ZM2.19287 7.58843C2.71935 9.19514 4.01596 10.6345 5.30013 11.744C6.58766 12.8564 7.88057 13.6522 8.42402 13.9683L8.57487 13.709C8.03982 13.3978 6.76432 12.6125 5.49626 11.517C4.22484 10.4185 2.97868 9.02313 2.47795 7.49501L2.19287 7.58843ZM8.57526 13.9681C9.12037 13.6488 10.4214 12.8444 11.7125 11.729C12.9999 10.6167 14.2963 9.17932 14.8063 7.59044L14.5207 7.49875C14.0364 9.00733 12.7919 10.4 11.5164 11.502C10.2446 12.6008 8.9607 13.3947 8.42364 13.7093L8.57526 13.9681ZM14.8061 7.59109C15.1419 6.5613 15.1554 5.39131 14.7711 4.37633C14.3853 3.35729 13.5989 2.49754 12.348 2.10211L12.2576 2.38816C13.4143 2.75381 14.1347 3.54267 14.4905 4.48255C14.8479 5.42648 14.8379 6.52568 14.5209 7.4981L14.8061 7.59109ZM12.3478 2.10206C11.137 1.72085 9.72549 1.95125 8.7458 2.69484L8.92717 2.9338C9.82606 2.25155 11.1357 2.03494 12.2577 2.38821L12.3478 2.10206ZM8.74618 2.69455C8.60221 2.8031 8.40275 2.80462 8.25906 2.69812L8.08043 2.93915C8.33238 3.12587 8.67804 3.12163 8.92678 2.93409L8.74618 2.69455ZM8.25877 2.69791C7.225 1.93554 5.87527 1.71256 4.64496 2.10213L4.73552 2.38814C5.87471 2.02742 7.12452 2.2342 8.08071 2.93936L8.25877 2.69791ZM4.64501 2.10212C3.39586 2.49722 2.61099 3.35688 2.22622 4.37554C1.84299 5.39014 1.85704 6.55957 2.19281 7.58826L2.478 7.49518C2.16095 6.52382 2.15046 5.42513 2.50687 4.48154C2.86175 3.542 3.58071 2.7534 4.73548 2.38815L4.64501 2.10212ZM8.50115 14.85C8.43415 14.85 8.36841 14.8341 8.3088 14.8023L8.16744 15.0669C8.27195 15.1227 8.38645 15.15 8.50115 15.15V14.85ZM8.30897 14.8024C8.19831 14.7431 6.7996 13.9873 5.26616 12.7476C3.72872 11.5046 2.07716 9.79208 1.43266 7.82413L1.14756 7.9175C1.81968 9.96978 3.52747 11.7277 5.07755 12.9809C6.63162 14.2373 8.0486 15.0032 8.16727 15.0668L8.30897 14.8024ZM1.29011 7.72081C1.31557 7.72081 1.34468 7.72745 1.37175 7.74514C1.39802 7.76231 1.41394 7.78437 1.42309 7.8023C1.43191 7.81958 1.43557 7.8351 1.43727 7.84507C1.43817 7.8504 1.43869 7.85518 1.43898 7.85922C1.43913 7.86127 1.43923 7.8632 1.43929 7.865C1.43932 7.86591 1.43934 7.86678 1.43936 7.86763C1.43936 7.86805 1.43937 7.86847 1.43937 7.86888C1.43937 7.86909 1.43937 7.86929 1.43938 7.86949C1.43938 7.86959 1.43938 7.86969 1.43938 7.86979C1.43938 7.86984 1.43938 7.86992 1.43938 7.86994C1.43938 7.87002 1.43938 7.87009 1.28938 7.8701C1.13938 7.8701 1.13938 7.87017 1.13938 7.87025C1.13938 7.87027 1.13938 7.87035 1.13938 7.8704C1.13938 7.8705 1.13938 7.8706 1.13938 7.8707C1.13938 7.8709 1.13938 7.87111 1.13938 7.87131C1.13939 7.87173 1.13939 7.87214 1.1394 7.87257C1.13941 7.87342 1.13943 7.8743 1.13946 7.8752C1.13953 7.87701 1.13962 7.87896 1.13978 7.88103C1.14007 7.88512 1.14059 7.88995 1.14151 7.89535C1.14323 7.90545 1.14694 7.92115 1.15585 7.93861C1.16508 7.95672 1.18114 7.97896 1.20762 7.99626C1.2349 8.01409 1.26428 8.02081 1.29011 8.02081V7.72081ZM1.43197 7.82354C0.623164 5.34647 1.53102 2.26869 4.3994 1.36184L4.30896 1.0758C1.23531 2.04755 0.302663 5.33142 1.14679 7.91665L1.43197 7.82354ZM4.39955 1.36179C5.7527 0.932384 7.22762 1.12136 8.42 1.85949L8.57791 1.60441C7.31141 0.820401 5.74571 0.619858 4.30881 1.07585L4.39955 1.36179ZM8.57801 1.85943C9.73213 1.14371 11.2694 0.945205 12.5951 1.36192L12.685 1.07572C11.2763 0.632908 9.64845 0.842602 8.4199 1.60447L8.57801 1.85943ZM12.5948 1.36184C15.4664 2.27018 16.3769 5.34745 15.5689 7.82356L15.8541 7.91663C16.6975 5.33188 15.7617 2.04893 12.6853 1.07581L12.5948 1.36184ZM15.5686 7.8243C14.9453 9.76841 13.2952 11.4801 11.7526 12.7288C10.2142 13.974 8.80513 14.7411 8.69378 14.8011L8.83606 15.0652C8.9555 15.0009 10.3826 14.2236 11.9413 12.9619C13.4957 11.7037 15.2034 9.94602 15.8543 7.91589L15.5686 7.8243ZM8.69334 14.8013C8.6337 14.8337 8.56752 14.85 8.50115 14.85V15.15C8.61648 15.15 8.73201 15.1217 8.83649 15.065L8.69334 14.8013Z" fill="currentColor"/>
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209Z" fill="currentColor"/>
                                    <path d="M12.8384 6.93209C12.5548 6.93209 12.3145 6.71865 12.2911 6.43693C12.2427 5.84618 11.8397 5.34743 11.266 5.1656C10.9766 5.07361 10.8184 4.76962 10.9114 4.48718C11.0059 4.20402 11.3129 4.05023 11.6031 4.13934C12.6017 4.45628 13.3014 5.32371 13.3872 6.34925C13.4113 6.64606 13.1864 6.90622 12.8838 6.92993C12.8684 6.93137 12.8538 6.93209 12.8384 6.93209" stroke="currentColor" stroke-width="0.3"/>
                                 </svg>
                                 Add Wishlist
                              </button>
                              
                           </div>
                           @endif
                           <div class="tp-product-details-query">
                              <div class="tp-product-details-query-item d-flex align-items-center">
                                 <span>SKU:  </span>
                                 <p>{{$productDetail->sku ?? "-"}}</p>
                              </div>
                              <div class="tp-product-details-query-item d-flex align-items-center">
                                 <span>Category:  </span>
                                 <p>{{$productDetail->category->title ?? "-"}}</p>
                              </div>
                              <!-- <div class="tp-product-details-query-item d-flex align-items-center">
                                 <span>Tag: </span>
                                 <p>Android</p>
                              </div> -->
                           </div>
                           <div class="tp-product-details-social">
                              <span>Share: </span>
                              <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                              <a href="#"><i class="fa-brands fa-twitter"></i></a>
                              <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                              <a href="#"><i class="fa-brands fa-vimeo-v"></i></a>
                           </div>
                           <div class="tp-product-details-msg mb-15">
                              <ul>
                                 <li>30 days easy returns</li>
                                 <!-- <li>Order yours before 2.30pm for same day dispatch</li> -->
                              </ul>
                           </div>
                           <div class="tp-product-details-payment d-flex align-items-center flex-wrap justify-content-between">
                              <p>Guaranteed safe <br> & secure checkout</p>
                              <img src="{{asset('frontend/assets/img/product/icons/payment-option.png')}}" alt="">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="tp-product-details-bottom pb-140">
               <div class="container">
                  <div class="row">
                     <div class="col-xl-12">
                        <div class="tp-product-details-tab-nav tp-tab">
                           <nav>
                              <div class="nav nav-tabs justify-content-center p-relative tp-product-tab" id="navPresentationTab" role="tablist">
                                <button class="nav-link" id="nav-description-tab" data-bs-toggle="tab" data-bs-target="#nav-description" type="button" role="tab" aria-controls="nav-description" aria-selected="true">Description</button>
                                <button class="nav-link active" id="nav-addInfo-tab" data-bs-toggle="tab" data-bs-target="#nav-addInfo" type="button" role="tab" aria-controls="nav-addInfo" aria-selected="false">Additional information</button>
                                <?php $count =0; 
                                       $count = App\Models\Review::where('product_id',$productDetail->id)->count();?>
                                <button class="nav-link" id="nav-review-tab" data-bs-toggle="tab" data-bs-target="#nav-review" type="button" role="tab" aria-controls="nav-review" aria-selected="false">Reviews ({{$count ?? "0"}})</button>

                                <span id="productTabMarker" class="tp-product-details-tab-line"></span>
                              </div>
                            </nav>  
                            <div class="tab-content" id="navPresentationTabContent">
                              <div class="tab-pane fade" id="nav-description" role="tabpanel" aria-labelledby="nav-description-tab" tabindex="0">
                                 <div class="tp-product-details-desc-wrapper pt-80">
                                    <div class="row justify-content-center">
                                       <div class="col-xl-10">
                                          <div class="tp-product-details-desc-item pb-105">
                                             <div class="row">
                                                <div class="col-lg-6">
                                                   <div class="tp-product-details-desc-content pt-25">
                                                      <span>{{$productDetail->name ?? "-"}}</span>
                                                     
                                                      <p>{!! $productDetail->description ?? "-" !!}</p>
                                                   </div>
                                                   
                                                </div>
                                                <div class="col-lg-6">
                                                   <div class="tp-product-details-desc-thumb">
                                                      <img src="{{env('APP_URL')."product"}}/{{$productDetail->image}}" alt="">
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          
                                          
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade show active" id="nav-addInfo" role="tabpanel" aria-labelledby="nav-addInfo-tab" tabindex="0">
                                 
                                 <div class="tp-product-details-additional-info ">
                                    <div class="row justify-content-center">
                                       <div class="col-xl-10">
                                          <table>
                                             <tbody>
                                                <tr>
                                                   <td>Standing screen display size</td>
                                                   <td>Screen display Size 10.4</td>
                                                </tr>
                                                <tr>
                                                   <td>Color</td>
                                                   <td>Gray, Dark gray, Mystic black</td>
                                                </tr>
                                                <tr>
                                                   <td>Screen Resolution</td>
                                                   <td>1920 x 1200 Pixels</td>
                                                </tr>
                                                <tr>
                                                   <td>Max Screen Resolution</td>
                                                   <td>2000 x 1200</td>
                                                </tr>
                                                <tr>
                                                   <td>Processor</td>
                                                   <td>2.3 GHz (128 GB)</td>
                                                </tr>
                                                <tr>
                                                   <td>Graphics Coprocessor</td>
                                                   <td>Exynos 9611, Octa Core (4x2.3GHz + 4x1.7GHz)</td>
                                                </tr>
                                                <tr>
                                                   <td>Wireless Type</td>
                                                   <td>802.11a/b/g/n/ac, Bluetooth</td>
                                                </tr>
                                                <tr>
                                                   <td>Average Battery Life (in hours)</td>
                                                   <td>13 Hours</td>
                                                </tr>
                                                <tr>
                                                   <td>Series</td>
                                                   <td>Samsung Galaxy tab S6 Lite WiFi</td>
                                                </tr>
                                                <tr>
                                                   <td>Item model number</td>
                                                   <td>SM-P6102ZAEXOR</td>
                                                </tr>
                                                <tr>
                                                   <td>Hardware Platform</td>
                                                   <td>Android</td>
                                                </tr>
                                                <tr>
                                                   <td>Operating System</td>
                                                   <td>Android 12</td>
                                                </tr>
                                                <tr>
                                                   <td>Batteries</td>
                                                   <td>1 Lithium Polymer batteries required. (included)</td>
                                                </tr>
                                                <tr>
                                                   <td>Product Dimensions</td>
                                                   <td>0.28 x 6.07 x 9.63 inches</td>
                                                </tr>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="tab-pane fade" id="nav-review" role="tabpanel" aria-labelledby="nav-review-tab" tabindex="0">
                                 <div class="tp-product-details-review-wrapper pt-60">
                                    <div class="row">
                                       <div class="col-lg-6">
                                          <div class="tp-product-details-review-statics">
                                             <!-- number -->
                                             <div class="tp-product-details-review-number d-inline-block mb-50">
                                                <h3 class="tp-product-details-review-number-title">Customer reviews</h3>
                                                
                                                <div class="tp-product-details-review-summery d-flex align-items-center">
                                                   <div class="tp-product-details-review-summery-value">
                                                      <span>Total</span>
                                                   </div>
                                                   <div class="tp-product-details-review-summery-rating d-flex align-items-center">
                                                      <!-- <span><i class="fa-solid fa-star"></i></span>
                                                      <span><i class="fa-solid fa-star"></i></span>
                                                      <span><i class="fa-solid fa-star"></i></span>
                                                      <span><i class="fa-solid fa-star"></i></span>
                                                      <span><i class="fa-solid fa-star"></i></span> -->
                                                      <p>({{$count}} Reviews)</p>
                                                   </div>
                                                </div>

                                             </div>
      
                                             <!-- reviews -->
                                             <div class="tp-product-details-review-list pr-110">
                                                <h3 class="tp-product-details-review-title">Rating & Review</h3>
                                                <?php 
                                                $reviews = App\Models\Review::where('product_id',$productDetail->id)->orderBy('id','desc')->get();?>
                                                @if(!empty($reviews))
                                                @foreach($reviews  as $review)
                                                <div class="tp-product-details-review-avater d-flex align-items-start">
                                                   <div class="tp-product-details-review-avater-thumb">
                                                      <a href="#">
                                                         <img src="{{asset('frontend/assets/img/users/user-2.jpg')}}" alt="">
                                                      </a>
                                                   </div>
                                                   <div class="tp-product-details-review-avater-content">
                                                      <div class="tp-product-details-review-avater-rating d-flex align-items-center">
                                                         {{$review->rating ?? "-"}}
                                                        
                                                      </div>
                                                      <h3 class="tp-product-details-review-avater-title"> {{$review->name ?? "-"}}</h3>
                                                      <span class="tp-product-details-review-avater-meta">{{date('d F,Y',strtotime($review->created_at)) ?? "-"}} </span>
      
                                                      <div class="tp-product-details-review-avater-comment">
                                                         <p>{{$review->comment ?? "-"}}</p>
                                                      </div>
                                                   </div>
                                                </div>
                                                @endforeach
                                                @endif
                                               
                                             </div>
                                          </div>
                                       </div> <!-- end col -->
                                       @if(Auth::user())
                                       <div class="col-lg-6">
                                          <div class="tp-product-details-review-form">
                                             <h3 class="tp-product-details-review-form-title">Review this product</h3>
                                             <?php $name = Auth::user()->first_name.' '.Auth::user()->last_name ?? Null; ?> 
                                             <p>Your email address will not be published. Required fields are marked *</p>
                                             <form action="{{url('store-review')}}/{{$productDetail->id}}" id="review-form" method="post">
                                             @csrf
                                                <div class="tp-product-details-review-form-rating d-flex align-items-center">
                                                   <p>Your Rating :</p>
                                                   <div class="tp-product-details-review-form-rating-icon d-flex align-items-center">
                                                   <div class="stars">
                                                     
                                                         <input class="star star-5" id="star-5" type="radio" name="rating" id="rating" value="5" />
                                                         <label class="star star-5" for="star-5"></label>
                                                         <input class="star star-4" id="star-4" type="radio" name="rating" id="rating" value="4" />
                                                         <label class="star star-4" for="star-4"></label>
                                                         <input class="star star-3" id="star-3" type="radio" name="rating" id="rating" value="3" />
                                                         <label class="star star-3" for="star-3"></label>
                                                         <input class="star star-2" id="star-2" type="radio" name="rating" id="rating" value="2" />
                                                         <label class="star star-2" for="star-2"></label>
                                                         <input class="star star-1" id="star-1" type="radio" name="rating" id="rating" value="1" />
                                                         <label class="star star-1" for="star-1"></label>
                                                      
                                                      </div>
                                                      @if($errors->has('rating'))
                                                         <span class="text-danger">{{ $errors->first('rating') }}</span>
                                                      @endif
                                                   </div>
                                                </div>
                                                <div class="tp-product-details-review-input-wrapper">
                                                <div class="tp-product-details-review-input-box">
                                                      <div class="tp-product-details-review-input">
                                                         <input name="name" id="name" type="text" placeholder="name" value="{{$name}}">
                                                         <div class = "text-danger">
                                                            {{$errors->first('name')}}
                                                         </div> 
                                                      </div>
                                                      <div class="tp-product-details-review-input-title">
                                                         <label for="name">Name</label>
                                                      </div>
                                                   </div>
                                                   <div class="tp-product-details-review-input-box">
                                                      <div class="tp-product-details-review-input">
                                                         <textarea id="reviewText" name="comment" placeholder="Write your review here..."></textarea>
                                                         <div class = "text-danger">
                                                            {{$errors->first('comment')}}
                                                         </div>
                                                      </div>
                                                      <div class="tp-product-details-review-input-title">
                                                         <label for="msg">Review</label>
                                                      </div>
                                                   </div>
                                                   
                                                </div>
                                                <!-- <div class="tp-product-details-review-suggetions mb-20">
                                                   <div class="tp-product-details-review-remeber">
                                                      <input id="remeber" type="checkbox">
                                                      <label for="remeber">Save my name, email, and website in this browser for the next time I comment.</label>
                                                   </div>
                                                </div> -->
                                                <div class="tp-product-details-review-btn-wrapper">
                                                   <button class="tp-product-details-review-btn">Submit</button>
                                                </div>
                                             </form>
                                          </div>
                                       </div>
                                       @endif
                                    </div>
                                 </div>
                              </div>
                            </div>                                                
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- product details area end -->

         <!-- related product area start -->
         <section class="tp-related-product pt-95 pb-120">
            <div class="container">
               <div class="row">
                  <div class="tp-section-title-wrapper-6 text-center mb-40">
                     <!-- <span class="tp-section-title-pre-6">Next day Products</span> -->
                     <h3 class="tp-section-title-6">Related Products</h3>
                  </div>
               </div>
               <div class="row">
                  <div class="tp-product-related-slider">
                     <div class="tp-product-related-slider-active swiper-container  mb-10">
                        <div class="swiper-wrapper">
                            @if(!empty($relatedProduct))
                            @foreach($relatedProduct as $value)
                           <div class="swiper-slide">
                              <div class="tp-product-item-3 tp-product-style-primary mb-50">
                                 <div class="tp-product-thumb-3 mb-15 fix p-relative z-index-1">
                                    <a href="product-details.html">
                                       
                                        <img src=" {{env('APP_URL')."product"}}/{{$value->image}}" alt="">
                                       <!-- <img src="assets/img/product/related/product-related-1.jpg" alt=""> -->
                                    </a>
         
                                    <!-- product badge -->
                                    <!-- <div class="tp-product-badge">
                                       <span class="product-offer">-25%</span>
                                    </div> -->

                                    <!-- product action -->
                                    <div class="tp-product-action-3 tp-product-action-4 has-shadow tp-product-action-primaryStyle">
                                       <div class="tp-product-action-item-3 d-flex flex-column">
                                          <!-- <button type="button" class="tp-product-action-btn-3 tp-product-add-cart-btn">
                                             <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M3.34706 4.53799L3.85961 10.6239C3.89701 11.0923 4.28036 11.4436 4.74871 11.4436H4.75212H14.0265H14.0282C14.4711 11.4436 14.8493 11.1144 14.9122 10.6774L15.7197 5.11162C15.7384 4.97924 15.7053 4.84687 15.6245 4.73995C15.5446 4.63218 15.4273 4.5626 15.2947 4.54393C15.1171 4.55072 7.74498 4.54054 3.34706 4.53799ZM4.74722 12.7162C3.62777 12.7162 2.68001 11.8438 2.58906 10.728L1.81046 1.4837L0.529505 1.26308C0.181854 1.20198 -0.0501969 0.873587 0.00930333 0.526523C0.0705036 0.17946 0.406255 -0.0462578 0.746256 0.00805037L2.51426 0.313534C2.79901 0.363599 3.01576 0.5995 3.04042 0.888012L3.24017 3.26484C15.3748 3.26993 15.4139 3.27587 15.4726 3.28266C15.946 3.3514 16.3625 3.59833 16.6464 3.97849C16.9303 4.35779 17.0493 4.82535 16.9813 5.29376L16.1747 10.8586C16.0225 11.9177 15.1011 12.7162 14.0301 12.7162H14.0259H4.75402H4.74722Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.6629 7.67446H10.3067C9.95394 7.67446 9.66919 7.38934 9.66919 7.03804C9.66919 6.68673 9.95394 6.40161 10.3067 6.40161H12.6629C13.0148 6.40161 13.3004 6.68673 13.3004 7.03804C13.3004 7.38934 13.0148 7.67446 12.6629 7.67446Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38171 15.0212C4.63756 15.0212 4.84411 15.2278 4.84411 15.4836C4.84411 15.7395 4.63756 15.9469 4.38171 15.9469C4.12501 15.9469 3.91846 15.7395 3.91846 15.4836C3.91846 15.2278 4.12501 15.0212 4.38171 15.0212Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.38082 15.3091C4.28477 15.3091 4.20657 15.3873 4.20657 15.4833C4.20657 15.6763 4.55592 15.6763 4.55592 15.4833C4.55592 15.3873 4.47687 15.3091 4.38082 15.3091ZM4.38067 16.5815C3.77376 16.5815 3.28076 16.0884 3.28076 15.4826C3.28076 14.8767 3.77376 14.3845 4.38067 14.3845C4.98757 14.3845 5.48142 14.8767 5.48142 15.4826C5.48142 16.0884 4.98757 16.5815 4.38067 16.5815Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9701 15.0212C14.2259 15.0212 14.4333 15.2278 14.4333 15.4836C14.4333 15.7395 14.2259 15.9469 13.9701 15.9469C13.7134 15.9469 13.5068 15.7395 13.5068 15.4836C13.5068 15.2278 13.7134 15.0212 13.9701 15.0212Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M13.9692 15.3092C13.874 15.3092 13.7958 15.3874 13.7958 15.4835C13.7966 15.6781 14.1451 15.6764 14.1443 15.4835C14.1443 15.3874 14.0652 15.3092 13.9692 15.3092ZM13.969 16.5815C13.3621 16.5815 12.8691 16.0884 12.8691 15.4826C12.8691 14.8767 13.3621 14.3845 13.969 14.3845C14.5768 14.3845 15.0706 14.8767 15.0706 15.4826C15.0706 16.0884 14.5768 16.5815 13.969 16.5815Z" fill="currentColor"/>
                                             </svg>                                          
                                             <span class="tp-product-tooltip">Add to Cart</span>
                                          </button> -->
                                         
                                          <!-- <button type="button" class="tp-product-action-btn-3 tp-product-add-to-wishlist-btn">
                                             <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M1.60355 7.98635C2.83622 11.8048 7.7062 14.8923 9.0004 15.6565C10.299 14.8844 15.2042 11.7628 16.3973 7.98985C17.1806 5.55102 16.4535 2.46177 13.5644 1.53473C12.1647 1.08741 10.532 1.35966 9.40484 2.22804C9.16921 2.40837 8.84214 2.41187 8.60476 2.23329C7.41078 1.33952 5.85105 1.07778 4.42936 1.53473C1.54465 2.4609 0.820172 5.55014 1.60355 7.98635ZM9.00138 17.0711C8.89236 17.0711 8.78421 17.0448 8.68574 16.9914C8.41055 16.8417 1.92808 13.2841 0.348132 8.3872C0.347252 8.3872 0.347252 8.38633 0.347252 8.38633C-0.644504 5.30321 0.459792 1.42874 4.02502 0.284605C5.69904 -0.254635 7.52342 -0.0174044 8.99874 0.909632C10.4283 0.00973263 12.3275 -0.238878 13.9681 0.284605C17.5368 1.43049 18.6446 5.30408 17.6538 8.38633C16.1248 13.2272 9.59485 16.8382 9.3179 16.9896C9.21943 17.0439 9.1104 17.0711 9.00138 17.0711Z" fill="currentColor"/>
                                                <path fill-rule="evenodd" clip-rule="evenodd" d="M14.203 6.67473C13.8627 6.67473 13.5743 6.41474 13.5462 6.07159C13.4882 5.35202 13.0046 4.7445 12.3162 4.52302C11.9689 4.41097 11.779 4.04068 11.8906 3.69666C12.0041 3.35175 12.3724 3.16442 12.7206 3.27297C13.919 3.65901 14.7586 4.71561 14.8615 5.96479C14.8905 6.32632 14.6206 6.64322 14.2575 6.6721C14.239 6.67385 14.2214 6.67473 14.203 6.67473Z" fill="currentColor"/>
                                             </svg>                                                                               
                                             <span class="tp-product-tooltip">Add To Wishlist</span>
                                          </button> -->
                                       </div>
                                    </div>
         
                                    <!-- <div class="tp-product-add-cart-btn-large-wrapper">
                                       <button type="button" class="tp-product-add-cart-btn-large">
                                             Add To Cart                                           
                                       </button>
                                    </div> -->
                                 </div>
                                 <div class="tp-product-content-3">
                                    <div class="tp-product-tag-3">
                                       <span>{{$value->category->item ?? "-"}}</span>
                                    </div>
                                    <h3 class="tp-product-title-3">
                                       <a href="product-details.html">{{$value->name ?? "-"}}</a>
                                    </h3>
                                    
                                    @if(!empty($value['productSize']))
                                    <?php $productColor =App\Models\ProductColorVariant::where('product_id',$productDetail->id)->first(); 
                                    $price = 0;
                                    $price = $productColor->extra_amount;
                                    ?>
                                    <div class="tp-product-price-wrapper-3">
                                       <span class="tp-product-price-3 new-price">&#x20B9;{{number_format(($value['productSize']['actual_price']),2) ?? "-"}}</span>
                                       <span class="tp-product-price-3 old-price">&#x20B9;{{number_format(($value['productSize']['offer_price']-$value['productSize']['extra_amount']),2) ?? "-"}}</span>
                                    </div>
                                    @endif
                                 </div>
                              </div>
                           </div>
                           @endforeach
                           @endif
                           
                        </div>
                     </div>
                     <div class="tp-related-swiper-scrollbar tp-swiper-scrollbar"></div>
                  </div>
               </div>
            </div>
         </section>
         <!-- related product area end -->

<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">    
<style>
   div.stars {
  width: 270px;
  display: inline-block;
}
 
input.star { display: none; }
 
label.star {
  /* float: right; */
  padding: 10px;
  /* font-size: 36px; */
  color: #FFB21D;
  /* transition: all .2s; */
}
 
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  /* transition: all .25s; */
}
 
input.star-5:checked ~ label.star:before {
  color: #FE7;
  /* text-shadow: 0 0 20px #952; */
}
 
input.star-1:checked ~ label.star:before { color: #F62; }
 
label.star:hover { transform: rotate(-15deg) scale(1.3); }
 
label.star:before {
  content: '\f006';
  font-family: FontAwesome;
}
</style>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> 
<script>
    function changeStyle(border_color,color_id){
        $('#variant-color').val(color_id);
      
        var element = document.getElementById("myElement");
        element.style.borderColor = border_color;        
    }

    $('#review-form').submit(function() {
        if ($.trim($("#name").val()) === "") {
            toastr.error("Name Field Required");
            return false;
        }else if($.trim($('input[name="rating"]:checked').val()) === ""){
            toastr.error("Rating Required");
            return false;
        }else if($.trim($("#reviewText").val()) === ""){
            toastr.error("Review field Required");
            return false;
        }else{
            return true;
        }
    });
</script>  
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet"/>

<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script>

    $(".add_to_cart").click(function(){
        var product_id = $(this).data("id");
        var variant_id = $("#variant_color_id").val();
        var product_qty   = $("#quantity").val();
        var variant_color = $("#variant_color").val();
        var variant_size  = $("#product_size").val();
        
        var token = '{{csrf_token()}}';
        $.ajax({
            type:"POST",
            url:"{{route('addToCart')}}",
            data:{
                'product_id':product_id,
                'variant_id':variant_id,
                'quantity':product_qty,
                'variant_color':variant_color,
                'variant_size':variant_size,
                _token:token,
            },
            success:function(data){
                if(data.msg==true){
                    toastr.success('Cart added to successfully!');
                    location.reload();  
                    $('#cart_count').html(data.cart_cnt);
                }else{
                    toastr.error("Something Went Wrong!");
                }
            }
        });

    });
    
</script>   
<script>
   var user_id = "{{Auth::id()}}" ? "{{Auth::id()}}" : '';


   $(document).ready(function() {
      $('.update-wishlist').click(function()
         {
            $.ajaxSetup({
               headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
           }); 

            var product_id = $(this).data('productid');
           // alert(product_id);
            $.ajax({
               url: "{{url('/update-wishlist')}}",
               type:"POST",
               data:{
                     product_id:product_id,
                     user_id   :user_id,
                    
               }, 
               
               success:function(response) {
                 
                  if(response.action=="add") {
                     $('a[data-productid='+product_id+']').html('<i class="fas fa-heart"></i>')
                     $('#notifyDiv').fadeIn();
                     $('#notifyDiv').css('color','green');
                     $('#notifyDiv').text(response.message);
                     $('#wish_cnt').html(response.wish_cnt);
                     
                     setTimeout(() => {
                     toastr.success(response.message);
                     },1000)
                    //  location.reload()
                    
                  }else if(response.action=="remove"){
                     $('a[data-productid='+product_id+']').html('<i class="far fa-heart"></i>')
                     $('#notifyDiv').fadeOut();
                     $('#notifyDiv').css('color','red');
                     $('#notifyDiv').text(response.message);
                     $('#wish_cnt').html(response.wish_cnt);
                     setTimeout(() => {
                     toastr.success(response.message);
                     },1000)
                    // location.reload()
                  }else if(response.action=="error"){
                     $('a[data-productid='+product_id+']').html('<i class="fas fa-heart"></i>')
                     $('#notifyDiv').fadeOut();
                     $('#notifyDiv').css('color','red');
                     $('#notifyDiv').text(response.message);
                     setTimeout(() => {
                     toastr.error(response.message);
                     },1000)
                  }
               },
            });

         }) ;
   });
</script>  
<script>
function getVariantSize(){

   var product_size  = $('#product_size').val();
   var product_color = $('#variant_color').val();
  
   var token = '{{csrf_token()}}';
   $.ajax({
      type:"POST",
      url:"{{route('check-product-size')}}",
      data:{
         
         'product_size' :product_size,'product_color':product_color,
         
         _token:token,
      },
      success:function(data){
         if(data.product_data.length != 0){
            console.log(data.original_price);
               $('#actualPrice').html(data.product_data.actual_price);
               $('#new_price').html(data.original_price);
               $('#variant-size').val(data.product_data.size);
         }
         
      }
   });
}

function getVariantColor(){
// var product_color = $(this).data("id");
// alert(product_color);
var product_color = $("#variant-color").val();
console.log(product_color);
var token = '{{csrf_token()}}';
$.ajax({
   type:"POST",
   url:"{{route('check-product-color')}}",
   data:{
      
      'product_color' :product_color,
      
      _token:token,
   },
   success:function(data){
      if(data.product_data.length != 0){
         variant_color
            $('#actualPrice').html(data.product_data.price);
            $('#product_image').html(data.product_data.image);
            $('#variant_color').val(data.product_data.id);
      }
      
   }
});
}
</script>   
@endsection