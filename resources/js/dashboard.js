import Vue from 'vue';
window.Vue = require('vue');
import VueRouter from 'vue-router'
import Dashboard from './dashboard/Dashboard.vue'
import AllTicket from './dashboard/components/AllTicket.vue'
import Tbody from './dashboard/components/Tbody.vue'
import NewTicket from './dashboard/components/NewTicket.vue'

Vue.use(VueRouter);


const router = new VueRouter({
    routes: [
    {
        path: '/home',
        name: 'AllTicket',
        component: AllTicket,
    },
    {
        path: '/new-ticket',
        name: 'NewTicket',
        component: NewTicket
    },
],
    mode: 'history'
});

const dashboard = new Vue({
    render: h => h(Dashboard),
    router: router,
    el: '#dashboard'
});
