@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Contact</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Contact Details</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                           
                                <div class ="">
                            
                                        <td>
                                            Title : {{$record->name}}
                                        </td>
                                        <br> 
                                        <td>
                                            Email :{!! $record->email !!}
                                        </td>
                                        <br>
                                        <td>
                                            Subject :{!! $record->subject !!}
                                        </td>
                                        <br>
                                        <td>
                                            Message :{!! $record->message !!}
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