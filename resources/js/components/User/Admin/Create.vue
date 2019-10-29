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
                            Tambah Admin
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Lengkap</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <span class="m-form__help">Nama Lengkap Harus di Isi</span>
                    <br>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Username</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.username.$model" class="form-control" @input="validateUsername" @keyup="inputUsername" @blur="$v.forms.username.$touch()">
                    </div>
                    <span class="m-form__help">Harap Username Ini di Ingat Untuk Masuk ke Halaman Admin</span>
                    <br>
                    <template v-if="$v.forms.username.$error">
                        <span v-if="!$v.forms.username.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span v-if="data_errors.username.without_space" class="m--font-danger">Tidak Boleh Ada Spasi</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Email</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.email.$model" class="form-control" @blur="$v.forms.email.$touch()">
                    </div>
                    <span class="m-form__help">Pastikan Email Terdaftar di Platformnya</span>
                    <br>
                    <template v-if="$v.forms.email.$error">
                        <span v-if="!$v.forms.email.required" class="m--font-danger">Field Ini Harus di Isi</span>
                        <span v-if="!$v.forms.email.email" class="m--font-danger">Format Email Tidak Sesuai</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Password</label>
                    <div class="m-form__control">
                        <input type="password" v-model="$v.forms.password.$model" class="form-control" @blur="$v.forms.password.$touch()">
                    </div>
                    <span class="m-form__help">Password Ini Untuk Masuk ke Halaman Admin</span>
                    <br>
                    <template v-if="$v.forms.password.$error">
                        <span v-if="!$v.forms.password.required" class="m--font-danger">Field Ini Harus di Isi</span>
                        <span v-if="!$v.forms.password.minLength" class="m--font-danger">Field Ini Harus Lebih Dari 6 Karakter</span>
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
                    <label for="Nama Lengkap">NIP</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.nip.$model" class="form-control" @input="validateNIP" @keyup="inputNIP" @blur="$v.forms.nip.$touch()
                        ">
                    </div>
                    <span class="m-form__help">Pastikan NIP Sesuai Dengan Yang Ada Inginkan</span>
                    <br>
                    <template v-if="$v.forms.nip.$error">
                        <span v-if="!$v.forms.nip.required" class="m--font-danger">Field Ini Harus di Isi</span>
                        <br>
                        <span v-if="!$v.forms.nip.minLength" class="m--font-danger">Field Ini Harus 18 Angka</span>
                        <br>
                    </template>
                    <span v-if="data_errors.nip.number_only" class="m--font-danger">Tidak Boleh Ada Karakter & Spasi</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Tanda Tangan</label>
                    <div class="m-form__control">
                        <input type="file" @change="onSignatureChange" ref="signature" class="form-control" accept="image/x-png,image/jpeg">
                    </div>
                    <span class="m-form__help">Pastikan File Yang di Upload .jpg .png .jpeg</span>
                </div>
                <div class="form-group m-form__group">
                    <div class="m-accordion m-accordion--bordered" id="m_accordion_6" role="tablist">
                        <!--begin::Item-->
                        <div class="m-accordion__item m-accordion__item--success">
                            <div class="m-accordion__item-head" role="tab" id="m_accordion_6_item_2_head" data-toggle="collapse" href="#m_accordion_6_item_2_body" aria-expanded="true">
                                <span class="m-accordion__item-icon"><i class="la la-image"></i></span>
                                <span class="m-accordion__item-title">Tampilan Tanda Tangan</span>
                                <span class="m-accordion__item-mode"></span>
                            </div>
                            <div class="m-accordion__item-body collapse show" id="m_accordion_6_item_2_body" role="tabpanel" aria-labelledby="m_accordion_6_item_2_head" data-parent="#m_accordion_6" style="">
                                <div class="m-accordion__item-content">
                                    <img :src="forms.signaturePreview" class="img-responsive" height="100%" width="100%">
                                </div>
                            </div>
                        </div>
                    </div>
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
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--last">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Hak Akses Aplikasi</h3>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Role</label>
                        <div class="m-form__control">
                            <select v-model="forms.role" class="form-control">
                                <option :value="value.name" v-for="value in listRoles" :key="value.index">
                                    {{ value.name }}
                                </option>
                            </select>
                        </div>
                        <span class="m-form__help">Pastikan Hak Akses Sesuai Yang di Inginkan</span>
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
import { required, email, minLength } from 'vuelidate/lib/validators';
import $axios from './../../../api';
export default {
    name: 'UserAdminCreate',
    data() {
        return {
            data_errors: {
                username: {
                    without_space: false
                },
                nip: {
                    number_only: false
                }
            },
            breadcrumbTitle: 'Admin',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Admin',
                    path: '/user/admin'
                },
                {
                    id: 2,
                    label: 'Tambah Admin',
                    path: '/user/admin/create'
                },
            ],
            forms: {
                name: null,
                username: null,
                email: null,
                password: null,
                jabatan: null,
                signature: null,
                signaturePreview: null,
                photo: null,
                photoPreview: null,
                nip: null,
                role: null
            },
            listRoles: [],
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
            password: {
                required,
                minLength: minLength(6)
            },
            nip: {
                required,
                minLength: minLength(18),
            }
        }
    },
    created() {
        $axios.get('/admin/user/admin/create')
        .then(response => {
            this.listRoles = response.data.data;
        })
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
        onSignatureChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            let uploadedFiles = this.$refs.signature.files[0];

            const checkExtFile = files[0];
            if (checkExtFile.type === 'image/jpeg' || checkExtFile.type === 'image/jpg' || checkExtFile.type === 'image/png' ) {
                if (!files.length) {
                    return;
                } else {
                    this.forms.signature = uploadedFiles;
                    this.createSignature(checkExtFile);
                }
            } else {
                alert('File Tidak Mendukung');
            }
        },
        createSignature(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.forms.signaturePreview = e.target.result;
            };
            reader.readAsDataURL(file);
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
        store() {
            this.$v.forms.$touch();

            let formData = new FormData();

            formData.append('name', this.forms.name);
            formData.append('username', this.forms.username);
            formData.append('email', this.forms.email);
            formData.append('password', this.forms.password);
            formData.append('jabatan', this.forms.jabatan);
            formData.append('signature', this.forms.signature);
            formData.append('photo', this.forms.photo);
            formData.append('nip', this.forms.nip);
            formData.append('role', this.forms.role);

            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('admin/storeAdmin', formData);
                this.$v.$reset();
                this.$router.push({ path: `/user/admin` });
            }
        }
    },
}
</script>

<style>
</style>
