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
                    <h2>Edit Country Tax</h2>
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
                <form action="{{route('update-countrytax')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!--begin::Row-->
                    <div class="row gx-9 h-100">
                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                                <input type="hidden" name="countrytax_id" value="{{$countrytax->id}}">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Tax name</span>
                                    </label>
                                    <!--end::Label-->
                
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Tax name"
                                        name="tax_name" value="{{$countrytax->name}}">
                                    <!--end::Input-->
                                    @if($errors->has('tax_name'))
                                    <span class="text-danger">{{ $errors->first('tax_name') }}</span>
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
                                    <select class="form-select form-select-solid" aria-label="Select example" name="country_id" data-control="select2">
                                        
                                        @foreach($country_list as $countrys)
                                        <option value="{{$countrys->id}}" {{($countrytax->country_id == $countrys->id) ? 'selected' : ''}}>{{$countrys->country_name}}</option>
                                        @endforeach
                                        
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
                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-p pe-md-7" id="kt_modal_add_role_scroll">

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Tax Percent</span>
                                    </label>
                                    <!--end::Label-->
                
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Tax Percent"
                                        name="tax_percent" value="{{$countrytax->tax_percent}}">
                                    <!--end::Input-->
                                    @if($errors->has('tax_percent'))
                                    <span class="text-danger">{{ $errors->first('tax_percent') }}</span>
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
});
</script>
@endsection