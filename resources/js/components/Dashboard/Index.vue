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
                            <span>{{ mouLabel }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
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
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

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
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

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

                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

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
                            <span>{{ adendumLabel }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-success" style="padding-bottom:30px;">
                                    {{ widget.adendum.approve }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Ditolak
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger">
                                    {{ widget.adendum.reject }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand">
                                    {{ widget.adendum.process }}
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__stats m--font-primary">
                                    {{ widget.adendum.total }}
                                </span>
                            </div>
                        </div>

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
                        <h2 class="m-portlet__head-label m-portlet__head-label--brand">
                            <span>{{ perpanjanganLabel }}</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <div class="row m-row--no-padding m-row--col-separator-xl">
                    <div class="col-md-12 col-lg-6 col-xl-3">
                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diterima
                                </h4><br>
                                <span class="m-widget24__stats m--font-success" style="padding-bottom:30px;">
                                    {{ widget.extension.approve }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Ditolak
                                </h4><br>
                                <span class="m-widget24__stats m--font-danger">
                                    {{ widget.extension.reject }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Diproses
                                </h4><br>
                                <span class="m-widget24__stats m--font-brand">
                                    {{ widget.extension.process }}
                                </span>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

                        <div class="m-widget24">
                            <div class="m-widget24__item">
                                <h4 class="m-widget24__title">
                                    Total
                                </h4><br>
                                <span class="m-widget24__stats m--font-primary">
                                    {{ widget.extension.total }}
                                </span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="m-portlet m-portlet--creative m-portlet--first m-portlet--bordered-semi">
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

                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

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
                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

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

                    </div>
                    <div class="col-md-12 col-lg-6 col-xl-3">

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

                    </div>
                </div>
            </div>
        </div> -->
        <div class="row">
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Partisipasi Masyarakat')">
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
                                        <button type="button" @click="resetPartisipasiMasyarakatPKS" class="btn btn-secondary">Reset</button>
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
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Partisipasi Masyarakat')">
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
                                        <button type="button" @click="resetPartisipasiMasyarakatMOU" class="btn btn-secondary">Reset</button>
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
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Partisipasi Masyarakat')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Partisipasi Masyarakat Adendum
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPartisipasiMasyarakatAdendum"
                                    v-model="chartData.deputiPartisipasiMasyarakat.adendum.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPartisipasiMasyarakatAdendum" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetPartisipasiMasyarakatAdendum" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPartisipasiMasyarakat.adendum.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Partisipasi Masyarakat')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Partisipasi Masyarakat Perpanjangan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPartisipasiMasyarakatExtension"
                                    v-model="chartData.deputiPartisipasiMasyarakat.extension.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPartisipasiMasyarakatExtension" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetPartisipasiMasyarakatExtension" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiPartisipasiMasyarakat.extension.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Kesetaraan Gender')">
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
                                        <button type="button" @click="resetKesetaraanGenderPKS" class="btn btn-secondary">Reset</button>
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
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Kesetaraan Gender')">
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
                                        <button type="button" @click="resetKesetaraanGenderMOU" class="btn btn-secondary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiKesetaraanGender.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Kesetaraan Gender')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Kesetaraan Gender Adendum
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsKesetaraanGenderAdendum"
                                    v-model="chartData.deputiKesetaraanGender.adendum.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterKesetaraanGenderAdendum" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetKesetaraanGenderAdendum" class="btn btn-secondary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiKesetaraanGender.adendum.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Kesetaraan Gender')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Kesetaraan Gender Perpanjangan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsKesetaraanGenderExtension"
                                    v-model="chartData.deputiKesetaraanGender.extension.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterKesetaraanGenderExtension" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetKesetaraanGenderExtension" class="btn btn-secondary">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiKesetaraanGender.extension.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Anak')">
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
                                        <button type="button" @click="resetPerlindunganAnakPKS" class="btn btn-secondary">Reset</button>
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
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Anak')">
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
                                        <button type="button" @click="resetPerlindunganAnakMOU" class="btn btn-secondary">Reset</button>
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
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Anak')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Anak Adendum
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganAnakAdendum"
                                    v-model="chartData.deputiPerlindunganAnak.adendum.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganAnakAdendum" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetPerlindunganAnakAdendum" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPerlindunganAnak.adendum.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Anak')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Anak Perpanjangan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganAnakExtension"
                                    v-model="chartData.deputiPerlindunganAnak.extension.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganAnakExtension" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetPerlindunganAnakExtension" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiPerlindunganAnak.extension.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Hak Perempuan')">
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
                                        <button type="button" @click="resetPerlindunganHakPerempuanPKS" class="btn btn-secondary">Reset</button>
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
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Hak Perempuan')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Hak Perempuan MOU
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
                                        <button type="button" @click="resetPerlindunganHakPerempuanMOU" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPerlindunganHakPerempuan.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Hak Perempuan')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Hak Perempuan Adendum
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganHakPerempuanAdendum"
                                    v-model="chartData.deputiPerlindunganHakPerempuan.adendum.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganHakPerempuanAdendum" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetPerlindunganHakPerempuanAdendum" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiPerlindunganHakPerempuan.adendum.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Perlindungan Hak Perempuan')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Perlindungan Hak Perempuan Perpanjangan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsPerlindunganHakPerempuanExtension"
                                    v-model="chartData.deputiPerlindunganHakPerempuan.extension.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganHakPerempuanExtension" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetPerlindunganHakPerempuanExtension" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiPerlindunganHakPerempuan.extension.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Tumbuh Kembang Anak')">
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
                                        <button type="button" @click="resetPerlindunganTumbuhKembangAnakPKS" class="btn btn-secondary">Reset</button>
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
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Tumbuh Kembang Anak')">
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
                                        <button type="button" @click="resetPerlindunganTumbuhKembangAnakMOU" class="btn btn-secondary">Reset</button>
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
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Tumbuh Kembang Anak')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Tumbuh Kembang Anak Adendum
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsTumbuhKembangAnakAdendum"
                                    v-model="chartData.deputiTumbuhKembangAnak.adendum.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganTumbuhKembangAnakAdendum" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.deputiTumbuhKembangAnak.adendum.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Deputi Bidang Tumbuh Kembang Anak')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Deputi Bidang Tumbuh Kembang Anak Perpanjangan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsTumbuhKembangAnakExtension"
                                    v-model="chartData.deputiTumbuhKembangAnak.extension.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterPerlindunganTumbuhKembangAnakExtension" class="btn btn-brand">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.deputiTumbuhKembangAnak.extension.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Instansi PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsInstansiPKS"
                                    v-model="chartData.instansi.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterAgenciesPKS" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetAgenciesPKS" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.instansi.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Instansi')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Instansi
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsInstansiMOU"
                                    v-model="chartData.instansi.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterAgenciesMOU" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetAgenciesMOU" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.instansi.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <!-- <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Pengajuan Kerjasama PKS
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsSubmissionPKS"
                                    v-model="chartData.submission.pks.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterSubmissionPKS" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetSubmissionPKS" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.submission.pks.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div> -->
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Pengajuan Kerjasama')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Pengajuan Kerjasama MOU
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsSubmissionMOU"
                                    v-model="chartData.submission.mou.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterSubmissionMOU" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetSubmissionMOU" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.submission.mou.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Pengajuan Kerjasama')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Pengajuan Kerjasama Adendum
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsSubmissionAdendum"
                                    v-model="chartData.submission.adendum.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterSubmissionAdendum" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetSubmissionAdendum" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <line-chart
                            :chartData="chartData.submission.adendum.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-12 col-sm-12 col-md-12" v-if="$can('Chart Pengajuan Kerjasama')">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Pengajuan Kerjasama Perpanjangan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsSubmissionExtension"
                                    v-model="chartData.submission.extension.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterSubmissionExtension" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetSubmissionExtension" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.submission.extension.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-xs-6 col-sm-6 col-md-6">
                <div class="m-portlet  m-portlet--full-height ">
                    <div class="m-portlet__head">
                        <div class="m-portlet__head-caption">
                            <div class="m-portlet__head-title">
                                <h3 class="m-portlet__head-text">
                                    Survey Kepuasan
                                </h3>
                            </div>
                        </div>
                    </div>
                    <div class="m-portlet__body">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tahun</label>
                            <div class="m-form__control">
                                <Select2
                                    :options="yearsSurvey"
                                    v-model="chartData.survey.selectedYear"
                                    class="form-control"
                                />
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="filterSurvey" class="btn btn-brand">Filter</button>
                                        <button type="button" @click="resetSurvey" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <bar-chart
                            :chartData="chartData.survey.all"
                            :options="options"
                        />
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import BarChart from '@/components/Chart/BarChart.vue';
import LineChart from '@/components/Chart/LineChart.vue';
import PieChart from '@/components/Chart/PieChart.vue';
import Select2 from '@/components/Chart/Select2.vue';
import axios from 'axios';
import $axios from '@/api.js';

export default {
    name: "DashboardIndex",
    components: {
        BarChart,
        LineChart,
        PieChart,
        Select2
    },
    data() {
        return {
            mouLabel: null,
            perpanjanganLabel:  null,
            adendumLabel: null,
            widget: {
                mou: {
                    approve: null,
                    reject: null,
                    process: null,
                    total: null,
                },
                adendum: {
                    approve: null,
                    reject: null,
                    process: null,
                    total: null,
                },
                extension: {
                    approve: null,
                    reject: null,
                    process: null,
                    total: null,
                },
                // pks: {
                //     approve: null,
                //     reject: null,
                //     process: null,
                //     total: null,
                // },
            },
            options: null,
            chartData: {
                survey: {
                    all: null,
                    sangat_memuaskan: null,
                    memuaskan: null,
                    sesuai_standar: null,
                    tidak_memuaskan: null,
                    tidak_memuaskan: null,
                    sangat_tidak_memuaskan: null,
                    selectedYear: null,
                    data: [],
                    years: [],
                    value: [],
                    yearsText: [],
                },
                submission: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        yearsText: [],
                    },
                    adendum: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        yearsText: [],
                    },
                    extension: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        yearsText: [],
                    },
                },
                instansi: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    // mou: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    // adendum: {
                    //     data: [],
                    // },
                    // extension: {
                    //     data: [],
                    // },
                    all: null,
                    selectedYear: null,
                    data: [],
                    years: [],
                    value: [],
                    yearsText: [],
                },
                deputiKesetaraanGender: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    adendum: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    extension: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiPartisipasiMasyarakat: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    adendum: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    extension: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiPerlindunganAnak: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    adendum: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    extension: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiPerlindunganHakPerempuan: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    adendum: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    extension: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                },
                deputiTumbuhKembangAnak: {
                    // pks: {
                    //     all: null,
                    //     selectedYear: null,
                    //     data: [],
                    //     years: [],
                    //     value: [],
                    //     yearsText: [],
                    // },
                    mou: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    adendum: {
                        all: null,
                        selectedYear: null,
                        data: [],
                        years: [],
                        value: [],
                        yearsText: [],
                    },
                    extension: {
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
        yearsSurvey() {
            return this.chartData.survey.years;
        },
        // test() {
        //     const data = this.chartData.survey.data;
        //     let mapData = data.map((value, index) => {
        //         return {
        //             id: index+1,
        //             sangat_memuaskan: value.sangat_memuaskan,
        //         }
        //     })

        //     return mapData;
        // },
        // yearsSubmissionPKS() {
        //     return this.chartData.submission.pks.years;
        // },
        yearsSubmissionMOU() {
            return this.chartData.submission.mou.years;
        },
        yearsSubmissionAdendum() {
            return this.chartData.submission.adendum.years;
        },
        yearsSubmissionExtension() {
            return this.chartData.submission.extension.years;
        },
        yearsInstansiMOU() {
            return this.chartData.instansi.years;
        },
        // yearsInstansiPKS() {
        //     return this.chartData.instansi.pks.years;
        // },
        // yearsKesetaraanGenderPKS() {
        //     return this.chartData.deputiKesetaraanGender.pks.years;
        // },
        yearsKesetaraanGenderMOU() {
            return this.chartData.deputiKesetaraanGender.mou.years;
        },
        yearsKesetaraanGenderAdendum() {
            return this.chartData.deputiKesetaraanGender.adendum.years;
        },
        yearsKesetaraanGenderExtension() {
            return this.chartData.deputiKesetaraanGender.extension.years;
        },
        // yearsPartisipasiMasyarakatPKS() {
        //     return this.chartData.deputiPartisipasiMasyarakat.pks.years;
        // },
        yearsPartisipasiMasyarakatMOU() {
            return this.chartData.deputiPartisipasiMasyarakat.mou.years;
        },
        yearsPartisipasiMasyarakatAdendum() {
            return this.chartData.deputiPartisipasiMasyarakat.adendum.years;
        },
        yearsPartisipasiMasyarakatExtension() {
            return this.chartData.deputiPartisipasiMasyarakat.extension.years;
        },
        // yearsPerlindunganAnakPKS() {
        //     return this.chartData.deputiPerlindunganAnak.pks.years;
        // },
        yearsPerlindunganAnakMOU() {
            return this.chartData.deputiPerlindunganAnak.mou.years;
        },
        yearsPerlindunganAnakAdendum() {
            return this.chartData.deputiPerlindunganAnak.adendum.years;
        },
        yearsPerlindunganAnakExtension() {
            return this.chartData.deputiPerlindunganAnak.extension.years;
        },
        // yearsPerlindunganHakPerempuanPKS() {
        //     return this.chartData.deputiPerlindunganHakPerempuan.pks.years;
        // },
        yearsPerlindunganHakPerempuanMOU() {
            return this.chartData.deputiPerlindunganHakPerempuan.mou.years;
        },
        yearsPerlindunganHakPerempuanAdendum() {
            return this.chartData.deputiPerlindunganHakPerempuan.adendum.years;
        },
        yearsPerlindunganHakPerempuanExtension() {
            return this.chartData.deputiPerlindunganHakPerempuan.extension.years;
        },
        // yearsTumbuhKembangAnakPKS() {
        //     return this.chartData.deputiTumbuhKembangAnak.pks.years;
        // },
        yearsTumbuhKembangAnakMOU() {
            return this.chartData.deputiTumbuhKembangAnak.mou.years;
        },
        yearsTumbuhKembangAnakAdendum() {
            return this.chartData.deputiTumbuhKembangAnak.adendum.years;
        },
        yearsTumbuhKembangAnakExtension() {
            return this.chartData.deputiTumbuhKembangAnak.extension.years;
        },
    },
    mounted() {
        this.getData();
        this.options = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                yAxes: [{
                    stacked: true,
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true
                    },
                }],
                xAxes: [{
                    stacked: true,
                    ticks: {
                        stepSize: 1,
                        beginAtZero: true
                    },
                }]
            },
        }
    },
    methods: {
        filterSurvey() {
            $axios.get(`/admin/filter/survey/${this.chartData.survey.selectedYear}`)
            .then(response => {
                this.chartData.survey.data = response.data.data;

                this.chartData.survey.yearsText = this.chartData.survey.data.map(map => map.monthname.toString());
                this.chartData.survey.sangat_memuaskan = this.chartData.survey.data.map(map => map.sangat_memuaskan);
                this.chartData.survey.memuaskan = this.chartData.survey.data.map(map => map.memuaskan);
                this.chartData.survey.sesuai_standar = this.chartData.survey.data.map(map => map.sesuai_standar);
                this.chartData.survey.tidak_memuaskan = this.chartData.survey.data.map(map => map.tidak_memuaskan);
                this.chartData.survey.sangat_tidak_memuaskan = this.chartData.survey.data.map(map => map.sangat_tidak_memuaskan);
                this.chartData.survey.all = {
                    labels: this.chartData.survey.yearsText,
                    datasets: [
                        {
                            label: `Sangat Memuaskan`,
                            backgroundColor: '#34bfa3',
                            data: this.chartData.survey.sangat_memuaskan
                        },
                        {
                            label: 'Memuaskan',
                            backgroundColor: '#36a3f7',
                            data: this.chartData.survey.memuaskan
                        },
                        {
                            label: 'Sesuai Standar',
                            backgroundColor: '#716aca',
                            data: this.chartData.survey.sesuai_standar
                        },
                        {
                            label: 'Tidak Memuaskan',
                            backgroundColor: '#ffb822',
                            data: this.chartData.survey.tidak_memuaskan
                        },
                        {
                            label: 'Sangat Tidak Memuaskan',
                            backgroundColor: '#f4516c',
                            data: this.chartData.survey.sangat_tidak_memuaskan
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetSurvey() {
            $axios.get(`/admin/reset/survey`)
            .then(response => {
                this.chartData.survey.selectedYear = null;
                this.chartData.survey.data = response.data.data;

                this.chartData.survey.yearsText = this.chartData.survey.data.map(map => map.monthname.toString());
                this.chartData.survey.sangat_memuaskan = this.chartData.survey.data.map(map => map.sangat_memuaskan);
                this.chartData.survey.memuaskan = this.chartData.survey.data.map(map => map.memuaskan);
                this.chartData.survey.sesuai_standar = this.chartData.survey.data.map(map => map.sesuai_standar);
                this.chartData.survey.tidak_memuaskan = this.chartData.survey.data.map(map => map.tidak_memuaskan);
                this.chartData.survey.sangat_tidak_memuaskan = this.chartData.survey.data.map(map => map.sangat_tidak_memuaskan);
                this.chartData.survey.all = {
                    labels: this.chartData.survey.yearsText,
                    datasets: [
                        {
                            label: `Sangat Memuaskan`,
                            backgroundColor: '#34bfa3',
                            data: this.chartData.survey.sangat_memuaskan
                        },
                        {
                            label: 'Memuaskan',
                            backgroundColor: '#36a3f7',
                            data: this.chartData.survey.memuaskan
                        },
                        {
                            label: 'Sesuai Standar',
                            backgroundColor: '#716aca',
                            data: this.chartData.survey.sesuai_standar
                        },
                        {
                            label: 'Tidak Memuaskan',
                            backgroundColor: '#ffb822',
                            data: this.chartData.survey.tidak_memuaskan
                        },
                        {
                            label: 'Sangat Tidak Memuaskan',
                            backgroundColor: '#f4516c',
                            data: this.chartData.survey.sangat_tidak_memuaskan
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterSubmissionPKS() {
        //     $axios.get(`/admin/filter/submission/pks/${this.chartData.submission.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.submission.pks.data = response.data.data;

        //         this.chartData.submission.pks.yearsText = this.chartData.submission.pks.data.map(map => map.year.toString());
        //         this.chartData.submission.pks.value = this.chartData.submission.pks.data.map(map => map.data);


        //         this.chartData.submission.pks.all = {
        //             labels: this.chartData.submission.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.submission.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // resetSubmissionPKS() {
        //     $axios.get(`/admin/reset/submission/pks`)
        //     .then(response => {
        //         this.chartData.submission.pks.selectedYear = null;
        //         this.chartData.submission.pks.data = response.data.data;

        //         this.chartData.submission.pks.yearsText = this.chartData.submission.pks.data.map(map => map.year.toString());
        //         this.chartData.submission.pks.value = this.chartData.submission.pks.data.map(map => map.data);


        //         this.chartData.submission.pks.all = {
        //             labels: this.chartData.submission.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.submission.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        filterSubmissionMOU() {

            $axios.get(`/admin/filter/submission/mou/${this.chartData.submission.mou.selectedYear}`)
            .then(response => {
                console.log(response.data.data);
                this.chartData.submission.mou.data = response.data.data;

                const submissionMOU = this.chartData.submission.mou.data.map(value => {
                    return {
                        x: value.year,
                        y: value.data,
                    }
                });
                const submissionMOUYear = this.chartData.submission.mou.data.map(value => value.year);

                this.chartData.submission.mou.all = {
                    labels: submissionMOUYear,
                    datasets: [
                        {
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: submissionMOU,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetSubmissionMOU() {
            $axios.get(`/admin/reset/submission/mou`)
            .then(response => {
                this.chartData.submission.mou.selectedYear = null;
                this.chartData.submission.mou.data = response.data.data;

                this.chartData.submission.mou.yearsText = this.chartData.submission.mou.data.map(map => map.year.toString());
                this.chartData.submission.mou.value = this.chartData.submission.mou.data.map(map => map.data);


                this.chartData.submission.mou.all = {
                    labels: this.chartData.submission.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.submission.mou.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterSubmissionAdendum() {

            $axios.get(`/admin/filter/submission/adendum/${this.chartData.submission.adendum.selectedYear}`)
            .then(response => {
                console.log(response.data.data);
                this.chartData.submission.adendum.data = response.data.data;

                const submissionAdendum = this.chartData.submission.adendum.data.map(value => {
                    return {
                        x: value.year,
                        y: value.data,
                    }
                });
                const submissionAdendumYear = this.chartData.submission.adendum.data.map(value => value.year);

                this.chartData.submission.adendum.all = {
                    labels: submissionAdendumYear,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: submissionAdendum,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetSubmissionAdendum() {
            $axios.get(`/admin/reset/submission/adendum`)
            .then(response => {
                this.chartData.submission.adendum.selectedYear = null;
                this.chartData.submission.adendum.data = response.data.data;

                this.chartData.submission.adendum.yearsText = this.chartData.submission.adendum.data.map(map => map.year.toString());
                this.chartData.submission.adendum.value = this.chartData.submission.adendum.data.map(map => map.data);


                this.chartData.submission.adendum.all = {
                    labels: this.chartData.submission.adendum.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.submission.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterSubmissionExtension() {

            $axios.get(`/admin/filter/submission/extension/${this.chartData.submission.extension.selectedYear}`)
            .then(response => {
                console.log(response.data.data);
                this.chartData.submission.extension.data = response.data.data;

                const submissionExtension = this.chartData.submission.extension.data.map(value => {
                    return {
                        x: value.year,
                        y: value.data,
                    }
                });
                const submissionExtensionYear = this.chartData.submission.extension.data.map(value => value.year);

                this.chartData.submission.mou.all = {
                    labels: submissionExtensionYear,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: submissionExtension,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetSubmissionExtension() {
            $axios.get(`/admin/reset/submission/extension`)
            .then(response => {
                this.chartData.submission.extension.selectedYear = null;
                this.chartData.submission.extension.data = response.data.data;

                this.chartData.submission.extension.yearsText = this.chartData.submission.extension.data.map(map => map.year.toString());
                this.chartData.submission.extension.value = this.chartData.submission.extension.data.map(map => map.data);


                this.chartData.submission.extension.all = {
                    labels: this.chartData.submission.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.submission.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterKesetaraanGenderPKS() {
        //     $axios.get(`/admin/filter/kesetaraan/gender/pks/${this.chartData.deputiKesetaraanGender.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.deputiKesetaraanGender.pks.data = response.data.data;

        //         this.chartData.deputiKesetaraanGender.pks.yearsText = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiKesetaraanGender.pks.value = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.data);


        //         this.chartData.deputiKesetaraanGender.pks.all = {
        //             labels: this.chartData.deputiKesetaraanGender.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiKesetaraanGender.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // resetKesetaraanGenderPKS() {
        //     $axios.get(`/admin/reset/kesetaraan/gender/pks`)
        //     .then(response => {
        //         this.chartData.deputiKesetaraanGender.pks.selectedYear = null;
        //         this.chartData.deputiKesetaraanGender.pks.data = response.data.data;

        //         this.chartData.deputiKesetaraanGender.pks.yearsText = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiKesetaraanGender.pks.value = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.data);


        //         this.chartData.deputiKesetaraanGender.pks.all = {
        //             labels: this.chartData.deputiKesetaraanGender.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiKesetaraanGender.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        filterKesetaraanGenderMOU() {
            $axios.get(`/admin/filter/kesetaraan/gender/mou/${this.chartData.deputiKesetaraanGender.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.mou.data = response.data.data;

                this.chartData.deputiKesetaraanGender.mou.yearsText = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.mou.value = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.mou.all = {
                    labels: this.chartData.deputiKesetaraanGender.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        resetKesetaraanGenderMOU() {
            $axios.get(`/admin/reset/kesetaraan/gender/mou`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.mou.selectedYear = null;
                this.chartData.deputiKesetaraanGender.mou.data = response.data.data;

                this.chartData.deputiKesetaraanGender.mou.yearsText = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.mou.value = this.chartData.deputiKesetaraanGender.mou.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.mou.all = {
                    labels: this.chartData.deputiKesetaraanGender.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        filterKesetaraanGenderAdendum() {
            $axios.get(`/admin/filter/kesetaraan/gender/adendum/${this.chartData.deputiKesetaraanGender.adendum.selectedYear}`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.adendum.data = response.data.data;

                this.chartData.deputiKesetaraanGender.adendum.yearsText = this.chartData.deputiKesetaraanGender.adendum.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.adendum.value = this.chartData.deputiKesetaraanGender.adendum.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.adendum.all = {
                    labels: this.chartData.deputiKesetaraanGender.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetKesetaraanGenderAdendum() {
            $axios.get(`/admin/reset/kesetaraan/gender/adendum`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.adendum.selectedYear = null;
                this.chartData.deputiKesetaraanGender.adendum.data = response.data.data;

                this.chartData.deputiKesetaraanGender.adendum.yearsText = this.chartData.deputiKesetaraanGender.adendum.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.adendum.value = this.chartData.deputiKesetaraanGender.adendum.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.adendum.all = {
                    labels: this.chartData.deputiKesetaraanGender.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterKesetaraanGenderExtension() {
            $axios.get(`/admin/filter/kesetaraan/gender/extension/${this.chartData.deputiKesetaraanGender.extension.selectedYear}`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.extension.data = response.data.data;

                this.chartData.deputiKesetaraanGender.extension.yearsText = this.chartData.deputiKesetaraanGender.extension.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.extension.value = this.chartData.deputiKesetaraanGender.extension.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.extension.all = {
                    labels: this.chartData.deputiKesetaraanGender.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetKesetaraanGenderExtension() {
            $axios.get(`/admin/reset/kesetaraan/gender/extension`)
            .then(response => {
                this.chartData.deputiKesetaraanGender.extension.selectedYear = null;
                this.chartData.deputiKesetaraanGender.extension.data = response.data.data;

                this.chartData.deputiKesetaraanGender.extension.yearsText = this.chartData.deputiKesetaraanGender.extension.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.extension.value = this.chartData.deputiKesetaraanGender.extension.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.extension.all = {
                    labels: this.chartData.deputiKesetaraanGender.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterPartisipasiMasyarakatPKS() {
        //     $axios.get(`/admin/filter/partisipasi/masyarakat/pks/${this.chartData.deputiPartisipasiMasyarakat.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.deputiPartisipasiMasyarakat.pks.data = response.data.data;

        //         this.chartData.deputiPartisipasiMasyarakat.pks.yearsText = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPartisipasiMasyarakat.pks.value = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.data);


        //         this.chartData.deputiPartisipasiMasyarakat.pks.all = {
        //             labels: this.chartData.deputiPartisipasiMasyarakat.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPartisipasiMasyarakat.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // resetPartisipasiMasyarakatPKS() {
        //     $axios.get(`/admin/reset/partisipasi/masyarakat/pks`)
        //     .then(response => {
        //         this.chartData.deputiPartisipasiMasyarakat.pks.selectedYear = null;
        //         this.chartData.deputiPartisipasiMasyarakat.pks.data = response.data.data;

        //         this.chartData.deputiPartisipasiMasyarakat.pks.yearsText = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPartisipasiMasyarakat.pks.value = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.data);


        //         this.chartData.deputiPartisipasiMasyarakat.pks.all = {
        //             labels: this.chartData.deputiPartisipasiMasyarakat.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPartisipasiMasyarakat.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        filterPartisipasiMasyarakatMOU() {
            $axios.get(`/admin/filter/partisipasi/masyarakat/mou/${this.chartData.deputiPartisipasiMasyarakat.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.mou.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.mou.yearsText = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.mou.value = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.mou.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        resetPartisipasiMasyarakatMOU() {
            $axios.get(`/admin/reset/partisipasi/masyarakat/mou`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.mou.selectedYear = null;
                this.chartData.deputiPartisipasiMasyarakat.mou.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.mou.yearsText = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.mou.value = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.mou.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        filterPartisipasiMasyarakatMOU() {
            $axios.get(`/admin/filter/partisipasi/masyarakat/mou/${this.chartData.deputiPartisipasiMasyarakat.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.mou.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.mou.yearsText = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.mou.value = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.mou.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        resetPartisipasiMasyarakatMOU() {
            $axios.get(`/admin/reset/partisipasi/masyarakat/mou`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.mou.selectedYear = null;
                this.chartData.deputiPartisipasiMasyarakat.mou.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.mou.yearsText = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.mou.value = this.chartData.deputiPartisipasiMasyarakat.mou.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.mou.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        filterPartisipasiMasyarakatAdendum() {
            $axios.get(`/admin/filter/partisipasi/masyarakat/adendum/${this.chartData.deputiPartisipasiMasyarakat.adendum.selectedYear}`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.adendum.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.adendum.yearsText = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.adendum.value = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.adendum.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPartisipasiMasyarakatAdendum() {
            $axios.get(`/admin/reset/partisipasi/masyarakat/adendum`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.adendum.selectedYear = null;
                this.chartData.deputiPartisipasiMasyarakat.adendum.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.adendum.yearsText = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.adendum.value = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.adendum.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPartisipasiMasyarakatExtension() {
            $axios.get(`/admin/filter/partisipasi/masyarakat/extension/${this.chartData.deputiPartisipasiMasyarakat.extension.selectedYear}`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.extension.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.extension.yearsText = this.chartData.deputiPartisipasiMasyarakat.extension.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.extension.value = this.chartData.deputiPartisipasiMasyarakat.extension.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.extension.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.extension.yearsText,
                    datasets: [
                        {
                            label: `Extension`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPartisipasiMasyarakatExtension() {
            $axios.get(`/admin/reset/partisipasi/masyarakat/extension`)
            .then(response => {
                this.chartData.deputiPartisipasiMasyarakat.extension.selectedYear = null;
                this.chartData.deputiPartisipasiMasyarakat.extension.data = response.data.data;

                this.chartData.deputiPartisipasiMasyarakat.extension.yearsText = this.chartData.deputiPartisipasiMasyarakat.extension.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.extension.value = this.chartData.deputiPartisipasiMasyarakat.extension.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.extension.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterPerlindunganAnakPKS() {
        //     $axios.get(`/admin/filter/perlindungan/anak/pks/${this.chartData.deputiPerlindunganAnak.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.deputiPerlindunganAnak.pks.data = response.data.data;

        //         this.chartData.deputiPerlindunganAnak.pks.yearsText = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPerlindunganAnak.pks.value = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.data);


        //         this.chartData.deputiPerlindunganAnak.pks.all = {
        //             labels: this.chartData.deputiPerlindunganAnak.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPerlindunganAnak.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // resetPerlindunganAnakPKS() {
        //     $axios.get(`/admin/reset/perlindungan/anak/pks`)
        //     .then(response => {
        //         this.chartData.deputiPerlindunganAnak.pks.selectedYear = null;
        //         this.chartData.deputiPerlindunganAnak.pks.data = response.data.data;

        //         this.chartData.deputiPerlindunganAnak.pks.yearsText = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPerlindunganAnak.pks.value = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.data);


        //         this.chartData.deputiPerlindunganAnak.pks.all = {
        //             labels: this.chartData.deputiPerlindunganAnak.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPerlindunganAnak.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        filterPerlindunganAnakMOU() {
            $axios.get(`/admin/filter/perlindungan/anak/mou/${this.chartData.deputiPerlindunganAnak.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.mou.data = response.data.data;

                this.chartData.deputiPerlindunganAnak.mou.yearsText = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.mou.value = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        resetPerlindunganAnakMOU() {
            $axios.get(`/admin/reset/perlindungan/anak/mou`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.mou.selectedYear = null;
                this.chartData.deputiPerlindunganAnak.mou.data = response.data.data;

                this.chartData.deputiPerlindunganAnak.mou.yearsText = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.mou.value = this.chartData.deputiPerlindunganAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        filterPerlindunganAnakAdendum() {
            $axios.get(`/admin/filter/perlindungan/anak/adendum/${this.chartData.deputiPerlindunganAnak.adendum.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.adendum.data = response.data.data;

                this.chartData.deputiPerlindunganAnak.adendum.yearsText = this.chartData.deputiPerlindunganAnak.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.adendum.value = this.chartData.deputiPerlindunganAnak.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.adendum.all = {
                    labels: this.chartData.deputiPerlindunganAnak.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPerlindunganAnakAdendum() {
            $axios.get(`/admin/reset/perlindungan/anak/adendum`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.adendum.selectedYear = null;
                this.chartData.deputiPerlindunganAnak.adendum.data = response.data.data;

                this.chartData.deputiPerlindunganAnak.adendum.yearsText = this.chartData.deputiPerlindunganAnak.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.adendum.value = this.chartData.deputiPerlindunganAnak.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.adendum.all = {
                    labels: this.chartData.deputiPerlindunganAnak.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganAnakExtension() {
            $axios.get(`/admin/filter/perlindungan/anak/extension/${this.chartData.deputiPerlindunganAnak.extension.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.extension.data = response.data.data;

                this.chartData.deputiPerlindunganAnak.extension.yearsText = this.chartData.deputiPerlindunganAnak.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.extension.value = this.chartData.deputiPerlindunganAnak.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.extension.all = {
                    labels: this.chartData.deputiPerlindunganAnak.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPerlindunganAnakExtension() {
            $axios.get(`/admin/reset/perlindungan/anak/extension`)
            .then(response => {
                this.chartData.deputiPerlindunganAnak.extension.selectedYear = null;
                this.chartData.deputiPerlindunganAnak.extension.data = response.data.data;

                this.chartData.deputiPerlindunganAnak.extension.yearsText = this.chartData.deputiPerlindunganAnak.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.extension.value = this.chartData.deputiPerlindunganAnak.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.extension.all = {
                    labels: this.chartData.deputiPerlindunganAnak.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterPerlindunganHakPerempuanPKS() {
        //     $axios.get(`/admin/filter/perlindungan/hak/perempuan/pks/${this.chartData.deputiPerlindunganHakPerempuan.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.deputiPerlindunganHakPerempuan.pks.data = response.data.data;

        //         this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPerlindunganHakPerempuan.pks.value = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.data);


        //         this.chartData.deputiPerlindunganHakPerempuan.pks.all = {
        //             labels: this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPerlindunganHakPerempuan.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // resetPerlindunganHakPerempuanPKS() {
        //     $axios.get(`/admin/reset/perlindungan/hak/perempuan/pks`)
        //     .then(response => {
        //         this.chartData.deputiPerlindunganHakPerempuan.pks.selectedYear = null;
        //         this.chartData.deputiPerlindunganHakPerempuan.pks.data = response.data.data;

        //         this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPerlindunganHakPerempuan.pks.value = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.data);


        //         this.chartData.deputiPerlindunganHakPerempuan.pks.all = {
        //             labels: this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPerlindunganHakPerempuan.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        filterPerlindunganHakPerempuanMOU() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/mou/${this.chartData.deputiPerlindunganHakPerempuan.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.mou.data = response.data.data;

                this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.mou.value = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.mou.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        resetPerlindunganHakPerempuanMOU() {
            $axios.get(`/admin/reset/perlindungan/hak/perempuan/mou`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.mou.selectedYear = null;
                this.chartData.deputiPerlindunganHakPerempuan.mou.data = response.data.data;

                this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.mou.value = this.chartData.deputiPerlindunganHakPerempuan.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.mou.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        filterPerlindunganHakPerempuanAdendum() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/adendum/${this.chartData.deputiPerlindunganHakPerempuan.adendum.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.adendum.data = response.data.data;

                this.chartData.deputiPerlindunganHakPerempuan.adendum.yearsText = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.adendum.value = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.adendum.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPerlindunganHakPerempuanAdendum() {
            $axios.get(`/admin/reset/perlindungan/hak/perempuan/adendum`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.adendum.selectedYear = null;
                this.chartData.deputiPerlindunganHakPerempuan.adendum.data = response.data.data;

                this.chartData.deputiPerlindunganHakPerempuan.adendum.yearsText = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.adendum.value = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.adendum.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganHakPerempuanExtension() {
            $axios.get(`/admin/filter/perlindungan/hak/perempuan/mou/${this.chartData.deputiPerlindunganHakPerempuan.extension.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.extension.data = response.data.data;

                this.chartData.deputiPerlindunganHakPerempuan.extension.yearsText = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.extension.value = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.extension.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPerlindunganHakPerempuanExtension() {
            $axios.get(`/admin/reset/perlindungan/hak/perempuan/mou`)
            .then(response => {
                this.chartData.deputiPerlindunganHakPerempuan.extension.selectedYear = null;
                this.chartData.deputiPerlindunganHakPerempuan.extension.data = response.data.data;

                this.chartData.deputiPerlindunganHakPerempuan.extension.yearsText = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.extension.value = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.extension.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterPerlindunganTumbuhKembangAnakPKS() {
        //     $axios.get(`/admin/filter/perlindungan/hak/perempuan/pks/${this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data = response.data.data;

        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(map => map.data);


        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.all = {
        //             labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        // resetPerlindunganTumbuhKembangAnakPKS() {
        //     $axios.get(`/admin/reset/perlindungan/hak/perempuan/pks`)
        //     .then(response => {
        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.selectedYear = null;
        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data = response.data.data;

        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(map => map.year.toString());
        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.data.map(map => map.data);


        //         this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.all = {
        //             labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: `MOU`,
        //                     backgroundColor: '#f87979',
        //                     data: this.chartData.deputiPerlindunganTumbuhKembangAnak.pks.value,
        //                 },
        //             ]
        //         };
        //     })
        //     .catch(error => {
        //         console.log(error);
        //     });
        // },
        filterPerlindunganTumbuhKembangAnakMOU() {
            $axios.get(`/admin/filter/perlindungan/tumbuh/kembang/anak/mou/${this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data = response.data.data;

                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        resetPerlindunganTumbuhKembangAnakMOU() {
            $axios.get(`/admin/reset/perlindungan/tumbuh/kembang/anak/mou`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.selectedYear = null;
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data = response.data.data;

                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
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
        filterPerlindunganTumbuhKembangAnakAdendum() {
            $axios.get(`/admin/filter/perlindungan/tumbuh/kembang/anak/adendum/${this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.data = response.data.data;

                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPerlindunganTumbuhKembangAnakAdendum() {
            $axios.get(`/admin/reset/perlindungan/tumbuh/kembang/anak/adendum`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.selectedYear = null;
                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.data = response.data.data;

                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganTumbuhKembangAnak.adendum.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        filterPerlindunganTumbuhKembangAnakExtension() {
            $axios.get(`/admin/filter/perlindungan/tumbuh/kembang/anak/extension/${this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.selectedYear}`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.data = response.data.data;

                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        resetPerlindunganTumbuhKembangAnakExtension() {
            $axios.get(`/admin/reset/perlindungan/tumbuh/kembang/anak/extension`)
            .then(response => {
                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.selectedYear = null;
                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.data = response.data.data;

                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.yearsText = this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.value = this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.all = {
                    labels: this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganTumbuhKembangAnak.extension.value,
                        },
                    ]
                };
            })
            .catch(error => {
                console.log(error);
            });
        },
        // filterAgenciesPKS() {
        //     $axios.get(`/admin/filter/agencies/pks/${this.chartData.instansi.pks.selectedYear}`)
        //     .then(response => {
        //         this.chartData.instansi.pks.data = response.data.data;

        //         this.chartData.instansi.pks.yearsText = this.chartData.instansi.pks.data.map((map, index) => map[0].agencies.name.toString());
        //         this.chartData.instansi.pks.value = this.chartData.instansi.pks.data.map(map => map.data);

        //         this.chartData.instansi.pks.all = {
        //             labels: this.chartData.instansi.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: "Berdasarkan Instansi",
        //                     backgroundColor: "#f87979",
        //                     data: this.chartData.instansi.pks.data.map(value => value.length),
        //                 }
        //             ]
        //         };
        //     })
        // },
        // resetAgenciesPKS() {
        //     $axios.get(`/admin/reset/agencies/pks`)
        //     .then(response => {
        //         this.chartData.instansi.pks.selectedYear = null;
        //         this.chartData.instansi.pks.data = response.data.data;

        //         this.chartData.instansi.pks.yearsText = this.chartData.instansi.pks.data.map((map, index) => map[0].agencies.name.toString());
        //         this.chartData.instansi.pks.value = this.chartData.instansi.pks.data.map(map => map.data);

        //         this.chartData.instansi.pks.all = {
        //             labels: this.chartData.instansi.pks.yearsText,
        //             datasets: [
        //                 {
        //                     label: "Berdasarkan Instansi",
        //                     backgroundColor: "#f87979",
        //                     data: this.chartData.instansi.pks.data.map(value => value.length),
        //                 }
        //             ]
        //         };
        //     })
        // },
        filterAgenciesMOU() {
            $axios.get(`/admin/filter/agencies/mou/${this.chartData.instansi.selectedYear}`)
            .then(response => {
                this.chartData.instansi.data = response.data.data;
                const agenciesMOU = this.chartData.instansi.data.map((value, index) => {
                    return value.mou.length + value.mou_guest.length;
                });
                const agenciesAdendum = this.chartData.instansi.data.map((value, index) => {
                    return value.adendum.length + value.adendum_guest.length
                });
                const agenciesExtension = this.chartData.instansi.data.map((value, index) => {
                    return value.extension.length + value.extension_guest.length;
                });
                this.chartData.instansi.all = {
                    // labels: this.chartData.instansi.data.map(value => value.name),
                    datasets: [
                        {
                            label: "MOU",
                            backgroundColor: "#f87979",
                            data: agenciesMOU,
                        },
                        {
                            label: "Adendum",
                            backgroundColor: "#34bfa3",
                            data: agenciesAdendum,
                        },
                        {
                            label: "Perpanjangan",
                            backgroundColor: "#36a3f7",
                            data: agenciesExtension,
                        },
                    ]
                };
            })
        },
        resetAgenciesMOU() {
            $axios.get(`/admin/reset/agencies/mou`)
            .then(response => {
                this.chartData.instansi.selectedYear = null;
                this.chartData.instansi.data = response.data.data.agencies;

                const agenciesMOU = this.chartData.instansi.data.map((value, index) => {
                    return value.mou.length + value.mou_guest.length;
                });
                const agenciesAdendum = this.chartData.instansi.data.map((value, index) => {
                    return value.adendum.length + value.adendum_guest.length
                });
                const agenciesExtension = this.chartData.instansi.data.map((value, index) => {
                    return value.extension.length + value.extension_guest.length;
                });

                this.chartData.instansi.all = {
                    labels: this.chartData.instansi.data.map(value => value.name),
                    datasets: [
                        {
                            label: "MOU",
                            backgroundColor: "#f87979",
                            data: agenciesMOU,
                        },
                        {
                            label: "Adendum",
                            backgroundColor: "#34bfa3",
                            data: agenciesAdendum,
                        },
                        {
                            label: "Perpanjangan",
                            backgroundColor: "#36a3f7",
                            data: agenciesExtension,
                        },
                    ]
                };
            })
        },
        getData() {
            $axios.get(`/admin/dashboard`)
            .then(response => {
                //Survey
                this.chartData.survey.data = response.data.data.survey;
                let objectSurveyYear = response.data.data.survey_year.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.survey.years = objectSurveyYear;
                this.chartData.survey.yearsText = this.chartData.survey.data.map(map => map.monthname.toString());
                this.chartData.survey.sangat_memuaskan = this.chartData.survey.data.map(map => map.sangat_memuaskan);
                this.chartData.survey.memuaskan = this.chartData.survey.data.map(map => map.memuaskan);
                this.chartData.survey.sesuai_standar = this.chartData.survey.data.map(map => map.sesuai_standar);
                this.chartData.survey.tidak_memuaskan = this.chartData.survey.data.map(map => map.tidak_memuaskan);
                this.chartData.survey.sangat_tidak_memuaskan = this.chartData.survey.data.map(map => map.sangat_tidak_memuaskan);
                this.chartData.survey.all = {
                    labels: this.chartData.survey.yearsText,
                    datasets: [
                        {
                            label: `Sangat Memuaskan`,
                            backgroundColor: '#34bfa3',
                            data: this.chartData.survey.sangat_memuaskan
                        },
                        {
                            label: 'Memuaskan',
                            backgroundColor: '#36a3f7',
                            data: this.chartData.survey.memuaskan
                        },
                        {
                            label: 'Sesuai Standar',
                            backgroundColor: '#716aca',
                            data: this.chartData.survey.sesuai_standar
                        },
                        {
                            label: 'Tidak Memuaskan',
                            backgroundColor: '#ffb822',
                            data: this.chartData.survey.tidak_memuaskan
                        },
                        {
                            label: 'Sangat Tidak Memuaskan',
                            backgroundColor: '#f4516c',
                            data: this.chartData.survey.sangat_tidak_memuaskan
                        },
                    ]
                };
                //Pengajuan Kerjasama PKS
                // this.chartData.submission.pks.data = response.data.data.submission_cooperation_pks;

                // let objectSubmissionPKS = this.chartData.submission.pks.data.map(value => {
                //     return {
                //         id: value.year.toString(),
                //         text: value.year
                //     };
                // })

                // this.chartData.submission.pks.years = objectSubmissionPKS;
                // this.chartData.submission.pks.yearsText = this.chartData.submission.pks.data.map(map => map.year.toString());
                // this.chartData.submission.pks.value = this.chartData.submission.pks.data.map(map => map.data);


                // this.chartData.submission.pks.all = {
                //     labels: this.chartData.submission.pks.yearsText,
                //     datasets: [
                //         {
                //             label: `MOU`,
                //             backgroundColor: '#f87979',
                //             data: this.chartData.submission.pks.value,
                //         },
                //     ]
                // };
                //Pengajuan Kerjasama MOU
                this.chartData.submission.mou.data = response.data.data.submission_cooperation_mou;

                let objectSubmissionMOU = this.chartData.submission.mou.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })
                const submissionMOU = this.chartData.submission.mou.data.map(value => {
                    return {
                        x: value.year,
                        y: value.data,
                    }
                });
                this.chartData.submission.mou.years = objectSubmissionMOU;
                this.chartData.submission.mou.yearsText = this.chartData.submission.mou.data.map(map => map.year.toString());


                this.chartData.submission.mou.all = {
                    labels: this.chartData.submission.mou.yearsText,
                    datasets: [
                        {
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: submissionMOU,
                        },
                    ]
                };


                this.chartData.submission.adendum.data = response.data.data.submission_cooperation_adendum;

                let objectSubmissionAdendum = this.chartData.submission.adendum.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })
                const submissionAdendum = this.chartData.submission.adendum.data.map(value => {
                    return {
                        x: value.year,
                        y: value.data,
                    }
                });
                this.chartData.submission.adendum.years = objectSubmissionAdendum;
                this.chartData.submission.adendum.yearsText = this.chartData.submission.adendum.data.map(map => map.year.toString());


                this.chartData.submission.adendum.all = {
                    labels: this.chartData.submission.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: submissionAdendum,
                        },
                    ]
                };

                this.chartData.submission.extension.data = response.data.data.submission_cooperation_extension;

                let objectSubmissionExtension = this.chartData.submission.extension.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })
                const submissionExtension = this.chartData.submission.extension.data.map(value => {
                    return {
                        x: value.year,
                        y: value.data,
                    }
                });
                this.chartData.submission.extension.years = objectSubmissionExtension;
                this.chartData.submission.extension.yearsText = this.chartData.submission.extension.data.map(map => map.year.toString());


                this.chartData.submission.extension.all = {
                    labels: this.chartData.submission.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: submissionExtension,
                        },
                    ]
                };
                //Kesetaraan Gender
                // this.chartData.deputiKesetaraanGender.pks.data = response.data.data.deputi_kesetaraan_gender_pks;

                // let objectDeputiKesetaraanGenderPKS = this.chartData.deputiKesetaraanGender.pks.data.map(value => {
                //     return {
                //         id: value.year.toString(),
                //         text: value.year
                //     };
                // })

                // this.chartData.deputiKesetaraanGender.pks.years = objectDeputiKesetaraanGenderPKS;
                // this.chartData.deputiKesetaraanGender.pks.yearsText = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.year.toString());
                // this.chartData.deputiKesetaraanGender.pks.value = this.chartData.deputiKesetaraanGender.pks.data.map(map => map.data);


                // this.chartData.deputiKesetaraanGender.pks.all = {
                //     labels: this.chartData.deputiKesetaraanGender.pks.yearsText,
                //     datasets: [
                //         {
                //             label: `MOU`,
                //             backgroundColor: '#f87979',
                //             data: this.chartData.deputiKesetaraanGender.pks.value,
                //         },
                //     ]
                // };

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
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.mou.value,
                        },
                    ]
                };

                this.chartData.deputiKesetaraanGender.adendum.data = response.data.data.deputi_kesetaraan_gender_adendum;

                let objectDeputiKesetaraanGenderAdendum = this.chartData.deputiKesetaraanGender.adendum.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiKesetaraanGender.adendum.years = objectDeputiKesetaraanGenderAdendum;
                this.chartData.deputiKesetaraanGender.adendum.yearsText = this.chartData.deputiKesetaraanGender.adendum.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.adendum.value = this.chartData.deputiKesetaraanGender.adendum.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.adendum.all = {
                    labels: this.chartData.deputiKesetaraanGender.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.adendum.value,
                        },
                    ]
                };

                this.chartData.deputiKesetaraanGender.extension.data = response.data.data.deputi_kesetaraan_gender_extension;

                let objectDeputiKesetaraanGenderExtension = this.chartData.deputiKesetaraanGender.extension.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiKesetaraanGender.extension.years = objectDeputiKesetaraanGenderExtension;
                this.chartData.deputiKesetaraanGender.extension.yearsText = this.chartData.deputiKesetaraanGender.extension.data.map(map => map.year.toString());
                this.chartData.deputiKesetaraanGender.extension.value = this.chartData.deputiKesetaraanGender.extension.data.map(map => map.data);


                this.chartData.deputiKesetaraanGender.extension.all = {
                    labels: this.chartData.deputiKesetaraanGender.extension.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiKesetaraanGender.extension.value,
                        },
                    ]
                };

                //Partisipasi Masyarakat
                // this.chartData.deputiPartisipasiMasyarakat.pks.data = response.data.data.deputi_partisipasi_masyarakat_pks;

                // let objectDeputiPartisipasideputiPartisipasiMasyarakatPKS = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(value => {
                //     return {
                //         id: value.year.toString(),
                //         text: value.year
                //     };
                // })

                // this.chartData.deputiPartisipasiMasyarakat.pks.years = objectDeputiPartisipasideputiPartisipasiMasyarakatPKS;
                // this.chartData.deputiPartisipasiMasyarakat.pks.yearsText = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.year.toString());
                // this.chartData.deputiPartisipasiMasyarakat.pks.value = this.chartData.deputiPartisipasiMasyarakat.pks.data.map(map => map.data);


                // this.chartData.deputiPartisipasiMasyarakat.pks.all = {
                //     labels: this.chartData.deputiPartisipasiMasyarakat.pks.yearsText,
                //     datasets: [
                //         {
                //             label: `MOU`,
                //             backgroundColor: '#f87979',
                //             data: this.chartData.deputiPartisipasiMasyarakat.pks.value,
                //         },
                //     ]
                // };

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
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.mou.value,
                        },
                    ]
                };

                this.chartData.deputiPartisipasiMasyarakat.adendum.data = response.data.data.deputi_partisipasi_masyarakat_adendum;

                let objectDeputiPartisipasideputiPartisipasiMasyarakatAdendum = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPartisipasiMasyarakat.adendum.years = objectDeputiPartisipasideputiPartisipasiMasyarakatAdendum;
                this.chartData.deputiPartisipasiMasyarakat.adendum.yearsText = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPartisipasiMasyarakat.adendum.value = this.chartData.deputiPartisipasiMasyarakat.adendum.data.map(map => map.data);


                this.chartData.deputiPartisipasiMasyarakat.adendum.all = {
                    labels: this.chartData.deputiPartisipasiMasyarakat.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPartisipasiMasyarakat.adendum.value,
                        },
                    ]
                };

                //Perlindungan Anak
                // this.chartData.deputiPerlindunganAnak.pks.data = response.data.data.deputi_perlindungan_anak_pks;

                // let objectDeputiPartisipasideputiPerlindunganAnakPKS = this.chartData.deputiPerlindunganAnak.pks.data.map(value => {
                //     return {
                //         id: value.year.toString(),
                //         text: value.year
                //     };
                // })

                // this.chartData.deputiPerlindunganAnak.pks.years = objectDeputiPartisipasideputiPerlindunganAnakPKS;
                // this.chartData.deputiPerlindunganAnak.pks.yearsText = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.year.toString());
                // this.chartData.deputiPerlindunganAnak.pks.value = this.chartData.deputiPerlindunganAnak.pks.data.map(map => map.data);


                // this.chartData.deputiPerlindunganAnak.pks.all = {
                //     labels: this.chartData.deputiPerlindunganAnak.pks.yearsText,
                //     datasets: [
                //         {
                //             label: `MOU`,
                //             backgroundColor: '#f87979',
                //             data: this.chartData.deputiPerlindunganAnak.pks.value,
                //         },
                //     ]
                // };

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
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.mou.value,
                        },
                    ]
                };

                this.chartData.deputiPerlindunganAnak.adendum.data = response.data.data.deputi_perlindungan_anak_adendum;

                let objectDeputiPartisipasideputiPerlindunganAnakAdendum = this.chartData.deputiPerlindunganAnak.adendum.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganAnak.adendum.years = objectDeputiPartisipasideputiPerlindunganAnakAdendum;
                this.chartData.deputiPerlindunganAnak.adendum.yearsText = this.chartData.deputiPerlindunganAnak.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.adendum.value = this.chartData.deputiPerlindunganAnak.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.adendum.all = {
                    labels: this.chartData.deputiPerlindunganAnak.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.adendum.value,
                        },
                    ]
                };

                this.chartData.deputiPerlindunganAnak.extension.data = response.data.data.deputi_perlindungan_anak_extension;

                let objectDeputiPartisipasideputiPerlindunganAnakExtension = this.chartData.deputiPerlindunganAnak.extension.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganAnak.extension.years = objectDeputiPartisipasideputiPerlindunganAnakExtension;
                this.chartData.deputiPerlindunganAnak.extension.yearsText = this.chartData.deputiPerlindunganAnak.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganAnak.extension.value = this.chartData.deputiPerlindunganAnak.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganAnak.extension.all = {
                    labels: this.chartData.deputiPerlindunganAnak.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganAnak.extension.value,
                        },
                    ]
                };

                //Perlindungan Tumbuh Hak Perempuan
                // this.chartData.deputiPerlindunganHakPerempuan.pks.data = response.data.data.deputi_perlindungan_hak_perempuan_pks;

                // let objectDeputiPartisipasideputiPerlindunganHakPerempuanPKS = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(value => {
                //     return {
                //         id: value.year.toString(),
                //         text: value.year
                //     };
                // })

                // this.chartData.deputiPerlindunganHakPerempuan.pks.years = objectDeputiPartisipasideputiPerlindunganHakPerempuanPKS;
                // this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.year.toString());
                // this.chartData.deputiPerlindunganHakPerempuan.pks.value = this.chartData.deputiPerlindunganHakPerempuan.pks.data.map(map => map.data);


                // this.chartData.deputiPerlindunganHakPerempuan.pks.all = {
                //     labels: this.chartData.deputiPerlindunganHakPerempuan.pks.yearsText,
                //     datasets: [
                //         {
                //             label: `MOU`,
                //             backgroundColor: '#f87979',
                //             data: this.chartData.deputiPerlindunganHakPerempuan.pks.value,
                //         },
                //     ]
                // };

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
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.mou.value,
                        },
                    ]
                };

                this.chartData.deputiPerlindunganHakPerempuan.adendum.data = response.data.data.deputi_perlindungan_hak_perempuan_adendum;

                let objectDeputiPartisipasideputiPerlindunganHakPerempuanAdendum = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganHakPerempuan.adendum.years = objectDeputiPartisipasideputiPerlindunganHakPerempuanAdendum;
                this.chartData.deputiPerlindunganHakPerempuan.adendum.yearsText = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.adendum.value = this.chartData.deputiPerlindunganHakPerempuan.adendum.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.adendum.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.adendum.value,
                        },
                    ]
                };

                this.chartData.deputiPerlindunganHakPerempuan.extension.data = response.data.data.deputi_perlindungan_hak_perempuan_extension;

                let objectDeputiPartisipasideputiPerlindunganHakPerempuanExtension = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiPerlindunganHakPerempuan.extension.years = objectDeputiPartisipasideputiPerlindunganHakPerempuanExtension;
                this.chartData.deputiPerlindunganHakPerempuan.extension.yearsText = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(map => map.year.toString());
                this.chartData.deputiPerlindunganHakPerempuan.extension.value = this.chartData.deputiPerlindunganHakPerempuan.extension.data.map(map => map.data);


                this.chartData.deputiPerlindunganHakPerempuan.extension.all = {
                    labels: this.chartData.deputiPerlindunganHakPerempuan.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiPerlindunganHakPerempuan.extension.value,
                        },
                    ]
                };
                //Perlindungan Tumbuh Kembang Anak
                // this.chartData.deputiTumbuhKembangAnak.pks.data = response.data.data.deputi_tumbuh_kembang_anak_pks;

                // let objectdunganTumbuhKembangAnakPKS = this.chartData.deputiTumbuhKembangAnak.pks.data.map(value => {
                //     return {
                //         id: value.year.toString(),
                //         text: value.year
                //     };
                // })

                // this.chartData.deputiTumbuhKembangAnak.pks.years = objectdunganTumbuhKembangAnakPKS;
                // this.chartData.deputiTumbuhKembangAnak.pks.yearsText = this.chartData.deputiTumbuhKembangAnak.pks.data.map(map => map.year.toString());
                // this.chartData.deputiTumbuhKembangAnak.pks.value = this.chartData.deputiTumbuhKembangAnak.pks.data.map(map => map.data);


                // this.chartData.deputiTumbuhKembangAnak.pks.all = {
                //     labels: this.chartData.deputiTumbuhKembangAnak.pks.yearsText,
                //     datasets: [
                //         {
                //             label: `MOU`,
                //             backgroundColor: '#f87979',
                //             data: this.chartData.deputiTumbuhKembangAnak.pks.value,
                //         },
                //     ]
                // };

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
                            label: `MOU`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiTumbuhKembangAnak.mou.value,
                        },
                    ]
                };

                this.chartData.deputiTumbuhKembangAnak.adendum.data = response.data.data.deputi_tumbuh_kembang_anak_adendum;

                let objectdunganTumbuhKembangAnakAdendum = this.chartData.deputiTumbuhKembangAnak.adendum.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiTumbuhKembangAnak.adendum.years = objectdunganTumbuhKembangAnakAdendum;
                this.chartData.deputiTumbuhKembangAnak.adendum.yearsText = this.chartData.deputiTumbuhKembangAnak.adendum.data.map(map => map.year.toString());
                this.chartData.deputiTumbuhKembangAnak.adendum.value = this.chartData.deputiTumbuhKembangAnak.adendum.data.map(map => map.data);


                this.chartData.deputiTumbuhKembangAnak.adendum.all = {
                    labels: this.chartData.deputiTumbuhKembangAnak.adendum.yearsText,
                    datasets: [
                        {
                            label: `Adendum`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiTumbuhKembangAnak.adendum.value,
                        },
                    ]
                };

                this.chartData.deputiTumbuhKembangAnak.extension.data = response.data.data.deputi_tumbuh_kembang_anak_extension;

                let objectdunganTumbuhKembangAnakExtension = this.chartData.deputiTumbuhKembangAnak.extension.data.map(value => {
                    return {
                        id: value.year.toString(),
                        text: value.year
                    };
                })

                this.chartData.deputiTumbuhKembangAnak.extension.years = objectdunganTumbuhKembangAnakExtension;
                this.chartData.deputiTumbuhKembangAnak.extension.yearsText = this.chartData.deputiTumbuhKembangAnak.extension.data.map(map => map.year.toString());
                this.chartData.deputiTumbuhKembangAnak.extension.value = this.chartData.deputiTumbuhKembangAnak.extension.data.map(map => map.data);


                this.chartData.deputiTumbuhKembangAnak.extension.all = {
                    labels: this.chartData.deputiTumbuhKembangAnak.extension.yearsText,
                    datasets: [
                        {
                            label: `Perpanjangan`,
                            backgroundColor: '#f87979',
                            data: this.chartData.deputiTumbuhKembangAnak.extension.value,
                        },
                    ]
                };
                //Intansi PKS
                // this.chartData.instansi.pks.data = response.data.data.agencies_pks;
                // let objectInstansiPKS = response.data.data.agencies_year_pks.map(value => {
                //     return {
                //         id: value[0].year.toString(),
                //         text: value[0].year,
                //     };
                // })

                // this.chartData.instansi.pks.years = objectInstansiPKS;
                // this.chartData.instansi.pks.yearsText = this.chartData.instansi.pks.data.map((map, index) => map[0].agencies.name.toString());
                // this.chartData.instansi.pks.value = this.chartData.instansi.pks.data.map(map => map.data);


                // this.chartData.instansi.pks.all = {
                //     labels: this.chartData.instansi.pks.yearsText,
                //     datasets: [
                //         {
                //             label: "Berdasarkan Instansi",
                //             backgroundColor: "#f87979",
                //             data: this.chartData.instansi.pks.data.map(value => value.length),
                //         }
                //     ]
                // };

                //Intansi
                this.chartData.instansi.data = response.data.data.agencies;
                let objectInstansiMOU = response.data.data.agencies_year_mou.map(value => {
                    return {
                        id: value[0].year.toString(),
                        text: value[0].year,
                    };
                })

                this.chartData.instansi.years = objectInstansiMOU;

                const agenciesMOU = this.chartData.instansi.data.map((value, index) => {
                    return value.mou.length + value.mou_guest.length;
                });
                const agenciesAdendum = this.chartData.instansi.data.map((value, index) => {
                    return value.adendum.length + value.adendum_guest.length
                });
                const agenciesExtension = this.chartData.instansi.data.map((value, index) => {
                    return value.extension.length + value.extension_guest.length;
                });

                this.chartData.instansi.all = {
                    labels: this.chartData.instansi.data.map(value => value.name),
                    datasets: [
                        {
                            label: "MOU",
                            backgroundColor: "#f87979",
                            data: agenciesMOU,
                        },
                        {
                            label: "Adendum",
                            backgroundColor: "#34bfa3",
                            data: agenciesAdendum,
                        },
                        {
                            label: "Perpanjangan",
                            backgroundColor: "#36a3f7",
                            data: agenciesExtension,
                        },
                    ]
                };
                //Widget
                const responseData = response.data.data;

                this.widget.mou.approve = responseData.mou_approve + responseData.mou_approve_guest;
                this.widget.mou.reject = responseData.mou_reject + responseData.mou_reject_guest;
                this.widget.mou.process = responseData.mou_process + responseData.mou_process_guest;
                this.widget.mou.total = responseData.mou_total + responseData.mou_total_guest;

                this.widget.adendum.approve = responseData.adendum_approve + responseData.adendum_approve_guest;
                this.widget.adendum.reject = responseData.adendum_reject + responseData.adendum_reject_guest;
                this.widget.adendum.process = responseData.adendum_process + responseData.adendum_process_guest;
                this.widget.adendum.total = responseData.adendum_total + responseData.adendum_total_guest;

                this.widget.extension.approve = responseData.extension_approve + responseData.extension_approve_guest;
                this.widget.extension.reject = responseData.extension_reject + responseData.extension_reject_guest;
                this.widget.extension.process = responseData.extension_process + responseData.extension_process_guest;
                this.widget.extension.total = responseData.extension_total + responseData.extension_total_guest;

                this.mouLabel = responseData.mou_label.name;
                this.perpanjanganLabel = responseData.perpanjangan_label.name;
                this.adendumLabel = responseData.adendum_label.name;

                // this.widget.pks.approve = responseData.pks_approve + responseData.pks_approve_guest;
                // this.widget.pks.reject = responseData.pks_reject + responseData.pks_reject_guest;
                // this.widget.pks.process = responseData.pks_process + responseData.pks_process_guest;
                // this.widget.pks.total = responseData.pks_total + responseData.pks_total_guest;
            })
        },
    }
}
</script>

<style>

</style>
