export default {
  getData(serverParams) {
    return axios.get('settings', {
      params: serverParams
    })
      .then(({data}) => {
        return data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });
  },
  getModel(id) {

    return axios.get(`settings/${id}`)
    .then(({data}) => {
      return data.data ;
    })
    .catch((error) => {
      // this.errorNotify(error.data.message);
    //   throw error.data.message
    });


  },
  store(setting) {
    return axios.post('settings', setting)
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
  update(setting) {
    return axios.put(`settings/${setting.id}`, setting)
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
  delete(id) {
    // this.StartLoading();
    return axios.delete(`settings/${id}`)
      .then(({data}) => {
        return {
          status: 'success',
          message: data.message,
        };
      })
      .catch((error) => {
        // throw error.data.message
      });
  },
  restore(id) {
    return axios.delete(`settings/${id}/restore`)
      .then(({data}) => {
        return {
          status: 'success',
          message: data.message,
        };
      })
      .catch((error) => {
        // throw error.data.message
      });
  },

  ToggleActive(id) {
    return axios.put(`settings/${id}/active`)
      .then(({data}) => {
        return {
          status: 'success',
          message: data.message,
        };
      })
      .catch((error) => {
        // throw error.data.message
      });
  },
}
