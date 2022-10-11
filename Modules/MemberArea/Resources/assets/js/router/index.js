/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/MemberArea/Resources/assets/js/views/index.vue";

const MemberAreasRoutes = {
  path: '/home',
  component: MainLayout,
  redirect: '/',
  name: 'Home',
  // alwaysShow: true,
  meta: {
    title: 'Home',
    // icon: 'member_area',
    // permissions: ['view menu member_areaistrator'],
  },
  children: [
    {
      path: "/",
      name: "home",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/Home.vue'),
      meta: {
        title: 'Home',
        // icon: 'member_area',
        permissions: ['home'],
      },
    },
    {
      path: "/about",
      name: "about",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/About.vue'),
      meta: {
        title: 'About',
        // icon: 'member_area',
        permissions: ['About'],
      },
    },
    {
      path: "/network-directory",
      name: "network.directory",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/NetworkDirectory.vue'),
      meta: {
        title: 'Network Directory',
        // icon: 'member_area',
        permissions: ['About'],
      },
    },
    {
      path: "/benefit",
      name: "benefit",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/Benefit.vue'),
      meta: {
        title: 'Benefit',
        // icon: 'member_area',
        permissions: ['Benefit'],
      },
    },
    {
      path: "/contact",
      name: "contact",
      component: () => import(/* webpackChunkName: "member_areas_list" */'@@/MemberArea/Resources/assets/js/views/Contact.vue'),
      meta: {
        title: 'Contact',
        // icon: 'member_area',
        permissions: ['Contact'],
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
