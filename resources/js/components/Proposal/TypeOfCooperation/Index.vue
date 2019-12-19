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
                            <span>Daftar Jenis Kerjasama</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/proposal/typeof/cooperation/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Jenis Kerjasama Proposal'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Jenis Kerjasama</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_widget5_tab3_content" aria-expanded="false">
                        <!--begin::m-widget5-->
                        <div class="m-widget5" v-if="data.length != 0">
                            <div class="m-widget5__item" v-for="value in data" :key="value.id">
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
                                        <router-link :to="{name: 'ProposalTypeOfCooperationOneDerivativeListOne', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Lihat Permohonan Kerjasama'">
                                            <span>
                                                <i class="la la-list"></i>
                                                <span>Daftar Permohonan Kerjasama</span>
                                            </span>
                                        </router-link>
                                        <router-link :to="{name: 'ProposalTypeOfCooperationEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Jenis Kerjasama Proposal'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Jenis Kerjasama</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Jenis Kerjasama Proposal'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Jenis Kerjasama</span>
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
import $axios from '@/api.js';
export default {
    name: 'ProposalTypeOfCooperationIndex',
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
                    label: 'Jenis Kerjasama',
                    path: `/proposal/typeof/cooperation/${this.$route.params.id}/list`
                },
            ],
            data: [],
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
        this.getData();
    },
    beforeRouteLeave (to, from, next) {
        this.$store.commit('paramsOne', from.params.id);
        next();
    },
    methods: {
        getData() {
            $axios.get(`/admin/proposal/typeof/cooperation/${this.$route.params.id}`)
            .then(response => {
                this.data = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        },
        destroy(id) {
            this.$store.dispatch('proposal/destroyTypeOfCooperation', id).then(response => this.getData());
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
