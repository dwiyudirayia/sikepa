<template>
    <div>
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <li class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/dashboard">
                        <i class="m-menu__link-icon la la-dashboard"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span><span class="m-menu__link-badge"></span></span></span>
                    </router-link>
                </li>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">Main Menu</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/section/article" :class="{'router-link-exact-active' : subOpenMenu('/section/article')}">
                        <i class="m-menu__link-icon la la-file-text"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Artikel</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/section/page">
                        <i class="m-menu__link-icon la la-tags"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Halaman</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/deputy/information">
                        <i class="m-menu__link-icon la la-users"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Informasi Deputi</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/testimoni">
                        <i class="m-menu__link-icon la la-comment"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Testimoni</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/proposal')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon flaticon-box"></i><span class="m-menu__link-text">Data Master Pengajuan</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <!-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/proposal/category" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Kategori</span></router-link>
                            </li> -->
                            <!-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/proposal/cooperation/target" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Target Kerjasama</span></router-link>
                            </li> -->
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/proposal/typeof/cooperation/list/one" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Kerjasama</span></router-link>
                            </li>
                            <!-- <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/proposal/subtance/cooperation" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Kerjasama Subtansi</span></router-link>
                            </li> -->
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/proposal/agency" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Instansi</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li v-if="$can('Lihat Pengajuan Kerjasama')" class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/mou')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon fa fa-file-alt"></i><span class="m-menu__link-text">MOU Baru</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/mou/submission/cooperation/approve" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Terima</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/mou/submission/cooperation/reject" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tolak</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/mou/submission/cooperation" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Proses</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li v-if="$can('Lihat Pengajuan Kerjasama')" class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/extension')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-file-text"></i><span class="m-menu__link-text">Perpanjangan MOU</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/extension/submission/cooperation/approve" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Terima</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/extension/submission/cooperation/reject" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tolak</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/extension/submission/cooperation" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Proses</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li v-if="$can('Lihat Pengajuan Kerjasama')" class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/adendum')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-file-o"></i><span class="m-menu__link-text">Adendum MOU</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/adendum/submission/cooperation/approve" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Terima</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/adendum/submission/cooperation/reject" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tolak</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/adendum/submission/cooperation" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Proses</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- <li v-if="$can('Lihat Pengajuan Kerjasama')" class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/pks')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-file-o"></i><span class="m-menu__link-text">PKS</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/pks/submission/cooperation/approve" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Terima</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/pks/submission/cooperation/reject" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Tolak</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/pks/submission/cooperation" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Proses</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li> -->
                <li class="m-menu__item" aria-haspopup="true" v-if="$can('Pengajuan Kerjasama')">
                    <router-link to="/submission/cooperation/create" class="m-menu__link">
                        <i class="m-menu__link-icon fa fa-handshake"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Pengajuan Kerjasama</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/faq">
                        <i class="m-menu__link-icon la la-question"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">FAQ</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li class="m-menu__section" v-if="$can('Admin')">
                    <h4 class="m-menu__section-text">Konfigurasi</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/article/banner">
                        <i class="m-menu__link-icon la la-image"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Banner Halaman</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/background/login">
                        <i class="m-menu__link-icon la la-image"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Background Login</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Admin')" class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/config')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-cogs"></i><span class="m-menu__link-text">Pengaturan User</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li v-if="$can('Mengatur Role')" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/config/access/rights" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Role & Hak Akses</span></router-link>
                            </li>
                            <li v-if="$can('Mengubah Role User')" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/config/role/user" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">User</span></router-link>
                            </li>
                            <li v-if="$can('Admin')" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/article/banner/change/config" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pengaturan Banner</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="m-menu__section" v-if="$can('Monev')">
                    <h4 class="m-menu__section-text">Monitoring Evaluasi</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li v-if="$can('Monev')" class="m-menu__item" aria-haspopup="true" :class="{'router-link-exact-active': subOpenMenu('/monev/mou')}">
                    <router-link class="m-menu__link" to="/monev/mou">
                        <i class="m-menu__link-icon la la-pencil-square"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">MONEV MOU</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Monev')" class="m-menu__item" aria-haspopup="true" :class="{'router-link-exact-active': subOpenMenu('/monev/adendum')}">
                    <router-link class="m-menu__link" to="/monev/adendum">
                        <i class="m-menu__link-icon la la-sticky-note"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">MONEV Adendum</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li v-if="$can('Monev')" class="m-menu__item" aria-haspopup="true" :class="{'router-link-exact-active': subOpenMenu('/monev/extension')}">
                    <router-link class="m-menu__link" to="/monev/extension">
                        <i class="m-menu__link-icon flaticon-notes"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">MONEV Perpanjangan</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">User Menu</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/user')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-user"></i><span class="m-menu__link-text">User</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user/change/password" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Ganti Password</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user/edit/profile" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Edit Profil</span></router-link>
                            </li>
                            <li v-if="$can('Admin')" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user/admin" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Admin</span></router-link>
                            </li>
                            <li v-if="$can('Admin')" class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user/satker" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">User KPPA</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="m-menu__item" aria-haspopup="true" @click="logout">
                    <a class="m-menu__link">
                        <i class="m-menu__link-icon la la-sign-out text-danger"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text text-danger">Keluar</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
export default {
    name: 'SideMenu',
    data: function(){
        return {
            activeOpens: 'm-menu__item--open'
        }
    },
    computed: {
        currentPages() {
            return this.$route.path;
        },
    },
    methods: {
        subOpenMenu(input) {
            const paths = Array.isArray(input) ? input : [input]
            return paths.some(path => {
                return this.$route.path.indexOf(path) === 0 // current path starts with this path string
            })
        },
        logout() {
            $axios.post(`/admin/logout`)
            .then(() => {
                localStorage.removeItem('token');
                localStorage.removeItem('permissions');
                localStorage.removeItem('roles');
                this.$store.state.token = localStorage.getItem('token')
                window.location.href = '/login/admin';
            })
        },
    }
}
</script>
