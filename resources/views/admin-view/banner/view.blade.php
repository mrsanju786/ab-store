@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Banner</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Banner Information</h5>
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
                                            <img src="{{asset('storage/upload/banner')}}/{{$record->image}}" class="img-fluid"
                                                alt="">
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
                                        <td>
                                            Description :{!! $record->description !!}
                                        </td>
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