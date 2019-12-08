@extends('layouts.layout-home')
@section('content')
<section class="banner-area">
    <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($bannerArticle as $item)
                <div class="swiper-slide">
                    <div class="banner-image" data-swiper-parallax="50%">
                        <div class="thumb">
                            <img src="{{ asset('article/'.$item->image) }}">
                        </div>
                    </div>
                    <div class="banner-caption">
                        <div class="container">
                            <div class="caption">
                                <div class="meta">
                                    <span>{{ $item->created_at->format('d') }} {{ $item->created_at->format('M') }}, {{ $item->created_at->format('Y') }}</span>
                                </div>
                                <div class="main-title">
                                    <h2 class="title" ellipsis>{{ $item->title }}</h2>
                                </div>
                                <a class="link-icon" href="{{ route('article.detail', ['slug' => $item->url]) }}">Baca selengkapnya<i class="mdi mdi-play"></i></a>
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
                        <a class="link-icon" href="{{ route('cooperation.submission') }}">Ajukan kerjasama<i class="mdi mdi-play"></i></a>
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
                <a href="{{ route('distribution_of_cooperation') }}" class="sr-btm">
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
                <a href="{{ route('article') }}" class="sr-btm">
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
                <a href="{{ route('faq') }}" class="sr-btm">
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
            @foreach ($article as $item)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="single-article sr-btm">
                        <div class="box-media">
                            <a href="{{ route('article.detail', ['slug' => $item->url]) }}">
                                <div class="thumb">
                                    <img src="{{ asset('article/'.$item->image) }}">
                                </div>
                            </a>
                        </div>
                        <div class="single-caption">
                            <div class="meta">
                                <span>{{ $item->created_at->format('d') }}, {{ $item->created_at->format('M') }} {{ $item->created_at->format('Y') }}</span>
                            </div>
                            <a href="{{ route('article.detail', ['slug' => $item->url]) }}"><h5 class="title" ellipsis><span class="hover-line">{{ $item->title }}</span></h5></a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="caption-btn text-center sr-btm">
            <a class="btn btn-default btn-rounded" href="{{ route('article') }}">Artikel lainnya</a>
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
@endsection
