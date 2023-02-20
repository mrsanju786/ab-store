@extends('admin-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')


<div class="row">

    <div class="col-lg-6 col-12"> 
        <div class="row">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">
                    <!--begin::Card header-->
                    <div class="card-header">
                        <!--begin::Card title-->
                        <div class="card-title">
                            <h2>Edit Option</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Form-->
                        <form action="{{route('update-option')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!--begin::Scroll-->
                            <div class="d-flex flex-column scroll-y me-n7 pe-7" id="kt_modal_add_role_scroll">


                            <input type="hidden" class="form-control form-control-solid" name="option_id" value="{{$option->id}}">

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Option Name</span>
                                    </label>
                                    <!--end::Label-->
                                
                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Option Name"
                                        name="option_name" value="{{$option->option_name}}">
                                    <!--end::Input-->
                                    @if($errors->has('option_name'))
                                    <span class="text-danger">{{ $errors->first('option_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Option Value</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="text" class="form-control form-control-solid" placeholder="Enter Option Value"
                                        name="option_value" value="{{$option->option_value}}">
                                    <!--end::Input-->
                                    @if($errors->has('option_value'))
                                    <span class="text-danger">{{ $errors->first('option_value') }}</span>
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
            </div>
        </div>
    </div>

</div>




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

$('#country_id').on('change', function(){
    var country_id = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/master/get-state') }}/" + country_id,
        type: "GET",
        success: function(response) {
            $.each(response,function(key, value)
            {
                $("#state_id").append('<option value=' + value.id + '>' + value.state_name + '</option>');
            });
        }
    });
});

$('#state_id').on('change', function(){
    var state_id = $(this).val();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "{{ url('admin/master/get-city') }}/" + state_id,
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