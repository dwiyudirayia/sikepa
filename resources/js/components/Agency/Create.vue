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
                            Tambah Intansi
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Intansi</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.name.$model" class="form-control" @blur="$v.forms.name.$touch()">
                    </div>
                    <template v-if="$v.forms.name.$error">
                        <span v-if="!$v.forms.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="m-form__group form-group">
                    <label for="">Status</label>
                    <div class="m-radio-inline">
                        <label class="m-radio">
                            <input type="radio" v-model="$v.forms.status.$model" value="1"> Pemerintahan
                            <span></span>
                        </label>
                        <label class="m-radio">
                            <input type="radio" v-model="$v.forms.status.$model" value="0"> Non Pemerintahan
                            <span></span>
                        </label>
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
export default {
    name: 'AgencyCreate',
    data() {
        return {
            forms: {
                name: null,
                status: null,
            },
            breadcrumbTitle: 'Intansi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Intansi',
                    path: '/proposal/agency'
                },
                {
                    id: 1,
                    label: 'Tambah Intansi',
                    path: '/proposal/agency/create'
                }
            ]
        }
    },

    validations: {
        forms: {
            name: {
                required
            },
            status: {
                required
            },
        }
    },
    created() {
        this.$store.dispatch('agency/clearPage');
    },
    methods: {
        store() {
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                this.$store.dispatch('agency/store', this.forms).then(() => {
                    this.$v.$reset();
                    this.$router.push({ name: 'AgencyIndex' });
                });
            }
        }
    },
}
</script>
