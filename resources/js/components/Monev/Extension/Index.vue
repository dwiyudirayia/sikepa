<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-alert m-alert--icon m-alert--icon-solid m-alert--outline alert alert-warning alert-dismissible fade show" role="alert" v-if="checkMOU > 0">
            <div class="m-alert__icon">
                <i class="flaticon-exclamation-1"></i>
                <span></span>
            </div>
            <div class="m-alert__text">
                <strong>Perhatian!</strong> Masa berlaku MOU ada beberapa yang hampir habis
            </div>
            <div class="m-alert__close">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                </button>
            </div>
        </div>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Monitoring Evaluasi
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_8_2" role="tab"><i class="la la-file"></i> Pihak External</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="la la-file-archive-o"></i> Pihak Internal Kemen PPPA</a>
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
                                        <th style="vertical-align: middle;">Jenis Permohonan</th>
                                        <th style="vertical-align: middle;">Judul MOU</th>
                                        <th style="vertical-align: middle;">Negara</th>
                                        <th style="vertical-align: middle;">Jenis Instansi</th>
                                        <th style="vertical-align: middle;">Nama Instansi</th>
                                        <th style="vertical-align: middle;">Masa Berlaku</th>
                                        <th style="vertical-align: middle;">Durasi</th>
                                        <th style="vertical-align: middle;">MOU Dari</th>
                                        <th style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="tableData.guest.length">
                                        <tr v-for="(value, index) in tableData.guest" :key="value.id">
                                            <td style="vertical-align: middle;">{{ index+1 }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation == null ? "Kosong" : value.type_of_cooperation }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_application == null ? "Kosong" : value.type_of_application }}</td>
                                            <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                            <td style="vertical-align: middle;">{{ value.country_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.agencies }}</td>
                                            <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                            <td style="vertical-align: middle;">
                                                <span class="m-badge m-badge--wide" :class="value.year_duration == 0 ? 'm-badge--danger' : 'm-badge--success'">{{ value.duration }}</span>
                                            </td>
                                            <td style="vertical-align: middle;">{{ value.mou_from }}</td>
                                            <td style="vertical-align: middle;">
                                                <router-link :to="{name: 'ExtensionMonevActivityP3Create', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Kegiatan'">
                                                    <span>
                                                        <i class="la la-plus"></i>
                                                        <span>Tambah Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ExtensionListMonevActivityGuest', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Daftar Kegiatan'">
                                                    <span>
                                                        <i class="la la-list"></i>
                                                        <span>Daftar Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ExtensionDetailMonevGuest', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Detail Monev'">
                                                    <span>
                                                        <i class="la la-eye"></i>
                                                        <span>Detail Monev</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ExtensionReportMonevGuest', params: { id: value.id }}" class="btn m-btn btn-warning btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Nilai MOU'" v-if="$can('Bagian Kerjasama')">
                                                    <span>
                                                        <i class="la la-pencil-square-o"></i>
                                                        <span>Report MOU</span>
                                                    </span>
                                                </router-link>
                                                <button @click="downloadSummaryMonevGuest(value.id)" class="btn m-btn btn-secondary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Download Rangkuman Monev'">
                                                    <span>
                                                        <i class="la la-file"></i>
                                                        <span>Download Rangkuman Monev</span>
                                                    </span>
                                                </button>
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
                        <b-pagination
                            v-if="metaGuest.last_page > 1"
                            v-model="metaGuest.current_page"
                            :total-rows="metaGuest.total"
                            :limit="7"
                            :per-page="metaGuest.per_page"
                            @input="getDataGuest(metaGuest.current_page)"
                        />
                    </div>
                    <div class="tab-pane" id="m_tabs_8_3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                        <th style="vertical-align: middle;">Jenis Permohonan</th>
                                        <th style="vertical-align: middle;">Judul MOU</th>
                                        <th style="vertical-align: middle;">Negara</th>
                                        <th style="vertical-align: middle;">Jenis Instansi</th>
                                        <th style="vertical-align: middle;">Nama Instansi</th>
                                        <th style="vertical-align: middle;">Masa Berlaku</th>
                                        <th style="vertical-align: middle;">Durasi</th>
                                        <th style="vertical-align: middle;">MOU Dari</th>
                                        <th style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-if="tableData.satker.length">
                                        <tr v-for="(value, index) in tableData.satker" :key="value.id">
                                            <td style="vertical-align: middle;">{{ index+1 }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_cooperation == null ? "Kosong" : value.type_of_cooperation }}</td>
                                            <td style="vertical-align: middle;">{{ value.type_of_application == null ? "Kosong" : value.type_of_application }}</td>
                                            <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                            <td style="vertical-align: middle;">{{ value.country_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.agencies }}</td>
                                            <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                            <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                            <td style="vertical-align: middle;">
                                                <span class="m-badge m-badge--wide" :class="value.year_duration == 0 ? 'm-badge--danger' : 'm-badge--success'">{{ value.duration }}</span>
                                            </td>
                                            <td style="vertical-align: middle;">{{ value.mou_from }}</td>
                                            <td style="vertical-align: middle;">
                                                <router-link :to="{name: 'ExtensionMonevActivitySatkerCreate', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Kegiatan'">
                                                    <span>
                                                        <i class="la la-plus"></i>
                                                        <span>Tambah Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ExtensionListMonevActivitySatker', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Daftar Kegiatan'">
                                                    <span>
                                                        <i class="la la-list"></i>
                                                        <span>Daftar Kegiatan</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ExtensionDetailMonevSatker', params: { id: value.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Detail Kegiatan'">
                                                    <span>
                                                        <i class="la la-eye"></i>
                                                        <span>Detail Monev</span>
                                                    </span>
                                                </router-link>
                                                <router-link :to="{name: 'ExtensionReportMonev', params: { id: value.id }}" class="btn m-btn btn-warning btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Nilai MOU'" v-if="$can('Bagian Kerjasama')">
                                                    <span>
                                                        <i class="la la-pencil-square-o"></i>
                                                        <span>Report MOU</span>
                                                    </span>
                                                </router-link>
                                                <button @click="downloadSummaryMonevSatker(value.id)" class="btn m-btn btn-secondary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Download Rangkuman Monev'">
                                                    <span>
                                                        <i class="la la-file"></i>
                                                        <span>Download Rangkuman Monev</span>
                                                    </span>
                                                </button>
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
                        <b-pagination
                            v-if="metaSatker.last_page > 1"
                            v-model="metaSatker.current_page"
                            :total-rows="metaSatker.total"
                            :limit="7"
                            :per-page="metaSatker.per_page"
                            @input="getDataApproval(metaSatker.current_page)"
                        />
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
    name: 'ExtensionMonitoringEvaluasiIndex',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Monitoring Evaluasi',
                    path: '/monev/extension'
                },
            ],
            tableData: {
                guest: [],
                satker: [],
            },
            metaGuest: {
                current_page: null,
                per_page: null,
                last_page: null,
                total: null,
            },
            metaSatker: {
                current_page: null,
                per_page: null,
                last_page: null,
                total: null,
            },
            reportMOU: null,
            reportMOUGuest: null,
            checkMOU: null,
        }
    },
    created() {
        this.getDataApproval();
        this.getDataGuest();
    },
    methods: {
        downloadSummaryMonevSatker(id) {
            window.location.href = `/api/admin/extension/download/monev/activity/satker/${id}?token=${localStorage.getItem('token')}`;
        },
        downloadSummaryMonevGuest(id) {
            window.location.href = `/api/admin/extension/download/monev/activity/guest/${id}?token=${localStorage.getItem('token')}`;
        },
        getDataApproval(page = 1) {
            $axios.get(`/admin/extension/monev/approval?page=${page}`)
            .then(response => {
                // this.tableData.guest = response.data.data.guest;
                // this.tableData.satker = response.data.data.approval;

                // const dataGuest = response.data.data.guest.data;
                // const dataSatker = response.data.data.approval.data;

                // const filterGuest = dataGuest.filter(value => value.year_duration == 0).length;
                // const filterSatker = dataSatker.filter(value => value.year_duration == 0).length;

                // this.checkMOU = filterGuest + filterSatker;

                this.tableData.satker = response.data.data;
                this.metaSatker.current_page = response.data.meta.current_page;
                this.metaSatker.per_page = response.data.meta.per_page;
                this.metaSatker.last_page = response.data.meta.last_page;
                this.metaSatker.total = response.data.meta.total;
            })
        },
        getDataGuest(page = 1) {
            $axios.get(`/admin/extension/monev/guest?page=${page}`)
            .then(response => {
                this.tableData.guest = response.data.data;
                this.metaGuest.current_page = response.data.meta.current_page;
                this.metaGuest.per_page = response.data.meta.per_page;
                this.metaGuest.last_page = response.data.meta.last_page;
                this.metaGuest.total = response.data.meta.total;
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
