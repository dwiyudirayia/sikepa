<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
        <div class="m-portlet m-portlet--creative m-portlet--bordered-semi">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <span class="m-portlet__head-icon m--hide">
                            <i class="flaticon-statistics"></i>
                        </span>
                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                            <span>Daftar Testimoni</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/testimoni/create" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Testimoni'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Testimoni</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body no-pedding">
                <div class="list-section">
                    <div class="list-section__item" v-for="value in this.$store.getters['testimoni/getData']" :key="value.id">
                        <div class="section__content image-box">
                            <div class="section__widget">
                                <div class="section__img">
                                    <img :src="`testimoni/${value.photo}`" style="background-size: cover; background-position: center center;" class="thumbnail-img"/>
                                    <!-- <div class="thumbnail-img" style="background-image: url(&quot;assets/app/media/img/products/product11.jpg&quot;); background-size: cover; background-position: center center;">
                                        <img src="assets/app/media/img/products/product11.jpg" style="display: none;">
                                    </div> -->
                                </div>
                            </div>
                            <div class="section__desc">
                                <h5 class="section__title">{{ value.testimoni }}</h5>
                                <div class="section__status">
                                    <span class="m-badge m-badge--brand m-badge--wide" v-if="value.active == 0">Draft</span>
                                    <span class="m-badge m-badge--success m-badge--wide" v-else>Publish</span>
                                </div>
                            </div>
                        </div>
                        <div class="section__action">
                            <div class="list__section__action">
                                <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm m-btn--icon m-btn--pill m-btn--air icon-only">
                                    <span>
                                        <i class="la la-trash"></i>
                                        <span>Hapus Testimoni</span>
                                    </span>
                                </button>
                                <router-link :to="{name: 'TestimoniEdit', params: {id: value.id}}" class="btn m-btn btn-success btn-sm m-btn--icon m-btn--pill m-btn--air icon-only">
                                    <span>
                                        <i class="la la-pencil"></i>
                                        <span>Edit Testimoni</span>
                                    </span>
                                </router-link>
                                <button @click="changeStatus(value.id)" class="btn m-btn btn-primary btn-sm m-btn--icon m-btn--pill m-btn--air icon-only">
                                    <span>
                                        <i class="la la-check" v-if="value.active == 1"></i>
                                        <i class="la la-close" v-else></i>
                                        <span>Ganti Status</span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import $axios from '@/api.js';
export default {
    name: 'TestimoniIndex',
    data() {
        return {
            breadcrumbTitle: 'Testimoni',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Testimoni',
                    path: '/testimoni'
                },
            ]
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['testimoni/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['testimoni/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['testimoni/getShowNotification'];
        }
    },
    created() {
        this.$store.dispatch('testimoni/index');
    },
    methods: {
        destroy(id) {
            this.$store.dispatch('testimoni/destroyTestimoni', id);
        },
        confirmDelete(id)
        {
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
                        'Your file has been deleted.',
                        'success'
                    );
                    this.destroy(id);
                }
            })
        },
        changeStatus(id) {
            $axios.put(`/admin/testimoni/change/status/${id}`)
            .then(response => {
                this.$store.dispatch('testimoni/index');

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

                toastr.success(`Berhasil Update Status`);
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

                toastr.error(`Gagal Update Status`);
            })
        }
    }
}
</script>
