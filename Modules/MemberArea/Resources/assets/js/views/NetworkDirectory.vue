<template>

    <!-- Hero section -->
    <section class="">
        <GreenSection>
            <h1 class="h2 mb-4 text-white">{{ headerData.title }}</h1>

            <p class="text-xl text-white sm:center-justified">
                {{ headerData.des }}
            </p>

        </GreenSection>
    </section>

    <!-- Contact section -->
    <section>
      <div class="max-w-7xl mx-auto px-4 sm:px-6">
        <div class="pt-8 pb-12 md:pt-12 md:pb-20">

          <!-- Map -->
          <div id="components-demo">
            <Map></Map>
          </div>
          <!-- Filter -->
          <div v-if="Auth" class="mt-8 grid lg:grid-cols-5 md:grid-cols-3 grid-cols-1 gap-6">
            <Field
              class="lg:col-span-2"
              placeholder="Search For..."
              type="text"
            />
            <Field
              class="lg:col-span-2"
              placeholder="Select a Country"
              type="select"
            />
            <div class="">
              <ActionButton :icon="true" class="md:w-full" iconName="SearchIcon" label="Search"/>
            </div>
          </div>
          <!-- Table -->
          <!-- <div v-if="Auth">
            <div class="mt-8">
              <div class="-my-2 -mx-4 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                  <div class="overflow-hidden border-2 md:rounded-md border-bg-light">
                    <table class="min-w-full divide-y divide-bg-light">
                      <thead class="bg-slate-50">
                      <tr>
                        <th class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-slate-800 sm:pl-6" scope="col">
                          Company
                        </th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-slate-800" scope="col">Location</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-slate-800" scope="col">WSA ID</th>
                        <th class="px-3 py-3.5 text-left text-sm font-semibold text-slate-800" scope="col">
                          Membership Type
                        </th>
                        <th class="relative py-3.5 pl-3 pr-4 sm:pr-6" scope="col">
                          <span class="sr-only">Edit</span>
                        </th>
                      </tr>
                      </thead>
                      <tbody class="divide-y divide-slate-200 bg-white">
                      <tr v-for="company in companies" :key="company.email">
                        <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm sm:pl-6">
                          <div class="flex items-center">
                            <div class="h-10 w-24 flex-shrink-0">
                              <img :src="company.logo" alt=""
                                   class="h-10 w-24 rounded-md object-contain bg-white ring-2 ring-gray-200"/>
                            </div>
                            <div class="ml-4">
                              <div class="font-medium text-gray-900">{{ company.name }}</div>
                              <div class="text-gray-500">{{ company.email }}</div>
                            </div>
                          </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          <div class="flex items-center">
                            <div class="h-10 w-10 flex-shrink-0">
                              <img :alt="company.country.name" :src="company.country.flagUrl"
                                   class="h-10 w-10 rounded-md object-cover bg-white"/>
                            </div>
                            <div class="ml-4">
                              <div class="font-medium text-gray-900">{{ company.country.name }}</div>
                              <div class="text-gray-500">
                                <span>{{ company.city }}</span>
                                <span v-if="company.state !== null || company.state !== '' " class="mr-2">,</span>
                                <span v-if="company.state !== null || company.state !== '' ">
                                  {{ company.state }}
                                </span>
                              </div>
                            </div>
                          </div>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          <span class="font-bold">
                            {{ company.wsaId }}
                          </span>
                        </td>
                        <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                          <span
                            class="inline-flex rounded-md bg-slate-100 px-2 text-xs font-semibold leading-5 text-slate-800">
                            {{ company.type }}
                          </span>
                        </td>
                        <td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
                          <a href="#">
                            <ActionButton :icon="true"
                                          buttonSize="small"
                                          iconName="EyeIcon"
                                          label="View"/>
                          </a>
                        </td>
                      </tr>
                      </tbody>
                    </table>
                    <nav
                      class="-mt-px px-4 border-t-2 bg-slate-50 border-bg-light flex items-center justify-between sm:px-4">
                      <div class="-mt-px w-0 flex-1 flex">
                        <a
                          class="border-t-2 border-transparent py-4 pr-1 inline-flex items-center text-sm font-medium text-secondary hover:text-secondary-hover hover:border-bg-light"
                          href="#">
                          <ArrowNarrowLeftIcon aria-hidden="true" class="mr-3 h-5 w-5 text-slate-400"/>
                          Previous
                        </a>
                      </div>
                      <div class="hidden md:-mt-px md:flex">
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          1 </a>
                        Current: "border-indigo-500 text-indigo-600", Default: "border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light"
                        <a aria-current="page"
                           class="border-primary text-primary-hover bg-slate-200 border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                           href="#"> 2 </a>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          3 </a>
                        <span
                          class="border-transparent text-secondary border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"> ... </span>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          8 </a>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          9 </a>
                        <a
                          class="border-transparent text-secondary hover:text-secondary-hover hover:border-bg-light border-t-2 py-4 px-4 inline-flex items-center text-sm font-medium"
                          href="#">
                          10 </a>
                      </div>
                      <div class="-mt-px w-0 flex-1 flex justify-end">
                        <a
                          class="border-t-2 border-transparent py-4 pl-1 inline-flex items-center text-sm font-medium text-secondary hover:text-secondary-hover hover:border-bg-light"
                          href="#">
                          Next
                          <ArrowNarrowRightIcon aria-hidden="true" class="ml-3 h-5 w-5 text-slate-400"/>
                        </a>
                      </div>
                    </nav>
                  </div>
                </div>
              </div>
            </div>
          </div> -->

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
              <span v-if="props.column.field == 'actions'">
                  <div class="flex lg:justify-center items-center">

                  <button v-if="!props.row.deleted" class="flex items-center btn btn-secondary  w-24 mr-1 mb-2" v-can="['edit-admin']"  @click="OpenNewAdminModal(props.row.id)">
                        <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                        <Icon :show="!isLoading" class="w-4 h-4 mr-1" name="CheckSquare"/>{{ $t('g.edit') }}
                  </button>

                  <button v-if="props.row.deleted" class="flex items-center btn btn-success text-white  w-24 mr-1 mb-2" v-can="['restore-admin']" @click="restoreAdmin(props.row.id , props.row.name)">
                        <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                        <Icon :show="!isLoading" class="w-4 h-4 mr-1" color="white" name="ArrowLeft"/>{{ $t('g.restore') }}
                  </button>
                  <button class="flex items-center btn btn-danger w-24 mr-1 mb-2"  v-can="['delete-admin']" @click="deleteAdmin(props.row.id , props.row.name)">
                        <LoadingIcon :show="isLoading" icon="three-dots" color="white" class="w-4 h-4 mr-2" />
                        <Icon :show="!isLoading" class="w-4 h-4 mr-1"  color="white"  name="Trash2"/>{{ $t('g.delete') }}
                  </button>

                  </div>
              </span>
              <span v-if="props.column.field == 'active'">
                <Switch v-model="props.row.active" :disabled="$h.checkBoolean(serverParams.deleted)" name="active" @change="statusChange(props.row.id)"/>
              </span>
            </template>

          </vue-good-table>
        </div>
      </div>
    </section>
</template>

<script>
// import TestimonialsCarousel from '@/Components/ConsolComponents/partials/TestimonialsCarousel.vue'
import {ArrowNarrowLeftIcon, ArrowNarrowRightIcon} from "@heroicons/vue/outline"
import Field from '@/Components/FormItems/Field.vue'
import ActionButton from '@/Components/FormItems/ActionButton.vue'
import Map from '@/Components/ConsolComponents/Map.vue'
import GreenSection from '@/Components/ConsolComponents/partials/GreenSection.vue'
import {Loading, Notify , Deleted} from '@/mixins'
import AdminController from '@@/Admin/Resources/assets/js/controllers/AdminController.js';


export default {
  mixins: [Notify, Loading , Deleted],
  components: {
      Field,
      ArrowNarrowLeftIcon,
      ArrowNarrowRightIcon,
      ActionButton,
      GreenSection,
      Map,
  },
  data() {
    return {
        form: {
        name: null,
        companyName: null,
        wsaId: null,
        phone: {},
        email: null,
        subject: null,
        message: null,
        country: null,
      },
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
          label: this.$t('forms.attributes.name'),
          field: "name",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,

        },
        {
          label: this.$t('forms.attributes.email'),
          field: "email",
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

        companies: [
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Cairo',
          state: '',
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Cairo',
          state: null,
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Cairo',
          state: 'Upper Egypt',
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
        {
          name: 'Lindsay Walton',
          country: {
            id: 1,
            name: 'Egypt',
            code: 'EG',
            flagUrl: 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fe/Flag_of_Egypt.svg/255px-Flag_of_Egypt.svg.png',
          },
          city: 'Alexandria',
          state: '',
          email: 'lindsay.walton@example.com',
          type: 'Member',
          wsaId: '14522',
          logo:
            'https://d1csarkz8obe9u.cloudfront.net/posterpreviews/business-logo-design-template-78655edda18bc1196ab28760f1535baa_screen.jpg?ts=161764532',
        },
      ],
        headerData: {
            title: 'Network Directory',
            des: 'Search for freight forwarders worldwide with WSA Consol',
        }
    };
  },
  methods: {
    //---- Get All Data List
    async getData(page = null) {
      this.StartLoading();
      if (page) {
        this.updateParams({ page:page});
      }
      let data = await AdminController.getData(this.serverParams);

      if(data){
          this.rows = data.data;
          this.totalRecords = data.meta.total;
      }
    },
    //---- Get Model By Id
    async getModel(id) {
      this.StartLoading();
      let data = await AdminController.getModel(id);
      if(data){
          this.admin = data;
      }
      this.StopLoading();
    },

    //---- Hendel Form Create and Edit
    OpenNewAdminModal(id = null) {
      this.resetForm();
      this.openModel();

      if (id == null) {
        this.editMode = false;
      } else {
        this.editMode = true;

        this.getModel(id)
      }
    },
    ChangeColumnsStatus(index){
        this.columns[index]['hidden'] = !this.columns[index]['hidden'];
    },
    //---- Open Model
    openModel() {
      this.ModelIsOpen = true;
    },
    //---- Close Model
    closeModel() {
      this.ModelIsOpen = false;
    },
    //---- Open FilterModel
    openFilterModel() {
      this.FilterModelIsOpen = true;
    },
    //---- Close FilterModel
    closeFilterModel() {
      this.FilterModelIsOpen = false;
    },
    //---- Reset Form
    resetForm() {
      this.v$.$reset();
      this.editMode = false;
      this.admin = {
        name: null,
        active: false,
      };
    },
    //---- Update Form Params
    updateParams(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
      this.updateRotueQuery();
    },
    //---- Change Status Handler
    async statusChange(id) {
      this.StartLoading();
      let response = await AdminController.ToggleActive(id);
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
      } else if (params[0].field == "category") {
        field = "category_id";
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
      console.log('serverParams');
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
        search:{},
      });
      this.onPageChange(1);
    },
    saveAddNew(){
      this.save(null ,true);
    },
    //---- Submit Form Handler
    async save(e , addNew = false) {
      this.StartLoading();
      console.log(this.v$);
      const result = await this.v$.$validate();
      if (!result) {
        this.$h.errorNotify();
        this.StopLoading();
        return false;
      }
      if (this.editMode) {
        let response = await AdminController.update(this.admin);
        if(response && response.status == 'success'){
          this.getData();
          $h.notify(this.$t('messages.success'), response.message);
          this.handelFinishRequest(addNew);
        }
      } else {
        let response = await AdminController.store(this.admin);
        if(response && response.status == 'success'){
          this.getData();
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
    //---- Delete Model Handler
    async deleteAdmin(id , name = "") {
      this.StartLoading();
      const answer = window.confirm(this.$t('messages.confirmations.delete' , {item: name}))
      if (!answer){ this.StopLoading();  return false}

      let response = await AdminController.delete(id);
      if(response && response.status == 'success'){
        this.getData();
        $h.notify(this.$t('messages.success'), response.message);
      }
      this.StopLoading();
    },
    //---- Restore Model Handler
    async restoreAdmin(id , name = "") {
      this.StartLoading();
      const answer = window.confirm(this.$t('messages.confirmations.restore' , {item: name}))
      if (!answer){ this.StopLoading();  return false}

      let response = await AdminController.restore(id);
      if(response && response.status == 'success'){
        this.getData();
        $h.notify(this.$t('messages.success'), response.message);
      }
      this.StopLoading();
    },

    onExport(type){
      this.axios.get(`export/${type}`, {
        params: {
          model : 'Admin',
          export : 'Export',
          repo : 'AdminRepository',
          resource : 'AdminResource',
          file_name : 'Admins',
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


    }
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
        console.log(JSON.parse(this.$route.query.search));
        this.updateParams({ search:JSON.parse(this.$route.query.search)});
      }
    }

    //---- Get All Data In Load Page
    this.getData();

  },

};

</script>
