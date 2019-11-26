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
                            Edit Testimoni
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Komentar">Nama</label>
                    <div class="m-form__control">
                        <textarea v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()" cols="30" rows="10"></textarea>
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                 <div class="form-group m-form__group">
                    <label for="Komentar">Pekerjaan</label>
                    <div class="m-form__control">
                        <textarea v-model="$v.forms.job.$model" class="form-control" @blur="$v.forms.job.$touch()" cols="30" rows="10"></textarea>
                    </div>
                    <template v-if="$v.forms.job.$error">
                        <span v-if="!$v.forms.job.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Komentar">Komentar</label>
                    <div class="m-form__control">
                        <textarea v-model="$v.forms.testimoni.$model" class="form-control" @blur="$v.forms.testimoni.$touch()" cols="30" rows="10"></textarea>
                    </div>
                    <template v-if="$v.forms.testimoni.$error">
                        <span v-if="!$v.forms.testimoni.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Komentar">Photo</label>
                    <div class="m-form__control">
                        <input type="file" v-on:change="onImageChange" class="form-control">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <div class="m-accordion m-accordion--bordered" id="m_accordion_6" role="tablist">
                        <!--begin::Item-->
                        <div class="m-accordion__item m-accordion__item--success">
                            <div class="m-accordion__item-head collapsed" role="tab" id="m_accordion_6_item_2_head" data-toggle="collapse" href="#m_accordion_6_item_2_body" aria-expanded="false">
                                <span class="m-accordion__item-icon"><i class="la la-image"></i></span>
                                <span class="m-accordion__item-title">Preview Gambar</span>
                                <span class="m-accordion__item-mode"></span>
                            </div>
                            <div class="m-accordion__item-body collapse" id="m_accordion_6_item_2_body" role="tabpanel" aria-labelledby="m_accordion_6_item_2_head" data-parent="#m_accordion_6" style="">
                                <div class="m-accordion__item-content">
                                    <img :src="`/testimoni/${forms.photo}`" width="100%" height="500px">
                                </div>
                            </div>
                        </div>
                        <!--end::Item-->
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
import { required } from 'vuelidate/lib/validators';
export default {
    name: 'TestimoniEdit',
    data() {
        return {
            breadcrumbTitle: 'Testimoni',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Testimoni',
                    path: '/testimoni'
                },
                {
                    id: 2,
                    label: 'Edit Testimoni',
                    path: `/testimoni/${this.$route.params.id}/edit`
                },
            ],
            forms: {
                testimoni: null,
                photo: null,
                name: null,
                job: null,
            },
        }
    },
    validations: {
        forms: {
            testimoni: {
                required,
            },
            name: {
                required
            },
            job: {
                required
            },
        }
    },
    created() {
        this.getData();
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.forms.photo = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        update() {
            $axios.put(`/admin/testimoni/${this.$route.params.id}`, this.forms)
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

                toastr.success(`Berhasil Update Testimoni`);

                this.$router.push({
                    name: 'TestimoniIndex'
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

                toastr.error(`Gagal Update Testimoni`);
            })
        },
        getData() {
            $axios.get(`/admin/testimoni/${this.$route.params.id}/edit`)
            .then(response => {
                this.forms.testimoni = response.data.data.testimoni;
                this.forms.name = response.data.data.name;
                this.forms.job = response.data.data.job;
                this.forms.photo = response.data.data.photo;
            })
            .catch(error => {

            })
        }
    }
}
</script>

<style>

</style>
