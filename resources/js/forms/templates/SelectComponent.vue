<template>
    <div>
        <label
            for="country"
            v-if="
                label
            "
            v-text="
                label
            "
            class="block text-sm font-medium leading-5 text-gray-700"
        ></label>
        <select
            :name="
                name
            "
            v-model="
                form[
                    name
                ]
            "
            @change="
                clearError(
                    form,
                    name
                )
            "
            class="mt-1 block form-select w-full py-2 px-3 py-0 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
        >
            <option
                selected
                value
                >Choose
                Type...</option
            >
            <template
                v-for="(option,
                key) in options"
            >
                <option
                    :key="
                        key
                    "
                    :value="
                        typeof option ==
                        'object'
                            ? option.id
                            : option
                    "
                    >{{
                        typeof option ==
                        "object"
                            ? Object.values(
                                  option
                              )[1]
                            : option
                              | capitalize
                    }}</option
                >
            </template>
        </select>

        <bounce>
            <span
                class="text-xs text-red-600"
                v-if="
                    hasError
                "
                v-text="
                    firstError
                "
            />
        </bounce>
    </div>
</template>

<script>
import debounce from "lodash/debounce";
import vSelect from "vue-select";
export default {
    components: {
        vSelect:
            "v-select"
    },
    props: {
        form: {
            required: true,
            type: Object
        },
        name: {
            required: true,
            type: String
        },
        label: {
            default: null,
            type: String
        },
        options: {
            default: null,
            type: Array
        }
    },
    mounted() {
        this.form.updateField(
            this
                .name,
            ""
        );
    },
    computed: {
        value: {
            get() {
                return this
                    .form[
                    this
                        .name
                ];
            },
            set(
                value
            ) {
                this.form.updateField(
                    this
                        .name,
                    value
                );
            }
        },
        firstError() {
            return this.form.errors.first(
                this
                    .name
            );
        },

        hasError() {
            return this.form.errors.has(
                this
                    .name
            );
        }
    },
    methods: {
        clearError: debounce(
            function(
                form,
                name
            ) {
                form.errors.clear(
                    name
                );
            },
            100
        )
    }
};
</script>

<style></style>
