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
                <form @submit.prevent="update">
                    <div class="form-group m-form__group">
                        <label>Upload File MOU PKS</label>
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Pilih File" :value="MOULabel">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button" @click="handleExploreMOU">Browse</button>
                            </div>
                        </div>
                        <input type="file" class="custom-file-input" style="display:none;" ref="MOUFinal" id="customFile" @change="uploadMOU">
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
</template>
<script>
import { required } from 'vuelidate/lib/validators';
import DatePicker from 'vue2-datepicker';
import $axios from '@/api.js';
import $axiosFormData from '@/apiformdata.js';

export default {
    name: 'MonitoringEvaluasiEditFile',
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
                    label: 'Edit File Monitoring Evaluasi',
                    path: `/monev/${this.$route.params.id}/edit/file`
                }
            ],
            file: null,
            MOULabel: null,
        }
    },
    created() {
        this.getData();
    },
    methods: {
        getData() {
            $axios.get(`/admin/monev/${this.$route.params.id}/edit`)
            .then(response => {
                this.MOULabel = response.data.data.file;
            })
            .catch(error => {
            })
        },
        handleExploreMOU() {
            this.$refs.MOUFinal.click();
        },
        uploadMOU(e) {
            let files = e.target.files || e.dataTransfer.files;

            this.file = files;

            this.MOULabel = this.$refs.MOUFinal.value;
        },
        update() {
            let formData = new FormData();
            formData.append('file', this.file[0]);

            $axiosFormData.post(`/admin/monev/old/file/mou/${this.$route.params.id}`, formData)
            .then(response => {
                this.$router.push({
                    name: 'MonitoringEvaluasiIndex',
                })
            })
            .catch(error => {
                console.log(error);
            });
        }
    }
}
</script>
