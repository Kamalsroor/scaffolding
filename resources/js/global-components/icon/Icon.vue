<template>
  <component v-if="show" :color="color" :is="icon" />
</template>

<script>
import * as icons from "lucide-vue-next";

export default {
  props: {
    name: {
      type: String,
      required: true,
    },
    color: {
      type: String,
      default: "#2d3748",
    },
    show: {
      type: Boolean,
      default: true,
    },
  },
  computed: {
    icon() {
      return icons[this.name];
    },
  },
};
</script>
