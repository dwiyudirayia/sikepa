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
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                Opsi
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item context-menu">
                                                    <a class="m-nav__link" @click="modalEditDeputiPIC">
                                                        <i class="m-nav__link-icon la la-users"></i>
                                                        <span class="m-nav__link-text">Deputi Tertuju</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
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
                            <label for="example-text-input" class="col-2 col-form-label">Judul MOU:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="title_cooperation">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Jenis Kerjsama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="type_of_cooperation_one">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Jenis Permohonan:</label>
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
                        <!-- <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Maksud & Tujuan:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="purpose_objectives"></textarea>
                            </div>
                        </div> -->
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
                                                <label for="example-text-input" class="col-2 col-form-label">Judul Kegiatan:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="value.title_activity" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Tanggal Kegiatan:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="value.implementation_date" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group m-form__group row">
                                                <label for="example-text-input" class="col-2 col-form-label">Lokasi:</label>
                                                <div class="col-10">
                                                    <input class="form-control m-input" disabled="disabled" :value="value.location" type="text">
                                                </div>
                                            </div>
                                            <!-- <div class="form-group m-form__group row">
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
                                            </div> -->
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
                                                <img :src="`/storage/activity_documentation_adendum/${item.file}`" height="100">
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
        <div class="modal fade" id="deputi-target" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Deputi Tertuju</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-table m-table--head-bg-brand">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama Deputi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="deputi.length">
                                    <tr v-for="(value, index) in deputi" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.role.name }}</td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="9" class="text-center">Data Kosong</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';

export default {
    name: 'AdendumDetailMonevSatker',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Monev',
                    path: '/monev/adendum'
                },
                {
                    id: 2,
                    label: 'Detail Monitoring Evaluasi',
                    path: `/monev/adendum/detail/${this.$route.params.id}/satker`
                }
            ],
            title_cooperation: null,
            type_of_cooperation_one: null,
            type_of_cooperation_two: null,
            country: null,
            province: null,
            regency: null,
            agency_category: null,
            agency_name: null,
            agency_address: null,
            // purpose_objectives: null,
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
        modalEditDeputiPIC() {
            $('#deputi-target').modal('show');
        },
        getData() {
            $axios.get(`/admin/adendum/monev/detail/satker/${this.$route.params.id}`)
            .then(response => {
                this.title_cooperation = response.data.data.title_cooperation;
                this.type_of_cooperation_one = response.data.data.type_of_cooperation_one.name;
                this.type_of_cooperation_two = response.data.data.type_of_cooperation_two.name;
                this.country = response.data.data.country.country_name;
                this.province = response.data.data.province == null ? "Tidak Ada" : response.data.data.province.name;
                this.regency = response.data.data.regency == null ? "Tidak Ada" : response.data.data.regency.name;
                this.agency_category = response.data.data.agencies.name;
                this.agency_name = response.data.data.agency_name;
                this.agency_address = response.data.data.address;
                // this.purpose_objectives = response.data.data.purpose_objectives;
                this.background = response.data.data.background;
                this.latitude = parseFloat(response.data.data.latitude);
                this.longitude = parseFloat(response.data.data.longitude);
                this.deputi = response.data.data.deputi;
                this.activity = response.data.data.monev_activity;
            })
        },
    }
}
</script>

<style>

</style>
