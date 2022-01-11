<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Chuyên đề</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="shortcut icon" type="image/png" href="{{ asset('assets/jobhunt/images/favicon.png') }}"/>
    <meta name="keywords" content="">
    <meta name="author" content="CreativeLayers">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobhunt/css/bootstrap-grid.css')}}"/>
    <link rel="stylesheet" href="{{asset('assets/jobhunt/css/icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/jobhunt/css/animate.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobhunt/css/responsive.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobhunt/css/chosen.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobhunt/css/colors.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobhunt/css/style.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('assets/jobhunt/css//bootstrap.css')}}"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>
    @yield('css')
</head>
<body>

<div class="page-loading">
    <img src="https://grandetest.com/theme/jobhunt-html/images/loader.gif" alt=""/>
</div>

<div class="theme-layout" id="scrollup">
    @include('components._inc_header')

    @yield('content')

    @include('components._inc_footer')

</div>

@include('components.auth._inc_auth')

{{--<script data-cfasync="false"--}}
{{--        src="https://grandetest.com/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>--}}
<script src="{{asset('assets/jobhunt/js/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/modernizr.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/script.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/wow.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/slick.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/parallax.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/jobhunt/js/select-chosen.js')}}" type="text/javascript"></script>
@yield('script')
</body>
</html>

