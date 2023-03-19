export default {
  getData() {
    return axios.get('settings')
      .then(({data}) => {
        return data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });
  },
  getDataByPage(page) {

    return axios.get(`settings/${page}`)
    .then(({data}) => {
      return data ;
    })
    .catch((error) => {
      // this.errorNotify(error.data.message);
      // throw error.data.message
    });


  },

  update(form) {
      return axios.put("update/settings/" , form)
        .then(({data}) => {
          return {
            status: 'success',
            message: data.message,
          };
        })
        .catch((error) => {
          window.$h.errorNotify('error',error.data.message);
          return {
              status: 'error',
              message: error.data.message,
          };
          // throw error.data.message
        });
  },

}
