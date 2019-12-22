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
                            Edit Role
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <button class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Cek Hak Akses Sekarang'" @click="checkPermission">
                        <span>
                            <i class="fa fa-user-cog"></i>
                            <span>Cek Hak Akses Sekarang</span>
                        </span>
                    </button>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pilih Role</label>
                    <div class="m-form__control">
                        <select v-model="$v.forms.id.$model" class="form-control">
                            <option :value="value.id" v-for="value in listRoles" :key="value.id">{{ value.name }}</option>
                        </select>
                    </div>
                    <span class="m-form__help">Pastikan Nama Role Sesuai Nantinya</span>
                    <template v-if="$v.forms.id.$error">
                        <span v-if="!$v.forms.id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                </div>
                <div class="m-form__heading">
                    <h3 class="m-form__heading-title">Hak Akses</h3>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-12">
                        <div class="m-form__group form-group">
                            <label for="">Admin</label>
                            <div class="m-checkbox-list">
                                <label class="m-checkbox" v-for="value in admin" :key="value.id">
                                    <input
                                        type="checkbox"
                                        :value="value.name"
                                        :checked="role_permission.findIndex(x => x == value.name) != -1"
                                        @click="addPermission(value.name)"
                                    > {{ value.name }}
                                    <span></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-12">
                        <div class="m-form__group form-group">
                            <label for="">Umum</label>
                            <div class="m-checkbox-list">
                                <label class="m-checkbox" v-for="value in general" :key="value.id">
                                    <input
                                        type="checkbox"
                                        :value="value.name"
                                        :checked="role_permission.findIndex(x => x == value.name) != -1"
                                        @click="addPermission(value.name)"
                                    > {{ value.name }}
                                    <span></span>
                                </label>
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
import $axios from '@/api.js';
import { required } from 'vuelidate/lib/validators';
import { mapState, mapActions, mapMutations } from 'vuex';
import store from '@/store/store.js';

export default {
    name: 'ConfigAccessRightRoleEdit',
    data() {
        return {
            forms: null,
            breadcrumbTitle: 'Hak Akses',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Hak Akses',
                    path: '/config/access/rights'
                },
                {
                    id: 1,
                    label: 'Edit Role',

                    path: `/config/access/right/role/${this.$route.params.id}/edit`,
                }
            ],
            listRoles: [],
            admin: [],
            general: [],
            new_permission: []
        }
    },
    computed: {
        ...mapState('user', {
            role_permission: state => state.role_permission
        }),
    },
    validations: {
        forms: {
            id: {
                required
            }
        }
    },
    created() {
        this.edit();
    },
    methods: {
        ...mapMutations('user', ['CLEAR_ROLE_PERMISSION']),
        edit() {
            $axios.get(`/access/right/role/${this.$route.params.id}/edit`)
            .then(response => {
                this.forms = response.data.data.data;
                this.listRoles = response.data.data.roles;
                this.admin = response.data.data.admin;
                this.general = response.data.data.general;
            })
        },
        addPermission(name) {
            //DICEK KE NEW_PERMISSION BERDASARKAN NAME
            let index = this.new_permission.findIndex(x => x == name)
            //APABIL TIDAK TERSEDIA, INDEXNYA -1
            if (index == -1) {
                //MAKA TAMBAHKAN KE LIST
                this.new_permission.push(name)
            } else {
                //JIKA SUDAH ADA, MAKA HAPUS DARI LIST
                this.new_permission.splice(index, 1)
            }
        },
        checkPermission() {
            this.$store.dispatch('user/getRolePermission', this.$route.params.id)
            .then(() => {
                this.new_permission = this.role_permission;
            });
        },
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('user/setRolePermission', {
                    role_id: this.forms.id,
                    permissions: this.new_permission,
                }).then(response => {
                    this.$v.$reset();
                    //BEBERAPA DETIK KEMUDIAN, KEMBALIKAN KE DEFAULT
                    this.forms.id = '';
                    this.new_permission = [];
                    this.CLEAR_ROLE_PERMISSION();

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

                    toastr.success(`Data Berhasil di Perbaharui`);

                    this.$router.push('/config/access/rights');
                })
            }
        }
    }
}
</script>
<style>

</style>
