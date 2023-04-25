@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Banner</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Edit New Banner</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/banner/update')}}/{{base64_encode($banner->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Banner Information</h5>
                            </div>

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Title</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Banner Name" name = "title" value="{{$banner->title}}">
                                             
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
                                <h5>Description</h5>
                            </div>

                            <!-- <form class="theme-form theme-form-2 mega-form"> -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-2 mb-0">Product
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea name ="description" id="editor" placeholder ="Description">{{$banner->description}}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="error">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
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
                                                 <img width="155" src="{{asset('storage/app/public/upload/banner')}}/{{$banner->image}}">
                                                 @if ($errors->has('file'))
                                                    <span class="error">{{ $errors->first('file') }}</span>
                                                @endif 
                                                <input type="hidden" class="form-control form-choose" placeholder="Upload Product Image"
                                                title="Choose an Image please" name="old_image" value="{{$banner->image}}">
                                            
                                        </div>
                                    </div>

                                </div>
                            <!-- </form> -->
                        </div>
                    </div>
                    <div class="text-center" >
                        <button class=" btn btn-success" type="submit" >
                            <span>Update</span>
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

