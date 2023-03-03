@extends('admin-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')


<div class="row">

    <div class="col-lg-12 col-12"> 
        <div class="row">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Edit Menu</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Form-->
                        <form action="{{route('update-menu')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <!--begin::Row-->
                            <div class="row gx-9 h-100">
                                <!--begin::Col-->
                                <div class="col-sm-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Company</span>
                                    </label>
                                    <!--end::Label-->
    
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="company_id" id="company_id" data-control="select2" >
                                        <option value="">Select Company</option>
                                        @foreach($company as $companies)
                                        <option value="{{$companies->id}}" {{($companies->id == $menu->company_id)? 'selected':''}}>{{$companies->company_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('company_id'))
                                    <span class="text-danger">{{ $errors->first('company_id') }}</span>
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
                                        <span class="required">From Time</span>
                                    </label>
                                    <!--end::Label-->
    
                                    <!--begin::Input-->
                                    <input type="time" class="form-control form-control-solid" placeholder="Enter From time"
                                        name="from_time" value="{{$menu->from_time}}">
                                    <!--end::Input-->
                                    @if($errors->has('from_time'))
                                    <span class="text-danger">{{ $errors->first('from_time') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Cut Off Time</span>
                                    </label>
                                    <!--end::Label-->
    
                                    <!--begin::Input-->
                                    <!-- <input type="time" class="form-control form-control-solid" placeholder="Enter Off Time"
                                        name="off_time" value="{{$menu->offtime}}"> -->
                                    <select class="form-select form-select-solid" aria-label="Select example"
                                        name="off_time" id="off_time" data-control="select2">
                                        <option value="">Select Off time</option>
                                        <option value="1:00" {{($menu->offtime == "1:00")?'selected' : ''}}>Before 1 Hour</option>
                                        <option value="2:00" {{($menu->offtime == "2:00")?'selected' : ''}}>Before 2 Hours</option>
                                        <option value="3:00" {{($menu->offtime == "3:00")?'selected' : ''}}>Before 3 Hours</option>
                                        <option value="4:00" {{($menu->offtime == "4:00")?'selected' : ''}}>Before 4 Hours</option>
                                        <option value="5:00" {{($menu->offtime == "5:00")?'selected' : ''}}>Before 5 Hours</option>
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('off_time'))
                                    <span class="text-danger">{{ $errors->first('off_time') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                </div>
                                <!--end::Col-->
                            
                                <!--begin::Col-->
                                <div class="col-sm-6">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Branch</span>
                                    </label>
                                    <!--end::Label-->
    
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="branch_id" id="branch_id"  data-control="select2" >
                                        <option>Select Branch</option>
                                        
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
                                        <span class="required">Menu Name</span>
                                    </label>
                                    <!--end::Label-->
    
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Menu Name"
                                        name="menu_name" value="{{$menu->menu_name}}">
                                    <!--end::Input-->
                                    @if($errors->has('menu_name'))
                                    <span class="text-danger">{{ $errors->first('menu_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">To Time</span>
                                    </label>
                                    <!--end::Label-->
    
                                    <!--begin::Input-->
                                    <input type="time" class="form-control form-control-solid" placeholder="Enter To time"
                                        name="to_time" value="{{$menu->to_time}}">
                                    <!--end::Input-->
                                    @if($errors->has('to_time'))
                                    <span class="text-danger">{{ $errors->first('to_time') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Repeat Days</span>
                                    </label>                                    
                                    <!--end::Label-->
                                    @php
                                    $repeatDays = explode(",",$menu->repeat_days);
                                    @endphp
                                    <!--begin::Input-->

                                    <!--begin::Row-->
                                    <div class="row gx-9 h-100">
                                        <!--begin::Col-->
                                        <div class="col-sm-5">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <ul class="list-style-none">
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Monday" {{in_array("Monday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6"> Monday  </span>
                                                        </li>
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Tuesday" {{in_array("Tuesday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6"> Tuesday </span>
                                                        </li>
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Wednesday" {{in_array("Wednesday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6"> Wednesday </span>
                                                        </li>
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Thursday" {{in_array("Thursday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6">Thursday</span> 
                                                        </li>
                                                    </ul>  
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Scroll-->
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-sm-7">
                                            <!--begin::Scroll-->
                                            <div class="d-flex flex-column scroll-y me-n7 pe-p pe-md-7">
                                                <!--begin::Input group-->
                                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                                    <ul class="list-style-none">
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Friday" {{in_array("Friday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6">Friday</span> 
                                                        </li>
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Saturday" {{in_array("Saturday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6">Saturday</span>
                                                        </li>
                                                        <li class="pt-4">
                                                            <input class="form-check-input" name="repeat_days[]" type="checkbox" value="Sunday" {{in_array("Sunday", $repeatDays)? 'checked' : ''}}>
                                                            <span class="fw-semibold ps-2 fs-6">Sunday</span>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!--end::Input group-->
                                            </div>
                                            <!--end::Scroll-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->

                                    <!--end::Input-->
                                    @if($errors->has('repeat_days'))
                                    <span class="text-danger">{{ $errors->first('repeat_days') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <input type="hidden" name="menu_id" id="menu_id" value="{{$menu->id}}">

                                </div>
                                <!--end::Row-->
                            
                                <!--begin::Row-->
                                <div class="row gx-9 h-100">
                                    <!--begin::Col-->
                                    <div class="col-md-12 mx-auto">
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
                                    <!--end::Col-->
                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Row--> 
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

   
    var company_id = "{{$menu->company_id}}";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/get-branch') }}/" + company_id,
        type: "GET",
        success: function(response) { 
            var branch = "{{$menu->branch_id}}";
            $.each(response,function(key, value)
            {
                $("#branch_id").append('<option value=' + value.id + '>' + value.name + '</option>');
            });
            $('#branch_id option[value='+branch+']').attr('selected','selected');
        }
    });

    var branch_id = "{{$menu->branch_id}}";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/get-counter') }}/" + branch_id,
        type: "GET",
        success: function(response) {
            var cntr = "{{$menu->counter_id}}";
            $.each(response,function(key, value)
            {
                $("#counter_id").append('<option value=' + value.id + '>' + value.counter_name + '</option>');
            });
            $('#counter_id option[value='+cntr+']').attr('selected','selected');
        }
    });

});

$('#company_id').on('change', function(){
    $("#branch_id").empty();
    $("#branch_id").append('<option value="">Select Company</option>');
    var company_id = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/get-branch') }}/" + company_id,
        type: "GET",
        success: function(response) { 
            $.each(response,function(key, value)
            {
                $("#branch_id").append('<option value=' + value.id + '>' + value.name + '</option>');
            });
        }
    });
});

$('#branch_id').on('change', function(){
    $("#counter_id").empty();
    $("#counter_id").append('<option value="">Select Counter</option>');
    var branch_id = $(this).val();
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
});

</script>
@endsection