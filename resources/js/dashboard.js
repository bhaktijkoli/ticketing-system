import Vue from 'vue';
window.Vue = require('vue');
import VueRouter from 'vue-router'
import Dashboard from './dashboard/Dashboard'
import AllTicket from './dashboard/components/AllTicket.vue'
import Tbody from './dashboard/components/Tbody.vue'
import NewTicket from './dashboard/components/NewTicket.vue'
// Vue.component('Dashboard', require('./dashboard/Dashboard'));

Vue.use(VueRouter);


const router = new VueRouter({
    routes: [{
        path: '/home',
        name: 'Dashboard',
        component: Dashboard,
        children: [{
                path: '/inbox',
                name: 'AllTicket',
                component: AllTicket
            },
            {
                path: 'ticket',
                name: 'Tbody',
                component: Tbody
            }
        ]
    }],
    mode: 'history'
});

const dashboard = new Vue({
    router: router,
    el: '#dashboard'
});
