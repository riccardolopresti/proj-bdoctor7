import {createRouter, createWebHistory} from "vue-router";

import Home from './pages/Home.vue';

import Search from './pages/Search.vue';

import DoctorDetail from './pages/DoctorDetail.vue';

const router = createRouter({
    history:createWebHistory(),
    linkExactActiveClass:'active',
    routes:[
        {
            path:'/',
            name:'home',
            component: Home
        },
        {
            path: '/search',
            name: 'search',
            component: Search
        },
        {
            path: '/search/doctor-detail/:slug',
            name: 'detail',
            component: DoctorDetail
        },
    ],
    scrollBehavior() {
        document.getElementById('app').scrollIntoView({ behavior: 'smooth' });
    }
});

export {router};
