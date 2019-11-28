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
                                    Pengajuan Ditolak
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger" style="padding-bottom:30px;">
                                    3201
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
                                    Total Pengajuan Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    12
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
                                    Pengajuan Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand">
                                    29
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
                                    Pengajuan Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-primary">
                                    29
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
                                    Pengajuan Ditolak
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger" style="padding-bottom:30px;">
                                    3201
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
                                    Total Pengajuan Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
                                    12
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
                                    Pengajuan Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand">
                                    29
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
                                    Pengajuan Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-primary">
                                    29
                                </span>
                            </div>
                        </div>

                        <!--end::New Users-->
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Monitoring Evaluasi Keseluruhan Berdasarkan Status
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsMonev"
                                    v-model="chartData.oldMonev.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" class="btn btn-brand" @click="filterMonev">{{ chartData.oldMonev.textButton }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.oldMonev.all"
                            :options="options"
                        />
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-12 col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Pengajuan Kerjasama Terdahulu Keseluruhan Berdasarkan Status
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsSubmissionProposalOld"
                                    v-model="chartData.submissionProposalOld.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" class="btn btn-brand">{{ chartData.submissionProposalOld.textButton }}</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.submissionProposalOld.all"
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
                                    MOU/PKS Deputi Bidang Perlindungan Anak
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-deputi-2" height="50"></canvas>
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
                                    MOU/PKS Deputi Bidang Perlindungan Hak Perempuan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-deputi-3" height="50"></canvas>
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
                                    MOU/PKS Deputi Bidang Tumbuh Kembang Anak
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-deputi-4" height="50"></canvas>
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
                                    MOU/PKS Deputi Bidang Partisipasi Masyarakat
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-deputi-5" height="50"></canvas>
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
                                    MOU/PKS Deputi Bidang Sesmen
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-deputi-6" height="50"></canvas>
                    </div>
                </div>
                <!--End::Portlet-->
            </div>
            <div class="col-xl-12 col-lg-12 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Statistik Data Instansi Pertahun
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-instansi-pertahun" height="50"></canvas>
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
            options: null,
            chartData: {
                oldMonev: {
                    all: null,
                    valid: null,
                    not_valid: null,
                    years: [],
                    labels: null,
                    data:[],
                    selectedYear: null,
                    yearsText: [],
                    textButton: 'Filter'
                },
                submissionProposalOld: {
                    all: null,
                    valid: null,
                    years: [],
                    labels: null,
                    data: [],
                    selectedYear: null,
                    yearsText: [],
                    textButton: 'Filter'
                }
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
        yearsMonev() {
            return this.chartData.oldMonev.years;
        },
        yearsSubmissionProposalOld() {
            return this.chartData.submissionProposalOld.years;
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
        getData() {
            $axios.get(`/admin/dashboard`)
            .then(response => {
                //monev all
                this.chartData.oldMonev.data = response.data.data.old_monev_all;
                this.chartData.submissionProposalOld.data = response.data.data.submission_proposal_old;

                let objectYearMonev = this.chartData.oldMonev.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                let objectSubmissionProposalOld = this.chartData.submissionProposalOld.data.map(value => {
                    return {
                        id: value.year,
                        text: value.year
                    };
                })


                this.chartData.oldMonev.years = objectYearMonev;
                this.chartData.oldMonev.yearsText = this.chartData.oldMonev.data.map(map => map.year.toString());
                this.chartData.oldMonev.valid = this.chartData.oldMonev.data.map(map => map.status_valid);
                this.chartData.oldMonev.not_valid = this.chartData.oldMonev.data.map(map => map.status_not_valid);

                this.chartData.submissionProposalOld.years = objectSubmissionProposalOld;
                this.chartData.submissionProposalOld.yearsText = this.chartData.submissionProposalOld.data.map(map => map.year);
                this.chartData.submissionProposalOld.valid = this.chartData.submissionProposalOld.data.map(map => map.status_valid);

                this.chartData.oldMonev.all = {
                    labels: this.chartData.oldMonev.yearsText,
                    datasets: [
                        {
                            label: `Tidak Berlaku`,
                            backgroundColor: '#f87979',
                            data: this.chartData.oldMonev.valid
                        },
                        {
                            label: 'Masih Berlaku',
                            backgroundColor: '#716aca',
                            data: this.chartData.oldMonev.not_valid
                        }
                    ]
                };

                this.chartData.submissionProposalOld.all = {
                    labels: this.chartData.submissionProposalOld.yearsText,
                    datasets: [
                        {
                            label: `Selesai`,
                            backgroundColor: '#f87979',
                            data: this.chartData.submissionProposalOld.valid
                        },
                    ]
                };

            })
        },
        filterMonev() {
            $axios.get(`/admin/old/monev/filter/${this.chartData.oldMonev.selectedYear}`)
            .then(response => {
                 //monev all
                this.chartData.oldMonev.data = response.data.data.old_monev_all;
                this.chartData.oldMonev.yearsText = this.chartData.oldMonev.data.map(map => map.year.toString());
                this.chartData.oldMonev.valid = this.chartData.oldMonev.data.map(map => map.status_valid);
                this.chartData.oldMonev.not_valid = this.chartData.oldMonev.data.map(map => map.status_not_valid);

                this.chartData.oldMonev.all = {
                    labels: this.chartData.oldMonev.yearsText,
                    datasets: [
                        {
                            label: `Tidak Berlaku`,
                            backgroundColor: '#f87979',
                            data: this.chartData.oldMonev.valid
                        },
                        {
                            label: 'Masih Berlaku',
                            backgroundColor: '#716aca',
                            data: this.chartData.oldMonev.not_valid
                        }
                    ]
                };
            })
        }
    }
}
</script>

<style>

</style>
