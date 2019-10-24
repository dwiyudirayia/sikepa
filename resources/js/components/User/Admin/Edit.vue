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
                            Edit Admin
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
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
                        <input type="text" v-model="$v.forms.username.$model" class="form-control" @input="validate" @keyup="inputFunction" @blur="$v.forms.username.$touch()">
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
                    <label for="Nama Lengkap">Jabatan</label>
                    <div class="m-form__control">
                        <input type="text" v-model="forms.jabatan" class="form-control">
                    </div>
                    <span class="m-form__help">Jabatan Saat Ini</span>
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
                                    <div
                                        :style="[forms.signature && forms.signature.length ? {'background-image': 'url(' + require('../../../../../storage/app/public/signature_user/'+forms.signature) + ')'} : null]" style="height:400px"
                                        v-show="previousSignature"
                                    />
                                    <img :src="signaturePreview" class="img-responsive" height="400px" width="100%" v-show="currentlySignature">
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
                                <div
                                    class="m-accordion__item-body collapse show"
                                    id="m_accordion_8_item_3_body" role="tabpanel"
                                    aria-labelledby="m_accordion_8_item_3_head"
                                    data-parent="#m_accordion_7"
                                >
                                    <div class="m-accordion__item-content">
                                        <div
                                            :style="[forms.photo && forms.photo.length ? {'background-image': 'url(' + require('../../../../../storage/app/public/photo_user/'+forms.photo) + ')'} : null]" style="height:400px"
                                            v-show="previousPhoto"
                                        />
                                        <img :src="photoPreview" class="img-responsive" height="400px" width="100%" v-show="currentlyPhoto">
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
                        <label for="Nama Lengkap">Hak Akses</label>
                        <div class="m-checkbox-inline">
                            <div class="row">
                                <div class="col-lg-3 col-sm-3" v-for="value in this.listPermissions" :key="value.id">
                                    <label class="m-checkbox">
                                        <input type="checkbox" v-model="hasPermission[value.name]" :value="value.name"> {{ value.name }}
                                        <span></span>
                                    </label>
                                </div>
                            </div>
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
import $axiosFormData from '@/apiformdata';
export default {
    name: 'UserAdminEdit',
    data() {
        return {
            previousSignature: true,
            previousPhoto: true,
            currentlySignature: false,
            currentlyPhoto: false,
            data_errors: {
                username: {
                    without_space: false
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
                    label: 'Edit Admin',
                    path: `/user/admin/${this.$route.params.id}`
                },
            ],
            forms: {
                name: null,
                username: null,
                email: null,
                jabatan: null,
                signature: null,
                photo: null,
                permissions: []
            },
            photoPreview: null,
            signaturePreview: null,
            listPermissions: [],
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
        }
    },
    computed: {
        hasPermission(){
            let userPermission = this.forms.permissions;
            let permissions = this.listPermissions;
            let ret = {}
            for(let i = 0; i < userPermission.length; i++){
                for(let j = 0; j < permissions.length; j++){
                if(permissions[j].name == userPermission[i].name){
                    ret[permissions[j].name] = true
                }
                }
            }

            this.forms.permissions = ret;
            return ret;
        }
    },
    created() {
        this.getPermission();
        this.getData();
    },
    watch: {
        "forms.username": function(value)
        {
            this.forms.username = value;
        }
    },
    methods: {
        getData() {
            $axios.get(`/admin/user/admin/${this.$route.params.id}/edit`)
            .then(response => {
                this.forms = response.data.data;
            })
        },
        getPermission() {
            $axios.get('/admin/user/admin/create')
            .then(response => {
                this.listPermissions = response.data.data;
            });
        },
        validate() {
            const regex = new RegExp(/[^A-Za-z0-9]+/g);
            const lastVal = this.forms.username.substr(this.forms.username.length - 1);
            this.forms.username = this.forms.username.replace(/[^A-Za-z0-9]+/g, '');
            if (!regex.test(lastVal)) {
                this.data_errors.username.without_space = false;
            } else {
                this.data_errors.username.without_space = true;
            }
        },
        inputFunction(event) {
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
                    this.currentlySignature = true;
                    this.previousSignature = false;
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
                vm.signaturePreview = e.target.result;
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
                    this.currentlyPhoto = true;
                    this.previousPhoto = false;
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
                vm.photoPreview = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        addPermission(name) {
            let index = this.forms.permissions.findIndex(x => x == name)
            //APABIL TIDAK TERSEDIA, INDEXNYA -1
            if (index == -1) {
                //MAKA TAMBAHKAN KE LIST
                this.forms.permissions.push(name)
            } else {
                //JIKA SUDAH ADA, MAKA HAPUS DARI LIST
                this.forms.permissions.splice(index, 1)
            }
        },
        update() {
            this.$v.forms.$touch();

            let formData = new FormData();

            formData.append('name', this.forms.name);
            formData.append('_method', 'PUT');
            formData.append('username', this.forms.username);
            formData.append('email', this.forms.email);
            formData.append('password', this.forms.password);
            formData.append('jabatan', this.forms.jabatan);
            formData.append('signature', this.forms.signature);
            formData.append('photo', this.forms.photo);

            $.each(this.forms.permissions, function(key, value) {
                if(value == "true" || value == true) {
                    formData.append(`permissions[]`, key);
                }
            })

            if(this.$v.forms.$invalid) {
                return;
            } else {
                $axiosFormData.post(`/admin/user/admin/${this.$route.params.id}`, formData)
                .then(response => {
                    this.$v.$reset();
                    this.$store.commit('admin/updateData', response);
                    this.$store.commit('admin/notification', response);
                    this.$router.push({ path: `/user/admin` });
                })
            }
        }
    },
}
</script>

<style>
</style>
