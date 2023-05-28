@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Order</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Order List</h5>
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
                                        <th>User Name</th>
                                        <th>Order Id</th>
                                        <th>Order Date</th>
                                        <th>Delivery Date</th>
                                        <th>Payment Method</th>
                                        <th>Total Amount</th>
                                        <th>Status</th>
                                        <!-- <th>Action</th> -->
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($orders as $value)
                                    <tr>
                                        <?php $user = App\Models\User::where('id',$value->user_id)->first();  ?>
                                        <td>
                                            {{$user->first_name.' '.$user->last_name ?? "-"}}
                                        </td>

                                        <td>
                                           {{$value->unique_no ?? "-"}}
                                        </td>

                                        <td>
                                            {{$value->date ?? "-"}}  
                                        </td>
                                        <td>
                                           {{$value->delivery_date ?? "-"}}  
                                        </td>

                                        <td>
                                           {{$value->payment_method ?? "-"}}  
                                        </td>
                                        <td>
                                        &#x20B9;{{$value->order_amount ?? "-"}}  
                                        </td>
                                        <td>
                                           Pending
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