<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__body  m-portlet__body--no-padding">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::Total Profit-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total Pengajuan
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand" style="padding-bottom:30px;">
                                    3201
                                </span>
                            </div>
                        </div>

                        <!--end::Total Profit-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Feedbacks-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total Pengajuan Baru
                                </h4><br>
                                <span class="m-widget24__stats m--font-info">
                                    5
                                </span>
                            </div>
                        </div>

                        <!--end::New Feedbacks-->
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <!--begin::New Orders-->
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total Pengajuan Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger">
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
                                    Total Pengajual Total
                                </h4><br>
                                <span class="m-widget24__stats m--font-success">
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
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <!--Begin::Portlet-->
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    MOU/PKS Deputi Bidang Kesetaraan Gender
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <canvas id="chart-data-deputi-1" height="50"></canvas>
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
import dataInstansiPertahun from './../../chart/data.instansi.pertahun';
import dataDeputi from './../../chart/data.deputi';
export default {
    name: "DashboardIndex",
    data() {
        return {
            breadcrumbTitle: 'Dashboard',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Dashboard',
                    path: '/dashboard'
                },
            ],
            data_instansi_pertahun: dataInstansiPertahun,
            data_deputi: dataDeputi
        }
    },
    methods: {
        createChart(chartId, chartData) {
            const ctx = document.getElementById(chartId);
            const myChart = new Chart(ctx, {
                type: chartData.type,
                data: chartData.data,
                options: chartData.options,
            });
        }
    },
    mounted() {
        this.createChart('chart-data-instansi-pertahun', this.data_instansi_pertahun);
        this.createChart('chart-data-deputi-1', this.data_instansi_pertahun);
        this.createChart('chart-data-deputi-2', this.data_instansi_pertahun);
        this.createChart('chart-data-deputi-3', this.data_instansi_pertahun);
        this.createChart('chart-data-deputi-4', this.data_instansi_pertahun);
        this.createChart('chart-data-deputi-5', this.data_instansi_pertahun);
        this.createChart('chart-data-deputi-6', this.data_instansi_pertahun);
    }
}
</script>

<style>

</style>
