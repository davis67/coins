<template>
    <Zoom>
        <modal
            :name="name"
            classes="shadow-lg rounded-md lg:fixed z-50 w-48 lg:w-full inset-0 overflow-auto"
            height="auto"
        >
            <div class="border flex w-full">
                <div
                    class="fixed md:relative bottom-0 m-auto justify-end md:justify-center p-8 bg-white md:h-auto"
                >
                    <p
                        class="text-xl leading-normal mb-8 mr-4 flex justify-center align-top text-left"
                    >
                        <slot name="modal-title"></slot>
                    </p>
                    <div class="inline-flex justify-center">
                        <slot name="modal-body"></slot>
                    </div>
                    <span
                        @click="close"
                        class="absolute top-0 right-0 pt-4 px-4"
                    >
                        <svg
                            class="h-12 w-12 text-gray-500 hover:text-gray-700"
                            role="button"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <title>Close</title>
                            <path
                                d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"
                            />
                        </svg>
                    </span>
                </div>
            </div>
        </modal>
    </Zoom>
</template>
<script>
export default {
    props: {
        name: { type: String },
    },
    data() {
        return {
            modal: true,
        };
    },
    computed: {
        shouldShow: {
            get() {
                return this.show;
            },

            set(value) {
                this.$emit("update:show", value);
                if (!value) {
                    this.$emit("closed");
                }
            },
        },
        modalSize: function () {
            if (this.size === "small") {
                return "max-w-md";
            } else {
                return "max-w-lg";
            }
        },
    },

    methods: {
        close() {
            this.shouldShow = false;
        },
        toggleModal() {
            this.modal = !this.modal;
        },
    },
};
</script>
<style scoped>
.modal {
    display: block;
    transition: opacity 0.25s ease;
}
</style>
