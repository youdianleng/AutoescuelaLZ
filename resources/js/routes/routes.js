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
                path: 'contacto',
                name: 'contacto',
                component: () => import('../views/contacto/index.vue'),
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
                name: 'SelectLevel',
                path: 'selectLevel/:id',
                component: () => import('../views/teacher/test/selectLevel.vue'),
                beforeEnter: requireLogin,
            },
            {
                name: 'facilTests',
                path: 'facilTests/:id',
                component: () => import('../views/teacher/test/facilTest.vue'),
            },
            
            {
                name: 'normalTests',
                path: 'normalTest/:id',
                component: () => import('../views/teacher/test/normalTest.vue'),
            },
            {
                name: 'dificilTests',
                path: 'dificilTest/:id',
                component: () => import('../views/teacher/test/dificilTest.vue'),
            },
            {
                name: 'Test',
                path: 'Test/:level/:id',
                component: () => import('../views/test/index.vue'),

            },
            {
                name: 'Final',
                path: 'Final/:user/:test_id/:accept/:respuesta',
                component: () => import('../views/teacher/test/final.vue'),
                beforeEnter: requireLogin
            },
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
            {
                name: 'student.Profile',
                path: 'profile',
                component: () => import('../views/admin/index.vue'),
                beforeEnter: requireLogin,
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
                name: 'teacher.CreateStudent',
                path: 'createStudent',
                component: () => import('../views/teacher/createStudent.vue'),
            },
            {
                name: 'teacher.EditStudent',
                path: 'editStudent/:id',
                component: () => import('../views/teacher/editStudent.vue'),
            },{
                name: 'teacher.CreateTest',
                path: 'createTest',
                component: () => import('../views/teacher/test/create.vue'),
                meta: { breadCrumb: 'createTest'},
                beforeEnter: requireLogin,

            },
            {
                name: 'teacher.Profile',
                path: 'profile',
                component: () => import('../views/admin/index.vue'),
                meta: { breadCrumb: 'Profile' },
                beforeEnter: requireLogin,
            },
        ]
    },

    {
        path: "/:pathMatch(.*)*",
        name: 'NotFound',
        component: () => import("../views/errors/404.vue"),
    },


];

