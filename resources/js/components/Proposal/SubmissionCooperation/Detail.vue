<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Detail Pengajuan Kerjasama
                        </h3>
                    </div>
                </div>
            </div>
            <div class="m-portlet__body">
                <template v-for="(value, index) in sortTracking">
                    <template v-if="index + 1 < 15">
                        <a href="#" class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class"/> -
                    </template>
                    <template v-else>
                        <a href="#" class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class"/>
                    </template>
                </template>
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_9_1" role="tab"><i class="la la-book"></i> Rangkuman</a>
                    </li>
                    <!-- <li class="nav-item dropdown m-tabs__item">
                        <a class="nav-link m-tabs__link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><i class="flaticon-placeholder-2"></i> Settings</a>
                        <div class="dropdown-menu" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 1px, 0px);">
                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_9_2">Action</a>
                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_9_2">Another action</a>
                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_9_2">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" data-toggle="tab" href="#m_tabs_9_2">Separated link</a>
                        </div>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_3" role="tab"><i class="flaticon-multimedia"></i> Logs</a>
                    </li> -->
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_9_1" role="tabpanel">
                        <div class="form-group m-form__group">
                            <label>Pemohonan Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="type_of_cooperation">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Jenis Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="type_of_cooperation_one">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Kesepahaman Jenis Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="type_of_cooperation_two">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Negara</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="country">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Provinsi</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="province">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Kabupaten / Kota</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="regency">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Kategori Instansi</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="agency_category">
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <gmap-map
                                        :center="{lat:+latitude, lng:+longitude}"
                                        :zoom="5"
                                        style="width:100%;  height: 300px;"
                                    >
                                        <GmapMarker
                                            ref="myMarker"
                                            :position="google && new google.maps.LatLng(latitude, longitude)"
                                        />
                                    </gmap-map>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group m-form__group">
                                    <label>Nama Instansi</label>
                                    <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="agency_name">
                                </div>
                                <div class="form-group m-form__group">
                                    <label>Alamat Instansi</label>
                                    <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="agency_address"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label>Latar Belakang</label>
                            <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="background"></textarea>
                        </div>
                        <div class="form-group m-form__group">
                            <label>Maksud & Tujuan</label>
                            <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="purpose_objectives"></textarea>
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="showModalReject" class="btn btn-danger">Tolak</button>
                                        <button type="button" @click="showModalApprove" class="btn btn-success">Terima</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Modal-->
        <div class="modal fade" id="modal-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Persetujuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Alasan</label>
                            <input type="hidden" v-model="forms.id" class="form-control">
                            <textarea class="form-control" placeholder="Masukan Alasan Anda" v-model="forms.reason" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="approve" :disabled="disabled == true" class="btn btn-primary">{{ text_button }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
        <!--begin::Modal-->
        <div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Penolakan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Alasan</label>
                            <input type="hidden" v-model="forms.id" class="form-control">
                            <textarea class="form-control" placeholder="Masukan Alasan Anda" v-model="forms.reason" id="message-text"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="reject" :disabled="disabled == true" class="btn btn-primary">{{ text_button }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
    </div>
</template>

<script>
import $axios from '@/api.js';
import {gmapApi} from 'vue2-google-maps'

export default {
    name: 'ProposalSubmissionCooperationDetail',
    data() {
        return {
            text_button: 'Submit',
            disabled: false,
            forms: {
                reason: null,
                id: null,
            },
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/submission/cooperation'
                },
                {
                    id: 2,
                    label: 'Detail Pengajuan Kerjasama',
                    path: `/submission/cooperation/${this.$route.params.id}/detail`
                },
            ],
            type_of_cooperation: null,
            type_of_cooperation_one: null,
            type_of_cooperation_two: null,
            country: null,
            province: null,
            regency: null,
            agency_category: null,
            agency_name: null,
            agency_address: null,
            purpose_objectives: null,
            background: null,
            latitude: null,
            longitude: null,
            tracking: [],
        }
    },
    computed: {
        google: gmapApi,
        sortTracking: function() {
            const data = this.tracking;

            const value = Object.values(data).splice(2,15);
            const label = ['Deputi Bidang Partisipasi Masyarakat','Deputi Bidang Kesetaraan Gender','Deputi Bidang Perlindungan Anak','Deputi Bidang Perlindungan Hak Perempuan','Deputi Bidang Tumbuh Kembang Anak','Satker Sesmen','Biro Perencanaan dan Data','Bagian Kerja Sama','Bagian Ortala','Sesmen','Menteri','Hukum','Sesmen Final','Menteri Final','Bagian Kerja Sama Final'];

            let finalData = value.map((value, index) => {
                return {
                    id: index+1,
                    label: label[index],
                    value: value,
                    class: value == 0 ? 'btn-danger' : value == 1 ? 'btn-success' : 'btn-metal'
                }
            });

            return finalData;
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/submission/cooperation/${this.$route.params.id}/detail`)
            .then(response => {
                this.type_of_cooperation = response.data.data.type_of_cooperation.name;
                this.type_of_cooperation_one = response.data.data.type_of_cooperation_one.name;
                this.type_of_cooperation_two = response.data.data.type_of_cooperation_two.name;
                this.country = response.data.data.country.country_name;
                this.province = response.data.data.province == null ? "Tidak Ada" : response.data.data.province.name;
                this.regency = response.data.data.regency == null ? "Tidak Ada" : response.data.data.regency.name;
                this.agency_category = response.data.data.agencies.name;
                this.agency_name = response.data.data.agency_name;
                this.agency_address = response.data.data.address;
                this.purpose_objectives = response.data.data.purpose_objectives;
                this.background = response.data.data.background;
                this.forms.id = response.data.data.id;
                this.latitude = parseFloat(response.data.data.latitude);
                this.longitude = parseFloat(response.data.data.longitude);
                this.tracking = response.data.data.tracking;
            });
        },
        showModalReject() {
            this.forms.reason = '';

            $('#modal-reject').modal('show');
        },
        showModalApprove() {
            this.forms.reason = '';

            $('#modal-approve').modal('show');
        },
        approve() {
            this.text_button = 'Loading ...';
            this.disabled = true;

            $axios.post(`/admin/submission/reason/approve`, this.forms)
            .then(response => {
                $('#modal-approve').modal('hide');

                this.$store.commit('proposal/notification', response);
                this.$store.commit('proposal/updateData', response);

                this.$router.push({
                    name: 'ProposalSubmissionCooperationIndex'
                });
            })

            this.text_button = 'Submit';
            this.disabled = false;
        },
        reject() {
            this.text_button = 'Loading ...';
            this.disabled = true;
            console.log(this.disabled);
            $axios.post(`/admin/submission/reason/reject`, this.forms)
            .then(response => {
                $('#modal-reject').modal('hide');

                this.$store.commit('proposal/notification', response);
                this.$store.commit('proposal/updateData', response);

                this.$router.push({
                    name: 'ProposalSubmissionCooperationIndex'
                });
            })

            this.text_button = 'Submit';
            this.disabled = false;
        },
    }
}
</script>

<style>

</style>
