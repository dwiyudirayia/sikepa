<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Informasi Deputi
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/deputy/information/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Informasi Deputi'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Informasi Deputi</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="table-responsive">
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;">No</th>
                                <th style="vertical-align: middle;">Judul</th>
                                <th style="vertical-align: middle;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="data.data.length">
                                <tr v-for="(item, index) in data.data" :key="item.id">
                                    <td style="vertical-align: middle;">{{ index+1 }}</td>
                                    <td style="vertical-align: middle;">{{ item.title }}</td>
                                    <td style="vertical-align: middle;">
                                        <router-link :to="{name: 'DeputiInformationEdit', params: {id: item.id}}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Informasi Deputi'">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit Informasi Deputi</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(item.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Informasi Deputi'">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus Informasi Deputi</span>
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="3" class="text-center">Data Tidak Ada</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
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
    name: 'DeputiInformationIndex',
    data() {
        return {
            breadcrumbTitle: 'Informasi Deputi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Informasi Deputi',
                    path: '/deputy/information'
                },
            ],
            data: [],
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData(page = 1) {
            $axios.get(`/admin/deputi/information?page=`+page)
            .then(response => {
                this.data = response.data.data;
            })
            .catch(error => console.log(error))
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
        destroy(id) {
            $axios.delete(`/admin/deputi/information/${id}`)
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
                this.getData(this.data.current_page);
            })
            .catch(error => {
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

                toastr.error(`${response.data.messages}`);
            })
        },
    }
}
</script>
