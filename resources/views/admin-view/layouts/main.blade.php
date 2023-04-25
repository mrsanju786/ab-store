<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    @yield('title')
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Voxo admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Voxo admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="{{asset('admin_site/assets/images/favicon.png')}}" type="image/x-icon">
    <link rel="shortcut icon" href="{{asset('admin_site/assets/images/favicon.png')}}" type="image/x-icon">
    <title>Voxo - Dashboard</title>

    <!-- Google font-->assets/images/favicon.png
    <link
        href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200&family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="{{asset('admin_site/assets/css/linearicon.css')}}">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vendors/font-awesome.css')}}">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vendors/themify.css')}}">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/ratio.css')}}">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vendors/feather-icon.css')}}">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vendors/scrollbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vendors/animate.css')}}">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vendors/bootstrap.css')}}">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/vector-map.css')}}">

    <!-- slick slider css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/slick-theme.css')}}">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/style.css')}}">

    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin_site/assets/css/responsive.css')}}">

    
</head>

<body>
<!-- tap on top start -->
<div class="tap-top">
    <span class="lnr lnr-chevron-up"></span>
</div>

<div class="page-wrapper compact-wrapper dark-sidebar" id="pageWrapper">   
<!-- Page Body Start-->
    <!-- header inside -->
    @include('admin-view.layouts.partials.header')
    <div class="page-body-wrapper">
        <!-- sidebar inside -->
        @include('admin-view.layouts.partials.sidebar')
        <div class="">
           <!-- content inside -->
           @yield('content')
           <!-- footer inside -->
           @include('admin-view.layouts.partials.footer')
        </div>
    </div>    
</div>     
<!-- latest js -->
<script src="{{asset('admin_site/assets/js/jquery-3.6.0.min.js')}}"></script>

<!-- Bootstrap js -->
<script src="{{asset('admin_site/assets/js/bootstrap/bootstrap.bundle.min.js')}}"></script>

<!-- feather icon js -->
<script src="{{asset('admin_site/assets/js/icons/feather-icon/feather.min.js')}}"></script>
<script src="{{asset('admin_site/assets/js/icons/feather-icon/feather-icon.js')}}"></script>

<!-- scrollbar simplebar js -->
<script src="{{asset('admin_site/assets/js/scrollbar/simplebar.js')}}"></script>
<script src="{{asset('admin_site/assets/js/scrollbar/custom.js')}}"></script>

<!-- Sidebar jquery -->
<script src="{{asset('admin_site/assets/js/config.js')}}"></script>

<!-- tooltip init js -->
<script src="{{asset('admin_site/assets/js/tooltip-init.js')}}"></script>

<!-- Plugins JS -->
<script src="{{asset('admin_site/assets/js/sidebar-menu.js')}}"></script>
<script src="{{asset('admin_site/assets/js/notify/bootstrap-notify.min.js')}}"></script>
<script src="{{asset('admin_site/assets/js/notify/index.js')}}"></script>

<!-- Apexchar js -->
<script src="{{asset('admin_site/assets/js/chart/apex-chart/apex-chart1.js')}}"></script>
<script src="{{asset('admin_site/assets/js/chart/apex-chart/moment.min.js')}}"></script>
<script src="{{asset('admin_site/assets/js/chart/apex-chart/apex-chart.js')}}"></script>
<script src="{{asset('admin_site/assets/js/chart/apex-chart/stock-prices.js')}}"></script>
<script src="{{asset('admin_site/assets/js/chart/apex-chart/chart-custom1.js')}}"></script>

<!-- customizer js -->
<script src="{{asset('admin_site/assets/js/customizer.js')}}"></script>

<!-- ratio js -->
<script src="{{asset('admin_site/assets/js/ratio.js')}}"></script>

<!-- Theme js -->
<script src="{{asset('admin_site/assets/js/script.js')}}"></script>
<script src="{{asset('admin_site/assets/js/ckeditor.js')}}"></script>
<script src="{{asset('admin_site/assets/js/ckeditor-custom.js')}}"></script>

<!-- CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/css/toastr.css" rel="stylesheet" />

<!-- JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.0/js/toastr.js"></script>

<script>
        $(document).ready(function() {
            toastr.options.timeOut = 5000;
            @if (Session::has('error'))
                toastr.error('{{ Session::get('error') }}');
            @elseif(Session::has('success'))
                toastr.success('{{ Session::get('success') }}');
            @endif
        });

    </script>
</body>

</html>