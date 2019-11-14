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
                            <input type="text" class="form-control" v-model="forms.budget" @input="validate">
                        </div>
                        <span v-show="error" class="m--font-danger">{{ message }}</span>
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
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Permasalahan</label>
                        <div class="m-form__control">
                            <textarea class="form-control" cols="30" rows="10" v-model="forms.the_problem"></textarea>
                        </div>
                    </div>
                    <div class="form-group m-form__group">
                        <label for="Nama Lengkap">Upaya Penyelesaian Masalah</label>
                        <div class="m-form__control">
                            <textarea class="form-control" cols="30" rows="10" v-model="forms.problem_solving_efforts"></textarea>
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
                            <textarea v-model="forms.field_trip_information" class="form-control" cols="30" rows="10"></textarea>
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
                the_problem: null,
                problem_solving_efforts: null,
                field_trip_information: null,
                evaluation: null,
                recomendation: null,
            },
            evaluation: [
                'Sangat Tidak Memuaskan',
                'Tidak Memuaskan',
                'Sesuai Standar',
                'Memuaskan',
                'Sangat Memuaskan',
            ],
            recomendation: [
                'Diadendum',
                'Dihentikan',
                'Dilanjutkan'
            ],
            documentation: [''],
            data: {
                title_of_cooperation: null,
            },
            error: false,
            message: ''

        }
    },
    computed: {
        plainValue() {
            let val = 0;
            if (this.forms.budget) {
                val = parseInt(this.forms.budget.replace(/\./g, ''));
                return val;
            }
            return null;
        },
    },
    watch: {
        "forms.budget": function(newValue) {
            let result = newValue;
            if (newValue) {
                result = newValue.toString()
                .replace(/\D/g, '')
                .replace(/^[0]/g, '')
                .replace(/\B(?=(\d{3})+(?!\d))/g, '.');
            }
            this.forms.budget = result;
            this.$emit('input', this.plainValue);
        }
    },
    created() {
        this.getData();
    },
    methods: {
        validate() {
            const regex = new RegExp(/\D/g);
            const value = this.forms.budget.toString().replace(/\./g, '');

            if (!regex.test(value)) {
                this.message = '';
                this.error = false;
            } else {
                this.message = 'Hanya Boleh dengan Angka'
                this.error = true;
            }
        },
        store() {
            let formData = new FormData();

            formData.append('approval_old_submission_cooperation_id',this.forms.id);
            formData.append('implementation_of_activity_reports',this.forms.implementation_of_activity_reports);
            formData.append('activity_result',this.forms.activity_result);
            formData.append('year',this.forms.year);
            formData.append('budget',this.forms.budget);
            formData.append('target',this.forms.target);
            formData.append('achievements',this.forms.achievements);
            formData.append('field_trip_information',this.forms.field_trip_information);
            formData.append('evaluation',this.forms.evaluation);
            formData.append('recomendation',this.forms.recomendation);

            $.each(this.documentation, function(key, value) {
                formData.append(`documentation[${key}]`, value);
            });

            $axiosFormData.post(`/admin/monev/activity`, formData)
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

                if(response.data.status != 200) {
                    toastr.error(`${response.data.messages}`);
                } else {
                    toastr.success(`${response.data.messages}`);

                    this.$router.push({path: '/monev'});
                }
            })
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
