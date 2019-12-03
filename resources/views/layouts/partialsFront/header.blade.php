<header class="main-header">
    <div class="top-header">
        <div class="container">
            <ul class="contact-header">
                <li><i class="mdi mdi-phone"></i>+6281919002001</li>
                <li><i class="mdi mdi-email-outline"></i>admin@sikepa.id</li>
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
            <a class="logo-header" href="{{ route('home') }}">
                <div class="logo-icon"></div>
                <div class="logo-text">Sikepa</div>
            </a>
            <div class="menu-header">
                <ul class="menu">
                    <li class="dropdown"><a href="#!">Informasi</a>
                        <div class="dropdown-hover">
                            <ul>
                                <li><a href="informasi.html">Deputi Bidang Kesetaraan Gender</a></li>
                                <li><a href="informasi.html">Deputi Bidang Perlindungan Hak Perempuan</a></li>
                                <li><a href="informasi.html">Deputi Bidang Perlindungan Perempuan</a></li>
                                <li><a href="informasi.html">Deputi Bidang Tumbuh Kembang Anak</a></li>
                                <li><a href="informasi.html">Deputi Bidang Partisipasi Masyarakat</a></li>
                                <li><a href="informasi.html">SESMEN</a></li>
                            </ul>
                        </div>
                    </li>
                    <li><a href="{{ route('about', ['slug' => 'tentang-sikepa']) }}">Tentang Sikepa</a></li>
                    <li><a href="pengajuan-kerjasama.html">Pengajuan Kerjasama</a></li>
                    <li><a href="{{ route('faq') }}">FAQ</a></li>
                    <li><a href="{{ route('article') }}">Artikel</a></li>
                </ul>
                <div class="btn-login">
                    <a class="btn btn-lg btn-block btn-primary btn-rounded" href="/login/admin">Login</a>
                </div>
            </div>
            <div class="user-header">
                <a class="btn-rounded btn-login" href="/login/admin">Login<i class="mdi mdi-arrow-right"></i></a>
            </div>
            <div class="burger-menu">
                <div class="burger-menu-content">
                    <span></span>
                    <span></span>
                </div>
            </div>
        </div>
    </nav>
</header>
