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
                    <label for="exampleInputEmail1">Evaluasi</label>
                    <div class="m-form__control">
                        <select2
                            :options="data_select.evaluation"
                            v-model="forms.evaluation"
                        />
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Rekomendasi</label>
                    <div class="m-form__control">
                        <select2
                            :options="data_select.recomendation"
                            v-model="forms.recomendation"
                        />
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
export default {
    name: 'ResultMonevActivitySatker',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Monitoring Evaluasi',
                    path: '/monev'
                },
                {
                    id: 2,
                    label: 'Tambah Hasil Kegiatan Monitoring Evaluasi',
                    path: `/monev/activity/${this.$route.params.id}/satker/result`
                },
            ],
            forms: {
                id: this.$route.params.id,
                evaluation: 1,
                recomendation: 1,
            },
            data_select: {
                evaluation: [
                    {
                        id: 1,
                        name: 'Sangat Tidak Memuaskan',
                    },
                    {
                        id: 2,
                        name: 'Tidak Memuaskan',
                    },
                    {
                        id: 3,
                        name: 'Sesuai Standar',
                    },
                    {
                        id: 4,
                        name: 'Memuaskan',
                    },
                    {
                        id: 5,
                        name: 'Sangat Memuaskan',
                    },
                ],
                recomendation: [
                    {
                        id: 1,
                        name: 'Diadendum',
                    },
                    {
                        id: 2,
                        name: 'Dihentikan'
                    },
                    {
                        id: 3,
                        name: 'Dilanjutkan'
                    },
                ]
            }
        }
    },
    beforeRouteEnter(to, from, next) {
        $axios.get(`/admin/show/monev/activity/satker/${to.params.id}`)
        .then(response => {
            if(response.data.data.result_status == 0) {
                next();
            } else {
                next(false);
                alert('Data Ini Sudah di Nilai');
            }
        })
    },
    methods: {
        store() {
            $axios.post(`/admin/result/monev/activity/satker`, this.forms)
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

                toastr.success(`Data Berhasil di Tambahkan`);
                this.$router.push({
                    path: '/monev'
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
        }
    }
}
</script>

<style>

</style>