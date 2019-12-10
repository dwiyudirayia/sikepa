<template>
    <select class="form-control">
        <slot></slot>
    </select>
</template>

<script>
export default {
    name: 'Select2',
    props: ['options', 'value'],
    mounted: function () {
        var data = $.map(this.options, function (obj) {
            obj.id = obj.id;
            obj.text = obj.name || obj.country_name;

            return obj;
        });
        var vm = this
        $(this.$el)
            .val(this.value)
            // init select2
            .select2({
                placeholder: 'Pilih dan Sesuaikan',
                data: data,
                width: '100%',
            })
            // emit event on change.
            .on('change', function () {
                vm.$emit('input', $(this).val())
            })
    },
    watch: {
        value: function (value) {
            // update value
            $(this.$el).val(value)
        },
        options: function (newVal, oldVal) {
            // update options
            var data = $.map(newVal, function (obj) {
                obj.id = obj.id;
                obj.text = obj.name || obj.country_name;

                return obj;
            });

            $(this.$el).select2({
                placeholder: 'Pilih dan Sesuaikan',
                data: data,
                width: '100%',
            })
        }
    },
    destroyed: function () {
        $(this.$el).off().select2('destroy')
    }
}
</script>
