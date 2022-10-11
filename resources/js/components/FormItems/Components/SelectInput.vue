<template>
  <Listbox v-model="value" as="div">
    <div :class="[( label ? 'mt-2' : ''), 'relative']">
      <ListboxButton
        :class="[(errors.length > 0 ? 'border-danger focus:ring-danger focus:border-danger' : 'focus:ring-primary focus:border-primary'),
        (isValid ? 'border-green-600 focus:ring-green-500 focus:border-green-500' : 'border-bg-dark read-only:placeholder:text-bg-dark')]"
        class="relative w-full border rounded-md pl-3 pr-10 py-2 text-left cursor-default bg-bg-light focus:outline-none focus:ring-1 focus:ring-primary focus:border-primary sm:text-sm">
            <span :class="!icon && !iconName ? 'space-x-4' : ''" class="flex items-center">
              <div v-if="icon" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <component :is="iconName" aria-hidden="true"
                           class="h-6 w-6 text-text-secondary"/>
              </div>
              <img v-if="selected.img && $attrs.imgValue"
                   :class="[(icon && iconName ? 'ml-10' : ''),(imgCover ? ' object-cover' : ' object-contain'),(hasBackground ? 'bg-white' : ''), 'rounded-sm']"
                   :src="selected.img"
                   alt="" class="flex-shrink-0 h-6 w-6 rounded-md"/>
              <!--                  <component :is="selected.iconName"-->
              <!--                             :class="[(!isLight ? 'text-gray-400' : 'text-gray-800')]"-->
              <!--                             aria-hidden="true"-->
              <!--                             class="h-5 w-5"/>-->
              <!--                  <span :aria-label="selected.online ? 'Online' : 'Offline'"-->
              <!--                        :class="[(selected.online ? 'bg-green-400' : 'bg-red-500')]"-->
              <!--                        class="flex-shrink-0 inline-block h-2 w-2 rounded-md"/>-->

            <span v-if="selected.title"
                  :class="[(icon && iconName ? 'ml-4' : '')]"
                  class="ml-3 block truncate text-base text-text-primary">{{ selected.title }}
            </span>
            <span v-else :class="[(icon && iconName ? 'pl-6' : '')]"
                  class="ml-3 block truncate text-base text-text-secondary">
              {{ placeholder }}
            </span>
              <span v-if="selected.extraTitle" class="ml-4 truncate text-text-secondary font-semibold">
                {{ selected.extraTitle }}
              </span>
            </span>
        <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
          <SelectorIcon aria-hidden="true" class="h-4 w-4 text-text-secondary"/>
        </span>
      </ListboxButton>

      <transition leave-active-class="transition ease-in duration-100" leave-from-class="opacity-100"
                  leave-to-class="opacity-0">
        <ListboxOptions
          class="scrollbar-track-bg-lighter bg-bg-light scrollbar-thumb-primary scrollbar-thin scrollbar-thumb-rounded-md scrollbar-track-rounded-md absolute z-10 mt-2 max-h-60 w-full overflow-auto shadow-lg max-h-56 rounded-md py-0 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
          <div v-if="searchable" class="px-3 pb-2 pt-2 sticky top-0 z-20 text-text-primary">
            <label class="sr-only" for="search-query">SearchQuery</label>
            <input id="search-query"
                   v-model="search"
                   :placeholder="$attrs.searchPlaceholderValue"
                   class="block w-full sm:text-sm rounded-md bg-bg-lighter text-text-primary placeholder:text-text-secondary focus:ring-primary focus:border-primary border-bg-lighter"
                   type="text"/>
          </div>

          <ListboxOption v-for="data in filteredData" :key="data[$attrs.keyValue]" v-slot="{ active }"
                         :disabled="data.active ? !data.active : false"
                         :value="data[$attrs.keyValue]"
                         as="template">
            <li :class="[(active ? 'bg-primary text-white' : '')]">
              <div class="flex items-center space-x-4 cursor-default select-none relative py-2 pl-3 pr-9">
                <img v-if="data[$attrs.imgValue] && $attrs.imgValue " :alt="data[$attrs.labelValue]"
                     :class="[(imgCover ? ' object-cover' : ' object-contain'),(hasBackground ? 'bg-bg-light' : ''), 'flex-shrink-0 h-6 w-6 rounded-sm' ]"
                     :src="data[$attrs.imgValue]"
                     class=""/>
                <!--                <component :is="data.iconName"-->
                <!--                           :class="[(!isLight ? 'text-gray-400' : 'text-gray-800'), (active ? 'text-white' : 'text-gray-200')]"-->
                <!--                           aria-hidden="true"-->
                <!--                           class="h-5 w-5"/>-->
                <!--                <span-->
                <!--                  :class="[data.online ? 'bg-green-400' : 'bg-red-500', 'flex-shrink-0 inline-block h-2 w-2 rounded-md']"-->
                <!--                  aria-hidden="true"/>-->


                <span
                  :class="[(active ? 'text-white' : 'text-text-primary'), (selected.id === data[$attrs.keyValue] ? 'font-semibold' : 'font-normal')]"
                  class="truncate block">
                  {{ data[$attrs.labelValue] }}
                </span>


                <span
                  :class="[(active ? 'text-white' : 'text-text-secondary'), 'truncate ml-4 truncate text-sm font-semibold']">
                  {{ data[$attrs.extraTitle] }}
                </span>
                <span v-if="selected.id === data[$attrs.keyValue]"
                      :class="[(active ? 'text-white' : 'text-primary'), 'absolute inset-y-0 right-0 flex items-center pr-4']">
                  <CheckIcon aria-hidden="true" class="h-6 w-6"/>
                </span>
              </div>
            </li>
          </ListboxOption>
        </ListboxOptions>
      </transition>
    </div>
  </Listbox>

</template>


<script>
import {
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
import {Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions} from '@headlessui/vue'
import {CheckIcon, SelectorIcon} from '@heroicons/vue/solid'

export default {
  name: "SelectInput",
  components: {
    UsersIcon,
    UserIcon,
    GlobeIcon,
    OfficeBuildingIcon,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    HashtagIcon,
    Listbox,
    ListboxButton,
    ListboxLabel,
    ListboxOption,
    ListboxOptions,
    CheckIcon,
    SelectorIcon,

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
      default: "text",
    },
    hasBackground: {
      type: Boolean,
      default: false,
    },
    imgCover: {
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
    onlineStatus: {
      type: Boolean,
      default: false,
    },
    avatar: {
      type: Boolean,
      default: false,
    },
    avatarUrl: {
      type: String,
      default: "",
    },
    currencyUSD: {
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
    searchQuery: {
      type: String,
      default: null,
    },
    data: {
      type: Array,
      default: [],
    },
  },

  data() {
    return {
      value: this.modelValue,
      selected: {
        'title': null,
        'id': null,
        'extraTitle': null
      },
      search: "",
    }
  },
  computed: {
    filteredData() {
      return this.data.filter(
        (
          item => item[this.$attrs.labelValue].toLowerCase().includes(
            this.search.toLowerCase()
          )
        )
      ).slice(0, 10);
    },
  },
  watch: {
    value: function (value) {

      let selectedObject = this.data.find(item => item[this.$attrs.keyValue] == value)
      if (selectedObject) {
        this.selected = {
          'title': selectedObject[this.$attrs.labelValue],
          'id': selectedObject[this.$attrs.keyValue],
          'iconValue': selectedObject[this.$attrs.iconValue],
          'img': selectedObject[this.$attrs.imgValue],
          'extraTitle': selectedObject[this.$attrs.extraTitle]

        }
      }
      this.$emit('update:modelValue', value);
    },
  },
  created() {
    if (this.value) {

      let selectedObject = this.data.find(data => data[this.$attrs.keyValue] == this.value)
      if (selectedObject) {
        this.selected = {
          'title': selectedObject[this.$attrs.labelValue],
          'id': selectedObject[this.$attrs.keyValue],
          'iconValue': selectedObject[this.$attrs.iconValue],
          'img': selectedObject[this.$attrs.imgValue],
          'extraTitle': selectedObject[this.$attrs.extraTitle]

        }
      }

    }
  },
  emits: ['update:modelValue'],
}
</script>
