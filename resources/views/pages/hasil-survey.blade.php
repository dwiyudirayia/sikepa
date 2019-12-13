<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="theme-color" content="#000"/>
<meta name="title" content="sikepa">
<meta name="description" content="sikepa">
<meta name="keywords" content="sikepa">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Survei Kepuasan -- Sikepa</title>

<link rel="shortcut icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}" sizes="32x32">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/material-icons/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}">

</head>

<body class="single-page login-page">

    <main id="main">

        <header class="main-header">

            <nav class="nav-header">
                <div class="container">
                    <a class="logo-header" href="{{ route('home') }}">
                        <div class="logo-icon"></div>
                        <div class="logo-text">Sikepa</div>
                    </a>
                    <a class="link-icon" href="{{ route('home') }}"><span>Kembali ke home</span><i class="mdi mdi-home"></i></a>
                </div>
            </nav>
        </header>

        <section id="hasil-survei">
            <div class="inner">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-lg-offset-6 col-md-6 col-md-offset-6">
                            <div class="subtitle">Survei Kepuasan</div>
                            <div class="main-title">
                                <h2 class="title">Terima kasih telah mengisi survei kepuasan SIKEPA</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer class="content-page main-footer">
            <section class="content-wrap top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-12 footer-wrap logo-footer">
                            <a href="{{ route('home') }}">
                                <div class="logo-icon"></div>
                                <div class="logo-text">Sikepa</div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-6 footer-wrap">
                            <div class="main-title">
                                <h5 class="title">Quick Links</h5>
                            </div>
                            <ul class="footer-nav">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('cooperation.submission') }}">Pengajuan Kerjasama</a></li>
                                <li><a href="{{ route('faq') }}">FAQ</a></li>
                                <li><a href="{{ route('article') }}">Artikel</a></li>
                                <li><a href="{{ route('page', ['slug' => 'syarat-kerjasama']) }}">Syarat Kerjasama</a></li>
                                <li><a href="{{ route('our.contact') }}">Kontak Kami</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-6 footer-wrap">
                            <div class="main-title">
                                <h5 class="title">Kontak Kami</h5>
                            </div>
                            <ul class="footer-nav contact-footer">
                                <li>Jl. Medan Merdeka Barat No.15, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10160</li>
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
<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/fill.box.js') }}"></script>
<script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
<script src="{{ asset('assets/js/main.js')}}"></script>

</body>
</html>
