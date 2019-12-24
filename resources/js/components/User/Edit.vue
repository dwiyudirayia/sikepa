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
            <form  class="m-form m-form--fit" @submit.prevent="changePassword">
                <div class="form-group m-form__group">
                    <!-- <label for="Nama">Password Sekarang</label>
                    <div class="m-form__control">
                        <input type="password" v-model="$v.forms.current_password.$model" class="form-control" @blur="$v.forms.current_password.isSameCurrentPassword.$touch()">
                    </div>
                    <span class="m-form__help">Masukan Password Saat Ini</span>
                    <template v-if="$v.forms.current_password.$error">
                        <p class="m--font-danger" v-if="!$v.forms.current_password.required">Password Sekarang Harus di Isi</p>
                        <p class="m--font-danger" v-if="!$v.forms.current_password.isSameCurrentPassword">Password Sekarang Tidak Sama Dengan Password Saat Ini</p>
                    </template> -->
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
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';

export default {
    name: 'UserEditProfile',
    data() {
        return {
            breadcrumbTitle: 'Edit Profil',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Edit Profil',
                    path: '/user/edit/profile'
                },
            ],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {

        },
        update() {

        }
    }
}
</script>
