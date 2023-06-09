@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Category</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Category</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/category/store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Category Information</h5>
                            </div>

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Banner Name" name = "title" value="{{old('title')}}">
                                             
                                                @if ($errors->has('title'))
                                                    <span class="error">{{ $errors->first('title') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                </div>
                            <!-- </form> -->
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Image</h5>
                            </div>

                            <!-- <form class="theme-form theme-form-2 mega-form"> -->
                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="col-sm-2 col-form-label form-label-title">Images</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-choose" type="file"
                                                 name ="file">
                                                 @if ($errors->has('file'))
                                                    <span class="error">{{ $errors->first('file') }}</span>
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

