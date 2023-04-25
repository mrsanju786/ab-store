@extends('admin-view.layouts.main')
@section('title')
<title>Demo | User</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>User List</h5>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Mobile Number</th>
                                        <!-- <th>Status</th> -->
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($user as $value)
                                    <tr>
                                        
                                        <td>
                                            <a href="javascript:void(0)">{{$value->first_name.' '.$value->last_name}}</a>
                                        </td>

                                        <td>
                                            <a href="javascript:void(0)">{{$value->email ?? "-"}}</a>
                                        </td>

                                        <td>
                                          <a href="javascript:void(0)">{{$value->phone}}</a>
                                           
                                        </td>
                                        <!-- <td>
                                            <a href="javascript:void(0)">{{$value->status==1 ? "Active" : "InActive"}}</a>
                                        </td> -->

                                        
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