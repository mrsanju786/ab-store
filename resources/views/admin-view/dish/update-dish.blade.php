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
                            <h2>Update Dish</h2>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--end::Card header-->

                    <!--begin::Card body-->
                    <div class="card-body pt-1">
                        <!--begin::Form-->
                        <form action="{{route('update-dish-excel')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Select File</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input type="file" class="form-control form-control-solid"
                                        name="file">
                                    <!--end::Input-->
                                    @if($errors->has('file'))
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
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

                                <div class="text-left pt-3">
                                    Export all Product By Clicking On - <a class="btn btn-warning btn-sm" href="{{route('export-dish')}}">Export All</a>
                                </div>
                            </div>
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Card body-->                
                </div>                
            </div>
        </div>
    </div>

    {{--<div class="col-lg-6 col-12">         
        <div class="row ">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">                                                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header py-7">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                    <h2>Variants  </h2>
                                </div>
                                <!--end::Card title-->   
                                <!--begin::Create campaign button-->
                                <div class="card-toolbar">
                                    <a href="#" type="button" class="btn btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <div class="d-flex justify-content-between">
                                    <div class="fw-bold">Name  </div>
                                    <div class="fw-bold">Price </div>
                                    <div class="fw-bold">For  </div>
                                </div>
                            </div>                                
                            <!--end::Body-->
                        </div> 
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-6">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">                                                     
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-header py-7">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                    <h2>Extras  </h2>
                                </div>
                                <!--end::Card title-->   
                                <!--begin::Create campaign button-->
                                <div class="card-toolbar">
                                    <a href="#" type="button" class="btn  btn-sm btn-primary"  data-bs-toggle="modal" data-bs-target="#kt_modal_create_campaign">Add</a>
                                </div>
                                <!--end::Create campaign button-->
                            </div>                               
                        </div> 

                        <div class="col-md-12">
                            <!--begin::Body-->
                            <div class="card-body pt-5">
                                <div class="d-flex justify-content-between">
                                    <div class="fw-bold">Name  </div>
                                    <div class="fw-bold">Price </div>
                                    <div class="fw-bold">For  </div>
                                    </div>
                            </div>                                
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>--}}

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

$('#counter_id').on('change', function(){
    var counter_id = $(this).val();
    $('#category_id option:gt(0)').remove();
    if(counter_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-category') }}/" + counter_id,
            type: "GET",
            success: function(response) {
                $.each(response,function(key, value)
                {
                    $("#category_id").append('<option value=' + value.id + '>' + value.category_name + '</option>');
                });
            }
        });
    }
});

$('#category_id').on('change', function(){
    var category_id = $(this).val();
    $('#tax_id option:gt(0)').remove();
    if(category_id){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "{{ url('admin/get-branch-tax') }}/" + category_id,
            type: "GET",
            success: function(response) {
                $.each(response,function(key, value)
                {
                    $("#tax_id").append('<option value=' + value.id + '>' + value.name + '</option>');
                });
            }
        });
    }
});

</script>
@endsection