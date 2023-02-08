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
                    <h2>Add a Role</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-1">
                <!--begin::Form-->
                <form id="kt_modal_add_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{route('update-role', [base64_encode($role['id'])])}}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                        <!--begin::Input group-->
                        <div class="fv-row mb-10 fv-plugins-icon-container">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">
                                <span class="required">Role name</span>
                            </label>
                            <!--end::Label-->

                            <!--begin::Input-->
                            <input class="form-control form-control-solid" placeholder="Enter a role name"
                                name="role_name" value="{{$role['name']}}">
                            <!--end::Input-->
                            @if($errors->has('role_name'))
                            <span class="text-danger">{{ $errors->first('role_name') }}</span>
                            @endif
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Input group-->

                        <!--begin::Permissions-->
                        <div class="fv-row">
                            <!--begin::Label-->
                            <label class="fs-5 fw-bold form-label mb-2">Role Permissions</label>
                            <!--end::Label-->

                            <!--begin::Table wrapper-->
                            <div class="table-responsive">
                                <!--begin::Table-->
                                <table class="table align-middle table-row-dashed fs-6 gy-5">
                                    <!--begin::Table body-->
                                    <tbody class="text-gray-600 fw-semibold">
                                        <!--begin::Table row-->
                                        <tr>
                                            <td class="text-gray-800">
                                                Administrator Access

                                                <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                                    aria-label="Allows a full access to the system"
                                                    data-bs-original-title="Allows a full access to the system"
                                                    data-kt-initialized="1"></i>
                                            </td>
                                            <td>
                                                <!--begin::Checkbox-->
                                                <label class="form-check form-check-custom form-check-solid me-9">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="kt_roles_select_all">
                                                    <span class="form-check-label" for="kt_roles_select_all">
                                                        Select all
                                                    </span>
                                                </label>
                                                <!--end::Checkbox-->
                                            </td>
                                        </tr>
                                        <!--end::Table row-->

                                                                                <!--begin::Table row-->
                                                                                <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Dashboard</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="dashboard"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Access
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                                                                        <!--begin::Checkbox-->
                                                                                                        <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                        role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                                                                        <!--begin::Checkbox-->
                                                                                                        <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                        add-role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                                                                        <!--begin::Checkbox-->
                                                                                                        <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="edit-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                        edit-role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                                                                        <!--begin::Checkbox-->
                                                                                                        <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="update-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            update-role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->
                                        </tr>
                                        <!--end::Table row-->

                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">User Management</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="Read"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="Write"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="Create"
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->
                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->
                                        </tr>
                                        <!--end::Table row-->

                                        <!--begin::Table row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class=" text-gray-800">Content Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="Read1"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="Write1"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="Create1"
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">Financial Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">Reporting
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">Payroll
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">Disputes Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">API Controls
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">Database Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                            <!--begin::Table row-->
                                                    <tr>
                                                        <!--begin::Label-->
                                                        <td class=" text-gray-800">Repository Management
                                            </td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Read
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Write
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value=""
                                                            name="permission[]">
                                                        <span class="form-check-label" "="">
                                                                        Create
                                                                    </span>
                                                                </label>
                                                                <!--end::Checkbox-->
                                                            </div>
                                                            <!--end::Wrapper-->
                                                        </td>
                                                        <!--end::Options-->
                                                    </tr>
                                                    <!--end::Table row-->
                                                                                    </tbody>
                                            <!--end::Table body-->
                                        </table>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Table wrapper-->
                                </div>
                                <!--end::Permissions-->
                            </div>
                            <!--end::Scroll-->

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


    $.each($('#kt_modal_add_role_form [name="permission[]"]'), function() {        
        if ($.inArray($(this).val(), @json($permissions)) != -1) {
            // console.log($(this).val());
            $(this).prop('checked', true);
        }
    });


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