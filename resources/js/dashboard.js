import Vue from 'vue';
window.Vue = require('vue');
import VueRouter from 'vue-router'
import Dashboard from './dashboard/Dashboard.vue'
import AllTicket from './dashboard/components/AllTicket.vue'
import Tbody from './dashboard/components/Tbody.vue'
import UserTable from './dashboard/components/UserTable'
import Help from './dashboard/components/Help'
import NewTicket from './dashboard/components/NewTicket.vue'
import store from './store.js' //vuex store
import axios from 'axios'

//vue router
Vue.use(VueRouter);


const router = new VueRouter({
    routes: [{
            path: '/home',
            name: 'AllTicket',
            component: AllTicket,
        },
        {
            path: '/new-ticket',
            name: 'NewTicket',
            component: NewTicket
        },
        {
            path: '/users',
            name: 'UserTable',
            component: UserTable
        },
        {
            path: '/help',
            name: 'Help',
            component: Help
        }
    ],
    mode: 'history'
});

window.api = function (url) {
    return '/api' + url;
}
const dashboard = new Vue({
    render: h => h(Dashboard),
    router: router,
    el: '#dashboard',
    store: store,
    mounted() {
        axios.get(api('/auth/user')).then(res => {
            store.commit('user', res.data);
        })
    }
});
