<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Foodisoft | Admin-Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="shortcut icon" href="{{ asset('admin_site/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    {{-- <link href="" type="text/css" /> --}}
    <link href="{{ asset('admin_site/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin_site/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->
</head>

<body class="login_page admin_login_page">

    {{-- <div class="page-wrapper chiller-theme toggled">
        <main class="page-content">
            <div class="container">
                <div class="row justify-content-center login_area">
                    <div class="col-md-4 login_page_form">
                        <div class="form_logo">
                            <img src="{{ asset('admin/assets/images/logo.png') }}" alt="">
                            <h5>LOGIN TO YOUR ACCOUNT</h5>
                        </div>
                        <form class="loginuser" action="{{url('admin/create-login')}}" method="POST" id="logForm">
                        @csrf
                            <div class="form-group">
                            <input type="email" class="form-control form-control-user" id="email" name="email"  placeholder="Enter Email Address...">
                                @if ($errors->has('email'))
                                <span class="error">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                            </div>
                            
                            <button class="btn btn-block login_btn" type="submit">Sign In</button>
                        </form>
                        @if(session()->has('message'))
                            <div class="alert alert-danger form_error_alert">
                                {{ session()->get('message') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </div> --}}

    <!--begin::Theme mode setup on page load-->

    <script>
        var defaultThemeMode = "light"; var themeMode; if (document.documentElement) { if (document.documentElement.hasAttribute("data-theme-mode")) { themeMode = document.documentElement.getAttribute("data-theme-mode"); } else { if (localStorage.getItem("data-theme") !== null) { themeMode = localStorage.getItem("data-theme"); } else { themeMode = defaultThemeMode; } } if (themeMode === "system") { themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light"; } document.documentElement.setAttribute("data-theme", themeMode); } 
    </script>
    <!--end::Theme mode setup on page load-->

    <!--begin::Root-->
<body id="kt_body" class="app-blank app-blank bgi-size-cover bgi-position-center bgi-no-repeat">
    <!--begin::Page bg image-->
    <style>
        body { background-color: #f8f7fc;  background-position: center; }  
    </style>
    <!--end::Page bg image-->
    <!--begin::Authentication - Sign-in -->
    <div class="d-flex flex-column flex-column-fluid flex-lg-row">
        <!--begin::Aside-->
        <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
            <!--begin::Aside-->
            <div class="d-flex flex-center flex-lg-start flex-column">
                <!--begin::Logo-->
                <a href="#" class="mb-7">
                    <img alt="Logo" src="{{ asset('admin_site/assets/media/logos/foodiisoft-logo-new.png') }}" width="350"  />
                </a>
                <!--end::Logo-->
                <!--begin::Title-->
                <h2 class="text-white fw-normal m-0">Branding tools designed for your business</h2>
                <!--end::Title-->
            </div>
            <!--begin::Aside-->
        </div>
        <!--begin::Aside-->
        <!--begin::Body-->
        <div class="d-flex flex-center w-lg-50 p-10">
            <!--begin::Card-->
            <div class="card rounded-3 w-md-550px">
                <!--begin::Card body-->
                <div class="card-body p-10 p-lg-20">
                    <!--begin::Form-->

                    <form class="form w-100" novalidate="novalidate" id="kt_sign_up_form"
                    data-kt-redirect-url="#" action="{{url('admin/create-login')}}" method="POST"  >
                        @csrf
                        <!--begin::Heading-->
                        <div class="text-center mb-11">
                            <!--begin::Title-->
                            <h1 class="text-dark fw-bolder mb-3">Sign In</h1>
                            <!--end::Title-->
                        </div>
                        <!--end::Heading-->
                         
                        <!--begin::Input group=-->
                        <div class="fv-row mb-8">
                            <!--begin::Email-->
                            <input type="email" class="form-control bg-transparent" placeholder="Email" name="email" autocomplete="off">
                            @if ($errors->has('email'))
                            <span class="error">{{ $errors->first('email') }}</span>
                            @endif
                            <!--end::Email-->
                        </div>
                        <!--end::Input group=-->
                        <div class="fv-row mb-3">
                            <!--begin::Password-->
                            <input type="password" placeholder="Password" name="password" autocomplete="off"
                            class="form-control bg-transparent">
                            @if ($errors->has('password'))
                                <span class="error">{{ $errors->first('password') }}</span>
                            @endif
                            <!--end::Password-->
                        </div>
                        <!--end::Input group=-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                            <div></div>
                            <!--begin::Link-->
                            <a href="#"
                                class="link-primary">Forgot Password ?</a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->
                        <!--begin::Submit button-->
                        <div class="d-grid mb-10">
                            <button type="submit" id="kt_sign_in_submit" class="btn btn-primary">
                                <!--begin::Indicator label-->
                                <span class="indicator-label">Sign In</span>
                                <!--end::Indicator label-->
                                <!--begin::Indicator progress-->
                                <span class="indicator-progress">Please wait...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                <!--end::Indicator progress-->
                            </button>
                        </div>
                        <!--end::Submit button-->
                        <!--begin::Sign up-->
                        {{-- <div class="text-gray-500 text-center fw-semibold fs-6">Not a Member yet?
                            <a href="#"
                                class="link-primary">Sign up</a>
                        </div>                           --}}
                        <!--end::Sign up-->
                    </form>
                    @if(session()->has('message'))
                    <div class="alert alert-primary form_error_alert">
                        {{ session()->get('message') }}
                    </div>
                    @endif
                    <!--end::Form-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
        </div>
        <!--end::Body-->
    </div>
    <!--end::Authentication - Sign-in-->
</div>
<!--end::Root-->

<!--begin::Javascript-->
<script>var hostUrl = "assets/";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{ asset('admin_site/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('admin_site/assets/js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="{{ asset('admin_site/assets/js/custom/authentication/sign-up/general.js') }}"></script>
<!--end::Custom Javascript-->
<!--end::Javascript-->

</body>
</html>