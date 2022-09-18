<template>
  <!-- BEGIN: Notification Content -->

      <div class="flex">
          <template v-if="type == 'success' || type == 'default'">
            <CheckCircleIcon class="text-success" />
            <div class="ml-4 mr-4 text-slate-50">
              <div class="font-medium text-xl text-slate-50	 text-success">{{title}}</div>
              <div class=" text-lg mt-1" v-html="message"></div>
            </div>
          </template>
          <template v-else-if="type == 'error' || type == 'danger'">
              <XCircleIcon class="" />
              <div class="ml-4 mr-4 text-slate-50">
                <div class="font-medium text-xl	 ">{{title}}</div>
                <div class=" text-lg mt-1" v-html="message"></div>
              </div>
          </template>
      </div>



</template>

<script>
import * as icons from "lucide-vue-next";
import { inject, provide, ref } from "vue";

export default {
  data() {
    return {
        // type:null,
        // title:null,
        // message:null,
        action:null,
    }
  },
  props: {
    title: String,
    message: String,
    type: String,
  },
  created() {
    console.log('notify created' , this.title , this.type);
    // this.emitter.on('notify', function( data ){
    //   console.log('notify' , data);
    //     let time = 0;
    //     if(this.type == null){
    //       time = 100;
    //     }
    //     this.type = data.type ?? 'success';
    //     this.title = data.title;
    //     this.message = data.message ?? '';
    //     this.action = data.action ?? null;

    //     setTimeout( function(){
    //       Toastify({
    //         node: dom("#success-notification-content")
    //           .clone()
    //           .removeClass("hidden")[0],
    //         duration: 3000,
    //         newWindow: this.action == "close" ? false : true,
    //         close: true,
    //         gravity: "top",
    //         position: "right",
    //         stopOnFocus: true,
    //       }).showToast();
    //     }.bind(this), time );


    // }.bind(this));


  },
    onUnmounted()  {
        console.log('closed!')
    },
  computed: {
    icon() {
      return icons[this.name];
    },
  },
};
</script>
