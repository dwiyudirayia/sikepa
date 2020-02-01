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
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-dropdown__toggle dropdown-toggle btn btn--sm m-btn--pill btn-secondary m-btn m-btn--label-brand">
                                Opsi
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 36.5px;"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item context-menu" v-if="status_disposition == 2 || status_disposition == 15">
                                                    <a class="m-nav__link" @click="modalEditDeputiPIC">
                                                        <i class="m-nav__link-icon la la-users"></i>
                                                        <span class="m-nav__link-text">Edit Tujuan Deputi</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item context-menu">
                                                    <a class="m-nav__link" @click="downloadSummary">
                                                        <i class="m-nav__link-icon la la-file"></i>
                                                        <span class="m-nav__link-text">Download Rangkuman Kerjasama</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item  context-menu">
                                                    <a class="m-nav__link" @click="showModalGuestFile">
                                                        <i class="m-nav__link-icon la la-archive"></i>
                                                        <span class="m-nav__link-text">Daftar File Pemohon</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item  context-menu">
                                                    <a class="m-nav__link" @click="showModalGuestFileDraft" v-if="status_disposition == 15">
                                                        <i class="m-nav__link-icon la la-file-archive-o"></i>
                                                        <span class="m-nav__link-text">Daftar File Draft</span>
                                                    </a>
                                                </li>
                                                <li class="m-nav__item  context-menu">
                                                    <a class="m-nav__link" @click="showModalGuestFileNotulen" v-if="status_disposition == 15">
                                                        <i class="m-nav__link-icon la la-file-pdf-o"></i>
                                                        <span class="m-nav__link-text">Daftar File Notulen</span>
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
            <div class="row px-5" v-if="$can('Tracking')">
				<div class="col-md-12">
					<div style="display:inline-block;width:100%;overflow-y:auto;">
                        <ul class="timeline timeline-horizontal">
                            <template v-for="value in bpd">
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
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item m-tabs__item" @click="tabs = 1">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_9_1" role="tab" :class="{'active' : tabs === 1 }"> Rangkuman</a>
                    </li>
                    <li class="nav-item m-tabs__item" v-if="status_disposition == 11">
                        <a class="nav-link m-tabs__link" :class="{'active' : tabs === 2 }" data-toggle="tab" href="#m_tabs_9_2" role="tab"> Proses Offline</a>
                    </li>
                    <li class="nav-item m-tabs__item" v-if="status_disposition == 12">
                        <a class="nav-link m-tabs__link" :class="{'active' : tabs === 3 }" data-toggle="tab" href="#m_tabs_9_3" role="tab"> Hukum</a>
                    </li>
                    <li class="nav-item m-tabs__item" v-if="status_disposition == 15">
                        <a class="nav-link m-tabs__link" :class="{'active' : tabs === 4 }" data-toggle="tab" href="#m_tabs_9_4" role="tab"> Final</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane" :class="{'active' : tabs === 1 }" id="m_tabs_9_1" role="tabpanel">
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Judul Kerjasama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="title_cooperation">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Jenis Kerjasama:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="type_of_cooperation_one">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Jenis Permohonan:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="type_of_cooperation_two">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Negara:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="country">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Provinsi:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="province">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Kabupaten / Kota:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="regency">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Kategori Instansi:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="agency_category">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Nama Instansi:</label>
                            <div class="col-10">
                                <input class="form-control m-input" disabled="disabled" :value="agency_name">
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Alamat Instansi:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="agency_address"></textarea>
                            </div>
                        </div>
                        <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Latar Belakang:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="background"></textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group m-form__group row">
                            <label for="example-text-input" class="col-2 col-form-label">Maksud & Tujuan:</label>
                            <div class="col-10">
                                <textarea class="form-control m-input" cols="30" rows="10" disabled="disabled" v-model="purpose_objectives"></textarea>
                            </div>
                        </div> -->
                        <template v-if="status_disposition == 11 || status_disposition == 12 || status_disposition == 15">
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-7">
                                            <button type="button" @click="nextTabs" class="btn btn-brand">Lanjut</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                        <template v-else-if="status_disposition == 13 || status_disposition == 14">
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
                        </template>
                        <template v-else>
                            <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                                <div class="m-form__actions m-form__actions--solid">
                                    <div class="row">
                                        <div class="col-lg-5"></div>
                                        <div class="col-lg-7">
                                            <button type="button" @click="showModalContinue" class="btn btn-brand">Teruskan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="tab-pane" :class="{'active' : tabs === 2 }" id="m_tabs_9_2" role="tabpanel" v-if="status_disposition == 11">
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
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit" v-if="status_disposition != 11">
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
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit"  v-else>
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="showModalContinue" class="btn btn-brand">Teruskan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" :class="{'active' : tabs === 3 }"  id="m_tabs_9_3" role="tabpanel" v-if="status_disposition == 12">
                        <div class="form-group m-form__group">
                            <label>Notulen Rapat Terakhir</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pilih File" :value="notulenLabel">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" @click="handleExploreNotulen">Browse</button>
                                </div>
                            </div>
                            <span v-if="!$v.notulenFile.required" class="m--font-danger">Field ini harus di isi</span>
                            <span v-else-if="!$v.notulenFile.fileType" class="m--font-danger">Ektensi file harus .pdf</span>
                            <input type="file" class="custom-file-input" style="display:none;" ref="notulen" id="customFile" @change="uploadNotulen">
                        </div>
                        <div class="form-group m-form__group">
                            <label>Draft Final MOU</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Pilih File" :value="draftLabel">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button" @click="handleExploreDraft">Browse</button>
                                </div>
                            </div>
                            <span v-if="!$v.draftFile.required" class="m--font-danger">Field ini harus di isi</span>
                            <span v-else-if="!$v.draftFile.fileType" class="m--font-danger">Ektensi file harus .pdf</span>
                            <input type="file" class="custom-file-input" style="display:none;" ref="draft" id="customFile" @change="uploadDraft">
                        </div>
                        <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                            <div class="m-form__actions m-form__actions--solid">
                                <div class="row">
                                    <div class="col-lg-5"></div>
                                    <div class="col-lg-7">
                                        <button type="button" @click="hukum" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_9_4" :class="{'active' : tabs === 4 }" role="tabpanel" v-if="status_disposition == 15">
                        <form @submit.prevent="final">
                            <div class="m-form__section m-form__section--first">
                                <div class="m-form__heading">
                                    <h3 class="m-form__heading-title">Nomor MOU</h3>
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
                            <div class="m-form__heading">
                                <h3 class="m-form__heading-title">Revisi</h3>
                            </div>
                            <div class="form-group m-form__group">
                                <label>Judul Kerjasama Final</label>
                                <input type="text" v-model="title_cooperation_final" class="form-control">
                            </div>
                            <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Lama Pengajuan</label>
                            <div class="m-form__control">
                                <select2
                                    v-model="time_period_final"
                                    :options="data_select.time_period"
                                />
                            </div>
                        </div>
                            <!-- <div class="form-group m-form__group">
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
                                <label>Draft Final MOU</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Pilih File" :value="draftLabel">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button" @click="handleExploreDraftFinal">Browse</button>
                                    </div>
                                </div>
                                <input type="file" class="custom-file-input" style="display:none;" ref="draftFinal" id="customFile" @change="handleDraft">
                            </div> -->
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
        <div class="modal fade" id="modal-approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tanggapan</h5>
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
        <div class="modal fade" id="modal-continue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tanggapan</h5>
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
                        <div class="form-group" v-if="status_disposition == 11">
                            <label for="message-text" class="form-control-label">Keterangan Untuk Rapat</label>
                            <editor
                            api-key="dzzffhe3e7rwi6o0yhr653apjdpwu2uyld4x4xppx02diki8"
                            v-model="forms.keterangan_pesan"
                            :init="{
                                height: 500,
                                plugins: [
                                    'print preview paste searchreplace autolink code visualblocks visualchars image link media table charmap hr anchor insertdatetime advlist lists wordcount imagetools textpattern noneditable charmap quickbars emoticons',
                                ],
                                imagetools_cors_hosts: ['picsum.photos'],
                                menubar: 'file edit view insert format tools table',
                                toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | charmap emoticons | preview save print | insertfile image media link',
                                quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
                            }"
                            >
                            </editor>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="extContinue" :disabled="disabled" class="btn btn-primary">{{ text_button }}</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deputi-target" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tujuan Deputi</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-table m-table--head-bg-brand">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama Deputi</th>
                                    <th style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="deputi.length">
                                    <tr v-for="(value, index) in deputi" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.role.name }}</td>
                                        <td>
                                            <span class="m--font-danger context-menu" @click="confirmDeleteDeputi(value.id)">Hapus Deputi</span>
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
                        <div class="form-group m-form__group">
                            <label for="message-text" class="form-control-label">Pilih Deputi</label>
                            <div class="m-form__control">
                                <select2-multiple multiple
                                    :options="notInDeputi"
                                    v-model="addDeputi"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" @click="addDeputiPIC" class="btn btn-primary">{{ text_button }}</button>
                    </div>
                </div>
            </div>
        </div>
        <!--end::Modal-->
        <div class="modal fade" id="guest-file" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">File Pengaju</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-table m-table--head-bg-brand">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama</th>
                                    <th style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="vertical-align: middle;">1</td>
                                    <td style="vertical-align: middle;">Profil</td>
                                    <td>
                                        <span class="m--font-brand context-menu" @click="downloadAgencyProfile">Download</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="vertical-align: middle;">2</td>
                                    <td style="vertical-align: middle;">Proposal</td>
                                    <td>
                                        <span class="m--font-brand context-menu" @click="downloadProposal">Download</span>
                                    </td>
                                </tr>
                                <template v-if="isGoverment == 0">
                                    <tr>
                                        <td style="vertical-align: middle;">3</td>
                                        <td style="vertical-align: middle;">KTP</td>
                                        <td>
                                            <span class="m--font-brand context-menu" @click="downloadKTP">Download</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="vertical-align: middle;">4</td>
                                        <td style="vertical-align: middle;">NPWP</td>
                                        <td>
                                            <span class="m--font-brand context-menu" @click="downloadNPWP">Download</span>
                                        </td>
                                    </tr>
                                    <tr v-if="agency_category == 'Kementerian'">
                                        <td style="vertical-align: middle;">5</td>
                                        <td style="vertical-align: middle;">SIUP</td>
                                        <td>
                                            <span class="m--font-brand context-menu" @click="downloadSIUP">Download</span>
                                        </td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!--begin::Modal-->
        <div class="modal fade" id="modal-reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Form Tanggapan</h5>
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
        <div class="modal fade" id="modal-file-draft" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">File Draft</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-table m-table--head-bg-brand">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama</th>
                                    <th style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="modalDraftFile.length">
                                    <tr v-for="(value, index) in modalDraftFile" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.name }}</td>
                                        <td>
                                            <span class="m--font-brand context-menu" @click="downloadDraftFile(value.id)">Download File</span>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Pilih File Draft </label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" ref="file_deputi_informasi" @change="handleDraft">
                                <label class="custom-file-label" for="customFile" id="label_file_deputi_informasi">{{ draftLabel }}</label>
                            </div>
                            <span v-if="!$v.draftFile.required" class="m--font-danger">Field ini harus di isi</span>
                            <span v-else-if="!$v.draftFile.fileType" class="m--font-danger">Ektensi file harus .pdf</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="storeDraftFile" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-file-notulen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">File Notulen</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table m-table m-table--head-bg-brand">
                            <thead>
                                <tr>
                                    <th style="vertical-align: middle;">No</th>
                                    <th style="vertical-align: middle;">Nama</th>
                                    <th style="vertical-align: middle;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <template v-if="modalNotulenFile.length">
                                    <tr v-for="(value, index) in modalNotulenFile" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.name }}</td>
                                        <td>
                                            <span class="m--font-brand context-menu" @click="downloadNotulenFile(value.id)">Download File</span>
                                        </td>
                                    </tr>
                                </template>
                                <template v-else>
                                    <tr>
                                        <td colspan="3" class="text-center">Data Kosong</td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Pilih File Notulen </label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" ref="file_deputi_informasi" @change="handleNotulen">
                                <label class="custom-file-label" for="customFile" id="label_file_deputi_informasi">{{ notulenLabel }}</label>
                            </div>
                            <span v-if="!$v.notulenFile.required" class="m--font-danger">Field ini harus di isi</span>
                            <span v-else-if="!$v.notulenFile.fileType" class="m--font-danger">Ektensi file harus .pdf</span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" @click="storeNotulenFile" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';
import { required } from 'vuelidate/lib/validators';
import { fileType } from '@/validators';
import {gmapApi} from 'vue2-google-maps';
import Editor from '@tinymce/tinymce-vue';

export default {
    name: 'MOUProposalSubmissionCooperationDetailGuest',
    components: {
        Editor
    },
    data() {
        return {
            data_select: {
                time_period: [
                    {
                        id: 1,
                        name: '1 Tahun',
                    },
                    {
                        id: 2,
                        name: '2 Tahun',
                    },
                    {
                        id: 3,
                        name: '3 Tahun',
                    },
                    {
                        id: 4,
                        name: '4 Tahun',
                    },
                    {
                        id: 5,
                        name: '5 Tahun',
                    }
                ],
            },
            tabs: 1,
            addDeputi: [],
            text_button: 'Submit',
            notulenFile: null,
            notulenLabel: 'Choose file',
            draftFile: null,
            draftLabel: 'Choose file',
            disabled: false,
            forms: {
                reason: null,
                keterangan_pesan: null,
                id: null,
            },
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
                    path: `/mou/submission/cooperation/${this.$route.params.id}/detail/guest`
                },
            ],
            notInDeputi: [],
            deputi: [],
            nomor: [''],
            title_cooperation: null,
            title_cooperation_final: null,
            time_period_final: null,
            type_of_cooperation: null,
            type_of_cooperation_one: null,
            type_of_cooperation_two: null,
            country: null,
            province: null,
            regency: null,
            agency_category: null,
            agency_name: null,
            agency_address: null,
            isGoverment: null,
            background: null,
            latitude: null,
            longitude: null,
            status_disposition: null,
            tracking: [],
            status_barcode: null,
            roles: this.$store.state.user,
            modalDraftFile: [],
            modalNotulenFile: [],
        }
    },
    validations() {
        if(this.status_disposition == 12) {
            const tmpForm = {
                draftFile: {
                    required,
                    fileType: fileType('application/pdf'),
                },
                notulenFile: {
                    required,
                    fileType: fileType('application/pdf'),
                },
            };
        } else if(this.status_disposition == 15) {
            const tmpForm = {
                draftFile: {
                    fileType: fileType('application/pdf'),
                },
                notulenFile: {
                    fileType: fileType('application/pdf'),
                },
            }
        } else {
            const tmpForm = null;
        }

        return tmpForm;
    },
    computed: {
        google: gmapApi,
        bpd: function() {
            const data = this.tracking;

            const value = Object.values(data).splice(0, 1);

            let finalData = value.map((value, index) => {
                return {
                    id: index+1,
                    value: value.id,
                    class: value.approval == 3 ? 'danger' : value.approval == 1 ? 'success' : value.approval == 2 ? 'primary' : 'metal',
                    reason: value.reason,
                    name: value.role.name,
                }
            });

            return finalData;
        },
        sortDeputi: function() {
            const data = this.deputi;

            let finalData = data.map((value, index) => {
                return {
                    id: value.id,
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
            const label = ['Bagian Kerjasama', 'Bagian Ortala', 'Sesmen', 'Hukum', 'Sesmen Final', 'Menteri', 'Bagian Kerjasama Final']

            const value = Object.values(data).splice(1,8);

            let finalData = value.map((value, index) => {
                return {
                    id: index+1,
                    value: value.approval,
                    class: value.approval == 3 ? 'danger' : value.approval == 1 ? 'success' : value.approval == 2 ? 'primary' : 'metal',
                    reason: value.reason,
                    name: label[index],
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
    },
    created() {
        this.getData();
    },
    methods: {
        storeDraftFile() {
            let formData = new FormData();

            formData.append('id', this.$route.params.id);
            formData.append('draft', this.draftFile);

            $axiosFormData.post('/admin/store/file/guest/draft', formData)
            .then(response => {
                this.modalDraftFile = response.data.data;

                this.draftFile = null;
                this.draftLabel = 'Choose File';

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

                toastr.success(`File Draft Baru Berhasil di Tambahkan`);
            })
        },
        storeNotulenFile() {
            let formData = new FormData();

            formData.append('id', this.$route.params.id);
            formData.append('notulen', this.notulenFile);

            $axiosFormData.post('/admin/store/file/guest/notulen', formData)
            .then(response => {
                this.modalNotulenFile = response.data.data;

                this.notulenFile = null;
                this.notulenLabel = 'Choose File';

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

                toastr.success(`File Notulen Baru Berhasil di Tambahkan`);
            })
        },
        downloadDraftFile(id) {
            window.location.href = `/api/admin/download/file/guest/draft/${id}?token=${localStorage.getItem('token')}`;
        },
        downloadNotulenFile(id) {
            window.location.href = `/api/admin/download/file/guest/notulen/${id}?token=${localStorage.getItem('token')}`;
        },
        showModalGuestFileDraft() {
            $('#modal-file-draft').modal('show');
        },
        showModalGuestFileNotulen() {
            $('#modal-file-notulen').modal('show')
        },
        extContinue() {
            $axios.post(`/admin/submission/reason/continue/guest`, this.forms)
            .then(response => {
                this.disabled = true;
                this.text_button = 'Loading ...';
                $('#modal-continue').modal('hide');

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

                toastr.success(`Pengajuan Berhasil diteruskan`);

                this.$router.push({
                    name: 'MOUProposalSubmissionCooperationIndex'
                });
            })
            .catch(error => {
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

                toastr.error(`Pengajuan Gagal diteruskan`);
            })
            this.text_button = 'Submit';
            this.disabled = false;
        },
        showModalGuestFile() {
            $('#guest-file').modal('show');
        },
        downloadKTP() {
            window.location.href = `/api/admin/download/file/ktp/${this.$route.params.id}/guest?token=${localStorage.getItem('token')}`;
        },
        downloadNPWP() {
            window.location.href = `/api/admin/download/file/npwp/${this.$route.params.id}/guest?token=${localStorage.getItem('token')}`;
        },
        downloadSIUP() {
            window.location.href = `/api/admin/download/file/siup/${this.$route.params.id}/guest?token=${localStorage.getItem('token')}`;
        },
        downloadProposal() {
            window.location.href = `/api/admin/download/file/proposal/${this.$route.params.id}/guest?token=${localStorage.getItem('token')}`;
        },
        downloadAgencyProfile() {
           window.location.href = `/api/admin/download/file/agency/profile/${this.$route.params.id}/guest?token=${localStorage.getItem('token')}`;
        },
        nextTabs() {
            if(this.status_disposition == 11) {
                this.tabs = 2;
            } else if(this.status_disposition == 12) {
                this.tabs = 3;
            } else {
                this.tabs = 4;
            }
        },
        addDeputiPIC() {
            $axios.post(`/admin/deputi/pic/guest`, {
                id: this.$route.params.id,
                data: this.addDeputi,
            })
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

                toastr.success(`Data Berhasil di Perbaharui`);

                this.addDeputi = [];
            })
            .catch(error => {
                console.log(error);
            })
        },
        hapusDeputi(id) {
            $axios.delete(`/admin/deputi/pic/guest/${id}`)
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

                toastr.success(`Data Berhasil di Hapus`);

                this.addDeputi = [];
            })
            .catch(error => {
                console.log(error);
            })
        },
        confirmDeleteDeputi(id) {
            Swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data yang terhapus tidak bisa di kembalikan",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Hapus!',
                }).then((result) => {
                if (result.value) {
                    Swal.fire(
                        'Deleted!',
                        'Data Berhasil di Hapus.',
                        'success'
                    );
                    this.hapusDeputi(id);
                }
            })
        },
        modalEditDeputiPIC() {
            $('#deputi-target').modal('show');
        },
        downloadSummary() {
            window.location.href = `/api/admin/download/summary/cooperation/${this.$route.params.id}/guest/?token=${localStorage.getItem('token')}`;
        },
        hukum() {
            if(this.$v.draftFile.$invalid && this.$v.notulenFile.$invalid) {
                return true;
            } else {
                let formData = new FormData();

                formData.append('draft', this.draftFile);
                formData.append('notulen', this.notulenFile);

                $axiosFormData.post(`/admin/submission/cooperation/law/${this.$route.params.id}/guest`, formData)
                .then(response => {
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

                    toastr.success(`Data Berhasil di Perbaharui`);
                    this.$v.$reset();

                    this.$router.push({
                        name: 'MOUProposalSubmissionCooperationIndex'
                    });
                })
                .catch(error => {
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

                    toastr.error(`Data Gagal di Perbaharui`);
                })

            }
        },
        downloadFormatWord() {
            axios.get(`/api/admin/download/format/word/${this.$route.params.id}/guest`, {
                responseType: 'arraybuffer',
                headers: {
                    'Authorization': localStorage.getItem('token') != 'null' ? 'Bearer ' + localStorage.getItem('token') :'',
                    'Content-Type': 'application/json'
                }
            })
            .then(response => {
                this.downloadFileWord(response, 'Download Format Excel')
            })
        },
        downloadFileWord(response, filename) {
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
            if(this.$v.draftFile.$invalid) {
                return true;
            } else {
                let formData = new FormData();
                $.each(this.nomor, function(key, value) {
                    formData.append(`nomor[${key}]`, value);
                });
                formData.append('title_cooperation_final', this.title_cooperation_final);
                formData.append('time_period_final', this.time_period_final);

                $axiosFormData.post(`/admin/submission/cooperation/final/${this.$route.params.id}/guest`, formData)
                .then(response => {

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

                    toastr.success(`Data Berhasil di Perbaharui`);
                    this.$v.$reset();
                    this.$router.push({
                        name: 'MOUProposalSubmissionCooperationIndex'
                    });
                })
                .catch(error => {
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

                    toastr.error(`Data Gagal di Perbaharui`);
                });
                this.getData();
            }

        },
        handleExploreNotulenFinal() {
            this.$refs.notulenFinal.click();
        },
        handleExploreDraftFinal() {
            this.$refs.draftFinal.click();
        },
        handleNotulen(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.notulenFile = files[0];

            this.notulenLabel = files[0].name;
        },
        handleDraft(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.draftFile = files[0];

            this.draftLabel = files[0].name;
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

            this.notulenFile = files[0];
            this.notulenLabel = files[0].name;
        },
        uploadDraft(e) {
            let files = e.target.files || e.dataTransfer.files;

            this.draftFile = files[0];
            this.draftLabel = files[0].name;
        },
        getData() {
            $axios.get(`/admin/submission/cooperation/${this.$route.params.id}/detail/guest`)
            .then(response => {
                this.isGoverment = response.data.data.data.agencies.status;
                this.title_cooperation = response.data.data.data.title_cooperation;
                this.title_cooperation_final = response.data.data.data.title_cooperation;
                this.type_of_cooperation_one = response.data.data.data.type_of_cooperation_one == null ? "Kosong" : response.data.data.data.type_of_cooperation_one.name;
                this.type_of_cooperation_two = response.data.data.data.type_of_cooperation_two == null ? "Kosong" : response.data.data.data.type_of_cooperation_two.name;
                this.country = response.data.data.data.country.country_name;
                this.province = response.data.data.data.province == null ? "Kosong" : response.data.data.data.province.name;
                this.regency = response.data.data.data.regency == null ? "Kosong" : response.data.data.data.regency.name;
                this.agency_category = response.data.data.data.agencies.name;
                this.agency_name = response.data.data.data.agency_name;
                this.agency_address = response.data.data.data.address;
                // this.purpose_objectives = response.data.data.data.purpose_objectives;
                this.background = response.data.data.data.background;
                this.forms.id = response.data.data.data.id;
                this.latitude = parseFloat(response.data.data.data.latitude);
                this.longitude = parseFloat(response.data.data.data.longitude);
                this.tracking = response.data.data.data.tracking;
                this.status_disposition = response.data.data.data.status_disposition;
                this.status_barcode = response.data.data.data.status_barcode;
                this.deputi = response.data.data.data.deputi;
                this.notInDeputi = response.data.data.deputi_not_in
                this.modalDraftFile = response.data.data.data.draft;
                this.modalNotulenFile = response.data.data.data.notulen;
                this.time_period_final = response.data.data.data.time_period;
            });
        },
        showModalReject() {
            if(this.status_disposition == 11 && this.status_barcode == 0) {
                alert('Anda Belum Generate Barcode & Download Format Untuk Rapat');
            } else {
                this.forms.reason = '';

                $('#modal-reject').modal('show');
            }
        },
        showModalApprove() {
            if(this.status_disposition == 11 && this.status_barcode == 0) {
                alert('Anda Belum Generate Barcode & Download Format Untuk Rapat');
            } else {
                this.forms.reason = '';

                $('#modal-approve').modal('show');
            }
        },
        showModalContinue() {
            if(this.status_disposition == 11 && this.status_barcode == 0) {
                alert('Anda Belum Generate Barcode & Download Format Untuk Rapat');
            } else {
                this.forms.reason = '';

                $('#modal-continue').modal('show');
            }
        },
        approve() {
            $axios.post(`/admin/submission/reason/approve/guest`, this.forms)
            .then(response => {
                this.disabled = true;
                this.text_button = 'Loading ...';
                $('#modal-approve').modal('hide');

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

                toastr.success(`Pengajuan Berhasil diterima`);

                this.$router.push({
                    name: 'MOUProposalSubmissionCooperationIndex'
                });
            })
            .catch(error => {
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

                toastr.error(`Pengajuan Gagal diterima`);
            })
            this.text_button = 'Submit';
            this.disabled = false;
        },
        reject() {
            $axios.post(`/admin/submission/reason/reject/guest`, this.forms)
            .then(response => {
                this.disabled = true;
                this.text_button = 'Loading ...';
                $('#modal-reject').modal('hide');

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

                toastr.success(`Pengajuan Berhasil ditolak`);

                this.$router.push({
                    name: 'MOUProposalSubmissionCooperationIndex'
                });
            })
            .catch(error => {
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

                toastr.error(`Pengajuan Gagal ditolak`);
            })

            this.text_button = 'Submit';
            this.disabled = false;
        },
        generateBarcode(id) {
            $axios.get(`/admin/generate/barcode/${this.$route.params.id}/guest`)
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
                toastr.error(`Barcode Gagal di Generate`);
            })
        }
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

