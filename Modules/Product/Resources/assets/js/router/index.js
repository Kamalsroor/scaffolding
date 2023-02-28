/** When your routing table is too long, you can split it into small modules**/
import MainLayout from "@@/Product/Resources/assets/js/views/index.vue";

const ProductsRoutes = {
  path: 'products',
  component: MainLayout,
  redirect: 'products/list',
  name: 'Products',
  // alwaysShow: true,
  meta: {
    title: 'Products',
    // icon: 'product',
    // permissions: ['view menu productistrator'],
  },
  children: [
    {
      path: "list",
      name: "products",
      component: () => import(/* webpackChunkName: "products_list" */'@@/Product/Resources/assets/js/views/Products.vue'),
      meta: {
        title: 'Products',
        // icon: 'product',
        permissions: ['list-products'],
      },
    },
    {
      path: "create",
      name: "products-create",
      component: () => import(/* webpackChunkName: "products_create" */'@@/Product/Resources/assets/js/views/Create.vue'),
      meta: {
        title: 'Create Products',
        // icon: 'product',
        permissions: ['create-products'],
      },
    },


  ],
};

export default ProductsRoutes;
