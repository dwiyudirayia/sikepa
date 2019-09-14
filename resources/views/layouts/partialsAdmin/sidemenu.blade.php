<div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
    <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
        @if (Auth::check())
        <li class="m-menu__item {{ (request()->is('dashboard')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{url('dashboard')}}" class="m-menu__link "><i class="m-menu__link-icon la la-dashboard"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span><span class="m-menu__link-badge"></span></span></span></a>
        </li>
        @else
        <li class="m-menu__item {{ (request()->is('simponi/dashboard/guest')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{url('simponi/dashboard/guest')}}" class="m-menu__link "><i class="m-menu__link-icon la la-dashboard"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span><span class="m-menu__link-badge"></span></span></span></a>
        </li>
        @endif
        <li class="m-menu__section ">
            <h4 class="m-menu__section-text">Optional</h4>
            <i class="m-menu__section-icon flaticon-more-v2"></i>
        </li>
        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('kelompok/*')) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-group"></i><span class="m-menu__link-text">Kelompok Tani</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    @if (Auth::check())
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('kelompok/tani')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('kelompok/tani') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Daftar Kelompok Tani</span></a>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('kelompok/latlng')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('kelompok/latlng') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Daftar Latitude / Longitude Kosong</span></a>
                    </li>
                    @else
                    <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('kelompok/tani/guest') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Daftar Kelompok Tani</span></a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @if (Auth::guest())
        <li class="m-menu__item {{ (request()->is('tamu/saran/create')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{url('tamu/saran/create')}}" class="m-menu__link "><i class="m-menu__link-icon la la-paper-plane-o"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Saran / Masukan</span><span class="m-menu__link-badge"></span></span></span></a>
        </li>
        @else
        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('histori/hibah') || request()->is('histori/hibah/filter')) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-history"></i><span class="m-menu__link-text">Histori</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('histori/hibah') || request()->is('histori/hibah/filter')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('histori/hibah') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Hibah</span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item {{ (request()->is('tani/koperasi')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{url('tani/koperasi')}}" class="m-menu__link"><i class="m-menu__link-icon flaticon-layers"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Koperasi</span><span class="m-menu__link-badge"></span></span></span></a>
        </li>
        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/prestasi/*')) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-archive"></i><span class="m-menu__link-text">Prestasi</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/prestasi/nasional') || request()->is('tani/prestasi/nasional/*')) ? 'm-menu__item--active' : ''  }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tani/prestasi/nasional') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Nasional</span></a>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/prestasi/provinsi') || request()->is('tani/prestasi/provinsi/*')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tani/prestasi/provinsi') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Provinsi</span></a>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/prestasi/kabupaten') || request()->is('tani/prestasi/kabupaten/*')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tani/prestasi/kabupaten') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Kabupaten</span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item {{ (request()->is('tani/status_kepemilikan')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{url('tani/status_kepemilikan')}}" class="m-menu__link "><i class="m-menu__link-icon la la-building"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Status Kepemilikan</span><span class="m-menu__link-badge"></span></span></span></a>
        </li>
        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/kegiatan/*')) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-archive"></i><span class="m-menu__link-text">Riwayat Kegiatan</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/kegiatan/bimtek')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tani/kegiatan/bimtek') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Bimtek</span></a>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tani/kegiatan/pameran')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tani/kegiatan/pameran') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pameran</span></a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="m-menu__item {{ (request()->is('tani/kegiatan')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
        </li>
        @role('Super Admin')
        <li class="m-menu__item {{ (request()->is('master')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true">
            <a href="{{url('master')}}" class="m-menu__link "><i class="m-menu__link-icon la la-folder"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Data Master</span><span class="m-menu__link-badge"></span></span></span></a>
        </li>
        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tamu/*')) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-users-1"></i><span class="m-menu__link-text">Tamu</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tamu/data')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tamu/data') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Data</span></a>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('tamu/saran')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('tamu/saran') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Saran</span></a>
                    </li>
                </ul>
            </div>
        </li>
        @endrole
        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('user/*')) ? 'm-menu__item--open' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover">
            <a href="javascript:;" class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-user"></i><span class="m-menu__link-text">User</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
            <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                <ul class="m-menu__subnav">
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('user/auth/detail')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('user/auth/detail') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Edit User</span></a>
                    </li>
                    <li class="m-menu__item m-menu__item--submenu {{ (request()->is('user/form/ganti/password')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('user/form/ganti/password') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Ganti Password</span></a>
                    </li>
                    @role('Super Admin')
                        <li class="m-menu__item m-menu__item--submenu {{ (request()->is('user')) ? 'm-menu__item--active' : '' }}" aria-haspopup="true" m-menu-submenu-toggle="hover"><a href="{{ url('user') }}" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pengolahan User</span></a>
                        </li>
                    @endrole
                </ul>
            </div>
        </li>
        @endif
    </ul>
</div>
