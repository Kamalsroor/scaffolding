export default {
  getData(serverParams) {
    return axios.get('services', {
      params: serverParams
    })
      .then(({data}) => {
        return data ;
      })
      .catch((error) => {
        // $h.errorNotify(error.data.message);
        // throw error.data.message
      });
  },
  getModel(id) {

    return axios.get(`services/${id}`)
    .then(({data}) => {
      return data.data ;
    })
    .catch((error) => {
      // $h.errorNotify(error.data.message);
      // throw error.data.message
    });


  },
  store(service) {
    return axios.post('services', service)
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
  update(service) {
    return axios.put(`services/${service.id}`, service)
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
  delete(id) {
    // this.StartLoading();
    return axios.delete(`services/${id}`)
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
    return axios.delete(`services/${id}/restore`)
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
    return axios.put(`services/${id}/active`)
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
