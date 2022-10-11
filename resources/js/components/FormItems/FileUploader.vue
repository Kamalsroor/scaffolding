<template>
  <div>
    <template v-if="uploaderStyle === 'container'">
      <div>
        <div class="grow lg:grow-0 lg:shrink-0">
          <div v-if="label !== ''"
               class="block font-medium text-text-primary">
            {{ label }}
            <span v-if="required && label !== ''" class="ml-2 text-danger">*</span>
          </div>
          <div :class="[(label !== '' ? 'mt-2' : ''), 'sm:hidden']">
            <div class="flex items-center">
              <div :class="[(isRounded ? 'rounded-md' : ''), 'flex-shrink-0 inline-block overflow-hidden h-12 w-12']"
                   aria-hidden="true">

                <template v-if="file.file == null && !file.uploaded">
                  <div
                    :class="[(placeholderStyle !== 'avatar' || placeholderStyle !== 'image' ? 'object-contain bg-bg-light' : 'object-cover bg-bg-light'), (isRounded ? 'rounded-md' : ''),  'w-full h-full p-1 border border-bg-lighter']">
                    <FilesPlaceholderIcons :iconName="placeholderStyle"
                                           iconClass="text-text-secondary"/>
                  </div>
                </template>

                <template v-else-if="file.uploaded && !imagesMimeTypes.includes(file.mime_type)">
                  <div
                    :class="[(isRounded ? 'rounded-md' : ''), 'w-full h-full p-1 border border-green-700 bg-green-600']">
                    <FilesPlaceholderIcons :iconName="placeholderStyle"
                                           iconClass="text-green-100"/>
                  </div>
                </template>

                <img v-else-if="file.uploaded && imagesMimeTypes.includes(file.mime_type)"
                     :class="[(placeholderStyle === 'logo' ||placeholderStyle === 'passport' || placeholderStyle === 'bc'  ? 'object-contain bg-white' : ''),  (isRounded ? 'rounded-md' : ''),  'h-full w-full']"
                     :src="file.preview_url"
                     alt=""/>


              </div>
              <div :class="[(isRounded ? 'rounded-md' : ''), 'ml-5 shadow-sm']">
                <div :class="[(isRounded ? 'rounded-md' : ''),
                  'group relative py-2 px-3 flex items-center cursor-pointer justify-center text-white bg-primary hover:bg-primary-hover']">
                  <label :for="'mobile-'+ name + '-file'"
                         class="relative text-sm leading-4">
                    <span v-if="!label">Upload a file</span>
                    <span v-if="label">Upload {{ label }}</span>
                  </label>
                  <input :id="'mobile-'+ name + '-file'"
                         :accept="mimeTypesValidation"
                         :class="[ (isRounded ? 'rounded-md' : ''), 'absolute w-full h-full opacity-0  border-gray-300 ']"
                         :disabled="disabled"
                         name="user-photo" type="file"
                         @input="onSelectedFiles($event.target.files , name)"/>
                </div>
              </div>
            </div>
          </div>

          <div :class="[(isRounded ? 'rounded-md' : ''),
            (label !== '' ? 'mt-2' : ''),'hidden relative overflow-hidden sm:block']">

            <template v-if="file.file == null && !file.uploaded">
              <div
                :class="[(isLight ? (placeholderStyle !== 'avatar' || placeholderStyle !== 'image' ? 'object-contain bg-white' : '') : (placeholderStyle !== 'avatar' || placeholderStyle !== 'image' ? 'object-contain bg-gray-800' : '')),(placeholderStyle === 'logo' ? 'bg-gray-50 border-gray-200 border' : ''), 'relative grid place-items-center rounded-md w-full h-48 p-4']">
                <FilesPlaceholderIcons
                  :iconClass="[(isRounded ? 'rounded-md' : ''), 'h-full p-4 border-2 text-bg-light bg-white border-bg-lighter'] "
                  :iconName="placeholderStyle"/>
              </div>
            </template>

            <img
              v-else-if="file.uploaded && imagesMimeTypes.includes(file.mime_type)"
              :alt="file.file_name"
              :class="[(placeholderStyle === 'passport'|| placeholderStyle ===  'bc' ? 'object-cover bg-white' : 'bg-white'),(placeholderStyle === 'logo' ? 'object-contain bg-white p-2' : 'bg-white'),,(placeholderStyle === 'avatar' ? 'object-contain bg-white p-2' : 'bg-white'),(isRounded ? 'rounded-md' : ''), 'relative w-full h-48 border-2 border-green-400']"
              :src="file.preview_url"/>

            <template v-else-if="file.uploaded && !imagesMimeTypes.includes(file.mime_type)">
              <div
                :class="[(placeholderStyle !== 'avatar' || placeholderStyle !== 'image' ? 'object-contain bg-gray-800' : 'object-cover bg-green-200'),(isRounded ? 'rounded-md' : ''), 'relative grid place-items-center border border-gray-300  w-full h-48 p-4']">
                <FilesPlaceholderIcons :iconName="placeholderStyle"
                                       iconClass="h-full p-4 text-green-500 bg-green-900 border-2 rounded-md border-green-500"/>
              </div>
            </template>


            <label
              :for="name + '-file'"
              class="absolute ease-in-out duration-150 inset-0 cursor-pointer w-full h-full bg-black bg-opacity-75 flex items-center justify-center text-sm font-medium text-white opacity-0 hover:opacity-100 focus-within:opacity-100">
              <span v-if="!label && file.file == null && !file.uploaded">Upload a file</span>
              <span v-if="label && file.file == null && !file.uploaded">Upload {{ label }}</span>
              <div
                v-if="file.uploaded && placeholderStyle === 'bc' || placeholderStyle === 'image' || placeholderStyle === 'logo' || placeholderStyle === 'passport' || placeholderStyle === 'avatar'">
                <div v-if="file.uploaded" class="text-center">Change</div>
                <!--                <div v-if="file.uploaded" class="text-center truncate"> {{ file.file_name }}</div>-->
              </div>
              <span class="sr-only">{{ label }}</span>
              <input :id="name + '-file'"
                     :accept="mimeTypesValidation"
                     :class="[(isRounded ? 'rounded-md' : ''), 'absolute inset-0 w-full h-full opacity-0 cursor-pointer border border-gray-300']"
                     :disabled="disabled"
                     :name="name + '-photo'"
                     type="file"
                     @input="onSelectedFiles($event.target.files , name)"/>
            </label>
          </div>
          <div v-if="file.uploaded"
               :class="[(isLight ? 'text-green-500 border-green-600' : 'text-green-400 border-green-700 object-cover'),
                (isRounded ? 'rounded-md' : ''),
                (label !== '' ? 'mt-2' : ''),
                'sm:hidden block text-sm p-2 border border-green-700']">
            {{ file.file_name }}
          </div>
          <div v-if="!hideInfo"
               :class="[(isLight ? 'text-gray-700' : 'text-gray-400'),  'text-xs py-2 text-left px-6']">
            <ul class="list-disc grid grid-cols-1 gap-1">
              <li :class="[(file.error?.type ? 'text-red-500' : '')]">File types are ({{ mimeType.join(' , ') }})</li>
              <li :class="[(file.error?.size ? 'text-red-500' : '')]">Max file size is {{ fileSize }} (MB) Megabyte</li>
            </ul>
          </div>
        </div>
      </div>
    </template>
    <template v-if="uploaderStyle === 'drag-drop'">
      <div>
        <div class="hidden sm:block">
          <label v-if="label !== ''" class="block font-medium text-gray-200">
            {{ label }}<span v-if="required && label !== ''" class="ml-1 text-red-500">*</span>
          </label>
          <div
            :class="[dragging ? 'border-blue-600' : ((file.uploaded && file.error.type) || (file.uploaded && file.error.size) ? 'border-red-500' : 'border-gray-600'),((file.uploaded && !file.error.type && !file.error.size) ? 'border-green-600' : '') , 'mt-2 flex justify-center px-6 pt-5 pb-6 border-2  border-dashed rounded-md']"
            @drop.prevent="onDroppedFile"
            @dragover.prevent="dragging = true"
            @dragleave.prevent="dragging = false">
            <div class="space-y-2 text-center">
              <svg aria-hidden="true" class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor"
                   viewBox="0 0 48 48">
                <path
                  d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                  stroke-linecap="round" stroke-linejoin="round" stroke-width="2"/>
              </svg>
              <div class="flex-1 space-y-2 text-sm text-gray-600">
                <label
                  class="relative cursor-pointer bg-white rounded-md font-medium px-4 py-2 text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                  <span>Upload a file</span>
                  <input ref="files" :accept="mimeTypesValidation" :disabled="disabled" class="sr-only"
                         name="files"
                         type="file"
                         @input="onSelectedFiles($event.target.files , name)"/>
                </label>
                <p class="pl-1">or drag and drop</p>
              </div>
              <div v-if="!hideInfo" class="text-xs text-gray-500">
                <ul class="list-disc grid grid-cols-1 gap-1">
                  <li :class="[(file.error?.type ? 'text-red-500' : '')]">
                    File types are ({{ mimeType.join(' , ') }})
                  </li>
                  <li :class="[(file.error?.size ? 'text-red-500' : '')]">
                    Max file size is {{ fileSize }} (MB) Megabyte
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <!-- <span v-if="file.error" class="font-medium tracking-wide text-red-500 text-xs">
              {{ file.error }}
          </span> -->
          <div v-if="file.file !== null"
               class="flex justify-between space-x-4 items-center mt-2 p-2 bg-gray-800 rounded-md">
            <img
              :alt="file.file_name"
              :src="file.preview_url"
              class="rounded-md h-12 w-12 bg-gray-50 object-contain hover:object-cover transition transform duration-300 ease-in-out"/>
            <div class="text-sm truncate">
              {{ file.file_name }}
            </div>
            <div v-show="!file.uploaded" class="text-xs">
              {{ file.progress }}%
            </div>
          </div>
        </div>
        <div class="mt-2 sm:hidden">
          <label class="block font-medium text-gray-200">
            {{ label }}<span v-if="required" class="text-red-500">*</span>
          </label>
          <div class="flex items-center mt-2">
            <div aria-hidden="true" class="flex-shrink-0 inline-block rounded-md overflow-hidden h-12 w-12">

              <template v-if="file.file == null && !file.uploaded">
                <div
                  :class="[(placeholderStyle !== 'avatar' || placeholderStyle !== 'image' ? 'object-contain bg-gray-800' : 'object-cover bg-gray-200'), 'rounded-md w-full h-full p-1 border border-gray-300']">
                  <FilesPlaceholderIcons :iconName="placeholderStyle"
                                         iconClass="text-gray-400 border border-gray-300 "/>
                </div>
              </template>

              <template v-else-if="file.uploaded && !imagesMimeTypes.includes(file.mime_type)">
                <div
                  class="rounded-md w-full h-full p-1 border border-green-700 bg-green-900">
                  <FilesPlaceholderIcons :iconName="placeholderStyle"
                                         iconClass="text-green-500"/>
                </div>
              </template>

              <img v-else-if="file.uploaded && imagesMimeTypes.includes(file.mime_type)"
                   :class="[(placeholderStyle === 'logo' ||placeholderStyle === 'passport' ||placeholderStyle === 'bc'  ? 'object-contain bg-white' : 'object-cover bg-gray-200'),'rounded-md border border-gray-300 h-full w-full']"
                   :src="file.preview_url"
                   alt=""/>


            </div>
            <div class="ml-5 rounded-md shadow-sm">
              <div
                class="group relative rounded-md py-2 px-3 flex items-center cursor-pointer justify-center text-blue-100 bg-blue-600 hover:bg-blue-700 hover:text-white">
                <label :for="'mobile-'+ name + '-file'"
                       class="relative text-sm leading-4">
                  <span v-if="!label">Upload a file</span>
                  <span v-if="label">Upload {{ label }}</span>
                </label>
                <input :id="'mobile-'+ name + '-file'"
                       :accept="mimeTypesValidation"
                       :disabled="disabled"
                       class="absolute w-full h-full opacity-0 border border-gray-300 rounded-md"
                       name="user-photo" type="file"
                       @input="onSelectedFiles($event.target.files , name)"/>
              </div>
            </div>
          </div>
        </div>
        <div v-if="file.uploaded"
             class="sm:hidden block text-sm text-green-400 p-2 border border-green-700 rounded-md mt-2">
          {{ file.file_name }}
        </div>
        <div class="sm:hidden block text-xs py-2 text-left font-light px-6 text-gray-400">
          <ul class="list-disc grid grid-cols-1 gap-1">
            <li :class="[(file.error?.type ? 'text-red-500' : '')]">File types are ({{ mimeType.join(' , ') }})</li>
            <li :class="[(file.error?.size ? 'text-red-500' : '')]">Max file size is {{ fileSize }} (MB) Megabyte</li>
          </ul>
        </div>
      </div>
    </template>
  </div>
</template>

<script>
import FilesPlaceholderIcons from '@/Components/FormItems/Components/FilesPlaceholderIcons.vue'

export default {
  name: 'FileUploader',
  components: {
    FilesPlaceholderIcons
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
    uploaderStyle: {
      type: String,
      default: "container", //default, drag-drop, container
    },
    placeholderStyle: {
      type: String,
      default: "image", //image, avatar, logo, pdf, archive, doc, other
    },
    isLight: {
      type: Boolean,
      default: false
    },
    hideInfo: {
      type: Boolean,
      default: false
    },
    isRounded: {
      type: Boolean,
      default: false
    },
    disabled: {
      type: Boolean,
      default: false
    },
    fileSize: {
      type: String,
      default: 2, // size in megabytes
    },
    required: {
      type: Boolean,
      default: false,
    },
    multi: {
      type: Boolean,
      default: false,
    },
    filesCount: {
      type: String,
      default: 5, //count in numbers
    },
    mimeType: {
      type: Array,
      default: [],
    },
    modelValue: {
      type: Object,
      default: {
        file: null,
        progress: 0,
        file_name: null,
        error: {
          size: false,
          type: false,
        },
        uploaded: false,
        preview_url: null,
        id: null
      },
    },
    imgDimension: {
      type: Object,
      default: {
        width: null,// in px
        height: null,// in px
      },
    },
  },
  watch: {
    modelValue: function (value) {
      this.file = value;
    },
    file: {
      handler(value, oldVal) {
        // this.validation();
        this.$emit('update:modelValue', this.file);
      },
      deep: true
    },
  },
  data() {
    return {
      file: this.modelValue ?? {
        file: null,
        progress: 0,
        type: null,
        file_name: null,
        error: {
          size: false,
          type: false,
        },
        uploaded: false,
        preview_url: null,
        id: null
      },
      imagesMimeTypes: [
        "image/gif",
        "image/x-icon",
        "image/jpeg",
        "image/jpeg",
        "image/png",
        "image/svg+xml",
        "image/tiff",
        "image/tiff",
        "image/webp",
      ],

      mimeTypesValidation: '',
      dragging: false,
      mimeTypesValidationArray: [],
      mimeTypes: {
        "aac": "audio/aac",
        "abw": "application/x-abiword",
        "ai": "application/postscript",
        "arc": "application/octet-stream",
        "avi": "video/x-msvideo",
        "azw": "application/vnd.amazon.ebook",
        "bin": "application/octet-stream",
        "bz": "application/x-bzip",
        "bz2": "application/x-bzip2",
        "csh": "application/x-csh",
        "css": "text/css",
        "csv": "text/csv",
        "doc": "application/msword",
        "dll": "application/octet-stream",
        "eot": "application/vnd.ms-fontobject",
        "epub": "application/epub+zip",
        "gif": "image/gif",
        "htm": "text/html",
        "html": "text/html",
        "ico": "image/x-icon",
        "ics": "text/calendar",
        "jar": "application/java-archive",
        "jpeg": "image/jpeg",
        "jpg": "image/jpeg",
        "js": "application/javascript",
        "json": "application/json",
        "mid": "audio/midi",
        "midi": "audio/midi",
        "mp2": "audio/mpeg",
        "mp3": "audio/mpeg",
        "mp4": "video/mp4",
        "mpa": "video/mpeg",
        "mpe": "video/mpeg",
        "mpeg": "video/mpeg",
        "mpkg": "application/vnd.apple.installer+xml",
        "odp": "application/vnd.oasis.opendocument.presentation",
        "ods": "application/vnd.oasis.opendocument.spreadsheet",
        "odt": "application/vnd.oasis.opendocument.text",
        "oga": "audio/ogg",
        "ogv": "video/ogg",
        "ogx": "application/ogg",
        "otf": "font/otf",
        "png": "image/png",
        "pdf": "application/pdf",
        "ppt": "application/vnd.ms-powerpoint",
        "rar": "application/x-rar-compressed",
        "rtf": "application/rtf",
        "sh": "application/x-sh",
        "svg": "image/svg+xml",
        "swf": "application/x-shockwave-flash",
        "tar": "application/x-tar",
        "tif": "image/tiff",
        "tiff": "image/tiff",
        "ts": "application/typescript",
        "ttf": "font/ttf",
        "txt": "text/plain",
        "vsd": "application/vnd.visio",
        "wav": "audio/x-wav",
        "weba": "audio/webm",
        "webm": "video/webm",
        "webp": "image/webp",
        "woff": "font/woff",
        "woff2": "font/woff2",
        "xhtml": "application/xhtml+xml",
        "xls": "application/vnd.ms-excel",
        "xlsx": "application/vnd.ms-excel",
        "xlsx_OLD": "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        "xml": "application/xml",
        "xul": "application/vnd.mozilla.xul+xml",
        "zip": "application/zip",
        "3gp": "video/3gpp",
        "3gp_DOES_NOT_CONTAIN_VIDEO": "audio/3gpp",
        "3gp2": "video/3gpp2",
        "3gp2_DOES_NOT_CONTAIN_VIDEO": "audio/3gpp2",
        "7z": "application/x-7z-compressed"
      }
    }
  },
  created() {
    if (this.modelValue && this.modelValue.id) {
      this.file.uploaded = true;
      // this.file.file = this.modelValue;
    }
    this.file.error = {
      size: false,
      type: false,
    }
    if (this.mimeType.length) {

      Object.entries(this.mimeType).forEach(([index, mimeType]) => {
        this.mimeTypesValidation += this.mimeTypes[mimeType] + ', ';
        this.mimeTypesValidationArray.push(this.mimeTypes[mimeType]);
      })
    }
  },
  methods: {

    async checkDimensions(file) {
      let _URL = window.URL || window.webkitURL;
      let img;
      if ((file)) {
        img = new Image();
        let objectUrl = _URL.createObjectURL(file);
        let width = this.imgDimension.width;
        let height = this.imgDimension.height;
        let ifNotValidDimensions = false;
        const errorNotify = this.errorNotify.bind()

        img.onload = await function () {
          if (width != null && height != null) {
            if (this.width <= width && this.height <= height) {
              errorNotify('error', `Minimum file dimension is ${this.width} (Pixels) X  ${this.height} (Pixels)`, 5000);
              // this.errorNotify('error' , `Minimum file dimension is ${this.width} (Pixels) X  ${this.height} (Pixels)` , 5000)
              ifNotValidDimensions = true;
              return false;
            }
          }
          // alert(this.width + " " + this.height);
          _URL.revokeObjectURL(objectUrl);
        };

        img.src = objectUrl;
      }
    },
    onDroppedFile($event) {
      this.dragging = false;

      let files = [...$event.dataTransfer.items]
        .filter(item => item.kind === 'file')
        .map(item => item.getAsFile());
      this.uploadFiles(files);
    },
    onSelectedFiles(new_files) {
      let files = [...new_files];

      this.uploadFiles(files);
      // this.$refs.files.value = null;
    },
    mimeTypeValid(type) {
      return this.mimeTypesValidationArray.includes(type)
    },
    uploadFiles(files) {
      this.file.error.size = false;
      this.file.error.type = false;
      files.forEach(file => {

        if (this.mimeTypesValidationArray.length === 0 || this.mimeTypeValid(file.type)) {


          if ((file.size / 1000) > (this.fileSize * 1000)) {

            this.file.error.size = true;

            this.errorNotify('error', `Max file size is ${this.fileSize} (MB) Megabyte`, 5000)

            return false;
          }

          this.checkDimensions(file);
          this.file = {
            // model_id: id,
            file: file,
            mime_type: file.type,
            progress: 0,
            file_name: file.name,
            error: {
              size: false,
              type: false,
            },
            uploaded: false,
            preview_url: null,
            id: null
          };
        } else {
          let types = this.mimeType.join(' , ');
          // Object.entries(this.mimeType).forEach(([index, mimeType]) => {
          //   types += mimeType + ' , ';
          // })
          this.file.error.type = true;

          this.errorNotify('error', 'You can upload file(s) just as ' + types, 5000)

          return false;
        }
      });

      let form = new FormData;
      form.append('file', this.file.file);

      axios.post(this.route('api.media.store'), form, {
        onUploadProgress: (event) => {
          this.file.progress = Math.round(event.loaded * 100 / event.total);
        },
      })
        .then(({data}) => {
          this.file.uploaded = true
          this.file.id = data.id;
          this.file.preview_url = data.preview_url;
        })
        .catch(error => {
          //  = `Upload fail. Please try again later.`;

          if (error?.response.status === 422) {
            this.errorNotify('error', error.response.data.errors.file[0], 5000)

            // this.file.error = error.response.data.errors.file[0];
          } else {
            this.errorNotify('error', `Upload fail. Please try again later.`, 5000)

          }
        });
    },

  },

}
</script>

