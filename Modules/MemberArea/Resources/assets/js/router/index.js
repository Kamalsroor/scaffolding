/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/MemberArea/Resources/assets/js/views/index.vue";

const MemberAreasRoutes = {
  path: '/member_areas',
  component: MainLayout,
  redirect: '/member_areas/index',
  name: 'MemberAreas',
  // alwaysShow: true,
  meta: {
    title: 'MemberAreas',
    // icon: 'member_area',
    // permissions: ['view menu member_areaistrator'],
  },
  children: [
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
