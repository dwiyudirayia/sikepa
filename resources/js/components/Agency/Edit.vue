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
                            Edit Agency
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Nama Intansi</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.name.$model" class="form-control" @blur="$v.name.$touch()">
                        <input type="hidden" v-model="id" class="form-control">
                    </div>
                    <template v-if="$v.name.$error">
                        <span v-if="!$v.name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Username">Alamat</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="$v.address.$model" class="form-control" @blur="$v.address.$touch()"></textarea>
                    </div>
                    <template v-if="$v.address.$error">
                        <span v-if="!$v.address.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Latitude</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.latitude.$model" class="form-control" @blur="$v.latitude.$touch()">
                    </div>
                    <template v-if="$v.latitude.$error">
                        <span v-if="!$v.latitude.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Longitude</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.longitude.$model" class="form-control" @blur="$v.longitude.$touch()">
                    </div>
                    <template v-if="$v.longitude.$error">
                        <span v-if="!$v.longitude.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
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
    name: 'AgencyEdit',
    data() {
        return {
            breadcrumbTitle: 'Intansi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Intansi',
                    path: '/agency'
                },
                {
                    id: 1,
                    label: 'Edit Intansi',
                    path: `/agency/${this.$route.params.id}/edit`
                }
            ]
        }
    },
    validations: {
        name: {
            required
        },
        address: {
            required
        },
        latitude: {
            required
        },
        longitude: {
            required
        },
    },
    created() {
        this.$store.dispatch('agency/edit', this.$route.params.id);
    },
    computed: {
        name: {
            get() {
                return this.$store.state.agency.forms.name;
            },
            set(value) {
                this.$store.commit('agency/updateName', value)
            }
        },
        address: {
            get() {
                return this.$store.state.agency.forms.address;
            },
            set(value) {
                this.$store.commit('agency/updateAddress', value)
            }
        },
        latitude: {
            get() {
                return this.$store.state.agency.forms.latitude;
            },
            set(value) {
                this.$store.commit('agency/updateLatitude', value)
            }
        },
        longitude: {
            get() {
                return this.$store.state.agency.forms.longitude;
            },
            set(value) {
                this.$store.commit('agency/updateLongitude', value)
            }
        },
        id: {
            get() {
                return this.$store.state.agency.forms.id;
            },
            set(value) {
                this.$store.commit('agency/updateId', value)
            }
        },
    },
    methods: {
        update() {
            this.$v.name.$touch();
            this.$v.address.$touch();
            if(this.$v.name.$invalid || this.$v.address.$invalid) {
                return;
            } else {
                this.$store.dispatch('agency/update');
                this.$v.$reset();
            }

            this.$router.push('/agency')
        }
    },
}
</script>
