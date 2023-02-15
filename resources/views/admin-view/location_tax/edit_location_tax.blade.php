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
                    <h2>Edit Location Tax</h2>
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
                <form action="{{route('update-location-tax')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                        <input type="hidden" name="location_tax_id" value="{{$location_tax->id}}">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Tax Percent</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Enter Tax Percent"
                                name="tax_percent" value="{{$location_tax->tax_percent}}">
                            <!--end::Input-->
                            @if($errors->has('tax_percent'))
                            <span class="text-danger">{{ $errors->first('tax_percent') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Location</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select class="form-select form-select-solid" aria-label="Select example" name="location_id" data-control="select2">
                                <option value="">Select Location</option>
                                @foreach($location_list as $location)
                                <option value="{{$location->id}}" {{($location_tax->location_id == $location->id) ? 'selected' : ''}}>{{$location->address}}</option>
                                @endforeach
                                
                            </select>
                            <!--end::Input-->
                            @if($errors->has('location_id'))
                            <span class="text-danger">{{ $errors->first('location_id') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Tax</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select class="form-select form-select-solid" aria-label="Select example" name="tax_id" data-control="select2">
                                <option value="">Select Tax</option>
                                @foreach($tax_list as $tax)
                                <option value="{{$tax->id}}" {{($location_tax->tax_id == $tax->id) ? 'selected' : ''}}>{{$tax->tax_name}}</option>
                                @endforeach
                                
                            </select>
                            <!--end::Input-->
                            @if($errors->has('tax_id'))
                            <span class="text-danger">{{ $errors->first('tax_id') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->


                        <!--begin::Actions-->
                        <div class=" text-left pt-3">

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