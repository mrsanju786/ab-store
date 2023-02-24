@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

@if(!$get_cart->isEmpty())
<div>
    @php
    $total_price = 0;
    @endphp
    @foreach($get_cart as $cart_data)
        <div class="row">
            {{-- <div class="col-md-1">
            <img style="width: 60px;" src="{{asset('storage/upload/dish')}}/{{$cart_data->dish->dish_images}}">
            </div>
            <div class="col-md-11">
                <p>{{$cart_data->dish->dish_name}}</p>
                <p>{{$cart_data->dish_price}}  x  {{$cart_data->quantity}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = {{$cart_data->total_price}}</p>
            </div> --}}
        </div>
        @php
        $total_price += $cart_data->total_price;
        @endphp
    @endforeach
    {{-- <br /><br /><br /><br /> --}}
    {{-- <div class="row">
        <div class="col-md-6"><h2>Cart Total Value {{$total_price}}</h2></div>
        <div class="col-md-6"><a href="{{route('place-order')}}" class="btn btn-lg btn-primary">place order</a></div>
    </div>     --}}
</div>
@else
<div>
    <h1>Your Cart is empty</h1>
</div>
@endif
{{-- 
<br /><br /><br /><br /> --}}

<div class="row pt-5"  >
    <!--begin::main-->
        <div class="col-lg-12 col-12"> 
            <div class="row">               
                <div class="col-md-12 mx-auto">
                    <div class="card card-flush h-md-100" id="kt_modal_add_role">
                        <div class="row card-header">
                            <div class="col-md-12 mx-auto card">
                                @if($get_cart)
                                @php
                                $total_price = 0;
                                @endphp
                                @foreach($get_cart as $cart_data)

                                <!--begin::Row-->
                                <div class="row gx-9 h-100">   
                                    <div class="col-md-12">

                                        <div class="row">
                                            <!--begin::Col-->
                                                <div class="col-lg-2 pt-md-5">
                                                    <div>
                                                        <img src="{{asset('storage/upload/dish')}}/{{$cart_data->dish->dish_images}}" class="img-fluid w-100 rounded"> 
                                                    </div>
                                                </div>
                                                <!--end::Col--> 

                                                <!--begin::Col-->
                                                <div class="col-lg-10 pt-md-5">
                                                    <div class="counter-name fw-bold">{{$cart_data->dish->dish_name}}</div>
                                                    <div class="pt-5">
                                                        <div class="d-flex justify-content-start">
                                                            <div class="counter-price">
                                                                {{$cart_data->dish_price}}  x {{$cart_data->quantity}}
                                                            </div>
                                                            <div class="counter-price"> = {{$cart_data->total_price}}</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Col-->
                                        </div>
                                        

                                    </div>  
                                    
                                  
                                    {{--   --}}
                                </div>
                                <!--end::Row-->

                                @php
                                $total_price += $cart_data->total_price;
                                @endphp
                                @endforeach


                                <!--begin::Row-->
                                <div class="row gx-9 h-100 mt-5">                        
                                    <!--begin::Col-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pt-md-5">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <h2>Cart Total Value {{$total_price}}</h2>
                                                </div>
                                            </div> 
                                        </div>
                                    </div>
                                    <!--end::Col--> 

                                    <!--begin::Col-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pt-md-5 mb-10">
                                        <div class="">
                                            <div class="row">
                                                <div class="col-md-6"><a href="{{route('place-order')}}" class="btn btn-lg btn-primary">place order</a></div>
                                            </div>  
                                        </div>
                                    </div>
                                    <!--end::Col--> 
                                </div>
                                <!--end::Row--> 

                                @else
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pt-md-5">
                                        <h1>Your Cart is empty</h1>
                                    </div>
                                    <!--end::Col-->                                     
                                </div>
                                @endif                              
                            </div>
                            {{-- <div class="col-md-12 mx-auto">
                                <!--begin::menu-->
                                <div class="mt-5 d-flex justify-content-start">
                                    <!--begin::Card body-->
                                    <div class="card-body ">                        
                                        <!--begin::Row-->
                                        <div class="row gx-9 h-100">                        
                                            <!--begin::Col-->
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 pt-md-5">
                                                <div class="card counter-card text-center">
                                                    <div class="pt-4">
                                                        <img src="{{asset('admin_site/assets/media/product-new/card-1.png')}}" class="img-fluid  w-50">                                        
                                                    </div>                                    
                                                    <div class="card-body pt-7">
                                                        <div class="counter-name">jha dfskhasdkfjl</div>               
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Col--> 
                                        </div>
                                        <!--end::Row-->                            
                                    </div>
                                    <!--end::Card body--> 
                                </div>
                                <!--end::menu-->
                                </div> --}}
                        </div>
                    </div>                
                </div>
            </div>
        </div>
    <!--end::main-->
</div>

@endsection
@section('scripts')
@endsection