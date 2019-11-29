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
                <div class="text-center">
                    <template v-for="value in sortDeputi">
                        <template>
                            <button class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class" v-tooltip.top="value.label" />-
                        </template>
                    </template>
                    <template v-for="(value, index) in sortTracking">
                        <template v-if="index + 1 < sortTracking.length">
                            <button class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class" v-tooltip.top="value.label" />-
                        </template>
                        <template v-else>
                            <button class="btn m-btn m-btn--icon m-btn--icon-only m-btn--pill m-btn--air" :class="value.class" v-tooltip.top="value.label" />
                        </template>
                    </template>
                </div>
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_9_1" role="tab"> Rangkuman</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a v-if="status_disposition == 12" class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_2" role="tab"> Proses Offline</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a v-if="status_disposition == 13" class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_3" role="tab"> Hukum</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a v-if="status_disposition == 16" class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_4" role="tab"> Final</a>
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
                            <label>Judul Kerjasama</label>
                            <input class="form-control m-input" disabled="disabled" placeholder="Disabled input" :value="title_cooperation">
                        </div>
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
                    <div class="tab-pane" id="m_tabs_9_2" role="tabpanel">
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Generate Barcode</label>
                            <div class="col-lg-6">
                                <button :class="statusBarcode" @click="generateBarcode" :disabled="disableBarcode
                                ">
                                    <span>
                                        <i class="la la-close" v-if="status_barcode == 0"></i>
                                        <i class="la la-check" v-else></i>
                                        <span>Generate</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label class="col-lg-2 col-form-label">Download Format Word</label>
                            <div class="col-lg-6">
                                <button class="btn btn-primary" @click="downloadFormatWord">
                                    <span>
                                        <i class="la la-word-o"></i>
                                        <span>Download Format</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_9_3" role="tabpanel">
                        <div class="form-group m-form__group">
                            <label>Notulen Rapat Terakhir</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pilih File" :value="notulen">
                                <div class="input-group-append">
                                    <button :class="disableFileDraft.style" :disabled="disableFileNotulen.disable" type="button" @click="handleExploreNotulen">Browse</button>
                                </div>
                            </div>
                            <input type="file" class="custom-file-input" style="display:none;" ref="notulen" id="customFile" @change="uploadNotulen">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Draft Final MOU/PKS</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pilih File" :value="draft">
                                <div class="input-group-append">
                                    <button :class="disableFileDraft.style" type="button" :disabled="disableFileDraft.disable" @click="handleExploreDraft">Browse</button>
                                </div>
                            </div>
                            <input type="file" class="custom-file-input" style="display:none;" ref="draft" id="customFile" @change="uploadDraft">
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_9_4" role="tabpanel">
                        <form @submit.prevent="final">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">Nomer MOU</h3>
                                </div>
                                <div class="form-group m-form__group" v-for="(value, index) in nomor" :key="index">
                                    <div class="text-right">
                                        <i
                                            v-if="(index === nomor.length - 1)"
                                            class="la la-plus fa-2x"
                                            @click="addExtraNomor"
                                        />
                                        <i
                                            v-if="nomor.length > 1"
                                            class="la la-minus fa-2x"
                                            @click="removeExtraNomor(index)"
                                        />
                                    </div>
                                    <label for="">Nomor</label>
                                    <input type="text" class="form-control" v-model="nomor[index]">
                                </div>
                            </div>
                            <div class="m-form__seperator m-form__seperator--dashed"></div>
                            <div class="form-group m-form__group">
                                <label>Revisi Notulen Rapat Terakhir</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pilih File" :value="notulenLabel">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" @click="handleExploreNotulenFinal">Browse</button>
                                    </div>
                                </div>
                                <input type="file" class="custom-file-input" style="display:none;" ref="notulenFinal" id="customFile" @change="handleNotulen">
                            </div>
                            <div class="form-group m-form__group">
                                <label>Draft Final MOU/PKS</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pilih File" :value="draftLabel">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" @click="handleExploreDraftFinal">Browse</button>
                                    </div>
                                </div>
                                <input type="file" class="custom-file-input" style="display:none;" ref="draftFinal" id="customFile" @change="handleDraft">
                            </div>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-7">
                                            <button type="button" class="btn btn-secondary">Cancel</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
                        <button type="button" @click="approve" :disabled="disabled" class="btn btn-primary">{{ text_button }}</button>
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
                        <button type="button" @click="reject" :disabled="disabled" class="btn btn-primary">{{ text_button }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
    </div>
</template>

<script>
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';
import {gmapApi} from 'vue2-google-maps';

export default {
    name: 'PKSProposalSubmissionCooperationDetail',
    data() {
        return {
            text_button: 'Submit',
            notulen: null,
            notulenLabel: null,
            draft: null,
            draftLabel: null,
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
                    path: '/pks/submission/cooperation'
                },
                {
                    id: 2,
                    label: 'Detail Pengajuan Kerjasama',
                    path: `/pks/submission/cooperation/${this.$route.params.id}/detail`
                },
            ],
            deputi: [],
            nomor: [''],
            title_cooperation: null,
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
            status_disposition: null,
            tracking: [],
            status_barcode: null,
            law: null,
        }
    },
    computed: {
        google: gmapApi,
        sortDeputi: function() {
            const data = this.deputi;

            let finalData = data.map((value, index) => {
                return {
                    id: value.id,
                    label: value.role.name,
                    class: value.status == 0 ? 'btn-danger' : value.status == 1 ? 'btn-success' : 'btn-metal'
                }
            });
            return finalData;
        },
        sortTracking: function() {
            const data = this.tracking;

            const value = Object.values(data).splice(2,8);
            const label = ['Bagian Kerja Sama','Bagian Ortala','Sesmen','Menteri','Hukum','Sesmen Final','Menteri Final','Bagian Kerja Sama Final'];

            let finalData = value.map((value, index) => {
                return {
                    id: index+1,
                    label: label[index],
                    value: value,
                    class: value == 0 ? 'btn-danger' : value == 1 ? 'btn-success' : 'btn-metal'
                }
            });

            return finalData;
        },
        disableBarcode() {
            if(this.status_barcode == 0) {
                return false;
            } else {
                return true;
            }
        },
        statusBarcode() {
            if(this.status_barcode == 0) {
                return "btn btn-danger m-btn m-btn--icon";
            } else {
                return "btn btn-success m-btn m-btn--icon";
            }
        },
        disableFileNotulen() {
            if(this.notulen == null || this.notulen == "") {
                return {
                    disable: false,
                    style: 'btn btn-danger'
                };
            } else {
                return {
                    disable: true,
                    style: 'btn btn-success'
                };
            }
        },
        disableFileDraft() {
            if(this.draft == null || this.draft == "") {
                return {
                    disable: false,
                    style: 'btn btn-danger'
                };
            } else {
                return {
                    disable: true,
                    style: 'btn btn-success'
                };
            }
        }
    },
    created() {
        this.getData();
    },
    methods: {
        downloadFormatWord() {
            axios.get(`/api/admin/download/format/word/${this.$route.params.id}`, {
                responseType: 'arraybuffer',
                headers: {
                    'Authorization': localStorage.getItem('token') != 'null' ? 'Bearer ' + localStorage.getItem('token') :'',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                this.downloadFile(response, 'Download Format Excel')
            })
        },
        downloadFile(response, filename) {
            // It is necessary to create a new blob object with mime-type explicitly set
            // otherwise only Chrome works like it should
            var newBlob = new Blob([response.data], {type: 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'})

            // IE doesn't allow using a blob object directly as link href
            // instead it is necessary to use msSaveOrOpenBlob
            if (window.navigator && window.navigator.msSaveOrOpenBlob) {
                window.navigator.msSaveOrOpenBlob(newBlob)
                return
            }

            // For other browsers:
            // Create a link pointing to the ObjectURL containing the blob.
            const data = window.URL.createObjectURL(newBlob)
            var link = document.createElement('a')
            link.href = data
            link.download = filename + '.docx'
            link.click()
            setTimeout(function () {
                // For Firefox it is necessary to delay revoking the ObjectURL
                window.URL.revokeObjectURL(data)
            }, 100)
        },
        final() {
            let formData = new FormData();
            $.each(this.nomor, function(key, value) {
                formData.append(`nomor[${key}]`, value);
            });
            formData.append('notulen', this.notulenFinal);
            formData.append('draft', this.draftFinal);

            $axiosFormData.post(`/admin/submission/cooperation/final/${this.$route.params.id}`, formData)
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            })
        },
        handleExploreNotulenFinal() {
            this.$refs.notulenFinal.click();
        },
        handleExploreDraftFinal() {
            this.$refs.draftFinal.click();
        },
        handleNotulen(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.notulen = files[0];

            this.notulenLabel = this.$refs.notulenFinal.value;
        },
        handleDraft(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.draft = files[0];

            this.draftLabel = this.$refs.draftFinal.value;
        },
        addExtraNomor() {
            this.nomor.push('');
        },
        removeExtraNomor(index) {
            if(index == 0) {
                this.nomor = [''];
            } else {
                this.nomor.splice(index, 1);
            }
        },
        handleExploreNotulen() {
            this.$refs.notulen.click();
        },
        handleExploreDraft() {
            this.$refs.draft.click();
        },
        uploadNotulen(e) {
            let files = e.target.files || e.dataTransfer.files;

            let formData = new FormData();
            formData.append('file', files[0]);

            $axiosFormData.post(`/admin/upload/notulen/${this.$route.params.id}`, formData)
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });

            this.notulen = this.$refs.notulen.value;
        },
        uploadDraft(e) {
            let files = e.target.files || e.dataTransfer.files;

            let formData = new FormData();
            formData.append('file', files[0]);

            $axiosFormData.post(`/admin/upload/draft/${this.$route.params.id}`, formData)
            .then(response => {
                console.log(response);
            })
            .catch(error => {
                console.log(error);
            });

            this.draft = this.$refs.draft.value;
        },
        getData() {
            $axios.get(`/admin/submission/cooperation/${this.$route.params.id}/detail`)
            .then(response => {
                this.title_cooperation = response.data.data.title_cooperation;
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
                this.status_disposition = response.data.data.status_disposition;
                this.status_barcode = response.data.data.status_barcode;
                this.draft = response.data.data.law == null ? null : response.data.data.law.draft;
                this.draftLabel = response.data.data.law == null ? null : response.data.data.law.draft;
                this.notulen = response.data.data.law == null ? null : response.data.data.law.notulen;
                this.notulenLabel = response.data.data.law == null ? null : response.data.data.law.notulen;
                this.deputi = response.data.data.deputi;
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
            $axios.post(`/admin/submission/reason/approve`, this.forms)
            .then(response => {
                this.disabled = true;
                this.text_button = 'Loading ...';
                $('#modal-approve').modal('hide');

                this.$store.commit('proposal/notification', response);
                this.$store.commit('proposal/updateData', response);

                this.$router.push({
                    name: 'MOUProposalSubmissionCooperationIndex'
                });
            })

            this.text_button = 'Submit';
            this.disabled = false;
        },
        reject() {
            $axios.post(`/admin/submission/reason/reject`, this.forms)
            .then(response => {
                this.disabled = true;
                this.text_button = 'Loading ...';
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
        generateBarcode(id) {
            $axios.get(`/admin/generate/barcode/${this.$route.params.id}`)
            .then(response => {
                this.getData();
                toastr.options = {
                    "closeButton": false,
                    "debug": false,
                    "progressBar": true,
                    "newestOnTop": false,
                    "progressBar": false,
                    "positionClass": "toast-top-center",
                    "preventDuplicates": false,
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success(`Barcode Berhasil di Generate`);
            })
            .catch(error => {
                toastr.error(`Barcode Gagal di Generate`);
            })
        }
    }
}
</script>

<style>

</style>
