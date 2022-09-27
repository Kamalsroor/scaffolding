/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@/modules/event-dashboard/views/index.vue";

const commonDataRoutes = {
  path: '/dashboard',
  component: () => import(/* webpackChunkName: "event_dashboard_index" */'@/modules/event-dashboard/views/dashboard.vue'),
  name: 'dashboard',
  // alwaysShow: true,
  meta: {
    title: 'Dashboard',
    // icon: 'admin',
    // permissions: ['view menu administrator'],
  },
 
};

export default commonDataRoutes;
