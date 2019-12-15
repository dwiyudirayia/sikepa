<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="flaticon-statistics"></i>
                        </span>
                        <h2 class="m-portlet__head-label m-portlet__head-label--info">
                            <span>MOU</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-success" style="padding-bottom:30px;">
                                    {{ widget.mou.approve }}
                                </span>
                            </div>
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Ditolak
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger">
                                    {{ widget.mou.reject }}
                                </span>
                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand">
                                    {{ widget.mou.process }}
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__stats m--font-primary">
                                    {{ widget.mou.total }}
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
         <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="flaticon-statistics"></i>
                        </span>
                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                            <span>PKS</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-success" style="padding-bottom:30px;">
                                    {{ widget.pks.approve }}
                                </span>
                            </div>
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Ditolak
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger">
                                    {{ widget.pks.reject }}
                                </span>
                            </div>
                        </div>
                        <!--end::New Orders-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand">
                                    {{ widget.pks.process }}
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Users-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__stats m--font-primary">
                                    {{ widget.pks.total }}
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Partisipasi Masyarakat PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPartisipasiMasyarakatPKS"
                                    v-model="chartData.deputiPartisipasiMasyarakat.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPartisipasiMasyarakatPKS" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPartisipasiMasyarakat.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Partisipasi Masyarakat MOU
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPartisipasiMasyarakatMOU"
                                    v-model="chartData.deputiPartisipasiMasyarakat.mou.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPartisipasiMasyarakatMOU" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiPartisipasiMasyarakat.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Kesetaraan Gender PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsKesetaraanGenderPKS"
                                    v-model="chartData.deputiKesetaraanGender.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterKesetaraanGenderPKS" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiKesetaraanGender.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Kesetaraan Gender MOU
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsKesetaraanGenderMOU"
                                    v-model="chartData.deputiKesetaraanGender.mou.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterKesetaraanGenderMOU" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiKesetaraanGender.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Anak PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganAnakPKS"
                                    v-model="chartData.deputiPerlindunganAnak.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganAnakPKS" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPerlindunganAnak.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Anak MOU
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganAnakMOU"
                                    v-model="chartData.deputiPerlindunganAnak.mou.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganAnakMOU" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiPerlindunganAnak.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Hak Perempuan PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganHakPerempuanPKS"
                                    v-model="chartData.deputiPerlindunganHakPerempuan.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganHakPerempuanPKS" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPerlindunganHakPerempuan.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Anak MOU
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganHakPerempuanMOU"
                                    v-model="chartData.deputiPerlindunganHakPerempuan.mou.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganHakPerempuanMOU" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiPerlindunganHakPerempuan.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Tumbuh Kembang Anak PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsTumbuhKembangAnakPKS"
                                    v-model="chartData.deputiTumbuhKembangAnak.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganTumbuhKembangAnakPKS" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiTumbuhKembangAnak.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Tumbuh Kembang Anak MOU
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsTumbuhKembangAnakMOU"
                                    v-model="chartData.deputiTumbuhKembangAnak.mou.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganTumbuhKembangAnakMOU" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiTumbuhKembangAnak.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
        </div>
    </div>
</template>

<script>
import BarChart from '@/components/Chart/BarChart.vue';
import LineChart from '@/components/Chart/LineChart.vue';
import Select2 from '@/components/Chart/Select2.vue';
import axios from 'axios';
import $axios from '@/api.js';

export default {
    name: "DashboardIndex",
    components: {
        BarChart,
        LineChart,
        Select2
    },
    data() {
        return {
            widget: {
                mou: {
                    approve: null,
                    reject: null,
                    process: null,
                    total: null,
                },
                pks: {
                    approve: null,
                    reject: null,
                    process: null,
                    total: null,
                },
            },
            options: null,
            chartData: {
                deputiKesetaraanGender: {
                    pks: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiPartisipasiMasyarakat: {
                    pks: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiPerlindunganAnak: {
                    pks: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiPerlindunganHakPerempuan: {
                    pks: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiTumbuhKembangAnak: {
                    pks: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
            },
            breadcrumbTitle: 'Dashboard',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Dashboard',
                    path: '/dashboard'
                },
            ],
        }
    },
    computed: {
        yearsKesetaraanGenderPKS() {
            return this.chartData.deputiKesetaraanGender.pks.years;
        },
        yearsKesetaraanGenderMOU() {
            return this.chartData.deputiKesetaraanGender.mou.years;
        },
        yearsPartisipasiMasyarakatPKS() {
            return this.chartData.deputiPartisipasiMasyarakat.pks.years;
        },
        yearsPartisipasiMasyarakatMOU() {
            return this.chartData.deputiPartisipasiMasyarakat.mou.years;
        },
        yearsPerlindunganAnakPKS() {
            return this.chartData.deputiPerlindunganAnak.pks.years;
        },
        yearsPerlindunganAnakMOU() {
            return this.chartData.deputiPerlindunganAnak.mou.years;
        },
        yearsPerlindunganHakPerempuanPKS() {
            return this.chartData.deputiPerlindunganHakPerempuan.pks.years;
        },
        yearsPerlindunganHakPerempuanMOU() {
            return this.chartData.deputiPerlindunganHakPerempuan.mou.years;
        },
        yearsTumbuhKembangAnakPKS() {
            return this.chartData.deputiTumbuhKembangAnak.pks.years;
        },
        yearsTumbuhKembangAnakMOU() {
            return this.chartData.deputiTumbuhKembangAnak.mou.years;
        },
    },
    mounted() {
        this.getData();
        this.options = {
            responsive: true,

            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    ticks: {
                        stepSize: 1
                    }
                }]
            },
        }
    },
    methods: {
        filterKesetaraanGenderPKS() {
            $axios.get(`/admin/filter/kesetaraan/gender/pks/${this.chartData.deputiKesetaraanGender.pks.selectedYear}`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.pks.data = response.data.data;

                let objectDeputiKesetaraanGenderPKS = this.chartData.deputiKesetaraanGender.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiKesetaraanGender.pks.years = objectDeputiKesetaraanGenderPKS;
                this.chartData.deputiKesetaraanGender.pks.yearsText = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.pks.value = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.pks.all = {
                    labels: this.chartData.deputiKesetaraanGender.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.pks.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterKesetaraanGenderMOU() {
            $axios.get(`/admin/filter/kesetaraan/gender/mou/${this.chartData.deputiKesetaraanGender.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.mou.data = response.data.data;

                let objectDeputiKesetaraanGenderMOU = this.chartData.deputiKesetaraanGender.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiKesetaraanGender.mou.years = objectDeputiKesetaraanGenderMOU;
                this.chartData.deputiKesetaraanGender.mou.yearsText = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.mou.value = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.mou.all = {
                    labels: this.chartData.deputiKesetaraanGender.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.mou.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPartisipasiMasyarakatPKS() {
            $axios.get(`/admin/filter/partisipasi/masyarakat/pks/${this.chartData.deputiPartisipasiMasyarakat.pks.selectedYear}`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.pks.data = response.data.data;

                let objectDeputiPartisipasiMasyarakatPKS = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPartisipasiMasyarakat.pks.years = objectDeputiPartisipasiMasyarakatPKS;
                this.chartData.deputiPartisipasiMasyarakat.pks.yearsText = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.pks.value = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.pks.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.pks.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPartisipasiMasyarakatMOU() {
            $axios.get(`/admin/filter/partisipasi/masyarakat/mou/${this.chartData.deputiPartisipasiMasyarakat.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.mou.data = response.data.data;

                let objectDeputiPartisipasiMasyarakatMOU = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPartisipasiMasyarakat.mou.years = objectDeputiPartisipasiMasyarakatMOU;
                this.chartData.deputiPartisipasiMasyarakat.mou.yearsText = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.mou.value = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.mou.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.mou.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganAnakPKS() {
            $axios.get(`/admin/filter/perlindungan/anak/pks/${this.chartData.deputiPerlindunganAnak.pks.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.pks.data = response.data.data;

                let objectDeputiPerlindunganAnakPKS = this.chartData.deputiPerlindunganAnak.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganAnak.pks.years = objectDeputiPerlindunganAnakPKS;
                this.chartData.deputiPerlindunganAnak.pks.yearsText = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.pks.value = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.pks.all = {
                    labels: this.chartData.deputiPerlindunganAnak.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.pks.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganAnakMOU() {
            $axios.get(`/admin/filter/perlindungan/anak/mou/${this.chartData.deputiPerlindunganAnak.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.mou.data = response.data.data;

                let objectDeputiPerlindunganAnakMOU = this.chartData.deputiPerlindunganAnak.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganAnak.mou.years = objectDeputiPerlindunganAnakMOU;
                this.chartData.deputiPerlindunganAnak.mou.yearsText = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.mou.value = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.mou.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganHakPerempuanPKS() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/pks/pks/${this.chartData.deputiPerlindunganHakPerempuan.pks.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.pks.data = response.data.data;

                let objectDeputiPerlindunganHakPerempuanPKS = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganHakPerempuan.pks.years = objectDeputiPerlindunganHakPerempuanPKS;
                this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.pks.value = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.pks.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.pks.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganHakPerempuanMOU() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/pks/mou/${this.chartData.deputiPerlindunganHakPerempuan.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.mou.data = response.data.data;

                let objectDeputiPerlindunganHakPerempuanMOU = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganHakPerempuan.mou.years = objectDeputiPerlindunganHakPerempuanMOU;
                this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.mou.value = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.mou.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.mou.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganTumbuhKembangAnakPKS() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/pks/pks/${this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data = response.data.data;

                let objectDeputiPerlindunganTumbuhKembangAnakPKS = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.years = objectDeputiPerlindunganTumbuhKembangAnakPKS;
                this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganTumbuhKembangAnakMOU() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/pks/mou/${this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data = response.data.data;

                let objectDeputiPerlindunganTumbuhKembangAnakMOU = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.years = objectDeputiPerlindunganTumbuhKembangAnakMOU;
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        getData() {
            $axios.get(`/admin/dashboard`)
            .then(response => {
                //Kesetaraan Gender
                this.chartData.deputiKesetaraanGender.pks.data = response.data.data.deputi_kesetaraan_gender_pks;

                let objectDeputiKesetaraanGenderPKS = this.chartData.deputiKesetaraanGender.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiKesetaraanGender.pks.years = objectDeputiKesetaraanGenderPKS;
                this.chartData.deputiKesetaraanGender.pks.yearsText = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.pks.value = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.pks.all = {
                    labels: this.chartData.deputiKesetaraanGender.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.pks.value,
                        },
                    ]
                };

                this.chartData.deputiKesetaraanGender.mou.data = response.data.data.deputi_kesetaraan_gender_mou;

                let objectDeputiKesetaraanGenderMOU = this.chartData.deputiKesetaraanGender.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiKesetaraanGender.mou.years = objectDeputiKesetaraanGenderMOU;
                this.chartData.deputiKesetaraanGender.mou.yearsText = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.mou.value = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.mou.all = {
                    labels: this.chartData.deputiKesetaraanGender.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.mou.value,
                        },
                    ]
                };

                //Partisipasi Masyarakat
                this.chartData.deputiPartisipasiMasyarakat.pks.data = response.data.data.deputi_partisipasi_masyarakat_pks;

                let objectDeputiPartisipasideputiPartisipasiMasyarakatPKS = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPartisipasiMasyarakat.pks.years = objectDeputiPartisipasideputiPartisipasiMasyarakatPKS;
                this.chartData.deputiPartisipasiMasyarakat.pks.yearsText = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.pks.value = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.pks.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.pks.value,
                        },
                    ]
                };

                this.chartData.deputiPartisipasiMasyarakat.mou.data = response.data.data.deputi_partisipasi_masyarakat_mou;

                let objectDeputiPartisipasideputiPartisipasiMasyarakatMOU = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPartisipasiMasyarakat.mou.years = objectDeputiPartisipasideputiPartisipasiMasyarakatMOU;
                this.chartData.deputiPartisipasiMasyarakat.mou.yearsText = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.mou.value = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.mou.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.mou.value,
                        },
                    ]
                };

                //Perlindungan Anak
                this.chartData.deputiPerlindunganAnak.pks.data = response.data.data.deputi_perlindungan_anak_pks;

                let objectDeputiPartisipasideputiPerlindunganAnakPKS = this.chartData.deputiPerlindunganAnak.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganAnak.pks.years = objectDeputiPartisipasideputiPerlindunganAnakPKS;
                this.chartData.deputiPerlindunganAnak.pks.yearsText = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.pks.value = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.pks.all = {
                    labels: this.chartData.deputiPerlindunganAnak.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.pks.value,
                        },
                    ]
                };

                this.chartData.deputiPerlindunganAnak.mou.data = response.data.data.deputi_perlindungan_anak_mou;

                let objectDeputiPartisipasideputiPerlindunganAnakMOU = this.chartData.deputiPerlindunganAnak.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganAnak.mou.years = objectDeputiPartisipasideputiPerlindunganAnakMOU;
                this.chartData.deputiPerlindunganAnak.mou.yearsText = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.mou.value = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.mou.value,
                        },
                    ]
                };

                //Perlindungan Tumbuh Kembang Anak
                this.chartData.deputiPerlindunganHakPerempuan.pks.data = response.data.data.deputi_perlindungan_hak_perempuan_pks;

                let objectDeputiPartisipasideputiPerlindunganHakPerempuanPKS = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganHakPerempuan.pks.years = objectDeputiPartisipasideputiPerlindunganHakPerempuanPKS;
                this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.pks.value = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.pks.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.pks.value,
                        },
                    ]
                };

                this.chartData.deputiPerlindunganHakPerempuan.mou.data = response.data.data.deputi_perlindungan_hak_perempuan_mou;

                let objectDeputiPartisipasideputiPerlindunganHakPerempuanMOU = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganHakPerempuan.mou.years = objectDeputiPartisipasideputiPerlindunganHakPerempuanMOU;
                this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.mou.value = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.mou.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.mou.value,
                        },
                    ]
                };

                //Perlindungan Tumbuh Kembang Anak
                this.chartData.deputiTumbuhKembangAnak.pks.data = response.data.data.deputi_tumbuh_kembang_anak_pks;

                let objectdunganTumbuhKembangAnakPKS = this.chartData.deputiTumbuhKembangAnak.pks.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiTumbuhKembangAnak.pks.years = objectdunganTumbuhKembangAnakPKS;
                this.chartData.deputiTumbuhKembangAnak.pks.yearsText = this.chartData.deputiTumbuhKembangAnak.pks.data.map(map => map.year.toString());
                this.chartData.deputiTumbuhKembangAnak.pks.value = this.chartData.deputiTumbuhKembangAnak.pks.data.map(map => map.data);


                this.chartData.deputiTumbuhKembangAnak.pks.all = {
                    labels: this.chartData.deputiTumbuhKembangAnak.pks.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiTumbuhKembangAnak.pks.value,
                        },
                    ]
                };

                this.chartData.deputiTumbuhKembangAnak.mou.data = response.data.data.deputi_tumbuh_kembang_anak_mou;

                let objectdunganTumbuhKembangAnakMOU = this.chartData.deputiTumbuhKembangAnak.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiTumbuhKembangAnak.mou.years = objectdunganTumbuhKembangAnakMOU;
                this.chartData.deputiTumbuhKembangAnak.mou.yearsText = this.chartData.deputiTumbuhKembangAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiTumbuhKembangAnak.mou.value = this.chartData.deputiTumbuhKembangAnak.mou.data.map(map => map.data);


                this.chartData.deputiTumbuhKembangAnak.mou.all = {
                    labels: this.chartData.deputiTumbuhKembangAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `Berdasarkan Tahun`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiTumbuhKembangAnak.mou.value,
                        },
                    ]
                };

                //Widget
                const responseData = response.data.data;

                this.widget.mou.approve = responseData.mou_approve + responseData.mou_approve_guest;
                this.widget.mou.reject = responseData.mou_reject + responseData.mou_reject_guest;
                this.widget.mou.process = responseData.mou_process + responseData.mou_process_guest;
                this.widget.mou.total = responseData.mou_total + responseData.mou_total_guest;

                this.widget.pks.approve = responseData.pks_approve + responseData.pks_approve_guest;
                this.widget.pks.reject = responseData.pks_reject + responseData.pks_reject_guest;
                this.widget.pks.process = responseData.pks_process + responseData.pks_process_guest;
                this.widget.pks.total = responseData.pks_total + responseData.pks_total_guest;
            })
        },
    }
}
</script>

<style>

</style>

