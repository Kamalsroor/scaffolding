import axios from "axios";

export default {
  namespaced: true,
  state:{
    isLoding:true,
    permissions:null
  },
  getters:{
    isLoding(state){
          return state.isLoding
      },
      permissions(state){
          return state.permissions
      }
  },
  mutations:{
      SET_ISLODING (state, value) {
          state.isLoding = value
      },
      SET_PERMISSIONS (state, value) {
          state.permissions = value
      }
  },
  actions:{
    refreshPermissions({commit}){
          return axios.get('me/permissions').then(({data})=>{
              commit('SET_PERMISSIONS',data.data)
              commit('SET_ISLODING',false)
          }).catch(({response:{data}})=>{
              commit('SET_PERMISSIONS',null)
              commit('SET_ISLODING',false)
          })
      },

  }


}

