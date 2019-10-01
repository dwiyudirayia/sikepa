<template>
    <select>
        <slot></slot>
    </select>
</template>

<script>
export default {
    name: 'Select2',
    props: ['options', 'value'],
    mounted: function () {
        var vm = this
        let section = $.map(this.options, function (obj) {
            obj.id = obj.id;
            obj.text = obj.name;

            return obj;
        });
        $(this.$el)
        .select2({
            data: section,
            placeholder: 'Pilih dan Sesuaikan',
            width: '100%',
            allowClear:true
        })
        .val(this.value)
        .trigger('change')
        // emit event on change.
        .on('change', function () {
            vm.$emit('input', this.value)
        })
        $(this.$el).val('').trigger('change.select2');
    },
    watch: {
        value: function (value) {
            // update value
            $(this.$el)
            .val(value)
            .trigger('change')
        },
        options: function (options) {
            let section = $.map(options, function (obj) {
                obj.id = obj.id;
                obj.text = obj.name;

                return obj;
            });
            $(this.$el).empty().select2({
                data: section,
                placeholder: 'Pilih dan Sesuaikan',
                width: '100%',
                allowClear:true
            })
            $(this.$el).val('').trigger('change.select2');
        }
    },
    destroyed: function () {
        $(this.$el).off().select2('destroy')
    }
}
</script>

<style>

</style>
