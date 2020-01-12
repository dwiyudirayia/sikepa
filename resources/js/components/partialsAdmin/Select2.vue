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
            obj.text = obj.name || obj.country_name || obj.title_cooperation;

            return obj;
        });
        var vm = this
        $(this.$el)
            // init select2
            .select2({
                placeholder: 'Pilih dan Sesuaikan',
                data: data,
                width: '100%'
            })
            .val(this.value)
            .trigger('change')
            // emit event on change.
            .on('change', function () {
                vm.$emit('input', this.value)
                // vm.$emit('changeData', this.value)
            })
    },
    watch: {
        value: function (value) {
            // update value
            $(this.$el)
            .val(value)
            .trigger('change')
        },
        options: function (newVal, oldVal) {
            // update options
            var data = $.map(newVal, function (obj) {
                obj.id = obj.id;
                obj.text = obj.name || obj.country_name || obj.title_cooperation;

                return obj;
            });

            $(this.$el).empty().select2({
                placeholder: 'Pilih dan Sesuaikan',
                data: data,
                width: '100%'
            })
            $(this.$el).val(this.value).trigger('change.select2');
        }
    },
    destroyed: function () {
        $(this.$el).off().select2('destroy')
    }
}
</script>
