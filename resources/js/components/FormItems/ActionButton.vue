<template>
  <button
    :class="[(buttonStyle === 'default' ? 'text-white bg-primary hover:bg-primary-hover' : ''),
    (buttonSize === 'small' ? 'text-xs px-2 py-2 font-medium rounded-md' : ''),
    (buttonSize === 'xs' ? 'text-xs px-2 py-1 rounded-md' : ''),
    (buttonSize === 'large' ? 'text-base px-6 py-3 font-medium rounded-md' : ''),
    (buttonSize === 'default' ? 'text-sm px-4 py-2 font-medium rounded-md' : ''),
    (buttonStyle === 'danger' ? 'text-white bg-danger hover:bg-danger-hover' : ''),
    (buttonStyle === 'secondary' ? 'text-bg-light bg-secondary hover:bg-secondary-hover' : ''),
    (buttonStyle === 'alternative' ? 'text-text-secondary bg-slate-200 hover:bg-slate-300' : ''),
    (buttonStyle === 'success' ? 'text-white bg-success hover:bg-success-hover' : ''),
    (buttonStyle === 'warning' ? 'text-gray-800 bg-warning hover:bg-warning-hover' : ''),
    'inline-flex items-center border border-transparent leading-4 disabled:cursor-not-allowed disabled:bg-opacity-50 disabled:text-opacity-75 ease-in-out duration-300 disabled:opacity-50']"
    :disabled="disabled || inProcess"
    :type="type">
    <div v-if="icon " class="-ml-0.5 mr-2 ">
      <component
        :is="iconName"
        v-if="!inProcess"
        :class="[(buttonSize === 'small' ? 'h-4 w-4' : ''),(buttonSize === 'large' ? 'h-6 w-6' : ''),(buttonSize === 'default' ? 'h-5 w-5' : ''),]"
        aria-hidden="true"
      />
      <svg v-if="inProcess" class="animate-spin h-5 w-5" fill="none" viewBox="0 0 24 24"
           xmlns="http://www.w3.org/2000/svg">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75"
              d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"
              fill="currentColor"></path>
      </svg>
    </div>
    <template v-if="!inProcess || !$attrs.inProcessLabel">
      {{ label }}
    </template>
    <template v-if="inProcess && $attrs.inProcessLabel">
      {{ $attrs.inProcessLabel }}
    </template>
  </button>
</template>

<script>
import {
  ArrowSmLeftIcon,
  CalendarIcon,
  CheckIcon,
  ChevronDoubleLeftIcon,
  ChevronLeftIcon,
  ClipboardCheckIcon,
  CogIcon,
  CurrencyDollarIcon,
  EyeIcon,
  HashtagIcon,
  LocationMarkerIcon,
  LoginIcon,
  LogoutIcon,
  MailIcon,
  OfficeBuildingIcon,
  PencilAltIcon,
  PhoneIcon,
  PlusIcon,
  PrinterIcon,
  RefreshIcon,
  SaveIcon,
  SearchIcon,
  UserIcon,
  UsersIcon,
  XIcon,
} from "@heroicons/vue/outline";


export default {
  name: "ActionButton",
  components: {
    UsersIcon,
    EyeIcon,
    ArrowSmLeftIcon,
    CurrencyDollarIcon,
    PrinterIcon,
    ChevronLeftIcon,
    CogIcon,
    CalendarIcon,
    CheckIcon,
    XIcon,
    ChevronDoubleLeftIcon,
    LoginIcon,
    LogoutIcon,
    SaveIcon,
    UserIcon,
    OfficeBuildingIcon,
    RefreshIcon,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    PlusIcon,
    PencilAltIcon,
    HashtagIcon,
    ClipboardCheckIcon,
  },
  props: {
    buttonSize: {
      type: String,
      default: "default",
    },
    label: {
      type: String,
      default: "Button Text",
    },
    type: {
      type: String,
      default: "button",
    },
    inProcess: {
      type: Boolean,
      default: false,
    },
    buttonStyle: {
      type: String,
      default: "default",
    },
    icon: {
      type: Boolean,
      default: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    iconName: {
      type: String,
      default: PlusIcon,
    },
  },
  data() {
    return {
      value: this.modelValue,
    }
  },
  watch: {},
  methods: {},
  emits: ['update:modelValue'],
}
</script>
