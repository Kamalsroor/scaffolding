export default {
  getData() {
    return axios.get('permissions')
      .then(({data}) => {
        return data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });
  },

}
