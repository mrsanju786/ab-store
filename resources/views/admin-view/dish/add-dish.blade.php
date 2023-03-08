@extends('admin-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')


<div class="row">

    <div class="col-lg-6 col-12"> 
        <div class="row">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Add Dish</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Form-->
                        <form action="{{route('create-dish')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Dish Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Dish Name"
                                        name="dish_name">
                                    <!--end::Input-->
                                    @if($errors->has('dish_name'))
                                    <span class="text-danger">{{ $errors->first('dish_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Dish Price</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" placeholder="Enter Dish Price"
                                        name="dish_price">
                                    <!--end::Input-->
                                    @if($errors->has('dish_price'))
                                    <span class="text-danger">{{ $errors->first('dish_price') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span>Dish Image</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid" placeholder="Upload Dish Image"
                                    title="Choose an Image please"  name="dish_image">
                                    <!--end::Input-->
                                    @if($errors->has('dish_image'))
                                    <span class="text-danger">{{ $errors->first('dish_image') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!-- dish code start -->
                                @php
                                $code = "D-".uniqid();
                                @endphp
                                <input type="hidden" class="form-control form-control-solid" name="dish_code" value="{{$code}}">
                                <!-- dish code end -->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Dish Hsn</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input input type="number" class="form-control form-control-solid" placeholder="Dish Hsn"
                                        name="dish_hsn">
                                    <!--end::Input-->
                                    @if($errors->has('dish_hsn'))
                                    <span class="text-danger">{{ $errors->first('dish_hsn') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Counter</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="counter_id" id="counter_id"  data-control="select2" >
                                        <option value="">Select Counter</option>
                                        @foreach($counter as $counters)
                                        <option value="{{$counters->id}}">{{$counters->counter_name}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('counter_id'))
                                    <span class="text-danger">{{ $errors->first('counter_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Category</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="category_id" id="category_id"  data-control="select2" >
                                        <option value="">Select Category</option>

                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('category_id'))
                                    <span class="text-danger">{{ $errors->first('category_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Tax</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="tax_id" id="tax_id"  data-control="select2" >
                                        <option value="">Select Tax</option>

                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('tax_id'))
                                    <span class="text-danger">{{ $errors->first('tax_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span>Select Discount</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="discount_id" id="discount_id" data-control="select2">
                                        <option value="">Select Discount</option>
                                        @foreach($discount as $discounts)
                                        <option value="{{$discounts->id}}">{{$discounts->discount_name}}</option>
                                        @endforeach
                                  
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('discount_id'))
                                    <span class="text-danger">{{ $errors->first('discount_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span>Stock Quantity</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input input type="number" class="form-control form-control-solid" placeholder="Stock Quantity"
                                        name="stock_quantity">
                                    <!--end::Input-->
                                    @if($errors->has('stock_quantity'))
                                    <span class="text-danger">{{ $errors->first('stock_quantity') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Tax Inclusive</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-check-input" name="tax_inc" type="radio" value="1" checked>
                                        <span class="fw-semibold ps-2 fs-6">
                                        Yes
                                        </span>

                                    <input class="form-check-input" name="tax_inc" type="radio" value="0">
                                        <span class="fw-semibold ps-2 fs-6">
                                        No
                                        </span>
                                    <!--end::Input-->
                                    @if($errors->has('tax_inc'))
                                    <span class="text-danger">{{ $errors->first('tax_inc') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Dish Has Variant</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-check-input" name="dish_has_variant" type="radio" value="1" checked>
                                        <span class="fw-semibold ps-2 fs-6">
                                        Yes
                                        </span>

                                    <input class="form-check-input" name="dish_has_variant" type="radio" value="0">
                                        <span class="fw-semibold ps-2 fs-6">
                                        No
                                        </span>
                                    <!--end::Input-->
                                    @if($errors->has('dish_has_variant'))
                                    <span class="text-danger">{{ $errors->first('dish_has_variant') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="chef_preparation" type="checkbox" value="1">
                                        <span class="fw-semibold ps-2 fs-6">
                                        Chef Preparation Required
                                        </span>

                                    <!--end::Input-->
                                    @if($errors->has('tax_inc'))
                                    <span class="text-danger">{{ $errors->first('tax_inc') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Actions-->
                                <div class="text-left pt-3">
                                    <button type="submit" class="btn btn-lg btn-primary"
                                        data-kt-roles-modal-action="submit">
                                        <span class="indicator-label">
                                            Submit
                                        </span>
                                        <span class="indicator-progress">
                                            Please wait... <span
                                                class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                        </span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->                
                </div>                
            </div>
        </div>
    </div>

    {{--<div class="col-lg-6 col-12">         
        <div class="row ">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">                                                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header py-7">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                    <h2>Variants  </h2>
                                </div>
                                <!--end::Card title-->   
                                <!--begin::Create campaign button-->
                                <div class="card-toolbar">
                                    <a href="#" type="button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <div class="d-flex justify-content-between">
                                    <div class="fw-bold">Name  </div>
                                    <div class="fw-bold">Price </div>
                                    <div class="fw-bold">For  </div>
                                </div>
                            </div>                                
                            <!--end::Body-->
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-6">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">                                                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header py-7">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                    <h2>Extras  </h2>
                                </div>
                                <!--end::Card title-->   
                                <!--begin::Create campaign button-->
                                <div class="card-toolbar">
                                    <a href="#" type="button" class="btn  btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <div class="d-flex justify-content-between">
                                    <div class="fw-bold">Name  </div>
                                    <div class="fw-bold">Price </div>
                                    <div class="fw-bold">For  </div>
                                    </div>
                            </div>                                
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>--}}

</div>




@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function() {
    $('#kt_modal_add_role_form #kt_roles_select_all').on('click', function() {

        if ($(this).is(':checked')) {
            $.each($('#kt_modal_add_role_form [name="permission[]"]'), function() {
                $(this).prop('checked', true);
            });
        } else {
            $.each($('#kt_modal_add_role_form [name="permission[]"]'), function() {
                $(this).prop('checked', false);
            });
        }

    });
});

$('#counter_id').on('change', function(){
    var counter_id = $(this).val();
    $('#category_id option:gt(0)').remove();
    if(counter_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-category') }}/" + counter_id,
            type: "GET",
            success: function(response) {
                $.each(response,function(key, value)
                {
                    $("#category_id").append('<option value=' + value.id + '>' + value.category_name + '</option>');
                });
            }
        });
    }
});

$('#category_id').on('change', function(){
    var category_id = $(this).val();
    $('#tax_id option:gt(0)').remove();
    if(category_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-branch-tax') }}/" + category_id,
            type: "GET",
            success: function(response) {
                $.each(response,function(key, value)
                {
                    $("#tax_id").append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            }
        });
    }
});

</script>
@endsection