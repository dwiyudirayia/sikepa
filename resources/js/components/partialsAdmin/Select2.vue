<template>
    <div>
        <select
            ref="select2"
            id="select"
            class="form-control"
            v-model="selectedValue"
        >
            <option
                v-for="option in options"
                :key="option.id"
                :value="option.id"
            >
                {{ option.name == null ?  option.country_name : option.name}}
            </option>
        </select>
    </div>
</template>

<script>
export default {
    name: 'Select2',
    props: {
        options: {
            type: Array,
            required: true,
        },
        value: {
            type: String,
            default: null,
        }
    },
    data() {
        return {
            selectedValue: null,
        }
    },
    mounted() {
        setTimeout(() => {
            this.select2Initial();
        }, 200);
    },
    methods: {
        select2Initial() {
            const select = $(this.$refs.select2);
            select.select2({
                placeholder: 'Pilih dan Sesuaikan',
            })
            .val(this.value)
            .trigger('change')
            .on('change', () => {
                this.$emit('input', this.value);
            })
        },
        onChange(event) {
            console.log(event.target.value);
        }
    },
}
</script>

<style>

</style>
