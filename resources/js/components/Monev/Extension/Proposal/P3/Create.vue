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
                            Tambah Kegiatan
                        </h3>
                    </div>
                </div>
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Judul Kegiatan</label>
                    <div class="m-form__control">
                        <input type="text" class="form-control" v-model="forms.title_activity">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Tanggal Kegiatan</label>
                    <div class="m-form__control">
                        <date-picker v-model="forms.implementation_date" valueType="format"  style="width: 100%;" lang="en"></date-picker>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Lokasi</label>
                    <div class="m-form__control">
                        <input type="text" class="form-control" v-model="forms.location">
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label>Deskripsi Kegiatan</label>
                    <div class="m-form__control">
                        <textarea class="form-control" cols="30" rows="10" v-model="forms.description_activities"></textarea>
                    </div>
                </div>
                <div class="m-form__group form-group">
                    <label for="">Nilai Kegiatan</label>
                    <div class="m-radio-inline">
                        <label class="m-radio">
                            <input type="radio" v-model="forms.result_status" value="1"> Rekomendasi
                            <span></span>
                        </label>
                        <label class="m-radio">
                            <input type="radio" v-model="forms.result_status" value="0"> Tidak
                            <span></span>
                        </label>
                    </div>
                </div>
                <div
                    v-for="(item, index) in forms.file" :key="index"
                >
                    <div class="form-group m-form__group">
                        <div class="text-right">
                            <i
                                v-if="index == forms.file.length - 1"
                                class="la la-plus fa-2x"
                                @click="addExtraFile"
                            />
                            <i
                                v-if="forms.file.length != 1"
                                class="la la-minus fa-2x"
                                @click="removeExtraFile(index)"
                            />
                        </div>
                        <label for="exampleInputEmail1">Pilih File Dokumentasi</label>
                        <div></div>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" ref="file_monev_activity" @change="fileDocumentation(index)">
                            <label class="custom-file-label" for="customFile" :id="`label_file_monev_activity_${index}`">Choose file</label>
                        </div>
                    </div>
                </div>
                <br>
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
// import { required, email } from 'vuelidate/lib/validators';
import $axiosFormData from '@/apiformdata.js';
import DatePicker from 'vue2-datepicker';
DatePicker.methods.displayPopup = function () {
  this.position = {
    left: 0,
    top: '100%'
  }
}
export default {
    name: 'ExtensionMonevActivityP3Create',
    components: {
        DatePicker
    },
    data() {
        return {
            forms: {
                title_activity: null,
                implementation_date: null,
                location: null,
                description_activities: null,
                result_status: null,
                file: [''],
            },
            budget: {
                message: null,
                error: false,
            },
            breadcrumbTitle: 'Pengajuan Kerjasama',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Monev',
                    path: '/monev/extension'
                },
                {
                    id: 2,
                    label: 'Tambah Kegiatan P3',
                    path: `/monev/extension/activity/${this.$route.params.id}/p3/create`
                },
            ],
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
    methods: {
        store() {
            let formData = new FormData();
            formData.append('id', this.$route.params.id);
            formData.append('title_activity', this.forms.title_activity);
            formData.append('implementation_date', this.forms.implementation_date);
            formData.append('location', this.forms.location);
            formData.append('description_activities', this.forms.description_activities);
            formData.append('result_status', this.forms.result_status);
            // formData.append('budget', this.forms.budget);
            // formData.append('target', this.forms.target);
            // formData.append('reach', this.forms.reach);
            // formData.append('problem', this.forms.problem);
            // formData.append('problem_solving', this.forms.problem_solving);
            // formData.append('report', this.forms.report);

            this.forms.file.forEach((value, index) => {
                formData.append(`file[${index}]`, value)
            });
            $axiosFormData.post(`/admin/extension/monev/activity/guest`, formData)
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
                toastr.success(`${response.data.messages}`);

                this.$router.push({
                    path: '/monev/extension'
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
                toastr.error(`Data Gagal di Tambahkan`);
            })
        },
        fileDocumentation(index) {
            this.forms.file[index] = this.$refs.file_monev_activity[index].files[0];

            $(`#label_file_monev_activity_${index}`).html(this.$refs.file_monev_activity[index].value);
        },
        addExtraFile() {
            this.forms.file.push('');
        },
        removeExtraFile(index) {
            if(index == 0) {
                this.forms.file = [''];
            } else {
                this.forms.file.splice(index, 1);
            }
        },
    }
}
</script>

<style>

</style>
