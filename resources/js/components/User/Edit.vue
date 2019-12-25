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
                            Edit Profil
                        </h3>
                    </div>
                </div>
            </div>
            <form  class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama">Nama Lengkap</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$model.$touch()">
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <p class="m--font-danger" v-if="!$v.forms.name.required">Nama Lengkap Harus di Isi</p>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Username</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.username.$model" class="form-control" @input="validateUsername" @keyup="inputUsername" @blur="$v.forms.username.$touch()">
                    </div>
                    <p class="m-form__help">Harap Username Ini di Ingat Untuk Masuk ke Halaman Admin</p>
                    <template v-if="$v.forms.username.$error">
                        <p v-if="!$v.forms.username.required" class="m--font-danger">Field Ini Harus di Isi</p>
                    </template>
                    <div v-if="errorValidator.username">
                        <p class="m--font-danger" v-for="(value,index) in errorValidator.username" :key="index">{{ value }}</p>
                    </div>
                    <p v-if="data_errors.username.without_space" class="m--font-danger">Tidak Boleh Ada Spasi</p>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama">Email</label>
                    <div class="m-form__control">
                        <input type="email" v-model="$v.forms.email.$model" class="form-control" @blur="$v.forms.email.$model.$touch()">
                    </div>
                    <span class="m-form__help">Pastikan Email <strong>Aktif</strong></span>
                    <template v-if="$v.forms.email.$error">
                        <p class="m--font-danger" v-if="!$v.forms.email.required">Email Harus di Isi</p>
                        <p class="m--font-danger" v-if="!$v.forms.email.email">Email Tidak Sesuai Format</p>
                    </template>
                    <div v-if="errorValidator.email">
                        <p class="m--font-danger" v-for="(value,index) in errorValidator.email" :key="index">{{ value }}</p>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">NIP</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.nip.$model" class="form-control" @input="validateNIP" @keyup="inputNIP" @blur="$v.forms.nip.$touch()
                        ">
                    </div>
                    <span class="m-form__help">Pastikan NIP Sesuai Dengan Yang Ada Inginkan</span>
                    <br>
                    <template v-if="$v.forms.nip.$error">
                        <p v-if="!$v.forms.nip.required" class="m--font-danger">Field Ini Harus di Isi</p>
                        <p v-if="!$v.forms.nip.minLength" class="m--font-danger">Field Ini Harus 18 Angka</p>
                        <p v-if="!$v.forms.nip.maxLength" class="m--font-danger">Field Ini Tidak Boleh Lebih 18 Angka</p>
                        <p v-if="data_errors.nip.number_only" class="m--font-danger">Tidak Boleh Ada Karakter & Spasi</p>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Jabatan</label>
                    <div class="m-form__control">
                        <input type="text" v-model="forms.jabatan" class="form-control">
                    </div>
                    <span class="m-form__help">Jabatan Saat Ini</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Foto Admin</label>
                    <div class="m-form__control">
                        <input type="file" @change="onPhotoChange" ref="photo" class="form-control" accept="image/x-png,image/jpeg">
                    </div>
                    <span class="m-form__help">Pastikan File Yang di Upload .jpg .png .jpeg</span>
                </div>
                <div class="form-group m-form__group">
                    <div class="m-accordion m-accordion--bordered" id="m_accordion_7" role="tablist">
                        <!--begin::Item-->
                        <div class="m-accordion__item m-accordion__item--primary">
                            <div class="m-accordion__item m-accordion__item--primary">
                                <div class="m-accordion__item-head" role="tab" id="m_accordion_8_item_3_head" data-toggle="collapse" href="#m_accordion_8_item_3_body" aria-expanded="true">
                                    <span class="m-accordion__item-icon"><i class="la la-image"></i></span>
                                    <span class="m-accordion__item-title">Tampilan Foto Admin</span>
                                    <span class="m-accordion__item-mode"></span>
                                </div>
                                <div class="m-accordion__item-body collapse show" id="m_accordion_8_item_3_body" role="tabpanel" aria-labelledby="m_accordion_8_item_3_head" data-parent="#m_accordion_7" style="">
                                    <div class="m-accordion__item-content">
                                        <img :src="forms.photoPreview" class="img-responsive" height="100%" width="100%">
                                    </div>
                                </div>
                            </div>
                        </div>
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
    </div>
</template>
<script>
import { required, email, minLength, maxLength } from 'vuelidate/lib/validators';
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';

export default {
    name: 'UserEditProfile',
    data() {
        return {
            errorValidator: [],
            data_errors: {
                username: {
                    without_space: false
                },
                nip: {
                    number_only: false
                }
            },
            breadcrumbTitle: 'Edit Profil',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Edit Profil',
                    path: '/user/edit/profile'
                },
            ],
            forms: {
                name: null,
                username: null,
                email: null,
                jabatan: null,
                photo: null,
                photoPreview: null,
                nip: null,
            },
        }
    },
    validations: {
        forms: {
            name: {
                required
            },
            username: {
                required
            },
            email: {
                required,
                email
            },
            nip: {
                required,
                minLength: minLength(18),
                maxLength: maxLength(18),
            }
        }
    },
    watch: {
        "forms.username": function(value)
        {
            this.forms.username = value;
        },
        "forms.nip": function(value)
        {
            this.forms.nip = value;
        }
    },
    created() {
        this.getData();
    },
    methods: {
        validateNIP() {
            const regex = new RegExp("^\\d+$");
            const isValid = regex.test(this.forms.nip);
            this.forms.nip = this.forms.nip.replace(/[^0-9]+/g, '');

            if(isValid) {
                this.data_errors.nip.number_only = false;
            } else {
                this.data_errors.nip.number_only = true;
            }
        },
        inputUsername(event) {
            this.$emit('input', event.target.value);
        },
        validateUsername() {
            const regex = new RegExp(/[^A-Za-z0-9]+/g);
            const lastVal = this.forms.username.substr(this.forms.username.length - 1);
            this.forms.username = this.forms.username.replace(/[^A-Za-z0-9]+/g, '');

            if (!regex.test(lastVal)) {
                this.data_errors.username.without_space = false;
            } else {
                this.data_errors.username.without_space = true;
            }
        },
        inputNIP(event) {
            this.$emit('input', event.target.value);
        },
        inputUsername(event) {
            this.$emit('input', event.target.value);
        },
         onPhotoChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            let uploadedFiles = this.$refs.photo.files[0];

            const checkExtFile = files[0];
            if (checkExtFile.type === 'image/jpeg' || checkExtFile.type === 'image/jpg' || checkExtFile.type === 'image/png' ) {
                if (!files.length) {
                    return;
                } else {
                    this.forms.photo = uploadedFiles;
                    this.createPhoto(checkExtFile);
                }
            } else {
                alert('File Tidak Mendukung');
            }
        },
        createPhoto(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.forms.photoPreview = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        getData() {
            $axios.get(`/user-authenticated`)
            .then(response => {
                this.forms.name = response.data.data.name;
                this.forms.username = response.data.data.username;
                this.forms.email = response.data.data.email;
                this.forms.jabatan = response.data.data.jabatan;
                this.forms.photo = response.data.data.photo;
                this.forms.nip = response.data.data.nip;
            })
        },
        update() {
            let formData = new FormData();
            formData.append('name', this.forms.name);
            formData.append('username', this.forms.username);
            formData.append('email', this.forms.email);
            formData.append('jabatan', this.forms.jabatan);
            formData.append('photo', this.forms.photo);
            formData.append('nip', this.forms.nip);

            $axiosFormData.post(`/admin/user/update/profile`, formData)
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

                toastr.success('Data Berhasil di Update');
                this.$store.dispatch('user/getUserLogin');
                this.$router.push({
                    name: 'DashboardIndex'
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
                toastr.error('Data Gagal di Update');
                this.errorValidator = error.response.data.errors;
            })
        }
    }
}
</script>
