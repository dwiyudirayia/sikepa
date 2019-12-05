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

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/swiper.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/toastr.min.css') }}">
</head>

<body>

<main id="main">
    @include('layouts.partialsFront.header')
    @yield('content')
    @include('layouts.partialsFront.footer')
</main>

<div id="modal-welcome" class="auto-modal modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                        <div class="panel">
                            <a class="close" href="javascript:;" data-dismiss="modal"><i class="mdi mdi-close"></i></a>
                            <div class="panel-body text-center">
                                <div class="main-title">
                                    <div class="subtitle">Sikepa</div>
                                    <h3 class="title">Selamat Datang di Website SIKEPA</h3>
                                </div>
                                <div class="caption-text">
                                    <p>Ajukan Kerjasama dengan kami dan tunggu proses, rasakan kemudahan dengan menggunakan SIKEPA</p>
                                </div>
                                <div class="caption-btn">
                                    <a class="btn btn-lg btn-rounded btn-primary" href="#!">Ajukan Kerjasama</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fill.box.js') }}"></script>
<script src="{{ asset('assets/js/jquery.scrollify.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ellipsis.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script>
    //scrollify
    var nHeader = $(".nav-header").outerHeight();
    var cWrap = $(".content-wrap").css("padding-top");
    var pTop = parseInt(nHeader)+parseInt(cWrap);
    $(".content-wrap").css("padding-top",""+pTop+"px");
    $.scrollify({
        section : ".content-page",
        offset : 0,
        setHeights: false,
        updateHash: false,
        scrollSpeed: 800,
    });
    if ($(window).width() < 991) {
        $.scrollify.disable();
        $(".content-wrap").css("padding-top","5em");
    } else {
        $.scrollify.enable();
    }

    //banner area
    var banner = new Swiper($(".banner-area .swiper-container"), {
        speed: 1000,
        navigation: {
            nextEl: $(this).parent().find(".swiper-button-next"),
            prevEl: $(this).parent().find(".swiper-button-prev"),
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        parallax: true,
        simulateTouch: false,
    });
    banner.on("slideChange",function() {
        $(".banner-caption").addClass("change");
    });
    banner.on("slideChangeTransitionEnd",function() {
        $(".banner-caption").removeClass("change");
    });

    //main-carousel
    $(".main-carousel").each(function(){
        new Swiper($(this), {
            speed: 600,
            slidesPerView: "auto",
            spaceBetween: emSize*3,
            navigation: {
                nextEl: $(this).parent().find(".swiper-button-next"),
                prevEl: $(this).parent().find(".swiper-button-prev"),
            },
            breakpoints: {
                768: {
                    slidesPerView: 1,
                    spaceBetween: emSize*2,
                },
            }
        });
    });

    //testimoni content
    var tContent = new Swiper($(".testimoni-content"), {
        effect: "fade",
        speed: 600,
        //autoHeight: true,
        //loop: true,
        touchRatio: 0,
        //simulateTouch: true
    });
    var tUser = new Swiper($(".testimoni-user"), {
        speed: 600,
        slidesPerView: 3,
        centeredSlides: true,
        spaceBetween: emSize*2,
        //loop: true,
        slideToClickedSlide: true,
        breakpoints: {
            768: {
                slidesPerView: 2,
            }
        }
    });
    //ourTeamInfo.controller.control = ourTeam;
    tUser.controller.control = tContent;

</script>
@include('partialsFront.alert')

</body>
</html>
