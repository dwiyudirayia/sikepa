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
                            Tambah Pengajuan
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Jenis</label>
                    <div class="m-form__control">
                        <select class="form-control" v-model="$v.forms.type_id.$model">
                            <option value="1">PKS</option>
                            <option value="2">MOU</option>
                        </select>
                    </div>
                    <template v-if="$v.forms.type_id.$error">
                        <span v-if="!$v.forms.type_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Usulan Judul Kerjasama</label>
                    <div class="m-form__control">
                        <input type="text" class="form-control" v-model="$v.forms.title_cooperation.$model">
                    </div>
                    <span class="m-form__help">Pastikan Judul Kerjasama Sesuai</span>
                    <br>
                    <template v-if="$v.forms.title_cooperation.$error">
                        <span v-if="!$v.forms.title_cooperation.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Subtansi Kerjasama</label>
                    <div class="m-form__control">
                        <select
                            v-model="$v.forms.type_of_cooperation_id.$model"
                            class="form-control"
                        >
                            <option
                                v-for="(value, index) in data_select.type_of_cooperation_id"
                                :key="index"
                                :value="value.id"
                            >
                            {{ value.name }}
                            </option>
                        </select>
                    </div>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    <br>
                    <template v-if="$v.forms.type_of_cooperation_id.$error">
                        <span v-if="!$v.forms.type_of_cooperation_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                </div><div class="m-form__group form-group">
                    <label for="">Tujuan Deputi</label>
                    <div class="m-checkbox-inline">
                        <label class="m-checkbox" v-for="(value, index) in deputi" :key="value.id">
                            <input type="checkbox" :value="value.id" @click="deputiDirect(index, value.id)"> {{ value.name }}
                            <span></span>
                        </label>
                    </div>
                    <span class="m-form__help">Some help text goes here</span>
                </div>
                <div v-if="isNominal">
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Nominal</label>
                        <div class="m-form__control">
                            <input
                                type="text"
                                v-model="forms.nominal"
                                class="form-control"
                                placeholder="Masukan Nominal Yang di Inginkan"
                                @input="validate()"
                            >
                        </div>
                        <span class="m-form__help">Ketikan Nominal Yang di Inginkan</span>
                    </div>
                </div>
                <div v-else>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Jenis Kerjasama</label>
                        <div class="m-form__control">
                            <select v-model="forms.type_of_cooperation_one_derivative_id" class="form-control" @change="onChangeTypeOfCooperationTwoDerivative()">
                                <option v-for="(value, index) in data_select.type_of_cooperation_one_derivative_id" :key="index" :value="value.id">{{ value.name }}</option>
                            </select>
                        </div>
                        <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Kesepahaman Jenis Kerjasama</label>
                        <div class="m-form__control">
                            <select v-model="forms.type_of_cooperation_two_derivative_id" class="form-control">
                                <option v-for="(value, index) in data_select.type_of_cooperation_two_derivative_id" :key="index" :value="value.id">{{ value.name }}</option>
                            </select>
                        </div>
                        <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Negara</label>
                    <div class="m-form__control">
                        <select class="form-control" v-model="$v.forms.country_id.$model">
                            <option :value="value.id" v-for="(value, index) in data_select.country_id" :key="index">
                                {{ value.country_name }}
                            </option>
                        </select>
                    </div>
                    <template v-if="$v.forms.country_id.$error">
                        <span v-if="!$v.forms.country_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                </div>
                <div v-if="isIndonesian">
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Provinsi</label>
                        <div class="m-form__control">
                            <select v-model="forms.province_id" class="form-control" @change="getRegencies()">
                                <option v-for="(value, index) in data_select.province_id" :key="index" :value="value.id">{{ value.name.toUpperCase() }}</option>
                            </select>
                        </div>
                        <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Kabupaten / Kota</label>
                        <div class="m-form__control">
                            <select v-model="forms.regency_id" class="form-control">
                                <option v-for="(value, index) in data_select.regency_id" :key="index" :value="value.id">{{ value.name.toUpperCase() }}</option>
                            </select>
                        </div>
                        <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Instansi</label>
                    <div class="m-form__control">
                        <select v-model="$v.forms.agencies_id.$model" class="form-control">
                            <option v-for="(value, index) in data_select.agencies_id" :key="index" :value="value.id">{{ value.name }}</option>
                        </select>
                    </div>
                    <span class="m-form__help">Pastikan Nama Jenis Kerjasama Sesuai Dengan Kriteria Nanti</span>
                    <template v-if="$v.forms.agencies_id.$error">
                        <span v-if="!$v.forms.agencies_id.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tentukan Marker Yang di Tuju</label>
                            <div class="m-form__control">
                            <gmap-map
                                :center="centerMaps"
                                :zoom="7"
                                style="width:100%;  height: 680px;"
                            >
                            <GmapMarker
                                v-if="this.forms.latitude"
                                label="★"
                                :position="{
                                lat: this.forms.latitude,
                                lng: this.forms.longitude,
                                }"
                                :draggable="true"
                                @dragend="updateCoordinates"
                            />
                            <!-- <gmap-marker :key="index" v-for="(m, index) in markers" :position="m.position" :draggable="true" @dragend="updateCoordinates">
                            </gmap-marker> -->
                            </gmap-map>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Pilih di Google Maps</label>
                            <div class="m-form__control">
                                <GmapAutocomplete @place_changed="setPlace" class="form-control">
                                </GmapAutocomplete>
                            </div>
                            <span class="m-form__help">Ketik Nama Yang di Tuju. Jika Tidak Ada Maka Pilih Menggunakan Fitur Map Yang ada Di Samping</span>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Nama Instansi</label>
                            <div class="m-form__control">
                                <input type="text" class="form-control" v-model="$v.forms.agency_name.$model">
                            </div>
                            <span class="m-form__help">Pastikan Nama Instansi Sesuai</span>
                            <br>
                            <template v-if="$v.forms.agency_name.$error">
                                <span v-if="!$v.forms.agency_name.required" class="m--font-danger">Field Ini Harus di Isi</span>
                            </template>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Alamat Instansi</label>
                            <div class="m-form__control">
                                <textarea v-model="$v.forms.address.$model" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                            <span class="m-form__help">Pastikan Alamat Instansi Sesuai</span>
                                <br>
                                <template v-if="$v.forms.address.$error">
                                    <span v-if="!$v.forms.address.required" class="m--font-danger">Field Ini Harus di Isi</span>
                                </template>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Kode Pos</label>
                            <div class="m-form__control">
                                <input type="text" v-model="$v.forms.postal_code.$model" class="form-control">
                            </div>
                            <span class="m-form__help">Pastikan Kode Pos Sesuai</span>
                            <br>
                            <template v-if="$v.forms.postal_code.$error">
                                <span v-if="!$v.forms.postal_code.required" class="m--font-danger">Field Ini Harus di Isi</span>
                            </template>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Latitude</label>
                            <div class="m-form__control">
                                <input type="text" v-model="forms.latitude" class="form-control" disabled>
                            </div>
                            <span class="m-form__help">Sudah Terisi Otomatis</span>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Longitude</label>
                            <div class="m-form__control">
                                <input type="text" v-model="forms.longitude" class="form-control" disabled>
                            </div>
                            <span class="m-form__help">Sudah Terisi Otomatis</span>
                        </div>
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Maksud & Tujuan</label>
                            <div class="m-form__control">
                                <textarea v-model="$v.forms.purpose_objectives.$model" cols="30" class="form-control"></textarea>
                                <span class="m-form__help">Pastikan Maksud & Tujuan Sesuai</span>
                                <br>
                                <template v-if="$v.forms.purpose_objectives.$error">
                                    <span v-if="!$v.forms.purpose_objectives.required" class="m--font-danger">Field Ini Harus di Isi</span>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Lama Pengajuan</label>
                            <div class="m-form__control">
                                <select2
                                    v-model="$v.forms.time_period.$model"
                                    :options="data_select.time_period"
                                />
                                <span class="m-form__help">Pastikan Tanggal Sesuai</span>
                                <br>
                                <template v-if="$v.forms.time_period.$error">
                                    <span v-if="!$v.forms.time_period.required" class="m--font-danger">Field Ini Harus di Isi</span>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Latar Belakang</label>
                            <div class="m-form__control">
                                <textarea v-model="$v.forms.background.$model" cols="30" class="form-control"></textarea>
                                <span class="m-form__help">Pastikan Latar Belakang Sesuai</span>
                                <br>
                                <template v-if="$v.forms.background.$error">
                                    <span v-if="!$v.forms.background.required" class="m--font-danger">Field Ini Harus di Isi</span>
                                </template>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Profile Instansi</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileInstansi" ref="fileInstansi" @change="fileProfileInstansi()">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            <span class="m-form__help">Pastikan Ekstensi File <strong>.docx, .doc dan .pdf</strong></span>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Proposal</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="fileProposal" ref="fileProposal" @change="fileProposal()">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            <span class="m-form__help">Pastikan Ekstensi File <strong>.pdf, .jpeg, .jpg dan .mp4</strong></span>
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
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';
// import DatePicker from 'vue2-datepicker';

export default {
    name: 'SubmissionCooperationCreate',
    // components: {
    //     DatePicker
    // },
    data() {
        return {
            deputi: [
                {
                    id: 3,
                    name: 'Deputi Bidang Partisipasi Masyarakat'
                },
                {
                    id: 4,
                    name: 'Deputi Bidang Kesetaraan Gender',
                },
                {
                    id: 5,
                    name: 'Deputi Bidang Perlindungan Anak',
                },
                {
                    id: 6,
                    name: 'Deputi Bidang Perlindungan Hak Perempuan',
                },
                {
                    id: 7,
                    name: 'Deputi Bidang Tumbuh Kembang Anak'
                }
            ],
            options:[
                {
                    id: 1,
                    name: 'MOU'
                },
                {
                    id: 2,
                    name: 'PKS'
                }
            ],
            markers: [
                {
                    position: {
                        lat:-6.2293867, lng:106.6894293
                    }
                },
            ],
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Tambah Pengajuan Kerjasama',
                    path: '/submission/cooperation/create'
                },
            ],
            centerMaps: {
                lat:-6.2293867,
                lng:106.6894293
            },
            isIndonesian: false,
            forms: {
                deputi: [],
                type_id: '1',
                title_cooperation: null,
                type_of_cooperation_id: null,
                type_of_cooperation_one_derivative_id: null,
                type_of_cooperation_two_derivative_id: null,
                agencies_id: null,
                country_id: null,
                province_id: null,
                regency_id: null,
                postal_code: null,
                agency_name: null,
                address: null,
                latitude: null,
                longitude: null,
                nominal: null,
                purpose_objectives: null,
                background: null,
                time_period: null,
                agency_profile: null,
                proposal: null,
            },
            data_select: {
                time_period: [
                    {
                        id: 1,
                        name: '1 Tahun',
                    },
                    {
                        id: 2,
                        name: '2 Tahun',
                    },
                    {
                        id: 3,
                        name: '3 Tahun',
                    },
                    {
                        id: 4,
                        name: '4 Tahun',
                    },
                    {
                        id: 5,
                        name: '5 Tahun',
                    }
                ],
                type_of_cooperation_id: [],
                type_of_cooperation_one_derivative_id: [],
                type_of_cooperation_two_derivative_id: [],
                substance_cooperation_id: [],
                cooperastion_target_id: [],
                target_of_cooperation_id: [],
                agencies_id: [],
                country_id: [],
                province_id: [],
                regency_id: [],
            },
            isNominal: false,
            place: null,
        }
    },
    validations: {
        forms: {
            type_id: {
                required
            },
            title_cooperation: {
                required
            },
            type_of_cooperation_id: {
                required
            },
            country_id: {
                required
            },
            agencies_id: {
                required
            },
            postal_code: {
                required
            },
            agency_name: {
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
            purpose_objectives: {
                required
            },
            background: {
                required
            },
            time_period: {
                required
            },
        }
    },
    created() {
        $axios.get(`/admin/submission/cooperation/create`)
        .then(response => {
            this.data_select.type_of_cooperation_id = response.data.data.typeof;
            this.data_select.agencies_id = response.data.data.agency;
            this.data_select.type_of_cooperation_one_derivative_id = response.data.data.typeof_one;
        });
    },
    computed: {
        plainValue() {
            let val = 0;
            if (this.forms.nominal) {
                val = parseInt(this.forms.nominal.replace(/\./g, ''));
                return val;
            }
            return null;
        },
    },
    watch: {
        "forms.nominal": function(newValue) {
            let result = newValue;
            if (newValue) {
                result = newValue.toString()
                .replace(/\D/g, '')
                .replace(/^[0]/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
            this.forms.nominal = result;
            this.$emit('input', this.plainValue);
        }
    },
    methods: {
        deputiDirect(indexVal, id) {
            let index = this.forms.deputi.filter(a => a === id);
            if(index.length == 1) {
                this.forms.deputi.splice(indexVal, 1);
            } else {
                this.forms.deputi.push(id);
            }
        },
        store() {
            let formData = new FormData();
            this.$v.forms.$touch();
            if(this.$v.forms.$invalid) {
                return;
            } else {
                formData.append('type_id', this.forms.type_id);
                $.each(this.forms.deputi, function(index, value) {
                    formData.append(`deputi[${index}]`, value);
                });
                formData.append('title_cooperation', this.forms.title_cooperation);
                formData.append('type_of_cooperation_id', this.forms.type_of_cooperation_id);
                formData.append('type_of_cooperation_one_derivative_id', this.forms.type_of_cooperation_one_derivative_id);
                formData.append('type_of_cooperation_two_derivative_id', this.forms.type_of_cooperation_two_derivative_id);
                formData.append('agencies_id', this.forms.agencies_id);
                formData.append('country_id', this.forms.country_id);
                formData.append('province_id', this.forms.province_id);
                formData.append('regency_id', this.forms.regency_id);
                formData.append('postal_code', this.forms.postal_code);
                formData.append('agency_name', this.forms.agency_name);
                formData.append('address', this.forms.address);
                formData.append('latitude', this.forms.latitude);
                formData.append('longitude', this.forms.longitude);
                formData.append('nominal', this.forms.nominal);
                formData.append('purpose_objectives', this.forms.purpose_objectives);
                formData.append('background', this.forms.background);
                formData.append('time_period', this.forms.time_period);
                formData.append('agency_profile', this.forms.agency_profile)
                formData.append('proposal', this.forms.proposal)

                $axiosFormData.post(`/admin/submission/cooperation`, formData)
                .then(response => {
                    this.$store.commit('proposal/updateData', response);
                    this.$store.commit('proposal/notification', response);

                    if(this.forms.type_id == 1) {
                        this.$router.push({
                            path: '/pks/submission/cooperation'
                        });
                    } else {
                        this.$router.push({
                            path: '/mou/submission/cooperation'
                        });
                    }
                })

                this.$v.$reset();
            }
        },
        setPlace(place) {
            this.place = place;
            this.forms.agency_name = place.name;
            this.forms.latitude = place.geometry.location.lat();
            this.forms.longitude = place.geometry.location.lng();
            this.forms.address = place.formatted_address;

            this.centerMaps = {
                lat: place.geometry.location.lat(),
                lng: place.geometry.location.lng()
            }
        },
        validate() {
            const regex = new RegExp(/\D/g);
            const value = this.forms.nominal.toString().replace(/\./g, '');

            if (!regex.test(value)) {
                this.message = '';
            } else {
                console.log('Hanya Dapat di Isi Oleh Angka');
            }
        },
        getRegencies() {
            $axios.get(`/admin/submission/get/regencies/${this.forms.province_id}`)
            .then(response => {
                this.data_select.regency_id = response.data.data;
            })
        },
        fileProfileInstansi() {
            const files = this.$refs.fileInstansi.files[0];
            const ext = files.name.split('.').pop();

            if(ext=="pdf" || ext=="docx" || ext=="doc"){
                this.forms.agency_profile = files;
            } else{
                alert('File Tidak Mendukung')
                document.getElementById("fileInstansi").value = "";
            }
        },
        fileProposal() {
            const files = this.$refs.fileProposal.files[0];
            const ext = files.name.split('.').pop();

            if(ext == "pdf" || ext == "jpg" || ext == "mp4" || ext == "jpeg"){
                this.forms.proposal = files;
            } else{
                alert('File Tidak Mendukung')
                document.getElementById("fileProposal").value = "";
            }
        },
        updateCoordinates(event) {
            this.forms.latitude = event.latLng.lat();
            this.forms.longitude = event.latLng.lng();
        },
        onChangeTypeOfCooperationTwoDerivative() {

            if(this.forms.type_of_cooperation_one_derivative_id == 1) {
                $axios.get(`/admin/submission/cooperation/two/${this.forms.type_of_cooperation_one_derivative_id}/derivative`)
                .then(response => {
                    this.data_select.type_of_cooperation_two_derivative_id = response.data.data.data;
                    this.data_select.country_id = response.data.data.country;
                    this.isIndonesian = false;
                });
            } else {
                this.isNominal = false;
                $axios.get(`/admin/submission/cooperation/two/${this.forms.type_of_cooperation_one_derivative_id}/derivative`)
                .then(response => {
                    this.data_select.type_of_cooperation_two_derivative_id = response.data.data.data;
                    this.data_select.country_id = response.data.data.country;
                    this.data_select.province_id = response.data.data.province;
                    this.isIndonesian = true;
                });
            }
        }
    }
}
</script>

<style scoped>
    .vue-map-container {
        width: 100%;
        height:100%;
    }
    .vue-map-container .vue-map {
        width: 100%;
        height:100%;
        position: relative;
    }
</style>

