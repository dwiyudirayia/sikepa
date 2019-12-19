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
                            <span>Daftar Kesepahaman Kerjasama</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/proposal/typeof/cooperation/two/derivative/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Kesepahaman Kerjasama Proposal'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Kesepahaman Kerjasama</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_widget5_tab3_content" aria-expanded="false">
                        <!--begin::m-widget5-->
                        <div class="m-widget5" v-if="this.$store.getters['proposal/getData'].length != 0">
                            <div class="m-widget5__item" v-for="value in this.$store.getters['proposal/getData']" :key="value.id">
                                <div class="m-widget5__content">
                                    <div class="m-widget5__section">
                                        <h4 class="m-widget5__title">
                                            {{ value.name }}
                                        </h4>
                                        <span class="m-widget5__desc">
                                            Tanggal di Buat: {{ value.created_at }}
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget5__content">
                                    <div class="m-widget5__stats1">
                                        <router-link :to="{name: 'ProposalTypeOfCooperationTwoDerivativeEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Kesepahaman Kerjasama Proposal'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Kesepahaman Kerjasama</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Kesepahaman Kerjasama Proposal'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Kesepahaman Kerjasama</span>
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
    name: 'ListTypeOfCooperationTwo',
    data() {
        return {
            breadcrumbTitle: 'Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Jenis',
                    path: '/proposal/submission/type'
                },
                {
                    id: 2,
                    label: 'Daftar Kesepahaman Kerjasama',
                    path: `/proposal/typeof/cooperation/list/${this.$route.params.id}/two`
                },
            ]
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['proposal/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['proposal/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['proposal/getShowNotification'];
        },
    },
    created() {
        this.$store.dispatch('proposal/indexListTypeofCooperationListTwo', this.$route.params.id);
    },
    methods: {
        destroy(id) {
            this.$store.dispatch('proposal/destroyListTypeofCooperationListTwo', id);
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
    }
}
</script>

<style>

</style>
