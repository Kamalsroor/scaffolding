<template>
  <ckeditor :editor="editor" v-model="editorData" :config="editorConfig"></ckeditor>
<!--
  <component
    :is="tagName"
    ref="editorRef"
    v-editor-directive="{ props, emit, cacheData }"
    class="select"
  ></component> -->
</template>

<script >
import { inject, onMounted, ref } from "vue";
// import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { init } from "./index";
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
// import Base64UploadAdapter from '@ckeditor/ckeditor5-upload/src/adapters/base64uploadadapter';
import UploadAdapter from './UploadAdapter';

export default {
  name: 'text_editor',
  props: {

    modelValue: {
      type: Object,
      default: null,
    },
  },
  data() {
      return {
          editor: ClassicEditor,
          editorData: '<p>Content of the editor.</p>',
          editorConfig: {
            // extraPlugins: [this.uploader],

              // The configuration of the editor.
          }
      };
  },
  methods(){
    uploader(editor)
    {
      // console.log(editor.plugins);
        editor.plugins.get( 'FileRepository' ).createUploadAdapter = ( loader ) => {
            return new UploadAdapter( loader );
        };
    }
  },
  watch: {
    modelValue: function (value) {
      this.editorData = value;
    },
    editorData: {
      handler(value, oldVal) {
        this.$emit('update:modelValue', this.editorData);
      },
      deep: true
    },
  },
  created() {
    this.editorData = this.modelValue;
  },
}

// const vEditorDirective = {
//   mounted(el, { value }) {
//     init(el, ClassicEditor, value);
//   },
// };

// const props = defineProps({
//   modelValue: {
//     type: String,
//     default: "",
//   },
//   config: {
//     type: Object,
//     default: () => ({

//     }),
//   },
//   tagName: {
//     type: String,
//     default: "div",
//   },
//   disabled: {
//     type: Boolean,
//     default: false,
//   },
//   refKey: {
//     type: String,
//     default: null,
//   },
// });

// const emit = defineEmits();

// const editorRef = ref();
// const cacheData = ref("");

// const bindInstance = () => {
//   if (props.refKey) {
//     const bind = inject(`bind[${props.refKey}]`);
//     if (bind) {
//       bind(editorRef.value);
//     }
//   }
// };

// onMounted(() => {
//   bindInstance();
// });
</script>
