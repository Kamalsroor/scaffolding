<template>
  <div>
    <div class="form-label">{{ label }}</div>
    <div class="relative w-full  rounded-md cursor-pointer" :class="[( max == 1 ? 'h-52' : '')]"   v-if="(final_selected_file?.file_type === 'image' || final_selected_file?.file_type === null ) && max == 1" @click="openModel()">
      <img v-if="max == 1 && (final_selected_file?.file_type === 'image' || final_selected_file?.file_type === null)"   class="w-full h-52 object-cover bg-white ease-in-out hover:scale-105 duration-300"
           :src="final_selected_file?.preview_url"/>




      <img v-if="max > 1 && final_selected_files.length == 0" class="w-full h-52 object-cover bg-white ease-in-out hover:scale-105 duration-300"
           :src="defaultSelected?.preview_url"/>
       <div  v-else-if="max > 1 && final_selected_files.length > 0" class="grid gap-6 grid-cols-3 py-4">
        <div v-for="file in final_selected_files" :key="file">
            <div class="h-14 rounded-md">
              <img class="h-14 ring-2 ring-slate-200 shadow object-cover rounded-md" :src="file.preview_url" :title="file.name"
                  :alt="file.name"/>
            </div>
            <h1 class="block font-medium mt-4 text-center truncate">
              {{ file.name }}
            </h1>
            <div class="text-slate-500 text-xs text-center mt-0.5">
              Size: {{ file.size }}
            </div>
          </div>
      </div>
      <div
        class="group absolute cursor-pointer inset-0 place-content-center flex items-center hover:bg-primary hover:bg-opacity-80 transition duration-300 ease-in-out">
        <span class=" font-semibold text-white text-lg opacity-0 duration-300 ease-in-out group-hover:opacity-100 ">Select an Image</span>
      </div>



    </div>
    <div class="relative w-full  rounded-md cursor-pointer" :class="[( max == 1 ? 'h-52' : '')]"   v-if="max > 1" >


      <img v-if="max > 1 && final_selected_files.length == 0" class="w-full h-52 object-cover bg-white ease-in-out hover:scale-105 duration-300"
           :src="defaultSelected?.preview_url"/>
       <div  v-else-if="max > 1 && final_selected_files.length > 0" class="grid gap-6 grid-cols-5 py-4">
        <div  v-for="(img , key) in final_selected_files"
        :key="key" class="px-5 pb-4  border-b border-slate-200/60">
          <div
                class="intro-y ">
            <div
              class="file box border-slate-200/60 dark:border-darkmode-400 shadow-none rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in">

              <span v-if="img.thumbnail_id || img.preview_url "
                    class="w-3/5 file__icon file__icon--image mx-auto">
                  <div class="file__icon--image__preview image-fit">
                    <img alt="Image"
                          :src="img.thumbnail_id ? img.thumbnail_url :img.preview_url"/>
                  </div>
                </span>
              <span v-else class="w-3/5 file__icon file__icon--file mx-auto">
                  <div class="file__icon__file-name">
                    {{ img.type }}
                  </div>
                </span>
              <span class="block font-medium mt-4 text-center truncate">
                  {{ img.name }}
                </span>
              <div class="text-slate-500 text-xs text-center mt-0.5">
                {{ img.size }}
              </div>
              <Dropdown class="absolute top-0 right-0 mr-2 mt-3 ml-auto">
                <DropdownToggle tag="a" class="w-5 h-5 block" href="javascript:;">
                  <MoreVerticalIcon class="w-5 h-5 text-slate-500"/>
                </DropdownToggle>
                <DropdownMenu class="w-40">
                  <DropdownContent>
                    <!-- <DropdownItem>
                      <TrashIcon class="w-4 h-4 mr-2"/>
                      Delete
                    </DropdownItem> -->
                    <DropdownItem @click="showVideo(img)">
                      <ViewIcon class="w-4 h-4 mr-2"/>
                      Show
                    </DropdownItem>
                    <DropdownItem v-if="img.file_type != 'image'" @click="selectThumbnail(img)">
                      <ViewIcon class="w-4 h-4 mr-2"/>
                      Select thumbnail
                    </DropdownItem>
                  </DropdownContent>
                </DropdownMenu>
              </Dropdown>
            </div>
          </div>
          <!-- <div class="intro-y grid grid-cols-3 gap-3">
            <img src="http://via.placeholder.com/640x360" alt="Image Alt" title="Image Title"/>
            <img src="http://via.placeholder.com/640x360" alt="Image Alt" title="Image Title"/>
            <img src="http://via.placeholder.com/640x360" alt="Image Alt" title="Image Title"/>
          </div> -->
        </div>
        <!-- <div v-for="file in final_selected_files" :key="file">
            <div class="h-14 rounded-md  place-self-center">
              <img class="h-14 ring-2 ring-slate-200 shadow object-cover rounded-md" :src="file.preview_url" :title="file.name"
                  :alt="file.name"/>
            </div>
            <h1 class="block font-medium mt-4 text-center truncate">
              {{ file.name }}
            </h1>
            <div class="text-slate-500 text-xs text-center mt-0.5">
              Size: {{ file.size }}
            </div>
          </div> -->
      </div>
      <div
        @click="openModel()"
        class="group absolute cursor-pointer inset-0 place-content-center flex items-center hover:bg-primary hover:bg-opacity-80 transition duration-300 ease-in-out">
        <span class=" font-semibold text-white text-lg opacity-0 duration-300 ease-in-out group-hover:opacity-100 ">Select an Files</span>
      </div>



    </div>
    <div class="relative w-full  rounded-md cursor-pointer" :class="[( max == 1 ? 'h-52' : '')]"   v-if="(final_selected_file?.file_type != 'image' && final_selected_file?.file_type != null)  && max == 1" >

      <img v-if="max == 1 && final_selected_file?.file_type != 'image'"  class="w-full h-52 object-contain  bg-white ease-in-out hover:scale-105 duration-300"
      :src="final_selected_file?.preview_url"/>
      <div class="absolute right-0 top-2 z-50">
        <button type="button" class="btn btn-danger mr-2 " @click="removedSelected">
          <TrashIcon class="w-4 h-4 mr-2"/>
          Delete
        </button>

        <button type="button" class="btn btn-primary mr-2 " @click="showVideo(final_selected_file)">
          <ViewIcon class="w-4 h-4 mr-2"/>
          Show
        </button>
      </div>


      <div
        @click="openModel()"
        class="group absolute cursor-pointer inset-0 place-content-center flex items-center hover:bg-primary hover:bg-opacity-80 transition duration-300 ease-in-out">
        <span class=" font-semibold text-white text-lg opacity-0 duration-300 ease-in-out group-hover:opacity-100 ">change file</span>
      </div>
    </div>



      <!-- BEGIN: Modal Content -->
      <Modal :show="openUploader" @hidden="openUploader = false" size="modal-xl">
        <ModalBody class="box grid grid-cols-12 p-0">


          <!-- BEGIN: Inbox Side Menu -->
          <div
            class="col-span-12 xl:col-span-4 border-b xl:border-r border-slate-200/60 bg-slate-50 dark:bg-darkmode-600 p-5 rounded-l-md">
            <div class="relative flex flex-col divide-y divide-slate-300">
              <div class="h-1/2 p-3">
                <file-pond
                class="col-span-12 sm:col-span-12 h-1/2"
                name="file"
                ref="input"
                maxFiles="5"
                :allowMultiple="true"
                allowFileTypeValidation="true"
                :acceptedFileTypes="type"
                :server="{  process, revert }"
                @init="handleFilePondInit"
                label-idle="Drop files here..."
                v-bind:allow-multiple="true"
                accepted-file-types="image/jpeg, image/png"
              />
              </div>


              <div class="h-1/2 py-3" v-if="selectedImage && max == 1">
                <div class="w-full h-48 rounded-md">
                  <img class="w-full h-48 object-cover rounded-md" :src="selectedImage.preview_url" :title="selectedImage.name"
                        :alt="selectedImage.name"/>
                </div>
                <h1 class="block font-medium mt-4 text-center truncate">
                  {{ selectedImage.name }}
                </h1>
                <div class="text-slate-500 text-xs text-center mt-0.5">
                  Size: {{ selectedImage.size }}
                </div>
              </div>

              <div  v-else-if="max > 1" class="grid gap-6 grid-cols-3 py-4">
                <div v-for="file in selectedImages" :key="file">
                    <div class="h-14 rounded-md">
                      <img class="h-14 ring-2 ring-slate-200 shadow object-cover rounded-md" :src="file.preview_url" :title="file.name"
                          :alt="file.name"/>
                    </div>
                    <h1 class="block font-medium mt-4 text-center truncate">
                      {{ file.name }}
                    </h1>
                    <div class="text-slate-500 text-xs text-center mt-0.5">
                      Size: {{ file.size }}
                    </div>
                  </div>
              </div>


            </div>
          </div>
          <!-- END: Inbox Side Menu -->
          <!-- BEGIN: Inbox Content -->
          <div class="inbox col-span-12 xl:col-span-8">
            <div
              class="flex flex-wrap justify-between gap-y-3 items-center px-5 pt-5 border-b border-slate-200/60 dark:border-darkmode-400 mb-4 pb-5">
              <div class="w-[350px] relative">
                <input type="text"
                        v-model="searchText"
                        class="form-control pl-10"
                        placeholder="Search for images or files..."/>
                <SearchIcon
                  class="w-5 h-5 absolute inset-y-0 left-0 my-auto text-slate-400 ml-3"
                />
              </div>
              <button class="btn btn-primary mr-2" @click="SelectAndClose">
                <CheckSquareIcon class="w-4 h-4 mr-2"/>
                Save
              </button>
            </div>
            <div class="px-5 pb-4 grid grid-cols-12 gap-3 sm:gap-6 border-b border-slate-200/60">
              <div v-for="(img, key) in searchImages"
                    :key="key"

                    class="intro-y col-span-6 sm:col-span-4 md:col-span-3">
                <div
                  class="file box border-slate-200/60 dark:border-darkmode-400 shadow-none rounded-md px-5 pt-8 pb-5 px-3 sm:px-5 relative zoom-in " @click="selectimage(img)">
                  <div class="absolute left-0 top-0 mt-3 ml-3">
                    <input class="form-check-input border border-slate-500"
                            type="checkbox"
                          :disabled="allowMultiple && !img.selected ? disabledInputs : false"
                            :checked="img.selected"/>
                  </div>
                  <span v-if="img.preview_url"
                        class="w-3/5 file__icon file__icon--image mx-auto">
                      <div class="file__icon--image__preview image-fit">
                        <img alt="Image"
                              :src="img.preview_url"/>
                      </div>
                    </span>
                  <span v-else class="w-3/5 file__icon file__icon--file mx-auto">
                      <div class="file__icon__file-name">
                        {{ img.type }}
                      </div>
                    </span>
                  <span class="block font-medium mt-4 text-center truncate">
                      {{ img.name }}
                    </span>
                  <div class="text-slate-500 text-xs text-center mt-0.5">
                    {{ img.size }}
                  </div>
                </div>
                <Dropdown class="absolute top-0 right-0 mr-2 mt-3 ml-auto">
                  <DropdownToggle tag="a" class="w-5 h-5 block" href="javascript:;">
                    <MoreVerticalIcon class="w-5 h-5 text-slate-500"/>
                  </DropdownToggle>
                  <DropdownMenu class="w-40">
                    <DropdownContent>
                      <DropdownItem @click="showVideo(img)">
                        <ViewIcon   class="w-4 h-4 mr-2"/>
                        Show
                      </DropdownItem>
                    </DropdownContent>
                  </DropdownMenu>
                </Dropdown>
              </div>
              <!-- <div class="intro-y grid grid-cols-3 gap-3">
                <img src="http://via.placeholder.com/640x360" alt="Image Alt" title="Image Title"/>
                <img src="http://via.placeholder.com/640x360" alt="Image Alt" title="Image Title"/>
                <img src="http://via.placeholder.com/640x360" alt="Image Alt" title="Image Title"/>
              </div> -->
            </div>
            <div class="p-5 flex flex-col sm:flex-row items-center text-center sm:text-left text-slate-500">
              <div>4.41 GB (25%) of 17 GB used Manage</div>
              <nav class="w-full sm:w-auto sm:mr-auto">
                <ul class="pagination">
                  <!-- <li class="page-item">
                    <a class="page-link" href="#">
                      <ChevronsLeftIcon class="w-4 h-4" />
                    </a>
                  </li> -->
                  <li class="page-item">
                    <a class="page-link" href="#" @click="getMedia(pagintion.current_page - 1)">
                      <ChevronLeftIcon class="w-4 h-4"/>
                    </a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" v-if="pagintion.current_page != 1"
                        @click="getMedia(pagintion.current_page - 1)">{{ pagintion.current_page - 1 }}</a>
                  </li>
                  <li class="page-item active">
                    <a class="page-link" href="#">{{ pagintion.current_page }}</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" v-if="pagintion.current_page != pagintion.last_page"
                        @click="getMedia(pagintion.current_page + 1)">{{ pagintion.current_page + 1 }}</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#">...</a>
                  </li>
                  <li class="page-item">
                    <a class="page-link" href="#" @click="getMedia(pagintion.current_page + 1)">
                      <ChevronRightIcon class="w-4 h-4"/>
                    </a>
                  </li>
                  <!-- <li class="page-item">
                    <a class="page-link" href="#">
                      <ChevronsRightIcon class="w-4 h-4" />
                    </a>
                  </li> -->
                </ul>
              </nav>

            </div>
          </div>
          <!-- END: Inbox Content -->
        </ModalBody>
      </Modal>
      <!-- END: Modal Content -->


          <!-- BEGIN: Modal Content -->
          <Modal :show="openShower" @hidden="closeShower" size="modal-xl">
            <ModalBody class="box grid grid-cols-12 p-0 	" :class="[(final_selected_file_show?.file_type === 'image' ? 'h-[32rem]' : 'h-[64rem]')]">


              <!-- BEGIN: Inbox Content -->
              <div v-if="final_selected_file_show?.file_type === 'document'" class="inbox col-span-12 xl:col-span-12 ">
                <object
                :data="final_selected_file_show?.path"
                :type="final_selected_file_show?.type"
                width="100%"
                height="100%"
              >
                <iframe
                  :src="final_selected_file_show?.path"
                  width="100%"
                  height="100%"
                  style="border: none;"
                >
                  <p>
                    Your browser does not support PDFs.
                    <a href="https://example.com/test.pdf">Download the PDF</a>
                    .
                  </p>
                </iframe>
              </object>
              </div>

              <div v-if="final_selected_file_show?.file_type === 'video'" class="inbox col-span-12 xl:col-span-12 ">

                <video class="h-full w-full " controls muted	>
                  <source :src="final_selected_file_show?.path" :type="final_selected_file_show?.type">
                Your browser does not support the video tag.
                </video>

              </div>
              <div v-if="final_selected_file_show?.file_type === 'image'" class="inbox col-span-12 xl:col-span-12 ">
                <img  class="h-full w-full object-cover bg-white ease-in-out hover:scale-105 duration-300"
                :src="final_selected_file_show?.preview_url"/>

              </div>






              <!-- END: Inbox Content -->
            </ModalBody>
          </Modal>
          <!-- END: Modal Content -->

    <template v-if="errors.length">
      <div
        v-for="(error, index) in errors"
        :key="index"
        class="text-danger mt-2"
      >
        {{ error.$message }}
      </div>
    </template>
  </div>

</template>
<script>
import {ref} from "vue";
// Import Vue FilePond
import vueFilePond from "vue-filepond";

// import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
// import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Create component
const FilePond = vueFilePond(
  // FilePondPluginFileValidateType,
  // FilePondPluginImagePreview
);
  import {Loading, Notify } from '@/mixins'

export default {

  name: "fileUploader",
  mixins: [Notify, Loading ],
  props: {
    label: {
      type: String,
      default: "",
    },
    name: {
      type: String,
      default: "",
    },
    max: {
      type: Number,
      default: 1,
    },

    returnObject: {
      type: Boolean,
      default: false,
    },
    acceptedFileTypes: {
      type: Array,
      default: ["all"],
    },
    errors: {
      type: Array,
      default: [],
    },
    modelValue: {
      type: Number,
      default: null,
    },
  },
  data() {
    return {
      images: [],
      defaultSelected: {
        preview_url: 'https://via.placeholder.com/468x468',
        path: null,
        name: null,
        type: null,
        file_type: null,
        size: null,
        created_at: null,
        selected: false,
        id: null,
        thumbnail_id: null,
        thumbnail_url: null,
      },
      openUploader: ref(false),
      openShower: ref(false),
      isThumbnail: ref(false),
      searchText: null,
      thumbnail_file_id: null,
      selected_thumbnail_file: null,
      HandelVMArrayLoad: false,
      // disabledInputs: false,
      pagintion: {
        current_page: 1,
        last_page: 1,
      },
      selected_file: null, // files uploaded, input
      final_selected_file_show: null, // files uploaded, input
      selected_files: [], // files uploaded, input
      final_selected_file: null, // files uploaded, input
      final_selected_files: [], // files uploaded, input
    }
  },
  computed: {
    allowMultiple() {
      return this.max > 1
    },
    disabledInputs() {
        return this.selected_files.length >= this.max ;
    },
    rule() {
      return this.required && !this.first && this.files.length === 0
    },
    selectedImage() {
      return this.selected_file
    },
    selectedImages() {
      return this.selected_files;
    },
    searchImages() {
      let searchText = this.searchText
      if (searchText != null) {
        return this.images.filter(function (str) {
          return str.name.toLowerCase().includes(searchText.toLowerCase())
        });
      }
      return this.images;
    },
  },
  methods: {
    async selectimage(img) {
      console.log('13');


      if(img.selected){
          if(this.max == 1){
            await this.removedSelected();
            this.selected_file = img;

          }else{


            const index = this.selected_files.findIndex(obj => obj.id === img.id);
            this.selected_files.splice(index, 1);
          }
      }else{
          if(this.max == 1){
            await this.removedSelected();
            this.selected_file = img;
          }else{
            if(this.isThumbnail){
              this.selected_thumbnail_file = img;
              await this.images.forEach(element => element.selected = false);
              this.selected_files = [];
              this.selected_files.push(img);

            }else{

              if(this.selected_files.length < this.max){
                this.selected_files.push(img);

              }else{
                $h.errorNotify('the max files ' + this.max);
                return ;
              }
            }
          }
      }
      img.selected = !img.selected;

    },
    async removedSelected(all = false) {
      console.log('12');

      this.selected_file = this.defaultSelected;

      if(all){
        this.final_selected_file = this.defaultSelected;

        this.final_selected_files = [];
        this.final_selected_file_show = null; // files uploaded, input
        this.selected_files = []; // files uploaded, input
          if(this.max == 1){
            this.$emit('update:modelValue', null);
          }else{
            this.$emit('update:modelValue', []);
          }
      }

      await this.images.forEach(element => element.selected = false);


    },

    async showVideo(final_selected_file) {
      this.openShower = true;
      this.final_selected_file_show = final_selected_file;
    },

    async selectThumbnail(video) {
      console.log('11');



      this.isThumbnail = true;
      await this.openModel(this.isThumbnail);
      this.thumbnail_file_id = video;

      if(video.thumbnail_id){
        let selectedFile = this.images.find((img) => { return img.id == this.thumbnail_file_id.thumbnail_id })
        this.selectimage(selectedFile);

      }

    },


    async closeShower() {
      this.openShower = false;
      this.final_selected_file_show = null;
    },


    //---- Open Model
    async openModel(isThumbnail = false) {
      console.log('10');

      this.getMedia();
      this.isThumbnail = isThumbnail;

      if(!isThumbnail){
        console.log('3');
        if(this.max == 1){
          this.selectimage(this.final_selected_file);
        }else{
          this.selected_files = [];

          if(this.modelValue?.length == 0){
            this.final_selected_files = [];

          }
          await this.final_selected_files.forEach((element) => {element.selected = false ; this.selectimage(element)});
        }
      }else{
        if(this.max == 1){
        }else{
          this.selected_files = [];
          // await this.final_selected_files.forEach((element) => {element.selected = false});

        }
      }
      this.openUploader = true;
    },




    async SelectAndClose() {
      console.log('9');

      let ids = [];
      if(this.isThumbnail){
        this.selected_files = [];

        await this.final_selected_files.forEach((img , index) => {

          if(img.id == this.thumbnail_file_id.id){
            img.thumbnail_id = this.selected_thumbnail_file?.id;
            img.thumbnail_url = this.selected_thumbnail_file?.preview_url;
          }
          this.selected_files.push(img)
        });

        this.final_selected_files = [];

        // let selectedFile = this.final_selected_files.find((img) => { return img.id == this.thumbnail_file_id.id })
        // selectedFile.thumbnail_id = this.selected_thumbnail_file?.id;
        // selectedFile.thumbnail_url = this.selected_thumbnail_file?.preview_url;


      }

        if(this.max == 1){
          // this.final_selected_file = this.selected_file;
          if(this.returnObject){
            this.$emit('update:modelValue', this.selected_file);
          }else{
            this.$emit('update:modelValue', this.selected_file.id);
          }
        }else{
          // this.final_selected_files = [];
          this.selected_files.forEach((img , index) => {
            console.log('img' , img);
            this.final_selected_files.push(img) ; ids.push({id: img.id , thumbnail_id : img.thumbnail_id , thumbnail_url:img.thumbnail_url})
          })
          this.$emit('update:modelValue', ids);
        }
      // }

      this.closeModel();
    },
    //---- Close Model
    closeModel() {
      console.log('8');

      this.openUploader = false;
    },
    process(fieldName, file, metadata, load, error, progress, abort) {
      var self = this
      let form = new FormData;
      form.append('file', file);
      progress(true, 0, 1024);

      const CancelToken = axios.CancelToken;
      const source = CancelToken.source();

      return axios.post('media', form, {
        onUploadProgress: (e) => {
          progress(e.lengthComputable, e.loaded, e.total);
        },
      })
        .then(({data}) => {
          load(data.preview_url)
          this.getMedia()
          return {
            abort: () => {
              abort()
              // uploadTask.cancel();
            }
          }
        })
        .catch(e => {
          if (axios.isCancel(e)) {
          } else {
            this.handleError(error, e)
            return {
              abort: () => {
                abort()
              }
            }
          }


        });


    },
    revert(uniqueFileId, load, error) {
      var self = this
      // Create a reference to the file to delete

      // uniqueFileId
      var desertRef = this.$storage.ref().child(uniqueFileId);
      desertRef.delete().then(function () {
        var index = self.files.indexOf(uniqueFileId);
        if (index > -1) {
          self.files.splice(index, 1);
        }
        load();
      }).catch(function (e) {
        this.handleError(error, e)
      });
    },
    load(source, load, error, progress, abort, headers) {

      axios.get(`media/${source}`, {
        // responseType: "blob",
        headers: {"Accept": "image/jpeg"},

        onUploadProgress: (e) => {
          progress(e.lengthComputable, e.loaded, e.total);

          // progress(true, snapshot.bytesTransferred, snapshot.totalBytes)
          // this.file.progress = Math.round(event.loaded * 100 / event.total);
        },
      })
        .then(({data}) => {
          //  data.blob().then(function(myBlob) {
          //   // console.log(myBlob);

          //   });

          // var blob = new Blob([data], {
          //     type: 'image/jpeg'
          // });
          //   // console.log(data , blob);
          load('http://dashboard.wsa-events.test/storage/media/2022/06/30/270/1T7WfMgE0YImIdbS6hHI.jpg')
          // load(data);
          // Should call the progress method to update the progress to 100% before calling load
          // (computable, loadedSize, totalSize)
          // var file = new Blob([data]);
          // Should call the load method with a file object when done
          // load(file);
        })
        .catch((e) => {
          error(e);

          // throw error.data.message
        });

      // Should expose an abort method so the request can be cancelled
      return {
        abort: () => {
          // User tapped cancel, abort our ongoing actions here

          // Let FilePond know the request has been cancelled
          abort();
        },
      };
    },
    fetch(url, load, error, progress, abort, headers) {
      error("Solo archivos locales")
    },
    restore(uniqueFileId, load, error, progress, abort, headers) {
      error()
    },
    handleError(error, e) {

      switch (e.code) {
        case 'storage/canceled':
          break;
        default:
          error(e.message)
      }
    },
    handleFilePondInit: function () {

      this.$refs.input.getFiles();
    },

    fetchMedia(item) {
      console.log('7');

      let selected = false;
      if(this.max == 1){

         selected = item.id === this.selected_file?.id ? true : false;
      }else{
         selected = this.selected_files.length > 0 && this.selected_files.some(e => e.id === item.id)? true : false;
      }

      this.images.push({
        preview_url: item.preview_url,
        path: item.full_url,
        name: item.file_name,
        type: item.mime_type,
        file_type: item.file_type,
        thumbnail_id: null,
        thumbnail_url: null,
        size: item.size,
        created_at: item.created_at,
        selected: selected,
        id: item.id,
      });
    },
    getMedia(page = 1) {
      axios.get(`media`, {
        params: {
          page: page,
          type : this.isThumbnail ? ['image'] : this.acceptedFileTypes
        }
      })
        .then(({data}) => {
          this.pagintion = data.meta;
          this.images = [];

          data.data.forEach(this.fetchMedia);

        })
        .catch((error) => {
          // console.log(error);
          // throw error.data.message
        });
    },
    getMediaById(id , thumbnail_id = null , thumbnail_url = null) {
      console.log('6');

      if (!id) {
        return false;
      }
      // console.log('id' , id);
      axios.get(`media/${id}`)
        .then(({data}) => {

          if(this.max == 1 ){

            this.selected_file = {
              preview_url: data.data.preview_url,
              path:  data.data.full_url,

              name: data.data.file_name,
              type: data.data.mime_type,
              file_type:  data.data.file_type,
              thumbnail_id: thumbnail_id,
              thumbnail_url: thumbnail_url,
              size: data.data.size,
              created_at: data.data.created_at,
              selected: true,
              id: data.data.id,
            };
            this.final_selected_file = this.selected_file;
          }else{
            this.selected_files.push({
              preview_url: data.data.preview_url,
              path: data.data.full_url,
              name: data.data.file_name,
              type: data.data.mime_type,
              file_type: data.data.file_type,
              thumbnail_id: thumbnail_id,
              thumbnail_url: thumbnail_url,
              size: data.data.size,
              created_at: data.data.created_at,
              selected: true,
              id: data.data.id,
            });
            this.final_selected_files.push({
              preview_url: data.data.preview_url,
              path: data.data.full_url,
              name: data.data.file_name,
              type: data.data.mime_type,
              file_type: data.data.file_type,
              thumbnail_id: thumbnail_id,
              thumbnail_url: thumbnail_url,
              size: data.data.size,
              created_at: data.data.created_at,
              selected: true,
              id: data.data.id,
            });
          }
        })
        .catch((error) => {
          // console.log(error);
          // throw error.data.message
        });
    },

    async HandelVMArray() {
      console.log('5');

      // if(this.HandelVMArrayLoad){
      //   return ;
      // }
      // let ids = [];
      // let hasObject = false;
     await this.modelValue.forEach((file) => {
            let thumbnail_id = file.thumbnail_id ? file.thumbnail_id : null;
            let thumbnail_url = file.thumbnail_url ? file.thumbnail_url : null;


            // console.log('modelValue',file);
              this.getMediaById(file.id ? file.id : file , thumbnail_id , thumbnail_url);
              // if(file.id){
              //   hasObject = true ;
              // }
              // ids.push(file.id ? file.id : file)
          });

      this.HandelVMArrayLoad = true;
      // if(hasObject){
      //   this.$emit('update:modelValue', ids);
      // }
    },
    async VMinputHandler() {

      console.log('4');

      if (this.modelValue == null) {

        if(this.max == 1 ){
          this.final_selected_file = this.defaultSelected;
          this.selected_file = this.defaultSelected;

        }else{
          this.final_selected_files = [];
          this.selected_files = [];

        }
      } else {

        if(this.max == 1 ){
          await this.getMediaById($h.isset(this.modelValue?.id) ? this.modelValue?.id : this.modelValue);
        }else{
          this.final_selected_files = [];
          this.selected_files = [];
          if(this.modelValue?.length > 0){
            if(this.images?.length == 0){
              this.HandelVMArray();
            }else{
              this.modelValue.forEach((file) => {
                let id = file.id ? file.id : file;
                let thumbnail_id = file.thumbnail_id ? file.thumbnail_id : null;
                let thumbnail_url = file.thumbnail_url ? file.thumbnail_url : null;

                let selectedFile = this.images.find((img) => { return img.id == id })
                if(selectedFile){

                  selectedFile.thumbnail_id = thumbnail_id;
                  selectedFile.thumbnail_url = thumbnail_url;
                  this.final_selected_files.push(selectedFile)
                  this.selected_files.push(selectedFile)
                }else{
                  this.getMediaById(id , thumbnail_id ,thumbnail_url);
                }

              });
            }

          }
        }
      }
    },
  },
  components: {
    FilePond,
  },
  watch: {
    modelValue: {
      handler: function (val, oldVal) {
        console.log('2');
        this.VMinputHandler();
      },
      deep: true
    },
    // modelValue: function (value) {
    //   if (value == null) {
    //     this.final_selected_file = this.defaultSelected;
    //     this.selected_file = this.defaultSelected;
    //   } else {
    //     this.getMediaById(value.id ? value.id : value);
    //     // this.selected_file.id = value;
    //   }
    // },
  },
  mounted() {
    if (this.selected_file == null) {
      this.selected_file = this.defaultSelected;
      this.final_selected_file = this.defaultSelected;
    }
    this.VMinputHandler();
    console.log('1');
  },

  created() {
    // this.getMedia();

  }
}
</script>
