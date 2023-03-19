<template>

  <div class="mt-2 flex rounded-md shadow-sm group">
    <div class="relative flex items-stretch flex-grow focus-within:z-10 	">
      <EmailEditor ref="emailEditor"
      :options="options"
      min-height="450px"
      v-on:load="editorLoaded"
      v-on:updated="exportHtml"
      />
      <!-- <textarea
        :id="name"
        v-model="value"
        :class="[(!isLight ? 'bg-gray-800 border-gray-700 read-only:placeholder:text-gray-600' : 'bg-white border-gray-300'), (icon ? 'pl-10' : ''), (type === 'url' ? 'pl-16' : ''), (currencyUSD ? 'pl-10 pr-14' : ''), (type === 'number' ? '' : ''), (errors.length > 0 ? 'border-red-600 focus:ring-red-500 focus:border-red-500' : 'focus:ring-blue-500 focus:border-blue-500'), (isValid ? 'border-green-600 focus:ring-green-500 focus:border-green-500' : ' ')]"
        :disabled="disabled"
        :name="name"
        :placeholder="placeholder"
        :readonly="readonly"
        :required="required"
        :type="type"
        class="block w-full rounded-md sm:text-sm ease-in-out duration-500 disabled:read-only:bg-gray-600 disabled:read-only:placeholder:text-gray-400 disabled:read-only:cursor-not-allowed sm:h-44"
      /> -->
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
import EmailEditor from '@/Components/FormItems/editor/EmailEditor.vue'


export default {
  name: "TextEditor",
  components: {
    UsersIcon,
    UserIcon,
    OfficeBuildingIcon,
    MailIcon,
    LocationMarkerIcon,
    SearchIcon,
    PhoneIcon,
    HashtagIcon,
    EmailEditor,
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
    mergeTags: {
      type: Object,
      default: {},
    },
    icon: {
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
  },
  data() {
    return {
      value: this.modelValue,
      options: {},
      newMergeTags: {},
    }
  },
  created() {
    // console.log(this.modelValue);
    this.value = this.modelValue;

  },
  watch: {
    value: function (value) {
      this.$emit('update:modelValue', this.value);
    },
  },
  emits: ['update:modelValue'],
  methods: {
    editorLoaded() {
      // Pass your template JSON here

      // this.$refs.emailEditor.editor.addEventListener('design:updated', function(updates) {
      //   // Design is updated by the user

      //   unlayer.exportHtml(function(data) {
      //     var json = data.design; // design json
      //     var html = data.html; // design html
      //     // console.log(json , html);
      //     // Save the json, or html here
      //   })
      // })

      this.$refs.emailEditor.editor.loadDesign({
        minHeight: '250px',
        minWidth: '250px',
        contentWidth: "50%", // or percent "50%"
        html: this.modelValue ?? '<div></div>',
        classic: true,
      });
      let newMergeTags = JSON.parse(JSON.stringify(this.mergeTags))
      this.$refs.emailEditor.editor.setMergeTags(newMergeTags);
    },

    saveDesign() {
      this.$refs.emailEditor.editor.saveDesign(
        (design) => {
          // console.log('saveDesign', design);
        }
      )
    },
    exportHtml() {
      this.$refs.emailEditor.editor.exportHtml(
        (data) => {
          this.value = data.html;
          // console.log('exportHtml', data);
        }
      )
    }
  }
}
</script>
