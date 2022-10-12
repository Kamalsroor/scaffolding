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
    // {
    //   path: "/common-data/certificates",
    //   name: "certificates",
    //   component: () => import(/* webpackChunkName: "admins_certificates" */'@@/Admin/Resources/assets/js/views/Certificates.vue'),
    //   meta: {
    //     title: 'Certificates',
    //     // icon: 'admin',
    //     permissions: ['list-certificate'],
    //   },
    // },
    // {
    //   path: "/common-data/sliders",
    //   name: "sliders",
    //   component: () => import(/* webpackChunkName: "admins_sliders" */'@@/Admin/Resources/assets/js/views/Sliders.vue'),
    //   meta: {
    //     title: 'Sliders',
    //     // icon: 'admin',
    //     permissions: ['list-slider'],
    //   },
    // },
    // {
    //   path: "/common-data/countries",
    //   name: "countries",
    //   component: () => import(/* webpackChunkName: "admins_countries" */'@@/Admin/Resources/assets/js/views/Countries.vue'),
    //   meta: {
    //     title: 'Countries',
    //     // icon: 'admin',
    //     permissions: ['list-country'],
    //   },
    // },
    // {
    //   path: "/common-data/referrals",
    //   name: "referrals",
    //   component: () => import(/* webpackChunkName: "admins_referrals" */'@@/Admin/Resources/assets/js/views/Referrals.vue'),
    //   meta: {
    //     title: 'Referrals',
    //     // icon: 'admin',
    //     permissions: ['list-referral'],
    //   },
    // },
    // /** User managements */
    // {
    //   path: 'users/edit/:id(\\d+)',
    //   component: () => import('@/views/users/UserProfile'),
    //   name: 'UserProfile',
    //   meta: { title: 'userProfile', noCache: true, permissions: ['manage user'] },
    //   hidden: true,
    // },
    // {
    //   path: 'users',
    //   component: () => import('@/views/users/List'),
    //   name: 'UserList',
    //   meta: { title: 'users', icon: 'user', permissions: ['manage user'] },
    // },
    // /** Role and permission */
    // {
    //   path: 'roles',
    //   component: () => import('@/views/role-permission/List'),
    //   name: 'RoleList',
    //   meta: { title: 'rolePermission', icon: 'role', permissions: ['manage permission'] },
    // },
    // {
    //   path: 'articles/create',
    //   component: () => import('@/views/articles/Create'),
    //   name: 'CreateArticle',
    //   meta: { title: 'createArticle', icon: 'edit', permissions: ['manage article'] },
    //   hidden: true,
    // },
    // {
    //   path: 'articles/edit/:id(\\d+)',
    //   component: () => import('@/views/articles/Edit'),
    //   name: 'EditArticle',
    //   meta: { title: 'editArticle', noCache: true, permissions: ['manage article'] },
    //   hidden: true,
    // },
    // {
    //   path: 'articles',
    //   component: () => import('@/views/articles/List'),
    //   name: 'ArticleList',
    //   meta: { title: 'articleList', icon: 'list', permissions: ['manage article'] },
    // },
  ],
};

export default AdminsRoutes;
