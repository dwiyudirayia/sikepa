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
            <div class="row single-post">
                <div class="col-lg-6 col-lg-offset-3 col-md-8 col-md-offset-2">
                    <div class="post-header text-center sr-btm">
                        <div class="main-title">
                            <h4 class="title">{{ $data['title'] }}</h4>
                        </div>
                    </div>
                    <article>
                        {!! $data['full_text_information'] !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
