<template>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <ul>
            <li v-for="(value, key, index) in validationErrors" :key="index">{{ value }}</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: 'NotificationValidation',
    props: ['data'],
    computed: {
        validationErrors(){
            let errors = Object.values(this.data);
            errors = errors.flat();
            return errors;
        }
    }
}
</script>
