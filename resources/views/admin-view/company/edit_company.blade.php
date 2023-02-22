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
                    <h2>Edit company</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

        </div>
    </div>
    <!--end::Col-->

    <!--begin::Col-->
    <div class="col-lg-12">
        <!--begin::Card widget 18-->
        <div class="card card-flush">
            <!--begin::Body-->
            <div class="card-body">

                <!--begin::Form-->
                <form action="{{route('update-company')}}" method="POST" enctype="multipart/form-data">
                    @csrf            

                    <!--begin::Row-->
                    <div class="row gx-9 h-100">
                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Company name</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter company name"
                                        name="company_name" value="{{$company->company_name}}">
                                    <!--end::Input-->
                                    @if($errors->has('company_name'))
                                    <span class="text-danger">{{ $errors->first('company_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">CIN No.</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="CIN No."
                                        name="cin_no" value="{{$company->CIN_no}}">
                                    <!--end::Input-->
                                    @if($errors->has('cin_no'))
                                    <span class="text-danger">{{ $errors->first('cin_no') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Country</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="country_id" id="country_id" data-control="select2" >
                                        <option>Select Country</option>
                                        @foreach($country as $countries)
                                        <option value="{{$countries->id}}" {{($countries->id == $company->country_id) ? 'selected' : ''}}>{{$countries->country_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('country_id'))
                                    <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select State</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="state_id" id="state_id" data-control="select2" >
                                        <option value="">Select State</option>                                    
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('state_id'))
                                    <span class="text-danger">{{ $errors->first('state_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Pincode</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Pincode"
                                        name="pincode" value="{{$company->pincode}}">
                                    <!--end::Input-->
                                    @if($errors->has('pincode'))
                                    <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Col-->
                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-p pe-md-7" id="kt_modal_add_role_scroll">    
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Company Logo</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid" placeholder="Enter company logo" name="company_logo">
                                    <img width="155" src="{{asset('storage/upload/company')}}/{{$company->company_logo}}" >
                                    <!--end::Input-->
                                    @if($errors->has('company_logo'))
                                    <span class="text-danger">{{ $errors->first('company_logo') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select License</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <select class="form-select" aria-label="Select example" name="license_no">
                                        <option value="">Select License</option>
                                        @foreach($license as $licenses)
                                        <option value="{{$licenses->id}}" {{($company->food_license_id == $licenses->id) ? 'selected' : ''}}>{{$licenses->license_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('license_no'))
                                    <span class="text-danger">{{ $errors->first('license_no') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Registered Address</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid" placeholder="Registered Address"
                                        name="registered_address" row="2">{{$company->registered_address}}</textarea>
                                    <!-- <input class="form-control form-control-solid" placeholder="registered_address"
                                        name="registered_address" value="{{$company->registered_address}}"> -->
                                    <!--end::Input-->
                                    @if($errors->has('registered_address'))
                                    <span class="text-danger">{{ $errors->first('registered_address') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select City</span>
                                    </label>
                                    <!--end::Label-->
        
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="city_id" id="city_id" data-control="select2" >
                                        <option value="">Select City</option>
                                        
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('country_id'))
                                    <span class="text-danger">{{ $errors->first('country_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->    
                            </div>
                            <!--end::Scroll-->
                        </div>
                        <!--end::Col-->
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
                                        Update
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span
                                            class="spinner-border spinner-border-sm align-middle ms-2"></span>
                                    </span>
                                </button>
                            </div>
                            <input type="hidden" name="company_id" value="{{$company->id}}">
                            <!--end::Actions-->
                        </div>
                        <!--end::Col-->
                    </div>
                    <!--end::Row-->

                </form>
                <!--end::Form-->

            </div>
            <!--end::Body-->
        </div>
        <!--end::Card widget 18-->
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

var country_id = "{{$company->country_id}}";
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{ url('admin/master/get-state') }}/" + country_id,
    type: "GET",
    success: function(response) {
        var chk = "{{$company->state_id}}";
        $.each(response,function(key, value)
        {
            $("#state_id").append('<option value=' + value.id +'>' + value.state_name + '</option>');
        });
        $('#state_id option[value='+chk+']').attr('selected','selected');
    }
});


var state_id = "{{$company->state_id}}";
$.ajax({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    url: "{{ url('admin/master/get-city') }}/" + state_id,
    type: "GET",
    success: function(response) {
        var chk = "{{$company->city_id}}";
        $.each(response,function(key, value)
        {
            $("#city_id").append('<option value=' + value.id +'>' + value.city_name + '</option>');
        });
        $('#city_id option[value='+chk+']').attr('selected','selected');
    }
});
});


</script>
@endsection