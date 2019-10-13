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
                            <span>Daftar Banner</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/banner/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Banner'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Banner</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_widget5_tab3_content" aria-expanded="false">
                        <!--begin::m-widget5-->
                        <div class="m-widget5" v-if="this.$store.getters['banner/getData'].length != 0">
                            <div class="m-widget5__item" v-for="value in this.$store.getters['banner/getData']" :key="value.id">
                                <div class="m-widget5__content">
                                    <div class="m-widget5__section">
                                        <h4 class="m-widget5__title">
                                            {{ value.description }}
                                        </h4>
                                        <span class="m-widget5__desc">
                                            Tanggal di Buat: {{ value.created_at }}
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget5__content">
                                    <div class="m-widget5__stats1">
                                        <router-link :to="{name: 'BannerEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Banner'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Banner</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Banner'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Banner</span>
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
        </div>
    </div>
</template>

<script>
export default {
    name: 'BannerListCategory',
    data() {
        return {
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Kategori Banner',
                    path: `/banner/category`
                },
                {
                    id: 2,
                    label: 'Daftar Kategori Banner',
                    path: `/banner/list/${this.$route.params.id}/category`
                },
            ],
            breadcrumbTitle: 'Daftar Banner Kategori'
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['banner/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['banner/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['banner/getShowNotification'];
        }
    },
    created() {
        this.$store.dispatch('banner/listCategoryBanner', this.$route.params.id)
    },
    methods: {
        destroy(id) {
            this.$store.dispatch('banner/destroyBanner', id);
        },
        confirmDelete(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang terhapus tidak bisa di kembalikan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Hapus!'
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                    this.destroy(id);
                }
            })
        },
    }
}
</script>

<style>

</style>
