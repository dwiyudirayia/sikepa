<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Monitoring Evaluasi
                        </h3>
                    </div>
                </div>
                <!-- <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                <i class="la la-ellipsis-h m--font-brand"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item context-menu">
                                                    <router-link class="m-nav__link" :to="{name: 'MonitoringP3Create'}" v-tooltip.top="'Tambah MOU/PKS P3 Terdahulu'">
                                                        <i class="m-nav__link-icon la la-file"></i>
                                                        <span class="m-nav__link-text">Tambah MOU/PKS P3 Terdahulu </span>
                                                    </router-link>
                                                </li>
                                                <li class="m-nav__item context-menu">
                                                    <router-link class="m-nav__link" :to="{name: 'MonitoringSatkerCreate'}" v-tooltip.top="'Tambah MOU/PKS Satker Terdahulu'">
                                                        <i class="m-nav__link-icon la la-file-text"></i>
                                                        <span class="m-nav__link-text">Tambah MOU/PKS Satker Terdahulu </span>
                                                    </router-link>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a class="m-nav__link" v-tooltip.top="'Import Monev Terdahulu'" @click="showModalImportMonev">
                                                        <i class="m-nav__link-icon la la-upload"></i>
                                                        <span class="m-nav__link-text">Import</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="/download/format/mou" class="m-nav__link" v-tooltip.top="'Download Format Monev Terdahulu'">
                                                        <i class="m-nav__link-icon la la-download"></i>
                                                        <span class="m-nav__link-text">Download Format Import</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="/download/data/monev/pdf" class="m-nav__link" v-tooltip.top="'Download Data Berupa PDF'">
                                                        <i class="m-nav__link-icon la la-file-pdf-o"></i>
                                                        <span class="m-nav__link-text">Download Data</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <router-link class="m-nav__link" to="/monev/create">
                                                        <i class="m-nav__link-icon la la-plus"></i>
                                                        <span class="m-nav__link-text">Tambah Monev</span>
                                                    </router-link>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> -->
            </div>
            <div class="m-portlet__body">
                <div class="table-responsive">
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle; text-align:center;">No</th>
                                <th style="vertical-align: middle; text-align:center;">Judul Kegiatan</th>
                                <th style="vertical-align: middle; text-align:center;">Tanggal Kegiatan</th>
                                <th style="vertical-align: middle; text-align:center;">Lokasi</th>
                                <th style="vertical-align: middle; text-align:center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="data.length">
                                <tr v-for="(value, index) in data" :key="value.id">
                                    <td>{{ index+1 }}</td>
                                    <td>{{ value.title_activity }}</td>
                                    <td>{{ value.implementation_date }}</td>
                                    <td>{{ value.location }}</td>
                                    <td>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Hapus Kegiatan'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Kegiatan</span>
                                            </span>
                                        </button>
                                        <!-- <router-link :to="{name: 'ResultMonevActivitySatker', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Nilai Kegiatan'">
                                            <span>
                                                <i class="la la-pencil-square"></i>
                                                <span>Nilai Kegiatan</span>
                                            </span>
                                        </router-link> -->
                                        <router-link :to="{name: 'AdendumResultMonevActivitySatkerEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Edit Kegiatan'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Kegiatan</span>
                                            </span>
                                        </router-link>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="9" class="text-center">Data Kososng</td>
                                </tr>
                            </template>
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
    name: 'AdendumListMonevActivitySatker',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Monev',
                    path: '/monev/adendum'
                },
                {
                    id: 2,
                    label: 'Daftar Kegiatan Monitoring Evaluasi',
                    path: `/monev/adendum/activity/${this.$route.params.id}/satker/list`
                },
            ],
            data: [],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        destroy(id) {
            $axios.delete(`/admin/adendum/list/monev/activity/satker/${id}`)
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

                this.getData();
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
        getData() {
            $axios.get(`/admin/adendum/list/monev/activity/satker/${this.$route.params.id}`)
            .then(response => {
                this.data = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        }
    },
}
</script>

<style>

</style>
