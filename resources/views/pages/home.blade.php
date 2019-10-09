<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="icon" href="{{ asset('assets/images/logo.jpg') }}" type="image/gif">
        <!-- CSS bootstrap  -->
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css')}}">

        <!-- CSS Font Awesome -->
        <link rel="stylesheet" href="{{ asset('assets/fa/css/all.css') }}">

        <!-- CSS Custom -->
        <link rel="stylesheet" href="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
        <!-- Carousel Owl -->
        <link rel="stylesheet" href="{{ asset('assets/OwlCarousel/dist/assets/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/OwlCarousel/dist/assets/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}">
        <title>SIKEPA</title>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light bg-white mb-5">
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
                <a href="/login/admin" class="btn btn-primary">Login</a>
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
        <div 
            class="container mb-3"
            data-aos="fade-up"
            data-aos-duration="1000"
        >
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
                        Informasi
                    </h4>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            DEPUTI BIDANG PERLINDUNGAN ANAK
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            DEPUTI BIDANG TUMBUH KEMBANG ANAK
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            DEPUTI BIDANG PEMENUHAN HAK PEREMPUAN
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            DEPUTI BIDANG PEMENUHAN HAK PEREMPUAN
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            DEPUTI BIDANG PARTISIPASI MASYARAKAT
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            DEPUTI BIDANG KESETARAAN GENDER
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold">
                            SEKRETARIAT KEMENTERIAN
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download PDF <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="100" height="100">
                        </div>
                    </section>
                    <div class="w-100 text-center">
                        <a href="#" class="btn btn-primary">Lihat Artikel Selengkapnya</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <section
                        class="border bg-white rounded p-3 mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
                        <h5 class="font-weight-bold border-bottom">
                            Artikel <span class="text-success">Terbaru</span>
                        </h5>
                        <div class="bg-success p-2 rounded text-white mb-3">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <sup><i class="far fa-clock"></i> 2 Jam yang lalu</sup>
                        </div>
                        <div class="bg-success p-2 rounded text-white mb-3">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <sup><i class="far fa-clock"></i> 2 Jam yang lalu</sup>
                        </div>
                        <div class="bg-success p-2 rounded text-white mb-3">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <sup><i class="far fa-clock"></i> 2 Jam yang lalu</sup>
                        </div>
                        <div class="bg-success p-2 rounded text-white mb-3">
                            <p>Lorem ipsum dolor sit amet.</p>
                            <sup><i class="far fa-clock"></i> 2 Jam yang lalu</sup>
                        </div>
                    </section>
                    <section
                        class="border bg-white rounded p-3 mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
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
                    <section
                        class="border bg-white rounded p-3 mb-3"
                        data-aos="zoom-in-up"
                        data-aos-duration="1000"
                    >
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
            <div class="row">
                <div class="col-sm-12 col-md-8 col-lg-8">
                    <h5 class="text-center font-weight-bold">Kerjasama</h5>
                    <h5 class="text-center font-weight-bold">Luar Negeri</h5>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque architecto explicabo, excepturi eligendi nostrum corrupti eum, voluptatibus, quos ratione illo totam doloremque atque laboriosam debitis illum fugiat nulla ipsa quam.</p>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="flip-down"
                        data-aos-duration="500"
                    >
                        <h5 class="text-center font-weight-bold">
                            Bilateral
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download MOU <i class="fas fa-download"></i> </a>
                                <a href="#" class="btn btn-success">Download PKS <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="150" height="150">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="flip-down"
                        data-aos-duration="500"
                    >
                        <h5 class="text-center font-weight-bold">
                            Multilateral
                        </h5>
                        <div class="d-flex justify-content-between">
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="150" height="150">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download MOU <i class="fas fa-download"></i> </a>
                                <a href="#" class="btn btn-success">Download PKS <i class="fas fa-download"></i> </a>
                            </div>
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="flip-down"
                        data-aos-duration="500"
                    >
                        <h5 class="text-center font-weight-bold">
                            Regional
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download MOU <i class="fas fa-download"></i> </a>
                                <a href="#" class="btn btn-success">Download PKS <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="150" height="150">
                        </div>
                    </section>
                    <section
                        class="border bg-white p-3 rounded mb-3"
                        data-aos="flip-down"
                        data-aos-duration="500"
                    >
                        <h5 class="text-center font-weight-bold">
                            Dalam Negeri
                        </h5>
                        <div class="d-flex justify-content-between">
                            <div>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sit ex consectetur ab aliquam quasi, recusandae amet inventore, neque minima qui debitis quod animi esse eveniet quis corrupti est doloribus iure!</p>
                                <a href="#" class="btn btn-success">Download MOU <i class="fas fa-download"></i> </a>
                                <a href="#" class="btn btn-success">Download PKS <i class="fas fa-download"></i> </a>
                            </div>
                            <img src="{{ asset('assets/images/logo.jpg') }}" alt="Holahalo Banner" width="150" height="150">
                        </div>
                    </section>
                    <div class="w-100 text-center">
                        <a href="#" class="btn btn-primary">Lihat Artikel Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="bg-kuning container mb-3 py-2"
            data-aos="zoom-in-right"
            data-aos-duration="500"
        >
            <div class="row">
                <div class="col-12 text-center">
                    <h5 class="font-weight-bold">Pengajuan Kerjasama</h5>
                    <p>Mari Ajukan Perjanjian Kerjasama dengan Deputi kami</p>
                    <a href="#" class="btn btn-primary">Ajukan Kerjasama</a>
                </div>
            </div>
        </div>
        <div
            class="bg-white rounded container mb-3 py-2"
            data-aos="fade-down"
            data-aos-easing="linear"
            data-aos-duration="1000"
        >
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h5 class="font-weight-bold">Survei Kepuasan Pelanggan</h5>
                    <div class="text-center">
                        <div class="mb-2">
                            <p class="mb-0">Pengunjung hari ini : 1</p>
                            <p class="mb-0">Total Pengunjung: 90</p>
                        </div>
                        <div class="mb-2">
                            <p class="mb-0">Hits Hari ini : 3</p>
                            <p class="mb-0">Total Hits : 600</p>
                        </div>
                        <div class="mb-2">
                            <p class="mb-0">Pengunjung Online : 90</p>
                        </div>
                    </div>
                    <form action="" method="post">
                        <h5 class="font-weight-bold">Bagaimana Menurut Anda Aplikasi Pengajuan SIKEPA ?</h5>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                            <label class="form-check-label" for="exampleRadios1">
                                Sangat Tidak Memuaskan
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Tidak Memuaskan
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Sesuai Standar
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Memuaskan
                            </label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                            <label class="form-check-label" for="exampleRadios2">
                                Sangat Memuaskan
                            </label>
                        </div>
                    </form>
                    <div class="d-flex justify-content-between">
                        <a href="#" class="btn btn-primary">Vote</a>
                        <a href="#" class="btn btn-primary">Hasil</a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <h5 class="text-center font-weight-bold">Tambahkan Komentar Anda</h5>
                    <form>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Email</label>
                            <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput2">Email</label>
                            <input type="email" class="form-control" id="exampleFormControlInput2" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Isi Komentar</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="Isi Komentar"></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="bg-white rounded py-3 container mb-3">
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
        <div class="bg-light-grey py-3">

        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <!-- JS Bootstrap -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/proper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/OwlCarousel/dist/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('assets/js/aos.js') }}"></script>
        <script>
            AOS.init();
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
