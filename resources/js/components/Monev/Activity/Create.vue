<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <div class="m-portlet">
            <div class="m-portlet__head" style="margin-bottom:20px;">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="la la-gear"></i>
                        </span>
                        <h3 class="m-portlet__head-text">
                            {{ data.title_of_cooperation }}
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Pelaksanaan Laporan Kegiatan</label>
                    <div class="m-form__control">
                        <v-select :options="year" v-model="forms.implementation_of_activity_reports" :placeholder="`Pilih Tahun Yang di Inginkan`"></v-select>
                        <input type="hidden" class="form-control" v-model="forms.id">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Hasil Kegiatan</label>
                    <div class="m-form__control">
                        <v-select :options="year" v-model="forms.activity_result" :placeholder="`Pilih Tahun Yang di Inginkan`"></v-select>
                    </div>
                </div>
                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                <div class="m-form__section">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Monitoring Administrasi Pelaksanaan MOU/PKS</h3>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Tahun</label>
                        <div class="m-form__control">
                            <input type="number" class="form-control" v-model="forms.year">
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Anggaran</label>
                        <div class="m-form__control">
                            <input type="text" class="form-control" v-model="forms.budget">
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Target</label>
                        <div class="m-form__control">
                            <textarea class="form-control" cols="30" rows="10" v-model="forms.target"></textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Capaian</label>
                        <div class="m-form__control">
                            <textarea class="form-control" cols="30" rows="10" v-model="forms.achievements"></textarea>
                        </div>
                    </div>
                </div>
                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                <div class="m-form__section">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Monitoring Keuangan Lapangan</h3>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Keterangan Kunjungan Lapangan</label>
                        <div class="m-form__control">
                            <input type="number" class="form-control" v-model="forms.field_trip_information">
                        </div>
                    </div>
                    <div v-for="(value, index) in documentation" :key="index">
                        <div class="form-group m-form__group">
                            <div class="text-right">
                                <i class="la la-plus fa-2x" @click="addExtraDocumentation" v-if="(index === documentation.length - 1)"/>
                                <i
                                    v-if="documentation.length >= 2 && index === documentation.length - 1"
                                    class="la la-minus fa-2x"
                                    @click="removeExtraDocumentation(index)"
                                />
                            </div>
                            <label for="exampleInputEmail1">Dokumentasi Ke - {{ index+1 }}</label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" ref="documentation" class="custom-file-input" id="customFile" @change="handleExtraDocumentation(index)">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="m-separator m-separator--dashed m-separator--lg"></div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Hasil Kegiatan</label>
                    <div class="m-form__control">
                        <v-select :options="evaluation" v-model="forms.evaluation" :placeholder="`Pilih Tahun Yang di Inginkan`"></v-select>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="Nama Lengkap">Rekomendasi</label>
                    <div class="m-form__control">
                        <v-select :options="recomendation" v-model="forms.recomendation" :placeholder="`Pilih Tahun Yang di Inginkan`"></v-select>
                    </div>
                </div>

                <div class="m-portlet__foot m-portlet__no-border m-portlet__foot--fit">
                    <div class="m-form__actions m-form__actions--solid">
                        <div class="row">
                            <div class="col-lg-5"></div>
                            <div class="col-lg-7">
                                <button type="submit" class="btn btn-brand">Submit</button>
                                <button type="reset" class="btn btn-secondary">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';

export default {
    name: 'MonevActivityCreate',
    data() {
        return {
            breadcrumbTitle: 'Monitoring Evaluasi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Monev',
                    path: '/monev'
                },
                {
                    id: 1,
                    label: 'Tambah Kegiatan Monev',
                    path: `/monev/activity/${this.$route.params.id}/create`
                }
            ],
            year: [
                'Tahun 1',
                'Tahun 2',
                'Tahun 3',
                'Tahun 4',
                'Tahun 5'
            ],
            forms: {
                implementation_of_activity_reports: null,
                id: null,
                activity_result: null,
                year: null,
                budget: null,
                target: null,
                achievements: null,
                field_trip_information: null,
                evaluation: null,
                recomendation: null,
            },
            evaluation: [
                {
                    code: 1,
                    label: 'Sangat Tidak Memuaskan',
                },
                {
                    code: 2,
                    label: 'Tidak Memuaskan',
                },
                {
                    code: 3,
                    label: 'Sesuai Standar',
                },
                {
                    code: 4,
                    label: 'Memuaskan',
                },
                {
                    code: 5,
                    label: 'Sangat Memuaskan',
                },
            ],
            recomendation: [
                {
                    code: 1,
                    label: 'Diadendum'
                },
                {
                    code: 2,
                    label: 'Dihentikan'
                },
                {
                    code: 3,
                    label: 'Dilanjutkan'
                }
            ],
            documentation: [''],
            data: {
                title_of_cooperation: null,
            }

        }
    },
    created() {
        this.getData();
    },
    methods: {
        store() {
        },
        removeExtraDocumentation(index) {
            this.documentation.splice(index, 1);
            this.$refs.documentation.splice(index, 1);
        },
        addExtraDocumentation() {
            this.documentation.push('');
        },
        handleExtraDocumentation(index) {
            let uploadedFiles = this.$refs.documentation[index].files[0];

            this.documentation[index] = uploadedFiles;
        },
        onDocumentChange() {
            let uploadedFiles = this.$refs.documentation.files[0];
        },
        getData() {
            $axios.get(`/admin/monev/activity/${this.$route.params.id}/create`)
            .then(response => {
                this.forms.id = response.data.data.id;
                this.data.title_of_cooperation = response.data.data.title_of_cooperation;
            })
        }
    }
}
</script>

<style>

</style>
