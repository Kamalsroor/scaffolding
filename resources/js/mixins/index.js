import { helper as $h } from "@/utils/helper";

const Notify = {
  created() {
    // this.foo();
  },
  methods: {
    errorNotify(message = null) {
      this.emitter.emit('notify', {
        type: 'error',
        title: 'Oops!',
        message: message ?? this.$t('messages.error'),
      });
    },
    successNotify(title = null, message = null) {
      console.log('successNotify' , title ,message);
      this.emitter.emit('notify', {
        type: 'success',
        title: title,
        message: message,
        action: 'close'
      });
    },
  }
}

const Loading = {
  data() {
    return {
      isLoading: true,
    }
  },
  methods: {
    StartLoading() {
      this.emitter.emit('start-loading');
      this.$progress.start();
      this.isLoading = true;
    },
    StopLoading() {
      this.emitter.emit('stop-loading');
      this.$progress.finish();
      this.isLoading = false;
    },
  }
}

const Deleted = {
  watch: {
    '$route.query.deleted': {
      handler(value, oldVal) {
        if($h.checkBoolean(value) !== $h.checkBoolean(this.serverParams?.deleted)){

          this.ToggleDeletedData(false  ,value);

        }
      },
      deep: true
    },
  },
  methods: {
    updateParamsWithoutRotueQuery(newProps) {
      this.serverParams = Object.assign({}, this.serverParams, newProps);
    },
    updateRotueQuery(query = {}){
      let q = {
        columnFilters: JSON.stringify(this.serverParams.columnFilters),
        sort: JSON.stringify(this.serverParams.sort),
        page: this.serverParams.page,
        length: this.serverParams.length,
        deleted: $h.checkBoolean(this.serverParams.deleted),
      }

      this.ToggleDeletedAt(q.deleted)
      this.$router.replace({name: this.$route.name, query: q})
    },
    ToggleDeletedData(q = true , value = null) {

      if(q){
        this.updateParams({deleted: !$h.checkBoolean(this.serverParams?.deleted) , page : 1});
      }else{
        this.updateParamsWithoutRotueQuery({deleted: $h.checkBoolean(value) , page : 1});
      }
      if(value != null){
        this.ToggleDeletedAt(value);
        this.getData();
      }
    },
    ToggleDeletedAt(value){
      let deleted_at = this.columns.find(item => item.field === 'deleted_at');
      if($h.checkBoolean(value)){
        if(deleted_at){
          deleted_at.hidden = false ;
        }
      }else{
        if(deleted_at){
          deleted_at.hidden = true ;
        }
      }
    },
  }
}

export {Notify, Loading , Deleted};