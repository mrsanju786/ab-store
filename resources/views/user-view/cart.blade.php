@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div class="row pt-5">
    <!--begin::main-->
        <div class="col-lg-12 col-12"> 
            <div class="row">               
                <div class="col-md-12 mx-auto">
                    <div class="card card-flush h-md-100" id="kt_modal_add_role">
                        <div class="row card-header">
                            <div class="col-md-12 mx-auto card">
                                @if(!$get_cart->isEmpty())
                                @php
                                $total_price = 0;
                                @endphp
                                @foreach($get_cart as $cart_data)

                                <!--begin::Row-->
                                <div class="row gx-9 h-100">   
                                    <div class="col-md-12 pb-5 bg-secondary rounded mt-5">
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
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="d-flex justify-content-start">
                                                    <div class="h2">Cart Total Value</div>
                                                    <div class="h2 px-4">{{$total_price}}</div>
                                                </div>
                                               
                                            </div>
                                        </div> 
                                    </div>
                                    <!--end::Col--> 

                                    <!--begin::Col-->
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pt-md-5 mb-10">
                                        <div class="row">
                                            <div class="col-md-6"><a href="{{route('place-order')}}" class="btn btn-lg btn-primary">Place Order</a></div>
                                        </div>
                                    </div>
                                    <!--end::Col--> 
                                </div>
                                <!--end::Row--> 

                                @else
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bg-secondary rounded my-5">
                                        <div class="h1 py-5">Your Cart Is Empty</div>
                                    </div>
                                    <!--end::Col-->                                     
                                </div>
                                @endif                              
                            </div>                            
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