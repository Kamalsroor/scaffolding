<template>
  <div :class="flexTitle ? 'flex items-center' : ''">
    <label v-if="label && type !== 'checkbox' || $attrs.data != null && $attrs.data.length > 0"
           :class="[(flexTitle ? 'order-1 ml-4' : '')]"
           :for="name"
           class="block font-medium text-text-primary">
      {{ label }}
      <template v-if="label">
        <span v-if="required" class="text-danger text-sm">*</span>
      </template>
    </label>

    <template
      v-if="type === 'text' || type === 'number' || type === 'email' || type === 'password' || type === 'url' || type === 'date'  ">
      <TextInput
        v-model="value"
        :currency="currency"
        :currencyLable="$attrs.currencyLable"
        :currencySign="$attrs.currencySign"
        :disabled="disabled"
        :errors="FiledErrors"
        :hasSelect="hasSelect"
        :icon="icon"
        :iconName="iconName"
        :isGreen="isGreen"
        :isLight="isLight"
        :isValid="isValid"
        :label="label"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :searchPlaceholderValue="$attrs.searchPlaceholderValue"
        :searchable="searchable"
        :selectData="selectData"
        :selectImgValue="$attrs.selectImgValue"
        :selectKeyLabel="$attrs.selectKeyLabel"
        :selectKeyValue="$attrs.selectKeyValue"
        :selectPlaceholder="selectPlaceholder"
        :selectedId="$attrs.selectedIdValue"
        :type="type"
      />
    </template>
    <template v-if="type === 'textarea'">
      <TextareaInput
        v-model="value"
        :disabled="disabled"
        :errors="FiledErrors"
        :isLight="isLight"
        :isValid="isValid"
        :label="label"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :type="type"
      />
    </template>
    <template v-if="type === 'checkbox'">
      <CheckboxInput
        v-model="value"
        :data="$attrs.data"
        :description="description"
        :disabled="disabled"
        :errors="FiledErrors"
        :gridCount="$attrs.gridCount"
        :isBold="isBold"
        :isGreen="isGreen"
        :isLight="isLight"
        :isValid="isValid"
        :keyValue="$attrs.keyValue"
        :label="label"
        :labelValue="$attrs.labelValue"
        :name="name"
        :readonly="readonly"
        :required="required"
        :slugValue="$attrs.slugValue"
        :type="type"
      />
    </template>
    <template v-if="type === 'radio'">
      <RadioInput
        v-model="value"
        :data="$attrs.data"
        :desValue="$attrs.desValue"
        :description="description"
        :disabled="disabled"
        :errors="FiledErrors"
        :extraTitle="$attrs.extraTitle"
        :gridCount="$attrs.gridCount"
        :isLight="isLight"
        :isValid="isValid"
        :keyValue="$attrs.keyValue"
        :label="label"
        :labelValue="$attrs.labelValue"
        :name="name"
        :radioStyle="radioStyle"
        :readonly="readonly"
        :required="required"
        :slugValue="$attrs.slugValue"
        :type="type"
      />
    </template>
    <template v-if="type === 'select'">
      <SelectInput
        v-model="value"
        :avatar="$attrs.data"
        :data="$attrs.data"
        :description="description"
        :disabled="disabled"
        :errors="FiledErrors"
        :extraTitle="extraTitle"
        :hasBackground="hasBackground"
        :icon="icon"
        :iconName="iconName"
        :imgCover="imgCover"
        :imgValue="$attrs.imgValue"
        :isLight="isLight"
        :isValid="isValid"
        :keyValue="$attrs.keyValue"
        :label="label"
        :labelValue="$attrs.labelValue"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :searchPlaceholderValue="$attrs.searchPlaceholderValue"
        :searchable="searchable"
        :type="type"
      />
    </template>
    <template v-if="type === 'multiselect'">
      <MultiSelectInput
        v-model="value"
        :avatar="$attrs.data"
        :data="$attrs.data"
        :description="description"
        :disabled="disabled"
        :errors="FiledErrors"
        :icon="icon"
        :iconName="iconName"
        :imgValue="$attrs.imgValue"
        :isLight="isLight"
        :isValid="isValid"
        :keyValue="$attrs.keyValue"
        :label="label"
        :labelValue="$attrs.labelValue"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :searchPlaceholderValue="$attrs.searchPlaceholderValue"
        :searchable="searchable"
        :type="type"
      />
    </template>
    <template v-if="type === 'switch'">
      <SwitchToggle
        v-model="value"
        :data="$attrs.data"
        :description="description"
        :disabled="disabled"
        :errors="FiledErrors"
        :flexTitle="flexTitle"
        :isLight="isLight"
        :isValid="isValid"
        :keyValue="$attrs.keyValue"
        :label="label"
        :labelValue="$attrs.labelValue"
        :name="name"
        :readonly="readonly"
        :required="required"
        :slugValue="$attrs.slugValue"
        :type="type"
      />
    </template>

    <template
      v-if="type === 'text' || type === 'number' || type === 'email' ||type === 'select2' || type === 'textarea'|| type === 'switch'">
      <p v-if="description"
         class="text-sm font-light px-4 mt-2 ease-in-out duration-500 text-text-secondary">
        {{ description }}</p>
    </template>
    <ul v-if="FiledErrors.length > 0">
      <li v-for="error in FiledErrors" :key="error" class="px-4 text-danger text-xs mt-2 list-disc list-inside">
        {{ error }}
      </li>
    </ul>
  </div>
</template>

<script>
import {
  AtSymbolIcon,
  CalendarIcon,
  CurrencyDollarIcon,
  GlobeIcon,
  HashtagIcon,
  LocationMarkerIcon,
  MailIcon,
  OfficeBuildingIcon,
  PhoneIcon,
  SearchIcon,
  UserIcon,
  UsersIcon,
} from "@heroicons/vue/outline";

import TextInput from '@/Components/FormItems/Components/Input.vue'
import SelectInput from '@/Components/FormItems/Components/SelectInput.vue'
import RadioInput from '@/Components/FormItems/Components/RadioInput.vue'
import MultiSelectInput from '@/Components/FormItems/Components/MultiSelectInput.vue'
import TextareaInput from '@/Components/FormItems/Components/Textarea.vue'
import CheckboxInput from '@/Components/FormItems/Components/Checkbox.vue'
import SwitchToggle from "@/Components/FormItems/Components/SwitchToggle";


export default {
  name: "Field",
  components: {
    SwitchToggle,
    CalendarIcon,
    AtSymbolIcon,
    UsersIcon,
    RadioInput,
    GlobeIcon,
    UserIcon,
    OfficeBuildingIcon,
    CurrencyDollarIcon,
    SelectInput,
    MultiSelectInput,
    TextareaInput,
    CheckboxInput,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    HashtagIcon,
    TextInput,
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
    selectPlaceholder: {
      type: String,
      default: "",
    },
    extraTitle: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    isLight: {
      type: Boolean,
      default: false,
    },
    isBold: {
      type: Boolean,
      default: false,
    },
    isGreen: {
      type: Boolean,
      default: false,
    },
    flexTitle: {
      type: Boolean,
      default: false,
    },
    required: {
      type: Boolean,
      default: false,
    },
    radioStyle: {
      type: String,
      default: "default",
    },
    hasSelect: {
      type: Boolean,
      default: false,
    },
    hasBackground: {
      type: Boolean,
      default: false,
    },
    imgCover: {
      type: Boolean,
      default: false,
    },
    validator: {
      type: Array,
      default: [],
    },
    icon: {
      type: Boolean,
      default: false,
    },
    searchable: {
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
    currency: {
      type: Boolean,
      default: false,
    },
    iconName: {
      type: String,
      default: UsersIcon,
    },
    avatarUrl: {
      type: String,
      default: "",
    },
    avatar: {
      type: Boolean,
      default: false,
    },
    modelValue: {
      type: Object,
      default: null,
    },
    selectData: {
      type: Array,
      default: [],
    },
    errors: {
      type: Array,
      default: [],
    },
  },
  data() {
    return {
      value: this.modelValue,
      FiledErrors: [],
      isValid: false,
      ValidType: 'characters',
    }
  },
  watch: {
    modelValue: function (value) {
      this.value = value;
    },
    value: {
      handler(value, oldVal) {
        this.validation();
        this.$emit('update:modelValue', this.value);
      },
      deep: true
    },
    FiledErrors: {
      handler(value, oldVal) {

        // if(!value){
        // this.$emit('errors', value);
        // }

        // if (!value) {
        //   this.$emit('hasError', this.name);
        // }

      },
      deep: true
    },


  },
  methods: {
    validation() {
      if (!Array.isArray(this.value) && typeof this.value === 'object') {
        if (this.value != null && this.value.value && this.value.value != null && this.value.value.length > 0)
          this.isValid = true;
      } else {
        if (this.value != null && this.value.length > 0 || this.value != null && this.isInt(this.value)) {
          this.isValid = true;
        }
      }

      if (this.validator.includes('string')) {
        this.ValidType = 'characters'
      } else if (this.validator.includes('file')) {
        this.ValidType = 'kilobytes'
      } else if (this.validator.includes('array')) {
        this.ValidType = 'items'
      } else if (this.validator.includes('number')) {
        this.ValidType = 'digits'
      } else if (this.validator.includes('array')) {
        this.ValidType = 'Items'
      }


      this.FiledErrors.splice(0)
      this.validator.map((value, index) => {
        try {
          if (!Array.isArray(this.value) && typeof this.value === 'object') {
            this[value](this.value.value);
          } else {
            this[value](this.value);
          }
        } catch (error) {
        }
      })

      if (this.required) {
        this.requiredValidation(this.value);
      }
    },

    array(value) {
      if (!Array.isArray(value)) {
        this.FiledErrors.push('The ' + this.label + ' must be a Array.');
        this.isValid = false;
      }
    },
    isInt(value) {
      return !isNaN(value) &&
        parseInt(Number(value)) == value &&
        !isNaN(parseInt(value, 10));
    },
    string(value) {
      const validRegEx = /^[^\\\/&]*$/;
      if (value.length > 0 && !value.match(validRegEx)) {
        this.FiledErrors.push('The ' + this.label + ' must be a string.');
        this.isValid = false;
      }
    },
    number(value) {
      const validRegEx = /^\d*$/;
      if (value.length > 0 && !value.match(validRegEx)) {
        console.log(this.label);
        this.FiledErrors.push('The ' + this.label + ' must be a number.');
        this.isValid = false;
      }
    },
    exact(value) {
      const exactChar = this.$attrs.exact ?? 10;
      if (value.length != exactChar) {
        this.FiledErrors.push('The ' + this.label + ' must be ' + exactChar + ' ' + this.ValidType);
        this.isValid = false;
      }
    },
    max(value) {
      const maxChar = this.$attrs.max ?? 10;


      if (this.validator.includes('array') && maxChar > 1) {
        this.ValidType = this.$attrs.pluralName;
      } else if (this.validator.includes('array') && maxChar == 1) {
        this.ValidType = this.$attrs.singularName;
      }

      if (value.length > maxChar) {
        this.FiledErrors.push('The ' + this.label + ' must not be greater than ' + maxChar + ' ' + this.ValidType);
        this.isValid = false;
      }
    },
    min(value) {
      const minChar = this.$attrs.min ?? 10;

      if (this.validator.includes('array') && minChar > 1) {
        this.ValidType = this.$attrs.pluralName;
      } else if (this.validator.includes('array') && minChar == 1) {
        this.ValidType = this.$attrs.singularName;
      }

      if (value.length > 0 && value.length < minChar) {
        this.FiledErrors.push('The ' + this.label + ' must be at least ' + minChar + ' ' + this.ValidType);
        this.isValid = false;
      }
    },
    requiredValidation(value) {
      if (value == null || value === "" || value.length == 0) {
        console.log(this.label);
        this.FiledErrors.push('The ' + this.label + ' field is required.');
        this.isValid = false;
      }
    },
    url(value) {
      const validRegEx = new RegExp('^(https?:\\/\\/)?' + // protocol
        '((([a-z\\d]([a-z\\d-]*[a-z\\d])*)\\.)+[a-z]{2,}|' + // domain name
        '((\\d{1,3}\\.){3}\\d{1,3}))' + // OR ip (v4) address
        '(\\:\\d+)?(\\/[-a-z\\d%_.~+]*)*' + // port and path
        '(\\?[;&a-z\\d%_.~+=-]*)?' + // query string
        '(\\#[-a-z\\d_]*)?$', 'i'); // fragment locator

      if (value == null || value === "" || value.includes('http://') || value.includes('https://') || value.includes('://') || value.includes('http')) {
        this.FiledErrors.push('The ' + this.label + ' Must not contain http:// or https:// replace with www.');
        this.isValid = false;
      } else if (value.length > 0 && !value.match(validRegEx)) {
        this.FiledErrors.push('The ' + this.label + ' Mast be a valid url.');
        this.isValid = false;
      }
    },
    email(value) {
      const validRegEx = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if (value.length > 0 && !value.match(validRegEx)) {
        this.FiledErrors.push('The ' + this.label + ' must be a valid email address.');
        this.isValid = false;
      }
    }

  },
  emits: ['update:modelValue', 'errors'],
}
</script>
<style>
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
textarea:-webkit-autofill,
textarea:-webkit-autofill:hover,
textarea:-webkit-autofill:focus,
select:-webkit-autofill,
select:-webkit-autofill:hover,
select:-webkit-autofill:focus {
  -webkit-text-fill-color: var(--color-text-primary);
  -webkit-box-shadow: 0 0 0 var(--color-text-primary) inset;
  transition: background-color 5000s ease-in-out 0s;
}
</style>
