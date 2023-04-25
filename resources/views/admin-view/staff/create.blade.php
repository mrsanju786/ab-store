@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Staff</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Staff</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/staff/store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Staff Information</h5>
                            </div>

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            First Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="First Name" name = "first_name" value="{{old('first_name')}}">
                                             
                                                @if ($errors->has('first_name'))
                                                    <span class="error">{{ $errors->first('first_name') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Last Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Last Name" name = "last_name" value="{{old('last_name')}}">
                                             
                                                @if ($errors->has('last_name'))
                                                    <span class="error">{{ $errors->first('last_name') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Email</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="email"
                                                placeholder="Email" name = "email" value="{{old('email')}}">
                                             
                                                @if ($errors->has('email'))
                                                    <span class="error">{{ $errors->first('email') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Mobile Number</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder=" Mobile Number" name = "phone" value="{{old('phone')}}">
                                             
                                                @if ($errors->has('phone'))
                                                    <span class="error">{{ $errors->first('phone') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password"
                                                placeholder="Password" name = "password" value="{{old('password')}}">
                                             
                                                @if ($errors->has('password'))
                                                    <span class="error">{{ $errors->first('password') }}</span>
                                                @endif    
                                        </div>
                                    </div>


                                </div>
                            <!-- </form> -->
                        </div>
                    </div>

                    <div class="text-center" >
                        <button class=" btn btn-success" type="submit" >
                            <span>Submit</span>
                        </button>
                    </div>
                    <br>
                </div>
            </form>    
            </div>
        </div>
    </div>
</div>

<style>
.error{
    color:red;
}
</style>
@endsection

