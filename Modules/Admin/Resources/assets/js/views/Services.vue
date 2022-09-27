<template>

  <div class="intro-y flex flex-col sm:flex-row items-center mt-8">
    <h2 class="text-lg font-medium mr-auto">{{ !$h.checkBoolean(serverParams.deleted) ?   $t('g.list', {model: $t('admins.plural')})  : $t('g.deleted', {model: $t('admins.plural')}) }}</h2>
    <div class="w-full sm:w-auto flex mt-4 sm:mt-0">
      <a class="btn btn-primary shadow-md mr-2" v-can="['create-admin']" @click="OpenNewAdminModal()">
        <PlusIcon class="mr-2 w-5 h-5"/>
        {{ $t('g.create') }}
      </a>
      <a v-can="['restore-admin','force-delete-admin']" v-if="$h.checkBoolean(serverParams.deleted)" class="btn btn-primary shadow-md mr-2" @click="ToggleDeletedData(true,false)">
        <ListIcon class="mr-2 w-5 h-5"/>
        {{ $t('g.list', {model: $t('admins.plural')}) }}
      </a>
      <a v-can="['restore-admin','force-delete-admin']" v-if="!$h.checkBoolean(serverParams.deleted)" class="btn btn-primary shadow-md mr-2" @click="ToggleDeletedData(true,true)">
        <Trash2Icon class="mr-2 w-5 h-5"/>
        {{ $t('g.deleted', {model: $t('admins.plural')}) }}
      </a>
      <!-- BEGIN: Modal Content -->
      <Modal v-can="['create-admin','edit-admin']" :show="ModelIsOpen" size="modal-xl" @hidden="closeModel()">
        <form class="validate-form" @submit.prevent="save">
          <ModalHeader>
            <h2 class="font-medium text-base mr-auto">
              {{
                editMode ? $t('g.edit_row', {model: $t('admins.plural')}) : $t('g.add_new', {model: $t('admins.plural')})
              }}
            </h2>
          </ModalHeader>
          <ModalBody class="grid grid-cols-12 gap-8 gap-y-4">
            <InputField v-model="admin.name" :errors="v$.admin.name.$errors" class="col-span-12 sm:col-span-4"
                        :label="$t('forms.attributes.name')" name="name" :placeholder="$t('forms.attributes.name')"/>
            <InputField v-model="admin.order_id" type="number" :errors="v$.admin.order_id.$errors" class="col-span-12 sm:col-span-4"
                        :label="$t('forms.attributes.order_id')" name="order_id" :placeholder="$t('forms.attributes.order_id')"/>
            <Switch v-model="admin.active" :errors="v$.admin.name.$errors" class="col-span-12 sm:col-span-4"
                    des="Activate to show in frontend website" :label="$t('forms.attributes.active')" name="active-input"/>

          </ModalBody>
          <ModalFooter class="space-x-2">
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



          </ModalFooter>
        </form>
      </Modal>
      <!-- END: Modal Content -->
    </div>
  </div>
  <!-- BEGIN: HTML Table Data -->
  <div class="intro-y box p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
      <form id="tabulator-html-filter-form" @submit="onFilter"  class="xl:flex sm:mr-auto">
        <div class="sm:flex items-center sm:mr-4">
          <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.field') }}</label>
          <select id="tabulator-html-filter-field" v-model="serverParams.columnFilters.field"
                  class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
            <option value="name">{{ $t('forms.attributes.name') }}</option>
            <option value="active">{{ $t('forms.attributes.active') }}</option>
          </select>
        </div>
        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
          <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.type') }}</label>
          <select id="tabulator-html-filter-type" v-model="serverParams.columnFilters.type"
                  class="form-select w-full mt-2 sm:mt-0 sm:w-auto">
              <option selected value="like">{{ $t('filter.like') }}</option>
              <option value="=">=</option>
              <option value="<">&lt;</option>
              <option value="<=">&lt;=</option>
              <option value=">">></option>
              <option value=">=">>=</option>
              <option value="!=">!=</option>
          </select>
        </div>
        <div class="sm:flex items-center sm:mr-4 mt-2 xl:mt-0">
          <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.value') }}</label>
          <input id="tabulator-html-filter-value" v-model="serverParams.columnFilters.value"
                 class="form-control sm:w-40 2xl:w-full mt-2 sm:mt-0"
                 placeholder="Search..." type="text"/>
        </div>
        <div class="mt-2 xl:mt-0">
          <button id="tabulator-html-filter-go" class="btn btn-primary w-full sm:w-16" type="submit" @click="onFilter">
            {{ $t('filter.go') }}
          </button>
          <button id="tabulator-html-filter-reset" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1"
                  type="button" @click="onResetFilter">
            {{ $t('filter.reset') }}
          </button>
        </div>
      </form>
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
  <!-- END: HTML Table Data -->
</template>

<script>
import useVuelidate from '@vuelidate/core'
import {required , minValue , numeric} from '@vuelidate/validators'
import {Loading, Notify , Deleted} from '@/mixins'
import AdminController from '@@/Admin/Resources/assets/js/controllers/AdminController.js';
import FileSaver from 'file-saver'

export default {
  setup: () => ({v$: useVuelidate()}),
  mixins: [Notify, Loading , Deleted],
  validations() {
    return {
      admin: {
        name: {required},
        active: {required},
        order_id: {required , numeric , minValue: minValue(1)},
      }
    }
  },
  data() {
    return {
      admin: { // Model
        name: null,
        active: false,
        order_id: 0,
      },
      editMode: false, // Edit Mode Status
      ModelIsOpen: false, // Model Show Status
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
          label: this.$t('forms.attributes.slug'),
          field: "slug",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,
        },
        {
          label: this.$t('forms.attributes.order_id'),
          field: "order_id",
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
          html: true,
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
        sort: {
          field: '', // Filed Sorting
          type: "desc" // Sort Type
        },
        page: 1, // Page Number
        length: 10, // Data Length
        deleted: false, // Show Deleted Item
      },
      last_order_id: 0,
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
      let data = await AdminController.getData(this.serverParams);

      if(data){
          this.rows = data.data;
          this.totalRecords = data.meta.total;
          this.last_order_id = data.meta.last_order_id + 1;
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
      if (id == null) {
        this.editMode = false;
      } else {
        this.editMode = true;
        this.getModel(id)
      }
      this.openModel();
    },
    //---- Open Model
    openModel() {
      this.ModelIsOpen = true;
    },
    //---- Close Model
    closeModel() {
      this.ModelIsOpen = false;
    },
    //---- Reset Form
    resetForm() {
      this.v$.$reset();
      this.editMode = false;
      this.admin = {
        name: null,
        active: false,
        order_id: this.last_order_id,
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
        this.successNotify(this.$t('messages.success'), response.message);
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
      this.onPageChange(1);
    },
    //---- Event To Reset Filter
    onResetFilter() {
      this.updateParams({
        columnFilters: {
          type: null,
          field: null,
          value: null,
        }
      });
      this.onPageChange(1);
    },
    saveAddNew(){
      this.save(null ,true);
    },
    //---- Submit Form Handler
    async save(e , addNew = false) {
      this.StartLoading();
      const result = await this.v$.$validate();

      if (!result) {
        this.errorNotify();
        this.StopLoading();
        return false;
      }
      if (this.editMode) {
        let response = await AdminController.update(this.admin);
        if(response && response.status == 'success'){
          this.getData();
          this.successNotify(this.$t('messages.success'), response.message);

        }
      } else {
        let response = await AdminController.store(this.admin);
        if(response && response.status == 'success'){
          this.getData();
          this.successNotify(this.$t('messages.success'), response.message);
        }
      }

      if(!addNew){ // if not click add new
        this.closeModel();
      }else{
        this.resetForm();
      }

      this.StopLoading();
    },
    //---- Delete Model Handler
    async deleteAdmin(id , name = "") {
      this.StartLoading();
      const answer = window.confirm(this.$t('messages.confirmations.delete' , {item: name}))
      if (!answer){ this.StopLoading();  return false}

      let response = await AdminController.delete(id);
      if(response && response.status == 'success'){
        this.getData();
        this.successNotify(this.$t('messages.success'), response.message);
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
        this.successNotify(this.$t('messages.success'), response.message);
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
        // this.errorNotify(error.data.message);
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
    }
    //---- Get All Data In Load Page
    this.getData();
  },

};

</script>
