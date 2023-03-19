/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/News/Resources/assets/js/views/index.vue";

const NewsRoutes = {
  path: 'news',
  component: MainLayout,
  redirect: 'categories/list',
  name: 'News',
  // alwaysShow: true,
  meta: {
    title: 'News',
    // icon: 'sponser',
    // permissions: ['view menu sponseristrator'],
  },
  children: [
    {
      path: "categories",
      name: "categories",
      component: () => import(/* webpackChunkName: "categories_list" */'@@/News/Resources/assets/js/views/Categories.vue'),
      meta: {
        title: 'Categories',
        // icon: 'sponser',
        permissions: ['list-categories'],
      },
    },
    {
      path: "tags",
      name: "tags",
      component: () => import(/* webpackChunkName: "tags_list" */'@@/News/Resources/assets/js/views/Tags.vue'),
      meta: {
        title: 'Tags',
        // icon: 'sponser',
        permissions: ['list-tags'],
      },
    },

    {
      path: "news",
      name: "news",
      component: () => import(/* webpackChunkName: "news_list" */'@@/News/Resources/assets/js/views/News.vue'),
      meta: {
        title: 'News',
        // icon: 'sponser',
        permissions: ['list-news'],
      },
    },

    {
      path: "create",
      name: "news-create",
      component: () => import(/* webpackChunkName: "news_create" */'@@/News/Resources/assets/js/views/NewsForm.vue'),
      meta: {
        title: 'Create News',
        // icon: 'product',
        permissions: ['create-news'],
      },
    },
    {
      name: "news-edit",
      path: "edit/:id",
      component: () => import(/* webpackChunkName: "news_edit" */'@@/News/Resources/assets/js/views/NewsForm.vue'),
      meta: {
        title: 'Edit News',
        // icon: 'product',
        permissions: ['edit-news'],
      },
    },


  ]

};

export default NewsRoutes;
