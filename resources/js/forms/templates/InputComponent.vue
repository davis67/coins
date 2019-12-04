<template>
    <div class="form-group">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" v-if="label" v-text="label"/>
        <input class="appearance-none block w-full text-gray-700 border border-gray-400 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white border" :type="type" :name="name" v-model="form[name]" :placeholder="label | capitalize"  @keydown="clearError(form, name)"/>
        <bounce>
            <span class="text-xs text-red-600" v-if="hasError" v-text="firstError"/>
        </bounce>
    </div>
</template>

<script>
import debounce from "lodash/debounce";
export default {
    props: {
        form: { required: true, type: Object },
        name: { required: true, type: String },
        label: { default: null, type: String },
        type: { default: "text", type: String }
    },
    mounted() {
        this.form.updateField(this.name, "");
    },
    computed: {
        value: {
            get() {
                return this.form[this.name];
            },
            set(value) {
                this.form.updateField(this.name, value);
            }
        },
        firstError() {
            return this.form.errors.first(this.name);
        },

        hasError() {
            return this.form.errors.has(this.name);
        }
    },
    methods: {
        clearError: debounce(function(form, name) {
            form.errors.clear(name);
        }, 100)
    }
};
</script>

<style>

</style>
