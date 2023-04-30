@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Edit Option</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/option/update')}}/{{base64_encode($productOption->id)}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Product Option Information</h5>
                            </div>

                                <div class="row">
                                <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Product Size</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_size">
                                                <option disabled>Select Size</option>
                                                <option value="64"  {{$productOption->product_size == 64 ? 'selected':''}}>64</option>
                                                <option value="128"  {{$productOption->product_size == 128 ? 'selected':''}}>128</option>
                                                <option value="256"  {{$productOption->product_size == 256 ? 'selected':''}}>256</option>
                                                <option value="512"  {{$productOption->product_size == 512 ? 'selected':''}}>512</option>
                                            </select>
                                            @if ($errors->has('product_size'))
                                            <span class="text-danger">{{ $errors->first('product_size') }}</span>
                                           @endif    
                                        </div>
                                    </div>
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Product Type</label>
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_type">
                                                <option disabled>Select Type</option>
                                                <option value="GB" {{($productOption->product_type == 'GB')? 'selected':''}}>GB</option>
                                                
                                            </select>
                                            @if ($errors->has('product_type'))
                                            <span class="text-danger">{{ $errors->first('product_type') }}</span>
                                            @endif    
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

