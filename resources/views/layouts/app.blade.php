<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
	<meta charset="utf-8" />
	<title>SIKEPA</title>
	<meta name="description" content="Sistem Informasi Kelompok Tani Perkebunan">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="{{ csrf_token() }}" />
	<link href="{{ asset('assets/vendors/base/vendors.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/demo/default/base/style.bundle.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{ asset('assets/customize.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/custom.css')}}" rel="stylesheet" type="text/css">
    @if(request()->is('login/admin'))
        <link rel="stylesheet" href="{{ asset('admin/dist/vendor/fonts/fontawesome.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/dist/vendor/fonts/ionicons.css') }}">
        <link rel="stylesheet" href="{{ asset('admin/dist/vendor/fonts/linearicons.css') }}">
        <link href="{{ asset('admin/dist/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/dist/css/appwork.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/dist/css/theme-app') }}.css" rel="stylesheet">
        <link href="{{ asset('admin/dist/css/colors.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/dist/css/uikit.css') }}" rel="stylesheet">
        <link href="{{ asset('admin/dist/css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="{{('admin/themes.css') }}">
    @endif
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<!--end::Page Vendors Styles -->
	<link rel="shortcut icon" href="{{ asset('simponi-new.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('simponi-new.png') }}" type="image/x-icon">
	<style>
	.tooltip {
    display: block !important;
    z-index: 10000;
    }

    .tooltip .tooltip-inner {
    background: black;
    color: white;
    border-radius: 16px;
    padding: 5px 10px 4px;
    }

    .tooltip .tooltip-arrow {
    width: 0;
    height: 0;
    border-style: solid;
    position: absolute;
    margin: 5px;
    border-color: black;
    }

    .tooltip[x-placement^="top"] {
    margin-bottom: 5px;
    }

    .tooltip[x-placement^="top"] .tooltip-arrow {
    border-width: 5px 5px 0 5px;
    border-left-color: transparent !important;
    border-right-color: transparent !important;
    border-bottom-color: transparent !important;
    bottom: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
    }

    .tooltip[x-placement^="bottom"] {
    margin-top: 5px;
    }

    .tooltip[x-placement^="bottom"] .tooltip-arrow {
    border-width: 0 5px 5px 5px;
    border-left-color: transparent !important;
    border-right-color: transparent !important;
    border-top-color: transparent !important;
    top: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
    }

    .tooltip[x-placement^="right"] {
    margin-left: 5px;
    }

    .tooltip[x-placement^="right"] .tooltip-arrow {
    border-width: 5px 5px 5px 0;
    border-left-color: transparent !important;
    border-top-color: transparent !important;
    border-bottom-color: transparent !important;
    left: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
    }

    .tooltip[x-placement^="left"] {
    margin-right: 5px;
    }

    .tooltip[x-placement^="left"] .tooltip-arrow {
    border-width: 5px 0 5px 5px;
    border-top-color: transparent !important;
    border-right-color: transparent !important;
    border-bottom-color: transparent !important;
    right: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
    }

    .tooltip[aria-hidden='true'] {
    visibility: hidden;
    opacity: 0;
    transition: opacity .15s, visibility .15s;
    }

    .tooltip[aria-hidden='false'] {
    visibility: visible;
    opacity: 1;
    transition: opacity .15s;
    }
	</style>
	<!--begin::Customize Css -->

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default">
    <div id="app"></div>
	<!-- begin::Scroll Top -->
	<div id="m_scroll_top" class="m-scroll-top">
		<i class="la la-arrow-up"></i>
	</div>
	<script src="{{ asset('js/webfont.js') }}"></script>
	<script src="{{ asset('js/forWebFont.js') }}"></script>
	<script src="{{ asset('assets/vendors/base/vendors.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('assets/demo/default/base/scripts.bundle.js')}}" type="text/javascript"></script>
    <script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
	<script src="{{ asset('assets/fill.box.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/customize.js') }}" type="text/javascript"></script>
</body>

<!-- end::Body -->

</html>
