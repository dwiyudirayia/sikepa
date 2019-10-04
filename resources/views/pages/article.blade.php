<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="{{ asset('assets/images/logo.jpg')}}" type="image/gif">
        <!-- CSS bootstrap  -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">

        <!-- CSS Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/fa/css/all.css') }}">

        <!-- CSS Custom -->
        <link rel="stylesheet" href="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <!-- Carousel Owl -->
        <link rel="stylesheet" href="{{ asset('assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">


        <title>SIKEPA</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow mb-5">
            <a class="navbar-brand">
                <img src="{{ asset('assets/images/logo.jpg') }}" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a
                        class="nav-item nav-link text-dark font-weight-bold"
                        href="#"
                    >
                        Informasi
                    </a>
                    <a
                        class="nav-item nav-link text-dark font-weight-bold"
                        href="#"
                    >
                        Pengajuan Kerjasama
                    </a>
                    <a
                        class="nav-item nav-link text-dark font-weight-bold"
                        href="#"
                    >
                        Survei Kepuasan
                    </a>
                    <a
                        class="nav-item nav-link text-dark font-weight-bold"
                        href="#"
                    >
                        FAQ
                    </a>
                    <a
                        class="nav-item nav-link text-dark font-weight-bold"
                        href="{{ url('/front/article') }}"
                    >
                        Artikel
                    </a>
                </div>
                <a href="#" class="btn btn-primary">Login</a>
            </div>
        </nav>
        <div class="container mb-3">
            <div class="owl-one owl-carousel owl-theme w-100" style="height: auto;">
                <div class="item">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" class="w-100">
                </div>
                <div class="item">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" class="w-100">
                </div>
                <div class="item">
                    <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" class="w-100">
                </div>
            </div>
        </div>
        <section>
            <div class="container mb-3">
                <div class="text-center text-dark">
                    <h4 class="font-weight-bold">
                        SIKEPA
                    </h4>
                    <h4>
                        SISTEM KERJASAMA
                    </h4>
                    <h4>
                        KEMENTERIAN PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK
                    </h4>
                </div>
            </div>
            <div class="container mb-3">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8">
                        <h4 class="text-center font-weight-bold">
                            Artikel
                        </h4>
                        @foreach ($article as $item)
                        <section class="border shadow p-3 rounded mb-3">
                            <h5 class="font-weight-bold">
                                {{ $item->title }}
                            </h5>
                            <div class="d-flex justify-content-between">
                                <img src="{{ asset('article/'.$item->image) }}" alt="Holahalo Banner" width="100" height="100">
                                <div>
                                    <sup class="text-danger">{{ $item->created_at->format('Y-m-d') }}</sup>
                                    {!! $item->content !!}
                                    <div class="d-flex justify-content-between align-items-center">
                                        <sup class="text-success">{{ $item->created_at->diffForHumans() }}</sup>
                                        <a href="#" class="btn btn-primary">Baca Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </section>
                        @endforeach
                        {{ $article->links() }}
                    </div>
                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <section class="border shadow rounded p-3 mb-3">
                            <h5 class="font-weight-bold border-bottom">
                                Artikel <span class="text-success">Terbaru</span>
                            </h5>
                            @forelse ($newArticle as $item)
                            <div class="bg-success p-2 rounded text-white mb-3">
                                <p>
                                    <a class="text-white" href="{{ url('/front/article/'.$item->id) }}">{{ $item->title }}</a>
                                </p>
                                <sup><i class="far fa-clock"></i> {{ $item->created_at->diffForHumans() }} </sup>
                            </div>
                            @empty
                            @endforelse
                        </section>
                        <section class="border shadow rounded p-3 mb-3">
                            <h5 class="font-weight-bold border-bottom">
                                Topik <span class="text-success">Populer</span>
                            </h5>
                            <div class="bg-warning p-2 rounded text-white mb-3">
                                <h6 class="font-weight-bold">1. Kerjasama Bilateral</h6>
                            </div>
                            <div class="bg-warning p-2 rounded text-white mb-3">
                                <h6 class="font-weight-bold">2. Kerjasama Multilateral</h6>
                            </div>
                            <div class="bg-warning p-2 rounded text-white mb-3">
                                <h6 class="font-weight-bold">3. Kerjasama Regional</h6>
                            </div>
                            <div class="bg-warning p-2 rounded text-white mb-3">
                                <h6 class="font-weight-bold">4. Pengajuan Kerjasama</h6>
                            </div>
                        </section>
                        <section class="border shadow rounded p-3 mb-3">
                            <h5 class="font-weight-bold border-bottom">
                                Info <span class="text-success">Kerjasama</span>
                            </h5>
                            <div class="bg-coklat p-2 rounded text-white mb-3">
                                <table>
                                    <tr class="font-weight-bold h6">
                                        <td>1.</td>
                                        <td>Info Kerjasama 1</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Kutipan Kerjasama</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Oleh: Admin</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-coklat p-2 rounded text-white mb-3">
                                <table>
                                    <tr class="font-weight-bold h6">
                                        <td>2.</td>
                                        <td>Info Kerjasama 2</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Kutipan Kerjasama</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Oleh: Admin</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-coklat p-2 rounded text-white mb-3">
                                <table>
                                    <tr class="font-weight-bold h6">
                                        <td>3.</td>
                                        <td>Info Kerjasama 3</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Kutipan Kerjasama</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Oleh: Username</td>
                                    </tr>
                                </table>
                            </div>
                            <div class="bg-coklat p-2 rounded text-white mb-3">
                                <table>
                                    <tr class="font-weight-bold h6">
                                        <td>3.</td>
                                        <td>Info Kerjasama 3</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Kutipan Kerjasama</td>
                                    </tr>
                                    <tr>
                                        <td>&nbsp;</td>
                                        <td>Oleh: Satker</td>
                                    </tr>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
            <div class="container mb-3">
                <div class="owl-two owl-carousel owl-theme w-100" style="height: auto;">
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                    <div class="item border p-2">
                        <p>Nama</p>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem minus eos fuga quis architecto. Saepe.</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="bg-light-grey py-3">

        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- JS Bootstrap -->
        <script src="{{ asset('assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
        <script src="{{ asset('assets/js/proper.min.js')}}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
        <script src="{{ asset('assets/OwlCarousel/dist/owl.carousel.min.js')}}"></script>
        <script>
            $(document).ready(function(){
                $('.owl-one').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    responsive:{
                        0:{
                            items:1
                        },
                        600:{
                            items:1
                        },
                        1000:{
                            items:1
                        }
                    }
                })
                $('.owl-two').owlCarousel({
                    loop:true,
                    margin:10,
                    nav:true,
                    dots:false,
                    autoplay:true,
                    autoplayTimeout:4000,
                    autoplayHoverPause:true,
                    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                    responsive:{
                        0:{
                            items:3
                        },
                        600:{
                            items:4
                        },
                        1000:{
                            items:5
                        }
                    }
                });
            });
        </script>
    </body>
</html>
