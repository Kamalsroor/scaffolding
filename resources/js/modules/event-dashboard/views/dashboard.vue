<template>
  <div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 ">

      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <div class="col-span-12 mt-6" >
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5 flex items-center">
              <StarIcon class="h-5 w-5 mr-2" />
              Overview
            </h2>
          </div>
          <div class="intro-y report-box mt-12 sm:mt-4 min-h-[100px]" >
          <loading :active="overview_loading"
            :is-full-page="false" loader="dots" transition="bounce"></loading>

            <div v-if="!overview_loading" class="box py-0 xl:py-5 grid grid-cols-12 gap-0 divide-y xl:divide-y-0 divide-x divide-dashed divide-slate-200 dark:divide-white/5">
              <div class="report-box__item py-5 xl:py-0 px-5 sm:!border-t-0 col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box__content">
                  <div class="flex items-center">
                    <div
                      class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                      <BriefcaseIcon />
                    </div>
                    <div class="ml-auto">
                      <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                             content="Click to view all Tags">
                       <router-link :to="{ name: 'tags' }">
                        View All Tags
                      </router-link>
                      </Tippy>
                    </div>
                  </div>
                  <div class="text-slate-500 mt-6">Total Tags</div>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalTags }}</div>
                </div>
              </div>
              <div class="report-box__item py-5 xl:py-0 px-5 sm:!border-t-0 col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box__content">
                  <div class="flex items-center">
                    <div
                      class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                      <BriefcaseIcon />
                    </div>
                    <div class="ml-auto">
                      <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                             content="Click to view all Sponsers">
                        <router-link :to="{ name: 'sponsers' }">
                          View All Sponsers
                        </router-link>
                      </Tippy>
                    </div>
                  </div>
                  <div class="text-slate-500 mt-6">Total Sponsers</div>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalSponsers }}</div>
                </div>
              </div>
              <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box__content">
                  <div class="flex items-center">
                    <div
                      class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                      <UsersIcon />
                    </div>
                    <div class="ml-auto">
                      <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                        content="Click to View All Products">
                        <router-link :to="{ name: 'products' }">
                          View All Products
                        </router-link>
                      </Tippy>
                    </div>
                  </div>
                  <Tippy tag="div"
                         class="mt-6 text-slate-500"
                         content="WSA Financial Protection Program  is Not Active. Upgrade to to guarantee your deals is secured">
                    Total Products
                  </Tippy>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalProducts }}</div>
                </div>
              </div>
              <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box__content">
                  <div class="flex items-center">
                    <div
                      class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                      <BookmarkIcon />
                    </div>
                    <div class="ml-auto">
                      <Tippy href="#" tag="a" class="report-box__item__indicator text-success cursor-pointer"
                             content="CLick to View All News">
                        <router-link :to="{ name: 'news' }">
                          View All News
                        </router-link>
                      </Tippy>
                    </div>
                  </div>
                  <div class="text-slate-500 mt-6">Total News</div>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalNews }}</div>
                </div>
              </div>

            </div>

          </div>

          <div class="intro-y report-box mt-12 sm:mt-4 min-h-[100px]" >
            <loading :active="overview_loading"
              :is-full-page="false" loader="dots" transition="bounce"></loading>

              <div v-if="!overview_loading" class="box py-0 xl:py-5 grid grid-cols-12 gap-0 divide-y xl:divide-y-0 divide-x divide-dashed divide-slate-200 dark:divide-white/5">
                <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <DollarSignIcon />
                      </div>
                      <div  class="ml-auto">
                        <Tippy href="#" tag="a" class="report-box__item__indicator text-success cursor-pointer"
                               content="Click to view all Subscription">
                          <router-link :to="{ name: 'subscription' }">
                            View All Subscription
                          </router-link>
                        </Tippy>
                      </div>
                    </div>
                    <div class="text-slate-500 mt-6">Total Subscription</div>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalSubscription }}</div>
                  </div>
                </div>
                <div class="report-box__item py-5 xl:py-0 px-5 sm:!border-t-0 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <BriefcaseIcon />
                      </div>
                      <div class="ml-auto">
                        <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                               content="Click to view all Contact Us">
                          <router-link :to="{ name: 'contact_us' }">
                            View All Contact US
                          </router-link>
                        </Tippy>
                      </div>
                    </div>
                    <div class="text-slate-500 mt-6">Total Contact US</div>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalContactUS }}</div>
                  </div>
                </div>
                <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <UsersIcon />
                      </div>
                      <div class="ml-auto">
                        <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                          content="Click to View All Sliders">
                          <router-link :to="{ name: 'sliders' }">
                            View All Sliders
                          </router-link>
                        </Tippy>
                      </div>
                    </div>
                    <Tippy tag="div"
                           class="mt-6 text-slate-500"
                           content="WSA Financial Protection Program  is Not Active. Upgrade to to guarantee your deals is secured">
                      Total Sliders
                    </Tippy>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalSliders }}</div>
                  </div>
                </div>
                <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <BookmarkIcon />
                      </div>
                      <div class="ml-auto">
                        <Tippy href="#" tag="a" class="report-box__item__indicator text-success cursor-pointer"
                               content="CLick to View All Services">
                          <router-link :to="{ name: 'services' }">
                            View All Services
                          </router-link>
                        </Tippy>
                      </div>
                    </div>
                    <div class="text-slate-500 mt-6">Total Services</div>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalServices }}</div>
                  </div>
                </div>

              </div>

          </div>

          <div class="intro-y report-box mt-12 sm:mt-4 min-h-[100px]" >
            <loading :active="overview_loading"
              :is-full-page="false" loader="dots" transition="bounce"></loading>

              <div v-if="!overview_loading" class="box py-0 xl:py-5 grid grid-cols-12 gap-0 divide-y xl:divide-y-0 divide-x divide-dashed divide-slate-200 dark:divide-white/5">
                <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <DollarSignIcon />
                      </div>
                      <div  class="ml-auto">
                        <Tippy href="#" tag="a" class="report-box__item__indicator text-success cursor-pointer"
                               content="Click to view all Categories">
                          <router-link :to="{ name: 'categories' }">
                            View All Categories
                          </router-link>
                        </Tippy>
                      </div>
                    </div>
                    <div class="text-slate-500 mt-6">Total Categories</div>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalCategories }}</div>
                  </div>
                </div>
                <!-- <div class="report-box__item py-5 xl:py-0 px-5 sm:!border-t-0 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <BriefcaseIcon />
                      </div>
                      <div class="ml-auto">
                        <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                               content="Click to view all Event Registered Companies">
                          View All Tags
                        </Tippy>
                      </div>
                    </div>
                    <div class="text-slate-500 mt-6">Total Tags</div>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalTags }}</div>
                  </div>
                </div> -->

                <!-- <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <UsersIcon />
                      </div>
                      <div class="ml-auto">
                        <Tippy tag="div" class="report-box__item__indicator text-success cursor-pointer"
                          content="Click to View All Products">
                          View All Sliders
                        </Tippy>
                      </div>
                    </div>
                    <Tippy tag="div"
                           class="mt-6 text-slate-500"
                           content="WSA Financial Protection Program  is Not Active. Upgrade to to guarantee your deals is secured">
                      Total Sliders
                    </Tippy>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalSliders }}</div>
                  </div>
                </div>
                <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                  <div class="report-box__content">
                    <div class="flex items-center">
                      <div
                        class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                        <BookmarkIcon />
                      </div>
                      <div class="ml-auto">
                        <Tippy href="#" tag="a" class="report-box__item__indicator text-success cursor-pointer"
                               content="CLick to View All Booked Rooms Details">
                          View All Services
                        </Tippy>
                      </div>
                    </div>
                    <div class="text-slate-500 mt-6">Total Services</div>
                    <div class="text-2xl font-medium leading-7 mt-1">{{ TotalServices }}</div>
                  </div>
                </div> -->

              </div>

          </div>
        </div>
        <!-- END: General Report -->

      </div>
    </div>

  </div>
</template>




<script>
import { ref, provide, computed } from "vue";

import _ from "lodash";
// import ReportPaymentsPerMonth from "@/components/report-payments-per-months/Main.vue";
// import ReportOrdersPerType from "@/components/total-orders-by-type/Main.vue";

// import ReportBarChart1 from "@/components/report-bar-chart-1/Main.vue";
// import VerticalBarChart from "@/components/vertical-bar-chart/Main.vue";

// import ReportLineChart1 from "@/components/report-line-chart-1/Main.vue";
// import ReportLineChart2 from "@/components/report-line-chart-2/Main.vue";
// import ReportDonutChart1 from "@/components/report-donut-chart-1/Main.vue";
import DashboardController from '@/modules/event-dashboard/controllers/DashboardController.js';
// import Loading from 'vue3-loading-overlay';

import { initializeApp , FirebaseError } from 'firebase/app';
import { getMessaging, getToken, onMessage } from 'firebase/messaging';

export default {
  components:{
    // ReportPaymentsPerMonth,
    // ReportOrdersPerType,
    // ReportBarChart1,
    // VerticalBarChart,
    // ReportLineChart1,
    // ReportLineChart2,
    // ReportDonutChart1,
    // Loading,
  },
  data() {
      return {
        salesReportFilter : null,
        overview_loading : true,
        overview :{},
        PaymentsPerMonthReport_loading : true,
        PaymentsPerMonthReport :{},
        PaymentsPerMonthReportType : 'all',
        OrdersPerMonthReport_loading : true,
        OrdersPerMonthReport:{},
        TopCountries_loading : true,
        TopCountries :[],
        TopBrowsers_loading : true,
        TopBrowsers :[],
        OrdersReport_loading : true,
        OrdersReport :[],
        RecentOrders_loading : true,
        RecentOrders :[],
        Traffics_loading : true,
        Traffics :[],
      };
  },
  watch: {
     PaymentsPerMonthReportType: async function (value) {
      await this.getPaymentsPerMonthReport();
    },
  },

  methods: {
    startCustomLoading(loadingVar){
      this[loadingVar] = true;
    },
    stopCustomLoading(loadingVar){
      this[loadingVar] = false;
    },
   //---- Get Model By Id
    async getOverview() {
      this.startCustomLoading('overview_loading');
      let data = await DashboardController.getOverview();
      if(data){
          this.overview = data;
      }
      this.stopCustomLoading('overview_loading');
    },
   //---- Get Model By Id
    async getPaymentsPerMonthReport() {
      this.startCustomLoading('PaymentsPerMonthReport_loading');
      let data = await DashboardController.getPaymentsPerMonthReport(this.PaymentsPerMonthReportType);
      if(data){
          this.PaymentsPerMonthReport = data;
      }
      this.stopCustomLoading('PaymentsPerMonthReport_loading');
    },
   //---- Get Model By Id
    async getOrdersPerMonthReport() {
      this.startCustomLoading('OrdersPerMonthReport_loading');
      let data = await DashboardController.getOrdersPerMonthReport();
      if(data){
          this.OrdersPerMonthReport = data;
      }
      this.stopCustomLoading('OrdersPerMonthReport_loading');
    },
   //---- Get Model By Id
    async getTopCountries() {
      this.startCustomLoading('TopCountries_loading');
      let data = await DashboardController.getTopCountries();
      if(data){
          this.TopCountries = data;
      }
      this.stopCustomLoading('TopCountries_loading');
    },
   //---- Get Model By Id
    async getTopBrowsers() {
      this.startCustomLoading('TopBrowsers_loading');
      let data = await DashboardController.getTopBrowsers();
      if(data){
          this.TopBrowsers = data;
      }
      this.stopCustomLoading('TopBrowsers_loading');
    },
   //---- Get Model By Id
    async getOrdersReport() {
      this.startCustomLoading('OrdersReport_loading');
      let data = await DashboardController.getOrdersReport();
      if(data){
          this.OrdersReport = data;
      }
      this.stopCustomLoading('OrdersReport_loading');
    },
   //---- Get Model By Id
    async getRecentOrders() {
      this.startCustomLoading('RecentOrders_loading');
      let withReletion = null;
      let data = await DashboardController.getRecentOrders(withReletion);
      if(data){
          this.RecentOrders = data;
      }
      this.stopCustomLoading('RecentOrders_loading');
    },
    async getTraffics() {
      this.startCustomLoading('Traffics_loading');
      let data = await DashboardController.getTraffics();
      if(data){
          this.Traffics = data;
      }
      this.stopCustomLoading('Traffics_loading');
    },
  },
  computed: {
    TotalOrdersPayments() {
      return '$ ' + this.$h.formatCurrency(this.overview.total_orders_payments) ;
    },

    TotalSponsers() {
      return  this.overview.total_sponsers;
    },
    TotalNews() {
      return  this.overview.total_news;
    },
    TotalProducts() {
      return  this.overview.total_products;
    },
    TotalServices() {
      return  this.overview.total_services;
    },
    TotalSubscription() {
      return this.overview.total_subscription ;
    },

    TotalContactUS() {
      return this.overview.total_contact_us ;
    },
    TotalSliders() {
      return this.overview.total_sliders ;
    },
    TotalServices() {
      return this.overview.total_services ;
    },
    TotalCategories() {
      return this.overview.total_categories ;
    },
    TotalTags() {
      return this.overview.total_categories ;
    },


    TotalPaymentInThisYear() {
      return  '$ ' + this.$h.formatCurrency(this.PaymentsPerMonthReport.total);
    },
    TotalOrderInThisYear() {
      return  this.OrdersPerMonthReport.total;
    },
    percentTotalPaymentInThisMonth() {
      if(this.PaymentsPerMonthReport.percent < 0){
        return this.PaymentsPerMonthReport.percent + ' %'
      }
      return '+ ' + this.PaymentsPerMonthReport.percent + ' %';
    },
    percentTotalOrderInThisMonth() {
      if(this.OrdersPerMonthReport.percent < 0){
        return this.OrdersPerMonthReport.percent + ' %'
      }
      return '+ ' + this.OrdersPerMonthReport.percent + ' %';
    },


    saveNotificationToken() {
      const registerNotifTokenURL = 'fcm-token'
      const payload = {
        registration_id: localStorage.getItem('FCMToken'),
        type: 'web'
      }
      // console.log('payload' , payload);
      axios.post(registerNotifTokenURL, payload)
        .then((response) => {
          // console.log('Successfully saved notification token!')
          // console.log(response.data)
        })
        .catch((error) => {
          // console.log('Error: could not save notification token')
          if (error.response) {
            // console.log(error.response.status)
            // Most of the time a "this field must be unique" error will be returned,
            // meaning that the token already exists in db, which is good.
            if (error.response.data.registration_id) {
              for (let err of error.response.data.registration_id) {
                // console.log(err)
              }
            } else {
              // console.log('No reason returned by backend')
            }
            // If the request could not be sent because of a network error for example
          } else if (error.request) {
            // console.log('A network error occurred.')
            // For any other kind of error
          } else {
            // console.log(error.message)
          }
        })
      },
  },
  created() {
    this.getOverview();
    // this.getPaymentsPerMonthReport();
    // this.getOrdersPerMonthReport();
    // this.getTopCountries();
    // this.getTopBrowsers();
    // this.getOrdersReport();
    // this.getTraffics();
    // this.getRecentOrders();
    // this.stopCustomLoading('overview_loading');

    // console.log('tset');
        const firebaseConfig = {
            apiKey: "AIzaSyBcJqA_pSq3qSb-ZsJjkCsJGvRNxIerhz0",
            authDomain: "consol-2d10e.firebaseapp.com",
            projectId: "consol-2d10e",
            storageBucket: "consol-2d10e.appspot.com",
            messagingSenderId: "30474173252",
            appId: "1:30474173252:web:cd94d47143c75da9d93511",
            measurementId: "G-EHQJQJEDC1"
        }

        const firebaseApp = initializeApp(firebaseConfig);
        // console.log(location.protocol);
        if (location.protocol === 'https:') {
          const messaging = getMessaging(firebaseApp);
          // let messaging = initializedFirebaseApp.messaging();
          getToken(messaging, {vapidKey: "BPbxEeRoOfhhvxPkoT1KeWFlij-yjFzS-4ACGVHIzcnOMAtqPVKwYTKt9O1sDVnkBVs5ZtCqYx7TTeQ8euxFqbo"})
            .then((currentToken) => {
              if (currentToken) {
                localStorage.setItem('FCMToken', currentToken.toString());
                //   let token_st = currentToken;
                      this.saveNotificationToken();
              } else {
                // Show permission request UI
                // console.log('No registration token available. Request permission to generate one.');
              }
            }).catch((err) => {
            // console.log('An error occurred while retrieving token. ', err);
          });

          //To handle foreground messages
          onMessage(messaging, (message) => {
            // console.log(message);
          });
        }
        // if (firebaseApp.messaging.isSupported()) {

      // }else{
      //   // console.log('not_supported');

      // }

    // ('
      // // console.log(this.$auth);
  }
}
</script>
