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
                    <h2>Add Counter</h2>
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
                        <form action="{{route('create-counter')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">  

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Counter Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Counter Name"
                                        name="counter_name">
                                    <!--end::Input-->
                                    @if($errors->has('counter_name'))
                                    <span class="text-danger">{{ $errors->first('counter_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">License No</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="License No"
                                        name="license_no">
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
                                        <span class="required">License Expiry Date</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="date" class="form-control form-control-solid" placeholder="License Expiry Date"
                                        name="lincese_expiry_date">
                                    <!--end::Input-->
                                    @if($errors->has('lincese_expiry_date'))
                                    <span class="text-danger">{{ $errors->first('lincese_expiry_date') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Label-->
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Select Area</span>
                                </label>
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" aria-label="Select example" name="area_id" id="area_id" data-control="select2" >
                                        <option value="">Select Area</option>
                                        @foreach($area as $areas)
                                        <option value="{{$areas->id}}">{{$areas->area_name}}</option>
                                        @endforeach                                   
                                    </select>
                                <!--end::Input-->
                                @if($errors->has('area_id'))
                                <span class="text-danger">{{ $errors->first('area_id') }}</span>
                                @endif
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <br>
                                <br>
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

$('#state_id').on('change', function(){
    var country_id = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/master/get-city') }}/" + country_id,
        type: "GET",
        success: function(response) {
            $.each(response,function(key, value)
            {
                $("#city_id").append('<option value=' + value.id + '>' + value.city_name + '</option>');
            });
        }
    });
});
</script>
@endsection