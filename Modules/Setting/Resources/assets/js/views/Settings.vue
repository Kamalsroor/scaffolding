<template>
  <!-- flex flex-col -->
  <div class="intro-y  sm:flex-row items-center mt-8">
    <form class="validate-form" @submit.prevent="save">

      <!-- BEGIN: HTML Table Data -->
      <div class="intro-y box p-5 mt-5">
        <div class="grid grid-cols-12 gap-5 mt-5">
          <!-- BEGIN: Order Detail Content -->
          <div class="col-span-12 ">
            <div class="box intro-y my-8 first:my-0 p-5">
              <div class="flex items-center border-b border-slate-200/60 dark:border-darkmode-400 pb-5 mb-5">
                <div class="font-medium text-base truncate">Settings</div>
              </div>
              <div>
                <TabGroup :horizontal="true" v-if="settings" :selectedIndex="selectedIndex">
                  <TabList :horizontal="true" class="nav-link-tabs">
                    <template  v-for="(group , index) in settings" :key="index">
                      <Tab class="w-full py-2" @click="changeTab(index)"  v-if="group.elements" tag="button">{{ group.title }}</Tab>
                    </template>
                  </TabList>
                  <TabPanels :horizontal="true" class="mt-5">
                    <template  v-for="(group , index) in settings" :key="index">
                      <TabPanel  v-if="group.elements"  class="leading-relaxed">
                          {{ group.desc }}
                          <LoadingVue :active="isLoading"
                          :is-full-page="false" loader="dots" transition="bounce"></LoadingVue>
                            <template v-for="element in group.elements" :key="element.name">

                              <div v-if="page === index && !isLoading" class="my-8">
                                <template v-if="element.has_translate == true">
                                    <TabGroup class="col-span-12 sm:col-span-12" >
                                      <TabList class="nav-tabs">
                                        <template v-for="(local, index) in locales" :key="index">

                                          <Tab class="w-full py-2 w-20" tag="button">{{local}}</Tab>
                                        </template>
                                      </TabList>
                                      <TabPanels class="border-l border-r border-b ">
                                        <template v-for="(local, index) in locales" :key="index">

                                          <TabPanel class="p-5">

                                            <template v-if="element.type == 'text'">
                                              <InputField   :id="element.name" v-model="inputs[element.name][local]" class="col-span-12 sm:col-span-12"
                                                  :label="element.label" :name="element.name" :placeholder="element.placeholder"/>
                                            </template>
                                            <template v-if="element.type == 'number'">
                                              <InputField   :id="element.name" type="number" v-model="inputs[element.name][local]" class="col-span-12 sm:col-span-12"
                                                  :label="element.label" :name="element.name" :placeholder="element.placeholder"/>
                                            </template>
                                            <template v-if="element.type == 'radio'">
                                              <Switch v-model="inputs[element.name][local]" :name="element.name" class="col-span-12 sm:col-span-12"
                                                     :label="element.label" />
                                            </template>
                                            <template v-if="element.type == 'texteditor'">
                                              <InputTexteditor v-model="inputs[element.name][local]"   class="col-span-12 sm:col-span-12"
                                                  :label="element.label" :name="element.name" :placeholder="element.placeholder"/>

                                                <div v-if="element.merge_tags" class="w-full flex justify-center border-t border-slate-200/60 dark:border-darkmode-400 mt-2">
                                                    <div class="bg-white dark:bg-darkmode-600 px-5 -mt-3 text-slate-500">
                                                        Tags
                                                    </div>
                                                </div>
                                                  <ul v-if="element.merge_tags">
                                                    <li v-for="(tag , index) in element.merge_tags" :key="index" class="text-primary block font-extrabold" :class="{ 'flex' : !tag.mergeTags }">
                                                      {{ tag.name }}
                                                      <template v-if="tag.mergeTags">
                                                        : [
                                                        <li class="px-4 text-slate-600 dark:text-slate-500 block" v-for="(subTag , subIndex) in tag.mergeTags" :key="subIndex">
                                                          {{ subTag.name }}  : {{ subTag.value }}
                                                        </li>
                                                        ]
                                                      </template>
                                                      <template v-else>
                                                        <span class="ml-2 text-slate-600 dark:text-slate-500 block"> : {{ tag.value }}</span>
                                                      </template>
                                                    </li>
                                                  </ul>
                                              <div class="inline-flex rounded-md shadow">
                                                  <a v-if="element.show_example" :href="element.show_example" target="_blank" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"> Show Example </a>
                                              </div>


                                            </template>
                                            <template v-if="element.type == 'textarea'">
                                              <InputTextarea v-model="inputs[element.name][local]"   class="col-span-12 sm:col-span-12"
                                                  :label="element.label" :name="element.name" :placeholder="element.placeholder"/>
                                            </template>
                                            <template v-if="element.type == 'img'">
                                                <FileUploader :label="element.label" v-model="inputs[element.name][local]" class="col-span-12 sm:col-span-12" max="1"/>
                                            </template>
                                            <template v-if="element.type == 'list'">
                                                    <ListInputs
                                                        :name="element.name"
                                                        v-model="inputs[element.name][local]" class="col-span-12 sm:col-span-12"
                                                        :label="element.label"
                                                        :placeholder="element.placeholder"
                                                        :inputs="element.inputs"
                                                    />
                                            </template>

                                          </TabPanel>
                                        </template>
                                      </TabPanels>
                                  </TabGroup>
                                </template>

                                <template v-else>
                                  <template v-if="element.type == 'text'">
                                    <InputField   :id="element.name" v-model="inputs[element.name]" class="col-span-12 sm:col-span-12"
                                        :label="element.label" :name="element.name" :placeholder="element.placeholder"/>
                                  </template>
                                  <template v-if="element.type == 'number'">
                                    <InputField   :id="element.name" type="number" v-model="inputs[element.name]" class="col-span-12 sm:col-span-12"
                                        :label="element.label" :name="element.name" :placeholder="element.placeholder"/>
                                  </template>
                                  <template v-if="element.type == 'radio'">
                                    <Switch v-model="inputs[element.name]" :name="element.name" class="col-span-12 sm:col-span-12"
                                           :label="element.label" />
                                  </template>
                                  <template v-if="element.type == 'texteditor'">
                                    <InputTexteditor v-model="inputs[element.name]"   class="col-span-12 sm:col-span-12"
                                        :label="element.label" :name="element.name" :placeholder="element.placeholder"/>

                                      <div v-if="element.merge_tags" class="w-full flex justify-center border-t border-slate-200/60 dark:border-darkmode-400 mt-2">
                                          <div class="bg-white dark:bg-darkmode-600 px-5 -mt-3 text-slate-500">
                                              Tags
                                          </div>
                                      </div>
                                        <ul v-if="element.merge_tags">
                                          <li v-for="(tag , index) in element.merge_tags" :key="index" class="text-primary block font-extrabold" :class="{ 'flex' : !tag.mergeTags }">
                                            {{ tag.name }}
                                            <template v-if="tag.mergeTags">
                                              : [
                                              <li class="px-4 text-slate-600 dark:text-slate-500 block" v-for="(subTag , subIndex) in tag.mergeTags" :key="subIndex">
                                                {{ subTag.name }}  : {{ subTag.value }}
                                              </li>
                                              ]
                                            </template>
                                            <template v-else>
                                              <span class="ml-2 text-slate-600 dark:text-slate-500 block"> : {{ tag.value }}</span>
                                            </template>
                                          </li>
                                        </ul>
                                    <div class="inline-flex rounded-md shadow">
                                        <a v-if="element.show_example" :href="element.show_example" target="_blank" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700"> Show Example </a>
                                    </div>


                                  </template>
                                  <template v-if="element.type == 'textarea'">
                                    <InputTextarea v-model="inputs[element.name]"   class="col-span-12 sm:col-span-12"
                                        :label="element.label" :name="element.name" :placeholder="element.placeholder"/>
                                  </template>
                                  <template v-if="element.type == 'img'">
                                      <FileUploader :acceptedFileTypes="element.file_types ?? ['all']"   :label="element.label" v-model="inputs[element.name]" class="col-span-12 sm:col-span-12" max="1"/>
                                  </template>
                                  <template v-if="element.type == 'list'">
                                          <ListInputs
                                              :name="element.name"
                                              v-model="inputs[element.name]" class="col-span-12 sm:col-span-12"
                                              :label="element.label"
                                              :placeholder="element.placeholder"
                                              :inputs="element.inputs"
                                          />
                                  </template>
                                </template>
                              </div>
                            </template>
                      </TabPanel>
                    </template>

                  </TabPanels>
              </TabGroup>
              </div>
            </div>


            <button class="btn btn-primary " :disabled="isLoading" type="submit">
                <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                {{ $t('g.save') }}
            </button>

          </div>
          <!-- END: Order Detail Content -->
        </div>

      </div>
      <!-- END: HTML Table Data -->
    </form>


  </div>
</template>

<script>
import {Loading, Notify } from '@/mixins'
import SettingController from '@@/Setting/Resources/assets/js/controllers/SettingController.js';

import LoadingVue from 'vue3-loading-overlay';


export default {
  mixins: [Notify, Loading ],
  components:{
    LoadingVue,
  },
  data() {
    return {
      locales : [],
      settings : null,
      inputs:{},
      form: new FormData(),
      page : null,
    };
  },
  methods: {


     //---- Get All Data List
     async getData(page = null) {
      this.StartLoading();
      let data = await SettingController.getData();
      this.inputs = {};

      if(data){
          this.settings = data.data;

          await this.handelInputs();


      }

      this.StopLoading();

    },

    async handelInputs(){
      await Object.entries(this.settings).forEach(([key, field]) => {
        // console.log(key == this.page , key , this.page);
        if (key == this.page) {
          if(field.elements){
            Object.entries(field.elements).forEach(([key, input]) => {
              // console.log(input.name , input.value);
              if(input.type === 'img'){
                this.inputs[input.name] = input.value?.id ?? '';
              }else{
                if(input.has_translate){
                  this.inputs[input.name] = {};




                  window.locales.forEach(local => {


                    if(typeof input.value === 'string') {
                      var lock = {
                        [local]:  input.value ?? "",
                      }
                    }else{


                      var lock = {
                        [local]:  input.value != null && typeof input.value === 'object'  && input.value.hasOwnProperty(local) > -1 ? input.value[local] : "",
                      }
                    }




                      this.inputs[input.name] = {
                        ... this.inputs[input.name],
                        ...lock
                      }
                  });
                }else{
                  this.inputs[input.name] = input.value ?? "";

                }
              }
            })
          }
        }
      })
    },
    async changeTab(tab){
      this.StartLoading();
      this.inputs = {};
      await this.changePage(tab);
      await setTimeout(() => {
        this.handelInputs();
        // console.log(this.inputs);
      }, 800);
      await setTimeout(() => {
        this.StopLoading();
      }, 1800);
    },
    changePage(tab){
      this.$router.replace({name: this.$route.name, query: {page: tab}})
      this.page =  tab;
    },
    //---- Submit Form Handlerfds
    async save(e , addNew = false) {
      this.StartLoading();
      // const result = await this.v$.$validate();
      // if (!result) {
      //   this.errorNotify();
      //   this.StopLoading();
      //   return false;
      // }
      this.inputs['page'] = this.page;
      let response = await SettingController.update(this.inputs);
      if(response && response.status == 'success'){
        this.getData();
        $h.notify(this.$t('messages.success'), response.message);
      }

      this.StopLoading();
    },


  },
  computed: {
    selectedIndex() {
      if(this.page == null || this.settings === null){
        return 0;
      }
      // console.log(this.settings);
      let elementIndex = -1;
// .forEach
      Object.entries(this.settings).every((key, field) => {
        elementIndex++;
        // console.log(key[0] ,key[0] ==  this.page ,  this.page );
        if (key[0] ==  this.page) {
          return false
        }
        return true
      });

      return elementIndex;
    },


  },
  mounted(){
    this.page = 'app';
    if(this.$route.query){
      this.page = this.$route.query.page ?? 'app';
    }
    //---- Get All Data In Load Page
    this.getData();


      // this.StopLoading();

  },
  created() {
    this.locales = window.locales;

    //---- Get All Data In Load Page

  },

};

</script>
