/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/Setting/Resources/assets/js/views/index.vue";

const SettingsRoutes = {
  path: '/general/settings',
  component: MainLayout,
  redirect: '/general/settings',
  name: 'general',
  // alwaysShow: true,
  meta: {
    title: 'General',
    // icon: 'admin',
    // permissions: ['view menu administrator'],
  },
  children: [
    {
      path: "/general/settings",
      name: "settings",
      component: () => import(/* webpackChunkName: "settings_list" */'@@/Setting/Resources/assets/js/views/Settings.vue'),
      // component: () => import(/* webpackChunkName: "coomon_data_settings" */'@/V2/modules/general/views/Settings.vue'),
      meta: {
        title: 'Settings',
        // icon: 'admin',
      },
    },
    {
      path: "/general/settings/:page",
      name: "settings_page",
      component: () => import(/* webpackChunkName: "settings_list" */'@@/Setting/Resources/assets/js/views/Page.vue'),
      // component: () => import(/* webpackChunkName: "coomon_data_settings_page" */'@/V2/modules/general/views/Page.vue'),
      meta: {
        title: 'Page',
        // icon: 'admin',
      },
    },


  ],
};

// const SettingsRoutes = {
//   path: 'settings',
//   redirect: 'settings/',
//   name: 'Settings',
//   // alwaysShow: true,
//   meta: {
//     title: 'Settings',
//     // icon: 'setting',
//     // permissions: ['view menu settingistrator'],
//   },
//   children: [
//     {
//       path: "/",
//       name: "settings",
//       component: () => import(/* webpackChunkName: "settings_list" */'@@/Setting/Resources/assets/js/views/Create.vue'),
//       meta: {
//         title: 'Settings',
//         // icon: 'setting',
//         permissions: ['list-settings'],
//       },
//     },


//   ],
// };

export default SettingsRoutes;
