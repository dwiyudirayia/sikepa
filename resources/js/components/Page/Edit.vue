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
                            Tambah Page
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pilih Section</label>
                    <div class="m-form__control">
                        <Select2Edit
                        @input="changeSection"
                        :options="section"
                        :initSelected="selectedSection"
                        v-model="$v.forms.section_id.$model"
                        class="form-control"
                        @blur="$v.forms.section_id.$touch()"
                        >
                        </Select2Edit>
                    </div>
                    <template v-if="$v.forms.section_id.$error">
                        <span v-if="!$v.forms.section_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Section Sesuai Dengan Kriteria Nanti</span>
                </div>
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
                    <label for="Nama Lengkap">Judul</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.title.$model" class="form-control" @blur="$v.forms.title.$touch()">
                    </div>
                    <template v-if="$v.forms.title.$error">
                        <span v-if="!$v.forms.title.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Judul Terisi</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Konten Singkat</label>
                    <vue-editor v-model="forms.short_content"></vue-editor>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Konten</label>
                    <vue-editor v-model="forms.content"></vue-editor>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Persetujuan</label>
                    <select class="form-control" v-model="forms.approved">
                        <option value="0">Tidak di Setujui</option>
                        <option value="1">Setuju</option>
                    </select>
                    <span class="m-form__help">Pastikan Judul Terisi</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Publish</label>
                    <select class="form-control" v-model="forms.publish">
                        <option value="0">Draft</option>
                        <option value="1">Publish</option>
                    </select>
                    <span class="m-form__help">Pastikan Judul Terisi</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Image</label>
                    <input type="file" v-on:change="onImageChange" class="form-control">
                </div>
                <div class="form-group m-form__group">
                    <div class="m-accordion m-accordion--bordered" id="m_accordion_6" role="tablist">
                        <!--begin::Item-->
                        <div class="m-accordion__item m-accordion__item--success">
                            <div class="m-accordion__item-head" role="tab" id="m_accordion_6_item_2_head" data-toggle="collapse" href="#m_accordion_6_item_2_body" aria-expanded="true">
                                <span class="m-accordion__item-icon"><i class="la la-image"></i></span>
                                <span class="m-accordion__item-title">Tampilan Gambar</span>
                                <span class="m-accordion__item-mode"></span>
                            </div>
                            <div class="m-accordion__item-body collapse show" id="m_accordion_6_item_2_body" role="tabpanel" aria-labelledby="m_accordion_6_item_2_head" data-parent="#m_accordion_6" style="">
                                <div class="m-accordion__item-content">
                                    <img :src="`/page/${forms.image}`" class="img-responsive" height="100%" width="100%" v-show="previousImage">
                                    <img :src="forms.image" class="img-responsive" height="100%" width="100%" v-show="currentlyImage">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--last">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Meta</h3>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Title</label>
                        <input type="text" v-model="forms.seo_title" class="form-control">
                        <span class="m-form__help">Pastikan Judul Page Terisi</span>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Key</label>
                        <input type="text" v-model="forms.seo_meta_key" class="form-control">
                        <span class="m-form__help">Pastikan Judul Page Terisi</span>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Description</label>
                        <input type="text" v-model="forms.seo_meta_desc" class="form-control">
                        <span class="m-form__help">Pastikan Judul Page Terisi</span>
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
import { VueEditor } from "vue2-editor";
import $axios from './../../api';
import Select2Edit from './Select2Edit'
export default {
    name: 'PageCreate',
    components: {
        Select2Edit,
        VueEditor
    },
    data() {
        return {
            breadcrumbTitle: 'Page',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Section',
                    path: '/section/page'
                },
                {
                    id: 2,
                    label: 'Edit Page',
                    path: `/page/${this.$route.params.id}/edit`
                },
            ],
            forms: {
                section_id: null,
                category_id: null,
                title: null,
                content: null,
                image: null,
                seo_title: null,
                seo_meta_key: null,
                seo_meta_desc: null,
                publish: null,
                approved: null
            },
            section: null,
            category: null,
            previousImage: true,
            currentlyImage: false,
            selectedSection: null,
            selectedCategory: null,
        }
    },
    validations: {
        forms: {
            section_id: {
                required
            },
            category_id: {
                required
            },
            title: {
                required
            },
        }
    },
    created() {
        $axios.get(`/admin/page/${this.$route.params.id}/edit`)
        .then(response => {
            this.section = response.data.data.section;
            this.category = response.data.data.category;
            this.forms = response.data.data.data;
            this.selectedSection = response.data.data.data.section_id;
            this.selectedCategory = response.data.data.data.category_id;
        });
    },
    methods: {
        changeSection(value) {
            this.forms.section_id = value == '' ? parseInt(this.selectedSection) : parseInt(value);
        },
        changeCategory(value) {
            this.forms.category_id = value == '' ? parseInt(this.selectedCategory) : parseInt(value);
        },
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            if (!files.length)
                return;
            this.createImage(files[0]);
            this.previousImage = false;
            this.currentlyImage = true;
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
                this.$store.dispatch('page/updatePage', this.forms);
                this.$v.$reset();
            }

            this.$router.push({ path: `/category/${this.forms.category_id}/page` });
        }
    }
}
</script>
