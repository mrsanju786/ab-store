@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Option</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/option/store')}}" method="POST" enctype="multipart/form-data">
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
                                                <option value="64" >64</option>
                                                <option value="128" >128</option>
                                                <option value="256" >256</option>
                                                <option value="512" >512</option>
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
                                                <option value="GB" >GB</option>
                                                
                                            </select>

                                            @if ($errors->has('product_type'))
                                            <span class="text-danger">{{ $errors->first('product_type') }}</span>
                                            @endif 
                                        </div>
                                        
                                    </div>
                                     <br>
                                      
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

