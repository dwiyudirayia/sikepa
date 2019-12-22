<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="theme-color" content="#000"/>
<meta name="title" content="sikepa">
<meta name="description" content="sikepa">
<meta name="keywords" content="sikepa">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>SIKEPA</title>

<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="32x32">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/material-icons/fonts.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

@yield('styles1')

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.min.css') }}">
@yield('styles2')
</head>

<body class="single-page">

<main id="main">
    @include('layouts.partialsFront.header')
    @yield('content')
    @include('layouts.partialsFront.footer')
</main>

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fill.box.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ellipsis.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/5dfc38a9d96992700fcd2204/default';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
</script>
    <!--End of Tawk.to Script-->
@include('partialsFront.alert')
@yield('scripts')
</body>
</html>
