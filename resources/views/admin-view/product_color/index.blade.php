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
                                        <th>Color Name</th>
                                        <th>Color Code</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($product as $value)
                                    <tr>
                                        <td>
                                            <a href="javascript:void(0)">{{$value->product->name ?? "-"}}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)">{{$value->color_name ?? "-"}}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)">{{$value->color_code ?? "-"}}</a>
                                        </td>
                                        <td>
                                            <a href="javascript:void(0)">{{$value->status==1 ? "Active" : "InActive"}}</a>
                                        </td>
                                        <td>
                                            <ul>
                                                <!-- <li>
                                                    <a href="{{url('admin/color/view')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </li> -->

                                                <li>
                                                    <a href="{{url('admin/variantcolor/edit')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-pencil"></span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{url('admin/variantcolor/delete')}}/{{base64_encode($value->id)}}">
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