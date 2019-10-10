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
                            Tambah Banner
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pilih Kategori</label>
                    <Select2Edit
                    @input="changeCategory"
                    :options="category"
                    :initSelected="selectedCategory"
                    v-model="$v.forms.category_id.$model"
                    class="form-control"
                    @blur="$v.forms.category_id.$touch()"
                    >
                    </Select2Edit>
                    <template v-if="$v.forms.category_id.$error">
                        <span v-if="!$v.forms.category_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Kategori Sesuai Dengan Kriteria Nanti</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Image</label>
                    <input type="file" v-on:change="onImageChange" class="form-control">
                </div>
                <div class="form-group m-form__group" v-show="previousImage">
                    <img :src="`/banner/${forms.image_path}`" class="img-responsive" height="70" width="90">
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Dekripsi Banner</label>
                    <div class="m-form__control">
                        <textarea v-model="$v.forms.description.$model" class="form-control" @blur="$v.forms.description.$touch()" cols="30" rows="10"></textarea>
                    </div>
                    <template v-if="$v.forms.description.$error">
                        <span v-if="!$v.forms.description.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Deskripsi Banner Sesuai Dengan Kriteria Nanti</span>
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
import { VueEditor } from "vue2-editor";
import Axios from 'axios';
import Select2Edit from './Select2Edit'
export default {
    name: 'ArticleCreate',
    components: {
        Select2Edit,
        VueEditor
    },
    data() {
        return {
            breadcrumbTitle: 'Banner',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Section',
                    path: '/section/article'
                },
                {
                    id: 2,
                    label: 'Edit Banner',
                    path: `/article/${this.$route.params.id}/edit`
                },
            ],
            forms: {
                category_id: null,
                description: null,
                image_path: null
            },
            previousImage: true,
            currentlyImage: false,
            category: null,
            selectedCategory: null,
            changeImage: false
        }
    },
    validations: {
        forms: {
            category_id: {
                required
            },
            description: {
                required
            },
        }
    },
    created() {
        Axios.get(`/admin/banner/${this.$route.params.id}/edit`)
        .then(response => {
            this.category = response.data.data.category;
            this.forms = response.data.data.data;
            this.selectedCategory = response.data.data.data.category_id;
        });
    },
    methods: {
        changeCategory(value) {
            this.forms.category_id = value == '' ? parseInt(this.selectedCategory) : parseInt(value);
        },
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
            this.changeImage = true;
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.forms.image = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        update() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('article/updateArticle', this.forms);
                this.$v.$reset();
            }

            this.$router.push({ path: `/banner/list/${this.forms.category_id}/category` });
        }
    }
}
</script>
