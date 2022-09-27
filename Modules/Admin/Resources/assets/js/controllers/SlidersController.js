export default {
            getData(serverParams) {
              return axios.get('sliders', {
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

              return axios.get(`sliders/${id}`)
              .then(({data}) => {
                return data.data ;
              })
              .catch((error) => {
                // this.errorNotify(error.data.message);
                // throw error.data.message
              });


            },
            store(slider) {
              return axios.post('sliders', slider)
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
            update(slider) {
                return axios.put("sliders/" + slider.id, slider)
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
              return axios.delete(`sliders/${id}`)
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
              return axios.delete(`sliders/${id}/restore`)
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
              return axios.put(`sliders/${id}/active`)
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



        