<template>
  <div :class="!flexTitle ? 'mt-2' : ''">
    <Switch
      v-model="value"
      :class="[(modelValue ? 'bg-primary' : 'bg-bg-dark border border-bg-primary-hover' ), 'disabled:bg-bg-lighter disabled:border-gray-bg-dark disabled:cursor-not-allowed']"
      :disabled="disabled"
      class="sm:my-1.5 relative inline-flex flex-shrink-0 h-[30px] w-[60px] border-2 border-transparent rounded-full items-center cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-opacity-75"
    >
      <span class="sr-only">{{ name }}</span>
      <span
        :class="modelValue ? 'translate-x-9 bg-white' : 'translate-x-0 bg-white'"
        aria-hidden="true"
        class="pointer-events-none inline-block h-[20px] w-[21px] rounded-full shadow-sm transform ring-0 transition ease-in-out duration-200"
      />
    </Switch>
    <div></div>
  </div>
</template>

<script>
import {Switch} from '@headlessui/vue'

export default {
  name: "SwitchToggle",
  components: {
    Switch,
  },
  props: {
    label: {
      type: String,
      default: "",
    },
    name: {
      type: String,
      default: "",
    },
    flexTitle: {
      type: Boolean,
      default: false,
    },
    description: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "switch",
    },
    readonly: {
      type: Boolean,
      default: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    errors: {
      type: Array,
      default: [],
    },
    data: {
      type: Array,
      default: [],
    },
    required: {
      type: Boolean,
      default: false,
    },
    isValid: {
      type: Boolean,
      default: false,
    },
    modelValue: {
      type: Boolean,
      default: false,
    },
  },
  created() {
  },

  data() {
    return {
      value: this.modelValue ?? [],
    }
  },
  watch: {
    value: function (value) {
      this.$emit('update:modelValue', this.value);
    },
  },
  emits: ['update:modelValue'],
}
</script>
