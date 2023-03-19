/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/CommonData/Resources/assets/js/views/index.vue";

const CommonDatasRoutes = {
  path: 'common-datas',
  component: MainLayout,
  redirect: 'sponsers/list',
  name: 'CommonDatas',
  // alwaysShow: true,
  meta: {
    title: 'Common Data',
    // icon: 'sponser',
    // permissions: ['view menu sponseristrator'],
  },
  children: [
    {
      path: "sponsers",
      name: "sponsers",
      component: () => import(/* webpackChunkName: "sponsers_list" */'@@/CommonData/Resources/assets/js/views/Sponsers.vue'),
      meta: {
        title: 'Sponsers',
        // icon: 'sponser',
        permissions: ['list-sponsers'],
      },
    },
    {
      path: "subscriptions",
      name: "subscription",
      component: () => import(/* webpackChunkName: "Subscription_list" */'@@/CommonData/Resources/assets/js/views/Subscription.vue'),
      meta: {
        title: 'Subscription',
        // icon: 'sponser',
        permissions: ['list-subscription'],
      },
    },
    {
      path: "contact_us",
      name: "contact_us",
      component: () => import(/* webpackChunkName: "contact_us_list" */'@@/CommonData/Resources/assets/js/views/ContactUs.vue'),
      meta: {
        title: 'Contact Us',
        // icon: 'sponser',
        permissions: ['list-contact_us'],
      },
    },
    {
      path: "sliders",
      name: "sliders",
      component: () => import(/* webpackChunkName: "sliders_list" */'@@/CommonData/Resources/assets/js/views/Sliders.vue'),
      meta: {
        title: 'Sliders',
        // icon: 'sponser',
        permissions: ['list-sliders'],
      },
    },
    {
      path: "services",
      name: "services",
      component: () => import(/* webpackChunkName: "services_list" */'@@/CommonData/Resources/assets/js/views/Services.vue'),
      meta: {
        title: 'Services',
        // icon: 'sponser',
        permissions: ['list-services'],
      },
    }
  ]

};

export default CommonDatasRoutes;
