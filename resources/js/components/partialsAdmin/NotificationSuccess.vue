<template>
    <div class="m-alert m-alert--icon alert m-alert--square alert-success m--margin-bottom-25" role="alert">
        <div class="m-alert__icon">
            <i class="la la-check-circle-o"></i>
        </div>
        <div class="m-alert__text">
            <strong>Berhasil!</strong> {{ data }}
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NotificationSuccess',
    props: ['data']
}
</script>
