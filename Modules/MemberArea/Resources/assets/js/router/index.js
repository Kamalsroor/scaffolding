/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/MemberArea/Resources/assets/js/views/index.vue";

const MemberAreasRoutes = {
  path: '/home',
  component: MainLayout,
  redirect: '/home',
  name: 'Home',
  // alwaysShow: true,
  meta: {
    title: 'Home',
    // icon: 'member_area',
    // permissions: ['view menu member_areaistrator'],
  },
  children: [
    {
      path: "/home",
      name: "home",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/Home.vue'),
      meta: {
        title: 'Home',
        // icon: 'member_area',
        permissions: ['home'],
      },
    },
    {
      path: "/member_areas/index",
      name: "member_areas",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/MemberAreas.vue'),
      meta: {
        title: 'MemberAreas',
        // icon: 'member_area',
        permissions: ['list-member_areas'],
      },
    },

  ],
};

export default MemberAreasRoutes;
