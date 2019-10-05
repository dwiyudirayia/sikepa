<template>
    <div>
        <div id="m_ver_menu" class="m-aside-menu  m-aside-menu--skin-light m-aside-menu--submenu-skin-light " m-menu-vertical="1" m-menu-scrollable="1" m-menu-dropdown-timeout="500" style="position: relative;">
            <ul class="m-menu__nav  m-menu__nav--dropdown-submenu-arrow ">
                <li class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/dasboard">
                        <i class="m-menu__link-icon la la-dashboard"></i><span class="m-menu__link-title"><span class="m-menu__link-wrap"> <span class="m-menu__link-text">Dashboard</span><span class="m-menu__link-badge"></span></span></span>
                    </router-link>
                </li>
                <li class="m-menu__section ">
                    <h4 class="m-menu__section-text">Optional</h4>
                    <i class="m-menu__section-icon flaticon-more-v2"></i>
                </li>
                <li v-if="$can('Create Article')" class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/section/article">
                        <i class="m-menu__link-icon la la-file-text"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Article</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/section/page">
                        <i class="m-menu__link-icon la la-tags"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">Page</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <li class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/user')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-user"></i><span class="m-menu__link-text">User</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user/changepassword" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Ganti Password</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pengolahan User</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li>
                <li class="m-menu__item" aria-haspopup="true">
                    <router-link class="m-menu__link" to="/faq">
                        <i class="m-menu__link-icon la la-question"></i>
                        <span class="m-menu__link-title">
                            <span class="m-menu__link-wrap">
                                <span class="m-menu__link-text">FAQ</span><span class="m-menu__link-badge"></span>
                            </span>
                        </span>
                    </router-link>
                </li>
                <!-- <li class="m-menu__item m-menu__item--submenu" :class="{'m-menu__item--open': subOpenMenu('/user')}" aria-haspopup="true" m-menu-submenu-toggle="hover">
                    <a class="m-menu__link m-menu__toggle"><i class="m-menu__link-icon la la-user"></i><span class="m-menu__link-text">User</span><i class="m-menu__ver-arrow la la-angle-right"></i></a>
                    <div class="m-menu__submenu " m-hidden-height="80" style=""><span class="m-menu__arrow"></span>
                        <ul class="m-menu__subnav">
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user/changepassword" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Ganti Password</span></router-link>
                            </li>
                            <li class="m-menu__item m-menu__item--submenu" aria-haspopup="true" m-menu-submenu-toggle="hover">
                                <router-link to="/user" class="m-menu__link m-menu__toggle"><i class="m-menu__link-bullet m-menu__link-bullet--dot"><span></span></i><span class="m-menu__link-text">Pengolahan User</span></router-link>
                            </li>
                        </ul>
                    </div>
                </li> -->
            </ul>
        </div>
    </div>
</template>

<script>
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
        }
    }
}
</script>
