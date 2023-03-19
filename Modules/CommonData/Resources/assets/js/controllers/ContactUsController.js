export default {
  getData(serverParams) {
    return axios.get('contact_us', {
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

    return axios.get(`contact_us/${id}`)
    .then(({data}) => {
      return data.data ;
    })
    .catch((error) => {
      // this.errorNotify(error.data.message);
    //   throw error.data.message
    });


  },
  store(subscribe) {
    return axios.post('contact_us', sponser)
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
  update(sponser) {
    return axios.put(`contact_us/${sponser.id}`, sponser)
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
    return axios.delete(`contact_us/${id}`)
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
    return axios.delete(`contact_us/${id}/restore`)
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
    return axios.put(`contact_us/${id}/active`)
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
