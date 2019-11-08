<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
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
                                                <li class="m-nav__item">
                                                    <a class="m-nav__link" v-tooltip.top="'Import MOU Terdahulu'" @click="showModalImportMonev">
                                                        <i class="m-nav__link-icon la la-upload"></i>
                                                        <span class="m-nav__link-text">Import</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="/download/format/mou" class="m-nav__link" v-tooltip.top="'Export Format MOU Terdahulu'">
                                                        <i class="m-nav__link-icon la la-download"></i>
                                                        <span class="m-nav__link-text">Download</span>
                                                    </a>
                                                </li>
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
                <div class="table-responsive">
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;">No</th>
                                <th style="vertical-align: middle;">Judul MOU</th>
                                <th style="vertical-align: middle;">Latar Belakang</th>
                                <th style="vertical-align: middle;">Tanggal TTD</th>
                                <th style="vertical-align: middle;">Tanggal Berakhir</th>
                                <th style="vertical-align: middle;">Status</th>
                                <th style="vertical-align: middle;">Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="data.length">
                                <tr v-for="(item, index) in data" :key="item.id">
                                    <td style="vertical-align: middle;">{{ index+1 }}</td>
                                    <td style="vertical-align: middle;">{{ item.title_of_cooperation }}</td>
                                    <td style="vertical-align: middle;">{{ item.background }}</td>
                                    <td style="vertical-align: middle;">{{ item.tanggal_ttd }}</td>
                                    <td style="vertical-align: middle;">{{ item.end_date }}</td>
                                    <td style="vertical-align: middle;">{{ item.status == 1 ? 'Masih Berlaku' : 'Tidak Berlaku' }}</td>
                                    <td style="vertical-align: middle;">{{ item.description }}</td>
                                    <td>
                                        <router-link :to="{name: 'MonevActivityCreate', params: { id: item.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Tambah Kegiatan'">
                                            <span>
                                                <i class="la la-plus"></i>
                                                <span>Tambah Kegiatan</span>
                                            </span>
                                        </router-link>
                                        <router-link :to="{name: 'MonevActivityDetail', params: { id: item.id }}" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Monev'">
                                            <span>
                                                <i class="la la-eye"></i>
                                                <span>Detail Monev</span>
                                            </span>
                                        </router-link>
                                    </td>
                                </tr>
                            </template>
                            <template v-else>
                                <tr>
                                    <td colspan="7" class="text-center">Data Tidak Ada</td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--begin::Modal-->
        <div class="modal fade" id="modal-import-monev" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999;">
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
        </div>
        <!--end::Modal-->
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
            approvalSubmission: [],
            youSubmission: [],
            file: null,
            disabled: false,
            textButton: 'Submit',
            data: []
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
    methods: {
        getData() {
            $axios.get(`/admin/monev`)
            .then(response => {
                this.data = response.data.data;
            })
        },
        showModalImportMonev() {
            $('#modal-import-monev').modal('show');
        },
        onFileChange() {
            let uploadedFiles = this.$refs.files.files[0];
            this.file = uploadedFiles;
        },
        submit() {
            this.disabled = true;
            this.textButton = 'Loading ....';
            let formData = new FormData()
            formData.append('file', this.file);

            $axiosFormData.post(`/admin/monev/import`, formData)
            .then(response => {
                this.file = null;
                this.disabled = false;
                this.textButton = 'Submit';
                this.$refs.files.value = null;
                $('.custom-file-label').html('Choose File');
                $('#modal-import-monev').modal('hide');

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
                if(response.data.status != 200) {
                    toastr.error(`${response.data.message}`);
                } else {
                    toastr.success(`${response.data.message}`);
                    this.data = response.data.data;
                }
            })
        },
        downloadFormatMOU() {
            $axios.get(`/admin/download/format/mou`)
            .then(() => {
                alert('Berhasil Download Format')
            })
            .catch(error => {
                alert(error);
            })
        }
    }
}
</script>

<style>

</style>
