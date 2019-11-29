<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Penerimaan Pengajuan Kerjasama
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
                <div class="table-responsive">
                    <table class="table m-table m-table--head-bg-brand">
                        <thead>
                            <tr>
                                <th style="vertical-align: middle;">No</th>
                                <th style="vertical-align: middle;">Jenis Kerjasama</th>
                                <th style="vertical-align: middle;">Permohonan Kerjasama</th>
                                <th style="vertical-align: middle;">Kesepahaman Jenis Kerjasama</th>
                                <th style="vertical-align: middle;">Negara</th>
                                <th style="vertical-align: middle;">Instansi</th>
                                <th style="vertical-align: middle;">Nama Kantor</th>
                                <th style="vertical-align: middle;">Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-if="submission.length">
                                <tr v-for="(value, index) in submission" :key="value.id">
                                    <td style="vertical-align: middle;">{{ index+1 }}</td>
                                    <td style="vertical-align: middle;">{{ value.type_of_cooperation.name }}</td>
                                    <td style="vertical-align: middle;">{{ value.type_of_cooperation_one.name }}</td>
                                    <td style="vertical-align: middle;">{{ value.type_of_cooperation_two.name }}</td>
                                    <td style="vertical-align: middle;">{{ value.country.country_name }}</td>
                                    <td style="vertical-align: middle;">{{ value.agencies.name }}</td>
                                    <td style="vertical-align: middle;">{{ value.agency_name }}</td>
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
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';

export default {
    name: 'MOUProposalSubmissionCooperationApprove',
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Penerimaan Pengajuan Kerjasama',
                    path: '/pks/submission/cooperation/approve'
                },
            ],
            submission: [],
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/pks/submission/cooperation/approve`)
            .then(response => {
                this.submission = response.data.data;
            })
            .catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style>

</style>
