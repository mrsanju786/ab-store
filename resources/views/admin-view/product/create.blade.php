@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Product</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/product/store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product Name" name = "name" value="{{old('name')}}">
                                             
                                                @if ($errors->has('name'))
                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Product
                                            Category</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="category_id">
                                                
                                                <option value="0">Select Category</option>
                                                @foreach($category as $value)
                                                <option value="{{$value->id}}">{{$value->title}}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Product Type</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_type">
                                                <option >Select Type</option>
                                                <option value="1" >Default Category</option>
                                                <option value="2" >Featured Category</option>
                                                <option value="3" >Hot Category</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="row">
                                            <label class="form-label-title col-sm-2 mb-0">Product
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea name ="description" id="editor" placeholder ="Description">{{old('description')}}</textarea>
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
                                                 name ="image" >
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

