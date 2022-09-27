
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 import './bootstrap';
 import '../css/Admin/app.css';

 import { createApp } from 'vue';
// import { createApp } from 'vue/dist/vue.esm-bundler';
 import Router from '@/router'
 import store from '@/store'
 import utils from "@/utils";
 import globalComponents from "./global-components";
 import Vue3Progress from "vue3-progress";
 import mitt from 'mitt';
 import i18nInstance  from "./plugins/i18n";
 import permissionDirective  from "@/directive/permission";
//  import firebaseHelper from "./firebase"


 /**
  * Next, we will create a fresh Vue application instance. You may then begin
  * registering components with the application instance so they are ready
  * to use in your application's views. An example is included for you.
  */
  const options = {
    position: "fixed",
    height: "3px",
    color: "rgb(234 179 8)",
  };
  const emitter = mitt();

 const app = createApp({});

 app.use(Router)
 app.use(i18nInstance);
 app.directive('can',permissionDirective)

 app.use(Vue3Progress, options)
 app.use(store)
 app.config.globalProperties.emitter = emitter;

 utils(app);

 globalComponents(app);


 /**
  * The following block of code may be used to automatically register your
  * Vue components. It will recursively scan this directory for the Vue
  * components and automatically register them with their "basename".
  *
  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
  */

 // Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
 //     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
 // });

 /**
  * Finally, we will attach the application instance to a HTML element with
  * an "id" attribute of "app". This element is included with the "auth"
  * scaffolding. Otherwise, you will need to add an element yourself.
  */

 app.mount('#app');

 axios.interceptors.response.use((response) => {
    return response;
  }, function (error) {
    // Do something with response error
    if (error.response.status === 404) {
        console.log("🚀 ~ file: app.js ~ line 76 ~ axios.interceptors.response.use ~ error.response", app.config.globalProperties.$h);
        app.config.globalProperties.$h.errorNotify('Oops!' ,   app.config.globalProperties.$t('messages.error_404') );
        // router.push('/error-page');
    }
    if (error.response.status === 401) {
      window.localStorage.removeItem('token');
      window.localStorage.removeItem('user')
      setTimeout(() => {
        router.push('/login');
      }, 300);
    }
    if (error.response.status === 500) {
        app.config.globalProperties.$h.errorNotify('Oops!' ,   app.config.globalProperties.$t('messages.error') );

    }
    return Promise.reject(error.response);
  });