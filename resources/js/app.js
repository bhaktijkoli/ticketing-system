window.Vue = require('vue');
import Login from './app/Login/Login.vue'

Vue.component('Login', require('./app/Login/Login.vue'));

const app = new Vue({
    el: '#app'
});
