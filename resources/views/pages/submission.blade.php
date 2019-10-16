<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta name="theme-color" content="#000"/>
<meta name="title" content="sikepa">
<meta name="description" content="sikepa">
<meta name="keywords" content="sikepa">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

<title>Sikepa</title>

<link rel="shortcut icon" type="image/png" href="images/favicon.png" sizes="32x32">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/material-icons/fonts.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/lightpick.css') }}">

<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}">

<script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

</head>

<body class="single-page">
    <main id="main">
        <header class="bg-dark main-header">
            <div class="top-header">
                <div class="container">
                    <ul class="contact-header">
                        <li><i class="mdi mdi-phone"></i>+6281919002001</li>
                        <li><i class="mdi mdi-email-outline"></i>admin@umkmindonesia.id</li>
                    </ul>
                    <ul class="social-icon">
                        <li><a href="#!" title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                        <li><a href="#!" title="Twitter"><i class="mdi mdi-twitter"></i></a></li>
                        <li><a href="#!" title="Instagram"><i class="mdi mdi-instagram"></i></a></li>
                        <li><a href="#!" title="Google +"><i class="mdi mdi-google"></i></a></li>
                    </ul>
                </div>
            </div>
            <nav class="nav-header">
                <div class="container">
                    <a class="logo-header" href="index.html">
                        <div class="logo-icon"></div>
                        <div class="logo-text">Sikepa</div>
                    </a>
                    <div class="menu-header">
                        <ul class="menu">
                            <li class="dropdown"><a href="#!">Informasi</a>
                                <div class="dropdown-hover">
                                    <ul>
                                        <li><a href="#!">Deputi Bidang Kesetaraan Gender</a></li>
                                        <li><a href="#!">Deputi Bidang Perlindungan Hak Perempuan</a></li>
                                        <li><a href="#!">Deputi Bidang Perlindungan Perempuan</a></li>
                                        <li><a href="#!">Deputi Bidang Tumbuh Kembang Anak</a></li>
                                        <li><a href="#!">Deputi Bidang Partisipasi Masyarakat</a></li>
                                        <li><a href="#!">SESMEN</a></li>
                                    </ul>
                                </div>
                            </li>
                            <li class="active"><a href="pengajuan-kerjasama.html">Pengajuan Kerjasama</a></li>
                            <li><a href="survei-kepuasan.html">Survei Kepuasan</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="artikel.html">Artikel</a></li>
                        </ul>
                    </div>
                    <div class="user-header">
                        <a href="login.html">Login</a>
                        <a class="btn-rounded btn-register" href="register.html">Register<i class="mdi mdi-arrow-right"></i></a>
                    </div>
                </div>
            </nav>
        </header>
        
        <section class="page-header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                        <div class="main-title text-center sr-btm">
                            <div class="subtitle">Sikepa</div>
                            <h2 class="title">Pengajuan<br>Kerjasama</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="content-wrap">
            <div class="container">
                <div class="control-group">
                    <div class="row lg-gutter">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <select class="form-control" required>
                                        <option></option>
                                        <option>Permohonan Bantuan Dana</option>
                                    </select>
                                    <label class="text-label">Jenis Kerjasama</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Isi Nominal</label>
                                </div>
                                <div class="help-block">Jika jenis kerjasama memohon bantuan dana maka keluar form ini</div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <select class="form-control" required>
                                        <option></option>
                                        <option>Kerjasama Luar Negri</option>
                                    </select>
                                    <label class="text-label">Kerjasama Substansi</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <select class="form-control" required>
                                        <option></option>
                                        <option>Nota Kesepahaman (MOU)</option>
                                    </select>
                                    <label class="text-label">Kategori</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <select class="form-control" required>
                                        <option></option>
                                        <option>Kementerian/Lembaga</option>
                                    </select>
                                    <label class="text-label">Instansi</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Alamat Instansi</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="row lg-gutter">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Nama Pemohon</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Jabatan Pemohon</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input input-file">
                                    <input class="upload" type="file">
                                    <div class="form-control">
                                        <span class="input-upload"></span>
                                    </div>
                                    <label class="text-label">Upload KTP Pemohon</label>
                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input input-file">
                                    <input class="upload" type="file">
                                    <div class="form-control">
                                        <span class="input-upload"></span>
                                    </div>
                                    <label class="text-label">Upload NPWP Pemohon</label>
                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input input-file">
                                    <input class="upload" type="file">
                                    <div class="form-control">
                                        <span class="input-upload"></span>
                                    </div>
                                    <label class="text-label">SIUP/Akta Pendirian Organisasi</label>
                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">No. Telepon</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Email</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="row lg-gutter">
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Maksud & Tujuan</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" id="jangka_waktu" required>
                                    <label class="text-label">Usulan Jangka Waktu</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <input class="form-control" required>
                                    <label class="text-label">Latar Belakang</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input input-file">
                                    <input class="upload" type="file">
                                    <div class="form-control">
                                        <span class="input-upload"></span>
                                    </div>
                                    <label class="text-label">Profile Instansi</label>
                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input input-file">
                                    <input class="upload" type="file">
                                    <div class="form-control">
                                        <span class="input-upload"></span>
                                    </div>
                                    <label class="text-label">Proposal</label>
                                    <span class="remove-file"><i class="mdi mdi-close"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="form-group sr-btm">
                                <div class="form-input">
                                    <select class="form-control" required>
                                        <option></option>
                                        <option>Deputi Bidang Kesetaraan Gender</option>
                                    </select>
                                    <label class="text-label">Sasaran Kerjasama</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="row lg-gutter text-center sr-btm">
                        <div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3">
                            <div class="help-block">Pastikan form sudah terisi dengan benar</div>
                            <br>
                            <button
                                id="dummy-alert"
                                class="btn btn-lg btn-block btn-primary btn-rounded" type="submit"
                            >
                                Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <footer class="main-footer">
            <section class="content-wrap top-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 footer-wrap">
                            <a class="logo-footer" href="index.html">
                                <div class="logo-icon"></div>
                                <div class="logo-text">Sikepa</div>
                            </a>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 footer-wrap">
                            <div class="main-title">
                                <h5 class="title">Quick Links</h5>
                            </div>
                            <ul class="footer-nav">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="pengajuan-kerjasama.html">Pengajuan Kerjasama</a></li>
                                <li><a href="survei-kepuasan.html">Survei Kepuasan</a></li>
                                <li><a href="faq.html">FAQ</a></li>
                                <li><a href="artikel.html">Artikel</a></li>
                                <li><a href="testimoni.html">Testimoni</a></li>
                                <li><a href="syarat-kerjasama.html">Syarat Kerjasama</a></li>
                                <li><a href="kontak-kami.html">Kontak Kami</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-lg-offset-1 col-md-3 col-md-offset-1 col-sm-4 footer-wrap">
                            <div class="main-title">
                                <h5 class="title">Kontak Kami</h5>
                            </div>
                            <ul class="footer-nav contact-footer">
                                <li>Jl. Batu Indah I No.6, Batununggal, Kec. Bandung Kidul, Kota Bandung, Jawa Barat 40266</li>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/fill.box.js') }}"></script>
    <script src="{{ asset('assets/js/jquery.ellipsis.min.js') }}"></script>
    <script src="{{ asset('assets/js/scrollreveal.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="{{ asset('assets/js/lightpick.js') }}"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
        
    <script>
    
        var picker = new Lightpick({
            field: document.getElementById("jangka_waktu"),
            singleDate: false,
            format: "DD MMMM, YYYY",
            separator: "  →  "
            //onSelect: function(start, end){
                //var str = "";
                //str += start ? start.format("DD MM YYYY") + "to" : "";
                //str += end ? end.format("DD MM YYYY") : "...";
            //}
        });
        setTimeout(function(){
             $(".lightpick__select").each(function(){
                var x = $(this).parent().append("<span></span>");
                console.log(x);
            });
            
        },400);
       
        $("#dummy-alert").click(function(e) {
            Swal.fire({
                title: 'Selamat',
                type: 'info',
                html:
                    '<p>Anda telah berhasil melakukan pengajuan, Terima kasih sudah kerjasama dengan kami.</p>'+
                    '<b>username: admin</b> <b>password: admin</b>',
                showCloseButton: true,
                showConfirmButton: false,
                showCancelButton: false,
                focusConfirm: false,
            })
        });
    </script>    
</html>
