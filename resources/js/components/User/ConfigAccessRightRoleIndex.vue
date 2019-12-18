<template>
    <div>
        <breadcrumb :data="breadcrumbLink" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
        <div class="m-portlet">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Hak Akses
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools" v-if="$can('Admin')">
                    <router-link to="/config/access/right/role/create" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Tambah Role'">
                        <span>
                            <i class="la la-plus"></i>
                            <span>Tambah Role</span>
                        </span>
                    </router-link>
                </div>
            </div>
            <div class="m-portlet__body">
                <ul class="nav nav-tabs  m-tabs-line m-tabs-line--primary" role="tablist">
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_tabs_8_1" role="tab"><i class="fa fa-user-cog"></i> Daftar Role</a>
                    </li>
                    <li class="nav-item m-tabs__item">
                        <a class="nav-link m-tabs__link" data-toggle="tab" href="#m_tabs_8_3" role="tab"><i class="fa fa-users-cog"></i> Daftar Hak Akses</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="m_tabs_8_1" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Nama</th>
                                        <th style="vertical-align: middle;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, index) in this.$store.getters['accessright/getData'].roles" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index+1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.name }}</td>
                                        <td style="vertical-align: middle;">
                                            <router-link v-if="$can('Admin')" :to="{name: 'ConfigAccessRightRoleEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Edit Role'">
                                                <span>
                                                    <i class="la la-pencil"></i>
                                                    <span>Edit Role</span>
                                                </span>
                                            </router-link>
                                            <button v-if="$can('Admin')" @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only" v-tooltip.top="'Untuk Delete User'" v-show="value.id >= 10 ? true : false">
                                                <span>
                                                    <i class="la la-trash"></i>
                                                    <span>Delete Role</span>
                                                </span>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane" id="m_tabs_8_3" role="tabpanel">
                        <div class="table-responsive">
                            <table class="table m-table m-table--head-bg-brand">
                                <thead>
                                    <tr>
                                        <th style="vertical-align: middle;">No</th>
                                        <th style="vertical-align: middle;">Nama</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(value, index) in this.$store.getters['accessright/getData'].permissions" :key="value.id">
                                        <td style="vertical-align: middle;">{{ index + 1 }}</td>
                                        <td style="vertical-align: middle;">{{ value.name }}</td>
                                    </tr>
                                </tbody>
                            </table>
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
    name: 'ConfigAccessRightRoleIndex',
    data() {
        return {
            breadcrumbTitle: 'Hak Akses',
            breadcrumbLink: [
                {
                    id: 1,
                    label: 'Daftar Role & Hak Akses',
                    path: '/config/access/rights'
                },
            ],
        }
    },
    computed: {
        getMessage()
        {
            return this.$store.getters['accessright/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['accessright/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['accessright/getShowNotification'];
        },
    },
    created() {
        this.$store.dispatch('accessright/index');
    },
    methods: {
        destroy(id) {
            $axios.delete(`access/right/role/${id}`)
            .then(response => {
                this.$store.commit('accessright/updateData', response);
                this.$store.commit('accessright/notification', response);
            })
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
    }
}
</script>

<style>

</style>
