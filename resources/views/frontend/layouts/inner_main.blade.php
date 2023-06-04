<!doctype html>
<html class="no-js" lang="zxx">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title> AB-MOBILE</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- Place favicon.ico in the root directory -->
      <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontend/assets/img/logo/favicon.png')}}">

      <!-- CSS here -->
      <link rel="stylesheet" href="{{asset('frontend/assets/css/bootstrap.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/animate.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/swiper-bundle.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/slick.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/magnific-popup.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/font-awesome-pro.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/flaticon_shofy.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/spacing.css')}}">
      <link rel="stylesheet" href="{{asset('frontend/assets/css/main.css')}}">
   </head>
   <body>
        <!-- pre loader area start -->
            <!-- <div id="loading">
                <div id="loading-center">
                    <div id="loading-center-absolute">
                   
                    <div class="tp-preloader-content">
                        <div class="tp-preloader-logo">
                            <div class="tp-preloader-circle">
                                <svg width="190" height="190" viewBox="0 0 380 380" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle stroke="#D9D9D9" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle> 
                                <circle stroke="red" cx="190" cy="190" r="180" stroke-width="6" stroke-linecap="round"></circle> 
                            </svg>
                            </div>
                            <img src="{{asset('frontend/assets/img/logo/preloader/preloader-icon.svg')}}" alt="">
                        </div>
                        <h3 class="tp-preloader-title">AB-MOBILE</h3>
                        <p class="tp-preloader-subtitle">Loading</p>
                    </div>
                    </div>
                </div>  
            </div> -->
            <!-- pre loader area end -->

            <!-- back to top start -->
            <div class="back-to-top-wrapper">
                <button id="back_to_top" type="button" class="back-to-top-btn">
                    <svg width="12" height="7" viewBox="0 0 12 7" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M11 6L6 1L1 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>               
                </button>
            </div>
            <!-- back to top end -->

            <!-- offcanvas area start -->
      <div class="offcanvas__area offcanvas__radius">
         <div class="offcanvas__wrapper">
            <div class="offcanvas__close">
               <button class="offcanvas__close-btn offcanvas-close-btn">
                  <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                     <path d="M11 1L1 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                     <path d="M1 1L11 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                 </svg>
               </button>
            </div>
            <div class="offcanvas__content">
               <div class="offcanvas__top mb-70 d-flex justify-content-between align-items-center">
                  <div class="offcanvas__logo logo">
                     <a href="index.html">
                        <img src="{{asset('frontend/assets/img/logo/logo.svg')}}" alt="logo">
                     </a>
                  </div>
               </div>
               <div class="offcanvas__category pb-40">
                  <button class="tp-offcanvas-category-toggle">
                     <i class="fa-solid fa-bars"></i>
                     All Categories
                  </button>
                  <div class="tp-category-mobile-menu">
                     
                  </div>
               </div>
               <div class="tp-main-menu-mobile fix d-lg-none mb-40"></div>

               <div class="offcanvas__contact align-items-center d-none">
                  <div class="offcanvas__contact-icon mr-20">
                     <span>
                        <img src="{{asset('frontend/assets/img/icon/contact.png')}}" alt="">
                     </span>
                  </div>
                  <div class="offcanvas__contact-content">
                     <h3 class="offcanvas__contact-title">
                        <a href="tel:098-852-987">004524865</a>
                     </h3>
                  </div>
               </div>
               <div class="offcanvas__btn">
                  <a href="contact.html" class="tp-btn-2 tp-btn-border-2">Contact Us</a>
               </div>
            </div>
            <div class="offcanvas__bottom">
               <div class="offcanvas__footer d-flex align-items-center justify-content-between">
                  <div class="offcanvas__currency-wrapper currency">
                     <span class="offcanvas__currency-selected-currency tp-currency-toggle" id="tp-offcanvas-currency-toggle">Currency : USD</span>
                     <ul class="offcanvas__currency-list tp-currency-list">
                        <li>USD</li>
                        <li>ERU</li>
                        <li>BDT </li>
                        <li>INR</li>
                     </ul>
                  </div>
                  <div class="offcanvas__select language">
                     <div class="offcanvas__lang d-flex align-items-center justify-content-md-end">
                        <div class="offcanvas__lang-img mr-15">
                           <img src="assets/img/icon/language-flag.png" alt="">
                        </div>
                        <div class="offcanvas__lang-wrapper">
                           <span class="offcanvas__lang-selected-lang tp-lang-toggle" id="tp-offcanvas-lang-toggle">English</span>
                           <ul class="offcanvas__lang-list tp-lang-list">
                              <li>Spanish</li>
                              <li>Portugese</li>
                              <li>American</li>
                              <li>Canada</li>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="body-overlay"></div>
      <!-- offcanvas area end -->

      <!-- mobile menu area start -->
      <div id="tp-bottom-menu-sticky" class="tp-mobile-menu d-lg-none">
         <div class="container">
            <div class="row row-cols-5">
               <div class="col">
                  <div class="tp-mobile-item text-center">
                     <a href="shop.html" class="tp-mobile-item-btn">
                        <i class="flaticon-store"></i>
                        <span>Store</span>
                     </a>
                  </div>
               </div>
               <div class="col">
                  <div class="tp-mobile-item text-center">
                     <button class="tp-mobile-item-btn tp-search-open-btn">
                        <i class="flaticon-search-1"></i>
                        <span>Search</span>
                     </button>
                  </div>
               </div>
               <div class="col">
                  <div class="tp-mobile-item text-center">
                     <a href="wishlist.html" class="tp-mobile-item-btn">
                        <i class="flaticon-love"></i>
                        <span>Wishlist</span>
                     </a>
                  </div>
               </div>
               <div class="col">
                  <div class="tp-mobile-item text-center">
                     <a href="profile.html" class="tp-mobile-item-btn">
                        <i class="flaticon-user"></i>
                        <span>Account</span>
                     </a>
                  </div>
               </div>
               <div class="col">
                  <div class="tp-mobile-item text-center">
                     <button class="tp-mobile-item-btn tp-offcanvas-open-btn">
                        <i class="flaticon-menu-1"></i>
                        <span>Menu</span>
                     </button>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- mobile menu area end -->

      <!-- search area start -->
      <section class="tp-search-area">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="tp-search-form">
                     <div class="tp-search-close text-center mb-20">
                        <button class="tp-search-close-btn tp-search-close-btn"></button>
                     </div>
                     <form action="#">
                        <div class="tp-search-input mb-10">
                           <input type="text" placeholder="Search for product...">
                           <button type="submit"><i class="flaticon-search-1"></i></button>
                        </div>
                        <div class="tp-search-category">
                           <span>Search by : </span>
                           <a href="#">Men, </a>
                           <a href="#">Women, </a>
                           <a href="#">Children, </a>
                           <a href="#">Shirt, </a>
                           <a href="#">Demin</a>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- search area end -->

      <!-- cart mini area start -->
      <div class="cartmini__area tp-all-font-roboto">
         <div class="cartmini__wrapper d-flex justify-content-between flex-column">
             <div class="cartmini__top-wrapper">
                 <div class="cartmini__top p-relative">
                     <div class="cartmini__top-title">
                         <h4>Shopping cart</h4>
                     </div>
                     <div class="cartmini__close">
                         <button type="button" class="cartmini__close-btn cartmini-close-btn"><i class="fal fa-times"></i></button>
                     </div>
                 </div>
                 <!-- <div class="cartmini__shipping">
                  <p> Free Shipping for all orders over <span>$50</span></p>
                  <div class="progress">
                     <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" data-width="70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                   </div>                   
                 </div> -->
                 <?php 
                  $user_id = Auth::user()->id ?? Null; 
                  $products = DB::table('carts')
                                 ->join('product_color_variants', 'carts.variant_color_id','=','product_color_variants.id')
                                 ->select('carts.*', 'product_color_variants.id as variant_id','product_color_variants.product_id','product_color_variants.color_product_image','product_color_variants.color_name',)
                                 ->where('user_id',$user_id)
                                 ->get();
                 ?>
                <?php
                     $sub_total =0;
                     $total     =0;
                     $price =0;
                     ?>
                 @if(!empty($products) && count($products) > 0)
                 
                 @foreach($products as $product)
                 <?php  
                        $product_name =App\Models\Product::where('id',$product->product_id)->where('status',1)->first();
                        $productSizePrice =App\Models\ProductSizeVariant::where('id',$product->variant_size)->where('status',1)->first();
                        $productColorPrice =App\Models\ProductColorVariant::where('id',$product->variant_color_id)->where('status',1)->first();

                        $price      =$productSizePrice['offer_price']-$productColorPrice['extra_amount'];
                        $sub_total +=$productSizePrice['offer_price']-$productColorPrice['extra_amount'];
                        $total     +=$productSizePrice['offer_price']-$productColorPrice['extra_amount'];
                  ?>
                 <div class="cartmini__widget">
                     <div class="cartmini__widget-item">
                         <div class="cartmini__thumb">
                           <a href="{{url('/product-detail')}}/{{base64_encode($product->id)}}">
                              <img src="{{env('APP_URL')."product"}}/{{$product->color_product_image}}" alt="">
                           </a>
                         </div>
                         <div class="cartmini__content">
                           <h5 class="cartmini__title"><a href="{{url('/product-detail')}}/{{base64_encode($product->variant_id)}}">{{$product_name->name ?? "-"}}</a></h5>
                           <div class="cartmini__price-wrapper">
                            
                              <span class="cartmini__price">&#x20B9;{{$price ?? "-"}}</span>
                           
                              <span class="cartmini__quantity">{{$product->quantity ?? "-"}}</span>
                           </div>
                         </div>
                         <!-- <a href="#" class="cartmini__del"><i class="fa-regular fa-xmark"></i></a> -->
                     </div>
                 </div>

                
                 @endforeach
                 @else
                 <!-- for wp -->
                 <!-- if no item in cart -->
                 <div class="cartmini__empty text-center d-none">
                     <img src="{{asset('frontend/assets/img/product/cartmini/empty-cart.png')}}" alt="">
                     <p>Your Cart is empty</p>
                     <a href="{{url('/products')}}" class="tp-btn">Go to Shop</a>
                 </div>
                 @endif
                
             </div>
             <div class="cartmini__checkout">
                 <div class="cartmini__checkout-title mb-30">
                     <h4>Subtotal:</h4>
                     <span>&#x20B9; {{number_format($sub_total,2)}}</span>
                 </div>
                 <div class="cartmini__checkout-btn">
                     <a href="{{url('/cart')}}" class="tp-btn mb-10 w-100"> view cart</a>
                     <a href="{{url('/checkout')}}" class="tp-btn tp-btn-border w-100"> checkout</a>
                 </div>
             </div>
         </div>
     </div>
     <!-- cart mini area end -->
     
       @include('frontend.layouts.inner_header')
    
   
     <main>
      @yield('content')
     </main> 
      @include('frontend.layouts.footer')
       <!-- JS here -->
       <script src="{{asset('frontend/assets/js/vendor/jquery.js')}}"></script>
      <script src="{{asset('frontend/assets/js/vendor/waypoints.js')}}"></script>
      <script src="{{asset('frontend/assets/js/bootstrap-bundle.js')}}"></script>
      <script src="{{asset('frontend/assets/js/meanmenu.js')}}"></script>
      <script src="{{asset('frontend/assets/js/swiper-bundle.js')}}"></script>
      <script src="{{asset('frontend/assets/js/slick.js')}}"></script>
      <script src="{{asset('frontend/assets/js/range-slider.js')}}"></script>
      <script src="{{asset('frontend/assets/js/magnific-popup.js')}}"></script>
      <script src="{{asset('frontend/assets/js/nice-select.js')}}"></script>
      <script src="{{asset('frontend/assets/js/purecounter.js')}}"></script>
      <script src="{{asset('frontend/assets/js/countdown.js')}}"></script>
      <script src="{{asset('frontend/assets/js/wow.js')}}"></script>
      <script src="{{asset('frontend/assets/js/isotope-pkgd.js')}}"></script>
      <script src="{{asset('frontend/assets/js/imagesloaded-pkgd.js')}}"></script>
      <script src="{{asset('frontend/assets/js/ajax-form.js')}}"></script>
      <script src="{{asset('frontend/assets/js/main.js')}}"></script>

      <!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />
      <!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>
        $(document).ready(function() {
            toastr.options.timeOut = 5000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>
   <body>
</html>