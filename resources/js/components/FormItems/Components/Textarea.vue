<template>

  <div class="mt-2 flex rounded-md group">
    <div class="relative flex items-stretch flex-grow focus-within:z-10">
      <textarea
        :id="name"
        v-model="value"
        :class="[(errors.length > 0 ? 'border-danger focus:ring-danger focus:border-danger' : 'focus:ring-primary focus:border-primary'), (isValid ? 'border-green-600 focus:ring-green-600 focus:border-green-600' : ' ')]"
        :disabled="disabled"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :type="type"
        class="block w-full rounded-md sm:text-sm ease-in-out duration-500 disabled:read-only:bg-bg-lighter bg-bg-light border-bg-dark text-text-primary disabled:read-only:placeholder:text-text-secondary disabled:read-only:cursor-not-allowed sm:h-44"
      />
    </div>
  </div>

</template>

<script>
import {
  HashtagIcon,
  LocationMarkerIcon,
  MailIcon,
  OfficeBuildingIcon,
  PhoneIcon,
  SearchIcon,
  UserIcon,
  UsersIcon,
} from "@heroicons/vue/outline";


export default {
  name: "Textarea",
  components: {
    UsersIcon,
    UserIcon,
    OfficeBuildingIcon,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    HashtagIcon,

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
    placeholder: {
      type: String,
      default: "",
    },
    description: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "textarea",
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
    required: {
      type: Boolean,
      default: false,
    },
    validator: {
      type: Array,
      default: [],
    },
    isValid: {
      type: Boolean,
      default: false,
    },
    modelValue: {
      type: Object,
      default: null,
    },
  },
  data() {
    return {
      value: this.modelValue,
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
