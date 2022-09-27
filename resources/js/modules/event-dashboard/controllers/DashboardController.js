export default {

  getOverview() {

      return axios.get(`dashboard/overview-data`)
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
  getRecentOrders(withRelation) {

      return axios.get(`dashboard/recent-orders`,{
        params: { with : withRelation}
      })
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
    getPaymentsPerMonthReport(member_type) {

      return axios.get(`dashboard/payments-chart-pet-month`, {
        params: {
          member_type :member_type,
        }
      })
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
    getOrdersPerMonthReport() {

      return axios.get(`dashboard/orders-chart-pet-month`)
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
    getTopCountries() {

      return axios.get(`dashboard/top-countries`)
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
    getTopBrowsers() {

      return axios.get(`dashboard/top-browsers`)
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
    getOrdersReport() {

      return axios.get(`dashboard/orders-report`)
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },
    getTraffics() {

      return axios.get(`dashboard/traffics`)
      .then(({data}) => {
        return data.data ;
      })
      .catch((error) => {
        // this.errorNotify(error.data.message);
        // throw error.data.message
      });


    },

  }



