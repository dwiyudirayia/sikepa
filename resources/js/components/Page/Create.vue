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
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pilih Section</label>
                    <div class="m-form__control">
                        <Select2
                        :options="section"
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
                    <label for="Nama Lengkap">Pilih Kategori</label>
                    <Select2
                    :options="category"
                    v-model="$v.forms.category_id.$model"
                    class="form-control"
                    @blur="$v.forms.category_id.$touch()"
                    >
                    </Select2>
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
                    <div class="m-form__control">
                        <editor
                            api-key="dzzffhe3e7rwi6o0yhr653apjdpwu2uyld4x4xppx02diki8"
                            v-model="forms.short_content"
                            :init="{
                                height: 500,
                                plugins: [
                                    'print preview paste searchreplace autolink code visualblocks visualchars image link media table charmap hr anchor insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap quickbars emoticons',
                                ],
                                imagetools_cors_hosts: ['picsum.photos'],
                                menubar: 'file edit view insert format tools table',
                                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | charmap emoticons | preview save print | insertfile image media link',
                                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                            }"
                        >
                        </editor>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Konten</label>
                    <div class="m-form__control">
                        <editor
                            api-key="dzzffhe3e7rwi6o0yhr653apjdpwu2uyld4x4xppx02diki8"
                            v-model="forms.content"
                            :init="{
                                height: 500,
                                plugins: [
                                    'print preview paste searchreplace autolink code visualblocks visualchars image link media table charmap hr anchor insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap quickbars emoticons',
                                ],
                                imagetools_cors_hosts: ['picsum.photos'],
                                menubar: 'file edit view insert format tools table',
                                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | charmap emoticons | preview save print | insertfile image media link',
                                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                            }"
                        >
                        </editor>
                    </div>
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
                    <input type="file" v-on:change="onImageChange" class="form-control" accept="image/x-png,image/jpeg">
                    <span v-if="$v.forms.image.$error && !$v.forms.image.required" class="m--font-danger">Field ini harus di isi</span>
                    <span v-else-if="$v.forms.image.$error && !$v.forms.image.fileType" class="m--font-danger">Ektensi file harus .jpeg / .jpg / .png</span>
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
                                    <img :src="previewImage" class="img-responsive" height="100%" width="100%">
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
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Key</label>
                        <input type="text" v-model="forms.seo_meta_key" class="form-control">
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Description</label>
                        <input type="text" v-model="forms.seo_meta_desc" class="form-control">
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
import { fileType } from '@/validators';
import Editor from '@tinymce/tinymce-vue';
import $axios from './../../api';
import Select2 from './Select2'

export default {
    name: 'PageCreate',
    components: {
        Select2,
        Editor
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
                    label: 'Tambah Page',
                    path: '/page/create'
                },
            ],

            forms: {
                section_id: null,
                category_id: null,
                title: null,
                short_content: null,
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
            previewImage:null,
        }
    },
    validations: {
        forms: {
            section_id: {
                required,
            },
            category_id: {
                required,
            },
            title: {
                required,
            },
            image: {
                fileType: fileType('image/jpg', 'image/jpeg', 'image/png'),
            }
        }
    },
    created() {
        $axios.get('/admin/page/create')
        .then(response => {
            this.section = response.data.data.section;
            this.category = response.data.data.category;
        });
    },
    methods: {
        onImageChange(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.forms.image = files[0];
            if (!files.length)
                return;
            this.createImage(files[0]);
        },
        createImage(file) {
            let reader = new FileReader();
            let vm = this;
            reader.onload = (e) => {
                vm.previewImage = e.target.result;
            };
            reader.readAsDataURL(file);
        },
        store() {
            this.$v.forms.$touch();


            if(this.$v.forms.$invalid) {
                return;
            } else {
                let formData = new FormData();

                formData.append('section_id', this.forms.section_id);
                formData.append('category_id', this.forms.category_id);
                formData.append('title', this.forms.title);
                formData.append('short_content', this.forms.short_content);
                formData.append('content', this.forms.content);
                formData.append('image', this.forms.image);
                formData.append('seo_title', this.forms.seo_title);
                formData.append('seo_meta_key', this.forms.seo_meta_key);
                formData.append('seo_meta_desc', this.forms.seo_meta_desc);
                formData.append('publish', this.forms.publish);
                formData.append('approved', this.forms.approved);

                this.$store.dispatch('page/storePage', formData).then(response => this.$router.push({ path: `/category/${this.forms.category_id}/page` }));
                this.$v.$reset();
            }

        }
    }
}
</script>
