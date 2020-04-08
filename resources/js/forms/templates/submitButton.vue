<template>
    <div class="form-group">
        <button
            class="inline-block leading-tight bg-red-800 border border-red-800 hover:bg-red-800 px-2 py-2 text-white no-underline"
            :class="btnClass"
            :type="type"
            :disabled="isDisabled"
        >
            <component :is="iconComponent"></component>
            <span v-if="text" v-text="text"></span>
        </button>
    </div>
</template>

<script>
export default {
    props: {
        btnClass: { default: "btn-primary", type: String },
        text: {},
        type: { default: "submit" },
        icon: { default: "icon-save", type: String },
        form: { default: null },
    },
    computed: {
        iconComponent() {
            if (this.form && this.form.isSubmitting) {
                return "icon-spinner";
            }
            return this.icon;
        },
        isDisabled() {
            return this.form
                ? this.form.errors.any()
                : false;
        },
    },
};
</script>

<style></style>
