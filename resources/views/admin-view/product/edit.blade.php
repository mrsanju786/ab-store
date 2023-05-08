@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Product</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Edit New Product</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/product/update')}}/{{base64_encode($product->id)}}" method="POST" enctype="multipart/form-data">
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
                                                placeholder="Product Name" name = "name" value="{{$product->name}}">
                                             
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
                                                <option value="{{$value->id}}" {{($value->id == $product->category_id)? 'selected':''}}>{{$value->title}}</option>
                                                @endforeach
                                              
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Price</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product Name" name = "price" value="{{$product->price}}">
                                             
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
                                                placeholder="Product Discount" name = "discount" value="{{$product->discount}}">
                                             
                                                @if ($errors->has('discount'))
                                                    <span class="error">{{ $errors->first('discount') }}</span>
                                                @endif    
                                        </div>
                                    </div>
                                    <!-- <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Quantity</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Product Quantity" name = "quantity" value="{{$product->quantity}}">
                                             
                                                @if ($errors->has('quantity'))
                                                    <span class="error">{{ $errors->first('quantity') }}</span>
                                                @endif    
                                        </div>
                                    </div> -->
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Product Type</label>
                                           
                                        <div class="col-sm-10">
                                            <select class="js-example-basic-single w-100" name="product_type">
                                                <option >Select Type</option>
                                                <option value="1" {{($product->product_type==1)? 'selected':''}}>Default</option>
                                                <option value="2" {{($product->product_type==2)? 'selected':''}}>Featured</option>
                                                <option value="3" {{($product->product_type==3)? 'selected':''}}>Hot</option>
                                                <option value="4" {{($product->product_type==4)? 'selected':''}}>New </option>
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
                                                <textarea name ="description" id="editor" placeholder ="Description">{{$product->description}}</textarea>
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
                                                 <img width="155" src="{{env('APP_URL')."product"}}/{{$product->image}}">
                                                 @if ($errors->has('file'))
                                                    <span class="error">{{ $errors->first('file') }}</span>
                                                @endif 
                                                <input type="hidden" class="form-control form-choose" placeholder="Upload Product Image"
                                                title="Choose an Image please" name="old_image" value="{{$product->image}}">
                                            
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

