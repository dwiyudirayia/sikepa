<footer class="main-footer">
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
