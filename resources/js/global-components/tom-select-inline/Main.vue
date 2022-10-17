<template>
  <select
    v-select-directive="{ props, emit, computedOptions }"
    :placeholder="placeholder"
    :value="modelValue"
    class="tom-select-inline"
  >
    <slot></slot>
  </select>
</template>

<script setup>
import {computed, toRaw, watch} from "vue";
import {init, setValue, updateValue} from "./index";
import dom from "@left4code/tw-starter/dist/js/dom";

const vSelectDirective = {
  mounted(el, {value}) {
    // Clone the select element to prevent tom select remove the original element
    const clonedEl = dom(el).clone().insertAfter(el)[0];
    dom(el).attr("hidden", true);

    // Initialize tom select
    setValue(clonedEl, value.props);
    init(el, clonedEl, value.props, value.emit, value.computedOptions);


  },
  updated(el, {value}) {
    const clonedEl = dom(el).next()[0];
    const modelValue = toRaw(value.props.modelValue);
    console.log("🚀 ~ file: Main.vue ~ line 31 ~ updated ~ modelValue", value.props.modelValue);
    updateValue(
      el,
      clonedEl,
      modelValue,
      value.props,
      value.emit,
      value.computedOptions
    );
  },
};

const props = defineProps({
  options: {
    type: Object,
    default() {
      return {};
    },
  },
  modelValue: {
    type: [String, Number, Array],
    default: "",
  },
  placeholder: {
    type: String,
    default: "",
  },
});

const emit = defineEmits();

// Compute all default options
const computedOptions = computed(() => {
  let options = {
    hidePlaceholder: false,
    ...props.options,
    plugins: {
      ...props.options.plugins,
    },
  };
  if (Array.isArray(props.modelValue)) {
    options = {
      persist: false,
      create: false,
      onDelete: function (values) {
        return confirm(
          values.length > 1
            ? "Are you sure you want to remove these " +
            values.length +
            " items?"
            : 'Are you sure you want to remove "' + values[0] + '"?'
        );
      },
      ...options,
      plugins: {
        remove_button: {
          title: "Remove this item",
        },
        ...options.plugins,
      },
    };
  }

  return options;
});

// Watch value change
watch(
  computed(() => props.modelValue),
  () => {
    console.log('change' , props.modelValue);
    emit("change");
  }
);
</script>
