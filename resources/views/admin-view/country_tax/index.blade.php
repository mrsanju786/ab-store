@extends('admin-view.layouts.main')
@section('title')
<title>Foodisoft | Dashboard</title>
@endsection
@section('content')

<!--begin::Tables Widget 9-->
<div class="card mb-5 mb-xl-8">
    <!--begin::Header-->
    <div class="card-header border-0 pt-5">
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold fs-3 mb-1">Country Tax List</span>
        </h3>

        <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
            data-bs-original-title="Click to add a user" data-kt-initialized="1">
            <a href="{{route('add-countrytax')}}" class="btn btn-sm btn-light btn-active-primary">
                <!--begin::Svg Icon | path: icons/duotune/arrows/arr075.svg-->
                <span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                            transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                    </svg></span>
                <!--end::Svg Icon--> Add Country Tax
            </a>
        </div>
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body py-3">
        <!--begin::Table container-->
        <div class="table-responsive">
            <!--begin::Table-->
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <!--begin::Table head-->
                <thead>
                    <tr class="fw-bold text-muted">
                        <th class="min-w-50px">#</th>
                        <th class="min-w-150px">Country Tax Name</th>
                        <th class="min-w-150px">Country Tax Percent</th>
                        <th class="min-w-150px">Country</th>
                        <th class="min-w-150px">Status</th>
                        <th class="min-w-100px text-end">Actions</th>
                    </tr>
                </thead>
                <!--end::Table head-->

                <!--begin::Table body-->
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($countrytax as $countrytaxs)
                    <tr>
                        <td>
                            <span class="text-dark fw-bold d-block fs-7">{{$i}}</span>
                        </td>

                        <td>
                            <span class="text-dark fw-bold d-block fs-6">{{$countrytaxs->name}}</span>
                        </td>

                        <td>
                            <span class="text-dark fw-bold d-block fs-6">{{$countrytaxs->tax_percent}}</span>
                        </td>

                        <td>
                            <span class="text-dark fw-bold d-block fs-6">{{$countrytaxs->country->country_name}}</span>
                        </td>

                        <td>
                            @if($countrytaxs->is_active == 1)
                            <span class="text-dark fw-bold d-block fs-6"><button class="btn btn-success btn-sm" onclick="location.href='{{route('countrytax-status',[$countrytaxs['id'],0])}}'" title="click to deactive">Active</button></span>
                            @else
                            <span class="text-dark fw-bold d-block fs-6"><button class="btn btn-danger btn-sm" onclick="location.href='{{route('countrytax-status',[$countrytaxs['id'],1])}}'" title="click to active">Deactive</button></span>
                            @endif
                        </td>

                        <td>
                            <div class="d-flex justify-content-end flex-shrink-0">
                                <a href="{{route('edit-countrytax',[base64_encode($countrytaxs['id'])])}}" class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <!--begin::Svg Icon | path: icons/duotune/art/art005.svg-->
                                    <span class="svg-icon svg-icon-3"><svg width="24" height="24" viewBox="0 0 24 24"
                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                    <!--end::Svg Icon-->
                                </a>
                            </div>
                        </td>
                    </tr>
                    @php($i++)
                    @endforeach
                </tbody>
                <!--end::Table body-->
            </table>
            <!--end::Table-->
        </div>
        <!--end::Table container-->
    </div>
    <!--begin::Body-->
</div>
<!--end::Tables Widget 9-->

@endsection

@section('scripts')
@endsection