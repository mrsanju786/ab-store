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
                    <h2>Edit Location</h2>
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
                        <form action="{{route('update-location')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">  
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Select Branch</span>
                                </label>
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" aria-label="Select example" name="branch_id" id="branch_id" data-control="select2" >
                                        <option value="">Select Branch</option>
                                        @foreach($branch as $branches)
                                        <option value="{{$branches->id}}" {{($branches->id == $location->branch_id)?'selected':''}}>{{$branches->name}}</option>
                                        @endforeach                                   
                                    </select>
                                <!--end::Input-->
                                @if($errors->has('branch_id'))
                                <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                                @endif
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <br>
                                <br>
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Address</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <textarea class="form-control form-control-solid" placeholder="Enter Address"
                                        name="location_address">{{$location->address}}</textarea>
                                    <!--end::Input-->
                                    @if($errors->has('location_address'))
                                    <span class="text-danger">{{ $errors->first('location_address') }}</span>
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
                                        <option>Select State</option>
                                        @foreach($state as $states)
                                        <option value="{{$states->id}}" {{($location->state_id == $states->id)? 'selected' : ''}}>{{$states->state_name}}</option>
                                        @endforeach                                   
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
                                        <span class="required">Select City</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="city_id" id="city_id" data-control="select2" >
                                        <option value="">Select City</option>
                                        
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('city_id'))
                                    <span class="text-danger">{{ $errors->first('city_id') }}</span>
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
                                    <input class="form-control form-control-solid" placeholder="pincode"
                                        name="pincode" value="{{$location->pincode}}">
                                    <!--end::Input-->
                                    @if($errors->has('pincode'))
                                    <span class="text-danger">{{ $errors->first('pincode') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Vip Percent</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" placeholder="Enter Vip Percent"
                                        name="vip_percent" value="{{$location->vip_percent}}">
                                    <!--end::Input-->
                                    @if($errors->has('branch_code'))
                                    <span class="text-danger">{{ $errors->first('branch_code') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">VVip Percent</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="number" class="form-control form-control-solid" placeholder="VVip Percent"
                                        name="vvip_percent" value="{{$location->vvip_percent}}">
                                    <!--end::Input-->
                                    @if($errors->has('vvip_percent'))
                                    <span class="text-danger">{{ $errors->first('vvip_percent') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">License Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="License Name"
                                        name="license_name" value="{{$location->license_name}}">
                                    <!--end::Input-->
                                    @if($errors->has('license_name'))
                                    <span class="text-danger">{{ $errors->first('license_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span>License Format</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="License Format"
                                        name="license_format" value="{{$location->license_format}}">
                                    <!--end::Input-->
                                    @if($errors->has('license_format'))
                                    <span class="text-danger">{{ $errors->first('license_format') }}</span>
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

    var state_id = "{{$location->state_id}}";
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/master/get-city') }}/" + state_id,
        type: "GET",
        success: function(response) {
            var chk = "{{$location->city_id}}";
            $.each(response,function(key, value)
            {
                $("#city_id").append('<option value=' + value.id + '>' + value.city_name + '</option>');
            });
            $('#city_id option[value='+chk+']').attr('selected','selected');
        }
    });

});

</script>
@endsection