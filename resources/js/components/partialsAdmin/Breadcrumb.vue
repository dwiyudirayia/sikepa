<template>
    <div class="m-subheader ">
        <div class="d-flex align-items-center">
            <div class="mr-auto">
                <h3 class="m-subheader__title m-subheader__title--separator">{{ title }}</h3>
                <ul class="m-subheader__breadcrumbs m-nav m-nav--inline" v-for="(value, index) in data" :key="index">
                    <li class="m-nav__separator">-</li>
                    <li class="m-nav__item">
                        <router-link :to="value.path" class="m-nav__link">
                            <span class="m-nav__link-text">{{ value.label }}</span>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: 'Breadcrumb',
    props: ['data', 'title'],
}
</script>

<style>

</style>
