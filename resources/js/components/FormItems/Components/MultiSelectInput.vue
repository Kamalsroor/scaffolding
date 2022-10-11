<template>


  <Listbox v-model="value" as="div">
    <div class="mt-2 relative">
      <ListboxButton
        :class="[(!isLight ? 'bg-gray-800 border-gray-700 read-only:placeholder:text-gray-600' : 'bg-gray-100 border-gray-300'),(errors.length > 0 ? 'border-red-600 focus:ring-red-500 focus:border-red-500' : 'focus:ring-blue-500 focus:border-blue-500'), (isValid ? 'border-green-600 focus:ring-green-500 focus:border-green-500' : ' '), (selectedArray.length > 0 ? 'py-1.5' : 'py-2')]"
        class="relative w-full border rounded-md shadow-sm pl-3 pr-10 text-left cursor-default focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
        <span :class="[(!icon && !iconName ? 'space-x-4' : ''), 'flex items-center']">
          <div v-if="icon" class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
              <component :is="iconName" :class="!isLight ? 'text-gray-400' : 'text-gray-800'" aria-hidden="true"
                         class="h-6 w-6"/>
            </div>

          <div :class="[(icon && iconName ? 'pl-10' : ''), 'flex flex-wrap items-center gap-4']">

            <div v-for="(item , index) in selectedArray" :key="index"
                 :class="[(!isLight ? 'bg-gray-700 border-gray-700' : 'bg-gray-200 border-gray-300'), 'flex items-center border py-0.5 px-2 rounded-md']"
                 class="">
              <img v-if="item.img && $attrs.imgValue"
                   :alt="item.title"
                   :class="[(item.icon && item.iconName ? 'ml-10' : ''), 'flex-shrink-0 h-4 w-4 rounded-md']"
                   :src="item.img"/>
              <!--                  <component :is="selected.iconName"-->
              <!--                             :class="[(!isLight ? 'text-gray-400' : 'text-gray-800')]"-->
              <!--                             aria-hidden="true"-->
              <!--                             class="h-5 w-5"/>-->
              <!--                  <span :aria-label="selected.online ? 'Online' : 'Offline'"-->
              <!--                        :class="[(selected.online ? 'bg-green-400' : 'bg-red-500')]"-->
              <!--                        class="flex-shrink-0 inline-block h-2 w-2 rounded-md"/>-->
              <span v-if="item.title"
                    :class="[(item.icon && item.iconName ? 'ml-4' : ''), (!isLight ? 'text-gray-200' : 'text-gray-800')]"
                    class="ml-3 block truncate text-sm">{{ item.title }}</span>
              <div
                :class="[(!isLight ? 'bg-gray-500 hover:bg-red-600' : 'bg-gray-300 hover:bg-red-600'), 'ml-2 group rounded-sm p-0.5 cursor-pointer ease-in-out duration-100']"
                @Click='removeItemSelected(index)'>
                <XIcon class="h-3 w-3 text-gray-800 group-hover:text-red-100"/>
              </div>
          </div>

          </div>

          <span v-if="selectedArray.length < 1"
                :class="[(!isLight ? 'text-gray-400' : 'text-gray-800')]"
                class="block truncate text-base">
            {{ placeholder }}
          </span>
          <!--                  <span class="ml-4 truncate text-gray-400">{{ selected.username }}</span>-->

        </span>
        <span class="ml-3 absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
          <SelectorIcon aria-hidden="true" class="h-4 w-4 text-gray-400"/>
        </span>
      </ListboxButton>

      <transition leave-active-class="transition ease-in duration-75" leave-from-class="opacity-100"
                  leave-to-class="opacity-0">
        <ListboxOptions
          :class="[(!isLight ? 'scrollbar-track-gray-500 bg-gray-800' : 'scrollbar-track-gray-300 bg-gray-100')]"
          class="scrollbar-thumb-blue-700  scrollbar-thin overflow-y-scroll scrollbar-thumb-rounded-md scrollbar-track-rounded-md absolute z-10 mt-2 w-full shadow-lg max-h-56 rounded-md py-0 text-base ring-1 ring-black ring-opacity-5 overflow-auto focus:outline-none sm:text-sm">
          <div v-if="searchable" :class="[(!isLight ? 'bg-gray-800' : 'bg-gray-100')]"
               class="px-3 pb-2 pt-2 sticky top-0 z-20">
            <label class="sr-only" for="search-query">SearchQuery</label>
            <input id="search-query"
                   v-model="search"
                   :class="[(!isLight ? 'bg-gray-700 text-gray-200 placeholder:text-gray-400 focus:ring-blue-500 focus:border-blue-500 border-gray-600' : 'bg-gray-200 text-gray-800 placeholder:text-gray-400 focus:ring-blue-500 focus:border-blue-500 border-gray-300')]"
                   :placeholder="$attrs.searchPlaceholderValue"
                   class="shadow-sm block w-full sm:text-sm rounded-md"
                   type="text"/>
          </div>

          <ListboxOption v-for="data in filteredData" :key="data[$attrs.keyValue]" v-slot="{ active }"
                         :value="data[$attrs.keyValue]"
                         as="template">
            <li :class="[(active ? 'bg-blue-600 text-white' : '')]">
              <div class="flex items-center space-x-4 cursor-default select-none relative py-2 pl-3 pr-9">
                <img v-if="data[$attrs.imgValue] && $attrs.imgValue " :alt="data[$attrs.labelValue]"
                     :src="data[$attrs.imgValue]"
                     class="flex-shrink-0 h-6 w-6 rounded-md"/>
                <!--                <component :is="data.iconName"-->
                <!--                           :class="[(!isLight ? 'text-gray-400' : 'text-gray-800'), (active ? 'text-white' : 'text-gray-200')]"-->
                <!--                           aria-hidden="true"-->
                <!--                           class="h-5 w-5"/>-->
                <!--                <span-->
                <!--                  :class="[data.online ? 'bg-green-400' : 'bg-red-500', 'flex-shrink-0 inline-block h-2 w-2 rounded-md']"-->
                <!--                  aria-hidden="true"/>-->
                <span
                  :class="[(!isLight || active ? 'text-gray-100' : 'text-gray-800'), (isLight || active ? 'text-gray-200' : 'text-gray-900'), (selected.includes(data[$attrs.keyValue])  ? 'font-semibold' : 'font-normal')]"
                  class="truncate block">
                  {{ data[$attrs.labelValue] }}
                </span>


                <!--                <span-->
                <!--                  :class="[(!isLight ? 'text-gray-200' : 'text-gray-800'), (!isLight || active ? 'text-gray-200' : 'text-gray-400'), (selected ? 'font-semibold' : 'font-normal')]"-->
                <!--                  class="truncate ml-4 text-gray-400 truncate">-->
                <!--                {{ data.username }}-->
                <!--                </span>-->
                <span v-if="selected.includes(data[$attrs.keyValue])"
                      :class="[(active ? 'text-blue-100' : 'text-blue-600'), 'absolute inset-y-0 right-0 flex items-center pr-4']">
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
  HashtagIcon,
  LocationMarkerIcon,
  MailIcon,
  OfficeBuildingIcon,
  PhoneIcon,
  SearchIcon,
  UserIcon,
  UsersIcon,
  XIcon,
} from "@heroicons/vue/outline";
import {Listbox, ListboxButton, ListboxLabel, ListboxOption, ListboxOptions} from '@headlessui/vue'
import {CheckIcon, SelectorIcon} from '@heroicons/vue/solid'

export default {
  name: "SelectInput",
  components: {
    UsersIcon,
    UserIcon,
    OfficeBuildingIcon,
    XIcon,
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
    isLight: {
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
      value: null,
      selectedArray: [],
      selected: [],
      search: "",
    }
  },
  methods: {
    removeItemSelected(index) {
      this.selectedArray.splice(index, 1)
      this.selected.splice(index, 1);
    }
  },
  computed: {
    filteredData() {
      return this.data.filter(
        (
          data => data.name.toLowerCase().includes(
            this.search.toLowerCase()
          )
        )
      ).slice(0, 10);
    },
  },
  watch: {
    value: function (value) {

      if (!this.value) {
        return null;
      }
      if (this.selected.includes(value)) {
        let index = this.selected.indexOf(value);
        this.selectedArray.splice(index, 1)
        this.selected.splice(index, 1);

      } else {
        let selectedObject = this.data.find(data => data[this.$attrs.keyValue] == value)
        if (selectedObject) {
          let selected = {
            'title': selectedObject[this.$attrs.labelValue],
            'id': selectedObject[this.$attrs.keyValue],
            'iconValue': selectedObject[this.$attrs.iconValue],
            'img': selectedObject[this.$attrs.imgValue]
          }
          this.selectedArray.push(selected);
        }

        this.selected.push(value);
      }
      this.value = null;
      this.$emit('update:modelValue', this.selected);
    },
  },
  emits: ['update:modelValue'],
}
</script>
