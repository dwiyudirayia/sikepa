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
                            Edit Jenis Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Jenis</label>
                    <div class="m-form__control">
                        <select2-edit
                            @input="changeType"
                            :options="options"
                            v-model="$v.forms.submission_type_id.$model"
                            :initSelected="selected"
                        />
                    </div>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    <template v-if="$v.forms.submission_type_id.$error">
                        <span v-if="!$v.forms.submission_type_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Jenis Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" v-model.trim="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
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
    name: 'ProposalTypeOfCooperationEdit',
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
                    label: 'Edit Jenis Kerjasama',
                    path: `/proposal/typeof/cooperation/${this.$route.params.id}/edit`
                },
            ],
            forms: null,
            options: [],
            selected: null,
        }
    },
    validations: {
        forms: {
            name: {
                required,
            },
            submission_type_id: {
                required,
            }
        },
        selected: {
            required
        }
    },
    created() {
        $axios.get(`/admin/proposal/typeof/cooperation/${this.$route.params.id}/edit`)
        .then(response => {
            this.options = response.data.data.tipe;
            this.forms = response.data.data.data;
            this.selected = response.data.data.data.submission_type_id;
        });
    },
    methods: {
        changeType(value) {
            this.forms.submission_type_id = value == '' ? parseInt(this.selected) : parseInt(value);
        },
        update() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('proposal/updateTypeOfCooperation', this.forms).then(response => {
                    this.$router.push({
                        name: 'ProposalTypeOfCooperationIndex',
                        params: {
                            id: this.forms.submission_type_id,
                        },
                    });
                    this.$v.$reset();
                });
            }
        }
    },
}
</script>
