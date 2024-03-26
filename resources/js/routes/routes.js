import Cookies from 'js-cookie'
import store from "../store";

const Layout = () => import('../layouts/Layout.vue')

const PostsIndex  = ()  => import('../views/admin/posts/Index.vue');

function requireLogin(to, from, next) {
    let isLogin = false;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next()
    } else {
        next('/login')
    }
}

function guest(to, from, next) {
    let isLogin;
    isLogin = !!store.state.auth.authenticated;

    if (isLogin) {
        next('/')
    } else {
        next()
    }
}

export default [
    {
        path: '/',
        // redirect: { name: 'login' },
        component: Layout,
        children: [
            {
                path: '/',
                name: 'home',
                component: () => import('../views/home/index.vue'),
            },
            {
                path: 'login',
                name: 'auth.login',
                component: () => import('../views/login/Login.vue'),
                beforeEnter: guest,
            },
            {
                path: 'register',
                name: 'auth.register',
                component: () => import('../views/register/index.vue'),
                beforeEnter: guest,
            },
            {
                path: 'forgot-password',
                name: 'auth.forgot-password',
                component: () => import('../views/auth/passwords/Email.vue'),
                beforeEnter: guest,
            },
            {
                path: 'reset-password/:token',
                name: 'auth.reset-password',
                component: () => import('../views/auth/passwords/Reset.vue'),
                beforeEnter: guest,
            },
            {
                name: 'Informacion Informacion',
                path: 'info',
                component: () => import('../views/test/infoAutoescuela.vue'),
            },
            {
                name: 'Profile',
                path: 'profile',
                component: () => import('../views/admin/index.vue'),
                meta: { breadCrumb: 'Profile' },
                beforeEnter: requireLogin,
            },
            {
                name: 'crearTask',
                path: 'createTasks',
                component: () => import('../views/task/create.vue'),
                meta: { breadCrumb: 'teacher'}
            },
            {
                name: 'CreateTest',
                path: 'createTest',
                component: () => import('../views/teacher/test/create.vue'),
                meta: { breadCrumb: 'createTest'},
                beforeEnter: requireLogin,

            },
            {
                name: 'EditExample',
                path: 'EditExample',
                component: () => import('../views/admin/exercises/Create.vue'),
                meta: { breadCrumb: 'createTest'},
                beforeEnter: requireLogin,

            },
            {
                name: 'Test',
                path: 'Test',
                component: () => import('../views/test/index.vue'),
                meta: { breadCrumb: 'Test'},
                beforeEnter: requireLogin,

            },
            {
                name: 'EditExamples',
                path: 'createCategoryExample',
                component: () => import('../views/admin/categories/Create.vue'),
                meta: { breadCrumb: 'createTest'},
            },
            {
                name: 'SelectLevel',
                path: 'selectLevel',
                component: () => import('../views/teacher/test/selectLevel.vue'),
            },
            {
                name: 'facilTests',
                path: 'facilTests',
                component: () => import('../views/teacher/test/facilTest.vue'),
            }
        ]
    },

    {
        path: '/student',
        component: Layout,
        // redirect: {
        //     name: 'admin.index'
        // },
        beforeEnter: requireLogin,
        //meta: { breadCrumb: 'Dashboard' },
        children: [
            {
                name: 'student.index',
                path: '',
                component: () => import('../views/teacher/create.vue'),
                //meta: { breadCrumb: 'Student' }
            },
            
        ]
    },
    {
        path: '/teacher',
        component: Layout,
        // redirect: {
        //     name: 'admin.index'
        // },
        beforeEnter: requireLogin,
        //meta: { breadCrumb: 'Dashboard' },
        children: [
            {
                name: 'teacher.index',
                path: '',
                component: () => import('../views/teacher/index.vue'),
                //meta: { breadCrumb: 'Test' }
            },
            {
                name: 'CreateStudent',
                path: 'createStudent',
                component: () => import('../views/teacher/createStudent.vue'),
                meta: { breadCrumb: 'CreateStudent'},
            },
            {
                name: 'EditStudent',
                path: 'editStudent/:id',
                component: () => import('../views/teacher/editStudent.vue'),
                meta: { breadCrumb: 'EditStudent'}
            },
            
        ]
    },

    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    },


];

