@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Edit New Color</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/variantcolor/update')}}/{{base64_encode($productColor->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Information</h5>
                            </div>
                            <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Product
                                            Name</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_id">
                                                
                                                <option value="0">Select Product</option>
                                                @foreach($product as $value)
                                                <option value="{{$value->id}}" {{($value->id == $productColor->product_id)? 'selected':''}}>{{$value->name}}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Color Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product color" name = "color_name" value="{{$productColor->color_name}}">
                                             
                                        </div>
                                        
                                        @if ($errors->has('color_name'))
                                            <span class="text-danger">{{ $errors->first('color_name') }}</span>
                                        @endif    
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Color Code</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product code" name = "color_code" value="{{$productColor->color_code}}">
                                             
                                        </div>
                                        
                                        @if ($errors->has('color_code'))
                                            <span class="text-danger">{{ $errors->first('color_code') }}</span>
                                        @endif    
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Extra Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product extra price" name = "extra_amount" value="{{$productColor->extra_amount}}" min="0">
                                             
                                        </div>
                                        
                                        @if ($errors->has('extra_amount'))
                                            <span class="text-danger">{{ $errors->first('extra_amount') }}</span>
                                        @endif    
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
                                                 name ="file" >
                                                 <img width="155" src="{{env('APP_URL')."product"}}/{{$productColor->color_product_image}}">
                                                 @if ($errors->has('file'))
                                                    <span class="error">{{ $errors->first('file') }}</span>
                                                @endif 
                                                <input type="hidden" class="form-control form-choose" placeholder="Upload Product Image"
                                                title="Choose an Image please" name="old_image" value="{{$productColor->color_product_image}}">
                                            
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

@endsection

