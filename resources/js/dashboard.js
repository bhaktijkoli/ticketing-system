import Vue from 'vue';
window.Vue = require('vue');
import Dashboard from './dashboard/Dashboard'
Vue.component('Dashboard', require('./dashboard/Dashboard'));

// Vue.use(VueRouter);


// const router = new VueRouter({
//     routes: [{
//         path: '/home',
//         name: 'dashboard',
//         component: Dashboard,
//     }],
//     mode: 'history'
// });

const dashboard = new Vue({
    // router: router,
    el: '#dashboard'
});
