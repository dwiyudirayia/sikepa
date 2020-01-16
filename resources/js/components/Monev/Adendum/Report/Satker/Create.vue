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
                            Tambah Kegiatan
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Report</label>
                    <div class="m-form__control">
                        <select2
                            :options="data_select.report"
                            v-model="forms.value"
                        />
                    </div>
                </div>
                <br>
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

export default {
    name: 'ReportMonev',
    data() {
        return {
            forms: {
                value: null,
            },
            breadcrumbTitle: 'Nilai MOU',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Monev',
                    path: '/monev/mou'
                },
                {
                    id: 2,
                    label: 'Nilai MOU Pihak Internal',
                    path: `/monev/report/${this.$route.params.id}/satker/create`
                },
            ],
            data_select: {
                report: [
                    {
                        id: 1,
                        name: 'Perpanjangan'
                    },
                    {
                        id: 2,
                        name: 'Adendum'
                    }
                ],
            }
        }
    },
    methods: {
        store() {
            // let formData = new FormData();
            // formData.append('id', this.$route.params.id);
            // formData.append('value', parseInt(this.forms.value));
            // formData.append('budget', this.forms.budget);
            // formData.append('target', this.forms.target);
            // formData.append('reach', this.forms.reach);
            // formData.append('problem', this.forms.problem);
            // formData.append('problem_solving', this.forms.problem_solving);
            // formData.append('report', this.forms.report);

            $axios.post(`/admin/adendum/monev/report`, this.forms)
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
                toastr.success(`${response.data.messages}`);

                this.$router.push({
                    path: '/monev/adendum'
                });
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
                toastr.error(`Data Gagal di Tambahkan`);
            })
        },
    }
}
</script>

<style>

</style>
