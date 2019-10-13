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
                            Edit Section
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Section</label>
                    <div class="m-form__control">
                        <input type="text" v-model.trim="$v.name.$model" class="form-control" @blur="$v.name.$touch()">
                        <input type="hidden" v-model="id" class="form-control">
                    </div>
                    <template v-if="$v.name.$error">
                        <span v-if="!$v.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                        <span class="m--font-danger" v-if="!$v.name.isUnique">Nama Section Sudah Terdaftar.</span>
                    </template>
                    <br>
                    <span class="m-form__help">Pastikan Nama Section Sesuai Dengan Kriteria Nanti</span>
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

export default {
    name: 'SectionArticleEdit',
    data() {
        return {
            breadcrumbTitle: 'Section',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Section',
                    path: '/section/article'
                },
                {
                    id: 2,
                    label: 'Edit Section',
                    path: `/section/article/${this.$route.params.id}/edit`
                },
            ],
            forms: {
                name: null,
            },
            statusNameUnique: null
        }
    },
    validations: {
        name: {
            required,
            async isUnique(value) {
                // standalone validator ideally should not assume a field is required
                if (value === '') return true

                const response = $axios.get(`/admin/check/section/article/${value}/edit/${this.$route.params.id}`)
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
    },
    created() {
        this.$store.dispatch('article/editSection', this.$route.params.id);
    },
    computed: {
        name: {
            get() {
            return this.$store.state.article.forms.name;
            },
            set(value) {
                this.$store.commit('article/updateName', value)
            }
        },
        id: {
            get() {
                return this.$store.state.article.forms.id;
            },
            set(value) {
                this.$store.commit('article/updateId', value)
            }
        }
    },
    methods: {
        update() {
            this.$v.name.$touch();
            if(this.$v.name.$invalid) {
                return;
            } else {
                this.$store.dispatch('article/updateSection');
                this.$v.$reset();
            }
            this.$router.push({ name: 'SectionArticleIndex' });
        }
    },
}
</script>
