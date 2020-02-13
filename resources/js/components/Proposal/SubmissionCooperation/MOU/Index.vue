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
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_8_1" role="tab"><i class="la la-archive"></i> Data Pengajuan Anda</a>
                        </li>
                    </template>
                    <template v-else>
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_8_2" role="tab"><i class="la la-file"></i> Pihak Internal Kemen PPPA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="la la-file-archive-o"></i> Pihak External</a>
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
                                                            v-model="filter.satkerSesmenApproval.type_one"
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
                                            <div class="col-xl-2 col-lg-2 col-sm-12 col-xs-12">
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
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Durasi</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="youSubmission.data.length">
                                            <tr v-for="(value, index) in youSubmission.data" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation == null ? "Kosong" : value.type_of_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_application == null ? "Kosong" : value.type_of_application }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">{{ value.duration }}</td>
                                                <td>
                                                    <router-link :to="{name: 'MOUProposalSubmissionCooperationYourDetailPreview', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                        <span>
                                                            <i class="la la-pencil-square"></i>
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
                                                            v-model="filter.satkerSesmen.type_one"
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
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Durasi</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="approvalSubmission.data.length">
                                            <tr v-for="(value, index) in approvalSubmission.data" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation == null ? "Kosong" : value.type_of_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_application == null ? "Kosong" : value.type_of_application }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">{{ value.duration }}</td>
                                                <td>
                                                    <template v-if="value.status_disposition === 9 || value.status_disposition === 15">
                                                        <router-link :to="{name: 'MOUProposalSubmissionCooperationDetail', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                            <span>
                                                                <i class="la la-eye"></i>
                                                                <span>Detail Pengajuan</span>
                                                            </span>
                                                        </router-link>
                                                    </template>
                                                    <template v-else-if="value.status_disposition < 9 || value.status_disposition > 9">
                                                        <router-link v-if="$can('Bagian Kerjasama') == false" :to="{name: 'MOUProposalSubmissionCooperationDetail', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                            <span>
                                                                <i class="la la-eye"></i>
                                                                <span>Detail Pengajuan</span>
                                                            </span>
                                                        </router-link>
                                                        <router-link v-if="$can('Bagian Kerjasama') && value.status_disposition != 9 && value.status_disposition != 15" :to="{name: 'MOUProposalSubmissionCooperationYourDetailPreview', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                            <span>
                                                                <i class="la la-pencil-square"></i>
                                                                <span>Detail Pengajuan</span>
                                                            </span>
                                                        </router-link>
                                                    </template>
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
                            <div class="m-portlet__foot">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        Total Record : <strong>{{ approvalSubmission.data.length }}</strong>
                                    </div>
                                </div>
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
                                                            v-model="filter.guest.type_one"
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
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Usulan Judul Kerjasama</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <th style="vertical-align: middle;">Durasi</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="guestSubmission.data.length">
                                            <tr v-for="(value, index) in guestSubmission.data" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation == null ? "Kosong" : value.type_of_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_application == null ? "Kosong" : value.type_of_application }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">{{ value.duration }}</td>
                                                <td>
                                                    <template v-if="value.status_disposition === 9 || value.status_disposition === 15">
                                                        <router-link :to="{name: 'MOUProposalSubmissionCooperationDetailGuest', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                            <span>
                                                                <i class="la la-eye"></i>
                                                                <span>Detail Pengajuan</span>
                                                            </span>
                                                        </router-link>
                                                    </template>
                                                    <template v-else-if="(value.status_disposition < 9 || value.status_disposition > 9)">
                                                        <router-link v-if="$can('Bagian Kerjasama') == false" :to="{name: 'MOUProposalSubmissionCooperationDetailGuest', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                            <span>
                                                                <i class="la la-eye"></i>
                                                                <span>Detail Pengajuan</span>
                                                            </span>
                                                        </router-link>
                                                        <router-link v-if="$can('Bagian Kerjasama') && value.status_disposition != 9 && value.status_disposition != 15" :to="{name: 'MOUProposalSubmissionCooperationYourDetailGuestPreview', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
                                                            <span>
                                                                <i class="la la-pencil-square"></i>
                                                                <span>Detail Pengajuan</span>
                                                            </span>
                                                        </router-link>
                                                    </template>
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
                            <div class="m-portlet__foot">
                                <div class="row align-items-center">
                                    <div class="col-lg-6">
                                        Total Record : <strong>{{ guestSubmission.data.length }}</strong>
                                    </div>
                                </div>
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
    name: 'MOUProposalSubmissionCooperationIndex',
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/mou/submission/cooperation'
                },
            ],
            approvalSubmission: [],
            youSubmission: [],
            guestSubmission: [],
            type: [],
            filter: {
                satkerSesmenApproval: {
                    type_one: null,
                    q: null,
                },
                satkerSesmen: {
                    type_one: null,
                    q: null,
                },
                guest: {
                    type_one: null,
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
        $axios.get(`/admin/mou/submission/cooperation`)
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
            $axios.get('/admin/filter/satker/sesmen/mou', {
                params: {
                    type_one: this.filter.satkerSesmenApproval.type_one,
                    q: this.filter.satkerSesmenApproval.q,
                }
            })
            .then(response => {
                this.youSubmission = response.data.data.you;
            })
        },
        filterSatkerSesmen() {
            $axios.get('/admin/filter/satker/sesmen/approval/mou', {
                params: {
                    type_one: this.filter.satkerSesmen.type_one,
                    q: this.filter.satkerSesmen.q,
                }
            })
            .then(response => {
                this.approvalSubmission = response.data.data.approval;
            })
        },
        filterGuest() {
            $axios.get('/admin/filter/guest/mou', {
                params: {
                    type_one: this.filter.guest.type_one,
                    q: this.filter.guest.q,
                }
            })
            .then(response => {
                this.guestSubmission.data = response.data.data.guest.data;
            })
        },
        resetSatkerSesmenYou() {
            $axios.get('/admin/reset/satker/sesmen/mou')
            .then(response => {
                this.filter.satkerSesmen.type_one = null;
                this.filter.satkerSesmen.q = null;

                this.youSubmission = response.data.data.you;
            })
        },
        resetSatkerSesmen() {
            $axios.get('/admin/reset/satker/sesmen/approval/mou')
            .then(response => {
                this.filter.satkerSesmenApproval.type_one = null;
                this.filter.satkerSesmenApproval.q = null;

                this.approvalSubmission = response.data.data.approval;
            })
        },
        resetGuest() {
            $axios.get('/admin/reset/guest/mou')
            .then(response => {
                this.filter.guest.type_one = null;
                this.filter.guest.q = null;

                this.guestSubmission = response.data.data.guest;
            })
        },
    }
}
</script>
