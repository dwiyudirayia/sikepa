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
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_8_1" role="tab"><i class="la la-file-archive-o"></i> Daftar Pengajuan Kerjasama Anda</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="la la-file-archive-o"></i> Daftar Persetujuan Pengajuan Kerjasama</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_8_1" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Instansi</th>
                                        <th style="vertical-align: middle;">Jenis Kategori</th>
                                        <th style="vertical-align: middle;">Judul MOU</th>
                                        <th style="vertical-align: middle;">Tanggal</th>
                                        <th style="vertical-align: middle;">Jangka Waktu</th>
                                        <th style="vertical-align: middle;">Ditunjukan Ke</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="vertical-align: middle;">1</td>
                                        <td style="vertical-align: middle;">Nama Instansi Dalam Negeri</td>
                                        <td style="vertical-align: middle;">MOU</td>
                                        <td style="vertical-align: middle;">Kerjasama Antar Pihak Sesmen</td>
                                        <td style="vertical-align: middle;">2019-11-11 Berakhir 2019-12-12</td>
                                        <td style="vertical-align: middle;">1 Bulan</td>
                                        <td style="vertical-align: middle;">Sesmen</td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">2</td>
                                        <td style="vertical-align: middle;">Nama Instansi Luar Negeri</td>
                                        <td style="vertical-align: middle;">PKS</td>
                                        <td style="vertical-align: middle;">Kerjasama Antar Pihak Deputi Tumbuh Kembang Anak</td>
                                        <td style="vertical-align: middle;">2019-10-10 Berakhir 2019-11-11</td>
                                        <td style="vertical-align: middle;">1 Bulan</td>
                                        <td style="vertical-align: middle;">Deputi Tumbuh Kembang Anak</td>
                                    </tr>
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
                                        <th style="vertical-align: middle;">Instansi</th>
                                        <th style="vertical-align: middle;">Jenis Kategori</th>
                                        <th style="vertical-align: middle;">Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, index) in this.approvalSubmission" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index + 1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.agency_name }}</td>
                                        <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                        <td style="vertical-align: middle;">{{ value.created_at }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
export default {
    name: 'ProposalSubmissionCooperationIndex',
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/submission/cooperation'
                },
            ],
            approvalSubmission: [],
            youSubmission: []
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
        return new Promise((resolve, reject) => {
            $axios.get(`/admin/submission/cooperation`)
            .then(response => {
                this.approvalSubmission = response.data.data.approval;
                this.youSubmission = response.data.data.you;

                this.$store.commit('proposal/clearPage');

                resolve(response);
            })
        })
    },
}
</script>

<style>

</style>
