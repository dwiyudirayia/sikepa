
<template>
    <div class="m-alert m-alert--icon alert m-alert--square alert-danger m--margin-bottom-25" role="alert">
        <div class="m-alert__icon">
            <i class="la la-exclamation-circle"></i>
        </div>
        <div class="m-alert__text">
            <strong>Gagal!</strong> Bla Bla Bla ...
        </div>
        <div class="m-alert__close">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: 'NotificationError',
}
</script>
