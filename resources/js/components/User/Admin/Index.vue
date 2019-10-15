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
                            <span>Daftar Admin</span>
                        </h2>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <router-link to="/user/admin/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Admin'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Admin</span>
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
                    <tbody v-if="this.$store.getters['admin/getData'].length != 0">
                        <tr v-for="(item, index) in this.$store.getters['admin/getData']" :key="item.id">
                            <td>{{ index+1 }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.jabatan }}</td>
                            <td>
                                <router-link :to="{name: 'UserAdminEdit', params: { id: item.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit User'">
                                    <span>
                                        <i class="la la-pencil"></i>
                                        <span>Edit User</span>
                                    </span>
                                </router-link>
                                <button @click="destroy" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Delete User'">
                                    <span>
                                        <i class="la la-pencil"></i>
                                        <span>Delete User</span>
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
export default {
    name: "UserAdminIndex",
    data() {
        return {
            breadcrumbTitle: 'Admin',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Admin',
                    path: '/user/admin'
                },
            ]
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['admin/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['admin/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['admin/getShowNotification'];
        }
    },
    created() {
        this.$store.dispatch('admin/indexAdmin');
    },
    methods: {
        destroy(id) {
            this.$store.dispatch('admin/destroyAdmin', id);
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
