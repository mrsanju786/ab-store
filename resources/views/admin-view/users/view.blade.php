@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Dashboard</title>
@endsection
@section('content')

<!--begin::Tables Widget 9-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">User Details</span>
        </h3>

        
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <div class="Columns">
                <td>First Name : {{$record->first_name}}</td><br>
                <td>Last Name  : {{$record->last_name}}</td><br>
                <td>Email      : {{$record->email}}</td><br>
                <td>Phone      : {{$record->phone}}</td><br>
                <td>status     : {{$record->status==1 ? "Active" :"Inactive"}}</td>
            </div>   
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 9-->

@endsection

@section('scripts')
@endsection