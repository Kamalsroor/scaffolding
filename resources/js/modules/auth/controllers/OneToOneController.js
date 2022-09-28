export default {
  getOneToOneList(serverParams) {
    return axios.get('reports/one-to-one', {
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
  getOneToOneSessionWithTable(id) {
    return axios.get(`reports/get/one-to-one-session/${id}`)
      .then(({data}) => {
        return data ;
      })
      .catch((error) => {
        // $h.errorNotify(error.data.message);
        // throw error.data.message
      });
  },
  getDelgatesHasLogin(serverParams) {
    return axios.get('reports/get-delgates-has-login', {
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
  getDietaryReport(serverParams) {
    return axios.get('reports/dietary-report', {
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

}



