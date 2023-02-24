@extends('user-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<div class="row pt-5"  >
<!--begin::main-->
    <div class="col-lg-12 col-12"> 
        <div class="row">               
            <div class="col-md-12 mx-auto">
                <div class="card card-flush h-md-100" id="kt_modal_add_role">
                    <div class="row card-header">
                        <div class="col-md-12 mx-auto">
                            <!--begin::Card title-->
                                <div class="card-title pt-5">
                                    <h1>All Counter</h1>                            
                                </div>
                            <!--end::Card title-->
                        </div>
                        <div class="col-md-12 mx-auto">
                            <!--begin::menu-->
                            <div class="mt-5 d-flex justify-content-start">
                                <!--begin::Card body-->
                                <div class="card-body ">                        
                                    <!--begin::Row-->
                                    <div class="row gx-9 h-100">                        
                                        <!--begin::Col-->
                                        @foreach($counter as $counters)
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 pt-md-5">
                                            <a href="{{route('all_menu', [base64_encode($counters->id)])}}" class="text-dark fw-bold">
                                            <div class="card counter-card text-center">
                                                <div class="pt-4">
                                                    <img src="{{asset('admin_site/assets/media/product-new/card-1.png')}}" class="img-fluid  w-50">                                        
                                                </div>                                    
                                                <div class="card-body pt-7">
                                                    <div class="counter-name">{{$counters->counter_name}}</div>                                                                  
                                                </div>
                                            </div>
                                            </a>
                                        </div>
                                        @endforeach 
                                        <!--end::Col--> 
                                    </div>
                                    <!--end::Row-->                            
                                </div>
                                <!--end::Card body--> 
                            </div>
                            <!--end::menu-->
                        </div>    
                    </div>
                </div>                
            </div>
        </div>
    </div>
<!--end::main-->
</div>

@endsection
@section('scripts')
@endsection