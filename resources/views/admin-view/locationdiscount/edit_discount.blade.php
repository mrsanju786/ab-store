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
                    <h2>Edit Location Discount</h2>
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
                        <form action="{{route('update-location-discount')}}" method="POST" enctype="multipart/form-data">
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
                                        <span class="required">Discount Name</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Enter Discount Name"
                                        name="discount_name" value="{{$locationDiscount->discount_name}}">
                                    <!--end::Input-->
                                    @if($errors->has('discount_name'))
                                    <span class="text-danger">{{ $errors->first('discount_name') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                              

                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container datadisplay">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">Start Date</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->                                
                                        <div class="date-container">
                                            <input type="text" class="start-date form-control form-control-solid" placeholder="Enter Start Date"
                                        name="start_date" value="{{date('Y-m-d',strtotime($locationDiscount->start_date))}}" required>
                                            <i class="date-icon fa fa-calendar" aria-hidden="true"></i>
                                        </div>
                                    <!--end::Input-->
                                    @if($errors->has('start_date'))
                                    <span class="text-danger">{{ $errors->first('start_date') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->

                                  <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container datadisplay">
                                    <!--begin::Label-->
                                    <label class="fs-5 fw-bold form-label mb-2">
                                        <span class="required">End Date</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Input-->
                                    <div class="date-container">
                                        <input type="text" class="end-date form-control form-control-solid" placeholder="Enter End Date" name="end_date" value="{{date('Y-m-d',strtotime($locationDiscount->end_date))}}" required>
                                        <i class="date-icon fa fa-calendar" aria-hidden="true"></i>
                                    </div>  
                                    <!--end::Input-->
                                    @if($errors->has('end_date'))
                                    <span class="text-danger">{{ $errors->first('end_date') }}</span>
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
                                        <span class="required">Discount Percent</span>
                                    </label>
                                    <!--end::Label-->

                                    <!--begin::Input-->
                                    <input class="form-control form-control-solid" placeholder="Discount Percent"
                                        name="discount_percent" value="{{$locationDiscount->discount_percent}}">
                                    <!--end::Input-->
                                    @if($errors->has('discount_percent'))
                                    <span class="text-danger">{{ $errors->first('discount_percent') }}</span>
                                    @endif
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                
                                <!--begin::Input group-->
                                <div class="fv-row mb-10 fv-plugins-icon-container datadisplay">
                                <!--begin::Label-->
                                <label class="fs-5 fw-bold form-label mb-2">
                                    <span class="required">Select Location</span>
                                </label>
                                <!--begin::Input-->
                                <select class="form-select form-select-solid" aria-label="Select example" name="location_id" id="location_id" data-control="select2" >
                                        <option value="">Select Location</option>
                                        @foreach($location as $locations)
                                        <option value="{{$locations->id}}" {{($locationDiscount->location_id == $locations->id)? 'selected':''}}>{{$locations->address}}</option>
                                        @endforeach                                   
                                    </select>
                                <!--end::Input-->
                                @if($errors->has('location_id'))
                                <span class="text-danger">{{ $errors->first('location_id') }}</span>
                                @endif
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <!--end::Input group-->
                                <input type="hidden" name="locationDiscount_id" id="locationDiscount_id" value="{{$locationDiscount->id}}">
                               
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

<!-- start date and end date JS start-->
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.1/js/bootstrap-datepicker.min.js'></script>

<script>
$(".start-date").datepicker({
  templates: {
    leftArrow: '<i class="fa fa-chevron-left hover12"></i>',
    rightArrow: '<i class="fa fa-chevron-right hover12"></i>',
  },
  format: "yyyy/mm/dd",
  startDate: new Date(),
  keyboardNavigation: false,
  autoclose: true,
  todayHighlight: true,
  disableTouchKeyboard: true,
  orientation: "bottom auto",
});

$(".end-date").datepicker({
  templates: {
    leftArrow: '<i class="fa fa-chevron-left hover12"></i>',
    rightArrow: '<i class="fa fa-chevron-right hover12"></i>',
  },
  format: "yyyy/mm/dd",
  startDate: moment().add(0, "days").toDate(),
  keyboardNavigation: false,
  autoclose: true,
  todayHighlight: true,
  disableTouchKeyboard: true,
  orientation: "bottom auto",
});

$(".start-date")
  .datepicker()
  .on("changeDate", function () {
    var startDate = $(".start-date").datepicker("getDate");
    var oneDayFromStartDate = moment(startDate).add(0, "days").toDate();
    $(".end-date").datepicker("setStartDate", oneDayFromStartDate);
    $(".end-date").datepicker("setDate", oneDayFromStartDate);
  });


$(".end-date")
.datepicker()
.on("show", function () {
var startDate = $(".start-date").datepicker("getDate");
$(".day.disabled")
    .filter(function (index) {
    return $(this).text() === moment(startDate).format("D");
    })
    .addClass("active");
});
</script>
<!-- start date and end date JS end-->
@endsection