window.Vue = require('vue');
Vue.component('login', require('./app/Login/Login.vue'));
const app = new Vue({
    el: '#app'
});
