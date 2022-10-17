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
            <Select2 v-model="value" :options="['test1','test2']"   />

        <!-- <Select2 :id="name" v-model="value" :options="selectData"  
                     :readonly="readonly"
                :placeholder="placeholder"
                :required="required"
                :name="name"
                :disabled="disabled"
                :multiple="multiple"
                :settings="{ placeholder: 'Specifies the placeholder through settings', width: '50%' }" @change="ajaxChangeEvent($event)" @select="ajaxSelectEvent($event)" /> -->

<!-- 
     <Select2    :id="name" v-model="value"
                class="form-control w-full "
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
      </select> -->

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
        console.log("🚀 ~ file: Select.vue ~ line 113 ~ created ~ value", value);

      this.value = value;
    },

    value: {
      handler(value, oldVal) {
        console.log("🚀 ~ file: Select.vue ~ line 120 ~ created ~ value", value);

        this.$emit('update:modelValue', this.value);
      },
      deep: true
    },

  },
  methods: {
     myChangeEvent(val) {
      console.log(val);
      // alert(val);
    },
    mySelectEvent({ id, text, selected }) {
      alert(`id: ${id}, text: ${text}, selected: ${selected}`);
      console.log({ id, text, selected });
    },
    changeOptions() {
      this.myOptions = this.myOptions.join(',') === options1.join(',') ? options2 : options1;
      console.log(this.myOptions);
    },
    changeValue() {
      this.optionSelected = this.inputVal;
      this.optionsSelected = [this.inputVal];
    },
    ajaxChangeEvent(val) {
      console.log('ajaxChangeEvent', val);
      // alert(val);
    },
    ajaxSelectEvent({ id, text, selected }) {
      console.log('ajaxChangeEvent', { id, text, selected });
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

    console.log("🚀 ~ file: Select.vue ~ line 148 ~ created ~ this.modelValue", this.modelValue);
    this.value = this.modelValue;

  },
}
</script>
