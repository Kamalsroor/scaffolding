<template>
  <div :class="[grid(gridCount),
    'grid gap-6 grid-cols-1 mt-2 p-4']">
    <slot></slot>
  </div>
</template>
<script>

export default {

  components: {},

  props: {
    gridCount: {
      type: Object,
      default: {
        'lg': 4,
        'md': 2,
        'sm': 1,
      },
    },
    isLight: {
      type: Boolean,
      default: false
    },
    label: {
      type: String,
      default: ""
    },
  },

  computed: {
    grid() {
      return (gridCount) => 'md:grid-cols-' + gridCount.md + ' lg:grid-cols-' + gridCount.lg + ' sm:grid-cols-' + gridCount.sm;
    }
  }
}
</script>
