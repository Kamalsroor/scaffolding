<template>
  <div>
    <file-pond
      name="file"
        ref="input"
        :maxFiles="max || 1"
        :allowMultiple="allowMultiple"
        allowFileTypeValidation="true"
        :acceptedFileTypes="type"
        :server="{  process, revert }"
        @init="handleFilePondInit"
        label-idle="Drop files here..."
        v-bind:allow-multiple="true"
        accepted-file-types="image/jpeg, image/png"
    />

    <div class="mt-8 mb-24">
        <h3 class="text-2xl font-medium text-center">Image Gallery</h3>
        <div class="grid grid-cols-3 gap-2 justify-evenly mt-4">
            <div v-for="(image, index) in files2" :key="index">
                <img :src="image.source">
            </div>
        </div>
    </div>

  </div>
      <!-- // server="/api/media" -->
</template>

<script >
// Import Vue FilePond
import vueFilePond from "vue-filepond";



// Import FilePond plugins
// Please note that you need to install these plugins separately

// Import image preview plugin styles
// import "filepond-plugin-image-preview/dist/filepond-plugin-image-preview.min.css";

// Import image preview and file type validation plugins
import FilePondPluginFileValidateType from "filepond-plugin-file-validate-type";
// import FilePondPluginImagePreview from "filepond-plugin-image-preview";

// Create component
const FilePond = vueFilePond(
  FilePondPluginFileValidateType,
  // FilePondPluginImagePreview
);

export default {
  name: "fileUploader",
  props: ['label', 'required', 'max', 'type'],

  data: function () {
    return {
        first: true,
        files: [270], // files uploaded, input
        files2: [], // all files
     };
  },
   computed: {
      allowMultiple () {
          return this.max !== 1
      },
      rule () {
          return this.required && !this.first && this.files.length === 0
      }
  },
  methods: {
    process  (fieldName, file, metadata, load, error, progress, abort)  {
      var self = this
        console.log('progress');
        let form = new FormData;
        form.append('file', file);
        progress(true, 0, 1024);
        console.log(file);

         // related to aborting the request
        const CancelToken = axios.CancelToken;
        const source = CancelToken.source();

        return axios.post('media', form, {
          onUploadProgress: (e) => {
              progress(e.lengthComputable, e.loaded, e.total);

            // progress(true, snapshot.bytesTransferred, snapshot.totalBytes)
            // this.file.progress = Math.round(event.loaded * 100 / event.total);
          },
        })
          .then(({data}) => {
            console.log(data);
            self.files2.push({ source: data.full_url})
            load(data.preview_url)

            return {
                abort: () => {
                    abort()
                    // uploadTask.cancel();
                }
            }
            // this.file.uploaded = true
            // this.file.id = data.id;
            // this.file.preview_url = data.preview_url;
          })
          .catch(error => {
             if (axios.isCancel(thrown)) {
                console.log('Request canceled', thrown.message);
            } else {
               this.handleError(error, e)
                return {
                      abort: () => { abort() }
                  }
            }


          });



  },
  revert (uniqueFileId, load, error) {
      var self = this
      // Create a reference to the file to delete
      console.log(uniqueFileId)
      var desertRef = this.$storage.ref().child(uniqueFileId);
              desertRef.delete().then(function() {
                  var index = self.files.indexOf(uniqueFileId);
                  if (index > -1) {
                      self.files.splice(index, 1);
                  }
                  load();
              }).catch(function(e) {
                  this.handleError(error, e)
              });
  },
  load (source, load, error, progress, abort, headers){
    console.log(source);

        axios.get(`media/${source}`,{
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
          //   console.log(myBlob);

          //   });

          // var blob = new Blob([data], {
          //     type: 'image/jpeg'
          // });
          //   console.log(data , blob);
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
  fetch (url, load, error, progress, abort, headers) { console.log(url);   error("Solo archivos locales")   },
  restore (uniqueFileId, load, error, progress, abort, headers) { error() },
  handleError (error, e){
      switch (e.code) {
          case 'storage/canceled':
              break;
          default: error(e.message)
      }
  },
  handleFilePondInit: function() {

      this.$refs.input.getFiles();
  },
    // handleFilePondUpload: function (files) {
    //   console.log("FilePond has Uploaded"  ,files );

    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    handleFilePondprocessfile: function (error, file) {

      if(error){
        console.log(error);
        return false;
      }
      this.images.unshift(file.serverId);

      // this.myFiles.push(JSON.parse(file.serverId).id)
      // this.$nextTick();
      // console.log("FilePond has processfile" , error, file , JSON.parse(file.serverId));
      // FilePond instance methods are available on `this.$refs.pond`
    },


    // addfilestart: function (file) {
    //   console.log("FilePond has addfilestart" , file);
    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    // onaddfileprogress: function (file , progress) {
    //   console.log("FilePond has onaddfileprogress" , file , progress);
    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    // onaddfile: function (error , file) {
    //   console.log("FilePond has oninitfile" , file);
    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    // oninitfile: function (file) {
    //   console.log("FilePond has oninitfile" , file);
    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    // onupdatefiles: function (files) {
    //   console.log("FilePond has onupdatefiles" , files);
    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    // handleFilePondInit: function () {
    //   console.log("FilePond has initialized");

    //   // FilePond instance methods are available on `this.$refs.pond`
    // },
    fetchMedia(item){
      // this.$refs.input.addFile(item.full_url, { index: 0 });

        this.files2.push({
            source: item.full_url
        });

    },
    getMedia(ids) {
       axios.get(`media`, {
        params : {
          ids : ids
        }
      })
        .then(({data}) => {
          data.data
            console.log(data.data);
            data.data.forEach(this.fetchMedia);

          // this.files2.push({
          //             source: '/storage/'+_this.columnName+'/'+response.data.data[i]['saved_as']
          //         });
        })
        .catch((error) => {
          // throw error.data.message
        });
    },
  },
  components: {
    FilePond,
  },
  watch:{
    files : {
        handler: function (val, oldVal) {
            if(this.first) this.first = false;
            this.$emit('input', val)
        },
        deep: true
    }
  },
  mounted() {
    if(this.files?.length >  0){
      this.getMedia(this.files)
      console.log(this.files);
    }
  },
};
</script>
