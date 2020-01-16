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
                            Penolakan Pengajuan Kerjasama
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
                                            <th style="vertical-align: middle;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="youSubmission.length">
                                            <tr v-for="(value, index) in youSubmission" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">
                                                    <button @click="downloadFileDraft(value.id)" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Download File Pengajuan'">
                                                        <span>
                                                            <i class="la la-file"></i>
                                                            <span>Download File Pengajuan</span>
                                                        </span>
                                                    </button>
                                                    <router-link v-if="$can('Bagian Kerjasama')" :to="{name: 'ExtensionProposalSubmissionCooperationYourDetailPreview', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
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
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Usulan Judul MOU</th>
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
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">
                                                    <router-link v-if="$can('Bagian Kerjasama')" :to="{name: 'ExtensionProposalSubmissionCooperationYourDetailPreview', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
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
                        </div>
                        <div class="tab-pane" id="m_tabs_8_3" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table m-table m-table--head-bg-brand">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle;">No</th>
                                            <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                            <th style="vertical-align: middle;">Jenis Permohonan</th>
                                            <th style="vertical-align: middle;">Usulan Judul MOU</th>
                                            <th style="vertical-align: middle;">Negara</th>
                                            <th style="vertical-align: middle;">Instansi</th>
                                            <th style="vertical-align: middle;">Nama Kantor</th>
                                            <th style="vertical-align: middle;">Lama Pengajuan</th>
                                            <!-- <th style="vertical-align: middle;">Aksi</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-if="guestSubmission.length">
                                            <tr v-for="(value, index) in guestSubmission" :key="value.id">
                                                <td style="vertical-align: middle;">{{ index+1 }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_one == null ? "Kosong" : value.type_of_cooperation_one.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.type_of_cooperation_two == null ? "Kosong" : value.type_of_cooperation_two.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.title_cooperation }}</td>
                                                <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                                <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                                <td style="vertical-align: middle;">{{ value.time_period }} Tahun</td>
                                                <td style="vertical-align: middle;">
                                                    <router-link v-if="$can('Bagian Kerjasama')" :to="{name: 'ExtensionProposalSubmissionCooperationYourDetailGuestPreview', params: { id: value.id }}" class="btn m-btn btn-brand btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Detail Pengajuan'">
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
    name: 'ExtensionProposalSubmissionCooperationIndex',
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/extension/submission/cooperation'
                },
            ],
            approvalSubmission: [],
            youSubmission: [],
            guestSubmission: [],
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
        $axios.get(`/admin/extension/submission/cooperation/reject`)
        .then(response => {
            this.youSubmission = response.data.data.satker;
            this.guestSubmission = response.data.data.guest;

            this.$store.commit('proposal/clearPage');
        })
    },
}
</script>

<style>

</style>
