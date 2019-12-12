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
                            Tambah Informasi Deputi
                        </h3>
                    </div>
                </div>
                <!-- <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl m-dropdown__toggle">
                                <i class="la la-ellipsis-h m--font-brand"></i>
                            </a>
                            <div class="m-dropdown__wrapper">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__item">
                                                    <a class="m-nav__link" v-tooltip.top="'Lihat Daftar File'" @click="showModalFile">
                                                        <i class="m-nav__link-icon la la-file"></i>
                                                        <span class="m-nav__link-text">File</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div> -->
            </div>
            <form class="m-form m-form--fit" @submit.prevent="store">
                <div class="form-group m-form__group">
                    <label>Judul</label>
                    <div class="m-form__control">
                        <input type="text" v-model="$v.forms.title.$model" class="form-control" @blur="$v.forms.title.$touch()">
                    </div>
                    <template v-if="$v.forms.title.$error">
                        <span v-if="!$v.forms.title.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label>Text Pada Layanan Kontak</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="$v.forms.text_contact.$model" class="form-control" @blur="$v.forms.text_contact.$touch()"></textarea>
                    </div>
                    <template v-if="$v.forms.text_contact.$error">
                        <span v-if="!$v.forms.text_contact.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Photo Layanan Kontak</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" ref="photo_contact" @change="photoContact">
                        <label class="custom-file-label" for="customFile" id="label_photo_contact">Choose file</label>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label>Full Text Informasi Deputi</label>
                    <div class="m-form__control">
                        <editor
                            api-key="dzzffhe3e7rwi6o0yhr653apjdpwu2uyld4x4xppx02diki8"
                            v-model="$v.forms.full_text_information.$model"
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
                    <template v-if="$v.forms.full_text_information.$error">
                        <span v-if="!$v.forms.full_text_information.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label>Text Pada Informasi Deputi</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="$v.forms.text_information.$model" class="form-control" @blur="$v.forms.text_information.$touch()"></textarea>
                    </div>
                    <template v-if="$v.forms.text_information.$error">
                        <span v-if="!$v.forms.text_information.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Photo Informasi</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" ref="photo_information" @change="photoInformation">
                        <label class="custom-file-label" for="customFile" id="label_photo_information">Choose file</label>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label>Text Pada Syarat Kerjasama</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="$v.forms.text_requirement.$model" class="form-control" @blur="$v.forms.text_requirement.$touch()"></textarea>
                    </div>
                    <template v-if="$v.forms.text_requirement.$error">
                        <span v-if="!$v.forms.text_requirement.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                    <br>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Photo Syarat Kerjasama</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" ref="photo_requirement" @change="photoRequirement">
                        <label class="custom-file-label" for="customFile" id="label_photo_requirement">Choose file</label>
                    </div>
                </div>
                <div class="form-group m-form__group">
                    <label>Text Pada Video Tutorial</label>
                    <div class="m-form__control">
                        <textarea type="text" v-model="$v.forms.text_video.$model" class="form-control" @blur="$v.forms.text_video.$touch()"></textarea>
                    </div>
                    <template v-if="$v.forms.text_video.$error">
                        <span v-if="!$v.forms.text_video.required" class="m--font-danger">Field Ini Harus di Isi</span>
                    </template>
                </div>
                <div class="form-group m-form__group">
                    <label for="exampleInputEmail1">Video Tutorial</label>
                    <div></div>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="customFile" ref="photo_video" @change="photoVideo">
                        <label class="custom-file-label" for="customFile" id="label_photo_video">Choose file</label>
                    </div>
                </div>
                <div class="m-form__seperator m-form__seperator--dashed"></div>
                <div class="m-form__section m-form__section--last">
                    <div class="m-form__heading">
                        <h3 class="m-form__heading-title">Tambahan File</h3>
                    </div>
                    <div
                        v-for="(item, index) in name_file_deputi" :key="index"
                    >
                        <div class="form-group m-form__group">
                            <div class="text-right">
                                <i
                                    v-if="index == name_file_deputi.length - 1"
                                    class="la la-plus fa-2x"
                                    @click="addExtraFile"
                                />
                                <i
                                    v-if="name_file_deputi.length != 1"
                                    class="la la-minus fa-2x"
                                    @click="removeExtraFile(index)"
                                />
                            </div>
                            <label for="exampleInputEmail1">Nama File</label>
                            <div class="m-form__control">
                                <input type="text" v-model="name_file_deputi[index]" class="form-control">
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Pilih File Deputi Informasi </label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" ref="file_deputi_informasi" @change="fileDeputiInfomasi(index)">
                                <label class="custom-file-label" for="customFile" :id="`label_file_deputi_informasi_${index}`">Choose file</label>
                            </div>
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
        <!-- <div class="modal fade" id="file-deputi-information" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 9999999;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">File Informasi Deputi</h5>
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
                                <template v-if="file_deputi_information.length">
                                    <tr v-for="(value, index) in file_deputi_information" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.name }}</td>
                                        <td>
                                            <span class="m--font-danger" @click="hapusDeputiInformation(value.id)">Hapus Deputi</span>
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
                            <label for="exampleInputEmail1">Nama File</label>
                            <div class="m-form__control">
                                <input type="text" v-model="file_deputi.name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group m-form__group">
                            <label for="exampleInputEmail1">Pilih File Deputi Informasi </label>
                            <div></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="customFile" ref="file_deputi_informasi" @change="fileDeputiInfomasi">
                                <label class="custom-file-label" for="customFile" id="label_file_deputi_informasi">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</template>

<script>
import { required } from 'vuelidate/lib/validators';
import Editor from '@tinymce/tinymce-vue';
import $axiosFormData from '@/apiformdata';

export default {
    name: 'DeputiInformationCreate',
    components: {
        Editor
    },
    data() {
        return {
            breadcrumbTitle: 'Informasi Deputi',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Informasi Deputi',
                    path: '/deputy/information'
                },
                {
                    id: 2,
                    label: 'Tambah Informasi Deputi',
                    path: '/deputy/information/create'
                },
            ],
            name_file_deputi: [''],
            file_file_deputi: [''],
            forms: {
                title: null,
                text_contact: null,
                photo_contact: null,
                photo_information: null,
                text_information: null,
                full_text_information: null,
                photo_requirement: null,
                text_requirement: null,
                photo_video: null,
                text_video: null,
            }
        }
    },
    validations: {
        forms: {
            title: {
                required,
            },
            full_text_information: {
                required
            },
            text_contact: {
                required,
            },
            text_information: {
                required,
            },
            text_requirement: {
                required,
            },
            text_video: {
                required,
            },
        }
    },
    methods: {
        fileDeputiInfomasi(index) {
            this.file_file_deputi[index] = this.$refs.file_deputi_informasi[index].files[0];

            $(`#label_file_deputi_informasi_${index}`).html(this.$refs.file_deputi_informasi[index].value);
        },
        addExtraFile() {
            this.name_file_deputi.push('');
            this.file_file_deputi.push('');
        },
        removeExtraFile(index) {
            if(index == 0) {
            this.name_file_deputi = [''];
            this.file_file_deputi = [''];
            } else {
                this.name_file_deputi.splice(index, 1);
                this.file_file_deputi.splice(index, 1);
            }
        },
        photoContact(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.forms.photo_contact = files[0];

            $('#label_photo_contact').html(this.$refs.photo_contact.value);
        },
        photoInformation(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.forms.photo_information = files[0];

            $('#label_photo_information').html(this.$refs.photo_information.value);
        },
        photoRequirement(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.forms.photo_requirement = files[0];

            $('#label_photo_requirement').html(this.$refs.photo_requirement.value);
        },
        photoVideo(e) {
            let files = e.target.files || e.dataTransfer.files;
            this.forms.photo_video = files[0];

            $('#label_photo_video').html(this.$refs.photo_video.value);
        },
        store() {
            this.$v.forms.$touch();

            let formData = new FormData();
            formData.append('title', this.forms.title);
            formData.append('text_contact', this.forms.text_contact);
            formData.append('photo_contact', this.forms.photo_contact);
            formData.append('photo_information', this.forms.photo_information);
            formData.append('text_information', this.forms.text_information);
            formData.append('photo_requirement', this.forms.photo_requirement);
            formData.append('text_requirement', this.forms.text_requirement);
            formData.append('photo_video', this.forms.photo_video);
            formData.append('text_video', this.forms.text_video);

            this.name_file_deputi.forEach((value, index) => {
                formData.append(`name[${index}]`, value)
            });

            this.file_file_deputi.forEach((value, index) => {
                formData.append(`file[${index}]`, value);
            })

            if(this.$v.forms.$invalid) {
                return;
            } else {
                $axiosFormData.post(`/admin/deputi/information`, formData)
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
                        name: 'DeputiInformationIndex'
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
                    toastr.error(`${response.data.messages}`);
                })
            }
        }
    },

}
</script>

<style>

</style>
