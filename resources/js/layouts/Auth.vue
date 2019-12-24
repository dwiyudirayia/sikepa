<template>
    <div class="router-transitions">
        <div class="authentication-wrapper authentication-2 ui-bg-cover ui-bg-overlay-container">
            <div class="ui-bg-overlay bg-customize"
                :style="{
                    'background-image' : `url('/storage/photo_login/${this.backgroundImage}')`,
                    'background-size' : 'cover',
                    'background-position': 'center',
                    'background-repeat': 'no-repeat'
                }"
            />
            <div class="title-inner">
                <div class="title-app">
                    <h1>SIKEPA</h1>
                    <hr>
                    <h5>SISTEM INFORMASI KERJASAMA KEMENPPPA</h5>
                </div>
            </div>
            <div class="authentication-inner pt-3">
                <div class="card">
                    <div class="p-4 p-sm-5">
                        <div class="d-flex justify-content-center align-items-center pb-4">
                            <img src="/admin/sikepa.png" alt="">
                        </div>
                        <h5 class="text-center text-muted font-weight-normal mb-4">Login to Your Account</h5> <span></span>
                        <router-view></router-view>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import background from './../../sass/admin/5.jpg';
import logo from '~/admin/sikepa.png';
import $axios from '@/api.js';
export default {
    name: 'Auth',
    data() {
        return {
            background: background,
            logo: logo,
            backgroundImage: null,
        }
    },
    beforeCreate()
    {
        $('body').removeClass('m-page--fluid m--skin- m-content--skin-light2 m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default m-brand--minimize m-aside-left--minimize');

        $('body').addClass('m--skin- m-header--fixed m-header--fixed-mobile m-aside-left--enabled m-aside-left--skin-dark m-aside-left--fixed m-aside-left--offcanvas m-footer--push m-aside--offcanvas-default');
    },
    created() {
        this.getPhoto();
    },
    methods: {
        getPhoto() {
            $axios.get('get/photo')
            .then(response => {
                this.backgroundImage = response.data.data.image_path;
            })
        }
    }
}
</script>
