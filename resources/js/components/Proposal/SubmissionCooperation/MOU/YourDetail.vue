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
            <div class="row px-5" v-if="$can('Tracking')">
				<div class="col-md-12">
					<div style="display:inline-block;width:100%;overflow-y:auto;">
                        <ul class="timeline timeline-horizontal">
                            <template v-for="value in sortDeputi">
                                <li class="timeline-item">
                                    <div class="timeline-badge" :class="value.class"><i class="glyphicon glyphicon-check"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{ value.name }}</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ value.reason }}</p>
                                        </div>
                                    </div>
                                </li>
                            </template>
                            <template v-for="value in sortTracking">
                                <li class="timeline-item">
                                    <div class="timeline-badge" :class="value.class"><i class="glyphicon glyphicon-check"></i></div>
                                    <div class="timeline-panel">
                                        <div class="timeline-heading">
                                            <h4 class="timeline-title">{{ value.name }}</h4>
                                        </div>
                                        <div class="timeline-body">
                                            <p>{{ value.reason }}</p>
                                        </div>
                                    </div>
                                </li>
                            </template>
                            <!-- <li class="timeline-item">
                                <div class="timeline-badge success"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 2</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis faiz elementum girarzis, nisi eros gostis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge info"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 3</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipisci. Mé faiz elementum girarzis, nisi eros gostis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge danger"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 4</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge warning"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 5</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis.</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-item">
                                <div class="timeline-badge"><i class="glyphicon glyphicon-check"></i></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4 class="timeline-title">Mussum ipsum cacilds 6</h4>
                                        <p><small class="text-muted"><i class="glyphicon glyphicon-time"></i> 11 hours ago via Twitter</small></p>
                                    </div>
                                    <div class="timeline-body">
                                        <p>Mussum ipsum cacilds, vidis litro abertis. Consetis adipiscings elitis. Pra lá , depois divoltis porris, paradis. Paisis, filhis, espiritis santis.</p>
                                    </div>
                                </div>
                            </li> -->
                        </ul>
				    </div>
				</div>
			</div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--brand" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_9_1" role="tab"> Rangkuman</a>
                    </li>
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
                        <!-- <div class="form-group m-form__group">
                            <label>Maksud & Tujuan</label>
                            <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="purpose_objectives"></textarea>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $axios from '@/api.js';
import {gmapApi} from 'vue2-google-maps';
export default {
    name: "MOUProposalSubmissionCooperationYourDetail",
    data() {
        return {
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Pengajuan Kerjasama',
                    path: '/mou/submission/cooperation'
                },
                {
                    id: 2,
                    label: 'Detail Pengajuan Kerjasama',
                    path: `/mou/submission/cooperation/${this.$route.params.id}/detail`
                },
            ],
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
            // purpose_objectives: null,
            background: null,
            latitude: null,
            longitude: null,
            status_disposition: null,
            tracking: [],
            deputi: [],
        }
    },
    computed: {
        google: gmapApi,
        sortDeputi: function() {
            const data = this.deputi;

            let finalData = data.map((value, index) => {
                return {
                    id: index+1,
                    label: label[index],
                    value: value.approval,
                    class: value.approval == 3 ? 'danger' : value.approval == 1 ? 'success' : value.approval == 2 ? 'primary' : 'metal',
                    reason: value.reason,
                    name: value.role.name,
                }
            });
            return finalData;
        },
        sortTracking: function() {
            const data = this.tracking;

            const value = Object.values(data).splice(1,8);
            const label = ['Bagian Kerja Sama','Bagian Ortala','Sesmen','Menteri','Hukum','Sesmen Final','Menteri Final','Bagian Kerja Sama Final'];

            let finalData = value.map((value, index) => {
                return {
                    id: index+1,
                    label: label[index],
                    value: value.approval,
                    class: value.approval == 3 ? 'danger' : value.approval == 1 ? 'success' : value.approval == 2 ? 'primary' : 'metal',
                    reason: value.reason,
                    name: value.role.name,
                }
            });

            return finalData;
        },
    },
    created() {
        this.getData();
    },
    methods: {
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
                // this.purpose_objectives = response.data.data.purpose_objectives;
                this.background = response.data.data.background;
                this.latitude = parseFloat(response.data.data.latitude);
                this.longitude = parseFloat(response.data.data.longitude);
                this.tracking = response.data.data.tracking;
                this.deputi = response.data.data.deputi;
                this.status_disposition = response.data.data.status_disposition;
                this.status_barcode = response.data.data.status_barcode;
            });
        },
    }
}
</script>

<style scoped>
.context-menu {
    cursor: context-menu;
}
/* Timeline */
.timeline,
.timeline-horizontal {
  list-style: none;
  padding: 20px;
  position: relative;
}
.timeline:before {
  top: 40px;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 50%;
  margin-left: -1.5px;
}
.timeline .timeline-item {
  margin-bottom: 20px;
  position: relative;
}
.timeline .timeline-item:before,
.timeline .timeline-item:after {
  content: "";
  display: table;
}
.timeline .timeline-item:after {
  clear: both;
}
.timeline .timeline-item .timeline-badge {
  color: #fff;
  width: 54px;
  height: 54px;
  line-height: 52px;
  font-size: 22px;
  text-align: center;
  position: absolute;
  top: 18px;
  left: 50%;
  margin-left: -25px;
  background-color: #7c7c7c;
  border: 3px solid #ffffff;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}
.timeline .timeline-item .timeline-badge i,
.timeline .timeline-item .timeline-badge .fa,
.timeline .timeline-item .timeline-badge .glyphicon {
  top: 2px;
  left: 0px;
}
.timeline .timeline-item .timeline-badge.primary {
  background-color: #1f9eba;
}
.timeline .timeline-item .timeline-badge.info {
  background-color: #5bc0de;
}
.timeline .timeline-item .timeline-badge.success {
  background-color: #59ba1f;
}
.timeline .timeline-item .timeline-badge.warning {
  background-color: #d1bd10;
}
.timeline .timeline-item .timeline-badge.danger {
  background-color: #ba1f1f;
}
.timeline .timeline-item .timeline-panel {
  position: relative;
  width: 46%;
  float: left;
  right: 16px;
  border: 1px solid #c0c0c0;
  background: #ffffff;
  border-radius: 2px;
  padding: 20px;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}
.timeline .timeline-item .timeline-panel:before {
  position: absolute;
  top: 26px;
  right: -16px;
  display: inline-block;
  border-top: 16px solid transparent;
  border-left: 16px solid #c0c0c0;
  border-right: 0 solid #c0c0c0;
  border-bottom: 16px solid transparent;
  content: " ";
}
.timeline .timeline-item .timeline-panel .timeline-title {
  margin-top: 0;
  color: inherit;
}
.timeline .timeline-item .timeline-panel .timeline-body > p,
.timeline .timeline-item .timeline-panel .timeline-body > ul {
  margin-bottom: 0;
}
.timeline .timeline-item .timeline-panel .timeline-body > p + p {
  margin-top: 5px;
}
.timeline .timeline-item:last-child:nth-child(even) {
  float: right;
}
.timeline .timeline-item:nth-child(even) .timeline-panel {
  float: right;
  left: 16px;
}
.timeline .timeline-item:nth-child(even) .timeline-panel:before {
  border-left-width: 0;
  border-right-width: 14px;
  left: -14px;
  right: auto;
}
.timeline-horizontal {
  list-style: none;
  position: relative;
  padding: 20px 0px 20px 0px;
  display: inline-block;
}
.timeline-horizontal:before {
  height: 3px;
  top: auto;
  bottom: 26px;
  left: 56px;
  right: 0;
  width: 100%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item {
  display: table-cell;
  height: 280px;
  width: 20%;
  min-width: 320px;
  float: none !important;
  padding-left: 0px;
  padding-right: 20px;
  margin: 0 auto;
  vertical-align: bottom;
}
.timeline-horizontal .timeline-item .timeline-panel {
  top: auto;
  bottom: 64px;
  display: inline-block;
  float: none !important;
  left: 0 !important;
  right: 0 !important;
  width: 100%;
  margin-bottom: 20px;
}
.timeline-horizontal .timeline-item .timeline-panel:before {
  top: auto;
  bottom: -16px;
  left: 28px !important;
  right: auto;
  border-right: 16px solid transparent !important;
  border-top: 16px solid #c0c0c0 !important;
  border-bottom: 0 solid #c0c0c0 !important;
  border-left: 16px solid transparent !important;
}
.timeline-horizontal .timeline-item:before,
.timeline-horizontal .timeline-item:after {
  display: none;
}
.timeline-horizontal .timeline-item .timeline-badge {
  top: auto;
  bottom: 0px;
  left: 43px;
}
</style>

