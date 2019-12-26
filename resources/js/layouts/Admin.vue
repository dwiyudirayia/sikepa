<template>
    <div class="m-grid m-grid--hor m-grid--root m-page">
        <header id="m_header" class="m-grid__item m-header" m-minimize-offset="200" m-minimize-mobile-offset="200">
            <div class="m-container m-container--fluid m-container--full-height">
                <div class="m-stack m-stack--ver m-stack--desktop">

                    <!-- BEGIN: Brand -->
                    <div class="m-stack__item m-brand  m-brand--skin-light ">
                        <div class="m-stack m-stack--ver m-stack--general">
                            <div class="m-stack__item m-stack__item--middle m-brand__logo">
                                <a href="#" class="m-brand__logo-wrapper">
                                    <img src="/assets/demo/default/media/img/logo/logo.svg" />
                                </a>
                            </div>
                            <div class="m-stack__item m-stack__item--middle m-brand__tools">
                                <!-- BEGIN: Left Aside Minimize Toggle -->
                                <a href="javascript:;" id="m_aside_left_minimize_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-desktop-inline-block  ">
                                    <span></span>
                                </a>

                                <!-- END -->

                                <!-- BEGIN: Responsive Aside Left Menu Toggler -->
                                <a href="javascript:;" id="m_aside_left_offcanvas_toggle" class="m-brand__icon m-brand__toggler m-brand__toggler--left m--visible-tablet-and-mobile-inline-block">
                                    <span></span>
                                </a>

                                <!-- END -->

                                <!-- BEGIN: Responsive Header Menu Toggler -->
                                <!--<a id="m_aside_header_menu_mobile_toggle" href="javascript:;" class="m-brand__icon m-brand__toggler m--visible-tablet-and-mobile-inline-block">
                                        <span></span>
                                    </a>-->

                                <!-- END -->

                                <!-- BEGIN: Topbar Toggler -->
                                <a id="m_aside_header_topbar_mobile_toggle" href="javascript:;" class="m-brand__icon m--visible-tablet-and-mobile-inline-block">
                                    <i class="la la-ellipsis-v "></i>
                                </a>

                                <!-- BEGIN: Topbar Toggler -->
                            </div>
                        </div>
                    </div>

                    <!-- END: Brand -->
                    <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                        <div id="m_header_topbar" class="m-topbar  m-stack m-stack--ver m-stack--general m-stack--fluid">
                            <div class="m-stack__item m-topbar__nav-wrapper flex">
                                <ul class="m-topbar__nav m-nav m-nav--inline">
                                    <li id="view-frontend" class="m-nav__item">
                                        <a href="https://sikepa.beta.4visionmedia.com" class="m-menu__link">
                                            <span class=" m-menu__link-text">View Frontend</span>
                                            <i class="m-menu__link-icon la la-external-link"></i>
                                        </a>
                                    </li>
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click" aria-expanded="true">
                                        <a href="#" class="m-nav__link m-dropdown__toggle">
                                            <span class="m-topbar__userpic">
                                                <img :src="`/storage/photo_user/${this.$store.state.user.authenticated.photo}`" v-if="this.$store.state.user.authenticated.photo != null" class="m--img-rounded m--marginless" alt="">
                                            </span>
                                            <span class="m-topbar__username m--hide">{{ this.$store.state.user.authenticated.name }}</span>
                                        </a>
                                        <div class="m-dropdown__wrapper" style="z-index: 101;">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 12.5px;"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center">
                                                    <div class="m-card-user m-card-user--skin-dark">
                                                        <div class="m-card-user__pic">
                                                            <img :src="`/storage/photo_user/${this.$store.state.user.authenticated.photo}`" v-if="this.$store.state.user.authenticated.photo != null" class="m--img-rounded m--marginless" alt="">
                                                            <!--
                        <span class="m-type m-type--lg m--bg-danger"><span class="m--font-light">S<span><span>
                        -->
                                                        </div>
                                                        <div class="m-card-user__details">
                                                            <span class="m-card-user__name m--font-weight-500">{{ this.$store.state.user.authenticated.name }}</span>
                                                            <a href="" class="m-card-user__email m--font-weight-300 m-link">{{ this.$store.state.user.authenticated.index_roles_name }}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="m-nav m-nav--skin-light">
                                                            <!-- <li class="m-nav__section m--hide">
                                                                <span class="m-nav__section-text">Section</span>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#!" class="m-nav__link">
                                                                    <i class="m-nav__link-icon la la-user"></i>
                                                                    <span class="m-nav__link-text">My Profile</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#!" class="m-nav__link">
                                                                    <i class="m-nav__link-icon la la-share-alt"></i>
                                                                    <span class="m-nav__link-title">
                                                                        <span class="m-nav__link-wrap">
                                                                            <span class="m-nav__link-text">Activity</span>
                                                                            <span class="m-nav__link-badge"><span class="m-badge m-badge--success">2</span></span>
                                                                        </span>
                                                                    </span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#!" class="m-nav__link">
                                                                    <i class="m-nav__link-icon la la-comments"></i>
                                                                    <span class="m-nav__link-text">Messages</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#!" class="m-nav__link">
                                                                    <i class="m-nav__link-icon la la-question-circle"></i>
                                                                    <span class="m-nav__link-text">FAQ</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__item">
                                                                <a href="#!" class="m-nav__link">
                                                                    <i class="m-nav__link-icon la la-life-bouy"></i>
                                                                    <span class="m-nav__link-text">Support</span>
                                                                </a>
                                                            </li>
                                                            <li class="m-nav__separator m-nav__separator--fit">
                                                            </li> -->
                                                            <li class="m-nav__item context-menu" @click="logout">
                                                                <a class="m-nav__link">
                                                                    <i class="m-nav__link-icon la la-sign-out"></i>
                                                                    <span class="m-nav__link-text">Keluar</span>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click" aria-expanded="true">
                                        <a href="#" class="m-nav__link m-dropdown__toggle" id="m_topbar_notification_icon">
                                            <span class="m-nav__link-badge m-badge m-badge--dot m-badge--dot-small m-badge--danger" v-if="notifications.length > 0"></span>
                                            <span class="m-nav__link-icon"><i class="flaticon-alarm"></i></span>
                                        </a>
                                        <div class="m-dropdown__wrapper" style="z-index: 101;">
                                            <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 12.5px;"></span>
                                            <div class="m-dropdown__inner">
                                                <div class="m-dropdown__header m--align-center" style="{backgroundImage: `url('${BackgroundNotification}')`, backgroundSize: cover;}">
                                                    <span class="m-dropdown__header-title">{{ notifications.length }} Pemberitahuan</span>
                                                </div>
                                                <div class="m-dropdown__body">
                                                    <div class="m-dropdown__content">
                                                        <ul class="nav nav-tabs m-tabs m-tabs-line m-tabs-line--brand" role="tablist">
                                                            <li class="nav-item m-tabs__item">
                                                                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#topbar_notifications_notifications" role="tab">
                                                                    Pemberitahuan
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content">
                                                            <div class="tab-pane active" id="topbar_notifications_notifications" role="tabpanel">
                                                                <div class="m-scrollable m-scroller" data-scrollable="true" data-height="250" data-mobile-height="200" style="height: 200px; overflow: auto;">
                                                                    <div class="m-list-timeline m-list-timeline--skin-light">
                                                                        <div class="m-list-timeline__items">
                                                                            <div class="m-list-timeline__item" v-for="(value, index) in notifications" :key="index">
                                                                                <span class="m-list-timeline__badge -m-list-timeline__badge--state-success"></span>
                                                                                <router-link class="m-list-timeline__text" style="color:black;" :to="{name: value.data.path}" @click.native="readNotif(value)">{{ value.data.message }}</router-link>
                                                                                <span class="m-list-timeline__time">{{ value.created_at | formatDate }}</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                                <div class="m-stack m-stack--ver m-stack--general" style="min-height: 180px;">
                                                                    <div class="m-stack__item m-stack__item--center m-stack__item--middle">
                                                                        <span class="">All caught up!<br>No new logs.</span>
                                                                    </div>
                                                                </div>
                                                            </div> -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="m-grid__item m-grid__item--fluid m-grid m-grid--ver-desktop m-grid--desktop m-body">
            <!-- BEGIN: Left Aside -->
            <button class="m-aside-left-close  m-aside-left-close--skin-light " id="m_aside_left_close_btn"><i class="la la-close"></i></button>
            <div id="m_aside_left" class="m-grid__item	m-aside-left  m-aside-left--skin-light ">
                <SideMenu></SideMenu>
            </div>
            <!-- END: Left Aside -->
            <div class="m-grid__item m-grid__item--fluid m-wrapper">

                <div class="m-content">
                    <div class="m-portlet__body">
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:: Body -->

        <!-- begin::Footer -->
        <footer class="m-grid__item	m-footer ">
            <div class="m-container m-container--fluid m-container--full-height m-page__container">
                <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
                    <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                        <span class="m-footer__copyright">
                            2019 &copy; Developed by <a href="#" class="m-link">SIKEPA</a>
                        </span>
                    </div>
                    <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                        <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                        </ul>
                    </div>
                </div>
            </div>
        </footer>

    <!-- end::Footer -->
</div>

</template>

<script>
import SideMenu from '@/components/partialsAdmin/SideMenu.vue';
import $axios from '@/api.js';
import { mapState, mapActions } from 'vuex';
import moment from 'moment';
import BackgroundNotification from '~/admin/notification_bg.jpg';
export default {
    name: "Admin",
    components: {
        SideMenu
    },
    beforeCreate()
    {
        $('body').removeClass('m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default');

        $('body').addClass('m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default');
    },
    computed: {
        ...mapState('user', {
            authenticated: state => state.authenticated
        }),

        //CUKUP TAMBAHKAN BAGIAN INI
        ...mapState('notification', {
            notifications: state => state.notifications //MENGAMBIL STATE NOTIFICATIONS
        })
    },
    filters: {
        //UNTUK MENGUBAH FORMAT TANGGAL MENJADI TIME AGO
        formatDate(val) {
            return moment(new Date(val)).fromNow()
        }
    },
    methods: {
        ...mapActions('notification', ['readNotification']), //DEFINISIKAN FUNGSI UNTUK READ NOTIF
        readNotif(row) {
            //MENGIRIMKAN REQUEST KE SERVER UNTUK MENANDAI BAHWA NOTIFIKASI TELAH DI BACA
            //KEMUDIAN SELANJUTNYA KITA REDIRECT KE HALAMAN VIEW EXPENSES
            this.readNotification({ id: row.id});
        },
        logout() {
            $axios.post(`/admin/logout`)
            .then(() => {
                localStorage.removeItem('token')
                this.$store.state.token = localStorage.getItem('token')
                window.location.href = '/login/admin';
            })
        },
    },
}
</script>
<style scoped>
    .context-menu {
        cursor: context-menu;
    }
</style>
