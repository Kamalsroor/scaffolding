<template>
  <div v-if="data.length === 0">
    <div class="mb-2">
      <div class="relative flex items-start">
        <div class="flex items-center h-5">
          <input :id="name"
                 v-model="value"
                 :aria-describedby="name"
                 :disabled="disabled"
                 :name="name"
                 :type="type"
                 class="focus:ring-primary h-5 w-5 text-primary border-bg-dark rounded disabled:read-only:opacity-50 disabled:read-only:cursor-not-allowed"/>
        </div>
        <div class=" ml-3 text-sm">
          <label
            :class="value === true ? 'text-primary' : 'text-text-primary'"
            :for="name"
            class="font-sm ease-in-out duration-300 inline-flex items-center disabled:read-only:bg-bg-lighter">
            <span :class="[(isBold ? 'font-bold' : ''), 'text-text-primary']">
              {{ label }}
            </span>
            <span v-if="required" class="text-danger px-1">*</span>
          </label>
        </div>
        <div class="ml-2 text-sm">
        </div>
      </div>
      <p :id="name" class="text-sm mt-2 text-bg-dark">
        {{ description }}
      </p>
    </div>
  </div>

  <template v-if="data.length > 0">
    <div
      class="text-sm pb-2 px-4 text-text-secondary disabled:read-only:bg-bg-dark">
      {{ description }}
    </div>
    <fieldset v-if="data.length > 0" :class="grid(gridCount)"
              class="px-4 grid gap-6 grid-cols-1 duration-300 ease-in-out">
      <div v-for="item in data" :key="item[$attrs.keyValue]" class="relative flex items-start">
        <div class="flex items-center h-6">
          <input :id="item[$attrs.keyValue]"
                 v-model="value"
                 :aria-describedby="item[$attrs.slugValue] + '-description'"
                 :disabled="disabled"
                 :name="item[$attrs.slugValue]"
                 :type="type"
                 :value="item[$attrs.keyValue]"
                 class="focus:ring-primary h-5 w-5 rounded text-primary border-bg-dark disabled:read-only:opacity-50 disabled:read-only:cursor-not-allowed"/>
        </div>
        <div class="ml-3 text-sm">
          <label
            :class="[(value.includes(item[$attrs.keyValue]) ? 'text-primary-hover' : 'text-text-primary'), 'disabled:read-only:text-text-secondary']"
            :for="item[$attrs.keyValue]" class="font-sm ease-in-out duration-150">
            {{ item[$attrs.labelValue] }}
          </label>
        </div>
      </div>
    </fieldset>
  </template>

</template>

<script>
import {
  CheckIcon,
  HashtagIcon,
  LocationMarkerIcon,
  MailIcon,
  OfficeBuildingIcon,
  PhoneIcon,
  SearchIcon,
  UserIcon,
  UsersIcon,
} from "@heroicons/vue/outline";
// import ItemTransition from "@/Components/EventComponents/partials/ItemTransition";


export default {
  name: "InputCheckbox",
  components: {
    // ItemTransition,
    UsersIcon,
    UserIcon,
    OfficeBuildingIcon,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    CheckIcon,
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
    description: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "checkbox",
    },
    isLight: {
      type: Boolean,
      default: false,
    },
    readonly: {
      type: Boolean,
      default: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    isBold: {
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
    validator: {
      type: Array,
      default: [],
    },
    isValid: {
      type: Boolean,
      default: false,
    },
    modelValue: {
      type: Array,
      default: false,
    },
    gridCount: {
      type: Object,
      default: {
        'lg': 4,
        'md': 2,
        'sm': 1,
      },
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
  computed: {
    grid() {
      return (gridCount) => 'md:grid-cols-' + gridCount.md + ' lg:grid-cols-' + gridCount.lg + ' sm:grid-cols-' + gridCount.sm;
    }
  },
  emits: ['update:modelValue'],
}
</script>
