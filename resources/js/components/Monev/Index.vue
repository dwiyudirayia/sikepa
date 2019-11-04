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
                            Monitoring Evaluasi
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                <i class="la la-ellipsis-h m--font-brand"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item">
                                                    <a class="m-nav__link" v-tooltip.top="'Import MOU Terdahulu'" @click="importMOU">
                                                        <i class="m-nav__link-icon la la-upload"></i>
                                                        <span class="m-nav__link-text">Import</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item">
                                                    <a href="/download/format/mou" class="m-nav__link" v-tooltip.top="'Export Format MOU Terdahulu'">
                                                        <i class="m-nav__link-icon la la-download"></i>
                                                        <span class="m-nav__link-text">Download</span>
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
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_8_1" role="tab"><i class="la la-archive"></i> Daftar Pengajuan Kerjasama Anda</a>
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
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
export default {
    name: 'MonitoringEvaluasiIndex',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Monitoring Evaluasi',
                    path: '/monev'
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
    methods: {
        importMOU() {
            $axios.get();
        },
        downloadFormatMOU() {
            $axios.get(`/admin/download/format/mou`)
            .then(() => {
                alert('Berhasil Download Format')
            })
            .catch(error => {
                alert(error);
            })
        }
    }
}
</script>

<style>

</style>
