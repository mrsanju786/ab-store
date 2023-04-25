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
                                            Title</label>
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
                                            Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product Name" name = "price" value="{{old('price')}}">
                                             
                                                @if($errors->has('price'))
                                                    <span class="error">{{ $errors->first('price') }}</span>
                                                @endif    
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Discount</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product Discount" name = "discount" value="{{old('discount')}}">
                                             
                                                @if ($errors->has('discount'))
                                                    <span class="error">{{ $errors->first('discount') }}</span>
                                                @endif    
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product Quantity" name = "quantity" value="{{old('quantity')}}">
                                             
                                                @if ($errors->has('quantity'))
                                                    <span class="error">{{ $errors->first('quantity') }}</span>
                                                @endif    
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
                                                 name ="file" multiple>
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

