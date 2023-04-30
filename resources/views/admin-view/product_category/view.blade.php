@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Category</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Category Information</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                           
                                <div class ="">
                            
                                        <td>Image :
                                            @if(!empty($record->image))
                                            <img src="{{env('APP_URL')."category"}}/{{$record->image}}" class="img-fluid"
                                                alt="" width="50px" height="50px">
                                            @else
                                            <img src="{{asset('admin_site/assets/images/profile/4.jpg')}}" class="img-fluid"
                                                alt="">
                                            @endif    
                                        </td>
                                        <br> 
                                        <td>
                                            Title : {{$record->title}}
                                        </td>
                                        <br> 
                                        
                                        <br> 
                                        <td>
                                            Status :{{$record->status==1 ? "Active" : "InActive"}}
                                        </td>
                                        
                                </div>
                               
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection