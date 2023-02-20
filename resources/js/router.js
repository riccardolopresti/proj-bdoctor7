import {createRouter, createWebHistory} from "vue-router";

import Home from './pages/Home.vue';
import Search from './pages/Search.vue';
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
        }
    ]
});

export {router};
