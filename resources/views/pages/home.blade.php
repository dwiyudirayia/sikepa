<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="theme-color" content="#000"/>
<meta name="title" content="sikepa">
<meta name="description" content="sikepa">
<meta name="keywords" content="sikepa">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Sikepa</title>

<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="32x32">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/material-icons/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/swiper.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

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
                        <li><a href="#!">Informasi</a></li>
                        <li><a href="#!">Pengajuan Kerjasama</a></li>
                        <li><a href="#!">Survei Kepuasan</a></li>
                        <li><a href="#!">FAQ</a></li>
                        <li><a href="#!">Artikel</a></li>
                    </ul>
                </div>
                <div class="user-header">
                    <a href="/login/admin">Login</a>
                    <a class="btn-rounded btn-register" href="#!">Register<i class="mdi mdi-arrow-right"></i></a>
                </div>
            </div>
        </nav>
    </header>

    <section class="banner-area">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="banner-image" data-swiper-parallax="50%">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/img01.jpg')}}">
                        </div>
                    </div>
                    <div class="banner-caption">
                        <div class="container">
                            <div class="caption">
                                <div class="meta">
                                    <span>25 Sep, 2018</span>
                                </div>
                                <div class="main-title">
                                    <h2 class="title" ellipsis>Toreh Prestasi di APEC WEF 2019, Perempuan Indonesia Layak Diperhitungkan</h2>
                                </div>
                                <a class="link-icon" href="#!">Baca selengkapnya<i class="mdi mdi-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-image" data-swiper-parallax="50%">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/img02.jpg')}}">
                        </div>
                    </div>
                    <div class="banner-caption">
                        <div class="container">
                            <div class="caption">
                                <div class="meta">
                                    <span>25 Sep, 2018</span>
                                </div>
                                <div class="main-title">
                                    <h2 class="title" ellipsis>Solusi Masalah Pekerja Perempuan, RP3 Bintan Diresmikan</h2>
                                </div>
                                <a class="link-icon" href="#!">Baca selengkapnya<i class="mdi mdi-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="banner-image" data-swiper-parallax="50%">
                        <div class="thumb">
                            <img src="{{ asset('assets/images/img03.jpg')}}">
                        </div>
                    </div>
                    <div class="banner-caption">
                        <div class="container">
                            <div class="caption">
                                <div class="meta">
                                    <span>25 Sep, 2018</span>
                                </div>
                                <div class="main-title">
                                    <h2 class="title" ellipsis>Sahabat perempuan dan anak, Kementerian Pemberdayaan Perempuan dan Perlindungan Anak</h2>
                                </div>
                                <a class="link-icon" href="#!">Baca selengkapnya<i class="mdi mdi-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($bannerArticle as $item)
                <div class="swiper-slide">
                    <div class="banner-image" data-swiper-parallax="50%">
                        <div class="thumb">
                            <img src="{{ asset('article/'.$item->image)}}">
                        </div>
                    </div>
                    <div class="banner-caption">
                        <div class="container">
                            <div class="caption">
                                <div class="meta">
                                    <span>{{ $item->created_at->format('d-m-Y') }}</span>
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
                                <img src="{{ asset('assets/images/img04.jpg')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Sistem Kerjasama Kementerian Pemberdayaan Perempuan dan Perlindungan Anak</h3>
                        </div>
                        <article class="caption-text">
                            <p>Ajukan Kerjasama dengan kami dan tunggu proses, rasakan kemudahan dengan menggunakan SIKEPA.</p>
                        </article>
                        <div class="caption-btn">
                            <a class="link-icon" href="#!">Ajukan kerjasama<i class="mdi mdi-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap pt0" id="home-info">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center">
                        <div class="subtitle">Sikepa</div>
                        <h3 class="title">{{ $informasi->section->name }} {{ $informasi->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img01.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Perlindungan Anak</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img02.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Tumbuh Kembang Anak</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img03.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Pemenuhan Hak Perempuan</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img04.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Partisipasi Masyarakat</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img03.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Perlindungan Anak</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img04.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Tumbuh Kembang Anak</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img02.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Pemenuhan Hak Perempuan</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('assets/images/img01.jpg')}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Partisipasi Masyarakat</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                @foreach ($informasi->pages as $item)
                <div class="col-lg-3 col-md-3 col-sm-6">
                    <div class="single-article">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('page/'.$item->image)}}">
                            </div>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>25 Aug, 2018</span>
                            </div>
                            <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Partisipasi Masyarakat</span></h5></a>
                            <a class="link" href="#!"><i class="mdi mdi-download"></i>Download .pdf</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="caption-btn text-center">
                <a class="btn btn-default btn-rounded" href="#!">Informasi lainnya</a>
            </div>
        </div>
    </section>

    <section class="content-wrap pt0" id="home-article">
        <div class="container">
            <div class="row flex flex-bottom">
                <div class="col-lg-6 col-md-6">
                    <div class="main-title">
                        <div class="subtitle">Sikepa</div>
                        <h3 class="title">Artikel Populer</h3>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="swiper-button-inline">
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-button-next"></div>
                    </div>
                </div>
            </div>
            <div class="main-carousel swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img01.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Perlindungan Anak</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img02.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Tumbuh Kembang Anak</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img03.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Pemenuhan Hak Perempuan</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img04.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Partisipasi Masyarakat</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img03.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Perlindungan Anak</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img04.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Tumbuh Kembang Anak</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img02.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Pemenuhan Hak Perempuan</span></h5></a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('assets/images/img01.jpg')}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>25 Aug, 2018</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">Deputi Bidang Partisipasi Masyarakat</span></h5></a>
                            </div>
                        </div>
                    </div>
                    @foreach ($populerArticle as $item)
                    <div class="swiper-slide">
                        <div class="single-article">
                            <div class="box-media">
                                <a href="#!">
                                    <div class="thumb">
                                        <img src="{{ asset('article/'.$item->image)}}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>{{ $item->created_at->format('d-m-Y') }}</span>
                                </div>
                                <a href="#!"><h5 class="title" ellipsis><span class="hover-line">{{ $item->title }}</span></h5></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="caption-btn text-center">
                <a class="btn btn-default btn-rounded" href="#!">Artikel lainnya</a>
            </div>
        </div>
    </section>

    <section class="content-wrap" id="home-testimoni">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center">
                        <div class="subtitle">Sikepa</div>
                        <h3 class="title">Komentar dari Konsumen<br>mengenai SIKEPA</h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="testimoni-content swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="caption-text text-center">
                                    <i class="mdi mdi-format-quote-close"></i>
                                    <p>Aliquam maximus lacus imperdiet augue cursus, vitae sollicitudin est venenatis. Curabitur luctus, enim ut dapibus interdum, nisl ligula placerat dui, sed porttitor ipsum mi sagittis libero. Maecenas eleifend tortor ac nisl porta, quis feugiat ante sodales.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="caption-text text-center">
                                    <i class="mdi mdi-format-quote-close"></i>
                                    <p>In eleifend consequat magna. Mauris eu turpis a enim lacinia dignissim eget sit amet nisl. Aliquam sed quam pellentesque, cursus risus ac, gravida augue. Nullam id ex pharetra, mattis ligula ac, consectetur odio.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="caption-text text-center">
                                    <i class="mdi mdi-format-quote-close"></i>
                                    <p>Curabitur sit amet sodales ante. Donec tincidunt, neque at pulvinar cursus, est massa gravida libero, a tempor quam nibh quis justo. Aliquam sed nunc ante. Vestibulum a felis quis purus tempus vestibulum. Etiam ullamcorper sem mi, non efficitur erat congue ac.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="caption-text text-center">
                                    <i class="mdi mdi-format-quote-close"></i>
                                    <p>Nam blandit gravida mauris ut tempus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In tincidunt lobortis est, vitae porta sapien auctor et. Quisque id risus quis risus malesuada dapibus non at urna.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="caption-text text-center">
                                    <i class="mdi mdi-format-quote-close"></i>
                                    <p>Aliquam maximus lacus imperdiet augue cursus, vitae sollicitudin est venenatis. Curabitur luctus, enim ut dapibus interdum, nisl ligula placerat dui, sed porttitor ipsum mi sagittis libero. Maecenas eleifend tortor ac nisl porta, quis feugiat ante sodales.</p>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="caption-text text-center">
                                    <i class="mdi mdi-format-quote-close"></i>
                                    <p>In eleifend consequat magna. Mauris eu turpis a enim lacinia dignissim eget sit amet nisl. Aliquam sed quam pellentesque, cursus risus ac, gravida augue. Nullam id ex pharetra, mattis ligula ac, consectetur odio.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="testimoni-user swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimoni-info">
                                    <div class="box-media">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/avatar01.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="testimoni-name">
                                        <div class="subtitle">House Chef</div>
                                        <div class="name">John Williams</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimoni-info">
                                    <div class="box-media">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/avatar02.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="testimoni-name">
                                        <div class="subtitle">Waitress</div>
                                        <div class="name">Sara Welch</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimoni-info">
                                    <div class="box-media">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/avatar03.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="testimoni-name">
                                        <div class="subtitle">Barmen</div>
                                        <div class="name">Edward Gray</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimoni-info">
                                    <div class="box-media">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/avatar04.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="testimoni-name">
                                        <div class="subtitle">Pizza Chef</div>
                                        <div class="name">Nicholas Patel</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimoni-info">
                                    <div class="box-media">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/avatar05.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="testimoni-name">
                                        <div class="subtitle">Pasta Chef</div>
                                        <div class="name">Jeremy White</div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimoni-info">
                                    <div class="box-media">
                                        <div class="thumb">
                                            <img src="{{ asset('assets/images/avatar06.jpg') }}">
                                        </div>
                                    </div>
                                    <div class="testimoni-name">
                                        <div class="subtitle">Waitress</div>
                                        <div class="name">Lori Jacobs</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="main-footer">
        <section class="content-wrap top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 footer-wrap">
                        <a class="logo-footer" href="index.html">
                            <div class="logo-icon"></div>
                            <div class="logo-text">Sikepa</div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 footer-wrap">
                        <div class="main-title">
                            <h5 class="title">Quick Links</h5>
                        </div>
                        <ul class="footer-nav">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="index.html">Pengajuan Kerjasama</a></li>
                            <li><a href="index.html">Survei Kepuasan</a></li>
                            <li><a href="index.html">FAQ</a></li>
                            <li><a href="index.html">Artikel</a></li>
                            <li><a href="index.html">Testimoni</a></li>
                            <li><a href="index.html">Syarat Kerjasama</a></li>
                            <li><a href="index.html">Kontak Kami</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-4 footer-wrap">
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
            <div class="container">
                <span class="subtitle copyright">© 2019 Sikepa. All Rights Reserved.</span>
            </div>
        </section>
    </footer>

</main>
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fill.box.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ellipsis.min.js') }}"></script>
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
        autoHeight: true,
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
        slideToClickedSlide: true
    });
    //ourTeamInfo.controller.control = ourTeam;
    tUser.controller.control = tContent;

</script>
</body>
</html>
