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
      path: "list",
      name: "sponsers",
      component: () => import(/* webpackChunkName: "sponsers_list" */'@@/CommonData/Resources/assets/js/views/Sponsers.vue'),
      meta: {
        title: 'Sponsers',
        // icon: 'sponser',
        permissions: ['list-sponsers'],
      },
    },

  ],
};

export default CommonDatasRoutes;
