@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Color</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/variantcolor/store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Color Information</h5>
                            </div>

                                <div class="row">

                                <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Product
                                            Name</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_id">
                                                
                                                <option value="0" disabled>Select Product</option>
                                                @foreach($product as $value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Color Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product color" name = "color_name" value="{{old('color_name')}}">
                                                @if ($errors->has('color_name'))
                                                    <span class="text-danger">{{ $errors->first('color_name') }}</span>
                                                @endif    
                                        </div>
                                        
                                       
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Color Code</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product color" name = "color_code" value="{{old('color_code')}}">
                                                @if ($errors->has('color_code'))
                                                    <span class="text-danger">{{ $errors->first('color_code') }}</span>
                                                @endif    
                                        </div>
                                        
                                        
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Extra Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product extra price" name = "extra_amount" value="{{old('extra_amount')}}" min="0">
                                                @if ($errors->has('extra_amount'))
                                                    <span class="text-danger">{{ $errors->first('extra_amount') }}</span>
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
                                                 name ="file" >
                                                 @if ($errors->has('file'))
                                                    <span class="text-danger">{{ $errors->first('file') }}</span>
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

@endsection

