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
                    <h2>Edit Category</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->          
            
            <!--begin::Body-->
            <div class="card-body">
                <!--begin::Form-->
                <form action="{{route('update-category')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!--begin::Row-->
                    <div class="row gx-9 h-100">
                        <!--begin::Col-->
                        <div class="col-sm-6">
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">
                                <input type="hidden" name="category_id" id="category_id" value="{{$category->id}}">
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Branch</span>
                                    </label>
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="branch_id"
                                        id="branch_id" data-control="select2">
                                        <option value="">Select Branch</option>
                                        @foreach($branch as $branchs)
                                        <option value="{{$branchs->id}}" {{($branchs->id ==
                                            $category->branch_id)?'selected':''}}>{{$branchs->name}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('branch_id'))
                                    <span class="text-danger">{{ $errors->first('branch_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Category Name</span>
                                    </label>
                                    <!--end::Label-->
            
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Category Name"
                                        name="category_name" value="{{$category->category_name}}">
                                    <!--end::Input-->
                                    @if($errors->has('category_name'))
                                    <span class="text-danger">{{ $errors->first('category_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <div>
                                        <!--begin::Label-->
                                        <label class="fs-5 fw-bold form-label mb-2">
                                            <span class="required">Item Type</span>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--begin::Input-->
                                    <input class="form-check-input" name="item_type" type="radio" value="0" {{($category->item_type
                                    == "0")? 'checked':''}}>
                                    <span class="fw-semibold ps-2 fs-6">
                                        Live
                                    </span>
            
                                    <input class="form-check-input" name="item_type" type="radio" value="1" {{($category->item_type
                                    == "1")? 'checked':''}}>
                                    <span class="fw-semibold ps-2 fs-6">
                                        Ready to go
                                    </span>
                                    <!--end::Input-->
                                    @if($errors->has('item_type'))
                                    <span class="text-danger">{{ $errors->first('item_type') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Category Type</span>
                                    </label>
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="category_type"
                                        id="category_type" data-control="select2">
                                        <option value="">Select Category Type</option>
                                        <option value="Veg" {{($category->category_type == 'Veg')?'selected':''}}>Veg</option>
                                        <option value="Non-Veg" {{($category->category_type == 'Non-Veg')?'selected':''}}>Non-Veg
                                        </option>
                                        <option value="Beverages" {{($category->category_type ==
                                            'Beverages')?'selected':''}}>Beverages</option>
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('category_type'))
                                    <span class="text-danger">{{ $errors->first('category_type') }}</span>
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
                                        <span class="required">Select Counter</span>
                                    </label>
                                    <!--begin::Input-->
                                    <select class="form-select form-select-solid" aria-label="Select example" name="counter_id"
                                        id="counter_id" data-control="select2">
                                        <option value="">Select Counter</option>
                                        @foreach($counter as $counters)
                                        <option value="{{$counters->id}}" {{($counters->id ==
                                            $category->counter_id)?'selected':''}}>{{$counters->counter_name}}</option>
                                        @endforeach
                                    </select>
                                    <!--end::Input-->
                                    @if($errors->has('counter_id'))
                                    <span class="text-danger">{{ $errors->first('counter_id') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Category Image</span>
                                    </label>
                                    <!--end::Label-->
            
                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid" placeholder="Upload Category Image"
                                        title="Choose an Image please" name="category_image">
                                    <img width="155" src="{{asset('storage/upload/category')}}/{{$category->images}}">
                                    <!--end::Input-->
                                    @if($errors->has('category_image'))
                                    <span class="text-danger">{{ $errors->first('category_image') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select Menu</span>
                                    </label>
                                    <!--end::Label-->
                                    <br>
                                    <br>
                                    @foreach($menu as $menus)
                                    <label
                                        class="form-check form-check-custom form-check-inline form-check-solid me-5 form-check-success">
                                        <input class="form-check-input" name="menu_id[]" type="checkbox" value="{{$menus->id}}"
                                            {{(in_array($menus->id, $category_has_menu))?'checked':''}}>
                                        <span class="fw-semibold ps-2 fs-6">
                                            {{$menus->menu_name}}
                                        </span>
                                    </label>
                                    <br>
                                    <br>
                                    @endforeach
            
                                    <!--end::Input-->
                                    @if($errors->has('menu_id'))
                                    <span class="text-danger">{{ $errors->first('menu_id') }}</span>
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
                                <button type="submit" class="btn btn-lg btn-primary" data-kt-roles-modal-action="submit">
                                    <span class="indicator-label">
                                        Submit
                                    </span>
                                    <span class="indicator-progress">
                                        Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
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

    {{-- <!--begin::Col-->
    <div class="col-lg-12">
        <!--begin::Card widget 18-->
        <div class="card card-flush">
            
        </div>
        <!--end::Card widget 18-->
    </div>
    <!--end::Col--> --}}

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