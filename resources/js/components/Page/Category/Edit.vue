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
                            Edit Kategori
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
                        :value="$v.forms.section_id.$model"
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
import $axios from './../../../api';
import Select2Edit from './../Select2Edit'
import store from './../../../store/store';
export default {
    name: 'CategoryPageEdit',
    components: {
        Select2Edit
    },
    data() {
        return {
            breadcrumbTitle: 'Kategori',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Section',
                    path: '/section/page'
                },
                {
                    id: 2,
                    label: 'Edit Kategori',
                    path: `/category/page/${this.$route.params.id}/edit`
                }
            ],
            forms: null,
            section: null,
            selectedSection: null,
            statusNameUnique: null
        }
    },
    created() {
        $axios.get(`/admin/category/page/${this.$route.params.id}/edit`)
        .then(response => {
            this.section = response.data.data.section;
            this.forms = response.data.data.data;
            this.selectedSection = response.data.data.data.section.id;

        });
    },
    validations: {
        forms: {
            name: {
                required,
                async isUnique(value) {
                // standalone validator ideally should not assume a field is required
                if (value === '') return true

                const response = $axios.get(`/admin/check/category/page/${value}/edit/${this.$route.params.id}`)
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
    methods: {
        changeSection(value) {
            this.forms.section_id = value == '' ? this.selectedSection : value;
        },
        update()
        {
            $axios.put(`/admin/category/page/${this.$route.params.id}`, this.forms)
            .then(response => {
                this.$store.commit('page/notification', response);
                this.$store.commit('page/updateData', response);

            })
            .catch(error => {
                this.$store.commit('page/notification', error);
            });

            this.$router.push({path: `/list/${this.forms.section_id}/category/page`});
        }
    }
}
</script>

<style>

</style>
