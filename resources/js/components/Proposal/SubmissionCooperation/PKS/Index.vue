<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Pengajuan Kerjasama
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools" v-if="$can('Pengajuan Kerjasama')">
                    <router-link to="/submission/cooperation/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Pengajuan'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Pengajuan</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <template v-if="$can('Satker Sesmen')">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_8_1" role="tab"><i class="la la-archive"></i> Daftar Pengajuan Kerjasama Anda</a>
                        </li>
                    </template>
                    <template v-else>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_8_2" role="tab"><i class="la la-file"></i> Daftar Persetujuan Pengajuan Satker Sesmen</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="la la-file-archive-o"></i> Daftar Persetujuan Pengajuan P3</a>
                        </li>
                    </template>
                </ul>
                <div class="tab-content">
                    <template v-if="$can('Satker Sesmen')">
                        <div class="tab-pane active" id="m_tabs_8_1" role="tabpanel">
                            <form @submit.prevent="filterSatkerSesmenYou" class="m-form m-form--label-align-right padding-filter">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group m-form__group row align-items-end">
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label>Tipe</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <select2
                                                            :options="type"
                                                            v-model="filter.satkerSesmenApproval.type"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="d-xl-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Cari..." v-model="filter.satkerSesmenApproval.q">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                                <div class="d-sm-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-4 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn m-btn btn-primary m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-search"></i>
                                                        <span>Search</span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="button" @click="resetSatkerSesmenYou" class="btn m-btn btn-brand m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-refresh"></i>
                                                        <span>Reset</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                            <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="youSubmission.length">
                                            <tr v-for="(value, index) in youSubmission" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }}</td>
                                                <td>
                                                    <router-link :to="{name: 'PKSProposalSubmissionCooperationYourDetail', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                        <span>
                                                            <i class="la la-eye"></i>
                                                            <span>Detail Pengajuan</span>
                                                        </span>
                                                    </router-link>
                                                </td>
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
                        </div>
                        <div class="tab-pane" id="m_tabs_8_2" role="tabpanel">
                            <form @submit.prevent="filterSatkerSesmen" class="m-form m-form--label-align-right padding-filter">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group m-form__group row align-items-end">
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label>Tipe</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <select2
                                                            :options="type"
                                                            v-model="filter.satkerSesmen.type"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="d-xl-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Cari..." v-model="filter.satkerSesmen.q">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                                <div class="d-sm-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn m-btn btn-primary m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-search"></i>
                                                        <span>Search</span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="button" @click="resetSatkerSesmen" class="btn m-btn btn-brand m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-refresh"></i>
                                                        <span>Reset</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                            <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="approvalSubmission.length">
                                            <tr v-for="(value, index) in approvalSubmission" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }}</td>
                                                <td>
                                                    <router-link :to="{name: 'PKSProposalSubmissionCooperationDetail', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                        <span>
                                                            <i class="la la-eye"></i>
                                                            <span>Detail Pengajuan</span>
                                                        </span>
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="9" class="text-center">Data Kososng</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </template>
                    <template v-else>
                        <div class="tab-pane active" id="m_tabs_8_2" role="tabpanel">
                            <form @submit.prevent="filterSatkerSesmen" class="m-form m-form--label-align-right padding-filter">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group m-form__group row align-items-end">
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label>Tipe</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <select2
                                                            :options="type"
                                                            v-model="filter.satkerSesmen.type"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="d-xl-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Cari..." v-model="filter.satkerSesmen.q">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                                <div class="d-sm-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn m-btn btn-primary m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-search"></i>
                                                        <span>Search</span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="button" @click="resetSatkerSesmen" class="btn m-btn btn-brand m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-refresh"></i>
                                                        <span>Reset</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                            <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="approvalSubmission.length">
                                            <tr v-for="(value, index) in approvalSubmission" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }}</td>
                                                <td>
                                                    <router-link :to="{name: 'PKSProposalSubmissionCooperationDetail', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                        <span>
                                                            <i class="la la-eye"></i>
                                                            <span>Detail Pengajuan</span>
                                                        </span>
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="9" class="text-center">Data Kososng</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="m_tabs_8_3" role="tabpanel">
                            <form @submit.prevent="filterGuest" class="m-form m-form--label-align-right padding-filter">
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="form-group m-form__group row align-items-end">
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-form__group m-form__group--inline">
                                                    <div class="m-form__label">
                                                        <label>Tipe</label>
                                                    </div>
                                                    <div class="m-form__control">
                                                        <select2
                                                            :options="type"
                                                            v-model="filter.guest.type"
                                                        />
                                                    </div>
                                                </div>
                                                <div class="d-xl-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-sm-12 col-xs-12">
                                                <div class="m-input-icon m-input-icon--left">
                                                    <input type="text" class="form-control m-input" placeholder="Cari..." v-model="filter.guest.q">
                                                    <span class="m-input-icon__icon m-input-icon__icon--left">
                                                        <span><i class="la la-search"></i></span>
                                                    </span>
                                                </div>
                                                <div class="d-sm-none m--margin-bottom-10"></div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="submit" class="btn m-btn btn-primary m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-search"></i>
                                                        <span>Search</span>
                                                    </span>
                                                </button>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
                                                <button type="button" @click="resetGuest" class="btn m-btn btn-brand m-btn--icon m-btn--pill m-btn--wide">
                                                    <span>
                                                        <i class="la la-refresh"></i>
                                                        <span>Reset</span>
                                                    </span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                            <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="guestSubmission.length">
                                            <tr v-for="(value, index) in guestSubmission" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one == null ? "Kosong" : value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two == null ? "Kosong" : value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }}</td>
                                                <td>
                                                    <router-link :to="{name: 'PKSProposalSubmissionCooperationDetailGuest', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                        <span>
                                                            <i class="la la-eye"></i>
                                                            <span>Detail Pengajuan</span>
                                                        </span>
                                                    </router-link>
                                                </td>
                                            </tr>
                                        </template>
                                        <template v-else>
                                            <tr>
                                                <td colspan="9" class="text-center">Data Kososng</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </template>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
export default {
    name: 'PKSProposalSubmissionCooperationIndex',
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/pks/submission/cooperation'
                },
            ],
            approvalSubmission: [],
            youSubmission: [],
            guestSubmission: [],
            type: [],
            filter: {
                satkerSesmenApproval: {
                    type: null,
                    q: null,
                },
                satkerSesmen: {
                    type: null,
                    q: null,
                },
                guest: {
                    type: null,
                    q: null,
                }
            },
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['proposal/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['proposal/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['proposal/getShowNotification'];
        },
    },
    created() {
        $axios.get(`/admin/pks/submission/cooperation`)
        .then(response => {
            this.approvalSubmission = response.data.data.approval;
            this.youSubmission = response.data.data.you;
            this.guestSubmission = response.data.data.guest;
            this.type = response.data.data.type;

            this.$store.commit('proposal/clearPage');
        })
    },
    methods: {
        filterSatkerSesmenYou() {
            $axios.get('/admin/filter/satker/sesmen/pks', {
                params: {
                    type: this.filter.satkerSesmen.type,
                    q: this.filter.satkerSesmen.q,
                }
            })
            .then(response => {
                this.youSubmission = response.data.data.you;
            })
        },
        filterSatkerSesmen() {
            $axios.get('/admin/filter/satker/sesmen/approval/pks', {
                params: {
                    type: this.filter.satkerSesmenApproval.type,
                    q: this.filter.satkerSesmenApproval.q,
                }
            })
            .then(response => {
                this.approvalSubmission = response.data.data.approval;
            })
        },
        filterGuest() {
            $axios.get('/admin/filter/guest/pks', {
                params: {
                    type: this.filter.guest.type,
                    q: this.filter.guest.q,
                }
            })
            .then(response => {
                this.guestSubmission = response.data.data.guest;
            })
        },
        resetSatkerSesmenYou() {
            $axios.get('/admin/reset/satker/sesmen/pks')
            .then(response => {
                this.filter.satkerSesmen.type = null;
                this.filter.satkerSesmen.q = null;

                this.youSubmission = response.data.data.you;
            })
        },
        resetSatkerSesmen() {
            $axios.get('/admin/reset/satker/sesmen/approval/pks')
            .then(response => {
                this.filter.satkerSesmenApproval.type = null;
                this.filter.satkerSesmenApproval.q = null;

                this.approvalSubmission = response.data.data.approval;
            })
        },
        resetGuest() {
            $axios.get('/admin/reset/guest/pks')
            .then(response => {
                this.filter.guest.type = null;
                this.filter.guest.q = null;

                this.guestSubmission = response.data.data.guest;
            })
        },
    }
}
</script>

<style>

</style>
