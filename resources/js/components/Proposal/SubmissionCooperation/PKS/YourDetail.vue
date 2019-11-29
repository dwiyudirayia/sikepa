<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Detail Pengajuan Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="text-center">
                    <template v-for="(value, index) in sortTracking">
                        <template v-if="index + 1 < 15">
                            <button class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class" v-tooltip.top="value.label" />-
                        </template>
                        <template v-else>
                            <button class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class" v-tooltip.top="value.label" />
                        </template>
                    </template>
                </div>
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_9_1" role="tab"> Rangkuman</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_9_1" role="tabpanel">
                        <div class="form-group m-form__group">
                            <label>Judul Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="title_cooperation">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Pemohonan Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="type_of_cooperation">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Jenis Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="type_of_cooperation_one">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Kesepahaman Jenis Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="type_of_cooperation_two">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Negara</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="country">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Provinsi</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="province">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Kabupaten / Kota</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="regency">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Kategori Instansi</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="agency_category">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <gmap-map
                                        :center="{lat:+latitude, lng:+longitude}"
                                        :zoom="5"
                                        style="width:100%;  height: 300px;"
                                    >
                                        <GmapMarker
                                            ref="myMarker"
                                            :position="google && new google.maps.LatLng(latitude, longitude)"
                                        />
                                    </gmap-map>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <label>Nama Instansi</label>
                                    <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="agency_name">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Alamat Instansi</label>
                                    <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="agency_address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label>Latar Belakang</label>
                            <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="background"></textarea>
                        </div>
                        <div class="form-group m-form__group">
                            <label>Maksud & Tujuan</label>
                            <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="purpose_objectives"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $axios from '@/api.js';
import {gmapApi} from 'vue2-google-maps';
export default {
    name: "MOUProposalSubmissionCooperationYourDetail",
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/pks/submission/cooperation'
                },
                {
                    id: 2,
                    label: 'Detail Pengajuan Kerjasama',
                    path: `/pks/submission/cooperation/${this.$route.params.id}/detail`
                },
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
            status_disposition: null,
            tracking: [],
            status_barcode: null,
        }
    },
    computed: {
        google: gmapApi,
        sortTracking: function() {
            const data = this.tracking;

            const value = Object.values(data).splice(2,15);
            const label = ['Deputi Bidang Partisipasi Masyarakat','Deputi Bidang Kesetaraan Gender','Deputi Bidang Perlindungan Anak','Deputi Bidang Perlindungan Hak Perempuan','Deputi Bidang Tumbuh Kembang Anak','Satker Sesmen','Biro Perencanaan dan Data','Bagian Kerja Sama','Bagian Ortala','Sesmen','Menteri','Hukum','Sesmen Final','Menteri Final','Bagian Kerja Sama Final'];

            let finalData = value.map((value, index) => {
                return {
                    id: index+1,
                    label: label[index],
                    value: value,
                    class: value == 0 ? 'btn-danger' : value == 1 ? 'btn-success' : 'btn-metal'
                }
            });

            return finalData;
        },
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/submission/cooperation/${this.$route.params.id}/detail`)
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
                this.tracking = response.data.data.tracking;
                this.status_disposition = response.data.data.status_disposition;
                this.status_barcode = response.data.data.status_barcode;
            });
        },
    }
}
</script>

<style>

</style>
