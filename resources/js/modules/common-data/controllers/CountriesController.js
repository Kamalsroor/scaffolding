export default {
            getData(serverParams) {
              return axios.get('countries', {
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

              return axios.get(`countries/${id}`)
              .then(({data}) => {
                return data.data ;
              })
              .catch((error) => {
                // this.errorNotify(error.data.message);
                // throw error.data.message
              });


            },
            store(country) {
              return axios.post('countries', country)
                .then(({data}) => {
                  return {
                    status: 'success',
                    message: data.message,
                  };
                })
                .catch((error) => {
                  return {
                    status: 'error',
                    message: error.data.message,
                  };
                  // throw error.data.message
                });
            },
            update(country) {
                return axios.put("countries/" + country.id, country)
                  .then(({data}) => {
                    return {
                      status: 'success',
                      message: data.message,
                    };
                  })
                  .catch((error) => {
                    return {
                      status: 'error',
                      message: error.data.message,
                    };
                    // throw error.data.message
                  });
            },
            delete(id) {
              // this.StartLoading();
              return axios.delete(`countries/${id}`)
                .then(({data}) => {
                  return {
                    status: 'success',
                    message: data.message,
                  };
                })
                .catch((error) => {
                  return {
                    status: 'error',
                    message: error.data.message,
                  };
                  // throw error.data.message
                });
            },
            restore(id) {
              return axios.delete(`countries/${id}/restore`)
                .then(({data}) => {
                  return {
                    status: 'success',
                    message: data.message,
                  };
                })
                .catch((error) => {
                  return {
                    status: 'error',
                    message: error.data.message,
                  };
                  // throw error.data.message
                });
            },

            ToggleActive(id) {
              return axios.put(`countries/${id}/active`)
                .then(({data}) => {
                  return {
                    status: 'success',
                    message: data.message,
                  };
                })
                .catch((error) => {
                  return {
                    status: 'error',
                    message: error.data.message,
                  };
                  // throw error.data.message
                });
            },
          }



