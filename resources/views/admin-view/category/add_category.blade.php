@extends('admin-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="row">
    <!--begin::Col-->
    <div class="col-md-12 mx-auto">
        <div class="card card-flush h-md-100" id="kt_modal_add_role">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Add Category</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <br>
           
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">

                <!--begin::Col-->
                <div class="col">

                    <!--begin::Card body-->
                    <div class="card-body pt-1">

                        <!--begin::Form-->
                        <form action="{{route('create-category')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">  
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Branch</span>
                                    </label>
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="branch_id" id="branch_id" data-control="select2" >
                                            <option value="">Select Branch</option>
                                            @foreach($branch as $branchs)
                                            <option value="{{$branchs->id}}">{{$branchs->name}}</option>
                                            @endforeach                                   
                                        </select>
                                    <!--end::Input-->
                                    @if($errors->has('branch_id'))
                                    <span class="text-danger">{{ $errors->first('branch_id') }}</span>
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
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="counter_id" id="counter_id" data-control="select2" >
                                            <option value="">Select Counter</option>                                 
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
                                        <span class="required">Category Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Category Name"
                                        name="category_name">
                                    <!--end::Input-->
                                    @if($errors->has('category_name'))
                                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Category Image</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid" placeholder="Upload Category Image"
                                    title="Choose an Image please"  name="category_image">
                                    <!--end::Input-->
                                    @if($errors->has('category_image'))
                                    <span class="text-danger">{{ $errors->first('category_image') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <div>
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Item Type</span>
                                    </label>
                                    <!--end::Label-->
                                    </div>
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="item_type" type="radio" value="0" checked>
                                        <span class="fw-semibold ps-2 fs-6">
                                        Live
                                        </span>

                                    <input class="form-check-input" name="item_type" type="radio" value="1">
                                        <span class="fw-semibold ps-2 fs-6">
                                        Ready to go
                                        </span>
                                    <!--end::Input-->
                                    @if($errors->has('item_type'))
                                    <span class="text-danger">{{ $errors->first('item_type') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->


                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container" id="menu_list_block">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Menu</span>
                                    </label>
                                    <!--end::Label-->
                                    <br>
                                    <br>
                                    <div id="menu_list"></div>
                                    
                                    <!--end::Input-->
                                    @if($errors->has('menu_id'))
                                    <span class="text-danger">{{ $errors->first('menu_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Category Type</span>
                                    </label>
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="category_type" id="category_type" data-control="select2" >
                                            <option value="">Select Category Type</option>
                                            <option value="Veg">Veg</option>
                                            <option value="Non-Veg">Non-Veg</option>
                                            <option value="Beverages">Beverages</option>
                                        </select>
                                    <!--end::Input-->
                                    @if($errors->has('counter_id'))
                                    <span class="text-danger">{{ $errors->first('counter_id') }}</span>
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
                <!--end::Col-->

                <!--begin::Col-->
                <div class="col">

                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->


           
        </div>
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->

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

$('#branch_id').on('change', function(){
    var branch_id = $(this).val();
    $('#counter_id option:gt(0)').remove();
    if(branch_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-counter') }}/" + branch_id,
            type: "GET",
            success: function(response) {
                $.each(response,function(key, value)
                {
                    $("#counter_id").append('<option value=' + value.id + '>' + value.counter_name + '</option>');
                });
            }
        });
    }
});

$('#menu_list_block').hide();

$('#counter_id').on('change', function(){
    var counter_id = $(this).val();
    $('#menu_list').empty();
    $('#menu_list_block').hide();
    if(counter_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-menu') }}/" + counter_id,
            type: "GET",
            success: function(response) {
                $('#menu_list_block').show();
                $.each(response,function(key, value)
                {
                    $("#menu_list").append('<label class="form-check form-check-custom form-check-inline form-check-solid me-5 form-check-success"><input class="form-check-input" name="menu_id[]" type="checkbox" value="' + value.id + '"><span class="fw-semibold ps-2 fs-6">' + value.menu_name + '</span></label><br><br>');
                });
            }
        });
    }
});
</script>
@endsection