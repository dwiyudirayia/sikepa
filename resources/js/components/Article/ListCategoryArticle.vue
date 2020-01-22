<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="flaticon-statistics"></i>
                        </span>
                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                            <span>Daftar Artikel</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/article/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Artikel'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Artikel</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_widget5_tab3_content" aria-expanded="false">
                        <!--begin::m-widget5-->
                        <div class="m-widget5" v-if="data.data.length != 0">
                            <div class="m-widget5__item" v-for="value in data.data" :key="value.id">
                                <div class="m-widget5__content">
                                    <div class="m-widget5__section">
                                        <h4 class="m-widget5__title">
                                            {{ value.title }}
                                        </h4>
                                        <span class="m-widget5__desc">
                                            Tanggal di Buat: {{ value.created_at }}
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget5__content">
                                    <div class="m-widget5__stats1">
                                        <router-link :to="{name: 'ArticleEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Artikel'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Artikel</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Artikel'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Artikel</span>
                                            </span>
                                        </button>
                                        <button @click="changePublishStatus(value.id)" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Ganti Status Publish'">
                                            <span v-if="value.publish == 0">
                                                <i class="la la-close"></i>
                                                <span>Ganti Status Publish</span>
                                            </span>
                                            <span v-else>
                                                <i class="la la-check"></i>
                                                <span>Ganti Status Publish</span>
                                            </span>
                                        </button>
                                        <button @click="changeApprovedStatus(value.id)" class="btn m-btn btn-accent btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Ganti Status Persetujuan'">
                                            <span v-if="value.approved == 0">
                                                <i class="la la-close"></i>
                                                <span>Ganti Status Persetujuan</span>
                                            </span>
                                            <span v-else>
                                                <i class="la la-check"></i>
                                                <span>Ganti Status Persetujuan</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget5" v-else>
                            <span class="m--font-danger text-center">Data Kosong</span>
                        </div>
                        <!--end::m-widget5-->
                    </div>
                </div>
            </div>
            <div class="m-portlet__foot">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        Total Record : <strong>{{ data.total }}</strong>
                    </div>
                    <div class="col-lg-6">
                        <pagination :data="data" @pagination-change-page="getData"></pagination>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
export default {
    name: 'ListCategoryArticle',
    data() {
        return {
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Section',
                    path: `/section/article`
                },
                {
                    id: 2,
                    label: 'Daftar Kategori Artikel',
                    path: `/category/${this.$route.params.id}/article`
                },
            ],
            breadcrumbTitle: 'Kategori',
            data: {},
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['article/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['article/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['article/getShowNotification'];
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData(page = 1) {
            $axios.get(`/admin/list/category/article/${this.$route.params.id}?page=` + page)
            .then(response => {
                this.data = response.data.data;
            });
        },
        destroy(id) {
            this.$store.dispatch('article/destroyArticle', id);
        },
        confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang terhapus tidak bisa di kembalikan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Data Berhasil di Hapus.',
                        'success'
                    );
                    this.destroy(id);
                }
            })
        },
        changePublishStatus(id) {
            this.$store.dispatch('article/changePublishStatus', id);
        },
        changeApprovedStatus(id) {
            this.$store.dispatch('article/changeApprovedStatus', id);
        },
    }
}
</script>

<style>

</style>
