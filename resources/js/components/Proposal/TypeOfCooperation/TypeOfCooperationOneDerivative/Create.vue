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
                            Tambah Permohonan Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Permohonan Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <span class="m-form__help">Pastikan Nama Permohonan Kerjasama Sesuai Dengan Kriteria Nanti</span>
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
    name: 'ProposalTypeOfCooperationOneDerivativeCreate',
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
                    label: 'Tambah Permohonan Kerjasama',
                    path: '/proposal/typeof/cooperation/one/derivative/create'
                },
            ],
            forms: {
                name: null,
            },
            data_select: null
        }
    },
    validations: {
        forms: {
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
                this.$store.dispatch('proposal/storeListTypeofCooperationListOne', this.forms);
                this.$router.push({ name: 'ProposalTypeOfCooperationOneDerivativeListOne'});
            }
        },
        getDataSelect() {
            $axios.get(`/admin/proposal/typeof/cooperation/one/${this.$store.state.paramsOne}/create`)
            .then(response => {
                this.data_select = response.data.data;
            });
        }
    },
}
</script>
