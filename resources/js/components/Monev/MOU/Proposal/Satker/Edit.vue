<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head" style="margin-bottom:20px;">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Edit Kegiatan
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                Opsi
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item  context-menu">
                                                    <a class="m-nav__link" @click="showModalFile">
                                                        <i class="m-nav__link-icon la la-file"></i>
                                                        <span class="m-nav__link-text">Daftar File</span>
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
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Judul Kegiatan</label>
                    <div class="m-form__control">
                        <input type="text" class="form-control" v-model="forms.title_activity">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                    <div class="m-form__control">
                        <date-picker v-model="forms.implementation_date" valueType="format"  style="width: 100%;" lang="en"></date-picker>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Lokasi</label>
                    <div class="m-form__control">
                        <input type="text" class="form-control" v-model="forms.location">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label>Deskripsi Kegiatan</label>
                    <div class="m-form__control">
                        <textarea class="form-control" cols="30" rows="10" v-model="forms.description_activities"></textarea>
                    </div>
                </div>
                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-7">
                                <button type="submit" class="btn btn-brand">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" id="file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Daftar Dokumentasi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-table m-table--head-bg-brand">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama</th>
                                    <th style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="documentation.length != 0">
                                    <tr v-for="(value, index) in documentation" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}></td>
                                        <td style="vertical-align: middle;">{{ value.file }}</td>
                                        <td style="vertical-align: middle;">
                                            <span class="m--font-brand context-menu" @click="downloadImage(value.id)">Download</span>
                                            <span class="m--font-danger context-menu" @click="hapusImage(value.id)">Hapus</span>
                                        </td>
                                    </tr>
                                </template>
                                <template>
                                    <tr>
                                        <td colspan="3" style="vertical-align: middle;" class="text-center">Data Kosong</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Pilih File </label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" ref="file" @change="onImageChange">
                                <label class="custom-file-label" for="customFile" id="label_file">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="storeFile" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import { required, email } from 'vuelidate/lib/validators';
import $axiosFormData from '@/apiformdata.js';
import $axios from '@/api.js';
export default {
    name: 'MonevActivityP3Edit',
    data() {
        return {
            forms: {
                title_activity: null,
                implementation_date: null,
                location: null,
                description_activities: null,
                file: null,
            },
            documentation: [],
            breadcrumbTitle: 'Aktivitas',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Monev',
                    path: '/monev/mou'
                },
                {
                    id: 2,
                    label: 'Edit Kegiatan P3',
                    path: `/monev/mou/detail/${this.$route.params.id}/satker/edit`
                },
            ],
        }
    },
    computed: {
        plainValue() {
            let val = 0;
            if (this.forms.budget) {
                val = parseInt(this.forms.budget.replace(/\./g, ''));
                return val;
            }
            return null;
        },
    },
    watch: {
        "forms.budget": function(newValue) {
            let result = newValue;
            if (newValue) {
                result = newValue.toString()
                .replace(/\D/g, '')
                .replace(/^[0]/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
            this.forms.budget = result;
            this.$emit('input', this.plainValue);
        }
    },
    created() {
        this.getData();
    },
    methods: {
        storeFile() {
            let formData = new FormData();
            formData.append('id', this.$route.params.id);
            formData.append('file', this.forms.file);

            $axios.post(`/admin/store/file/activity/satker`, formData)
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
                toastr.success('Gambar Berhasil di Simpan');

                this.getData();
                // $('#file').modal('hide');
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
                toastr.error('Gambar Gagal di Simpan');
            })
        },
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;

            $('#label_file').html(this.$refs.file.value);
            this.forms.file = files[0];
        },
        downloadImage(id) {
            window.location.href = `/api/admin/download/image/activity/satker/${id}?token=${localStorage.getItem('token')}`;
        },
        hapusImage(id) {
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
                    $axios.delete(`/admin/image/activity/satker/${id}`)
                    .then(response => {
                        this.getData();
                    })
                }
            })
        },
        showModalFile() {
            $('#file').modal('show');
        },
        getData() {
            $axios.get(`/admin/monev/activity/satker/${this.$route.params.id}/edit`)
            .then(response => {
                this.forms.title_activity = response.data.data.title_activity;
                this.forms.implementation_date = response.data.data.implementation_date;
                this.forms.location = response.data.data.location;
                this.forms.description_activities = response.data.data.description_activities;
                this.documentation = response.data.data.documentation;
            })
        },
        validate() {
            const regex = new RegExp(/\D/g);
            const value = this.forms.budget.toString().replace(/\./g, '');

            if (!regex.test(value)) {
                this.budget.message = '';
                this.budget.error = false;
            } else {
                this.budget.message = 'Hanya Dapat di Isi Oleh Angka';
                this.budget.error = true;
            }
        },
        update() {
            // let formData = new FormData();
            // formData.append('budget', this.forms.budget);
            // formData.append('target', this.forms.target);
            // formData.append('reach', this.forms.reach);
            // formData.append('problem', this.forms.problem);
            // formData.append('problem_solving', this.forms.problem_solving);
            // formData.append('report', this.forms.report);
            // console.log(formData);
            $axios.put(`/admin/monev/activity/satker/${this.$route.params.id}`, this.forms)
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

                this.$router.push({
                    path: '/monev/push'
                });
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
                toastr.error(`Data Gagal di Tambahkan`);
            })
        },
        addExtraFile() {
            this.forms.file.push('');
        },
    }
}
</script>

<style scoped>
.context-menu {
    cursor: context-menu;
}
</style>

