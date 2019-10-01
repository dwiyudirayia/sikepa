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
                            Edit FAQ
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pertanyaan</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.question.$model" class="form-control" @blur="$v.question.$touch()">
                        <input type="hidden" v-model="id" class="form-control">
                    </div>
                    <template v-if="$v.question.$error">
                        <span v-if="!$v.question.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Masukan pertanyaannya. Jangan pake <strong>tanda tanya (?)</strong> di akhir kalimat</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Username">Jawaban</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="$v.answere.$model" class="form-control" @blur="$v.answere.$touch()"></textarea>
                    </div>
                    <template v-if="$v.answere.$error">
                        <span v-if="!$v.answere.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Tolong sesuaikan jawabannya, agar user tidak bingung</span>
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

export default {
    name: 'FaqEdit',
    data() {
        return {
            breadcrumbTitle: 'FAQ',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'FAQ',
                    path: '/faq'
                },
                {
                    id: 1,
                    label: 'Edit FAQ',
                    path: `/faq/${this.$route.params.id}/edit`
                }
            ]
        }
    },
    validations: {
        question: {
            required
        },
        answere: {
            required
        }
    },
    created() {
        this.$store.dispatch('faq/edit', this.$route.params.id);
    },
    computed: {
        question: {
            get() {
                return this.$store.state.faq.forms.question;
            },
            set(value) {
                this.$store.commit('faq/updateQuestion', value)
            }
        },
        answere: {
            get() {
                return this.$store.state.faq.forms.answere;
            },
            set(value) {
                this.$store.commit('faq/updateAnswere', value)
            }
        },
        id: {
            get() {
                return this.$store.state.faq.forms.id;
            },
            set(value) {
                this.$store.commit('faq/updateId', value)
            }
        },
    },
    methods: {
        update() {
            this.$v.question.$touch();
            this.$v.answere.$touch();
            if(this.$v.question.$invalid || this.$v.answere.$invalid) {
                return;
            } else {
                this.$store.dispatch('faq/update');
                this.$v.$reset();
            }

            this.$router.push('/faq')
        }
    },
}
</script>
