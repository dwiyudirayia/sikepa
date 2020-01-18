@extends('layouts.layout-single')
@section('content')
<section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                    <div class="main-title text-center sr-btm">
                        <div class="subtitle">Sikepa</div>
                        <h2 class="title">Frequently Asked Questions</h2>
                    </div>
                    <form method="GET" action="{{ route('faq') }}">
                        <div class="search-header sr-btm">
                            <button class="btn btn-search" type="submit"><i class="mdi mdi-magnify"></i></button>
                            <input class="form-control" placeholder="Cari seputar pertanyaan" name="q" value="{{ old('q', '') ?? $data['q'] }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="content-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2">
                    <div class="faq-list">
                        @foreach ($data['data'] as $item)
                            <div class="panel faq-item sr-btm">
                                <div class="panel-body">
                                <a href="" data-toggle="collapse"><span>{{ $item->question }}</span></a>
                                </div>
                                <div class="panel-collapse collapse" id="">
                                    <div class="panel-body">
                                        <p>{{ $item->answere }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script>
        var id = 1;
        $(".faq-item").each(function(){
            $(this).find("[data-toggle]").attr("href","#col"+id+"");
            $(this).find(".collapse").attr("id","col"+id+"");
            id++;
        });
    </script>
@endsection
