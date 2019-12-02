<template>
  <transition
    enter-active-class="animated bounceIn"
    leave-active-class="bounceOut"
    appear
    mode="in-out"
  >
    <slot></slot>
  </transition>
</template>
<script>
export default {};
</script>
<style lang="scss">
@keyframes zoomIn {
  from {
    opacity: 0;
    transform: scale3d(0.3, 0.3, 0.3);
  }
  50% {
    opacity: 1;
  }
}

@keyframes zoomOut {
  from {
    opacity: 1;
  }

  50% {
    opacity: 0;
    transform: scale3d(0.3, 0.3, 0.3);
  }

  to {
    opacity: 0;
  }
}
.zoomIn {
  animation-name: zoomIn;
}

.zoomOut {
  animation-name: zoomOut;
}
</style>
