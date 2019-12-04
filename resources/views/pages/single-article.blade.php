@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <ul class="breadcrumb">
                            <li><a href="#!"><i class="mdi mdi-home"></i></a></li>
                            <li><a href="#!">Artikel</a></li>
                        </ul>
                        <h2 class="title">Artikel</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-wrap">
        <div class="container">
            <div class="row single-post">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <div class="post-header text-center sr-btm">
                        <div class="meta">
                            <span>{{ $article['created_at']->format('d') }} {{ $article['created_at']->format('M') }}, {{ $article['created_at']->format('Y') }}</span>
                        </div>
                        <div class="main-title">
                            <h4 class="title">{{ $article['title'] }}</h4>
                        </div>
                    </div>
                    <article>
                        <img src="{{ asset('article/'.$article['image']) }}">
                        {!! $article['content'] !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
