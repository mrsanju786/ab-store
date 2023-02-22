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
                    <h2>Add Area</h2>
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
                <form action="{{route('create-area')}}" method="POST" enctype="multipart/form-data">
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
                                <span class="required">Select Location</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <select class="form-select form-select-solid" aria-label="Select example" name="location_id" data-control="select2">
                                <option>Select Location</option>
                                @foreach($location as $locations)
                                <option value="{{$locations->id}}">{{$locations->address}}</option>
                                @endforeach
                                
                            </select>
                            <!--end::Input-->
                            @if($errors->has('location_id'))
                            <span class="text-danger">{{ $errors->first('location_id') }}</span>
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
                                <span class="required">Area name</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Enter Area name"
                                name="area_name">
                            <!--end::Input-->
                            @if($errors->has('area_name'))
                            <span class="text-danger">{{ $errors->first('area_name') }}</span>
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