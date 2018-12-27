import Vue from 'vue'
import Vuex from 'vuex'
import axios from 'axios';
Vue.use(Vuex);
export default new Vuex.Store({
    state: {
        user: null,
        users: []
    },
    user: (state, user) => {
        state.user = user;
    },
    users: (state, users) => {
        state.users = users;
    },
    // actions: {
    //     getusers: (context) => {
    //         axios.get('/api/auth/user').then(res => {
    //             context.commit('users', res.data);
    //         })
    //     }
    // }
})
