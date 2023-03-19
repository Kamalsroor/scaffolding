export default {
  getData(serverParams) {
    return axios.get('subscription', {
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

    return axios.get(`subscription/${id}`)
    .then(({data}) => {
      return data.data ;
    })
    .catch((error) => {
      // this.errorNotify(error.data.message);
    //   throw error.data.message
    });


  },
  store(subscribe) {
    return axios.post('subscription', sponser)
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
    return axios.put(`subscription/${sponser.id}`, sponser)
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
    return axios.delete(`subscription/${id}`)
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
    return axios.delete(`subscription/${id}/restore`)
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
    return axios.put(`subscription/${id}/active`)
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
