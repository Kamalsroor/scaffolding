<template>

  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">{{ !$h.checkBoolean(serverParams.deleted) ?   $t('g.list', {model: $t('news.plural')})  : $t('g.deleted', {model: $t('news.plural')}) }}</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <router-link class="btn btn-primary shadow-md mr-2" v-can="['create-news']" :to="{name:'news-create'}">
        <PlusIcon class="mr-2 w-5 h-5"/>
        {{ $t('g.create') }}
      </router-link>
      <a v-can="['restore-news','force-delete-news']" v-if="$h.checkBoolean(serverParams.deleted)" class="btn btn-primary shadow-md mr-2" @click="ToggleDeletedData(true,false)">
        <ListIcon class="mr-2 w-5 h-5"/>
        {{ $t('g.list', {model: $t('news.plural')}) }}
      </a>
      <a v-can="['restore-news','force-delete-news']" v-if="!$h.checkBoolean(serverParams.deleted)" class="btn btn-primary shadow-md mr-2" @click="ToggleDeletedData(true,true)">
        <Trash2Icon class="mr-2 w-5 h-5"/>
        {{ $t('g.deleted', {model: $t('news.plural')}) }}
      </a>


      <!-- BEGIN: View Modal Content -->
      <Modal v-can="['view-news']" :show="ModelViewIsOpen" size="modal-xl" @hidden="closeViewModel()">
        <form class="validate-form" @submit.prevent="save">
          <ModalHeader>
            <h2 class="font-medium text-base mr-auto">
              {{
               $t('g.view_row', {model: $t('news.plural')})
              }}
            </h2>
          </ModalHeader>
          <ModalBody class="">

            <div class="overflow-hidden bg-white ">

              <div class="border-t border-gray-200 px-4 py-5 sm:px-6">
                <dl class="grid grid-cols-4 gap-4">

                  <div   class="col-span-4  grid grid-cols-2 gap-2 border-b border-gray-200" >

                    <div class="sm:col-span-1">
                      <dt class="text-sm font-medium text-gray-500">Title</dt>
                      <dd class="mt-1 text-sm text-gray-900">{{news.title}}</dd>
                    </div>

                    <div class="sm:col-span-2">
                      <dt class="text-sm font-medium text-gray-500">Description </dt>
                      <dd class="mt-1 text-sm text-gray-900" v-html="news.description"></dd>
                    </div>

                    <div class="sm:col-span-2">
                      <dt class="text-sm font-medium text-gray-500">mini_description </dt>
                      <dd class="mt-1 text-sm text-gray-900" v-html="news.mini_description"></dd>
                    </div>
                  </div>

                  <div class="col-span-2">
                    <dt class="text-sm font-medium text-gray-500">language</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{news.language}}</dd>

                  </div>
                  <div class="col-span-4">
                    <dt class="text-sm font-medium text-gray-500">Image</dt>
                    <dd class="mt-1 text-sm text-gray-900">
                      <div class="h-96	 w-full		 image-fit">
                      <img
                        alt=""
                        :src="news.img_url"
                        data-action="zoom"
                        class="w-full rounded-md"
                      />
                      </div>
                     </dd>
                  </div>

                  <div class="col-span-2">
                    <dt class="text-sm font-medium text-gray-500">order id</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{news.active}}</dd>

                  </div>
                  <div class="col-span-2">
                    <dt class="text-sm font-medium text-gray-500">Date</dt>
                    <dd class="mt-1 text-sm text-gray-900">{{news.date}}</dd>
                  </div>
                </dl>
              </div>
            </div>


          </ModalBody>
          <ModalFooter class="space-x-2">
            <button class="btn btn-outlaine-secondry" type="button" @click="closeViewModel()">
              {{ $t('g.cancel') }}
            </button>

          </ModalFooter>
        </form>
      </Modal>
      <!-- END: View Modal Content -->




        <!-- BEGIN: Slide Over Content -->
        <Modal
            :slideOver="true"
            :show="FilterModelIsOpen"
            @hidden="FilterModelIsOpen = false"
        >
            <ModalHeader class="p-5">
            <h2 class="font-medium text-base mr-auto">Search & Filter</h2>
            </ModalHeader>
            <ModalBody>
            <form id="tabulator-html-filter-form" @submit="onFilter"  class="sm:mr-auto">
                <div class=" flex flex-wrap gap-3 p-3  bg-slate-100 border border-dashed border-slate-200 rounded-md">

                    <div class="flex items-center sm:mr-4 grow">
                        <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.field') }}</label>
                        <select id="tabulator-html-filter-field" v-model="serverParams.columnFilters.field"
                                class="form-select w-full mt-2 sm:mt-0">
                            <option value="title">{{ $t('forms.attributes.title') }}</option>
                        </select>
                    </div>
                    <div class="flex items-center sm:mr-4 mt-2 xl:mt-0 grow">
                        <label class="flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.type') }}</label>
                        <select id="tabulator-html-filter-type" v-model="serverParams.columnFilters.type"
                                class="form-select w-full mt-2 sm:mt-0">
                            <option selected value="like">{{ $t('filter.like') }}</option>
                            <option value="=">=</option>
                            <option value="<">&lt;</option>
                            <option value="<=">&lt;=</option>
                            <option value=">">></option>
                            <option value=">=">>=</option>
                            <option value="!=">!=</option>
                        </select>
                    </div>
                    <div class="w-full flex items-center sm:mr-4 mt-2 xl:mt-0">
                        <label class="flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.value') }}</label>
                        <input id="tabulator-html-filter-value" v-model="serverParams.columnFilters.value"
                                class="form-control grow mt-2 sm:mt-0"
                                placeholder="Search..." type="text"/>
                    </div>
                </div>
                <div class=" flex flex-wrap gap-3 p-3 mt-4   bg-slate-100 border border-dashed border-slate-200 rounded-md">
                    <InputField v-model="serverParams.search.title"  class="col-span-12 sm:col-span-12"
                        :label="$t('forms.attributes.title')" name="title" :placeholder="$t('forms.attributes.title')"/>

                </div>
                <div class="mt-4 xl:mt-4 w-full">
                <button id="tabulator-html-filter-go" class="btn btn-primary w-full" type="submit" @click="onFilter">
                    {{ $t('g.search') }}
                </button>
                </div>
            </form>

            </ModalBody>
        </Modal>
        <!-- END: Slide Over Content -->

    </div>
  </div>
  <!-- BEGIN: HTML Table Data -->
  <div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">

        <button id="tabulator-html-filter-go" class="btn btn-primary w-full sm:w-16" type="submit" @click="openFilterModel">
        {{ $t('filter.filter') }}
        </button>
        <button id="tabulator-html-filter-reset" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1"
                type="button" @click="onResetFilter">
        {{ $t('filter.reset') }}
        </button>
      <div class="flex mt-5 sm:mt-0">
        <button
          id="tabulator-print"
          class="btn btn-outline-secondary w-1/2 sm:w-auto mr-2"
          @click="onPrint"
        >
          <PrinterIcon class="w-4 h-4 mr-2"/>
          {{ $t('table.print') }}
        </button>
        <Dropdown class="w-1/2 sm:w-auto">
          <DropdownToggle class="btn btn-outline-secondary w-full sm:w-auto">
            <FileTextIcon class="w-4 h-4 mr-2"/>
            {{ $t('table.export') }}
            <ChevronDownIcon class="w-4 h-4 ml-auto sm:ml-2"/>
          </DropdownToggle>
          <DropdownMenu class="w-40">
            <DropdownContent>
              <DropdownItem @click="onExport('csv')">
                <FileTextIcon class="w-4 h-4 mr-2"/>
                {{ $t('table.export_type', {type: 'CSV'}) }}
              </DropdownItem>
              <DropdownItem @click="onExport('xlsx')">
                <FileTextIcon class="w-4 h-4 mr-2"/>
                {{ $t('table.export_type', {type: 'XLSX'}) }}
              </DropdownItem>
            </DropdownContent>
          </DropdownMenu>
        </Dropdown>

        <Dropdown class="w-1/2 sm:w-auto">
          <DropdownToggle class="btn btn-outline-secondary w-full sm:w-auto">
            <FileTextIcon class="w-4 h-4 mr-2"/>
            {{ $t('table.show_hide') }}
            <ChevronDownIcon class="w-4 h-4 ml-auto sm:ml-2"/>
          </DropdownToggle>
          <DropdownMenu class="w-40">
            <DropdownContent>
              <DropdownItem >
                    <form class="space-y-4">
                      <div v-for="(option, optionIdx) in columns" :key="option.field" class="flex items-center">
                        <input :id="`filter-'column-visibility'-${optionIdx}`"
                                @change="ChangeColumnsStatus(optionIdx)"
                               :checked="!option.hidden"
                               class="h-4 w-4 border-gray-300 rounded text-blue-600 focus:ring-blue-500" type="checkbox"/>
                        <label :for="`filter-'column-visibility'-${optionIdx}`"
                               class="ml-3 pr-6 text-sm font-medium text-gray-900 whitespace-nowrap">
                          {{ option.label }}
                        </label>
                      </div>
                    </form>
              </DropdownItem>
            </DropdownContent>
          </DropdownMenu>
        </Dropdown>



      </div>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
      <vue-good-table
        v-model:isLoading.sync="isLoading"
        :columns="columns"
        :fixed-header="false"
        :pagination-options="{
          enabled: true,
          setCurrentPage: parseInt(serverParams.page),
          perPage: parseInt(serverParams.length),
          mode: 'pages',
          nextLabel: 'next',
          prevLabel: 'prev',
        }"
        :rows="rows"
        :search-options="{
          enabled: false,
        }"
        :totalRows="totalRecords"
        compactMode
        mode="remote"
        styleClass="tableOne vgt-table striped my-5 "
        v-on:page-change="onPageChange"
        v-on:sort-change="onSortChange"
        v-on:per-page-change="onPerPageChange"
      >

        <template #table-row="props">

          <span v-if="props.column.hasTranslate">

            <template v-for="(item, index) in props.row[props.column.field]" :key="index">
              <div class="font-medium text-gray-900 truncate"> {{ index }} : {{ item }} ,</div>
            </template>
          </span>


          <span v-if="props.column.field == 'actions'">
              <div class="flex lg:justify-center items-center">
              <button v-if="!props.row.deleted" class="flex items-center btn btn-secondary  w-24 mr-1 mb-2" v-can="['view-news']"  @click="OpenViewSliderModal(props.row.id)">
                <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                <Icon :show="!isLoading" class="w-4 h-4 mr-1" name="CheckSquare"/>{{ $t('g.show') }}
              </button>

              <router-link v-if="!props.row.deleted" class="flex items-center btn btn-secondary  w-24 mr-1 mb-2" v-can="['edit-product']" :to="{name:'news-edit' ,params : {id:props.row.id} }" >
                    <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                    <Icon :show="!isLoading" class="w-4 h-4 mr-1" name="CheckSquare"/>{{ $t('g.edit') }}
              </router-link>


              <button v-if="props.row.deleted" class="flex items-center btn btn-success text-white  w-24 mr-1 mb-2" v-can="['restore-news']" @click="restoreNews(props.row.id , props.row.name)">
                    <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                    <Icon :show="!isLoading" class="w-4 h-4 mr-1" color="white" name="ArrowLeft"/>{{ $t('g.restore') }}
              </button>
              <button class="flex items-center btn btn-danger w-24 mr-1 mb-2"  v-can="['delete-news']" @click="deleteNews(props.row.id , props.row.name)">
                    <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                    <Icon :show="!isLoading" class="w-4 h-4 mr-1"  color="white"  name="Trash2"/>{{ $t('g.delete') }}
              </button>

              </div>
          </span>
          <span v-if="props.column.field == 'active'">
            <Switch v-model="props.row.active" :disabled="$h.checkBoolean(serverParams.deleted)" name="active" @change="statusChange(props.row.id)"/>
          </span>

            <span v-if="props.column.field == 'img_url'">
                <div class="w-24 h-12 image-fit">
                  <img
                    alt=""
                    :src="props.row.img_url"
                    data-action="zoom"
                    class="w-full rounded-md"
                  />
                </div>
            </span>

        </template>

      </vue-good-table>
    </div>
  </div>
  <!-- END: HTML Table Data -->
</template>

<script>
import {Loading, Notify , Deleted} from '@/mixins'
import NewsController from '@@/News/Resources/assets/js/controllers/NewsController.js';

import FileSaver from 'file-saver'


export default {
  mixins: [Notify, Loading , Deleted],

  data() {
    return {
      news: { // Model
        title: {},
        description: {},
        mini_description: {},
        date:null,
        tags:[],
        img: null,
        language:null,
        order_id: null,
        title: null,
        description: null,
        mini_description: null,
        active: false,
      },
      locales:[],
      ModelViewIsOpen: false, // Model Show Statusc
      FilterModelIsOpen: false, // Filter Model Show Status
      categories:[],
      columns: [ // Columns For Table
        {
          label: this.$t("forms.attributes.id"),
          field: "id",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,
          tooltip: 'A simple tooltip',
        },
        {
          label: this.$t('forms.attributes.title'),
          field: "title",
          hasTranslate:false,
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,

        },
        {
          label: this.$t('forms.attributes.language'),
          field: "language",
          hasTranslate:false,
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,

        },
        {
            label: this.$t('forms.attributes.image'),
            field: "img_url",
            tdClass: "text-left",
            thClass: "text-left",
            sortable: false,
            html: true,
        },
        {
          label: this.$t('forms.attributes.date'),
          field: "date",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,

        },
        {
          label: this.$t('forms.attributes.active'),
          field: "active",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,

        },


        {
          label: this.$t('forms.attributes.deleted_at'),
          field: "deleted_at",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,
          dateInputFormat: 'yyyy-MM-dd', // expects 2018-03-16
          dateOutputFormat: 'yyyy-MM-dd p', // outputs Mar 16th 2018
          hidden: true,
        },
        {
          label: this.$t('forms.attributes.action'),
          field: "actions",
          html: true,
          tdClass: "text-right",
          thClass: "vgt3-right-align",
          // width: '220px',
          sortable: false
        }
      ],
      totalRecords: 0, // Total Data Count
      rows: [], // Data List
      tags:[],
      serverParams: {
        columnFilters: {
          type: 'like',
        }, // Filter Object
        search:{},
        sort: {
          field: '', // Filed Sorting
          type: "desc" // Sort Type
        },
        page: 1, // Page Number
        length: 10, // Data Length
        deleted: false, // Show Deleted Item
      },
      limit: "10", // Crrunt Limit
    };
  },
  methods: {
    //---- Get All Data List
    async getData(page = null) {
      this.StartLoading();
      if (page) {
        this.updateParams({ page:page});
      }
      let data = await NewsController.getData(this.serverParams);

      if(data){
          this.rows = data.data;
          this.totalRecords = data.meta.total;
      }
    },

    //---- Get Model By Id
    async getModel(id) {
      this.StartLoading();
      let data = await NewsController.getModel(id);
      if(data){
          this.news = data;
      }
      this.StopLoading();
    },


    OpenViewSliderModal(id = null) {
      this.ModelViewIsOpen = true;


      this.getModel(id)
    },
    ChangeColumnsStatus(index){
        this.columns[index]['hidden'] = !this.columns[index]['hidden'];
    },

   //---- Close Model
   closeViewModel() {
    // console.log('ModelViewIsOpen');
      this.ModelViewIsOpen = false;
    },

    //---- Open FilterModel
    openFilterModel() {
      this.FilterModelIsOpen = true;
    },
    //---- Close FilterModel
    closeFilterModel() {
      this.FilterModelIsOpen = false;
    },

    //---- Update Form Params
    updateParams(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
      this.updateRotueQuery();
    },
    //---- Change Status Handler
    async statusChange(id) {
      this.StartLoading();
      let response = await NewsController.ToggleActive(id);
      if(response && response.status == 'success'){
        $h.notify(this.$t('messages.success'), response.message);
      }
      this.getData();
      this.StopLoading();
    },
    //---- Event Page Change
    onPageChange({currentPage}) {
      this.StartLoading();

      if (typeof currentPage === 'undefined') {
        currentPage = 1;
      }
      if (this.serverParams.page !== currentPage) {
        this.updateParams({page: currentPage});
      } else {
        this.StopLoading();
      }
      this.getData(currentPage);
    },
    //---- Event Per Page Change
    onPerPageChange({currentPerPage}) {
      if (this.limit !== currentPerPage) {
        this.limit = currentPerPage;
        this.updateParams({page: 1, length: currentPerPage});

        this.getData(1);
      }
    },
    //---- Event Sort Change
    onSortChange(params) {
      let field = "";
      if (params[0].field == "port") {
        field = "port_id";
      } else if (params[0].field == "news") {
        field = "news_id";
      } else {
        field = params[0].field;
      }
      this.updateParams({
        sort: {
          type: params[0].type,
          field: field
        }
      });
      this.getData(this.serverParams.page);
    },
    //---- Event Filter Change
    onFilter(e) {
      e.preventDefault();
      this.onPageChange(1);
      this.closeFilterModel();
    },
    //---- Event To Reset Filter
    onResetFilter() {
       this.updateParams({
        columnFilters: {
          type: null,
          field: null,
          value: null,
        },
         sort: {
          field: '', // Filed Sorting
          type: "desc" // Sort Type
        },
        search:{},
      });
      this.onPageChange(1);
    },

    //---- Delete Model Handler
    async deleteNews(id , name = "") {
      this.StartLoading();
      const answer = window.confirm(this.$t('messages.confirmations.delete' , {item: name}))
      if (!answer){ this.StopLoading();  return false}

      let response = await NewsController.delete(id);
      if(response && response.status == 'success'){
        this.getData();
        $h.notify(this.$t('messages.success'), response.message);
      }
      this.StopLoading();
    },
    //---- Restore Model Handler
    async restoreNews(id , name = "") {
      this.StartLoading();
      const answer = window.confirm(this.$t('messages.confirmations.restore' , {item: name}))
      if (!answer){ this.StopLoading();  return false}

      let response = await NewsController.restore(id);
      if(response && response.status == 'success'){
        this.getData();
        $h.notify(this.$t('messages.success'), response.message);
      }
      this.StopLoading();
    },

    onExport(type){
      this.axios.get(`export/${type}`, {
        params: {
          model : 'News',
          export : 'Export',
          repo : 'NewsRepository',
          resource : 'NewsResource',
          file_name : 'News',
          ...this.serverParams},
          headers: {"Accept": "application/vnd.ms-excel"},
          responseType: "blob"
      })

      .then(response  => {
        var blob = new Blob([response.data], {
            type: 'application/vnd.ms-excel'
        });

        FileSaver.saveAs(blob, response.config.params.file_name + '.' + type);

      })
      .catch((error) => {
        // $h.errorNotify(error.data.message);
        // throw error.data.message
      });


    },


  },

  created() {
    if(this.$route.query){
      this.updateParams(this.$route.query);
      if(this.$route.query.sort){
        this.updateParams({ sort:JSON.parse(this.$route.query.sort)});
      }
      if(this.$route.query.columnFilters){
        this.updateParams({ columnFilters:JSON.parse(this.$route.query.columnFilters)});
      }
      if(this.$route.query.search){
        this.updateParams({ search:JSON.parse(this.$route.query.search)});
      }
    }

    // // console.log(window.locales);
    //---- Get All Data In Load Page
    this.getData();
  },

};

</script>
