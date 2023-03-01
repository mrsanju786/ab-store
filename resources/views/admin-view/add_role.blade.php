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
                    <h2>Add a Role</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->

            <!--begin::Card body-->
            <div class="card-body pt-1">
                <!--begin::Form-->
                <form id="kt_modal_add_role_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                    action="{{route('create-role')}}" method="POST">
                    @csrf
                    <!--begin::Scroll-->
                    <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">

                        <!--begin::Row-->
                        <div class="row row-cols-1 row-cols-sm-2 rol-cols-md-1 row-cols-lg-2">
                            <!--begin::Col-->
                            <div class="col">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2 pt-3">
                                        <span class="required">Role Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter a Role Name"
                                        name="role_name">
                                    <!--end::Input-->
                                    @if($errors->has('role_name'))
                                    <span class="text-danger">{{ $errors->first('role_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col">

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->

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
                                        <!--begin::Administrator Access row-->
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
                                                <label
                                                    class="form-check form-check-custom form-check-solid form-check-success me-9 form-check-success">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="kt_roles_select_all">
                                                    <span class="form-check-label" for="kt_roles_select_all">
                                                        Select All
                                                    </span>
                                                </label>
                                                <!--end::Checkbox-->
                                            </td>
                                        </tr>
                                        <!--end::Administrator Access row-->

                                        <!--begin::Dashboard row-->
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
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            Access
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add Role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit Role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update Role
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Dashboard row-->

                                        <!--begin::Company row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Company</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Company row-->

                                        <!--begin::Master Setting row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800 align-top">Master Setting</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>                                                
                                                <!--begin::Table-->
                                                    <table class="table align-middle table-row-dashed fs-6 gy-5">
                                                        <!--begin::Table body-->
                                                        <tbody class="text-gray-600 fw-semibold">
                                                            
                                                            <!--begin::Country row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">Country</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::Country row-->

                                                            <!--begin::State row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">State</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::State row-->

                                                            <!--begin::City row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">City</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::City row-->

                                                            <!--begin::Region row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">Region</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::Region row-->
                                                            
                                                            <!--begin::License row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">License</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::License row-->
                                                            
                                                            <!--begin::Currency row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">Currency</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::Currency row-->
                                                            
                                                            <!--begin::Timezone row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">Timezone</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::Timezone row-->
                                                            
                                                            <!--begin::Country Tax row-->
                                                            <tr>
                                                                <!--begin::Label-->
                                                                <td class="text-gray-800">Country Tax</td>
                                                                <!--end::Label-->
                                                                <!--begin::Options-->
                                                                <td>
                                                                    <!--begin::Wrapper-->
                                                                    <div class="d-flex">
                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="dashboard" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                View
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="add-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Add
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="edit-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Edit
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                        <!--begin::Checkbox-->
                                                                        <label
                                                                            class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                                            <input class="form-check-input" type="checkbox" value="update-role" name="permission[]">
                                                                            <span class="form-check-label">
                                                                                Update
                                                                            </span>
                                                                        </label>
                                                                        <!--end::Checkbox-->

                                                                    </div>
                                                                    <!--end::Wrapper-->
                                                                </td>
                                                                <!--end::Options-->
                                                            </tr>
                                                            <!--end::Country Tax row-->
                                                            
                                                        </tbody>
                                                        <!--begin::Table body-->
                                                    </table>
                                                <!--begin::Table-->
                                            </td>
                                            <!--end::Options-->
                                        </tr>
                                        <!--end::Master Setting row-->

                                        <!--begin::Branch row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Branch</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Branch row-->

                                        <!--begin::Location row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Location</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Location row-->

                                        <!--begin::Area row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Area</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Area row-->

                                        <!--begin::Location Discount row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Location Discount</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Location Discount row-->

                                        <!--begin::Counter row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Counter</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Counter row-->

                                        <!--begin::Menu row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Menu</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Menu row-->

                                        <!--begin::Category row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Category</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Category row-->                                        

                                        <!--begin::Dish row-->
                                        <tr>
                                            <!--begin::Label-->
                                            <td class="text-gray-800">Dish</td>
                                            <!--end::Label-->

                                            <!--begin::Options-->
                                            <td>
                                                <!--begin::Wrapper-->
                                                <div class="d-flex">
                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="dashboard" name="permission[]">
                                                        <span class="form-check-label">
                                                            View
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox" value="add-role"
                                                            name="permission[]">
                                                        <span class="form-check-label">
                                                            Add
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="edit-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Edit
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                    <!--begin::Checkbox-->
                                                    <label
                                                        class="form-check form-check-sm form-check-custom form-check-solid form-check-success me-5 me-lg-20">
                                                        <input class="form-check-input" type="checkbox"
                                                            value="update-role" name="permission[]">
                                                        <span class="form-check-label">
                                                            Update
                                                        </span>
                                                    </label>
                                                    <!--end::Checkbox-->

                                                </div>
                                                <!--end::Wrapper-->
                                            </td>
                                            <!--end::Options-->

                                        </tr>
                                        <!--end::Dish row-->

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
                    <div class=" text-left pt-3">
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
    $(document).ready(function () {
        $('#kt_modal_add_role_form #kt_roles_select_all').on('click', function () {

            if ($(this).is(':checked')) {
                $.each($('#kt_modal_add_role_form [name="permission[]"]'), function () {
                    $(this).prop('checked', true);
                });
            } else {
                $.each($('#kt_modal_add_role_form [name="permission[]"]'), function () {
                    $(this).prop('checked', false);
                });
            }

        });
    });
</script>
@endsection