<template>
  <div class="grid grid-cols-12 gap-6">

    <div class="col-span-12 2xl:col-span-9">
  
      <div class="grid grid-cols-12 gap-6">
        <!-- BEGIN: General Report -->
        <!-- <div class="col-span-12 mt-6" >
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
              <div class="report-box__item py-5 xl:py-0 px-5 col-span-12 sm:col-span-6 xl:col-span-3">
                <div class="report-box__content">
                  <div class="flex items-center">
                    <div class="report-box__item__icon text-success bg-success/20 border border-success/20 flex items-center justify-center rounded-full">
                      <DollarSignIcon />
                    </div>
                    <div  class="ml-auto">
                      <Tippy href="#" tag="a" class="report-box__item__indicator text-success cursor-pointer"
                             content="Click to view all orders">
                        View All Orders
                      </Tippy>
                    </div>
                  </div>
                  <div class="text-slate-500 mt-6">Total Orders Payments</div>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalOrdersPayments }}</div>
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
                             content="Click to view all Event Registered Companies">
                        View All Companies
                      </Tippy>
                    </div>
                  </div>
                  <div class="text-slate-500 mt-6">Total Registered Companies</div>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalRegisteredCompanies }}</div>
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
                        content="Click to View All Event Delegates">
                        View All Delegates
                      </Tippy>
                    </div>
                  </div>
                  <Tippy tag="div"
                         class="mt-6 text-slate-500"
                         content="WSA Financial Protection Program  is Not Active. Upgrade to to guarantee your deals is secured">
                    Total Delegates
                  </Tippy>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalDelegates }}</div>
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
                        View All Rooms
                      </Tippy>
                    </div>
                  </div>
                  <div class="text-slate-500 mt-6">Total Booked Rooms</div>
                  <div class="text-2xl font-medium leading-7 mt-1">{{ TotalBookedRooms }}</div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <!-- END: General Report -->
        <!-- BEGIN: Payments per Orders -->
        <div class="col-span-12 md:col-span-8 lg:col-span-6 mt-7">
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Payments Per Month Report</h2>
            <!-- <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
              <CalendarIcon
                  class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"/>
              <Litepicker v-model="salesReportFilter" :options="{autoApply: false,singleMode: false,numberOfColumns: 2,numberOfMonths: 2,showWeekNumbers: true, dropdowns: {minYear: 1990,maxYear: null,months: true,years: true,},}"
                  class="form-control sm:w-56 box pl-10"/>
            </div> -->
          </div>
          <!-- <div class="intro-y box p-5 mt-12 sm:mt-4 min-h-[260px]">
          <loading :active="PaymentsPerMonthReport_loading"
            :is-full-page="false" loader="dots" transition="bounce"></loading>

            <div v-if="!PaymentsPerMonthReport_loading"   class="md:flex items-center">
              <div class="mr-auto">
                <div class="flex items-center">
                  <div class="text-2xl font-medium">{{ TotalPaymentInThisYear }}</div>
                  <div class="flex items-center  cursor-pointer ml-3"
                    :class="[(this.PaymentsPerMonthReport.percent > 0 ? 'text-success' : 'text-danger')]"
                  >
                    {{ percentTotalPaymentInThisMonth }}
                    <template v-if="this.PaymentsPerMonthReport.percent < 0"><ArrowDownIcon class="w-4 h-4 ml-0.5" /></template>
                    <template v-else><ArrowUpIcon class="w-4 h-4 ml-0.5" /></template>
                  </div>
                </div>
                <div class="text-slate-500 mt-1">Total Payments</div>
              </div>
              <select v-model="PaymentsPerMonthReportType" class="form-select w-40 md:ml-auto mt-3 md:mt-0 dark:bg-darkmode-600 dark:border-darkmode-400"
                  aria-label="General report filter">
                <option value="all" selected>All Payments</option>
                <option value="member" >Members</option>
                <option value="non-member" >Non Members</option>
              </select>

            </div>
            <div class="mt-6">
              <ReportPaymentsPerMonth :labels="PaymentsPerMonthReport.months" :data="PaymentsPerMonthReport.months_number" :height="260" />
            </div>
          </div> -->
        </div>
        <!-- END: Payments per Orders -->
        <!-- BEGIN: Sales Report -->
        <div class="col-span-12 md:col-span-8 lg:col-span-6 mt-7">
          <div class="intro-y block sm:flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5">Sales Report</h2>
            <!-- <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
              <CalendarIcon class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"/>
              <Litepicker v-model="salesReportFilter" :options="{autoApply: false,singleMode: false,numberOfColumns: 2,numberOfMonths: 2,showWeekNumbers: true,
                  dropdowns: {minYear: 1990,maxYear: null,months: true,years: true,},}"
                  class="form-control sm:w-56 box pl-10"/>
            </div> -->
          </div>
          <!-- <div class="intro-y box p-5 mt-12 sm:mt-4">
          <loading :active="OrdersPerMonthReport_loading"
            :is-full-page="false" loader="dots" transition="bounce"></loading>
            <div v-if="!OrdersPerMonthReport_loading" class="md:flex items-center">
              <div class="mr-auto">
                <div class="flex items-center">
                  <div class="text-2xl font-medium">{{ TotalOrderInThisYear }}</div>
                  <div class="flex items-center  cursor-pointer ml-3"   :class="[(this.PaymentsPerMonthReport.percent > 0 ? 'text-success' : 'text-danger')]">
                    {{ percentTotalOrderInThisMonth }}
                    <template v-if="this.PaymentsPerMonthReport.percent < 0"><ArrowDownIcon class="w-4 h-4 ml-0.5" /></template>
                    <template v-else><ArrowUpIcon class="w-4 h-4 ml-0.5" /></template>
                  </div>
                </div>
                <div class="text-slate-500 mt-1">Total Orders</div>
              </div>
            </div>
            <div class="mt-6">
              <ReportOrdersPerType :labels="OrdersPerMonthReport.months" :data="OrdersPerMonthReport.months_number" :height="260" />
            </div>
          </div> -->
        </div>
        <!-- END: Sales Report -->
        <!-- BEGIN: Recent Orders -->
        <div class="col-span-12 md:col-span-12 lg:col-span-12 mt-4 md:mt-7">
          <div class="intro-y flex items-center h-10">
            <h2 class="text-lg font-medium truncate mr-5 flex items-center">
              <ListIcon class="h-5 w-5 mr-2" />
              Recent Orders
            </h2>
            <a href="#" class="ml-auto text-slate-500 truncate">View All Orders</a>
          </div>
          <!-- <div class="intro-y mt-4 min-h-[600px]">
            <loading :active="RecentOrders_loading"
            :is-full-page="false" loader="dots" transition="bounce"></loading>
                <div v-if="!RecentOrders_loading"  class="intro-y box p-5 col-span-12 overflow-auto">
              <table class="table table-report -mt-2">
                <thead>
                <tr>
                  <th class="whitespace-nowrap uppercase">Order #</th>
                  <th class="whitespace-nowrap uppercase ">Company</th>
                  <th class="whitespace-nowrap uppercase">Status</th>
                  <th class="whitespace-nowrap uppercase text-right">Amount</th>
                  <th class="text-center whitespace-nowrap uppercase">Action</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="(order, index) in RecentOrders" :key="index" class="intro-x">
                  <td class="whitespace-nowrap">
                    <div class="font-semibold">{{ order.uuid }}</div>
                    <div>{{ order.date }}</div>
                  </td>
                  <td>
                    <div class="flex items-center">
                      <div class="h-10 w-20 flex-shrink-0">
                        <img class="h-10 w-20 rounded-md p-1 object-contain bg-white" :src="order.company?.logo_url" :alt="order.company?.name" />
                      </div>
                      <div class="ml-4">
                        <div class="font-medium text-gray-900 truncate">{{order.company?.name }}</div>
                        <div class="text-gray-500"><span class="font-semibold">{{order.company?.country?.name }}</span>, {{order.company?.city }}</div>
                      </div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap">
                    <div >
                      <div :id="order.status_code" :class="[

                        (order.status_code === 'application_from' ? 'text-primary border-primary' : ''),
                        (order.status_code === 'pending_payment' ? 'text-primary border-primary' : ''),
                        (order.status_code === 'pending_bank_transfer' ? 'text-warning border-warning' : ''),
                        (order.status_code === 'approved_bank_transfer' ? 'text-success border-success' : ''),
                        (order.status_code === 'payment_review' ? 'text-success border-success' : ''),
                          'p-1 rounded-md text-xs text-center font-medium border']">
                        {{ order.status }}
                      </div>
                    </div>
                  </td>
                  <td class="whitespace-nowrap">
                    <div class="font-semibold text-right">{{ order.total }}<span class="font-light ml-1">$</span></div>
                  </td>
                  <td class="table-report__action w-56">
                    <div class="flex justify-center items-center">
                      <router-link  class="flex items-center mr-3" v-can="['edit-order']"  :to="{ name: 'show_order' , params :{ id: order.id}}">
                          <EyeIcon class="w-4 h-4 mr-1" />
                          {{ $t('g.show') }}
                      </router-link>
                      <router-link  class="flex items-center text-success" v-can="['edit-order']"  :to="{ name: 'update_orders' , params :{ id: order.id}}">
                          <EditIcon class="w-4 h-4 mr-1" />
                          {{ $t('g.edit') }}
                      </router-link>

                    </div>
                  </td>
                </tr>
                </tbody>
              </table>
            </div> 
          </div> -->
        </div>
        <!-- END: Recent Orders -->
      </div>
    </div>
    <div class="col-span-12 2xl:col-span-3">
      <div class="2xl:border-l border-slate-300/50 h-full 2xl:pt-6 pb-6">
        <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 gap-y-8">
          <!-- BEGIN: Top Countries -->
          <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
            <div class="intro-y flex items-center h-10">
              <h2 class="text-lg font-medium truncate mr-5 flex items-center">
                <GlobeIcon class="h-5 w-5 mr-2" />
                Top Visited Countries
              </h2>
              <a href="#" class="ml-auto text-slate-500 truncate">View All</a>
            </div>
            <!-- <div class="intro-y box p-5 mt-4 divide-y divide-dashed divide-slate-300/50 min-h-[260px]">
             <loading :active="TopCountries_loading"
              :is-full-page="false" loader="dots" transition="bounce"></loading>
              <div v-for="country in TopCountries" :key="country.country_code" class="flex items-center py-2 last:pt-2">
                <div class="w-[1.15rem] h-[1.15rem] image-fit rounded-md overflow-hidden">
                  <img class="rounded-md !w-[140%] !h-[140%] -mt-[20%]" alt="" :src="'countries/'+ $h.toKebabCase(country.country_code)+'.svg'"/>
                </div>
                <div class="ml-3 truncate pr-5">{{country.country_name}}</div>
                <div class="ml-auto font-semibold">{{country.count}}</div>
              </div>
            </div> -->
          </div>
          <!-- END: Top Countries -->
          <!-- BEGIN: Seller Report -->
          <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
            <div class="intro-y flex items-center h-10">
              <h2 class="text-lg font-medium truncate mr-5">Orders Report</h2>
            </div>
            <!-- <div class="intro-y box p-5 mt-4 min-h-[260px]">

            <loading :active="OrdersReport_loading"
              :is-full-page="false" loader="dots" transition="bounce"></loading>

              <div v-if="!OrdersReport_loading" class="relative px-3">
                <div class="w-40 mx-auto lg:w-auto">
                  <ReportDonutChart1 :data="OrdersReport.data" :labels="OrdersReport.labels" class="mt-2 z-10 relative" :height="210" />
                </div>
                <div class="flex flex-col justify-center items-center absolute w-full h-full top-0 left-0">
                  <div class="text-2xl leading-7 font-medium">57</div>
                  <div class="text-slate-500 mt-1">Total Event Orders</div>
                </div>
              </div>
              <div class="w-52 lg:w-auto mx-auto mt-6">
                <div v-for="(item, index) in OrdersReport.getStatusCodesArray" :key="index" class="flex items-center mt-4">
                  <div class="w-2 h-2  border  rounded-full mr-3"
                  :class="[
                    (['application_from','pending_payment'].includes(index) ? 'bg-primary/50 border-primary/50':'' ),
                    (['pending_bank_transfer'].includes(index) ? 'bg-warning/50 border-warning/60':'' ),
                    (['approved_bank_transfer','payment_review'].includes(index) ? 'bg-success/50 border-success/60':'' ),
                  ]"></div>
                  <span class="truncate">{{item.name}}</span>
                  <span class="ml-auto">{{item.percent}}%<span class="font-light ml-2">({{item.count}})</span></span>
                </div>
               
              </div>
            </div> -->
          </div>


          <!-- END: Seller Report -->
          <!-- BEGIN: Sales Report -->
          <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
            <div class="intro-y block sm:flex items-center h-10">
              <h2 class="text-lg font-medium truncate mr-5">Visits Report</h2>
            </div>
            <!-- <div class="intro-y box p-5 mt-12 sm:mt-4 min-h-[260px]">
              <loading :active="Traffics_loading"
              :is-full-page="false" loader="dots" transition="bounce"></loading>
              <div v-if="!Traffics_loading" class="md:flex items-center">
                <div class="mr-auto">
                  <div class="flex items-center">
                    <div class="text-2xl font-medium">{{ Traffics.total }}</div>
                    <div class="flex items-center text-success cursor-pointer ml-3">
                      +5.2% <ArrowUpIcon class="w-4 h-4 ml-0.5" />
                    </div>
                  </div>
                  <div class="text-slate-500 mt-1">Website Visits in Last 7 Days</div>
                </div>
              </div>
              <div class="mt-6">
                <ReportLineChart1 :data="Traffics.data" :labels="Traffics.labels" :height="260" />
              </div>
            </div> -->
          </div>
          <!-- END: Sales Report -->
          <!-- BEGIN: Browser Visitors -->
          <div class="col-span-12 md:col-span-6 xl:col-span-4 2xl:col-span-12">
            <div class="intro-x flex items-center h-10">
              <h2 class="text-lg font-medium truncate mr-5">
                Browser Visitors
              </h2>
            </div>
            <!-- <div class="mt-4 min-h-[260px]" >
             <loading :active="TopBrowsers_loading"
              :is-full-page="false" loader="dots" transition="bounce"></loading>
              <div v-if="!TopBrowsers_loading" class="intro-x box p-5 ">
                <div v-for="(Browser , index) in TopBrowsers" :key="Browser.browser" class="flex items-center" :class="[ index === 0 ? '' : 'mt-5']">
                  <img
                      class="w-7 h-7"
                      :alt="Browser.browser"
                      :src="'/images/browsers/'+ $h.WordToSnakeCase(Browser.browser) +'.png'"
                  />
                  <div class="ml-4">{{Browser.browser}}</div>
                  <div class="ml-auto">{{Browser.count}}</div>
                </div>
              </div>
            </div> -->
          </div>
          <!-- END: Browser Visitors -->
        </div>
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
      console.log(this[loadingVar]);
    },
    stopCustomLoading(loadingVar){
      this[loadingVar] = false;
      console.log(this[loadingVar]);
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
    TotalRegisteredCompanies() {
      return  this.overview.total_registered_companies;
    },
    TotalDelegates() {
      return  this.overview.total_delegates;
    },
    TotalBookedRooms() {
      return  this.overview.total_booked_rooms;
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

  },
  created() {
    this.getOverview();
    this.getPaymentsPerMonthReport();
    this.getOrdersPerMonthReport();
    this.getTopCountries();
    this.getTopBrowsers();
    this.getOrdersReport();
    this.getTraffics();
    this.getRecentOrders();
    // ('
      // console.log(this.$auth);
  }
}
</script>
