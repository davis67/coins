<template>
  <Zoom>
    <div v-if="shouldShow" class="border shadow-lg fixed z-50 inset-0 overflow-auto flex w-full">
      <div
        class="fixed shadow-inner shadow-lg md:relative bottom-0 inset-x-0 m-auto justify-end md:justify-center p-8 bg-white md:h-auto md:shadow"
        :class="modalSize"
      >
        <p class="text-xl leading-normal mb-8 text-left">
          <slot name="modal-title"></slot>
        </p>
        <div class="inline-flex justify-center">
          <slot name="modal-body"></slot>
        </div>
        <span @click="close" class="absolute top-0 right-0 pt-4 px-4">
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
  </Zoom>
</template>
<script>
export default {
  props: {
    size: { default: "small" },
    show: { type: Boolean, default: false }
  },
  data() {
    return {
      modal: true
    };
  },
  created() {
    console.log(this.show);
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
      }
    },
    modalSize: function() {
      if (this.size === "small") {
        return "lg:max-w-md";
      } else {
        return "";
      }
    }
  },

  methods: {
    close() {
      this.shouldShow = false;
    },
    toggleModal() {
      this.modal = !this.modal;
    }
  }
};
</script>
<style scoped>
.modal {
  display: block;
  transition: opacity 0.25s ease;
}
</style>
