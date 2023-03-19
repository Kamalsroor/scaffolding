import axios from "axios";

export default {
  namespaced: true,
  state:{
    isLoding:true,
      settings:null
  },
  getters:{
    isLoding(state){
          return state.isLoding
      },
      settings(state){
          return state.settings
      }
  },
  mutations:{
      SET_ISLODING (state, value) {
          state.isLoding = value
      },
      SET_SETTINGS (state, value) {
        // console.log('SET_SETTINGS');
          state.settings = value
      }
  },
  actions:{
    refreshSettings({commit}){
          return axios.get('v1/settings').then(({data})=>{
              commit('SET_SETTINGS',data.data)
              commit('SET_ISLODING',false)
          }).catch(({response:{data}})=>{
              commit('SET_SETTINGS',null)
              commit('SET_ISLODING',true)
          })
      },

  }


}

