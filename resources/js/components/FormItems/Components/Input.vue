<template>

  <div :class="[(label ? 'mt-2' : ''), 'flex rounded-md group']">
    <div class="relative flex items-stretch flex-grow focus-within:z-10">
      <div v-if="type === 'url'"
           class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="text-text-secondary sm:text-sm font-normal">http://</span>
      </div>
      <div v-if="currency" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <span class="sm:text-base text-text-secondary">{{ $attrs.currencySign }}</span>
      </div>
      <div v-if="icon"
           class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
        <component :is="iconName" aria-hidden="true" class="h-6 w-6 text-slate-500"/>
      </div>
      <div v-if="hasSelect" class="absolute inset-y-0 left-0 flex items-center">
        <Listbox v-model="SelectedObject.id" as="div">
          <ListboxButton
            :class="[(SelectedObject.icon || $attrs.selectImgValue ? '' : '')]"
            class="text-text-primary read-only:placeholder:text-text-secondary focus:ring-primary border-secondary focus:border-primary relative border-none rounded-l-md pl-3 pr-10 py-2 text-left cursor-default focus:outline-none focus:ring-1 sm:text-sm">
            <span class="flex items-center space-x-2">

              <img v-if="SelectedObject.icon" :src="SelectedObject.icon" alt=""
                   class="flex-shrink-0 h-6 w-6 rounded-md"/>

              <span v-if="SelectedObject.title" class="ml-3 text-text-secondary block truncate">
                {{ SelectedObject.title }}
              </span>

                <span v-else-if="!SelectedObject.title && selectPlaceholder"
                      class="ml-3 block truncate text-text-secondary">
              {{ selectPlaceholder }}
            </span>
            </span>
            <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
              <SelectorIcon aria-hidden="true" class="h-4 w-4 text-text-secondary"/>
            </span>
          </ListboxButton>
          <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                      leave-to-class="opacity-0">
            <ListboxOptions
              :class="[(SelectedObject.icon || $attrs.selectImgValue ? 'w-48' : 'w-32')]"
              class="scrollbar-thin scrollbar-track-bg-lighter bg-bg-light scrollbar-thumb-primary overflow-y-scroll scrollbar-thumb-rounded-md scrollbar-track-rounded-md absolute z-10 mt-2 max-h-56 rounded-md pt-0 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
              <div v-if="searchable" class="py-2 px-4 sticky top-0 z-20 bg-bg-light">
                <label class="sr-only" for="search-query">SearchQuery</label>
                <input id="search-query"
                       v-model="inputFilteredData"
                       :placeholder="$attrs.searchPlaceholderValue"
                       class="block w-full sm:text-sm rounded-md bg-bg-lighter text-text-primary placeholder:text-text-secondary focus:ring-primary focus:border-primary border-bg-dark"
                       type="text"
                       @keyup="filteredData($event.target.value , $event.target)"/>
              </div>
              <ListboxOption v-for="data in listOptions"
                             :key="data[this.$attrs.selectKeyValue]"
                             v-slot="{ active }"
                             :disabled="data.active != null && !data.active"
                             :value="data[this.$attrs.selectKeyValue]"
                             as="template">
                <li :class="[(active ? 'bg-primary text-white' : '')]">

                  <div class="flex items-center space-x-4 cursor-pointer relative py-2 pl-3 pr-9">
                    <img v-if="data[this.$attrs.selectImgValue]" :alt="data[this.$attrs.selectKeyLabel]"
                         :src="data[this.$attrs.selectImgValue]"
                         class="flex-shrink-0 h-6 w-6 rounded-md"/>
                    <span
                      :class="[(active ? 'text-white' : 'text-text-primary'), 'truncate block']">
                          {{ data[this.$attrs.selectKeyLabel] }}
                    </span>
                  </div>
                </li>
              </ListboxOption>
            </ListboxOptions>
          </transition>
        </Listbox>


      </div>
      <input
        :id="name"
        v-model="value"
        :class="[(icon ? 'pl-12' : ''), (type === 'url' ? 'pl-16' : ''), (currency ? 'pl-10 pr-14' : ''), ($attrs.selectImgValue != null ? 'pl-32' : ''), (hasSelect && $attrs.selectImgValue == null  ? 'pl-28' : ''), (errors.length > 0 ? 'border-danger focus:ring-danger focus:border-danger' : 'focus:ring-primary focus:border-primary'), (isValid ? 'border-green-600 focus:ring-green-600 focus:border-green-600' : ' ')]"
        :disabled="disabled"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :type="type"
        class="block w-full rounded-md sm:text-sm ease-in-out duration-500 disabled:read-only:cursor-not-allowed disabled:read-only:bg-bg-lighter disabled:read-only:text-gray-400 disabled:read-only:placeholder:text-text-secondary bg-bg-light border-bg-dark text-text-primary"
      />
      <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
        <span v-if="currency" :id="name" class="sm:text-sm text-text-secondary">
          {{ $attrs.currencyLable }}
        </span>
      </div>
    </div>
  </div>

</template>

<script>
import {
  AtSymbolIcon,
  BriefcaseIcon,
  CalendarIcon,
  CheckIcon,
  CurrencyDollarIcon,
  HashtagIcon,
  LocationMarkerIcon,
  MailIcon,
  OfficeBuildingIcon,
  PhoneIcon,
  ScissorsIcon,
  SearchIcon,
  SelectorIcon,
  UserIcon,
  UsersIcon,
} from "@heroicons/vue/outline";
import {Listbox, ListboxButton, ListboxOption, ListboxOptions,} from '@headlessui/vue'
import {ref} from "vue";

const openUploader = ref(false);

export default {
  name: "InputText",
  components: {
    UsersIcon,
    CalendarIcon,
    Listbox,
    ListboxButton,
    ScissorsIcon,
    ListboxOptions,
    ListboxOption,
    UserIcon,
    BriefcaseIcon,
    AtSymbolIcon,
    CheckIcon,
    OfficeBuildingIcon,
    CurrencyDollarIcon,
    SelectorIcon,
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
    selectedId: {
      type: Number,
      default: null,
    },
    description: {
      type: String,
      default: "",
    },
    type: {
      type: String,
      default: "text",
    },
    selectPlaceholder: {
      type: String,
      default: "",
    },
    isGreen: {
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
    hasSelect: {
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
    icon: {
      type: Boolean,
      default: false,
    },
    currency: {
      type: Boolean,
      default: false,
    },
    isValid: {
      type: Boolean,
      default: false,
    },
    iconName: {
      type: String,
      default: UsersIcon,
    },
    modelValue: {
      type: Object,
      default: null,
    },
    selectData: {
      type: Array,
      default: [],
    },
  },
  created() {
    if (this.hasSelect) {

      if (this.selectedId != null) {
        this.selectById(this.selectedId)
      }
      this.filteredData('')

    }
  },
  data() {
    return {
      value: this.hasSelect ? this.modelValue.value : this.modelValue,
      listOptions: [],
      inputFilteredData: null,
      SelectedObject: {
        id: null,
        icon: null,
        title: null,
      },

    }
  },
  methods: {

    compare_key(a, b) {
      if (a[this.$attrs.selectKeyLabel].toLowerCase() < b[this.$attrs.selectKeyLabel].toLowerCase()) {
        return -1;
      }
      if (a[this.$attrs.selectKeyLabel].toLowerCase() > b[this.$attrs.selectKeyLabel].toLowerCase()) {
        return 1;
      }
      return 0;
    },

    selectById(id) {
      const selected = this.selectData.find(data => data[this.$attrs.selectKeyValue] == id);
      if (selected) {
        this.SelectedObject.id = selected[this.$attrs.selectKeyValue];
        this.SelectedObject.icon = selected[this.$attrs.selectImgValue];
        this.SelectedObject.title = selected[this.$attrs.selectKeyLabel];
      }

      this.inputFilteredData = '';
      this.filteredData('')
    },
    filteredData(value, target = null) {
      this.listOptions = this.selectData.filter(
        (
          data => data[this.$attrs.selectKeyLabel].toLowerCase().includes(
            value.toLowerCase()
          )
        )
      ).sort(this.compare_key).slice(0, 10);

      if (this.listOptions.length === 1) {
        this.SelectedObject.id = this.listOptions[0][this.$attrs.selectKeyValue];
        if (target) {
          target.value = '';
        }
        this.inputFilteredData = '';
        this.filteredData('', target)

      }
      if (target != null && target.value == '') {
        target.focus();
      }
    },
  },
  watch: {
    value: function (value) {
      if (this.hasSelect) {
        this.$emit('update:modelValue', {'value': this.value, 'selected': this.SelectedObject.id});
      } else {
        this.$emit('update:modelValue', this.value);
      }
    },
    inputFilteredData: function (value) {
      this.filteredData(value)
    },
    selectedId: function (value) {
      this.selectById(value)
    },
    // modelValue: function (value) {
    //   this.value = value;
    // },
    'SelectedObject.id': function (value) {
      this.selectById(value)
      this.$emit('update:modelValue', {'value': this.value, 'selected': this.SelectedObject.id});
    },
  },
  emits: ['update:modelValue'],
}
</script>
