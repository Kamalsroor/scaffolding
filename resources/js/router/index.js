import { createWebHistory, createRouter } from 'vue-router'
import store from '@/store'
/* Guest Component */
// const Login = () => import('@/components/Login.vue')
const Register = () => import('@/components/Register.vue')
import AuthModule from "@/modules/auth/router";
import EventDashboard from "@/modules/event-dashboard/router";
import ErrorPage from "@/pages/error-page/Main.vue";
import Admin from "@@/Admin/Resources/assets/js/router";
import Product from "@@/Product/Resources/assets/js/router";
import CommonData from "@@/CommonData/Resources/assets/js/router";
import News from "@@/News/Resources/assets/js/router";
import Setting from "@@/Setting/Resources/assets/js/router";

/* Guest Component */
/* Layouts */
const DahboardLayout = () => import('@/components/layouts/Default.vue')
// const WebsiteLayout = () => import('@/components/layouts/ConsolLayout.vue')
/* Layouts */
/* Authenticated Component */
const Dashboard = () => import('@/components/Dashboard.vue')
/* Authenticated Component */
const routes = [
    AuthModule,
    // {
    //     name: "login",
    //     path: "/login",
    //     component: Login,
    //     meta: {
    //         middleware: "guest",
    //         title: `Login`
    //     }
    // },
    // {
    //     name: "register",
    //     path: "/register",
    //     component: Register,
    //     meta: {
    //         middleware: "guest",
    //         title: `Register`
    //     }
    // },
    {
        path: "/",
        component: DahboardLayout,
        redirect: 'dashboard',
        meta: {
            middleware: "auth"
        },
        children: [
            EventDashboard,
            Admin,
            Product,
            CommonData,
            News,
            Setting,
            // {
            //     name: "dashboard",
            //     path: '/',
            //     component: Dashboard,
            //     meta: {
            //         title: `Dashboard`
            //     }
            // }
        ]
    },
    {
        path: "/error-page",
        name: "error-page",
        component: ErrorPage,
        meta: {
            title: 'Not found'
        }
    },
    // {
    //     path: "/403-page",
    //     name: "403-page",
    //     component: NoPermissionPage,
    // },
    {
        path: "/:pathMatch(.*)*",
        component: ErrorPage,
        meta: {
            title: 'Not found'
        }
    },
]
const router = createRouter({
    history: createWebHistory(),
    routes, // short for `routes: routes`
})
router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({ name: "dashboard" })
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({ name: "login" })
        }
    }
})
export default router
