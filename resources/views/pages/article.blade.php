@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Artikel</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row">
                @foreach ($article as $item)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="single-article sr-btm">
                            <div class="box-media">
                                <a href="single-article.html">
                                    <div class="thumb">
                                        <img src="{{ asset('storage/article_photo/'.$item->image) }}">
                                    </div>
                                </a>
                            </div>
                            <div class="single-caption">
                                <div class="meta">
                                    <span>{{ $item->created_at->format('d') }} {{ $item->created_at->format('M') }}, {{ $item->created_at->format('Y') }}</span>
                                </div>
                                <a href="{{ route('article.detail', ['slug' => $item->url]) }}"><h5 class="title" ellipsis><span class="hover-line">{{ $item->title }}</span></h5></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{ $article->links('partialsFront.pagination') }}
        </div>
    </section>
@endsection
