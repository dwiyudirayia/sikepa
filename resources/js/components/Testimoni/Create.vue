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
                            Tambah Testimoni
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
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
import $axios from './../../api';
export default {
    name: 'TestimoniCreate',
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
                    label: 'Tambah Testimoni',
                    path: '/testimoni/create'
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
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('testimoni/storeTestimoni', this.forms);
                this.$v.$reset();
            }
            this.$router.push({ path: `/testimoni` });
        }
    }
}
</script>
