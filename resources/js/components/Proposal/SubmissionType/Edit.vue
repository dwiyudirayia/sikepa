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
                            Edit Tipe Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Tipe Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" v-model.trim="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <span class="m-form__help">Pastikan Nama Tipe Kerjasama Sesuai Dengan Kriteria Nanti</span>
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
import $axios from './../../../api';

export default {
    name: 'ProposalSubmissionTypeEdit',
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
                    label: 'Edit Jenis',
                    path: `/proposal/submission/type/${this.$route.params.id}/edit`
                },
            ],
            forms: null,
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
        $axios.get(`/admin/proposal/submission/type/${this.$route.params.id}/edit`)
        .then(response => {
            this.forms = response.data.data
        });
    },
    methods: {
        update() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                $axios.put(`/admin/proposal/submission/type/${this.$route.params.id}`, this.forms)
                .then(response => {
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
                    this.$router.push({ name: 'ProposalSubmissionTypeIndex' });

                    toastr.success(`Data Berhasil di Tambahkan`);
                })
                .catch(error => {
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
                    this.$router.push({ name: 'ProposalSubmissionTypeIndex' });

                    toastr.error(`Data Berhasil di Tambahkan`);
                })
                this.$v.$reset();
            }
        }
    },
}
</script>
