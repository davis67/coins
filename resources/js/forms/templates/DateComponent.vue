<template>
    <div
        class="form-group"
    >
        <label
            class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
            v-if="
                label
            "
            v-text="
                label
            "
        />
        <input
            class="mt-1 form-input block w-full py-2 px-3 border border-gray-400 rounded-md shadow-sm focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition duration-150 ease-in-out sm:text-sm sm:leading-5"
            :type="
                type
            "
            :name="
                name
            "
            v-model="
                form[
                    name
                ]
            "
            :placeholder="
                label
                    | capitalize
            "
            @change="
                clearError(
                    form,
                    name
                )
            "
        />
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
export default {
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
        type: {
            default:
                "date",
            type: String
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
