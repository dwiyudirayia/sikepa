@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Informasi</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row no-gutter block-media-text">
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media no-bg">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('storage/photo_contact_deputi_information/'.$data['photo_contact']) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Layanan Kontak</h3>
                        </div>
                        <article class="caption-text sr-btm">
                            <p>{{ $data['text_contact'] }}.</p>
                        </article>
                        <div class="caption-btn sr-btm">
                            <a class="link-icon" href="{{ route('our.contact') }}">Selengkapnya<i class="mdi mdi-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutter block-media-text">
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media no-bg">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('storage/photo_information_deputi_information/'.$data['photo_information']) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Informasi Deputi</h3>
                        </div>
                        <article class="caption-text sr-btm">
                            <p>{{ $data['text_information'] }}.</p>
                        </article>
                        <div class="caption-btn sr-btm">
                            <a class="link-icon" href="{{ route('information.detail', ['slug' => $data['url']]) }}">Selengkapnya<i class="mdi mdi-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutter block-media-text">
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media no-bg">
                        <div class="box-media">
                            <div class="thumb">
                                <img src="{{ asset('storage/photo_requirement_deputi_information/'.$data['photo_requirement']) }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Syarat Kerjasama</h3>
                        </div>
                        <article class="caption-text sr-btm">
                            <p>{{ $data['text_requirement'] }}.</p>
                        </article>
                        <div class="caption-btn sr-btm">
                            <a class="link-icon" href="{{ route('page', ['slug' => 'syarat-kerjasama']) }}">Selengkapnya<i class="mdi mdi-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row no-gutter block-media-text">
                @if($data['type_video'] == 2)
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media no-bg">
                        <div class="box-media">
                            <div class="thumb">
                                <iframe width="100%" height="100%" src="https://www.youtube.com/embed/{{ $data['photo_video'] }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-lg-6 col-md-6">
                    <div class="caption-media no-bg">
                        <div class="box-media">
                            <div class="thumb">
                                <video width="100%" height="100%" controls src="{{ asset('storage/photo_video_deputi_information/'.$data['photo_video']) }}"></video>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-lg-6 col-md-6">
                    <div class="caption-content">
                        <div class="main-title sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h3 class="title">Video Tutorial</h3>
                        </div>
                        <article class="caption-text sr-btm">
                            <p>{{ $data['text_video'] }}.</p>
                        </article>
                        <div class="caption-btn sr-btm">
                            <a class="link-icon" href="#!">Selengkapnya<i class="mdi mdi-play"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row list-download">
                @foreach ($data->file as $item)
                    <div class="col-lg-4 col-md-4">
                        <a class="sr-btm" href="{{ route('information.download.file', ['id' => $item->id]) }}">
                            <div class="panel download-wrapper">
                                <div class="panel-body">
                                    <i class="mdi mdi-download"></i>
                                    <h5 class="download-info">Download {{ $item->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
