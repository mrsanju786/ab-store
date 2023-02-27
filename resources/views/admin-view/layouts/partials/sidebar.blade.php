<div id="kt_app_sidebar" class="app-sidebar flex-column" data-kt-drawer="true" data-kt-drawer-name="app-sidebar"
    data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="225px"
    data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Logo-->
    <div class="app-sidebar-logo px-6" id="kt_app_sidebar_logo">
        <!--begin::Logo image-->
        <a href="{{route('dashboard')}}">
            <img alt="Logo" src="{{asset('admin_site/assets/media/logos/foodiisoft-logo-new.png')}}"
                class="h-25px app-sidebar-logo-default" />
            <img alt="Logo" src="{{asset('admin_site/assets/media/logos/foodiisoft-logo-new.png')}}"
                class="h-10px app-sidebar-logo-minimize" />
        </a>
        <!--end::Logo image-->
        <!--begin::Sidebar toggle-->
        <div id="kt_app_sidebar_toggle"
            class="app-sidebar-toggle btn btn-icon btn-shadow btn-sm btn-color-muted btn-active-color-primary body-bg h-30px w-30px position-absolute top-50 start-100 translate-middle rotate"
            data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
            data-kt-toggle-name="app-sidebar-minimize">
            <!--begin::Svg Icon | path: icons/duotune/arrows/arr079.svg-->
            <span class="svg-icon svg-icon-2 rotate-180">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5"
                        d="M14.2657 11.4343L18.45 7.25C18.8642 6.83579 18.8642 6.16421 18.45 5.75C18.0358 5.33579 17.3642 5.33579 16.95 5.75L11.4071 11.2929C11.0166 11.6834 11.0166 12.3166 11.4071 12.7071L16.95 18.25C17.3642 18.6642 18.0358 18.6642 18.45 18.25C18.8642 17.8358 18.8642 17.1642 18.45 16.75L14.2657 12.5657C13.9533 12.2533 13.9533 11.7467 14.2657 11.4343Z"
                        fill="currentColor" />
                    <path
                        d="M8.2657 11.4343L12.45 7.25C12.8642 6.83579 12.8642 6.16421 12.45 5.75C12.0358 5.33579 11.3642 5.33579 10.95 5.75L5.40712 11.2929C5.01659 11.6834 5.01659 12.3166 5.40712 12.7071L10.95 18.25C11.3642 18.6642 12.0358 18.6642 12.45 18.25C12.8642 17.8358 12.8642 17.1642 12.45 16.75L8.2657 12.5657C7.95328 12.2533 7.95328 11.7467 8.2657 11.4343Z"
                        fill="currentColor" />
                </svg>
            </span>
            <!--end::Svg Icon-->
        </div>
        <!--end::Sidebar toggle-->
    </div>
    <!--end::Logo-->
    <!--begin::sidebar menu-->
    <div class="app-sidebar-menu overflow-hidden flex-column-fluid">
        <!--begin::Menu wrapper-->
        <div id="kt_app_sidebar_menu_wrapper" class="app-sidebar-wrapper hover-scroll-overlay-y my-5"
            data-kt-scroll="true" data-kt-scroll-activate="true" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
            data-kt-scroll-wrappers="#kt_app_sidebar_menu" data-kt-scroll-offset="5px" data-kt-scroll-save-state="true">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu"
                data-kt-menu="true" data-kt-menu-expand="false">
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/dashboard') ? 'active' : '' }}" href="{{route('dashboard')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Dashboard</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                {{-- <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/user') ? 'active' : '' }}" href="{{route('dashboard')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">User</span>
                    </a>
                    <!--end:Menu link-->
                </div> --}}

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/role') ? 'active' : '' }}" href="{{route('role')}}">
                        <span class="menu-icon">
                            <i class="bi bi-people fs-3"></i>

                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            {{-- <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span> --}}
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Role</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                {{--<div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/foodlicense-list') ? 'active' : '' }}" href="{{route('foodlicense_list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Food License</span>
                    </a>
                    <!--end:Menu link-->
                </div> --}}

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion  {{ request()->is('admin/master/*') ? 'show' : '' }}">
                <!--begin:Menu link-->
                <span class="menu-link">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/communication/com005.svg-->
                        <span class="svg-icon svg-icon-2">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"></path>
                            <path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Master Setting</span><span class="menu-arrow"></span>
                </span>
                <!--end:Menu link--><!--begin:Menu sub-->
                <div class="menu-sub menu-sub-accordion {{ request()->is('admin/master/*') ? 'show' : '' }}" kt-hidden-height="242" style=" ">
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('country_list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Country</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('state_list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">State</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('city_list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">City</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('region_list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Region</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item--><!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('license-list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">License</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('currency-list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Currency</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('timezone-list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Timezone</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->

                    <!--begin:Menu item-->
                    <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link" href="{{route('countrytax-list')}}">
                            <span class="menu-bullet">
                                <span class="bullet bullet-dot"></span>
                            </span>
                            <span class="menu-title">Country Tax</span>
                        </a>
                        <!--end:Menu link-->
                    </div>
                    <!--end:Menu item-->
                </div>
                <!--end:Menu sub-->
                </div>
                
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/company-list') ? 'active' : '' }}" href="{{route('company_list')}}">
                        <span class="menu-icon">                            
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                                <i class="bi bi-briefcase fs-3"></i>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Company</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/branch-list') ? 'active' : '' }}" href="{{route('branch_list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3.5,21 L20.5,21 C21.3284271,21 22,20.3284271 22,19.5 L22,8.5 C22,7.67157288 21.3284271,7 20.5,7 L10,7 L7.43933983,4.43933983 C7.15803526,4.15803526 6.77650439,4 6.37867966,4 L3.5,4 C2.67157288,4 2,4.67157288 2,5.5 L2,19.5 C2,20.3284271 2.67157288,21 3.5,21 Z" fill="currentColor" opacity="0.3"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Branch</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/location_list') ? 'active' : '' }}" href="{{route('location_list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                           <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">                                
                                    <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" fill="currentColor" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) "/>
                                </svg>
                            </span> 
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Location</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                {{--<div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/tax-list') ? 'active' : '' }}" href="{{route('tax-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Tax</span>
                    </a>
                    <!--end:Menu link-->
                </div> --}}

                {{--<div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/location-tax-list') ? 'active' : '' }}" href="{{route('location-tax-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Location Tax</span>
                    </a>
                    <!--end:Menu link-->
                </div>--}}

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/area_list') ? 'active' : '' }}" href="{{route('area_list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Area</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/location-discount-list') ? 'active' : '' }}" href="{{route('location-discount-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <polygon fill="currentColor" opacity="0.3" points="12 20.0218549 8.47346039 21.7286168 6.86905972 18.1543453 3.07048824 17.1949849 4.13894342 13.4256452 1.84573388 10.2490577 5.08710286 8.04836581 5.3722735 4.14091196 9.2698837 4.53859595 12 1.72861679 14.7301163 4.53859595 18.6277265 4.14091196 18.9128971 8.04836581 22.1542661 10.2490577 19.8610566 13.4256452 20.9295118 17.1949849 17.1309403 18.1543453 15.5265396 21.7286168"/>
                                    <polygon fill="currentColor" points="14.0890818 8.60255815 8.36079737 14.7014391 9.70868621 16.049328 15.4369707 9.950447"/>
                                    <path d="M10.8543431,9.1753866 C10.8543431,10.1252593 10.085524,10.8938719 9.13585777,10.8938719 C8.18793881,10.8938719 7.41737243,10.1252593 7.41737243,9.1753866 C7.41737243,8.22551387 8.18793881,7.45690126 9.13585777,7.45690126 C10.085524,7.45690126 10.8543431,8.22551387 10.8543431,9.1753866" fill="currentColor" opacity="0.3"/>
                                    <path d="M14.8641422,16.6221564 C13.9162233,16.6221564 13.1456569,15.8535438 13.1456569,14.9036711 C13.1456569,13.9520555 13.9162233,13.1851857 14.8641422,13.1851857 C15.8138085,13.1851857 16.5826276,13.9520555 16.5826276,14.9036711 C16.5826276,15.8535438 15.8138085,16.6221564 14.8641422,16.6221564 Z" fill="currentColor" opacity="0.3"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Location Discount</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/counter-list') ? 'active' : '' }}" href="{{route('counter-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z" fill="currentColor" opacity="0.3"/>
                                    <path d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Counter</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                
                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/menu-list') ? 'active' : '' }}" href="{{route('menu-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <path d="M6,3 L6.45024814,7.5024814 C6.47849172,7.78491722 6.71615552,8 7,8 C7.28384448,8 7.52150828,7.78491722 7.54975186,7.5024814 L8,3 L9,3 L9.45024814,7.5024814 C9.47849172,7.78491722 9.71615552,8 10,8 C10.2838445,8 10.5215083,7.78491722 10.5497519,7.5024814 L11,3 L12,3 L12,7.5 C12,9.43299662 10.4329966,11 8.5,11 C6.56700338,11 5,9.43299662 5,7.5 L5,3 L6,3 Z" fill="currentColor"/>
                                        <path d="M8.5,13 L8.5,13 C9.06103732,13 9.52434927,13.4382868 9.55547002,13.9984604 L9.91679497,20.5023095 C9.96026576,21.2847837 9.36118509,21.9543445 8.57871083,21.9978153 C8.55249915,21.9992715 8.5262521,22 8.5,22 L8.5,22 C7.71631915,22 7.0810203,21.3647011 7.0810203,20.5810203 C7.0810203,20.5547682 7.08174882,20.5285212 7.08320503,20.5023095 L7.44452998,13.9984604 C7.47565073,13.4382868 7.93896268,13 8.5,13 Z" fill="currentColor" opacity="0.3"/>
                                        <path d="M17.5,15 L17.5,15 C18.0634495,15 18.5311029,15.4354411 18.571247,15.9974587 L18.8931294,20.503812 C18.9480869,21.2732161 18.3689134,21.9414932 17.5995092,21.9964506 C17.5663922,21.9988161 17.5332014,22 17.5,22 L17.5,22 C16.7286356,22 16.1033212,21.3746856 16.1033212,20.6033212 C16.1033212,20.5701198 16.1045051,20.536929 16.1068706,20.503812 L16.428753,15.9974587 C16.4688971,15.4354411 16.9365505,15 17.5,15 Z" fill="currentColor" opacity="0.3"/>
                                        <path d="M19,3 L19,13 L15,13 L15,7 C15,4.790861 16.790861,3 19,3 Z" fill="currentColor"/>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Menu</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/category-list') ? 'active' : '' }}" href="{{route('category-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2"><svg width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <rect x="2" y="2" width="9" height="9" rx="2" fill="currentColor"></rect>
                                    <rect opacity="0.3" x="13" y="2" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="13" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                    <rect opacity="0.3" x="2" y="13" width="9" height="9" rx="2" fill="currentColor">
                                    </rect>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Category</span>
                    </a>
                    <!--end:Menu link-->
                </div>

                <div class="menu-item">
                    <!--begin:Menu link-->
                    <a class="menu-link {{ request()->is('admin/dish-list') ? 'active' : '' }}" href="{{route('dish-list')}}">
                        <span class="menu-icon">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen014.svg-->
                            <span class="svg-icon svg-icon-2">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3,16 L21,16 C21,18.209139 19.209139,20 17,20 L7,20 C4.790861,20 3,18.209139 3,16 Z M3,11 L21,11 L21,12 C21,13.1045695 20.1045695,14 19,14 L5,14 C3.8954305,14 3,13.1045695 3,12 L3,11 Z" fill="currentColor"/>
                                    <path d="M3,5 L21,5 L21,7 C21,8.1045695 20.1045695,9 19,9 L5,9 C3.8954305,9 3,8.1045695 3,7 L3,5 Z" fill="currentColor" opacity="0.3"/>
                                </svg>                                
                            </span>
                            <!--end::Svg Icon-->
                        </span>
                        <span class="menu-title">Dish</span>
                    </a>
                    <!--end:Menu link-->
                </div>
                
            </div>
            <!--end::Menu-->
        </div>
        <!--end::Menu wrapper-->
    </div>
    <!--end::sidebar menu-->
    <!--begin::Footer-->
    <div class="app-sidebar-footer flex-column-auto pt-2 pb-6 px-6" id="kt_app_sidebar_footer">

    </div>
    <!--end::Footer-->
</div>