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
                            Form Ganti Password
                        </h3>
                    </div>
                </div>
            </div>
            <form  class="m-form m-form--fit" @submit.prevent="changePassword">
                <div class="form-group m-form__group">
                    <label for="Nama">Password Sekarang</label>
                    <div class="m-form__control">
                        <input type="password" v-model="$v.forms.current_password.$model" class="form-control" @blur="$v.forms.current_password.isSameCurrentPassword.$touch()">
                    </div>
                    <span class="m-form__help">Masukan Password Saat Ini</span>
                    <template v-if="$v.forms.current_password.$error">
                        <p class="m--font-danger" v-if="!$v.forms.current_password.required">Password Sekarang Harus di Isi</p>
                        <p class="m--font-danger" v-if="!$v.forms.current_password.isSameCurrentPassword">Password Sekarang Tidak Sama Dengan Password Saat Ini</p>
                    </template>
                </div>

                <div class="form-group m-form__group">
                    <label for="Nama">Password Baru</label>
                    <div class="m-form__control">
                        <input type="password" v-model="$v.forms.new_password.$model" class="form-control" @blur="$v.forms.new_password.$touch()">
                    </div>
                    <span class="m-form__help">Masukan Password Baru</span>
                    <template v-if="$v.forms.new_password.$error">
                        <p class="m--font-danger" v-if="!$v.forms.new_password.required">Password Baru Harus di Isi</p>
                        <p class="m--font-danger" v-if="!$v.forms.new_password.isSameNewPassword">Password Baru Tidak Boleh Sama Dengan Password Saat Ini</p>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama">Konfirmasi Password</label>
                    <div class="m-form__control">
                        <input type="password" v-model="$v.forms.new_password_confirmation.$model" class="form-control" @blur="$v.forms.new_password_confirmation.$touch()">
                    </div>
                    <span class="m-form__help">Konfirmasi Password Baru</span>
                    <template v-if="$v.forms.new_password_confirmation.$error">
                        <p class="m--font-danger" v-if="!$v.forms.new_password_confirmation.required">Konfirmasi Password Harus di Isi</p>
                        <p class="m--font-danger" v-if="!$v.forms.new_password_confirmation.sameAsPassword">Konfirmasi Password Tidak Sama</p>
                    </template>
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
import { required, sameAs } from 'vuelidate/lib/validators';
import $axios from './../../api';
export default {
    name: 'UserChangePassword',
    data() {
        return {
            breadcrumbTitle: 'Ganti Password',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Ganti Password',
                    path: '/user/change/password'
                },
            ],
            forms: {
                current_password : null,
                new_password : null,
                new_password_confirmation : null,
            },
            options: null,
            isSameCurrentPassword: null,
            isSameNewPassword: null,
        }
    },
    validations: {
        forms: {
            current_password: {
                required,
                async isSameCurrentPassword(value) {
                    if (value === '') return true

                    const response = $axios.get(`/admin/check/same/current/password/${value}`)
                    .then(response => {
                        this.isSameCurrentPassword = response.data.isSameCurrentPassword;
                    })

                    // simulate async call, fail for all logins with even length
                    return new Promise((resolve, reject) => {
                        setTimeout(() => {
                            resolve(this.isSameCurrentPassword == true)
                        }, 350 + Math.random() * 300)
                    })
                }
            },
            new_password: {
                required,
                async isSameNewPassword(value) {
                    if (value === '') return true

                    const response = $axios.get(`/admin/check/same/new/password/${this.forms.current_password}/${value}`)
                    .then(response => {
                        this.isSameNewPassword = response.data.isSameNewPassword;
                    })

                    // simulate async call, fail for all logins with even length
                    return new Promise((resolve, reject) => {
                        setTimeout(() => {
                            resolve(this.isSameNewPassword == false)
                        }, 350 + Math.random() * 300)
                    })
                }
            },
            new_password_confirmation: {
                required,
                sameAsPassword: sameAs('new_password')
            }
        },
    },
    methods: {
        logout() {
            return new Promise((resolve, reject) => {
                localStorage.removeItem('token');
                localStorage.removeItem('permissions');
                localStorage.removeItem('roles');
                resolve()
            }).then(() => {
                this.$store.state.token = localStorage.getItem('token')
                window.location.href = '/login/admin';
            })
        },
        changePassword() {
            this.$store.dispatch('user/changePassword', this.forms);
            this.logout();
        }
    }
}
</script>
