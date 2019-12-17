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
                <div class="m-portlet__head-tools">
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
                                                <!-- <li class="m-nav__item">
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
                                                </li> -->
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_8_2" role="tab"><i class="la la-file"></i> Daftar Persetujuan Pengajuan P3</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="la la-file-archive-o"></i> Daftar Persetujuan Pengajuan Satker Sesmen</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_8_2" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                        <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                        <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                        <th style="vertical-align: middle;">Negara</th>
                                        <th style="vertical-align: middle;">Instansi</th>
                                        <th style="vertical-align: middle;">Nama Kantor</th>
                                        <th style="vertical-align: middle;">Lama Pengajuan</th>
                                        <th style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="tableData.guest.length">
                                        <tr v-for="(value, index) in tableData.guest" :key="value.id">
                                            <td style="vertical-align: middle;">{{ index+1 }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation_one == null ? "Kosong" : value.type_of_cooperation_one.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation_two == null ? "Kosong" : value.type_of_cooperation_two.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                            <td style="vertical-align: middle;">
                                                <router-link :to="{name: 'MonevActivityP3Create', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Kegiatan'">
                                                    <span>
                                                        <i class="la la-plus"></i>
                                                        <span>Tambah Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ListMonevActivityGuest', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Daftar Kegiatan'">
                                                    <span>
                                                        <i class="la la-list"></i>
                                                        <span>Daftar Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <!-- <router-link :to="{name: 'ResultMonevActivityGuest', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Nilai Kegiatan'">
                                                    <span>
                                                        <i class="la la-pencil-square"></i>
                                                        <span>Nilai Kegiatan</span>
                                                    </span>
                                                </router-link> -->
                                                
                                                <!-- <router-link :to="{name: 'ListMonevActivitySatkerCreate', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Daftar Kegiatan'">
                                                    <span>
                                                        <i class="la la-list"></i>
                                                        <span>Daftar Kegiatan</span>
                                                    </span>
                                                </router-link> -->
                                            </td>
                                            <!-- <td style="vertical-align: middle;">
                                                <router-link :to="{name: 'FaqEdit', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Tambah Kegiatan'">
                                                    <span>
                                                        <i class="la la-pencil"></i>
                                                        <span>Tambah Kegiatan</span>
                                                    </span>
                                                </router-link>
                                            </td> -->
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
                    <div class="tab-pane" id="m_tabs_8_3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                        <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                        <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                        <th style="vertical-align: middle;">Negara</th>
                                        <th style="vertical-align: middle;">Instansi</th>
                                        <th style="vertical-align: middle;">Nama Kantor</th>
                                        <th style="vertical-align: middle;">Lama Pengajuan</th>
                                        <th style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="tableData.satker.length">
                                        <tr v-for="(value, index) in tableData.satker" :key="value.id">
                                            <td style="vertical-align: middle;">{{ index+1 }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation_one == null ? "Kosong" : value.type_of_cooperation_one.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation_two == null ? "Kosong" : value.type_of_cooperation_two.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                            <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                            <td style="vertical-align: middle;">
                                                <router-link :to="{name: 'MonevActivitySatkerCreate', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Kegiatan'">
                                                    <span>
                                                        <i class="la la-plus"></i>
                                                        <span>Tambah Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ListMonevActivitySatker', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Daftar Kegiatan'">
                                                    <span>
                                                        <i class="la la-list"></i>
                                                        <span>Daftar Kegiatan</span>
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
        </div>
        <!-- <div class="modal fade" id="modal-import-monev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Import Monev</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Pilih File</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" @change="onFileChange" ref="files" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <span class="m-form__help">Pastikan Ekstensi File <strong>.xls</strong> atau <strong>.xlsx</strong></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="submit" :disabled="disabled" class="btn btn-primary">{{ textButton }}</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';

export default {
    name: 'MonitoringEvaluasiIndex',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Monitoring Evaluasi',
                    path: '/monev'
                },
            ],
            tableData: {
                guest: [],
                satker: [],
            },
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/monev`)
            .then(response => {
                this.tableData.guest = response.data.data.guest;
                this.tableData.satker = response.data.data.approval;
            })
        },
        // showModalImportMonev() {
        //     $('#modal-import-monev').modal('show');
        // },
        // onFileChange() {
        //     let uploadedFiles = this.$refs.files.files[0];
        //     this.file = uploadedFiles;
        // },
        // destroy(id) {
        //     $axios.delete(`/admin/monev/activity/${id}`)
        //     .then(response => {
        //         toastr.options = {
        //             "closeButton": false,
        //             "debug": false,
        //             "progressBar": true,
        //             "newestOnTop": false,
        //             "progressBar": false,
        //             "positionClass": "toast-top-center",
        //             "preventDuplicates": false,
        //             "onclick": null,
        //             "showDuration": "300",
        //             "hideDuration": "1000",
        //             "timeOut": "5000",
        //             "extendedTimeOut": "1000",
        //             "showEasing": "swing",
        //             "hideEasing": "linear",
        //             "showMethod": "fadeIn",
        //             "hideMethod": "fadeOut"
        //         };

        //         toastr.success(`${response.data.messages}`);
        //         this.data = response.data.data;
        //     })
        //     .catch(error => {
        //         toastr.error(`${response.data.messages}`);
        //     })
        // },
        // submit() {
        //     this.disabled = true;
        //     this.textButton = 'Loading ....';
        //     let formData = new FormData()
        //     formData.append('file', this.file);

        //     $axiosFormData.post(`/admin/monev/import`, formData)
        //     .then(response => {
        //         this.file = null;
        //         this.disabled = false;
        //         this.textButton = 'Submit';
        //         this.$refs.files.value = null;
        //         $('.custom-file-label').html('Choose File');
        //         $('#modal-import-monev').modal('hide');

        //         toastr.options = {
        //             "closeButton": false,
        //             "debug": false,
        //             "progressBar": true,
        //             "newestOnTop": false,
        //             "progressBar": false,
        //             "positionClass": "toast-top-center",
        //             "preventDuplicates": false,
        //             "onclick": null,
        //             "showDuration": "300",
        //             "hideDuration": "1000",
        //             "timeOut": "5000",
        //             "extendedTimeOut": "1000",
        //             "showEasing": "swing",
        //             "hideEasing": "linear",
        //             "showMethod": "fadeIn",
        //             "hideMethod": "fadeOut"
        //         };
        //         if(response.data.status != 200) {
        //             toastr.error(`${response.data.messages}`);
        //         } else {
        //             toastr.success(`${response.data.messages}`);
        //             this.data = response.data.data;
        //         }
        //     })
        // },
        // confirmDelete(id)
        // {
        //     Swal.fire({
        //         title: 'Apakah Anda Yakin?',
        //         text: "Data yang terhapus tidak bisa di kembalikan",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, Hapus!'
        //         }).then((result) => {
        //         if (result.value) {
        //             this.destroy(id);
        //         }
        //     })
        // },
    }
}
</script>
<style scoped>
.context-menu {
    cursor: context-menu;
}
</style>
