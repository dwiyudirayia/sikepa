<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Daftar Aktivitas
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="table-responsive">
                    <table class="table m-table m-table--head-bg-brand table-bordered">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle; text-align:center;" rowspan="3">No.</th>
                                <th style="vertical-align: middle; text-align:center;" colspan="5">Monitoring Administrasi Pelaksanaan MOU</th>
                                <th style="vertical-align: middle; text-align:center;">Monitoring Kunjungan Lapangan</th>
                                <th style="vertical-align: middle; text-align:center;" rowspan="3">Evaluasi</th>
                                <th style="vertical-align: middle; text-align:center;" rowspan="3">Rekomendasi</th>
                                <th style="vertical-align: middle; text-align:center;" rowspan="3">Aksi</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle; text-align:center;" colspan="3">Perkembangan Program Kerjasama</th>
                                <th style="vertical-align: middle; text-align:center;" rowspan="2">Permasalahan</th>
                                <th style="vertical-align: middle; text-align:center;" rowspan="2">Upaya Penyelesaian Masalah</th>
                                <th style="vertical-align: middle; text-align:center;" rowspan="2">Laporan Kunjungan Lapangan</th>
                            </tr>
                            <tr>
                                <th style="vertical-align: middle; text-align:center;">Anggaran</th>
                                <th style="vertical-align: middle; text-align:center;">Target</th>
                                <th style="vertical-align: middle; text-align:center;" >Capaian</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, index) in data" :key="value.id">
                                <td>{{ index+1 }}</td>
                                <td>{{ value.budget }}</td>
                                <td>{{ value.target }}</td>
                                <td>{{ value.achievements }}</td>
                                <td>{{ value.the_problem }}</td>
                                <td>{{ value.problem_solving_efforts }}</td>
                                <td>{{ value.implementation_of_activity_reports }}</td>
                                <td>{{ value.evaluation }}</td>
                                <td>{{ value.recomendation }}</td>
                                <td>
                                    <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Monev'">
                                        <span>
                                            <i class="la la-trash"></i>
                                            <span>Hapus Monev</span>
                                        </span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';

export default {
    name: 'ListMonevActivity',
    data: () => ({
        breadcrumbTitle: 'Monitoring Evaluasi',
        breadcrumbLink: [
            {
                id: 1,
                label: 'Monitoring Evaluasi',
                path: '/monev'
            },
            {
                id: 2,
                label: 'List Monitoring Evaluasi',
                path: '/list/monev/activity/2'
            }
        ],
        data: [],
    }),
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/monev/list/activity/${this.$route.params.id}`)
            .then(response => {
                this.data = response.data.data;
            })
        },
        destroy(id) {
            $axios.delete(`/admin/monev/list/activity/${id}`)
            .then(response => {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "progressBar": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                toastr.success(`${response.data.messages}`);
                this.data = response.data.data;
            })
            .catch(error => {
                toastr.error(`${response.data.messages}`);
            })
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
                    this.destroy(id);
                }
            })
        },
    },
}
</script>

<style>

</style>
