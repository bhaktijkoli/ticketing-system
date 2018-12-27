window.Vue = require('vue');
import store from './store.js'
import axios from 'axios';

import Login from './app/Login/Login.vue'

Vue.component('Login', require('./app/Login/Login.vue'));



const app = new Vue({
    el: '#app',
    store: store,
    mounted() {
        axios.get(routes('/auth/user')).then(res => {
            store.commit('user', res.data);
        })
    }
});
