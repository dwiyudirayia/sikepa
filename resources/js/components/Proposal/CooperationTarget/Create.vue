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
                            Tambah Target Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Target Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Target Kerjasama Sesuai Dengan Kriteria Nanti</span>
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
import Axios from 'axios';

export default {
    name: 'ProposalCooperationTargetCreate',
    data() {
        return {
            breadcrumbTitle: 'Target Kerjasama Proposal',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Target Kerjasama Proposal',
                    path: '/proposal/cooperation/target'
                },
                {
                    id: 2,
                    label: 'Tambah Target Kerjasama',
                    path: '/proposal/cooperation/target/create'
                },
            ],
            forms: {
                name: null,
            },
            statusNameUnique: null
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
    },
    methods: {
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('proposal/storeCooperationTarget', this.forms);
                this.$v.$reset();
            }
            this.$router.push({ name: 'ProposalCooperationTargetIndex' });
        }
    },
}
</script>
