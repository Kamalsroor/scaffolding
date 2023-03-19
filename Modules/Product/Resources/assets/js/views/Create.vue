<template>
  <!-- flex flex-col -->
  <div class="intro-y  sm:flex-row items-center mt-8">
    <form class="validate-form" @submit.prevent="save">

      <!-- BEGIN: HTML Table Data -->
      <div class="intro-y box p-5 mt-5">
        <div id="gjs" >

          <TabGroup class="col-span-12 sm:col-span-12" @change="changeTab">
            <TabList class="nav-tabs">
              <template v-for="(local, index) in locales" :key="index">

                <Tab class="w-full py-2 w-20" tag="button">{{local}}</Tab>
              </template>
            </TabList>
            <TabPanels class="border-l border-r border-b ">
              <template v-for="(local, index) in locales" :key="index">
                <TabPanel class="p-5">


                  <InputTexteditor v-model="product.name[local]"   class="col-span-12 sm:col-span-12"
                  :label="$t('forms.attributes.description')" name="description" placeholder="description"/>


                  <InputField v-model="product.name[local]" :errors="v$.product.name[local].$errors" class="col-span-12 sm:col-span-4"
                  :label="$t('forms.attributes.name') + ' ' + local" name="name" :placeholder="$t('forms.attributes.name')"/>
                </TabPanel>
              </template>
            </TabPanels>
        </TabGroup>
              <!-- Start Upload Product image  -->
          <FileUploader  :name="product.img" :acceptedFileTypes="['image']" :label="$t('product.img')" v-model="product.img" class="col-span-12 sm:col-span-12" max="1"/>
              <!-- End Upload Product image  -->

              <!-- Start Upload Product File  -->
          <FileUploader type="file" :name="product.file"  :acceptedFileTypes="['document']" :label="$t('product.file')" v-model="product.file" class="col-span-12 sm:col-span-12" max="1"/>
              <!-- End Upload Product File  -->

              <!-- Start Upload Product Video  -->
          <FileUploader :name="product.video" :acceptedFileTypes="['video','document']"  :label="$t('product.video')" v-model="product.video" class="col-span-12 sm:col-span-12" max="12"/>
              <!-- End Upload Product Video  -->

          <InputField type="number" v-model="product.order_id" :errors="v$.product.order_id.$errors" class="col-span-12 sm:col-span-4"
                      :label="$t('forms.attributes.order_id')" name="order_id" :placeholder="$t('forms.attributes.order_id')"/>
        <Switch v-model="product.active" :errors="v$.product.name.$errors" class="col-span-12 sm:col-span-4" :label="$t('forms.attributes.active')" name="active-input"/>


        <div class="mt-10 bg-white pb-12 sm:pb-16">
          <div class="relative">
            <div class="absolute inset-0 h-1/2 " />
            <div class="relative mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
              <div class="mx-auto ">
                <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-1">
                  <div v-for="attribute in attributes" class="flex flex-col border-b border-gray-100 p-6 text-center "  :class="{
                    'border border-blue-500' : product.attributes.includes(attribute.id)
                  }">
                    <!-- <dt class="order-2 mt-2 text-lg font-medium leading-6 text-gray-500"></dt> -->
                    <label :for="'atter_id_'+attribute.id" class="text-3xl font-bold tracking-tight  p-3"  :class="[
                    !attribute.have_child ? 'cursor-pointer hover:text-blue-500' : '',
                    product.attributes.includes(attribute.id) ? 'text-blue-500' : 'text-indigo-300'
                      ]">{{attribute.name.de}}</label>

                    <template v-if="attribute.have_child">

                      <dt class="rounded-lg bg-white shadow-lg sm:grid " :class="attributeClass(attribute.subAttribute.length)">
                        <div v-for="subattribute in attribute.subAttribute" class="flex flex-col  p-6 text-center " :class="[
                            product.attributes.includes(subattribute.id) ? 'border border-blue-500' : 'border-b border-gray-100'
                          ]">
                          <label :for="'atter_id_'+ subattribute.id" class=" mt-2 text-lg font-medium leading-6 text-gray-500 cursor-pointer hover:text-blue-500 p-3" :class="{
                            ' text-blue-500' : product.attributes.includes(subattribute.id)
                          }" >{{subattribute.name.de}}</label>

                          <Switch @change="attributesChange(subattribute.id)" v-model="product.attributes" :keyValue="subattribute.id" class="col-span-12 sm:col-span-6 shadow-lg hidden" :name="'atter_id_'+subattribute.id"/>
                          <TabGroup v-if="product.attributes.includes(subattribute.id) && product.attributes_value[subattribute.id]?.show" class="col-span-12 sm:col-span-12" @change="changeTab">
                            <TabList class="nav-tabs">
                              <template v-for="(local, index) in locales" :key="index">
                                <Tab class="w-full py-2 w-20" tag="button">{{local}}</Tab>
                              </template>
                            </TabList>
                            <TabPanels class="border-l border-r border-b ">
                              <template v-for="(local, index) in locales" :key="index">
                                <TabPanel class="p-5">
                                  <InputField v-model="product.attributes_value[subattribute.id].value[local]" class="col-span-12 sm:col-span-4 shadow-lg"
                                  name="value" :placeholder="$t('forms.attributes.value')"/>
                                </TabPanel>
                              </template>
                            </TabPanels>
                        </TabGroup>
                          <!-- [ 'sm:grid-cols-4'] -->
                        </div>
                      </dt>
                    </template>
                    <template v-else>
                      <dt class="rounded-lg bg-white shadow-lg sm:grid " >
                        <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">

                          <Switch @change="attributesChange(attribute.id)" v-model="product.attributes" :keyValue="attribute.id" class="col-span-12 sm:col-span-6 shadow-lg hidden" :name="'atter_id_'+attribute.id"/>

                          <TabGroup v-if="product.attributes.includes(attribute.id) && product.attributes_value[attribute.id]?.show" class="col-span-12 sm:col-span-12" @change="changeTab">
                            <TabList class="nav-tabs">
                              <template v-for="(local, index) in locales" :key="index">
                                <Tab class="w-full py-2 w-20" tag="button">{{local}}</Tab>
                              </template>
                            </TabList>
                            <TabPanels class="border-l border-r border-b ">
                              <template v-for="(local, index) in locales" :key="index">
                                <TabPanel class="p-5">

                                  <InputField  v-model="product.attributes_value[attribute.id].value[local]" class="col-span-12 sm:col-span-4 shadow-lg"
                                   name="value" :placeholder="$t('forms.attributes.value')"/>
                                </TabPanel>
                              </template>
                            </TabPanels>
                        </TabGroup>

                        </div>
                      </dt>
                    </template>

                  </div>

                </dl>
              </div>
            </div>
          </div>
        </div>



          <!-- drop.prevent="onDroppedFile" -->

            <div class="w-full ">

              <div class="view-section" data-v-7a4b760f>

                <TabGroup class="col-span-12 sm:col-span-12" @change="changeTab">
                  <TabList class="nav-tabs">
                    <template v-for="(local, index) in locales" :key="index">

                      <Tab class="w-full py-2 w-20" tag="button">{{local}}</Tab>
                    </template>
                  </TabList>
                  <TabPanels class="border-l border-r border-b ">
                    <template v-for="(local, index) in locales" :key="index">

                      <TabPanel class="p-5">
                        <template v-for="(section , index) in itemsWithRenderHtml" :index="index">
                          <div class="section-html relative cursor-pointer	">
                            <div class="absolute  section-html-nav">
                              <div class="p-2 flex  gap-3">
                                <button class="btn btn-outline-danger" type="button" @click="removeSection(index)">X</button>
                                <button class="btn btn-outline-primary" type="button" @click="openSectionEdit(index , local)">Edit</button>
                                <button class="btn btn-outline-secondary" type="button" v-if="index + 1 != itemsWithRenderHtml.length" @click="DownSection(index)">&#8595</button>
                                <button class="btn btn-outline-secondary" type="button" v-if="index != 0" @click="UpSection(index)">&#8593</button>
                              </div>

                            </div>
                            <div @click="openSectionEdit(index , local)" >
                              <!-- <component :is="{template:section.html, data: function() { return {...section.inputs , ...{local : local}}}}" /> -->
                              <component :is="{template:section.html , data: function() { return getCurrentProperties(section.inputs , local)}}" v-bind="getCurrentProperties(section.inputs , local)"   />
                            </div>

                          </div>
                          </template>
                      </TabPanel>
                    </template>
                  </TabPanels>
              </TabGroup>



              </div>
              <label
              @click="openFilterModel"
                :class="[dragging ? 'border-blue-600 cursor-grabbing	' :  'border-gray-600', 'mt-2 flex justify-center px-6 pt-5 pb-6 border-2  border-dashed rounded-md cursor-pointer	hover:border-blue-600']"
                @drop="onDrop($event, 1)"
                @dragover.prevent="dragging = true"
                @dragleave.prevent="dragging = false"

                  class="flex justify-center w-full h-32 px-4 transition bg-white border-2 border-gray-300 border-dashed rounded-md appearance-none cursor-pointer hover:border-gray-400 focus:outline-none">


                  <span class="flex items-center space-x-2">
                      <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24"
                          stroke="currentColor" stroke-width="2">
                          <path stroke-linecap="round" stroke-linejoin="round"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                      </svg>
                      <span class="font-medium text-gray-600">
                          Drop Section
                          <span @click="openFilterModel" class="text-blue-600 underline">browse</span>
                      </span>
                  </span>
              </label>
          </div>



          <button class="btn btn-outline-secondary" type="button" @click="closeModel()">
            {{ $t('g.cancel') }}
          </button>
          <button class="btn btn-primary" :disabled="isLoading" type="button" @click="saveAddNew">
            <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
            {{ $t('g.saveAddNew') }}
          </button>
          <button class="btn btn-primary " :disabled="isLoading" type="submit">
            <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
            {{ $t('g.save') }}
          </button>



        </div>

      </div>
      <!-- END: HTML Table Data -->
    </form>

            <!-- BEGIN: Slide Over Content -->
            <Modal
                :slideOver="true"
                :dragstart="dragging"
                :show="FilterModelIsOpen"
                @hidden="FilterModelIsOpen = false"
            >
                <ModalHeader class="p-5">
                <h2 class="font-medium text-base mr-auto">Search & Filter</h2>
                </ModalHeader>
                <ModalBody>
                  <!-- <div class="w-6/12	h-2	"> -->
                    <template v-for="section in sections" :index="section">
                      <div
                      draggable
                      @dragstart="startDrag($event, section)"
                      :class="[dragging ? ' cursor-grabbing' : 'border-gray-600' , 'mt-2 flex justify-center px-6 pt-5 pb-6 border-2  border-dashed rounded-md cursor-grab hover:border-blue-600']"
                    >
                        <img :src="section.image" alt="" srcset="">

                      </div>
                    </template>

                  <!-- </div> -->

                </ModalBody>
            </Modal>
            <!-- END: Slide Over Content -->


            <Modal
              :slideOver="true"
              :show="SectionModelIsOpen"
              @hidden="SectionModelIsOpen = false"
          >
            <ModalHeader class="p-5">
            <h2 class="font-medium text-base mr-auto">Search & Filter</h2>
            </ModalHeader>
            <ModalBody>
              <!-- <div class="w-6/12	h-2	"> -->
                <template v-for="input in section.inputs" :index="input">

                  <template v-for="(local, index) in locales"  :key="index">
                    <template v-if="SectionModelLocal == local">
                      <InputField v-if="input.type === 'text'" v-model="input.value[local]"  class="col-span-12 sm:col-span-4"
                      :label="input.name" :name="input.name" :placeholder="$t('forms.attributes.name')"/>
                      <InputField v-if="input.type === 'color'" type="color" v-model="input.value"  class="col-span-12 sm:col-span-4"
                      :label="input.name" :name="input.name" :placeholder="$t('forms.attributes.name')"/>
                      <InputTextarea v-if="input.type === 'textarea'" v-model="input.value[local]" :name="input.name"   class="col-span-12 sm:col-span-4"
                      :label="input.name"  :placeholder="$t('sliders.content')"/>
                    </template>
                  </template>

                  <FileUploader v-if="input.type === 'image'" :returnObject="true" :name="input.name"  :label="input.name" v-model="input.value" class="col-span-12 sm:col-span-12" max="1"/>

                </template>

              <!-- </div> -->

            </ModalBody>
        </Modal>
  </div>
</template>
<style lang="scss" >
  .view-section[data-v-7a4b760f]  {
      @import '../assets/style.css'; /* injected */
  }
</style>

<script>
import useVuelidate from '@vuelidate/core'
import {required ,email , minValue , numeric} from '@vuelidate/validators'
import {Loading, Notify , Deleted} from '@/mixins'
import ProductController from '@@/Product/Resources/assets/js/controllers/ProductController.js';
import AttributeController from '@@/Product/Resources/assets/js/controllers/AttributeController.js';

let validations = {}

window.locales.forEach(local => {

  // New Way
  var lock = {
    [local]:  {required},
  }
  // validations={...validations,...x}
  //  validations.name = Object.assign(validations, {
  //       ${local} : {required},
  // });
  // console.log(lock);
  validations.name = {
    ...validations.name,
    ...lock
  }
});


export default {
  setup: () => ({v$: useVuelidate()}),
  mixins: [Notify, Loading , Deleted],
  validations() {
    return {
      product: {
        ...validations,
        img: {required},
        video: {},
        file: {},
        order_id: {required,numeric},
        active: {required},
        attributes: {},
      }
    }
  },
  data() {
    return {
      locales : [],
      product: { // Model
        name: {},
        sections: [],
        img: null,
        video: null,
        file: null,
        attributes:[],
        attributes_value:[],
        order_id: null,
        active: false,
      },
      editMode: false, // Edit Mode Status
      FilterModelIsOpen: false, // Filter Model Show Status
      SectionModelIsOpen: false, // Filter Model Show Status
      SectionModelLocal: null, // Filter Model Show Status
      dragging: false,
      section:{},
      attributes:[],
      sections :[
      //   {
      //     id:'secetion1',
      //     image: '/storage/sections/section1.png',
      //     inputs:[
      //       {
      //         name:'title',
      //         type:'text',
      //         value:"test Text",
      //         validations:[]
      //       },
      //       {
      //         name:'des',
      //         type:'textarea',
      //         value:"All text blocks could be edited easily with double clicking on it. You can create new text blocks with the command from the left panel",
      //         validations:[]
      //       },
      //       {
      //         name:'background',
      //         type:'image',
      //         value:{
      //           'path' : 'https://grapesjs.com/img/work-desk.jpg' ,
      //           'id' : 0 ,
      //         },
      //         validations:[]
      //       },
      //     ],


      //     html: `<header class="header-banner" :style="{'background-image': 'url(https://grapesjs.com/img/bg-gr-v.png) , url(' + background.path + ')'}">
      //   <div class="container-width">
      //     <div class="logo-container">
      //       <div class="logo">GrapesJS</div>
      //     </div>
      //     <nav class="menu">
      //       <div class="menu-item">BUILDER</div>
      //       <div class="menu-item">TEMPLATE</div>
      //       <div class="menu-item">WEB</div>
      //     </nav>
      //     <div class="clearfix"></div>
      //     <div class="lead-title"  >{{title[local]}}</div>
      //     <div class="sub-lead-title">{{des[local]}}</div>
      //     <div class="lead-btn">Hover me</div>
      //   </div>
      // </header>`,
      //   },
      //   {
      //     id:'secetion2',
      //     image: '/storage/sections/section2.png',
      //     inputs:[
      //       {
      //         name:'subtitle',
      //         type:'text',
      //         value:"Biometrics Facial Recognition",
      //         validations:[]
      //       },
      //       {
      //         name:'title',
      //         type:'text',
      //         value:"face screen",
      //         validations:[]
      //       },
      //       {
      //         name:'title_color',
      //         type:'color',
      //         value:"#00DAE9",
      //         validations:[]
      //       },
      //       {
      //         name:'des',
      //         type:'textarea',
      //         value:"All text blocks could be edited easily with double clicking on it. You can create new text blocks with the command from the left panel",
      //         validations:[]
      //       },
      //       {
      //         name:'background',
      //         type:'image',
      //         value:{
      //           'path' : 'https://grapesjs.com/img/work-desk.jpg' ,
      //           'id' : 0 ,
      //         },
      //         validations:[]
      //       },
      //     ],


      //     html: `<div class="product-container">
      //       <div class="product-image" :style="{'background-image': 'url(' + background.path + ')'}" ></div>

      //       <div class="row m-0 product-details h-100">
      //           <div class="d-none d-md-block col-md-2">
      //           </div>
      //           <div class="col-md-6 p-0 p-md-auto d-flex product-info h-100 d-flex flex-column justify-content-center">
      //               <div class="p-3" >
      //                   <p class="pb-0 fs-4">
      //                       {{subtitle[local]}}
      //                   </p>
      //                   <h1 class="mb-0"  :style="{'color': \'' + title_color + '\'}"  >
      //                       {{title[local]}}
      //                   </h1>
      //                   <p class=" pt-0">
      //                      {{des[local]}}
      //                   </p>
      //               </div>


      //           </div>

      //           <div class="d-none d-md-block  col-md-4"></div>
      //           <div class=" d-none d-md-block  col-md-2"></div>
      //       </div>
      //   </div>`,
      //   },
        {
          id:'secetion1',
          section_id:'secetion1',
          image: '/storage/sections/section1.jpg',
          inputs:[
            {
              name:'subtitle',
              type:'text',
              value:"Biometrics Facial Recognition",
              validations:[]
            },
            {
              name:'subtitle_color',
              type:'color',
              value:"#E6EEF4",
              validations:[]
            },
            {
              name:'title',
              type:'text',
              value:"Face Screen",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#00DAE9",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:"Behind the FaceScreen is a combination of the various MODI products that are perfectly matched to each other. The interaction of FaceBar, BioControl Client and the MODI software for biometric facial recognition make this product a safe and fast biometric solution.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#E6EEF4",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image19.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section  :style="{'background-image': 'url(' + background.path + ')'}" class="bg-[url('.')] bg-cover bg-no-repeat flex   p-8 md:p-18 lg:p-24">
    <div class="w-[fit-content] sm:w-2/4 flex flex-col gap-4">

        <p class=" font-semibold text-xl" :style="{'color': \'' + subtitle_color + '\'}">
           {{subtitle[local]}}
           </p>
          <h1 class="font-bold text-3xl lg:text-5xl " :style="{'color': \'' + title_color + '\'}">
            {{title[local]}}

        </h1>
        <p  :style="{'color': \'' + des_color + '\'}">
          {{des[local]}}

        </p>
    </div>

</section>`,
        },

        {
          id:'secetion2',
          section_id:'secetion2',
          image: '/storage/sections/section2.jpg',
          inputs:[
            {
              name:'subtitle',
              type:'text',
              value:"INCREASED EFFICIENCY",
              validations:[]
            },
            // {
            //   name:'subtitle_color',
            //   type:'color',
            //   value:"#E6EEF4",
            //   validations:[]
            // },
            {
              name:'title',
              type:'text',
              value:"FOR AIRPORTS",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'background_color',
              type:'color',
              value:"#E6EEF4",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 20.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:gap-0 bg-[#E6EEF4]" :style="{'background-color': \'' + background_color + '\'}">
            <div class="w-full md:w-8/12 mr-3">

                <h2 class="text-[#001E2F] font-bold text-2xl" :style="{'color': \'' + title_color + '\'}">
                    {{subtitle[local]}} <br> {{title[local]}}
                </h2>

                <p class="text-[#001E2F] my-4 mb-0" :style="{'color': \'' + des_color + '\'}">
                  {{des[local]}}
                </p>

            </div>
            <div class="w-full flex justify-center items-center md:w-4/12 ml-3">
                <img class="w-[250px] md:[w-300px] lg:w-[100%]" :src="background.path" alt="">
            </div>
        </section>
`,
        },
        {
          id:'secetion3',
          section_id:'secetion3',
          image: '/storage/sections/section3.jpg',
          inputs:[

            {
              name:'title',
              type:'text',
              value:"FACE SCREEN",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'background_color',
              type:'color',
              value:"#00DAE9",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 21.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="bg-[#00DAE9] p-8 md:p-18 lg:p-24 flex flex-col gap-8  md:flex-row md:gap-0" :style="{'background-color': \'' + background_color + '\'}">
    <div class="w-full flex  md:w-6/12 md:mr-3">
            <img class="w-full sm:max-w-[400px] md:w-[calc(100% - 0.75rem)] mx-auto" :src="background.path" alt="">
    </div>
    <div class="w-full md:w-6/12 md:ml-3 flex flex-col justify-center ">

        <h2 class="text-[#001E2F] font-bold text-2xl" :style="{'color': \'' + title_color + '\'}">
            {{title[local]}}
        </h2>

        <p class="text-[#001E2F] my-4 mb-0" :style="{'color': \'' + des_color + '\'}" >
          {{des[local]}}
        </p>


    </div>
</section>
`,
        },
        {
          id:'secetion4',
          section_id:'secetion4',
          image: '/storage/sections/section4.jpg',
          inputs:[

            {
              name:'subtitle',
              type:'text',
              value:"PAPERLESS AIRPORT",
              validations:[]
            },
            {
              name:'title',
              type:'text',
              value:"AND ABC",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'background_color',
              type:'color',
              value:"#00DAE9",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 22.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="bg-[#00DAE9]  p-8 pb-0 md:p-18 md:pb-0 lg:p-24 lg:pb-0 flex flex-col gap-8  md:flex-row md:gap-0" :style="{'background-color': \'' + background_color + '\'}">
    <div class="w-full md:w-6/12 md:mr-3 flex flex-col justify-center pb-8">

        <h2 class="text-[#001E2F] font-bold text-2xl" :style="{'color': \'' + title_color + '\'}">
          {{subtitle[local]}} <br> {{title[local]}}
        </h2>

        <p class="text-[#001E2F] my-4 mb-0" :style="{'color': \'' + des_color + '\'}"  >
          {{des[local]}}
        </p>


    </div>
    <div class="w-full flex  md:w-6/12 md:ml-3 items-end">
            <img class="mx-auto max-w-[100%] sm:max-w-[400px] md:max-w-[100%] lg:max-w-[100%]" :src="background.path" alt="">
    </div>

</section>


`,
        },
        {
          id:'secetion5',
          section_id:'secetion5',
          image: '/storage/sections/section5.jpg',
          inputs:[

            {
              name:'subtitle',
              type:'text',
              value:"Biometrics Facial Recognition",
              validations:[]
            },
            {
              name:'subtitle_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'title',
              type:'text',
              value:" Face Screen",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#F55800",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#0F1921",
              validations:[]
            },
            {
              name:'background_color',
              type:'color',
              value:"#F3F5F5",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 23.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="bg-[#F3F5F5]  flex flex-col gap-8  md:flex-row md:justify-center items-center "  :style="{'background-color': \'' + background_color + '\'}">
    <div class="md:w-6/12 flex flex-col gap-4 p-8  md:p-18 lg:pb-0  lg:p-24 lg:pt-0">
        <p class="text-[#001E2F] font-semibold text-xl"  :style="{'color': \'' + subtitle_color + '\'}">
          {{subtitle[local]}}
        </p>
        <h1 class="font-bold text-3xl lg:text-5xl text-[#F55800]"  :style="{'color': \'' + title_color + '\'}">
          {{title[local]}}
        </h1>
        <p class="text-[#0F1921]" :style="{'color': \'' + des_color + '\'}" >
          {{des[local]}}        </p>
    </div>
    <div class="w-full flex justify-end md:block md:w-6/12">
        <img class="max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
    </div>
</section>

`,
        },
        {
          id:'secetion6',
          section_id:'secetion6',
          image: '/storage/sections/section6.jpg',
          inputs:[


            {
              name:'title',
              type:'text',
              value:"RELIABLE EVEN IN POOR CONDITIONS",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:" The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'background_color',
              type:'color',
              value:"#F3F5F5",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 24.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section  class="p-8 md:p-18 lg:p-24 flex gap-8 md:flex-row md:gap-0 bg-[#F3F5F5] flex-col-reverse" :style="{'background-color': \'' + background_color + '\'}">
    <div class="w-full   md:w-6/12 flex items-center">
        <img class="mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
    </div>
    <div class="md:w-6/12 flex flex-col gap-4 ">
        <h2 class="text-[#001E2F] font-semibold text-2xl" :style="{'color': \'' + title_color + '\'}">
            {{title[local]}}
        </h2>

        <p class="text-[#001E2F]" :style="{'color': \'' + des_color + '\'}" >
           {{des[local]}}
        </p>

    </div>

</section>


`,
        },
        {
          id:'secetion7',
          section_id:'secetion7',
          image: '/storage/sections/section7.jpg',
          inputs:[
            {
              name:'title_1',
              type:'text',
              value:"FAST AND IMMEDIATE IDENTIFICATION",
              validations:[]
            },
            {
              name:'title_color_1',
              type:'color',
              value:"#F55800",
              validations:[]
            },
            {
              name:'des_1',
              type:'textarea',
              value:" The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.",
              validations:[]
            },
            {
              name:'des_color_1',
              type:'color',
              value:"#F5F5F5",
              validations:[]
            },
            {
              name:'title_2',
              type:'text',
              value:"RELIABLE EVEN IN POOR CONDITIONS",
              validations:[]
            },
            {
              name:'title_color_2',
              type:'color',
              value:"#F55800",
              validations:[]
            },
            {
              name:'des_2',
              type:'textarea',
              value:" The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.",
              validations:[]
            },
            {
              name:'des_color_2',
              type:'color',
              value:"#F5F5F5",
              validations:[]
            },
            {
              name:'background_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 25.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="bg-[#001E2F]  flex flex-col gap-8 p-8 md:p-18 lg:p-24" :style="{'background-color': \'' + background_color + '\'}">
    <div>
        <img class="sm:w-[500px] md:w-[600px] lg:w-[800px] mx-auto" :src="background.path" alt="">
    </div>
    <div>
        <p class="text-[#F55800] font-bold" :style="{'color': \'' + title_color_1 + '\'}">
          {{title_1[local]}}

        </p>
        <p class="text-[#F5F5F5]" :style="{'color': \'' + des_color_1 + '\'}" >
           {{des_1[local]}}
        </p>
    </div>
    <div>
        <p class="text-[#F55800] font-bold" :style="{'color': \'' + title_color_2 + '\'}">
          {{title_2[local]}}

        </p>
        <p class="text-[#F5F5F5]" :style="{'color': \'' + des_color_2 + '\'}" >
           {{des_2[local]}}
        </p>
    </div>
</section>


`,
        },
        {
          id:'secetion8',
          section_id:'secetion8',
          image: '/storage/sections/section8.jpg',
          inputs:[
            {
              name:'title',
              type:'text',
              value:"FACIAL RECOGNITION ON THE MOVE",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#FFD767",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:" The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#F5F5F5",
              validations:[]
            },

            {
              name:'background_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 24.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="bg-[#001E2F] p-8 md:p-18 lg:p-24  flex flex-col gap-8  md:flex-row md:justify-center items-center " :style="{'background-color': \'' + background_color + '\'}">

   <div class="w-full flex md:block md:w-7/12">
       <img class="mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
   </div>
   <div class="md:w-5/12 flex flex-col gap-4 ">
       <p class="text-[#FFD767] font-semibold text-xl" :style="{'color': \'' + title_color + '\'}">
        {{title[local]}}
       </p>
       <p class="text-[#F5F5F5]" :style="{'color': \'' + des_color + '\'}"  >
           {{des[local]}}
        </p>

   </div>
</section>


`,
        },
        {
          id:'secetion9',
          section_id:'secetion9',
          image: '/storage/sections/section9.jpg',
          inputs:[
            {
              name:'subtitle',
              type:'text',
              value:"FaceEye",
              validations:[]
            },
            {
              name:'subtitle_color',
              type:'color',
              value:"#F55800",
              validations:[]
            },
            {
              name:'title',
              type:'text',
              value:"Camera for Facial Recognition",
              validations:[]
            },
            {
              name:'title_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },
            {
              name:'des',
              type:'textarea',
              value:" The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.",
              validations:[]
            },
            {
              name:'des_color',
              type:'color',
              value:"#001E2F",
              validations:[]
            },

            {
              name:'background_color',
              type:'color',
              value:"#F3F5F5",
              validations:[]
            },
            {
              name:'background',
              type:'image',
              value:{
                'path' : '/storage/sections/product/details/image 27.png' ,
                'id' : 0 ,
              },
              validations:[]
            },
          ],


          html: `<section class="bg-[#F3F5F5 p-8 md:p-18 lg:p-24  flex flex-col gap-8  md:flex-row md:justify-center items-center " :style="{'background-color': \'' + background_color + '\'}">
    <div class="md:w-6/12 flex flex-col gap-4 ">
        <h1 class="text-[#F55800] font-bold text-3xl" :style="{'color': \'' + subtitle_color + '\'}">
           {{subtitle[local]}}
        </h1>

        <p class="text-[#001E2F] text-xl font-semibold" :style="{'color': \'' + title_color + '\'}">
           {{title[local]}}
        </p>
        <p class="text-[#001E2F] "   :style="{'color': \'' + des_color + '\'}">
            {{des[local]}}
        </p>
    </div>
    <div class="w-full flex md:block md:w-6/12">
        <img class="mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
    </div>
</section>

`,
        },
      ],
    };
  },
  methods: {

    startDrag(evt, item) {
      console.log('startDrag : 1');

      this.dragging = true;
      console.log('startDrag : 2');
      evt.dataTransfer.dropEffect = 'move'
      console.log('startDrag : 3');
      evt.dataTransfer.effectAllowed = 'move'
      console.log('startDrag : 4');
      evt.dataTransfer.setData('itemID', item.id)
      console.log('startDrag : 5');
      // console.log('startDrag',item);
      this.closeFilterModel();
      console.log('startDrag : 6');
    },
    openSectionEdit(index , local) {
      this.section = this.product.sections[index];
      this.SectionModelIsOpen = true;
      this.SectionModelLocal = local;
    },
    removeSection(index) {
      this.product.sections.splice(index, 1); // 2nd parameter means remove one item only
    },
    DownSection(index) {
      if(index + 1 == this.product.sections.length){
        return;
      }

        // remove `from` item and store it
      var f = this.product.sections.splice(index, 1)[0];
      // insert stored item into position `to`
      this.product.sections.splice(index + 1, 0, f);
    },
    UpSection(index) {
      if(index == 0){
        return;
      }
        // remove `from` item and store it
      var f = this.product.sections.splice(index, 1)[0];
      // insert stored item into position `to`
      this.product.sections.splice(index - 1, 0, f);
    },
    onDrop(evt, list) {
      console.log('1');
      this.dragging = false;
      console.log('2');
      const itemID = evt.dataTransfer.getData('itemID')
      console.log('3');
      const section = this.sections.find((item) => item.id == itemID)
      console.log('4');
      let sectionTamplate = JSON.parse(JSON.stringify(section));
      console.log('5');


      sectionTamplate.inputs.forEach((input , index) => {
        console.log('6');

        if(input.type === 'text' || input.type === 'textarea'){
        console.log('7');

          var oldValue = sectionTamplate.inputs[index].value;
          sectionTamplate.inputs[index].value = {};

          window.locales.forEach(local => {
            // console.log(index);
              var lock = {
                [local]:  oldValue,
              }
              sectionTamplate.inputs[index].value = {
                ... sectionTamplate.inputs[index].value,
                ...lock
              }


          });
          // console.log(input);
        }
        console.log('8');


      });
      console.log(sectionTamplate)

      // window.locales.forEach(local => {
      //   var lock = {
      //     [local]:  null,
      //   }

      //   this.product.name = {
      //     ... this.product.name,
      //     ...lock
      //   }
      // });

      // var shallowCopy = Object.assign({}, section) // 1. - preferred (if you support new ES features)
      // this.product.sections.push(shallowCopy);
      console.log('9' , this.product.sections);

      this.product.sections.push(JSON.parse(JSON.stringify(sectionTamplate)));
      console.log('10' , this.product.sections);

      // // console.log('onDrop' , itemID);
    },


      //---- Get All Attribute List
    async getAttrList() {
      this.StartLoading();
      let data = await AttributeController.getData({length: 'all' , columnFilters: {
              type: null,
              field: 'parent_id',
              value: 0,
            }});
      if(data){
          this.attributes = data.data;
      }
      this.StopLoading();
    },

     //---- Open FilterModel
     openFilterModel() {
        this.FilterModelIsOpen = true;
      },
      //---- close FilterModel
     closeFilterModel() {
        this.FilterModelIsOpen = false;
      },
    //---- Get Model By Id
    async getModel(id) {
      this.StartLoading();
      let data = await ProductController.getModel(id);
      if(data){
          this.product = data;
          this.handelAttributes();
          // this.handelAttributesValues();
      }
      this.StopLoading();
    },



    //---- Reset Form
    resetForm() {
      this.v$.$reset();
      this.editMode = false;
      this.product = {
        name: null,
        attributes:[],
        attributes_value:[],
        active: false,
      };

      window.locales.forEach(local => {
        var lock = {
          [local]:  null,
        }

        this.product.name = {
          ... this.product.name,
          ...lock
        }
      });
    },


    async handelAttributes(){

      let ids = [];
      let attributes_value = [];
      this.product.attributes_value = [];
      await this.product.attributes.forEach((attribute , index) => {
        ids.push(attribute.id);
        attributes_value[attribute.id] = {};

        if(typeof attribute.value === 'object' && attribute.value != null){
          console.log('attributes_value[attribute.id].value 1' , attribute.value);
          attributes_value[attribute.id].value = attribute.value
        }else{
          console.log('attributes_value[attribute.id].value 2');
          window.locales.forEach(local => {
            console.log('attributes_value[attribute.id].value 3');
            var lock = {
              [local]:  attribute.value,
            }

            attributes_value[attribute.id].value = {
              ...attributes_value[attribute.id].value,
              ...lock
            }
            console.log('attributes_value[attribute.id].value 4' ,  attributes_value[attribute.id].value );
          });
        }
        console.log('attributes_value[attribute.id].value 5' ,  attributes_value[attribute.id].value );

        attributes_value[attribute.id].show = true
      });
      console.log('attributes_value[attribute.id].value 6' ,  attributes_value );

      this.product.attributes_value = attributes_value;
      this.product.attributes = ids;
    },

    async attributesChange(id){
      console.log(id);
      this.product.attributes_value[id] = {
        value:{},
        show:false,
      }
      await window.locales.forEach(local => {
        var lock = {
          [local]:  null,
        }

         this.product.attributes_value[id].value = {
          ...this.product.attributes_value[id].value,
          ...lock
        }
      });
      this.product.attributes_value[id].show = true;
      console.log(this.product.attributes_value);

    },
    handelAttributesValues(ids , values){
      // console.log('ids' , ids);
      // console.log('values' , values);
      let ifError = false;
      let newArray = [];
      ids.forEach((id , index) => {
        if(values[id] == null || values[id] == ''  || values[id] === 'undefined'){
          ifError = true;
        }

        newArray.push({
          id:id,
          value: values[id]?.value
        });
      });


      return ifError ? false : newArray;
    },
    getCurrentProperties(inputs , local) {
      // if (component === 'myComponent') {
        return {
          ...inputs,
          local:local
        };
      // }
    },

    saveAddNew(){
      this.save(null ,true);
    },
    //---- Submit Form Handler
    async save(e , addNew = false) {
      this.StartLoading();

      const result = await this.v$.$validate();
      const attributes = await this.handelAttributesValues(this.product.attributes , this.product.attributes_value);



      if (!attributes) {
        this.$h.errorNotify('please compalte all attributs values');
        this.StopLoading();
        return false;
      }
      if (!result) {
        this.$h.validateionErrorNotify(this.v$.$errors);
        this.StopLoading();
        return false;
      }

      this.product.attributes_final = attributes;

      if (this.editMode) {
        let response = await ProductController.update(this.product);
        if(response && response.status == 'success'){
          // this.getData();
          $h.notify(this.$t('messages.success'), response.message);
          this.handelFinishRequest(addNew);
        }
      } else {
        let response = await ProductController.store(this.product);
        if(response && response.status == 'success'){
          // this.getData();
          $h.notify(this.$t('messages.success'), response.message);
          this.handelFinishRequest(addNew);
        }
      }

      this.StopLoading();
    },
    handelFinishRequest(addNew = false){
      if(!addNew){ // if not click add new
        this.closeModel();
      }else{
        this.resetForm();
      }
    },
    closeModel(){
      this.$router.push({name:"products"});
    },
    handelHtml( inputs){

      let data = {};
      for (let index = 0; index < inputs.length; index++) {
        let input = inputs[index];
        data[input.name] = input.value
      }
      // console.log(data);
      return data;
    }
  },
  computed:{
    attributeClass() {
      return (length) => length < 3 ? 'grid-cols-' + length : 'grid-cols-3';
   },


    itemsWithRenderHtml() {
      // This creates a new empty object, copies the item into it,
      // then calculates `fullAddress` and copies that entry into it
      // console.log(this.product.sections);
      return this.product.sections.map(obj => ( {
        inputs: this.handelHtml(obj.inputs ),
        id: obj.id,
        image: obj.image,
        html: obj.html,
      }));
    }
  },
  mounted(){
      if(this.$route.params.id){
        this.getModel(this.$route.params.id);
        this.editMode = true;
      }
      // const section = this.sections.find((item) => item.id == 'secetion3')

      // this.product.sections.push(JSON.parse(JSON.stringify(section)));
      this.StopLoading();

  },
  created() {
    this.locales = window.locales;

    //---- Get All Data In Load Page
    this.getAttrList();

    // this.getData();

  },

};

</script>
