@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div>
    @foreach($category as $cat_data)
        <a href="{{route('category-dish', [base64_encode($cat_data->id)])}}"><h1>{{$cat_data->category_name}}</h1></a>
    @endforeach
</div>

@endsection

@section('scripts')

@endsection