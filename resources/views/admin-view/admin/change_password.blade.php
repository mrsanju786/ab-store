@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Admin</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Change Passowrd</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/update-password')}}/{{base64_encode($user->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Change Passowrd Information</h5>
                            </div>

                                <div class="row">
                                    
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

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Confirm Password</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="password"
                                                placeholder="Confirm Password" name = "confirm_password" value="{{old('confirm_password')}}">
                                             
                                                @if ($errors->has('confirm_password'))
                                                    <span class="error">{{ $errors->first('confirm_password') }}</span>
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

