<template>
    <div>
        <breadcrumb :data="breadcrumbIndex.link" :title="breadcrumbTitle"></breadcrumb>
        <notification-success v-show="getShowNotification" :data="getMessage" v-if="getStatusatusCode == 200"></notification-success>
        <notification-error v-show="getShowNotification" :data="getMessage" v-else></notification-error>
        <div class="m-portlet m-portlet--full-height ">
            <div class="m-portlet__head">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Daftar FAQ
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <li class="m-portlet__nav-item m-dropdown m-dropdown--inline m-dropdown--arrow m-dropdown--align-right m-dropdown--align-push" m-dropdown-toggle="hover" aria-expanded="true">
                            <a href="#" class="m-portlet__nav-link m-portlet__nav-link--icon m-portlet__nav-link--icon-xl">
                                <i class="la la-ellipsis-h m--font-brand"></i>
                            </a>
                            <div class="m-dropdown__wrapper" style="z-index: 101;">
                                <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust" style="left: auto; right: 21.5px;"></span>
                                <div class="m-dropdown__inner">
                                    <div class="m-dropdown__body">
                                        <div class="m-dropdown__content">
                                            <ul class="m-nav">
                                                <li class="m-nav__section m-nav__section--first">
                                                    <span class="m-nav__section-text">Quick Actions</span>
                                                </li>
                                                <li class="m-nav__item">
                                                    <router-link to="/faq/create" class="m-nav__link">
                                                        <i class="m-nav__link-icon la la-plus"></i>
                                                        <span class="m-nav__link-text">Tambah FAQ</span>
                                                    </router-link>
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
            <div class="m-portlet__body">

                <!--begin::Content-->
                <div class="tab-content">
                    <div class="tab-pane active show" id="m_widget5_tab3_content" aria-expanded="false">

                        <!--begin::m-widget5-->
                        <div class="m-widget5" v-if="this.$store.getters['faq/getData'].length != 0">
                            <div class="m-widget5__item" v-for="value in this.$store.getters['faq/getData']" :key="value.id">
                                <div class="m-widget5__content">
                                    <div class="m-widget5__section">
                                        <h4 class="m-widget5__title">
                                            {{ value.question }}?
                                        </h4>
                                        <span class="m-widget5__desc">
                                            {{ value.answere }}
                                        </span>
                                    </div>
                                </div>
                                <div class="m-widget5__content">
                                    <div class="m-widget5__stats1">
                                        <router-link :to="{name: 'FaqEdit', params: { id: value.id }}" class="btn m-btn btn-success btn-sm  m-btn--icon m-btn--pill icon-only">
                                            <span>
                                                <i class="la la-pencil"></i>
                                                <span>Edit FAQ</span>
                                            </span>
                                        </router-link>
                                        <button @click="confirmDelete(value.id)" class="btn m-btn btn-danger btn-sm  m-btn--icon m-btn--pill icon-only">
                                            <span>
                                                <i class="la la-trash"></i>
                                                <span>Hapus FAQ</span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="m-widget5" v-else>
                            <span class="m--font-danger text-center">Data Kosong</span>
                        </div>
                        <!--end::m-widget5-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'FaqIndex',
    props: ['data', 'title'],
    computed: {
        breadcrumbTitle()
        {
            return this.$store.getters['faq/breadcrumbTitle'];
        },
        breadcrumbIndex()
        {
            return this.$store.getters['faq/breadcrumbIndex'];
        },
        getMessage()
        {
            return this.$store.getters['faq/getMessage'];
        },
        getStatusatusCode()
        {
            return this.$store.getters['faq/getStatusCode'];
        },
        getShowNotification()
        {
            return this.$store.getters['faq/getShowNotification'];
        }
    },
    created() {
        this.$store.dispatch('faq/index');
    },
    methods: {
        confirmDelete(id)
        {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
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
        destroy(id) {
            this.$store.dispatch('faq/destroy', id);
        }
    }
}
</script>
