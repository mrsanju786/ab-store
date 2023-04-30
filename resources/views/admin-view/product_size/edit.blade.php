@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Edit Size</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/variantsize/update')}}/{{base64_encode($productSize->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Size Information</h5>
                            </div>
                            <div class="mb-4 row align-items-center">
                                        <label class="col-sm-2 col-form-label form-label-title">Product
                                            Name</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_id">
                                                
                                                <option value="0">Select Product</option>
                                                @foreach($product as $value)
                                                <option value="{{$value->id}}" {{($value->id== $productSize->product_id)? 'selected':''}}>{{$value->name}}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                          Size</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product color" name = "size" value="{{$productSize->size}}">
                                             
                                        </div>
                                        
                                        @if ($errors->has('size'))
                                            <span class="text-danger">{{ $errors->first('size') }}</span>
                                        @endif    
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Base Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product base price" name = "actual_price" value="{{$productSize->actual_price}}">
                                             
                                        </div>
                                        
                                        @if ($errors->has('actual_price'))
                                            <span class="text-danger">{{ $errors->first('actual_price') }}</span>
                                        @endif    
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                           Offer Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product extra price" name = "offer_price" value="{{$productSize->offer_price}}" min="0">
                                             
                                        </div>
                                        
                                        @if ($errors->has('offer_price'))
                                            <span class="text-danger">{{ $errors->first('offer_price') }}</span>
                                        @endif    
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

