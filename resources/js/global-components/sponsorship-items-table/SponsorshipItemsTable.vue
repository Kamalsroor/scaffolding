<template>
  <div class="intro-y p-5 mt-5">
    <div class="flex flex-col sm:flex-row sm:items-end xl:items-start">
      <form id="tabulator-html-filter-form" class="xl:flex sm:mr-auto">
        <div class="sm:flex items-center sm:mr-4">
          <label class="w-12 flex-none xl:w-auto xl:flex-initial mr-2">{{ $t('filter.field') }}</label>
          <select id="tabulator-html-filter-field" v-model="serverParams.columnFilters.field"
                  class="form-select w-full sm:w-32 2xl:w-full mt-2 sm:mt-0 sm:w-auto">
            <option value="name">Name</option>
            <option value="category">Category</option>
            <option value="remaining_stock">Remaining Stock</option>
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
          <button id="tabulator-html-filter-go" class="btn btn-primary w-full sm:w-16" type="button" @click="onFilter">
            {{ $t('filter.go') }}
          </button>
          <button id="tabulator-html-filter-reset" class="btn btn-secondary w-full sm:w-16 mt-2 sm:mt-0 sm:ml-1"
                  type="button" @click="onResetFilter">
            {{ $t('filter.reset') }}
          </button>
        </div>
      </form>
    </div>
    <div class="overflow-x-auto scrollbar-hidden">
      <vue-good-table
        v-model:isLoading.sync="isLoading"
        :columns="columns"
        :fixed-header="true"
        :pagination-options="{
          enabled: true,
          mode: 'pages',
          nextLabel: 'Next Page',
          prevLabel: 'Prev. Page',
          pageLabel: 'Page',
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
        v-on:column-filter="onColumnFilter"
        v-on:per-page-change="onPerPageChange"
      >

        <template #table-row="props">
          <span v-if="props.column.field == 'actions'">
              <div class="flex lg:justify-center items-center">
                <a class="flex items-center text-success" href="javascript:;" @click="SelectCompany(props.row.id)">
                  <ArrowRightIcon class="w-4 h-4 mr-1"/>
                  {{ $t('g.select') }}
                </a>
              </div>
          </span>
          <span v-if="props.column.field == 'active'">
            <Switch v-model="props.row.active" name="active" @change="statusChange(props.row.id)"/>
          </span>
        </template>

      </vue-good-table>
    </div>
  </div>
</template>

<script>
import {Loading, Notify} from '../../mixins'
import useVuelidate from "@vuelidate/core";
import {required} from "@vuelidate/validators";

export default {
  name: "SponsorshipItems",
  setup: () => ({v$: useVuelidate()}),
  emits: ['onSelectCompany'],
  mixins: [Notify, Loading],
  validations() {
    return {
      order: {
        name: {required},
        active: {required},
      }
    }
  },

  data() {
    return {
      order: {
        name: null,
        active: false,
      },
      ModelIsOpen: false,
      filter: {
        field: "name",
        type: "like",
        value: "",
      },
      columns: [
        {
          label: this.$t("companies.id"),
          field: "id",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,
        },

        {
          label: this.$t("companies.name"),
          field: "name",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,
        },
        {
          label: this.$t("companies.member_type"),
          field: "member_type_name",
          tdClass: "text-left",
          thClass: "text-left",
          sortable: true,
        },
        {
          label: "Action",
          field: "actions",
          html: true,
          tdClass: "text-right",
          thClass: "text-right",
          sortable: false
        }
      ],
      totalRecords: 0,
      rows: [],
      serverParams: {
        columnFilters: {},
        sort: {
          field: '',
          type: "desc"
        },
        page: 1,
        length: 10
      },
      search: "",
      totalRows: "",
      limit: "10",
      Filter_port: "",
      Filter_code: "",
      Filter_name: "",
      Filter_category: "",
    };
  },
  methods: {
    OpenNewCertificateModal(id) {
      this.resetForm();
      if (id == null) {
        this.editMode = false;
      } else {
        this.editMode = true;
        this.getModel(id)
      }
      this.openModel();
    },
    openModel() {
      this.ModelIsOpen = true;
    },
    closeModel() {
      this.ModelIsOpen = false;
    },
    resetForm() {
      this.v$.$reset();
      this.order = {
        name: null,
        active: false,
      };
    },
    updateParams(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
    },
    statusChange(id) {
      this.StartLoading();
      this.axios.put('orders/' + id + '/active')
        .then(({data}) => {
          $h.notify(this.$t('messages.success'), data.message);
          this.StopLoading();
        })
        .catch((error) => {
          $h.errorNotify();
          this.getData();
        });
    },
    getData(page = null) {
      if (page) {
        this.serverParams.page = page;
      }
      this.axios.get('companies', {
        params: this.serverParams
      })
        .then(({data}) => {
          this.rows = data.data;
          this.totalRecords = data.meta.total;

        })
        .catch((error) => {
          $h.errorNotify(error.response.data.message);
        });
    },
    getModel(id) {

      this.axios.get(`orders/${id}`)
        .then(({data}) => {
          this.order = data.data;
        })
        .catch((error) => {
          $h.errorNotify(error.response.data.message);
        });
    },
    //---- Event Page Change
    onPageChange({currentPage}) {
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


    onColumnFilter(params) {
      this.updateParams(params);
      this.getData();
    },

    //---- Event Select Rows
    selectionChanged({selectedRows}) {
      this.selectedIds = [];
      selectedRows.forEach((row, index) => {
        this.selectedIds.push(row.id);
      });
    },

    //---- Event Sort Change
    onSortChange(params) {
      console.log(params);
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


    onFilter() {
      this.onPageChange(1);
    },
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
    async save() {
      const result = await this.v$.$validate();
      if (!result) {
        $h.errorNotify();
        return false;
      }

      if (this.editMode) {
        this.update();
      } else {
        this.store();
      }

    },
    SelectCompany(id) {
      this.$emit('onSelectCompany', id);
    },
    store() {
      this.StartLoading();
      this.axios.post('orders', this.order)
        .then(({data}) => {
          $h.notify(this.$t('messages.success'), data.message);
          this.getData();
          this.StopLoading();
          this.closeModel()
        })
        .catch((error) => {
          $h.errorNotify();
          this.StopLoading();
        });
    },
    update() {
      this.StartLoading();
      this.axios.put(`orders/${this.order.id}`, this.order)
        .then(({data}) => {
          $h.notify(this.$t('messages.success'), data.message);
          this.getData();
          this.StopLoading();
          this.closeModel()
        })
        .catch((error) => {
          $h.errorNotify();
          this.StopLoading();
        });
    }

  },
  created() {
    this.getData();
  },
}
</script>
