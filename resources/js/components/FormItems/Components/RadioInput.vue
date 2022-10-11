<template>

  <fieldset v-if="radioStyle === 'default'" class="mb-2">
    <div>
      <p class="text-sm text-text-secondary">{{ description }}</p>
    </div>
    <div
      :class="[grid(gridCount), 'border-bg-lighter grid gap-6 grid-cols-1 mt-2 border rounded-md p-4']">
      <div v-for="item in data" :key="item[$attrs.keyValue]"
           class="flex items-center">
        <input :id="item[$attrs.keyValue]"
               v-model="value"
               :aria-describedby="item[$attrs.slugValue] + '-description'"
               :disabled="disabled"
               :name="item[$attrs.slugValue]"
               :type="type"
               :value="item[$attrs.keyValue]"
               class="focus:ring-primary h-5 w-5 text-primary border-bg-light duration-300 ease-in-out"
        />
        <label
          :class="[
          (value === (item[$attrs.keyValue]) ? 'text-primary' : 'text-text-primary'),
          'ml-3 block text-sm font-medium ease-in-out duration-300 disabled:read-only:bg-bg-dark']"
          :for="item[$attrs.keyValue]">
          {{ item[$attrs.labelValue] }}
        </label>
      </div>
    </div>
  </fieldset>

  <RadioGroup v-if="radioStyle === 'boxed'" v-model="value" class="mb-2">
    <div>
      <p class="text-sm text-text-secondary">{{ description }}</p>
    </div>
    <div
      :class="[grid(gridCount), 'grid gap-4 grid-cols-1 mt-2 rounded-md']">
      <RadioGroupOption
        v-for="item in data"
        :key="item[$attrs.keyValue]"
        v-slot="{ active, checked }"
        :disabled="data.active"
        :value="item[$attrs.keyValue]"
        as="template">
        <div
          :class="[(checked ? 'bg-primary border-transparent' : 'bg-bg-light border-bg-lighter') , 'relative px-5 py-4 border rounded-md cursor-pointer  focus:outline-none ease-in-out duration-300']">
          <div class="flex items-center justify-between">
            <div class="text-sm">
              <RadioGroupLabel
                :class="[(checked ? 'text-white' : 'text-text-primary'), 'font-medium']"
                as="p">
                {{ item[$attrs.labelValue] }}
              </RadioGroupLabel>
              <RadioGroupDescription
                v-if="item[$attrs.desValue]"
                :class="[(checked ? 'text-white' : 'text-text-secondary'), 'inline font-light']"
                as="span">
                <span>
                  {{ item[$attrs.desValue] }}
                </span>
              </RadioGroupDescription>
            </div>
            <div v-show="checked" class="flex-shrink-0 text-white">
              <CheckCircleIcon class="w-5 h-5"/>
            </div>
          </div>
        </div>
      </RadioGroupOption>
    </div>
  </RadioGroup>

  <RadioGroup v-if="radioStyle === 'group'" v-model="value">
    <div>
      <p class="text-sm text-text-secondary">{{ description }}</p>
    </div>
    <div class="bg-bg-light mt-2 rounded-md -space-y-px">
      <RadioGroupOption
        v-for="(item, index) in data"
        :key="item[$attrs.keyValue]"
        v-slot="{ active, checked }"
        :disabled="data.active"
        :value="item[$attrs.keyValue]"
        as="template">
        <div
          :class="[(index === 0 ? 'rounded-tl-md rounded-tr-md' : ''), (index === data.length - 1 ? 'rounded-bl-md rounded-br-md' : ''), (checked ? 'bg-primary border-primary z-10' : 'border-bg-lighter'), 'relative border ring-0 ring-offset-0 p-4 flex cursor-pointer focus:outline-none ease-in-out duration-75']">
          <span
            :class="[(checked ? 'bg-bg-light border-transparent' : 'bg-white border-bg-light'), 'h-4 w-4 mt-0.5 cursor-pointer rounded-full border flex items-center justify-center']"
            aria-hidden="true">
            <span :class="[(checked ? 'bg-primary' : 'bg-white'),'rounded-full w-1.5 h-1.5']"/>
          </span>
          <div class="ml-3 flex flex-col">
            <RadioGroupLabel :class="[checked ? 'text-white' : 'text-text-primary', 'block text-sm font-medium']"
                             as="span">
              {{ item[$attrs.labelValue] }}
            </RadioGroupLabel>
            <RadioGroupDescription :class="[checked ? 'text-white' : 'text-text-primary', 'block text-sm']" as="span">
              {{ item[$attrs.desValue] }}
            </RadioGroupDescription>
          </div>
        </div>
      </RadioGroupOption>
    </div>
  </RadioGroup>


</template>

<script>
import {
  CheckCircleIcon,
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
import {RadioGroup, RadioGroupDescription, RadioGroupLabel, RadioGroupOption} from '@headlessui/vue'

export default {
  name: "InputCheckbox",
  components: {
    UsersIcon,
    UserIcon,
    OfficeBuildingIcon,
    CheckCircleIcon,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    RadioGroup,
    RadioGroupDescription,
    RadioGroupLabel,
    RadioGroupOption,
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
      default: "radio",
    },
    radioStyle: {
      type: String,
      default: "default",
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
    validator: {
      type: Array,
      default: [],
    },
    isValid: {
      type: Boolean,
      default: false,
    },
    modelValue: {
      type: Boolean,
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
  data() {
    return {
      value: this.modelValue ?? this.data[0][this.$attrs.keyValue],
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
