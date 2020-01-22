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
                            Konfigurasi Banner
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="m-form__group form-group">
                    <label for="">Status</label>
                    <div class="m-radio-inline">
                        <label class="m-radio">
                            <input type="radio" v-model="$v.forms.status.$model" value="true"> Banner
                            <span></span>
                        </label>
                        <label class="m-radio">
                            <input type="radio" v-model="$v.forms.status.$model" value="false"> Artikel
                            <span></span>
                        </label>
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
import { required } from 'vuelidate/lib/validators';
import $axios from '@/api.js';
export default {
    name: 'BannerLandingPageChangeConfig',
    data() {
        return {
            forms: {
                status: null,
            },
            breadcrumbTitle: 'Banner Halaman',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Banner Halaman',
                    path: '/article/banner'
                },
                {
                    id: 1,
                    label: 'Konfigurasi Banner Halaman',
                    path: '/article/banner/change/config'
                }
            ]
        }
    },

    validations: {
        forms: {
            status: {
                required
            },
        }
    },
    created() {
        $axios.get(`/admin/banner/landing/page/config`)
            .then(response => {
                this.forms.status = response.data.banner
                console.log(response.data);
            });
    },
    methods: {
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                $axios.post(`/admin/banner/landing/page/change/config`, this.forms)
                .then(() => {
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

                toastr.success(`Konfigurasi Berhasil di Perbaharui`);
                })
                .catch(() => {
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

                toastr.success(`Konfigurasi Gagal di Perbaharui`);
                });

            }
        }
    },
}
</script>
