<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Rangkuman Monitoring Evaluasi {{ title_cooperation }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#m_tabs_2_1">Rangkuman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#m_tabs_2_2">Kegiatan</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_2_1" role="tabpanel">
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Judul Kerjasama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="title_cooperation">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Permohonan Kerjasama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="type_of_cooperation">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Jenis Kerjasama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="type_of_cooperation_one">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Kesepahaman Jenis Kerjasama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="type_of_cooperation_two">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Negara:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="country">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Provinsi:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="province">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Kabupaten / Kota:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="regency">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Kategori Instansi:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="agency_category">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Nama Instansi:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="agency_name" type="text">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Alamat Instansi:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="agency_address"></textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Latar Belakang:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="background"></textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Maksud & Tujuan:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="purpose_objectives"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_2_2" role="tabpanel">
                        <div v-for="(value, index) in activity" :key="value.id">
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                        <i class="la la-list"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            Kegiatan Ke - {{ index+1 }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body no-pedding">
                                <div class="list-section">
                                    <div class="m-portlet__body">
                                        <div class="kt-section__content">
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Anggaran:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="value.budget|currency" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Target:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="value.target" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Capaian:</label>
                                                <div class="col-10">
                                                    <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" :value="value.reach"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Masalah:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="value.problem" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Upaya Penyelesaian:</label>
                                                <div class="col-10">
                                                    <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" :value="value.problem_solving"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Evaluasi:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="evaluation(index)" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Rekomendasi:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="recomendation(index)" type="text">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__head">
                                <div class="m-portlet__head-caption">
                                    <div class="m-portlet__head-title">
                                        <span class="m-portlet__head-icon">
                                        <i class="la la-list"></i>
                                        </span>
                                        <h3 class="m-portlet__head-text">
                                            Dokumentasi
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div class="m-portlet__body no-pedding">
                                <div class="list-section">
                                    <div class="m-portlet__body">
                                        <div class="row">
                                            <div v-for="item in value.documentation" :key="item.id" class="col-lg-4">
                                                <img :src="`/storage/activity_documentation/${item.file}`" height="100">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';

export default {
    name: 'DetailMonevGuest',
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
                    label: 'Detail Monitoring Evaluasi',
                    path: `/monev/detail/${this.$route.params.id}/guest`
                }
            ],
            title_cooperation: null,
            type_of_cooperation: null,
            type_of_cooperation_one: null,
            type_of_cooperation_two: null,
            country: null,
            province: null,
            regency: null,
            agency_category: null,
            agency_name: null,
            agency_address: null,
            purpose_objectives: null,
            background: null,
            latitude: null,
            longitude: null,
            deputi: null,
            activity: [],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/monev/detail/guest/${this.$route.params.id}`)
            .then(response => {
                this.title_cooperation = response.data.data.title_cooperation;
                this.type_of_cooperation = response.data.data.type_of_cooperation.name;
                this.type_of_cooperation_one = response.data.data.type_of_cooperation_one.name;
                this.type_of_cooperation_two = response.data.data.type_of_cooperation_two.name;
                this.country = response.data.data.country.country_name;
                this.province = response.data.data.province == null ? "Tidak Ada" : response.data.data.province.name;
                this.regency = response.data.data.regency == null ? "Tidak Ada" : response.data.data.regency.name;
                this.agency_category = response.data.data.agencies.name;
                this.agency_name = response.data.data.agency_name;
                this.agency_address = response.data.data.address;
                this.purpose_objectives = response.data.data.purpose_objectives;
                this.background = response.data.data.background;
                this.latitude = parseFloat(response.data.data.latitude);
                this.longitude = parseFloat(response.data.data.longitude);
                this.deputi = response.data.data.deputi;
                this.activity = response.data.data.monev_activity;
            })
        },
        evaluation(index) {
            const evaluation = this.activity[index].result.evaluation;

            if(evaluation == 1)
            {
                return  "Sangat Tidak Memuaskan";
            } else if(evaluation == 2) {
                return  "Tidak Memuaskan";
            } else if (evaluation == 3) {
                return  "Sesuai Standar";
            } else if (evaluation == 4) {
                return  "Memuaskan";
            } else {
                return  "Sangat Memuaskan";
            }
        },
        recomendation(index) {
            const recomendation = this.activity[index].result.recomendation;

            if(recomendation == 1)
            {
                return "Diadendum";
            } else if(recomendation == 2) {
                return "Dihentikan";
            } else {
                return "Dilanjutkan";
            }
        },
    }
}
</script>

<style>

</style>
