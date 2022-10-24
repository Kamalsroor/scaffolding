<template>
  <div>
    <v-select v-model="modelValue" class="form-control" :id="id" :name="name" :disabled="disabled" :required="required" :options="options"></v-select>

  </div>
</template>

<script>
import vSelect from 'vue-select'
export default {
  name: 'Select2Commpont',
  components:{
    vSelect
  },
  data() {
    return {
      select2El: null
    };
  },
  emits: ['update:modelValue'],
  props: {
    modelValue: [String, Array], // previously was `value: String`
    id: {
      type: String,
      default: ''
    },
    name: {
      type: String,
      default: ''
    },
    placeholder: {
      type: String,
      default: ''
    },
    options: {
      type: Array,
      default: () => []
    },
    disabled: {
      type: Boolean,
      default: false
    },
    required: {
      type: Boolean,
      default: false
    },
    settings: {
      type: Object,
      default: () => {}
    },
  },
  watch: {
    options: {
      handler(val) {
        this.setOption(val);
      },
      deep: true
    },
    modelValue: {
      handler(val) {
        this.setValue(val);
      },
      deep: true
    },
  },
  methods: {
    setOption(val = []) {
      this.select2El.empty();
      this.select2El.select2({
        placeholder: this.placeholder,
        ...this.settings,
        data: val
      });
      this.setValue(this.modelValue);
    },
    setValue(val) {
      if (val instanceof Array) {
        this.select2El.val([...val]);
      } else {
        this.select2El.val([val]);
      }
      this.select2El.trigger('change');
    }
  },
  mounted() {
    // console.log(this.$el, $.fn.select2 , select2);
    //
    //   $.fn.select2.defaults.set('amdLanguageBase', 'select2/i18n/');
    //
    //
    //
    // this.select2El = $(this.$el)
    //   .find('select')
    //   .select2({
    //     placeholder: this.placeholder,
    //     ...this.settings,
    //     data: this.options
    //   })
    //   .on('select2:select select2:unselect', ev => {
    //     this.$emit('update:modelValue', this.select2El.val());
    //     this.$emit('select', ev['params']['data']);
    //   });
    // this.setValue(this.modelValue);
  },
  beforeUnmount() {
  }
};
</script>
