<template>
  <div>
    <div class="text-xl">
      {{ label }}
    </div>
    <form @submit.prevent="$emit('submit')">
      <slot name="form"></slot>
      <slot name="actions"></slot>
    </form>
  </div>
</template>

<script>


export default {
  emits: ['submit'],

  components: {},

  props: {
    label: {
      type: String,
      default: "",
    },
    isLight: {
      type: Boolean,
      default: false
    },
    form: {
      type: Object,
      default: {}
    }
  },
  data() {
    return {}
  },
  watch: {
    form: {
      handler(value, oldVal) {
      },
      deep: true
    },
  },
  methods: {},
}
</script>

