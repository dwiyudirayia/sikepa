<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
        <div class="m-portlet">
            <div class="m-portlet__head" style="margin-bottom:20px;">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Konfigurasi Role User
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="choseRoleUser">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Role</label>
                    <div class="m-form__control">
                        <select v-model="$v.forms.name.$model" class="form-control">
                            <option :value="value.name" v-for="value in listRoles" :key="value.id">
                                {{ value.name }}
                            </option>
                        </select>
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Role Sesuai Nantinya</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pilih User</label>
                    <div class="m-form__control">
                        <select v-model="$v.forms.id.$model" class="form-control">
                            <option :value="value.id" v-for="value in listUser" :key="value.id">
                                {{ value.name }}
                            </option>
                        </select>
                    </div>
                    <template v-if="$v.forms.id.$error">
                        <span v-if="!$v.forms.id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Role Sesuai Nantinya</span>
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
import { required } from 'vuelidate/lib/validators';
import $axios from '@/api.js';

export default {
    name: 'ConfigRoleUser',
    data() {
        return {
            forms: {
                name: null,
                id: null
            },
            breadcrumbTitle: 'Role User',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Konfigurasi Role User',
                    path: '/config/access/rights'
                },
            ],
            listRoles: [],
            listUser: [],
            getShowNotification: null,
            getMessage: null,
            getStatusatusCode: null,
        }
    },
    validations: {
        forms: {
            name: {
                required
            },
            id: {
                required
            }
        }
    },
    created() {
        this.getData();
    },
    mounted() {
        this.getShowNotification = null;
        this.getMessage = null;
        this.getStatusatusCode = null;

        this.forms = {
            id: null,
            name: null
        }
    },
    methods: {
        getData() {
            $axios.get(`/config/user/role`)
            .then(response => {
                this.listRoles = response.data.data.roles;
                this.listUser = response.data.data.user;
            })
        },
        choseRoleUser() {
            $axios.post(`/set-role-user`, {
                user_id: this.forms.id,
                role: this.forms.name
            })
            .then(response => {
                this.getShowNotification = true;
                this.getMessage = response.data.messages;
                this.getStatusatusCode = 200;
            })
        }
    }
}
</script>
