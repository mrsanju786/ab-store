@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div>
    @foreach($category_dish as $dish_data)
        <a href="{{route('dish', [base64_encode($dish_data->id)])}}"><h1>{{$dish_data->dish_name}}</h1></a>
    @endforeach
</div>

@endsection

@section('scripts')

@endsection