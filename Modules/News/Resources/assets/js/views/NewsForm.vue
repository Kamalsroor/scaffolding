<template>
  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="font-medium text-base mr-auto">
      {{
        editMode ? $t('g.edit_row', { model: $t('news.plural') }) : $t('g.add_new', { model: $t('news.plural') })
      }}
    </h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">


    </div>
  </div>
  <!-- BEGIN: HTML Table Data -->
  <div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">

      <div class="grid grid-cols-12 gap-8 gap-y-4">


        <InputField v-model="news.title" :errors="v$.news.title.$errors" class="col-span-12 sm:col-span-4"
          :label="$t('forms.attributes.title')" name="title" :placeholder="$t('forms.attributes.title')" />



        <InputTexteditor v-model="news.description" class="col-span-12 sm:col-span-12"
          :label="$t('forms.attributes.description')" name="description" placeholder="description" />

        <InputTextarea v-model="news.mini_description" class="col-span-12 sm:col-span-12"
          :label="$t('forms.attributes.mini_description')" name="mini_description" placeholder="mini_description" />


        <SelectField v-model="news.language" :errors="v$.news.language.$errors" labelValue="name" keyValue="id"
          :selectData="locales" class="col-span-12 sm:col-span-6" :label="$t('Language.singular')" name="language"
          :placeholder="$t('Language.singular')" />


        <FileUploader :name="news.img" :label="$t('news.img')" v-model="news.img" class="col-span-12 sm:col-span-12"
          max="1" />

        <InputField type="number" v-model="news.order_id" :errors="v$.news.order_id.$errors"
          class="col-span-12 sm:col-span-4" :label="$t('forms.attributes.order_id')" name="order_id"
          :placeholder="$t('forms.attributes.order_id')" />

        <InputField type="date" v-model="news.date" :errors="v$.news.date.$errors" class="col-span-12 sm:col-span-4"
          :label="$t('forms.attributes.date')" name="date" :placeholder="$t('forms.attributes.date')" />




        <Switch v-model="news.active" :errors="v$.news.active.$errors" class="col-span-12 sm:col-span-4"
          :label="$t('forms.attributes.active')" name="active-input" />


        <SelectField v-model="news.category_id" :errors="v$.news.category_id.$errors" labelValue="name" keyValue="id"
          :hasTranslate="true" :selectData="categories" class="col-span-12 sm:col-span-6"
          :label="$t('categories.singular')" name="category" :placeholder="$t('categories.singular')" />




        <SelectField v-model="news.tags" :errors="v$.news.tags.$errors" :multiple="true" labelValue="name" keyValue="id"
          :hasTranslate="true" :selectData="tags" class="col-span-12 sm:col-span-6" :label="$t('tags.singular')"
          name="tags" :placeholder="$t('tags.singular')" />
      </div>





    </div>
    <div class="space-x-2 mt-4">
      <button class="btn btn-outline-secondary" type="button" @click="closeModel()">
        {{ $t('g.cancel') }}
      </button>
      <button class="btn btn-primary" :disabled="isLoading" type="button" @click="saveAddNew">
        <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
        {{ $t('g.saveAddNew') }}
      </button>
      <button class="btn btn-primary " :disabled="isLoading" type="submit"  @click="save">
        <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
        {{ $t('g.save') }}
      </button>



    </div>
  </div>
  <!-- END: HTML Table Data -->
</template>

<script>
import useVuelidate from '@vuelidate/core'
import { required, email, minValue, numeric } from '@vuelidate/validators'
import { Loading, Notify } from '@/mixins'
import NewsController from '@@/News/Resources/assets/js/controllers/NewsController.js';
import CategoryController from '@@/News/Resources/assets/js/controllers/CategoryController.js';
import TagController from '@@/News/Resources/assets/js/controllers/TagController.js';

import FileSaver from 'file-saver'


export default {
  setup: () => ({ v$: useVuelidate() }),
  mixins: [Notify, Loading],
  validations() {
    return {
      news: {
        date: { required },
        order_id: {},
        category_id: {},
        tags: {},
        language: { required },
        title: {},
        description: {},
        mini_description: {},
        active: { required },
      }
    }
  },
  data() {
    return {
      news: { // Model
        title: {},
        description: {},
        mini_description: {},
        date: null,
        tags: [],
        img: null,
        language: null,
        order_id: null,
        title: null,
        description: null,
        mini_description: null,
        active: false,
      },
      locales: [],
      editMode: false, // Edit Mode Status
      categories: [],
      tags: [],

    };
  },
  methods: {
    //---- Get All Data List
    async getCategories() {
      this.StartLoading();

      let data = await CategoryController.getData({ length: 'all' });

      if (data) {
        this.categories = data.data;
      }
    },
    //---- Get All Data List
    async getTags() {
      this.StartLoading();

      let data = await TagController.getData({ length: 'all' });

      if (data) {
        this.tags = data.data;
      }
    },
    //---- Get Model By Id
    async getModel(id) {
      this.StartLoading();
      let data = await NewsController.getModel(id);
      if (data) {
        this.news = data;
      }
      this.StopLoading();
    },

    //---- Hendel Form Create and Edit
    OpenNewNewsModal(id = null) {
      this.resetForm();

      if (id == null) {
        this.editMode = false;
      } else {
        this.editMode = true;

        this.getModel(id)
      }
    },


    //---- Reset Form
    resetForm() {
      this.v$.$reset();
      this.editMode = false;
      this.news = {
        title: null,
        description: null,
        mini_description: null,
        date: null,
        img: null,
        order_id: null,
        active: false,
        language: null,
        title: null,
        description: null,
        mini_description: null,
      };


    },




    saveAddNew() {
      this.save(null, true);
    },
    //---- Submit Form Handler
    async save(e, addNew = false) {
      this.StartLoading();
      const result = await this.v$.$validate();
      // console.log();
      if (!result) {
        this.$h.validateionErrorNotify(this.v$.$errors);
        this.StopLoading();
        return false;
      }
      if (this.editMode) {
        let response = await NewsController.update(this.news);
        if (response && response.status == 'success') {
          $h.notify(this.$t('messages.success'), response.message);
          this.handelFinishRequest(addNew);


        }
      } else {
        let response = await NewsController.store(this.news);
        if (response && response.status == 'success') {
          $h.notify(this.$t('messages.success'), response.message);
          this.handelFinishRequest(addNew);
        }
      }


      this.StopLoading();
    },
    handelFinishRequest(addNew = false) {
      if (!addNew) { // if not click add new
        this.closeModel();
      } else {
        this.resetForm();
      }
    },

    closeModel(){
      this.$router.push({name:"news"});
    },
    async handelLocales(locales) {
      let newlocales = [];
      await locales.forEach(locale => {
        newlocales.push({ id: locale, name: locale })
      });
      newlocales.push({ id: 'all', name: 'all' })

      this.locales = newlocales;
    },

  },

  created() {
    if(this.$route.params.id){
        this.getModel(this.$route.params.id);
        this.editMode = true;
    }
    this.handelLocales(window.locales);

    // // console.log(window.locales);
    //---- Get All Data In Load Page
    this.getCategories();
    this.getTags();

    this.StopLoading();

  },

};

</script>
