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
                            Tambah Kategori
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pilih Section</label>
                    <div class="m-form__control">
                        <Select2
                        :options="options"
                        v-model="$v.forms.section_id.$model"
                        class="form-control"
                        @blur="$v.forms.section_id.$touch()"
                        >
                        </Select2>
                    </div>
                    <template v-if="$v.forms.section_id.$error">
                        <span v-if="!$v.forms.section_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Section Sesuai Dengan Kriteria Nanti</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Kategori</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                        <br>
                        <span class="m--font-danger" v-if="!$v.forms.name.isUnique">Nama Kategori Sudah Terdaftar.</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Kategori Sesuai Dengan Kriteria Nanti</span>
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
import Select2 from './../Select2'
export default {
    name: 'CategoryCreate',
    components: {
        Select2
    },
    data() {
        return {
            breadcrumbTitle: 'Kategori',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Section',
                    path: '/section'
                },
                {
                    id: 2,
                    label: 'Tambah Kategori',
                    path: '/category/create'
                },
            ],
            forms: {
                name: null,
                section_id: null,
            },
            options: null,
            statusNameUnique: null
        }
    },
    validations: {
        forms: {
            name: {
                required,
                async isUnique(value) {
                    // standalone validator ideally should not assume a field is required
                    if (value === '') return true

                    const response = Axios.get(`/admin/check/section/category/${value}/section/${this.forms.section_id}`)
                    .then(response => {
                        this.statusNameUnique = response.data.isExist;
                    })

                    // simulate async call, fail for all logins with even length
                    return new Promise((resolve, reject) => {
                        setTimeout(() => {
                            resolve(this.statusNameUnique == false)
                        }, 350 + Math.random() * 300)
                    })
                }
            },
            section_id: {
                required
            }
        }
    },
    created() {
        Axios.get('/admin/category/article/create')
        .then(response => {
            this.options = response.data.data;
        });
    },
    methods: {
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('article/storeCategory', this.forms);
                this.$v.$reset();
            }
            this.$router.push({ path: `/list/${this.forms.section_id}/category` });
        }
    }
}
</script>
