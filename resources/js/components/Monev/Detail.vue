<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <!--begin::Portlet-->
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            {{ data.title_of_cooperation }}
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active show" data-toggle="tab" href="#m_tabs_9_1" role="tab" aria-selected="true"><i class="la la-book"></i> Rangkuman</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_3" role="tab" aria-selected="false"><i class="fa fa-chart-area"></i> Aktivitas</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_tabs_9_1" role="tabpanel">
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Judul MOU</label>
                            <div class="m-form__control">
                                <input type="text" class="form-control" :value="data.title_of_cooperation" disabled>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Latar Belakang</label>
                            <div class="m-form__control">
                                <textarea class="form-control" cols="30" rows="10" v-model="data.background" disabled/>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Keterangan</label>
                            <div class="m-form__control">
                                <textarea class="form-control" cols="30" rows="10" v-model="data.description" disabled/>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tanggal TTD</label>
                            <div class="m-form__control">
                                <input type="text" class="form-control" :value="data.tanggal_ttd" disabled>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Tanggal Berakhir</label>
                            <div class="m-form__control">
                                <input type="text" class="form-control" :value="data.end_date" disabled>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="Nama Lengkap">Status</label>
                            <div class="m-form__control">
                                <input type="text" class="form-control" :value="data.status == 1 ? 'Masih Berlaku' : 'Tidak Berlaku'" disabled>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        <div class="m-form__section">
                            <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Nomor Surat</h3>
                            </div>
                            <div class="form-group m-form__group" v-for="(valueNomer, index) in data.nomor" :key="valueNomer.id">
                                <label for="Nama Lengkap">Nomor Ke - {{ index+1 }}</label>
                                <div class="m-form__control">
                                    <input type="text" class="form-control" :value="valueNomer.nomor" disabled>
                                </div>
                            </div>
                        </div>
                        <div class="m-separator m-separator--dashed m-separator--lg"></div>
                        <div class="m-form__section">
                            <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Para Pihak</h3>
                            </div>
                            <div class="form-group m-form__group" v-for="(valueParties, index) in data.parties" :key="valueParties.id">
                                <label for="Nama Lengkap">Pihak Ke - {{ index+1 }}</label>
                                <div class="m-form__control">
                                    <input type="text" class="form-control" :value="valueParties.name" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_9_3" role="tabpanel">
                        <div v-for="acitivity in data.activities" :key="acitivity.id">
                            <div class="m-form__section">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">Tahun Ke - {{ acitivity.year }}</h3>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="Nama Lengkap">Anggaran</label>
                                    <div class="m-form__control">
                                        <input type="text" class="form-control" :value="acitivity.budget" disabled>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="Nama Lengkap">Target</label>
                                    <div class="m-form__control">
                                        <textarea class="form-control" cols="30" rows="10" v-model="acitivity.target" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="Nama Lengkap">Capaian</label>
                                    <div class="m-form__control">
                                        <textarea class="form-control" cols="30" rows="10" v-model="acitivity.achievements" disabled></textarea>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="Nama Lengkap">Hasil Kegiatan</label>
                                    <div class="m-form__control">
                                        <input type="text" class="form-control" :value="acitivity.activity_result" disabled>
                                    </div>
                                </div>
                                <div class="form-group m-form__group">
                                    <label for="Nama Lengkap">Rekomentasi</label>
                                    <div class="m-form__control">
                                        <input type="text" class="form-control" :value="acitivity.recomendation" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Portlet-->
    </div>
</template>

<script>
import $axios from '@/api.js';
export default {
    name: 'MonevActivityDetail',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Monitoring Evaluasi',
                    path: '/monev'
                },
                {
                    id: 2,
                    label: 'Detail Monitoring Evaluasi',
                    path: `/monev/activity/${this.$route.params.id}`
                }
            ],
            data: {
                title_of_cooperation: null,
                background: null,
                description: null,
                tanggal_ttd: null,
                end_date: null,
                status: null,
                nomor: [],
                parties: [],
                activities: []
            }
        }
    },
    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/monev/activity/${this.$route.params.id}`)
            .then(response => {
                this.data.title_of_cooperation = response.data.data.title_of_cooperation;
                this.data.background = response.data.data.background;
                this.data.description = response.data.data.description;
                this.data.tanggal_ttd = response.data.data.tanggal_ttd;
                this.data.end_date = response.data.data.end_date;
                this.data.status = response.data.data.status;

                this.data.nomor = response.data.data.nomor;
                this.data.parties = response.data.data.parties;
                this.data.activities = response.data.data.activities;
            })
        }
    }
}
</script>

<style>

</style>
