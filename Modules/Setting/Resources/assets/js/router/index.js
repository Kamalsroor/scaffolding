/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/Setting/Resources/assets/js/views/index.vue";

const SettingsRoutes = {
  path: 'settings',
  component: MainLayout,
  redirect: 'settings/list',
  name: 'Settings',
  // alwaysShow: true,
  meta: {
    title: 'Settings',
    // icon: 'setting',
    // permissions: ['view menu settingistrator'],
  },
  children: [
    {
      path: "list",
      name: "settings",
      component: () => import(/* webpackChunkName: "settings_list" */'@@/Setting/Resources/assets/js/views/Settings.vue'),
      meta: {
        title: 'Settings',
        // icon: 'setting',
        permissions: ['list-settings'],
      },
    },
    {
      path: "roles/list",
      name: "roles",
      component: () => import(/* webpackChunkName: "roles_list" */'@@/Setting/Resources/assets/js/views/Roles.vue'),
      meta: {
        title: 'Roles',
        // icon: 'setting',
        permissions: ['list-roles'],
      },
    },
    // {
    //   path: "/common-data/certificates",
    //   name: "certificates",
    //   component: () => import(/* webpackChunkName: "settings_certificates" */'@@/Setting/Resources/assets/js/views/Certificates.vue'),
    //   meta: {
    //     title: 'Certificates',
    //     // icon: 'setting',
    //     permissions: ['list-certificate'],
    //   },
    // },
    // {
    //   path: "/common-data/sliders",
    //   name: "sliders",
    //   component: () => import(/* webpackChunkName: "settings_sliders" */'@@/Setting/Resources/assets/js/views/Sliders.vue'),
    //   meta: {
    //     title: 'Sliders',
    //     // icon: 'setting',
    //     permissions: ['list-slider'],
    //   },
    // },
    // {
    //   path: "/common-data/countries",
    //   name: "countries",
    //   component: () => import(/* webpackChunkName: "settings_countries" */'@@/Setting/Resources/assets/js/views/Countries.vue'),
    //   meta: {
    //     title: 'Countries',
    //     // icon: 'setting',
    //     permissions: ['list-country'],
    //   },
    // },
    // {
    //   path: "/common-data/referrals",
    //   name: "referrals",
    //   component: () => import(/* webpackChunkName: "settings_referrals" */'@@/Setting/Resources/assets/js/views/Referrals.vue'),
    //   meta: {
    //     title: 'Referrals',
    //     // icon: 'setting',
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

export default SettingsRoutes;
