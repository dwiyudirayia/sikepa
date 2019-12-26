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
                            Tambah Kesepahaman Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Permohonan Kerjasama</label>
                    <div class="m-form__control">
                        <select2
                            v-model="$v.forms.type_of_cooperation_one_derivative_id.$model"
                            :options="data_select.type_of_cooperation_one_derivative_id"
                        />
                    </div>
                    <span class="m-form__help">Pastikan Nama Permohonan Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    <template v-if="$v.forms.type_of_cooperation_one_derivative_id.$error">
                        <span v-if="!$v.forms.type_of_cooperation_one_derivative_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Kesepahaman Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <span class="m-form__help">Pastikan Nama Kesepahaman Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
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
import { required } from 'vuelidate/lib/validators';
import $axios from '@/api.js';

export default {
    name: 'ProposalTypeOfCooperationTwoDerivativeCreate',
    data() {
        return {
            breadcrumbTitle: 'Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Jenis',
                    path: '/proposal/submission/type'
                },
                {
                    id: 2,
                    label: 'Tambah Kesepahaman Kerjasama',
                    path: '/proposal/typeof/cooperation/two/derivative/create'
                },
            ],
            forms: {
                type_of_cooperation_one_derivative_id: null,
                name: null,
            },
            data_select: {
                type_of_cooperation_one_derivative_id: []
            }
        }
    },
    validations: {
        forms: {
            type_of_cooperation_one_derivative_id: {
                required
            },
            name: {
                required,
            },
        }
    },
    created() {
        this.$store.dispatch('proposal/clearPage');
        this.getDataSelect();
    },
    methods: {
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('proposal/storeListTypeofCooperationListTwo', this.forms);
                this.$router.push(`/proposal/typeof/cooperation/list/${this.forms.type_of_cooperation_one_derivative_id}/two`);
            }
        },
        getDataSelect() {
            $axios.get(`/admin/proposal/typeof/cooperation/two/${this.$store.state.paramsTwo}/create`)
            .then(response => {
                this.data_select.type_of_cooperation_one_derivative_id = response.data.data;
            });
        },
    },
}
</script>
