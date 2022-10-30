/** When your routing table is too long, you can split it into small modules**/
// import MainLayout from "@/modules/reports/views/index.vue";
// const Login = () => import('@/components/Login.vue')

const AuthRoutes = {
    name: "login",
    path: "/ap/login",
    component: () => import(/* webpackChunkName: "Login" */'@/modules/auth/views/Login.vue'),
    meta: {
        middleware: "guest",
        title: `Login`
    }
};

export default AuthRoutes;
