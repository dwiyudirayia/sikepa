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
                            Edit Turunan Jenis Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Jenis Kerjasama</label>
                    <div class="m-form__control">
                        <select v-model="$v.forms.type_of_cooperation_id.$model" class="form-control">
                            <option v-for="(value, index) in data_select.type_of_cooperation_id" :key="index" :value="value.id">{{ value.name }}</option>
                        </select>
                    </div>
                    <template v-if="$v.forms.type_of_cooperation_id.$error">
                        <span v-if="!$v.forms.type_of_cooperation_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Turunan Jenis Kerjasama</label>
                    <div class="m-form__control">
                        <select v-model="$v.forms.type_of_cooperation_one_derivative_id.$model" class="form-control">
                            <option v-for="(value, index) in data_select.type_of_cooperation_one_derivative_id" :key="index" :value="value.id">{{ value.name }}</option>
                        </select>
                    </div>
                    <template v-if="$v.forms.type_of_cooperation_one_derivative_id.$error">
                        <span v-if="!$v.forms.type_of_cooperation_one_derivative_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Turunan Jenis Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
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
    name: 'ProposalTypeOfCooperationTwoDerivativeEdit',
    data() {
        return {
            breadcrumbTitle: 'Jenis Kerjasama Proposal',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Jenis Kerjasama Proposal',
                    path: '/proposal/typeof/cooperation'
                },
                {
                    id: 2,
                    label: 'Edit Turunan Jenis Kerjasama',
                    path: '/proposal/typeof/cooperation/two/derivative/create'
                },
            ],
            forms: {
                type_of_cooperation_id: null,
                type_of_cooperation_one_derivative_id: null,
                name: null,
            },
            data_select: {
                type_of_cooperation_id: [],
                type_of_cooperation_one_derivative_id: []
            }
        }
    },
    validations: {
        forms: {
            type_of_cooperation_id: {
                required
            },
            type_of_cooperation_one_derivative_id: {
                required
            },
            name: {
                required,
            },
        }
    },
    created() {
        $axios.get(`/admin/proposal/typeof/cooperation/two/${this.$route.params.id}/edit`)
        .then(response => {
            this.forms = response.data.data.data;
            this.data_select.type_of_cooperation_id = response.data.data.select_type_of;
            this.data_select.type_of_cooperation_one_derivative_id = response.data.data.select_type_of_derivative;
            this.$store.dispatch('proposal/clearPage');
        })
    },
    methods: {
        update() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                $axios.put(`/admin/proposal/typeof/cooperation/two/${this.$route.params.id}`, this.forms)
                .then(response => {
                    this.$router.push(`/proposal/typeof/cooperation/list/${this.forms.type_of_cooperation_one_derivative_id}/two`);
                    this.$store.commit('proposal/notification', response);
                })
            }
        },
    },
}
</script>
