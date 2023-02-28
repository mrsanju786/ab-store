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
                            <h2>Edit Dish</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Form-->
                        <form action="{{route('update-dish')}}" method="POST" enctype="multipart/form-data">
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
                                        name="dish_name" value="{{$dish->dish_name}}">
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
                                        name="dish_price" value="{{$dish->dish_price}}">
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
                                    <img width="155" src="{{asset('storage/upload/dish')}}/{{$dish->dish_images}}" >
                                    <!--end::Input-->
                                    @if($errors->has('dish_image'))
                                    <span class="text-danger">{{ $errors->first('dish_image') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!-- dish code start -->
                            
                                <input type="hidden" class="form-control form-control-solid" name="dish_code" value="{{$dish->dish_code}}">
                                <!-- dish code end -->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Dish Hsn</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" placeholder="Dish Hsn"
                                        name="dish_hsn" value="{{$dish->dish_hsn}}">
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
                                    <select class="form-select form-select-solid" aria-label="Select example" name="counter_id" id="counter_id" data-control="select2" >
                                        <option>Select Counter</option>
                                        @foreach($counter as $counters)
                                        <option value="{{$counters->id}}" {{($dish->counter_id == $counters->id)? 'selected': ''}}>{{$counters->counter_name}}</option>
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
                                        <span>Tax Inclusive</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-check-input" name="tax_inc" type="radio" value="1" {{($dish->is_tax_inclusive == "1")? 'checked':''}}>
                                        <span class="fw-semibold ps-2 fs-6">
                                        Yes
                                        </span>

                                    <input class="form-check-input" name="tax_inc" type="radio" value="0" {{($dish->is_tax_inclusive == "0")? 'checked':''}}>
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
                                        <span>Dish Has Variant</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-check-input" name="dish_has_variant" type="radio" value="1" {{($dish->has_variant == "1")?'checked':''}}>
                                        <span class="fw-semibold ps-2 fs-6">
                                        Yes
                                        </span>

                                    <input class="form-check-input" name="dish_has_variant" type="radio" value="0" {{($dish->has_variant == "0")?'checked':''}}>
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
                                    <input class="form-check-input" name="chef_preparation" type="checkbox" value="1" {{($dish->chef_preparation == "1")? 'checked':''}}>
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

                                <input type="hidden" name="dish_id" id="dish_id" value="{{$dish->id}}">

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

    <div class="col-lg-6 col-12">
        @if($dish->has_variant == 1)         
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
                                    <a href="{{route('option-list', base64_encode($dish->id))}}" type="button" class="btn btn-sm btn-primary me-5">Add Option</a>
                                    <a href="{{route('add-dishvariant', base64_encode($dish->id))}}" type="button" class="btn btn-sm btn-primary">Add Variant</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-6">
                                <!--begin::Table container-->
                                <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bold text-dark-600 borderbottom">
                                                <th class="p-0 pb-3 min-w-100px">Name</th>
                                                <th class="p-0 pb-3 w-125px">Price</th>
                                                <th class="p-0 pb-3 w-50px">Action</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach($variant as $variants)
                                            <tr>
                                                <td class="p-0 py-3 w-125px">
                                                    <span class="text-gray-600 fw-bold fs-6">{{$variants->variant_name}}</span>
                                                </td>
                                                <td class="p-0 py-3 w-125px">
                                                    <span class="text-gray-600 fw-bold fs-6">{{$variants->variant_price}}</span>
                                                </td>
                                                <td class="p-0 py-3 w-125px">
                                                    <div class="card-toolbar">
                                                        <a href="{{route('edit-dishvariant', base64_encode($variants->id))}}" type="button" class="btn btn-sm btn-primary mx-2"
                                                        >Edit </a>
                                                        <!-- <a href="#" type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_create_campaign">Delete</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
                                </div>
                                <!--end::Table container-->
                            </div>
                            <!--end::Body-->
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        @endif

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
                                    <a href="{{route('add-extra', base64_encode($dish->id))}}" type="button" class="btn  btn-sm btn-primary">Add</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                            <div class="table-responsive">
                                    <!--begin::Table-->
                                    <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                        <!--begin::Table head-->
                                        <thead>
                                            <tr class="fs-7 fw-bold text-dark-600 borderbottom">
                                                <th class="p-0 pb-3 min-w-100px">Name</th>
                                                <th class="p-0 pb-3 w-125px">Price</th>
                                                <th class="p-0 pb-3 w-50px">Action</th>
                                            </tr>
                                        </thead>
                                        <!--end::Table head-->
                                        <!--begin::Table body-->
                                        <tbody>
                                            @foreach($extra as $extras)
                                            <tr>
                                                <td class="p-0 py-3 w-125px">
                                                    <span class="text-gray-600 fw-bold fs-6">{{$extras->extras_name}}</span>
                                                </td>
                                                <td class="p-0 py-3 w-125px">
                                                    <span class="text-gray-600 fw-bold fs-6">{{$extras->extras_price}}</span>
                                                </td>
                                                <td class="p-0 py-3 w-125px">
                                                    <div class="card-toolbar">
                                                        <a href="{{route('edit-extra', base64_encode($extras->id))}}" type="button" class="btn btn-sm btn-primary mx-2"
                                                        >Edit </a>
                                                        <!-- <a href="#" type="button" class="btn btn-sm btn-danger"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#kt_modal_create_campaign">Delete</a> -->
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <!--end::Table body-->
                                    </table>
                                    <!--end::Table-->
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
                                    <h2>AddOns</h2>
                                </div>
                                <!--end::Card title-->   
                                <!--begin::Create campaign button-->
                                <div class="card-toolbar">
                                    <a href="{{route('add-addon', base64_encode($dish->id))}}" type="button" class="btn  btn-sm btn-primary">Add</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <div class="table-responsive">
                                        <!--begin::Table-->
                                        <table class="table table-row-dashed align-middle gs-0 gy-3 my-0">
                                            <!--begin::Table head-->
                                            <thead>
                                                <tr class="fs-7 fw-bold text-dark-600 borderbottom">
                                                    <th class="p-0 pb-3 min-w-100px">Name</th>
                                                    <th class="p-0 pb-3 w-125px">Price</th>
                                                    <th class="p-0 pb-3 w-50px">Action</th>
                                                </tr>
                                            </thead>
                                            <!--end::Table head-->
                                            <!--begin::Table body-->
                                            <tbody>
                                                @foreach($addon as $addons)
                                                <tr>
                                                    <td class="p-0 py-3 w-125px">
                                                        <span class="text-gray-600 fw-bold fs-6">{{$addons->addon_name}}</span>
                                                    </td>
                                                    <td class="p-0 py-3 w-125px">
                                                        <span class="text-gray-600 fw-bold fs-6">{{$addons->addon_price}}</span>
                                                    </td>
                                                    <td class="p-0 py-3 w-125px">
                                                        <div class="card-toolbar">
                                                            <a href="{{route('edit-addon', base64_encode($addons->id))}}" type="button" class="btn btn-sm btn-primary mx-2"
                                                            >Edit </a>
                                                            <!-- <a href="#" type="button" class="btn btn-sm btn-danger"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#kt_modal_create_campaign">Delete</a> -->
                                                        </div>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                </div>
                            </div>                                
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

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

    var counter_id = "{{$dish->counter_id}}";
    $('#category_id option:gt(0)').remove();
    if(counter_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-category') }}/" + counter_id,
            type: "GET",
            success: function(response) {
                var cat = "{{$dish->category_id}}";
                $.each(response,function(key, value)
                {
                    $("#category_id").append('<option value=' + value.id + '>' + value.category_name + '</option>');
                });
                $('#category_id option[value='+cat+']').attr('selected','selected');
            }
        });
    }
    
});

$('#country_id').on('change', function(){
    var country_id = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/master/get-state') }}/" + country_id,
        type: "GET",
        success: function(response) {
            $.each(response,function(key, value)
            {
                $("#state_id").append('<option value=' + value.id + '>' + value.state_name + '</option>');
            });
        }
    });
});

$('#state_id').on('change', function(){
    var state_id = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/master/get-city') }}/" + state_id,
        type: "GET",
        success: function(response) {
            $.each(response,function(key, value)
            {
                $("#city_id").append('<option value=' + value.id + '>' + value.city_name + '</option>');
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

</script>
@endsection