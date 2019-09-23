<template>
    <div>
        <breadcrumb :data="breadcrumbCreate.link" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head" style="margin-bottom:20px;">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            Tambah FAQ
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pertanyaan</label>
                    <div class="m-form__control">
                        <input type="text" v-model="forms.question" class="form-control" @blur="$v.forms.question.$touch()">
                    </div>
                    <template v-if="$v.forms.question.$error">
                        <span v-if="!$v.forms.question.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                    <span class="m-form__help">Masukan pertanyaannya. Jangan pake <strong>tanda tanya (?)</strong> di akhir kalimat</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Username">Jawaban</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="forms.answere" class="form-control" @blur="$v.forms.answere.$touch()"></textarea>
                    </div>
                    <template v-if="$v.forms.answere.$error">
                        <span v-if="!$v.forms.answere.required" class="m--font-danger">Field Ini Harus di Isi</span>
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
    name: 'FaqCreate',
    data() {
        return {
            forms: {
                question: null,
                answere: null
            },
        }
    },

    validations: {
        forms: {
            question: {
                required
            },
            answere: {
                required
            }
        }
    },
    created() {
        this.$store.dispatch('faq/clearPage');
    },
    computed: {
        breadcrumbTitle()
        {
            return this.$store.getters['faq/breadcrumbTitle'];
        },
        breadcrumbCreate()
        {
            return this.$store.getters['faq/breadcrumbCreate'];
        },
    },
    methods: {
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('faq/store', this.forms);
                this.$v.$reset();
            }
            this.$router.push({ name: 'FaqIndex' });
        }
    },
}
</script>
