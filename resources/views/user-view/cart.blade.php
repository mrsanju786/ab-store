@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

@if($get_cart)
<div>
    @php
    $total_price = 0;
    @endphp
    @foreach($get_cart as $cart_data)
        <div class="row">
            <div class="col-md-1">
            <img style="width: 60px;" src="{{asset('storage/upload/dish')}}/{{$cart_data->dish->dish_images}}">
            </div>
            <div class="col-md-11">
                <p>{{$cart_data->dish->dish_name}}</p>
                <p>{{$cart_data->dish_price}}  x  {{$cart_data->quantity}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = {{$cart_data->total_price}}</p>
            </div>
        </div>
        @php
        $total_price += $cart_data->total_price;
        @endphp
    @endforeach

    <br>
    <br>
    <br>
    <br>
    <div class="row">
        <div class="col-md-6"><h2>Cart Total Value {{$total_price}}</h2></div>
        <div class="col-md-6"><a href="{{route('place-order')}}" class="btn btn-lg btn-primary">place order</a></div>
    </div>
    
</div>
@else
<div>
    <h1>Your Cart is empty</h1>
</div>
@endif

@endsection

@section('scripts')

@endsection