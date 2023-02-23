@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div>
<h1>All Counter</h1>
@foreach($counter as $counters)
<a href="{{route('all_menu', [base64_encode($counters->id)])}}">{{$counters->counter_name}}</a>
@endforeach
</div>

@endsection

@section('scripts')

@endsection