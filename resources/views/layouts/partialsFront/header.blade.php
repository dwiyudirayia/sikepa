<header class="main-header">
    <div class="top-header">
        <div class="container">
            <ul class="contact-header">
                <li><i class="mdi mdi-phone"></i>021-3813351</li>
                <li><i class="mdi mdi-email-outline"></i>kerjasama@kemenpppa.go.id</li>
            </ul>
            <ul class="social-icon">
                <li><a target="_blank" href="https://www.facebook.com/kppdanpa"  title="Facebook"><i class="mdi mdi-facebook"></i></a></li>
                <li><a target="_blank" href="https://www.twitter.com/kpp_pa" title="Twitter"><i class="mdi mdi-twitter"></i></a></li>
                <li><a target="_blank" href="https://www.instagram.com/kemenpppa" title="Instagram"><i class="mdi mdi-instagram"></i></a></li>
                <li><a target="_blank" href="https://www.kemenpppa.go.id" title="KemenPPPA"><i class="mdi mdi-earth"></i></a></li>
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
                    <li class="dropdown {{ request()->is('informasi/*') ? 'active' : '' }}"><a href="#!">Informasi</a>
                        <div class="dropdown-hover">
                            <ul>
                                @foreach (\App\DeputiInformation::all() as $item)
                                    <li><a href="{{ route('information', ['slug' => $item->url ]) }}">{{ $item->title }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    <li class="{{ request()->is('page/tentang-sikepa') ? 'active' : '' }}"><a href="{{ route('page', ['slug' => 'tentang-sikepa']) }}">Tentang Sikepa</a></li>
                    <li class="{{ request()->is('page/submission/cooperation') ? 'active' : '' }}"><a href="{{ route('cooperation.submission') }}">Pengajuan Kerjasama</a></li>
                    <li class="{{ request()->is('page/faq') ? 'active' : '' }}"><a href="{{ route('faq') }}">FAQ</a></li>
                    <li class="{{ request()->is('page/article') || request()->is('page/article/*') ? 'active' : '' }}"><a href="{{ route('article') }}">Artikel</a></li>
                </ul>
                <div class="btn-login">
                    <a class="btn btn-lg btn-block btn-primary btn-rounded" href="/login/admin">Masuk</a>
                </div>
            </div>
            <div class="user-header">
                <a class="btn-rounded btn-login" href="/login/admin">Masuk<i class="mdi mdi-arrow-right"></i></a>
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
