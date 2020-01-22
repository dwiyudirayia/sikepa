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
                            Edit Background Login
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Komentar">Photo</label>
                    <div class="m-form__control">
                        <input type="file" v-on:change="onImageChange" class="form-control">
                    </div>
                    <span v-if="$v.forms.image.$error && !$v.forms.image.required" class="m--font-danger">Field ini harus di isi</span>
                    <span v-else-if="$v.forms.image.$error && !$v.forms.image.fileType" class="m--font-danger">Ektensi file harus .jpeg / .jpg / .png</span>
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
import { fileType } from '@/validators';
export default {
    name: 'BannerLandingPageEdit',
    data() {
        return {
            breadcrumbTitle: 'Banner Artikel',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Banner Artikel',
                    path: '/article/banner'
                },
                {
                    id: 2,
                    label: 'Edit Banner Artikel',
                    path: `/article/banner/${this.$route.params.id}/edit`
                },
            ],
            forms: {
                image: null,
            },
        }
    },
    validations: {
        forms: {
            image: {
                required,
                fileType: fileType('image/jpg', 'image/jpeg', 'image/png'),
            }
        }
    },
    created() {
        this.getData();
    },
    methods: {
        onImageChange(e) {
            console.log(e);
            let files = e.target.files || e.dataTransfer.files;
            this.forms.image = files[0]
        },
        update() {
            this.$v.forms.$touch();
            let formData = new FormData();
            formData.append('image', this.forms.image);
            if(this.$v.forms.$invalid) {
                return;
            } else {
                $axios.post(`/admin/banner/landing/page/${this.$route.params.id}`, formData)
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

                    toastr.success(`Berhasil Update Banner Article`);

                    this.$router.push({
                        name: 'BannerLandingPageIndex'
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

                    toastr.error(`Gagal Update Background Login`);
                })
                this.$v.$reset();
            }
        },
        getData() {
            $axios.get(`/admin/photo/login/${this.$route.params.id}/edit`)
            .then(response => {
                this.forms.image = response.data.data.iamge_path;
            })
            .catch(error => {

            })
        }
    }
}
</script>

<style>

</style>
