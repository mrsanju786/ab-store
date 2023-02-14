@extends('admin-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="row">
    <!--begin::Col-->
    <div class="col-md-10 mx-auto">
        <div class="card card-flush h-md-100" id="kt_modal_add_role">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Add Timezone</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-1">
                <!--begin::Form-->
                <form action="{{route('update-timezone')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                        <input type="hidden" name="timezone_id" value="{{$timezone->id}}">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Zone name</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Enter Zone name"
                                name="zone_name" value="{{$timezone->zone_name}}">
                            <!--end::Input-->
                            @if($errors->has('zone_name'))
                            <span class="text-danger">{{ $errors->first('zone_name') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Start Time</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Start Time"
                                name="start_time" value="{{$timezone->start_time}}">
                            <!--end::Input-->
                            @if($errors->has('start_time'))
                            <span class="text-danger">{{ $errors->first('start_time') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->
                        
                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">GMT Offset</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="GMT Offset"
                                name="gmt_offset" value="{{$timezone->gmt_offset}}">
                            <!--end::Input-->
                            @if($errors->has('gmt_offset'))
                            <span class="text-danger">{{ $errors->first('gmt_offset') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Dst</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Dst"
                                name="dst" value="{{$timezone->dst}}">
                            <!--end::Input-->
                            @if($errors->has('dst'))
                            <span class="text-danger">{{ $errors->first('dst') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Country</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select class="form-select" aria-label="Select example" name="country_id">
                                <option value="">Select Country</option>
                                @foreach($country_list as $country)
                                <option value="{{$country->id}}" {{($timezone->country_id == $country->id) ? 'selected' : ''}}>{{$country->country_name}}</option>
                                @endforeach
                                
                            </select>
                            <!--end::Input-->
                            @if($errors->has('country_id'))
                            <span class="text-danger">{{ $errors->first('country_id') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Actions-->
                        <div class=" text-center pt-15">

                            <button type="submit" class="btn btn-primary"
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
                </form>
                <!--end::Form-->
            </div>
            <!--end::Card body-->
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