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
                        <!-- <h3 class="m-portlet__head-text">
                            Portlet sub title goes here
                        </h3> -->
                        <h2 class="m-portlet__head-label m-portlet__head-label--success">
                            <span>Daftar Satker & Sesmen</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/user/satker/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Satker & Sesmen'">
                        <span>
                            <i class="la la-plus"></i>
                        <span>Tambah Satker & Sesmen</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <table class="table table-striped- table-bordered table-hover" style="width:100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody v-if="this.$store.getters['satker/getData'].length != 0">
                        <tr v-for="(item, index) in this.$store.getters['satker/getData']" :key="item.id">
                            <td>{{ index+1 }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.jabatan }}</td>
                            <td>
                                <router-link v-if="$can('Edit User')" :to="{name: 'UserSatkerEdit', params: { id: item.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit User'">
                                    <span>
                                        <i class="la la-pencil"></i>
                                        <span>Edit User</span>
                                    </span>
                                </router-link>
                                <button v-if="$can('Hapus User')" @click="confirmDelete(item.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Delete User'">
                                    <span>
                                        <i class="la la-trash"></i>
                                        <span>Delete User</span>
                                    </span>
                                </button>
                                <button v-if="$can('Ganti Status User')" @click="changeStatus(item.id)" class="btn m-btn btn-primary btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Ganti Status User'">
                                    <span>
                                        <i v-if="item.active == 1" class="la la-check"></i>
                                        <i v-else class="la la-close"></i>
                                        <span>Ganti Status User</span>
                                    </span>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody v-else>
                        <tr>
                            <td colspan="4" class="text-center">Data Tidak Ada</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import $axios from '@/api.js';
import store from '@/store/store.js';

export default {
    name: "UserSatkerIndex",
    data() {
        return {
            breadcrumbTitle: 'Satker & Sesmen',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Satker & Sesmen',
                    path: '/user/satker'
                },
            ]
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['satker/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['satker/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['satker/getShowNotification'];
        }
    },
    created() {
        this.$store.dispatch('satker/indexAdmin');
    },
    methods: {
        changeStatus(id) {
            $axios.get(`/admin/satker/change/status/${id}`).
            then(response => {
                this.$store.commit('satker/updateData', response);
                this.$store.commit('satker/notification', response);
            });

            setTimeout(function(){
                store.commit('satker/hideNotification');
            }, 5000);
        },
        destroy(id) {
            this.$store.dispatch('satker/destroyAdmin', id);
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
                confirmButtonText: 'Yes, Hapus!'
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
    }
}
</script>

<style>

</style>
