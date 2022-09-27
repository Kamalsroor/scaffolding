export default {
            getData(serverParams) {
              return axios.get('certificates', {
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

              return axios.get(`certificates/${id}`)
              .then(({data}) => {
                return data.data ;
              })
              .catch((error) => {
                // this.errorNotify(error.data.message);
                // throw error.data.message
              });


            },
            store(certificate) {
              return axios.post('certificates', certificate)
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
            update(certificate) {
                return axios.put("certificates/" + certificate.id, certificate)
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
              return axios.delete(`certificates/${id}`)
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
              return axios.delete(`certificates/${id}/restore`)
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
              return axios.put(`certificates/${id}/active`)
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



        