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
                            Daftar Pengajuan Kerjasama
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/submission/cooperation/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Pengajuan'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Pengajuan</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <!--begin::Section-->
                <div class="m-section">
                    <div class="m-section__content">
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

                <!--end::Section-->
            </div>
            <!--end::Form-->
        </div>
    </div>
</template>

<script>
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
            ]
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
        this.$store.dispatch('proposal/indexProposal');
    },
}
</script>

<style>

</style>
