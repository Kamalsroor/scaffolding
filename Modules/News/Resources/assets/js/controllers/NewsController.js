export default {
  getData(serverParams) {
    return axios.get('news', {
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

    return axios.get(`news/${id}`)
    .then(({data}) => {
      return data.data ;
    })
    .catch((error) => {
      // this.errorNotify(error.data.message);
    //   throw error.data.message
    });


  },
  store(news) {
    return axios.post('news', news)
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
  update(news) {
    return axios.put(`news/${news.id}`, news)
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
    return axios.delete(`news/${id}`)
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
    return axios.delete(`news/${id}/restore`)
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
    return axios.put(`news/${id}/active`)
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
