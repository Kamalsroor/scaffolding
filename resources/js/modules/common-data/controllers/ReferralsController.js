export default {
            getData(serverParams) {
              return axios.get('referrals', {
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

              return axios.get(`referrals/${id}`)
              .then(({data}) => {
                return data.data ;
              })
              .catch((error) => {
                // $h.errorNotify(error.data.message);
                // throw error.data.message
              });


            },
            store(referral) {
              return axios.post('referrals', referral)
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
            update(referral) {
                return axios.put("referrals/" + referral.id, referral)
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
              return axios.delete(`referrals/${id}`)
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
              return axios.delete(`referrals/${id}/restore`)
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
              return axios.put(`referrals/${id}/active`)
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



