@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div>
<h1>All Menu</h1>
@foreach($menu as $menus)
<a href="#">{{$menus->menu_name}}</a>
@endforeach
</div>

@endsection

@section('scripts')

@endsection