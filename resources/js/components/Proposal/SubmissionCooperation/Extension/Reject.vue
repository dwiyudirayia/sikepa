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
                            Persetujuan Pengajuan Kerjasama
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
                            <a class="nav-link active" data-toggle="tab" href="#m_tabs_8_1" role="tab"><i class="la la-archive"></i> Pengajuan Anda</a>
                        </li>
                    </template>
                    <template v-else>
                        <li class="nav-item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_8_2" role="tab"><i class="la la-file"></i> Pihak Internal Kemen PPPA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="la la-file-archive-o"></i> Pihak External</a>
                        </li>
                    </template>
                </ul>
                <div class="tab-content">
                    <template v-if="$can('Satker Sesmen')">
                        <div class="tab-pane active" id="m_tabs_8_1" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Judul MOU</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Jenis Instansi</th>
                                            <th style="vertical-align: middle;">Nama Instansi</th>
                                            <th style="vertical-align: middle;">Masa Berlaku</th>
                                            <th style="vertical-align: middle;">MOU Dari</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="tableData.you.length">
                                            <tr v-for="(value, index) in tableData.you" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">{{ value.mou.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">
                                                    <button @click="downloadFileDraft(value.id)" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Download File Pengajuan'">
                                                        <span>
                                                            <i class="la la-file"></i>
                                                            <span>Download File Pengajuan</span>
                                                        </span>
                                                    </button>
                                                    <router-link v-if="$can('Bagian Kerjasama')" :to="{name: 'MOUProposalSubmissionCooperationYourDetailPreview', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
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
                            <b-pagination
                                v-if="metaYou.last_page > 1"
                                v-model="metaYou.current_page"
                                :total-rows="metaYou.total"
                                :limit="7"
                                :per-page="metaYou.per_page"
                                @input="getDataYou(metaYou.current_page)"
                            />
                        </div>
                    </template>
                    <template v-else>
                        <div class="tab-pane active" id="m_tabs_8_2" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Judul MOU</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Jenis Instansi</th>
                                            <th style="vertical-align: middle;">Nama Instansi</th>
                                            <th style="vertical-align: middle;">Masa Berlaku</th>
                                            <th style="vertical-align: middle;">MOU Dari</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="tableData.satker.length">
                                            <tr v-for="(value, index) in tableData.satker" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">{{ value.mou.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">
                                                    <button @click="downloadFileDraft(value.id)" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Download File Pengajuan'">
                                                        <span>
                                                            <i class="la la-file"></i>
                                                            <span>Download File Pengajuan</span>
                                                        </span>
                                                    </button>
                                                    <router-link v-if="$can('Bagian Kerjasama')" :to="{name: 'MOUProposalSubmissionCooperationYourDetailPreview', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
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
                                                <td colspan="9" class="text-center">Data Kososng</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <b-pagination
                                v-if="metaSatker.last_page > 1"
                                v-model="metaSatker.current_page"
                                :total-rows="metaSatker.total"
                                :limit="7"
                                :per-page="metaSatker.per_page"
                                @input="getDataSatker(metaSatker.current_page)"
                            />
                        </div>
                        <div class="tab-pane" id="m_tabs_8_3" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Judul MOU</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Jenis Instansi</th>
                                            <th style="vertical-align: middle;">Nama Instansi</th>
                                            <th style="vertical-align: middle;">Masa Berlaku</th>
                                            <th style="vertical-align: middle;">MOU Dari</th>
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="tableData.guest.length">
                                            <tr v-for="(value, index) in tableData.guest" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one == null ? "Kosong" : value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two == null ? "Kosong" : value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">{{ value.mou.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">
                                                    <button @click="downloadFileDraftGuest(value.id)" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Download File Pengajuan'">
                                                        <span>
                                                            <i class="la la-file"></i>
                                                            <span>Download File Pengajuan</span>
                                                        </span>
                                                    </button>
                                                    <router-link v-if="$can('Bagian Kerjasama')" :to="{name: 'MOUProposalSubmissionCooperationYourDetailGuestPreview', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
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
                                                <td colspan="9" class="text-center">Data Kososng</td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <b-pagination
                                v-if="metaGuest.last_page > 1"
                                v-model="metaGuest.current_page"
                                :total-rows="metaGuest.total"
                                :limit="7"
                                :per-page="metaGuest.per_page"
                                @input="getDataGuest(metaGuest.current_page)"
                            />
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
            metaGuest: {
                current_page: null,
                per_page: null,
                last_page: null,
                total: null,
            },
            metaYou: {
                current_page: null,
                per_page: null,
                last_page: null,
                total: null,
            },
            metaSatker: {
                current_page: null,
                per_page: null,
                last_page: null,
                total: null,
            },
            tableData: {
                guest: [],
                satker: [],
                you: [],
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
        this.getDataYou();
        this.getDataSatker();
        this.getDataGuest();
    },
    methods: {
        getDataYou(page = 1) {
            $axios.get(`/admin/extension/submission/cooperation/reject/you?page=${page}`)
            .then(response => {
                this.tableData.you = response.data.data;
                this.metaYou.current_page = response.data.meta.current_page;
                this.metaYou.per_page = response.data.meta.per_page;
                this.metaYou.last_page = response.data.meta.last_page;
                this.metaYou.total = response.data.meta.total;
                this.$store.commit('proposal/clearPage');
            })
        },
        getDataSatker(page = 1) {
            $axios.get(`/admin/extension/submission/cooperation/reject/satker?page=${page}`)
            .then(response => {
                this.tableData.satker = response.data.data;
                this.metaSatker.current_page = response.data.meta.current_page;
                this.metaSatker.per_page = response.data.meta.per_page;
                this.metaSatker.last_page = response.data.meta.last_page;
                this.metaSatker.total = response.data.meta.total;
                this.$store.commit('proposal/clearPage');
            })
        },
        getDataGuest(page = 1) {
            $axios.get(`/admin/extension/submission/cooperation/reject/guest?page=${page}`)
            .then(response => {
                this.tableData.guest = response.data.data;
                this.metaGuest.current_page = response.data.meta.current_page;
                this.metaGuest.per_page = response.data.meta.per_page;
                this.metaGuest.last_page = response.data.meta.last_page;
                this.metaGuest.total = response.data.meta.total;

                this.$store.commit('proposal/clearPage');
            })
        },
        downloadFileDraft(id) {
            window.location.href = `/api/admin/download/cooperation/success/draft/${id}?token=${localStorage.getItem('token')}`;
        },
        downloadFileDraftGuest(id) {
            window.location.href = `/api/admin/download/cooperation/success/guest/draft/${id}?token=${localStorage.getItem('token')}`;
        }
    }
}
</script>

<style>

</style>
