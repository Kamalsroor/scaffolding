<template>
  <div>
    <label v-if="label"
           :class="[(flexTitle ? 'order-1 ml-4' : '')]"
           :for="name"
           class="form-label">
      {{ label }}
      <template v-if="label">
        <span v-if="required" class="text-danger text-sm">*</span>
      </template>
    </label>
    <div class="relative flex items-stretch flex-grow focus-within:z-10">
     <TomSelectInline :options="{ ...plugins}" :id="name" v-model="value"
                         class="form-control w-full"
                         :inlineSelect="true"
                          :readonly="readonly"
                          :placeholder="placeholder"
                          :required="required"
                         :name="name"
                         :disabled="disabled"
                         :multiple="multiple"
                         :class="[(errors.length ? 'border-danger' : ''),(!searchable ? 'no-input' : ''), '']">

        <option v-for="item in selectData" :key="item[$attrs.labelValue]" :value="item[$attrs.keyValue]">
          <template v-if="$slots.option">
          	<slot name="option" :item="item"></slot>
          </template>
          <template v-else>
            {{ item[$attrs.labelValue] }}
          </template>
        </option>
      </TomSelectInline>

    </div>


    <template v-if="errors.length">
      <div v-for="(error, index) in errors"
           :key="index"
           class="text-danger mt-2">
        {{ error.$message }}
      </div>
    </template>
  </div>
</template>

<script>

export default {
  name: "InputField",
  props: {
    flexTitle: {
      type: Boolean,
      default: false,
    },
    label: {
      type: String,
      default: "",
    },
    name: {
      type: String,
      default: "",
    },
    placeholder: {
      type: String,
      default: "",
    },
    searchable: {
      type: Boolean,
      default: false,
    },
    readonly: {
      type: Boolean,
      default: false,
    },
    disabled: {
      type: Boolean,
      default: false,
    },
    multiple: {
      type: Boolean,
      default: false,
    },
    errors: {
      type: Array,
      default: [],
    },
    required: {
      type: Boolean,
      default: false,
    },
    validator: {
      type: Array,
      default: [],
    },
    modelValue: {
      type: Object,
      default: null,
    },
    selectData: {
      type: Array,
      default: [],
    },
  },

  data() {
    return {
      value: null,
    }
  },
  watch: {
    modelValue: function (value) {
      this.value = value;
    },

    value: {
      handler(value, oldVal) {
        this.$emit('update:modelValue', this.value);
      },
      deep: true
    },

  },
  computed: {
    plugins() {
      let ListOfPlugins = {};
      if (this.searchable) {
        ListOfPlugins.dropdown_input = {};
      }
      return {
        plugins: {
          ...ListOfPlugins
        }
      }
    },
  },
  created() {

    if(this.multiple){
      console.log('multiple');
      this.value = [];
    }
    this.value = this.modelValue;

  },
}
</script>
