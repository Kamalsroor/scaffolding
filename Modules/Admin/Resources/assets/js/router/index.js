/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/Admin/Resources/assets/js/views/index.vue";

const AdminsRoutes = {
  path: 'admins',
  component: MainLayout,
  redirect: 'admins/list',
  name: 'Admins',
  // alwaysShow: true,
  meta: {
    title: 'Admins',
    // icon: 'admin',
    // permissions: ['view menu administrator'],
  },
  children: [
    {
      path: "list",
      name: "admins",
      component: () => import(/* webpackChunkName: "admins_list" */'@@/Admin/Resources/assets/js/views/Admins.vue'),
      meta: {
        title: 'Admins',
        // icon: 'admin',
        permissions: ['list-admins'],
      },
    },
    {
      path: "roles/list",
      name: "roles",
      component: () => import(/* webpackChunkName: "roles_list" */'@@/Admin/Resources/assets/js/views/Roles.vue'),
      meta: {
        title: 'Roles',
        // icon: 'admin',
        permissions: ['list-roles'],
      },
    },

  ],
};

export default AdminsRoutes;
