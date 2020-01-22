<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="flaticon-statistics"></i>
                        </span>
                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                            <span>Banner Artikel</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body no-pedding">
                <div class="list-section">
                    <div class="list-section__item" v-for="value in data" :key="value.id">
                        <div class="section__content image-box">
                            <div class="section__widget">
                                <div class="section__img">
                                    <img :src="`/storage/banner_article/${value.image_path}`" style="background-size: cover; background-position: center center;" class="thumbnail-img"/>
                                    <!-- <div class="thumbnail-img" style="background-image: url(&quot;assets/app/media/img/products/product11.jpg&quot;); background-size: cover; background-position: center center;">
                                        <img src="assets/app/media/img/products/product11.jpg" style="display: none;">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="section__action">
                            <div class="list__section__action">
                                <router-link :to="{name: 'BannerLandingPageEdit', params: {id: value.id}}" class="btn m-btn btn-success btn-sm m-btn--icon m-btn--pill m-btn--air icon-only" v-tooltip.top="'Untuk Edit Banner Artikel'">
                                    <span>
                                        <i class="la la-pencil"></i>
                                        <span>Edit Banner Artikel</span>
                                    </span>
                                </router-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $axios from '@/api.js';
export default {
    name: 'BannerLandingPageIndex',
    data() {
        return {
            breadcrumbTitle: 'Background Login',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Banner Article',
                    path: '/article/banner'
                },
            ],
            data: [],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/banner/landing/page`)
            .then(response => {
                this.data = response.data.data;
            })
        }
    },
}
</script>
