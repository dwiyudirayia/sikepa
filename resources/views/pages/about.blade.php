@extends('layouts.layout-single')
@section('content')
    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">{{ $about['title'] }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row single-post">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <article>
                        {!! $about['content'] !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
