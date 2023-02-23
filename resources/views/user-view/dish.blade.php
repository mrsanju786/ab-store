@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div>
    @foreach($dish as $dish_data)
        <h1>{{$dish_data->dish_name}}</h1>
        <h5>{{$dish_data->dish_price}}</h5>
        <h5>{{$dish_data->dish_code}}</h5>
        <a href="{{route('add-to-cart', [base64_encode($dish_data->id)])}}" class="btn btn-lg btn-primary">Add to Cart</a>
    @endforeach
</div>

@endsection

@section('scripts')

@endsection