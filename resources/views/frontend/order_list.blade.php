@extends('frontend.layouts.inner_main')
@section('title')
<title>Demo | Order List</title>
@endsection
@section('content')
<!-- breadcrumb area start -->
<section class="breadcrumb__area include-bg pt-95 pb-90">
            <div class="container">
               <div class="row">
                  <div class="col-xxl-12">
                     <div class="breadcrumb__content p-relative z-index-1">
                        <h3 class="breadcrumb__title">Order List</h3>
                        <div class="breadcrumb__list">
                           <span><a href="{{url('/home')}}">Home</a></span>
                           <span>Order List</span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- breadcrumb area end -->
         <section class="tp-order-area pb-160">
            <div class="container">
               <div class="">
                  <div class="row gx-0">
                     <div class="col-lg-6">
                        <div class="tp-order-details" >
                           <div class="tp-order-details-top text-center mb-70">
                              <div class="tp-order-details-icon">
                                    <table class="table" style="padding: .4rem;font-size: 15px;">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Order Number</th>
                                            <th scope="col">Order Date</th>
                                            <th scope="col">Delivery Date</th>
                                            <th scope="col">Total Amount(Rs)</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(!empty($orders))
                                       
                                        @foreach($orders as $key =>$order)
                                        <?php $i =0;?>
                                        <tr>
                                            <th scope="row">{{$i+1}}</th>
                                            <td><a href="{{url('/order-detail')}}/{{base64_encode($order->id)}}">{{$order->unique_no ?? "-"}}</a></td>
                                            <td>{{$order->date ?? "-"}}</td>
                                            <td>{{$order->delivery_date ?? "-"}}</td>
                                            <td>{{$order->order_amount ?? "-"}}</td>
                                            <td>Pending</td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                     </div>
                    
                  </div>
               </div>
            </div>
         </section>
@endsection  