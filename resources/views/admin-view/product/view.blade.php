@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Product Information</h5>
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
                                            <img src="{{env('APP_URL')."product"}}/{{$record->image}}" class="img-fluid"
                                                alt="">
                                            @else
                                            <img src="{{asset('admin_site/assets/images/profile/4.jpg')}}" class="img-fluid"
                                                alt="">
                                            @endif    
                                        </td>
                                        <br> 
                                        <td>
                                            Name : {{$record->name}}
                                        </td>
                                        <br> 
                                        <td>
                                            Category Name : {{$record->category->title}}
                                        </td>
                                        <br> 
                                        <td>
                                            Price : {{$record->price}}
                                        </td>
                                        <br> 
                                        <td>
                                            Discount : {{$record->discount}}
                                        </td>
                                        <br> 
                                        <td>
                                            Quantity : {{$record->quantity}}
                                        </td>
                                        <br> 
                                        <td>
                                            Product Type :
                                             
                                            @if($record->producy_type==1)
                                              {{'Default'}}
                                            @elseif($record->producy_type==2)
                                              {{'Featured'}}
                                            @elseif($record->producy_type==3)
                                              {{'Hot'}}
                                            @else
                                              {{'New '}}
                                            @endif
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