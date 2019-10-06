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
                            <span>Daftar Intansi</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/agency/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Intansi'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Intansi</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin::Content-->
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_widget5_tab3_content" aria-expanded="false">

                        <!--begin::m-widget5-->
                        <div class="m-widget5" v-if="this.$store.getters['agency/getData'].length != 0">
                            <div class="m-widget5__item" v-for="value in this.$store.getters['agency/getData']" :key="value.id">
                                <div class="m-widget5__content">
                                    <div class="m-widget5__section">
                                        <h4 class="m-widget5__title">
                                            {{ value.name }}
                                        </h4>
                                        <span class="m-widget5__desc">
                                            {{ value.address }}
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget5__content">
                                    <div class="m-widget5__stats1">
                                        <router-link :to="{name: 'AgencyEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Agency'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Agency</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Agency'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Agency</span>
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
    name: 'AgencyIndex',
    data() {
        return {
            breadcrumbTitle: 'Intansi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Intansi',
                    path: '/agency'
                },
            ]
        }
    },
    props: ['data', 'title'],
    computed: {
        getMessage()
        {
            return this.$store.getters['agency/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['agency/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['agency/getShowNotification'];
        }
    },
    mounted() {
        this.$store.dispatch('agency/index');
    },
    methods: {
        destroy(id) {
            this.$store.dispatch('agency/destroy', id);
        },
        confirmDelete(id)
        {
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
