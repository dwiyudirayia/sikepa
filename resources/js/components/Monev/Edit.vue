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
                            Edit Monitoring Evaluasi
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="update">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Judul Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" class="form-control" v-model="$v.forms.title_of_cooperation.$model">
                    </div>
                    <template v-if="$v.forms.title_of_cooperation.$error">
                        <span v-if="!$v.forms.title_of_cooperation.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Latar Belakang</label>
                    <div class="m-form__control">
                        <textarea v-model="forms.background" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Latitude</label>
                    <div class="m-form__control">
                        <input type="text" v-model="forms.latitude" class="form-control">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Longitude</label>
                    <div class="m-form__control">
                        <input type="text" v-model="forms.longitude" class="form-control">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Keterangan</label>
                    <div class="m-form__control">
                        <textarea v-model="forms.description" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="m-form__group form-group">
                    <label for="">Status</label>
                    <div class="m-radio-inline">
                        <label class="m-radio m-radio--state-brand">
                            <input type="radio" v-model="forms.status" value="0"> Tidak Berlaku
                            <span></span>
                        </label>
                        <label class="m-radio m-radio--state-brand">
                            <input type="radio" v-model="forms.status" value="1"> Masih Berlaku
                            <span></span>
                        </label>
                    </div>
                    <span class="m-form__help">Some help text goes here</span>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Tanggal TTD - Tanggal Berakhir</label>
                    <div class="m-form__control">
                        <date-picker
                            v-model="forms.time_period"
                            ref="datePicker"
                            :lang="{pickers: ['7 Hari Selanjutnya', '30 Hari Selanjutnya', '7 Hari Sebelumnya', '30 Hari Sebelumnya']}"
                            range
                            width="100%"
                            valueType="format"
                            format='YYYY-MM-DD'
                            input-class="form-control"
                            placeholder="Masukan Tanggal Usulan Jangka Waktu">
                        </date-picker>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Nomer MOU</h3>
                    </div>
                    <div v-for="(value, index) in forms.nomor" :key="index">
                        <div class="form-group m-form__group">
                            <div class="text-right">
                                <i
                                    v-if="(index === forms.nomor.length - 1 || forms.nomor.length == 0) "
                                    class="la la-plus fa-2x"
                                    @click="addExtraNomor"
                                />
                                <i
                                    v-if="forms.nomor.length > 1"
                                    class="la la-minus fa-2x"
                                    @click="removeExtraNomor(index, value)"
                                />
                            </div>
                            <label for="example_input_full_name">Nomor</label>
                            <input type="text" class="form-control" v-model="forms.nomor[index]" placeholder="Masukan Nomor">
                        </div>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--first">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Para Pihak MOU</h3>
                    </div>
                    <div v-for="(item, index) in forms.the_parties" :key="index">
                        <div class="form-group m-form__group">
                            <div class="text-right">
                                <i
                                    v-if="(index === forms.the_parties.length - 1 || forms.the_parties.length == 0) "
                                    class="la la-plus fa-2x"
                                    @click="addExtraTheParties"
                                />
                                <i
                                    v-if="forms.the_parties.length > 1"
                                    class="la la-minus fa-2x"
                                    @click="removeExtraTheParties(index, item)"
                                />
                            </div>
                            <label for="example_input_full_name">Pihak</label>
                            <input type="text" class="form-control" v-model="forms.the_parties[index]" placeholder="Masukan Para Pihak">
                        </div>
                    </div>
                </div>
                <br>
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
import DatePicker from 'vue2-datepicker';
import $axios from '@/api.js';

export default {
    name: 'MonitoringEvaluasiEdit',
    components: {
        DatePicker,
    },
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Monitoring Evaluasi',
                    path: '/monev'
                },
                {
                    id: 2,
                    label: 'Edit Monitoring Evaluasi',
                    path: `/monev/${this.$route.params.id}`
                }
            ],
            forms: {
                nomor: [''],
                the_parties: [''],
                title_of_cooperation: null,
                time_period: null,
                background: null,
                status: 0,
                longitude: null,
                latitude: null,
                description: null,
            },
        }
    },
    validations: {
        forms: {
            title_of_cooperation: {
                required
            },
        }
    },
    created() {
        this.getData();
    },
    methods: {
        removeExtraNomor(index, value) {
            $axios.delete(`/admin/monev/${this.$route.params.id}/nomor/${value}`)
            .then(response => {

            })
            .catch(error => {

            })

            if(index == 0) {
                this.forms.nomor = [''];
            } else {
                this.forms.nomor.splice(index, 1);
            }
        },
        addExtraNomor() {
            this.forms.nomor.push('');
        },
        removeExtraTheParties(index, value) {
            $axios.delete(`/admin/monev/${this.$route.params.id}/parties/${value}`)
            .then(response => {

            })
            .catch(error => {

            })
            if(index == 0) {
                this.forms.the_parties = [''];
            } else {
                this.forms.the_parties.splice(index, 1);
            }
        },
        addExtraTheParties() {
            this.forms.the_parties.push('');
        },
        getData() {
            $axios.get(`/admin/monev/${this.$route.params.id}/edit`)
            .then(response => {
                if(response.data.data.parties.length == 0) {
                    this.forms.the_parties = [''];
                } else {
                    this.forms.the_parties = response.data.data.parties.map(value => value.name);

                }

                if(response.data.data.nomor.length == 0) {
                    this.forms.nomor == [''];
                } else {
                    this.forms.nomor = response.data.data.nomor.map(value => value.nomor);

                }
                this.forms.title_of_cooperation = response.data.data.title_of_cooperation;
                this.forms.background = response.data.data.background;
                this.forms.status = response.data.data.status;
                this.forms.latitude = response.data.data.latitude;
                this.forms.longitude = response.data.data.longitude;
                this.forms.description = response.data.data.description;
                this.forms.time_period = [response.data.data.tanggal_ttd, response.data.data.end_date];
            })
            .catch(error => {
            })
        },
        update() {
            $axios.put(`/admin/monev/${this.$route.params.id}`, this.forms)
            .then(response => {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "progressBar": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                toastr.success(`Berhasil Tambah Monev`);

                this.$router.push({
                    name: 'MonitoringEvaluasiIndex'
                });
            })
            .catch(error => {
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "progressBar": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };

                toastr.error(`Gagal Tambah Monev`);
            })
        }
    }
}
</script>

<style>

</style>
