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
</head>

<body>

<main id="main">
    <header class="main-header">
        <div class="top-header">
            <div class="container">
                <ul class="contact-header">
                    <li><i class="mdi mdi-phone"></i>+6281919002001</li>
                    <li><i class="mdi mdi-email-outline"></i>admin@sikepa.id</li>
                </ul>
                <ul class="social-icon">
                    <li><a href="#!" title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                    <li><a href="#!" title="Twitter"><i class="mdi mdi-twitter"></i></a></li>
                    <li><a href="#!" title="Instagram"><i class="mdi mdi-instagram"></i></a></li>
                    <li><a href="#!" title="Google +"><i class="mdi mdi-google"></i></a></li>
                </ul>
            </div>
        </div>
        <nav class="nav-header">
            <div class="container">
                <a class="logo-header" href="index.html">
                    <div class="logo-icon"></div>
                    <div class="logo-text">Sikepa</div>
                </a>
                <div class="menu-header">
                    <ul class="menu">
                        <li class="dropdown"><a href="#!">Informasi</a>
                            <div class="dropdown-hover">
                                <ul>
                                    <li><a href="informasi.html">Deputi Bidang Kesetaraan Gender</a></li>
                                    <li><a href="informasi.html">Deputi Bidang Perlindungan Hak Perempuan</a></li>
                                    <li><a href="informasi.html">Deputi Bidang Perlindungan Perempuan</a></li>
                                    <li><a href="informasi.html">Deputi Bidang Tumbuh Kembang Anak</a></li>
                                    <li><a href="informasi.html">Deputi Bidang Partisipasi Masyarakat</a></li>
                                    <li><a href="informasi.html">SESMEN</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="tentang-sikepa.html">Tentang Sikepa</a></li>
                        <li><a href="pengajuan-kerjasama.html">Pengajuan Kerjasama</a></li>
                        <li><a href="faq.html">FAQ</a></li>
                        <li><a href="artikel.html">Artikel</a></li>
                    </ul>
                    <div class="btn-login">
                        <a class="btn btn-lg btn-block btn-primary btn-rounded" href="login.html">Login</a>
                    </div>
                </div>
                <div class="user-header">
                    <a class="btn-rounded btn-login" href="/login/admin">Login<i class="mdi mdi-arrow-right"></i></a>
                </div>
                <div class="burger-menu">
                    <div class="burger-menu-content">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <section class="banner-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach ($bannerArticle as $item)
                    <div class="swiper-slide">
                        <div class="banner-image" data-swiper-parallax="50%">
                            <div class="thumb">
                                <img src="images/img01.jpg">
                            </div>
                        </div>
                        <div class="banner-caption">
                            <div class="container">
                                <div class="caption">
                                    <div class="meta">
                                        <span>{{ $item->created_at->format('d') }}, {{ $item->created_at->format('M') }} {{ $item->created_at->format('Y') }}</span>
                                    </div>
                                    <div class="main-title">
                                        <h2 class="title" ellipsis>{{ $item->title }}</h2>
                                    </div>
                                    <a class="link-icon" href="#!">Baca selengkapnya<i class="mdi mdi-play"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="content-wrap" id="home-sikepa">
        <div class="container">
            <div class="row no-gutter block-media-text gallery">
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/meeting.svg') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Sistem Kerjasama Kementerian Pemberdayaan Perempuan dan Perlindungan Anak</h3>
                        </div>
                        <article class="caption-text sr-btm">
                            <p>Ajukan Kerjasama dengan kami dan tunggu proses, rasakan kemudahan dengan menggunakan SIKEPA.</p>
                        </article>
                        <div class="caption-btn sr-btm">
                            <a class="link-icon" href="#!">Ajukan kerjasama<i class="mdi mdi-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row list-box">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="status-kerjasama.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_handshake.svg') }}">
                                </div>
                                <h5 class="title">Status kerjasama<br>yang diajukan</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="sebaran-kerjasama.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_megaphone.svg') }}">
                                </div>
                                <h5 class="title">Sebaran hasil<br>kerjasama</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="syarat-kerjasama.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_condition.svg') }}">
                                </div>
                                <h5 class="title">Syarat<br>Kerjasama</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="#!" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_information.svg') }}">
                                </div>
                                <h5 class="title">Informasi</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="artikel.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_article.svg') }}">
                                </div>
                                <h5 class="title">Artikel</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="chat.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_chat.svg') }}">
                                </div>
                                <h5 class="title">Chat</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="survei-kepuasan.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_survey.svg') }}">
                                </div>
                                <h5 class="title">Survei<br>kepuasan</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <a href="faq.html" class="sr-btm">
                        <div class="box-item">
                            <div class="caption">
                                <div class="icon">
                                    <img src="{{ asset('assets/images/ic_faq.svg') }}">
                                </div>
                                <h5 class="title">Frequently Asked<br>Questions</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap pt0">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h3 class="title">Artikel<br>Terpopuler</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($bannerArticle as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-article sr-btm">
                            <div class="box-media">
                                <a href="single-article.html">
                                    <div class="thumb">
                                        <img src="images/artikel01.jpg">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>{{ $item->created_at->format('d') }}, {{ $item->created_at->format('M') }} {{ $item->created_at->format('Y') }}</span>
                                </div>
                                <a href="single-article.html"><h5 class="title" ellipsis><span class="hover-line">{{ $item->title }}</span></h5></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="caption-btn text-center sr-btm">
                <a class="btn btn-default btn-rounded" href="artikel.html">Artikel lainnya</a>
            </div>
        </div>
    </section>

    <section class="content-wrap pt0" id="home-testimoni">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h3 class="title">Komentar dari Konsumen<br>mengenai SIKEPA</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    @foreach ($testimoni as $item)
                        <div class="testimoni-content swiper-container sr-btm">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="caption-text text-center">
                                        <i class="mdi mdi-format-quote-close"></i>
                                        <p>{{ $item->testimoni }}.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="testimoni-user swiper-container sr-btm">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="testimoni-info">
                                        <div class="box-media">
                                            <div class="thumb">
                                                <img src="{{ asset('testimoni/'.$item->photo) }}">
                                            </div>
                                        </div>
                                        <div class="testimoni-name">
                                            <div class="subtitle">{{ $item->job }}</div>
                                            <div class="name">{{ $item->name }}</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <section class="content-wrap top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 footer-wrap logo-footer">
                        <a href="index.html">
                            <div class="logo-icon"></div>
                            <div class="logo-text">Sikepa</div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 footer-wrap">
                        <div class="main-title">
                            <h5 class="title">Quick Links</h5>
                        </div>
                        <ul class="footer-nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="pengajuan-kerjasama.html">Pengajuan Kerjasama</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="artikel.html">Artikel</a></li>
                            <li><a href="syarat-kerjasama.html">Syarat Kerjasama</a></li>
                            <li><a href="kontak-kami.html">Kontak Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 footer-wrap">
                        <div class="main-title">
                            <h5 class="title">Kontak Kami</h5>
                        </div>
                        <ul class="footer-nav contact-footer">
                            <li>Jl. Batu Indah I No.6, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40266</li>
                            <li>0812-3456-7890</li>
                            <li><a href="#!"><span class="hover-line">info@sikepa.id</span></a></li>
                            <li>
                                <ul class="social-icon">
                                    <li><a href="#!" title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                                    <li><a href="#!" title="Twitter"><i class="mdi mdi-twitter"></i></a></li>
                                    <li><a href="#!" title="Instagram"><i class="mdi mdi-instagram"></i></a></li>
                                    <li><a href="#!" title="Google +"><i class="mdi mdi-google"></i></a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="bottom-footer">
            <a class="btn-top" href="#!"><i class="mdi mdi-chevron-up"></i></a>
            <div class="container">
                <span class="subtitle copyright">© 2019 Sikepa. All Rights Reserved.</span>
            </div>
        </section>
    </footer>

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
<script src="{{ asset('assets/js/jquery.ellipsis.min.js') }}"></script>
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js') }}"></script>

<script>

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

</body>
</html>
