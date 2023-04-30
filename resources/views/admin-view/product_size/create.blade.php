@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Size</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/variantsize/store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Size Information</h5>
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
                                            @if ($errors->has('product_id'))
                                                <span class="text-danger">{{ $errors->first('product_id') }}</span>
                                            @endif  
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Size</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product size" name = "size" value="{{old('size')}}">
                                                @if ($errors->has('size'))
                                                    <span class="text-danger">{{ $errors->first('size') }}</span>
                                                @endif  
                                        </div>
                                        
                                         
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Base Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product base price" name = "actual_price" value="{{old('actual_price')}}">
                                              
                                        @if ($errors->has('actual_price'))
                                            <span class="text-danger">{{ $errors->first('actual_price') }}</span>
                                        @endif  
                                        </div>
                                         
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Offer Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product offer price" name = "offer_price" value="{{old('offer_price')}}" min="0">
                                                @if ($errors->has('offer_price'))
                                                    <span class="text-danger">{{ $errors->first('offer_price') }}</span>
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

