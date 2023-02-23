<template>
  <div class="col-span-12 xl:col-span-4">
    <label class="form-label">{{ $t('delegates.avatar') }}</label>
    <Dropzone class="dropzone"
              ref-key="dropzoneSingleRef"
              :options="{
                url: 'https://httpbin.org/post',
                thumbnailWidth: 150,
                acceptedFiles: 'image/jpeg|image/png|image/jpg',
                maxFilesize: 0.5,
                maxFiles: 1,
                headers: { 'My-Awesome-Header': 'header value' },
              }">
      <div class="text-base font-medium">
        {{ $t('forms.fileUploader.dragAndDropMsg') }}
      </div>
      <div class="text-gray-600 text-xs">
        <p>{{ $t('forms.fileUploader.acceptedFilesMsg') }}</p>
        <p>{{ $t('forms.fileUploader.maxFilesizeMsg') }}</p>
      </div>
    </Dropzone>
  </div>
  <div class="col-span-12 xl:col-span-8 grid grid-cols-12 gap-4 gap-y-3">
    <!--    <InputField class="col-span-12 sm:col-span-3"-->
    <!--                :selectData="[{id : 'mr', name: 'Mr'},{id : 'mrs', name: 'Mrs'},{id : 'ms', name: 'Ms'},]"-->
    <!--                labelValue="name"-->
    <!--                keyValue="id"-->
    <!--                placeholder="Title"-->
    <!--                :searchable="false"-->
    <!--                type="select"-->
    <!--                :label="$t('delegates.title')"-->
    <!--                name="name"-->
    <!--                :placeholder="$t('forms.attributes.name')"/>-->
    <InputField class="col-span-12 md:col-span-12"
                type="text"
                :selectData="[{id : 'mr', title: 'Mr'},{id : 'mrs', title: 'Mrs'},{id : 'ms', title: 'Ms'},]"
                labelValue="title"
                keyValue="id"
                :hasSelect="true"
                :selectPlaceholder="$t('delegates.title')"
                :searchable="false"
                :label="$t('delegates.name')"
                name="delegate-name"
                :placeholder="$t('delegates.name')"
    />
    <InputField class="col-span-12 md:col-span-6"
                type="text"
                :icon="true"
                iconName="BriefcaseIcon"
                :label="$t('delegates.jobTitle')"
                name="delegate-job-title"
                :placeholder="$t('delegates.jobTitle')"
    />
    <InputField class="col-span-12 md:col-span-6"
                type="email"
                :label="$t('delegates.email')"
                name="delegate-email"
                :placeholder="$t('delegates.email')"
    />
  </div>
</template>

<script>
import {Loading, Notify} from '../../mixins'
import useVuelidate from "@vuelidate/core";
import {required} from "@vuelidate/validators";
import Field from "../../../Components/FormItems/Field";

export default {
  name: "AddDelegateForm",
  components: {Field},
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
    // OpenNewCertificateModal(id) {
    //   this.resetForm();
    //   if (id == null) {
    //     this.editMode = false;
    //   } else {
    //     this.editMode = true;
    //     this.getModel(id)
    //   }
    //   this.openModel();
    // },
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
