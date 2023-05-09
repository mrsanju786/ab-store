@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Product Color List</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                            <table class="table table-1d all-package" id="example">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Size (GB)</th>
                                        <th>Base Price</th>
                                        <th>Offer Price</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($product as $value)
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)"> {{$value->product->name ?? "-"}}</a>
                                        </td>
                                   
                                        <td>
                                            <a href="javascript:void(0)">{{$value->size ?? "-"}}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)">{{$value->actual_price ?? "-"}}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)">{{$value->offer_price ?? "-"}}</a>
                                        </td>
                                        <td>
                                        @if($value->status==1)
                                            <div >
                                              <a href="{{url('admin/variantsize/inactive')}}/{{base64_encode($value->id)}}" class="btn btn-success">Active</a>
                                            </div>
                                            @else
                                            <div >
                                              <a href="{{url('admin/variantsize/active')}}/{{base64_encode($value->id)}}"  class="btn btn-danger">InActive</a>
                                            </div>
                                            @endif
                                        </td>
                                        <td>
                                            <ul>
                                                <!-- <li>
                                                    <a href="{{url('admin/color/view')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </li> -->

                                                <li>
                                                    <a href="{{url('admin/variantsize/edit')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-pencil"></span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{url('admin/variantsize/delete')}}/{{base64_encode($value->id)}}">
                                                        <i class="far fa-trash-alt theme-color"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                </tbody>
                                @php($i++)
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

                <!-- <div class="pagination-box">
                    <nav class="ms-auto me-auto " aria-label="...">
                        <ul class="pagination pagination-primary">
                            
                            <li class="page-item active">
                                <a class="page-link" href="javascript:void(0)"></a>
                            </li>

                           
                        </ul>
                    </nav>
                </div> -->
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


</div>

@endsection