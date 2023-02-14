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
                    <h2>Add Branch</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

           
            <!--begin::Row-->
            <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">

                <!--begin::Col-->
                <div class="col">

                    <!--begin::Card body-->
                    <div class="card-body pt-1">

                        <!--begin::Form-->
                        <form action="{{route('create-branch')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Region</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="region_id" data-control="select2">
                                        <option>Select Region</option>
                                        @foreach($region_list as $region)
                                        <option value="{{$region->id}}">{{$region->region_name}}</option>
                                        @endforeach
                                        
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('region_id'))
                                    <span class="text-danger">{{ $errors->first('region_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Branch Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Branch Name"
                                        name="branch_name">
                                    <!--end::Input-->
                                    @if($errors->has('branch_name'))
                                    <span class="text-danger">{{ $errors->first('branch_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Branch Code</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Branch Code"
                                        name="branch_code">
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
                                        <span class="required">Branch Manager</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Branch Manager"
                                        name="branch_manager">
                                    <!--end::Input-->
                                    @if($errors->has('branch_manager'))
                                    <span class="text-danger">{{ $errors->first('branch_manager') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Contact Number</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Contact Number"
                                        name="contact_number">
                                    <!--end::Input-->
                                    @if($errors->has('contact_number'))
                                    <span class="text-danger">{{ $errors->first('contact_number') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span>GST Number</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="GST Number"
                                        name="gst_no">
                                    <!--end::Input-->
                                    @if($errors->has('gst_no'))
                                    <span class="text-danger">{{ $errors->first('gst_no') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span>License Number</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="License Number"
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
                                        <span class="required">Branch Service</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <!-- <div class="form-check form-check-sm form-check-custom form-check-solid">
                                        <input type="checkbox" class="form-check-input" name="is_pos" id="is_pos"> &nbsp;POS &nbsp;
                                        <input type="checkbox" class="form-check-input" name="is_pos" id="is_pos"> &nbsp;Self Ordering Kiosk
                                        <input type="checkbox" class="form-check-input" name="is_pos" id="is_pos"> &nbsp;Qr Code Based web ordering
                                        <input type="checkbox" class="form-check-input" name="is_pos" id="is_pos"> &nbsp;Mobile App Ordering
                                        <input type="checkbox" class="form-check-input" name="is_pos" id="is_pos"> &nbsp;Table / Room Odering
                                    </div> -->

                                    <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                    <input class="form-check-input" name="is_pos" type="checkbox" value="1">
                                    <span class="fw-semibold ps-2 fs-6">
                                    POS
                                    </span>
                                    </label>

                                    <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                    <input class="form-check-input" name="is_sok" type="checkbox" value="1">
                                    <span class="fw-semibold ps-2 fs-6">
                                    Self Ordering Kiosk
                                    </span>
                                    </label>

                                    <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                    <input class="form-check-input" name="is_qrcode" type="checkbox" value="1">
                                    <span class="fw-semibold ps-2 fs-6">
                                    Qr Code Based web ordering
                                    </span>
                                    </label>

                                    <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                    <input class="form-check-input" name="is_mobile_ordering" type="checkbox" value="1">
                                    <span class="fw-semibold ps-2 fs-6">
                                    Mobile App Ordering
                                    </span>
                                    </label>

                                    <label class="form-check form-check-custom form-check-inline form-check-solid me-5">
                                    <input class="form-check-input" name="is_table_room" type="checkbox" value="1">
                                    <span class="fw-semibold ps-2 fs-6">
                                    Table / Room Odering
                                    </span>
                                    </label>
                                    
                                    <!--end::Input-->
                                    @if($errors->has('contact_number'))
                                    <span class="text-danger">{{ $errors->first('contact_number') }}</span>
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
</script>
@endsection