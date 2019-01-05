import pusher from './dashboard/pusher.js' //Pusher and Laravel-Echo

import Vue from 'vue';
window.Vue = require('vue');

import VueRouter from 'vue-router'

import DashBoard from './dashboard/DashBoard.vue'

import AllTickets from './dashboard/components/ExistingTickets/AllTickets.vue'
import TicketDetails from './dashboard/components/ExistingTickets/TicketDetails.vue'
import Help from './dashboard/components/HelpSection/Help.vue'
import NewTicketForm from './dashboard/components/NewTicket/NewTicketForm.vue'
import EditUserForm from './dashboard/components/Users/EditUserForm.vue'
import UsersTable from './dashboard/components/Users/UsersTable.vue'
import UserTickets from './dashboard/components/UserTickets/UserTickets.vue'

import store from './dashboard/store.js' //vuex store

import axios from 'axios'

Vue.use(VueRouter);

const router = new VueRouter({
    routes: [{
            path: '/home',
            name: 'AllTickets',
            component: AllTickets,
        },
        {
            path: '/new-ticket',
            name: 'NewTicketForm',
            component: NewTicketForm
        },
        {
            path: '/my-tickets',
            name: 'UserTickets',
            component: UserTickets
        },
        {
            path: '/ticket/:id',
            name: 'TicketDetails',
            component: TicketDetails
        },
        {
            path: '/users',
            name: 'UsersTable',
            component: UsersTable
        },
        {
            path: '/help',
            name: 'Help',
            component: Help
        },
        {
            path: '/user/:id/edit',
            name: 'EditUserForm',
            component: EditUserForm
        }
    ],
    mode: 'history'
});

window.api = function (url) {
    return '/api' + url;
}

const dashboard = new Vue({
    render: h => h(DashBoard),
    el: '#dashboard',
    router: router,
    store: store,
    mounted() {
        axios.get(api('/auth/user')).then(res => {
            store.commit('user', res.data);
        })
    }
});
