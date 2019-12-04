<template>
    <div>
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" v-if="label" v-text="label"/>
        <div class="relative">
        <select class="block appearance-none w-full border border-gray-400 text-gray-700 py-3 px-4 pr-8 rounded bg-white leading-tight focus:outline-none focus:bg-white focus:border-gray-600" :name="name" v-model="form[name]" @change="clearError(form, name)">
            <option disabled value="">Choose Type...</option>
            <template v-for="(option, key) in options">
            <option :key="key" :value="typeof option == 'object'? option.id: option">
                {{typeof option == 'object'? Object.values(option)[1] : option | capitalize }}
            </option>
            </template>
        </select>
            <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center text-gray-700">
                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 20 20">
                    <path
                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                </svg>
            </div>
        </div>
                
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
        options: { default: null, type: Array }
    },
    mounted() {
        this.form.updateField(this.name, "");
    },
    created(){
        console.log(this.options)
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
