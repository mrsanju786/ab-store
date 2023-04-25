@extends('admin-view.layouts.main')
@section('title')
<title>Demo | Dashboard</title>
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
                    <h2>Add User</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Form-->
                <form action="{{route('user/store')}}" method="POST" enctype="multipart/form-data">
                    @csrf   

                    <!--begin::Row-->
                    <div class="row gx-9 h-100">
                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">

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
                                        <span class="required">First Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter First Name"
                                        name="first_name">
                                    <!--end::Input-->
                                    @if($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Last Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Last Name"
                                        name="last_name">
                                    <!--end::Input-->
                                    @if($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Email</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Email"
                                        name="email">
                                    <!--end::Input-->
                                    @if($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->   
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Phone</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Phone"
                                        name="phone">
                                    <!--end::Input-->
                                    @if($errors->has('phone'))
                                    <span class="text-danger">{{ $errors->first('phone') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group--> 
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Password</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="password" class="form-control form-control-solid" placeholder="Enter Password"
                                        name="password">
                                    <!--end::Input-->
                                    @if($errors->has('password'))
                                    <span class="text-danger">{{ $errors->first('password') }}</span>
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
                                <button type="submit" class="btn btn-lg btn-primary"  data-kt-roles-modal-action="submit">
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
                </form>
                <!--end::Form-->
            </div>
            <!--end::Body-->
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